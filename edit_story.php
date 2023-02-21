<?php
    require "database.php";
	session_start();
	if (isset($_POST['edit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $link = $_POST['link'];
        $content = $_POST['content'];
        echo"
            <div>
                <form action='update_story.php' method='POST'>
                        <label>link</label>   
                        <input type='text' name='link' value='".$link."'><br>
                        <label>title</label>
                        <input type='text' name='title' value='".$title."'><br>
                        <label>content</label>
                        <textarea  name = 'content' rows='8' cols='50'>".$content."</textarea>
                        <input type='hidden' name='id' value='".$id."'>
                        <input type='submit' name='fix' value='edit'>
                </form>
            </div>
        ";
 
	}
?>