<?php
    session_start();
    if(isset($_SESSION["pat_id"])){
        include("conn.php");
        $sql="SELECT * from patient WHERE pat_id = " . $_SESSION["pat_id"] . "";
        $result = mysqli_query($con, $sql);
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            if($row){
                $username = $row["username"];
                $email = $row["email"];
                $ic = $row["patient_ic"];
                $gender = $row["gender"];
                $phone = $row["phone_number"];
            }
        }else{
            echo "No results";
        }
        
        if(isset($_POST["save_chg"])){
            $new_username = $_POST["username"];
            $new_gender = $_POST["gender"];
            $new_ic = $_POST["ic"];
            $new_email = $_POST["email"];
            $new_phone = $_POST["phone_number"];

            if(!empty($new_username)){
                if($new_username!=$username){
                $update = mysqli_query($con, "UPDATE patient SET username = '$new_username' WHERE pat_id = " . $_SESSION["pat_id"] . "");
                $message = "Record updated.";         
                }
            }
            if(!empty($new_gender)){
                if($new_gender != $gender){
                    $update = mysqli_query($con, "UPDATE patient SET gender = '$new_gender' WHERE pat_id = " . $_SESSION["pat_id"] . "");
                    $message = "Record updated.";
                }
            }
            if(!empty($new_ic)){
                if($new_ic != $ic){
                    $update = mysqli_query($con, "UPDATE patient SET patient_ic = '$new_ic' WHERE pat_id = " . $_SESSION["pat_id"] . "");
                    $message = "Record updated.";
                }
            }
            if(!empty($new_email)){
                if($new_email != $email){
                    $update = mysqli_query($con, "UPDATE patient SET email = '$new_email' WHERE pat_id = " . $_SESSION["pat_id"] . "");
                    $message = "Record updated.";
                }
            }
            if(!empty($new_phone)){
                if($new_phone != $phone){
                    $update = mysqli_query($con, "UPDATE patient SET phone_number = '$new_phone' WHERE pat_id = " . $_SESSION["pat_id"] . "");
                    $message = "Record updated.";
                }
            }       
        }
    }else{
        echo "<script>alert('Please Login!');window.location.href='patient_login.php';</script>";
    }
?>
<html>
    <head>
        <title>Edit Profile</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <style>
            body{
                background-color: #6fb3b8;
                margin: auto;
                padding: auto;
                font-family: serif;
            }
            form{
                font-size: 17px;
                display: flex;
            }
            .edit_profile{
                margin: auto;
                margin-top: 50px;
                margin-bottom: 50px;
                display: flex;
                justify-content: center;
                align-content: center;
                background-color: rgba(255, 255, 255, 0.6);
                width: 400px;
            }

            .center{
                margin: auto;
                margin-top: 20px;
                margin-bottom: 20px;
                width: 50%;
                padding: 10px;
            }
            .submit{
                position:relative;
                left:30px;
            }
            input[type=text], textarea {
                height:33px;
                transition: 0.3s;
                outline: none;
                padding: 3px;
                margin: 5px 1px 3px 0px;
                border: 2px solid #DDDDDD;
                width: 200px;
            }
            
            input[type=text]:focus, textarea:focus {
                box-shadow: 0 0 5px rgb(102, 194, 220);
                padding: 3px;
                margin: 5px 1px 3px 0px;
                border: 2px solid rgb(92, 203, 234);
                width: 200px;
            }

            input[type=email], textarea {
                height:33px;
                transition: 0.3s;
                outline: none;
                padding: 3px;
                margin: 5px 1px 3px 0px;
                border: 2px solid #DDDDDD;
                width: 200px;
            }
            
            input[type=email]:focus, textarea:focus {
                box-shadow: 0 0 5px rgb(102, 194, 220);
                padding: 3px;
                margin: 5px 1px 3px 0px;
                border: 2px solid rgb(92, 203, 234);
                width: 200px;
            }

            form .action {
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
                width: 200px;
            }
            form .action input[type="submit"] {
                background: rgb(0, 0, 0);
                color: white;
            }
            </style>
    </head>
    <body>
        <div class = "edit_profile">
            
            <div class="center">
                <div><a href="my_profile.php"><img src="images/back.png" alt="backbtn" width="50px" height="50px"></a></div>
                <div><h1>Edit Profile</h1></div>
                <form action="" method="post" id="edit_profile_form">
                    <div>
                        <div><label for="user-name">Username</label></div>
                        <div><input name="username" id="username" type="text" placeholder="<?php echo $username?>" value="">
                    </div>
                    <br>
                    <div>
                        <label for="user-gender">Gender:</label> <br>
                        <input type="radio" name="gender" value="Male" required="required"
                        <?php if ( $gender == "Male") { ?>
                        checked
                        <?php } ?>			
                        > &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender" value="Female" required="required"
                        <?php if ( $gender == "Female") { ?>
                        checked
                        <?php } ?>
                        > &nbsp;&nbsp;Female 
                    </div>
                    <br>
                    <div>
                        <div><label for="i-c">I/C (eg: 010203101010)</label></div>
                        <div><input name="ic" id="ic" type="text" pattern="[0-9]{12}" placeholder="<?php echo $ic?>" value=""> 
                    </div>
                    <br>
                    <div>
                        <div><label for="email-address">Email</label></div>
                        <div><input name="email" id="email" type="email" placeholder="<?php echo $email?>" value=""> 
                    </div>
                    <br>
                    <div>
                        <div><label for="phone-number">Phone Number (eg:0123456789)</label></div>
                        <div><input name="phone_number" id="phone_number" type="text" pattern="[0]{1}[1]{1}[0-9]{8}" placeholder="<?php echo $phone?>" value=""> 
                    </div>
                    <br>
                    <div style="color: red;"><?php if(isset($message)) { echo $message; } ?></div>
                    </br>
                    <div class="action">
                        <input type="submit" name="save_chg" value="Save Changes">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>