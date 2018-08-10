<?php $title = 'Prévention'; ?>
<?php ob_start(); ?>
<!-- Slider sur la page principal -->
<div id="carouselExampleIndicators" class="carousel slide d-none d-sm-block" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php while ($data = $sliderId->fetch()){?> 
		<?=' <li data-target="#carouselExampleIndicators" data-slide-to="'.htmlspecialchars($data['id_slider']).'" class=""></li> '?>
		<?php }?>
	</ol>
	<div class="carousel-inner">
		
		<?php $id= 1 ; 
		while ($data = $sliderImage->fetch()){?> 

			<?php if($id == 1){ ?>  
				<?=' <div class="carousel-item active">'?>  
				<?=' <img style="width:100%; height: 400px;" class="d-block w-100 img-thumbnail img-fluid"  src="'.htmlspecialchars($data['image_url_slider']).'"   alt="'.htmlspecialchars($data['titre_slider']).'"> '?>
				<?=' </div> '?>

			<?php $id++;	} ?> 
			<?=' <div class="carousel-item">'?>  
			<?=' <img style="width:100%; height: 400px;" class="d-block w-100 img-thumbnail img-fluid"  src="'.htmlspecialchars($data['image_url_slider']).'"   alt="'.htmlspecialchars($data['titre_slider']).'"> '?>
			<?=' </div> '?>
		<?php } ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<!-- Vignette sur la page principal -->
<div class="col-sm-12 col-md-12 pt-4">
	<?php while ($data = $post->fetch()){?> 
	<?='<div class="col-sm-6 col-md-3 float-left" id ='.htmlspecialchars($data['id_vignette']).'>
			<div class="thumbnail">
				<img class="img-thumbnail" style="width:100%; height: 300px;" src="'.htmlspecialchars($data['image_url_vignette']).'" alt="'.htmlspecialchars($data['image_url_vignette']).'"/>'; ?>
				<?='<div class="caption">'?>
					<?= '<h5>'. htmlspecialchars($data["titre_vignette"]).'</h5>' ?>
					<?= '<h6>'. htmlspecialchars($data['description_courte']) .'</h6>'?>
					<?= '<p><a href="index.php?action=actualitePrevention&amp;id='.htmlspecialchars($data['id_vignette']).'" class="btn btn-info" role="button">Voir</a></p> 
				</div>
			</div>	
		</div>'?>
	<?php }?>
</div>
<?php
$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
