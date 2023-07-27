<?php
if(isset($_GET['x']))
{
$val=$_GET['x'];
//echo $val;
}
else
{
$val=1;
}

include_once('includes/config.php');
//mysql_connect("localhost","root","");
//mysql_select_db("videovilla");
$rs=mysqli_query($con,"select * from videos");
$cnt=mysqli_num_rows($rs);
$pg=$cnt/6;
if($cnt%6==0)
{
	$pg=$pg;
}
else
{
	$pg=$pg+1;
}
$i=1;

while($i<=(6*($val-1)))
{
$row=mysqli_fetch_array($rs);
$i++;
}
?>

<table align="center" bgcolor="#33CCCC">
<!--<tr><th>empno</tr>-->
<?php
$count = 0;
for($j=1;$j<=6;$j++)
{
if($count == 3) {
	echo "</tr>";
	$count=0;
}
if($count == 0) {
	echo "<tr>";
}
//echo "<tr>";
$row=mysqli_fetch_array($rs);
//extract($row);
echo "<td>";
echo "<img height='200' src='".$row['imgpath']."' alt='".$row['videoname']."'/>";
echo "<br>".explode(".",$row['videoname'])[0];
echo "</td>";
$count++;
//echo "<td>".$row['videoname']."</td></tr>";
}
?>
</table>

<center>
<?php
for($i=1;$i<=$pg;$i++)
echo "<a href='pg.php?x=$i'>$i</a>&nbsp;&nbsp;";
?>
</center>