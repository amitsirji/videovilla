<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login and Register</title>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<!--<script language="javascript" src="js/validation.js" type="text/javascript"></script>-->
</head>
<body>
	<?php include('includes/header_nav.php'); ?>
	<?php 
		if(isset($_SESSION['session_id']))
		{
			header('location:index.php');
		}
	?>
	<div class="wrapper col5">
		<div id="container">
			<div id="content">
				<h2>Login</h2>
				<form action="login.php" method="post">
					<table style="border:none;width:250px">
						<tr>
							<td style="border:none;">
								<input type="text" value="Username"  onfocus="this.value=(this.value=='Username') ? '' : this.value;" name="unm" id="unm" class="textinput"/>							</td>
						</tr>
						<tr>
							<td style="border:none;">
						<input type="password" value="Password"  onfocus="this.value=(this.value=='Password') ? '' : this.value;" name="password" id="password" class="textinput"/>						</tr>
						<tr>
							<td style="border:none;" colspan="0"> 
								<input type="submit" name="submit" value="Login" class="btn" />
								&nbsp;&nbsp;<a href="forgot.php">Forgot the password?</a>							</td>
						</tr>
					</table>
				</form>
				<hr /><br />
				<h2>Register</h2>
				<form name="reg" action="register.php" method="post">
					<table style="border:none;width:250px;">
						<tr>
							<tr><td style="border:none;"><b>Name</b></td></tr>
							<td style="border:none;">
								<input type="text" value="First Name"  onfocus="this.value=(this.value=='First Name') ? '' : this.value;" name="fname" id="fname" class="textinput"/>							</td>
							<td style="border:none;">
								<input type="text" value="Last Name" onfocus="this.value=(this.value=='Last Name') ? '' : this.value;" name="lname" id="lname" class="textinput" />						</tr>
						<tr><td style="border:none"><b>Current E-mail ID</b></td></tr>
						<tr>
							<td style="border:none;">
								<input type="text" value="Email ID"  onfocus="this.value=(this.value=='Email ID') ? '' : this.value;" name="email" id="email" class="textinput"/>							</td>
						</tr>
						<tr><td style="border:none"><b>Username</b></td></tr>
						<tr>
							<td style="border:none;">
								<input type="text" value="Username"  onfocus="this.value=(this.value=='Username') ? '' : this.value;" name="unm" id="usernm" class="textinput"/>							</td>
						</tr>
						<tr>
							<td style="border:none"><b>Password</b></td>
							<td style="border:none"><b>Confirm Password</b></td>
						</tr>
						<tr>
							<td style="border:none;">
								<input type="password" value="Password"  onfocus="this.value=(this.value=='Password') ? '' : this.value;" name="pwd" id="pwd" class="textinput"/>							</td>
							<td style="border:none;">
								<input type="password" value="Password"  onfocus="this.value=(this.value=='Password') ? '' : this.value;" name="conf_pwd" id="conf_pwd" class="textinput"/>							</td>
						</tr>
						<!--<tr><td style="border:none"><b>Gender</b></td></tr>
						<tr>
							<td style="border:none;">
								<select name="gender" class="textinput">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</td>
						</tr>
						<tr><td style="border:none"><b>Birthday</b></td></tr>
						<tr>
							<td style="border:none;">
								<input type="text" value="dd/mm/yyyy" onfocus="this.value=(this.value=='dd/mm/yyyy' ? '' : this.value;" name="bdate" id="bdate" class="textinput"  />
							</td>
						</tr>-->
						<td style="border:none" align="center" colspan="2">
							<input type="submit" name="submit" value="Register" class="btn" />						</td>
					</table>
				</form>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>
