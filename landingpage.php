<?php
session_start();
include("database.php");

if (!isset($_SESSION["patient_id"])) {
  header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LANDING PAGE</title>
  <!-- bootstrap css link -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- stylesheet link -->
  <link rel="stylesheet" href="./css/index.css" />

  <!-- googlefont poppins link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- font awesome cdnjs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <a class="navbar-brand website-name" id="indi">PARU'S CLINIC</a>
      </div>
      <div class="collapse navbar-collapse text-center" id="myNavbar">
        <!-- <ul class="nav navbar-nav"> -->
        <!-- <li><a href="#">Home</a></li> -->
        <!-- <li><a href="#">Page 1</a></li> -->
        <!-- <li><a href="#">Page 2</a></li> -->
        <!-- <li><a href="#">Page 3</a></li> -->
        <!-- </ul> -->
        <ul class="nav navbar-nav navbar-right" style="margin-right:30px;display:flex;justify-content: baseline;align-items:baseline;">
          <li><a href="contactus.php" class="navigation-links"><i class="fa-solid fa-phone"></i>Contact us</a></li>
          <li><a href="logout.php" class="navigation-links"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
          <li><a href="bookappointment.php" class="btn btn-primary book-appointment-button">Book an appointment</a></li>


        </ul>
      </div>
    </div>
  </nav>
  <!-- navigationbar ends -->

  <!-- banner image setup -->
  <img src="web images/banner-img.webp" class="img-responsive landing-banner-img">
  <!-- banner image end -->


  <!-- features start -->
  <div class="container features-main-box">
    <h2 class="text-center title">Our Hospital Features</h2>
    <div class="row">

      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 text-center features-box">
        <i class="fa-solid fa-heart-pulse features-icons"></i>
        <h3 class="features-name">Cardiology</h3>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 text-center features-box">
        <i class="fa-solid fa-ribbon features-icons"></i>
        <h3 class="features-name">Orthopaedic</h3>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 text-center features-box">
        <i class="fab fa-monero features-icons"></i>
        <h3 class="features-name">Neurologist</h3>
      </div>



      <!-- <div class="row"> -->
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 text-center features-box">
        <i class="fa-solid fa-hand-holding-droplet features-icons"></i>
        <h3 class="features-name">Blood bank</h3>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 text-center features-box">
        <i class="fas fa-prescription-bottle-alt features-icons"></i>
        <h3 class="features-name">Pharma team</h3>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 text-center features-box">
        <i class="far fa-thumbs-up features-icons"></i>
        <h3 class="features-name">High Quality Treatment</h3>
      </div>
    </div>
  </div>
  </div>
  <!-- features end -->



  <!-- doctors box start -->

  <div class="container-fluid doctors-container text-center">
    <h2 class="title">Our Doctors</h2>
    <div class="container" style="background-color:#fafafa;">
      <div class="row doctor-main-box">

        <!-- fetching doctors in database -->
        <?php
        $sql = "SELECT * FROM doctor";
        $res = $db->query($sql);

        while ($row = $res->fetch_assoc()) 
        {
          $doctor_id=$row["doctor_id"];
          $doctorname = $row["name"];
          $doctorimg = $row["img"];
          $doctorspecilization = $row["specilization"];

          echo "<div class='col-xl-4 col-lg-4 col-md-6 col-sm-12 doctors-card'>
          <img class='doctor-img' src='";
          echo ($doctorimg == '') ? './doctor/images/NO-DP.jpg' : $doctorimg;
          echo "'>";

          echo " <h3 class='doctor-name'>$doctorname</h3>
          <h4 class='doctor-name'>$doctorspecilization</h4>
        
          <a href='patient-chat.php?doctor_id=$doctor_id' class='btn view-doctor-btn'>chat</a>

        </div>";
        }
        ?>
      </div>
    </div>
  </div>
  <!-- doctors box end -->


  <!-- footer style start -->
  <div class="container-fluid footer-main-box">
    <div class="row footer-box">
      <div class="col-md-12 col-lg-12 footer-content">
        <h2>&copy </h2>
        <h3>Developed by parkavi-2024</h3>
      </div>
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