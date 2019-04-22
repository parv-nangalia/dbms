<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$user=$_SESSION['username'];
$id=$_SESSION['cashier_id'];
$name=$_SESSION['cashier_name'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>PESU PHARMA</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<style>
#left_column{
height: 470px;
}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a>PESU PHARMA</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="cashier1.php">Dashboard</a></li>
			<li><a href="view.php">View Users</a></li>
			<li><a href="view_prescription.php">View Prescription</a></li>
			<li><a href="invoice.php">Create Invoice</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
</div>
</div>
<div id="main">
            <div class="grid_7">
				<a href="view.php" class="dashboard-module">
                	<img src="images/patients_1.png"  width="100" height="100" alt="edit" />
                	<span>View Users</span>
                </a>
				<a href="view_prescription.php" class="dashboard-module">
                	<img src="images/prescri.jpg" width="100" height="100" alt="edit" />
                	<span>View Prescription</span>
				</a>
                <a href="invoice.php" class="dashboard-module">
                    <img src="images/Invoice.png"  width="100" height="100" alt="edit" />
                    <span>Create Invoices</span>
                </a>
        </div>
</div>
<div id="footer" align="Center"> PESU PHARMA - 2019</div>
</div>
</body>
</html>
