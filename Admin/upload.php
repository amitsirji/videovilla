
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload Video</title>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<script language="javascript" src="js/jquery.js" type="text/javascript"></script>
<script language="javascript" src="js/highlight.js" type="text/javascript"></script>
</head>
<body id="top">
	<?php 
		include('include/header_nav.php'); 
		include_once('include/config.php');
	?>
	<?php
		//if(isset($_SESSION['usernm']))
		//{
	?>
			<div class="wrapper col5">
			  <div id="container">
				<div id="content">
					<h2>Upload video to the site....</h2>
					<form action="upload.php" method="post" enctype="multipart/form-data">
						<table style="border:none;width:300px;">
							<tr>	
								<td style="border:none"><b><font color="gray" >Formats allowed : <strong style="color:red">(mp4,avi,flv,mkv)</strong></font></b></td>
							</tr>
							<tr>
								<td style="border:none"><b><font color="gray" >Size allowed : <strong style="color:red">50MB or less</strong></font></b></td>
							</tr>
							<tr>
								<td style="border:none;"><input class="btn" type="file" name="uploadfile"/></td>
							</tr>
							<tr>
								<td style="border:none"><b>Category</b></td>
							</tr>
							<tr>
								<td style="border:none;">
									<select name="category" class="textinput">
										<option value="">Select Category</option>
										<option value="education">Education</option>
										<option value="entertainment">Entertainment</option>  
										<option value="games">Games</option>
										<option value="inspiritional">Inspiritional</option>
										<option value="sports">Sports</option>
										<option value="Others">Others</option>
									</select>								</td>
							</tr>
							<tr>
								<td style="border:none"><b>Description</b></td>
							</tr>
							<tr>
								<td style="border:none;">
									<textarea cols="5" name="desc" rows="4" class="textinput" style="height:80px;" ></textarea>								</td>
							</tr>
							<tr>
								<td style="border:none;"><input class="btn" type="submit" name="submit" value="Upload" /></td>
							</tr>
						</table>
					</form>
				</div>
			  </div>
			</div>
			<?php 
			if(isset($_POST['submit']))
			{
				//Define variables 
				$size = ($_FILES['uploadfile']['size']/1024)/1024;
				$name = $_FILES['uploadfile']['name'];
				//$name_org = $_FILES['uploadfile']['name'];
				//$nm1 = explode(".",$_FILES['uploadfile']['name']);
				//$name = $nm1[0];
				$type = $_FILES['uploadfile']['type'];
				$v_id = rand();
				$usernm = $_SESSION['usernm'];
				$fid = $_SESSION['adminid'];
				$cat = $_POST['category'];
				$desc = $_POST['desc'];
			
				$target_dir = "../upload/videos/"; 
				$target_dir = $target_dir . basename( $_FILES['uploadfile']['name']);
				$ok=1; 
				
				//echo $usernm;
				//Check if directory exist or not
				if(!is_dir("../upload"))
				{
					mkdir("../upload");
				}
				if(!is_dir("../upload/videos"))
					mkdir("../upload/videos");
				if(!is_dir("../upload/thumbnails"))
					mkdir("../upload/thumbnails");
				
				//Check the valid type of the video
				$allowed = array('MP4','mp4','avi','flv','mkv');
				$ext = pathinfo($name,PATHINFO_EXTENSION);
				echo $ext;
				if(!in_array($ext,$allowed))
				{
					echo "<script type='text/javascript'>";
					echo "alert('Only avilable Extension allowed...')";
					echo "</script>";
				}
				else
				{
				
				//Check file size if less then 50 mb
				if($size >= 50)
				{
					echo "<script type='text/javascript'>";
					echo "alert('Only uplode 50 mb...')";
					echo "</script>";
					exit();
				}
				//Check if file exist or not
				if(file_exists("../upload/videos/" . $_FILES['uploadfile']['name']))
				{
					echo "<script type='text/javascript'>";
					echo "alert('File already exists...')";
					echo "</script>";
				} 
				else 
				{
					/*For create image from video
				
					commands
					-i input file name
					-an disable audio
					-ss get image from X second in video
					-s size of the image
					*/	
					
					//Get one thumbnail from video
					//$ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
					$ffmpeg = "..\\ffmpeg\\bin\\ffmpeg";
					$videoFile = $_FILES['uploadfile']['tmp_name'];
					$imageFile = $v_id . ".jpg";
					$imgpath = "../upload/thumbnails/" . $imageFile;
					$isize = "320x180";
					$getFromSecond = 5;
					$cmd = "$ffmpeg -i $videoFile -an -ss $getFromSecond -s $isize $imgpath";
					//$cmd1 = "$ffmpeg -i $videoFile -ar 22050 -ab 32 -f flv $videoFile.flv";
					/*if(!shell_exec($cmd1))
					{
						echo "converted..";
					}
					else
					{
						echo "not converted...";
					}*/
					if(!shell_exec($cmd))
					{
						//echo "Thumbnail Created!";
					}
					else
					{
						//echo "Error creaing thumbnail..";
					}

					if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_dir)) 
					{							
						//insert video to the database
						$insert = "insert into videos (userid,videoid,usernm,videoname,description,category,vidpath,imgpath,type,size) values ($fid,$v_id,'$usernm','$name','$desc','$cat','$target_dir','$imgpath','$type',$size)";
						//echo $insert;
						
						if(!mysqli_query($con,$insert))
							die('Error : ' . mysqli_error($con));
						else
						{
							echo "<script type='text/javascript'>";
							echo "alert('Upload successfully...')";
							echo "</script>";
						}
					} 
					else 
					{
						echo "<script type='text/javascript'>";
						echo "alert('Sorry...Error while uploading...')";
						echo "</script>";
					}
				}
				}
			}
			?>
			<?php
			/*}
			else
			{
				echo "<script type='text/javascript'>";
				echo "alert('Please... First login to upload the file...')";
				echo "</script>";
				header('refresh:0;url=login_reg.php');
				exit();
			}*/
			?>
			
	<?php include('include/footer.php'); ?>
</body>
</html>
