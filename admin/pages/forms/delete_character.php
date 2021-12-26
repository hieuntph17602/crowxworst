<?php
require_once './../../../db/connection.php';
require_once './../../../db/post_cate/post_cate.php';
$id = $_GET['id'];
deletePost_cate($id);
header("Location:/Apodio/admin/pages/tables/category_post.php");
?>