<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php $fnm = $_REQUEST['fnm']; echo $fnm; ?></title>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
</head>
<body id="top">
	<?php include('includes/header_nav.php'); ?>
	<div class="wrapper col5">
		<div id="container">
			<div id="content" > 
				<?php
					include_once('includes/config.php');
					
					$vid = $_REQUEST['vid'];
					//select video from db
					$query = "select * from videos where videoid=$vid";
					$result = mysqli_query($con,$query) or dir(mysqli_error($con));
					$row = mysqli_fetch_array($result);
					extract($row);
					echo "<video style='margin-top:-20px;' width='800' height='500' controls>";
					echo "<source src='".$vidpath."' type='".$type."'";
					echo "<b>Your browser does not support the video tag</b>";
					echo "</video>";
					
					$nm1 = explode(".",$videoname);
					$name = $nm1[0];
					echo "<br><br><b><font size='4' color='blue'>".$name."</font></b>";
					//echo "<br>By ".$_SESSION['usernm'];
					echo "&emsp;&emsp;&emsp;&emsp;<a href='download.php?fnm=$videoname' style='font-size:1.5em;color:red'>Download </a>";
					echo "<br><br>";
					echo "<b>by " . $usernm . "</b>";
					echo "<br><br>";
					//echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b style='color:gray;font-size:3em;'><u>" . $views . "</u></b>"; 
	
				?>
				<!-- For the comment -->
				<table style="width:800px;;margin:10px 0">
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
					<tr>
						<td><h2>Comment</h2></td>
					</tr>
					<tr>
						<td>
							<textarea rows="5" cols="95" style="margin-top:-20px;" name="comment">	
							</textarea>						</td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" class="btn" value="Submit" /></td>
					</tr>
					</form>
					<tr>
						<td><hr /></td>
					</tr>
					<?php
						$query2 = "select a.username,a.userid,b.userid,b.comment,DATE_FORMAT(b.datetime, '%M %d,%Y AT %l:%i %p') as ndate from reg a,comment b where videoid='$vid' and a.userid=b.userid order by datetime";
						//echo $query2;
						$result = mysqli_query($con,$query2) or die(mysqli_error($con));
						$res = mysqli_query($con,"select count(*) as no from comment where videoid=$vid") or die(mysqli_error($con));
						$row3 = mysqli_fetch_array($res);
						echo "<tr><td><h2>Comments(".$row3['no'].")</h2></td></tr>";
						while($row1 = mysqli_fetch_array($result))
						{
							extract($row1);
							echo "<tr>";
							echo "<td>";
							echo "<b>".$row1['username']."</b>";
							echo "<br><normal style='color:gray;'>" . $row1['ndate']. "</normal>";
							echo "<br>" . $row1['comment'];
							echo "</td>";
							echo "</tr><tr><td><hr style='border:1px gray dotted'></td></tr>";
						}						
					?>
				</table>
				
				<?php
					if(isset($_POST['submit']))
					{
						if(isset($_SESSION['session_id']))
						{
							$comment = $_POST['comment'];
							$uid = $_SESSION['userid'];
							//$vi_id = $_REQUEST['vid'];
							date_default_timezone_set("Asia/Kolkata"); 
							$date = date("y-m-d g:i:s");
							//echo $uid;
							$query1 = "insert into comment (userid,videoid,comment,datetime) values ($uid,$vid,'$comment','$date')";
							//echo $date;
							mysqli_query($con,$query1) or die(mysqli_error($con));
						}
						else
						{
							echo "<script>";
							echo "alert('First login to the website...')";
							echo "</script>";
							header('refresh:0;url=login_reg.php');
						}
						header('refresh:0;');
					}
				?>
				<?php	
					//For the viewer of the videos
					$views = mysqli_query($con,"select views from videos where videoid=$vid") or die(mysqli_error($con));
					if(mysqli_num_rows($views))
					{
						$row = mysqli_fetch_array($views);
						$count = $row['views'] + 1;
					}
					else
					{
						$count = 0;
					}
					mysqli_query($con,"update videos set views='".$count."' where videoid='".$vid."'") or die(mysqli_error($con));
				?>
			</div>
		</div>
	</div>
	
	<?php include('includes/footer.php'); ?>
</body>
</html>
