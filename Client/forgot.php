<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Forgot Password</title>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
</head>
<body id="top">
	<?php include('includes/header_nav.php'); ?>
	<div class="wrapper col5">
		<div id="container">
			<div id="content">
				<h2>Retrive password...</h2>
				<?php
				include_once('includes/config.php');
				echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
					echo "<table style='border:none;'>";
						echo "<tr><td style='border:none'><b>Enter E-mail</b></td></tr>";
						echo "<tr>";
							echo "<td style='border:none'>";
								echo "<input type='text' name='email' class='textinput'/>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td style='border:none'>";
								echo "<input type='submit' name='submit' value='Submit' class=
								'btn' />";
							echo "</td>";
						echo "</tr>";
					echo "</table>";
				echo "</form>";
				if(isset($_POST['email']))
				{
					$email = $_POST['email'];
					//echo $email;
					$query = "select userid,username,email,password from reg where email='$email'";
					$result = mysqli_query($con,$query) or die(mysqli_error($con));
					if($row = mysqli_num_rows($result)==1)
					{
						$row1 = mysqli_fetch_array($result);
						$to = $email;
						$subject = "Login Details";
						$msg = "This is in response to your request for login details as administrator of your PSB™.\nnYout User ID is ".$row1['userid']." \n\nYour User Name is ".$row1['username'].".\n\nYour Administrator Password is ".$row['admin_password'].".\n\nYour Users Password is ".$row1['password'].".\n\nYou may use your administrator password to edit your account settings. \n\nDon't give your admin password to anyone in your group, but do save it somewhere safe.\n\nEnjoy.\n\nRegards,\n\nthe management";
						$headers = "From:vyomsinroja@gmail.com\r\nReply-To:".$email;
						if(mail($to,$subject,$msg))
						{
							echo "<center><font face='Verdana' size='2'><b><br><br><br><br><br>THANK YOU</b> <br>Your passwords are posted to your email address. Please check your mail soon.</center>";
						}

						else
						{
							echo "<center><font face='Verdana' size='2' color=red>There is some system problem in sending login details to your address. <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center></font>";}
						}
						//echo "id found";		
					}
					//else
					//{
						//echo "not found";
					//}
				//}
				else
				{
					//echo "Enter email id...";
				}
				
				?>
			</div>
		</div>
	</div>

	<?php include('includes/footer.php'); ?>
</body>
</html>
