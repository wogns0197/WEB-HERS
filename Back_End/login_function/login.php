<?php
session_start();


// 로그인 이전 페이지, 즉 원래 있던 페이지에서 로그인한 후 원래 있던 페이지로 가기 위한 세션 변수
$prevPage = $_SERVER['HTTP_REFERER'];
$_SESSION['prevPage'] = $prevPage;

?>

<!DOCTYPE html>
<html>



<head>
	<link href="login.css" rel="stylesheet" />
	<meta charset="utf-8"/>
	<title>LOGIN</title>
</head>


<?php





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
