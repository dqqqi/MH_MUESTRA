// funciones del modal
const modal = document.querySelector('.form');
const modalFuera = document.querySelector("#modal-fuera");
const form = document.getElementById('formRec');

/* form pdf*/
const pdf = document.querySelector('.formPDF');
const pdfFuera = document.querySelector("#PDF-fuera");

let filtros = false;

function openPDF(){
    pdf.style.display='block';
    pdfFuera.style.display = 'block';

    if(openModal){
        cancelModal();
    } else {
        openModal() = false;
    }
    console.log('open pdf');
}

function cancelPDF(){
    pdf.style.display='none';
    pdfFuera.style.display = 'none';
    console.log('cancel pdf');
}

pdfFuera.onclick = function(event) {
    if (event.target == pdfFuera) {
        pdfFuera.style.display = "none";
        console.log('close pdf');
    }
}

/* form digital */
function openModal(){
    modal.style.display='block';
    modalFuera.style.display = 'block';
    cancelPDF();
    console.log('open modal y cancel pdf');
}

function cancelModal(){
    modal.style.display='none';
    form.reset();
    modalFuera.style.display = 'none';
    console.log('cancel activado');
}

/* cierra el formulario cuando el usuario de click fuera de la ventana. */
modalFuera.onclick = function(event) {
        if (event.target == modalFuera) {
            modalFuera.style.display = "none";
            console.log('close');
        }
}

// modal para los filtros ya instalados
const btnEnviarModal = document.querySelector('.form-container-filtros');

function popUp() {
    
    let cssForm = window.getComputedStyle(btnEnviarModal);
    let arrowIcon = document.querySelector('.bx-down-arrow-alt')

    if(cssForm.display == 'none'){
        btnEnviarModal.style.display = 'block';
        filtros = true;
    } else {
        btnEnviarModal.style.display = 'none';
        filtros = false;
    }
}

/* validacion de campos */

const formulario = document.querySelector('#formRec'); //Formulario
const inputs = document.querySelectorAll('#formRec input, #formRec textarea'); //Inputs dentro del formulario
const reqIn = document.querySelectorAll('#formRec [required]'); //Inputs obligatorios
const reqFil = document.querySelectorAll('#formRec .form-container-filtros [required]') //Inputs obligatorios de filtros
const txtOnlyIn = ['solicitante', 'cliente', 'propietarioNom']; //Nombres de los inputs que solo aceptan texto
const submitBtn = document.querySelector('#enviar'); //Boton de enviar formulario

let inputTypes = {}; //Los types de los inputs

for (const input of inputs) {
    let inName = input.getAttribute('name'); //Nombre del input
    inputTypes[inName] = input.getAttribute('type');
    let error = document.createElement('p');
    error.className = "error";
    error.id = inName+'Err';
    input.after(error);
    input.addEventListener('change', ()=>{
        if(!check(input)){
            if (isInArray(reqIn, input)) {
                if(isInArray(reqFil, input)){
                    if(filtros){
                        addError(input, 'Campo obligatorio');
                    }
                }else{
                    addError(input, 'Campo obligatorio');
                }
            }else{
                addError(input, 'Valor incorrecto');
            }
        }else{
            let inError = document.querySelector('#'+inName+'Err');
            inError.innerHTML = inError.innerHTML.replace('Valor incorrecto', '');
            inError.innerHTML = inError.innerHTML.replace('Campo obligatorio', '');
            input.classList.remove('inputError');
        }
    });
}

function check(input){
    let value = input.value;
    let name = input.getAttribute('name');
    
    if (isInArray(reqIn, input)){
        if(isInArray(reqFil, input)){
            if(filtros){
                if (toString(value).match(/\s/).length == value.length || value == "") {
                return false;
        }
            }
        }else{
            if (toString(value).match(/\s/).length == value.length || value == "") {
                return false;
             }
        }
    }

    if(inputTypes[name] == 'number'){
        return checkNum(value)
    }
    if(isInArray(txtOnlyIn, name)){
        return checkText(value);
    }
    return true;
}

//Revisa el formulario entero
function checkForm(){
    let noErrors = true;
    for (const input of reqIn) {
        if(!check(input)){
            addError(input, 'Campo obligatorio');
            noErrors = false;
        }
    }
    for (const input of inputs) {
        if (!check(input)) {
            addError(input, 'Valor incorrecto');
            noErrors = false;
        }
    }
    if (noErrors){
        sendForm();
    }else{
        showSnackbar('<i class="bx bx-error"></i>El formulario contiene errores.<br>Por favor, revisar antes de enviar', 'warning');
    }
}

function addError(input, msg){
    let inName = input.getAttribute('name');
    let inError = document.querySelector('#'+inName+'Err');
    if(inError.textContent == ''){
        inError.textContent = msg;
        if(!input.classList.contains('inputError')){
            input.classList.add('inputError');
        }
    }
}


function checkNum(value){
    let regExp = /\D/;
    return !regExp.test(value);
}

function checkText(value){
    let regExp = /\d/;
    return !regExp.test(value);
}

function isInArray(array, input){ //Ve si el input esta en el array especificado
    for (const element of array) {
        if (input == element) {
            return true;
        }
    }
    return false;
}

//Enviar formulario usando AJAX
async function sendForm(){
    let data = new FormData(formulario);
    let response = await fetch('../private/formRecAuth.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if (result == 1) {
        cancelModal();
        showSnackbar('<i class="bx bx-check-circle"></i> Formulario enviado con exito', 'success');
    } else{
        showSnackbar('<i class="bx bx-x-circle"></i> Error mandando formulario: '+result,'fatal error');
        console.log(result);
    }
}

async function sendFormPDF(){
    let form = document.querySelector('#formPDF');
    console.log(form);
    let data = new FormData(form);
    console.log(data.get('PDF'));
    let response = await fetch('../private/formPDF.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if (result == '1') {
        cancelModal();
        showSnackbar('<i class="bx bxs-check-circle"></i> Formulario enviado con exito', 'success');
    } else{
        showSnackbar('<i class="bx bxs-x-circle"></i> Error mandando formulario: '+result, 'fatal error');
        console.log(result);
    }
}
