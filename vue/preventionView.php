<?php $title = 'Nos thématiques de prévention' ?>
<?php ob_start(); ?>
<!-- Presentation des preventions  -->
<div class="col-sm-12 col-md-12 pt-4">
	<?php while ($data = $post->fetch())
	{?> 
		
		<?= '<div class="col-sm-6 col-md-3 float-left" id ='.htmlspecialchars($data['id_prevention']).' ?> 
		<div class="thumbnail  m-1" style="border:solid 1px #0000001f">
		<img class="img-thumbnail" style="height: 200px;width:100%;" src="'.htmlspecialchars($data['image_url_prevention']).'" alt="'.htmlspecialchars($data['image_url_prevention']).'"/>'; ?>
		<?='<div class="caption m-2">'?>
			<?= '<h2>'. htmlspecialchars($data["title_prevention"]).'</h2>' ?>
			<?= '<h6>'. htmlspecialchars($data['litle_description_prevention']) .'</h6>'?>
			<?='<p><a href="index.php?action=detailsPreventions&amp;id='.htmlspecialchars($data['id_prevention']).'" class="btn btn-info btn-sm" role="button">Voir</a></p>'?>
		</div>
	</div>	

</div>
<?php }?>
</div>
<?php
$post->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

