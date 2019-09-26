<body style="background:url(images/scott.jpg);
background-repeat:no-repeat;
background-size:100% 
 100%;
height:800px;
background-attachment:fixed">
</body>
<?php
$dbh=mysqli_connect('localhost','root','','supermarket') or die(mysqli_error());
mysqli_select_db($dbh,'supermarket') or die(mysqli_error($dbh));
 if(isset($_POST['update']))
  {
        $productid=$_POST['productid'];
        $prodname=$_POST['prodname'];
        $sql="select * from product where productid='".$productid."' limit 100";
        $result=mysqli_query($dbh,$sql);
       if($productid==null)
       {
	      echo "<h2 align='center'>no value given";
	      echo "<br><br>";
	      echo "<a href= 'productupdate.php'>go back</a></h2><br>";
		  exit();
       }
       else
       {
    	if(mysqli_num_rows($result)==1)
	    {
		
          $sql1="update product set prodname='$prodname' where productid='$productid'";
         $ret=$dbh->query($sql1);
		 if(!$ret)
		 {
			 echo "could not update data";
		 }
	      echo "<h2 align='center'><font color='white'>updated successfully</font>\n";
		  echo "<br><br>";
          echo "<a href='productview.php'><font color='white'>view record</a></h2>";
		  exit();
	}
	else
	{
		echo "<h2 align='center'>invalid productid";
		 echo "<br><br>";
		 echo "<a href= 'productupdate.php'>go back</a></h2>";
		 exit();
	}
}

 }
 else
 {
?>
<html>
<head><title>update</title></head>
<body>

 <h2><form method="post" action="">
 <table width "400" border="0" cellspacing="1" cellpadding="2" >
 <font color="white">
 <tr>
 <td width="100"><font size=5 color="white">productid</td>
 <td><input name="productid" type="text" id="productid"</td>
 </tr>
 </font>
 <tr>
 <td width="100"><font size=5 color="white">prodname</td>
 <td><input name="prodname" type="text" id="prodname"</td>
</tr>
</font>
<tr>
<td width="100"></td>
<td></td>
</tr>
<td width="100"></td>
<td>
<input name="update" type="submit" id="update" value="UPDATE">
</td>
</tr>
</font>
</h2>
</table>
</form>
 <?php
 }
 ?>
</body>
</html>