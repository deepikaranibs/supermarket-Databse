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
$purid=$_POST['purid'];
$a="select purid from purchase where purid='".$purid."' limit 1";
$b=mysqli_query($conn,$a);
if($purid==null)
{
	echo "<h2 align='center'>no value entered";
	echo "<br><br>";
	echo "<a href='purchaseret.php'>go back</a></h2>";
	exit();
}
else
{
	if(mysqli_num_rows($b)==1)
	{
		
      $sql="select  * from purchase where purid='$purid'";
#dbh=mysqli_select_db('supermarket');
      $result=$conn->query($sql);
	}
	else
	{
		echo "<h2 align='center'>invalid purchaseid";
		echo"<br><br>";
		echo "<a href='purchaseret.php'>go back</a></h2>";
		exit();
	}
}

if(!$result)
{
	die('could not get data:');
}
	echo "<h2 align='center'>Fetched data Successfully\n</h2>";
	echo "<table border size=1 align='center'>";
echo "<tr><th>purid</th><th>custid</th><th>purdate</th><th>productid</th></tr>";



	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>
	                  <td>{$row['purid']}</td>
			  <td>{$row['custid']}</td>
			  <td>{$row['purdate']}</td>
                          <td>{$row['productid']}</td>
                          
	</tr>\n";

	}
	echo "</table>";
	echo "<h2 align='center'><a href='purchase.html'>go back</a></h2>";
	mysqli_close($conn);
}
else{
	?>
	<form method="post" action="" >
	<table width="400" border="0" cellspacing="1" cellpadding="2">
	<tr>
   <td width="100"><font size = 5>purid</td>
   <td><input name="purid" type="text" id="purid"</td>
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