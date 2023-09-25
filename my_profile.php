<?php
    session_start();

    if(isset($_SESSION["pat_id"])){
        include("conn.php");

        $sql = "SELECT * FROM patient WHERE pat_id = " . $_SESSION["pat_id"] . "";
        $result = mysqli_query($con, $sql);
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            if($row){
                $username = $row["username"];
                $email = $row["email"];
                $ic = $row["patient_ic"];
                $gender = $row["gender"];
                $phone = $row["phone_number"];
                if($gender == "Male"){
                    $pfp = "images/male.png";
                }
                else{
                    $pfp = "images/female.png";
                }
            }
        }else{
            echo "No results";
        }
            
    }
    else {
        echo "<script>alert('Please Login!');window.location.href='patient_login.php';</script>";
    }
    if(isset($_POST["logout"])){
        header("location: logout.php"); 
    }
    if(isset($_POST["change_pwd"])){
        header("location: change_password.php");
    }
?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        
        <title>My Profile</title>
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

            .body_bg{
                background-color: #6fb3b8;
                padding: 0;
                margin: 0;
                font-family: serif;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .my_profile{
                background-color: rgba(255, 255, 255, 0.6);
                background-position: center;
                margin: auto;
                width: 40%;
                height: auto;
                padding: 50px;
            }
            #profile_pic{
                width: 100px;
                height: 100px;
            }
            .edit-btn{
                float: right;
                margin: 0;
                padding: 0;
            }
            #edit{
                width: 50px;
                height: 50px;
                cursor: pointer;
            }
            #back{
                width: 50px;
                height: 50px;
                float: left;
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
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          My Profile
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item active" href="#">View & Edit My Profile</a></li>
                          
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
        <div class="body_bg">
            <br>
            <div class="my_profile">
                <a href="customer_homepage.php"><img src="images/back.png" alt="backbtn" id="back"></a>
                <div class="edit-btn"><a href="edit_profile.php"><img src = "images/edit.png" id = "edit" alt="edit_profile"></a></div><br><br>
                <div class="content">
                    <br>
                    <h1>My Profile</h1>
                    <form method="post" id = "my_profile_form">
                        <?php echo '<img src='.$pfp.' alt="Gender Profile" id="profile_pic">'?><br><br>
                        <div><b>Username: </b><?php echo $username?></div></br>
                        <div><b>Gender: </b><?php echo $gender?></div></br>
                        <div><b>I/C: </b><?php echo $ic?></div></br>
                        <div><b>Email: </b><?php echo $email?></div></br>
                        <div><b>Phone Number: </b><?php echo $phone?></div>
                        <br>
                        <button name="logout">Logout</button>
                        <button name="change_pwd">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>