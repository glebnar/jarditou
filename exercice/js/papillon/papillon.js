var X=prompt("entrez un nombre");

// vérifie que l'entrée est bien un nombre
while (isNaN(X)==true  || TailleTab==""){
    X=prompt("vous n'avez pas entrée un nombre, recommencez")
}

var Y=prompt("entrez un multiplicateur");

// vérifie que l'entrée est bien un nombre
while (isNaN(Y)==true  || TailleTab==""){
    Y=prompt("vous n'avez pas entrée un nombre, recommencez")
}

var image=prompt("entrez l\'url d\'une image (laissez vide pour l'image par défaut)");

// recupere l'extension du fichier
function GetExt(){
    console.log(image);
    LienImg=image.length-3;
    console.log(LienImg);
    ExtImg= image.substr(LienImg,3);
    console.log(ExtImg);
}
GetExt();

// vérifie la validité du fichier image 
while (ExtImg!="jpg" && ExtImg!="png" && ExtImg!="gif" && ExtImg!="bmp" && ExtImg!=""){
    image=prompt("Entrez un lien vers une image valide");
    GetExt()
}
if (ExtImg=="" || ExtImg==null){
image="papillon.jpg";
}

// fonction d'affichage de l'image 

function afficheImg(image){
    var IMG = document.createElement("img");
    IMG.src = image;
    var Block=document.getElementById("BlockImage");
    Block.appendChild(IMG);
}
function Produit(X, Y){
    return "le résultat du produit est " + X*Y;

}
function cube(X){
    return "le résultat du cube de "+X+ " est " +X*X*X;
}
afficheImg(image);
var result1=document.getElementById("p1");
var result2=document.getElementById("p2");
result1.innerHTML=Produit(X, Y);
result2.innerHTML=cube(X);
