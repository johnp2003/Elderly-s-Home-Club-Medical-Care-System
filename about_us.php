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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <title>About Us</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <style>
          /* css for header */
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
            /*about_us part css*/
            .about_us{
              margin: auto;
              padding: 65px;
              background-image: url("images/company.jpg");
              background-size: 100% 100%;
              background-color: #6fb3b8;
              font-family: serif;
              text-align: justify;
            }
            .abous_us_content{
              background-color: rgba(255, 255, 255, 0.65);
              margin: auto;
              padding: 30px;
            }
            #title{
              font-weight: bold; 
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
                <a class="nav-link active" href="#about_us">About Us</a>
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
        <!--About Us-->
        <div class="about_us">
            <div class="abous_us_content">
              <h1 id="title">About Us</h1></br>
              <h3 id="title">Company Background</h3>
              <h4 id="description">Elderly Home's Club is a social welfare organization that offers shelter, support and medical 
                services to poor seniors. It is a non-profit organisation. By establishing homes for the elderly, the organisation 
                hopes that the poor and the homeless can now have a place where they can call their homes, where they can also enjoy 
                a better quality of life.</h4></br>
              <h3 id="title">Vision & Mission</h3>
              <h4 id="description">We wish to makes the elders life more easier by booking appointment online via our 
                website.</h4>
            </div>
          </div>
    </body>
    
</html>