<?php
  session_start();
  include_once('../listFungsi.php');

	$code = $_POST['code'];
	$harga = "BELUM";

$db = dbConnect();
$query = "INSERT INTO kupon(cupon_code, status, User_ID) VALUES ('$code', '$harga', 1)";

$statement = $db->query($query);

header('location: ../kupon.php');

?>