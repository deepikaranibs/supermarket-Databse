<html>
<body bgcolor="palegreen">
<body style="background:url(images/bill2.jpg);
background-repeat:no-repeat;
background-size:100% 
 100%;
height:800px;
background-attachment:fixed">
</body>
<?php
if(isset($_POST['add'])){
$con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
//$con=mysql_connect("localhost","root","","armydatabase") or die("cannot connect".mysql_error());


echo "<br><br>";

$billid=$_REQUEST['billid'];
$custid=$_REQUEST['custid'];
$phone=$_REQUEST['phone'];
$custname=$_REQUEST['custname'];
$purid=$_REQUEST['purid'];
$totalamt=$_REQUEST['totalamt'];
$afterdiscount=null;
$query="INSERT into bill (`billid`,`custid`,`custname`,`phone`,`purid`,`totalamt`,`afterdiscount`)values('$billid','$custid','$custname','$phone','$purid','$totalamt','$afterdiscount')";
$que="select billid from bill where billid='".$billid."' limit 1";
$res=mysqli_query($con,$que);
$a="select custid from customer where custid='".$custid."' limit 1";
$b=mysqli_query($con,$a);
$c="select purid from purchase where purid='".$purid."' limit 1";
$d=mysqli_query($con,$c);

if($billid==null)
{
	echo "<h2 align='center'>no value entered</h2>";
	echo "<br><br>";
	echo "<a href= 'bill.php'>go back</a>";
	exit();
}
else
{
		if(mysqli_num_rows($b)!=1)
		{
			echo "<h2 align='center'>parent key not found";
			echo "<br><br>";
			echo "<h2><a href='bill.php'>go back</a></h2>";
			exit();
	    }
		if(mysqli_num_rows($d)!=1)
			{
			echo "<h2 align='center'>parent key not found";
			echo "<br><br>";
			echo "<h2><a href='bill.php'>go back</a></h2>";
			exit();
			}
	
	
$result=$con->query("INSERT into bill (`billid`,`custid`,`custname`,`phone`,`purid`,`totalamt`,`afterdiscount`)values('$billid','$custid','$custname','$phone','$purid','$totalamt','$afterdiscount')");


echo "<h2 align='center'><font size = 5 color='white'>DATA INSERTED SUCESSFULLY!!!!!</th></font></tr>";
echo "<br><br>";
echo "<a href=billview.php><font  size=5pt color='white'>  CLICK TO VIEW RECORD</font></a>";
echo "<br><br>";
echo "<a href=index1.html> <font  size=5pt color='white'> CLICK HERE TO GO BACK </font></a></h2>";
}
}
else{
?>


<form method="post" action ="bill.php">
<table cellpadding="5">

<tr>
<td><font size = 5 color="white">billid:</font></td>
<td><input type="text" name="billid" id="billid"required="required" ></td>
</tr>

<tr>
<td><font size = 5 color="white">custid:</font></td>
<td><input type="text" name="custid" id="custid"required="required" ></td>
</tr>
<tr>
<td><font size = 5 color="white">custname:</font></td>
<td><input type="text" name="custname" id="custname" required="required"></td>
</tr>

<tr>
<td><font size = 5 color="white">phone:</font></td>
<td><input type="text" name="phone" id="phone"required="required" ></td>
</tr>
<tr>
<td><font size = 5 color="white">purid:</font></td>
<td><input type="text" name="purid" id="purid" required="required"></td>
</tr>
<tr>
<td><font size = 5 color="white">totalamt:</font></td>
<td><input type="text" name="totalamt" id="totalamt" required="required"></td>
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



