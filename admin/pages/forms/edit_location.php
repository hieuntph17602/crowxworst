<?php
session_start();
require_once './../../../db/connection.php';
require_once './../../../db/location.php';
$id = $_GET['id_location'];
$dataLocation = findLocationById($id);
if (isset($_POST['update'])) {
if (
    empty($_POST['name_location']) ||
    empty($_POST['history_location'])
) {
    $_SESSION['error'] = "Không để trống thông tin!";
    header("location: /crowxworst/admin/pages/forms/edit_location.php?id_location=$id");
    die;
}
$data = [
    'id_location' => $dataLocation['id_location'],
    'name_location' => $_POST['name_location'],
    'history_location' => $_POST['history_location'],
    'image_location' => $_FILES['image_location']['name'],
];

//////
if ($_FILES['image_location']['name'] == '') {
    $data['image_location'] = $dataLocation['image_location'];
} else {
    $file_name = $_FILES['image_location']['name'];
    if (strpos($_FILES['image_location']['type'], 'image') === false) {
        $_SESSION['error'] = "File phải là ảnh!";
        header("location: /crowxworst/admin/pages/forms/edit_location.php?id_location=$id");
        die;
    }
}
if (isset($_FILES['image_location'])) {
    $file = $_FILES['img_location'];
    $file_name = $file['name'];
    move_uploaded_file($file['tmp_name'], './../../../img/' . $file_name);
}
updateLocation($data);
header("location: /crowxworst/admin/pages/tables/list_location.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrowXworst | Cập nhật địa điểm</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="./../../../css/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="../../plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="../../plugins/codemirror/theme/monokai.css">
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <script src="./../../../js/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="../../plugins/simplemde/simplemde.min.css">
    <link rel="short icon" href="./../../../img/crow-head-vector-24390236.jpg">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php require_once './nav_admin.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Sửa địa điểm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa địa điểm</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <?php
                            if (isset($_SESSION['error'])) { ?>
                                <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                                    <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header"><strong class="mr-auto">Error</strong><small>Cảnh báo</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                        <div class="toast-body"><?php echo $_SESSION['error'];
                                                                ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                            <form id="myForm" action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <input type="hidden" name="id_location" value="<?= $dataLocation['id_location'] ?>">
                                    <div class="form-group">
                                        <label for="_name">Tên địa điểm</label>
                                        <input name="name_location" type="text" class="form-control" id="_name" value="<?= $dataLocation['name_location'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh địa điểm</label>
                                        <img src="./../../../img/<?= $dataLocation['image_location'] ?>" alt="" srcset="">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image_location" type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="history_location">Lịch sử địa điểm</label>
                                        <textarea id="summernote" name="history_location" class="form-control">
                                        <p><?= $dataLocation['history_location'] ?>"</p>
                                </textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button name="update" type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
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
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Summernote -->
    <script src="./../../../js/summernote-bs4.js"></script>
    <!-- CodeMirror -->
    <script src="../../plugins/codemirror/codemirror.js"></script>
    <script src="../../plugins/codemirror/mode/css/css.js"></script>
    <script src="../../plugins/codemirror/mode/xml/xml.js"></script>
    <script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
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