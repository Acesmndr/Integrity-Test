<?php
	include("database.init.php");

	if( $_POST["data"] ){
		$delete_id = $_POST["data"];		// $delete_id is the qid in Question table to be deleted
	}else{
		echo "error";
	}
	
	$conn = mysql_connect($DB_host,$DB_user,$DB_password);
	if( !$conn){
		echo "error";
	}else{
	//	echo "ok";
	}
	
	mysql_select_db("Integrity");
	$sql = "DELETE FROM Question where qid = '$delete_id';";		//delete in Question table
	$retval = mysql_query($sql,$conn);
		if( !$retval){
			die("Error:".mysql_error());
		}
	
	$sql = "DELETE FROM answers where qid = '$delete_id';";
	$retval = mysql_query($sql,$conn);
		if( !$retval){
			die("Error:".mysql_error());
		}

