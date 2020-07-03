<?php

// Mảng
/*
    1 - Định nghĩa
    Mảng là 1 cấu trúc dữ liệu có thể lưu trữ 1 hoặc nhiều hơn 1 giá trị 1
    thời điểm khác với các kiểu dữ liệu nguyên thủy
    chỉ có thể lưu trữ 1 giá trị taij 1 thời điểm

    Để xem cấu trúc mảng thường dùng các hàm của PHP sau
    var đump
    echo "<pre>";
    print_r();
    echo "</pre>";

    Ví dụ về 1 số trường hợp cần dùng mảng để lưu trữ:
    công ty bạn có 100 thành viên, yêu cầu lưu trữ ten của 100 thành viên đó

    
*/




// Khai báo mảng từ khóa array
$arr1 = array(1,2,3,4);
echo "<pre>";
print_r($arr1);
echo "</pre>";



//Key của mảng
/*
    Là giá trị dùng để xác định phần tử của mảng
    key mặc định của 1 mảng sẽ bắ đầu từ 0
    
    Vòng lặp foreach
    demo sử dụng vòng lặp for để hiên jcacs giá trị trong mảng
   
*/
 $arr = [1,2,'hahaha','Nguyen'];

 $count = count($arr);

for ($i = 0; $i < $count; $i++){
     echo $arr[$i]. " ";
}

$arr1 = [1,'a', 'b', 'c', 'd', 'e', 'f'];
echo $arr[4];

foreach($arr1 AS $key => $value){
    echo "Key: " .$key . " Value: ". $value. "<br>";
}

foreach($arr AS $value){
    echo "Value: ".$value."<br>";
}

//Phân loại mảng
// Mảng tuần tự - Mảng số nguyên Key của mảng chỉ ở dạng chỉ số
//

$arr1 = [1,2,3,4];
$arr4 = [
    4 => 'b',
    2 => 'c',
    1 => 1
];
$arr4[1] = 100;

echo "<pre>";
print_r($arr4   );
echo "</pre>";

foreach($arr4 as $key => $value){
    echo "Key: $key có value = $value <br>";
}

$arr5 = [
    4 => 'a',
    'name'  => 'Manh',
    'age' => 30,
    'is_bool' => true
];


foreach($arr5 as $key => $value){
    echo "Key: $key có value = $value <br>";
}

//chỉ nên tạo ra 1 mảng đa chiều koong quá 3 chiều


//trong mảng đa chiều thì key có thể ở dạng chuỗi hoặc số
// để trong độ phức tập khi thao tác gvoiws mảng, ta 


$arr6 = [
    'name' => 'Manh',
    'age' => 30,
    'address' => [
        'thon' => 'Thôn Đồng',
        'xa' => 'Sơn Đồng',
        'huyen' => 'Hoài Đức'
    ]
    ];

echo $arr6['address']['huyen']."<br>";

foreach ($arr6 AS $key => $value){
    echo "Key: $key, có giá trị tương ứng: ";
    print_r($value);
}
echo "<br>";
$arr7 = [
    'name' => 'Mạnh',
    'class' => [
        'name' => 'Manh',
        'country' => [
            'Đức',
            'Anh',
            'Nhật'
        ]
    ]
];


echo $arr7['class']['country'][2];
foreach($arr7 as $k => $v){
    echo "<pre>";
    print_r($k);
    print_r($v);
    echo "/<pre>";
}

$arr8 = [1,2,3,4,5,6,7];


$arr9 = [12,50,60,90,12,25,60];

$tich = 1;
$tong = 0;

foreach($arr9 as $value){
    $tich *= $value;
    $tong += $value;
}


echo $tich;
echo "<br>";
echo $tong;

echo "<br>";

$arrs = ['do', 'xanh','cam', 'trang'];


$red = $arrs[0];
$blue = $arrs[1];
$orange = $arrs[2];
$white = $arrs[3];

$arrs1 = ['PHP','HTML','CSS','JS'];



?>

<table border="1" cellpadding="8">
    <tr>
        <td>ID</td>
        <td>Giá trị</td>
    </tr>
    <?php foreach($arr8 as $key => $value) : ?>
        <tr>
            <td> <?=$key?></td>
            <td><?=$value?></td>
        </tr>
    <?php endforeach; ?>


</table>


<!-- Thực hành 3  -->

<table border="1" cellpadding="20">
    <tr>
        <td>ID</td>
    </tr>
    <?php foreach($arrs1 as $value) : ?>
        <tr>
            <td> <?=$value?></td>
        </tr>
    <?php endforeach; ?>


</table>

<?php 
    //CÁC HÀM CUNG CẤP SẴN THAO TÁC VỚI MẢNG
    //Tính tổng các phần từ trong mảng

    $arr11 = [1,2,32,32,32,32,3];
 echo   array_sum($arr11);

 echo count($arr11);
 print_r(array_flip($arr11));


 
$arr12 = [
    'name' => 'Mạnh',
    3 => 'abc',
    'age' => 30
];

echo array_key_exists('name', $arr12);

//Hàm gộp mảng: array_merge
$arr14 = [1,23,213,123,12,3];
$arr15 = [2,312,3,32,2,32,3];

$arr_merge = array_merge($arr14,$arr15);
echo "<pre>";
print_r($arr_merge  );
echo "</pre>";
//Kiểm tra gía trị có tồn tại hay không, nếu có thì sẽ trả vè vị trí xuất hiện hay con gọi là trả về key
// Ngược lại trả về false

$arr18 = ['a','b','c'];


echo array_search('c',$arr18);

//hàm loại bỏ các giá trị trungfl ặp
$arr19 = [1,2,3,3,4,5,6,6,7,7,8,8,8,1,1];

print_r(array_unique($arr19));

//Hàm tạo 1 mảng mới với các phần tử có giá trị chính bangwfcacs giá trị của mảng ban đầu

$arr20 = array_values($arr19);
print_r(array_unique($arr20));


$add = array_push($arr20, 1,2,3,2,3,2,3,2);
print_r(array_unique($arr20));


$str = 'Hello, this is a beer';
$arr22 = explode(' ',$str);
print_r($arr22);


date_default_timezone_set('Asia/Ho_Chi_Minh');
 


?>