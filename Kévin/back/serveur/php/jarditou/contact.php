<?php
include("header.php");
?>
<!-- contenu -->
<form action="http://bienvu.net/script.php" method="post" onSubmit="return CheckForm(this);">
    <p> * Ces zones sont obligatoires</p>
    <fieldset>
        <legend class="h3">vos coordonnées</legend>
        <div class="form-goup ">
            <label for="nom">Nom *</label>
            <input class="form-control" type="text" name="nom" id="nom">
            <div class="text-danger" id=ernom></div>
        </div>
        <div class="form-goup ">
            <label for="prenom">Prénom *</label>
            <input class="form-control" type="text" name="prenom" id="prenom">
            <div class="text-danger" id=erprenom></div>

        </div>
        <p class="  mt-2">Sexe*</p>
        <div class="form-check form-check-inline ">
            <input class="form-check-input" type="radio" name="sexe" value="masculin" id="masc">
            <label class="form-check-label" for="masc"> Masculin</label>
        </div>
        <div class="form-check form-check-inline ">
            <input class="form-check-input" type="radio" name="sexe" value="feminin" id="fem">
            <label class="form-check-label" for="fem">Féminin</label>
        </div>
        <div class="text-danger" id=ersexe></div>

        <div class="form-group  mt-2 ">
            <label for="date"> Date de naissance *</label>
            <input class="form-control" type="text" name="ddn" id="date">
            <div class="text-danger" id=erdate></div>

        </div>
        <div class="form-group ">
            <label for="cp">Code postal *</label>
            <input class="form-control" type="text" name="cp" id="cp">
            <div class="text-danger" id=ercp></div>

        </div>
        <div class="form-group ">
            <label for="adresse"> Adresse</label>
            <input class="form-control" type="text" name="adresse" id="adresse">
        </div>
        <div class="form-group ">
            <label for="ville"> Ville</label>
            <input class="form-control" type="text" name="ville" id="ville">
        </div>
        <div class="form-group ">
            <label for="mail">Email *</label>
            <input class="form-control" type="email" name="mail" id="mail" placeholder="mail@domaine.com">
            <div class="text-danger" id=ermail></div>

        </div>
    </fieldset>
    <fieldset>
        <legend class="h3"> Votre demande</legend>
        <div class="form-group ">
            <label for="sujet"> Sujet *</label>
            <select class="form-control" id="sujet">
                <option value="" selected> Veuillez selectionner un sujet</option>
                <option value="commande"> Mes commandes</option>
                <option value="produit"> Question sur un produit</option>
                <option value="reclamation">Réclamation</option>
                <option value="autre">Autres</option>
            </select>
            <div class="text-danger" id=ersujet></div>

        </div>
        <div class="form-group ">
            <label for="question">Votre question *</label>
            <textarea class="form-control" name="question" rows="5" cols="30" id="question"></textarea>
            <div class="text-danger" id=erquestion></div>

        </div>
    </fieldset>
    <div class="form-check ">
        <input class="form-check-input" type="checkbox" name="rgpd" value="accord" id="accord">
        <label class="form-check-label" for="accord">* J'accepte le traitement informatique de ce
            formulaire.</label>
            <div class="text-danger" id=eraccord></div>

    </div>
    <button type="submit" class="btn btn-dark mr-2 btn-sm" id="envoie">envoyer</button>
    <button type="reset" class="btn btn-dark btn-sm">annuler</button>

</form>
<!-- --- -->
<?php
include("footer.php")
?>