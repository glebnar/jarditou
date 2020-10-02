<?php
include("header.php");
?>
<!-- contenu -->
<div class="row m-0">
    <div class="col-12 col-sm-12 p-0">
        <table class="table table-striped table-bordered table-responsive-md table-sm">
            <thead class="thead-light">
                <tr>
                    <th>photo</th>
                    <th> ID</th>
                    <th> Référence</th>
                    <th> Libellé</th>
                    <th> prix</th>
                    <th>Stock</th>
                    <th>Couleur</th>
                    <th>Ajout</th>
                    <th>Modif</th>
                    <th>Bloqué</th>
                </tr>
            </thead>
            <tbody class="text-center ">
                <?php
                    $requete = "SELECT * FROM produits ";
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
                    while ($row = $result->fetch(PDO::FETCH_OBJ))
    {
        echo"<tr>";
        echo"<td class=\"table-warning\"><img src=\"public/Images/".$row->pro_id.".".$row->pro_photo."\" alt=\"".$row->pro_libelle."\" width=\"75\"></td>";
        echo"<td class=\"align-middle\">".$row->pro_id."</td>";
        echo"<td class=\"align-middle\">".$row->pro_ref."</td>";
        echo"<td class=\"table-warning align-middle text-uppercase\"><a href=\"detail.php?pro_id=".$row->pro_id."\" title=".$row->pro_libelle.">".$row->pro_libelle."</a></td>";
        echo"<td class=\"align-middle\">".$row->pro_prix."</td>";
        echo"<td class=\"align-middle\">".$row->pro_stock."</td>";
        echo"<td class=\"align-middle\">".$row->pro_couleur."</td>";
        echo"<td class=\"align-middle\">".$row->pro_d_ajout."</td>";
        echo"<td class=\"align-middle text-uppercase\">".$row->pro_d_modif."</td>";
        if ($row->pro_bloque!=null)
       { echo"<td class=\"align-middle  \"><p class=\"text-uppercase text-white bg-danger m-0\">bloqué</p></td>";}
       else {
        echo"<td class=\"align-middle \"></td>";
       }


        echo"</tr>";
    }

                
                ?>
            </tbody>
        </table>    
    </div>
</div>
<!-- --- -->
<?php
include("footer.php")
?>