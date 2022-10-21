const passwordInput = document.getElementById("senhaUsuario"); 
const eyeIcon = document.getElementById("exibirSenha");


function eyeClick(){
    let inputTypeIsPassword = passwordInput.type == "password";


    if(inputTypeIsPassword) {
        showPassword();
    }else{
        hidePassword();
    }
}

function showPassword(){
    passwordInput.setAttribute("type", "text");
}

function hidePassword(){
    passwordInput.setAttribute("type", "password");
}