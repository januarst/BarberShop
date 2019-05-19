<?php
  session_start();
  include_once('../../backend/listFungsi.php');

  $message = $_POST['message'];
  $status = "PENDING";
  $ID = $_SESSION['userId'];
  echo $ID, $message, $status;
  $db = dbConnect();
  $query = "INSERT INTO appointment(message,status,User_ID) VALUES('$message','$status',$ID)";
  $statement = $db->query($query);

  header('location: ../index.php');

?>