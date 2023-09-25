<?php
    session_start();
    if(isset($_SESSION["admin_id"])){
        $con = mysqli_connect("localhost","root","","elderly_database");
        $id = intval($_GET["appoint_id"]);
        $sql = "UPDATE appointment SET status='Accepted' WHERE appoint_id=".$id;
        if (mysqli_query($con, $sql)) {
            mysqli_close($con);
            echo '<script>alert("Record updated! '.$id.' ");window.location.href="manage_patient_appointment_admin.php";</script>';
        }
    }else {
        echo "<script>alert('Please Login!');window.location.href='admin_login.php';</script>";
    }
    ?>




