<?php
    session_start();
    if(isset($_SESSION["pat_id"])){
        include("conn.php");
    }else {
        echo "<script>alert('Please Login!');window.location.href='patient_login.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Book Appointment Preferences</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <style>
            *{
                margin: 0;
                box-sizing: border-box;
            }
            nav{
                box-shadow: 0 0.4rem 1.4rem rgb(0 0 0 / 11%);
            }
            .navbar-nav{
                margin-right: 50px;
                text-align: center;
            }
            .d-flex{
                width: 800px;
            }
            .nav-link{
                width:100px;
                margin-left: 0%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .nav-item{
                padding: 5px;
            }
            body {
                background-color: #EDF1FF;
            }
            #doctor_pic {
                display: block;
                margin-left: auto;
                margin-right: auto;
                opacity: 0.5;
            }
            .container1 {
                position:relative;
                color: black;
                background-color: white;
            }
            .text {
                position:absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 42px;
                font-family:Verdana, Geneva, Tahoma, sans-serif;
                text-align: center;
                background: -webkit-linear-gradient(0deg,rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.65));
                border: 7px inset #fff;
                width: 45%;
                letter-spacing: 2px;
            }
            .apt_pref {
                text-align: center;
                margin-top: 120px;
                font-size: 30px;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                text-transform: uppercase;
            }
            .doctor_img {
                padding-top: 70px;
                width: 850px;
                margin: auto;
                margin-bottom: 500px;
                position: relative;
            }
            .image__overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                cursor: pointer;
                color: #ffffff;
                display: flex;
                font-family: 'Quicksand', sans-serif;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                letter-spacing: 2px;
                opacity: 0;
                transition: opacity 0.25s;
                background: rgba(0,0,0,0.6);
                border-radius: 50%;
            }
            .image__overlay--blur {
                backdrop-filter: blur(5px);
            }
            .image__overlay > * {
                transform: translateY(20px);
                transition: transform 0.25s;
            }
            .image__overlay:hover > * {
                transform: translateY(0);
            } 
            .image__overlay:hover {
                opacity: 1;
            }
            .image__title {
                font-size: 2em;
                font-weight: bold;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
            .image__description {
                font-size: 1.25em;
                margin-top: 0.25em;
            }
            .column {
                float: left;
                position: relative;
            }
            .columnss {
                float: right;
                position: relative;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                      <img src="images/logo4.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                      Elderly's Home Club Medical Care
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="customer_homepage.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="about_us.php">About Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="specialities.php">Specialities</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          My Profile
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="my_profile.php">View & Edit My Profile</a></li>
                          
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                        </ul>
                      </li>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Book Appointment
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="#">Book An Appointment</a></li>
                            <li><a class="dropdown-item" href="suggest_doctor_and_appointment_details.php">Suggest a Doctor</a></li>
                            <li><a class="dropdown-item" href="specialities.php">Find a Doctor</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="view_my_appointment_customer.php">View Appointment</a></li>

                        </ul>
                      </li>
                    </ul>
                </div>
            </div>
          </nav>
        <div class="container1">
            <img src="images/Doctor.jpg" width="100%" height="300px" id="doctor_pic">
            <div class="text"><strong>Book Appointment</strong><br><font style="font-size: 20px;"><u>Please select your option below</u></font></div>
        </div>
        <p class="apt_pref">
            1. Select Appointment Preferences
        </p>
        <div class="doctor_img">
            <div class="column">
                <a href="suggest_doctor_and_appointment_details.php">
                <img src="images/doctor_2.jpg" alt="doctors" width="350" style="border-radius: 50%; display: block;">
                <div class="image__overlay image__overlay--blur">
                    <div class="image__title">Suggest a<br>doctor</div>
                    <p class="image__description">We can get you a doctor<br>through your preferences</p>
                </div></a>
            </div>
            <div class="columnss">
                <a href="specialities.php">
                <img src="images/backup_doctor.jpg" alt="doctors" width="350" style="border-radius: 50%; display: block;">
                <div class="image__overlay image__overlay--blur">
                    <div class="image__title">Find a<br>doctor</div>
                    <p class="image__description">You can search your<br>own doctor by clicking here</p>
                </div></a>
            </div>
        </div>
    </body>
</html>