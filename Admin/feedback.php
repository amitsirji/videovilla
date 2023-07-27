<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../styles/layout.css" type="text/css" rel="stylesheet"  />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Feedback</title>
</head>
<body id="top">
<?php include('include/header_nav.php'); ?>
<div class="wrapper col5">
	<div id="container">
		<div id="content">
			<?php
			
				include_once('include/config.php');
			
				$query = "select * from feedback";
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
				echo "<table border=1>";
				echo "<tr>";
				echo "<th>Feedback Id</th>";
				echo "<th>Name</th>";
				echo "<th>Email-ID</th>";
				echo "<th>Subject</th>";
				echo "<th>Message</th>";
				echo "<th>Action</th>";
				echo "</tr>";
				if(mysqli_num_rows($result)) {
					while($row = mysqli_fetch_array($result))
					{
						extract($row);
						echo "<tr>";
						echo "<td>".$f_id."</td>";
						echo "<td>".$name."</td>";
						echo "<td>".$emailid."</td>";
						echo "<td>".$sub."</td>";
						echo "<td>".$message."</td>";
						echo "<td><a href='feedback.php?action=delete & fid=$f_id'>Delete</a>";
						echo "</tr>";
					}
				}
				else
				{
					echo "<tr><td style='border:none'></td></tr>";
					echo "<tr>";
					echo "<td colspan='6' style='border:none;font-size:30px;color:red' align='center'> No Records Found... </td>";
					echo "</tr>";
					echo "<tr><td style='border:none'></td></tr>";
				}
				echo "</table>";
				if(isset($_REQUEST['action'])=="delete")
				{
					mysqli_query($con,"delete from feedback where f_id=".$_REQUEST['fid']."") or die(mysqli_error($con));
					 header('location:feedback.php');
				}
			?>	
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>
