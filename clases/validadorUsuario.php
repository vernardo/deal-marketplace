<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorUsuario extends Validador {
		public function validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];
			$borderColor = [];
			//$camposConError = []; --> esto era necesario en JS por no haber arrays asociativos, no en PHP
			
	        if (empty(trim($datos["nombre"]))) {
	            $errores["nombre"] = "Ingresá tu nombre";
	            $borderColor["nombre"] = "red";
	        } elseif (strlen(trim($datos["nombre"])) > 50) {
	        	$errores["nombre"] = "El nombre puede tener hasta 50 caracteres";
	        	$borderColor["nombre"] = "red";
	        } else { 
            	$borderColor["nombre"] = "green";
          	}

          	if (empty(trim($datos["apellido"]))) {
	            $errores["apellido"] = "Ingresá tu apellido";
	            $borderColor["apellido"] = "red";
	        } elseif (strlen(trim($datos["apellido"])) > 50) {
	        	$errores["apellido"] = "El apellido puede tener hasta 50 caracteres";
	        	$borderColor["apellido"] = "red";
	        } else { 
            	$borderColor["apellido"] = "green";
          	}

			/*  if (empty(trim($datos["username"]))) {
	            $errores["username"] = "Por favor ingrese username";
	        }*/

	        if (empty(trim($datos["correo"]))) {
	            $errores["correo"] = "Ingresá tu correo";
	            $borderColor["correo"] = "red";
	        } elseif (strlen(trim($datos["correo"])) > 50) {
	        	$errores["correo"] = "El correo puede tener hasta 50 caracteres";
	        	$borderColor["correo"] = "red";
	        } elseif (!filter_var($datos["correo"], FILTER_VALIDATE_EMAIL)) {
	            $errores["correo"] = "Formato de email inválido";
	            $borderColor["correo"] = "red";
	        } elseif ($repoUsuarios->existeElMail($datos["correo"])) {
	            $errores["correo"] = "El email ya está registrado";
	            $borderColor["correo"] = "red";
	        } else { 
            	$borderColor["correo"] = "green";
          	}

	        if (empty(trim($datos["contrasena"]))) {
	            $errores["contrasena"] = "Ingresá una contraseña";
	            $borderColor["contrasena"] = "red";
	        } elseif (strlen(trim($datos["contrasena"])) < 8 || strlen(trim($datos["contrasena"])) > 20) {
	        	$errores["contrasena"] = "La contraseña debe tener entre 8 y 20 caracteres";
	        	$borderColor["contrasena"] = "red";
	        } else {
	            $borderColor["contrasena"] = "green";
	        }

	        if (empty(trim($datos["contrasenaConfirmar"]))) {
	            $errores["contrasenaConfirmar"] = "Confirmá tu contraseña";
	            $borderColor["contrasenaConfirmar"] = "red";
	        } elseif ($datos["contrasena"] !== $datos["contrasenaConfirmar"]) {
	        	$errores["contrasenaConfirmar"] = "Las contraseñas ingresadas no coinciden";
	        	$borderColor["contrasenaConfirmar"] = "red";
	        } else {
	            $borderColor["contrasenaConfirmar"] = "green";
	        }

	        if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
	            $errores["avatar"] = "Hubo un error al subir la imagen, intentalo de nuevo más tarde";
	        }

	        // $dosArrays = [$errores, $borderColor];
	        // return $dosArrays;
	        return $errores;
		}
	}
