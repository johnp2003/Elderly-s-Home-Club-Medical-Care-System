<?php
    session_start();
    if(isset($_SESSION["admin_id"])){
        $con = mysqli_connect("localhost","root","","elderly_database");
        $id = intval($_GET["doc_id"]);
        $sql = "DELETE FROM doctorlist WHERE doc_id=".$id;
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        header("location:Manage_Doctor.php");
    }else {
        echo "<script>alert('Please Login!');window.location.href='admin_login.php';</script>";
    }
?>