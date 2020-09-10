var Guess = document.getElementById("textBox1");
var Reponse = document.getElementById("label1");

var Rng = 0;
function RollRng() {
    Rng = parseInt(Math.random() * 10);
    
    console.log(Rng);
}


function verif() {
    if (Rng > Guess.value) {
        Reponse.innerHTML = "trop petit";
    }
    else if (Rng < Guess.value) {
        Reponse.innerHTML = "trop grand";
    }
    else if (isNaN(Guess.value) == true) {
        Reponse.innerHTML = "Entrez un chiffre";
    }
    else {
        Reponse.innerHTML = "bravo";
    }

}