<?php 
require "connexion_BDD.php" ;



//récupération des informations passées en POST, nécessaires à la modification
$pro_id = $_POST["pro_id"];
$pro_ref=$_POST['pro_ref'];
$cat_nom=$_POST['cat_nom'];
$pro_libelle=$_POST['pro_libelle'];
$pro_description=$_POST['pro_description'];
$pro_prix=$_POST['pro_prix'];
$pro_stock=$_POST['pro_stock'];
$pro_couleur=$_POST['pro_couleur'];
$pro_photo=$_POST['pro_photo'];
$pro_d_modif=date("y-m-d");
$extension = substr(strrchr($_FILES["fichier"]["name"], "."), 1);
$erreur_file=$_FILES["fichier"]["error"];

// ----------------------------------------------------------
$aMimeTypes = array("image/gif", "image/jpeg", "image/png");

if ($erreur_file==0){

    if ($extension!=$pro_photo){
        header("Location: detail.php?pro_id=$pro_id&erreur_ref=4");
    }

    // On extrait le type du fichier via l'extension FILE_INFO 
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);
    finfo_close($finfo);

    if (in_array($mimetype, $aMimeTypes)){
        move_uploaded_file($_FILES["fichier"]["tmp_name"], "public/Images/".$pro_id.".".$pro_photo);
    }
    else{
        // Le type n'est pas autorisé, donc ERREUR
            
        header("Location: detail.php?pro_id=$pro_id&erreur_ref=5");
    }

}
// verifie si la reference produit existe déjà
if (isset($pro_ref)){
    $requete_ref=$db->prepare("select pro_ref from produits where pro_ref=\"$pro_ref\"");
    $requete_ref->execute();
    $nb_ref=$requete_ref->rowCount();
    if ($nb_ref != 0){
        header("Location: detail.php?pro_id=$pro_id&erreur_ref=7");

    }
}
// ---------------------------------------------
if ($_POST['pro_bloque']=="oui"){
    $pro_bloque=1;
}
else {
    $pro_bloque=null;
    }


// -------------------------------------------------
var_dump(preg_match('/[a-zA-Z0-9]*/',$pro_ref));
if (preg_match('/[a-zA-Z0-9]*/',$pro_ref)==0||preg_match('/[a-zA-Z0-9]*/',$pro_libelle)==0||preg_match('/[a-zA-Z0-9]*/',$pro_description)==0
||preg_match('/[a-zA-Z0-9\.]*/',$pro_prix)==0||preg_match('/[a-zA-Z0-9]*/',$pro_stock)==0||preg_match('/[a-zA-Z0-9]*/',$pro_couleur)==0||preg_match('/[a-zA-Z0-9]*/',$pro_photo)==0){
    header("Location: detail.php?pro_id=$pro_id&erreur_ref=1");
    echo "test";
}

else if (!is_numeric($pro_prix) || !is_numeric($pro_stock)){
    header("Location: detail.php?pro_id=$pro_id&erreur_ref=2");

}

else if (!preg_match('/(jpg|png|gif)/',$pro_photo)){
    header("Location: detail.php?pro_id=$pro_id&erreur_ref=3");
}
//construction de la requête UPDATE sans injection SQL
else {
$requete = $db->prepare("UPDATE produits SET pro_cat_id=:pro_cat_id,pro_ref=:pro_ref,
 pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix,
 pro_stock=:pro_stock, pro_couleur=:pro_couleur, pro_photo=:pro_photo,pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE pro_id=:pro_id");

$requete->bindValue(':pro_ref', $pro_ref);
$requete->bindValue(':pro_libelle', $pro_libelle);
$requete->bindValue(':pro_description', $pro_description);
$requete->bindValue(':pro_prix', $pro_prix);
$requete->bindValue(':pro_stock', $pro_stock);
$requete->bindValue(':pro_couleur', $pro_couleur);
$requete->bindValue(':pro_photo', $pro_photo);
$requete->bindValue(':pro_bloque', $pro_bloque);
$requete->bindValue(':pro_id', $pro_id);
$requete->bindValue(':pro_cat_id', $cat_nom);
$requete->bindValue(':pro_d_modif',$pro_d_modif);
$requete->execute();
// libère la connection au serveur de BDD
$requete->closeCursor();

// redirection vers la page index.php 
 header("Location: index.php");
}
?>    