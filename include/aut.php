<?php
session_start();
require_once("DBconnect.php");

$email = $_POST['email'];
$password = $_POST['password'];

$check_user = mysqli_query($mysqli, "SELECT * FROM `user` 
                            WHERE `email` = '$email' AND `pass` = '$password'");

if(mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id" => $user["id"],
        "email"=> $user["email"],
        "name"=> $user["name"],
        "rights" => $user["rights"]
    ];
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Wrong password!';
    header("Location: {$_SERVER['HTTP_REFERER']}");
}