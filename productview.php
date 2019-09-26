<html>
<head><title>update</title></head>
<body>
<body style="background:url(images/deepi.jpg);
background-repeat:no-repeat;
background-size:100% 
 100%;
height:800px;
background-attachment:fixed">
</body>

<?php


$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
   die('could not connect');
}
$sql="select * from product";
mysqli_select_db($conn,'supermarket');
$res=mysqli_query($conn,$sql);

echo "<table border size=1 align='center'>";
echo "<tr><th>productid</th><th>prodname</th><th>supplierid</th><th>unitprice</th></tr>";
if(!$res)
{
die('could not get data');
}
while($arr=mysqli_fetch_row($res))
{
	echo "<h4 color='white'>";
   echo "<tr>
         <td>{$arr[0]}</td>
		 <td>{$arr[1]}</td>
		 <td>{$arr[2]}</td>
		 <td>{$arr[3]}</td>
		 </tr>\n";
		 echo "</h4>";
		 }
		 echo "</table>";
		 $db_host="localhost";
$db_name="supermarket";
$db_user="root";
$db_pass="";
$con=mysqli_connect("$db_host","$db_user","$db_pass") or die ("could not connect");
mysqli_select_db($conn,'supermarket') or die (mysqli_error($conn));
$p0=mysqli_query($conn,"call total_no_of_products(@out);");
$rs=mysqli_query($conn,'SELECT @out');
while($row=mysqli_fetch_row($rs))
{
echo "<h2 align='center'>Total Products= $row[0]<br>";
}
		 echo "<h2 align='center'>fetched data succeessfully!!!!\n";
		 mysqli_close($conn);
 ?>
 <br>
 <a href="product.html">go back</a></h2><br>

 </body>
</html>