<?php
session_start();  
if(isset($_SESSION['admin'])){ ?>
  <?php $title ="Administation" ?>

  <?php ob_start(); ?>
  <div class="col-md-10" style="float: right">
    <div class="alert alert-warning small" role="alert">
      <p> Pour une meilleur ergonomie du site, l'image doit être d'une taille de: 418px x 400px </p>
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

    <form class="form-group p-3" method="post" action="index.php?action=categorieAjoute" style="box-shadow: 1px 1px 12px #55555585;border:solid 1px #0000001f;border-radius:5px;" enctype="multipart/form-data">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Image externe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Image par defaut</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <br>
      <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel">

          <div class="custom-file">
            <input type="file" name="fichier" class="custom-file-input form-control" id="inputGroupFile01" aria-describedby="fileHelp" >
            <label class="custom-file-label" for="inputGroupFile01">Choisir une image </label>
          </div>  
          <div class="form-group form-radio">
            <input type="radio" class="form-radio-input"  name="optradio" value="externe" id="exampleCheck1" >
            <label class="form-radio-label pt-2" for="exampleCheck1"><STRONG>Choisir un fichier externe</STRONG></label>
          </div>
        </div>

        <div class="tab-pane mt-1 form-check form-check-inline col-md-12 mx-auto" id="profile" role="tabpanel" align="center">
          <?php 
          if($dossier = opendir('./images/defaut_categorie'))
          {

            while(false !== ($fichier = readdir($dossier)))
            {    
              if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
              {           
                echo '<label class="btn btn-link col-md-2">
                <img src=images/defaut_categorie/'.$fichier.' alt='.$fichier.' class="img-thumbnail ">
                <input type="radio" value= images/defaut_categorie/'.$fichier.' name="fichier" style="visibility: hidden;" autocomplete="off">
                </label>';
              }
            } // On ferme le if (qui permet de ne pas afficher index.php, etc.)            
          closedir($dossier);
          } // On termine la boucle

          ?>     
<div class="form-group form-radio" align="left">
  <input type="radio" class="form-radio-input"  name="optradio" id="exampleCheck1"  value="interne">
  <label class="form-check-label" for="exampleCheck1"><STRONG>Choisir un fichier de la liste</STRONG></label>
</div> 

</div>









<div class="form-group">
  <br>
  <label for="titre">Titre de la categorie</label>
  <input type="text" class="form-control" id="titre" name="titre" aria-describedby="emailHelp" placeholder="Entre le titre" required>
</div>
<div class="form-group">
  <label for="descC">Description courte</label>
  <textarea type="text-area" class="form-control" id="descC"  name="descC" rows="3" placeholder="Entre la description courte" required minlength="10" maxlength="120"></textarea>
</div>
<button type="submit" class="btn btn-primary">Envoyer</button>
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
