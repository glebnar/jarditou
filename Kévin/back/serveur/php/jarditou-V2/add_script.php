<?php 
require "connexion_BDD.php" ;

//récupération des informations passées en POST, nécessaires à la modification
$pro_ref=$_POST['pro_ref'];
$cat_nom=$_POST['cat_nom'];
$pro_libelle=$_POST['pro_libelle'];
$pro_description=$_POST['pro_description'];
$pro_prix=$_POST['pro_prix'];
$pro_stock=$_POST['pro_stock'];
$pro_couleur=$_POST['pro_couleur'];
$pro_photo=$_POST['pro_photo'];
$pro_d_ajout=date("y-m-d");
$extension = substr(strrchr($_FILES["fichier"]["name"], "."), 1);
$erreur_file=$_FILES["fichier"]["error"];

// ---------------------------------------------
if ($_POST['pro_bloque']=="oui"){
    $pro_bloque=1;
}
else {
    $pro_bloque=null;
    }


// ----------------------------------------------------------
$aMimeTypes = array("image/gif", "image/jpeg", "image/png");

if ($erreur_file==0){

    if ($extension!=$pro_photo){
        header("Location: add_form.php?erreur_ref=4");
    }    

    // On extrait le type du fichier via l'extension FILE_INFO 
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);
    finfo_close($finfo);

    if (!in_array($mimetype, $aMimeTypes)){

        // Le type n'est pas autorisé, donc ERREUR
            
        header("Location: add_form.php?erreur_ref=5");
    }    

}    

// -------------------------------------------------
// verifie si la reference produit existe déjà

if (isset($pro_ref)){
    $requete_ref=$db->prepare("select pro_ref from produits where pro_ref=\"$pro_ref\"");
    $requete_ref->execute();
    $nb_ref=$requete_ref->rowCount();
    if ($nb_ref != 0){
        header("Location: add_form.php?erreur_ref=7");

    }
    $requete_ref->closeCursor();

}

// ----------------------------
if (!isset($pro_ref)||!isset($pro_libelle)||!isset($pro_description)
||!isset($pro_prix)||!isset($pro_stock)||!isset($pro_couleur)||!isset($pro_photo)){
    header("Location: add_form.php?erreur_ref=1");
}

else if (!is_numeric($pro_prix) || !is_numeric($pro_stock)){
    header("Location: add_form.php?erreur_ref=2");

}

else if (!preg_match('/(jpg|png|gif)/',$pro_photo)){
    header("Location: add_form.php?erreur_ref=3");
}
// construction de la requête UPDATE sans injection SQL
else {
        if ($erreur_file==0){
    $requete = $db->prepare("INSERT INTO produits (pro_cat_id,pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_photo,pro_d_ajout,pro_bloque) 
    values(:pro_cat_id,:pro_ref,:pro_libelle,:pro_description,:pro_prix,:pro_stock,:pro_couleur,:pro_photo,:pro_d_ajout,:pro_bloque)");

    $requete->bindValue(':pro_ref', $pro_ref);
    $requete->bindValue(':pro_libelle', $pro_libelle);
    $requete->bindValue(':pro_description', $pro_description);
    $requete->bindValue(':pro_prix', $pro_prix);
    $requete->bindValue(':pro_stock', $pro_stock);
    $requete->bindValue(':pro_couleur', $pro_couleur);
    $requete->bindValue(':pro_photo', $pro_photo);
    $requete->bindValue(':pro_bloque', $pro_bloque);
    $requete->bindValue(':pro_cat_id', $cat_nom);
        $requete->bindValue(':pro_d_ajout',$pro_d_ajout);
    $requete->execute();
    if (in_array($mimetype, $aMimeTypes)){
        // $lastid = $db->exec('
        // SELECT LAST_INSERT_ID() FROM produits
        // ');
        $requete2="SELECT pro_id from produits where pro_id=LAST_INSERT_ID() ";
        $result2 = $db->query($requete2);
        if (!$result2) 
        {
            $tableauErreurs = $db->errorInfo();
            echo $tableauErreur[2]; 
            die("Erreur dans la requête");
        }
        if ($result2->rowCount() == 0) 
        {
            // Pas d'enregistrement
            die("La table est vide");
        }    
        $row = $result2->fetch(PDO::FETCH_OBJ);
        
        move_uploaded_file($_FILES["fichier"]["tmp_name"], "public/images/".$row->pro_id.".".$pro_photo);
    }
    $requete->closeCursor();
    // redirection vers la page index.php 
    header("Location: index.php");
        }
        else {
            header("Location: add_form.php?erreur_ref=6");
        }
}
?>    