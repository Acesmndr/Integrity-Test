<?php
	include("database.init.php");
//	$qid = 1; 	// will send by ashish get or post method
	
	if( $_GET["qid"] ){
		$qid = $_GET["qid"];
	}else{
		echo "no data";
	}

	$outputarray = array();
	$answer_array = array();
	$hint_array = array();
	

	$conn = mysql_connect($DB_host,$DB_user,$DB_password);
	if( !$conn){
//		echo "error";
	}else{
//		echo "ok";
	}
	mysql_select_db("Integrity");	
		
	$sql = "SELECT *  FROM answers where qid = '$qid';";
	$retval = mysql_query($sql,$conn);
		if(!$retval){
			die("Error:".mysql_error());
		}

	while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
			array_push($answer_array,$row['answers']);
			array_push($hint_array,$row['hint']);
				//previous code hint_from_answer = $row['hint'];
	}
// answers are already in array 	$answer_array;

//now get the total question

	$sql = "SELECT * FROM Question where qid = '$qid';";
	$retval = mysql_query($sql,$conn);
		if(!$retval){
			die("ERROR:".mysql_error());
		}
	
	while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
		$question = $row['question'];
				//previous code	$hint = $hint_from_answer;
		$hint = $hint_array;
		$correct_index = $row['correct_answer'];
	}

/*output to json format
*/
	$outputarray['output'] = $question;
	$outputarray['option'] = $answer_array;
	$outputarray['correct'] = $correct_index;
//previous code	$outputarray['hint'] = $hint_from_answer;
	$outputarray['hint'] = $hint_array;
	$json_output = json_encode($outputarray);
	echo $json_output;
