<?php
    $error = "";
    $result = "";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (isset($_POST['submit'])){
        $number = $_POST['number'];
        if (empty($number)){
            $error = "Must enter a number";
        }
        else if (!is_numeric($number)){
            $error = "Must enter a number";
        }
        if (empty($error)){
            if($number <50 && $number > 0){
                $result = (50 * 1000) + ($number - 50) * 2000;
            }
        }
    }
    
?>
<h2><?php echo $result?></h2>
<h2><?php echo $error?></h2>

<form action="" method="GET">
    Nhập số điện tiêu thụ
    <input type="text" name="number" value="">
    <table border="1" cellspacing="" cellpadding="8">
        <tr>
            <th colspan="2">Bảng giá theo bậc thang</th>
        </tr>
        <tr>
            <td>0 - 50KW</td>
            <td>
                <b>1000đ/KW</b>
            </td>
        </tr>
        <tr>
            <td>50-100KW</td>
            <td>
                <b>2000đ/KW</b>
                <br>
                Từ 0-50KW giá là 1000đ/KW
            </td>

        </tr>
        <input type="submit" name="submit" value="Tính tiền điện">
    </table>


</form>