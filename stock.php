<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
$sname=$_POST['Drug'];
$qua=$_POST['Quantity'];
$com=$_POST['Company'];
$cost=$_POST['Cost'];
$des=$_POST['Description'];
$exp=$POST['Expiry_date']

$sql=mysqli_query($con,"INSERT INTO stock(Drug,Quantity,Company,Cost,Description,Expiry_date)
VALUES('$sname','$qua','$com','$cost','$des','des',$exp')");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?>PHARMACY</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<style>#left-column {height: 477px;}
 #main {height: 477px;}</style>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a>  PESU PHARMA</h1></div>
<div id="left_column">
<div id="button">
        <ul>
			<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_pharmacist.php">Supplier</a></li>
			<li><a href="admin_Supplier.php">Supplier</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Stock</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Stock</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Medicine</a></li>  
             
        </ul>  
          
        <div id="content_1" class="content">  
		 <?php /*echo $message;
			  echo $message1;*/
			  ?>
      
		<?php
		/* 
		View
        Displays all data from 'Stock' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysqli_query($con,"SELECT * FROM stock") 
                or die(mysqli_error($con));
		// display data in table
        echo "<table border='1' cellpadding='3'>";
         echo "<tr><th>ID</th><th>Name</th><th>Company</th><th>Description</th><th>Expiry Date</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['stock_ID'] . '</td>';               
                echo '<td>' . $row['Drug'] . '</td>';
				echo '<td>' . $row['Company'] . '</td>';
				echo '<td>' . $row['Description'] . '</td>';
				echo '<td>' . $row['Expiry_date'] . '</td>';?>
				<td><a href="delete_stock.php?stock_id=<?php echo $row['stock_id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
         <!--Add Drug-->
		 <?php /*echo $message;
			  echo $message1;*/
			  ?>
			<form name="myform" onsubmit="return validateForm(this);" action="stock.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="Drug" type="text" style="width:170px" placeholder="Drug Name" required="required" id="Drug" /></td></tr>
				<tr><td align="center"><input name="Quantity" type="text" style="width:170px" placeholder="Quantity" required="required" id="Quantity" /></td></tr>
				<tr><td align="center"><input name="Company" type="text" style="width:170px" placeholder="Manufacturing Company"  required="required" id="Company" /></td></tr>  
				<tr><td align="center"><input name="cost" type="text" style="width:170px" placeholder="Unit Cost" required="required" id="cost" /></td></tr>
				<tr><td align="center"><input name="Description" type="text" style="width:170px" placeholder="Description" required="required" id="Description" /></td></tr>
				<tr><td align="center"><input name="Expiry_date" type="Date" style="width:170px" placeholder="Expiry Date" required="required" id="Expiry_date" /></td></tr>  
				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
            </table>
		</form>
        </div>  
              
    </div>  
  
</div>
 
</div>
<div id="footer" align="Center"> PESU PHARMA - 2019</div>
</div>
</body>
</html>
