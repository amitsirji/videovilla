<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Video Details</title>
</head>
<body id="top">
<?php include('includes/header_nav.php'); ?>
	<div class="wrapper col5">
		<div id="container">
			<div id="content">
				<?php
					include_once('includes/config.php');
					$userid = $_SESSION['userid'];
					$query = "select * from videos where userid='$userid'";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					echo "<table style='border:1px solid #CCCCCC'>";
					echo "<tr>";
					echo "<th style='border:1px solid #CCCCCC'>video ID</th>";
					echo "<th style='border:1px solid #CCCCCC'>Video Name</th>";
					echo "<th style='border:1px solid #CCCCCC'>Size</th>";
					echo "<th style='border:1px solid #CCCCCC'>Action</th>";
					echo "</tr>";
					if(mysqli_num_rows($result)) {
						while($row = mysqli_fetch_array($result))
						{
							extract($row);
							echo "<tr>";
							echo "<td>" . $videoid . "</td>";
							echo "<td>" . $videoname . "</td>";
							echo "<td>" . $size . "</td>";
							echo "<td><a href='user_video.php?action=delete&vid=$videoid'>delete</a></td>";
							echo "</tr>";
						}
					}
					else
					{
						echo "<tr><td style='border:none'></td></tr>";
						echo "<tr>";
						echo "<td colspan='6' style='border:none;font-size:30px;color:red' align='center'> No Video Records Found... </td>";
						echo "</tr>";
						echo "<tr><td style='border:none'></td></tr>";
					}
					echo "</table>";
					
					if(isset($_REQUEST['action'])=="delete")
					{	
						$que = "select vidpath,imgpath from videos where videoid=".$_REQUEST['vid']."";
						$res = mysqli_query($con,$que) or die(mysqli_error($con));
						$row1 = mysqli_fetch_array($res);
						if(file_exists($row1['vidpath']))
						{
							unlink($row1['vidpath']);
							unlink($row1['imgpath']);
							
							//echo "File Deleted..";
						}
						
						$query1 = "delete from videos where videoid=".$_REQUEST['vid']."";
						mysqli_query($con,$query1) or die(mysqli_error($con));
						mysqli_query($con,"delete from comment where videoid=".$_REQUEST['vid']."");
						
						header('location:user_video.php');
					}
				?>
			</div>
		</div>
	</div>
	
	<?php include('includes/footer.php'); ?>

</body>
</html>
