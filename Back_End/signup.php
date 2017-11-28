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
  $host = "localhost:3309";
  $user = "test";
  $pw = "11111111";
  $dbName = "web";
  $conn = mysqli_connect($host, $user, $pw);

  if (!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected";

  $name = $_POST["name"];
  $sid = $_POST["sid"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $dept = $_POST["dept"];
  $id = $_POST["id"];
  $password = md5($_POST["pw"]);
  $password2 = $_POST["pwre"];

  $sql = "insert into user (name, student_ID, phone_num, e_mail, user_id, user_pw, dept_name)";
  $sql = $sql. "values('$name', '$sid', '$phone', '$email', '$id', '$password', '$dept')";

  if($conn->query($sql)){
    echo 'success inserting';
  } else{
    echo 'fall to insert sql';
  }

  mysqli_close($conn);
?>
