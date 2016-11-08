window.onload = function() {

  // DESPLEGADOR DEL MENÚ DE OPCIONES **************************************************
    	var menuDesplegable = document.getElementById('main-nav');
    	var botonDesplegador = document.getElementById('botonDesplegador');

    	function desplegarBarra() {

    		switch(menuDesplegable.style.display) {
        			case 'none':
        			case '':
          				menuDesplegable.style.display = 'block';
          				break;
        			case 'block':
          				menuDesplegable.style.display = 'none';
          				break;
      	}
    	}

    		botonDesplegador.onclick = desplegarBarra;

  // DESPLEGADORES DE RESPUESTAS EN EL FAQ *********************************************
      var pregsFaq = document.querySelectorAll('.faq_preguntas h2');
      var rtasFaq = document.querySelectorAll('.faq_preguntas p');

      for(preg in pregsFaq) {
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

  // Validación del formulario de LOGIN ************************************************
      
      if (document.getElementById('ingresar') != null) { // si el botón de login está en la pág, lo que indicaría que estoy en la pág de login

        //Guardo el botón de logueo en una variable
        var btnLogin = document.getElementById('ingresar');

        // Le quito la funcionalidad con la que viene por defecto (si es que la tiene)
        //this.preventDefault();

        //Evento login cuando se hace click en el botón: llama a la función de validación del login
        btnLogin.addEventListener('click', validarLogin);  // --> ojo que da error si en el 2do param escribo "validarLogin()"

        // Definición de la función que valida el login
        function validarLogin() {
          //document.getElementById('errores').innerHTML = ""; // vacía los errores
          while ( document.querySelector('.errores') ) { document.querySelector('.errores').parentNode.removeChild(document.querySelector('.errores')); } // elimina nodos de errores creados en anterior evento 'onClick' (si es que los hay)
          if ( document.querySelector('.exito') ) { document.querySelector('.exito').parentNode.removeChild(document.querySelector('.exito')); } // elimina el nodo de éxito creado en anterior evento 'onClick' (si es que lo hay)
          var correo = document.getElementsByName('correo')[0].value; // guardo el valor de correo ingresado
          var contrasena = document.getElementsByName('contrasena')[0].value; // guardo el valor de contraseña ingresado
          var errores = []; // creo un array vacío de errores
          var camposConError = []; // creo otro array vacío, donde guardar los nombres de los campos con error (pero no los msjs per se)
          var camposBienLlenados = [];
          var regExEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // expresión regular de email

          if(correo == "") { // si el correo es vacío
            camposConError.push('correo'); // entonces (1) agrega el nombre de dicho campo al array 'camposConError'
            errores.push('Ingrese su correo'); // entonces lo pongo en el array de errores
          } else if(correo.length > 50) {
            camposConError.push('correo');
            errores.push('El correo puede tener hasta 50 caracteres');
          } else if(!regExEmail.test(correo)) { // Y si no es vacío pero no tiene expresión de email válida
            camposConError.push('correo'); // entonces (1) agrega el nombre de dicho campo al array 'camposConError'
            errores.push('Formato de email invalido'); // entonces guardo dicho error en el array de errores
          } else { 
            camposBienLlenados.push('correo');
          }

          if(contrasena == "") { // si la contraseña es vacía
            camposConError.push('contrasena');
            errores.push('Ingresá tu contraseña');  // entonces lo pongo en el array de errores
          } else if(contrasena.length < 8 || contrasena.length > 20) {
            camposConError.push('contrasena');
            errores.push('Contraseña incorrecta'); // contraseña incorrecta (pues en el registro le exigimos que tuviese entre 8 y 20 caracteres)
          } else {
            camposBienLlenados.push('contrasena');
          }

          if(errores[0] === undefined) { // si no hay errores, i.e. si al array declarado 'errores' no le asignamos elementos
            // document.getElementById('errores').innerHTML = "Bien hecho"; // --> proceder a la validación por PHP

            camposBienLlenados.forEach(function(campo) {
              document.getElementsByName(campo)[0].style.borderColor = 'green';
            });

            var exitoDisplayMsg = document.createElement('p');
            exitoDisplayMsg.className = 'exito';
            exitoDisplayMsg.innerHTML = 'Entrando al sitio...';
            document.getElementById(camposBienLlenados[0]).parentNode.insertBefore(exitoDisplayMsg, document.getElementById(camposBienLlenados[0])); // --> proceder a la validación por PHP

          } else {
            // errores.forEach(function(error) {
            //   document.getElementById('errores').innerHTML += "<li>" + error + "</li><br>";
            // });


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

  // Validación del formulario de CONTACTO ************************************************
      
      if (document.getElementById('contactar') != null) { // si el botón del form de contacto está en la pág, lo que indicaría que estoy en la pág de contacto

        //Guardo el botón de contacto en una variable
        var btnContactar = document.getElementById('contactar');

        // Le quito la funcionalidad con la que viene por defecto (si es que la tiene)
        //this.preventDefault();

        //Evento contactar cuando se hace click en el botón: llama a la función de validación del intento de contacto
        btnContactar.addEventListener('click', validarContacto);  // --> ojo que da error si en el 2do param escribo "validarContacto()"
      
        // Definición de la función que valida el intento de contacto
        function validarContacto() {
          //document.getElementById('errores').innerHTML = ""; // vacía los errores
          while ( document.querySelector('.errores') ) { document.querySelector('.errores').parentNode.removeChild(document.querySelector('.errores')); } // elimina nodos de errores creados en anterior evento 'onClick' (si es que los hay)
          if ( document.querySelector('.exito') ) { document.querySelector('.exito').parentNode.removeChild(document.querySelector('.exito')); } // elimina el nodo de éxito creado en anterior evento 'onClick' (si es que lo hay)
          var nombre = document.getElementsByName('nombre')[0].value.trim(); // guardo el valor de nombre ingresado
          var apellido = document.getElementsByName('apellido')[0].value.trim(); // guardo el valor de apellido ingresado
          var correo = document.getElementsByName('correo')[0].value.trim(); // guardo el valor de correo ingresado
          var consulta = document.getElementsByName('consulta')[0].value.trim(); // guardo el valor de consulta ingresado
          var errores = []; // creo un array vacío de errores
          var camposConError = []; // creo otro array vacío, donde guardar los nombres de los campos con error (pero no los msjs per se)
          var camposBienLlenados = [];
          var regExEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // expresión regular de email

          if(nombre == "") { // si el nombre es vacío
            camposConError.push('nombre'); // entonces (1) agrega el nombre de dicho campo al array 'camposConError'
            errores.push('Ingresá tu nombre'); // y (2) pone un texto de error en una posición del array 'errores'
          } else if(nombre.length > 50) {
            camposConError.push('nombre');
            errores.push('El nombre puede tener hasta 50 caracteres');
          } else { 
            camposBienLlenados.push('nombre');
          }

          if(apellido == "") { // si el apellido es vacío
            camposConError.push('apellido');
            errores.push('Ingresá tu apellido');
          } else if(apellido.length > 50) {
            camposConError.push('apellido');
            errores.push('El apellido puede tener hasta 50 caracteres');
          } else {
            camposBienLlenados.push('apellido');
          }

          if(correo == "") { // si el correo es vacío
            camposConError.push('correo');
            errores.push('Ingresá tu correo'); // entonces lo pongo en el array de errores
          } else if(correo.length > 50) {
            camposConError.push('correo');
            errores.push('El correo puede tener hasta 50 caracteres');
          } else if(!regExEmail.test(correo)) { // Y si no es vacío pero no tiene expresión de email válida
            camposConError.push('correo');
            errores.push('Formato de email inválido'); // entonces guardo dicho error en el array de errores
          } else {
            camposBienLlenados.push('correo');
          }

          if(consulta == "") { // si la consulta es vacío
            camposConError.push('consulta');
            errores.push('Ingresá tu consulta');
          } else if(consulta.length > 1000) {
            camposConError.push('consulta');
            errores.push('La consulta no puede exceder los 1000 caracteres');// (escribiste ' + $nroCaracteres + ' caracteres');
          } else {
            camposBienLlenados.push('consulta');
          }

          if(errores[0] === undefined) { // si no hay errores, i.e. si al array declarado 'errores' no le asignamos elementos
            // document.getElementById('errores').innerHTML = "Bien hecho"; // --> proceder a la validación por PHP
            // document.getElementById('errores').parentNode.innerHTML = "<p id='msjExito'>Recibimos tu mensaje. Si el correo ingresado es correcto, te contestaremos a la brevedad.</p>";


            camposBienLlenados.forEach(function(campo) {
              document.getElementsByName(campo)[0].style.borderColor = 'green';
            });

            var exitoDisplayMsg = document.createElement('p');
            exitoDisplayMsg.className = 'exito';
            exitoDisplayMsg.innerHTML = 'Recibimos tu mensaje. Si el correo ingresado es correcto, te contestaremos a la brevedad.';
            document.getElementById(camposBienLlenados[0]).parentNode.insertBefore(exitoDisplayMsg, document.getElementById(camposBienLlenados[0])); // --> proceder a la validación por PHP


          } else {
            // errores.forEach(function(error) {
            //   document.getElementById('errores').innerHTML += "<li>" + error + "</li><br>";
            // });

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

  // Validación del formulario de RECUPERO DE CONTRASEÑA ************************************************
      
      if (document.getElementById('recuperar') != null) { // si el botón de recupero de contraseña está en la pág, lo que indicaría que estoy en la pág de recupero de contraseña

        //Guardo el botón de recuoeri en una variable
        var btnRecuperar = document.getElementById('recuperar');

        // Le quito la funcionalidad con la que viene por defecto (si es que la tiene)
        //this.preventDefault();

        //Evento recuperar cuando se hace click en el botón: llama a la función de validación del form de recupero de contraseña
        btnRecuperar.addEventListener('click', validarRecupero);  // --> ojo que da error si en el 2do param escribo "validarContacto()"
      
        // Definición de la función que valida el recupero de contraseña
        function validarRecupero() {
          //document.getElementById('errores').innerHTML = ""; // vacía los errores
          while ( document.querySelector('.errores') ) { document.querySelector('.errores').parentNode.removeChild(document.querySelector('.errores')); } // elimina nodos de errores creados en anterior evento 'onClick' (si es que los hay)
          if ( document.querySelector('.exito') ) { document.querySelector('.exito').parentNode.removeChild(document.querySelector('.exito')); } // elimina el nodo de éxito creado en anterior evento 'onClick' (si es que lo hay)
          var correo = document.getElementsByName('correo')[0].value.trim(); // guardo el valor de correo ingresado
          var errores = []; // creo un array vacío de errores
          var camposConError = []; // creo otro array vacío, donde guardar los nombres de los campos con error (pero no los msjs per se)
          var camposBienLlenados = [];
          var regExEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // expresión regular de email

          if(correo == "") { // si el correo es vacío
            camposConError.push('correo');
            errores.push('Ingrese su correo'); // entonces lo pongo en el array de errores
          } else if(correo.length > 50) {
            camposConError.push('correo');
            errores.push('El correo puede tener hasta 50 caracteres');
          } else if(!regExEmail.test(correo)) { // Y si no es vacío pero no tiene expresión de email válida
            camposConError.push('correo');
            errores.push('Formato de email invalido'); // entonces guardo dicho error en el array de errores
          } else {
            camposBienLlenados.push('correo');
          }

          if(errores[0] === undefined) { // si no hay errores, i.e. si al array declarado 'errores' no le asignamos elementos
            // document.getElementById('errores').innerHTML = "Bien hecho"; // --> proceder a la validación por PHP
            //document.getElementById('errores').parentNode.innerHTML = "<p id='msjExito'>Si el mail ingresado es correcto, en breve recibirás tu nueva contraseña.</p>";

            camposBienLlenados.forEach(function(campo) {
              document.getElementsByName(campo)[0].style.borderColor = 'green';
            });

            var exitoDisplayMsg = document.createElement('p');
            exitoDisplayMsg.className = 'exito';
            exitoDisplayMsg.innerHTML = 'Si el mail ingresado es correcto, en breve recibirás tu nueva contraseña.';
            document.getElementById(camposBienLlenados[0]).parentNode.insertBefore(exitoDisplayMsg, document.getElementById(camposBienLlenados[0])); // --> proceder a la validación por PHP

          } else {
            //errores.forEach(function(error) {
            //  document.getElementById('errores').innerHTML += "<li>" + error + "</li><br>";

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

            //});
          }
        }
      }

  // Validación del formulario de REGISTRO ************************************************
      
      if (document.getElementById('registrar') != null) { // si el botón de registro está en la pág, lo que indicaría que estoy en la pág de registro

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
          var nombre = document.getElementsByName('nombre')[0].value.trim(); // guardo el valor de nombre ingresado
          var apellido = document.getElementsByName('apellido')[0].value.trim(); // guardo el valor de apellido ingresado
          var telefono = document.getElementsByName('telefono')[0].value.trim(); // guardo el valor de teléfono ingresado
          var domicilio = document.getElementsByName('domicilio')[0].value.trim(); // guardo el valor de domicilio ingresado
          var correo = document.getElementsByName('correo')[0].value.trim(); // guardo el valor de correo ingresado
          var contrasena = document.getElementsByName('contrasena')[0].value.trim(); // guardo el valor de contraseña ingresado
          var contrasenaConfirmar = document.getElementsByName('contrasenaConfirmar')[0].value.trim(); // guardo el valor de contraseña ingresado

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
          } else if(nombre.length > 50) {
            camposConError.push('nombre');
            errores.push('El nombre puede tener hasta 50 caracteres');
          } else { 
            camposBienLlenados.push('nombre');
          }

          if(apellido == "") { // si el apellido es vacío
            camposConError.push('apellido');
            errores.push('Ingrese su apellido');
          } else if(apellido.length > 50) {
            camposConError.push('apellido');
            errores.push('El apellido puede tener hasta 50 caracteres');
          } else {
            camposBienLlenados.push('apellido');
          }

          // if(telefono == "") { // si el teléfono es vacío --> deshabilitado porque es opcional
          //   errores.push('Ingrese su teléfono');
          // }

          // if(domicilio == "") { // si el domicilio es vacío --> deshabilitado porque es opcional
          //   errores.push('Ingrese su domicilio');
          // }

          if(correo == "") { // si el correo es vacío
            camposConError.push('correo');
            errores.push('Ingrese su correo'); // entonces lo pongo en el array de errores
          } else if(correo.length > 50) {
            camposConError.push('correo');
            errores.push('El correo puede tener hasta 50 caracteres');
          } else if(!regExEmail.test(correo)) { // Y si no es vacío pero no tiene expresión de email válida
            camposConError.push('correo');
            errores.push('Formato de email inválido'); // entonces guardo dicho error en el array de errores
          } else {
            camposBienLlenados.push('correo');
          }

          if(contrasena == "") { // si la contraseña es vacía
            camposConError.push('contrasena');
            errores.push('Ingrese su contraseña');  // entonces lo pongo en el array de errores
          } else if(contrasena.length < 8 || contrasena.length > 20) {
            camposConError.push('contrasena');
            errores.push('La contraseña debe tener entre 8 y 20 caracteres');
          } else {
            camposBienLlenados.push('contrasena');
          }

          if(contrasenaConfirmar == "") { // si la contraseña es vacía
            camposConError.push('contrasenaConfirmar');
            errores.push('Confirme su contraseña');  // entonces lo pongo en el array de errores
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

            // Hago un envío AJAX para que incremente en 1 el nro de registrados
              (function incrRegistrados() { // --> defino y ejecuto la función a la vez
             
                // 1
                var xmlhttp = new XMLHttpRequest();
                
                // 2
                xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log("Aumentó en 1 el nro de registrados");
                  } else {
                    console.log("No se pudo aumentar el nro de registrados");
                  }
                }

                // 3
                xmlhttp.open("GET", "https://sprint.digitalhouse.com/nuevoUsuario", true);
                 
                // 4
                xmlhttp.send();
              })();

            // Declaro una variable en la que voy a mostrar el nro de registrados (si es que lo devuelve el servidor)
              var msjAJAX;

            // Otro pedido AJAX para la cantidad de usuarios registrados

              (function obtenerRegistrados() { // --> defino y ejecuto la función a la vez
             
                // 1
                var xmlhttp2 = new XMLHttpRequest();
                
                // 2
                xmlhttp2.onreadystatechange = function() {
                  if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                    var arrayRegistrados = JSON.parse(xmlhttp2.responseText);
                    var nroRegistrados = arrayRegistrados.cantidad;
                    console.log("El nro de registrados es " + nroRegistrados);
                    msjAJAX = "el nro de registrados es " + nroRegistrados;
                  } else {
                    console.log("No se obtuvo el nro de registrados");
                  }
                }

                // 3
                xmlhttp2.open("GET", "https://sprint.digitalhouse.com/getUsuarios", true);
                 
                // 4
                xmlhttp2.send();
              })();

            // document.getElementById('errores').innerHTML = "Bien hecho"; // --> proceder a la validación por PHP
            // document.getElementById('msjExito').innerHTML = "Te registraste correctamente. En breve recibirás un mail de confirmación"; // --> proceder a la validación por PHP
            
            var exitoDisplayMsg = document.createElement('p');
            exitoDisplayMsg.className = 'exito';
            exitoDisplayMsg.innerHTML = 'Te registraste correctamente. En breve recibirás un mail de confirmación';
            document.getElementById(camposBienLlenados[0]).parentNode.insertBefore(exitoDisplayMsg, document.getElementById(camposBienLlenados[0])); // --> proceder a la validación por PHP
            //document.getElementById('msjExito').innerHTML += ((msjAJAX !== undefined) ? "<br>(" + msjAJAX + ")" : ''); 
            document.querySelector('.exito').innerHTML += ((msjAJAX !== undefined) ? "<br>(" + msjAJAX + ")" : ''); 

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