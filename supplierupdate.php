<html>
<head><title>update</title></head>
<body bgcolor='violet'>
<?php
if(isset($_POST['update']))
{
$conn=mysqli_connect("localhost","root","",'supermarket');
if(!$conn)
{
   die('could not connect');
}
$supplierid=$_POST['supplierid'];
$marketname=$_POST['marketname'];
$a="select supplierid from supplier where supplierid='".$supplierid."' limit 1";
$b=mysqli_query($conn,$a);
if($supplierid==null)
{
	echo "<h2 align='center'>no value entered";
	echo "<br><br>";
	echo "<a href= 'supplierupdate.php'>go back</a></h2>";
	exit();
}
else
{
if(mysqli_num_rows($b)==1)
{
$sql="update supplier set marketname='$marketname' where supplierid='$supplierid'";
}
else
{
	echo "<h2 align='center'>invalid supplierid";
	echo "<br><br>";
	echo "<a href='supplierupdate.php'>go back</a></h2>";
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
 echo "<br><br>";
 echo "<a href='supplierview.php'>view record</a></h2>";
 
 mysqli_close($conn);
 }
 else
 {
 ?>
 <form method="post" action="">
 <table width "400" border="0" cellspacing="1" cellpadding="2" align="center">
 <tr>
 <td width="100"><font size=5>supplierid</td>
 <td><input name="supplierid" type="text" id="supplierid"</td>
 </tr>
 <tr>
 <td width="100"><font size=5>marketname</td>
 <td><input name="marketname" type="text" id="marketname"</td>
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