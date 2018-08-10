
<?php $title =  htmlspecialchars($postdetailsPreventions['title_prevention']) ?>

<?php ob_start(); ?>
<div class="p-5">
	<?= '<img class="img-thumbnail" style="height: 400px;width:40%;" src="'.htmlspecialchars($postdetailsPreventions['image_url_prevention']).'" alt="'. htmlspecialchars($postdetailsPreventions['image_url_prevention']).'"/>'; ?>

	<div class="float-right mr-4 col-md-6">
		<h1><?= htmlspecialchars($postdetailsPreventions['title_prevention']) ?></h1>
		<br>
		<p class="alert alert-secondary "><b>Objectif :</b> <?= htmlspecialchars_decode($postdetailsPreventions['objectif_prevention']) ?></p>
		
		<h5> Formateur :</h5>
		<p><?= htmlspecialchars($postdetailsPreventions['formateur_prevention']) ?></p>
		<h5> Nombre de place disponibles :</h5>
		<p><?= htmlspecialchars($postdetailsPreventions['nb_place_prevention']) ?></p>
		<h5> Prix :</h5>
		<p><?= htmlspecialchars($postdetailsPreventions['prix_prevention']) ?></p>
		<h5> Durée :</h5>
		<p><?= htmlspecialchars($postdetailsPreventions['duree_prevention']) ?></p>
	</div>
</div>

<div class="p-2" style="clear:both">
	<ul class="nav nav-tabs mt-4 mb-4" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link color active" id="objectif-tab" data-toggle="tab" href="#objectif" role="tab" aria-controls="objectif" aria-selected="true">Objectif</a>
		</li>

		<li class="nav-item">
			<a class="nav-link color" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Programme</a>
		</li>

		<li class="nav-item">
			<a class="nav-link color" id="public-tab" data-toggle="tab" href="#public" role="tab" aria-controls="public" aria-selected="false">Public</a>
		</li>

		<li class="nav-item">
			<a class="nav-link color" id="prerequis-tab" data-toggle="tab" href="#prerequis" role="tab" aria-controls="prerequis" aria-selected="false">Pré-requis</a>
		</li>

		<li class="nav-item">
			<a class="nav-link color" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Telecharger</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show " id="home" role="tabpanel" aria-labelledby="home-tab">  		
			<p class="text_justify"><?= htmlspecialchars_decode($postdetailsPreventions['description_prevention']) ?></p>
		</div>
		<div class="tab-pane fade show active" id="objectif" role="tabpanel" aria-labelledby="objectif-tab">  		
			<p class="text_justify"><?= htmlspecialchars_decode($postdetailsPreventions['objectif_prevention']) ?></p>
		</div>
		<div class="tab-pane fade show " id="public" role="tabpanel" aria-labelledby="public-tab">  		
			<p class="text_justify"><?= htmlspecialchars_decode($postdetailsPreventions['public_prevention']) ?></p>
		</div>
		<div class="tab-pane fade show " id="prerequis" role="tabpanel" aria-labelledby="prerequis-tab">  		
			<p class="text_justify"><?= htmlspecialchars_decode($postdetailsPreventions['prerequis_prevention']) ?></p>
		</div>
		<div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<?= '<a class="btn btn-dark" href="'.htmlspecialchars($postdetailsPreventions['Telechargement_programme_prevention']).'" role="button">Cliquez ici</a> '?>	
		</div>
	</div>
</div>
	

		<?php $content = ob_get_clean(); ?>
		<?php require('template.php'); ?>
