<html>
<body bgcolor="palegreen">
<?php
if(isset($_POST['delete']))
{
$dbh=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
#dbh=mysqli_select_db('supermarket') or die(mysqli_error());
$del=$_POST['custid'];
$sql="select custid from customer where custid='".$del."' limit 1";
$res=mysqli_query($dbh,$sql);
if($del==null)
{
	echo "<h2 align='center'>no value entered</h2>";
	echo "<br><br>";
	echo "<h2 align='center'><a href= 'customer.html'>go back</a></h2>";
	exit();
}
elseif(mysqli_num_rows($res)==1)
	{
     $query1=$dbh->query("delete from customer where custid='$del'");
	}
	else
	{
		 echo "<h2 align='center'>invalid customer id";
		echo "<br><br>";
		echo "<a href= 'customer.html'>go back</a></h2>";
		exit();
	}
echo "<br><br>";
echo "<h2 align='center'>DELETED SUCCESSFULLY!!!!!\n";
echo "<br><br>";
echo "<a href='customerview.php'> CLICK HERE TO VIEW RECORDS</a>";
echo "<br><br>";
echo "<a href='customer.html'>CLICK HERE TO GO BACK</a><h2>";
/*$var=$dbh->query("SELECT * FROM customer");
echo"<table border size=1>";
echo"<tr> <th> custid</th><th>fname</th><th>lname </th><th>city</th> <th> country</th><th>phone</th></tr>";
 while ($arr=$var->fetch_array())
   {
   echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td>$arr[5]</td></tr>";
   }
   echo "</tables>";*/
   mysqli_close($dbh);
}
else
{
  ?>
  <form method="post" action="">
  <table width="400" border="0" cellspacing="1" cellpadding="2">
  <tr>
  <td width="100"><font size = 5>custid : </font></td>
  <td><input name="custid" type="text" id="custid"</td>
  </tr>
  <tr>
  <td width="100"></td>
  <td></td>
  </tr>
  <td width="100"></td>
  <td>
  <input name="delete" type="submit" id="delete" value="DELETE">
  </td>
  </tr>
  </table>
  </form>
 <?php 
}
?>
</body>
</html>