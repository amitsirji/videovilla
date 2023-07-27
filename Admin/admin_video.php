<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Videoss</title>
</head>
<body id="top">
	<?php include('include/header_nav.php'); ?>
	<div class="wrapper col5">
		<div id="container">
			<div id="content">
			<?php
				include_once('include/config.php');
				$unm = $_SESSION['usernm'];
			
				$query = "select * from videos where usernm='$unm'";
				
				$result = mysqli_query($con,$query) or die(mysqli_error($con));
							
				echo "<table style='color:gray;border:none;'>";
				$count=0;
				
				//while($row = mysqli_fetch_array($result))
				if(mysqli_num_rows($result)) {
					while($row = mysqli_fetch_array($result))
					{
						extract($row);
						if($count==3){
							echo "</tr>";
							$count=0;
						}
						if($count==0) {
							echo "<tr>";
						}
						echo "<td width='200' style='border:none;'><img src='".$imgpath."' alt='".$videoname."' />";
						echo "<br><a href='admin_video.php?action=delete & vid=$videoid'>Delete</a>";
						$count++;		
					}
				}
				else
				{
					echo "<tr>";
					echo "<td style='border:none;font-size:30px;color:red' align='center'> No Videos Found... </td>";
					echo "</tr>";
				}
				//echo "</tr>";
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
					header('location:admin_video.php');
				}

			?>
			</div>
		</div>
	</div>
	
	<?php include('include/footer.php'); ?>
</body>
</html>
