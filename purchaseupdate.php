<html>
<head><title>update</title></head>
<body bgcolor="palegreen">
<?php
if(isset($_POST['update']))
{
$conn=mysqli_connect("localhost","root","",'supermarket');
if(!$conn)
{
   die('could not connect');
}
$purid=$_POST['purid'];
$productid=$_POST['productid'];
$a="select purid from purchase where purid='".$purid."' limit 1";
$b=mysqli_query($conn,$a);
$c="select productid from product where productid='".$productid."'limit 1";
$d=mysqli_query($conn,$c);
if($purid==null)
{
	echo "<h2 align='center'>no value entered";
	echo "<br><br>";
	echo "<a href= 'purchase.html'>go back</a></h2>";
	exit();
}
else
{
if(mysqli_num_rows($b)==1)
{
	if(mysqli_num_rows($d)!=1)
	{
		echo "<h2 align='center'>parent key not found";
		echo "<br><br>";
		echo "<a href='purchase.html'>go back</a></h2>";
		exit();
	}
$sql="update purchase set productid='$productid' where purid='$purid'";
}
else
{
	echo "<h2 align='center'>invalid purchaseid";
	echo "<br><br>";
	echo "<a href='purchase.html'>go back</a></h2>";
	exit();
}
}
#dbh=mysqli_select_db('supermarket');
$ret=$conn->query($sql);
if(!$ret)
{
  die('could not update data:');
  }
  
 echo "<h2 align='center'>updated successfully\n";
 echo "<a href='purchaseview.php'>view record</a></h2>";
 
 mysqli_close($conn);
 }
 else
 {
 ?>
 <form method="post" action="">
 <table width "400" border="0" cellspacing="1" cellpadding="2">
 <tr>
 <td width="100"><font size = 5>purid</td>
 <td><input name="purid" type="text" id="purid"</td>
 </tr>
 <tr>
 <td width="100"><font size = 5>productid</td>
 <td><input name="productid" type="text" id="productid"</td>
</tr>
<tr>
<td width="100"></td>
<td></td>
</tr>
<td width="100"></td>
<td>
<input name="update" type="submit" id="update" value="UPDATE">
</td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>