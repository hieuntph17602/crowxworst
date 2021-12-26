<?php
session_start();
require_once './../../../db/connection.php';
require_once './../../../db/post_cate/post_cate.php';
$id = $_GET['id'];
$data = findByIdPost_cate($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
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
                            <h1>Chỉnh sửa loại bài viết</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Chỉnh sửa loại bài viết</li>
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
                                    <div class="toast-body"><?php echo $_SESSION['error'];?></div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="./../../../db/post_cate/update.php?id=<?= $data['id_post_category']; ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="id_post_category" value="<?php echo $data['id_post_category']; ?>">
                                    <label for="exampleInputEmail1">Tên loại bài viết</label>
                                    <input type="text" class="form-control" name="post_category_name" value="<?php echo $data['post_category_name']; ?>" id="exampleInputEmail1" placeholder="Nhập tên bài viết">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        const toast = document.getElementsByClassName('.bg-danger');
        const main = document.getElementById('toastsContainerTopRight');
        main.onclick = function(e) {
            if (e.target.closest('.close')) {
                main.style.display = 'none';
                <?php unset($_SESSION['error']); ?>
            }
        }

        function validate() {
            if (name_category.value == "") {
                name_category.style.border = "color: #dc3545";
                return false;
            }
        }
        submit.addEventListener('click', function() {
           validate();
        });
    </script>
</body>

</html>