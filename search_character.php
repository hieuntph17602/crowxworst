<?php
session_start();
if (isset($_REQUEST['submit'])) {
    $search = addslashes($_POST['search']);
    if (empty($search)) {
        $_SESSION['error'] = "Không được bỏ trống!";
        die;
    }
}
$query = "select * from characters where name_character like '%$search%' or nickname_character like '%$search%'";

// Kết nối sql
$conn = mysqli_connect("localhost", "root", "", "crow");

// Thực thi câu truy vấn
$sql = mysqli_query($conn, $query);

// Đếm số đong trả về trong sql.
$num = mysqli_num_rows($sql);

// Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
if ($num > 0 && $search != "") {
    while ($row = mysqli_fetch_assoc($sql)) { ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>CrowXworst | Tìm kiếm nhân vật</title>
            <meta charset="utf-8">
            <meta name="author" content="pixelhint.com">
            <meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website template" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
            <link rel="stylesheet" type="text/css" href="css/reset.css">
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <link rel="short icon" href="./img/crow-head-vector-24390236.jpg">
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/main.js"></script>
            <link rel="stylesheet" href="./css/loading.css">
        </head>

        <body class="preloading">
            <div class="load">
                <img src="./img/loading.gif">
            </div>
            <?php require_once './header.php' ?>

            <section class="main clearfix">
                    <div class="work">
                        <a href="character_detail.php?id_character=<?= $row['id_character'] ?>">
                            <img height="406.6px" src="img/<?= $row['image_character'] ?>" class="media" alt="" />
                            <div class="caption">
                                <div class="work_title">
                                    <h1><?= $row['name_character'] ?></h1>
                                </div>
                            </div>
                        </a>
                    </div> 
            </section>
            <script src="./js/loading.js"></script>
        </body>

        </html>
<?php }
} else {
    header("Location:./error.php");
}
