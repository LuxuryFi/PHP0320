<?php
    session_start();
    require_once "database.php";
    if(!isset($_GET['cate_id']) || !is_numeric($_GET['cate_id'])){
       $_SESSION['error'] = 'ID is invalid'; 
       header("Location: index.php");
       exit();
    }

$id = $_GET['cate_id'];



$sql_delete = "DELETE from categories WHERE cate_id = $id";
$is_delete = mysqli_query($connection,$sql_delete);
if ($is_delete){
    $_SESSION['success'] = "Delete successful";
    header("Location: index.php");
    exit();
}
else {
    $_SESSION['error'] = "Delete failed";
    header("Location: index.php");
    exit();
}

?>