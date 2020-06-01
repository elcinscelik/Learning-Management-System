<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bilgi";

$conn = new mysqli($servername, $username, $password, $dbname);
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 

$mail = $_SESSION['mail'];
$query="SELECT `stid` FROM `users2` WHERE `mail`='$mail'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
	$tempstid=$row["stid"];


	if (isset($_POST['section'])){
        $new=$_POST['section']; 
        echo $new;
    }else{
        echo 'no value';
    }

    $sql = "UPDATE `section` SET `sect`='$new' WHERE `stid`='$tempstid'";
 
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully you are redirecting...";
	header( "Refresh:5; url=sectionchangeST.php", true, 303);
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Section</title>
    <link rel="stylesheet" href="cagan/section_change/section_change.css">
    
</head>
<body>
    
</body>
</html>