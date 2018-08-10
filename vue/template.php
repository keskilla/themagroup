<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="description" content="Organisme de formation en prévention, sécurité et santé au travail SST, CACES, AIPR, Travail en hauteur, gestes & postures, amiante, risques psycho-sociaux…" />
	<meta charset="utf-8">
<meta name="google-site-verification" content="4f706K2Zz6ZlLx7A5uMLSdkfU_RXooTwoCazeVhGttA" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link href="css/effectSite.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<style type="text/css"> .color{color:orange;}h1{font-size:24px;}h2{font-size:16px;}h6{font-size:13px;}</style>
<body>
	<div class="container" style="padding:0px; ">
		<header> 
			<?php require("headerView.php");?>	
		</header>
		<div id="dynamicSection">
			<?= $content ?>
		</div>
		<footer style="clear:both">
			<?php require("footerView.php");?>		
		</footer>
	</div>
</body>

</html>

