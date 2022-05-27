<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title> Addcustomer/Claws&Paws </title>
  <link rel="stylesheet" href="admindashboard.css">
</head>

<body class="bg">
<style>
body{
	background-image:url('pic1.jpg');
	background-repeat:no-repeat;
	background-attachment:fixed;
	background-size:cover;
	{
</style>
  <center>
    <header>
      <nav>
        <div class="b">
        <input type="button" value="Log out" onclick="window.location.href='logout.php';"/>
        </div>
        <img class="img" height="100px" width="600px" alt="" src="logo FL final.svg">
      </nav>
    </header>
 
    <div class="card">
      <font size="24"<h3> Dashboard </h3></font>
      <div class="flex-container">
     
        <div> 
          <img src="customer.svg" height="150px" width="150px">
        </div>
  
        <div> 
          <img src="pawprints.svg" height="140px" width="150">
        </div>
  
        <div> 
          <img src="supplies.svg" height="140px" width="150px">
        </div>
        
        <div> 
          <img src="box.svg" height="140px" width="160px">
        </div>
      </div>   
    <div class="flex-container">
        
      <div> 
        <input type="button" value="Add Customer" class="btn"  onclick="window.location.href='addcustomer.php';"/> 
      </div>
      
    
      <div> 
        <input type="button" value="Add Pet" class="btn"  onclick="window.location.href='addpet.php';"/> 
      </div>
   
      <div> 
        <input type="button" value="Add Supplier" class="btn" onclick="window.location.href='addsupplier.php';"/> 
      </div>

      <div> 
        <input type="button" value="Cart" class="btn" onclick="window.location.href='cart1.php';"/> 
      </div>
    </div>    
    
    <div class="flex-container">
     
      <div> <input type="submit" value="View Customers" class="btn" onclick="window.location.href='viewcustomer.php';"/> </div>

      <div> <input type="submit" value="View Pets" class="btn" onclick="window.location.href='viewpet.php';"/> </div>

      <div> <input type="submit" value="View Suppliers" class="btn" onclick="window.location.href='viewsupplier.php';"/> </div>

      <div></div>

    </div>
    </div>
  </center>
</body>
</html>