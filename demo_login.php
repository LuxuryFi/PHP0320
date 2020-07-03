<!-- Demo login_form.php -->
<?php
    echo "<pre>";
        print_r($_POST);
    echo "/<pre>";

    $error = "";
    $result = "";

    //Nếu có hành động submit form thì mới xử lý

    if(isset($_POST['submit'])){
        // Tạo biến và gán giá trị
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (empty($username) || empty($password)){
            $result = "Không được để trống các trường";
        }
        // Sử dụng hàm filter var để check kiểu dữ liệu
        else if (!filter_var($username, FILTER_VALIDATE_EMAIL)){
            $error = "Username phải có định dạng email";
        }
        else if (strlen($password) < 6){
            $error = "Pasword phải có độ dài tối thiểu 6 ký tự";
        }

        // Xử lý logic submit form khi ko có lỗi xảy ra


        if (empty($error)){
            // Xử lý đăng nhập
            if ($username == 'nguyenvietmanh@gmail.com' && $password == "123456789"){
                $result = "Đăng nhập thành công";
            }
            else {
                $error = "Sai tài khoản hoặc mật khẩu";
            }
        }
    }
?>
<h3 style="color: red"> 
    <?=$error?>
</h3>   
<h3 style="color: green"> 
    <?=$result?>
</h3>
<form action="" method="POST">
    Username:
    <input type="text" name="username" value=""><br>
    Password: 
    <input type="password" name="password" value=""><br>
    <input type="submit" value="Đăng nhập" name="submit"><br>




</form>