<?php

//////  REFACTORING /////
function getInformation($sql){
    try {
        $db = dbConnect();
        $req = $db->query($sql);
        return $req;
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $db = null;
}

function getDetailInformation($sql,$id){
    try {
        $db = dbConnect();
        $req = $db->prepare($sql);
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $db = null;
}

function getPreventions($id)
{
    try {
    $db = dbConnect();
    $req = $db->prepare('SELECT id_prevention,image_url_prevention,title_prevention,litle_description_prevention
        FROM categorie 
        INNER JOIN  prevention
        ON categorie.id_categorie = prevention.prevention_categorie
        WHERE prevention_categorie = ?');
    $req->execute(array($id));
    return $req;
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $db = null;
}




function postContact($nom,$mail,$prenom,$ville,$cp,$adresse,$tel,$textarea,$profil)
{  
    try {
        $datetime = date("Y-m-d");
        $sql= "INSERT INTO contact (mail_contact,prenom_contact,nom_contact,code_postal_contact,telephone_contact,    message_contact,adresse_contact,ville,profil,date_contact) VALUES (:mail,:prenom,:nom,:cp,:tel,:textarea,:adresse,:ville,:profil,:datee)";
        $db = dbConnect();
        $req = $db->prepare( $sql);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':ville', $ville);
        $req->bindParam(':cp', $cp);
        $req->bindParam(':adresse', $adresse);
        $req->bindParam(':tel', $tel);
        $req->bindParam(':mail', $mail);
        $req->bindParam(':textarea', $textarea);
        $req->bindParam(':profil', $profil);
        $req->bindParam(':datee', $datetime);
        $req->execute();
        sleep(5);
        header('Location: index.php?action=indexStarter');
        exit;
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $db = null;
}

function postLogin($mail_user, $password_user){

    $erreur = [];
    $password_hash = md5($password_user);
    try
    {
        session_start();
        $db = dbConnect();
        $sql = "SELECT mail_user,password_user,prenom_user FROM user WHERE mail_user = ? AND  password_user = ?";
        $sth = $db->prepare($sql);
        $sth->execute(array($mail_user, $password_hash));
        $red = $sth->fetch();
        if($red['mail_user'] ==  $mail_user AND $red['password_user'] == $password_hash ){
            $_SESSION['admin'] = array($mail_user , $password_hash,$red['prenom_user']);
            header('Location: index.php?action=adminIndex');
        }else{

            $erreur["identifiant"]= "Vos identifiants sont incorrects!";
            $_SESSION['erreur'] = $erreur;
            header('Location: index.php?action=adminSite');
//header('Location: index.php?action=reglement');
        }
        exit;
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $db = null;
}



function addImage($imgValue){
    $erreur = [];
    try{
        $sql= "INSERT INTO slider (image_url_slider,titre_slider) VALUES (:img,:titre)";
        $db = dbConnect();
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare( $sql);

        $req->bindParam(':img', $imgValue);
        $req->bindParam(':titre', $imgValue);
        $req -> execute();

        $erreur["success"]= "fichier envoyer";
        $_SESSION['success'] = $erreur;
        header('Location: index.php?action=pageImage');

    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $db = null;
}

function addActualite($descC,$descL,$titre,$imgValue){
    $erreur = [];

    try{
        $sql= "INSERT INTO vignette(image_url_vignette,titre_vignette,description_vignette,description_courte) VALUES (:img,:titre,:descC,:descL)";

        $db = dbConnect();
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare( $sql);

        $req->bindParam(':img', $imgValue);
        $req->bindParam(':titre', $titre);
        $req->bindParam(':descC', $descC);
        $req->bindParam(':descL', $descL);
        $req -> execute();

        $erreur["success"]= "la news à bien été ajouté avec une image téléchargé";
        $_SESSION['success'] = $erreur;
        header('Location: index.php?action=actuAdd');

    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $db = null;

}


function deleteDataWithName($name,$sql){
    try{
        $db = dbConnect();
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sth = $db->prepare($sql);
        $sth->execute(array($name));
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    $db = null;
}

function loadDataName($sql){
    try{

        $db = dbConnect();
        $post = $db->query($sql);
        return $post;
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    $db = null;
}

function addCategorie($descC,$titre,$imgValue){
    $erreur = [];  

    try{
        $sql= "INSERT INTO categorie(image_url_categorie,titre_categorie,description_courte_categorie) VALUES (:img,:titre,:descC)";

        $db = dbConnect();
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare($sql);

        $req->bindParam(':img', $imgValue);
        $req->bindParam(':titre', $titre);
        $req->bindParam(':descC', $descC);
        $req -> execute();

        $erreur["success"]= "La news à bien été ajouté";
        $_SESSION['success'] = $erreur;
        header('Location: index.php?action=categorieAddView');

    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $db = null;

}

function addFormation($name,$titre,$description_courte,$description_longue,$nom_formateur,$prix_formation,$nombre_place,$objectif,$duree,$public,$prerequis,$imgvalue,$documentValue){
     header('Location: index.php?action=actualiteAddView');
    $erreur = [];  
    if(!empty($_POST['selectNameCategorie'])){
        var_dump("tesss");
            try{
                $db = dbConnect();
                $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql1= "SELECT id_categorie FROM categorie WHERE titre_categorie = :titre_categorie";
                $req = $db->prepare($sql1);
                $req->bindParam(':titre_categorie', $name);
                $req -> execute();
                $post=$req-> fetch();

                $sql= "INSERT INTO prevention
                (image_url_prevention, title_prevention, litle_description_prevention,description_prevention,prix_prevention,nb_place_prevention,formateur_prevention,Telechargement_programme_prevention,prevention_categorie,objectif_prevention,duree_prevention,public_prevention,prerequis_prevention) 
                VALUES (:img,:titre,:description_courte,:description_longue,:prix_formation,:nombre_place,:nom_formateur,:document,:name,:obj,:duree,:public,:prerequis)";


                $req = $db->prepare($sql);
                $req->bindParam(':img', $imgvalue);
                $req->bindParam(':titre', $titre);
                $req->bindParam(':description_courte', $description_courte);
                $req->bindParam(':description_longue', $description_longue);
                $req->bindParam(':prix_formation', $prix_formation);
                $req->bindParam(':nombre_place', $nombre_place);
                $req->bindParam(':nom_formateur', $nom_formateur);
                $req->bindParam(':document', $documentValue);
                $req->bindParam(':name', $post['id_categorie']);
                $req->bindParam(':obj', $objectif);
                $req->bindParam(':duree', $duree);
                $req->bindParam(':public', $public);
                $req->bindParam(':prerequis', $prerequis);
                $req -> execute();

                $erreur["success"]= "La formation a bien été ajouté";
                $_SESSION['success'] = $erreur;
                header('Location: index.php?action=actualiteAddView');

            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
            $db = null;


        }else{
            $erreur["alert"]= "Vous devez avoir au moins une catégorie pour ajouter une formation";
            $_SESSION['alert'] = $erreur;
            header('Location: index.php?action=actualiteAddView');
        }

}

function deleteElement($sql,$name,$check,$error,$location,$success){

    $dataInfo = [];
    session_start();
    if($name != NULL){
        if($check == "confirme"){
            deleteDataWithName($name,$sql);
            $dataInfo["value"] = $success;
            $_SESSION['success'] = $dataInfo;
            header($location);
        }else{
            $dataInfo["value"] = $error;
            $_SESSION['alert'] = $dataInfo;
            header($location);
        }
    }else{
        $dataInfo["value"] = "Il n'y a rien à supprimer !";
        $_SESSION['alert'] = $dataInfo;
        header($location);
    }
}

function loadUpdate($id){
    try
    {   
        $db = dbConnect();
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM categorie WHERE id_categorie = ?";
        $req = $db->prepare($sql);
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $db = null;
}

function loadUpdatePrevention($id){
    try
    {   
        $db = dbConnect();
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM prevention WHERE id_prevention = ?";
        $req = $db->prepare($sql);
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $db = null;
}

function updateInformation($id,$titre,$descC,$image){
    $dataInfo = [];
    session_start();
    $imgValue = $image;
    $format= array(".png",".jpg",".PNG",".JPG");
    $path="images/categorie/";
    $error ="Veuillez ajouter un fichier et en format: 'png' et 'jpg' seulement.";
    $location ='Location: index.php?action=categorieChoix&id='.$id;
    if(strlen($_FILES['fichier']['name'])> 1){
        $imgValue = saveFile($format,$path,$error,$dataInfo,$location);
    }
    try {
        $db = dbConnect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE categorie SET titre_categorie= ?,description_courte_categorie= ?,image_url_categorie= ? WHERE id_categorie= ?";
        $db->prepare($sql)->execute([$titre, $descC, $imgValue, $id]);

        $dataInfo["erreurInconnu"]= "Mise à jour réussi !";
        $_SESSION['success'] = $dataInfo;
        header('Location: index.php?action=categorieEditView');
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    $db = null;
}

function updateInformationFormation($id,$titre,$descC,$nbPlace,$descL,$nomFormateur,$prixFormation,$image,$document,$selectNameCategorie,$objectif,$duree,$public,$prerequis){
    $dataInfo = [];
    session_start();
    $imgValue = $image;
    $valueDocument = $document;
    if(strlen($_FILES['image']['name'])>1){
        
        $format= array(".png",".jpg",".PNG",".JPG");
        $path="images/formations/";
        $error ="Veuillez ajouter un fichier et en format: 'png' et 'jpg' seulement.";
        $location ='Location: index.php?action=formationChoix&amp;id='.$id;
        $imgValue = saveFile($format,$path,$error,$dataInfo,$location);
    }
    if(strlen($_FILES['document']['name'])>1){
        
        $formatDocument= array(".pdf",".PDF");
        $pathDocument="dossier/";
        $errorDocument ="Veuillez ajouter un fichier et en format: 'pdf' seulement.";
        $locationDocument ='Location: index.php?action=formationChoix&amp;id='.$id;
        $valueDocument = saveFile($formatDocument,$pathDocument,$errorDocument,$dataInfo,$locationDocument);
    }
    try {
        $db = dbConnect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "UPDATE prevention 
        SET image_url_prevention=?,title_prevention=?,litle_description_prevention=?,description_prevention=?,prix_prevention=?,nb_place_prevention=?,formateur_prevention=?,Telechargement_programme_prevention=?,prevention_categorie=?, objectif_prevention = ?,duree_prevention =?,public_prevention=?,prerequis_prevention=?
        WHERE id_prevention= ?";
        $db->prepare($sql)->execute(
            [$imgValue,$titre,$descC,$descL,$prixFormation,$nbPlace,$nomFormateur,$valueDocument,$selectNameCategorie,$objectif,$duree,$public,$prerequis,$id]);

        $dataInfo["erreurInconnu"]= "Mise à jour réussi !";
        $_SESSION['success'] = $dataInfo;
        header('Location: index.php?action=formationEditView');
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}

function updateCurrentInformation($id){

    try {
        $db = dbConnect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM prevention WHERE id_prevention =".$id;
        $req = $db->prepare($sql);
        $req->execute(); 
        $post = $req->fetch();
        return $post;
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}

function saveFile($format,$path,$error,$dataInfo,$location){
    
        $file_name = $_FILES['fichier']['name'];
        $file_type = $_FILES['fichier']['type'];
        $file_name_tmp = $_FILES['fichier']['tmp_name'];
        $file_extension= strrchr($file_name, ".");
        $file_destination = $path.$file_name;
        $extenstion_autorisee = $format;
        if(in_array($file_extension,$extenstion_autorisee ))
        {
            if(move_uploaded_file($file_name_tmp,  $file_destination ))
            {   
                return $file_destination;
            }else
            {
                $dataInfo["erreurInconnu"]= "Veillez contacter Yazid Farhaoui : yazid.zibem@gmail.com";
                $_SESSION['alert'] = $dataInfo;
                header($location);
            }
        }else
        {
            $dataInfo["erreurFormat"]= $error;
            $_SESSION['alert'] = $dataInfo;
            header($location);
        }
}

function saveFilePlus($format,$path,$error,$location,$name){
    
        $file_name = $_FILES[$name]['name'];
        $file_type = $_FILES[$name]['type'];
        $file_name_tmp = $_FILES[$name]['tmp_name'];
        $file_extension= strrchr($file_name, ".");
        $file_destination = $path.$file_name;
        $extenstion_autorisee = $format;
        if(in_array($file_extension,$extenstion_autorisee ))
        {
            if(move_uploaded_file($file_name_tmp,  $file_destination ))
            {   
                return $file_destination;
            }else
            {
                $dataInfo["erreurInconnu"]= "Veillez contacter Yazid Farhaoui : yazid.zibem@gmail.com";
                $_SESSION['alert'] = $dataInfo;
                header($location);
            }
        }else
        {
            $dataInfo["erreurFormat"]= $error;
            $_SESSION['alert'] = $dataInfo;
            header($location);
        }
}

function dbCondnect()
{
    try
    {
        $db = new PDO('mysql:host=appsidfrrfyazid.mysql.db;dbname=appsidfrrfyazid;charset=utf8', 'appsidfrrfyazid', 'Yazou1212');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=themagroup;charset=utf8', 'root', '' );
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function dbfConnect()
{
    try
    {
        $db = new PDO('mysql:host=db749305495.db.1and1.com;dbname=db749305495;charset=utf8', 'dbo749305495', 'Thema-bdd2018');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}