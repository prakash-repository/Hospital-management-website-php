<?php
session_start();
include("../database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ADMIN REGISTER</title>

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
<a href="adminlogin.php" style="position:relative;" class="previous-btn"><i class="fa-solid fa-left-long"></i></a>
  <div class="loginform-main-div1" style="position:absolute; top:0; z-index:-1;">
    <form class="loginform-main-div2" action="adminsignup.php" method="post">
      
      <h2 class="title">Admin Register</h2>
      <div>
        <input type="name" name="name" placeholder="Enter your name" required>
      </div>

      <div>
        <input type="email" name="email" placeholder="Email Id" required>
      </div>

      <div>
        <input type="password" name="password" placeholder="Password" required>
      </div>

      <div class="login-btn-signup-btn text-center">
      <button class="btn btn-primary" name="submit">Login <i class="fa-solid fa-right-to-bracket"></i></button>
      <p>Already have an account? <a href="adminlogin.php">Log in</a></p>
</div>
    </form>
  </div>


    <?php
    if (isset($_POST["submit"])) { {
        
            $sql = "INSERT INTO admin(name,email,password) VALUES ('{$_POST["name"]}','{$_POST["email"]}','{$_POST["password"]}')";
            $db->query($sql);
            echo "<script>alert('Registration success')</script>";
            echo "<script>window.open('adminlogin.php','_self')</script>";
        }
    }
    ?>

</body>

</html>