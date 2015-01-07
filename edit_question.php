<?php
	if(isset($_POST['qid'])&& isset($_POST['correct']) && isset($_POST['answer']) && isset($_POST['hint']) && isset($_POST['question']) ){
		$qid = $_POST['qid'];	//qid 
		$correct_index = $_POST['correct'];
		$answer_array = $_POST['answer'];
		$hint_array = $_POST['hint'];	
		$question = $_POST['question'];
			
		include("database.init.php");
                $conn = mysql_connect($DB_host,$DB_user,$DB_password);
                if( !$conn){
                        echo "ERROR: in conection";
                }
                mysql_select_db("Integrity");
		
		/*UPDATE TABLE Question first*/
			$sql = "UPDATE Question SET aid = '$correct_index', correct_answer = '$correct_index', question = '$question'".
				"WHERE qid = '$qid';";
			
		/*UPDATE TABLE answer now */
			for($i=0;$i<=count($hint_array);$i++){
				$j = $i + 1;	//for matching with the no of hint and answers
				if($j<=4){		//so that it doesn't go beyound 4
					$sql = "UPDATE answers SET a_id = '$j',answers='{$answer_array[$i]}',hint='{$hint_array[$i]}".
						"WHERE qid = '$qid';";
				}else{
					continue;
				}
				$retval = mysql_query($sql,$conn);
				if(!$retval){	
					echo "ERROR: in UPDATION TABLE";
				}
			}
		

	}else{
		echo "ERROR IN EDITION";
	}
		
