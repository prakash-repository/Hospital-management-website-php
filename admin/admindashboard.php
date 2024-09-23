<?php
session_start();
include ("../database.php");

// function countrecord($sql,$db)
// {

//     $res=$db->query($sql);
//     return $res->num_rows;

// }

if(!isset($_SESSION["aid"]))
{
  header("Location:../index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>

     <!-- bootstrap css link -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- stylesheet link -->
<!-- <link rel="stylesheet" href="./css/index.css"/ -->

 <!-- googlefont poppins link -->
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- font awesome cdnjs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <style>
    /* poppins link */
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

body{
    font-family: 'Poppins', sans-serif;
}

    /* navigationbar style start */
.navigationbar{
    background-color: #fff;
    border:none;
    box-shadow:0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    
}
.website-name{
    margin-left:5px;
    color: #007aff !important;
    text-shadow:1px 1px grey;
    font-size:25px;
    font-weight:800;

}
.navigation-links{
    font-size:17px;
    color:black!important;
    transition:0.1s linear all;
}
.navigation-links:hover{
   font-weight:700;
   color:#007aff!important;
   text-shadow:2px 2px white;
   transform:scale(1.1);
   transition:0.1s linear all;
}


/* navigationbar style end */
  
.navigation-links-container{
    box-shadow:0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    margin-top:50px;
    height:92vh;
    background-color:#007aff;
}
.navigation-links-container .links{
    text-decoration: none;
    color:white;
    font-size:15px;
    padding:5px;
  
}
.links-box{
  display:flex;
  flex-direction:column;
}
.content-display-container{
    display:flex;
    justify-content:space-around;

    flex-wrap:wrap;
    margin-top:50px;
    height:92vh;
    background-color:#fafafa;
}
.doctor{
    background-image: url("https://purepng.com/public/uploads/large/purepng.com-doctordoctorsdoctors-and-nursesclinicianmedical-practitionernotepadfemale-1421526857248uragw.png");
    background-size:contain;
    background-repeat:no-repeat;
    background-position: center;
    width:350px;
    height:200px;
}
.patient{
    background-image: url("https://th.bing.com/th/id/OIP.xwVoxrivPAzN30-N4NOM7wHaE8?w=260&h=180&c=7&r=0&o=5&pid=1.7");
    background-size:cover;
    width:350px;
    height:200px;
}
.appointment{
    background-image: url("https://www.hiboox.com/wp-content/uploads/2021/04/doctor-appointment.jpg");
    background-size:cover;
    width:350px;
    height:200px;

}

.doctor,.patient,.appointment h2{
    color: #007aff;
    text-shadow:1px 1px 1px black;
}
 </style>

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
        <a class="navbar-brand website-name">PARU'S CLINIC</a>
      </div>
      <div class="collapse navbar-collapse text-center" id="myNavbar">
        <!-- <ul class="nav navbar-nav"> -->
        <!-- <li><a href="#">Home</a></li> -->
        <!-- <li><a href="#">Page 1</a></li> -->
        <!-- <li><a href="#">Page 2</a></li> -->
        <!-- <li><a href="#">Page 3</a></li> -->
        <!-- </ul> -->
        <ul class="nav navbar-nav navbar-right" style="margin-right:30px;display:flex;justify-content: baseline;align-items:baseline;">
          <!-- <li><a href="contactus.php" class="navigation-links"><i class="fa-solid fa-phone"></i>Contact us</a></li> -->
          <li><a href="../logout.php" class="navigation-links"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
          <!-- <li><a href="bookappointment.php" class="btn btn-primary book-appointment-button">Book an appointment</a></li> -->


        </ul>
      </div>
    </div>
  </nav>
  <!-- navigationbar ends -->

<div class="container-fluid">


<div class="row">
   
    <div class="col-md-4 col-lg-2 col-xl-2 col-sm-4 col-xs-4 navigation-links-container">
      <h4 class="text-center" style="text-transform:uppercase; font-size:20px; color:white; text-shadow:1px 1px 3px black; text-decoration:none;">WELCOME <?php echo $_SESSION["name"];?></h4>
      <div class="links-box">
      <a href="view-patient.php" class="links"> View Patients</a>
      <a href="view-doctor.php" class="links"> View doctors</a>
        <a href="schedule-appointment.php" class="links">Appointment Schedule</a>
        <a href="view-appointment.php" class="links"> View Appointments</a>
      </div>
    </div>


    <div class="col-md-8 col-lg-10 col-xl-10 col-sm-8 col-xs-8 content-display-container">

        <div class="patient text-center">
           <h2>TOTAL PATIENTS</h2>
<?php
           function countrecord($sql,$db)
{

    $res=$db->query($sql);
    return $res->num_rows;

}
?>
           <h2><?php echo countrecord("select * from patient",$db);?></h2>
        </div>

        <div class="doctor text-center">
           <h2>TOTAL DOCTORS</h2>
           <h2><?php echo countrecord("select * from doctor",$db);?></h2>
        </div>

        <div class="appointment text-center">
           <h2>TOTAL APPOINTMENT</h2>
           <h2><?php echo countrecord("select * from patient_appointment",$db);?></h2>
        </div>
    
 

    </div>
</div>
</div>
    






<!-- bootstrap javascript link -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>