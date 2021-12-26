<?php
require_once './db/location.php';
require_once './db/connection.php';
$id_location = $_GET['id_location'];
$dataLocation = findLocationById($id_location);
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
	<script type="text/javascript" src="js/main.js"></script>
</head>

<body>
	<?php require_once './header.php' ?>

	<!-- end header -->

	<section class="main clearfix">

		<section class="top" style="background-image:url('./img/Concrete_Factory.png');">
			<div class="wrapper content_header clearfix">
				<div class="work_nav">

					<ul class="btn clearfix">
						<li><a href="#" class="previous" data-title="Previous"></a></li>
						<li><a href="index.html" class="grid" data-title="Portfolio"></a></li>
						<li><a href="#" class="next" data-title="Next"></a></li>
					</ul>

				</div><!-- end work_nav -->
				<h1 class="title"><?=$dataLocation['name_location'] ?></h1>
			</div>
		</section><!-- end top -->

		<section class="wrapper">
			<div class="content">
				<?=$dataLocation['history_location']?>
			</div><!-- end content -->
		</section>
	</section><!-- end main -->

</body>

</html>