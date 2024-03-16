<?php
session_start();
require_once("DBconnect.php");

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$repeat_password = $_POST["repeat_password"];

if($password === $repeat_password) {

    $password == $password;
    $sql = "INSERT INTO `user` (`name`, `pass`, `phone`, `email`)
            VALUES 
            ('$name','$password','$phone','$email')
    ";
    mysqli_query($mysqli, $sql);
    header("Location: {$_SERVER['HTTP_REFERER']}");

} else {
        $_SESSION['message'] = 'Passwords do not match!';
        header("Location: {$_SERVER['HTTP_REFERER']}");
}