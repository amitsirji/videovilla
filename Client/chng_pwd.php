<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Change Password</title>
<link rel="stylesheet" href="../styles/layout.css" type="text/css"  />
</head>
<body id="top">
<?php include('includes/header_nav.php'); ?> 
	<div class="wrapper col5">
		<div id="container">
			<div id="content">
				<h2>Change Password...</h2>
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
					<table style="border:none;width:250px">
						<tr><td style="border:none"><b>Enter Old Password</b></td></tr>
						<tr>
							<td style="border:none;">
								<input type="password" name="old_pwd" class="textinput"/>							</td>
						</tr>
						<tr><td style="border:none"><b>Enter New Password</b></td></tr>
						<tr>
							<td style="border:none;">
						<input type="password" name="new_pwd" class="textinput"/>						</tr>
						<tr><td style="border:none"><b>Enter Confirm New Password</b></td></tr>
						<tr>
							<td style="border:none;">
						<input type="password" name="new_conf_pwd" class="textinput"/>						</tr>
						<tr>
							<td style="border:none;" colspan="0"> 
								<input type="submit" name="submit" value="Change Password" class="btn" />							</td>
						</tr>
					</table>
				</form>
				<?php
					include_once('includes/config.php');
					
					if(isset($_POST['submit']))
					{
						$old_pwd = $_POST['old_pwd'];
						$new_pwd = $_POST['new_pwd'];
						$new_conf_pwd = $_POST['new_conf_pwd'];
						$userid = $_SESSION['userid'];
						
						if($old_pwd == "" || $new_pwd == "" || $new_conf_pwd == "")
						{
							echo "<script>";
							echo "alert('Entet all field as required...')";
							echo "</script>";
						}
						else
						{
							if($new_pwd == $new_conf_pwd)
							{
								$query = "update reg set password='".$new_pwd."' where userid ='".$userid. "'"; 
								$result = mysqli_query($con,$query) or die(mysqli_error($con));
								echo "<script>";
								echo "alert('Password Updated successfully....')";
								echo "</script>";
								header('refresh:0;url=index.php');
							}
						} 
					}
					
				?>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>
