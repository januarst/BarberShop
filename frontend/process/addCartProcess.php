<?php
  session_start();
  include_once('../../backend/listFungsi.php');

$database = dbConnect();
$id = $_GET['code'];
$user = $_SESSION['userId'];
$query = "SELECT * FROM produk WHERE ID=". $id;
$statement = $database->query($query);

$row = $statement->fetch_assoc();
$harga = $row['harga_Produk'];
$diskon = $row['diskon'];
$quantity = $_POST['quantity'];

$harga *= $quantity;

$query2 = "INSERT INTO cart(User_ID, Produk_ID, Harga, Quantity, Diskon) VALUES ($user, $id, $harga, $quantity, $diskon)";
$result_set = $database->query($query2);

header('location: ../shop.php');

?>