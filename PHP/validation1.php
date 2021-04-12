<?php
$nom = $_POST['Nom'];
$prenom = $_POST["prenom"];
$codePost = $_POST["code"];
$Email=$_POST["courriel"];
$votre_question=$_POST["question"];
$Dnaissance =$_POST["date"];
//$accepte =$_POST["accepte"];
$sujet =$_POST["sujet"];
$cpostal ="~^[0-9]{5}$~";
$mail = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";
$dNaissance = "/(^[0-9]{4}[\-]{1}[0-9]{2}[\-]{1}[[0-9]{2}$)/";
$erreur = 0;
$erreur_prenom="";
$erreur_nom="";
$erreur_codePost="";
$erreur_Email="";
$erreur_Dnaissance="";
$erreur_votreQuestion="";
$erreur_sujet="";
$erreur_genre="";
$erreur_check="";
$accepte="";
$sexe="";
//echo "$accepte";

// validation de nom:
if(empty($nom)){
    $erreur_nom="Veulliez saisir votre nom";
    $erreur++;
}else{}
// validation de prenom:
if(empty($prenom)){
    $erreur_prenom="Veulliez saisir votre prénom";
    $erreur++;
}else{}

if(empty($_POST["genre"])){
    $erreur_genre="Le sexe est obligatoire";
    $erreur++;
}else{ }

// validation de date de naissance:
if(preg_match($dNaissance,$Dnaissance)){
    
}else{
    $erreur_Dnaissance="Veulliez saisir votre Email";
    $erreur++;
}
// validation de code postale:
if(preg_match($cpostal,$codePost)){
}else{
    $erreur_codePost="Veulliez saisir votre code postal";
    $erreur++;
}
// validation de email:
if(preg_match($mail,$Email)){
    
}else{
    $erreur_Email="Veulliez saisir votre Email";
    $erreur++;
}
// validation de 
if(empty($votre_question)){
    $erreur_votreQuestion="Veulliez saisir votre question";

    $erreur++;
}else{}
// validation de sujet:
if(strlen($sujet)<5 || $sujet=="Veuillez séléctionner un Sujet"){
    $erreur_sujet="Veuillez séléctionner un Sujet";
    $erreur++;
}else{}

if (isset($_POST['genre'])) {

} else {

     $sexe= "Veuillez indiquer votre sexe";
     $erreur++;
}

if (!isset($_POST["accepte"])) {
    $accepte = "Veuillez accepter le traitement du formulaire";
    $erreur++;
} else{}

if($erreur==0){
    include"données.php";

}else {
    include"contact.php";
}
?>

	
