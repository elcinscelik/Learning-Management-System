<?php
session_start();

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "bilgi";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 $dt=date("Y-m-d");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 

	$notif = $_POST["text"];

    $sql = "INSERT INTO `notif` (text, date) VALUES ('$notif', '$dt')";
 
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully you are redirecting...";
	header( "Refresh:5; url=notificationsTE.php", true, 303);
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
