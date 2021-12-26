<?php
require_once './../../../db/connection.php';
require_once './../../../db/technology/technology.php';
require_once './../../../db/product_cate/product_cate.php';
require_once './../../../db/products/product.php';
session_start();
$product_id = $_GET['product_id'];
$dataTech = getAllTech();
$dataCate = getAllProCate();
$dataPro = findProductById($product_id);
$data_img = getAllImage($product_id);
// var_dump($dataTech);die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apodio | Cập nhật sản phẩm</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="./../../../images/logo_05.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Apodio</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./../../../images/logo_05.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/Apodio/admin/index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Trang chủ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item menu-open ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    Sản phẩm
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/tables/data.php" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>Danh sách sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/forms/general.php" class="nav-link">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Thêm sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-list-alt nav-icon" aria-hidden="true"></i>
                                <p>
                                    Loại sản phẩm
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/tables/category_product.php" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>Danh sách loại sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/forms/create_category.php" class="nav-link">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Thêm loại sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-microchip nav-icon"></i>
                                <p>
                                    Công nghệ bề mặt
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/tables/list_tech.php" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>Danh sách công nghệ bề mặt</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/forms/create_technology.php" class="nav-link">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Thêm công nghệ bề mặt</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>
                                    Khách hàng
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/tables/list_customer.php" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>Danh sách khách hàng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>
                                    Bài viết
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/tables/list_post.php" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>Danh sách bài viết</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/forms/create_post.php" class="nav-link">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Thêm bài viết</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-list-alt nav-icon" aria-hidden="true"></i>
                                <p>
                                    Loại bài viết
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/tables/category_post.php" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>Danh sách loại bài viết</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Apodio/admin/pages/forms/create_post_cate.php" class="nav-link">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Thêm loại bài viết</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cập nhật sản phẩm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
                        <form action="./../../../db/products/update.php?product_id=<?= $dataPro['product_id']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="product_id" value="<?= $dataPro['product_id']; ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" value="<?= $dataPro['product_name']; ?>" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chiều dài</label>
                                    <input type="number" value="<?= $dataPro['product_height']; ?>" name="product_height" class="form-control" id="exampleInputEmail1" placeholder="Nhập chiều dài">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chiều rộng</label>
                                    <input type="number" value="<?= $dataPro['product_width']; ?>" name="product_width" class="form-control" id="exampleInputEmail1" placeholder="Nhập chiều rộng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên loại sản phẩm</label>
                                    <select name="id_category" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Chọn loại sản phẩm</option>
                                        <?php foreach ($dataCate as $value) { ?>
                                            <option value="<?php echo $value['id_category'] ?>" <?php echo ($value['id_category'] == $dataPro['id_category'] ? 'selected' : '') ?>><?php echo $value['name_category'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Công nghệ bề mặt</label>
                                    <select name="id_technology" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Chọn loại công nghệ</option>
                                        <?php foreach ($dataTech as $value) { ?>
                                            <option value="<?php echo $value['id_technology'] ?>" <?php echo ($value['id_technology'] == $dataPro['id_technology'] ? 'selected' : '') ?>><?php echo $value['name_technology'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ứng dụng sản phẩm</label>
                                    <input value="<?= $dataPro['product_application']; ?>" name="product_application" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập ứng dụng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Vật liệu cấu tạo</label>
                                    <input value="<?= $dataPro['product_material']; ?>" name="product_material" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên vật liệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng sản phẩm trong 1 hộp</label>
                                    <input value="<?= $dataPro['product_quantity']; ?>" name="product_quantity" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Độ bao phủ của sản phẩm(SQM)</label>
                                    <input value="<?= $dataPro['product_cover']; ?>" name="product_cover" type="number" step="0.01" class="form-control" id="exampleInputPassword1" placeholder="Nhập đơn vị">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Độ dày của sản phẩm(MM)</label>
                                    <input value="<?= $dataPro['product_thickness']; ?>" name="product_thickness" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập đơn vị">
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
                                <img width="150px" src="./../../../images/<?= $dataPro['product_image']; ?>" alt="">
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
                                <?php for ($i = 0; $i < count($data_img); $i++) { ?>
                                    <img width="150px" src="./../../../images/<?= $data_img[$i]['images']; ?>" alt="">
                                <?php } ?>
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
    </script>
</body>

</html>