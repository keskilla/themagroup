<?php
session_start();  
if(isset($_SESSION['admin'])){ ?>
  <?php $title ="Administation" ?>

  <?php ob_start(); ?>
  <div class="col-md-10" style="float: right">

  
    <div class="alert alert-warning small" role="alert">
      <p> Si vous ne souhaitez pas modifier le champ <b> "Catégorie"</b>, veuillez le laisser vide.</p>
      <p>Ne touchez que les champs auxquels un changement doit avoir lieu</p>
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

    <?='<form class="form-group p-3" action="index.php?action=formationChoixFinal&amp;id='.htmlspecialchars($_GET['id']).'" method="post"  style="box-shadow: 1px 1px 12px #55555585;border:solid 1px #0000001f;border-radius:5px;" enctype="multipart/form-data">'?>
    <div class="custom-file">
      <input type="file" name="image" class="custom-file-input images form-control" id="inputGroupFile01">
      <label class="custom-file-label " for="inputGroupFile01"><?= $post["image_url_prevention"] ?> </label>
    </div>  
    <br> <br> 
    <div class="custom-file">
      <input type="file" name="document" class="custom-file-input form-control document" id="inputGroupFile02">
      <label class="custom-file-label" for="inputGroupFile02"><?= $post["Telechargement_programme_prevention"] ?> </label>
    </div>  
    <div class="form-group">
      <br>
      <label for="exampleFormControlSelect1">Catégorie</label>
      <select class="form-control" id="exampleFormControlSelect1" name="selectNameCategorie">
        <option selected></option>
        <?php while ($data = $postName->fetch()){ ?>
          <?=' <option>'.htmlspecialchars($data['titre_categorie']).'</option>'?>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="titre">Titre de la formation</label>
      <input type="text" class="form-control" id="titre" name="titre" aria-describedby="emailHelp" value="<?= $post["title_prevention"] ?>"  minlength="4">
    </div>

    <div class="form-group">
      <label for="descC">Description courte</label>
      <textarea type="text-area" class="form-control" id="descC"  name="descC" rows="2"  ><?= $post["litle_description_prevention"] ?></textarea>
    </div>

    <div class="form-group">
      <label for="descL">Programme</label>
      <textarea type="text-area" class="form-control" id="descL"  name="descL" rows="4"  minlength="10"><?= $post["description_prevention"] ?></textarea>
    </div>

    <div class="form-group">
      <label for="objectif">Objectif</label>
      <textarea type="text-area" class="form-control" id="objectif"  name="objectif" rows="4"  minlength="10"><?= $post["objectif_prevention"] ?></textarea>
    </div>    

    <div class="form-group">
      <label for="public">Public</label>
      <input type="text-area" class="form-control" id="public"value="<?= $post["public_prevention"] ?>"  placeholder="" name="public">
    </div>

     <div class="form-group">
      <label for="prerequis">Pré-requis</label>
      <input type="text-area" class="form-control" id="prerequis" value="<?= $post["prerequis_prevention"] ?>" placeholder="" name="prerequis">
    </div>
    <div class="form-group">
      <label for="nomFormateur">Formateur</label>
      <input type="text" class="form-control" id="nomFormateur" value="<?= $post["formateur_prevention"] ?>" name="nomFormateur">
    </div>

    <div class="form-group">
      <label for="prixFormation">Prix</label>
      <input type="text" class="form-control" id="prixFormation" value="<?= $post["prix_prevention"] ?>" name="prixFormation">
    </div>

    <div class="form-group">
      <label for="nbPlace">Nombre de place disponibles</label>
      <input type="text-area" class="form-control" id="nbPlace" value="<?=  $post["nb_place_prevention"] ?>" name="nbPlace" >
    </div>
    <div class="form-group">
      <label for="duree">Durée</label>
      <input type="text-area" class="form-control" id="duree" value="<?=  $post["duree_prevention"] ?>" name="duree" >
    </div>
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
