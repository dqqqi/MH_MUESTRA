/* Crea snackbar al cargarse la pagina */
let snackbar;
let timeout;
let animationTimeOut;
let remaining, duration = 10000; //cuanto tiempo el snackbar esta visible
 

document.addEventListener('DOMContentLoaded', ()=>{
    let snackbarHTML = document.createElement('div');
    snackbarHTML.id = 'snackbar';
    document.body.appendChild(snackbarHTML);

    snackbar = document.querySelector('#snackbar');

    snackbar.addEventListener('mouseover', ()=>{
        clearTimeout(timeout);
        remaining -= Date.now() - duration;
    });

    snackbar.addEventListener('mouseleave', ()=>{
        hideSnackbar();
    });
});

function showSnackbar(message, type){

    switch(type){
        case 'success':
            snackbar.className = "success";
        break;

        case 'warning':
            snackbar.className = "warning";
        break;

        case 'fatal error':
            snackbar.className = "fatal-error";
        break;
    }
    
    snackbar.innerHTML = message;
    snackbar.style.display = "block";
    snackbar.style.animation = 'fadein 0.5s forwards';
    hideSnackbar();
}

function hideSnackbar(){
    timeout = setTimeout(()=>{
        snackbar.style.animation = "fadeout 0.5s forwards";
        animationTimeOut = setTimeout(()=>{snackbar.style.display = 'none'}, 500);
        remaining, duration = 10000;
    }, duration);
}