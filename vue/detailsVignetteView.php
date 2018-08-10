<?php $title =  htmlspecialchars($postdetailsVignettes['titre_vignette']) ?>

<?php ob_start(); ?>
<div class="p-1 d-none d-sm-block">
	<?= '<img class=" ml-3 rounded mx-auto d-block" src="images/logonews.jpg" alt="news"/>'; ?>
</div>
<div class="p-1">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" href="#"><?=htmlspecialchars($postdetailsVignettes['titre_vignette'])?></a>
		</li>
	</ul>
</div>
<br>
<div class="float-left col-md-3">
	<?= '<img class="m-1 rounded mx-auto d-block" style="width:100%; height: 200px;" src="'.htmlspecialchars($postdetailsVignettes['image_url_vignette']).'" alt="'.htmlspecialchars($postdetailsVignettes['image_detail_url']).'"/>'; ?>
</div>
<div class="float-right col-md-9">
	<p class="text_justify m-1"><?= htmlspecialchars($postdetailsVignettes['description_vignette']) ?></p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
