let PU = window.prompt("saisissez le prix unitaire : ");
let QTECOM = window.prompt("saisissez la quantité commandée");
let TOT = PU * QTECOM;
let REM = 0;
let PORT = 0;
let y = 0;
let z = 0;
if (TOT >= 100 && TOT <= 200) {
    REM = TOT * 5 / 100;
    y = 0.5;
} else if (TOT < 100) {
    REM = 0;
} else {
    REM = TOT * 10 / 100;
    y = 0.1;
}
let x = TOT - REM;
if (x > 500) {
    PORT = 0;
    z = 0;
} else {
    PORT = x * 2 / 100;
    z = 0.02;

    if (PORT < 6) {
        PORT = 6;
    } else {
        PORT = 0;
    }
}
let PAP = x + PORT;
console.log(PORT);
document.write("le prix &agrave; payer est : " + TOT + " - " + REM + " +" + PORT + " = " + PAP + "<br/>");
document.write("la remise est :" + TOT + " * " + y + " =  " + REM + "<br/>");
document.write("le frais port est :" + PORT);