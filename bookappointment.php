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
  <title>APPOINTMENT</title>
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
          <li><a href="contactus.php" class="navigation-links"><i class="fa-solid fa-phone"></i>Contact us</a></li>
          <li><a href="logout.php" class="navigation-links"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>



        </ul>
      </div>
    </div>
  </nav>
  <!-- navigationbar ends -->

  <img src="./web images/appointment-banner.jpg" class="appointment-banner-img" />


  <div class="appointment-mainbox">
    <h2 class="title" style="text-align:center;">Book Your Appointment</h2>
    <form action="bookappointment.php" method="post" class="appointment-form">

      <div class="appointment-box-1">

      <div class="registerform-box">
        <div>
          <input type="text" placeholder="Patient Name" name="name" required>
        </div>

        <div>
          <input type="number" placeholder="Phone No" name="contact" required>
        </div>

        <div>
          <input type="email" placeholder="Email id" name="email" required>
        </div>

        <div>
          <input type="text" placeholder="Symptoms" name="symptoms" required>
        </div>
      </div>


      <div class="registerform-box">

        <div>
          <select name="date" class="select" required>
            <option value="">Select Date</option>
            <?php
            $date = "SELECT * from `appointment_schedule` WHERE process='not-scheduled'";
            $res = $db->query($date);
            while ($row = $res->fetch_assoc()) {
              $sid = $row["aschedule_id"];
              $date = $row["date"];
              $time = $row["time"];
              echo "<option value='$sid'>$date/$time</option>";
            }

            ?>
          </select>
        </div>


        <div>
          <select  name="doctor" class="select" required>
            <option value="">choose doctor</option>
            <?php
            $sql = "SELECT * FROM `doctor`";
            $res = $db->query($sql);
            while ($row = $res->fetch_assoc()) {
              $doctor_id = $row["doctor_id"];
              $doctorname = $row['name'];
              $specilization = $row['specilization'];
              echo "<option value='$doctor_id'>$doctorname-$specilization</option>";
            }
            ?>
          </select>
        </div>


        <div>
          <input type="radio" id="gender" name="gender" value="male" required>

          <lable class="gender-lable" for="gender">Male</lable>

          <input type="radio" id="gender" name="gender" value="female" required>

          <lable class="gender-lable" for="gender">Female</lable>
        </div>
      </div>

          </div>

      <div class="appointment-btn-box">
        <input class="btn btn-primary" type="submit" name="appointment" value="Make an appointment">
      </div>

    </form>


  </div>

  <?php
  if (isset($_POST["appointment"])) { {

      $sql = "INSERT INTO patient_appointment (patient_name,gender,email,phoneno,symtoms,doctor_id,aschedule_id,log) VALUES ('{$_POST["name"]}','{$_POST["gender"]}','{$_POST["email"]}','{$_POST["contact"]}','{$_POST["symptoms"]}','{$_POST["doctor"]}','{$_POST["date"]}',NOW())";
      $db->query($sql);

      $sql1 = "UPDATE appointment_schedule SET process='scheduled' WHERE aschedule_id='{$_POST["date"]}'";
      $db->query($sql1);

      echo "<script>alert('Your Appointment has been successfully completed')</script>";
    }
  }

  ?>


  <!-- bootstrap javascript link -->
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>

</html>