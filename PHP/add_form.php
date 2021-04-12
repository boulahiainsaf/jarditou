<!DOCTYPE html>
    <html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <title>Ajout produit</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <?php    
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

        $db = connexionBase(); // Appel de la fonction deconnexion
        $requete = "SELECT * FROM categories";

        $result = $db->query($requete);

        // Renvoi de l'enregistrement sous forme d'un objet
        $categorie = $result->fetch(PDO::FETCH_OBJ);
       ?>
    </head>
    
    <body> 
                        
        <header>
        <div class="d-sm-none d-lg-block">
            <div class="row">
                <div class="col-8">
                    <img src="images/jarditou_logo.jpg" alt="jarditou_logo" width="150">
                </div>
                <div class="col-4">
                    <h2 class="text-center">Tout le jardin</h2>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Jarditou.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="iaccueil.php">Acceuil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tableau.php">Tableau</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Cantact</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Votre promotion">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
    <img src="images/promotion.jpg" alt="promotion" width="100%">
        <div class="container-fluid col-lg-8">
            <h1>Ajout d'un produit</h1>  
    <form class="container-fluid col-lg-12" name="ajoutProduit" id="ajout produit" method="post" action="add_script.php" enctype="multipart/form-data">
        <label for="cat_id">Nom catégorie</label>
        <select class="form-control col_8" name="cat_nom" id="cat_nom">
             <?php
                 while ($row = $result->fetch(PDO::FETCH_OBJ)){
                     if ($row->cat_parent != NULL){
                        echo"<option value=".$row->cat_id.">".$row->cat_nom."</option>";
                     }
                 }
            ?>
        </select>
        <div class="form-group">
            <label for="pro_ref" >Réference produit</label><input type="text" class="form-control" name="pro_ref" id="pro_ref">
            <label for="pro_libelle">Libéllé produit</label><input type="text" class="form-control" name="pro_libelle" id="pro_libelle">
            <label for="pro_description">Description produit</label><input type="text" class="form-control" name="pro_description" id="pro_description">
            <label for="pro_prix">Prix</label><input type="text" class="form-control" name="pro_prix" id="pro_prix">
            <label for="pro_stock">Quantité en stock</label><input type="number" class="form-control" name="pro_stock" id="pro_stock">
            <label for="pro_couleur">Couleur Produit</label><input type="text" class="form-control" name="pro_couleur" id="pro_couleur">
            <label for="pro_photo">Extension de la photo :</label>
                                <select class="form-control" name="pro_photo" id="pro_photo">
                                     <option>jpg</option>
                                     <option>png</option>
                                     <option>gif</option>
                                </select>
        </div>      
        Produit bloqué&nbsp&nbsp
        <div class="form-check form-check-inline">
             <label class="form-check-label" for="pro_bloque"><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque1" value=1>bloque</label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="pro_bloque"><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque2" value=0>Non bloque</label>
        </div>
        
        <br>
        <br>
        <label for="fichier">Photo :&nbsp&nbsp</label>
        <br>
        
        <input type="file" name="fichier"> 
        <br>
        <br>

        <div class="d-flex justify-content-center" name = actionProduit>
            <button class="btn btn-primary" type="submit" name="submit" value="1" >Envoyer</button>
            <a href="tableau.php" class="btn btn-success ml-1" type="button" id="efface">Annuler</a>
        </div>
    </form>

    <br>

<?php 
    if (isset ($_GET["erreur_ref"])){
        if (($_GET["erreur_ref"]) == 1){
            echo "Insertion qui comporte un champs qui ne doit pas etre non null";
        }
        if  (($_GET["erreur_ref"]) == 5){
            echo "Fichier non supporté";
        }
        if (($_GET["erreur_ref"]) == 3){
            echo "Valeur Numérique positive  pour le prix du produit, positive ou null pour le stock du produit";
        }
        if (($_GET["erreur_ref"]) == 4){
            echo "La référence du produit existe déjà";
        }
    }
?>
       
<br>
<footer>
        <ul class="nav bg-dark" style="margin:auto">
            <li class="nav-link text-muted">mention l&egrave;gale</li>
            <li class="nav-link text-muted">horaire</li>
            <li class="nav-link text-muted">plan du site</li>
        </ul>
    </footer>
    </div>
<!--<script src="public/js/evalContact.js"></script>-->
<!--fichiers Javascript nécessaires à Bootstrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>
