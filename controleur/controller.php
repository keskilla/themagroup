<?php

require('modele/model.php');

function indexStarter()
{
    $sql ="SELECT description_courte,id_vignette,titre_vignette,image_url_vignette FROM vignette";
    $sql1 ="SELECT id_slider,image_url_slider,titre_slider FROM slider";
    $post = getInformation($sql);
    $sliderId = getInformation($sql1);
    $sliderImage = getInformation($sql1);
    require('vue/homeView.php');
}

function financement()
{
    require('vue/financementView.php');
}

function reglementation()
{
    require('vue/reglementationView.php');
}

function prevention()
{
    $post = getPreventions($_GET['id']);
    require('vue/preventionView.php');
}

function detailsPreventions()
{
    $sql="SELECT image_url_prevention,title_prevention,litle_description_prevention,description_prevention,prix_prevention,nb_place_prevention, formateur_prevention,Telechargement_programme_prevention, objectif_prevention,public_prevention,prerequis_prevention,duree_prevention
    FROM prevention 
    WHERE id_prevention = ?";
    $postdetailsPreventions = getDetailInformation($sql,$_GET['id']);
    require('vue/detailsPreventionView.php');
}

function detailsVignettes()
{
    $sql="SELECT image_url_vignette,titre_vignette,description_vignette,image_detail_url 
    FROM vignette 
    WHERE id_vignette = ?";
    $postdetailsVignettes = getDetailInformation($sql,$_GET['id']);
    require('vue/detailsVignetteView.php');
}

