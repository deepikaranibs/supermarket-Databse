<html>
<body>
<body style="background:url(images/bill5.jpg);
background-repeat:no-repeat;
background-size:100% 
 100%;
height:800px;
background-attachment:fixed">
</body>
<?php
if(isset($_POST['retrieve']))
{

$conn=mysqli_connect("localhost","root","",'supermarket');
if(!$conn)
{
	die('could not connect:');
}
$billid=$_POST['billid'];
$a="select billid from bill where billid='".$billid."' limit 1";
$b=mysqli_query($conn,$a);
if($billid==null)
{
	echo "<h2 align='center'>no value entered</h2>";
	echo "<br><br>";
	echo "<h2 align='center'><a href='billret.php'>go back</a></h2>";
	exit();
}
else
{
	if(mysqli_num_rows($b)==1)
	{
		
      $sql="select  * from bill where billid='$billid'";
#dbh=mysqli_select_db('supermarket');
      $result=$conn->query($sql);
	}
	else
	{
		echo "<h2 align='center'>invalid bill id</h2>";
		echo"<br><br>";
		echo "<h2 align='center'><a href='billret.php'>go back</a></h2>";
		exit();
	}
}

if(!$result)
{
	die('could not get data:');
}
	echo "<h2 align='center'><font color='white'>Fetched data Successfully\n</h2>";
	echo "<table border size=1 align='center' bgcolor='white'><font color='white'>";
echo "<tr><th>billid</th><th>custid</th><th>custname</th><th>phone</th><th>purid</th><th>totalamt</th><th>afterdiscount</th></tr>";



	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>
	                  <td>{$row['billid']}</td>
			  <td>{$row['custid']}</td>
			  <td>{$row['custname']}</td>
                          <td>{$row['phone']}</td>
                          <td>{$row['purid']}</td>
						  <td>{$row['totalamt']}</td>
						  <td>{$row['afterdiscount']}</td>
	</tr>\n";

	}
	echo "</table>";
	echo "<h2 align='center'><a href='bill.html'>go back</a></h2>";
	mysqli_close($conn);
}
else{
	?>
	<form method="post" action="" >
	<table width="400" border="0" cellspacing="1" cellpadding="2">
	<tr>
   <td width="100"><font color="white">billid:</td>
   <td><input name="billid" type="text" id="billid"</td>
   </tr>
   <tr>
  <td width="100"></td>
  <td></td>
  </tr>
  <td width="100"></td>
  <td>
  <input name="retrieve" type="submit" id="retrieve" value="RETRIEVE">
  </td>
  </tr>
  </table>
  </form>
<?php 
}
   
?> 
<br>
  
</body>
</html>