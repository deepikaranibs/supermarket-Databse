<html>
<body bgcolor="violet">
<?php
if(isset($_POST['add'])){
$dbh=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
#dbh1=mysqli_select_db('supermarket or die(mysqli_error());
$custid=$_REQUEST['custid'];
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$city=$_REQUEST['city'];
$phone=$_REQUEST['phone'];
$query="INSERT into customer (`custid`,`fname`,`lname`,`city`,`phone`)values('$custid','$fname','$lname','$city','$phone')";
$que="select custid from customer where custid='".$custid."' limit 1";
$res=mysqli_query($dbh,$que);
if($custid==null)
{
	echo "<h2 align='center'>no value entered";
	echo "<br><br>";
	echo "<a href= 'customer.php'>go back</a></h2>";
	exit();
}
else
{
	if(mysqli_num_rows($res)==1)
	{
		echo "<h2 align='center'>primary key constraint";
	echo "<br><br>";
	echo "<a href= 'customer.php'>go back</a></h2>";
	exit();
	}
$result=$dbh->query("INSERT into customer (`custid`,`fname`,`lname`,`city`,`phone`)values('$custid','$fname','$lname','$city',,'$phone')");


echo "<h2 align='center'><font size = 5>DATA INSERTED SUCESSFULLY!!!!!</font></th></tr>";
echo "<br><br>";
echo "<a href=customerview.php><font color = black size=5pt >  CLICK TO VIEW RECORD</a>";
echo "<br><br>";
echo "<a href=customer.html> <font color = black size=5pt > CLICK HERE TO GO BACK </a></h2>";
}
}

else
{
?>
<form method="post" action ="customer.php">
<table align ="center" cellpadding="5">

<tr>
<td><font size = 5>custid:</font></td>
<td><input type="text" name="custid" id="custid"required="required" ></td>
</tr>
<tr>
<td><font size = 5>fname:</font></td>
<td><input type="text" name="fname" id="fname" required="required"></td>
</tr>
<tr>
<td><font size = 5>lname:</font></td>
<td><input type="text" name="lname" id="lname"required="required" ></td>
</tr>
<tr>
<td><font size = 5>city:</font></td>
<td><input type="text" name="city" id="city" required="required"></td>
</tr>
<tr>
<td><font size = 5>phone:</font></td>
<td><input type="text" name="phone" id="phone"required="required" ></td>
</tr>
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
<br>

</body>
</html>