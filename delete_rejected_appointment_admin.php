<?php
    session_start();
    if(isset($_SESSION["admin_id"])){
        $con = mysqli_connect("localhost","root","","elderly_database");
        $id = intval($_GET["appoint_id"]);
        $sql = "DELETE FROM appointment WHERE appoint_id=".$id;
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        header("location:manage_patient_appointment_admin.php");
    }else {
        echo "<script>alert('Please Login!');window.location.href='admin_login.php';</script>";
    }
?>
