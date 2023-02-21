<?php
    require "database.php";
	session_start();
	if (isset($_POST['pw'])){
        $user = $_SESSION['user_name'];
        echo"
            <div>
                <form action='reset_pw.php' method='POST'>
                        <label>new password:</label>   
                        <input type='text' name='pwd'><br>
                        <input type='submit' name='reset' value='reset'>
                </form>
            </div>
        ";
 
	}
?>