<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php if(isset($_SESSION['admin'])){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
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
<body>
	<style type="text/css">

	.flex-column li a{
		color:white;
	}
	.flex-column li:hover{
		background:#17a2b8b3;
	}
	#nav ul li a {
		padding: 10px;
		display:block;
		text-decoration: none;	
	}

	#nav{
		display: flex;
		float:left;
		width: 100%;
		align-items:stretch ;
		height: 100vh;
	}
	#deco{
		text-decoration: none;
	}

	#actives{
		padding-top: 10px;
	}
	</style>

<div class="container" style="padding:0px;">
	<nav id="nav" class="nav navbar-dark bg-dark flex-column col-md-2  p-0  d-none d-sm-block rounded"> 
		<div class="sidebar-header rounded col-md-12" style=" background: #17a2b8b3;">
			<a class="navbar-brand" href="index.php?action=adminIndex">Bienvenue <?= $_SESSION['admin'][2]?></a>
		</div>
		<br>
		<li id="actives" class="active text-center">
			<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" id="deco" class="dropdown-toggle">Slider</a>
			<ul class="collapse list-unstyled" id="homeSubmenu">
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=pageImage">Add image</a>
				</li>
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=deleteImageView">Delete image</a>
				</li>
			</ul>
		</li>
		<div class="dropdown-divider"></div>
		<li id="actives" class="active text-center">
			<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" id="deco" class="dropdown-toggle">Actualité</a>
			<ul class="collapse list-unstyled" id="homeSubmenu1">
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=actuAdd">Add actus</a>
				</li>
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=actuDeleteView">Delete actus</a>
				</li>
			</ul>
		</li>
			<div class="dropdown-divider"></div>
		<li id="actives" class="active text-center">
			<a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" id="deco" class="dropdown-toggle">Catégorie</a>
			<ul class="collapse list-unstyled" id="homeSubmenu5">
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=categorieAddView">Add Catégorie</a>
				</li>
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=categorieEditView">Edit Catégorie</a>
				</li>
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=categorieDeleteView">Delete Catégorie</a>
				</li>

			</ul>
		</li>
		<div class="dropdown-divider"></div>
		<li id="actives" class="active text-center">
			<a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" id="deco" class="dropdown-toggle">Formation</a>
			<ul class="collapse list-unstyled" id="homeSubmenu2">
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=actualiteAddView">Add formation</a>
				</li>
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=formationEditView">Edit formation</a>
				</li>
				<div class="dropdown-divider" style="border-color: #e9ecef21"></div>
				<li>
					<a href="index.php?action=formationDeleteView">Delete formation</a>
				</li>
			</ul>
		</li>

		<div class="dropdown-divider"></div>
		<p class="text-muet text-center" style="color:white">Beta version 1.0</p>
		<div class="dropdown-divider"></div>
		<form class="form-inline my-2 my-lg-0">
		<a href="index.php?action=indexStarter" class="btn btn-outline-info mx-1 ml-2 my-sm-0 btn-sm">Acceuil</a>
				<a href="index.php?action=deconect" class="btn btn-outline-danger mx-1 my-sm-0 btn-sm">Déconnexion</a>
		</form>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light bg-light d-md-none" style="border: solid 1px #e7e7e7;">
		<a class="navbar-brand" href="index.php?action=indexStarter">Mobile Access</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Slider
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?action=pageImage">Add image</a>
						<a class="dropdown-item" href="index.php?action=deleteImageView">Delete image</a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Actualité
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?action=actuAdd">Add actu</a>
						<a class="dropdown-item" href="index.php?action=actuDeleteView">Delete actu</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categorie
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?action=categorieAddView">Add catégorie</a>
						<a class="dropdown-item" href="index.php?action=categorieEditView">Edit Catégorie</a>
						<a class="dropdown-item" href="index.php?action=categorieDeleteView">Delete catégorie</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Formation
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?action=actualiteAddView">Add formation</a>
						<a class="dropdown-item" href="index.php?action=formationEditView">Edit formation</a>
						<a class="dropdown-item" href="index.php?action=formationDeleteView">Delete formation</a>
					</div>
				</li>
			</ul>
			<div class="dropdown-divider"></div>
			<form class="form-inline my-2 my-lg-0">
				<a href="index.php?action=indexStarter" class="btn btn-info mx-2 my-sm-0 btn-sm">Acceuil</a>
				<a href="index.php?action=deconect" class="btn btn-danger mx-2 my-sm-0 btn-sm">Déconnexion</a>
			</form>
		</div>
	</nav>

	<?= $content ?>

	<footer style="clear:both">
	</footer>
	</div>
</body>

</html>
<?php }else{
  header("Location: index.php?action=indexStarter");
}
?>