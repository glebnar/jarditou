
// change la page détail en formulaire de modification
$("#mod").on('click', function () {
    $(this).text(($(this).text()=="Modifier"?"Annuler":"Modifier"));
    $(this).toggleClass("btn-danger text-light");
    $(this).toggleClass("btn-warning");
    $("#valid").toggle();
    $("#suppr").toggle();
    $("#img_detail").toggle();
    $("#categorie").toggle();
    $("#d_cat_nom").toggle();
    $("#div_photo").toggle();
    if( $("#pro_ref").attr('readonly')== 'readonly'){
        $("#pro_ref").removeAttr('readonly');
            }else{
        $("#pro_ref").attr('readonly', 'true')
    }
    if( $("#pro_libelle").attr('readonly')== 'readonly'){
        $("#pro_libelle").removeAttr('readonly');
            }else{
        $("#pro_libelle").attr('readonly', 'true')
    }
    if( $("#pro_description").attr('readonly')== 'readonly'){
        $("#pro_description").removeAttr('readonly');
            }else{
        $("#pro_description").attr('readonly', 'true')
    }
    if( $("#pro_prix").attr('readonly')== 'readonly'){
        $("#pro_prix").removeAttr('readonly');
            }else{
        $("#pro_prix").attr('readonly', 'true')
    }
    if( $("#pro_stock").attr('readonly')== 'readonly'){
        $("#pro_stock").removeAttr('readonly');
            }else{
        $("#pro_stock").attr('readonly', 'true')
    }
    if( $("#pro_couleur").attr('readonly')== 'readonly'){
        $("#pro_couleur").removeAttr('readonly');
            }else{
        $("#pro_couleur").attr('readonly', 'true')
    }
    if( $("#pro_photo").attr('readonly')== 'readonly'){
        $("#pro_photo").removeAttr('readonly');
            }else{
        $("#pro_photo").attr('readonly', 'true')
    }
});


// declaration RegExp
var RegXpMot = RegExp("^[a-z A-Z]+$");
// var RegXpParag = RegExp("^[\D 1-9]+$");
var RegXpMail = RegExp("^[a-z A-Z 1-9._-]+@[a-z 1-9- _]+.[a-z]{2,4}$");
var RegXpCp = RegExp("^[1-9]{5}$")
var RegXpNaissance = RegExp("^[1-9][1-9]?\/[1-9][1-9]?\/[1-9]{4}$");
// ----------------------------------------------


function Suppression() {

    //Rappel : confirm() -> Bouton OK et Annuler, renvoit true (OK) ou false (Annuler)
    var resultat = confirm("Etes-vous certain de vouloir supprimer cet enregistrement ?");


    //annulation du comportemnt par défaut 
    if (resultat == false) {

        event.preventDefault();
        document.location.href = "index.php";
    }
}


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