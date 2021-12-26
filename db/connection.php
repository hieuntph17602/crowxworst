<?php 
function getConnection()
{
    $dbHost = ("mysql:host=localhost; dbname=crow");
    $dbUser = "root";
    $dbPass = "";
    $conn = new PDO($dbHost, $dbUser, $dbPass);
    
    return $conn; 
}