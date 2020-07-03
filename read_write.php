
<?php

// ĐỌc nội dung file trong file test.txt có 2 kiểu độc
//1 Đọc nội dung theo từng dòng sử dụng hàm file($file_path)

$rows = file('test.txt');

echo '<pre>';
print_r($rows);
echo '</pre>';

foreach ($rows as $row){
    echo "$row <br>";
}

//ĐỌc toàn bộ nội dung file, dùng ham file_get_contents($file_path);
//Hàm này sẽ dùng thay thế cho các hàm fopen, fwrite fread

$file_content = file_get_contents('test.txt');

// Lấy nội dung file cuar1 domain thật, tùy thuộc vào cơ chế của domain đó cho phép 


echo $file_content;

// $blogtruyen = file_get_contents('https://vnexpress.net/tin-tuc-24h');
// echo $blogtruyen;



//2 - Ghi file
// Sử dụng hàm file_put_contents($file_path, $content, $mode);


file_put_contents('test.txt', 'Nội dung mới <br>', FILE_APPEND);

echo file_get_contents('test.txt');

//3 - Một số hàm có sẵn khác về thao tác với file

// Xóa file; unlink('test.txt');

// unlink('test.txt');

//- Kiểm tra đường dẫn file thư mục có tồn tại hay ko
//; file_exist($path);

$is_exist = file_exists('test.txt');
var_dump($is_exist);

//fopen , $read, $write, $close 
// để mở file, độc file, ghi file, đóng file

?>