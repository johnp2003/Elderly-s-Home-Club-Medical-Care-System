<?php
	$cookie_name = "ElderlyHomeClubCookie";
	$cookie_value = "123";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //time in seconds
?>
<html>
	<head>
		<title>Cookies</title>
        <link rel="icon" href="icon.jpg" type="image/jpg" sizes="16x16">
	</head>
	<body>
		<?php
		if(!isset($_COOKIE[$cookie_name])) {
			echo "Cookie named '" . $cookie_name . "' is not set!";
		} else {
			echo "Cookie '" . $cookie_name . "' is set!<br>";
			echo "Value is: " . $_COOKIE[$cookie_name];
		}	
		?>
	</body>
</html>
