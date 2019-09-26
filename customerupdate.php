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
$custid=$_POST['custid'];
$fname=$_POST['fname'];
$a="select custid from customer where custid='".$custid."' limit 1";
$b=mysqli_query($conn,$a);
if($custid==null)
{
	echo "<h2 align='center'>no value entered</h2>";
	echo "<br><br>";
	echo "<h2  align='center' ><a href= 'customer.html' >go back</a></h2>";
	exit();
}
else
{
if(mysqli_num_rows($b)==1)
{
$sql="update customer set fname='$fname' where custid='$custid'";
}
else
{
	echo "<h2 align='center'>invalid customer id id</h2>";
	echo "<br><br>";
	echo "<h2 align='center'><a href='customer.html'>go back</a></h2>";
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
 echo "<a href='customerview.php'>view record</a></h2>";
 
 mysqli_close($conn);
 }
 else
 {
 ?>
  <form method="post" action="">
  <table width="400" border="0" cellspacing="1" cellpadding="2">
   <tr>
  <td width="100"><font size = 5>custid :</font></td>
  <td><input name="custid" type="text" id="custid"</td>
  </tr>
  <tr>
  <td width="100"><font size = 5>fname :</font></td>
  <td><input name="fname" type="text" id="fname"</td>
  </tr>
 
   <tr>
  <td width="100"></td>
  <td></td>
  </tr>
  <td width="100"></td>
  <td>
  <input name="update" type="submit" id="delete" value="UPDATE">
  </td>
  </tr>
  </table>
  </form>
<?php
}
?>
</body>
</html>