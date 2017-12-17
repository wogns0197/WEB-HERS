<?php
session_start();

if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$user_in_flag = false;




try{
  $name = "web_project";
  $login_query = "select count(user_id) from user where user_id = '$user_id' and user_pw = '$user_pw'";
  $db = new PDO("mysql:dbname=$name", "root","root");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $rows = $db->query($login_query);

  foreach($rows as $row){
    if( $row['count(user_id)'] == 1){
      $user_in_flag = true;

    }
  }

  if($user_in_flag === true){

    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_pw'] = $user_pw;
    echo "<script>alert('로그인에 성공하였습니다.!');</script>";
    echo "<script>history.go(-2);</script>";

  }
  else{
    echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.go(-1);</script>";

  }

}
catch(PDOException $ex){
  // echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.go(-1);</script>";

}



?>
