

function changeInput(nameInput){
    let password_login = document.getElementById(nameInput);
    if (password_login.type == "password"){
        password_login.type = "text";
    }else {
        password_login.type = "password";
    }
}
