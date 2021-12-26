<?php
require_once './../../../db/connection.php';
require_once './../../../db/affiliation.php';
require_once './../../../db/location.php';
session_start();
$id_affiliation = $_GET['id_affiliation'];
$dataAffiliation = findAffiliationById($id_affiliation);
$data_location = getAllLocation();
$dataImg = getAllImageAffiliation($id_affiliation);
$con = mysqli_connect('localhost', 'root', '', 'crow');
if (isset($_POST['update'])) {
    if ($con) {
        mysqli_query($con, "SET NAMES 'UTF8'");
    }

    if (empty($_POST['name_affiliation'])) {
        $_SESSION['error'] = "Không được để trống tên chi nhánh";
        header("location:/crowxworst/admin/pages/forms/edit_affiliation.php?id_affiliation=$id_affiliation");
        die;
    }
    if (empty($_POST['history_affiliation'])) {
        $_SESSION['error'] = "Không được để trống lịch sử chi nhánh";
        header("location:/crowxworst/admin/pages/forms/edit_affiliation.php?id_affiliation=$id_affiliation");
        die;
    }




    // if (isset($_FILES['image_affiliation'])) {
    //     $file = $_FILES['image_affiliation'];


    //     if ($file['type'] != 'image/jpeg' || $file['type'] != 'image/jpg' || $file['type'] != 'image/png') {
    //     }
    //     $file_name = $file['name'];
    //     if (empty($file_name)) {
    //         $file_name = $dataAffiliation['image_affiliation'];
    //     } else {
    //         move_uploaded_file($file['tmp_name'], './../../../img/' . $file_name);
    //     }
    // }

    // if (isset($_FILES['images'])) {
    //     $files = $_FILES['images'];
    //     $file_names = $files['name'];
    //     if (!empty($file_names[0])) {
    //         mysqli_query($con, "DELETE FROM img_affiliation WHERE id_affiliation = $id_affiliation");
    //         foreach ($file_names as $key => $value) {
    //             move_uploaded_file($files['tmp_name'][$key], './../../../img/' . $value);
    //         }
    //         foreach ($file_names as $value) {
    //             mysqli_query($con, "INSERT INTO img_affiliation(id_affiliation,images) VALUES('$id_affiliation','$value')");
    //         }
    //     }
    // }
    $data = [
        'name_affiliation' => $_POST['name_affiliation'],
        'history_affiliation' => $_POST['history_affiliation'],
        'class_affiliation' => $_POST['class_affiliation'],
        'id_location' => $_POST['id_location'],
        'id_affiliation' => $_POST['id_affiliation'],
        'image_affiliation' => $_FILES['image_affiliation']['name'],
    ];
    // var_dump($data);die;
    // $name_affiliation = $_POST['name_affiliation'];
    // $history_affiliation = $_POST['history_affiliation'];
    // $class_affiliation = $_POST['class_affiliation'];
    // $id_location = $_POST['id_location'];
    // $id_affiliation = $_POST['id_affiliation'];
    // $id_category = $_POST['id_category'];
    
    
    if (isset($_FILES['image_affiliation'])) {
        $file = $_FILES['image_affiliation'];
        
        
        if ($file['type'] != 'image/jpeg' || $file['type'] != 'image/jpg' || $file['type'] != 'image/png') {
        }
        $file_name = $file['name'];
        if (empty($file_name)) {
            $file_name = $dataAffiliation['image_affiliation'];
        } else {
            move_uploaded_file($file['tmp_name'], './../../../img/' . $file_name);
        }
    }
    
    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        if (!empty($file_names[0])) {
            mysqli_query($conn, "DELETE FROM img_affiliation WHERE id_tours = $id_tours");
            foreach ($file_names as $key => $value) {
                move_uploaded_file($files['tmp_name'][$key], './../../../img/' . $value);
            }
            foreach ($file_names as $value) {
                mysqli_query($conn, "INSERT INTO img_affiliation(id_affiliation,images) VALUES('$id_affiliation','$value')");
            }
        }
    }
    
    // $sql = "UPDATE affiliations SET `name_affiliation` = '$name_affiliation', `history_affiliation` = '$history_affiliation', `class_affiliation` = '$class_affiliation', `id_location`='$id_location', `image_affiliation` ='$file_name' ,`id_location`='$id_location' WHERE `id_affiliation` = '$id_affiliation'";
    
    // $query = mysqli_query($con, $sql);
    updateAffiliation($data);
    header("location:/crowxworst/admin/pages/tables/list_affiliation.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrowXworst | Cập nhật chi nhánh</title>
    <link rel="short icon" href="./../../../img/crow-head-vector-24390236.jpg">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./../../../css/summernote-bs4.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
                            <h1>Chỉnh sửa chi nhánh </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Chỉnh sửa chi nhánh</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?php if (isset($_SESSION['error'])) { ?>
                    <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                        <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header"><strong class="mr-auto">Error</strong><small>Cảnh báo</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="toast-body"><?php echo $_SESSION['error']; ?></div>
                        </div>
                    </div>
                <?php } ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_affiliation" value="<?= $dataAffiliation['id_affiliation'] ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="affiliation_name">Tên chi nhánh</label>
                            <input name="name_affiliation" type="text" class="form-control" id="affiliation_name" value="<?= $dataAffiliation['name_affiliation'] ?>">
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
                        <img width="150px" src="./../../../img/<?= $dataAffiliation['image_affiliation'] ?>" alt="" srcset="">
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
                        <?php for ($i = 0; $i < count($dataImg); $i++) { ?>
                            <img width="150px" src="./../../../img/<?= $dataImg[$i]['images']; ?>" alt="">
                        <?php } ?>
                        <div class="form-group">
                            <label for="history_affiliation">Lịch sử chi nhánh</label>
                            <textarea id="summernote" name="history_affiliation" class="form-control">
                                    <p><?= $dataAffiliation['history_affiliation'] ?></p>
                                </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectBorder">Địa điểm</label>
                            <select class="custom-select form-control-border" id="exampleSelectBorder" name="id_location">
                                <option value="">Mời chọn địa điểm</option>
                                <?php foreach ($data_location as $value) { ?>
                                    <option value="<?= $value['id_location'] ?>" <?php echo ($value['id_location'] == $dataAffiliation['id_location'] ? 'selected' : '') ?>><?= $value['name_location'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="class">Thế hệ chi nhánh</label>
                            <input name="class_affiliation" type="text" class="form-control" id="class" value="<?= $dataAffiliation['class_affiliation'] ?>">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button name="update" type="submit" class="btn btn-primary">Cập nhật</button>
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
    <script src="./../../../js/summernote-bs4.js"></script>

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