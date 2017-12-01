<?php
/*
		require_once 'mysql/mysql_handler.php';

		use Mysql\Mysql_Handler;

		function onInit(){
			global $id, $password

			$id = filter_input(INPUT_POST, 'user_id');
			$password = filter_input(INPUT_POST, 'password');
		} onInit();

		funciton main() {
			global $g_conn, $id, $password;

			$query = "SELECT * FROM user WHERE user_id = '$id'";

			$r = Mysql_Handler::query($g_conn, $query);
			if($r){
				$row = Mysql_Handler::record($r);
				if(!strcmp($row['pw'],$password)){
					session_start();
					$_SESSION['user_id'] = $id;
					return true;
				}
			}
			else return false;
		} $r = main();

		function onClose(){
			global $g_conn, $r;
			if($r){
				Mysql_Handler::__close($g_conn);
				header('location: /index.php');
				exit;
			}
			else {
				// header('location: /index.php');
				// exit;
			}
		} onClose();
		*/
			include("config.php"); //config.php 로드
			#require "FormHelper.php";
			session_start(); //세션 시작
				$myusername = $_GET('ID');
				$mypassword = $_GET('PW');

				$sql = "SELECT user_id FROM user WHERE user_id = '$myusername' and user_pw = '$mypassword'";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);

				if($row==$myusername)
				{
					session_register("myusername");
					$_SESSION['login_user'] = $myusername;

					header("location: welcome.php");
				} else {
					$error="Your Login Name or Password is invalid";
				}

				#$rows = $db->query("SELECT user_id FROM user WHERE user_id = '$myusername' AND user_pw = '$mypassword' ");
				#$result = mysqli_query($db, $sql);
				#$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				#$active = $row['active'];
				#$count = mysqli_num_rows($result);

			?>
