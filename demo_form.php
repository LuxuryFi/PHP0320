<?php 
    echo "<pre>";
        print_r($_SERVER);
    echo "</pre>";

?>

<form action="demo_form.php" method="post">
    Name: <input type="text" name="name"><br>
    Password:
    <input type="password" name="password"><br>
    Age:
    <input type="text" name="age"><br>
    Gender:
    <input type="radio" name="gender" value="0"> Nữ
    <input type="radio" name="gender" value="1"> Nam
    <!-- Với các input mà cho phép chọn nhiều giá trị tại 1 thời điển như checkbox, select -->
    Chọn Job:
    <input type="checkbox" name="job[]" value="0"> Developer
    <input type="checkbox" name="job[]" value="1"> Tester
    <input type="checkbox" name="job[]" value="2"> PM
    <br>
    Chọn quốc gia:
    <select name="country" id="">
        <option value="0">VN</option>
        <option value="1">USA</option>

    </select>
    <br>
    Chọn nhiều quốc gia:
    <select name="multi_country[]" multiple id="">
        <option value="0">VN</option>
        <option value="1">USA</option>

    </select><br>
    <input type="file" multiple name="multi_avatar[]"><br>
    Note:
    <textarea name="" id="" cols="20" rows="3"></textarea><br>
    <input type="submit">


</form>