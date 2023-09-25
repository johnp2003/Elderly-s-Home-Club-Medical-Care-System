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
        <title>
            Edit Doctor
        </title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@500&family=Roboto+Condensed&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

        <style>
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
            .details{
                max-width: 500px;
                margin-left: 100px;
                margin: auto;
                background-image: url(images/notebook_pic.jpg);
                background-size: cover;
                padding: 10px;

                
            }
            .details h1{
                font-family: 'Mulish', sans-serif;
                font-family: 'Roboto Condensed', sans-serif;
                text-align: center;
            }

            .details form{
                font-family: 'Lato', sans-serif;
            }

            form .action {
                margin-top: 32px;
                justify-content: center;
                display: flex;
            }
            form .action input{
                border-radius: 4px;
                border: 1px solid white;
                cursor: pointer;
                font-size: 13px;
                font-weight: 600;
                height: 44px;
                letter-spacing: 3px;
                outline: 0;
                padding: 0 20px 0 22px;
                margin-right: 10px;
            }
            form .action input[type="submit"] {
                background: rgb(0, 0, 0);
                color: white;
            }

            input[type=text], textarea {
                transition: 0.3s;
                outline: none;
                padding: 3px;
                margin: 5px 1px 3px 0px;
                border: 2px solid #DDDDDD;
            }
            
            input[type=text]:focus, textarea:focus {
                box-shadow: 0 0 5px rgb(102, 194, 220);
                padding: 3px;
                margin: 5px 1px 3px 0px;
                border: 2px solid rgb(92, 203, 234);
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
                        <a class="nav-link" aria-current="page" href="admin_page.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="registered_patient_list_admin.php">Patients</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Doctors
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item active" href="manage_doctor.php">View & Edit Doctors</a></li>
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
        <br>


        <div class="details">
            <h1>Edit Doctor</h1>
            <br>

            <?php
                $con = mysqli_connect("localhost","root","","elderly_database");
                $id = intval($_GET["doc_id"]);
                $sql = "SELECT * FROM doctorlist WHERE doc_id=$id";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                    $doc_id = $row['doc_id'];
                    $doctor_name = $row['doctor_name'];
                    $doctor_email = $row['doctor_email'];
                    $doctor_contact = $row['doctor_contact'];
                    $doctor_speciality = $row['doctor_speciality'];
                    $doctor_languages = $row['doctor_languages'];
                    $doctor_gender = $row['doctor_gender'];
                    $shift_hours = $row['shift_hours'];
                    $doc_pic = $row['doc_pic'];
            ?>

                    <form  method="post" enctype="multipart/form-data">
                    <input type="hidden" name="doc_id" value="<?php echo $doc_id ?>">
                        <div class="form">
                            <label>Doctor Name:</label><br>
                            <input type="text" value="<?php echo $doctor_name ?>" placeholder="Enter Doctor's Name" name="doctor_name">
                        </div>
                        <br>
                        <div class="form">
                            <label>Speciality:</label><br>
                            <input type="text" value="<?php echo $doctor_speciality ?>"  placeholder="Enter Speciality" name="doctor_speciality">
                        </div>
                        <br>
                        <div class="form">
                            <label>Gender:</label> <br>
                            <input type="radio" name="doctor_gender" value="Male" required="required"
                            <?php if ( $doctor_gender == "Male") { ?>
                            checked
                            <?php } ?>			
                            > &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="doctor_gender" value="Female" required="required"
                            <?php if ( $doctor_gender == "Female") { ?>
                            checked
                            <?php } ?>
                            > &nbsp;&nbsp;Female 

                        </div>
                        <br>
                        <div class="form">
                            <label>Email:</label> <br>
                            <input type="text" value="<?php echo $doctor_email ?>"  placeholder="Enter Doctor's Email" name="doctor_email">
                        </div>
                        <br>
                        <div class="form">
                            <label>Contact:</label> <br>
                            <input stype="text" value="<?php echo $doctor_contact ?>" placeholder="Enter Contact No." name="doctor_contact">
                        </div>
                        <br>
                        <div class="form">
                            <label>Profile Pic:</label> <br>
                            <input type="file" placeholder="Upload Image" name="doc_pic">
                        </div>
                        <br>

                        <div class="form">
                            <label>Shift Hours:</label> <br>
                            <select name="shift_hours" required="required">
                                <option value="">Please select shift hours</option>
                                <option value="9am-5pm" 
                                <?php if ( $shift_hours == "9am-5pm") { ?>
                                selected
                                <?php } ?>
                                >9am-5pm</option>
                                <option value="Part-time" 
                                <?php if ( $shift_hours == "Part-time") { ?>
                                selected
                                <?php } ?>
                                >Part-time</option>
                                <option value="Other"
                                <?php if ( $shift_hours == "Other") { ?>
                                selected
                                <?php } ?>
                                >Other</option>
                                </select>
                        </div>
                            
                        <br>

                        <div class="form">
                            <label>Main Language:</label> <br>
                            <select name="doctor_languages" required="required">
                                <option value="">Please select Doctor's Main Language</option>
                                <option value="English" 
                                <?php if ($doctor_languages == "English") { ?>
                                selected
                                <?php } ?>
                                >English</option>
                                <option value="Bahasa Malaysia" 
                                <?php if ($doctor_languages == "Bahasa Malaysia") { ?>
                                selected
                                <?php } ?>
                                >Bahasa Malaysia</option>
                                <option value="Mandarin"
                                <?php if ($doctor_languages == "Mandarin") { ?>
                                selected
                                <?php } ?>
                                >Mandarin</option>
                                <option value="Mandarin"
                                <?php if ($doctor_languages == "Mandarin") { ?>
                                selected
                                <?php } ?>
                                >Mandarin</option>
                                <option value="Tamil"
                                <?php if ($doctor_languages == "Tamil") { ?>
                                selected
                                <?php } ?>
                                >Tamil</option>
                                <option value="Other"
                                <?php if ($doctor_languages == "Other") { ?>
                                selected
                                <?php } ?>
                                >Other</option>
                                
                            </select>
                        <div class="action">
                            <input type="button" onclick="history.go(-1);" value="Back">
                            <input type="submit" name="submitbtn">
                        </div>
                    </form>

                    <?php
                    $con = mysqli_connect("localhost","root","","elderly_database");

                    if(isset($_POST['submitbtn'])){
                        $ddoc_id = $_POST['doc_id'];
                        $ddoc_name = $_POST['doctor_name'];
                        $ddoc_email = $_POST['doctor_email'];
                        $ddoc_contact = $_POST['doctor_contact'];
                        $ddoc_speciality = $_POST['doctor_speciality'];
                        $ddoc_languages = $_POST['doctor_languages'];
                        $ddoc_gender = $_POST['doctor_gender'];
                        $ddoc_shift_hours = $_POST['shift_hours'];
                        $ddoc_pic = $_FILES['doc_pic']['name'];
                        $ddoc_pic_tmp = $_FILES['doc_pic']['tmp_name'];
                        
                        if(empty($ddoc_pic)){
                            $ddoc_pic = $doc_pic;
                        }

                        $update = "UPDATE doctorlist SET doc_id='$ddoc_id', doctor_name='$ddoc_name', doctor_email='$ddoc_email', 
                        doctor_contact='$ddoc_contact', doctor_speciality='$ddoc_speciality', doctor_languages='$ddoc_languages', 
                        doctor_gender='$ddoc_gender', shift_hours='$ddoc_shift_hours', doc_pic='$ddoc_pic'
                        WHERE doc_id='$id' ";

                        $run = mysqli_query($con,$update);
                        if($run === true){
                            echo '<script>alert("Record updated!");window.location.href="manage_doctor.php";</script>'; 
                            move_uploaded_file($ddoc_pic_tmp,"images/$ddoc_pic");
                        }else{
                            echo "Update failed, please try again";
                        }
                    }
                    ?>
                </div>
    </body>
</html>