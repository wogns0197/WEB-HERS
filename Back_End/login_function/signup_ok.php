<?php
$name = $_POST['name'];
$s_id = $_POST['sid'];
$user_pw = $_POST['user_pw'];
$user_pw_re = $_POST['user_pw_re'];
$user_id = $_POST['user_id'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dept = $_POST['dept'];



if($user_pw != $user_pw_re){
  echo "<script>alert('패스워드가 일치하지 않습니다!');history.back();</script>";
  exit;
}

try{
  $db_name = "web_project";
  $signup_query = "insert into user values('$name',$s_id,$phone,'$email','$user_id','$user_pw','$dept')";

  $db = new PDO("mysql:dbname=$db_name", "root","root");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $rows = $db->query($signup_query);

  echo "<script>alert('회원가입이 완료되었습니다!');</script>";


}
catch(PDOException $ex){
  echo "<script>alert('회원가입이 실패하였습니다!');</script>";


}
  echo "<script>history.go(-3);</script>";

 ?>

 <!-- <meta http-equiv='refresh' content='0;url=../../Front_End/futsal/futmain2.php'> -->
