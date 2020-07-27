<?php 

require_once "database.php";

session_start();

$success = "";

if (isset($_SESSION['success'])){
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}


?>


<h3><?=$success?></h3>