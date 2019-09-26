<html>
<body bgcolor='violet'>
<body style="background:url(images/p2.jpg);
background-repeat:no-repeat;
background-size:100% 
 100%;
height:800px;
background-attachment:fixed">
</body>
<?php
if(isset($_POST['add'])){
$dbh=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
#dbh1=mysqli_select_db('supermarket') or die(mysqli_error());
$productid=$_REQUEST['productid'];
$prodname=$_REQUEST['prodname'];
$supplierid=$_REQUEST['supplierid'];
$unitprice=$_REQUEST['unitprice'];
$query="INSERT into product (`productid`,`prodname`,`supplierid`,`unitprice`)values('$productid','$prodname','$supplierid','$unitprice')";
$que="select productid from product where productid='".$productid."' limit 1";
$res=mysqli_query($dbh,$que);
$a="select supplierid from supplier where supplierid='".$supplierid."' limit 1";
$b=mysqli_query($dbh,$a);
if($productid==null)
{
	echo "<h2 align='center'>no value entered";
	echo "<br><br>";
	echo "<a href= 'product.php'>go back</a></h2>";
	exit();
}
else
{
	if(mysqli_num_rows($res)==1)
	{
		echo "<h2 align='center'>primary key constraint";
	echo "<br><br>";
	echo "<a href= 'product.php'>go back</a></h2>";
	exit();
	}
	else
	{
		if(mysqli_num_rows($b)==1)
		{
			$result=$dbh->query("INSERT into product (`productid`,`prodname`,`supplierid`,`unitprice`)values('$productid','$prodname','$supplierid','$unitprice')");
           
		}
        else
		{
        echo "<h2 align='center'>parent key not found";
			echo "<br><br>";
			echo "<a href= 'product.php'>go back</a></h2>";
			exit();
		}
    }

echo "<h2 align='center'><font size = 5>DATA INSERTED SUCESSFULLY!!!!!</font></th></tr>";
echo "<br><br>";
echo "<a href=productview.php><font color = black size=5pt >  CLICK TO VIEW RECORD</a>";
echo "<br><br>";
echo "<a href=index1.html> <font color = black size=5pt > CLICK HERE TO GO BACK </a></h2>";
}
}
else{
?>

<body style="background:url(images/product2.jpg);
background-repeat:no-repeat;
background-size:100% 
 100%;
height:800px;
background-attachment:fixed">
<form method="post" action ="product.php">
<table  cellpadding="5">

<tr>
<td><font size = 5 color="white">productid:</font></td>
<td><input type="text" name="productid" id="productid"required="required" ></td>
</tr>

<tr>
<td><font size = 5 color="white">prodname:</font></td>
<td><input type="text" name="prodname" id="prodname"required="required" ></td>
</tr>
<tr>
<td><font size = 5 color="white">supplierid:</font></td>
<td><input type="text" name="supplierid" id="supplierid" required="required"></td>
</tr>

<tr>
<td><font size = 5 color="white">unitprice:</font></td>
<td><input type="text" name="unitprice" id="unitprice"required="required" ></td>
</tr>
</table>
<tr>
<br>

<td><input type="submit"  name="add" id="add" value="insert" ></td>
</tr>

</form>
<?php
}
?> 
<br>

</body>
</html>