<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bilgi";

$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html>
	<title> Learning Management System </title>
<head>
<link rel="stylesheet" type="text/css" href="maincss.css">
</head>
<body>

<div class="sidenav">
<br>
	<a href="giris.php"><img src="img/logobeyaz.png" width="170"></a>
<br>
<?php	
	$mail = $_SESSION['mail'];
	if ($mail=='metehan.incegul@bilgi.edu.tr'){
		echo '<a href="notificationsTE.php">Notifications</a>';
		echo '<a href="syllabusTE.php">Syllabus</a>';
		echo '<a href="gradesTE.php">Grades</a>';
		echo '<a href="sectionchangeTE.php">Section Change</a>';
		echo '<a href="contentsTE.php">Contents</a>';
		echo '<a href="attendanceTE.php">Attendance</a>';
	}
	
	else {
		echo '<a href="notificationsST.php">Notifications</a>';
		echo '<a href="syllabusST.php">Syllabus</a>';
		echo '<a href="gradesST.php">Grades</a>';
		echo '<a href="sectionchangeST.php">Section Change</a>';
		echo '<a href="contentsST.php">Contents</a>';
		echo '<a href="attendanceST.php">Attendance</a>';
	
	}
	
	echo '<a href="support.php">Support</a>';
?>
</div>

<div class="topnav">
	<a href="profile.php"><?php
$mail = $_SESSION['mail'];
$query="SELECT `name` FROM `users2` WHERE `mail`='$mail'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
	$tempname=$row["name"];
		echo $tempname;
	?>
	</a>
	
	<a href="profile.php"><?php
$mail = $_SESSION['mail'];
$query="SELECT `stid` FROM `users2` WHERE `mail`='$mail'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
	$tempstid=$row["stid"];
		echo $tempstid;
	?></a>
	
	<a href="profile.php"><?php echo "$mail"; ?>  </a>
	
	<a href="index.php">Log-out</a>
</div>		
	
<div class="main">
<h2>Contents</h2>
<?php
$handle = opendir('contents');

if($handle){
	while(($entry = readdir($handle)) !== false) {
		if($entry != '.' && $entry != '..'){
			echo "<a href=\"contents/$entry\">$entry<br></a>";
		}
	}
		closedir($handle);
		
}
?>
	
	</div>

</body>
</html> 
