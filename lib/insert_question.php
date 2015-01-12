<?php
	if(isset( $_POST['correct'])&& isset($_POST['answer'])&& isset($_POST['hint'])&& isset($_POST['hint']) && isset($_POST['question'])){	
	//means that there are all valid variables;	
		//echo $_POST['correct'];		index stars with 0 
		//echo $_POST['answer'];
		//echo $_POST['hint'];
		//echo $_POST['question'];
		$correct = $_POST['correct'] + 1 ;	//index is starting from 0
		$question = $_POST['question'];
		$answer = $_POST['answer'];	// answers array
		$hint = $_POST['hint'];		//hint's array
		
		include("database.init.php");
		$conn = mysql_connect($DB_host,$DB_user,$DB_password);
		if( !$conn){
			echo "ERROR: in conection";
		}
		mysql_select_db("Integrity");
		
	//aid in Question in is correct answer for the a_id in answers;	
	//insertion into the Question table
		$sql = "INSERT into Question".	
			 	"(question,aid,correct_answer)".
				"values('{$question}','{$correct}','{$correct}');";
		$retval = mysql_query($sql,$conn);
		if(!$retval){
			echo "error: in insertion";
		}
	//now the qid of the inserted question which is auto increased must be determined for the insertion in answer table to match in qid
		$sql_for_qid = "SELECT qid FROM Question WHERE question = '$question';";
		$retval_for_qid = mysql_query($sql_for_qid,$conn);
			while($row = mysql_fetch_array($retval_for_qid,MYSQL_ASSOC)){
				$qid = $row['qid'];	// qid to match with the answer table and Question table
			}
			//echo $qid;	//This qid is the unique id for the answers table to match with the Question table;			

	
			
	//Insertion into the answers table;		qid is obtained alread in $qid variable

			for($i=0;$i<=count($hint);$i++){		//runs for the no of hints in array
				$j = $j + 1;	//to make index 
				if($j<=4){		// goes to 5 value, do continue
					$sql = "INSERT INTO answers".
						"(a_id,answers,hint,qid)".
						"values('$j','{$answer[$i]}','{$hint[$i]}','{$qid}');";
				}else{
					continue;
				}
					
				$retval = mysql_query($sql,$conn);
				if( !$retval){
					echo "error: in insertion in answer table";
				}
			}

	}else{
		echo "ERROR IN DATA";
	}
