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
        <title>My Appointments</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

        <style>
            body{
                
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
            h1 {
                background-color: #63B67A;
                padding: 15px;
                margin: 0px;
                display: flex;
                padding-left: 60px;
            }
            p{
                margin-left:100px;
                font-family: 'Nunito Sans', sans-serif;
                font-size: 30px;
            }
            .content {
                margin-top: auto;
                margin-bottom: auto;
                text-align: center;
                text-transform: uppercase;
                font-family:Verdana, Geneva, Tahoma, sans-serif;
                font-size: 14px;
            }
            body {
                margin: auto;
                background-color: #EDF1FF;
            }
            .header {
                background-color: #a8d6b5; 
                overflow: hidden;
                display: flex;
                justify-content: center;
            }
            .header a {
                color: #ffffff;
                text-decoration: none;
                font-size: 1.2em;
                padding: 20px;
                text-align: center;
                font-weight: bold;
                margin-right: auto;
                margin-left: auto;
            }
            .header a:hover {
                background-color: #cbe7d3;
                border-radius: 20px 20px 0px 0px;
            }
            .header a:active {
                background-color: #a5d5d9;
                color: red;
                border-radius: 20px 20px 0px 0px;
            }
            .container {
                width: auto;
                display: flex;
                justify-content: center;
                margin-top: 50px;
            }
            .search-bar {
                width: 100%;
                max-width: 450px;
                border: 1px solid black;
                display: flex;
                align-items: center;
                padding: 8px 20px;
                border-radius: 50px;
                margin-left: 8%;
            }
            .search-bar input{
                padding: 16px 20px;
                flex: 1;
                background: transparent;
                font-size: 17px;
                border: 0;
                outline: none;
            }
            .add-doctor {
                width: 130px;
                outline: none;
                display: flex;
                float: right;
                margin-left: 47px;
                border: 1px solid black;
                letter-spacing: 1px;
                align-items: center;
                justify-content: center;
                border-radius: 26px;
                font-size: 17px;
                cursor: pointer;
                transition: all 0.3s;
                background-color: #ffffff;
            }
            .add-doctor:hover {
                background-color: #e8e7e1;
            }
            .search-bar button img{
                width: 25px;
            }
            .search-bar button {
                border: 0;
                border-radius: 50px;
                width: 40px;
                height: 40px;
                cursor: pointer;
            }
            table,th,td {
                border-collapse: collapse;
                margin: auto;
                margin-top: 80px;
                font-size: 20px;
                text-align: left;
                padding: 15px;
                font-family:none;
                
            }
            th {
                border-bottom: solid black;
            }
            tbody tr:nth-child(even) {
                background: #fdf6eb;
            }
            .link a{
                color: blue;
            }
            .link a:hover{
                color: red;
                font-weight: bolder;
            }
            .link a:active{
                color: red;
                box-shadow: 4px 4px 3px #171515;
                transition: 0s;
            }
            a,a:hover{
                text-decoration: none;
            }
            .emailbtn a{
                color: black;
            }
            .emailbtn a:hover{
                color: blue;
                text-decoration: underline;
            }
            .emailbtn a:active{
                color: red;
                box-shadow: 4px 4px 3px #171515;
                transition: 0s;
            }
            .text {
                color: transparent;
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
                        <a class="nav-link " aria-current="page" href="customer_homepage.php">Home</a>
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
                            <li><a class="dropdown-item" href="book_appointment.php">Book An Appointment</a></li>
                            <li><a class="dropdown-item" href="suggest_doctor_and_appointment_details.php">Suggest a Doctor</a></li>
                            <li><a class="dropdown-item" href="specialities.php">Find a Doctor</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item active" href="#">View Appointment</a></li>

                        </ul>
                      </li>
                    </ul>
                </div>
            </div>
          </nav>
          <br>
        <p>Appointment List</p>

        <div>
            <table style="width: 90%;">
                <tr>
                    <th width="10%">APP ID</th>
                    <th>Email</th>
                    <th>Doctor Name</th>
                    <th>Speciality</th>
                    <th>Medical Request</th>
                    <th>Date</th>
                    <th>Time Slot</th>
                    <th>Status</th>
                </tr>
                <?php 
                if(isset($_SESSION["pat_id"])){
                    include("conn.php");
            
                    $con = mysqli_connect("localhost","root","","elderly_database");
                    $sql = "SELECT * FROM appointment INNER JOIN doctorlist ON appointment.doc_id = doctorlist.doc_id
                    INNER JOIN patient ON appointment.pat_id = patient.pat_id WHERE appointment.pat_id=".$_SESSION["pat_id"]."";
                    $result = mysqli_query($con, $sql);

                    while ($row= mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$row['appoint_id']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['doctor_name']."</td>";
                        echo "<td>".$row['request_speciality']."</td>";
                        echo "<td>".$row['medical_request_details']."</td>";
                        echo "<td>".$row['select_date']."</td>";
                        echo "<td>".$row['time_slot']."</td>";
                        echo "<td>".$row['status']."</td>";
                        echo "</tr>";
                    }
                    if($result->num_rows <= 0){
                        echo "<script>alert('No Appointment Booked')</script>";
                    }
                }
                ?>
            </table>
        </div>
    </body>
</html>