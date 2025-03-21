
// pour rendre visible ou non les mots de passe lors de l'inscription et de la connexion d'un utilisateur 
// (nameInput permet de recuperer le nom de l'id de l'input pour pouvoir le realiser sur plusieurs input different avec une seule fonction)
function changeInput(nameInput){
    let password_login = document.getElementById(nameInput);

    if (password_login.type == "password"){
        password_login.type = "text";
    }else {
        password_login.type = "password";
    }
}
// const burger = document.getElementsByClassName("burger");

// je recupere la classe left_nav et right_nav je prend la premiere partie du tableau => pour accéder au style de la classe
var x = document.getElementsByClassName("left_nav");
var y = document.getElementsByClassName("right_nav");
x = x[0];
y = y[0];

function  myFunction() { // me change les classes en display block à display none  et inversement
    if (x.style.display == "flex" || x.style.display == "") {
        x.style.display = "none";
        y.style.display = "none";
    } else {
        x.style.display = "flex";
        y.style.display = "flex";
    }
}