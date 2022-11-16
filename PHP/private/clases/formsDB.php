<?php
    /*Clase encargada de manipular la tabla de formularios
      de reclamos.*/
    namespace BDD\Tables;

    include_once 'database.php';

    use BDD\Database;
    use PDO;

    class Form extends Database
    {
        //Sube un formulario a la base de datos
        function uploadForm(array $datos){
            $stmt = $this->BDDCon->prepare('INSERT INTO formulario (`ID_User`, `Fecha`, `Solicitante`, `N_Remito`, 
                                           `Reclamante/Cliente`, `Cantidad`, `Descripción`, `Motivo`,
                                           `Costes_derivados`, `Observaciones`, `Instalado al Km`, 
                                           `El primer fallo ocurrio al Km`, `Retirado al Km`, 
                                           `Año_pieza`, `Vehículo (marca y modelo)`, `Tiempo en funcionamento en Km/Horas`,
                                           `Año matriculado`, `Tipo de motor / cm³`, `Potencia (KW / HP)`, 
                                           `Kilometraje del vehículo / motor`, `N_chasis`, `N_matrícula`, 
                                           `Adjuntos`, `Es_PDF`) 
                                            VALUES ('.str_repeat('?, ',22).'?, 0)');
            for ($i=0; $i < count($datos); $i++) { 
                if ($datos[$i] == '') {
                    $stmt->bindValue(($i+1), $datos[$i], PDO::PARAM_NULL);
                }else{
                    $stmt->bindValue(($i+1), $datos[$i]);
                }
            }
            $stmt->execute();
            return $stmt;
        }

        //Sube un formulario como PDF a la BDD
        function uploadPDF($datos){
            $stmt = $this->BDDCon->prepare('INSERT INTO formulario (ID_user, Fecha, Adjuntos, Es_PDF) VALUES (?, ?, ?, 1)');
            $stmt->execute($datos);
            return $stmt;
        }

        //Devuelve el formulario por ID
        function getFormByID($id){
            $stmt = $this->BDDCon->prepare('SELECT * FROM formulario WHERE ID_Form = ? ');
            $stmt->execute($id);
            return $stmt;
        }

        function getUserForm($userId){
            $stmt = $this->BDDCon->prepare('SELECT formulario.*, usuarios.Email FROM formulario 
                                            INNER JOIN usuarios ON formulario.ID_user = usuarios.ID WHERE ID_user = ? 
                                            ORDER BY Fecha DESC');
            $stmt->execute($userId);
            return $stmt;
        }

        //Devuelve el id del ultimo formulario subido
        function getLastID(){
            $stmt = $this->BDDCon->prepare('SELECT MAX(ID_Form) FROM formulario');
            $stmt->execute();
            $res = $stmt->fetch();
            return $res[0];
        }
    }
?>
