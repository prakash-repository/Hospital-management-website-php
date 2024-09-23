<?php
session_start();
include ("../database.php");


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
  margin-top:10px;
  display:flex;
  flex-direction:column;
}
.content-display-container{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    flex-wrap:wrap;
    margin-top:50px;
    height:92vh;
    background-color:#fafafa;
}
.title{
    color:#007aff;
    text-shadow:1px 1px grey;
    font-weight: 800;
    margin-bottom:20px;
}
table{
    text-align:center;
    padding:20px;
    width:400px;
    height:300px;
    background-color:#fff;
    box-shadow:0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
select{
    width:152px;
}

input,select{
    padding:5px;
}
.button{
    margin-top:20px;
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
        <a class="navbar-brand website-name" href="admindashboard.php">PARU'S CLINIC</a>
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
      <a style="text-transform:uppercase; font-size:20px; color:white; text-shadow:1px 1px 3px black; text-decoration:none;">
      WELCOME <?php echo $_SESSION["name"];?></a>
      <div class="links-box">
      <a href="view-patient.php" class="links"> View Patients</a>
      <a href="view-doctor.php" class="links"> View doctors</a>
        <a href="schedule-appointment.php" class="links active">Appointment Schedule</a>
        <a href="view-appointment.php" class="links"> View Appointments</a>
      </div>
    </div>


    <div class="col-md-8 col-lg-10 col-xl-10 col-sm-8 col-xs-8 content-display-container">
       

       <form action="schedule-appointment.php" method="post">
   <table>
    <tr>
   <td colspan="2" class="text-center"><h2 class="title">Make Schedule</h2></td>
   </tr>
    <tr class="rows">
       <td><lable> SCHEDULE-DATE:</lable></td>
       <td><input type="date" name="date"required/></td>
   </tr>
    

  <tr class="rows">
    <td><lable>SCHEDULE-TIME:</lable></td>
        <td><select name="time" required>
            <option value="">Choose</option>
            <option value="">Morning</option>
            <option value="9-AM to 10-AM">9 AM to 10 AM</option>
            <option value="10-AM to 11-AM">10 AM to 11 AM</option>
            <option value="11-AM to 12-PM">11 AM to 12 PM</option>
            <option value="">Afternoon</option>
            <option value="1-PM to 2-PM">1 PM to 2 PM</option>
            <option value="2-PM to 3-PM">2 PM to 3 PM</option>
            <option value="3-PM to 4-PM">3 PM to 4 PM</option>
            <option value="">Night</option>
            <option value="6-PM to 7-PM">6 PM to 7 PM</option>
            <option value="7-PM to 8-PM">7 PM to 8 PM</option>
            <option value="8-PM to 9-PM">8 PM to 9 PM</option>

        </select></td>
</tr>
    

   <tr class="rows">
    <td colspan="2" class="text-center"><input type="submit" name="schedule" value="Schedule" class="btn btn-primary button"/></td>
</tr>



</table>
       </form>
       
    
    </div>
</div>
</div>

<!-- write PHP code -->

<?php
if(isset($_POST["schedule"]))
{
    $schedule='not-scheduled';
    {
       
        $sql="INSERT INTO appointment_schedule (date,time,process) VALUES ('{$_POST["date"]}','{$_POST["time"]}','$schedule')";
        $db->query($sql);
        echo"<script>alert('appointment has been created...')</script>";
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