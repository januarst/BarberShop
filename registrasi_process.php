 <?php 
    session_start();
    include_once("backend/listFungsi.php");

 $name = $_POST['nama']; 
 $username = $_POST['new_username']; 
 $email = $_POST['new_email']; 
 $password = $_POST['new_password']; 

 $database = dbConnect ();
 $query = 'INSERT INTO user(`username`, `password`)VALUES(?, ?)'; 

 $statement = $database->prepare($query); 
 $statement->bind_param('ss', $username, $password); 
 $statement->execute();

 $query3 = "SELECT * FROM user WHERE username ='$username'";
 $statement1 = $database->query($query3);
 $row = $statement1->fetch_assoc();
 
 $query2 = 'INSERT INTO userdetail(`Nama`, `Email`, `User_ID`)VALUES(?, ?, ?)'; 

 $statement2 = $database->prepare($query2); 
 $statement2->bind_param('ssi', $name, $email, $row['ID']); 
 $statement2->execute();

 header('location: login.html');
?>