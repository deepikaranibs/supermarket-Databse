<html>
<body>
<body bgcolor="coral">
<center>
<img src="army10.jfif"/>
<hr>
<?php
$dbh=mysqli_connect('localhost','root','')or die(mysqli_error());
mysqli_select_db($dbh,'supermarket') or die(mysqli_error());

$var=mysqli_query($dbh,"SELECT * FROM purchase");

echo "<br><br>";

echo "<table border size=1 align=center>";
   echo"<tr><th><font size = 5> purid</font> </th><th><font size = 5> purdate</font> </th><th> <font size = 5>custid</font>  </th><th> <font size = 5>totalamt</font>  </th></tr>";
  while ($arr=mysqli_fetch_row($var))
   {
   echo"<tr><td><font size = 5>$arr[0]</font> </td><td><font size = 5>$arr[1]</font> </td> <td><font size = 5>$arr[2]</font> </td> <td><font size = 5>$arr[3]</font> </td>  </tr>";
   } 
   echo"</table>";
      
/*$p0=mysql_query("call Sum2(@out);");
$rs=mysql_query('SELECT @out');
while ($arr=mysql_fetch_row($rs))
{
	echo '<br><br>';
	echo "<tr><td><font size = 5>Total no of locations  :   $arr[0] </font></td></tr>";
}*/
   
   echo "<br><br>";
   echo "<a href=purchase.html> <font color = black size=5pt > CLICK HERE TO GO BACK </a>";
   echo"<br><br>";
   echo "<a href=index.html><font color = black size=5pt >  CLICK HERE TO GO BACK TO MAIN PAGE</a>";
  
   
    mysqli_close($dbh);
   ?>
     </body>
</html>



