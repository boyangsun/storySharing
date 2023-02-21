<?php
    if (isset($_POST['login as guest'])){
        session_start();
        $_SESSION['isloggedInAsGuest'] = true;
        $_SESSION['isloggedIn'] = true;
        $_SESSION['user_name'] = "guest";
        header("Location: main.php");
    }
?>