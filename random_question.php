<?php
	//to provide a random array of questions
	include("database.init.php");
	$question_array = array();	// array to have a qid list of existing questions
	$output_array = array();	//for json

	$conn = mysql_connect($DB_host,$DB_user,$DB_password);
        if( !$conn){
                echo "error";
        }else{
        //      echo "ok";
        }
	mysql_select_db("Integrity");
		
	$sql = "SELECT qid FROM Question";
	$retval = mysql_query($sql,$conn);
	$retval = mysql_query($sql,$conn);
                if(!$retval){
                        die("Error:".mysql_error());
                }
	
	while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
                        array_push($question_array,$row['qid']);
       	}
		
	shuffle($question_array);
		
	$output_array["random"] = $question_array;
	$json_output = json_encode($output_array);
	echo $json_output;

	
	


