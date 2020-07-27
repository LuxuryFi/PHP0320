<?php
session_start();
require_once 'database.php';
    if (!isset($_GET['cate_id'])||!is_numeric($_GET['cate_id'])){
        $_SESSION['error'] = 'id không hợp lệ';
        header('location: index.php');
        exit();
    }
    $error = '';
    $result = '';
    $id = $_GET['cate_id'];
    $sql_select_one = "select * from categories where cate_id = '$id'";
    $result_one = mysqli_query($connection,$sql_select_one);
    // lấy ra mảng dữ liệu thật từ dối tượng trung gian
    $category = mysqli_fetch_assoc($result_one);
// check kĩ hơn nếu nếu không tồn tại danh mục thì báo message
if (empty($category)){
    echo "không có dữ liệu tương ứng với bản ghi có id = '$id'";
    return;
}
if (isset($_POST['submit'])){
// gán các biến trung gian để thao tác cho dễ
$name  = $_POST['name'];
$descriptions = $_POST['descriptions'];
$avatar_arr = $_FILES['avatar'];
// sử lý validate:
// name và descriptions không được để trống
// filr upload phải có dạng ảnh và dung lượng không quá 2mb
if (empty($name)||empty($descriptions)){
    $error = 'name hoặc descriptions không được để trống';
}
// chỉ sử lý file upload nếu file được tải lên, dựa vào thuộc tính error ở mảng $_FILES
elseif ($avatar_arr['error'] == 0){
    // validate file upload phải có dạng ảnh:
    // lấy ra đuôi file để check
    $extension = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    $extension_allow = ['jpg', 'jpeg', 'png', 'gif'];
    // lấy ra dung lượng của file upload
    $avatar_size = $avatar_arr['size'] / 1024 / 1024;
    // giữ lại 2 số thập phân sau dấu ,
    $avatar_size = round($avatar_size, 2);
    if (!in_array($extension,$extension_allow)){
        $error = 'cần upload file ảnh';
    }
    elseif ($avatar_size > 2){
        $error = 'file không được vượt quá 2mb';
    }
}
    if (empty($error)) {
        $avatar = $category['avatar'];
        // sử lý form nếu có hành động upload
        if ($avatar_arr['error'] == 0) {
            // tạo thư mục chứa file sẽ upload lên
            $dir_upload = 'uploads';
            // tạo thư mục chỉ khi thư mục đó chưa tồn tại
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // trước khi tạo ra đuôi file mang tính duy nhất thì cần xóa ảnh cũ đi để tránh rác hệ thống
            @unlink("uploads/$avatar");
            // tạo ra tên file mang tính duy nhất để tránh trường hợp bị đè file khi user upload cùng 1 file lên
            // hệ thống nhiều lần
            $avatar = time() . '-' . $avatar_arr['name'];
            // upload file từ thư mục tạm vào trong thư mục upload đã tạo
            move_uploaded_file($avatar_arr['tmp_name'], $dir_upload . '/' . $avatar);
            // xử lý lưu dữ liệu vào bảng categories
            $sql_update = "UPDATE categories set cate_name = '$name', description = '$descriptions', avatar = '$avatar' where cate_id = '$id'";
            $is_update = mysqli_query($connection,$sql_update);
            var_dump($is_update);
            if ($is_update){
                $_SESSION['success'] = 'update thành công';
                header('location: index.php');
                exit();
            }
            else{
                $error = 'update thất bại';
            }
        }
    }
}
//echo "<pre>";
//print_r($category);
//echo "</pre>";
?>
<h3 style="color: red"> <?php echo $error?></h3>
<form action="" method="post" enctype="multipart/form-data">
    <h3>Sửa</h3>
    Name: <input type="text" name="name" value="<?php echo $category['cate_name']?>">
    <br>
    Descriptions: <textarea name="descriptions"  cols="15"><?php echo $category['description']?></textarea>
    <br>
    Avatar: <input type="file" name="avatar">
    <img src="uploads/<?php echo $category['avatar']?>" alt="" height="80">
    <br>
    <input type="submit" name="submit" value="Save">
    <a href="index.php">Cancel</a>
</form>