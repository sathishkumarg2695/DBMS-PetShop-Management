<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'database');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password sent from form

      $c_email = mysqli_real_escape_string($db,$_POST['c_email']);
      $c_pwd = mysqli_real_escape_string($db,$_POST['c_pwd']);

      $sql = "SELECT * FROM customer WHERE c_email = '$c_email' and c_pwd = '$c_pwd'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if ($row) {
          header("location: main.php");
          ?>
  <?php
      }
      else{
          ?>
          <script>
              alert("Failed to Login");
          </script>
  <?php
      }
  }
  ?>
<html lang="en" dir="ltr">

<head>
  <title> Claws & Paws </title>
  <link rel="stylesheet" href="admin.css">
</head>

<body class="bg">
  <center>
   <header>
   <meta http-equiv="Cache-control" content="no-cache">
      <input  type="button" value="Back" class="btn2" onclick="window.location.href='index.php';"/>
      <nav>
        <img class="img" height="100px" width="500px" alt="" src="logo FL final w.svg">
      </nav>  
      
    </header>
    <!-- <br><br><br><br> -->
    <div class="card">
      <div class="container">
        <h1>Customer Login</h1>
        <form method="POST">
          <h3>Customer email:</h3>
          <input type="text" class="field" name="c_email" required>
          <h3>Customer password:</h3>
          <input type="password" class="field" name="c_pwd" required>
          <input type="submit" value="Login" class="btn">
        </form>
        <div class="pass-link">
          <a href="registercustomer.php">Not registered yet?</a>
        </div>
      </div>
    </div>
  </center>
</body>
</html>
