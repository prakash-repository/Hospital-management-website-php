<?php
session_start();
include ("database.php");

if(!isset($_SESSION["patient_id"]))
{
  header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT US</title>
  <!-- bootstrap css link -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- stylesheet link -->
<link rel="stylesheet" href="./css/index.css"/>

 <!-- googlefont poppins link -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

 <!-- font awesome cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>



   <!-- navigation bar starts -->
   <nav class="navbar navbar-default navbar-fixed-top navigationbar" id="navi">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <!-- <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> -->
        <i class="fa-solid fa-house-medical"></i>
      </button>
      <a class="navbar-brand website-name" href="landingpage.php" id="indi">PARU'S CLINIC</a>
    </div>
    <div class="collapse navbar-collapse text-center" id="myNavbar">
      <!-- <ul class="nav navbar-nav"> -->
        <!-- <li><a href="#">Home</a></li> -->
        <!-- <li><a href="#">Page 1</a></li> -->
        <!-- <li><a href="#">Page 2</a></li> -->
        <!-- <li><a href="#">Page 3</a></li> -->
      <!-- </ul> -->
      <ul class="nav navbar-nav navbar-right" style="margin-right:30px;display:flex;justify-content: baseline;align-items:baseline;">
        <li><a href="logout.php" class="navigation-links"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        <li><a href="bookappointment.php" class="btn btn-primary book-appointment-button">Book an appointment</a></li>

      
      </ul>
    </div>
  </div>
  </nav>
<!-- navigationbar ends -->



<!-- map and contact page start -->
<div class="container-fluid contactus-mainbox1">
  <div class="container contactus-mainbox2">
    <div class="row">

      <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col-xs-12 text-center">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3885.4099790051187!2d80.2865116740884!3d13.136519711243105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f9b0edfa8d7%3A0x2ef9e1c01abcc418!2sGovernment%20Arts%20And%20Science%20College%2C%20R.K.Nagar!5e0!3m2!1sen!2sin!4v1704209471602!5m2!1sen!2sin"  width="380" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 col-xs-12 text-center">
        <h2 class="title">Contact us</h2>
        <form class="contactus-form">
        <input type="text" placeholder="Enter your name" required>
        <input type="email" placeholder="Enter your Email" required>
        <textarea placeholder="Write your comments"></textarea>
        <a class="btn btn-primary" style="transition:0.2s linear;">Submit</a>
        </form>

      </div>
    </div>
    
  </div>
</div>

<!-- map and contact page end -->

<!-- footer style start -->
<div class="container-fluid footer-mainbox1">
<div class="row text-center footer-box">
    <div class="col-md-12 col-lg-12 footer-content"><h2>&copy </h2> <h3>Developed by parkavi-2024</h3></div>
</div>
</div>
<!-- footer style end -->





<!-- bootstrap javascript link -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="js/script.js"></script>
</body>
</html>