<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
</body>
</html> -->

<?php
	
	include_once('includes/config.php');
	$fnm = $_POST['fname'];
	$lnm = $_POST['lname'];
	$email = $_POST['email'];
	$unm = $_POST['unm'];
	$pwd = $_POST['pwd'];
	$c_pwd = $_POST['conf_pwd'];
	//$gen = $_POST['gender'];
	//$bdate = $_POST['bdate'];
	
	if(isset($_POST['submit']))
	{
		//Checking field if any blank
		if(!$_POST['fname'] | $_POST['fname'] == "First Name" | !$_POST['lname'] | $_POST['lname'] == "Last Name" | !$_POST['email'] | $_POST['email'] == "Email ID" | !$_POST['unm'] | $_POST['unm'] == "Username" |   
		   !$_POST['pwd'] | $_POST['pwd'] == "Password" | !$_POST['conf_pwd'] | $_POST['conf_pwd'] == "Password")// | !$_POST['gender'] | !$_POST['bdate'])
		{
			//die("You did not complete the all field");
			echo "<script type='text/javascript'>";
			echo "alert('All Field must be enter...!')";
			echo "</script>";
			header('refresh:0;url=login_reg.php');
			exit();
		}
		
		//Validation of E-mail
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			echo "<script type='text/javascript'>";
			echo "alert('E-mail ID is not valid..!')";
			echo "</script>";
			header('refresh:0;url=login_reg.php');
			exit();
		}
		
		//insert value into the database
		$rand_id = rand();
		//$daten = $day . "-" . $month . "-" . $year;
		//echo $daten;
		//echo $rand_id;
		//$insert = "insert into reg (userid,fname,lname,email,username,password,gender,birthday) values ($rand_id,'$fnm','$lnm','$email','$unm','$pwd','$gen','$bdate')";
		$insert = "insert into reg (userid,fname,lname,email,username,password) values ($rand_id,'$fnm','$lnm','$email','$unm','$pwd')";
		//$insert = "insert into reg (userid,fname,lname,email,username,password,gender,birthday) values ($rand_id,'$fnm','$lnm','$email','$unm',(PASSWORD('$pwd')),'$gen','$daten')";
		//$insert = "insert into reg (userid,fname,lname,email,username,password,gender,birthday) values ($rand_id,'$fnm','$lnm','$email','$unm','". md5('$pwd')."','$gen','$daten')";
		//echo $insert;
		//$insert = "insert into reg (userid,fname) values ('$rand_id','$fnm')";
		if(!mysqli_query($con,$insert))
			die('Error:' . mysqli_error($con));
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('You are successfully Registered....Click OK to redirected to login page...')";
			echo "</script>";
			header('refresh:0;url=login_reg.php');
			//header('location:login_reg.php');
		}
	}
	else
	{
		header('location:index.php');
	}
?>
