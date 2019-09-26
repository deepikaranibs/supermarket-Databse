<html>
<body bgcolor='violet'>
<?php
if(isset($_POST['delete']))
{
$dbh=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
#dbh=mysqli_select_db('supermarket') or die(mysqli_error());
$del=$_REQUEST['supplierid'];
$sql="select * from supplier where supplierid='".$del."' limit 1";
$res=mysqli_query($dbh,$sql);
if($del==null)
{
	echo "<h2 align='center'>no value entered";
	echo "<br><br>";
	echo "<a href= 'supplierdelete.php'>go back</a></h2>";
	exit();
}
elseif(mysqli_num_rows($res)==1)
	{
     $query1=$dbh->query("delete from supplier where supplierid='$del'");
	}
	else
	{
		 echo "<h2 align='center'>invalid supplier id  id";
		echo "<br><br>";
		echo "<a href= 'supplierdelete.php'>go back</a></h2>";
		exit();
	}
echo "<br><br>";
echo "<h2 align='center'>DELETED SUCCESSFULLY!!!!!\n";
echo "<br><br>";
echo "<a href='supplierview.php'> CLICK HERE TO VIEW RECORDS</a>";
echo "<br><br>";
echo "<a href='supplier.html'>CLICK HERE TO GO BACK</a></h2>";
mysqli_close($dbh);
}
else
{
  ?>
  <form method="post" action="">
  <table width="400" border="0" cellspacing="1" cellpadding="2" align="center">
  <tr>
  <td width="100"><font size = 5>supplierid : </font></td>
  <td><input name="supplierid" type="text" id="supplierid" align="center"</td>
  </tr>
  <tr>
  <td width="100"></td>
  <td></td>
  </tr>
  <td width="100"></td>
  <td>
  <input name="delete" type="submit" id="delete" value="DELETE" align="center">
  </td>
  </tr>
  </table>
  </form>
 <?php 
}
?>
</body>
</html>