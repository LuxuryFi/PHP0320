<?php
    //file naof treen hee thong
// Batws buoojc phair khowir taoj sesssion 
session_start();
//trong trường hợp user đã login thành công
// mà cố tính truy cập lại form login

if (isset($_SESSION['name']) && isset($_SESSION['password'])) {
    $_SESSION['success'] = 'Bạn đã đăng nhập rồi';
    header("Location: test_session.php");
    exit();
}

//Xóa sesion chính là xóa phần tử theo key tương ứng
// sử dụng hàm unset



//muốn xóa tât cá session hệ thông,s sử dụng hàm sesion destroy tuy nhiên hàm này chỉ khi chyaj code lần thứ 2
// nên thong thường vấn sử udungj hàm unset để xóa sesion tương ứng
// demo chức năng đăng nhập đơn giản sử dụng sesion

$error = "";

$result = "";
if (isset($_COOKIE['username']) || isset($_COOKIE['password']) ) {
        $remember_username = $_COOKIE['username'];
        $remember_password = $_COOKIE['password'];

        // $_SESSION['name'] = $_COOKIE['username'];
        // // header("")
    } 

if (isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    

    
    
    // isset($_COOKIE['password']) ? $remember_username = $_COOKIE['password'];

    if(!filter_var($username,FILTER_VALIDATE_EMAIL)){
        $error = "Cần nhập đúng định dạng username";
    }
    else if (empty($password)){
        $error = "Password không được để trống";
    }

    if (empty($error)){
        $password_length = strlen($password);
        if ($password_length >= 3){
            $_SESSION['name'] = $username;
            $_SESSION['password'] = $password;
            if(isset($_POST['remember'])){
                setcookie('username',$username, time() + 111120 );
                setcookie('password',$password, time() + 111120 );       
            }
            header("Location: test_session.php");
            exit();


        } else {
            $error = "Sai tài khoản hoặc mật khẩu";
        }
        
        
        
    }


}




?>

<?php 
if (isset($_SESSION['error'])){ ?>

    <h1 style="color:red"><?=$_SESSION['error']?></h1>

<?php } ?>


<?php 
if (isset($_SESSION['success'])){ ?>

    <h1 style="color:green"><?=$_SESSION['success']?></h1>

<?php unset($_SESSION['success']); } ?>

<form action="" method="post" border="1px">
    Username <input type="text" name="username" value="<?=$remember_username?>">
    <br>
    Password: <input type="password" name="password" value="<?=$remember_password?>">
    <br>
    <input type="submit" name="submit" value="Login">
    <br>
    <h1><?=$error?></h1> <br>
    <input type="checkbox" name="remember" value="1"> Ghi nhớ đăng nhập <br>
    <a href="logout.php">Log out</a>
</form>