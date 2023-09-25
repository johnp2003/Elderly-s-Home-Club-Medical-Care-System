<?php
    session_start();
    if(isset($_SESSION["admin_id"])){
        include("conn.php");

    }else {
        echo "<script>alert('Please Login!');window.location.href='admin_login.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        
        <style>
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
            
            body{
                margin: auto;
            }
            .flex-center{
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container1, .container2 {
                position: relative;
                width: 30%;
            }

            .container1 img, .container2 img {
                width: 100%;
                height: auto;
            }

            /* Style the button and place it in the middle of the container/image */
            .container1 .manage-doctor-btn {
                position: absolute;
                bottom: 0%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                background-color: white;
                color: #89CFF0;
                font-size: 16px;
                padding: 12px 24px;
                border: 2px solid #89CFF0;
                cursor: pointer;
                border-radius: 5px;
            }
            .container2 .manage-appointment-btn {
                position: absolute;
                bottom: 0%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                background-color: white;
                color: #40E0D0;
                font-size: 14px;
                padding: 12px 24px;
                border: 2px solid #40E0D0;
                cursor: pointer;
                border-radius: 5px;
            }
            
            .container1 .manage-doctor-btn:hover {
                background-color: #89CFF0;
                color: white;
            }
            .container2 .manage-appointment-btn:hover {
                background-color: #40E0D0;
                color: white;
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
                        <a class="nav-link active" aria-current="page" href="#admin_home">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="registered_patient_list_admin.php">Patients</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Doctors
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="manage_doctor.php">View & Edit Doctors</a></li>
                          <li><a class="dropdown-item" href="add_doctor_admin.php">Add New Doctors</a></li>
                        </ul>
                      </li>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Appointments
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="manage_patient_appointment_admin.php">Manage Appointment Request</a></li>
                          <li><a class="dropdown-item" href="patient_appointment_admin.php">View Appointments</a></li>
                        </ul>
                      </li>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <li class="nav-item">
                        <a class="nav-link" href="admin_logout.php">Logout</a>
                      </li>
                      &nbsp;
                    </ul>
                </div>
            </div>
        </nav>
          <div id="admin_home"></br>
            <h1 style="text-align: center">Welcome to Admin Page</h1></br>
            <div class="flex-center">
                <div class="container1">
                    <img src="images/doctor-2.png" alt="Doctor">
                    <a href="manage_doctor.php"><button class="manage-doctor-btn">Manage Doctor</button></a>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="container2">
                    <img src="images/schedule-icon.png" alt="Doctor">
                    <a href="manage_patient_appointment_admin.php"><button class="manage-appointment-btn">Manage Appointment Request</button></a>
                </div>
            </div>
        </div>
    </body>
</html>