<?php 
require_once './../../../db/connection.php';
require_once './../../../db/faction.php';
$id_faction = $_GET['id_faction'];
deleteFaction($id_faction);
deleteFactionImage($id_faction);
header("Location:/crowxworst/admin/pages/tables/list_faction.php");
