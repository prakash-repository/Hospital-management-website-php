<?php
session_start();
$doctor_id=$_SESSION["doctor_id"];
include ("../database.php");

function countrecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}

if(!isset($_SESSION["doctor_id"]))
{
  header("Location:../index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCTOR DASHBOARD</title>

     <!-- bootstrap css link -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- stylesheet link -->
<!-- <link rel="stylesheet" href="../css/index.css"> -->

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

/* doctor-chat.php styling starts */
.chatbox-container{
    /* margin-top:50px; */
    margin-bottom:0;
    height:90vh;
    display:flex;
    flex-wrap:wrap;
    justify-content: center;
    align-items:start;
    background-color:#fafafa;
    box-shadow:0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
.chatbox-1{
    display:flex;
    flex-direction:column;
height:94%;
width:70%;
overflow-y:scroll;
background-color:#007a9f;
box-shadow:0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}

.chatbox-2{
    width:50%;
    display:flex;
    flex-wrap:wrap;
    position: fixed;
    bottom:12px;
    justify-content:center;
}
.chatbox-2 input{
    width:325px;
    outline:none;
    padding:5px 10px;
}
.chatbox-2 form{
    position:relative;
    display:flex;
    justify-content:center;
    width:50%;

}
.msg-send-btn{
    position:absolute;
    right:5px;
    top:5px;
}
.my-message{
    border-radius:10px;
    margin:5px;
    padding:5px 10px;
    display:flex;
    flex-wrap:wrap;
    align-self:end;
    width:50%;
    color:#007a9f;
    background-color:#fff;

}
.patient-message{
    color:#007a9f;
    background-color:#fff;
    border-radius:10px;
    margin:5px;
    padding:5px 10px;
    display:flex;
    flex-wrap:wrap;
    align-self:start;
    width:50%;
    
}



/* doctor-chat.php styling ends */

 </style>

</head>
<body>

  <!-- navigation bar starts -->
  <nav class="navbar navbar-default navbar-fixed-top navigationbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <!-- <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> -->
          <i class="fa-solid fa-house-medical"></i>
        </button>
        <a class="navbar-brand website-name" href="doctordashboard.php">PARU'S CLINIC</a>
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
   
    <div class="col-md-2 col-lg-2 col-xl-2 col-sm-2 col-xs-4 navigation-links-container">
      
      <h4 class="text-center" style="text-transform:uppercase; font-size:20px; color:white; text-shadow:1px 1px 3px black; text-decoration:none;">WELCOME <?php echo $_SESSION["name"];?></h4>
      <div class="links-box">
      <?php
      $sql="SELECT * FROM patient";
      $res=$db->query($sql);
      if($res->num_rows>0)
      {
       while($row=$res->fetch_assoc())
       {
        $patientname=$row["name"];
        $patient_id=$row["patient_id"];
        echo"<a href='doctor-chat.php?patient_id=$patient_id' class='links'>$patientname</a>";
        
       }

      }
      
      ?>
  
      </div>
    </div>

    <div class="col-md-10 col-lg-10 col-xl-10 col-sm-10 col-xs-8 content-display-container">
        

    <?php
    error_reporting(0);
  $doctor_id=$_SESSION["doctor_id"];
  $patient_id=$_GET["patient_id"];

if(isset($_POST["send"]))
{
{
  $sql1="INSERT INTO consultation_messages (sender_id,reciever_id,message,log) VALUES ('$doctor_id','$patient_id','{$_POST["message"]}',NOW())";
  $db->query($sql1);
}
}
  ?>
    
<!--  -->



  <?php
  
  
    $doctor_id=$_SESSION["doctor_id"];
    $patient_id=$_GET["patient_id"];

    $sql2="SELECT * FROM consultation_messages WHERE (sender_id={$patient_id} AND reciever_id={$doctor_id}) OR (sender_id={$doctor_id} AND reciever_id={$patient_id})";
    $res=$db->query($sql2);

  if($res->num_rows>0)
  {
    echo"<div class='container chatbox-container'>

    <div class='chatbox-1'>";

    while($row=$res->fetch_assoc())
    {
    $sender_id=$row["sender_id"];
    $reciever_id=$row["reciever_id"];
    $message=$row["message"];
    //$log=$row["log"];

   // $Log=date("d/m/y", strtotime($log));

    echo ($sender_id==$doctor_id)?"<div class='my-message'>":"<div class='patient-message'>";
    echo $message;
   // echo $Log;
    echo"</div>";
    }
    echo"  
    </div>
    
    <div class='chatbox-2'>
    <form action='{$_SERVER["REQUEST_URI"]}' method='post'>
        <input type='text' placeholder='Message' name='message' required>
          <button type='submit' name='send' class='msg-send-btn'><i class='fa-solid fa-paper-plane'></i></button>
      </form>
    </div>
    
    </div>
    
    
        ";
  }
  else{
    echo"<div class='empty'>NO CONVERSATION YET</div>";
  }
 
  ?>
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