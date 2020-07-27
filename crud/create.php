<?php

require_once "database.php";
session_start();

$error = "";
$result = "";

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $status = $_POST['status'];

    if (empty($name) || empty($status)){
        $error = "Name or Status cannot null";
    }
    else if(!is_numeric($status)){
        $error = "Status must be a number";
    }
 

    if (empty($error)){
        $sql_insert = "INSERT INTO categories (cate_name, cate_status) VALUES ('$name', $status)";
        $run = mysqli_query($connection,$sql_insert);

        if ($run){ 
            $_SESSION['success'] = "Added";
            header("Location: index.php");
            exit();
        }

    }
    
    //6 - Handle submit logic form by required


}


?>


<form action="" method="post">
    <h3>Add Category</h3>
    Name: <input type="text" name="name" value=""><br>
    Status: <input type="text" name="status" value=""><br>
    <input type="submit" name="submit" value="Add"><br>

</form>