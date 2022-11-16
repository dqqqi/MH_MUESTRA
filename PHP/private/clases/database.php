<?php
	/* Clase principal encargada de la conexión con la base de datos.
	   Cualquier otra clase que requira comunicarse con la base de
	   datos debe heredar esta clase */
	
	namespace BDD;
	use PDO;
	use PDOException;

	class Database{
		public $BDDCon; //Conexion PDO a la base de datos

		function __construct(){
			$this->newConnection();
		}

		// Realiza una nueva connexión
		protected function newConnection(){
			include_once '../../Config/BDD_config.php'; //Busca archivo en carpeta /Config
			$conn = "mysql:dbname=".BDDNombre.";host=".BDDServer;
			try{
				$this->BDDCon = new PDO($conn, BDDUser, BDDPass, 
					array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8") //Realiza conexión con la base de datos
				);
				$this->BDDCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e){
				$this->BDDCon = $e;
			}
		}

		//Cierra la conexión
		public function closeConection(){
			$this->BDDCon = null;
		}
	}
?>