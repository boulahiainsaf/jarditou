<?php
$nomcat = $_POST['cat_nom'];

$bool = 1; 



if ( empty($_POST['pro_ref']) || empty($_POST['pro_libelle']) || ( empty($_POST['pro_prix']) and (($_POST['pro_prix'])!= 0) ) ||  ( empty($_POST['pro_stock']) and (($_POST['pro_stock'])!= 0) ) ) {
    header("Location: ajout.php?erreur_ref=1");
    $bool = 0;
    exit;
}


else if   (!is_numeric($_POST['pro_prix']) || !is_numeric($_POST['pro_stock']) || ($_POST['pro_prix'])<=0 || ($_POST['pro_stock'])<0 )   {
        header("Location: ajout.php?erreur_ref=3");
        $bool = 0;
        exit;
    }

require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase();// Appel de la fonction de connexion

//exclusion de référence

$pro_ref=$_POST['pro_ref'];
$requete1 = "SELECT * FROM produits where pro_ref=\"$pro_ref\""; //concatenantion d'une chaine de caractère
$result1 = $db->prepare($requete1);
$result1->execute();
$nb_ref=$result1->rowCount();
if ($nb_ref != 0){
    header("Location: ajout.php?erreur_ref=4");
    $bool = 0;
    exit;
}
$result1->closeCursor();


    

//dans ce fichier, nous récupérons les informations nécessaires,
//pour réaliser la requête pour un nouvel enregistrement : INSERT
//récupération des informations passées en POST, nécessaires à la modification

$pro_cat_id=$_POST['cat_nom'];
$pro_ref=$_POST['pro_ref'];
$pro_libelle=$_POST['pro_libelle'];
$pro_description=$_POST['pro_description'];
$pro_prix=$_POST['pro_prix'];
$pro_stock=$_POST['pro_stock'];
$pro_couleur=$_POST['pro_couleur'];
$pro_photo=$_POST['pro_photo'];
$pro_date = date("y-m-d");
$erreur_file=$_FILES["fichier"]["error"];




$aMimeTypes = array("image/gif", "image/jpeg", "image/png");

if ($erreur_file==0){

    // On extrait le type du fichier via l'extension FILE_INFO 
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);
    finfo_close($finfo);

    if (!in_array($mimetype, $aMimeTypes)){

        // Le type n'est pas autorisé, donc ERREUR
            
        header("Location: ajout.php?erreur_ref=5");
    }

}



if( ($bool == 1) ){
 if (isset($_POST["pro_bloque"])){

    $pro_bloque=$_POST['pro_bloque']; 
    $requete = $db->prepare("INSERT INTO produits (pro_cat_id,pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_photo,pro_d_ajout,pro_bloque) 
                        values(:pro_cat_id,:pro_ref,:pro_libelle,:pro_description,:pro_prix,:pro_stock,:pro_couleur,:pro_photo,:pro_d_ajout,:pro_bloque)");
    $requete->bindValue(':pro_cat_id', $pro_cat_id);
    $requete->bindValue(':pro_ref', $pro_ref);
    $requete->bindValue(':pro_libelle', $pro_libelle);
    $requete->bindValue(':pro_description', $pro_description);
    $requete->bindValue(':pro_prix', $pro_prix);
    $requete->bindValue(':pro_stock', $pro_stock);
    $requete->bindValue(':pro_couleur', $pro_couleur);
    $requete->bindValue(':pro_photo', $pro_photo);
    $requete->bindValue(':pro_d_ajout', $pro_date);
    $requete->bindValue(':pro_bloque', $pro_bloque);
    }
else{
    $requete = $db->prepare("INSERT INTO produits (pro_cat_id,pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_photo,pro_d_ajout) 
                        values(:pro_cat_id,:pro_ref,:pro_libelle,:pro_description,:pro_prix,:pro_stock,:pro_couleur,:pro_photo,:pro_d_ajout)");
    $requete->bindValue(':pro_cat_id', $pro_cat_id);
    $requete->bindValue(':pro_ref', $pro_ref);
    $requete->bindValue(':pro_libelle', $pro_libelle);
    $requete->bindValue(':pro_description', $pro_description);
    $requete->bindValue(':pro_prix', $pro_prix);
    $requete->bindValue(':pro_stock', $pro_stock);
    $requete->bindValue(':pro_couleur', $pro_couleur);
    $requete->bindValue(':pro_photo', $pro_photo);
    $requete->bindValue(':pro_d_ajout', $pro_date);

    }

    $requete->execute();


    if (in_array($mimetype, $aMimeTypes)){
       
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

    //libère la connection au serveur de BDD
    $requete->closeCursor();

    //redirection vers la page index.php
    header("Location: tableau.php");
    exit;
}


?>
