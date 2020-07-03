<!--  Demo_upload_form.php  -->


<?php 
    $error = '';
    $result = '';

    echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
    echo "</pre>";
    if(isset($_POST['submit'])){
        // tạo các biến trung gian
        $name = $_POST['name'];
        $age = $_POST['age'];
        // Với radio và checkbox sẽ có tròng hợp ko tích vào radio hoặc check box nào mà submit
        // nên cần check isset nếu tồn tài thì mới gán được biến

        if (isset($_POST['gender'])){
            $gender = $_POST['gender'];
        }

        if (isset($_POST['jobs'])){
            $jobs = $_POST['jobs'];
        }

        $avatar = $_FILES['avatar'];

        //Check validate


        if (!empty($name) ||   !empty($gender) || !empty($jobs) || !empty($avatar)){
            $error = "Không được để trống name";
        }
        else if (!empty($age) || is_numeric($age)){
            $error = "Phải nhập tuổi ở dạng số <br>";
        }
        else if (!isset($_POST['gender'])){
            $error = "Cần chọn gender <br>";
        }
        else if (!isset($_POST['jobs'])){
            $error = "Cần chọn it nhất 1 job <br>";
        }
        //validate file upload phải là ảnh
        else if ($avatar['error'] == 0 ){
            $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $extension_allow = ['png','jpg ','jpge','gif',];
            if (!in_array($extension, $extension_allow)){
                $error .= 'Phải upload file ảnh <br> ';
            }
        }
        echo "<b>$error</b>";

        // Xử lý logic submit chỉ khi ko có lỗi
        if (empty($error)){
            //Nếu biến rộng thì hiển thị các thông tin user đã chọn trên form
            
        }
    }
?>


<form action="" method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="name">
    <br><br>
    Age: <input type="text" name="age" >
    <br><br>
    Gender: <input type="radio" name="gender" value="0"> Nam 
    <input type="radio" name="gender" value="0"> Nữ 
    <br><br>
    Jobs: <input type="checkbox" name="jobs[]" value="0"> Coder
    <input type="checkbox" name="jobs[]" value="1"> Tester 
    <br><br>
    Avatar:
    <input type="file" name="avatar">
    <br><br>
    <input type="submit" name="submit" value="Show Info">
</form>

<h1 id="error"> </h1>
<h1 id="result"> </h1>


<script>


</script>