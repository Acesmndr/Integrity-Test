<?php
	include("database.init.php");
	$id_array = array();	//for sending id
	$question_array= array();	//for sending questions
	$data_array = array();

	$conn = mysql_connect($DB_host,$DB_user,$DB_password);
	if(!$conn){
		echo "error";
	}else{
	//	echo "sql connected";
	}
	mysql_select_db("Integrity");
	$sql = "SELECT qid,question from Question;";
	$retval = mysql_query($sql,$conn);
		if(!$retval){
			die("Error".mysql_error());
		}
	
	while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
		array_push($id_array,$row['qid']);
		array_push($question_array,$row['question']);
	}
		$count = count($id_array);	//total no of question upto now equal for qid and question
		
	
/*		for($i= 0 ; $i<=$count-1; $i++){
			$temp_array = array();
			$id = $id_array[$i];
			$question = $question_array[$i];	
			$temp_array['id'] = $id;
			$temp_array['question'] = $question;
			array_push($data_array,$temp_array);
		}
*/
		for($i=0;$i<=$count-1;$i++){
			$a = array();

			$id = $id_array[$i];
			$question = $question_array[$i];

			array_push($a,$id);	// [id,question]
			array_push($a,$question);
			
			array_push($data_array,$a);	//	[[id,quesion],[id,question]]
		}
			

		$data['data'] = $data_array;
		$json_output = json_encode($data);
		echo $json_output;

