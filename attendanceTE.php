<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bilgi";

$conn = new mysqli($servername, $username, $password, $dbname);

$query2="SELECT * FROM users2";
$result2=mysqli_query($conn, $query2);
$dt=date("Y-m-d");
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
		echo '<a href="notificationsST">Notifications</a>';
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
<form name="attendance" id="yoklama" action="#" method="get">
	h2>Attendance</h2>
	
<table width="800">
<tr>
<th width="250"> ID</th>
<th width="270"> Name </th>
<th width="100"> Tick </th>
<th width="160"> Date </th>
<th width="160"> Geldiği </th>
</tr>
<?php
    while( $row = mysqli_fetch_row($result2))
        
	{
		if($row[2]>10000){
			
		
?>
    <tr>
    <td align="center"><?php echo $row[2]; ?></td>
    <td align="center"><?php echo $row[1]; ?></td>
    <td align="center"> <input name="check_list[]" type="checkbox" value="<?php echo $row[2]; ?>"> </td>
    <td align="center"><?php echo $dt ?></td>
		<?php
			

			$query3="SELECT * FROM attendance WHERE stid=".$row[2]."";
			$result3 = $conn->query($query3);
			$tek=mysqli_num_rows($result3);

			
			?>
	<td align="center"><?php echo $tek; ?></td>
    </tr>
    <?php
    }
	}
	if(isset($_GET['submit'])){//to run PHP script on submit
        if(!empty($_GET['check_list'])){
            // Loop to store and display values of individual checked checkbox.
            foreach($_GET['check_list'] as $selected){
				$connn = new mysqli($servername, $username, $password, $dbname);
   				$sql= "INSERT INTO `attendance` (`stid`, `date`, `tick`) values(".$selected.", CURDATE(), true)";
				if (mysqli_query($connn, $sql)) {
    				echo "Record updated successfully you are redirecting...";
					header( "Refresh:5; url=attendanceTE.php", true, 303);
					} else {
					echo "Error updating record: " . 
						mysqli_error($connn);
					}
				
					mysqli_close($connn);
			}
        }
    }
	
    ?>
</table>
	<br>
<input type="submit" id="submit" name="submit" value="Submit">
</form>
</div>

</body>
</html> 