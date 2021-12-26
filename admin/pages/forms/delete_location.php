<?php 
require_once './../../../db/connection.php';
require_once './../../../db/location.php';
$id = $_GET['id_location'];
deleteLocation($id);
header("Location:/crowxworst/admin/pages/tables/list_location.php");
?>