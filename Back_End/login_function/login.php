<?php
session_start();


?>

<!DOCTYPE html>
<html>



<head>
	<link href="login.css" rel="stylesheet" />
	<meta charset="utf-8"/>
	<title>LOGIN</title>
</head>


<?php
$place = $_SESSION['place'];




?>


<body>
	<main>
		<form method='post' action='login_ok.php'>
			<input type="text" name="user_id"  placeholder="ID">
			<input type="password" name="user_pw" placeholder="PW">
			<br/>
			<div class="log">
				<button>LOGIN</button>
			</div>
			<footer>
				<a href="signup.html" id="up">sign up</a>
				|
				<a href="forgot.html" id="fg">forgot</a>
			</footer>
		</form>	
	</main>


</body>


</html>
