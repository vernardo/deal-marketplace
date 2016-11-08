<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorLogin extends Validador {
		public function Validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];

	        if (empty(trim($datos["correo"]))) {
	            $errores["correo"] = "Por favor ingrese mail";
	        }
	        if (empty(trim($datos["contrasena"]))) {
	            $errores["contrasena"] = "Por favor ingrese password";
	        }
	        if (!$repoUsuarios->existeElMail($datos["correo"])) {
	            $errores["correo"] = "El usuario no existe";
	        }
	        else {
	            $usuario = $repoUsuarios->traerUsuarioPorEmail($datos["correo"]);

	            if (!password_verify($datos["contrasena"], $usuario->getContrasena())) {
	                $errores["contrasena"] ="La contraseña es incorrecta";
	            }
	        }

	        return $errores;
		}
	}
