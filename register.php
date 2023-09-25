<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <style>
            h1 {
                background-color: #D9D9D9;
                width: 416px;
                height: 153px;
                align-items: center;
                justify-content: center;
                display: flex;
                margin: auto;
                box-shadow: 0 0 15px rgba(0,0,0,0.6);
            }
            h2 {
                font-size: 30px;
                font-family:"Roboto",sans-serif;
                margin-top: 60px;
            }
            body {
                margin: 0px;
            }
            .register {
                justify-content: center;
                display: flex;
            }
            input {
                width: 480px;
                padding: 25px;
                border-radius: 50px;
                border: 0px;
                font-size: 17px;
            }
            .submitbtn {
                margin: auto;
                margin-top: 50px;
                padding: 20px;
                border-radius: 20px;
                border: 1px solid black;
                width: 220px;
                background-color: #171515;
                color: white;
                display: flex;
                justify-content: center;
                cursor: pointer;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-weight: 500;
                outline: none;
                font-size: 15px;
                transition: all 0.3s;
                opacity: 0.7;
            }
            .submitbtn:hover{
                background-color: #9e9494;
            }
            .submitbtn:active{
                box-shadow: 10px 10px 15px #171515;
                font-weight: bold;
                transition: 0s;
            }
            .register_form input{
                padding-left: 45px;
            }
            .toggle {
                position: relative;
                top: 5px;
                right: 55px;
                width: 30px;
                height: 30px;
                background-image: url("passworshowing.xml");
                background-size: 85%;
                background-position: center;
                background-repeat: no-repeat;
            }
            .toggle.showing {
                background-image: url("passwordhiding.xml");
            }
        </style>
    </head>
    <body style="background-color: #766868;">
        <h1 align="center">Elderly<br>Home's Club</h1>
        <h2 align="center">Register as a patient</h2>
        <?php
        if (isset($_POST['reg'])){

                $con = mysqli_connect("localhost","root","","elderly_database");
                $sql = "INSERT INTO patient (username, email, password, patient_ic, phone_number, gender) 
                VALUES
                ('$_POST[username]','$_POST[email]','$_POST[password]','$_POST[user_ic]','$_POST[phone_number]','$_POST[gender]')";

                if(!mysqli_query($con, $sql)){
                    die("Error: ".mysqli_error($con));
                }
                else {
                    echo '<script>alert("Successfully Registered!");window.location.href="patient_login.php";</script>';
                }
                mysqli_close($con); 
        }
        ?>
        <div class="register">
            <form action="" method="post" class="register_form" id="form" onsubmit="return myFunc()">
                <p>
                    <input type="text" name="username" maxlength="50" required="required" placeholder="Full name" id="name" value="" minlength="5">
                </p>
                <p>
                    <input type="email" name="email" maxlength="320" required="required" placeholder="Email">
                </p>
                <p>
                    <input type="password" name="password" required="required" placeholder="Password" class="password" id="password" minlength="6">
                    <button
                        class="toggle"
                        type="button"
                        onclick="togglePassword(this)"
                    ></button>
                    
                </p>
                <p>
                    <input type="password" name="re-enter_password" required="required" placeholder="Re-enter password" class="confirm_password" id="re-password" minlength="6">
                    <button
                        class="toggle"
                        type="button"
                        onclick="toggle_Password(this)"
                    ></button>
                    
                </p>
                <p>
                    <button class="submitbtn" type="submit" name="reg">Register</button>
                </p>
            </form>
        </div>
        <script>
            function myFunc() {
                var correct_way = /^[A-Za-z\s]+$/;
                var a = document.getElementById("name").value;
                if(a.match(correct_way))
                    true;
                    else{
                    alert("Full name must be in alphabet only")
                    return false;
                }
            }
        </script>
        <script>
            document.querySelector('.submitbtn').onclick = function(){
                var password = document.querySelector('.password').value, 
                    confirm_password = document.querySelector('.confirm_password').value;
                    if(password != confirm_password){
                        alert("Password Not Match, Please try again.");
                        return false
                    }
            }
        </script>
        <script>
            const togglePassword = button => {

            button.classList.toggle("showing")

            const input = document.getElementById("password")

            input.type =
                input.type === "password"
                    ? "text"
                    : "password"
            }
        </script>
        <script>
            const toggle_Password = button => {

            button.classList.toggle("showing")

            const input = document.getElementById("re-password")

            input.type =
                input.type === "password"
                    ? "text"
                    : "password"
            }
        </script>
    </body>
</html>