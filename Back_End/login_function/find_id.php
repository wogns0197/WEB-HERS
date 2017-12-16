
<?php
	$name = $_GET['name'];
	$s_id = $_GET['sid'];
	$db_name = 'web_project';
	$find = true;

	//이름과 학번으로 아이디를 찾는 쿼리
	$query = "select user_id from user where name = '$name' and student_ID = '$s_id'";

    $db = new PDO("mysql:dbname=$db_name", "root","root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  	try{

		    $rows = $db->query($query);

				$idlists = [];


			  foreach($rows as $row){
					$idlists[] = $row['user_id'];
			  }


				$data = array();
				$lists = array();
				foreach($idlists as $row){
					$id = array('id' => "$row");
					array_push($lists,$id);
				}

				$data["idlists"] = $lists;

				header("Content-type: application/json");
				print json_encode($data);



		}
		catch(PDOException $ex){

			echo "detail: ".$ex->getMessage();
		}

?>
