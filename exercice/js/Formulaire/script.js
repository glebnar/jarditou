// event onClick sur bouton d'envoie
var envoie = document.getElementById("send");
envoie.addEventListener("click", ValidForm);
// --


// change le message d'erreur en tete de page
var Alert = document.getElementById("MsgAlert");
function MsgErreur(ContErreur) {
    var Erreur = document.createElement("p");
    Erreur.textContent = "Veuillez entrez " + ContErreur + " svp";
    Alert.append(Erreur);
    
}
// --
function ValidForm() {
    Alert.innerHTML = "";
    // recupere la valeur des champs du formulaire
    var Soc = document.getElementById("societe").value;
    var Cont = document.getElementById("contact").value;
    var Code = document.getElementById("CP").value;
    var Vil = document.getElementById("ville").value;
    var Mail = document.getElementById("mail").value;
    // --
    
    LgSoc = Soc.length;
    LgCont = Cont.length;
    LgCode = Code.length;
    LgVil = Vil.length;
    VerifMail = Mail.indexOf("@");
    // verifie les élément du formulaire
    if (LgSoc < 1 || LgCont < 1 || LgCode != 5 || LgVil < 1 || VerifMail == -1) {
        alert("Votre formulaire contient une ou plusieurs erreurs")
    }
    if (LgSoc < 1) {
        MsgErreur("le nom de la société")
    }
    if (LgCont < 1) {
        MsgErreur("le nom de la personne à contacter")
        
    }
    if (LgCode != 5) {
        MsgErreur("un code postal à 5 chiffres")
        
    }
    if (LgVil < 1) {
        MsgErreur("le nom de la ville")
        
    }
    if (VerifMail == -1) {
        MsgErreur("une adresse mail valide")
        
    }
    // --
}

var Choix = document.getElementById("tec");
Choix.addEventListener("click", ChampTec);
var TargetZoneTec = document.getElementById("zoneTec");

function ChampTec() {
    ValChoix = Choix.value;
    if (ValChoix != "Choisissez") {
        TargetZoneTec.innerHTML = ValChoix;

    }
    else {
        TargetZoneTec.innerHTML = ""
    }
}