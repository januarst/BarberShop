<?php

function dbConnect(){
	$database = new mysqli('127.0.0.1', 'root', '', 'proyekpsw');
	return $database;
}

?>