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
	<a><?php
$mail = $_SESSION['mail'];
$query="SELECT `name` FROM `users2` WHERE `mail`='$mail'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
	$tempname=$row["name"];
		echo $tempname;
	?>
	</a>
	
	<a><?php
$mail = $_SESSION['mail'];
$query="SELECT `stid` FROM `users2` WHERE `mail`='$mail'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
	$tempstid=$row["stid"];
		echo $tempstid;
	?></a>
	
	<a><?php echo "$mail"; ?>  </a>
	
	<a href="index.php">Log-out</a>
</div>	
	
<div class="main">
  <h2>Grades</h2>
	
	<form action="" method="post">
        <table width="1063" height="274" border="1" cellpadding="6" cellspacing="6">
            <tr>
                <td width="200">Student ID</td>
                <td width="300"><input type="text" name="stid" style=" width:700px; height:25px "/></td>
            </tr>
            <tr>
                <td>GRADE1</td>
                <td><input type="text" name="grade1" cols="30" rows="5" style=" width:700px; height:25px "></textarea></td>
</tr>
<tr>
    <td>GRADE2</td>
    <td><input type="text" name="grade2" cols="50" rows="5" style=" width:700px; height:25px " ></textarea></td>
</tr>
<tr>
<td>GRADE3</td>
    <td><input type="text" name="grade3" cols="30" rows="5" style=" width:700px; height:25px "></textarea></td>
</tr>

<tr>
                <td></td>
                <td><input type="submit" name="add" value="Update Grade" /></td>
            </tr>
			
			<tr>
                <td></td>
                <td><input type="submit" name="addd" value="Enter Grade" /></td>
            </tr>

  </table>
  </form>
	
	
	
	<?php
    if(array_key_exists('add', $_POST)){
         $stid=$_POST["stid"];
         $grade1    =    $_POST["grade1"];
          $grade2    =    $_POST["grade2"];
          $grade3    =    $_POST["grade3"];
         
         if(isset($_POST['add']))
         {
         $x=$_POST['grade1'];
         $y=$_POST['grade2'];
        $z=$_POST['grade3'];
         //calculating and writing average of grades
             $sum=($grade1+$grade2+$grade3)/3;

         }
       $sql = "UPDATE `grades` SET grade1='$grade1', grade2='$grade2', grade3='$grade3' WHERE `stid`='$stid'";
        //reading students' grades
        $sql1 = "SELECT  * FROM grades";
             echo "<table border='1' width='200px' style='position:fixed; left:220px; top:600px; width:150px; height:200px; z-index:7'>";
                echo "<tr>";
                echo "<th>Student ID</th>";
                echo "<th>grade1</th>";
                echo "<th>grade2</th>";
                echo "<th>grade3</th>";
		        echo "<th>average</th>";
        
                echo "</tr>";
         if ($result = mysqli_query($conn, $sql1)){
            
             while ($row =mysqli_fetch_array($result)){
                // echo ($row[0]."  ".$row[1]."  ".$row[2]."  ".$row[3]."<br>");
                 $posts1 = $row[4];
                 $posts2 = $row[1];
                 $posts3 = $row[2];
                 $posts4 = $row[3];
				 $posts5 = ($posts2+$posts3+$posts4)/3;
             echo "<tr>";
                    echo "<td>$posts1</td>";
                    echo "<td>$posts2</td>";
                    echo "<td>$posts3</td>";
                    echo "<td>$posts4</td>";
				    echo "<td>$posts5</td>";
                 //echo " <td><form method='post'><input type='submit' onClick=". $buttonid=$posts1 ." name='button1' class='button' value= 'Sil' ></form></td></tr>";
                 
                       echo "</tr>";
             }
         mysqli_free_result($result);
         }
        
        $ekle        =    mysqli_query($conn, $sql);
        
         mysqli_close($conn);
             
          
             
             echo "</table>";
        
        
     
	 
	 
	 }
	 
	 if(array_key_exists('addd', $_POST)){
         $stid=$_POST["stid"];
         $grade1    =    $_POST["grade1"];
          $grade2    =    $_POST["grade2"];
          $grade3    =    $_POST["grade3"];
         
         if(isset($_POST['addd']))
         {
         $x=$_POST['grade1'];
         $y=$_POST['grade2'];
         $z=$_POST['grade3'];
         //calculating and writing average of grades
             $sum=($grade1+$grade2+$grade3)/3;

         }
       $sql3 = "INSERT INTO grades (stid,grade1,grade2,grade3) VALUES ('$stid','$grade1','$grade2','$grade3')";
        //reading students' grades
        $sql1 = "SELECT  * FROM grades";
                echo "<table border='1' width='200px'>";
                echo "<tr>";
                echo "<th>Student ID</th>";
                echo "<th>grade1</th>";
                echo "<th>grade2</th>";
                echo "<th>grade3</th>";
		        echo "<th>average</th>";
        
                echo "</tr>";
         if ($result = mysqli_query($conn, $sql1)){
            
             while ($row =mysqli_fetch_array($result)){
                // echo ($row[0]."  ".$row[1]."  ".$row[2]."  ".$row[3]."<br>");
                 $posts1 = $row[4];
                 $posts2 = $row[1];
                 $posts3 = $row[2];
                 $posts4 = $row[3];
				 $posts5 = ($posts2+$posts3+$posts4)/3;
             echo "<tr>";
                    echo "<td>$posts1</td>";
                    echo "<td>$posts2</td>";
                    echo "<td>$posts3</td>";
                    echo "<td>$posts4</td>";
				    echo "<td>$posts5</td>";
                 //echo " <td><form method='post'><input type='submit' onClick=". $buttonid=$posts1 ." name='button1' class='button' value= 'Sil' ></form></td></tr>";
                 
                       echo "</tr>";
             }
         mysqli_free_result($result);
         }
        
        $ekle        =    mysqli_query($conn, $sql3);
        
         mysqli_close($conn);
             
          
             
             echo "</table>";
        
        
     
	 
	 
	 }
	
	?>
	
</div>

</body>
</html> 

