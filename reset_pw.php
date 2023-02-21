<?php
    require "database.php";
    session_start();
    if (isset($_POST['reset'])){ 
        $user = $_SESSION['user_name'];
        $password = $_POST['pwd'];
        $hashedpw = password_hash($password, PASSWORD_BCRYPT);
          

        $stmt = $mysqli->prepare("update users set hashed_password = ? where username = ?");
 
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        $stmt->bind_param('ss',$hashedpw, $user);

        $stmt->execute();

        $stmt->close();
         header("Location:logout.php");
    }


?>