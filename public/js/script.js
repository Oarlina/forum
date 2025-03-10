
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

