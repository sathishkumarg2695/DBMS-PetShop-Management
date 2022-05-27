<html lang="en" dir="ltr">
    <head>
        <title>view customers/paws&claws</title>
        <link rel="stylesheet" href="viewcustomer.css">
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
                            <th scope="col">Supplier ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>                      
                        </tr>
                
                    <?php
                    $conn = new mysqli("localhost", "root", "", "database");
                    if ($conn->connect_errno) {
                        echo "Failed to connect to MySQL: " . $conn->connect_error;
                        exit();
                    }
                    $query = "SELECT * FROM supplier";
                    $query_run = mysqli_query($conn,$query);
        
                    while ($row = mysqli_fetch_assoc($query_run)) 
                    {                
                        echo"<tr>
                                <td> ".$row['s_id']." </td>
                                <td> ".$row['s_name']." </td>
                                <td> ".$row['s_address']." </td>
                                <td> ".$row['s_phone']." </td>                                             
                            </tr>";
                        
                        }
                    ?>
                    
                    </div>
                    </form>                     
               
            </div>    
        </center>
    </body>
</html>