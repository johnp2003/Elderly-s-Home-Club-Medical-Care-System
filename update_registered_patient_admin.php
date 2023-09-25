<?php
    session_start();
    if(isset($_SESSION["admin_id"])){
        include("conn.php");
        $sql = "UPDATE patient SET 
        pat_id='$_POST[pat_id]', 
        email='$_POST[email]',
        username='$_POST[username]', 
        patient_ic='$_POST[patient_ic]', 
        phone_number='$_POST[phone_number]', 
        gender='$_POST[gender]'
        WHERE pat_id=$_POST[pat_id];";

        if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        echo '<script>alert("Record updated!");window.location.href="registered_patient_list_admin.php";</script>';
        }else{
            echo '<script>alert("Invalid Input!");window.location.href="registered_patient_list_admin.php";</script>';
        }
        
    }else {
        echo "<script>alert('Please Login!');window.location.href='admin_login.php';</script>";
    }
?>