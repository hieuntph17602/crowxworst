<?php
session_start();
require_once './../../../db/connection.php';
require_once './../../../db/affiliation.php';
require_once './../../../db/faction.php';
$conn = mysqli_connect('localhost', 'root', '', 'crow');
if ($conn) {
    mysqli_query($conn, "SET NAMES 'UTF8'");
}

$dataAffiliation = getAllAffiliation();

if (isset($_POST['submit'])) {

    $data = [
        'name_faction' => $_POST['name_faction'],
        'history_faction' => $_POST['history_faction'],
        'class_faction' => $_POST['class_faction'],
        'status_faction' => $_POST['status_faction'],
        'id_affiliation' => $_POST['id_affiliation'],
        'image_faction' => $_FILES['image_faction']['name'],
    ];  
    var_dump($data);die;
    if (isset($_FILES['image_faction'])) {
        $file = $_FILES['image_faction'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'], './../../../img/' . $file_name);
    }

    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        foreach ($file_names as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key], './../../../img/' . $value);
        }
    }
    insertFaction($data);
    $id_faction = mysqli_insert_id($conn);
    foreach ($file_names as $key => $value) {
        mysqli_query($conn, "INSERT INTO img_faction(id_faction,images) VALUES('$id_faction','$value')");
    }
    header("location:/crowxworst/admin/pages/tables/list_faction.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrowXworst | Thêm băng nhóm</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="./../../../css/summernote-bs4.min.css">
    <link rel="short icon" href="./../../../img/crow-head-vector-24390236.jpg">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php require_once './nav_admin.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thêm mới băng nhóm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Thêm mới băng nhóm</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <?php
                        if (isset($_SESSION['error'])) { ?>
                            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                                <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header"><strong class="mr-auto">Error</strong><small>Cảnh báo</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="toast-body"><?php echo $_SESSION['error'];
                                                            unset($_SESSION[['error']]) ?></div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="myForm" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="affiliation_name">Tên băng nhóm</label>
                                    <input name="name_faction" type="text" class="form-control" id="affiliation_name" placeholder="Nhập tên băng nhóm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh băng nhóm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image_faction" type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thư viện ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile" multiple="multiple">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Lịch sử băng nhóm</label>
                                    <textarea id="summernote" name="history_faction" class="form-control">

                                </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Chi nhánh</label>
                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="id_affiliation">
                                        <option value="">Mời chọn chi nhánh</option>
                                        <?php foreach ($dataAffiliation as $value) { ?>
                                            <option value="<?= $value['id_affiliation'] ?>"><?= $value['name_affiliation'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="class">Thế hệ băng nhóm</label>
                                    <input name="class_faction" type="text" class="form-control" id="class" placeholder="Thế hệ băng nhóm">
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái băng nhóm</label>
                                    <input name="status_faction" type="text" class="form-control" id="status" placeholder="Nhập trạng thái băng nhóm">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button name="submit" type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0-rc
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="#">Apodio</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script src="./../../../js/summernote-bs4.js"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
            const toast = document.getElementsByClassName('.bg-danger');
            const main = document.getElementById('toastsContainerTopRight');
            main.onclick = function(e) {
                if (e.target.closest('.close')) {
                    main.style.display = 'none';
                    <?php unset($_SESSION['error']); ?>
                }
            }
        })
    </script>
</body>

</html>