<?php /*
	require_once("repositorio.php");
	require_once("repositorioUsuariosSQL.php");

	class RepositorioSQL extends Repositorio {

		private $conn;

		public function __construct() {
			$dsn = 'mysql:host=localhost;dbname=registro;charset=utf8mb4';

			$user = "root";
			$pass = "";

			$this->conn = new PDO($dsn, $user, $pass);

			$this->repositorioUsuarios = new RepositorioUsuariosSQL($this->conn);
		}

	}

*/?>

<?php
	require_once("repositorio.php");
	require_once("repositorioUsuariosSQL.php");

	class RepositorioSQL extends Repositorio {

		private $conn;

		public function __construct() {
			
			$dsn = 'mysql:host=localhost;dbname=registro;charset=utf8mb4';
			$user = "myUser";
			$pass = "myPassword";

			/*try {

				$this->conn = new PDO($dsn, $user, $pass);

				$this->repositorioUsuarios = new RepositorioUsuariosSQL($this->conn);
			
			} catch (Exception $e) {

				if ($e->getMessage() = "SQLSTATE[HY000] [1049] Unknown database 'registro'") {

					$this->conn = new PDO('mysql:host=localhost', $user, $pass);

        			$this->conn->execute("CREATE DATABASE registro;*/
                						/*CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
                						GRANT ALL ON `$db`.* TO '$user'@'localhost';
                						FLUSH PRIVILEGES;")*//*
										CREATE TABLE usuarios (
											id 			INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
											nombre		VARCHAR(50) NOT NULL,
											apellido	VARCHAR(50) NOT NULL,
											telefono	INT(50) NULL,
											domicilio	INT(100) NULL,
											correo		VARCHAR(50) NOT NULL,
											contrasena	VARCHAR(20) NOT NULL
										);");

        								/*INSERT INTO usuarios(id,nombre,apellido,telefono,domicilio,correo,contrasena) values (default,:nombre,:apellido,:telefono,:domicilio,:correo,:contrasena);*/

        			/*$this->conn = new PDO($dsn, $user, $pass);

					$this->repositorioUsuarios = new RepositorioUsuariosSQL($this->conn);
				}

			}*/
			$conn_ForCheckingDbExistence = new PDO('mysql:host=localhost', $user, $pass); // instanciamos un objeto PDO sin conectar a un db SQL específica
			$conn_ForCheckingDbExistence->query("CREATE DATABASE IF NOT EXISTS registro;
												USE registro; 
												CREATE TABLE usuarios (
													id 			INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
													nombre		VARCHAR(50) NOT NULL,
													apellido	VARCHAR(50) NOT NULL,
													telefono	INT(50) NULL,
													domicilio	VARCHAR(100) NULL,
													correo		VARCHAR(50) NOT NULL,
													contrasena	VARCHAR(100) NOT NULL);"); // creamos la db y tabla sql en caso de que no lo esté
			 // Llnenamos la db sql llenamos con los usuarios de la db json:
			$usuariosJSON = file("usuarios.json"); // hacer file() me evita tener que hacer file_get_contents() y luego explode(); además no crea 1 usuario de más por el break ("\n") al final del .json
			foreach ($usuariosJSON as $usuarioString) { // Realizo las siguientes 2 operaciones sobre cada "usuario json":
				$usuarioArray = json_decode($usuarioString, true); // (1) lo convierto en un "usuario array asociativo"
				
				$query_llenarDbSql = $conn_ForCheckingDbExistence->prepare("INSERT INTO usuarios(id,nombre,apellido,telefono,domicilio,correo,contrasena) values (default,:nombre,:apellido,:telefono,:domicilio,:correo,:contrasena)"); // (2) creo un usuario en la db sql por c/u de estos arrays asociativos
				
				$query_llenarDbSql->bindValue(":nombre", $usuarioArray['nombre'], PDO::PARAM_STR); // hago los respectivos bindings
	    		$query_llenarDbSql->bindValue(":apellido", $usuarioArray['apellido'], PDO::PARAM_STR);
	    		$query_llenarDbSql->bindValue(":telefono", $usuarioArray['telefono'], PDO::PARAM_STR);
	    		$query_llenarDbSql->bindValue(":domicilio", $usuarioArray['domicilio'], PDO::PARAM_STR);
	    		$query_llenarDbSql->bindValue(":correo", $usuarioArray['correo'], PDO::PARAM_STR);
	    	   	$query_llenarDbSql->bindValue(":contrasena", $usuarioArray['contrasena'], PDO::PARAM_STR);

	    	   	$query_llenarDbSql->execute(); // ejecuto la operación

			}

			$conn_ForCheckingDbExistence = null; // cerramos esta conexión "accesoria"

			$this->conn = new PDO($dsn, $user, $pass); // abrimos la conexión a la db

			$this->repositorioUsuarios = new RepositorioUsuariosSQL($this->conn);
			
			
		}
	}
?>