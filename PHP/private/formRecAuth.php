<?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    
    include_once 'clases/formsDB.php';
    include_once 'clases/files.php';
    include_once 'clases/session.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    use BDD\Tables\Form;
    use fileSystem\Files;
    use userSession\Session;

    $form = new Form();
    $file = new Files();
    $sess = new Session();

    $id = $sess->userId;
    $fecha = date('Y-m-d H:i:s');
    $datos = array($id, $fecha);
    $adjuntos = '';
    $fileAdjuntos = $_FILES['adjuntos'] ? $_FILES['adjuntos'] : '';
    $formId = $form->getLastID() + 1;

    foreach ($_POST as $key => $value) {
        if($key == 'numCliente' && $value <= 0 || $key == 'numCliente' && $value = ''){
            $value = 1;
        }
        array_push($datos, $value); 
    }

    if($fileAdjuntos['name'][0] != ''){ //Si manda archivos adjuntos
        if($file->checkFiles($fileAdjuntos)){
                foreach($fileAdjuntos['name'] as $names){
                    $adjuntos .= $names.' ';
                }
            substr($adjuntos, -1);
            array_push($datos, $adjuntos);

            if(subirForm()){
                $adjRes = $file->uploadToFolder('form'.$formId.'/Adjuntos', $fileAdjuntos);
                if($adjRes){
                    echo 1;
                }else{
                    echo "Error subiendo archivos adjuntos";
                }
            }else{
                echo "Error subiendo formulario";
            }
        }else{
            echo 'Archivos adjuntos exceden limite de tamaño (180MB)';
        }
    }else{
        array_push($datos, $adjuntos);
        echo subirForm();
    }

    function subirForm(){
        $res = $GLOBALS['form']->uploadForm($GLOBALS['datos']); //Sube formulario a la BDD
        if($res->rowCount()){
            return 1;
        }else{
            return 0;
        }
    }
?>
