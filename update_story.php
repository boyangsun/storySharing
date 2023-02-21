<?php
    require "database.php";
    session_start();
    if (isset($_POST['fix'])){ 
        $id = $_POST['id'];
        $title = $_POST['title'];
        $link = $_POST['link'];
        $content = $_POST['content'];   

        $stmt = $mysqli->prepare("update news set title=?, link=?, story=? where news_id=?");
 
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        $stmt->bind_param('ssss', $title, $link, $content, $id);

        $stmt->execute();

        $stmt->close();
         header("Location:main.php");
    }


?>