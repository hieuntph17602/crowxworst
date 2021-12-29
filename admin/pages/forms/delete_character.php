<?php 
require_once './../../../db/connection.php';
require_once './../../../db/character.php';
$id_character = $_GET['id_character'];
deleteCharacterImage($id_character);
deleteCharacter($id_character);
header("Location:/crowxworst/admin/pages/tables/list_character.php");
