<html>
<body bgcolor="palegreen">
<center>


<br>
<hr>
<?php
if(isset($_POST['add'])){
$con=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
//$con=mysql_connect("localhost","root","","armydatabase") or die("cannot connect".mysql_error());


echo "<br><br>";

$purid=$_REQUEST['purid'];
$custid=$_REQUEST['custid'];
$purdate=$_REQUEST['purdate'];
$productid=$_REQUEST['productid'];
$query="INSERT into purchase (`purid`,`custid`,`purdate`,`productid`)values('$purid','$custid','$purdate','$productid')";
$que="select purid from purchase where purid='".$purid."' limit 1";
$res=mysqli_query($con,$que);
$a="select custid from customer where custid='".$custid."' limit 1";
$b=mysqli_query($con,$a);
$c="select productid from product where productid='".$productid."' limit 1";
$d=mysqli_query($con,$c);
$e="select productid from purchase where productid='".$productid."' limit 1";
$f=mysqli_query($con,$e);
if($purid==null)
{
	echo "<h2 align='center'>no value entered</h2>";
	echo "<br><br>";
	echo "<a href= 'purchase.php'>go back</a>";
	exit();
	
}
else
{
	if(mysqli_num_rows($res)==1 && mysqli_num_rows ($f)==1)
	{
		echo "<h2 align='center'>primary key constraint";
	    echo "<br><br>";
        echo "<a href= 'purchase.php'>go back</a></h2>";
	    exit();
	}
		if(mysqli_num_rows($b)!=1)
		{
			echo "<h2 align='center'>parent key not found";
			echo "<br><br>";
			echo "<a href='purchase.php'>go back</a></h2>";
		exit();
		}
				if(mysqli_num_rows($d)!=1)
				{
					echo "<h2 align='center'>parent key not found";
			echo "<br><br>";
			echo "<a href='purchase.php'>go back</a></h2>";
			exit();
					
				}
			else
			{
				$result=$con->query("INSERT into purchase (`purid`,`custid`,`purdate`,`productid`)values('$purid','$custid','$purdate','$productid')");
                    echo "<h2 align='center'><font size = 5>DATA INSERTED SUCESSFULLY!!!!!</font></th></tr>";
                    echo "<br><br>";
                    echo "<a href=purchaseview.php><font color = black size=5pt >  CLICK TO VIEW RECORD</a>";
                    echo "<br><br>";
				    echo "<a href=index1.html> <font color = black size=5pt > CLICK HERE TO GO BACK </a></h2>";
}
}
}
else
{
?>


<form method="post" action ="purchase.php">
<table align ="center" cellpadding="5">

<tr>
<td><font size = 5>purid:</font></td>
<td><input type="text" name="purid" id="purid"required="required" ></td>
</tr>

<tr>
<td><font size = 5>custid:</font></td>
<td><input type="text" name="custid" id="custid"required="required" ></td>
</tr>
<tr>
<td><font size = 5>purdate:</font></td>
<td><input type="text" name="purdate" id="purdate" required="required"></td>
</tr>

<tr>
<td><font size = 5>productid:</font></td>
<td><input type="text" name="productid" id="productid"required="required" ></td>
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



