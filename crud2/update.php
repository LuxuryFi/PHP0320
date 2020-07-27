<?php
    //Dựa vào cấu trúc URL , thì sẽ dùng mảng $_GET để lấy giá trị id đẻ biết thêm đc đang cập nhật trên bản ghi nào
    //Trc khi lấy giá trị của id cần xử lý validate cho id này vì các thám số
    // trên url user đều có thể sửa đc.
    session_start();
    require_once "database.php";
    if (!isset($_GET['cate_id']) || !is_numeric($_GET['cate_id'])){
        $_SESSION['error'] = "ID is invalid";
        header("Location: index.php");
        exit();
    } 
    else {
        $id = $_GET['cate_id'];
    }
    

    $sql_select_one = "SELECT * FROM categories WHERE cate_id = $id";
    $result_one = mysqli_query($connection,$sql_select_one);
    $category = mysqli_fetch_assoc($result_one);

    if (empty($category)){
        echo "There are not any record with id = $id";
        return;
    }
    

    $cate_name = $category['cate_name'];
    

    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        $avatar = $_FILES['avatar'];
        

        if (empty($name) || empty($description)){
            $error = "Must enter name and description";
        } 
        
        if (!$avatar['error']){
            $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);  
            $extension = strtolower($extension);  
            $extension_allowed = ['jpg','gif','jpeg','png'];
            $file_size_mb = $avatar['size'] / 1024 / 1024;
            $file_size_mb = round($file_size_mb, 2);
    
            if (!in_array($extension, $extension_allowed)){
                $error = "Must enter required format";
            } 
            else if ($file_size_mb > 2){
                $error = "Upload files must lower than 2mb";
            }
        }
    
        if (empty($error)){
            $avatar = $category['avatar'];

            if($avatar['error'] == 0){
                    $dir_uploads = __DIR__.'/uploads';
                    //We have to create new folder if it's not exist;
                    if (!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                         
                    $avatar = time().'-'.$_FILES['avatar']['name'];
                    $avatar_path = $dir_uploads.'/'.$avatar;
                    $extension = 'uploads'.'/'.$avatar;
                    move_uploaded_file($_FILES['avatar']['tmp_name'],$avatar_path);
            }
            

            $sql_update = "UPDATE categories SET cate_name = '$cate_name', `description` = '$description', avatar = '$avatar'
            WHERE cate_id = $id";
            $is_update = mysqli_query($connection,$sql_update);
    
            if($is_update ){
                $_SESSION['success'] = 'Uploaded';
                header("Location: index.php");
                exit();
            } 
            else {
                header("Location: index.php");
            }
    
        }
    }


?>



<form action="" method="POST" enctype="multipart/form-data">
    
    Name: 
    <input type="text" name="name" value="<?=$category['cate_name']?>"> <br>
    Description:
    <textarea name="description" id="" cols="20" rows="10" value=""><?=$category['description']?></textarea><br>
    Avatar <br>
    <img style="width: 200px;" src="<?=$category['avatar']?>" alt="">
    <br>
    Upload avatar:
    <input type="file" name="avatar" >
    <br>

    <input type="submit" name="submit" value="Add">
    <a href="index.php">Cancel</a>
</form>