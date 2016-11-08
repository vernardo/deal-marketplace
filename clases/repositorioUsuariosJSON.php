<?php
	require_once("repositorioUsuarios.php");

	class RepositorioUsuariosJSON extends RepositorioUsuarios {

		public function traerTodosLosUsuarios() {

	        $usuarios = [];

	        //1: Me traigo todo el archivo
	        $archivoUsuarios = file_get_contents("usuarios.json");

	        //2: Lo divido por lineas
	        $usuariosJSON = explode("\n", $archivoUsuarios);

	        //3: Borro la linea vacía del final
	        $cantidadUsuarios = count($usuariosJSON);
	        $elUltimo = $cantidadUsuarios - 1;

	        unset($usuariosJSON[$elUltimo]);

	        //4: Recorro mis lineas y las paso a arrays
	        foreach ($usuariosJSON as $usuarioJSON) {
	        	$usuarioArray = json_decode($usuarioJSON, true);

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

	    public function traerProximoId() {
	        //1: Me traigo todo el archivo
	        $archivoUsuarios = file_get_contents("usuarios.json");

	        //2: Lo divido por lineas
	        $usuariosJSON = explode("\n", $archivoUsuarios);

	        //3: Obtengo indice último usuario
	        $cantidadUsuarios = count($usuariosJSON); // observo que cuenta 1 usuario de más por el break ("\n") al final
	        $elUltimo = $cantidadUsuarios - 2; // este es el índice del último usuario. Ej: si hay 1 usuario, $elUltimo = 0 (su índice en el array); si hay 2 usuarios, $elUltimo = 1 (su índice en el array); etc

	        if ($elUltimo < 0) { // este if se cumple solo si no había ningún usuario (pues $elUltimo = 1 - 2 = -1 < 0)
	            return 1; //
	        }

	        //4: Traigo el último usuario
	        $ultimoUsuario = $usuariosJSON[$elUltimo]; // este es el subarray JSON (ergo, un string para PHP) correspondiente al último usuario

	        $ultimoUsuario = json_decode($ultimoUsuario, true); // lo pasa de formato JSON texto a formato PHP array asociativo

	        return $ultimoUsuario["id"] + 1; // nro de id que se le va a asignar a un eventual nuevo usuario (ie un integer mayor en 1 unidad al correspondiente al 'id' del último usuario ya creado)
	    }

	    public function guardar(Usuario $usuario) {
	    	if ($usuario->getId() == null) {
	    		$usuario->setId($this->traerProximoId());
	    	}

	    	$usuarioJSON = json_encode($usuario->toArray());

	    	file_put_contents("usuarios.json", $usuarioJSON . "\n", FILE_APPEND);
	    }
	}
