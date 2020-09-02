var bouton1= document.getElementById("Id_btn1");
bouton1.addEventListener("click",clickbtn1);

function clickbtn1(){
var TailleTab=prompt("entrez la taille du tableau");
while (isNaN(TailleTab)==true || TailleTab==0 || TailleTab==""){
    TailleTab=prompt("vous n'avez pas entrée un nombre valide, recommencez")
}


var Tab=Array(TailleTab);
for (i=1; i<=TailleTab; i++){

    Tab[i]=prompt("entrez la valeur n° " + i);
}

var affichage=document.getElementById("TabCont");
affichage.innerHTML=Tab;
}