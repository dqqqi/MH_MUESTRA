// Formulario

const btn = document.getElementById('enviar');
const formulario = document.querySelector('#login-form')
const errorList = {email: false, password: true};

function validarDatos(field, err, type){
    verificarError(field, err, type);
	verificacion();
}

function verificacion(){
    let hasErr = false;

    for (const prop in errorList) {
        const element = errorList[prop];
        
        if (element){
            hasErr = true;
            break;
        }
    }
    
    if (!hasErr && captcha){
        btn.disabled = false;
    } else{
        btn.disabled = true;
    }
}

function verificarError(field, err, type){
    const HTMLField = document.querySelector('#'+field);
    const value = HTMLField.value;
    const HTMLErr = document.querySelector('#'+err);
    let fieldErr = false;
    
    switch(type){
        case 'Email':
            fieldErr = verificarEmail(value);
        break;

        case 'Pass':
            fieldErr = verificarPass(value);
        break;
    }	

    if(!fieldErr){
        HTMLErr.style.display = "block";
        errorList[field] = true;
        console.log(HTMLErr);
    } else{
        HTMLErr.style.display = "none";
        errorList[field] = false;
    }
}
/*
function verString(string){
    const reg = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;
    if(string == " " || string.match(reg) != null){
        return false;
    }
    return true;
}
*/
function verificarEmail(email){
    const reg = /\.{2,}|\.$|\s/;
    const mailExp= /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
    if (email == "" || email.match(reg) != null || email.match(mailExp) == null) {
        return false;
    }
    return true;
}

function verificarPass(pass){
    const reg = /^.{4,8}$/;
    if (pass == "" || pass.match(reg) != null) {
        return false;	
    }
    return true;
}

// password visibility

const input = document.getElementById('password');

function showHidePass() {
    const showBtn = document.getElementById('show');
    console.log('showBtn');

    if (input.type === 'password') {
        input.type = 'text';
        showBtn.className = 'bx bx-hide';
    } else {
        input.type = 'password';
        showBtn.className = 'bx bx-show';
    }
}

// ReCAPTCHA

let captcha = false;
const checkbox = document.getElementById('captcha');

function captchaEnviado(){
    if(checkbox.checked)
    captcha = true;
    verificacion();
    console.log("captcha enviado");
}

//Enviar formulario usando AJAX
async function sendForm(){
    let data = new FormData(formulario);
    let response = await fetch('PHP/private/loginAuth.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if (result == 1) {
        showSnackbar('<i class="bx bx-check-circle"></i>Iniciando Sesión', 'success');
        window.location.assign('PHP/public/Inicio.php');
    } else{
        showSnackbar('<i class="bx bx-x-circle"></i> Error iniciando sesión: '+result, 'fatal error');
        console.log(result);
    }
}
