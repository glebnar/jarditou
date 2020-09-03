var bouton1 = document.getElementById("Id_btn1");
var bouton2 = document.getElementById("Id_btn2");
bouton1.addEventListener("click", clickbtn1);
bouton2.addEventListener("click", clickbtn2);

function clickbtn1() {
    var TailleTab = prompt("entrez la taille du tableau");
    while (isNaN(TailleTab) == true || TailleTab == 0 || TailleTab == "") {
        TailleTab = prompt("vous n'avez pas entrée un nombre valide, recommencez")
    }


    var Tab = Array(TailleTab);
    for (i = 1; i <= TailleTab; i++) {

        Tab[i] = prompt("entrez la valeur n° " + i);
    }

    var affichage = document.getElementById("TabCont");
    affichage.innerHTML = Tab;
}

function clickbtn2() {
    var InputTab = "a";
    var u = 0;
    var TabBulle = [];
    var TestBulle = true;
    while (InputTab != null) {
        InputTab = prompt("entrez le nom n°" + (u + 1) + "(annulez pour finir la saisie)");
        while (isNaN(InputTab) == false && InputTab != null) {
            InputTab = prompt("vous avez entré un nombre, veuillez entre un nom");
        }
        console.log(InputTab);
        if (InputTab != null) {
            TabBulle[u] = InputTab;
        }
        u++;
    }
    var TailleTabBulle = TabBulle.length;
    console.log(TabBulle[0]);
    console.log(TailleTabBulle);

    while (TestBulle == true) {
        var FinBoucle = 0;
        for (y = 0; y <= TailleTabBulle; y++) {
            TestA = TabBulle[y];
            TestB = TabBulle[y + 1];
            if (TestA > TestB) {
                TabBulle[y] = TestB;
                TabBulle[y + 1] = TestA;
                FinBoucle++;
            }
        }
        console.log(FinBoucle);
        if (FinBoucle == 0) {
            TestBulle = false;
        }

    }
    var affichageBulle = document.getElementById("TabBulleCont");
    affichageBulle.innerHTML = TabBulle;
}
