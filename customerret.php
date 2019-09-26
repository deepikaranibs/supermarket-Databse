<html>
<body bgcolor="palegreen">
<?php
if(isset($_POST['retrieve']))
{

$conn=mysqli_connect("localhost","root","",'supermarket');
if(!$conn)
{
	die('could not connect:');
}
$custid=$_POST['custid'];
$a="select custid from customer where custid='".$custid."' limit 1";
$b=mysqli_query($conn,$a);
if($custid==null)
{
	echo "<h2 align='center'>no value entered";
	echo "<br><br>";
	echo "<a href='customer.html'>go back</a></h2>";
	exit();
}
else
{
	if(mysqli_num_rows($b)==1)
	{
		
      $sql="select  * from customer where custid='$custid'";
#dbh=mysqli_select_db('supermarket');
      $result=$conn->query($sql);
	}
	else
	{
		echo "<h2 align='center'>customerid doesn't exist";
		echo"<br><br>";
		echo "<a href='customer.html'>go back</a></h2>";
		exit();
	}
}

if(!$result)
{
	die('could not get data:');
}
	echo "<h2 align='center'>Fetched data Successfully\n</h2>";
	echo "<table border size=1 align='center'>";
echo "<tr><th>custid</th><th>fname</th><th>lname</th><th>city</th><th>phone</th></tr>";



	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>
	                  <td>{$row['custid']}</td>
			  <td>{$row['fname']}</td>
			  <td>{$row['lname']}</td>
                          <td>{$row['city']}</td>
						  <td>{$row['phone']}</td>
	</tr>\n";

	}
	echo "</table>";
	echo "<h2 align='center'><a href='customer.html'>go back</a></h2>";
	mysqli_close($conn);
}
else{
	?>
	<form method="post" action="" >
	<table width="400" border="0" cellspacing="1" cellpadding="2">
	<tr>
   <td width="100">custid</td>
   <td><input name="custid" type="text" id="custid"</td>
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