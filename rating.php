<?php
session_start();
include "include/DBconnect.php";

if (isset($_SESSION['user'])){
    $index = implode($_SESSION['user']);
    $user_id = $index[0];
} else {
    $user_id = 0;
}
$product_id = $_POST['product_id'];
$rating = $_POST['rating'];
$query = "SELECT COUNT(*) AS countProduct FROM rating WHERE product_id = " . $product_id . " and user_id = " . $user_id;
$result = mysqli_query($mysqli, $query);
$getdata = mysqli_fetch_array($result);
$count = $getdata['countProduct'];
if ($count == 0) {
    $insertquery = "INSERT INTO rating(user_id, product_id, rating) values(" . $user_id . ", " . $product_id . ", " . $rating . ")";
    mysqli_query($mysqli, $insertquery);
} else {
    $updateRating = "UPDATE rating SET rating=" . $rating . " where user_id=" . $user_id . " and product_id=" . $product_id;
    mysqli_query($mysqli, $updateRating);
}
$query = "SELECT ROUND(AVG(rating),1) as numRating FROM rating WHERE product_id=" . $product_id;
$result = mysqli_query($mysqli, $query);
$getAverage = mysqli_fetch_array($result);
$numRating = $getAverage['numRating'];
$return_arr = array("numRating" => $numRating);
echo json_encode($return_arr);