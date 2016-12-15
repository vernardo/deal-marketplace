window.onload = function() {
  // DESPLEGADORES DE RESPUESTAS EN EL FAQ *********************************************
      var pregsFaq = document.querySelectorAll('.faq_preguntas h2');
      var rtasFaq = document.querySelectorAll('.faq_preguntas p');

      for(var preg in pregsFaq) {
        pregsFaq[preg].onclick = desplegarRespuesta;
      }

      function desplegarRespuesta() {

          var idPreg = this.id;
          // var nro = idPreg.split('_')[1];
          var trozos = idPreg.split('_');
          var nro = trozos[1];
          var rta = document.getElementById('rta_' + nro);
          var flechaDerecha = document.getElementById('flechaDerecha_' + nro);
          var flechaAbajo = document.getElementById('flechaAbajo_' + nro);

          switch(rta.style.display) {
              case 'none':
              case '':
                  rta.style.display = 'block';
                  flechaAbajo.style.display = 'inline';
                  flechaDerecha.style.display = 'none';
                  break;
              case 'block':
                  rta.style.display = 'none';
                  flechaAbajo.style.display = 'none';
                  flechaDerecha.style.display = 'inline';
                  break;
          }
      }

// DESPLEGADOR DEL FORM DE NUEVO PRODUCTO *********************************************
  if (document.getElementById('crearProducto') !== null) {

    var formCreateProduct = document.getElementById('new_product_form');
    var divCreateProduct = document.getElementById('new_product_div');

    function desplegarFormNewProduct() {

      var flechaDerecha = document.getElementById('flechaDerecha');
      var flechaAbajo = document.getElementById('flechaAbajo');

      switch(formCreateProduct.style.display) {
            case 'none':
            case '':
                formCreateProduct.style.display = 'block';
                flechaAbajo.style.display = 'inline';
                flechaDerecha.style.display = 'none';
                break;
            case 'block':
                formCreateProduct.style.display = 'none';
                flechaAbajo.style.display = 'none';
                flechaDerecha.style.display = 'inline';
                break;
      }
    }

    divCreateProduct.onclick = desplegarFormNewProduct;

  }

    // Validación del formulario de REGISTRO ************************************************

          if (document.getElementById('registrar') !== null) { // si el botón de registro está en la pág, lo que indicaría que estoy en la pág de registro

            //Guardo el botón de registro en una variable
            var btnRegistrar = document.getElementById('registrar');

            // Le quito la funcionalidad con la que viene por defecto (si es que la tiene)
            //this.preventDefault();

            //Evento registrar cuando se hace click en el botón: llama a la función de validación del form de registro
            btnRegistrar.addEventListener('click', validarRegistro);  // --> ojo que da error si en el 2do param escribo "validarRegistro()"

            // Definición de la función que valida el registro
            function validarRegistro() {
              // document.getElementById('errores').innerHTML = ""; // vacía los errores
              while ( document.querySelector('.errores') ) { document.querySelector('.errores').parentNode.removeChild(document.querySelector('.errores')); } // elimina nodos de errores creados en anterior evento 'onClick' (si es que los hay)
              if ( document.querySelector('.exito') ) { document.querySelector('.exito').parentNode.removeChild(document.querySelector('.exito')); } // elimina el nodo de éxito creado en anterior evento 'onClick' (si es que lo hay)
              var nombre = document.getElementsByName('name')[0].value.trim(); // guardo el valor de nombre ingresado
              var apellido = document.getElementsByName('lastName')[0].value.trim(); // guardo el valor de apellido ingresado
              var telefono = document.getElementsByName('phone')[0].value.trim(); // guardo el valor de teléfono ingresado
              var correo = document.getElementsByName('email')[0].value.trim(); // guardo el valor de correo ingresado
              var contrasena = document.getElementsByName('password')[0].value.trim(); // guardo el valor de contraseña ingresado
              var contrasenaConfirmar = document.getElementsByName('password_confirmation')[0].value.trim(); // guardo el valor de contraseña ingresado

              // var datosRegistro = ['nombre', 'apellido', 'telefono', 'domicilio', 'correo', 'contrasena'];
              // for(dato in datosRegistro) {
              //   var dato = document.getElementsByName(dato)[0].value;
              //   alert(dato);
              // }

              var errores = []; // creo un array vacío de errores, donde guardar los msjs de error
              var camposConError = []; // creo otro array vacío, donde guardar los nombres de los campos con error (pero no los msjs per se)
              var camposBienLlenados = [];
              var regExEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // expresión regular de email

              if(nombre == "") { // si el nombre es vacío
                camposConError.push('nombre'); // entonces (1) agrega el nombre de dicho campo al array 'camposConError'
                errores.push('Ingresá tu nombre'); // y (2) pone un texto de error en una posición del array 'errores'
              } else if(nombre.length > 255) {
                camposConError.push('nombre');
                errores.push('El nombre puede tener hasta 255 caracteres');
              } else {
                camposBienLlenados.push('nombre');
              }

              if(apellido == "") { // si el apellido es vacío
                camposConError.push('apellido');
                errores.push('Ingresá tu apellido');
              } else if(apellido.length > 255) {
                camposConError.push('apellido');
                errores.push('El apellido puede tener hasta 255 caracteres');
              } else {
                camposBienLlenados.push('apellido');
              }

              if(telefono == "") { // si el apellido es vacío
                camposConError.push('telefono');
                errores.push('Ingresá tu teléfono');
              } else if(apellido.length > 255) {
                camposConError.push('telefono');
                errores.push('El teléfono puede tener hasta 255 caracteres');
              } else {
                camposBienLlenados.push('telefono');
              }

              if(correo == "") { // si el correo es vacío
                camposConError.push('correo');
                errores.push('Ingresá tu correo'); // entonces lo pongo en el array de errores
              } else if(correo.length > 255) {
                camposConError.push('correo');
                errores.push('El correo puede tener hasta 255 caracteres');
              } else if(!regExEmail.test(correo)) { // Y si no es vacío pero no tiene expresión de email válida
                camposConError.push('correo');
                errores.push('Formato de email inválido'); // entonces guardo dicho error en el array de errores
              } else {
                camposBienLlenados.push('correo');
              }

              if(contrasena == "") { // si la contraseña es vacía
                camposConError.push('contrasena');
                errores.push('Ingresá tu contraseña');  // entonces lo pongo en el array de errores
              } else if(contrasena.length < 6) {
                camposConError.push('contrasena');
                errores.push('La contraseña debe tener al menos 6 caracteres');
              } else {
                camposBienLlenados.push('contrasena');
              }

              if(contrasenaConfirmar == "") { // si la contraseña es vacía
                camposConError.push('contrasenaConfirmar');
                errores.push('Confirmá tu contraseña');  // entonces lo pongo en el array de errores
              } else if(contrasena !== contrasenaConfirmar) {
                errores.push('Las contraseñas ingresadas no coinciden');
                camposConError.push('contrasenaConfirmar');
              } else {
                camposBienLlenados.push('contrasenaConfirmar');
              }

              if(errores[0] === undefined) { // si no hay errores, i.e. si al array declarado 'errores' no le asignamos elementos
                camposBienLlenados.forEach(function(campo) {
                  document.getElementsByName(campo)[0].style.borderColor = 'green';
                });

                var exitoDisplayMsg = document.createElement('p');
                exitoDisplayMsg.className = 'exito';
                exitoDisplayMsg.innerHTML = 'Te registraste correctamente. En breve recibirás un mail de confirmación';
                document.getElementById(camposBienLlenados[0]).parentNode.insertBefore(exitoDisplayMsg, document.getElementById(camposBienLlenados[0])); // --> proceder a la validación por PHP

              } else { // si hay errores en el formulario de registro
                errores.forEach(function(error, indice, arreglo) {
                  var errorDisplayMsg = document.createElement('p');
                  errorDisplayMsg.className = 'errores';
                  errorDisplayMsg.innerHTML = error;
                  document.getElementById(camposConError[indice]).parentNode.insertBefore(errorDisplayMsg, document.getElementById(camposConError[indice]));
                });
                camposConError.forEach(function(campo) {
                  document.getElementsByName(campo)[0].style.borderColor = 'red';
                });

                camposBienLlenados.forEach(function(campo) {
                  document.getElementsByName(campo)[0].style.borderColor = 'green';
                });

              }
            }
          }

}
