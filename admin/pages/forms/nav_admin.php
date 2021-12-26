<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="" class="nav-link">Home</a>
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
            <!-- Notifications Dropdown Menu -->
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
        <a href="#" class="brand-link" style="padding-bottom: 30px;">
            <img src="\crowxworst\img\logo.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="\crowxworst\img\crow-head-vector-24390236.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Admin</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="/crowxworst/admin/home.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Trang chủ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Chi nhánh
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/tables/list_affiliation.php" class="nav-link">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>Danh sách chi nhánh</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/forms/create_affiliation.php" class="nav-link">
                                    <i class="far fa-plus-square nav-icon"></i>
                                    <p>Thêm chi nhánh</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-list-alt nav-icon" aria-hidden="true"></i>
                            <p>
                                Địa điểm
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/tables/list_location.php" class="nav-link">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>Danh sách địa điểm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/forms/create_location.php" class="nav-link">
                                    <i class="far fa-plus-square nav-icon"></i>
                                    <p>Thêm địa điểm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users nav-icon"></i>
                            <p>
                                <p>
                                    Băng nhóm
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/tables/list_faction.php" class="nav-link">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>Danh sách Băng nhóm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/forms/create_faction.php" class="nav-link">
                                    <i class="far fa-plus-square nav-icon"></i>
                                    <p>Thêm Băng nhóm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>
                                Nhân vật
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/tables/list_characters.php" class="nav-link">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>Danh sách nhân vật</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/forms/create_character.php" class="nav-link">
                                    <i class="far fa-plus-square nav-icon"></i>
                                    <p>Thêm nhân vật</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-copy nav-icon"></i>
                            <p>
                                Bộ truyện
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/tables/list_post.php" class="nav-link">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>Danh sách bộ truyện</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/forms/create_post.php" class="nav-link">
                                    <i class="far fa-plus-square nav-icon"></i>
                                    <p>Thêm bộ truyện</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-list-alt nav-icon" aria-hidden="true"></i>
                            <p>
                                Chap truyện
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/tables/category_post.php" class="nav-link">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>Danh sách chap truyện</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/crowxworst/admin/pages/forms/create_post_cate.php" class="nav-link">
                                    <i class="far fa-plus-square nav-icon"></i>
                                    <p>Thêm chap truyện</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/crowxworst/admin/logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt nav-icon"></i>
                            <p>
                                Đăng xuất
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</body>

</html>