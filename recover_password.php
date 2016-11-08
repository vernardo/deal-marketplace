<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<script src="js/script.js"></script>
		<title>Responsive Web Design</title>
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

		<section id="recover_form">
			<h2>Recuperar contraseña</h2>

			<!-- <div><ul id="errores"></ul></div> -->
			
			<form method="post" action="" id="form_recover">
				<input type="email" name="correo" id="correo" placeholder="Email" required>
				<button type="button" form="form_recover" name="recuperar" id="recuperar">Recuperar</button>
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
