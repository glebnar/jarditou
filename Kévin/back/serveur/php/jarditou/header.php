<!DOCTYPE php>
<php lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>jarditou.com</title>
    <link rel="stylesheet" href="public/css/style.css">

    <?php 
require "connexion_BDD.php" ;
?>
</head>
<body>
<div class="container">
<!-- logo/slogan -->
        <div class="row m-0">
            <div class="col-3 d-none d-lg-block"> <img src="public/Images/jarditou_logo.jpg" class="img-fluid" alt="logo jarditou" title="logo jarditou"> </div>
            <div class="col-8 d-none d-lg-block"><h1 class="text-right">Tout le jardin</h1></div>
            <div class="col-1 d-none d-lg-block"></div>
        </div>
<!-- --- -->
<!-- navigation -->
        <nav class="row navbar navbar-expand-lg navbar-light bg-light m-0">
            <a class="navbar-brand" href="index.php">Jarditou.com</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarnav" aria-controls="navbarnav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarnav">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Accueil <span class="sr-only ">(page actuel)</span></a>
                    <a class="nav-item nav-link" href="tableau.php">Tableau</a>
                    <a class="nav*item nav-link" href="contact.php">Contact</a>
                    <a class="nav*item nav-link" href="produits_ajout.php">Ajouter un produit</a>

                </div>
            </div>
                    <form class="form-inline d-none d-lg-block">
                        <input class="form-control" type="search" placeholder="votre promotion" aria-label="votre promotion">
                        <button class="btn btn-outline-success" type="submit">recherche</button>
                    </form>
        </nav>
<!-- --- -->
<!-- promo -->
<div class="row m-0">
    <div class="col-12 p-0 col-sm-12">
        <img src="public/Images/promotion.jpg" class="img-fluid" alt="promotion" title="promotion">
    </div>
</div>
<!-- --- -->