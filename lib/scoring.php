<?php
	include("database.init.php");
	
	$date = date('Y-m-d H:i:s');

//	aces sends a score	
	if($_GET['score']){
		$score = $_GET['score'];
	}else{
	// 	echo "ERROR: score no received";
	}

	$conn = mysql_connect($DB_host,$DB_user,$DB_password);
	if( !$conn){
		die("ERROR: ".mysql_error());
	}
	
	$total_question = 10; //fetch it from the Question table
	mysql_select_db("Integrity");	
	$sql = "SELECT COUNT(DISTINCT qid) FROM Question;";
	$retval = mysql_query($sql,$conn);
	if(!$retval){
		die("ERROR: ".mysql_error());
	}
		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
			$total_question = $row['COUNT(DISTINCT qid)'];
		}
//		echo $total_question;
		
	



/* INSERTION IN THE score_table
*/
	mysql_select_db("Integrity");
	$sql= "INSERT INTO score_table".
		"(date,score,total_question) ".
		"values('{$date}','{$score}','{$total_question}');"; 
	$retval = mysql_query($sql,$conn);
	if( !$retval){
		die("ERROR: ".mysql_error());
	}else{
//		echo "ok";
	}


