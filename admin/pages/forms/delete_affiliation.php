<?php 
require_once './../../../db/connection.php';
require_once './../../../db/affiliation.php';
$id_affiliation = $_GET['id_affiliation'];
deleteAffiliation($id_affiliation);
deleteAffiliationImage($id_affiliation);
header("Location:/crowxworst/admin/pages/tables/list_affiliation.php");
