<!DOCTYPE html>
<html lang="en">
<head>
<title>Integrity Test</title>
<meta charset='UTF-8' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
<script type="text/javascript" src="js/vendor/jquery-1.11.1.min.js"></script>
<!--link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css.map">
<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap-theme.min.css"-->
	<?php
		if($_GET["qid"]){
			/*for javascript*/
			//mention code here to get all the data previously stored content from the qid received	
			include("output_json.php");
		//test	echo '<script type="text/javascript">alert('.$_GET["qid"].')</script>';
		}
	?>
<body>
	<div id="header">
		<div class="nav">
			<img src="images/logo.png" id="logo" class="col-md-4">
				<div class="col-xs-onset-1 signoff">Sign off</div>
		</div>
	</div>
	<div class="container">
		<div class="editbyAdmin">
			<div class="table-responsive">
				<table class="table">
					<tr class="active">
						<th scope="col" colspan="3"><input type="text" class="form-control" placeholder="Your question here" id="qstn"></th>
					</tr>
					<tr class="active">
						<td><textarea class="form-control" rows="2" placeholder="Answer option 1" id="ans1"></textarea></td>
						<td><label><input type="radio" name="answer1" value="0" checked> Right</label></td>
						<td><textarea class="form-control" rows="2" placeholder="Hint option 1" id="hint1"></textarea></td>
					</tr>
					<tr class="active">
						<td><textarea class="form-control" rows="2" placeholder="Answer option 2" id="ans2"></textarea></td>
						<td><label><input type="radio" name="answer1" value="1"> Right</label></td>
						<td><textarea class="form-control" rows="2" placeholder="Hint option 2" id="hint2"></textarea></td>
					</tr>
					<tr class="active">
						<td><textarea class="form-control" rows="2" placeholder="Answer option 3" id="ans3"></textarea></td>
						<td><label><input type="radio" name="answer1" value=2">  Right</label></td>
						<td><textarea class="form-control" rows="2" placeholder="Hint option 3" id="hint3"></textarea></td>
					</tr>
					<tr class="active">
						<td><textarea class="form-control" rows="2" placeholder="Answer option 4" id="ans4"></textarea></td>
						<td><label><input type="radio" name="answer1" value="3">   Right</label></td>
						<td><textarea class="form-control" rows="2" placeholder="Hint option 4" id="hint4"></textarea></td>
					</tr>
					<tr class="active">
						<td></td>
						<td></td>
						<td><button class="btn btn-success">Add Question</button>&nbsp; &nbsp;<button class="btn btn-primary">Save</button></td>
					</tr>
					
						<!--div class="row">
							<div class="col-md-2 inputQuestion">
								Answer:
							</div>
							<div class="col-md-3">
								<textarea class="form-control" rows="2"></textarea>
							</div>
							<div class="col-md-3 radiobutton">
								<input type="radio" name="answer1" value="">
							</div>
							<div class="col-md-3">
								<textarea class="form-control" rows="2"></textarea>
							</div>
						</div-->
				</table>
			</div>
		</div>
	</div>
	<script src="js/edit.js"></script>
	
</body>
</html>
