<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html> -->

<?php
	session_start();
	include_once('includes/config.php');
	
	if(isset($_POST['submit']))
	{	
		$usernm = $_POST['unm'];
		$pwd = $_POST['password'];
		
		//Validation
		if(empty($usernm) || $usernm == "Username")
		{
			echo "<script type='text/javascript'>";
			echo "alert('Enter Username...')";
			echo "</script>";
			header('refresh:0;url=login_reg.php');
			exit();
		}
		/*else
		{
			if(!preg_match("/^[a-zA-z ]*$/",$usernm)) //preg_match() is use for string pattern
			{
				//$nameErr = "Only letters and white space allowed";
				echo "<script type='text/javascript'>";
				echo "alert('Only letters and white space allowed')";
				echo "</script>";
				header('refresh:0;url=login_reg.php');
				exit();
			}
		}*/
		
		//For admin
		
		$que = "select * from admin where username='$usernm' and password='$pwd'";
		$res = mysqli_query($con,$que) or de(mysqli_error($con));
		if(mysqli_num_rows($res)==1)
		{
			while($row1 = mysqli_fetch_array($res))
			{
				$_SESSION['usernm'] = $row1['username'];
				$_SESSION['adminid'] = $row1['admin_id'];
				$_SESSION['sessid']=session_id();
				header('location:../Admin/index.php');
			}
		}
		
		$query = "select userid,username,password from reg where username='$usernm' AND password='$pwd'";
		$result = mysqli_query($con,$query) or die(mysqli_error($con)) ;
		if(mysqli_num_rows($result)==1)
		{
			while($row = mysqli_fetch_array($result))
			{
				$_SESSION['userid'] = $row['userid'];
			} 
			$_SESSION['usernm'] = $usernm;
			$_SESSION['session_id'] = session_id();
			header('location:index.php');
			exit();
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('Invalid username or password')";
			echo "</script>";
			header('refresh:0;url=login_reg.php');
			exit();
		}
	}

?>
