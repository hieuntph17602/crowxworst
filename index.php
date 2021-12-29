<?php
require_once './db/location.php';
require_once './db/connection.php';
$dataLocation = getAllLocation();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CrowXworst</title>
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
     <img src="./img/Site-background-light.jpg" alt="">
     <a href="./manga_detail.php?id_manga=6"><img src="./img/Qp-1745367.jpg" alt="" srcset=""></a>
        <img src="./img/4_kings.jpg" alt="" srcset="">
        <a href="./manga_detail.php?id_manga=5"><img src="./img/Crows_Explode_poster.jpeg.jpg" alt="" srcset="">
       <a href="./manga_detail.php?id_manga=2"><img src="./img/Logocrowsinfo2.png" alt="" srcset=""></a>
       <a href="./manga_detail.php?id_manga=4"><img src="./img/Zero_logo.jpg" alt="" srcset=""></a>
        <a href="./manga_detail.php?id_manga=3"><img src="./img/Worstinfologo.png" alt="" srcset=""></a>
    </section>
    <!-- end main -->
    <script src="./js/loading.js"></script>
</body>

</html>