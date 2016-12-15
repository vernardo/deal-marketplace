@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script src="js/script.js"></script>
@endsection

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      Preguntas frecuentes
    </div>
    <div class="panel-body">

        <div class="faq_preguntas">
				<h2 id="preg_1">
					<span class="ion-android-arrow-dropright" id="flechaDerecha_1"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_1"></span>
					Garantía</h2>
					<p id="rta_1">Garantizamos a nuestros clientes el despacho de productos en perfecto estado, comprometiéndonos  a reintegrarle el dinero o a realizar un cambio, corriendo el flete por nuestra cuenta, en caso de no cumplirse lo primero.</p>
		        <h2 id="preg_2">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_2"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_2"></span>
					En qué moneda es el pago?</h2>
		        	<p id="rta_2"> Todos los pagos son en pesos argentinos.</p>
		        <h2 id="preg_3">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_3"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_3"></span>
					Cuáles son los costo de envío?</h2>
		        	<p id="rta_3">Si tu compra excede los $3000 (tres mil pesos) y te encontrás dentro de la Ciudad Autónoma de Buenos Aires, el envío es gratis. En caso contrario, pedir una cotización antes de realizar la compra.</p>
		        <h2 id="preg_4">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_4"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_4"></span>
					Cuándo recibo mi orden?</h2>
		        	<p id="rta_4">Si bien el tiempo de entrega depende de su ubicación geográfica, lo habitual es recibir su orden dentro de las 72hs hábiles, por envío normal. Este plazo puede extenderse en caso de conflictos gremiales en el servicio de correo.</p>
		        <h2 id="preg_5">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_5"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_5"></span>
					Cómo se manejan la devoluciones?</h2>
		        	<p id="rta_5">Son elegibles para devolución productos cerrados en su empaquetado original o productos que hayan venido con fallas de fabricación. En ambos casos se reintegra el 100% del importe abonado o se cambia por un producto igual, lo que elija el comprador.</p>
		        <h2 id="preg_6">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_6"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_6"></span>
					Cómo puedo rastrear mi envío?</h2>
		        	<p id="rta_6">Podés rastrear tu envío desde 'Dónde están mis productos', previo ingreso a tu cuenta.</p>
		        <h2 id="preg_7">
		        	<span class="ion-android-arrow-dropright" id="flechaDerecha_7"></span>
					<span class="ion-android-arrow-dropdown" id="flechaAbajo_7"></span>
					Cómo me contacto con DalmiBooks?</h2>
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

    </div>
  </div>
@endsection
