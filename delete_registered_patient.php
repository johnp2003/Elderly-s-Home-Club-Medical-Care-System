<?php
    session_start();
    if(isset($_SESSION["admin_id"])){
        $con = mysqli_connect("localhost","root","","elderly_database");
        $id = intval($_GET["pat_id"]);
        $sql = "DELETE FROM patient WHERE pat_id=".$id;
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        header("location:registered_patient_list_admin.php");
    }else {
        echo "<script>alert('Please Login!');window.location.href='admin_login.php';</script>";
    }
?>