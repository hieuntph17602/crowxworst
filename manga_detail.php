<?php
require_once './db/connection.php';
$id_manga = $_GET['id_manga'];
function findMangaById($id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM mangas WHERE id_manga = :id_manga";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_manga' => $id]);
    $data = $stmt->fetch();

    $row = [
        'id_manga' => $data['id_manga'],
        'name_manga' => $data['name_manga'],
        'history_manga' => $data['history_manga'],
    ];

    return $row;
}
$dataManga = findMangaById($id_manga);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>CrowXworst</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website  template" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="short icon" href="./img/crow-head-vector-24390236.jpg">
	<link rel="stylesheet" href="./css/loading.css">
	<script type="text/javascript" src="js/main.js"></script>
</head>

<body class="preloading">
<div class="load">
		<img src="./img/loading.gif">
	</div>
	<?php require_once './header.php' ?>
	<section class="main clearfix">

		<section class="top" style="background-image:url('./img/Concrete_Factory.png');">
			<div class="wrapper content_header clearfix">
				<h1 class="title"><?=$dataManga['name_manga'] ?></h1>
			</div>
		</section><!-- end top -->

		<section class="wrapper">
			<div class="content">
				<?=$dataManga['history_manga']?>
			</div><!-- end content -->
		</section>
	</section><!-- end main -->
<script src="./js/loading.js"></script>
</body>

</html>