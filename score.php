<!DOCTYPE html>
<html lang="en">
<head>
<title>Integrity Test</title>
<meta charset='UTF-8' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
<script type="text/javascript" src="js/vendor/jquery-1.11.1.min.js"></script>
<?php
		if($_GET["abc"]){
			echo '<script type="text/javascript">var score="'.$_GET["abc"].'";var scoretotal="'.$_GET["def"].'";</script>';
		}
	?>
<body>
	<div id="header">
		<div class="nav">
			<img src="images/logo.png" id="logo" class="col-md-4">
			</div>
	</div>
	<div id="innerContainer">
		<div class="container">
			<div id="field">
				<div class="row scoreBoard">Scoreboard</div>
					<div class="row">
						<div class="col-md-6 yourScore">
							<div class="row">Your Score</div>
							<img src="images/award.svg" width="60px" /><c id="myScore"> Score</c>
						</div>
						<div class="col-md-5 averageScore">
							<div class="row">Average Score</div>
							<img src="images/award.svg" width="60px" /><c id="avgScore"> Score</c>
						</div>
					</div>
				<div class="sharehere">Share your score
				<div id="fb-root"></div>	
				<a id="fbShare"><img src="images/fb_share.png" width=42% alt="Facebook" /></a>
				<a onclick="window.open(this.href, 'mywin','left=50,top=100,width=500,height=300,toolbar=1,resizable=0'); return false;" id="twitter_share"><img src="images/twitter_share.png" width=45% alt="Share This on Twitter" title="Share This on Twitter with your friends" /></a>				</br></br>Mail us :
				<a href="mailto:a4developers@gmail.com?Subject=Suggestions%20For%20Integrity%20Test&Body=Insert%20your%20suggestions%20here"><img src="images/mail.png" alt="Email" width=15%></a>
				</div>
			</div>
		</div>
	</div>
<script src="js/social.js"></script>
</body>
</html>
