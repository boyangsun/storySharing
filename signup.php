<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
</head>
<body>
<form action="signup.php" method="POST">
        <label>username:</label>
        <input type="text" name="newName" class = 'textfield'><br>
        <label>password:</label>
        <input type="text" name="newPassword" class = 'textfield'><br>
        <input type="submit" value="signup" name="submit">
    
</form>
<a href= "login.php">back</a>
</body>
</html>

<?php
require 'database.php';

$username = $_POST['newName'];
$password = $_POST['newPassword'];
$hashedpw = password_hash($password, PASSWORD_BCRYPT);

$stmt = $mysqli->prepare("select count(*) from users where username=?");
	if(!$stmt){
		printf("Query Prep Failed: %s\n", $mysqli->error);
		exit;
	}
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $stmt->bind_result($cnt);
    $stmt->fetch();
    $stmt->close();
    
if($cnt === 0){
    $stmt = $mysqli->prepare("insert into users (username, hashed_password) values (?, ?)");
    if(!$stmt){
	    printf("Query Prep Failed: %s\n", $mysqli->error);
	    exit;
    }
    $stmt->bind_param('ss', $username, $hashedpw);

    $stmt->execute();

    $stmt->close();

}else{
    echo "user exists!";
}           







?>