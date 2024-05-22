<section class="forms nueva-solicitud" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Generar Nuevo Ticket Ingeniería</h3>
            </div>
            <div class="card-body">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <?= validation_errors('<span class="error">', '</span>'); ?>
                <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist"'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div style="text-align: center;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Fecha*</th>
                                        <td>
                                            <?= date('Y-m-d H:i:s') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Solicitante*</th>
                                        <td>
                                            <?= $this->session->userdata('nombre') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tipo De Solicitud</th>
                                        <td>
                                            <select name="tipo" id="tipo" class="form-control" required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                <option value="Solicitud de cambios">Solicitud de cambios</option>
                                                <option value="Solicitud de impresion">Solicitud de impresión</option>
                                                <option value="Solicitud de digitalizacion">Solicitud de digitalización</option>
                                                <option value="Solicitud de proyecto ejecutivo">Solicitud de proyecto ejecutivo</option> 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Proyecto</th>
                                        <td>
                                            <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                                <?php foreach ($proyectos as $key => $value): ?>
                                                <option value="<?php echo $value->idtbl_proyectos ?>"
                                                    data-direccion="<?php echo $value->direccion ?>"
                                                    data-cliente="<?= $value->tbl_clientes_idtbl_clientes ?>">
                                                    <?php echo $value->numero_proyecto ?> -
                                                    <?php echo substr(trim($value->nombre_proyecto),0,70) ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Segmento</th>
                                        <td>
                                            <select name="segmento" id="ssegmento" class="selectpicker segmento" required data-live-search="true">
                                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mercado</th>
                                        <td>
                                            <select name="mercado" id="mercado" class="selectpicker mercado" required data-live-search="true">
                                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                                <?php foreach($estados AS $key => $value){ ?>
                                                    <option value="<?= $value->estado ?>"><?= $value->estado ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Dependencia</th>
                                        <td>
                                            <select name="dependencia" id="dependencia" class="form-control" required>
                                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                                <option value="cliente interno">Cliente Interno</option>
                                                <option value="cliente externo">Cliente Externo</option>
                                                <option value="cfe">CFE</option>
                                                <option value="alcaldia">Alcaldía</option>
                                                <option value="desarrollo urbano">Desarrollo Urbano</option>
                                                <option value="secretaria de movilidad">Secretaría de movilidad</option>
                                                <option value="sct">SCT</option>
                                                <option value="sobse">SOBSE</option>
                                                <option value="direccion general de desarrollo territorial">Dirección general de desarrollo territorial</option>
                                                <option value="sgirpc">SGIRPC</option>
                                                <option value="municipio">Municipio</option>
                                                <option value="inah">INAH</option>
                                                <option value="inbal">INBAL</option>
                                                <option value="otro">Otro</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr id="tr_dependencia" style="display:none;">
                                        <th>Especificar</th>
                                        <td>
                                            <input type="text" name="otro_dependencia" class="form-control" id="otro_dependencia" placeholder="Especificar">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Coordinador a quien solicita</th>
                                        <td>
                                            <select name="coordinador" id="coordinador" class="form-control" required>
                                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                                <option value="284">marco.rios@estevezjor.mx</option>
                                                <option value="379">edgar.mujica@estevezjor.mx</option>
                                                <option value="239">carlos.santos@estevezjor.mx</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Fecha de entrega requerida</th>
                                        <td>
                                            <input type="date" name="fecha_entrega" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Uso</th>
                                        <td>
                                            <select name="uso" id="uso" class="form-control" required>
                                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                                <option value="ingreso a dependencia">Ingreso a dependencia</option>
                                                <option value="plano as built">Plano as built</option>
                                                <option value="recorrido con deployment">Recorrido con deployment</option>
                                                <option value="recorrido con el cliente">Recorrido con el cliente</option>
                                                <option value="construccion">Construcción</option>
                                                <option value="clean up">Clean Up</option>
                                                <option value="cierre de obra">Cierre de obra</option>
                                                <option value="otro">Otro</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Especificaciones</th>
                                        <td>
                                            <?php $especificaciones="Plano doble carta: \nPlano 90x60: \nCD: \nPDF: \nKMZ: \nPrograma de obra: \nMemoria descriptiva: "; ?>
                                            <textarea rows="8" cols="7"
                                                    name="especificaciones" class="form-control"
                                                    placeholder="Observaciones" required><?= $especificaciones ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Observaciones</th>
                                        <td>
                                            <textarea rows="4" cols="7"
                                                    name="observaciones" class="form-control"
                                                    placeholder="Observaciones" required></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Archivo</th>                                                     
                                        <td><input type="file" name="evidencias[]" class="form-control" multiple></td>
                                    </tr>
                                    <?php if($this->session->userdata('id') == 3){ ?>
                                    <tr>
                                        <th>Desarrollador:</th>
                                        <td>
                                            <select name="desarrollador" id="desarrollador" class="form-control recibe"
                                                required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                <?php foreach($desarrolladores AS $key => $value){ ?>
                                                <option value="<?= $value->idtbl_users ?>"><?= $value->nombre ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-sm" width="100%">
                                <tr>
                                    <td>
                                        <center>
                                            <canvas id="draw-canvas6" width="240" style="border-bottom-style: solid;">
                                                No tienes un buen navegador.
                                            </canvas>
                                            <br>
                                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button"
                                                class="btn btn-warning btn-sm" id="draw-submitBtn6"><i
                                                    style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button"
                                                class="btn btn-danger btn-sm" id="draw-clearBtn6"><i
                                                    style="font-size: 8px;" class="fa fa-trash"></i> Borrar
                                                Firma</button>
                                            <div style="display: none">
                                                <label>Color</label>
                                                <input type="color" id="color6">
                                                <label>Tamaño Puntero</label>
                                                <input type="range" id="puntero6" min="1" default="1" max="5"
                                                    width="10%">
                                            </div>
                                            <textarea style="display: none;" id="draw-dataUrl6" name="imagen6"
                                                class="form-control" rows="5"></textarea>
                                            <img style="display: none" id="draw-image6" src=""
                                                alt="Tu Imagen aparecera Aqui!" />
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: center;">FIRMA
                                        SOLICITANTE<br><?= $this->session->userdata('nombre') ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <a href="<?php echo base_url().'soporte/ticket_ingenieria' ?>" class="btn-warning btn"
                            id="btn-cancelar">Cancelar</a>
                        <?= form_hidden('token',$token) ?>
                        <?= form_hidden('tipo_ticket','ingenieria') ?>
                        <button type="submit" class="btn-primary btn" id="btn-enviar-solicitud">Enviar
                            Ticket</button>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</section>
<script>

$(document).on('change', '#selectProyecto', function (event) {
    event.preventDefault();
    $('#ssegmento').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#ssegmento').selectpicker('refresh');
    let cliente = $('#selectProyecto').find(':selected').data('cliente');
    $('#id_cliente').val(cliente);
    //alert(cliente);
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
    if(cliente == 47 || cliente == 11 || cliente == 28){
      $('#almacen').show(300);
      $("#uid_almacen").prop('required', true);
      $('#uid_almacen').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');

      $.ajax({
      type:"POST",
      url:base_url+'almacen/getAlmacenesByProject',
      data:'id=' + $('#selectProyecto').val(),
      success:function(r) {  
        let registros = eval(r);
        if(registros.length == 0) {
          $('#uid_almacen').append($('<option>', {
            value: '25839864557600770',
            text : 'ALMACEN GENERAL'
          }));
          return;
        }
        html = "";
        $('#uid_almacen').append($('<option>', {
            value: '25839864557600770',
            text : 'ALMACEN GENERAL'
          }));
        for(i = 0; i < registros.length; i++) {
          let almacen = registros[i]['almacen'];
          almacen = almacen.substring(0, 605);
          $('#uid_almacen').append($('<option data-segmento="'+registros[i]['tbl_segmentos_proyecto_idtbl_segmentos_proyecto']+'" value="'+registros[i]['uid']+'">'+registros[i]['almacen']+'</option>'));
        }
        //$('#uid_almacen').selectpicker('refresh');
      }
    });
    }else{
      $('#almacen').hide(300);
      $("#uid_almacen").prop('required', false);

    }
  });

  $(document).on('change', '#dependencia', function (event) {
    var _this = $(this);
    if(_this.val() == 'otro'){
      $('#tr_dependencia').show(1000);
      $('#otro_dependencia').prop('required', true);
    }else{
      $('#tr_dependencia').hide(1000);
      $('#otro_dependencia').prop('required', false);

    }
  });

$(document).on('change', '#tipo', function(event) {    
    event.preventDefault();
    var tipo = $("#tipo").val();
    if (tipo == 'Nuevo Proceso') {
        $(".descripcion").hide(100);
        $("#descripcion").text('Descripción Nuevo Proceso');
        $(".descripcion").show(1000);
    } else if (tipo == 'Modificacion Proceso') {
        $(".descripcion").hide(100);
        $("#descripcion").text('Descripción De La Modificación');
        $(".descripcion").show(1000);
    } else if (tipo == 'Error') {
        $(".descripcion").hide(100);
        $("#descripcion").text('Descripción Del Error');
        $(".descripcion").show(1000);
    } else {
        $("#descripcion").text('');
        $(".descripcion").hide(1000);
    }
});
$(document).ready(function() {
    $("#formuploadajax").on("submit", function(event) {
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            $.ajax({
                url: "<?= base_url()?>almacen/nueva-solicitud",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
            $('.card-body').addClass('load');          
          }, 
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $("#btn-enviar-solicitud").css('display', 'none');
                        $("#btn-cancelar").css('display', 'none');
                        $("#nuevoProducto").css('display', 'none');
                        window.location.replace(
                            "<?= base_url()?>almacen/solicitudes-almacen");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        })
                    }
                }
            }).done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    _this.closest('.card-body').removeClass('load');
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
    window.requestAnimFrame = (function(callback) {
        return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimaitonFrame ||
            function(callback) {
                window.setTimeout(callback, 1000 / 60);
                // Retrasa la ejecucion de la funcion para mejorar la experiencia
            };
    })();

    // Traemos el canvas mediante el id del elemento html
    var canvas6 = document.getElementById("draw-canvas6");
    var ctx6 = canvas6.getContext("2d");


    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText6 = document.getElementById("draw-dataUrl6");
    var drawImage6 = document.getElementById("draw-image6");
    var clearBtn6 = document.getElementById("draw-clearBtn6");
    var submitBtn6 = document.getElementById("draw-submitBtn6");
    clearBtn6.addEventListener("click", function(e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        $('#draw-submitBtn6').attr("disabled", false);
        $('#draw-submitBtn6').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn6").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
        drawImage6.setAttribute("src", "");
    }, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
    submitBtn6.addEventListener("click", function(e) {
        var dataUrl = canvas6.toDataURL();
        drawText6.innerHTML = dataUrl;
        drawImage6.setAttribute("src", dataUrl);
        $('#draw-submitBtn6').attr("disabled", true);
        $('#draw-submitBtn6').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn6").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
    }, false);

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;
    canvas6.addEventListener("mousedown", function(e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint6 = document.getElementById("color6");
        var punta6 = document.getElementById("puntero6");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas6, e);
    }, false);
    canvas6.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);
    canvas6.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas6, e);
    }, false);

    // Activamos touchEvent para nuestra pagina
    canvas6.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas6, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas6.dispatchEvent(mouseEvent);
    }, false);
    canvas6.addEventListener("touchend", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas6.dispatchEvent(mouseEvent);
    }, false);
    canvas6.addEventListener("touchleave", function(e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas6.dispatchEvent(mouseEvent);
    }, false);
    canvas6.addEventListener("touchmove", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas6.dispatchEvent(mouseEvent);
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
            var tint6 = document.getElementById("color6");
            var punta6 = document.getElementById("puntero6");
            ctx6.strokeStyle = tint6.value;
            ctx6.beginPath();
            ctx6.moveTo(lastPos.x, lastPos.y);
            ctx6.lineTo(mousePos.x, mousePos.y);
            console.log(punta6.value);
            ctx6.lineWidth = punta6.value;
            ctx6.stroke();
            ctx6.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas6.width = canvas6.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();

})();


$("#form-checklist").on("submit", function(event) {
    //alert('si');
    //var $form = $(this);

    //var f = $(this);    
    if (event.isDefaultPrevented()) {
        console.log('Error');
        //alert('entro');
    } else {
        //alert('se hará bien');
        event.preventDefault();
        var formData = new FormData(document.getElementById("form-checklist"));
        $.ajax({
            url: "<?= base_url()?>soporte/guardarTicket",
            type: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
            $('.card-body').addClass('load');          
          },  
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if (resp.status) {
                    Toast.fire({
                        type: 'success',
                        title: resp.message
                    })
                    location.href = "<?= base_url() ?>soporte";
                } else {
                    Toast.fire({
                        type: 'error',
                        title: resp.message
                    })
                }
            }
        }).done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.card-body').removeClass('load');
  });
    }
});
</script>