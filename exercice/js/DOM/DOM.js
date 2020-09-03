var Bouton1 = document.getElementById("Id_btn1");
var affichage = document.getElementById("TabCont");
Bouton1.addEventListener("click", clickbtn1);
function clickbtn1() {
    var X = 1;
    var i = 0
    var Table = [];
    var TabSom = 0;
    while (X != 0) {
        X = prompt("entrez un nombre (tapez 0 pour arréter la saisie)");

        // vérifie que l'entrée est bien un nombre
        while (isNaN(X) == true || X == "") {
            X = prompt("vous n'avez pas entrée un nombre, recommencez");
        }
        if (X != 0) {
            Table[i] = X;
            TabSom = parseInt(TabSom) + parseInt(X);
            i++;
        }
    }
    // Table = Table.pop;
    TabLg = Table.length;
    var TabMoy = TabSom / TabLg;
    affichage.innerHTML = "vous avez saisie " + TabLg + " valeur(s), leur somme est de " + TabSom + " et leur moyenne est de " + TabMoy;
}