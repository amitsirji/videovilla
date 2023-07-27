
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Details</title>
<link href="../styles/layout.css" type="text/css" rel="stylesheet" />
</head>
<body id="top">
	<?php 
		include('includes/header_nav.php');
	?> 
	<div class="wrapper col5">
		<div id="container">
			<div id="content">
				<?php
					include_once('includes/config.php');
					$query = "select * from reg where userid like '" . $_SESSION['userid'] . "'";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					while($row = mysqli_fetch_array($result))
					{
						extract($row);
						echo "<table>";
						
						echo "<tr>";
						echo "<td style='border:none;'><b>Name :</td>";
						echo "<td style='border:none;'><b>" . $fname ." ". $lname . "</td>";
						echo "</tr>";
						
						echo "<tr>";
						echo "<td style='border:none;'><b>E-mail ID :</td>";
						echo "<td style='border:none;'><b>" . $email . "</td>";
						echo "</tr>";
						
						/*echo "<tr>";
						echo "<td style='border:none;'><b>Gender :</td>";
						echo "<td style='border:none;'><b>" . $gender . "</td>";
						echo "</tr>";
						
						echo "<tr>";
						echo "<td style='border:none;'><b>Birthdate :</td>";
						echo "<td style='border:none;'><b>" . $birthday . "</td>";
						echo "</tr>";*/
						
						echo "<tr>";
						echo "<td style='border:none;'><b>Username :</td>";
						echo "<td style='border:none;'><b>" . $username . "</td>";
						echo "</tr>";
						
						echo "<tr>";
						echo "<td style='border:none;'><b>Password :</td>";
						echo "<td style='border:none;'><b><a href='chng_pwd.php'>Change Password...</a></td>";
						echo "</tr>";
						echo "</table>";
					} 
				?>
				<hr>
				<center><a href='deactivate.php'><b><font size='3'>Deactivate Account</font></b></a></center>
				<hr>
			</div>
		</div>
	</div>
	
	<?php include('includes/footer.php');?>
</body>
</html>
