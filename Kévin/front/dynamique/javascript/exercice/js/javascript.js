var bouton1= document.getElementById("Id_btn1");
bouton1.addEventListener("click",clickbtn1);

function clickbtn1(){

    alert("Vous avez cliqué sur :\n Alert()");
}

var bouton2= document.getElementById("Id_btn2");
bouton2.addEventListener("click",clickbtn2);

function clickbtn2(){

    var prenom = prompt("Veuillez saisir votre prénom");
    if(prenom==null){
    alert("Vous avez cliqué sur Annuler");
    return;
    }

    var age= parseInt(prompt("Veuillez saisir votre age"));
    if(isNaN(age)){
    alert("Vous n'avez pas saisi un age correct !\nVeuillez recommencer.");
    return;
    }  

    alert("Voici ce que vous avez saisi :\n\nVotre prénom : "+prenom+"\nVotre age : " +age);
    document.write("votre ages est"+ age +"ans");
}

var bouton3= document.getElementById("Id_btn3");
bouton3.addEventListener("click",clickbtn3);

function clickbtn3(){

    var reponse = confirm("Veuillez cliquer sur OK ou bien Annuler");
    if (reponse == true) {
        alert("Vous avez cliqué sur OK");
    } 
    else {
        alert("Vous avez cliqué sur Annuler");
    }

}

var bouton4= document.getElementById("Id_btn4");
bouton4.addEventListener("click",clickbtn4);

function clickbtn4(){

    // var prenom = prompt("Veuillez saisir votre prénom");
    // if(prenom==null){
    //     alert("Vous avez cliqué sur Annuler");
    // }
    // else{
    //     console.log("Voici le prénom que vous avez saisi: "+prenom);
    //     alert("Vérifiez en Console (F12), ce que vous venez de saisir...");
    // }

// ------------------------------exercices---------------------------------------

var Mot=prompt("entrez un mot.");
var LgMot=Mot.length;
var Voy=0;
for (i=0;i<=LgMot;i++)
    {
        var Lettre=Mot.substr(i,1);
        console.log(Lettre);
        if (Lettre=="a" || Lettre=="e" || Lettre=="i" || Lettre=="o" || Lettre=="u" || Lettre=="y"){
            Voy++;
        }
        
    }
    if (Voy==0 || Voy==1)
    {
    alert("il y a "+Voy+" voyelle");
    }
    else {
        alert("il y a "+Voy+" voyelles");
    }
// ----------------------------------------------------------------------

// var A=parseInt(prompt("entrez le nombre à multiplier"));
// var B=parseInt(prompt("Jusqu'à quel entier?"));
// var C=0;
// for (i=0; i<=B; i++)
// {
//     C=A*i
//     console.log(A+"*"+i+"="+C);
// }

// ------------------------------------------------------------------------

// var ent=1;
// var som=0;
// var moy=0;
// var div=0;

// while (ent!=0){
//     ent=parseInt(prompt("entrez un nombre (entrez 0 pour finir la saisie)"));
//     som+=ent;
//     div++;

// }
// div--
// moy=som/div;
// alert("la somme vaut " +som+"\nla moyenne vaut "+moy+"\ndiviseur: "+div);

// -----------------------------------------------------

// var Nom="a";
// var A=1;
// while (Nom!=null)
//     {
//             Nom=prompt("entrez le prénom n° " +A+"\nou Cliquez sur Annuler pour arrêter la saisie");
//             while (Nom==""){
//                 Nom=prompt("entrez un Prénom valide");    
//                 }
//             if (Nom!=null){
//                 console.log("prénom n° "+A+" "+Nom);
//                 }
//             A++
//     }


// --------------------------------------------------------

//     var Nb = prompt("Entrez un nombre");
// var Reste = Nb%2;
// if (Reste==0)
//     {
//         alert("Ce nombre est pair");
//     }
// else
//     {
//         alert("ce nombre est impair");
//     }
// ---------------------------------

// var A=parseInt(prompt("entrez le premier nombre"));
// var B=parseInt(prompt("entrez le deuxieme nombre"));
// var C=prompt("entrez un opérateur");
// switch (C)
//     {
//         case "+":
//             var D=A+B;
//             alert(D)
//         break;
        
//         case "-":
//             var D=A-B;
//             alert(D);
//         break;
//         case "*":
//             var D=A*B;
//             alert(D);
//         break;
//         case "/":
//             if (B!=0)
//                 {
//                     var D=A/B;
//                     alert(D);
//                 }
//             else
//                 {
//                     alert("impossible de diviser par 0");
//                 }
//         break;
//         default:
//             alert("opérateur inconnu!");

//     }

// -----------------------------------------------------------

// var A = "100";
// var B = 100;
// var C = 1.00;
// var D = true;

// alert("Ceci est une chaîne de charactère" + A);
// B--;
// alert(B);
// A = parseInt(A)+parseInt(C);
// alert(A);
// }

// -----------------------------------

// var TestPrenom = prompt("entrez votre prénom");
// var TestNom = prompt("entrez votre nom");
// var TestSexe = prompt("etes vous un homme ou une femme ?");
// alert ( "nom: " +TestNom + "\nprénom: " + TestPrenom + "\nsexe: " + TestSexe);

// ------------------------------------------------

// var Ddn = prompt("Quel est votre annéee de naissance ?");
// var Age = 2020 - Ddn;
// if (Age>=18)
//     {
//         alert( `vous avez ${Age} ans, vous êtes majeur!`);
//     }
// else 
//     {
//         alert ("vous avez " + Age + " ans, vous êtes mineur!");
    }
