<?php
require_once './db/faction.php';
require_once './db/connection.php';
$dataFaction = getAllFaction();
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
    <link rel="stylesheet" href="./css/loading.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body class="preloading">
<div class="load">
		<img src="./img/loading.gif">
	</div>
    <?php require_once './header.php' ?>

    <section class="main clearfix">
        <?php foreach ($dataFaction as $value) { ?>
            <div class="work">
                <a href="faction_detail.php?id_faction=<?=$value['id_faction']?>">
                    <img src="img/<?=$value['image_faction']?>" class="media" alt="" />
                    <div class="caption">
                        <div class="work_title">
                            <h1><?= $value['name_faction']?></h1>
                        </div>
                    </div>
                </a>
            </div> <?php  } ?>

    </section>
    <!-- end main -->
<script src="./js/loading.js"></script>
</body>

</html>