<?php
session_start();
if(isset($_POST["login"])) {
    
    include("conn.php");
    
    $sql = "SELECT * FROM patient WHERE email = '" . $_POST["patient_email"] . "' AND password = '" . $_POST["patient_password"] . "'";
    
    $result = mysqli_query($con,$sql);
    
    $row = mysqli_fetch_array($result);
	if($row) {
            $_SESSION["pat_id"] = $row["pat_id"];
            
			if(isset($_POST["remember"])) {
				setcookie("patient_login",$_POST["patient_email"],time() + (604800), "/"); 
			//604800 seconds = 7 days
			} else {
				unset($_COOKIE['patient_login']); 
				setcookie('patient_login', null, -1, '/');
			}
            echo "<script>window.location.href='customer_homepage.php';</script>"; 
        }
    else {
            $message = "Invalid Login";
        }
    }
?>
<html>
    <head>
        <!--google font link-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

        
        <title>Login</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Nerko+One&display=swap');
            body{
                margin: 0;
                padding: 0;
                display: grid;
                place-content: center;
                min-height: 100vh;
                background-image: url("images/patient_login_background.jpg");
                background-size: cover;
                font-size: 20px;
            }
            .content{
                padding: 30px;
                background-color: rgba(255, 255, 255, 0.6);
            }
            label{
                font-weight: bold;
            }
            h1, p{
                font-weight: normal;
                font-family: 'Nerko One', cursive;   
            }
            .showpass{
                font-size:15px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <a href="role_selection.html"><img src="images/back.png" alt="backbtn" width="50" height="50"></a>
            <form action="" method="post">
                <h1>Welcome to Elderly Home Club</h1>
                <p style="font-size: 20px; text-align: center;">Please login to continue</p>
                <div align="center">
                    <div><label for="login">Email Address</label></div>
                    <div><input name="patient_email" type="email" placeholder="Please enter email address" type="email" 
                    required = "required" value="<?php if(isset($_COOKIE["patient_login"])) { echo $_COOKIE["patient_login"]; } ?>">
                    
                    <div></br>
                        <div><label for="password">Password</label></div>
                        <div><input name="patient_password" placeholder="Please enter password" type="password" required = "required" 
                        value="" id="password" > <br>
                        <div class="showpass"><input type="checkbox" onclick="showPassword()">Show Password </div>
                        
                        <div></br>
                            <div><input type="checkbox" name="remember" id="remember" 
                            <?php if(isset($_COOKIE["patient_login"])) { ?> checked <?php } ?>>
                            <label for="remember-me">Remember me</label>
                            <p style="color: red;"><?php if(isset($message)) { echo $message; } ?></p>
                            
                            <div>
                                <div><input type="submit" name="login" value="Login"></span></div>
                            </div>
                            <p>Haven't Register? <a href="register.php">Click here to register</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="show_password.js">
        </script>
    </body>  
</html>