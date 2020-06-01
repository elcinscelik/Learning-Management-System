<?php
session_start();
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "bilgi";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
 if(!empty($_POST)) {
	$conn = OpenCon();
	$mail = $_POST['mail'];
	$password = $_POST['pass'];
	$sql = "SELECT * FROM users2 WHERE mail = '$mail' and pass = '$password'";
	$result = $conn->query($sql);


	if ($result->num_rows > 0)  {

    $_SESSION["mail"] = $_POST['mail'] ;
    echo "Session variables are set.";
		header('location: giris.php');
	}
	else {
		$error = "Invalid Username or Password Please Try Again";
		echo $error;
		header( "refresh:3;url=index.php" );
	}
	
	}
	
   ?>