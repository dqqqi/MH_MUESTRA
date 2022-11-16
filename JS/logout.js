document.addEventListener('DOMContentLoaded', () =>{
    let btn = document.querySelector('#logOutBtn');
    btn.addEventListener('click', async () =>{
        let response = await fetch('../private/logOut.php', {
            method: 'POST'
        });
        let result = await response.text();
        if (result == '1') {
            window.location.assign('../../index.html');
        } else{
            showSnackbar('<i class="bx bx-x-circle"></i> Error cerrando sesión: '+result, 'fatal error');
            console.log(result);
        }
    })
});