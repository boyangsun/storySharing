<?php
    require 'database.php';
    session_start();
    if (isset($_POST['add'])){
        $name = $_SESSION['user_name'];
        $title = $_POST['title'];
        $link = $_POST['link'];
        $content = $_POST['story']; 

        $stmt = $mysqli->prepare("insert into news (title, uploader, link, story) values (?, ?, ?, ?)");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        
        $stmt->bind_param('ssss', $title, $name, $link,$content );

        $stmt->execute();

        $stmt->close();
        header("Location: main.php");


    }


?>