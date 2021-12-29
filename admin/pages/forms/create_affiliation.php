<?php
session_start();
require_once './../../../db/connection.php';
require_once './../../../db/location.php';
require_once './../../../db/affiliation.php';
$con = mysqli_connect('localhost', 'root', '', 'crow');
if ($con) {
    mysqli_query($con, "SET NAMES 'UTF8'");
}

$data_location = getAllLocation();

if (isset($_POST['submit'])) {

    // $data = [
       $name_affiliation = $_POST['name_affiliation'];
       $history_affiliation = $_POST['history_affiliation'];
       $class_affiliation = $_POST['class_affiliation'];
       $id_location = $_POST['id_location'];
       $image_affiliation = $_FILES['image_affiliation']['name'];
    // ];


    if (isset($_FILES['image_affiliation'])) {
        $file = $_FILES['image_affiliation'];
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
    $conn = getConnection();
    $sql  = "INSERT INTO affiliations(`name_affiliation`, `history_affiliation`,`id_location`,`image_affiliation`,`class_affiliation`) VALUES('$name_affiliation', '$history_affiliation','$id_location','$file_name','$class_affiliation')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $id_affiliation = $conn->lastInsertId();
    foreach ($file_names as $key => $value) {
        $conn->query("INSERT INTO img_affiliation(id_affiliation,images) VALUES('$id_affiliation','$value')");
    }
    header("location:/crowxworst/admin/pages/tables/list_affiliation.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrowXworst | Thêm chi nhánh</title>

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
                            <h1>Thêm mới chi nhánh</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Thêm mới chi nhánh</li>
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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="myForm" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="affiliation_name">Tên chi nhánh</label>
                                    <input name="name_affiliation" type="text" class="form-control" id="affiliation_name" placeholder="Nhập tên chi nhánh">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh chi nhánh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image_affiliation" type="file" class="custom-file-input" id="exampleInputFile">
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
                                    <label for="history_affiliation">Lịch sử chi nhánh</label>
                                    <textarea id="summernote" name="history_affiliation" class="form-control">
                                </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Địa điểm</label>
                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="id_location">
                                        <option value="">Mời chọn địa điểm</option>
                                        <?php foreach ($data_location as $value) { ?>
                                            <option value="<?= $value['id_location'] ?>"><?= $value['name_location'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="class">Thế hệ chi nhánh</label>
                                    <input name="class_affiliation" type="text" class="form-control" id="class" placeholder="Thế hệ chi nhánh">
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