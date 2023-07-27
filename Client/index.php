<?php include_once('includes/config.php'); ?>
<html>
<head>
	<title>VideoVilla</title>
	<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
      <link rel="stylesheet" href="style.css" type="text/css" media="screen" />

	<script language="javascript" src="js/jquery.js" type="text/javascript"></script>
	<script language="javascript" src="js/highlight.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
</head>
<body id="top">
	<?php include('includes/header_nav.php'); ?>
	
	<div class="wrapper col5">
		<div id="container">
			<div id="content">
		 		<!--/top-->
  <div id="header-slide"><div class="wrap">
   <div id="slide-holder">
<div id="slide-runner">
    <a href=""><img id="slide-img-1" src="slider/1.jpg" class="slide" alt="" width="973" height="278"/></a>
    <a href=""><img id="slide-img-2" src="slider/2.jpg" class="slide" alt="" width="973" height="278" /></a>
    <a href=""><img id="slide-img-3" src="slider/3.jpg" class="slide" alt="" width="973" height="278" /></a>
    <a href=""><img id="slide-img-4" src="slider/4.jpg" class="slide" alt="" width="973" height="278"/></a>
    <a href=""><img id="slide-img-5" src="slider/5.jpg" class="slide" alt="" width="973" height="278"/></a>
    <a href=""><img id="slide-img-6" src="slider/6.jpg" class="slide" alt="" width="973" height="278"/></a>
	<a href=""><img id="slide-img-7" src="slider/7.jpg" class="slide" alt="" width="973" height="278"/></a> 
    <div id="slide-controls">
     <!--<p id="slide-client" class="text"><strong></strong><span></span></p>
     <p id="slide-desc" class="text"></p>-->
     <p id="slide-nav"></p>
    </div>
</div>
	
	<!--content featured gallery here -->
   </div>
   <script type="text/javascript">
    if(!window.slider) var slider={};slider.data=[
	{"id":"slide-img-1","client":"nature beauty","desc":"add your description here"},
	{"id":"slide-img-2","client":"nature beauty","desc":"add your description here"},
	{"id":"slide-img-3","client":"nature beauty","desc":"add your description here"},
	{"id":"slide-img-4","client":"nature beauty","desc":"add your description here"},
	{"id":"slide-img-5","client":"nature beauty","desc":"add your description here"},
	{"id":"slide-img-6","client":"nature beauty","desc":"add your description here"},
	{"id":"slide-img-7","client":"nature beauty","desc":"add your description here"}];
   </script>
  </div></div><!--/header-->
				<br>
				<!--<div style="background-color:#666666; border:1px solid gray;"> -->
					<?php	
						//select record from video table
						$query = "select * from videos ";
						//$query1 = "select a.username,a.userid,b.userid from reg a, videos b where a.userid = b.userid";
						//echo $query1;
						//$res = mysqli_query($con,$query1) or die(mysqli_error($con)); 
						$result = mysqli_query($con,$query) or die(mysqli_error($con));
						
						echo "<table style='color:gray;border:none;'>";
						$count=0;
						
						//while($row = mysqli_fetch_array($result))
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
							$nm = explode(".",$videoname);
							$name = $nm[0];
							echo "<td width='200' style='border:none;'><a href='watch.php?vid=$videoid&fnm=$name'><img src='".$imgpath."' alt='".$name."' /></a>";
							echo "<br><a href='watch.php?vid=$videoid&fnm=$name'>'".$name."</a>";
							echo "<br>by " . $row['usernm'];
							echo "<br>".$row['views']." views";
							echo "</td>";
							$count++;
							
						}
						//echo "</tr>";
						echo "</table>";
					?>
				<!--</div>	-->
			</div>
		<br class="clear" />
	  </div>
	</div>
	
	<?php include('includes/footer.php'); ?>
</body>
</html>