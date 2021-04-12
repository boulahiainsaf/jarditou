   <?php
   function connexionBase()
   {
    //$db = new PDO('mysql:host=localhost;dbname=jarditou;charset=utf8', 'root', '');

    //Tente de se connecter
    try 
{
    //Instanciation de la connexion à la base
    $db = new PDO("mysql:host=localhost;charset=utf8;dbname=jarditou", "root", ""); 

    // Configure des attributs PDO au gestionnaire de base de données
        // Ici nous configurons l'attribut ATTR_ERRORMODE en lui donnant la valeur ERRMODE_EXCEPTION (cf. Ressources pour en savoir plus).

    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
} 

    //Si échec de la connexion (du try), on attrape l'exception avec catch
catch (Exception $e) 
{
    // On affiche le message et le code de l'erreur
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
    //Le script s'arrête ici.
}


//$requete = "SELECT * FROM produits";
       
   }
    ?>