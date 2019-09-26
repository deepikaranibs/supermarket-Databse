<html>
<head><title>BILL DETAILS</title></head>
<body>
<body style="background:url(images/bill6.jpg);
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
$sql="select * from bill";
mysqli_select_db($conn,'supermarket');
$res=mysqli_query($conn,$sql);
echo "<table border size=1 bgcolor='white'><font color='white'>";
echo "<tr><th>billid</th><th>custid</th><th>custname</th><th>phone</th><th>purid</th><th>totalamt</th><th>afterdiscount</th></tr>";
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
		 <td>{$arr[5]}</td>
		 <td>{$arr[6]}</td>
		 </tr>\n";
		 }
		 echo "</table>";
		 echo "<h2>fetched data succeessfully!!!!\n</h2>";
		 mysqli_close($conn);
 ?>
 <h2><a href="bill.html"><font clor="white">go back</a></h2><br>
 </body>
</html>