<?php
session_start();
// 로그인 이전 페이지, 즉 원래 있던 페이지에서 로그인한 후 원래 있던 페이지로 가기 위한 세션 변수
$prevPage = $_SERVER['HTTP_REFERER'];
// session_destroy();
session_destroy();
?>

<meta http-equiv='refresh' content='0;url=<?= $prevPage ?>'>
