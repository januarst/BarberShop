<?php
  session_start();
  include_once('../listFungsi.php');

	$nama = $_POST['nama'];
	$barang = $_POST['barang'];
	$harga = $_POST['harga'];
	$quantity = $_POST['quantity'];

$db = dbConnect();
$query = "INSERT INTO manual(nama, produk, harga, quantity) VALUES ('$nama', '$barang', $harga, $quantity)";

$statement = $db->query($query);

header('location: ../manual.php');

?>