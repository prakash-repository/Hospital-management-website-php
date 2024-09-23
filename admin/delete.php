<?php
include ("../database.php");

if(isset($_GET["patient_id"]))
{
    $sql="DELETE FROM patient WHERE patient_id='{$_GET["patient_id"]}'";
    $db->query($sql);
    echo"<script>window.open('view-patient.php','_self')</script>";
}
elseif(isset($_GET["doctor_id"]))
{
    $sql="DELETE FROM doctor WHERE doctor_id='{$_GET["doctor_id"]}'";
    $db->query($sql);

    $sql1="DELETE FROM patient_appointment WHERE doctor_id='{$_GET["doctor_id"]}'";
    $db->query($sql1);
    echo"<script>window.open('view-doctor.php','_self')</script>";
}
elseif(isset($_GET["appointmentwiddoctor_id"]))
{
    $sql="DELETE FROM patient_appointment WHERE doctor_id='{$_GET["appointmentwiddoctor_id"]}'";
    $db->query($sql);
    echo"<script>window.open('view-appointment.php','_self')</script>";
}
?>