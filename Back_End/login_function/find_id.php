    
<!DOCTYPE html>
<html>
<head>
	<title>Find Id</title>
	<meta charset="utf-8"/>
</head>



<body>
<?php
	$name = $_POST['name'];
	$s_id = $_POST['sid'];
	$db_name = 'web_project';
	$find = true;

	//이름과 학번으로 아이디를 찾는 쿼리
	$query = "select user_id from user where name = '$name' and student_ID = '$s_id'";
	
	//이름과 학번으로 아이디 개수를 찾는 쿼리
	$query2 = "select count(user_id) from user where name = '$name' and student_ID = '$s_id'";

    $db = new PDO("mysql:dbname=$db_name", "root","root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

  	try{
	    $id_counts = $db->query($query2); //이름과 학번으로 아이디 개수를 찾는 쿼리


	    foreach($id_counts as $counts){ //아이디 개수가 0인지 아닌지 확인
	    	if($counts['count(user_id)'] == 0){
	    		$find = false;
	    	}

	    }

	    if($find === false){ //아이디 개수가 0이면, 즉 아이디가 없으면
	    ?>
	    	<p>회원님의 아이디를 찾을 수 없습니다. 이름과 학번을 확인해주세요.</p>
	    <?php
	    }
	    else{ //아이디가 있으면
	    $rows = $db->query($query);

		?>
		    <p>회원님의 아이디 목록입니다.</p>
		    <?php

		    foreach($rows as $row){
		    ?>
		    	<p><span><?= $row['user_id'] ?></span></p>

		    <?php
		    }
	    }

	    
	}
	catch(PDOException $ex){

		echo "detail: ".$ex->getMessage();
	} 
    

?>

<a href = '../../Front_End/futsal/futmain2.php'><button>메인으로</button></a>



</body>

</html>


