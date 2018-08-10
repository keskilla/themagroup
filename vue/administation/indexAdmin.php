<?php
$title =  "Administation" ;
session_start();  
if(isset($_SESSION['admin'])){ ?>
<?php ob_start(); ?>

<div class="col-md-10" style="float: right">
	<div class="alert alert-info" role="alert">
		Bienvenu sur le tableau de bord du site, l'administration est développée pour faciliter au mieux toutes manipulations que vous effectuerez.  
	</div>
	<div class="alert alert-info small" role="alert">
		<p>Pour les images :</p>
		<p> Il est demandé de mettre une image avec des dimensions qui maximise la qualité et l'ergonomie du site, pour plus de faciliter telecharger l'image ci-dessous</p>
		<p> Avec Photoshop ou Gimp par exemple: </p>
		<li>Ouvrir l'image téléchargé</li>
		<li>Importer votre image pour l'adapter à celle téléchargé.</li>
	</div>
	<div class=" col-md-12">
		<div class="thumbnail col-md-4 mx-auto float-left">
			<img src="images/demo/imageDemo.png" height="150px" width="60%" class="d-flex justify-content-center mx-auto">
			<div class="caption">
				<a class="btn btn-primary btn-sm mt-2 offset-4" href="images/demo/imageDemo.png" role="button">Télécharger</a>				
			</div>
		</div>	
		<div class="thumbnail col-md-4 mx-auto float-left">
			<img src="images/demo/fichierImpor.png" height="150px" width="60%" class="d-flex justify-content-center mx-auto">
			<div class="caption">
				<a class="btn btn-primary btn-sm mt-2 offset-4" href="images/demo/fichierImpor.png" role="button">Télécharger</a>			
			</div>
		</div>	
		<div class="thumbnail col-md-4 mx-auto float-left">
			<img src="images/demo/fichierReplace.png" height="150px" width="60%" class="d-flex justify-content-center mx-auto">
			<div class="caption">
				<a class="btn btn-primary btn-sm mt-2 offset-4" href="images/demo/fichierReplace.png" role="button">Télécharger</a>
			</div>
			<br><br>
		</div>	

	</div>

	<div class="alert alert-warning" style="clear:both">
		<p>Plus simple avec : iloveImg , il vous facilite le travail <a href="https://www.iloveimg.com/fr/redimensionner-image"> clique ici</p>
	</div>
</div>


<?php $content = ob_get_clean();?>

<?php require('vue/administation/templateAdminIndex.php'); 

}else{

  header("Location: index.php?action=indexStarter");
} ?>
