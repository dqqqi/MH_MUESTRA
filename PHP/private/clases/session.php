<?php
    /* Clase encargada de la manipulación de la variable $_SESSION */
    namespace userSession;

    class Session{

        public $loggedIn;
        public $userEmail;
        public $userRol;
        public $userId;
        public $userProv;
        public $timeout;

        function __construct(){
            if(session_status() == 1){
                session_start();
            }
            if(isset($_SESSION['loggedIn'])){
                $this->loggedIn = $_SESSION['loggedIn'];
                $this->userEmail = $_SESSION['email'];
                $this->userRol = $_SESSION['rol'];
                $this->userId = $_SESSION['userId'];
                $this->userProv = $_SESSION['proveedor'];
                $this->timeout = $_SESSION['timeout'];
            }
        }

        public function login($email, $rol, $userId, $prov){
            $this->loggedIn = $_SESSION['loggedIn'] = true;
            $this->userEmail = $_SESSION['email'] = $email;
            $this->userRol = $_SESSION['rol'] = $rol;
            $this->userId = $_SESSION['userId'] = $userId;
            $this->userProv = $_SESSION['proveedor'] = $prov;
            $this->timeout = $_SESSION['timeout'] = time();
        }

        public function closeSession(){
            session_destroy();
        }
    }

?>