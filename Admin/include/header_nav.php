<?php
	session_start();
?>
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1>ADMIN PANEL</h1>
    </div>
    <div id="newsletter">
		<a href="logout.php" style="padding:20px;font-size:2em;">Logout</a>
	<?php
		/*if(!isset($_SESSION['usernm'])) 
		{
			echo "<a href='login_reg.php'>Login/Register</a>";
		}
		else
		{
			echo "<b>Welcome " . $_SESSION['usernm']; // ." | " . $_SESSION['userid'];
			//echo $_SESSION['session_id'];
			echo "<br><br>";
			echo "<a href='user_details.php'>Account</a>";
			echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
			echo "<a href='user_video.php'>Videos</a>";
			echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
			echo "<a href='logout.php'>Logout</a>";
		}*/
	?>
		<!--<a href="login_reg.php">Login/Register</a>-->
      <!--<p>Upload Videos? Sign In Here!!!   <a href="signup.php">New User?</a></p> -->
      <!--<form action="login.php" method="post">
        <fieldset>
          <legend>NewsLetter</legend>
          <input type="text" value="Email or Username&hellip;"  onfocus="this.value=(this.value=='Email or Username&hellip;')? '' : this.value ;" name="user"/>
          <input type="text" value="Password&hellip;"  onfocus="this.value=(this.value=='Password&hellip;')? '' : this.value ;" name="pass"/>
          <input type="submit" name="news_go" id="news_go" value="Sign In" />
        </fieldset>
      </form>-->
    </div>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
	  	<li><a href="index.php">Home</a></li>
        <li><a href="user_details.php">User Details</a></li>
		<li><a href="admin_video.php">Admin Videos</a></li>
        <li><a href="feedback.php">Feedback</a></li>
		<li><a href="upload.php">Upload</a></li>
        <!--<li><a href="#">Broadcast</a></li>
        <li><a href="#">Contact Us</a>-->
          <!--<ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
          </ul> 
        </li>
		<li><a href="upload.php">Upload</a></li>-->
        <!--<li class="last"><a href="#">A Long Link Text</a></li>-->
      </ul>
    </div>
     <!--<div id="search">
     <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;"  onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
	  <form action="result.php" method="get">
	  	<input type="text" name="search_query" />
		<input type="submit" name="submit" value="Search" id="go" />
	  </form>
    </div>-->
    <br class="clear" />
  </div>
</div>