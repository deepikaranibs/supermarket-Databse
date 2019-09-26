<html>
<head><title>update</title></head>
<body bgcolor='violet'>
<a align="center" bgcolor="red"></a>
<?php


$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
   die('could not connect');
}
$sql="select * from supplier";
mysqli_select_db($conn,'supermarket');
$res=mysqli_query($conn,$sql);
echo "<table border size=1 align='center'>";
echo "<tr><th>supplierid</th><th>marketname</th><th>contactname</th><th>city</th><th>phone</th></tr>";
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
		 <td>{$arr[4]}</td>
		 
		 </tr>\n";
		 }
		 echo "</table>";
		 $db_host="localhost";
$db_name="supermarket";
$db_user="root";
$db_pass="";
$con=mysqli_connect("$db_host","$db_user","$db_pass") or die ("could not connect");
mysqli_select_db($conn,'supermarket') or die (mysqli_error($conn));
$p0=mysqli_query($conn,"call total_no_of_suppliers(@out);");
$rs=mysqli_query($conn,'SELECT @out');
while($row=mysqli_fetch_row($rs))
{
echo "<h2 align='center'>Total suppliers= $row[0]<br><br>";
}
echo "fetched data successfully!!<br>";
		 
		 mysqli_close($conn);
 ?>
 <br>
 <a href="supplier.html" align='center'>go back</a></h2><br>
 </body>
</html>