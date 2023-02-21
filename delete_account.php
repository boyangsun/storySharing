<?php
    session_start();
    require 'database.php';
    $user = $_SESSION['user_name'];
    $stmt = $mysqli->prepare("DELETE FROM comments where commenter=?");
		if(!$stmt){
			printf("Query Prep Failed: %s\n", $mysqli->error);
			exit;
		}
		$stmt->bind_param('s',$user);
        $stmt->execute();
        $stmt->close();
        
        $stmt = $mysqli->prepare("DELETE FROM news where uploader=?");
		if(!$stmt){
			printf("Query Prep Failed: %s\n", $mysqli->error);
			exit;
		}
		$stmt->bind_param('s',$user);
        $stmt->execute();
        $stmt->close();

        
        $stmt = $mysqli->prepare("DELETE FROM users where username=?");
		if(!$stmt){
			printf("Query Prep Failed: %s\n", $mysqli->error);
			exit;
		}
		$stmt->bind_param('s',$user);
		$stmt->execute();

		

        $stmt->close();
        header("Location:logout.php");


?>