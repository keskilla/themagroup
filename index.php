<?php
require('controleur/controller.php');


if (isset($_GET['action'])) 
{
    if ($_GET['action'] == 'preventionformation') 
    {
        indexStarter();
    }elseif ($_GET['action'] == 'formationChoixFinal') {
        if (isset($_GET['id'])>0) {
            administationChoixFinalFormation();  
        }      
    }elseif ($_GET['action'] == 'formationChoix') {
        if (isset($_GET['id'])>0) {
            administationChoixFormation(); 
        }     
    }elseif ($_GET['action'] == 'formationEditView') {

        administationPageEditFormation();
    }elseif ($_GET['action'] == 'categorieChoixFinal') {
        if (isset($_GET['id'])>0) {
            administationChoixFinalCategorie();
        }
    }elseif ($_GET['action'] == 'categorieChoix') {
        if (isset($_GET['id'])>0) {
            administationChoixCategorie();  
        }      
    }elseif ($_GET['action'] == 'categorieEditView') {

        administationPageEditCategorie();
    }elseif ($_GET['action'] == 'formationDelete') {

        administationPageDeleteFormation();
    }elseif ($_GET['action'] == 'formationDeleteView') {

        administationPageDeleteFormationView();
    }elseif ($_GET['action'] == 'ajouteFormation') {

        administationPageAddFormation();
    }elseif ($_GET['action'] == 'categorieDelete') {

        administationPageDeleteCategorie();
    }elseif ($_GET['action'] == 'categorieDeleteView') {

        administationPageDeleteCategorieView();
    }elseif ($_GET['action'] == 'categorieAjoute') {

        administationPageAddCategorie();
    }elseif ($_GET['action'] == 'categorieAddView') {

        administationPageAddCategorieView();
    }elseif ($_GET['action'] == 'actuDelete') {

        administationPageDeleteActu();
    }elseif ($_GET['action'] == 'actuDeleteView') {

        administationPageDeleteActuView();
    }elseif ($_GET['action'] == 'deleteImage') {

        administationPageDeleteImage();
    }elseif ($_GET['action'] == 'deleteImageView') {

        administationPageDeleteImageView();
    }elseif ($_GET['action'] == 'actualiteAddView') {

        administationPageAjouteFormation();
    }elseif ($_GET['action'] == 'actualiteAjoute') {

        administrationPageAjouteActualite();
    }elseif ($_GET['action'] == 'actuAdd') {

        administationPageAjouteActu();
    }elseif ($_GET['action'] == 'pageImage') {

        administationPageImages();
    }elseif ($_GET['action'] == 'ajouteImage') {

        administationaddImages();
    }elseif ($_GET['action'] == 'adminSite') {

        administation();
    }elseif ($_GET['action'] == 'adminIndex') {
		administationIndex();
    }
    elseif ($_GET['action'] == 'deconect') {

        administationDeconnexion();
    }elseif ($_GET['action'] == 'categorie') {

        categorie();
    }elseif ($_GET['action'] == 'loginVerification') {

        loginVerif();
    }elseif ($_GET['action'] == 'moyenDePaiement') {

        financement();
    }elseif ($_GET['action'] == 'reglement') {

        reglementation();
    }elseif ($_GET['action'] == 'prevention') {
        if (isset($_GET['id']) > 0) {
            prevention();
        }
        else {
            indexStarter();
        }

    }elseif ($_GET['action'] == 'contact') {

        contactmoi();
    }elseif ($_GET['action'] == 'detailsPreventions') {
        if (isset($_GET['id']) > 0) {
            detailsPreventions();
        }
        else {
            indexStarter();
        }
    }elseif ($_GET['action'] == 'actualitePrevention') {
        if (isset($_GET['id']) > 0) {
            detailsVignettes();
        }
        else {
            indexStarter();
        }
    }else {

        indexStarter();
    }
}else{
    indexStarter();
}
