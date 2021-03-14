var envoyer = document.getElementById("envoyer1");
envoyer.addEventListener("click", function verif(event) {
    let Nom1 = document.getElementById("Nom1").value;
     // regex demandant une première lettre en majuscule
    let alpha = /(^[A-Z]+[a-zA-ZÃ©Ã¨ÃªÃ«Ã´Å“Ã®Ã¯Ã»Ã¼Ã Ã¡Ã¢Ã¦Ã§-\s]+$)/;
     // regex controlant le code postal, on controle s'il y a bien 5 chiffres.
    let cpostal = /(^[0-9]{5}$)|^$/;
     // regex controlant les adresses mails
    let mail = /(^[\w\.-]+@[a-z]+[\.]{1}[a-z]{2,3}$)/;
    // regex controlant la date
    let dNaissance = /(^[0-9]{4}[\-]{1}[0-9]{2}[\-]{1}[[0-9]{2}$)/;;
    let prenom1 = document.getElementById("prenom1").value;
    let dat = document.getElementById("date").value;
    let code = document.getElementById("code").value;
    let courriel = document.getElementById("courriel1").value;
    let inputstate = document.getElementById("inputstate").value;
    let fCheck = document.getElementById("fCheck").checked;
    let text = document.getElementById("text").value;
    let rodio1 = document.getElementById("Radios1").checked;
    let rodio2 = document.getElementById("Radios2").checked;
    let rodio3 = document.getElementById("Radios3").checked;
      // Controle du nom
    if (!alpha.test(Nom1)) {
        document.getElementById("Nom2").textContent = "Veulliez saisir votre nom avec des caractéres alphabitiques avec la première lettre en majuscule";
        event.preventDefault();
    } else {
        document.getElementById("Nom2").textContent = "";
    }
      // Controle du prénom
    if (!alpha.test(prenom1)) {
        document.getElementById("prenom2").textContent = "Veulliez saisir votre prenom avec des caractéres alphabitiques avec la première lettre en majuscule";
        event.preventDefault();
    } else {
        document.getElementById("prenom2").textContent = "";
    }
       // Controle des booleans "sexe"
    if (rodio1 == false && rodio2 == false && rodio3 == false) {
        document.getElementById("sex2").textContent = "Veulliez choisir une réponse";
    } else {
        document.getElementById("sex2").textContent = ""()
    }
      // Controle de la date de naissance
    if (!dNaissance.test(dat)) {
        document.getElementById("date2").textContent ="Veulliez entrer votre date de naissance";
        event.preventDefault();
    } else {
        document.getElementById("date2").textContent = "";
    }
      // Controle du code postal
    if (!cpostal.test(code)||code=="") {
        document.getElementById("code2").textContent = "Veulliez saisir votre code postal";
        event.preventDefault();
    } else {
        document.getElementById("code2").textContent = "";
    }
      // Controle de l'email
    if (!mail.test(courriel)) {
        document.getElementById("c2").textContent = "Veulliez saisir votre Email";
        event.preventDefault();
    } else {
        document.getElementById("c2").textContent = "";
    }
    if (inputstate == "Veuillez séléctionner un Sujet") {
        document.getElementById("inputstate2").textContent = "Selectionnez le sujet de votre requête";
    } else {
        document.getElementById("inputstate2").textContent = "";
    }
    if (text == "") {
        document.getElementById("text2").textContent = "Ce champ est obligatoire";
        event.preventDefault();
    } else {
        document.getElementById("text2").textContent = "";
    }
    if (fCheck == false) {
        document.getElementById("fCheck1").textContent = "Ce champ est obligatoire";
        event.preventDefault();
    } else {
        document.getElementById("fCheck1").textContent = "";
    }
});