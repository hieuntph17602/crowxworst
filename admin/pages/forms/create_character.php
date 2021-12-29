<?php
session_start();
require_once './../../../db/connection.php';
require_once './../../../db/faction.php';
require_once './../../../db/location.php';
require_once './../../../db/affiliation.php';
$data_location = getAllLocation();
$dataAffiliation = getAllAffiliation();
$dataFaction = getAllFaction();
$con = mysqli_connect('localhost', 'root', '', 'crow');
if ($con) {
    mysqli_query($con, "SET NAMES 'UTF8'");
}

$data_location = getAllLocation();

if (isset($_POST['submit'])) {

    // $data = [
    $name_character = $_POST['name_character'];
    $image_character = $_FILES['image_character']['name'];
    $id_faction = $_POST['id_faction'];
    $nickname_character = $_POST['nickname_character'];
    $history_character = $_POST['history_character'];
    $class_character = $_POST['class_character'];
    $role_character = $_POST['role_character'];
    $status_character = $_POST['status_character'];
    $id_affiliation = $_POST['id_affiliation'];
    $id_location = $_POST['id_location'];
    // ];


    if (isset($_FILES['image_character'])) {
        $file = $_FILES['image_character'];
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
    $sql  = "INSERT INTO characters(`name_character`, `history_character`,`id_location`,`id_faction`,`id_affiliation`,`image_character`,`nickname_character`,`role_character`,`class_character`,`status_character`) VALUES('$name_character','$history_character','$id_location','$id_faction','$id_affiliation','$image_character','$nickname_character','$role_character','$class_character','$status_character')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $id_character = $conn->lastInsertId();
    foreach ($file_names as $key => $value) {
        $conn->query("INSERT INTO img_character(id_character,images) VALUES('$id_character','$value')");
    }
    header("location:/crowxworst/admin/pages/tables/list_character.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrowXworst | Thêm nhân vật</title>

    <link rel="short icon" href="./../../../img/crow-head-vector-24390236.jpg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="./../../../css/summernote-bs4.min.css">
    <link rel="stylesheet" href="./../../../css/summernote-bs4.min.css">
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
                            <h1>Thêm mới nhân vật</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Thêm mới nhân vật</li>
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
                        <form id="myForm" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="affiliation_name">Tên nhân vật</label>
                                    <input name="name_character" type="text" class="form-control" id="affiliation_name" placeholder="Nhập tên nhân vật">
                                </div>
                                <div class="form-group">
                                    <label for="name">Biệt danh nhân vật</label>
                                    <input name="nickname_character" type="text" class="form-control" id="name" placeholder="Nhập biệt danh nhân vật">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh nhân vật</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image_character" type="file" class="custom-file-input" id="exampleInputFile">
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
                                    <label for="summernote">Lịch sử nhân vật</label>
                                    <textarea id="summernote" name="history_character" class="form-control">

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
                                    <label for="exampleSelectBorder">Chi nhánh</label>
                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="id_affiliation">
                                        <option value="">Mời chọn chi nhánh</option>
                                        <?php foreach ($dataAffiliation as $value) { ?>
                                            <option value="<?= $value['id_affiliation'] ?>"><?= $value['name_affiliation'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Băng nhóm</label>
                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="id_faction">
                                        <option value="">Mời chọn băng nhóm</option>
                                        <?php foreach ($dataFaction as $value) { ?>
                                            <option value="<?= $value['id_faction'] ?>"><?= $value['name_faction'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectBorder">Vai trò</label>
                                    <select class="custom-select form-control-border" id="exampleSelectBorder" name="role_character">
                                        <option value="">Mời chọn vai trò</option>
                                        <option value="0">Thủ lĩnh</option>
                                        <option value="1">Phó băng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="class">Thế hệ nhân vật</label>
                                    <input name="class_character" type="text" class="form-control" id="class" placeholder="Thế hệ nhân vật">
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái nhân vật</label>
                                    <input name="status_character" type="text" class="form-control" id="status" placeholder="Nhập trạng thái nhân vật">
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
            <strong>Copyright &copy; 2014-2021 <a href="#">CrowXworst</a>.</strong> All rights reserved.
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