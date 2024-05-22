<section class="forms">   
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Nueva Orden de Servicio</h3>
        </div>
        <div class="card-body">
          <?= form_open('servicios/guardar_orden_servicio', 'class="grid-form needs-validation" novalidate'); ?>
            <fieldset>
              <div data-row-span=12 style="border-top: solid 3px;border-right: solid 3px;border-left: solid 3px;border-top-left-radius: 5px;border-top-right-radius: 5px;">
                <legend>Datos del contrato</legend>
                <div data-field-span="2">
                  <label>Contrato*</label>
                  <input type="number" name="contrato" required value="<?= set_value('contrato') ?>">
                </div>
                <div data-field-span="5">
                  <label>Nombre*</label>
                  <input type="text" name="nombre" required value="<?= set_value('nombre') ?>">
                </div> 
                <div data-field-span="5">
                  <label>Dirección*</label>
                  <input type="text" name="direccion" required value="<?= set_value('direccion') ?>">
                </div>
              </div>
              <div data-row-span=12 style="border-right: solid 3px;border-left: solid 3px;">
                <div data-field-span="3">
                  <label>Fecha*</label>
                  <input type="date" name="fecha" required value="<?= set_value('fecha') ?>">
                </div>
                <div data-field-span="2">
                  <label>Colonia*</label>
                  <input type="text" name="colonia" required value="<?= set_value('colonia') ?>">
                </div>
                <div data-field-span="2">
                  <label>Población*</label>
                  <input type="text" name="poblacion" required value="<?= set_value('poblacion') ?>">
                </div>
                <div data-field-span="5">
                  <label>Entre calles*</label>
                  <input type="text" name="entre_calles" required value="<?= set_value('entre_calles') ?>">
                </div>
              </div>
              <div data-row-span=12 class="mb-1" style="border-right: solid 3px;border-left: solid 3px;border-bottom: solid 3px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
                <div data-field-span="3">
                  <label>Teléfono*</label>
                  <input type="number" name="telefono" required value="<?= set_value('telefono') ?>">
                </div>
                <div data-field-span="3">
                  <label>Celular</label>
                  <input type="number" name="celular">
                </div>
                <div data-field-span="3">
                  <label>Latitud*</label>
                  <input type="text" id="latitud" name="latitud" required value="<?= set_value('latitud') ?>">
                </div>
                <div data-field-span="3">
                  <label>Longitud*</label>
                  <input type="text" id="longitud" name="longitud" required value="<?= set_value('longitud') ?>">
                </div>
              </div>
              <div data-row-span=12 class="mb-1" style="border-left: solid 3px;border-right: solid 3px;border-bottom: solid 3px;border-top: solid 3px;border-top-right-radius: 5px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
                <div data-field-span="12">
                  <label>Servicios a realizar*</label>
                  <input type="text" name="servicios_realizar" required value="<?= set_value('servicios_realizar') ?>">
                </div>
              </div>
              <div data-row-span=12 style="border: solid 3px;border-radius: 5px;">
                <div data-field-span="6">
                  <label>Generó Orden*</label>
                  <input type="text" name="genero_orden" required value="<?= $this->session->userdata('nombre') ?>">
                </div>
                <div data-field-span="6">
                  <label>Observaciones</label>
                  <input type="text" name="observaciones">
                </div>
                <!--<div data-field-span="2" style="border-top: solid 3px;border-bottom: solid 3px;border-left: solid 3px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
                  <label>Servicio*</label>
                  <input type="radio" value="F.O" name="tipo_servicio" required> &nbsp;<span class="label-check">F.O</span>
                  <input type="radio" value="Wireless" name="tipo_servicio" required> &nbsp;<span class="label-check">Wireless</span>
                </div>
                <div data-field-span="2" style="border-top: solid 3px;border-bottom: solid 3px;border-right: solid 3px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                  <label>Televisores Adicionales</label>
                  <input type="number" name="televisores_adicionales">
                </div>-->
              </div>
              <div data-row-span=12>
                <legend><button type="button" id="find_btn" class="btn btn-primary btn-sm">Mostrar Ubicación</button>
                  <div style="width: 100%" id="mapa">
                  </div>
                </legend>
              </div>
              <div data-row-span=12 class="mb-1" style="border: solid 3px;border-radius: 5px;">
                <div data-field-span="2">
                  <label>Servicio*</label>
                  <input type="radio" value="F.O" name="tipo_servicio" required> &nbsp;<span class="label-check" style="font-size: 13px;">F.O</span>
                  <input type="radio" value="Wireless" name="tipo_servicio" required> &nbsp;<span class="label-check" style="font-size: 13px;">Wireless</span>
                </div>
                <div data-field-span="2">
                  <label>Televisores Adicionales</label>
                  <input type="number" name="televisores_adicionales">
                </div>
              </div>              
              <div class="fo" data-row-span=12 style="display: none;border-left: solid 3px;border-right: solid 3px;border-top: solid 3px;border-top-left-radius: 5px;border-top-right-radius: 5px;">
                <legend>Equipos instalados F.O</legend>
                <div data-field-span="2">
                  <label>Terminal Óptica</label>
                  <input type="text" name="terminal_optica">
                </div>
                <div data-field-span="2">
                  <label>Pto</label>
                  <input type="text" name="pto">
                </div>
                <div data-field-span="4">
                  <label>Candado</label>
                  <input type="text" name="candado">
                </div>
                <div data-field-span="4">
                  <label>No. serie</label>
                  <input type="text" name="no_serie_fo">
                </div>
              </div>
              <div class="fo mb-1" data-row-span=12 style="display: none;border-left: solid 3px;border-right: solid 3px;border-bottom: solid 3px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
                <div data-field-span="3">
                  <label>No. GPON</label>
                  <input type="text" name="no_gpon">
                </div>
                <div data-field-span="3">
                  <label>MAC</label>
                  <input type="text" name="mac">
                </div>
                <div data-field-span="3">
                  <label>IP</label>
                  <input type="text" name="ip_fo">
                </div>
                <div data-field-span="3">
                  <label>Clave</label>
                  <input type="text" name="clave">
                </div>
              </div>                            
              <div class="wireless mb-1" data-row-span=12 style="display: none;border: solid 3px;border-radius: 5px;">
                <legend>Equipos instalados wireless</legend>
                <div data-field-span="6">
                  <label>Torre</label>
                  <input type="text" name="torre">
                </div>
                <div data-field-span="6">
                  <label>Sector</label>
                  <input type="text" name="sector">
                </div>
              </div>
              <div class="wireless mb-1" data-row-span=12 style="display: none;border: solid 3px;">
                <legend>Antena cliente suscript module</legend>
                <div data-field-span="3">
                  <label>No. serie</label>
                  <input type="text" name="no_serie_wireless">
                </div>
                <div data-field-span="3">
                  <label>MAC ESN</label>
                  <input type="text" name="mac_esn">
                </div>
                <div data-field-span="3">
                  <label>Wireless MAC</label>
                  <input type="text" name="wireless_mac">
                </div>
                <div data-field-span="3">
                  <label>IP</label>
                  <input type="text" name="ip_wireless">
                </div>
              </div>
              <div class="wireless mb-1" data-row-span=12 style="display: none;border: solid 3px;">
                <legend>Modem</legend>
                <div data-field-span="3">
                  <label>No. serie</label>
                  <input type="text" name="no_serie_modem">
                </div>
                <div data-field-span="3">
                  <label>MAC ESN</label>
                  <input type="text" name="mac_esn_modem">
                </div>
                <div data-field-span="3">
                  <label>IP</label>
                  <input type="text" name="ip_modem">
                </div>
                <div data-field-span="3">
                  <label>Password</label>
                  <input type="text" name="password">
                </div>
              </div>              
              <div data-row-span=12 class="mb-1" style="border: solid 3px;border-radius: 5px;">
                <div data-field-span="3">
                  <label>Potencia*</label>
                  <input type="text" name="potencia" required value="<?= set_value('potencia') ?>">
                </div>
                <div data-field-span="2">
                  <label>Cap. de servicio*</label>
                  <input type="text" name="cap_servicio" required value="<?= set_value('cap_servicio') ?>">
                </div>
                <div data-field-span="3">
                  <label>Fecha llegada al servicio*</label>
                  <input type="date" name="fecha_llegada_servicio" required value="<?= set_value('fecha_llegada_servicio') ?>">
                </div>
                <div data-field-span="2">
                  <label>Hora inicio*</label>
                  <input type="text" name="hora_inicio" readonly="readonly" required value="<?= date('g:i a') ?>">
                </div>
                <div data-field-span="2">
                  <label>Hora Fin</label>
                  <input type="text" name="hora_fin">
                </div>
              </div>
              <div data-row-span=12 class="mb-1" style="border: solid 3px;border-radius: 5px;">
                <div data-field-span="6">
                  <label>Comentarios cliente</label>
                  <textarea name="comentarios_cliente"></textarea>
                </div>
                <div data-field-span="6">
                  <label>Comentarios técnico</label>
                  <textarea name="comentarios_tecnico"></textarea>
                </div>
              </div>

              <div data-row-span=12 style="border: solid 3px;border-radius: 5px;">
                <div data-field-span="6">
                  <center>
                    <canvas id="draw-canvas" width="240" style="border-bottom-style: solid;">
                      No tienes un buen navegador.
                    </canvas>
                    <p>Firma del cliente</p>
                    <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn"><i class="fa fa-ban"></i> Crear Firma</button>
                    <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn"><i class="fa fa-trash"></i> Borrar Firma</button>
                    <div style="display: none">
                      <label>Color</label>
                      <input type="color" id="color">
                      <label>Tamaño Puntero</label>
                      <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                    </div>
                    <textarea style="display: none;" id="draw-dataUrl" name="imagen" class="form-control" rows="5"></textarea>
                    <img style="display: none" id="draw-image" src="" alt="Tu Imagen aparecera Aqui!"/>
                  </center>
                </div>
                <div data-field-span="6">
                  <center>
                    <canvas id="draw-canvas2" width="240" style="border-bottom-style: solid;">
                      No tienes un buen navegador.
                    </canvas>
                    <p>Firma del técnico</p>
                    <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn2"><i class="fa fa-ban"></i> Crear Firma</button>
                    <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn2"><i class="fa fa-trash"></i> Borrar Firma</button>
                    <div style="display: none">
                      <label>Color</label>
                      <input type="color" id="color2">
                      <label>Tamaño Puntero</label>
                      <input type="range" id="puntero2" min="1" default="1" max="5" width="10%">
                    </div>
                    <textarea style="display: none;" id="draw-dataUrl2" name="imagen2" class="form-control" rows="5"></textarea>
                    <img style="display: none" id="draw-image2" src="" alt="Tu Imagen aparecera Aqui!"/>
                  </center>
                </div>
              </div>
            
            </fieldset>
            <div class="clearfix pt-md">
              <div class="pull-right">
                <a href="<?= base_url();?>servicios/ordenes" class="btn btn-default">Cancelar</button></a>
                <?= form_hidden('token',$token) ?>
                <?php if($this->session->userdata('permisos')['orden_servicio'] == 2) { ?>
                  <button type="submit" class="btn-primary btn">Guardar Orden de Servicio</button>
                <?php } ?>
              </div>
            </div>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </section>
  <script>
    $(document).ready(function() {

      $("input:radio[name=tipo_servicio]").click(function () {    
          if($('input:radio[name=tipo_servicio]:checked').val() == 'F.O') {
            $(".wireless").css('display','none');
            $(".fo").css('display','block');
          }
          if($('input:radio[name=tipo_servicio]:checked').val() == 'Wireless') {
            $(".fo").css('display','none');
            $(".wireless").css('display','block');
          }
      });
    });
  </script>
  <script>
    $("#find_btn").click(function() {
      var mapa = document.getElementById("mapa");
      var options = {
        enableHighAccuracy: true,
        timeout: 6000,
        maximumAge: 0
      };

      navigator.geolocation.getCurrentPosition( success, error, options );

      function success(position) {
        var coordenadas = position.coords;
        console.log('Tu posición actual es:');
        console.log('Latitud : ' + coordenadas.latitude);
        console.log('Longitud: ' + coordenadas.longitude);
        console.log('Más o menos ' + coordenadas.accuracy + ' metros.');
        document.getElementById("latitud").value = coordenadas.latitude;
        document.getElementById("longitud").value = coordenadas.longitude;
        mapa.innerHTML = '<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=es&amp;q='+coordenadas.latitude+','+coordenadas.longitude+'&amp;t=&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>'
      };

      function error(error) {
        console.warn('ERROR(' + error.code + '): ' + error.message);
      };
    })
  </script>
  <script>
    /*
      El siguiente codigo en JS Contiene mucho codigo
      de las siguietes 3 fuentes:
      https://stipaltamar.github.io/dibujoCanvas/
      https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
      http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
    */

    (function() { // Comenzamos una funcion auto-ejecutable

      // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
      window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimaitonFrame ||
          function (callback) {
            window.setTimeout(callback, 1000/60);
            // Retrasa la ejecucion de la funcion para mejorar la experiencia
          };
      })();

      // Traemos el canvas mediante el id del elemento html
      var canvas = document.getElementById("draw-canvas");
      var ctx = canvas.getContext("2d");


      // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
      var drawText = document.getElementById("draw-dataUrl");
      var drawImage = document.getElementById("draw-image");
      var clearBtn = document.getElementById("draw-clearBtn");
      var submitBtn = document.getElementById("draw-submitBtn");
      clearBtn.addEventListener("click", function (e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        drawImage.setAttribute("src", "");
        $('#draw-submitBtn').attr("disabled", false);
        $('#draw-submitBtn').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn").html('<i class="fa fa-ban"></i> Crear Firma');
      }, false);
      // Definimos que pasa cuando el boton draw-submitBtn es pulsado
      submitBtn.addEventListener("click", function (e) {
        var dataUrl = canvas.toDataURL();
        drawText.innerHTML = dataUrl;
        drawImage.setAttribute("src", dataUrl);
        $('#draw-submitBtn').attr("disabled", true);
        $('#draw-submitBtn').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn").html('<i class="fa fa-check"></i> Firma Creada');
      }, false);

      // Activamos MouseEvent para nuestra pagina
      var drawing = false;
      var mousePos = { x:0, y:0 };
      var lastPos = mousePos;
      canvas.addEventListener("mousedown", function (e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint = document.getElementById("color");
        var punta = document.getElementById("puntero");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas, e);
      }, false);
      canvas.addEventListener("mouseup", function (e) {
        drawing = false;
      },  false);
      canvas.addEventListener("mousemove", function (e) {
        mousePos = getMousePos(canvas, e);
      }, false);

      // Activamos touchEvent para nuestra pagina
      canvas.addEventListener("touchstart", function (e) {
        mousePos = getTouchPos(canvas, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
      }, false);
      canvas.addEventListener("touchend", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
      }, false);
      canvas.addEventListener("touchleave", function (e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
      }, false);
      canvas.addEventListener("touchmove", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
      }, false);

      // Get the position of the mouse relative to the canvas
      function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: mouseEvent.clientX - rect.left,
          y: mouseEvent.clientY - rect.top
        };
      }

      // Get the position of a touch relative to the canvas
      function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        console.log(touchEvent);
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
          y: touchEvent.touches[0].clientY - rect.top
        };
      }

      // Draw to the canvas
      function renderCanvas() {
        if (drawing) {
          var tint = document.getElementById("color");
          var punta = document.getElementById("puntero");
          ctx.strokeStyle = tint.value;
          ctx.beginPath();
          ctx.moveTo(lastPos.x, lastPos.y);
          ctx.lineTo(mousePos.x, mousePos.y);
          console.log(punta.value);
          ctx.lineWidth = punta.value;
          ctx.stroke();
          ctx.closePath();
          lastPos = mousePos;
        }
      }

      function clearCanvas() {
        canvas.width = canvas.width;
      }

      // Allow for animation
      (function drawLoop () {
        requestAnimFrame(drawLoop);
        renderCanvas();
      })();

    })();

  </script>

  <script>
    /*
      El siguiente codigo en JS Contiene mucho codigo
      de las siguietes 3 fuentes:
      https://stipaltamar.github.io/dibujoCanvas/
      https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
      http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
    */

    (function() { // Comenzamos una funcion auto-ejecutable

      // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
      window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimaitonFrame ||
          function (callback) {
            window.setTimeout(callback, 1000/60);
            // Retrasa la ejecucion de la funcion para mejorar la experiencia
          };
      })();

      // Traemos el canvas mediante el id del elemento html
      var canvas2 = document.getElementById("draw-canvas2");
      var ctx2 = canvas2.getContext("2d");


      // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
      var drawText2 = document.getElementById("draw-dataUrl2");
      var drawImage2 = document.getElementById("draw-image2");
      var clearBtn2 = document.getElementById("draw-clearBtn2");
      var submitBtn2 = document.getElementById("draw-submitBtn2");
      clearBtn2.addEventListener("click", function (e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        $('#draw-submitBtn2').attr("disabled", false);
        $('#draw-submitBtn2').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn2").html('<i class="fa fa-ban"></i> Crear Firma');
        drawImage2.setAttribute("src", "");
      }, false);
      // Definimos que pasa cuando el boton draw-submitBtn es pulsado
      submitBtn2.addEventListener("click", function (e) {
        var dataUrl = canvas2.toDataURL();
        drawText2.innerHTML = dataUrl;
        drawImage2.setAttribute("src", dataUrl);
        $('#draw-submitBtn2').attr("disabled", true);
        $('#draw-submitBtn2').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn2").html('<i class="fa fa-check"></i> Firma Creada');
      }, false);

      // Activamos MouseEvent para nuestra pagina
      var drawing = false;
      var mousePos = { x:0, y:0 };
      var lastPos = mousePos;
      canvas2.addEventListener("mousedown", function (e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint2 = document.getElementById("color2");
        var punta2 = document.getElementById("puntero2");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas2, e);
      }, false);
      canvas2.addEventListener("mouseup", function (e) {
        drawing = false;
      },  false);
      canvas2.addEventListener("mousemove", function (e) {
        mousePos = getMousePos(canvas2, e);
      }, false);

      // Activamos touchEvent para nuestra pagina
      canvas2.addEventListener("touchstart", function (e) {
        mousePos = getTouchPos(canvas2, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas2.dispatchEvent(mouseEvent);
      }, false);
      canvas2.addEventListener("touchend", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas2.dispatchEvent(mouseEvent);
      }, false);
      canvas2.addEventListener("touchleave", function (e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas2.dispatchEvent(mouseEvent);
      }, false);
      canvas2.addEventListener("touchmove", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas2.dispatchEvent(mouseEvent);
      }, false);

      // Get the position of the mouse relative to the canvas
      function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: mouseEvent.clientX - rect.left,
          y: mouseEvent.clientY - rect.top
        };
      }

      // Get the position of a touch relative to the canvas
      function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        console.log(touchEvent);
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
          y: touchEvent.touches[0].clientY - rect.top
        };
      }

      // Draw to the canvas
      function renderCanvas() {
        if (drawing) {
          var tint2 = document.getElementById("color2");
          var punta2 = document.getElementById("puntero2");
          ctx2.strokeStyle = tint2.value;
          ctx2.beginPath();
          ctx2.moveTo(lastPos.x, lastPos.y);
          ctx2.lineTo(mousePos.x, mousePos.y);
          console.log(punta2.value);
          ctx2.lineWidth = punta2.value;
          ctx2.stroke();
          ctx2.closePath();
          lastPos = mousePos;
        }
      }

      function clearCanvas() {
        canvas2.width = canvas2.width;
      }

      // Allow for animation
      (function drawLoop () {
        requestAnimFrame(drawLoop);
        renderCanvas();
      })();

    })();

  </script>