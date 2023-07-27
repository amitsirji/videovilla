<?php
	session_start();
	include_once('includes/config.php');
	if(isset($_SESSION['session_id']))
	{
		$uid = $_SESSION['userid'];
		
		//For Delete videos from table
		$que = "select vidpath,imgpath from videos where userid=$uid";
		$res = mysqli_query($con,$que) or die(mysqli_error($con));
		while($row1 = mysqli_fetch_array($res))
		{
			if(file_exists($row1['vidpath']))
			{
				unlink($row1['vidpath']);
				unlink($row1['imgpath']);
			
				//echo "File Deleted..";
			}
		}
		
		$query1 = "delete from videos where userid=$uid";
		mysqli_query($con,$query1) or die(mysqli_error($con));
		mysqli_query($con,"delete from comment where userid=$uid") or die(mysqli_error($con));
		
		//Delete user from Registration
		mysqli_query($con,"delete from reg where userid=$uid") or die(mysqli_error($con));
		
		echo "<script>";
		echo "alert('Your account has been Deactivated')";
		echo "</script>";
		header('location:logout.php');
	}
?>