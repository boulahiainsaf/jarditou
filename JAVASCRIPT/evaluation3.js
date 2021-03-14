var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
let prenom = window.prompt("saisissez un prénom : ");
let t = tab.length;
let i = 0;
for (let i = 0; i < t; i++) {
    tab[i] = tab[i].toUpperCase();
};
prenomMaj = prenom.toUpperCase();

var check = tab.includes(prenomMaj);

if (check) {
    tab.splice(tab.indexOf(prenomMaj), 1);
    tab.push("")

}
document.write(tab);
console.log(tab);