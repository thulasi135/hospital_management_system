<?php
function patients()
{
	require 'connect.php';
	$sql = "SELECT * FROM hospital.patient";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) 
    {
		echo "<tr height=30px'>";
		echo "<td>P-".$row['id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td><center><a href='viewpatient.php?id=".$row['id']."'>View</a></center></td>";
		echo "<td><center><a href='editpatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deletepatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
		echo "</tr>";
	}
}

function viewpatient()
{
	$id = $_GET['id'];
	require 'connect.php';
	$sql = "SELECT * FROM hospital.patient WHERE `id`='$id'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query)) 
    {
		$year = date('Y') - $row['birthyear'];
		echo "
		<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>ID</b></td>
				<td>P-".$row['id']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>FIRSTNAME</b></td>
				<td>".$row['fname']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>SURNAME</b></td>
				<td>".$row['sname']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>EMAIL</b></td>
				<td>".$row['email']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>ADDRESS</b></td>
				<td>".$row['address']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>PHONE</b></td>
				<td>".$row['phone']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>GENDER</b></td>
				<td>".$row['sex']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>BLOOD GRUOP</b></td>
				<td>".$row['bloodgroup']."</td>
			</tr>
			<tr style='height:40px;'>
				<td style='width:40%;padding-left:20px;'><b>YEARS</b></td>
				<td>".$year."</td>
			</tr>
		";
		
	}
}


function searchpatients()
{
	require 'connect.php';
	$sachi = $_GET['s'];
	$sql = "SELECT * FROM hospital.patient WHERE `id` LIKE '%$sachi%'";
	$query = mysqli_query($con,$sql);
	while ($row = mysqli_fetch_array($query))
    {
		echo "<tr height=30px'>";
		echo "<td>P-".$row['id']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['sname']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['sex']."</td>";
		echo "<td><center><a href='viewpatient.php?id=".$row['id']."'>View</a></center></td>";
		echo "<td><center><a href='editpatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deletepatient.php?id=".$row['id']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
		echo "</tr>";
	}
}


function addpatient()
{
	global $con;
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$email = trim(htmlspecialchars($_POST['email']));
	$phone = trim(htmlspecialchars($_POST['phone']));
	$address = trim(htmlspecialchars($_POST['address']));
	$gender = trim(htmlspecialchars($_POST['gender']));
	$birthyear = trim(htmlspecialchars($_POST['birthyear']));
	$bloodgroup = trim(htmlspecialchars($_POST['bloodgroup']));

	require_once "connect.php";

	$sql = "INSERT INTO hospital.patient VALUES ('','$fname','$sname','$email','$address','$phone','$gender','$bloodgroup','$birthyear')";
    $sql2 = "INSERT INTO hospital.doctorreport VALUES ('','$fname','$sex','','','','')";
    $query = mysqli_query($con,$sql);
	$query2 = mysqli_query($con,$sql2);
	if (!empty($query)) 
    {
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Added</b><br><br>";
	}
	else
    {
		echo mysqli_error($con);
	}
}

function assigntodoctor()
{	global $con;
	$doctor = trim(htmlspecialchars($_POST['doctor']));

	require_once "connect.php";
 
	$id = $_GET['id'];
	$day = date('d');
		$month = date('m');
		$year = date('Y');
	
	if ($doctor=="WomenDoctor") 
    {
		$price = 500;
		
        $sql = "INSERT INTO hospital.medication VALUES ('','$id','recdoctor','','','','','$doctor','$price','','','$day','$month','$year')";
        $sql2 = "INSERT INTO hospital.doctorreport VALUES ('$id','','','$day','$month','$year','$doctor')";
		$query = mysqli_query($con,$sql);
        $query2 = mysqli_query($con,$sql2);
		if (!empty($query)) 
        {
		    echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
		}
		else{
        		echo mysqli_error($con);
			}
	}
    elseif ($doctor=="NormalDoctor") 
    {
		$price = 500;
		$sql = "INSERT INTO hospital.medication VALUES ('','$id','recdoctor','','','','','$doctor','$price','','','$day','$month','$year')";
        $sql2 = "INSERT INTO hospital.doctorreport VALUES ('$id','','','$day','$month','$year','$doctor')";
		$query = mysqli_query($con,$sql);
		$query2 = mysqli_query($con,$sql2);
		if (!empty($query)) 
        {
           echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
        }
		else{
				echo mysqli_error($con);
			}
	}
	elseif ($doctor=="DentalDoctor") 
    {
		$price = 500;

		$sql = "INSERT INTO hospital.medication VALUES ('','$id','recdoctor','','','','','$doctor','$price','','','$day','$month','$year')";
        $sql2 = "INSERT INTO hospital.doctorreport VALUES ('$id','','','$day','$month','$year','$doctor')";
		$query = mysqli_query($con,$sql);
		$query2 = mysqli_query($con,$sql2);
		if (!empty($query))
        {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Assigned To Doctor</b><br><br>";
		}
		else{
				echo mysqli_error($con);
			}
	}
	
}

function updatepatient()
{
    global $con;    
    require_once "connect.php";
    
	$id = $_GET['id'];
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$email = trim(htmlspecialchars($_POST['email']));
	$phone = trim(htmlspecialchars($_POST['phone']));
	$address = trim(htmlspecialchars($_POST['address']));
	$gender = trim(htmlspecialchars($_POST['gender']));
	$birthyear = trim(htmlspecialchars($_POST['birthyear']));
	$bloodgroup = trim(htmlspecialchars($_POST['bloodgroup']));

	$sql = "UPDATE hospital.patient SET `fname`='$fname',`sname`='$sname',`email`='$email',`address`='$address',`phone`='$phone',`sex`='$gender',`bloodgroup`='$bloodgroup',`birthyear`='$birthyear' WHERE `id`='$id'";
	$sql2 = "UPDATE INTO hospital.doctorreport SET 'fname'='$fname','sex'='$gender' WHERE 'id'='$id'";
	$query = mysqli_query($con,$sql);
    $query2 = mysqli_query($con,$sql2);
	if (!empty($query)) 
    {
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Patient is Succesifully Updated</b><br><br>";
	}
	else
    {
		echo mysqli_error($con);
	}
}

function settings()
{	global $con;
	require_once "connect.php";
	//$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$password2 = trim(htmlspecialchars($_POST['password2']));
	$password = trim(htmlspecialchars($_POST['password']));
	if ($password != $password2) 
    {
		echo "<br><b style='color:red;font-size:14px;font-family:Arial;'>Password Must Match</b>";
	}
	else{
		  $pass = sha1($password);
		  $name = $_SESSION['reception'];
		  $type = $_SESSION['type'];
			
		  $sql = "UPDATE hospital.users SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
		  $query = mysqli_query($con,$sql);
		  if (!empty($query)) 
          {
				echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";
		  }	
		}
	}

?>