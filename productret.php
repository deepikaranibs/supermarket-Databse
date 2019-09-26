<html>
<body>
<body style="background:url(images/ret.jpg);
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
$productid=$_POST['productid'];
$a="select productid from product where productid='".$productid."' limit 1";
$b=mysqli_query($conn,$a);
if($productid==null)
{
	echo "<h2 align='center'>no value entered</h2>";
	echo "<br><br>";
	echo "<h2 align='center'><a href='productret.php'>go back</a></h2>";
	exit();
}
else
{
	if(mysqli_num_rows($b)==1)
	{
		
      $sql="select  * from product where productid='$productid'";
#dbh=mysqli_select_db('supermarket');
      $result=$conn->query($sql);
	}
	else
	{
		echo "<h2 align='center'>invalid bill id</h2>";
		echo"<br><br>";
		echo "<h2 align='center'><a href='productret.php'>go back</a></h2>";
		exit();
	}
}

if(!$result)
{
	die('could not get data:');
}
	echo "<h2>Fetched data Successfully\n</h2>";
	echo "<table border size=1 bgcolor='white' align='center'><font color='white'>";
echo "<tr><th>productid</th><th>prodname</th><th>supplierid</th><th>unitprice</th></tr>";



	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>
	                  <td>{$row['productid']}</td>
			  <td>{$row['prodname']}</td>
			  <td>{$row['supplierid']}</td>
                          <td>{$row['unitprice']}</td>
                          
	</tr>\n";

	}
	echo "</table>";
	echo "<h2 ><font color='white'><a href='product.html'>go back</a></h2>";
	mysqli_close($conn);
}
else{
	?>
	<form method="post" action="" >
	<table width="400" border="0" cellspacing="1" cellpadding="2" >
	<tr>
   <td width="100"><font size=5 color="white">productid</td>
   <td><input name="productid" type="text" id="productid"</td>
   </tr>
   <tr>
  <td width="100"></td>
  <td></td>
  </tr>
  <td width="100"></td>
  <td>
  <input name="retrieve" type="submit" id="retrieve" value="RETRIEVE">
  </td>
  </font>
  </tr>
  </table>
  </form>
<?php 
}
   
?> 
<br>
  
</body>
</html>