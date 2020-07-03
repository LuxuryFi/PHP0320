<?php 
    echo "<pre>";
        print_r($_POST);
    echo "</pre>";

    if (isset($_POST['submit'])){
        $error = "";
        $result = "";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $time = $_POST['time'];
        $class = $_POST['class_detail'];

        //Với radio và checkbox sẽ trường hợp susre ko tích chọn thì khi 
        //submit form sẽ ko tồn tại các key tương ứng với radio và checkbox
        if (isset($_POST['gender'])){
            $gender = $_POST['gender'];
        }
        if (isset($_POST['jobs'])){
            $jobs = $_POST['jobs'];
        }
        
        $country = $_POST['country'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "Email chưa đúng dịnh dạng";
        }
        else if (empty($time)){
            $error = "Time ko đc để trống";
        }
        else if (empty($gender)){
            $error = "pHải chọn gender";
        }
        else if (empty($jobs)){
            $error = "Phải chọn ít nhất 1 job";
        }


        // Xử lý logic submit form khi ko có lỗi nào

        if(empty($error)){
            //Hiển thị thông tin user đã nhập
            $result .= "Name: $name <br>";
            $result .= "Email: $email <br>";
            $result .= "Time: $time <br>";
            $result .= "Class detail: $class <br>";
            // Với các input checkbox, select do đang để value là số nên   
            
            if(!empty($gender)){
                switch ($gender){
                    case 0: $result .= "Gender là: Female <br>";
                    break;
                    case 1: $result .= "Gender là: Male <br>";
                    break;
                }
            }   

            if(!empty($jobs)){
                foreach ($jobs as $value){
                    switch ($value){
                        case 0: 
                            $result .= "Jobs: Developer <br>";
                            break;
                        case 1: 
                            $result .= "Jobs: Tester <br>";
                            break;  
                        case 2:
                            $result .= "Jobs: PM <br>";
                            break;   
                    }
                }
            }

            // Xử lý select 
            switch ($country) {
                case 0: 
                    $result .= "Country: Vietnam";
                    break;
                case 1: 
                    $result .= "Country: Japan";
                    break;  
                case 2:
                    $result .= "Country: USA";
                    break;   
            }



        }


    }


?>
<h3 style="color: green">
    <?=$result ?>
</h3>
<h3 style="color: red">
    <?=$error?>
</h3>3>



<form action="" method="post">
    Name:
    <input type="text" name="name" value=""><br>
    Email:
    <input type="text" name="email" value=""><br>
    Specific Time
    <input type="date" name="time" value=""><br>
    Class details:
    <textarea name="class_detail" id="" cols="20" rows="10"></textarea><br>

    Gender:
    <input type="radio" name="gender" value="0">Nam
    <input type="radio" name="gender" value="1">Nữ
    <br>

    Job:
    <input type="checkbox" name="jobs[]" value="0">Dev
    <input type="checkbox" name="jobs[]" value="1">Test
    <input type="checkbox" name="jobs[]" value="2">PM
    <br>

    Country:
    <select name="country" id="">
        <option value="0">Việt Nam</option>
        <option value="1">USA</option>
        <option value="2">Japan</option>
        <option value="3">China</option>
    </select>
    <br>

    <input type="submit" name="submit" value="Show Info">
    <input type="reset" name="reset" value="Reset">
</form>