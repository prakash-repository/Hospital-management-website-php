<?php
session_start();
include("../database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>REGISTER</title>

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
    <div class="container-fluid registerform-main-box1">
        <form action="doctorsignup.php" method="post">
            <div class="container registerform-main-box2">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h2 class="title text-center">Register Here</h2>
                    </div>
                </div>

                <!-- 1st row start -->
                <div class="row">
                    <p class="text-center">Enter Your Personal Informations</p>
                    <!-- 1st column -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6 text-center registerform-box">

                        <div>
                            <input type="text" name="name" placeholder="Username" required>
                        </div>

                        <div>
                            <input type="number" name="age" min="0" placeholder="Age" required>
                        </div>

                        <div>
                            <input type="radio" id="gender" name="gender" value="male">

                            <lable for="gender">Male</lable>

                            <input type="radio" id="gender" name="gender" value="female">

                            <lable for="gender">Female</lable>
                        </div>

                    </div>
                    <!-- 2nd column -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 col-xs-6 text-center registerform-box">


                        <div>
                            <input name="contact" min="0" type="number" placeholder="Contact no">
                        </div>

                        <div>
                            <select name="specilization">
                                <option value="">choose specilization</option>
                                <?php
                                $sql = "SELECT * FROM `specilization`";
                                $res=$db->query($sql);
                                while ($row = $res->fetch_assoc())
                                 {
                                    $specilization = $row['specilization'];
                                    echo "<option value='$specilization'>$specilization</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                </div>
                <!-- 1st row end -->

                <!-- 2nd row start -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 text-center registerform-box">


                        <p style="border-bottom:1px solid grey;">Enter Your Email id and Password</p>
                        <div>
                            <input type="email" name="email" placeholder="Email Id" required>
                        </div>

                        <div>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>

                        <button class="btn btn-primary" name="submit">Submit <i class="fa-solid fa-right-to-bracket"></i></button>
                        <p>Already have an account? <a href="doctorlogin.php">Log in</a></p>

                    </div>
                </div>

            </div>
    </div>
    </form>
    </div>


    <?php
    if (isset($_POST["submit"])) { {
        $doctor_id=rand(time(),99999999);
            $sql = "INSERT INTO doctor(doctor_id,name,img,gender,age,specilization,contact,email,password,creationdate,updationdate) VALUES ('$doctor_id','{$_POST["name"]}','','{$_POST["gender"]}','{$_POST["age"]}','{$_POST["specilization"]}','{$_POST["contact"]}','{$_POST["email"]}','{$_POST["password"]}',NOW(),'')";
            $db->query($sql);
            echo "<script>alert('Registration success')</script>";
            echo "<script>window.open('doctorlogin.php','_self')</script>";
        }
    }
    ?>

</body>

</html>