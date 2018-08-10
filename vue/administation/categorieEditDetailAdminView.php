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

  <?='<form class="form-group p-3" action="index.php?action=categorieChoixFinal&amp;id='.htmlspecialchars($_GET['id']).'" method="post"  style="box-shadow: 1px 1px 12px #55555585;border:solid 1px #0000001f;border-radius:5px;" enctype="multipart/form-data">'?>
     <div class="form-group">
      <p class="text-muet">Catégorie</p>
      <input type="text" class="form-control"  name="id" placeholder="<?= $post["id_categorie"] ?>" disabled>
     </div>
    <label for="titre">Choisir une image</label>
    <div class="custom-file">
      <input type="file" name="fichier" class="custom-file-input form-control" id="inputGroupFile01" aria-describedby="fileHelp" >
      <label class="custom-file-label" for="inputGroupFile01"><?= $post["image_url_categorie"] ?>  </label>
    </div>  
    <div class="form-group">
      <br>
      <label for="titre">Titre de la catégorie</label>
      <input type="text" class="form-control" id="titre" name="titre" value="<?= $post["titre_categorie"] ?>" > 
    </div>
    <div class="form-group">
      <label for="descC">Description courte</label>
      <textarea type="text-area" class="form-control" id="descC"  name="descC" rows="3" value=""  minlength="10" maxlength="120"><?= $post["description_courte_categorie"] ?></textarea>
    </div>
    <div class="dropdown-divider"></div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    <button type="reset" class="btn btn-secondary">Effacer</button>
  </form>

  <?php $content = ob_get_clean();?>

  <?php require('vue/administation/templateAdminIndex.php');
}else{

  header("Location: index.php?action=indexStarter");
} 
?>


<script >
  $('.custom-file-input').on('change',function(){
    var file = document.getElementById("inputGroupFile01").value;
    var filename = file.replace(/^.*\\/, "");
    $(this).next('.custom-file-label').addClass("selected").text(filename);
  })
</script>
