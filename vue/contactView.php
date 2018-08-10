<div class="modal" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Demande de contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Chaque demande est étudié dans les 24h</p>
        <strong style="color:green"; id="success"></strong>
        <form id="target" action="index.php?action=contact" method="post">
          <div class="form-group">
            <label for="profil">Votre profil</label>
          <select class="form-control" name="statut">
              <option>Salarié</option>
              <option>Demandeur d'emploi</option>
              <option>Particulier</option>
              <option>Entreprise</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
          </div>
          <div class="form-group">
            <label for="adr">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
          </div>
           <div class="form-group">
            <label for="postal">Code postal</label>
            <input type="text" class="form-control" id="cp" name="cp" required>
          </div>
          <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" required>
          </div>
          <div class="form-group">
            <label for="tel">Téléphone</label>
            <input type="text" class="form-control" id="tel" name="tel" required>
          </div>
          <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" class="form-control" id="mail" name="mail" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" id="message" name="message" required></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   $( "#target" ).submit(function(event) {
       $( "#target" ).hide();
       $( "#success" ).text("Votre message a bien été envoyé.");
  });
</script>