function administation()
{
    require('vue/administation/adminView.php');
}
function contactmoi()
{
    $nom = htmlspecialchars($_POST['name']);
    $mail = htmlspecialchars($_POST['mail']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $ville = htmlspecialchars($_POST['ville']);
    $cp= htmlspecialchars($_POST['cp']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $tel = htmlspecialchars($_POST['tel']);
    $textarea = htmlspecialchars($_POST['message']);
    $profil = htmlspecialchars($_POST['statut']);
    sentmail($nom,$mail,$prenom,$ville,$cp,$adresse,$tel,$textarea,$profil);
    postContact($nom,$mail,$prenom,$ville,$cp,$adresse,$tel,$textarea,$profil);

}
function sentmail($nom,$mail,$prenom,$ville,$cp,$adresse,$tel,$textarea,$profil){

    $header="MIME-Version: 1.0\r\n";
    $header.='From:"themagroup"<support@themagroup.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $sujet = 'Demande de contact';
    $message='
    <html>
    <body>
    <div align="center">        
    <img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/33532921_1819309775030809_5574464914203869184_n.png?_nc_cat=0&oh=6e44825076ae5d10fc26ab230b1e7069&oe=5BEA54F3" 
    height="102" width="102"/>
    </div> 
    <br>
    <div align="center"> 
    <strong>Nom :</strong> '.$nom.' <br>
    <strong>Prénom :</strong> '.$prenom.'<br>
    <strong>Profil</strong> '.$profil.' <br>
    <strong>Adresse :</strong> '.$adresse.'<br>
    <strong>Ville :</strong> '.$ville.'<br>
    <strong>CP :</strong> '.$cp.'<br>
    <strong>Tél: </strong>'.$tel.'<br>
    <strong>Adresse email :</strong> '.$mail.'<br>
    <br>
    <hr>
    <strong>Objet :</strong> '.$sujet.'<br>   
    <strong>Message :</strong> '.$textarea.'  
    </div>
    </body>
    </html>';
    mail("yazid.zibem@gmail.com", $sujet, $message, $header);
	mail("contact@formationprevention.com", $sujet, $message, $header);
}

function loginVerif()
{
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $value =postLogin($email,$password);

}
function categorie(){
    $sql= "SELECT id_categorie,image_url_categorie,titre_categorie,description_courte_categorie FROM categorie";
    $post = getInformation($sql);
    require('vue/categorieView.php');
}

function administationIndex()
{
// $post = nameUser();
    require('vue/administation/indexAdmin.php');
 
}

function administationDeconnexion(){
    session_start();
    session_destroy();
    administation();
}

function administationPageImages(){
    require('vue/administation/sliderView.php');
}

function administationaddImages(){
    session_start();
    $formatImage= array(".png",".jpg",".PNG",".JPG");
    $pathImage="images/slide/";
    $errorImage ="Veuillez ajouter un fichier et en format: 'png' et 'jpg' seulement.";
    $location ='Location: index.php?action=pageImage';
    $imgValue = saveFilePlus($formatImage,$pathImage,$errorImage,$location,"fichier");
    $post = addimage($imgValue);
//require('vue/administation/sliderView.php');
}
function administationPageAjouteActu(){ 
    require('vue/administation/actuAddAdminView.php');
}

function administationPageAjouteFormation(){
    $sql ="SELECT titre_categorie FROM categorie";
    $post = loadDataName($sql);
    require('vue/administation/formationAddAdminView.php');
}

function administationPageDeleteImageView(){
    $sql ="SELECT titre_slider FROM slider";
    $post = loadDataName($sql);
    require('vue/administation/sliderDeleteView.php');
}

function administationPageDeleteImage(){
    $sql= "DELETE FROM slider where titre_slider = ?";
    $name = htmlspecialchars($_POST['selectName']);
    $check = htmlspecialchars($_POST['check']);
    $error= "Veuillez cocher la case 'Confirmer'";
    $success = "Le slide a bien été supprimé";
    $location ="Location: index.php?action=deleteImageView";
    deleteElement($sql,$name,$check,$error, $location,$success);
}

function administrationPageAjouteActualite(){
    session_start();
    $erreur =[];
    $descC =  htmlspecialchars($_POST['descC']);
    $descL =  htmlspecialchars($_POST['descL']);
    $titre =  htmlspecialchars($_POST['titre']);

    if(isset( $_POST['optradio'])){
        if( $_POST['optradio'] == "externe"){
            $formatImage= array(".png",".jpg",".PNG",".JPG");
            $pathImage="images/actualite/";
            $errorImage ="Veuillez ajouter un fichier et en format: 'png' et 'jpg' seulement.";
            $location ='Location: index.php?action=actuAdd';
            $imgValue = saveFilePlus($formatImage,$pathImage,$errorImage,$location,"fichier");
            
        }else{
            $imgValue =  htmlspecialchars($_POST['fichier']);
        }
        addActualite($descC,$descL,$titre,$imgValue);
    }else{

        $erreur["erreurCaseNonCocher"]= "Veillez cochez: 'fichier externe ou interne'";
        $_SESSION['alert'] = $erreur;
        header('Location: index.php?action=actuAdd');
    }
}

function administationPageDeleteActuView(){
    $sql ="SELECT titre_vignette FROM vignette";
    $post = loadDataName($sql);
    require('vue/administation/actuDeleteAdminView.php');
}

function administationPageDeleteActu(){
    $sql= "DELETE FROM vignette where titre_vignette = ?";
    $name = htmlspecialchars($_POST['selectNameVignette']);
    $check = htmlspecialchars($_POST['check']);
    $error= "Veuillez cocher la case 'Confirmer'";
    $success = "L'actualité a bien été supprimé";
    $location ="Location: index.php?action=actuDeleteView";
    deleteElement($sql,$name,$check,$error, $location,$success);
}

function administationPageAddCategorieView(){
    require('vue/administation/categorieAddView.php');
}

function administationPageAddCategorie(){
    session_start();
    $descC =  htmlspecialchars($_POST['descC']);
    $titre =  htmlspecialchars($_POST['titre']);
    

    if(isset( $_POST['optradio'])){
        if( $_POST['optradio'] == "externe"){
            $formatImage= array(".png",".jpg",".PNG",".JPG");
            $pathImage="images/categorie/";
            $errorImage ="Veuillez ajouter un fichier et en format: 'png' et 'jpg' seulement.";
            $location ='Location: index.php?action=categorieAddView';
            $imgValue = saveFilePlus($formatImage,$pathImage,$errorImage,$location,"fichier");

        }else
        {
            $imgValue =  htmlspecialchars($_POST['fichier']);
        }
    addCategorie($descC,$titre,$imgValue);
    }else
    {
        $erreur["erreurCaseNonCocher"]= "Veillez cochez: 'fichier externe ou interne'";
        $_SESSION['alert'] = $erreur;
        header('Location: index.php?action=categorieAddView');
    }
}

function administationPageDeleteCategorieView(){
    $sql ="SELECT titre_categorie FROM categorie";
    $post = loadDataName($sql);
    require('vue/administation/categorieDeleteView.php');
}

function administationPageDeleteCategorie(){

    $sql= "DELETE FROM categorie where titre_categorie = ?";
    $name = htmlspecialchars($_POST['selectNameCategorie']);
    $check = htmlspecialchars($_POST['check']);
    $error= "Veuillez cocher la case 'confirmer'";
    $success = "La catégorie à bien été supprimé";
    $location ="Location: index.php?action=categorieDeleteView";
    deleteElement($sql,$name,$check,$error, $location,$success);
}

function administationPageAddFormation(){
    session_start();
    $name = htmlspecialchars($_POST['selectNameCategorie']);
    $titre = htmlspecialchars($_POST['titre']);
    $objectif = htmlspecialchars($_POST['objectif']);
    $duree = htmlspecialchars($_POST['duree']);
    $public = htmlspecialchars($_POST['public']);
    $prerequis = htmlspecialchars($_POST['prerequis']);
    $description_courte = htmlspecialchars($_POST['descC']);
    $description_longue = htmlspecialchars($_POST['descL']);
    $nom_formateur = htmlspecialchars($_POST['nomFormateur']);
    $prix_formation = htmlspecialchars($_POST['prixFormation']);
    $nombre_place = htmlspecialchars($_POST['nbPlace']);
    if(empty($nom_formateur)){
        $nom_formateur ="non défini";
    }
    if(empty($nombre_place)){
        $nombre_place =10;
    }
    if(empty($prix_formation)){
        $prix_formation = 0;
    }
    if(isset( $_POST['optradio'])){
        if( $_POST['optradio'] == "externe"){
            $formatImage= array(".png",".jpg",".PNG",".JPG");
            $pathImage="images/formations/";
            $errorImage ="Veuillez ajouter un fichier et en format: 'png' et 'jpg' seulement.";
            $location ='Location: index.php?action=actualiteAddView';
            $imgValue = saveFilePlus($formatImage,$pathImage,$errorImage,$location,"image");

        }else
        {
            $imgValue =  htmlspecialchars($_POST['fichier']);
        }
        $formatDocument= array(".pdf",".PDF");
        $errorDocument ="Veuillez ajouter un fichier et en format: 'pdf seulement.";
        $pathDocument="dossier/";
        $documentValue = saveFilePlus($formatDocument,$pathDocument,$errorDocument,$location,"document");

        addFormation($name,$titre,$description_courte,$description_longue,$nom_formateur,$prix_formation,$nombre_place,$objectif,$duree,$public,$prerequis,$imgValue,$documentValue);

    }else
    {
        $erreur["erreurCaseNonCocher"]= "Veillez cochez: 'fichier externe ou interne'";
        $_SESSION['alert'] = $erreur;
        header('Location: index.php?action=actualiteAddView');
    }

}

function administationPageDeleteFormationView(){
    $sql ="SELECT title_prevention FROM prevention";
    $post = loadDataName($sql);
    require('vue/administation/formationDeleteView.php');
}

function administationPageDeleteFormation(){
    $sql= "DELETE FROM prevention where title_prevention = ?";
    $name = htmlspecialchars($_POST['selectNameFormation']);
    $check = htmlspecialchars($_POST['check']);
    $error= "Veuillez cocher la case 'confirmer'";
    $success = "La formation à bien été supprimé";
    $location ="Location: index.php?action=formationDeleteView";
    deleteElement($sql,$name,$check,$error, $location,$success);
}

function administationPageEditCategorie(){
    $sql ="SELECT titre_categorie,id_categorie FROM categorie";
    $post = loadDataName($sql);
    require('vue/administation/categorieEditAdminView.php');
}


function administationChoixCategorie(){
    $post = loadUpdate($_GET['id']);
    require('vue/administation/categorieEditDetailAdminView.php');
}

function administationChoixFinalCategorie(){
    $id = htmlspecialchars($_GET['id']);
    $titre = htmlspecialchars($_POST['titre']);
    $descC = htmlspecialchars($_POST['descC']);
    $temp = updateCurrentInformation($id);
    $image= $temp['image_url_categorie'];
    if(!strlen($titre)>0){
        $titre = $temp['titre_categorie'];
    }
    if(!strlen($descC)>0){
        $descC = $temp['description_courte_categorie'];
    }
    updateInformation($id,$titre,$descC,$image);
}

function administationChoixFinalFormation(){
    $id = htmlspecialchars($_GET['id']);
    $titre = htmlspecialchars($_POST['titre']);
    $descC = htmlspecialchars($_POST['descC']);
    $descL = htmlspecialchars($_POST['descL']);
    $objectif = htmlspecialchars($_POST['objectif']);
    $duree = htmlspecialchars($_POST['duree']);
    $public = htmlspecialchars($_POST['public']);
    $prerequis = htmlspecialchars($_POST['prerequis']);
    $selectNameCategorie = htmlspecialchars($_POST['selectNameCategorie']);
    $nomFormateur = htmlspecialchars($_POST['nomFormateur']);
    $prixFormation = htmlspecialchars($_POST['prixFormation']);
    $nbPlace = htmlspecialchars($_POST['nbPlace']);
    $temp = updateCurrentInformation($id);
    $image = $temp['image_url_prevention'];

    $document = $temp['Telechargement_programme_prevention'];
    if(strlen($selectNameCategorie)==0){
        $sqlNameCategorie = "SELECT prevention_categorie FROM prevention WHERE id_prevention = ?";
        $data = getDetailInformation($sqlNameCategorie,$_GET['id']);
        $selectNameCategorie = $data["prevention_categorie"];
    }else{
        $sqlNameCategorie = "SELECT id_categorie FROM categorie WHERE titre_categorie = ?";
        $data = getDetailInformation($sqlNameCategorie,$selectNameCategorie);
        $selectNameCategorie = $data["id_categorie"];
    }
    if(!strlen($titre)>0){
        $titre = $temp['title_prevention'];
    }
    if(!strlen($titre)>0){
        $objectif = $temp['objectif_prevention'];
    }
    if(!strlen($descC)>0){
        $descC = $temp['litle_description_prevention'];
    }
    if(!strlen($descL)>0){
        $descL = $temp['description_prevention'];
    }
    if(!strlen($nomFormateur)>0){
        $nomFormateur = $temp['formateur_prevention'];
    }
    if(!strlen($prixFormation)>0){
        $prixFormation = $temp['prix_prevention'];
    }
    if(!strlen($nbPlace)>0){
        $nbPlace = $temp['nb_place_prevention'];
    }
    updateInformationFormation($id,$titre,$descC,$nbPlace,$descL,$nomFormateur,$prixFormation,$image,$document,$selectNameCategorie,$objectif,$duree,$public,$prerequis);
}

function administationPageEditFormation(){
    $sql ="SELECT title_prevention,id_prevention FROM prevention";
    $post = loadDataName($sql);
    require('vue/administation/formationEditAdminView.php');
}

function administationChoixFormation(){
    $post = loadUpdatePrevention($_GET['id']);
    $sql ="SELECT titre_categorie FROM categorie";
    $postName = loadDataName($sql);
    require('vue/administation/formationEditDetailAdminView.php');
}
