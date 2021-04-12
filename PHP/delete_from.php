<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
    <title>jarditou</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php    
        require "connexion_bdd.php"; 
        //$requete = "SELECT *  FROM produits join categories on categories.cat_id=produits.pro_id";

        //$result = $db->query($requete);
    ?>
    <?php
     
         $pro_id=$_GET['pro_id'];
         $requete = "SELECT *  FROM produits join categories on categories.cat_id=produits.pro_id where pro_id=".$pro_id;
         $result = $db->query($requete);
         $row = $result->fetch(PDO::FETCH_OBJ);
         $pro_bloque=$row->pro_bloque;
    ?>
</head>
<body class="container-fluid col-lg-10">
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
    </form method="GET">
    <div class="d-flex justify-content-center">
    <img src="images/<?php echo $row->pro_id.".".$row->pro_photo;?>" width="300">
    </div >
    <h1 class="d-flex justify-content-center" >Ëtes vous sûr de vouloir supprimer</h1>
    <h1 class="d-flex justify-content-center" ><div classe="">"<?php echo $row->pro_libelle;?>"</div>de la base de donnéés?</h1>
    <from>
    <div class="d-flex justify-content-center" name = actionProduit>
   <button class="btn btn-secondary "><a class="nav-link"  href="details.php?pro_id=<?php echo $row->pro_id?>" >Annuler</a></button>
   <button class="btn btn-danger"><a class="nav-link" href="delete_script.php?pro_id=<?php echo $row->pro_id?>">Supprimer</a></button>
    </div><br/>
    <?php 
     $result->closeCursor();
     ?>
   
        <footer>    
        <ul class="nav bg-dark" style="margin:auto">
            <li class="nav-link text-muted">mention l&egrave;gale</li>
            <li class="nav-link text-muted">horaire</li>
            <li class="nav-link text-muted">plan du site</li>
        </ul>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>     
