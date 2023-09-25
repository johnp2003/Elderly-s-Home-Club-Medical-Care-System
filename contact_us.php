<?php
    session_start();
    if(isset($_SESSION["pat_id"])){
        include("conn.php");
        if(isset($_POST["submitBtn"])){
            $patient_id = $_SESSION["pat_id"];
            $feedback = $_POST["message"];
            $sql = "INSERT INTO feedback(pat_id, feedback) VALUES ('$patient_id', '$feedback')";
            $result = mysqli_query($con, $sql);
            echo '<script>alert("Feedback Submitted!");window.location.href="contact_us.php";</script>';
        }
    }else {
        echo "<script>alert('Please Login!');window.location.href='patient_login.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contact us</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <style>
            *{
                margin: 0;
                box-sizing: border-box;
                list-style: none;
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
                background-color: #EDF1FF;
            }
            #contact_pic {
                display: block;
                margin-left: auto;
                margin-right: auto;
                opacity: 0.6;
            }
            .container1 {
                position:relative;
                color: black;
            }
            .text {
                position:absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 45px;
                font-family: 'Courier New', Courier, monospace;
                font-weight: bold;
            }
            .call_info {
                font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                float: left;
                background: #E8D4D4;
                height: 470px;
                width: 500px;
                vertical-align: top;
                text-align: center;
            }
            a[href^="tel:"] {
                color: #373737;
                text-decoration: none;
            }
            .call_info a:hover {
                font-weight:bold;
            }
            .chat_box {
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                background-color: #E8D4D4;
                height: 470px;
                width: 500px;
                float: right;
                vertical-align: top;
                text-align: center;
            }
            .wrapper {
                margin: auto;
                padding-top: 90px;
                width: 1200px;
                margin-bottom: 600px;
            }
            #chat {
                mix-blend-mode:darken;
                height: 150px;
                width: 150px;
            }
            .popup {
                position: absolute;
                top: -150%;
                left: 50%;
                opacity: 0;
                transform: translate(-50%, -50%) scale(1.25);
                width: 560px;
                padding: 20px 30px;
                background: #fff;
                box-shadow: 2px 2px 5px 5px rgba(0,0,0,0.15);
                border-radius: 10px;
                transition: top 0ms ease-in-out 200ms, opacity 200ms ease-in-out 0ms, transform 20ms ease-in-out 0ms;
            }
            .popup.active {
                top: 100%;
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
                transition: top 0ms ease-in-out 0ms, opacity 200ms ease-in-out 0ms, transform 20ms ease-in-out 0ms;
            }
            .popup .close-btn{
                position: absolute;
                top: 10px;
                right: 10px;
                width: 15px;
                height: 15px;
                background: #888;
                color: #eee;
                text-align: center;
                line-height: 15px;
                border-radius: 15px;
                cursor: pointer;
            }
            .popup .form h2 {
                text-align: center;
                color: #222;
                margin: 10px 0px 20px;
                font-size: 25px;
            }
            .popup .form .form-element {
                margin: 15px 0px;
            }
            .popup .form .form-element button {
                width: 100%;
                height: 40px;
                border: none;
                outline: none;
                font-size: 16px;
                background: #222;
                color: #f5f5f5;
                border-radius: 10px;
                cursor: pointer;
                margin-top: 30px;
            }
            #show-login {
                outline: none;
                border: 0;
                background: transparent;
                font-size: 35px;
                color: #373737;
            }
            #show-login:hover {
                font-weight: bold;
            }
            .form-element {
                flex-basis: 40%;
                font-size: 19px;
            }
            .popup textarea {
                min-height: 200px;
                max-height: 400px;
                max-width: 500px;
                border-radius: 30px;
                box-shadow: 0 5px 5px rgba(0, 0, 0, 0,1);
                width: 500px;
                padding: 20px;
                margin-top: 20px;
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
                        <a class="nav-link active" href="#">Contact Us</a>
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
        <div class="container1">
            <img src="images/CustomerService.jpg" alt="ContactUs_image" height="300px" width="100%" id="contact_pic">
            <div class="text">Contact Us</div>
        </div>
        <div class="wrapper">
            <div class="call_info">
            <a target="_blank" href="https://wa.link/yl0dk7%22%3E"><img src="images/call icon.png" alt="Phone_symbol" height="150" width="150"><br></a>
                <span>Call or WhatsApp us at:<br><br><br><br><br></span>
                <span style="font-size: 35px;"><a href="tel:+603-0022-2323">+603-0022-2323</a></span>
            </div>
            <div class="chat_box">
                <img src="images/chatbox.png" alt="Chat_symbol" id="chat"><br>
                <span>Drop down your feedback here<br><br><br><br></span>
                <button id="show-login">Activate feedback<br>form</button>
            </div>
            <div class="popup" id="popout">
                <div class="close-btn">&times;</div>
                <div class="form">
                    <h2>Feedback form</h2>
                    <div class="form-element">
                        <form action="" method="post">
                        <label>Message: </label>
                        <textarea name="message" rows="5" placeholder="Write your feedback here" required="required"></textarea>
                        <button type="submit" id="submitBtn" name="submitBtn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.querySelector("#show-login").addEventListener("click",function(){
                document.querySelector(".popup").classList.add("active");
            });
            document.querySelector(".popup .close-btn").addEventListener("click",function(){
                document.querySelector(".popup").classList.remove("active");
            });
        </script>
    </body>
</html>