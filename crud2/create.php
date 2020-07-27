<?php
    session_start();
    require_once "database.php";
    
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $avatar_name = $_FILES['avatar']['name'];
    $avatar_type = $_FILES['avatar']['type'];
    $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
    $avatar_error = $_FILES['avatar']['error'];
    $avatar_size = $_FILES['avatar']['size'];
    

    if (empty($name) || empty($description)){
        $error = "Must enter name and description";
    } 
    else if ($avatar_error == 0){

    }


    if (!$avatar_error){
        $extension = pathinfo($avatar_name, PATHINFO_EXTENSION);  
        $extension = strtolower($extension);  
        $extension_allowed = ['jpg','gif','jpeg','png'];
        $file_size_mb = $avatar_size / 1024 / 1024;
        $file_size_mb = round($file_size_mb, 2);

        if (!in_array($extension, $extension_allowed)){
            $error = "Must enter required format";
        } 
        else if ($file_size_mb > 2){
            $error = "Upload files must lower than 2mb";
        }
    }

    if (empty($error)){
        $avatar = '';
        if($avatar_error == 0){
                $dir_uploads = __DIR__.'/uploads';
                //We have to create new folder if it's not exist;
                if (!file_exists($dir_uploads)){
                    mkdir($dir_uploads);
                }
                $avatar = time().'-'.$avatar_name;
                $avatar_path = $dir_uploads.'/'.$avatar;
                $extension = 'uploads'.'/'.$avatar;
                move_uploaded_file($avatar_tmp_name,$avatar_path);
        }
        
        $sql_insert = "INSERT INTO categories (cate_name,`description`,avatar) VALUES('$name','$description','$extension');";
        $is_insert = mysqli_query($connection,$sql_insert);

        if($is_insert ){
            $_SESSION['success'] = 'Inserted';
            header("Location: index.php");
            exit();
        }

    }
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    
    Name: 
    <input type="text" name="name" value=""> <br>
    Description:
    <textarea name="description" id="" cols="20" rows="10"></textarea><br>
    Upload avatar:
    <input type="file" name="avatar" ><br>

    <input type="submit" name="submit" value="Add">
    <a href="index.php">Cancel</a>


</form>