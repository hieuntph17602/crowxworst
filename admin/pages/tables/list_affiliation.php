<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrowXworst | List chi nhánh</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="short icon" href="./../../../img/crow-head-vector-24390236.jpg">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php require_once './../forms/nav_admin.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Danh sách chi nhánh</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table style="text-align: center;" id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID chi nhánh</th>
                                                <th>Tên chi nhánh</th>
                                                <th>Ảnh chi nhánh</th>
                                                <th>Địa điểm</th>
                                                <th>Thế hệ</th>
                                                <th colspan="2">Chức năng</th>
                                            </tr>
                                        <tbody>
                                            <?php
                                            $conn = mysqli_connect('localhost', 'root', '');
                                            if (!$conn) {
                                                die("Connection failed" . mysqli_connect_error());
                                            } else {
                                                mysqli_select_db($conn, 'crow');
                                            }
                                            $results_per_page = 4;
                                            $query = "SELECT * FROM affiliations inner join locations ON affiliations.id_location = locations.id_location";
                                            $result = mysqli_query($conn, $query);
                                            $number_of_result = mysqli_num_rows($result);
                                            $number_of_page = ceil($number_of_result / $results_per_page);
                                            if (!isset($_GET['page'])) {
                                                $page = 1;
                                            } else {
                                                $page = $_GET['page'];
                                            }
                                            $page_first_result = ($page - 1) * $results_per_page;
                                            $query = "SELECT * FROM affiliations inner join locations ON affiliations.id_location=locations.id_location LIMIT " . $page_first_result . ',' . $results_per_page;
                                            $result = mysqli_query($conn, $query);
                                            while ($ds = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td><?= $ds['id_affiliation'] ?></td>
                                                    <td><?= $ds['name_affiliation'] ?></td>
                                                    <td><img width="100px" src="./../../../img/<?= $ds['image_affiliation'] ?>" alt=""></td>
                                                    <td><?= $ds['name_location'] ?></td>
                                                    <td><?= $ds['class_affiliation'] ?></td>
                                                    <td><a href="/crowxworst/admin/pages/forms/edit_affiliation.php?id_affiliation=<?= $ds['id_affiliation'] ?>"><button type="button" class="btn btn-block btn-primary"><i class="fas fa-tools nav-icon"></i></button></a></td>
                                                    <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="/crowxworst/admin/pages/forms/delete_affiliation.php?id_affiliation=<?= $ds['id_affiliation'] ?>"><button type="button" class="btn btn-block btn-danger"><i class="far fa-trash-alt nav-icon"></i></button></a></td>
                                                </tr>
                                            <?php } ?>
                                            <div style="width: 100%; padding: 2px 40px 8px;">
                                                <?php for ($page = 1; $page <= $number_of_page; $page++) {
                                                    echo '<a style="text-decoration: none; width: 30px; text-align: center; line-height: 30px; display: inline-block; background-color: white; border: 1px solid #e8e8e8; color: blue;" href = "list_affiliation.php?page=' . $page . '">' . $page . ' </a>';
                                                }
                                                ?>
                                            </div>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID chi nhánh</th>
                                                <th>Tên chi nhánh</th>
                                                <th>Ảnh chi nhánh</th>
                                                <th>Địa điểm</th>
                                                <th>Thế hệ</th>
                                                <th colspan="2">Chức năng</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
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
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>