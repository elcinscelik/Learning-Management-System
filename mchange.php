<?php
session_start();

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "bilgi";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 

	$mail = $_SESSION['mail'];

	$new = $_POST["new"];

    $sql = "UPDATE `users2` SET `mail`='$new' WHERE `mail`='$mail'";
 
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully you are redirecting...";
	header( "Refresh:5; url=profile.php", true, 303);
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Password Changing</title>
</head>

<body>
</body>
</html>