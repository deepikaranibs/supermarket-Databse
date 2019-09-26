<html>
<body bgcolor='violet'>
<?php
if(isset($_POST['add'])){
$dbh=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
#dbh1=mysqli_select_db('supermarket') or die(mysqli_error());
$supplierid=$_REQUEST['supplierid'];
$marketname=$_REQUEST['marketname'];
$contactname=$_REQUEST['contactname'];
$city=$_REQUEST['city'];
$phone=$_REQUEST['phone'];
$query="INSERT into supplier (`supplierid`,`marketname`,`contactname`,`city`,`phone`)values('$supplierid','$marketname','$contactname','$city','$phone')";
$que="select supplierid from supplier where supplierid='".$supplierid."' limit 1";
$res=mysqli_query($dbh,$que);
if($supplierid==null)
{
	echo "<h2 align='center'>no value entered";
	echo "<br><br>";
	echo "<a href= 'supplier.php'>go back</a></h2>";
	exit();
}
else
{
	if(mysqli_num_rows($res)==1)
	{
		echo "<h2 align='center'>primary key constraint</h2>";
	echo "<br><br>";
	echo "<h2 align='center'><a href= 'supplier.php'>go back</a></h2>";
	exit();
	}

$result=$dbh->query("INSERT into supplier (`supplierid`,`marketname`,`contactname`,`city`,`phone`)values('$supplierid','$marketname','$contactname','$city','$phone')");

echo "<h2 align='center'><font size = 5>DATA INSERTED SUCESSFULLY!!!!!</font></th></tr></h2>";
echo "<br><br>";
echo "<h2 align='center'><a href=supplierview.php><font color = black size=5pt >  CLICK TO VIEW RECORD</a></h2>";
echo "<br><br>";
echo "<h2 align='center'><a href=supplier.html> <font color = black size=5pt > CLICK HERE TO GO BACK </a></h2>";
}
}
else{
?>


<form method="post" action ="supplier.php">
<table align ="center" cellpadding="5">

<tr>
<td><font size = 5>supplierid:</font></td>
<td><input type="text" name="supplierid" id="supplierid"required="required" ></td>
</tr>

<tr>
<td><font size = 5>marketname:</font></td>
<td><input type="text" name="marketname" id="marketname"required="required" ></td>
</tr>
<tr>
<td><font size = 5>contactname:</font></td>
<td><input type="text" name="contactname" id="contactname" required="required"></td>
</tr>
<td><font size = 5>city:</font></td>
<td><input type="text" name="city" id="city" required="required"></td>
</tr>
<tr>
<td><font size = 5>phone:</font></td>
<td><input type="text" name="phone" id="phone"required="required" ></td>
</tr>
<tr>



</table>

<tr>
<br>
<center>
<td><input type="submit" align ="center" name="add" id="add" value="insert" ></td>
</tr>
</center>




</form>
<?php
}
?> 

</body>
</html>