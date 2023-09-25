<?php
    session_start();
    if(isset($_SESSION["pat_id"])){
        $con = mysqli_connect("localhost","root","","elderly_database");
    }else {
        echo "<script>alert('Please Login!');window.location.href='patient_login.php';</script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Find a Doctor/Specialist Appointment Form</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
                background-color: #EDF1FF;
            }
            .navbar-nav{
                margin-right: 50px;
                text-align: center;
            }
            nav{
                box-shadow: 0 0.4rem 1.4rem rgb(0 0 0 / 11%);
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
            .wrapper1 {
                position: absolute;
                margin-top: 200px;
                left: 50%;
                transform: translate(-50%,-50%);
                width: 700px;
                display: flex;
                box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
                font-family: Arial, Helvetica, sans-serif;
            }
            .wrapper1 .left1{
                width: 68%;
                background: linear-gradient(to right,#e6ebff, #fff, #e6ebff);
                padding: 60px 25px;
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
                text-align: center;
                color: #fff;
            }
            .wrapper1 .right1{
                width: 65%;
                background: #fff;
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
                padding: 30px 25px;
            }
            .wrapper1 .right1 .info,
            .wrapper1 .right1 .projects{
                margin-bottom: 25px;
            }
            .wrapper1 .right1 .info h3,
            .wrapper1 .right1 .projects h3{
                margin-bottom: 15px;
                padding-bottom: 5px;
                border-bottom: 1px solid #e0e0e0;
                color: #353c4e;
                letter-spacing: 3px;
            }
            .wrapper1 .right1 .info_data,
            .wrapper1 .right1 .projects_data {
                display: flex;
                justify-content: space-between;
            }
            .wrapper1 .right1 .info_data .data,
            .wrapper1 .right1 .projects_data .data {
                width: 55%;
            }
            .wrapper1 .right1 .info_data .data h4,
            .wrapper1 .right1 .projects_data .data h4 {
                color: #353c4e;
                margin-bottom: 5px;
            }
            .wrapper1 .right1 .info_data .data p,
            .wrapper1 .right1 .projects_data .data p {
                margin-bottom: 10px;
            }
            #select {
                text-transform: uppercase;
                color: #171515;
                font-size: larger;
                letter-spacing: 1px;
                font-weight: bold;
                padding: 70px;
                margin-left: 60px;
                font-family: Arial, Helvetica, sans-serif;
            }
            .details1 {
                margin-top: 500px;
                padding: 70px;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                width: auto;
            }
            .btn1 {
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
            .btn1 .btn-left {
                font-size: 19px;
                flex-basis: 20%;
            }
            .btn1 .btn-left a {
                text-decoration: none;
            }
            .details_form input, select {
                width: 70%;
                padding: 10px;
                margin-top: 20px;
                margin-bottom: 40px;
                border-radius: 20px;
                border: 1px solid black;
                padding-left: 30px;
                cursor: pointer;
                appearance: none;
            }
            
            .medical_details {
                flex-basis: 40%;
                font-size: 19px;
            }
            .btn1 .btn-right {
                font-size: 19px;
            }
            .medical_details textarea {
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
            #bottom-nav {
                margin-top: 200px;
                background-color: #c8ccd0;
                height: 300px;
            }
            #bottom-text {
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
                            <li><a class="dropdown-item active" href="specialities.php">Find a Doctor</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="view_my_appointment_customer.php">View Appointment</a></li>
                        </ul>
                      </li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>
        <label id="select">Selected Specialist: </label>
        <?php
        $con = mysqli_connect("localhost","root","","elderly_database");
        $id = intval($_GET["doc_id"]);
        $req_spec = "";
        $sql = "SELECT * FROM doctorlist WHERE doc_id=$id";
        $result = mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result))
                { 
                echo     '<div class="wrapper1">
                            <div class="left1">
                                <img src="images/'.$row["doc_pic"].'" width="262.48" height="262.48">
                            </div>
                            <div class="right1">
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
                                </div>
                            </div>
                        </div>';

                        $req_spec = $row['doctor_speciality'];
                }
                mysqli_close($con);
            ?> 
            <?php
            if (isset($_POST['next_page'])){
                $pat_id = $_SESSION["pat_id"];
                $id = intval($_GET["doc_id"]);
                $con = mysqli_connect("localhost","root","","elderly_database");
                
                $sql = "INSERT INTO appointment (select_date, time_slot, medical_request_details, request_speciality, status, pat_id, doc_id) 
                VALUES
                ('$_POST[dob]','$_POST[time]','$_POST[message]','$req_spec','Pending','$pat_id', '$id')";

                if(!mysqli_query($con, $sql)){
                    die("Error: ".mysqli_error($con));
                }
                else {
                    echo '<script>alert("Successfully Submitted!");window.location.href="view_my_appointment_customer.php";</script>';
                }
                mysqli_close($con); 
            }
            ?>
        <div class="details1">
            <div id="topic">2.Enter Appointment Details</div>
            <div class="contact-box">
                <div class="details_form">
                    <form method="post">
                        <label>Select Preferred Date: </label>
                        <input type="date" name="dob" placeholder="Select" required="required">
                        <label>Select Preferred Time: </label>
                        <select name="time" required="required">
                            <option value="">Select</option>
                            <option value="0800-1000">8am-10am</option>
                            <option value="1000-1200">10am-12pm</option>
                            <option value="1300-1500">1pm-3pm</option>
                            <option value="1500-1700">3pm-5pm</option>
                        </select>
                </div>
                <div class="medical_details">
                    <label>Medical Request Details: </label>
                    <textarea name="message" placeholder="Write your medical request here" required="required"></textarea>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr("input[type=date]", {
                minDate: "today"
            });
        </script>
        <div class="btn1">
            <div class="btn-box">
                <div class="btn-left">
                    <button class="submitbtn" type="submit" name="back_page" onclick="history.go(-1);">Back</button></a>
                </div>
                <div class="btn-right">
                        <button class="submitbtn" type="submit" name="next_page">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="bottom-nav">
            <div id="bottom-text">(This is section is for bottom navigation use)</div>
        </div>
    </body>
</html>