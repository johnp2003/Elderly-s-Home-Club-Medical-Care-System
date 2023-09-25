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
            Edit Registered Customer 
        </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans&display=swap" rel="stylesheet"> 
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


            body{
            background-color: #EDF1FF;
            }
            .title{
                font-family: 'Sofia Sans', sans-serif;
                font-size: 30px;
                text-align: center;
            }
            .details{
                margin: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: 'Oxygen', sans-serif;
                width: 400px;
            }
            
            form{
                background: #fff;
                width: 600px;
                height: 570px;
                border-radius: 4px;
                box-shadow: 1px 1px 15px rgba(0,0,0,0.15);
                padding: 30px 30px;
                margin-bottom: 50px;
            }
            
            form .action {
                display: flex;
                margin-top: 32px;
                justify-content: center;
                align-items: center;
               
            }
            form .action button{
                border-radius: 4px;
                border: 1px solid white;
                cursor: pointer;
                font-size: 13px;
                font-weight: 600;
                height: 44px;
                letter-spacing: 3px;
                outline: 0;
                padding: 0 20px 0 22px;
                margin-right: 30px;
            }
            form .action button[type="submit"] {
                background: rgb(0, 0, 0);
                color: white;
            }

            input[type=text], textarea {
                transition: 0.3s;
                outline: none;
                border: 2px solid #DDDDDD;
            }
            
            input[type=text]:focus, textarea:focus {
                box-shadow: 0 0 5px rgb(102, 194, 220);
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
        <br>
        <?php
        $con = mysqli_connect("localhost","root","","elderly_database");
        $id = intval($_GET["pat_id"]);
        $sql = "SELECT * FROM patient WHERE pat_id=$id";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($result))
        {
        ?>
        <div class="title"><p>Editing Registered Patient Details</p></div>
        
        <div class="details">
                <form action="update_registered_patient_admin" method="post">
                <input type="hidden" name="pat_id" value="<?php echo $row['pat_id'] ?>">
                <div class="form">
                        <label>Patient ID:</label> <br>
                        <input type="text" value="<?php echo $row['pat_id'] ?>" placeholder="Enter Patient ID" name="pat_id">
                    </div>
                    <br>
                    <div class="form">
                        <label>Email:</label> <br>
                        <input type="text" value="<?php echo $row['email'] ?>" placeholder="Enter Patient's email" name="email">
                    </div>
                    <br>
                    <div class="form">
                        <label>Username:</label> <br>
                        <input type="text" value="<?php echo $row['username'] ?>" placeholder="Enter Patient's username" name="username">
                    </div>
                    <br>
                    <div class="form">
                        <label>IC/Passpord No.:</label> <br>
                        <input type="text" value="<?php echo $row['patient_ic'] ?>" placeholder="Enter Patient's IC/Passport No." name="patient_ic">
                    </div>
                    <br>
                     <div class="form">
                        <label>Gender:</label> <br>
                        <input type="radio" name="gender" value="Male" required="required"
                        <?php if ($row['gender'] == "Male") { ?>
                        checked
                        <?php } ?>			
                        > &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender" value="Female" required="required"
                        <?php if ($row['gender'] == "Female") { ?>
                        checked
                        <?php } ?>
                        > &nbsp;&nbsp;Female 
                    </div>
                    <br>
                    <div class="form">
                        <label>Phone Number:</label> <br>
                        <input type="text" value="<?php echo $row['phone_number'] ?>" placeholder="Enter Patient's Phone Number" name="phone_number">
                    </div>
                    <div class="action">
                        <button type="reset" class="btn">Reset</button>
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </form>
        </div>
        <?php
        }
        mysqli_close($con);
        ?>
      
        
    </body>
</html>