<?php
include_once 'connect_db.php';
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$position=$_POST['position'];
switch($position){
case 'Admin':
$result=mysqli_query($con,"SELECT admin_id, username FROM ADMINISTRATOR WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['admin_id']=$row[0];
$_SESSION['username']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Supplier':
$result=mysqli_query($con,"SELECT supplier_id, supplier_name,supplier_id,username FROM SUPPLIER WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['supplier_id']=$row[0];
$_SESSION['supplier_name']=$row[1];
$_SESSION['supplier_id']=$row[2];
$_SESSION['username']=$row[3];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Cashier':
$result=mysqli_query($con,"SELECT cashier_id,cashier_name FROM CASHIER WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['username']=$username;
$_SESSION['cashier_id']=$row[0];
$_SESSION['cashier_name']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier1.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
echo $message;
}
break;
case 'Customer':
$result=mysqli_query($con,"SELECT cust_id, cust_fname,cust_lname,username FROM CUSTOMER WHERE username='$username' AND password='$password'");
$row=mysqli_fetch_array($result);
if($row>0){
session_start();
$_SESSION['cust_id']=$row[0];
$_SESSION['cust_fname']=$row[1];
$_SESSION['cust_lname']=$row[2];
$_SESSION['username']=$row[3];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/customer.php");
}else{
$message="<font color=red>Invalid login Try Again</font>";
}
break;
}}
echo <<<LOGIN
<!DOCTYPE html>
<html>
<head>
<title>PHARMACY</title>
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<style>
#content {
height: auto;
}
#main{
height: auto;}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><img src="images/hd_logo.jpg"> PESU PHARMA </h1>
</div>
<div id="main">

  <section class="container">
  
     <div class="login">
	 <img src="images/hd_logo.jpg">
      <h1>Login here</h1>
	        <form method="post" action="index.php">
		 <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
		<p><select name="position">
		<option>--Select position--</option>
			<option>Admin</option>
			<option>Supplier</option>
			<option>Cashier</option>
			<option>Customer</option>
			</select></p>
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>
    </section>
</div>
<div id="footer" align="Center"> PESU PHARMA - 2019</div>
</div>
</body>
</html>
LOGIN;
?>
