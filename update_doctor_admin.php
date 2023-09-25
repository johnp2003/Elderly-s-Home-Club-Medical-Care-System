<?php
    session_start();
    if(isset($_SESSION["admin_id"])){
        include("conn.php");
        if (isset($_POST['submitbtn'])){

            $newdoc_id = $_POST['doc_id'];
            $newdoctor_name =  $_POST['doctor_name'];
            $newdoctor_speciality = $_POST['doctor_speciality'];
            $newdoctor_gender = $_POST['doctor_gender'];
            $newdoctor_email = $_POST['doctor_email'];
            $newdoctor_speciality = $_POST['doctor_speciality'];
            $newdoctor_contact = $_POST['doctor_contact'];
            $newshift_hours =  $_POST['shift_hours'];
            $newdoctor_languages =  $_POST['doctor_languages'];
            $newdoc_pic = $_FILES['doc_pic']['name'];
            $newdoc_pic_tmp = $_FILES['doc_pic']['tmp_name'];

            $sql = "UPDATE doctorlist SET 
            doc_id='$_POST[doc_id]', 
            doctor_name='$_POST[doctor_name]',
            doctor_email='$_POST[doctor_email]',
            doctor_contact='$_POST[doctor_contact]',
            doctor_speciality='$_POST[doctor_speciality]',
            doctor_languages='$_POST[doctor_languages]',
            doctor_gender='$_POST[doctor_gender]',
            shift_hours='$_POST[shift_hours]',
            doc_pic='$_POST[doc_pic]'
            WHERE doc_id=$_POST[doc_id];";

            $update = mysqli_query($con,$sql);
            if($r_insert == true){
                echo "<script>alert('Data added.')</script>";
                move_uploaded_file($newdoc_pic_tmp,"images/$newdoc_pic");
            
            }else {
                echo "Please try again";
            }

        }
    }else{
        echo "<script>alert('Please Login!');window.location.href='admin_login.php';</script>";
    }

?>