<?php
include("header.php");
$proID = $_GET["pro_id"];
$requete = "SELECT * FROM produits where pro_id=$proID";
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
  <img class="img_detail mx-auto" src="<?php echo "public/images/".$row->pro_id.".".$row->pro_photo.""; ?>" alt="<?php echo $row->pro_libelle ?>" width=auto>
</div>
<div class="row m-0">
  <div class="col-12 col-sm-12 p-0">
    <div class="form-group">
      <label for="reference">Référence</label>
      <input type="text" class="form-control" name="reference" id="reference" value="<?php echo $row->pro_ref ?>" readonly>
    </div>  
    <div class="form-group">

      <label for="categorie">catégorie</label>
        <?php
          if ($row->pro_cat_id==27){$cat="Barbecues"; }
          else if ($row->pro_cat_id==13){$cat="Brouettes"; }
          else if ($row->pro_cat_id==2){$cat="Outils"; }
          else if ($row->pro_cat_id==11){$cat="Débroussailleuses"; }
          else if ($row->pro_cat_id==28){$cat="Lambris"; }
          else if ($row->pro_cat_id==25){$cat="Parasols"; }
          else if ($row->pro_cat_id==21){$cat="Pots"; }
          else if ($row->pro_cat_id==10){$cat="Tondeuse"; }
          else if ($row->pro_cat_id==9){$cat="Tondeuse"; }
          ?>
      <input type="text" class="form-control" name="categorie" id="categorie" value="<?php echo $cat ?>" readonly>
    </div>
    <div class="form-group">
      <label for="libelle">Libellé</label>
      <input type="text" class="form-control" name="libelle" id="libelle" value="<?php echo $row->pro_libelle ?>" readonly>
    </div>  
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" name="description" id="description" value="<?php echo $row->pro_description ?>" readonly>
    </div>  
    <div class="form-group">
      <label for="prix">Prix</label>
      <input type="text" class="form-control" name="prix" id="prix" value="<?php echo $row->pro_prix ?>" readonly>
    </div>  
    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="text" class="form-control" name="stock" id="stock" value="<?php echo $row->pro_stock ?>" readonly>
    </div>  
    <div class="form-group">
      <label for="couleur">Couleur</label>
      <input type="text" class="form-control" name="couleur" id="couleur" value="<?php echo $row->pro_couleur ?>" readonly>
    </div>  
    <p class="  mt-2">Produit bloqué?</p>
    <div class="form-check form-check-inline ">
      <input class="form-check-input" type="radio" name="oui" value="oui" id="oui" <?php if ($row->pro_bloque==1)echo"checked"?>>
      <label class="form-check-label" for="oui"> oui</label>
    </div>
    <div class="form-check form-check-inline ">
      <input class="form-check-input" type="radio" name="non" value="non" id="non" <?php if ($row->pro_bloque!=1)echo"checked"?>>
      <label class="form-check-label" for="non">non</label>
    </div>
    <div class="form-group">
      <label for="date">Date d'ajout</label>
      <input type="text" class="form-control" name="date" id="date" value="<?php echo $row->pro_d_ajout ?>" readonly>
    </div>  
    <div class="form-group">
      <label for="date_modif">Date de modification</label>
      <input type="text" class="form-control" name="date_modif" id="date_modif" value="<?php echo $row->pro_d_modif ?>" readonly>
    </div>  

  </div>

  <a type="button" class="btn btn-secondary" href="index.php" >Retour</a>
  <a type="button" class="btn btn-warning mx-1">Modifier</a>
  <a type="button" class="btn btn-danger" onclick="Suppression();" href="delete_script.php?pro_id=<?php echo $row->pro_id ?>" >Supprimer</a>

</div>
<!-- --- -->
<script>
function Suppression(){ 
     
     //Rappel : confirm() -> Bouton OK et Annuler, renvoit true (OK) ou false (Annuler)
     var resultat = confirm("Etes-vous certain de vouloir supprimer cet enregistrement ?");


     //annulation du comportemnt par défaut 
     if (resultat==false){

     event.preventDefault();
     document.location.href="index.php"; 
     }
}

</script>
<?php
include("footer.php")
?>