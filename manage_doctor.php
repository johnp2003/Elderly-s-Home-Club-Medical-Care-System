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
        <title>Manage Doctor</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <style>
            body {
                margin: auto;
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
                padding: 24px;
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
                margin-bottom: 80px;
            }
            th {
                border-bottom: solid black;
            }
            tbody tr:nth-child(even) {
                background: #fdf6eb;
            }
            .links a{
                color: blue;
            }
            .links a:hover{
                color: red;
                font-weight: bolder;
            }
            .links a:active{
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
                          <li><a class="dropdown-item active" href="#">View & Edit Doctors</a></li>
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
        <?php
            $searchkeyword = "";
            include("conn.php");
            if (isset($_POST["searchBtn"])) {
                $searchkeyword = mysqli_real_escape_string($con, $_POST['doctor_details']);
                $sql = "SELECT * FROM doctorlist WHERE doctor_name LIKE '%".$searchkeyword."%' OR doctor_email LIKE '%".$searchkeyword."%'
                OR doctor_contact LIKE '%".$searchkeyword."%' OR doctor_speciality LIKE '%".$searchkeyword."%'
                OR shift_hours LIKE '%".$searchkeyword."%' OR doc_id LIKE '%".$searchkeyword."%' OR doc_id LIKE '%".$searchkeyword."%'";
                $result = mysqli_query($con, $sql);
            }
            else {
                $sql = "SELECT * FROM doctorlist";
                $result = mysqli_query($con, $sql);
            }
        ?>
        <div class="container">
            <form class="search-bar" method="POST">
                <input type="text" placeholder="Search for doctor" name="doctor_details">
                <button type="submit" name="searchBtn"><img src="images/search bar.png"></button>
            </form>
            <a href="add_doctor_admin.php"><input type="submit" value="Add Doctor" name="add_doctor_btn" class="add-doctor"/></a>
        </div>
        <div>
            <table style="width: 90%;">
                <tr>
                    <th>Doctor ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Speciality</th>
                    <th>Contacts</th>
                    <th>Shift Hours</th>
                    <th class="text">Edit</th>
                    <th class="text">Delete</th>
                </tr>
                <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$row['doc_id']."</td>";
                        echo "<td>".$row['doctor_name']."</td>";
                        echo '<td class="emailbtn"><a href="mailto:'.$row['doctor_email'].'">'.$row['doctor_email'].'</a></td>';
                        echo "<td>".$row['doctor_speciality']."</td>";
                        echo "<td>".$row['doctor_contact']."</td>";
                        echo "<td>".$row['shift_hours']."</td>";
                        echo '<td class="links"><a href="edit_doctor_admin.php?doc_id='.$row['doc_id'].'">Edit</a></td>';
                        echo '<td class="links"><a href="delete.php?doc_id='.$row['doc_id'].'"onclick="return confirm(\'Delete '.$row['doctor_name'].' record?\');">Delete</a></td>';
                        echo "</tr>";
                    }
                    mysqli_close($con);
                ?>
            </table>
        </div>
    </body>
</html>