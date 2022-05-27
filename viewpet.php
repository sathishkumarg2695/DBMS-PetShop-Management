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
                            <th scope="col">Pet ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Supplier ID</th>
                            <th scope="col">Image</th>
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
                        echo"<tr>
                                <td> ".$row['p_id']." </td>
                                <td> ".$row['p_name']." </td>
                                <td> ".$row['p_type']." </td>
                                <td> ".$row['p_amount']." </td>
                                <td> ".$row['p_dob']." </td>
                                <td> ".$row['s_id']." </td>  
                                <td> <a href='$row[image]'> <img src='".$row['image']."' height='120' width='150'></a> </td>                                                  
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