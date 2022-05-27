<html lang="en-us" div="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link href="images/logo.jpg" rel="shortcut icon"> -->
    <title>Petshop Online Website</title>
  
  <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

</head>
<head>
    <link rel="stylesheet" href="admindashboard.css">

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script> 
      function buy() {
      //  window.open("https://www.google.com","_blank")
        var count;
        count=parseInt(document.getElementById("p_id").value)
        count=count+1;
        document.getElementById("p_id").value=count;
        // alert(count);
      }
    </script>
            
  <title> Claws & Paws </title>
  <link rel="stylesheet" href="main1.css">
</head>

<body>
<style>
body{
	background-color: grey;
	background-repeat:no-repeat;
	background-attachment:fixed;
	background-size:cover;
	{
</style>
   <header>
      <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <h4 class="wow fadeInDown" style="margin-top:20px; color:#FFF;"> 
                <img src="bg1.svg"  width="20% "/> Petshop Online Website</h4></a>
                </div>
    
                <div class="collapse navbar-collapse navbar-right wow fadeInDown">
                    <ul class="nav navbar-nav">
                         <li class="active"><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
						 <li class="active"><a href="customer.php"><i class="fa fa-home"></i>Logout</a></li> 
						 <li class="active"><a href="cart.php"><i class="fa fa-home"></i>Cart</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header>
  <center>
    <div>      
                <div class="card">
				<img class="img" height="100px" width="500px" alt="" src="logo FL final.svg">
          <!--  </div>
			<div class="card">-->
                    <form action="" method="POST" enctype="multipart/form-data">
                    <table >                
                        <tr> 
                        <th scope="col"><h2>Image</h2></th>   
                        <th scope="col"><h2>Name</h2></th>                                       
                        <th scope="col"><h2>Type</h2></th>                                
                        <th scope="col"><h2>Date of birth</h2></th>
                        <th scope="col"><h2>Price</h2></th>                                          
                        </tr>
                                             
                    <?php
                    $conn = new mysqli("localhost", "root", "", "database");
                    if ($conn->connect_errno) {
                        echo "Failed to connect to MySQL: " . $conn->connect_error;
                        exit();
                    }
                    $query = "SELECT * FROM pet";
                    $query_run = mysqli_query($conn,$query);
         
                    while ($row = mysqli_fetch_assoc($query_run)) 
                    {                
                      echo "<tr><td> <a href='$row[image]'> <img src='".$row['image']."' height='120' width='150'></a> </td>                
								<td><b> ".$row['p_name']." </b></td>                         
								<td><b> ".$row['p_type']." </b></td>              
								<td><b> ".$row['p_dob']." </b></td>          
								<td><b> ".$row['p_amount']." </b></td>                                                                                                                                      
                      </tr>";                                       
                       
                    }
                    ?>
					</table>
                    </form>      
                </div>          
          
    </div>            
  </center>
</body>
</html>
