<?php
    session_start();

    if(isset($_SESSION["pat_id"])){
    }
    else {
        echo "<script>alert('Please Login!');window.location.href='patient_login.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Neurology</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

        <style>
            *{
                margin: 0;
                box-sizing: border-box;
                list-style: none;
            }
            body{
                font-family: Arial, Helvetica, sans-serif;
                background-color: #EDF1FF;
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
            a,a:hover{
                text-decoration: none;
            }
            .wrapper {
                position: relative;
                margin-top: 200px;
                left: 50%;
                transform: translate(-50%,-50%);
                width: 700px;
                height: 400px;
                display: flex;
                box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
            }
            .wrapper .left{
                width: 68%;
                background: linear-gradient(to right,#e6ebff, #fff, #e6ebff);
                padding: 60px 25px;
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
                text-align: center;
                color: #fff;
            }
            .wrapper .right{
                width: 65%;
                background: #fff;
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
                padding: 30px 25px;
            }
            .wrapper .right .info,
            .wrapper .right .projects{
                margin-bottom: 25px;
            }
            .wrapper .right .info h3,
            .wrapper .right .projects h3{
                margin-bottom: 15px;
                padding-bottom: 5px;
                border-bottom: 1px solid #e0e0e0;
                color: #353c4e;
                letter-spacing: 3px;
            }
            .wrapper .right .info_data,
            .wrapper .right .projects_data {
                display: flex;
                justify-content: space-between;
            }
            .wrapper .right .info_data .data,
            .wrapper .right .projects_data .data {
                width: 55%;
            }
            .wrapper .right .info_data .data h4,
            .wrapper .right .projects_data .data h4 {
                color: #353c4e;
                margin-bottom: 5px;
            }
            .wrapper .right .info_data .data p,
            .wrapper .right .projects_data .data p {
                font-size: 17px;
                margin-bottom: 10px;
            }
            #select {
                margin-top:50px;
                text-transform: uppercase;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #171515;
                font-size: larger;
                letter-spacing: 1px;
                font-weight: bold;
                padding: 50px;
            }
            .details {
                margin-top: 500px;
                padding: 70px;
               
                width: auto;
            }
            .btn {
                width: auto;
            }
            #topic {
                text-transform: uppercase;
                letter-spacing: 1px;
                font-weight: bold;
                font-size: 18px;
                padding-bottom: 40px;
            }
            .details_form label {
                display: block;
            }
            .details_form {
                padding: 20px;
                font-size: 19px;
                font-weight: lighter;
                flex-basis: 60%;
            }
            .btn-left {
                font-size: 19px;
                flex-basis: 20%;
            }
            .details_form input {
                width: 70%;
                padding: 10px;
                margin-top: 20px;
                margin-bottom: 40px;
                border-radius: 20px;
                border: 1px solid black;
                padding-left: 30px;
            }
            .medical_details {
                flex-basis: 40%;
                font-size: 19px;
            }
            .btn-right {
                font-size: 19px;
            }
            .details textarea {
                min-height: 200px;
                max-height: 400px;
                max-width: 500px;
                border: none;
                border-radius: 30px;
                box-shadow: 0 5px 5px rgba(0, 0, 0, 0,1);
                width: 500px;
                padding: 20px;
                margin-top: 20px;
            }
            .contact-box {
                display: flex;
            }
            .btn-box {
                display: flex;
                justify-content: center;
            }
            .submitbtn {
                width: 150px;
                border-radius: 20px;
                border: 1px solid black;
                padding: 20px;
                display: flex;
                justify-content: center;
                cursor: pointer;
                outline: none;
                font-size: 15px;
                transition: all 0.3s;
                opacity: 0.7;
            }
            .submitbtn:active{
                font-weight: bold;
                transition: 0s;
                box-shadow: 5px 5px 15px #171515;
            }
            .title1{
                background-color: aliceblue;
                padding-top: 30px;
                font-size: x-large;
                align-items: center;
            }

            .title1 h2{
                margin-bottom: .0rem;
                font-family: 'Jost', sans-serif;
                
            }
        
            .colour{
                background-color: aliceblue;
            }

            .wrapper1{
                width:100%;
                padding-top: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .text1{
                display: flex;
                float: left;
                justify-content: center;
                margin-left: 100px;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                height:300px;
                width:350px;
                border-radius: 5px;
                background-color: rgb(22, 170, 193,0.2);
                text-align:center;
                padding: 20px;
                align-items: center;
                font-family: 'Barlow Semi Condensed', sans-serif;
                font-size:22px;
            }
            
            .book{
                display: flex;
                justify-content: center;
                align-items: center;
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
                        <a class="nav-link active" href="specialities.php">Specialities</a>
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Book Appointment
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="book_appointment.php">Book An Appointment</a></li>
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
        <div class="title1">
            <h2 align="center" ><b>What is Neurology?</b></h2>
        </div>
        <div class="colour">
        <div class="wrapper1">
            <img src="images/neurology.jpg" height="300px"
                width="350px"></img>
            <div class="text1"><p><b>The field of medicine known as neurology focuses on the identification and management of all disorders and 
                illnesses affecting the brain, spinal cord, and peripheral nerves.</b></p></div>
        </div>
        <label id="select">Our Specialist </label>

        <?php
            include("conn.php");
            $sql = "SELECT * FROM doctorlist WHERE doctor_speciality='Neurology'";
            $result = mysqli_query($con,$sql);
        ?>

            <?php
                while($row=mysqli_fetch_array($result))
                { 

                echo     '<div class="wrapper">
                            <div class="left">
                                <img src="images/'.$row["doc_pic"].'" width="262.48" height="262.48">
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>'.$row['doctor_name'].'</h3>
                                    
                                    <div class="info_data">
                                        <div class="data">
                                            <h4>Speciality:</h4>
                                            <p>'.$row['doctor_speciality'].'</p>
                                        </div>
                                        <div class="data">
                                            <h4>Contact:</h4>
                                            <p>'.$row['doctor_contact'].'</p>
                                        </div>
                                        <br><br><br><br>
                                    </div>
                                    <div class="info_data">
                                        <div class="data">
                                            <h4>Language:</h4>
                                            <p>'.$row['doctor_languages'].'</p>
                                        </div>
                                        <div class="data">
                                            <h4>Email:</h4>
                                            <p>'.$row['doctor_email'].'</p>
                                        </div>
                                        <br><br><br><br>
                                    </div>
                                    <div class="info_data">
                                        <div class="data">
                                            <h4>Shift Hours:</h4>
                                            <p>'.$row['shift_hours'].'</p>
                                        </div>
                                        <div class="data">
                                            <h4>Gender:</h4>
                                            <p>'.$row['doctor_gender'].'</p>
                                        </div>
                                        <br><br><br>
                                    </div>
                                    <div class="book">
                                    <a href="find_a_doctor.php?doc_id='.$row['doc_id'].'"><button type="button" name="book" class="btn btn-outline-info">Book Appointment</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                mysqli_close($con);
            ?> 
    </body>
</html>
