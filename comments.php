<?php
    require 'database.php';
    session_start();
    $news_id = $_POST['id'];
    $news_title = $_POST['title'];
    $news_content = $_POST['content'];
    $sql = "SELECT * FROM comments where news_id = '" .$news_id. "'";
    $result = $mysqli ->  query($sql);
    echo $news_title."<br>";
    echo $news_content;
    while ($row = $result -> fetch_row()) {
        echo "<h4>".$row[2]. ": ".$row[3]."</h4>";
        if($_SESSION['user_name'] === $row[2]){
            echo "
        <div>
        <form action='delete_comment.php' method='POST'>
            <input type='submit' value='delete' name='delete_comment'>
            <input type='hidden' name='comid' value='".$row[0]."'>

        
        </form>
        <form action='edit_comment.php' method='POST'>
            <input type='submit' value='edit' name='edit_comment'>
            <input type='hidden' name='comid' value='".$row[0]."'>
            <input type='hidden' name='content' value='".$row[3]."'>
        
        </form>
        </div>";
        }
    }
    $result -> free_result();
    $mysqli -> close();


    
    if(!$_SESSION['isloggedInAsGuest']){
        echo "
        <div>
        <form action='add_comment.php' method='POST'>
            <textarea  name = 'textarea' rows='8' cols='50'></textarea>
            <input type='submit' value='submit' name='submit'>
            <input type='hidden' name='newid' value='".$news_id."'>
        
        </form>
        </div>";
        
        

    }


?>