<html lang="en" dir="ltr">
    <head>
        <title>view customers/paws&claws</title>
        <link rel="stylesheet" href="vieworder.css">
    </head>

    <body class="bg">
        <center>
            <header>
            <img class="img" height="100px" width="310px" alt="" src="logo FL final.svg">
            <div class="btn">
                <input  type="button" value="Back" onclick="window.location.href='welcome.php';"/>
            </div>
            </header>
            <div class="card">
               
                    <div>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table">                
                        <tr>                    
                            <th scope="col">Order ID</th>
                            <th scope="col">Order's Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Customer_id</th>
							<th scope="col">Address</th>
                            <th scope="col">Pet_id</th>                         
                        </tr>
                
                    <?php
                    $conn = new mysqli("localhost", "root", "", "database");
                    if ($conn->connect_errno) {
                        echo "Failed to connect to MySQL: " . $conn->connect_error;
                        exit();
                    }
                    $query = "SELECT * FROM order_info";
                    $query_run = mysqli_query($conn,$query);
        
                    while ($row = mysqli_fetch_assoc($query_run)) 
                    {                
                        echo"<tr>
                                <td> ".$row['o_id']." </td>
                                <td> ".$row['o_name']." </td>
                                <td> ".$row['o_amount']." </td>
                                <td> ".$row['c_id']." </td>
								<td> ".$row['c_address']." </td>
                                <td> ".$row['p_id']." </td>                                             
                            </tr>";
                        
                        }
                    ?>
                    
                    </div>
                    </form>                     
               
            </div>    
        </center>
    </body>
</html>