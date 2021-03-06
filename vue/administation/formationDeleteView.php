<?php
session_start();  
if(isset($_SESSION['admin'])){ ?>
<?php $title ="Administation" ?>

<?php ob_start(); ?>
<div class="col-md-10" style="float: right">

  <div class="alert alert-info small" role="alert">
    <p>Supprimer une Formation : </p>
    <li> Il vous suffit de choisir le nom de la Formation.</li>
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

  <form method="post" action="index.php?action=formationDelete" style="border:solid 1px #0000001f; box-shadow: 1px 1px 12px #55555585;border-radius:5px;">
    <div class="p-2">
      <div class="form-group ">
        <label for="exampleFormControlSelect1">Choisir le nom de la formation</label>
        <select class="form-control" id="exampleFormControlSelect1" name="selectNameFormation">
          <?php while ($data = $post->fetch()){?> 
          <?=' <option>'.htmlspecialchars($data['title_prevention']).'</option> '?>
          <?php } ?>
        </select>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="confirme" id="defaultCheck1" name="check">
        <label class="form-check-label" for="defaultCheck1">
          Confirmer
        </label>
      </div>
      <div class="dropdown-divider"></div>
      <button type="submit" class="btn btn-primary btn-sm">Envoyer</button>
    </div> 
  </form>

  <?php $content = ob_get_clean();?>

  <?php require('vue/administation/templateAdminIndex.php');
}else{

  header("Location: index.php?action=indexStarter");
} ?>
