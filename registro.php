<?php
    require_once("soporte.php");
    require_once("clases/validadorUsuario.php");

    $repoUsuarios = $repo->getRepositorioUsuarios();

    if ($auth->estaLogueado()) {
        header("Location:inicio.php");exit;
    }

    $dosArrays = [];
    $errores = [];
    $borderColor = [];
    $nombreDefault = "";
    $apellidoDefault = "";
    $telefonoDefault = "";
    $domicilioDefault = "";
    $correoDefault = "";
    $userDefault = "";

    if (!empty($_POST)) {
        $validador = new ValidadorUsuario();
        //Se envió información

        // $errores = $dosArrays[0];
        // $borderColor = $dosArrays[1];

        $errores = $validador->validar($_POST, $repo);

        if (empty($errores)) {
            //No hay Errores

            //Primero: Lo registro
            $usuario = new Usuario(
                null,
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["telefono"],
                $_POST["domicilio"],
                $_POST["correo"],
                $_POST["contrasena"]
            );

            $usuario->setContrasena($_POST["contrasena"]);
            $usuario->guardar($repoUsuarios);
            $usuario->setAvatar($_FILES["avatar"]);

            //Segundo: Lo envio al exito
            header("Location:login.php?r=si");exit;
            //exit("TE REGISTRASTE EXITOSAMENTE");
        }

        if (!isset($errores["nombre"])) {
            $nombreDefault = $_POST["nombre"];
        }
        if (!isset($errores["apellido"])) {
            $apellidoDefault = $_POST["apellido"];
        }
        if (!isset($errores["telefono"])) {
            $telefonoDefault = $_POST["telefono"];
        }
        if (!isset($errores["domicilio"])) {
            $domicilioDefault = $_POST["domicilio"];
        }
        if (!isset($errores["correo"])) {
            $correoDefault = $_POST["correo"];
        }
        if (!isset($errores["correo"])) {
            $userDefault = $_POST["username"];
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!--<script src="js/script.js"></script>-->
		<title>Deal!</title>
	</head>
	<body>

	<div class="container">

		<!-- cabecera -->
		<header class="main-header">
			
			<a href="index.php" id="logo_link">
				<img src="img/logo1.png" alt="logotipo" class="logo">
			</a>

			<div id="responsive_search">
				<form id="responsive_search_form">
					<select name="search_categoria" id="search_categoria">
			          <!-- option[value="$$"]{$$}*31 -->
			          <option value="todo">Todo</option>
			          <option value="electronica">Electrónica</option>
			          <option value="indumentaria">Indumentaria</option>
			          <option value="libros">Libros</option>
	        		</select>
					<input type="text" id="search_box" autofocus placeholder="¿Qué buscás?">
					<button type="button" name="search_button" id="search_button"><span class="ion-search"></span></button>
				</form>
			</div>

			<div id="carrito">
				<a href="#"><span class="ion-ios-cart-outline"></span></a>
			</div>

			<div id="tipito_login">
				<a href="login.php"><span class="ion-ios-person-outline"></span></a>
			</div>

			<!-- <div class="mi_cuenta"></div> -->

			<a href="#" class="toggle-nav" id="botonDesplegador">
				<span class="ion-navicon-round"></span>
			</a>

			<nav class="main-nav" id="main-nav">
				<ul>
					<li><a href="index.php">home</a></li>
					<li><a href="#">nosotros</a></li>
					<li><a href="login.php">mi cuenta</a></li>
					<li><a href="#">ofertas</a></li>
					<li><a href="faq.php">ayuda/faq</a></li>
					<li><a href="contact.php">contacto</a></li>
				</ul>
			</nav>			

		</header>

		<!-- banner -->
		<section class="banner">
			<img src="img/bookshelf.jpg" alt="banner">
		</section>

		<section id="signup_form">
			<h2>Registrate</h2>

			<!-- <div><p id="msjExito"></p></div> -->

			<form method="post" action="" id="form_registro" novalidate enctype="multipart/form-data">

				<input type='hidden' name='submitted' id='submitted' value='1'/> <!-- QUE HACE ESTO?????????? -->

				<?= isset($errores)."<br>"; ?>
				<?= "<pre>".var_dump($errores)."</pre>" ?>

				<?php if (isset($errores["nombre"])) { ?><p class="errores"><?= $errores["nombre"]; ?> </p> <?php } ?>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= $nombreDefault; ?>" style="border-color: <?= $borderColor["nombre"]; ?>" required>

				<?php if (isset($errores["apellido"])) { ?><p class="errores"><?= $errores["apellido"]; ?> </p> <?php } ?>
				<input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?= $apellidoDefault; ?>" style="border-color: <?= $borderColor['apellido']; ?>" required>

				<input type="tel" name="telefono" id="telefono" placeholder="Teléfono (opcional)" value="<?= $telefonoDefault; ?>">

				<input type="text" name="domicilio" id="domicilio" placeholder="Domicilio (opcional)" value="<?= $domicilioDefault; ?>">

				<?php if (isset($errores["correo"])) { ?><p class="errores"><?= $errores["correo"]; ?> </p> <?php } ?>
				<input type="email" name="correo" id="correo" placeholder="Correo @" value="<?= $correoDefault; ?>" style="border-color: <?= $borderColor['correo']; ?>" required>

				<?php if (isset($errores["contrasena"])) { ?><p class="errores"><?= $errores["contrasena"]; ?> </p> <?php } ?>
				<input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" style="border-color: <?= $borderColor['contrasena']; ?>" required>
				
				<?php if (isset($errores["contrasenaConfirmar"])) { ?><p class="errores"><?= $errores["contrasenaConfirmar"]; ?> </p> <?php } ?>
				<input type="password" name="contrasenaConfirmar" id="contrasenaConfirmar" placeholder="Confirmar contraseña" style="border-color: <?= $borderColor['contrasenaConfirmar']; ?>" required>
				
				<?php if (isset($errores["avatar"])) { ?><p class="errores"><?= $errores["avatar"]; ?> </p> <?php } ?>
				<!--<label for="avatar">Imagen de perfil</label>-->
                <input type="file" name="avatar" id="avatar"/>
                
				<button type="submit" form="form_registro" name="registrar" id="registrar">Registrarme</button>
			</form>
		</section>

		<footer class="main-footer">
			<ul>
				<li>
					<a href="index.php">
						<span class="ion-ios-home-outline"></span>
					</a>
				</li>
				<li>
					<a href="login.php">
						<span class="ion-ios-person-outline"></span>
					</a>
				</li>
				<li class="desktop_icon">
					<a href="#">
						<span class="ion-android-desktop"></span>
					</a>
				</li>
				<li class="smartphone_icon">
					<a href="#">
						<span class="ion-iphone"></span>
					</a>
				</li>
				<li>
					<a href="faq.php">
						<span class="ion-ios-help-outline"></span>
					</a>
				</li>
				<li>
					<a href="contact.php">
						<span class="ion-ios-email-outline"></span>
					</a>
				</li>
			</ul>

			<p>© 2016 - DEAL!</p>

		</footer>
	</div>

	</body>
</html>
