<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/highlight.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contact Us</title>
</head>
<body id="top">
<?php include('includes/header_nav.php'); ?>
	<div class="wrapper col5">
		<div id="container">
			<div id="content">
			<table style="border:none">
				<tr>
					<td style="border-right:1px solid gray;border-left:none;">
						<h2 style="font-size:3em;">Contact Information</h2><br /><Br />
						<table style="border:none">
							<!--<tr>
								<td style="border:none;"><b>Address</b></td>
								<td style="border:none;">Address</td>
							</tr>-->
							<tr><td style="border:none;font-size:1.5em">E-mail</td></tr>
							<tr><td style="border:none;"><hr></td></tr>
							<tr>
								<td style="border:none;font-size:1.5em">
									adityarupareliya21@gmail.com <br><br> nikitavadher91@gmail.com <br><br> vyomsinroja@gmail.com								</td>
							</tr>
							<!--<tr>
								<td style="border:none;"><b>Phone</b></td>
								<td style="border:none;">Phone</td>
							</tr>
							<tr>
								<td style="border:none;"><b>Website</b></td>
								<td style="border:none;"></td>
							</tr>-->
						</table>					</td>
					<td style="border:none;">
						<h2>Feedback Form...</h2>
						<table style="border:none">
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
							<tr><td style="border:none;"><b>Name:</b></td></tr>
							<tr>
								<td style="border:none;">
								<input type="text" name="name" class="textinput"/>							</td>
							</tr>
							<tr><td style="border:none;"><b>E-mail:</b></td></tr>
							<tr>
								<td style="border:none;">
								<input type="text" name="email" class="textinput"/>							</td>
							</tr>
							<tr><td style="border:none;"><b>Subject:</b></td></tr>							
							<tr>
								<td style="border:none;">
								<input type="text" name="sub" class="textinput"/>							</td>
							</tr>
							<tr><td style="border:none;"><b>Message:</b></td></tr>
							<tr>
								<td style="border:none;">
								<textarea name="msg" style="height:150px;" class="textinput">
								</textarea>							</td>
							</tr>
							<tr>
								<td style="border:none"><input type="submit" name="submit" value="Submit" class="btn" /></td>
							</tr>
						</form>
						</table>					</td>
				</tr>
			</table>
			
			<?php
				include('includes/config.php');
				
				if(isset($_POST['submit']))
				{
					$fid = rand();
					$nm = $_POST['name'];
					$email = $_POST['email'];
					$sub = $_POST['sub'];
					$msg = $_POST['msg'];
					
					if(!filter_var($email,FILTER_VALIDATE_EMAIL))
					{
						echo "<script type='text/javascript'>";
						echo "alert('E-mail ID is not valid..!')";
						echo "</script>";
						exit();
					}
					
					if(!($nm=="" || $email=="" || $sub=="") && !empty($msg))
					{
						$query = "insert into feedback values ($fid,'$nm','$email','$sub','$msg')";
						if(mysqli_query($con,$query))
						{
							echo "<script>";
							echo "alert('Your feedback is recorded...')";
							echo "</script>";
						}
						else
							die(mysqli_error($con));
					}
					else
					{
						echo "<script>";
						echo "alert('Please fill all field...')";
						echo "</script>";
					}

				}
			?>
			</div>
		</div>
	</div>

<?php include('includes/footer.php'); ?>
</body>
</html>
