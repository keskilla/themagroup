<?php
session_start();  
if(isset($_SESSION['admin'])){ ?>
<?php $title ="Administation" ?>

<?php ob_start(); ?>
<div class="col-md-10" style="float: right">

  <div class="alert alert-info small" role="alert">
    <p>Supprimer une Catégorie : </p>
    <li> Il vous suffit de choisir le nom de la Categorie.</li>
  </div>

  <?php if(array_key_exists("alert", $_SESSION)){ ?>
    <div class="alert alert-danger">
      <?= implode('<br>',$_SESSION["alert"]); ?>
  </div>
  <?php unset($_SESSION["alert"]); ?>

  <?php }elseif(array_key_exists("success", $_SESSION)){ ?>
  <div class="alert alert-success">
    <?= implode('<br>',$_SESSION["success"]); ?>
  </div>
  <?php }unset($_SESSION["success"]); ?>

  <table class="table table-hover table-dark rounded">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre de la catégorie</th>
      <th scope="col">Lien</th>
    </tr>
  </thead>
  <tbody>
      <?php $i=1;
      while ($data = $post->fetch()){?> 
      <tr>
        <th scope="row"> <?=$i?></th>
        <?='<td>'.htmlspecialchars($data['titre_categorie']).'</td>'?>
        <?='<td><a class="btn btn-outline-warning btn-sm" href="index.php?action=categorieChoix&amp;id='.htmlspecialchars($data['id_categorie']).'" role="button">Editer</a></td>'?>
      </tr>
             
      <?php $i++; } ?>
 
  </tbody>
</table>

  <?php $content = ob_get_clean();?>

<?php require('vue/administation/templateAdminIndex.php');
}else{

  header("Location: index.php?action=indexStarter");
} 
?>


