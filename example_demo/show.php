<?php
    session_start();
    echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : "";
?>