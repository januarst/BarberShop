<?php
    session_start();
    include_once("backend/listFungsi.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $database = dbConnect();
    $query = 'SELECT * FROM user WHERE username=? AND password=?';
    $statement = $database->prepare($query);
    $statement->bind_param('ss', $username, $password);
    $statement->execute();
    $result_set = $statement->get_result();
    
    while($row = $result_set->fetch_assoc()){
        $id = $row['ID'];
        $peran = $row['peran'];
    }

    if ($result_set->num_rows) {
        $_SESSION['is_logged_in'] = TRUE;
        $_SESSION['username'] = $username;
        $_SESSION['userId'] = $id;
        if($peran == '1'){
            header('location: backend/index.php');
        }else{
            header('location: frontend/index.php');
        }
    } else { 
        header('location: login.html');
    }
    
?>