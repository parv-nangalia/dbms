<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['Admin_id'];
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
if(isset($_POST['submit'])){
$name=$_POST['Cashier_Name'];
if (!preg_match("/^[a-zA-Z ]*$/",name))
  {
  $nameErr = "Only letters and white space allowed";
  }
$sex=$POST['Cashier_Sex'];
$phone=$_POST['Cashier_Phone'];
$user=$_POST['username'];
$pas=$_POST['password'];
$id=$_POST['Admin_id'];
$sql1=mysqli_query($con,"SELECT * FROM cashier WHERE username='$user'")or die(mysqli_error($con));
 $result=mysqli_fetch_array($sql1);
 if($result>0){
$message="<font color=blue>sorry the username entered already exists</font>";
 }else{
$sql=mysqli_query($con,"INSERT INTO cashier(cashier_id,Cashier_Name,Cashier_Sex,Cashier_Phone,username,password,Admin_id)
VALUES('$name','$sex','$phone','$user','$pas','$id'");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_cashier.php");
}else{
$message1="<font color=red>Registration Failed, Try again</font>";
}
	}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $username;?>PHARMACY</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<script src="js/validation_script.js" type="text/javascript"></script>
<!--<script>
function validateForm()
{

//for alphabet characters only
var str=document.form1.first_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("First Name Cannot Contain Numerical Values");
	document.form1.first_name.value="";
	document.form1.first_name.focus();
	return false;
	}}
	
if(document.form1.first_name.value=="")
{
alert("Name Field is Empty");
return false;
}

//for alphabet characters only
var str=document.form1.last_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Last Name Cannot Contain Numerical Values");
	document.form1.last_name.value="";
	document.form1.last_name.focus();
	return false;
	}}
	

if(document.form1.last_name.value=="")
{
alert("Name Field is Empty");
return false;
}

}

</script>-->
 <style>
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
			<li><a href="admin_supplier.php">Supplier</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Cashier</h4> 
<hr/>	
    <div class="tabbed_area">  
	
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View User</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add User</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php /*echo $message;
			  echo $message1;*/
			  
		/* 
		View
        Displays all data from 'Cashier' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysqli_query($con,"SELECT * FROM CASHIER") 
                or die(mysqli_error($con));
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5' align='center'>";
        echo "<tr> <th>ID</th><th>Firstname </th> <th>Lastname </th> <th>Username </th><th>Update </th><th>Delete</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['Cashier_id'] . '</td>';
                echo '<td>' . $row['Cashier_Name'] . '</td>';
				echo '<td>' . $row['Cashier_Phone'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				?>
				<td><a href="update_cashier.php?username=<?php echo $row['username']?>"><img src="images/update-icon.png" width="35" height="35" border="0" /></a></td>
				<td><a href="delete_cashier.php?cashier_id=<?php echo $row['cashier_id']?>"><img src="images/delete-icon.jpg" width="35" height="35" border="0" /></a></td>
				<?php
		} 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">  
		           <!--Cashier-->
		<?php /*echo $message;
			  echo $message1;*/
			  ?>
		<form name="form1"  onsubmit="return validateForm(validation_script.js);" action="admin_cashier.php" method="post" >
			<table width="220" height="106" border="0" >	
				<tr><td align="center"><input name="Cashier_Name" type="text" style="width:170px" placeholder="First Name" required="required"  id="Cust_Name" /></td></tr>
				<tr><td align="center"><input name="Cashier_Sex" type="text" style="width:170px" placeholder="Sex" required="required" id="Cust_Sex" /></td></tr>  
				<tr><td align="center"><input name="Cashier_Phone" type="text" style="width:170px"placeholder="Phone"  required="required" id="Cust_Phone" /></td></tr>   
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td align="center"><input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password"/></td></tr>
				<tr><td align="center"><input name="Admin_id" type="text" style="width:170px" placeholder="Foreign Key (if any)" required="required" id="Admin_id" /></td></tr>
				<tr><td align="right"><input name="submit" type="submit" value="Submit"></td></tr>
				
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