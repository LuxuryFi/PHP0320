<?php
    $error = "";
    $result = "";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if(isset($_POST['submit'])){
        $number = $_POST['number'];

        if(empty($number)){
            $error = "Must enter number";
        }
        else if (!is_numeric($number)) {
            $error = "Need enter a number"; 
        }

        //Xử lý form submit theo đề bài, chỉ xử lý khi ko có lỗi xảy ra
        function isPrime($number){
            if ($number < 2){
                return FALSE;
            }
            $is_prime = TRUE;
            for ($i = 2; $i <= sqrt($number); $i++){
                if ($number % $i == 0){
                    $is_prime = FALSE;
                    break;
                }
            }
            
            return $is_prime;
        }


        if (empty($error)){
            $result = "Các số nguyên tố nhỏ hơn $number là: ";
            for ($i = 0; $i <$number; $i++){
                if (isPrime($i)){
                    $result .= " $i ";
                }
            }
        }
    }
?>



<form action="" method="POST">
    Nhập số cần kiểm tra
    <input type="text" name="number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : ''?> ">
    </br>
    <input type="submit" name="submit" value="Kiểm tra">
</form>

<h2><?php echo $result ?></h2>
<h2><?php echo $error ?></h2>