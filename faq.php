<?php
	require_once("soporte.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<script src="js/script.js"></script>
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

			<?php if ($auth->estaLogueado()) { ?>
			<div id="boton_logout">
				<a href="logout.php"><span class="ion-power"></span></a>
			</div>
			<?php } ?>

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

		<!-- faq -->
		<section class="faq">
			
			<div class="faq_titulo">
				<h1>Preguntas frecuentes (FAQ)</h1>
			</div>

			<div class="faq_preguntas">
				<h2 id="preg_1">
					<span class="ion-android-arrow-dropright" id="flechaDerecha_1"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_1"></span>
					Qué es la satisfacción garantizada?</h2>
					<p id="rta_1">Satisfacción Garantizada es un servicio exclusivo para nuestros clientes, que permite realizar un cambio de producto o una devolución, dentro de los 90 días siguientes de recibir la mercancía, reintegrándole el monto total del pedido (menos gastos de flete).</p>
		        <h2 id="preg_2">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_2"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_2"></span>
					En qué moneda es el pago?</h2>
		        	<p id="rta_2"> La moneda en la que vas a realizar el pago viene determinada por el método de pago y, en algunos casos, por el país. No se puede seleccionar de forma manual.
					La moneda en la que te cobraremos aparecerá claramente indicada antes de realizar la compra, tras seleccionar tu país y un método de pago en la página de confirmación.</p>
		        <h2 id="preg_3">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_3"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_3"></span>
					En qué casos el envío es gratis?</h2>
		        	<p id="rta_3">Si tu compra excede los $3000 y te encontrás dentro de la Ciudad Autónoma de Buenos Aires, el envío es gratis.</p>
		        <h2 id="preg_4">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_4"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_4"></span>
					Cuándo recibo mi orden?</h2>
		        	<p id="rta_4">Dentro de las 72hs hábiles por envío normal. Este plazo puede extenderse en caso de conflictos gremiales en el servicio de correo.</p>
		        <h2 id="preg_5">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_5"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_5"></span>
					Cómo se manejan la devoluciones?</h2>
		        	<p id="rta_5">Son elegibles para devolución productos cerrados en su empaquetado original o productos que hayan venido con fallas de fabricación. En ambos casos se reintegra el 100% del importe abonado o se cambia por un producto igual, lo que elija el comprador.</p>
		        <h2 id="preg_6">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_6"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_6"></span>
					Cómo puedo rastrear mi envío?</h2>
		        	<p id="rta_6">Podés rastrear tu envío desde 'Dónde están mis productos' yendo a la sección 'Mi Cuenta'.</p>
		        <h2 id="preg_7">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_7"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_7"></span>
					Cómo me contacto con DEAL?</h2>
		        	<p id="rta_7">Desde la sección de 'Contacto'. Tenemos representantes trabajando las 24hs los 365 días del año, con lo cual te responderemos muy pronto.</p>
		        <h2 id="preg_8">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_8"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_8"></span>
					Tengo un problema accediendo a mi cuenta</h2>
		        	<p id="rta_8">Podés escribirnos desde 'Contacto' y te ayudaremos a resolver tu problema.</p>
		        <h2 id="preg_9">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_9"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_9"></span>
					Falló tu pago?</h2>
		        	<p id="rta_9">Podés escribirnos desde 'Contacto' y te ayudaremos a resolver tu problema.</p>
			</div>

		</section>

		<footer class="main-footer">
			<ul>
				<li>
					<a href="#">
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
