<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>jarditou</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
   
    <header>
        <div class="d-sm-none d-lg-block">
            <div class="row">
                <div class="col-8">
                    <img src="images/jarditou_logo.jpg" alt="jarditou_logo" width="150">
                </div>
                <div class="col-4">
                    <h2 class="text-center">La qualité depuis 70 ans</h2>
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
                    <a class="nav-link" href="accueil.php">Acceuil<span class="sr-only">(current)</span></a>
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
    <form action="validation1.php" method="POST" enctype="multipart/form-data">
        <h6>* ces zones sont obligatoires</h6>
        <h2>Vos coordonnées</h2>
        <div class="form-group">
            <label for="Nom">Nom*</label>
            <input class="form-control form-control-sm" type="text" name="Nom" id="Nom" value= "<?php if(isset($_POST["Nom"])){echo $_POST["Nom"];} ?>" >
        </div>
        <div class="text-danger">
            <?php
            if(isset($nom)){
                echo"$erreur_nom";
            }
            ?>
        </div>
        <div class="form-group">
            <label for="prenom">Pr&egrave;nom*</label>
            <input class="form-control form-control-sm" type="text" name="prenom" id="prenom" placeholder="Veuillez saisir votre pr&egrave;nom" value= "<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
        </div>
        <div class="text-danger">
            <?php
            if(isset($prenom)){
                echo"$erreur_prenom";
            }
            ?>
        </div>
        <label for="Sex">Sexe*</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="genre" id="Radios1" <?php if(isset($_POST['genre'])&& $_POST['genre'] == 'Feminin'){echo "checked";} ?> value="Feminin" >
            <label class="form-check-label" for="Radios1">
              F&eacute;minin
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="genre" id="Radios2" <?php if(isset($_POST['genre'])&& $_POST['genre'] == 'Masculin'){echo "checked";} ?> value="Masculin" >
            <label class="form-check-label" for="Radios2">
              Masculin
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="genre" id="Radios3"<?php if(isset($_POST['genre'])&& $_POST['genre'] == 'Neutre'){echo "checked";} ?> value="Neutre" >
            <label class="form-check-label" for="Radios3">
              Neutre
            </label>
        </div>
        <div class="text-danger">
        <?php
            if(isset($sexe)){
                echo"$sexe";
            }
            ?>
            </div>
        <div>
            <label for="date">Date de naissance:</label>
            <input class="form-control " type="date" name="date" id="date" placeholder="jj/mum/aaaa"value="<?php if(isset($_POST['date'])){echo $_POST['date'];} ?>" >
        </div>
        <div class="text-danger">
            <?php
            if(isset($Dnaissance)){
                echo"$erreur_Dnaissance";
            }
            ?>
            </div>
        <div>
            <label for="code">Code postal*</label>
            <input class="form-control " type="number" name="code" id="code" value="<?php if(isset($_POST['code'])){echo $_POST['code'];} ?>">
        </div>
        <div class="text-danger">
            <?php
            if(isset($codePost)){
                echo"$erreur_codePost";
            }
            ?>
        </div>
        <div>
            <label for="inputAddress">Adresse</label>
            <input class="form-control" name="adresse" id="inputAddress" type="text">
        </div>
        <div>
            <label for="ville">ville</label>
            <input class="form-control form-control-sm" name="ville" id="ville" type="text">
        </div>
        <div class="form-group">
            <label for="courriel">Email*</label>
            <input type="Email" class="form-control" name="courriel" id="courriel" placeholder="dave.loper@afpa.com" value="<?php if(isset($_POST['courriel'])){echo $_POST['courriel'];} ?>">
        </div>
        <div class="text-danger">
            <?php
            if(isset($Email)){
                echo"$erreur_Email";
            }
            ?>
        </div>
        <h2>Votre demande</h2>
        <label for="inputstate">Sujet*</label>
        <select class="form-control " id="inputstate" name="sujet"  value="<?php if(isset($_POST['sujet'])){echo $_POST['sujet'];} ?>" >
            <option selected>Veuillez s&eacute;l&eacute;ctionner un Sujet</option>
            <option value="Mes commandes"<?php if(isset($_POST['sujet'])&&($_POST['sujet'] =="Mes commandes")){echo 'selected';}?>>Mes commandes</option>
            <option value="Question sur un produit"<?php if(isset($_POST['sujet'])&&($_POST['sujet'] =="Question sur un produit")){echo 'selected';}?>>Question sur un produit</option>
            <option value="Réclamation"<?php if(isset($_POST['sujet'])&&($_POST['sujet'] =="Réclamation")){echo 'selected';}?>>R&eacute;clamation</option>
            <option value="Autre"<?php if(isset($_POST['sujet'])&&($_POST['sujet'] =="Autre")){echo 'selected';}?>>Autres</option>
        </select>
        <div class="text-danger">
            <?php
            if(isset($erreur_sujet)){
                echo"$erreur_sujet";
            }
            ?>
        </div>
        <div class="form-group">
            <label for="text">Votre question*</label>
            <textarea class="form-control" id="text" rows="2" name="question"  value= "<?php if(isset($_POST["question"])){echo $_POST["question"];} ?>"></textarea>
        </div>
        <div class="text-danger">
            <?php
            if(isset($votre_question)){
                echo"$erreur_votreQuestion";
            }
            ?>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="accepte">
            <label class="form-check-label">
              * J'accepte le traitement informatique de ce formulaire.
            </label>
        </div>
        <div class="text-danger">
            <?php
            if(isset($accepte)){
                echo"$accepte";
            }
            ?>
        </div>

        <div>
            <input type="submit" class="btn btn-dark btn-outline-primary" value="envoyer">
            <input type="reset" class="btn btn-dark btn-outline-primary" value="Annuler">
        </div>
    </form>
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
