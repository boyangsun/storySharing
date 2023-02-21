<?php
    require "database.php";
	session_start();
	if (isset($_POST['edit_comment'])){
        $id = $_POST['comid'];
        $content = $_POST['content'];
        echo"
            <div>
                <form action='update_comment.php' method='POST'>
                        <label>comments: </label>
                        <textarea  name = 'new_comment' rows='8' cols='50'>".$content."</textarea>
                        <input type='hidden' name='id' value='".$id."'>
                        <input type='submit' name='update_comment' value='update'>
                </form>
            </div>
        ";
 
	}
?>