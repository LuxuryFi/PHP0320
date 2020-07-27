<?php
    //crud/sql_injection_demo.php
    require_once "database.php";
    // Khái niệm về lỗi bảo mật sQL Injection
    // Đây là các lỗi bảo mật liên quan đến các thao tác truy vấn CSDL
    // LỖi bảo mật này thường đc thực hiện qua form của bạn.
    if (isset($_GET['submit'])){
        $name = $_GET['name'];
    //mysqli_real_escape_string
        $name = mysqli_real_escape_string($connection,$name);
        $sql_select_all = "SELECT * from categories WHERE cate_name LIKE '%$name%'";
        $result_all = mysqli_query($connection,$sql_select_all);

        $categories = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
    }
    echo "<pre>";
    print_r($categories);
    echo "</pre>";
    // 123456' OR cate_name != '
    // 123456' OR cate_name != '' ; DROP TABLE Test;#
    var_dump($sql_select_all);


?>

<form action="" method="GET">
    Nhập tên danh mục
    <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : "" ?>"><br>
    <input type="submit" name="submit">
</form>