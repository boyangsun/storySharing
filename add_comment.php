<?php
    if(isset($_POST['submit'])){
        session_start();
        require 'database.php';
        $commenter = $_SESSION['user_name'];
        $id = $_POST['newid'];
        $comment = $_POST['textarea'];
     
        $stmt = $mysqli->prepare("insert into comments (news_id, commenter, comment) values (?, ?, ?)");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        
        $stmt->bind_param('sss', $id, $commenter, $comment);

        $stmt->execute();

        $stmt->close();
        header("Location: main.php");
    }
?>