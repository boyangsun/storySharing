<?php
    require "database.php";
    session_start();
    if (isset($_POST['update_comment'])){ 
        $id = $_POST['id'];
        $content = $_POST['new_comment'];   

        $stmt = $mysqli->prepare("update comments set comment=? where comments_id=?");
 
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        $stmt->bind_param('ss', $content, $id);

        $stmt->execute();

        $stmt->close();
         header("Location:main.php");
    }


?>