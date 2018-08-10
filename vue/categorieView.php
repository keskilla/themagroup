<?php $title = 'Toutes les Thématiques de formation' ?>
<?php ob_start(); ?>
<!-- Presentation des preventions  -->
<div class="col-sm-12 col-md-12 pt-4">
  <?php while ($data = $post->fetch())
  {?> 
    <?='<div class="col-sm-6 col-md-3 float-left" id='.htmlspecialchars($data['id_categorie']).'>
    <div class="thumbnail  m-1" style="border:solid 1px #0000001f;max-height:355px;min-height:355px;">
    <img class="img-thumbnail" src="'.htmlspecialchars($data['image_url_categorie']).'" alt="'.htmlspecialchars($data['titre_categorie']).'"/>'; ?>
    <?='<div class="caption m-2">'?>
      <?= '<h2 style="font-size:0.8rem">'. htmlspecialchars($data["titre_categorie"]).'</h2>' ?>
      <?= '<h6 class="text-left" style="font-size:0.8rem">'. htmlspecialchars($data['description_courte_categorie']) .'</h6>'?>
      <?='<p><a href="index.php?action=prevention&amp;id='.htmlspecialchars($data['id_categorie']).'" class="btn btn-info btn-sm" role="button">Voir</a></p>'?>
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

