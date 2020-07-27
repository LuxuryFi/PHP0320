<!-- demo_upload_file.php -->

<?
/* 
Xử lý upload file trong form
Khi rong form của bạn có input file thì bắt buộc form đó phải có các tính chất sau:
    - Phương thức của form bắt buộc là POST
    - PHẢI thêm thuộc tính sau cho form, enctype, giá trị tương ứng của thuộc tính enctype-multipart/form-data

$_FILES

Mô tả về biến $_FILES" là mảng 2 chiều

$_FILES[name][thuoctinh];

name: tên file đc upload
- type: kiểu dữ liệu của file
- tmp_name: đường dẫn tam mà server đã upload tạm cho bạn
- size: kích thước file upload, tính bằng đơn vị byte;
- erorr: trạng thái lỗi khi upload, có các giá trị cụ thể sau
0: ko có lỗi khi upload
1: file upload vượt quá dung lượng cho phép trong file cấu hình

//Chỉ cần quan tâm đến giá trị 0 thôi




*/

echo "<pre>";
    print_r($_FILES);
echo "</pre>";

$error = '';
$result = '';

if(isset($_POST['submit'])){

    $avatar_name = $_FILES['avatar']['name'];
    $avatar_type = $_FILES['avatar']['type'];
    $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
    $avatar_error = $_FILES['avatar']['error'];
    $avatar_size = $_FILES['avatar']['size'];
    // Xử lý file upload lên
/*
    - phải có dạng ảnh: png, jpg, jpeg , gif
    - file upload dung lượng ko được vượt quá 2mb
*/
    if ($avatar_error == 0){
        $extension= pathinfo($avatar_name, PATHINFO_EXTENSION);
        $extension_allowed = ['png', 'jpg', 'jpeg', 'git'];
    // Chuyển đuôi file tìm được thành hcuwx thông
        $extension = strtolower($extension);
        $avatar_size_mb = round($avatar_size / 1024 / 1024, 2);
        if(!in_array($extension , $extension_allowed)){
            $error = "Phải upload file ảnh";
        }
        else if ($avatar_size_mb > 2){
            $error = "Dung lượng file ko được vượt quá 2mb";
        }

    }

    if(empty($error)){
        // Xử lý upload file lên hệ thống
        // chỉ upload lên khi user có hành động upload lên
        if($avatar_error == 0){
            //Tạo 1 thử mục chưa các file ảnh sẽ upload lên
            // với tên là uploads
            // với file code hiện tại
            // tạo thư mục sử dụng code thì cần phải sử dụng đường dẫn tuyệt tới thư mục đó
            $dir_uploads = __DIR__.'/uploads';
            // tạo thư mục cần kiểm tra nếu thư mục upload chưa tồn tại thì mới tạo
            if (!file_exists($dir_uploads)){
                mkdir($dir_uploads);
            }
            // Tạo tên file mang tính duy nhất để tránh trường hợp user upload nhiều file trùng tên => Mất file
            $avatar_name = time() . '-' . $avatar_name;
            //upload file vào thư mục upload đã tạo
            $is_upload = move_uploaded_file($avatar_tmp_name,$dir_uploads.'/'.$avatar_name);
            
            if($is_upload){
                $result .= "Tên file ảnh: $avatar_name <br>";
                $result .= "<img src='uploads/$avatar_name' height='400'>";
                $result .= "<br> Định dạng file: $extension <br>";
                $result .= "Đường dẫn vật lý: $dir_uploads/$avatar_name <br>";
                $result .= "Kích thước file Mb: $avatar_size_mb ";
            }
        }
    }
    
    


}


?>




<form action="" method="post" enctype="multipart/form-data">
    Upload avatar <br> 
    <input type="file" name="avatar" id="avatar" onchange="readURL(this);"><br>
    <input type="submit" name="submit" value="Upload"><br>
</form>

<br>
<div>
    <img src="#" alt="" id="image">
</div>

<h2 id="result"><?= $error?></h2><br>
<h2 ><?= $result?></h2>

<script>
    var img_src = document.getElementById("image");
    var input_image = document.getElementById("avatar");

    function readURL(input){
        var reader = new FileReader();

        reader.onload = function (e) {
            img_src.src = e.target.result;
            img_src.width = 400;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>   



