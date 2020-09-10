// recupere le champ d'affichage des multiplication
var Dmultiplication = document.getElementById("multiplication");

// recupere le champ du formulaire de commande
var Prix = document.getElementById("prix");
var Qtt = document.getElementById("qtt");
var Total = document.getElementById("total");

// recupere les champs du formulaire jarditou
var Nom = document.getElementById("nom");
var Prenom = document.getElementById("prenom");
var Naissance = document.getElementById("date");
var CP = document.getElementById("cp");
var Mail = document.getElementById("mail");
var SexeM = document.getElementById("masc");
var SexeF = document.getElementById("fem");
var Sujet = document.getElementById("sujet");
var Question = document.getElementById("question");
var Accord = document.getElementById("accord");
// --
var ErNom = document.getElementById("ernom");
var ErPrenom = document.getElementById("erprenom");
var ErNaissance = document.getElementById("erdate");
var ErCP = document.getElementById("ercp");
var ErMail = document.getElementById("ermail");
var ErSexe = document.getElementById("ersexe");
var ErSujet = document.getElementById("ersujet");
var ErQuestion = document.getElementById("erquestion");
var ErAccord = document.getElementById("eraccord");

// -------------------------------


var bouton1 = document.getElementById("Id_btn1");
bouton1.addEventListener("click", clickbtn1);

// enregistre les ages et donne le nombre de personne dans chaque tranche d'age demandées
function clickbtn1() {
    var Age = [];
    var InpAge = 0;
    var Sujet = 1;
    var Jeune = 0;
    var Moyen = 0;
    var Vieu = 0;
    while (InpAge < 100) {
        if (InpAge != null) {
            InpAge = prompt("Entrez l'age du sujet n° " + Sujet);
            var TailleTab = Age.push(InpAge);
            console.log("la taille du tableau est" + TailleTab);
            console.log(("l'age entré est " + InpAge));
            console.log(Age);
            Sujet++
        }
        else {
            break;
        }
    }
    for (i = 0; i < TailleTab; i++) {
        if (Age[i] < 20) {
            Jeune++
        }
        else if (Age[i] >= 20 && Age[i] <= 40) {
            Moyen++
        }
        else
            Vieu++

        console.log("tour n°" + i);
        console.log("jeune" + Jeune);
        console.log("moyen" + Moyen);
        console.log("vieu" + Vieu);
    }
    alert("il y a " + Jeune + " jeune(s), " + Moyen + "Moyen(s) et " + Vieu + " vieu(x)")

}
// table de multiplication
var bouton2 = document.getElementById("Id_btn2");
bouton2.addEventListener("click", clickbtn2);

function clickbtn2() {
    Dmultiplication.innerHTML = "";
    var Chiffre = prompt(" entrez un chiffre à multiplier");
    TableMult(Chiffre);
    function TableMult(x) {
        for (i = 0; i <= 10; i++) {
            Dmultiplication.append(i + "x" + x + "=" + i * x + "  |  ")
        };
    }


}
// recherche de prénom
var bouton3 = document.getElementById("Id_btn3");
bouton3.addEventListener("click", clickbtn3);

function clickbtn3() {
    var Tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
    var Prenom = prompt("entrez un prénom");
    var IndexPrenom = Tab.indexOf(Prenom);
    if (IndexPrenom != -1) {
        var Supr = Tab.splice(IndexPrenom, 1);

        var Ajout = Tab.push("");
    }
    else {
        alert("le prénom saisi ne fait pas partie de la liste");
    }


}
// total d'une commande
var bouton4 = document.getElementById("Id_btn4");
bouton4.addEventListener("click", clickbtn4);

function clickbtn4() {
    // recupere la valeur des champs
    var PU = Prix.value;
    var QteCom = Qtt.value;
    // calcul du total 
    var Tot = parseInt(PU) * parseInt(QteCom);

    // calcul de la remise 
    if (Tot >= 100 && Tot <= 200) {
        var Remise = Tot * 0.05;
    }
    else if (Tot > 200) {
        var Remise = Tot * 0.1;
    }
    else {
        var Remise = 0;
    }

    // calcul du prix intermediaire, total-remise 
    var PI = Tot - Remise;

    // calcul des frais de port 

    if (PI <= 500) {
        var Port = PI * 0.02;
        if (Port < 6) {
            Port = 6;
        }
    }
    else {
        Port = 0
    }
    // calcul du prix à payer 
    var Pap = PI + Port;

    // affichage du résultat final 

    Total.value = " votre commande se monte à un total de " + Pap.toFixed(2) + " € dont " + Remise.toFixed(2) + "€ de remise et " + Port.toFixed(2) + "€ de frais de port";

}
// validation formulaire jarditou

// declaration RegExp
var RegXpMot = RegExp("^[a-z A-Z]+$");
// var RegXpParag = RegExp("^[\D 1-9]+$");
var RegXpMail = RegExp("^[a-z A-Z 1-9._-]+@[a-z 1-9- _]+.[a-z]{2,4}$");
var RegXpCp = RegExp("^[1-9]{5}$")
var RegXpNaissance = RegExp("^[1-9][1-9]?\/[1-9][1-9]?\/[1-9]{4}$");

function CheckForm() {
    var ControlSub = 0;
    console.log(Question.value);
    if (RegXpMot.test(Nom.value) == false) {
        ErNom.innerHTML = "Entrez votre nom";
        ControlSub++;
    }
    else {
        ErNom.innerHTML = "";

    }
    if (RegXpMot.test(Prenom.value) == false) {
        ErPrenom.innerHTML = "Entrez votre prénom";
        ControlSub++;

    }
    else {
        ErPrenom.innerHTML = "";

    }
    if (SexeF.checked == false && SexeM.checked == false) {
        ErSexe.innerHTML = "cochez l'une des cases";
        ControlSub++;

    }
    else {
        ErSexe.innerHTML = "";

    }
    if (RegXpNaissance.test(Naissance.value) == false) {
        ErNaissance.innerHTML = "Entrez une date de naissance au format jj/mm/aaaa";
        ControlSub++;

    }
    else {
        ErNaissance.innerHTML = "";

    }
    if (RegXpCp.test(CP.value) == false) {
        ErCP.innerHTML = "Entrez un code postal valide";
        ControlSub++;
    }
    else {
        ErCP.innerHTML = "";

    }
    if (RegXpMail.test(Mail.value) == false) {
        ErMail.innerHTML = "Entrez une addresse mail valide";
        ControlSub++;

    }
    else {
        ErMail.innerHTML = "";

    }

    if (Sujet.value == "") {
        ErSujet.innerHTML = "Coisissez un sujet";
        ControlSub++;
    }
    else {
        ErSujet.innerHTML = "";

    }
    if (Question.value == "" || Question.value==null) {
        ErQuestion.innerHTML = "Posez votre question";
        ControlSub++;
    }
    else {
        ErQuestion.innerHTML = "";

    }
    if (Accord.checked == false) {
        ErAccord.innerHTML = "cochez cette case";
        ControlSub++;
    }
    else {
        ErAccord.innerHTML = "";

    }
    if (ControlSub != 0) {
        return false;
    };
    return;
}