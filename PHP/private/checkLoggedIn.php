<?php
    include_once 'clases/session.php';

    use userSession\Session;

    $sess = new Session();

    $timeLimit = 10 * 60 * 60; //El tiempo de expiración de una sesión (10 horas)

    if(!$sess->loggedIn || $sess->timeout + $timeLimit <= time()){
        header('location:../../index.html');
    }
?>