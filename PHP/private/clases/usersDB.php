<?php
	/* Clase encargada de manipular la tabla de usuarios en la base de datos */
	namespace BDD\Tables;

	include_once 'database.php';

	use BDD\Database;
	
	class users extends Database
	{
		//Crea un nuevo usuario en la base de datos
		function newUser($email, $pass, $rol){
			$sql = "INSERT INTO usuarios (email, password, rol) VALUES (:email, :pass, :rol)";

			$stmt =$this->BDDCon->prepare($sql);
			$stmt->execute(array(':email' => $email, ':pass' => $pass, ':rol' => $rol));

			return $stmt;
		}

		//Devuelve datos del usuario especificado por el email
		function getUserEmail($email){ 
			$sql = "SELECT usuarios.*, proveedores.Name AS Proveedor
			 		FROM usuarios LEFT JOIN proveedores ON usuarios.Provider = proveedores.ID
					WHERE email=:email";
			
			$stmt =$this->BDDCon->prepare($sql);
			$stmt->execute(array(':email' => $email));

			return $stmt;
		}
	}

?>