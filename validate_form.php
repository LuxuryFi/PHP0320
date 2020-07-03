<!-- THực hành form.php -->
<?php
// Luôn khai báo code xuwrl ý form ở vị trí phía trên HTML form
//Debug thông tin biến chứa dữ liệu trong form

echo "<pre>";
    print_r($_GET);
echo "</pre>";

$error = "";
$result = "";

//Xử lý submit form chỉ khi người dùng đã có hành động submitform sử dụng hàm iset($var) để 
// kiểm tra xem biến đã từng tồn tại hay chưa
// 3- Xử lý validate form, nếu có lỗi thì đẩy vào biến $error
// XỬ lý logic submit form chi khi nào ko có lỗi xảy ra
// Tương đương biến $eror rỗng


if(isset($_GET['submit']) == true){
    $name = $_GET['name'];

    if(empty($name)){
        $error = "Ko được để trống";
    } else if (strlen($name) <6){
        $error = "Name length must atleast 6 character";
    }
    else {

    }

    if (empty($error)){
        $result = "Tên của bạn là: $name";
    }
}


?>

<!-- Đổ lại dữ liệu user đã nhập ra form



-->

<h3 style="color: green">
    <?=$result ?>
</h3>
<h3 style="color: red">
    <?=$error?>
</h3>

<h2>
    Thực hành 2 trong slide
</h2>

<form action="" method="get">
    Nhập tên của bạn: <br><br>  
    <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : "" ?>" >
    <br><br>
    <input type="submit" name="submit" value="Show thông tin">
    <br>
</form>