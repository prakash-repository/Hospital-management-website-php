<?php
session_start();
include("../database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN LOGIN</title>
  <!-- bootstrap css link -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- stylesheet link -->
  <link rel="stylesheet" href="../css/index.css" />

  <!-- googlefont poppins link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


  <!-- font awesome cdnjs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<a href="../index.php" style="position:relative;" class="previous-btn"><i class="fa-solid fa-left-long"></i></a>
  <div class="loginform-main-div1" style="position:absolute; top:0; z-index:-1;">
    <form class="loginform-main-div2" action="adminlogin.php" method="post">
      
      <h2 class="title">Admin Login</h2>
      <div>
        <input type="email" name="email" placeholder="Email Id" required>
      </div>

      <div>
        <input type="password" name="password" placeholder="Password" required>
      </div>

      <div class="login-btn-signup-btn text-center">
      <button class="btn btn-primary" name="login">Login <i class="fa-solid fa-right-to-bracket"></i></button>
      <p>Don't have an account yet? <a href="adminsignup.php">sign up</a></p>
</div>
    </form>
  </div>

  <!-- php coding for login -->
  <?php
    
    // create a variable($sql) for writing mysql select query
    if(isset($_POST["login"]))
    {
    $sql ="SELECT * FROM admin WHERE email='{$_POST["email"]}' AND password='{$_POST["password"]}'";
    //  connect to database and store the value in $res variable
    $res = $db->query($sql);
    //  write a if condition
    if ($res->num_rows > 0) 
    {
      $row = $res->fetch_assoc();
      $_SESSION["aid"]=$row["aid"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["email"] = $row["email"];
      echo "<script>window.open('admindashboard.php','_self')</script>";
    } 
  
    else
    {
      echo "<script>alert('Invalid Login Details')</script>";
    }
  }


    ?>


  <!-- bootstrap javascript link -->
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="login.js"></script>
</body>

</html>