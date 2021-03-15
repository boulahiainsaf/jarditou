var tab = ["Audrey", "Aur&eacute;lien", "Flavien", "J&eacute;r&eacute;my", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "St&eacute;phane"];
let prenom = window.prompt("saisissez un pr&eacute;nom : ");
let tab1 = new Array();
if (prenom == tab[0]) {
    tab1.push(tab[1], tab[2], tab[3], tab[4], tab[5], tab[6], tab[7], tab[8], tab[9], " ]");
} else if (prenom == tab[1]) {
    tab1.push(tab[0], tab[2], tab[3], tab[4], tab[5], tab[6], tab[7], tab[8], tab[9], " ]");
} else if (prenom == tab[2]) {
    tab1.push(tab[0], tab[1], tab[3], tab[4], tab[5], tab[6], tab[7], tab[8], tab[9], " ]");
} else if (prenom == tab[3]) {
    tab1.push(tab[0], tab[1], tab[2], tab[4], tab[5], tab[6], tab[7], tab[8], tab[9], " ]");
} else if (prenom == tab[4]) {
    tab1.push(tab[0], tab[1], tab[2], tab[3], tab[5], tab[6], tab[7], tab[8], tab[9], " ]");
} else if (prenom == tab[5]) {
    tab1.push(tab[0], tab[1], tab[2], tab[3], tab[4], tab[6], tab[7], tab[8], tab[9], " ]");
} else if (prenom == tab[6]) {
    tab1.push(tab[0], tab[1], tab[2], tab[3], tab[4], tab[5], tab[7], tab[8], tab[9], " ]");
} else if (prenom == tab[7]) {
    tab1.push(tab[0], tab[1], tab[2], tab[3], tab[4], tab[5], tab[6], tab[8], tab[9], " ]");
} else if (prenom == tab[8]) {
    tab1.push(tab[0], tab[1], tab[2], tab[3], tab[4], tab[5], tab[6], tab[7], tab[9], " ]");
} else if (prenom == tab[9]) {
    tab1.push(tab[0], tab[1], tab[2], tab[3], tab[4], tab[5], tab[6], tab[7], tab[8], " ]");
} else {
    alert("erreur");
    document.write(tab);
}
document.write(tab1);