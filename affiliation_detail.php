<?php
require_once './db/affiliation.php';
require_once './db/connection.php';
$id_affiliation = $_GET['id_affiliation'];
$dataAffiliation = findAffiliationById($id_affiliation);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>CrowXworst | <?php echo $dataAffiliation['name_affiliation'] ?></title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website  template" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="short icon" href="./img/crow-head-vector-24390236.jpg">
	<script type="text/javascript" src="js/main.js"></script>
	<link rel="stylesheet" href="./css/loading.css">
</head>

<body class="preloading">
	<div class="load">
		<img src="./img/loading.gif">
	</div>
	<?php require_once './header.php' ?>

	<!-- end header -->

	<section class="main clearfix">
		<section class="top" style="background-image:url('./img/<?= $dataAffiliation['image_affiliation'] ?>');">
			<div class="wrapper content_header clearfix">
				<h1 class="title"><?= $dataAffiliation['name_affiliation'] ?></h1>
			</div>
		</section><!-- end top -->

		<section class="wrapper">
			<div class="content">
				<?= $dataAffiliation['history_affiliation'] ?>
			</div><!-- end content -->
		</section>
	</section><!-- end main -->
	<script src="./js/loading.js"></script>
</body>

</html>