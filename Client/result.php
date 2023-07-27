<?php $search = $_GET['search_query']; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $search; ?> - Videovilla</title>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
</head>
<body id="top">
	<?php include('includes/header_nav.php'); ?>
	<div class="wrapper col5">
		<div id="container">
			<div id="content">
				<?php 
					include_once('includes/config.php');	
					if(isset($_GET['submit']))
					{
						$search = $_GET['search_query'];
						$query = "select * from videos where videoname like '%" . $search . "%'";
						$query1 = "select a.username,a.userid,b.userid from reg a, videos b where a.userid = b.userid";
						
						//$res = mysqli_query($con,$query1) or die(mysqli_error($con)); 
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						
						echo "<table style='border:none'>";
						if(mysqli_num_rows($result)) {
							while($row = mysqli_fetch_array($result))
							{
								extract($row);
								echo "<tr>";
								echo "<td width='200' style='border:none;'><a href='watch.php?vid=$videoid'><img src='".$imgpath."' alt='".$videoname."' /></a></td>";
								echo "<td style='border:none;'>
									<br><a href='watch.php?vid=$videoid'>'".$videoname."</a>";
								echo "<br>by " . $usernm;
								echo "<br>" . $description;
								echo "</td>";
								echo "</tr>";
							}
						}
						else
						{
							echo "<tr>";
							echo "<td style='border:none;font-size:30px;color:red' align='center'> No Search Result Videos Found... </td>";
							echo "</tr>";
						}
						echo "</table>";	
					}		
				?>
			</div>
		</div>
	</div>
	
	<?php include('includes/footer.php'); ?>
</body>
</html>
