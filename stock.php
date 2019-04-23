<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."index.php");
exit();
}
if(isset($_POST['submit'])){
$sid=$_POST['stock_id'];
$sname=$_POST['drug'];
$qua=$_POST['quantity'];
$com=$_POST['company'];
$cost=$_POST['cost'];
$des=$_POST['description'];
$exp=date('Y-m-d',$_POST['expiry_date']);

$sql=mysqli_query($con,"INSERT INTO STOCK VALUES('$sid',$sname','$qua','$com','$cost','$des','$exp');");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock.php");
}else{
$message1="<font color=red>Adding Failed, Try again</font>";
echo $message1;
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>PESU PHARMA</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/bootstrap.min.css" type="text/css" /> 
<link rel="stylesheet" href="style/jquery.dataTables.min.css" type="text/css" /> 

<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!-- DATA TABES SCRIPT -->
<script src="js/datatables/jquery.dataaTables.js" type="text/javascript"></script>
<script src="js/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="js/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>

<script type="text/javascript">
 $(document).ready(function() {
    $('#table1').DataTable( {
        "lengthMenu": [[7], [7]]
    } );
} );
  </script> 
<script src="js/function.js" type="text/javascript"></script>
<script src="js/validation_script.js" type="text/javascript"></script>
</head>
<body>
<div id="content">
<div id="header">
<h1><a href="#"><img src="images/hd_logo.jpg"></a>  PESU PHARMA</h1></div>
<div id="left_column">
<div id="button">
        <ul>
			<li><a href="admin.php">Dashboard</a></li>
            <li><a href="stock.php">Stock</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			<li><a href="admin_supplier.php">Supplier</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>	
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Stock</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Stock</a></li>  
             
        </ul>  
          
        <div id="content_1" class="content">   
		<?php
		/* 
		View
        Displays all data from 'Stock' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysqli_query($con,"SELECT * FROM STOCK") 
                or die(mysqli_error($con));
		// display data in table
        echo '<table id="table1" class="table table-bordered table-striped" border="1" cellpadding="5" align="center">';
         echo "<thead><tr><th>ID</th><th>Name</th><th>Company</th><th>Expiry Date</th><th>Delete</th></tr></thead><tbody>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                 echo '<td>' . $row['stock_id'] . '</td>';               
                echo '<td>' . $row['drug'] . '</td>';
				echo '<td>' . $row['company'] . '</td>';
				echo '<td>' . $row['expiry_date'] . '</td>';?>
				<td><a href="delete_stock.php?stock_id=<?php echo $row['stock_id']?>"><img src="images/delete-icon.jpg" width="24" height="24" border="0" /></a></td>
				<?php
		 } 
        // close table>
        echo "</tbody></table>";
?>
        </div>  
        <div id="content_2" class="content">
         <!--Add Drug-->
		 <?php /*echo $message;
			  echo $message1;*/
			  ?>
			<form name="myform" onsubmit="return validateForm(this);" action="stock.php" method="post" >
			<table width="220" height="106" border="0" >
				<tr><td align="center"><input name="stock_id" type="text" style="width:170px" placeholder="Stock ID" required="required" id="stock_id" /></td></tr>
				<tr><td align="center"><input name="drug" type="text" style="width:170px" placeholder="Drug Name" required="required" id="drug" /></td></tr>
				<tr><td align="center"><input name="quantity" type="text" style="width:170px" placeholder="Quantity" required="required" id="quantity" /></td></tr>
				<tr><td align="center"><input name="company" type="text" style="width:170px" placeholder="Manufacturing Company"  required="required" id="company" /></td></tr>  
				<tr><td align="center"><input name="cost" type="text" style="width:170px" placeholder="Unit Cost" required="required" id="cost" /></td></tr>
				<tr><td align="center"><input name="description" type="text" style="width:170px" placeholder="Description" required="required" id="description" /></td></tr>
				<tr><td align="center"><input name="expiry_date" type="Date" style="width:170px" placeholder="Expiry Date" required="required" id="expiry_date" /></td></tr>  
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