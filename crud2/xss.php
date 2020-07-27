<?php
    if (isset($_GET['submit'])){
        $name = $_GET['name'];
        $name = htmlspecialchars($name);
        echo "Tên của bạn: $name";
    }

    // nhap the mo dong

    // <script>alert(document.cookie);</script> 

    // loi bao mật xss
    // trước khi hiện thị ra giá trị của biến cần lọc biến đó bằng cahcs chuyển các ký tư jdacwj biệt
    // thành ý tự an toàn, sử dụng hàm htmlspecialchars
?>


<form action="" method="get">
    Nhập tên:
    <input type="text" name="name" value="<?php isset($_GET['name']) ? $_GET['name'] : ""; ?>">
    <br>
    <input type="submit" name="submit" value="Hiển thị">
</form>