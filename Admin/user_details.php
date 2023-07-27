<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../styles/layout.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Details</title>
</head>
<body id="top">
<?php include('include/header_nav.php'); ?>

<div class="wrapper col5">
	<div id="container">
		<div id="content">
			<?php
				include_once('include/config.php');
				
				$query = "select userid,username,email from reg";
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				echo "<table border=1>";
				echo "<tr style='border:1px solid gray;'>";
				echo "<th>User Id</th>";
				echo "<th>username</th>";
				echo "<th>Email-ID</th>";
				echo "<th>Video Details</th>";
				echo "</tr>";
				if(mysqli_num_rows($result)) {
					while($row = mysqli_fetch_array($result))
					{
						extract($row);
						echo "<tr>";
						echo "<td>".$userid."</td>";
						echo "<td>".$username."</td>";
						echo "<td>".$email."</td>";
						echo "<td><a href='video_details.php?uid=$userid'>Click Here</a>";
						echo "</tr>";
					}
				}
				else
				{
					echo "<tr><td style='border:none'></td></tr>";
					echo "<tr>";
					echo "<td colspan='4' style='border:none;font-size:30px;color:red' align='center'> No Records Found... </td>";
					echo "</tr>";
					echo "<tr><td style='border:none'></td></tr>";
				}
				echo "</table>";
			?>
		</div>
	</div>
</div>

<?php include('include/footer.php'); ?>
</body>
</html>
