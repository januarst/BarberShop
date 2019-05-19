<?php
  session_start();
  include_once('../listFungsi.php');

	$nama = $_POST['nama'];
	$harga = $_POST['harga'];

$db = dbConnect();
$query = "INSERT INTO jasa(nama_Jasa, harga_Jasa) VALUES ('$nama', $harga)";

$statement = $db->query($query);

header('location: ../services.php');

?>