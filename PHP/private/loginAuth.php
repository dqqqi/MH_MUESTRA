<?php
	// Verifica los datos mandados por el formulario de login
	include_once 'clases/usersDB.php';
	include_once 'clases/session.php';

	use BDD\Tables\users;
	use userSession\Session;

	$email = $_POST['email'];
	$pass = $_POST['password'];

	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	$db = new users();
	$query = $db->getUserEmail($email);
	
	if ($query->rowCount()){
		$res = $query->fetch(PDO::FETCH_ASSOC);
		$db->closeConection();

		if(password_verify($pass, $res['Password'])){
			$rol = $res['Rol'];
			$userId = $res['ID'];
			$prov = $res['Proveedor'];
			$userSession = new Session();
			$userSession->login($email, $rol, $userId, $prov);
			echo(1);
		}
		else{
			echo ("Contraseña incorrecta");
		}
	} else{
		echo("No existe ese usuario");
	}
	
?>
