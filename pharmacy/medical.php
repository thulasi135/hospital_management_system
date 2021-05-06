<?php 
session_start();
if (empty($_SESSION['pharmacy']) OR empty($_SESSION['type'])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pharmacy - Doctor Dashboard - HMS</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
	<div class="wrapper">
	<?php
		include "includes/header1.php";
		include "includes/left.php";
	 ?>
		<div class="right"><br>
			<a href="addmedicine.php" style="margin-left:300px;"><button class="btnlink">Add Medicine</button></a><form action="searchmedicine.php" method="get" style="float:right;margin-right:15px;"><input type="text" style="height:25px; width:180px;padding-left:15px;" name="s" placeholder="Search Medicine By Name"></form><br><br><br><br><br><br>
			<table class="table">
				<tr>
					<th>Madicine Name</th>
					<th>Price</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php 
				require '../includes/pharmacy.php';
				medicine();
				 ?>
			</table>
		</div>
		<?php 
		include "includes/footer.php";
		 ?>
	</div>
</body>
</html>