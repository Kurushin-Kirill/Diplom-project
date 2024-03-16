<?php
session_start();
require_once("DBconnect.php");

$id = $_GET['id'];

if(isset($_POST['add'])) {
  if(!isset($_SESSION['shoppingcart'])) {
    $_SESSION['shoppingcart'] = [];
  }

  $quantity = $_POST['quantity'];

  $item = [
    "id"       => $id,
    "quantity" => $quantity
  ];

  array_push($_SESSION['shoppingcart'], $item);

  header("Location: ../cart.php");
} else {
  header("Location: ../index.php");
}