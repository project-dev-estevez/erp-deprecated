<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h1>REPORTE DE ACTIVIDADES DE EMPALMADORES</h1>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart(base_url().'compras/enviar-solicitud', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
          <div class="form-row">
            <div class="col-8">
              <label>Fecha</label>
              <input type="date" readonly class="form-control" name="fecha_creacion" value="<?= date('Y-m-d') ?>">
            </div>
            <div class="col-4">
              <label>Hora y minutos</label>
              <input type="text" class="form-control" readonly name="hora_minuto" value="<?= date('H:i') ?>">
            </div>
            <div class="col-6">
              <label>Nombre de Empalmador</label>
              <select name="empalmador" id="selectEmpalmador" class="selectpicker empalmador" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($empalmadores as $key => $value): ?>
                  <option value="<?= $value->idtbl_usuarios ?>"><?= $value->nombres . ' ' . $value->apellido_paterno . ' ' . $value->apellido_materno ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-6">
              <label>Nombre de Auxiliar</label>
              <select name="auxiliar" id="selectAuxiliar" class="selectpicker auxiliar" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($auxiliares_empalmes as $key => $value): ?>
                  <option value="<?= $value->idtbl_usuarios ?>"><?= $value->nombres . ' ' . $value->apellido_paterno . ' ' . $value->apellido_materno ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-6">
              <label>Nombre del Coordinador/Supervisor</label>
              <select name="supervisor" id="selectSupervisor" class="selectpicker supervisor" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($supervisores as $key => $value): ?>
                  <option value="<?= $value->idtbl_users ?>"><?= $value->nombre ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-6">
              <label>Área</label>
              <select name="area" id="selectArea" class="selectpicker area" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <option value="Planta Interna">Planta Interna</option>
                <option value="Planta Externa">Planta Externa</option>
                <option value="Urgencias">Urgencias</option>
                <option value="Patrullaje">Patrullaje</option>
              </select>
            </div>
            <div class="col-6">
              <label>Proyecto*</label>
              <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($proyectos as $key => $value): ?>
                  <option value="<?php echo $value->idtbl_proyectos ?>"
                    data-direccion="<?php echo $value->direccion ?>">
                    <?php echo $value->numero_proyecto ?> -
                    <?php echo substr(trim($value->nombre_proyecto),0,70) ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-6">
              <label>Segmento*</label>
              <select name="segmento" id="ssegmento" class="selectpicker segmento" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              </select>
            </div>
            <div class="col-6">
              <label>Mercado*</label>
              <select name="mercado" id="mercado" class="selectpicker mercado" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <option value="CUAUTLA">CUAUTLA</option>
                <option value="XDMX">CDMX</option>
                <option value="CUERNAVACA">CUERNAVACA</option>
                <option value="PACHUCA">PACHUCA</option>
                <option value="PUEBLA">PUEBLA</option>
                <option value="TOLUCA">TOLUCA</option>
              </select>
            </div>
            <div class="col-6">
              
            </div>
          </div>
          <br>
          <h1 style="text-align: center;">DATOS DE SERVICIO</h1>
          <div class="form-row">
            <div class="col-6">
              <label>Segmento*</label>
              <input type="text" name="segmento2" required class="form-control">
            </div>
            <div class="col-6">
              <label>ID de sitio*</label>
              <input type="text" name="id_sitio" required class="form-control">
            </div>
            <div class="col-6">
              <label>Nombre del Sitio*</label>
              <input type="text" name="nombre_sitio" required class="form-control">
            </div>
            <div class="col-6">
              <label>Activo Fijo DFO*</label>
              <input type="text" name="activo_fijo_dfo" required class="form-control">
            </div>
            <div class="col-6">
              <label>Activo Fijo de Caja de Empalme*</label>
              <input type="text" name="activo_fijo_caja_empalme" required class="form-control">
            </div>
            <div class="col-6">
              
            </div>
          </div>
          <br>
          <h1 style="text-align: center;">DATOS DE ACTIVIDADES</h1>
          <div class="form-row">
            <div class="col-12">
              <h1>ACTIVIDADES REALIZADAS</h1>
              <table class="table" width="100%">
                <tr>
                  <td></td>
                  <td>PLANTA INTERNA</td>
                  <td>PLANTA EXTERNA</td>
                  <td>PATRULLAJE</td>
                </tr>
                <tr>
                  <td>Acometidas</td>
                  <td><input type="checkbox" name="pi1" class="form-control"></td>
                  <td><input type="checkbox" name="pe1" class="form-control"></td>
                  <td><input type="checkbox" name="p1" class="form-control"></td>
                </tr>
                <tr>
                  <td>Clean Up</td>
                  <td><input type="checkbox" name="pi2" class="form-control"></td>
                  <td><input type="checkbox" name="pe2" class="form-control"></td>
                  <td><input type="checkbox" name="p2" class="form-control"></td>
                </tr>
                <tr>
                  <td>Conectividad</td>
                  <td><input type="checkbox" name="pi3" class="form-control"></td>
                  <td><input type="checkbox" name="pe3" class="form-control"></td>
                  <td><input type="checkbox" name="p3" class="form-control"></td>
                </tr>
                <tr>
                  <td>Derivación</td>
                  <td><input type="checkbox" name="pi4" class="form-control"></td>
                  <td><input type="checkbox" name="pe4" class="form-control"></td>
                  <td><input type="checkbox" name="p4" class="form-control"></td>
                </tr>
                <tr>
                  <td>Emergencia</td>
                  <td><input type="checkbox" name="pi5" class="form-control"></td>
                  <td><input type="checkbox" name="pe5" class="form-control"></td>
                  <td><input type="checkbox" name="p5" class="form-control"></td>
                </tr>
                <tr>
                  <td>ODK</td>
                  <td><input type="checkbox" name="pi6" class="form-control"></td>
                  <td><input type="checkbox" name="pe6" class="form-control"></td>
                  <td><input type="checkbox" name="p6" class="form-control"></td>
                </tr>
                <tr>
                  <td>Revisión de cajas</td>
                  <td><input type="checkbox" name="pi7" class="form-control"></td>
                  <td><input type="checkbox" name="pe7" class="form-control"></td>
                  <td><input type="checkbox" name="p7" class="form-control"></td>
                </tr>
                <tr>
                  <td>Reubicación</td>
                  <td><input type="checkbox" name="pi8" class="form-control"></td>
                  <td><input type="checkbox" name="pe8" class="form-control"></td>
                  <td><input type="checkbox" name="p8" class="form-control"></td>
                </tr>
                <tr>
                  <td>Venatana de mantenimiento</td>
                  <td><input type="checkbox" name="pi9" class="form-control"></td>
                  <td><input type="checkbox" name="pe9" class="form-control"></td>
                  <td><input type="checkbox" name="p9" class="form-control"></td>
                </tr>
                <tr>
                  <td>(PAI-PDI) Mediciones bidireccionales</td>
                  <td><input type="checkbox" name="pi10" class="form-control"></td>
                  <td><input type="checkbox" name="pe10" class="form-control"></td>
                  <td><input type="checkbox" name="p10" class="form-control"></td>
                </tr>
              </table>
            </div>
          </div>
          <br>
          <h1 style="text-align: center;">DATOS DE MATERIAL</h1>
          <div class="form-row">
            <h1>MATERIAL ALMACÉN GENERAL UTILIZADO</h1>
            <div class="col-12">
              <div id="consumiblesAG">
                
              </div>
            </div>
            <h1>MATERIAL ALMACÉN ALTO COSTO UTILIZADO</h1>
            <div class="col-12">
              <div id="consumiblesAC">
                
              </div>
            </div>
          </div>
          <br>
          <h1 style="text-align: center;">ESTATUS DE ACTIVIDAD</h1>
          <div class="form-row">
            <div class="col-6">
              <label>¿Se concluyó la actividad?</label>
              <select name="actividad_finalizada" id="actividad_finalizada" class="selectpicker actividad_finalizada" required data-live-search="true">
                <option value="" disabled selected>Seleccione...</option>
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
            </div>
            <div class="col-6">
              <label>Estatus de ODK</label>
              <select name="estatus_odk" id="estatus_odk" class="selectpicker estatus_odk" required data-live-search="true">
                <option value="" disabled selected>Seleccione...</option>
                <option value="1">Con ODK</option>
                <option value="0">Sin ODK</option>
              </select>
            </div>
            <div class="col-6">
              <label>¿Se tuvieron incidencias</label>
              <select name="incidencia" id="incidencia" class="selectpicker incidencia" required data-live-search="true">
                <option value="" disabled selected>Seleccione...</option>
                <option value="Ninguna">Ninguna</option>
                <option value="Administrador no da acceso">Administrador no da acceso</option>
                <option value="Arrendatario no da acceso">Arrendatario no da acceso</option>
                <option value="Falta de llaves (Shelter)">Falta de llaves (Shelter)</option>
                <option value="Falta de llaves (acceso principal)">Falta de llaves (acceso principal)</option>
                <option value="Fallo en chapa electrónica">Fallo en chapa electrónica</option>
                <option value="Llaves incompletas">Llaves incompletas</option>
                <option value="Solicitud de apoyo legal">Solicitud de apoyo legal</option>
                <option value="Sin CW">Sin CW</option>
                <option value="Vandalismo en sitio">Vandalismo en sitio</option>
                <option value="Contingencia COVID" >Contingencia COVID</option>
              </select>
            </div>
            <div class="col-6">
              <label>Folio de incidencia</label>
              <input type="text" class="form-control" required name="folio_incidencia">
            </div>
            <div class="col-12">
              <label>Comentarios</label>
              <textarea class="form-control" name="comentarios"></textarea>
            </div>
            <div class="col-12">
              <label>Evidencia fotográfica</label>
              <input type="file" name="evidencias" class="form-control" required>
            </div>
            <div class="col-12">
              <label>Firma</label>
            </div>
            <div class="col-12">
              <canvas style="border: 1px solid black;" width="280" height="220" id="draw-canvas">
                No tienes un buen navegador.
              </canvas>
              <br>
              <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn"><i class="fa fa-ban"></i> Crear Firma</button>
              <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn"><i class="fa fa-trash"></i> Borrar</button>
              <div>
                <br>
                <label>Color</label>
                <input type="color" id="color">
                <label>Tamaño Puntero</label>
                <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
              </div>
              <textarea style="display: none;" id="draw-dataUrl" name="imagen" class="form-control" rows="5"></textarea>
              <img style="display: none" id="draw-image" src="" alt="Tu Imagen aparecera Aqui!"/>
            </div>
          </div>
          <br><br>
          <div class="clearfix pt-md">
            <div class="pull-right">
              <a href="<?php echo base_url().'almacen/justificaciones_material' ?>"
                class="btn-warning btn" id="btn-cancelar">Cancelar</a>
              <?= form_hidden('token',$token) ?>
              <button type="submit" class="btn-primary btn" id="btn-enviar-solicitud">Enviar Solicitud</button>
            </div>
          </div>
        <?=form_close()?>
      </div>  
    </div>
  </div>
</section>
<script>
  $(document).on('change', '#selectEmpalmador', function (event) {
    event.preventDefault();
    idEmpalmador = $('#selectEmpalmador').val();
    $.ajax({
      type: "POST",
      url: base_url + 'almacen/mostrarProductosConsumibles',
      data: 'id_usuario=' + idEmpalmador + "&id_categoria=2&id_almacen=1",
      dataType: "json",
      success:function(data) {
        filas = '';
        filas += '<table class="table" width="100%">';
        filas += '<tr>';
        filas += '<td></td>';
        filas += '<td>CANTIDAD</td>';
        filas += '<td>UNIDAD</td>';
        filas += '<td>CANTIDAD JUSTIFICADA</td>';
        filas += '<td>CANTIDAD A JUSTIFICAR</td>';
        filas += '<td>OBSERVACIONES</td>';
        filas += '</tr>';
        $.each(data,function(key,item) {
          aux = 0;
          cantidad_justificada = item.cantidad_justificada == null ? aux : item.cantidad_justificada;
          max = item.cantidad - cantidad_justificada;
          filas += '<tr>'
          filas += '<td>' + item.descripcion + '</td>';
          filas += '<input type="hidden" name="iddtl_asignacion[]" value="' + item.iddtl_asignacion + '">';
          filas += '<td><input class="form-control" type="text" disabled value="' + item.cantidad + '"></td>';
          filas += '<td><input class="form-control" type="text" disabled value="' + item.unidad_medida_abr + '"></td>';
          filas += '<td><input class="form-control" disabled type="text" value="' + cantidad_justificada + '"></td>';
          filas += '<td><input class="form-control" type="number" max="' + max + '" name="cantidad_justificada[]"></td>';
          filas += '<td><input class="form-control" type="text" name="observaciones[]"></td>';
          filas += '</tr>';
        });
        filas += '</table>';
        $("#consumiblesAG").html(filas);
      } 
    });
    $.ajax({
      type: "POST",
      url: base_url + 'almacen/mostrarProductosConsumibles',
      data: 'id_usuario=' + idEmpalmador + "&id_categoria=3&id_almacen=2",
      dataType: "json",
      success:function(data) {
        filas = '';
        filas += '<table class="table" width="100%">';
        filas += '<tr>';
        filas += '<td></td>';
        filas += '<td>CANTIDAD</td>';
        filas += '<td>UNIDAD</td>';
        filas += '<td>CANTIDAD JUSTIFICADA</td>';
        filas += '<td>CANTIDAD A JUSTIFICAR</td>';
        filas += '<td>OBSERVACIONES</td>';
        filas += '</tr>';
        $.each(data,function(key,item) {
          aux = 0;
          cantidad_justificada = item.cantidad_justificada == null ? aux : item.cantidad_justificada;
          max = item.cantidad - cantidad_justificada;
          filas += '<tr>'
          filas += '<td>' + item.descripcion + '</td>';
          filas += '<input type="hidden" name="iddtl_asignacion[]" value="' + item.iddtl_asignacion + '">';
          filas += '<td><input class="form-control" type="text" disabled value="' + item.cantidad + '"></td>';
          filas += '<td><input class="form-control" type="text" disabled value="' + item.unidad_medida_abr + '"></td>';
          filas += '<td><input class="form-control" disabled type="text" value="' + cantidad_justificada + '"></td>';
          filas += '<td><input class="form-control" type="number" max="' + max + '" name="cantidad_justificada[]"></td>';
          filas += '<td><input class="form-control" type="text" name="observaciones[]"></td>';
          filas += '</tr>';
        });
        filas += '</table>';
        $("#consumiblesAC").html(filas);
      } 
    });
  });
  $(document).on('change', '#selectProyecto', function (event) {
    event.preventDefault();
    $('#ssegmento').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#ssegmento').selectpicker('refresh');
    $.ajax({
      type:"POST",
      url:base_url+'almacen/getSegmento',
      data:'id=' + $('#selectProyecto').val(),
      success:function(r) {  
        let registros = eval(r);
        if(registros.length == 0) {
          let direccion = $("#selectProyecto").find(':selected').data('direccion');
          direccion = direccion.substring(0, 65);
          $('#ssegmento').append($('<option>', {
            value : '',
            text : direccion
          }));
          $('#ssegmento').selectpicker('refresh');
          return;
        }
        html = "";
        for(i = 0; i < registros.length; i++) {
          let segmento = registros[i]['segmento'];
          segmento = segmento.substring(0, 605);
          $('#ssegmento').append($('<option>', {
            value: registros[i]['idtbl_segmentos_proyecto'],
            text : segmento
          }));
        }
        $('#ssegmento').selectpicker('refresh');
      }
    });
  });
  
  $(document).on('change', '.proyecto', function (event) {
    event.preventDefault();
    console.log($("option:selected", this).val())
    $('.recibe').find('.options').hide();
    $('.recibe').find('.proyecto' + $("option:selected", this).val()).show()

  });
  
  
  
  
  $(document).ready(function () {
    $("#formuploadajax").on("submit", function (event) {
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        $.ajax({
          url: "<?= base_url()?>almacen/nueva-justificacion-material",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function (res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
              $("#btn-enviar-solicitud").css('display','none');
              $("#btn-cancelar").css('display','none');
              $("#nuevoProducto").css('display','none');
              window.location.replace("<?= base_url()?>almacen/justificaciones-material");
            } else {
              Toast.fire({
                type: 'error',
                title: resp.mensaje
              })
            }
          }
        });
      }
    });
  });
</script>
<script>
  var statSend = false;
  function checkSubmit() {
    if (!statSend) {
      statSend = true;
      return true;
    } else {
      //alert("El formulario ya se esta enviando...");
      return false;
    }
  }
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