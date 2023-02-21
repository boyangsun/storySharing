<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My news Site</title>
</head>
<body>
    <?php

        session_start();

        $current_user = $_SESSION['user_name'];
        echo "Hello, ".$current_user."!";

        require 'database.php';

        // $stmt = $mysqli->prepare("select * from news");
        // if(!$stmt){
        //     printf("Query Prep Failed: %s\n", $mysqli->error);
        //     exit;
        // }
        // $stmt->execute();
        // $stmt->bind_result($result);
        // $stmt->fetch();
        // $stmt->close();

        $sql = "SELECT * FROM news";
        $result = $mysqli ->  query($sql);
        while ($row = $result -> fetch_row()) {
            //printf ("%s (%s)\n", $row[0], $row[1]);
            echo "
            <br>
            <div>
                <h1>title: ".$row[1]. "</h1> 
                <h2>author: ".$row[2]. "</h2>
                <p>".$row[4]. "</p>
                <h4>link: ".$row[3]. "</h4>
                <form action='comments.php' method='post'>
						<input type='submit' name='view_comments' value='view comments'>
                        <input type='hidden' name='id' value='".$row[0]."'>
                        <input type='hidden' name='title' value='".$row[1]."'>
                        <input type='hidden' name='content' value='".$row[4]."'>
				</form>
            </div>
            <br>
            ";
            if($row[2] === $current_user){
                echo"
                <form action='delete_story.php' method='post'>
							<input type='submit' name='delete' value='delete'>
							<input type='hidden' name='id' value='".$row[0]."'>
                </form>
                <form action='edit_story.php' method='post'>
							<input type='submit' name='edit' value='edit'>
                            <input type='hidden' name='id' value='".$row[0]."'>
                            <input type='hidden' name='title' value='".$row[1]."'>
                            <input type='hidden' name='link' value='".$row[3]."'>
                            <input type='hidden' name='content' value='".$row[4]."'>
				</form>
                ";
            }
        }

        if($_SESSION['isloggedIn'] && !$_SESSION['isloggedInAsGuest']){
            echo"
                <form action='add_story.php' method='post'>	
                    <label>title:<label>
                    <input type='text' name='title'><br>
                    <label>link:<label>
                    <input type='text' name='link'><br>
                    <label>story:<label>
                    <textarea  name = 'story' rows='8' cols='50'></textarea>
                    <input type='submit' name='add' value='add'><br>
                    
                </form>
                
                <form action='change_pw.php' method='POST'>
                    <input type='submit' value='change password' name='pw'>
    
                </form>

                <form action='delete_account.php' method='POST'>
                    <input type='submit' value='delete account' name='delete_account'>
    
                    </form>

                ";
        }
        
        

    ?>
    <form action="logout.php" method="POST">
        <input type="submit" value="log out" name="submit">
    
    </form>
    
    
</body>
</html>