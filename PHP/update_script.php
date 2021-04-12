<?php 
//dans ce fichier, nous récupérons les informations pour réaliser la requête de modification : UPDATE

//récupération des informations passées en POST, nécessaires à la modification

$bool = 1; // Pour une bonne redirection 



if ( empty($_POST['pro_ref']) || empty($_POST['pro_libelle']) || empty($_POST['pro_prix']) || empty($_POST['pro_stock']) ) {
    header("Location: update_form.php?pro_id=".$_POST['pro_id']."&erreur_ref=1");
    $bool = 0;
    exit;
}


else if   (!is_numeric($_POST['pro_prix']) || !is_numeric($_POST['pro_stock']) )   {
        header("Location: update_form.php?pro_id=".$_POST['pro_id']."&erreur_ref=3");
        $bool = 0;
        exit;
    }



require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion



$pro_id=$_POST['pro_id'];
$pro_cat_id=$_POST['cat_nom'];
$pro_ref=$_POST['pro_ref'];
$pro_libelle=$_POST['pro_libelle'];
$pro_description=$_POST['pro_description'];
$pro_prix=$_POST['pro_prix'];
$pro_stock=$_POST['pro_stock'];
$pro_couleur=$_POST['pro_couleur'];
$pro_photo=$_POST['pro_photo'];
$pro_d_modif=date("yy-m-d");

//exclusion de référence


$requete1 = "SELECT * FROM produits where pro_ref=\"$pro_ref\""; //concatenantion d'une chaine de caractère
$result1 = $db->prepare($requete1);
$result1->execute();
$nb_ref=$result1->rowCount();
$result1->closeCursor();

$requete2 = "SELECT * FROM produits where pro_id=".$pro_id;
$result2 = $db->query($requete2);
$row1 = $result2->fetch(PDO::FETCH_OBJ); 
$ref=$row1->pro_ref ;

if (($nb_ref == 1) and ($ref != $pro_ref))  { //test pour existante de la référence diffente de la référence du produit que l'on veut modifier
    header("Location: update_form.php?pro_id=".$_POST['pro_id']."&erreur_ref=4");
    $bool = 0;
    exit;
}






if($bool == 1){
    if (isset($_POST["pro_bloque"])){
      
        $pro_bloque=$_POST['pro_bloque']; 
        $requete = $db->prepare("UPDATE produits SET pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock,
                               pro_couleur=:pro_couleur, pro_photo=:pro_photo, pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE pro_id=:pro_id");
                              
                              
        $requete->bindValue(':pro_id', $pro_id);
        $requete->bindValue(':pro_cat_id', $pro_cat_id);
        $requete->bindValue(':pro_ref', $pro_ref);
        $requete->bindValue(':pro_libelle', $pro_libelle);
        $requete->bindValue(':pro_description', $pro_description);
        $requete->bindValue(':pro_prix', $pro_prix);
        $requete->bindValue(':pro_stock', $pro_stock);
        $requete->bindValue(':pro_couleur', $pro_couleur);
        $requete->bindValue(':pro_photo', $pro_photo);
        $requete->bindValue(':pro_d_modif', $pro_d_modif);
        $requete->bindValue(':pro_bloque', $pro_bloque);
        $requete->execute();
    }
    else{

        $requete = $db->prepare("UPDATE produits SET pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock,
                                pro_couleur=:pro_couleur, pro_photo=:pro_photo, pro_d_modif=:pro_d_modif WHERE pro_id=:pro_id");
        $requete->bindValue(':pro_id', $pro_id);
        $requete->bindValue(':pro_cat_id', $pro_cat_id);
        $requete->bindValue(':pro_ref', $pro_ref);
        $requete->bindValue(':pro_libelle', $pro_libelle);
        $requete->bindValue(':pro_description', $pro_description);
        $requete->bindValue(':pro_prix', $pro_prix);
        $requete->bindValue(':pro_stock', $pro_stock);
        $requete->bindValue(':pro_couleur', $pro_couleur);
        $requete->bindValue(':pro_photo', $pro_photo);
        $requete->bindValue(':pro_d_modif', $pro_d_modif);
        $requete->execute();
    }

 

    //libère la connection au serveur de BDD
    $requete->closeCursor();

    //redirection vers la page index.php
    header("Location: tableau.php");
   
}

?>
    


