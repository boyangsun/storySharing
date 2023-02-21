<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
</head>
<body>
<?php
    session_unset();

?>
<form action="login.php" method="POST">
        <label>username:</label>
        <input type="text" name="username" class = 'textfield'><br>
        <label>password:</label>
        <input type="text" name="password" class = 'textfield'><br>
        <input type="submit" value="log in" name="submit">
    
</form>
<form action="signup.php" method="POST">

        <input type="submit" value="sign up" name="submit">
    
</form>

<form action="login.php" method="POST">

        <input type="submit" value="login as guest" name="submitGuest">
    
</form>
<?php

require 'database.php';
if(isset($_POST['submit'])){
    session_start();

	require 'database.php';

	$stmt = $mysqli->prepare("SELECT hashed_password FROM users WHERE username=?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

	$user = $_POST['username'];
	$stmt->bind_param('s', $user);
	$stmt->execute();


	$stmt->bind_result($pwd_hash);
	$stmt->fetch();
	$stmt->close();

	$pwd_guess = $_POST['password'];


	if(password_verify($pwd_guess, $pwd_hash)){
		$_SESSION['user_name'] = $user;
		$_SESSION['isloggedIn'] = true;
		$_SESSION['isloggedInAsGuest'] = false;
		header("Location: main.php");
	} else{
    	echo "can't login!";
	}
}
if(isset($_POST['submitGuest'])){
	session_start();
	$_SESSION['user_name'] = "guest";
	$_SESSION['isloggedIn'] = true;
	$_SESSION['isloggedInAsGuest'] = true;
	header("Location: main.php");
}
?>



</body>
</html>