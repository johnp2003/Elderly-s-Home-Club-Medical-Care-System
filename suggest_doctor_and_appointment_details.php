<?php
    session_start();
    if(isset($_SESSION["pat_id"])){
        include("conn.php");
        if(isset($_POST["submit_btn"])){
          $select_date = $_POST["select_date"];
          $time_slot = $_POST["time_slot"];
          $details = $_POST["med_req_details"];
          $speciality = $_POST["specialities"];
          $status = "Pending";
          $patient_id = $_SESSION["pat_id"];
          $doc_id = "1";

          $insert_sql= "INSERT INTO appointment(select_date, time_slot, medical_request_details, request_speciality, status, pat_id, doc_id) 
          VALUES ('$select_date','$time_slot','$details','$speciality','$status','$patient_id','$doc_id')";

          $result = mysqli_query($con, $insert_sql);
          if($result){
            $message= "Appointment Request Sent!";
          }else{
            $message= "Please Try Again.";
          }
        }
    }else {
      echo "<script>alert('Please Login!');window.location.href='patient_login.php';</script>";
    }
?>

<!DOCTYPE html><!--add database-->

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        
        <title>Suggest & Appointment Details</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
    
        <link rel="stylesheet" href="appointment.css" />
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
                            <li><a class="dropdown-item" href="book_appointment.php">Book An Appointment</a></li>
                            <li><a class="dropdown-item active" href="#">Suggest a Doctor</a></li>
                            <li><a class="dropdown-item" href="specialities.php">Find a Doctor</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="view_my_appointment_customer.php">View Appointment</a></li>

                        </ul>
                      </li>
                    </ul>
                </div>
                
            </div>
        </nav>
        
        <div class="josh">
          <section class="container">
          <header>Enter Appointment Details</header>
          <form action="#" class="form" method="post">
              <div class="input-box">
              <label>Request Specialities</label>
              </div>
              <div class="select-box">
                  <select name="specialities">
                    <option hidden value="">Select</option>
                    <option value="Anesthesiology">Anesthesiology</option>
                    <option value="Neurology">Neurology</option>
                    <option value="General Surgery">General Surgery</option>
                    <option value="Pathology">Pathology</option>
                  </select>
              </div>
              <div class="column">

                

                <div class="input-box">
                  <label>Select Preferred Time</label>
                  <select name="time_slot" required="required" class="select-box">
                    <option hidden value="">Select</option>
                    <option value="0800-1000">8am-10am</option>
                    <option value="1000-1200">10am-12pm</option>
                    <option value="1300-1500">1pm-3pm</option>
                    <option value="1500-1700">3pm-5pm</option>
                  </select>
                </div>

                <div class="input-box">
                    <label>Select Preferred Date</label>
                    <input type="date" name="select_date" placeholder="Enter date" required="required" value=""/>
                </div>
              </div>
              
              <div class="input-box medical">
              <label>Medical Request Details</label>
              <input type="text" name="med_req_details" placeholder="Enter request details" required="required" value=""/>
              <div style="color: red;"><?php if(isset($message)) { echo $message; } ?></div>
              <button name="submit_btn">Submit</button>
          </form>
          </section>
        </div>
  </body>
</html>
