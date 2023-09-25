<?php 
session_start();
if(isset($_POST["login"])) {
    
    include("conn.php");
    
    $sql = "SELECT * FROM admin WHERE admin_id = '" . $_POST["admin_id"] . "' AND admin_password = '" . $_POST["admin_password"] . "'";
    
    $result = mysqli_query($con,$sql);
    
    $row = mysqli_fetch_array($result);
	if($row) {
            $_SESSION["admin_id"] = $row["admin_id"];
            echo "<script>window.location.href='admin_page.php';</script>";
    }else {
        $message = "Invalid Login";
    }}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login Page</title>
        <link rel="icon" href="images/icon.jpg" type="image/jpg" sizes="16x16">
        <link rel="stylesheet" href="loginstyles.css" />
    </head>
    <body>
        <div class="login-card">
            <a href="role_selection.html"><img src="images/back.png" alt="backbtn" width="50" height="50" align="left"></a>
            <h2>Login</h2>
            <h3>Enter your credentials below</h3>
            <form class="login-form" method="post">
                <input
                    class="control"
                    type="text"
                    placeholder="User ID"
                    name="admin_id"
                />
                <div class="password">
                    <input
                        class="control"
                        id="password"
                        type="password"
                        placeholder="Password"
                        name="admin_password"
                    />
                    <button
                        class="toggle"
                        type="button"
                        onclick="togglePassword(this)"
                    ></button>
                </div>
                <button class="control" name="login">LOGIN</button>
                <p style="color: red;"><?php if(isset($message)) { echo $message; } ?></p>
            </form>
        </div>
        <script type="text/javascript" src="login.js">
        </script>
    </body>
</html>
