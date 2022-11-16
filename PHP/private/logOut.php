<?php
    include 'clases/session.php';

    use userSession\Session;

    $session = new Session();
    $session->closeSession();
    echo '1';
?>