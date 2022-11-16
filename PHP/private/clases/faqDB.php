<?php

    namespace BDD\Tables;
        
    include_once 'database.php';

    use BDD\Database;

    class FAQ extends Database {
        //Obtiene las preguntas y respuestas de la BBDD
        function getFAQ(){
            $stmt = $this->BDDCon->prepare("SELECT * FROM preguntas_frecuentes");
            $stmt->execute();
            return $stmt;
        }
    }

?>