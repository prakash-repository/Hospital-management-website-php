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
  <title>CONCULTATION</title>
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
        <a class="navbar-brand website-name" href="landingpage.php">PARU'S CLINIC</a>
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

 

  <!-- chat styling starts -->
  <?php
  $patient_id=$_SESSION["patient_id"];
  $doctor_id=$_GET["doctor_id"];

if(isset($_POST["send"]))
{
{
  $sql1="INSERT INTO consultation_messages (sender_id,reciever_id,message,log) VALUES ('$patient_id','$doctor_id','{$_POST["message"]}',NOW())";
  $db->query($sql1);


}
}



  ?>
  <div class="container chatbox-container">

<div class="chatbox-1">
  <?php
    $patient_id=$_SESSION["patient_id"];
    $doctor_id=$_GET["doctor_id"];

    $sql2="SELECT * FROM consultation_messages WHERE (sender_id={$patient_id} AND reciever_id={$doctor_id}) OR (sender_id={$doctor_id} AND reciever_id={$patient_id})";
    $res=$db->query($sql2);

  if($res->num_rows>0)
  {
    while($row=$res->fetch_assoc())
    {
    $sender_id=$row["sender_id"];
    $reciever_id=$row["reciever_id"];
    $message=$row["message"];
    //$log=$row["log"];
   // $Log=date("d/m/y", strtotime($log));

    echo ($sender_id==$patient_id)?"<div class='my-message'>":"<div class='doctor-message'>";
    echo $message;
   // echo $Log;
    echo"</div>";
    }
  }
 

  ?>
  
</div>

<div class="chatbox-2">
<form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post">
    <input type="text" placeholder="Message" name="message" required>
      <button type="submit" name="send" class="msg-send-btn"><i class="fa-solid fa-paper-plane"></i></button>
  </form>
</div>

</div>
  
<!-- bootstrap javascript link -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>