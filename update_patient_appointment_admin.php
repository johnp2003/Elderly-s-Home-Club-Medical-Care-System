<?php
    session_start();
    if(isset($_SESSION["admin_id"])){
        include("conn.php");
        $sql = "UPDATE appointment SET 
        appoint_id='$_POST[appoint_id]', 
        pat_id='$_POST[pat_id]', 
        doc_id='$_POST[doc_id]', 
        request_speciality='$_POST[request_speciality]', 
        medical_request_details='$_POST[medical_request_details]', 
        select_date='$_POST[select_date]', 
        time_slot='$_POST[time_slot]',
        status='$_POST[status]'
        WHERE appoint_id=$_POST[appoint_id];";

        if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        echo '<script>alert("Record updated!");window.location.href="patient_appointment_admin.php";</script>';
        }else{
            echo '<script>alert("Invalid Input!");window.location.href="patient_appointment_admin.php";</script>';
        }
    }else{
        echo "<script>alert('Please Login!');window.location.href='admin_login.php';</script>";
    }
?>