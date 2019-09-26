<html>
<body bgcolor='violet'>
<?php
if(isset($_POST['retrieve']))
{

$conn=mysqli_connect("localhost","root","",'supermarket');
if(!$conn)
{
	die('could not connect:');
}
$supplierid=$_POST['supplierid'];
$a="select supplierid from supplier where supplierid='".$supplierid."' limit 1";
$b=mysqli_query($conn,$a);
if($supplierid==null)
{
	echo "<h2 align='center'>no value entered</h2>";
	echo "<br><br>";
	echo "<h2 align='center'><a href='supplierret.php'>go back</a></h2>";
	exit();
}
else
{
	if(mysqli_num_rows($b)==1)
	{
		
      $sql="select  * from supplier where supplierid='$supplierid'";
#dbh=mysqli_select_db('supermarket');
      $result=$conn->query($sql);
	}
	else
	{
		echo "<h2 align='center'>invalid supplier id</h2>";
		echo"<br><br>";
		echo "<h2 align='center'><a href='supplierret.php'>go back</a></h2>";
		exit();
	}
}

if(!$result)
{
	die('could not get data:');
}
	echo "<h2 align='center'>Fetched data Successfully\n</h2>";
	echo "<table border size=1 align='center'>";
echo "<tr><th>supplierid</th><th>marketname</th><th>contactname</th><th>city</th><th>country</th><th>phone</th></tr>";



	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>
	                  <td>{$row['supplierid']}</td>
			  <td>{$row['marketname']}</td>
			  <td>{$row['contactname']}</td>
                          <td>{$row['city']}</td>
                          <td>{$row['country']}</td>
						  <td>{$row['phone']}</td>
						  
	</tr>\n";

	}
	echo "</table>";
	echo "<h2 align='center'><a href='supplier.html'>go back</a></h2>";
	mysqli_close($conn);
}
else{
	?>
	<form method="post" action="" >
	<table width="400" border="0" cellspacing="1" cellpadding="2"align="center" >
	<tr>
   <td width="100"><font size=5>supplierid</td>
   <td><input name="supplierid" type="text" id="supplierid"</td>
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