<?php
  session_start();
  include_once('../listFungsi.php');

  $id = $_GET['code'];
  $action = $_GET['action'];

  $db = dbConnect();
  $status;
switch ($action) {
	case 'terima':
		$status = "TERIMA";
		break;
	
	case 'tolak':
		$status = "TOLAK";
		break;
}
  $query = "UPDATE appointment SET status = '$status' WHERE ID = $id";
  $statement = $db->query($query);

header('location: ../jasa.php');
?>