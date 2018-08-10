<?php
session_start();  
if(isset($_SESSION['admin'])){ ?>
<?php $title ="Administation" ?>

<?php ob_start(); ?>
<div class="col-md-10" style="float: right">

  <div class="alert alert-info small" role="alert">
    <p> Ajout de Sliders: </p>
    <li> Les images se mettent les uns à la suite des autres</li>
    <li> Le nombre d'images pour le slider est illimité</li>
    <li> L'image doit etre de taille 1140px par 400px.</li>

  </div>

  <div class="alert alert-danger small" role="alert">
    <p>Il est important de choisir un nom correct pour l'image, car lors de la suppression vous devez choisir le nom de l'image.<br> Le nom de l'image sera le nom du fichier</p>
    
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


  <form method="POST" action="index.php?action=ajouteImage" enctype="multipart/form-data" style="box-shadow: 1px 1px 12px #55555585;border:solid 1px #0000001f;border-radius:5px;">
    <div class="p-2">
      <p class="text-muet">Choisissez le fichier :</p>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <button type="submit" class="btn btn-primary pull-right">Envoyer</button>
        </div>
        <div class="custom-file">
          <input type="file" name="fichier" class="custom-file-input form-control" id="inputGroupFile01">
          <label class="custom-file-label" for="inputGroupFile01">Choisir un fichier</label>
        </div>  
      </div>
    </div>
  </form>

  <?php $content = ob_get_clean();?>

  <?php require('vue/administation/templateAdminIndex.php');
}else{

  header("Location: index.php?action=indexStarter");
} ?>

<script >
  $('.custom-file-input').on('change',function(){
    var file = document.getElementById("inputGroupFile01").value;
    var filename = file.replace(/^.*\\/, "");
    $(this).next('.custom-file-label').addClass("selected").text(filename);
  })
</script>
