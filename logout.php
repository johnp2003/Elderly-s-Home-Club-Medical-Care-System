<?php
    session_start();
    
    if(isset($_SESSION["pat_id"])){
        $message = "Thank you for using Elderly Home Club!";
        session_destroy();  
    }else{
        echo "<script>alert('You are not logged in!');window.location.href='patient_login.php';</script>";
    }
?>
<html>
    <head>
        <title>Logout</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <style>
            body{
                background-color: #6fb3b8;
                min-height: 100vx;
                padding: auto;
                margin: 10%;
            }
            .content{
                margin: auto;
                width: 50%;
                padding: 50px;
                background-color: rgba(255, 255, 255, 0.6);
                background-position: center;
            }

            h1,p{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class = "content">
        <h1><?php if(isset($message)) { echo $message; } ?></h1></br>
        <p><a href="role_selection.html">Back to Role Selection Page</a></p>
        </div>
    </body>
</html>