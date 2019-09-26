<html>
<body>
<body style="background:url(images/bill3.jpg);
background-repeat:no-repeat;
background-size:100% 
 100%;
height:800px;
background-attachment:fixed">
</body>
<?php
if(isset($_POST['delete']))
{
$dbh=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
#dbh=mysqli_select_db('supermarket') or die(mysqli_error());
$del=$_POST['billid'];
$sql="select billid from bill where billid='".$del."' limit 1";
$res=mysqli_query($dbh,$sql);
if($del==null)
{
	echo "no value entered";
	echo "<br><br>";
	echo "<a href= 'billupdate.php'>go back</a>";
	exit();
}
elseif(mysqli_num_rows($res)==1)
	{
     $query1=$dbh->query("delete from bill where billid='$del'");
	}
	else
	{
		 echo "<h2>invalid bill id";
		echo "<br><br>";
		echo "<a href= 'billupdate.php'>go back</a>";
		exit();
	}
echo "<br><br>";
echo "<h2>DELETED SUCCESSFULLY!!!!!\n";
echo "<br><br>";
echo "<a href='billview.php'> CLICK HERE TO VIEW RECORDS</a>";
echo "<br><br>";
echo "<a href='bill.html'>CLICK HERE TO GO BACK</a></h2>";
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
  <td width="100"><font size = 5>billid : </font></td>
  <td><input name="billid" type="text" id="billid"</td>
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