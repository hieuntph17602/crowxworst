<?php
require_once './../../../db/connection.php';
require_once './../../../db/technology/technology.php';
require_once './../../../db/product_cate/product_cate.php';
session_start();
$dataTech = getAllTech();
$dataCate = getAllProCate();
// var_dump($dataTech);die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apodio | Thêm sản phẩm</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
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
                            <h1>Thêm mới sản phẩm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
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
                                    <div class="toast-body"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form action="./../../../db/products/store.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chiều dài</label>
                                    <input type="number" name="product_height" class="form-control" id="exampleInputEmail1" placeholder="Nhập chiều dài">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chiều rộng</label>
                                    <input type="number" name="product_width" class="form-control" id="exampleInputEmail1" placeholder="Nhập chiều rộng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên loại sản phẩm</label>
                                    <select name="id_category" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Chọn loại sản phẩm</option>
                                        <?php foreach ($dataCate as $value) { ?>
                                            <option value="<?php echo $value['id_category']?>"><?php echo $value['name_category'] ?></option>
                                        <?php } ?>
                                    </select>                                </div>
                                <div class="form-group">
                                    <label>Công nghệ bề mặt</label>
                                    <select name="id_technology" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Chọn loại công nghệ</option>
                                        <?php foreach ($dataTech as $value) { ?>
                                            <option value="<?php echo $value['id_technology']?>"><?php echo $value['name_technology'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ứng dụng sản phẩm</label>
                                    <input name="product_application" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập ứng dụng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Vật liệu cấu tạo</label>
                                    <input name="product_material" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên vật liệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng sản phẩm trong 1 hộp</label>
                                    <input name="product_quantity" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Độ bao phủ của sản phẩm(SQM)</label>
                                    <input name="product_cover" type="number" step="0.01" class="form-control" id="exampleInputPassword1" placeholder="Nhập đơn vị">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Độ dày của sản phẩm(MM)</label>
                                    <input name="product_thickness" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập đơn vị">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh sản phẩm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="product_image" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh mô tả sản phẩm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" multiple="multiple" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
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
            }
        }
    </script>
</body>

</html>