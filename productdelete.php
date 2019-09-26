<html>
<body>
<body bgcolor='violet'>
<body style="background:url(images/dal.jpg);
background-repeat:no-repeat;
background-size:100% 
 100%;
height:800px;
background-attachment:fixed">
</body>
<?php
if(isset($_POST['delete'])){
$dbh=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
#dbh=mysqli_select_db('supermarket') or die(mysqli_error());
$del=$_POST['productid'];
$sql="select * from product where productid='".$del."' limit 1";
$res=mysqli_query($dbh,$sql);
if($del==null)
{
	echo "<h2 align='center'>no value entered";
	echo "<br><br>";
	echo "<a href= 'product.html'>go back</a></h2>";
	exit();
}
elseif(mysqli_num_rows($res)==1)
	{
     $query1=$dbh->query("delete from product where productid='$del'");
	}
	else
	{
		 echo "<h2 align='center'>invalid product id";
		echo "<br><br>";
		echo "<a href= 'product.html'>go back</a></h2>";
		exit();
	}
echo "<br><br>";
echo "<h2 align='center'>DELETED SUCCESSFULLY!!!!!\n";
echo "<br><br>";
echo "<a href='productview.php'> CLICK HERE TO VIEW RECORDS</a>";
echo "<br><br>";
echo "<a href='product.html'>CLICK HERE TO GO BACK</a></h2>";
mysqli_close($dbh);
}
else
{
  ?>
  <form method="post" action="" >
  <table width="400" border="0" cellspacing="1" cellpadding="2" align="center">
  <tr>
  <td width="100"><font size = 5>productid : </font></td>
  <td><input name="productid" type="text" id="productid"</td>
  </tr>
  <tr>
  <td width="100"></td>
  <td></td>
  </tr>
  <td width="100"></td>
  <td>
  <input name="delete" type="submit" id="delete" value="DELETE">
  </td>
  </tr>
  </table>
  </form>
 <?php 
}
?>
</body>
</html>
