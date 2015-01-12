<?php
	include("database.init.php");
	$avg_score = 0;	//response
	$highest_score = 0; //response
	$output_array = array(); //response

	$date = date('Y-m-d H:i:s');

//	score and high scoretotal received..scoretotal = total_question * 2
	if( isset($_GET['score']) && isset($_GET['scoretotal']) ){
		$score = $_GET['score'];
		$score_total = $_GET['scoretotal'];
	}else{
	// 	echo "ERROR: score no received";
	}

	$conn = mysql_connect($DB_host,$DB_user,$DB_password);
	if( !$conn){
		die("ERROR: ".mysql_error());
	}
	
/*fetch total_no of question..ENTER total_question in score_table 
*/
	mysql_select_db("Integrity");	
	$sql = "SELECT COUNT(DISTINCT qid) FROM Question;";
	$retval = mysql_query($sql,$conn);
	if(!$retval){
		die("ERROR: ".mysql_error());
	}
		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
			$total_question = $row['COUNT(DISTINCT qid)'];		//total no of unique question in Question table
		}
//	echo $total_question;
		
	



/* INSERTION IN THE score_table
	score = score obtained in game.
	totalscore = max score that can be obtained
	total_question is no of questions
*/
	mysql_select_db("Integrity");
	$sql= "INSERT INTO score_table".
		"(date,score,totalscore,total_question) ".	
		"values('{$date}','{$score}','{$score_total}','{$total_question}');"; 
	$retval = mysql_query($sql,$conn);
	if( !$retval){
		die("ERROR: ".mysql_error());
	}else{
//		echo "ok";
	}

	calculate_average($conn,$output_array);
	calculate_highest($conn,$output_array,$score_total);	//for the maximum score in that of score_total


function calculate_average($conn,$output_array){
	$sql = "SELECT score,totalscore FROM score_table";
	$retval = mysql_query($sql,$conn);
	if(!$retval){
		die("ERROR:".mysql_error());
	}
		$sum_score = 0;
		$sum_totalscore = 0;
		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
			$sum_score = $row['score'] + $sum_score;
			$sum_totalscore = $row['totalscore'] + $sum_totalscore;
		}
	$avg_score = (float)($sum_score*100/$sum_totalscore);
	//echo $avg_score;
	
	$output_array['avg']= $avg_score;
}

function calculate_highest($conn,$output_array,$score_total){
	$sql = "SELECT MAX(score) from score_table WHERE totalscore='{$score_total}';";
	$retval = mysql_query($sql,$conn);
		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
			$max_score = $row['MAX(score)'];
		}
//	echo $max_score;
		$max_percent = (float)($max_score*100/$score_total);
	
	$output_array['max'] = $max_percent;
	
}

