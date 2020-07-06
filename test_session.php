<?php 
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['password'])) {
    $_SESSION['error'] = "Bạn chưa login";
    header("Location: session.php");
    exit();
}


$name = $_SESSION['name'];
$password = $_SESSION['password'];
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>

<h1>Đăng nhập thành công</h1>
<h1><?=$name?></h1>
<h1><?=$password?></h1>
<a href="logout.php">Log out</a>

<?php 
if (isset($_SESSION['success'])){ ?>

    <h1 style="color:green"><?=$_SESSION['success']?></h1>

<?php } ?>