<?php
	require_once("repositorioUsuarios.php");

	class RepositorioUsuariosSQL extends RepositorioUsuarios {

		private $conn;

		public function __construct(PDO $conn) {
			$this->conn = $conn;
		}

		public function traerTodosLosUsuarios() {

			$usuarios = [];

			//1: Defino la consulta SQL que voy a ejecutar luego
			$sql = "SELECT * FROM usuarios";

			$query = $this->conn->prepare($sql);
			$query->execute();

			$usuariosArrays = $query->fetchAll(PDO::FETCH_ASSOC);

	        foreach ($usuariosArrays as $usuarioArray) {

	        	$usuario = new Usuario(
	        		$usuarioArray["id"],
	        		$usuarioArray["nombre"],
	        		$usuarioArray["apellido"],
	        		$usuarioArray["telefono"],
	        		$usuarioArray["domicilio"],
	        		$usuarioArray["correo"],
	        		//$usuarioArray["username"],
	        		$usuarioArray["contrasena"]
	        		//$usuarioArray["pais"]
	        	);

	            $usuarios[] = $usuario;
	        }

	        return $usuarios;
	    }


	    public function guardar(Usuario $usuario) {
	    	if ($usuario->getId() == null) {
	    		$sql = "INSERT INTO usuarios(id,nombre,apellido,telefono,domicilio,correo,contrasena) values (default,:nombre,:apellido,:telefono,:domicilio,:correo,:contrasena)";
	    	}
		

	    	$query = $this->conn->prepare($sql);

	    	$query->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
	    	$query->bindValue(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
	    	$query->bindValue(":telefono", $usuario->getTelefono(), PDO::PARAM_STR);
	    	$query->bindValue(":domicilio", $usuario->getDomicilio(), PDO::PARAM_STR);
	    	$query->bindValue(":correo", $usuario->getCorreo(), PDO::PARAM_STR);
	    	//$query->bindValue(":username", $usuario->getUsername(), PDO::PARAM_STR);
	    	$query->bindValue(":contrasena", $usuario->getContrasena(), PDO::PARAM_STR);
	    	//$query->bindValue(":pais", $usuario->getPais(), PDO::PARAM_STR);

	    	if ($usuario->getId() != null) { // si al momento de obtener el id del usuario el mismo no fue null
	    		$query->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
	    	}

	    	$query->execute();

	    	if ($usuario->getId() == null) {
	    		$usuario->setId($this->conn->lastInsertId());
	    	}

	    }

	    public function traerUsuarioPorEmail($correo) {
	        $sql = "SELECT * FROM usuarios WHERE correo = :correo";

	        $query = $this->conn->prepare($sql);

	        $query->bindValue(":correo", $correo, PDO::PARAM_STR);

	        $query->execute();

	        $usuarioArray = $query->fetch();

	        if ($usuarioArray) {
	        	$usuario = new Usuario(
	        		$usuarioArray["id"],
	        		$usuarioArray["nombre"],
	        		$usuarioArray["apellido"],
	        		$usuarioArray["telefono"],
	        		$usuarioArray["domicilio"],
	        		$usuarioArray["correo"],
	        		//$usuarioArray["username"],
	        		$usuarioArray["contrasena"]
	        		//$usuarioArray["pais"]
	        	);
	        	return $usuario;
	        }

	        return false;
	    }
	}
