<?php
/*
  require_once 'mysql/mysql_handler.php';

  use Mysql\Mysql_Handler;

  function onInit() {
    global $name, $sid, $email, $phone, $dept, $id, $password;

    $name      = filter_input(INPUT_POST, 'name');
    $sid       = filter_input(INPUT_POST, 'sid');
    $email     = filter_input(INPUT_POST, 'email');
    $phone     = filter_input(INPUT_POST, 'phone');
    $dept      = filter_input(INPUT_POST, 'dept');
    $id        = filter_input(INPUT_POST, 'id');
    $password  = filter_input(INPUT_POST, 'pw');
  } onInit();

  function main() {
    global $g_conn, $name, $sid, $email, $phone, $dept, $id, $password;

    $query = "INSERT INTO user
    VALUES(
      '$name',
      '$sid',
      '$email',
      '$phone',
      '$dept',
      '$id',
      '$password'
    );";

    $r = Mysql_Handler::query($g_conn, $query);
    if($r){
      return true;
    }
    else return false;
  } $r = main();

  function onClose() {
    global $g_conn, $r;
    if($r){
      Mysql_Handler::__close($g_conn);
      header('location: /index.php');
      exit;
    }
    else{
      header('location: /index.php');
      exit;
    } onClose();
  }
  */
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  try {
    $db = new PDO('mysql:host=localhost;dbname=web_project', 'test','1234');
  } catch (PDOException $e){
    print "데이터베이스에 접속할 수 없습니다.".$e->getMessage();
  }
  #$count = mysqli_num_rows($result);

  $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $input = array();
  $errors = array();

  if (isset($_POST['name'])){
    $input['name'] = trim($_POST['name']);
  } else {
    $errors[] = "이름은 필수입력사항입니다.";
  }

  if (isset($_POST['sid'])){
    $input['sid'] = trim($_POST['sid']);
  } else {
    $errors[] = "학번은 필수입력사항입니다.";
  }

  if (isset($_POST['email'])){
    $input['email'] = trim($_POST['email']);
  } else {
    $errors[] = "이메일은 필수입력사항입니다.";
  }

  if (isset($_POST['phone'])){
    $input['phone'] = trim($_POST['phone']);
  } else {
    $errors[] = "휴대폰 번호는 필수입력사항입니다.";
  }

  if (isset($_POST['dept'])){
    $input['dept'] = trim($_POST['dept']);
  } else {
    $errors[] = "학과는 필수입력사항입니다.";
  }


  if (isset($_POST['id'])){
    $input['id'] = trim($_POST['id']);
  } else {
    $errors[] = "아이디는 필수입력사항입니다.";
  }

  if (isset($_POST['pw'])){
    $input['pw'] = trim($_POST['pw']);
  } else {
    $errors[] = "패스워드는 필수입력사항입니다.";
  }

  $sql = "INSERT INTO user SET ";
  $sql .= "name = ?, student_ID = ?, phone_num = ?, email = ?, user_id = ?, user_pw = ?, dept_name = ?";

  if (strlen($input['name'])){
    $memName = $input['name'];
    $memName = strtr($memName, array('_'=>'\_', '%' => '\%'));
  }

  if (strlen($input['sid'])){
    $memSID = $input['sid'];
    $memSID = strtr($memSID, array('_'=>'\_', '%' => '\%'));
  }

  if (strlen($input['email'])){
    $memEmail = $input['email'];
    $memEmail = strtr($memEmail, array('_'=>'\_', '%' => '\%'));
  }

  if (strlen($input['phone'])){
    $memPhone = $input['phone'];
    $memPhone = strtr($memPhone, array('_'=>'\_', '%' => '\%'));
  }

  if (strlen($input['dept'])){
    $memDept = $input['dept'];
    $memDept = strtr($memDept, array('_'=>'\_', '%' => '\%'));
  }

  if (strlen($input['id'])){
    $memID = $input['id'];
    $memID = strtr($memID, array('_'=>'\_', '%' => '\%'));
  }

  if (strlen($input['pw'])){
    $memPW = $input['pw'];
    $memPW = password_hash($memPW, PASSWORD_DEFAULT, array('cost' => 12));
  }

  $stmt = $db->prepare($sql);
  $stmt->execute(array($memName, $memSID, $memEmail, $memPhone, $memDept, $memID, $memPW));
}  else {

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<link href="signup.css" rel="stylesheet" />
 	<meta charset="utf-8"/>
 	<title>Sign in</title>
 </head>
 <body>
 	<main>
 		<form action="<?=$_SERVER['PHP_SELF']?>" method = "post">
 		<input type="text" name="name" value="Name" onfocus="this.value='';this.style.color='black';" style="color:#BDBDBD;" id="name1">

 		<input type="text" name="sid" value="Student id" onfocus="this.value='';this.style.color='black';" style="color:#BDBDBD;">

 		<br/>
 		<input type="text" name="email" value="Email" onfocus="this.value='';this.style.color='black';" style="color:#BDBDBD;" id="email">

 		<br/>
 		<input type="text" name="phone" value="Phone-Number" onfocus="this.value='';this.style.color='black';" style="color:#BDBDBD;" id="phone">

 		<br/>
 		<input type="text" name="dept" value="Department" onfocus="this.value='';this.style.color='black';" style="color:#BDBDBD;" id="dept">

 		<br/>
 		<input type="text" name="id" value="ID" onfocus="this.value='';this.style.color='black';" style="color:#BDBDBD;" id="id">

 		<br/>
 		<!-- !!!패스워드 부분 암호화로 변경해야함 -->
 		<input type="text" name="pw" value="Password" onfocus="this.value='';this.style.color='black';" style="color:#BDBDBD;" class="pw">
 		<input type="text" name="pwre" value="Re-Password" onfocus="this.value='';this.style.color='black';" style="color:#BDBDBD;" class="pw">
 		<br/>

 		<div class="log">
 			<button id = "submit">SIGN IN</button>
 		</div>
  </form>
 	</main>
 </body>
 </html>
 <?php } ?>
