<?php $title =  "Administation" ?>

<?php ob_start(); ?>
<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
    ?>
<br><br><br>
<form class="col-md-5 alert alert-secondary mx-auto" action="index.php?action=loginVerification" method="post" style="background-color: #f7f7f7">
  <?php if(array_key_exists("erreur", $_SESSION)): ?>
    <div class="alert alert-danger">
      <?= implode('<br>',$_SESSION["erreur"]); ?>
    </div>
  <?php unset($_SESSION["erreur"]); endif; ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" required class="form-control" name="email" id="emaZil" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" required class="form-control" name="password" id="password" placeholder="Password">
  </div>
  <button type="submit" id="submit" class="btn btn-success">Valider</button>
   <a class="btn btn-info" href="index.php?action=indexStarter" role="button">Retour</a>
</form>

<?php $content = ob_get_clean();?>
<?php require('vue/administation/templateAdmin.php'); ?>
