<?php 
    session_start();
    if(isset($_SESSION["pat_id"])){
        include("conn.php");
        $sql="SELECT password from patient WHERE pat_id = " . $_SESSION["pat_id"] . "";
        $result = mysqli_query($con, $sql);
        
        if(isset($_POST["change_password"])){
            $old_password = $_POST["old_password"];
            $new_password = $_POST["new_password"];
            $confirm_password = $_POST["confirm_password"];
            $change_password = mysqli_fetch_array($result);
            $password_data = $change_password['password'];

            if($old_password == $password_data){
                if($new_password != $old_password){
                    if($new_password == $confirm_password){
                        $update = mysqli_query($con, "UPDATE patient SET password = '$new_password' WHERE pat_id = " . $_SESSION["pat_id"] . "");
                        $message = "Password Changed.";

                    }else{
                        $message = "New Password and Confirm Password is not match.";
                    }
                }else{
                 $message = "The new password is same as current password.";
                }
                        
            }else{
                $message = "Wrong Current Password.";
            }
                    
        }
    }else{
        echo "<script>alert('Please Login!');window.location.href='patient_login.php';</script>";
    }
?>
<html>
    <head>
        <title>Change Password</title>
        
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <style>
            body{
                margin: 0;
                padding: 0;
                display: grid;
                place-content: center;
                min-height: 100vh;
                background-image: url("images/chg-pw-bg.jpeg");
                height: 100%;
                background-position: center;
                background-size: cover;
            }
            form{
                font-size: 24px;
            }
            .content{
                padding: 50px;
                background-color: rgba(255, 255, 255, 0.6);
            }
            .show_pw{
                font-size: 15px;
                margin-bottom: 10px;
            }
            #old_password, #new_password, #confirm_password{
                width: 250px;
                height: 30px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <a href="my_profile.php"><img src="images/back.png" alt="backbtn" width="50" height="50"></a><br><br><br>
            <form action="" method="post" id="login_form">
                <div>
                    <div><label for="current-password">Current Password</label></div>
                    <div><input name="old_password" id="old_password" type="password" placeholder="Please enter your current password" required="required" value="">
                    <div class="show_pw"><input type="checkbox" onclick="toggle_password1()">Show Password</div>
                </div>
                <div>
                    <div><label for="new-password">New Password</label></div>
                    <div><input name="new_password" id="new_password" type="password" placeholder="Please enter your new password" required="required" value="" minlength="6"> 
                    <div class="show_pw"><input type="checkbox" onclick="toggle_password2()">Show Password</div>
                </div>
                <div>
                    <div><label for="confirm-password">Confirm Password</label></div>
                    <div><input name="confirm_password" id="confirm_password" type="password" placeholder="Please re-enter your new password" required="required" value="" minlength="6"> 
                    <div class="show_pw"><input type="checkbox" onclick="toggle_password3()">Show Password</div>
                </div>
                <div style="color: red;"><?php if(isset($message)) { echo $message; } ?></div>
                </br>
                <div>
                    <div><input type="submit" id="change_password" name="change_password" value="Change"></span></div>
                </div>
            </form>
        </div>
        <script>
            function toggle_password1() {
                var p = document.getElementById("old_password");
                if (p.type === "password") {
                p.type = "text";
                } else {
                    p.type = "password";
                }
                } 
        </script>
        <script>
            function toggle_password2() {
                var p = document.getElementById("new_password");
                if (p.type === "password") {
                p.type = "text";
                } else {
                    p.type = "password";
                }
                } 
        </script>
        <script>
            function toggle_password3() {
                var p = document.getElementById("confirm_password");
                if (p.type === "password") {
                p.type = "text";
                } else {
                    p.type = "password";
                }
                } 
        </script>
    </body>
</html>