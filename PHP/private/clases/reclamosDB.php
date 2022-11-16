<?php
    namespace BDD\Tables;
    
    include_once 'database.php';

    use BDD\Database;

    class Reclamos extends Database {
        //Devuelve los datos del reclamo
        function getAnalisis($formId) {
            $stmt = $this->BDDCon->prepare("SELECT * FROM analisis_reclamos WHERE analisis_reclamos.ID_Form = ?");
            $stmt->execute(array($formId));
            return $stmt;
        }
    }

?>
