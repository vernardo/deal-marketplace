<?php
	require_once("clases/auth.php");
	require_once("clases/repositorioJSON.php");
	require_once("clases/repositorioSQL.php");

	$tipoRepositorio = "sql";

	switch($tipoRepositorio) {
		case "json":
			$repo = new RepositorioJSON();
			break;
		case "sql":
			$repo = new RepositorioSQL();
			break;
	}

	$auth = Auth::getInstancia($repo->getRepositorioUsuarios());

?>