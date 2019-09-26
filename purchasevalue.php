<html>
<head><title>PURCHASE DETAILS</title></head>
<body bgcolor="palegreen">
<?php


$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
   die('could not connect');
}
$sql="select * from purchase";
mysqli_select_db($conn,'supermarket');
$res=mysqli_query($conn,$sql);
echo "<table border size=1 align='center'>";
echo "<tr><th>purid</th><th>custid</th><th>purdate</th><th>productid</th></tr>";
if(!$res)
{
die('could not get data');
}
while($arr=mysqli_fetch_row($res))
{
   echo "<tr>
         <td>{$arr[0]}</td>
		 <td>{$arr[1]}</td>
		 <td>{$arr[2]}</td>
		 <td>{$arr[3]}</td>
		 </tr>\n";
		 }
		 echo "</table>";
		 echo "<h2 align='center'>fetched data succeessfully!!!!\n</h2>";
		 mysqli_close($conn);
 ?>
 <br>
 <h2 align='center'><a href="purchase.html">go back</a></h2><br>
 </body>
</html>