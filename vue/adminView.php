<?php $title =  "Administation" ?>

<?php ob_start(); ?>

<br><br><br>
<form class="col-md-5 alert alert-secondary mx-auto" style="background-color: #f7f7f7">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" required class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-success">Valider</button>
   <a class="btn btn-info" href="index.php?action=indexStarter" role="button">Retour</a>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('vue/administation/templateAdmin.php'); ?>
