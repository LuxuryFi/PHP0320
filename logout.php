<?php
session_start();

    // if (isset($_SESSION['name']) || isset($_SESSION['password'])) {
    //     $_SESSION['error'] = "Bạn chưa login";
    //     session_destroy();
        
    // }
    unset($_SESSION['name']);
    unset($_SESSION['password']);
    $_SESSION['success'] = 'Logout thành công';
    header('Location: session.php');
    exit();
    
?>