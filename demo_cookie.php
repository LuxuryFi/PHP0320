<?php

//demo cookie
// Cookie được dùng để lưu các giá trị riêng của các trang web 
// dể phục vụ cho 1 múc đích gì đấy
// Cookie được lưu trên trình duyệt của user, khác với session
// Hoàn toàn tcos thẻ xem được trình duyệt đang lưu các cookie gì
// Cookie sẽ ko mất di khi close trình duyệt như sesion chỉ mất đi 
//dựa vào thời gian sống có thẻ set thời gian trong cookie


//PHP đã sinh tạo ra sẵn 1 biến $_COOKIE để lưu tất cả các thông tin
// về cookie trên hệ thống

//CÁc chứ năng hay dùng với cookie: ghi nhớ password đăng nhập, bookmark


//2- Thao tác với cookie

// KHởi tạo cookie và sử dụng setcookie chứ ko thêm kiểu như session
// THời gian sống của cookie đc set nhu sau: lấy thời gian hiện tại cộng với thời gian sống muốn set time() + số giây;

echo '<pre>';
print_r($_COOKIE);
echo '</pre>';

setcookie('name','Nguyen Quoc Anh', time() + 60 );
setcookie('age','Nguyen Quoc Anh', time() + 5 );

// + láy giá trị của cookie, giống hệt thao tác với mảng
echo $_COOKIE['name'];
echo "<br>";
echo isset($_COOKIE['age']) ? $_COOKIE['age'] : '';

echo '<pre>';
print_r($_COOKIE);
echo '</pre>';

//Cách xem cookie đang được lưu trên trình duyệt
// application -

setcookie('name','Nguyen Quoc Anh', time() - 4 );

// Sử giống nhau cảu session và cookie
//
// Khác nhau
// đều dung để lưu thông tinSesion hoạt động trên server
// Cookie hoạt động trên trình duyệt nên sesion sẽ bảo mật hơn cookie 
// Sesion mất đi khi close trình duyệt còn cookie thì ko
// 