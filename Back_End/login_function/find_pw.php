
<?php
	$userid = $_GET['userid'];
	$s_id = $_GET['sid'];
	$db_name = 'web_project';
	$find = true;

	
	$query = "select user_pw from user where user_id = '$userid' and student_ID = '$s_id'";

    $db = new PDO("mysql:dbname=$db_name", "root","root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  	try{

		    $rows = $db->query($query);

				$pwlists = [];


			  foreach($rows as $row){
					$pwlists[] = $row['user_pw'];
			  }


				$data = array();
				$lists = array();
				foreach($pwlists as $row){
					$pw = array('pw' => "$row");
					array_push($lists,$pw);
				}

				$data["pwlists"] = $lists;

				header("Content-type: application/json");
				print json_encode($data);



		}
		catch(PDOException $ex){

			echo "detail: ".$ex->getMessage();
		}

?>
