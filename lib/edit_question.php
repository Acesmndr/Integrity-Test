<?php
	if(isset($_POST['qid'])&& isset($_POST['correct']) && isset($_POST['answer']) && isset($_POST['hint']) && isset($_POST['question']) ){
		$qid = $_POST['qid'];	//qid 
		$correct_index = $_POST['correct'];
		$answer_array = $_POST['answer'];
		$hint_array = $_POST['hint'];	
		$question = $_POST['question'];
			//echo $hint_array;
			//echo $qid;
		
		include("database.init.php");
                $conn = mysql_connect($DB_host,$DB_user,$DB_password);
                if( !$conn){
                        echo "ERROR: in conection";
                }
                mysql_select_db("Integrity");
	
		/*UPDATE TABLE Question first*/
			$correct_index = $correct_index + 1;	//to match with starting with 1 index;		
			$sql = "UPDATE Question SET aid = '$correct_index', correct_answer = '$correct_index', question = '$question'".
				"WHERE qid = '$qid';";
			$retval = mysql_query($sql,$conn);
			if(!$retval){
				echo "error";
			}else{
		//		echo "ok";		if EDITING QUESTION is ok:
			}

/*		UPDATE TABLE answer now
			updating with the qid is not only enough as it will update whole table with qid with the last value
			as last value will update the whole to single one
			so get the pid with the qid and then update the pid and qid matching the question
*/
		 
			mysql_select_db("Integrity");
	//fetch the paid for the exact question
			$sql = "SELECT paid FROM answers WHERE qid = '$qid';";
			$retval = mysql_query($sql,$conn);
			$paid_array = array();	//this will have the actual paid to match with the qid
			while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
				array_push($paid_array,$row['paid']);
			}
				var_dump($paid_array);
				
			for($i = 0;$i<=count($hint_array);$i++){
				$j = $i + 1;	//for matching with the no of hint and answers
				if($j!=5){		//so that it doesn't go beyound 4
					//echo $answer_array[$i]." ".$hint_array[$i]." ";	

			$sql = "UPDATE answers SET a_id ='{$j}',answers='{$answer_array[$i]}',hint='{$hint_array[$i]}' WHERE qid = '{$qid}'".
				" AND paid = '$paid_array[$i]';";
			$retval = mysql_query($sql,$conn);
                                	if(!$retval){
//                                      echo "ERROR: in UPDATION TABLE ";
                                	}else{
//                                       echo "ok";
                                	}

				}else{
					continue;
				}
			}	
	}else{
		echo "ERROR IN EDITION";
	}
		
