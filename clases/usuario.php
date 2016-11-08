<?php
	require_once("repositorioUsuarios.php");

	class Usuario {
		private $id;
		private $nombre;
		private $apellido;
		private $telefono;
		private $domicilio;
		private $correo;
		// private $username;
		private $contrasena;
		// private $pais;
		private $avatar;

		public function __construct($id, $nombre, $apellido, $telefono, $domicilio, $correo, /*$username,*/ $contrasena) {
			$this->id = $id;
			$this->nombre =$nombre;
			$this->apellido =$apellido;
			$this->telefono =$telefono;
			$this->domicilio =$domicilio;
			$this->correo = $correo;
			//$this->username = $username;
			$this->contrasena = $contrasena;
		}

		public function getId()	{
			return $this->id;
		}
		public function getNombre()	{
			return $this->nombre;
		}
		public function getApellido()	{
			return $this->apellido;
		}
		public function getTelefono()	{
			return $this->telefono;
		}
		public function getDomicilio()	{
			return $this->domicilio;
		}
		public function getCorreo() {
			return $this->correo;
		}
		// public function getUsername() {
		// 	return $this->username;
		// }
		public function getContrasena() {
			return $this->contrasena;
		}
		public function getAvatar()	{
			$name = "img/" . $this->getId();
			$matching = glob($name . ".*");

			$info = pathinfo($matching[0]);
			$ext = $info['extension'];

			return $name . "." . $ext;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}
		public function setApellido($apellido) {
			$this->apellido = $apellido;
		}
		public function setTelefono($telefono) {
			$this->telefono = $telefono;
		}
		public function setDomicilio($domicilio) {
			$this->domicilio = $domicilio;
		}
		// public function setUsername($username) {
		// 	$this->username = $username;
		// }
		public function setCorreo($correo) {
			$this->correo = $correo;
		}
		// public function setPais($pais) {
		// 	$this->pais = $pais;
		// }
		public function setContrasena($contrasena) {
			$this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
		}
		public function setAvatar($avatar) {
			if ($avatar["error"] == UPLOAD_ERR_OK) {

				$path = "img/";

				if (!is_dir($path)) {
					mkdir($path, 0777);
				}

				$ext = pathinfo($avatar["name"], PATHINFO_EXTENSION);

				move_uploaded_file($avatar["tmp_name"], $path . $this->getId() . "." . $ext);
			}
		}

		public function guardar(RepositorioUsuarios $repo) {
			$repo->guardar($this);
		}

		public function toArray() {
			return [
				"id" => $this->getId(),
				"nombre" => $this->getNombre(),
				"apellido" => $this->getApellido(),
				"telefono" => $this->getTelefono(),
				"domicilio" => $this->getDomicilio(),
				"correo" => $this->getCorreo(),
				"contrasena" => $this->getContrasena(),
				// "username" => $this->getUsername()
			];

		}
	}
