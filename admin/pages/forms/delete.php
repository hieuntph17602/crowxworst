<?php 
require_once './../../../db/connection.php';
require_once './../../../db/products/product.php';
$product_id = $_GET['product_id'];
deleteProductImage($product_id);
deleteProduct($product_id);
header("Location:/Apodio/admin/pages/tables/data.php");
