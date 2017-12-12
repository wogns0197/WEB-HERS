<?php
session_start();


// 로그인 이전 페이지, 즉 원래 있던 페이지에서 로그인한 후 원래 있던 페이지로 가기 위한 세션 변수
$prevPage = $_SERVER['HTTP_REFERER'];
$_SESSION['prevPage'] = $prevPage;


//이미 로그인 되어있으면 이전페이지로 돌아가게함.
if(isset($_SESSION['user_id'])){
	echo "<script>alert('이미 로그인이 되어있습니다!');</script>";
	?>
	<meta http-equiv='refresh' content='0;url=<?= $_SESSION['prevPage'] ?>'>
	<?php

	die();
	// exit;
}
?>

<!DOCTYPE html>
<html>



<head>
	<link href="login.css" rel="stylesheet" />
	<meta charset="utf-8"/>
	<title>LOGIN</title>
</head>

<body>
	<main class="col-5">
		<div id="title">LogIn <hr/></div>
		<form method='post' action='login_ok.php'>
			<input class="col-5" type="text" name="user_id"  placeholder="ID">
			<br/>
			<input class="col-5" type="password" name="user_pw" placeholder="PW">
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
