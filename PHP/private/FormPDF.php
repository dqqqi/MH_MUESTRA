<?php
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	
	/* Se encarga de subir archivo PDF como formulario */
	include 'clases/formsDB.php';
	include 'clases/files.php';
	include 'clases/session.php';

	use BDD\Tables\Form;
	use fileSystem\Files;
	use userSession\Session;

	$conn = new Form();
	$fs = new Files();
	$session = new Session();
 
	$file = $_FILES["PDF"];
	$adjuntos = $_FILES["adjuntos"];
	$ID = $session->userId;
	$fecha = date('Y-m-d H:i:s');
		
	$formID = $conn->getLastID() + 1;
	$res = '';

	$datos = array($ID, $fecha);
	$adjNames = '';

	if ($file['name'] != ''){ //Se subio el formulario
		if($adjuntos['name'][0] != ''){ //Se subio archivos adjuntos
			foreach ($adjuntos['name'] as $name) {
				$adjNames .= $name.' ';
			}
			substr($adjNames, -1);
            array_push($datos, $adjNames);

			if($fs->checkFiles($adjuntos)){
				$res = uploadAll($file, $adjuntos, $datos);
			}else{
				echo "Archvios adjuntos demasiado grandes/Estan vacios.\n"; 
				echo "Deben ser menos de 180MB y mas grandes que 0KB";
			}
		}else{
			array_push($datos, $adjNames);
			$res = sendForm($file, $datos);
		}
		echo $res;
	}else{
		echo "No se subio ningun archivo";
	}
	
	
	function uploadAll($file, $adjuntos, $datos){
		$res = sendForm($file, $datos);
		if ($res == 1) {
			if(!uploadAdj($adjuntos)){
				return "No se pudo subir archivos adjuntos (Formulario enviado)";
			}
		}
		return $res;
	}

	function uploadAdj($adjuntos){
		$adjRes = $GLOBALS['fs']->uploadToFolder('form'.$GLOBALS['formID'].'/Adjuntos', $adjuntos);
			if($adjRes){
				return 1;
			}else{
				return $adjRes;
			}
	}
	
	function sendForm($file, $datos){
		if($file['type'] == 'application/pdf'){
			if(!$GLOBALS['fs']->checkFiles($file)){
				return "Formulario demasiado grande/Esta vacio.\n Debe ser menos de 5MB y mas grande que 0KB";
			}
			if($GLOBALS['fs']->uploadToFolder('form'.$GLOBALS['formID'], $file)){//Mueve el archivo a una carpeta
				$res = $GLOBALS['conn']->uploadPDF($datos); //Sube archivo a la base de datos
				if ($res->rowCount() != 0){
					return 1;
				}else{
					return 'Error subiendo formulario';
				}
			}else{
				return 'Error subiendo formulario';
			}	
		}else{
			return 'Formulario no es un pdf';
		}
	}
?>
