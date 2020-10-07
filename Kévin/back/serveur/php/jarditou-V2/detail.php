<?php
include("header.php");

$proID = $_GET["pro_id"];
$requete = "SELECT * FROM produits
join categories on cat_id=pro_cat_id
where pro_id=$proID";
                    $result = $db->query($requete);

                    if (!$result) 
                    {
                        $tableauErreurs = $db->errorInfo();
                        echo $tableauErreur[2]; 
                        die("Erreur dans la requête");
                    }
                
                    if ($result->rowCount() == 0) 
                    {
                       // Pas d'enregistrement
                       die("La table est vide");
                    }
                    $row = $result->fetch(PDO::FETCH_OBJ)
?>

<!-- contenu -->
<div class="row pt-3 ">
  <img class=" mx-auto" id="img_detail" src="<?php echo "public/images/".$row->pro_id.".".$row->pro_photo.""; ?>" alt="<?php echo $row->pro_libelle ?>">
</div>
<div class="row m-0">
  <div class="col-12 col-sm-12 p-0">
    <form action="update_script.php" method="post" enctype="multipart/form-data">
        <div class="text-danger pt-2 font-weight-bold">
          <?php if(isset($erreur_ref)){
            if ($erreur_ref==1){echo "<p> Veuillez compléter tous les champs </p>";
      unset($_GET["erreur"]);}

      
      } ?>
      </div>
        <div class="form-group">
          <label for="pro_ref">Référence</label>
          <input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo $row->pro_ref ?>"  readonly>
        </div>  
        <div class="form-group">
        <label for="cat_nom">catégorie</label>
        <input type="text" class="form-control" name="categorie" id="categorie" value="<?php echo $row->cat_nom ?>" readonly>
        <select name="cat_nom" id="d_cat_nom" class="form-control" >
            <?php
                $requeteCat = "SELECT * FROM categories";
                $resultCat=$db->query($requeteCat);
                if (!$resultCat) 
                {
                    $tableauErreurs = $db->errorInfo();
                    echo $tableauErreur[2]; 
                    die("Erreur dans la requête");
                }
                if ($resultCat->rowCount() == 0) 
                {
                // Pas d'enregistrement
                die("La table est vide");
                }
                while ($rowCat=$resultCat->fetch(PDO::FETCH_OBJ))
                {

            ?>
                    <option value="<?php echo $rowCat->cat_id ?>"><?php echo $rowCat->cat_nom ?></option>
            <?php } ?>
        </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-pro_id" name="pro_id" id="pro_id" value="<?php echo $row->pro_id ?>" hidden readonly>
        </div>
        <div class="form-group">
          <label for="pro_libelle">Libellé</label>
          <input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo $row->pro_libelle ?>"  readonly>
        </div>  
        <div class="form-group">
          <label for="pro_description">Description</label>
          <input type="text" class="form-control" name="pro_description" id="pro_description" value="<?php echo $row->pro_description ?>"  readonly>
        </div>  
        <div class="text-danger pt-2 font-weight-bold">
          <?php if(isset($erreur_ref)){
            if ($erreur_ref==2){echo "<p> Entrez un nombre dans les champs prix et stock</p>";
              unset($_GET["erreur"]);}  
      
        } ?>
        </div>
        <div class="form-group">
          <label for="pro_prix">Prix</label>
          <input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo $row->pro_prix ?>"  readonly>
        </div>  
        <div class="form-group">
          <label for="pro_stock">Stock</label>
          <input type="text" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo $row->pro_stock ?>"  readonly>
        </div>  
        <div class="form-group">
          <label for="pro_couleur">Couleur</label>
          <input type="text" class="form-control" name="pro_couleur" id="pro_couleur" value="<?php echo $row->pro_couleur ?>"  readonly>
        </div>  
        <div class="text-danger pt-2 font-weight-bold">
          <?php if(isset($erreur_ref)){
            if ($erreur_ref==4){echo "<p> le champ extension de la photo ne correspond pas à l'extension de l'image envoyée</p>";
              unset($_GET["erreur"]);}
              if ($erreur_ref==5){echo "<p> le fichier chosie n'est pas de type jpeg, png ou </p>";
                unset($_GET["erreur"]);}
        
        } ?>
        </div>
        <div class="form-group" id="div_photo" >
          <label for="pro_couleur">Photo</label>
          <input type="file" name="fichier">
        </div>  
        <div class="text-danger pt-2 font-weight-bold">
          <?php if(isset($erreur_ref)){
            if ($erreur_ref==3){echo "<p> Entrez une extension d'image valide</p>";
              unset($_GET["erreur"]);}
    
      
        } ?>
        </div>
        <div class="form-group">
          <label for="pro_photo">Extension de la photo</label>
          <input type="text" class="form-control" name="pro_photo" id="pro_photo" value="<?php echo $row->pro_photo ?>"  readonly>
        </div> 
        <p class="  mt-2">Produit bloqué?</p>
        <div class="form-check form-check-inline ">
          <input class="form-check-input" type="radio" name="pro_bloque" value="oui" id="oui" <?php if ($row->pro_bloque==1)echo"checked"?> readonly>
          <label class="form-check-label" for="oui"> oui</label>
        </div>
        <div class="form-check form-check-inline ">
          <input class="form-check-input" type="radio" name="pro_bloque" value="non" id="non" <?php if ($row->pro_bloque!=1)echo"checked"?> readonly>
          <label class="form-check-label" for="non">non</label>
        </div>

        <div class="form-group">
        <a type="button" class="btn btn-secondary" href="index.php" >Retour</a>
        <button type="submit" id="valid" class="btn btn-warning mx-1" >Valider</button>
        <a type="button" id="mod" class="btn btn-warning mx-1" >Modifier</a>
        <a type="button" id="suppr" class="btn btn-danger" onclick="Suppression();" href="delete_script.php?pro_id=<?php echo $row->pro_id ?>" >Supprimer</a>
        </div>
    </form>
  </div>

</div>
<!-- --- -->
<?php
include("footer.php")
?>