<?php
    require "database.php";
	session_start();
	if (isset($_POST['delete_comment'])){
        $id = $_POST['comid'];
        //have to delete the comments first in order to delete the news
        $stmt = $mysqli->prepare("DELETE FROM comments where comments_id=?");
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