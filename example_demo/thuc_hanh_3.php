<?php
    session_start();
    $error = "";
    $result = "";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];

    }

    if (empty($error)){
        $_SESSION['fullname'] = $fullname;
        header("Location: show.php");
        exit();
    }
?>




<form action="" method="POST">
    <h2>Form đăng ký thông tin</h2>
    Họ tên: 
    <input type="text" name="fullname" value=""><br>
    Giới tính:
    <input type="radio" name="gender" value="0"> Nữ
    <input type="radio" name="gender" value="0"> Nam
    <br>
    Nghề nghiệp:
    <input type="checkbox" name="jobs[]" value="0"> Developer
    <input type="checkbox" name="jobs[]" value="1"> Test
    <input type="checkbox" name="jobs[]" value="2"> Business Analyst
    Quốc gia: 
    <select name="" id="">
        <option value="0">Việt Nam</option>
        <option value="1">USA</option>
        <option value="2">Japan</option>
        <option value="3">China</option>
    </select>
    <br>
    <input type="submit" name="submit" value="Đăng ký">
</form>