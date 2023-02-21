<?php
    require "database.php";
	session_start();
	if (isset($_POST['delete'])){
        $id = $_POST['id'];
        //have to delete the comments first in order to delete the news
        $stmt = $mysqli->prepare("DELETE FROM comments where news_id=?");
		if(!$stmt){
			printf("Query Prep Failed: %s\n", $mysqli->error);
			exit;
		}
		$stmt->bind_param('s',$id);
		$stmt->execute();

		$stmt = $mysqli->prepare("DELETE FROM news where news_id=?");
		if(!$stmt){
			printf("Query Prep Failed: %s\n", $mysqli->error);
			exit;
		}
		$stmt->bind_param('s',$id);
		$stmt->execute();
		

		$stmt->close();
		header("Location:main.php");
	}
?>