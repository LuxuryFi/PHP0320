<?php

const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';
const DB_NAME = 'day_22';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME, DB_PORT);

if (!$connection){
    die('Connect Failed'.mysqli_connect_error());
}
else {
    echo "Connected";
}




?>

