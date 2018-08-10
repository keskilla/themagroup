
<?php $title = 'Comment financer les formations'; ?>

<?php ob_start(); ?>
<div class="m-2">
   <br>
    <img class="rounded mx-auto d-none d-sm-block w-25" style="" src="images/salarier.png" alt="interimaire-salarié-demandeur"/>

  <h1>Comment financer la formation  ?</h1>
  <hr>
  <div class="dropdown">
    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Choisir votre situation
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#" onclick="salarie()">Salarié</a>
      <a class="dropdown-item" href="#" onclick="interimaire()">Intérimaire</a>
      <a class="dropdown-item" href="#" onclick="demandeur()">Demandeur d'emploi</a>
    </div>
  </div>
  <br>
</div>
<div id="dynamiquemenu" class="m-2"></div>
<hr>

<script type="text/javascript">
  function salarie() {

    $("#dynamiquemenu").load("vue/situation_financement/salarier.php");
  } 

  function demandeur() {
    $("#dynamiquemenu").load("vue/situation_financement/demandeur.php");
  }  

  function interimaire() {
    $("#dynamiquemenu").load("vue/situation_financement/interimaire.php");
  } 
</script>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>