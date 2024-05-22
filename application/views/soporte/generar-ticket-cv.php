<section class="forms nueva-solicitud" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Generar Nuevo Ticket CV</h3>
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
                                        <th>Tipo De Servicio</th>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <label><input class="form-check-input" name="tipo1" type="checkbox" value="Falla mecánica (Fuga de líquidos)">Falla mecánica (Fuga de líquidos)</label><br>
                                                    <label><input class="form-check-input" name="tipo2" type="checkbox" value="Falla mecánica (Frenos)">Falla mecánica (Frenos)</label><br>
                                                    <label><input class="form-check-input" name="tipo3" type="checkbox" value="Falla mecánica (Suspensión)">Falla mecánica (Suspensión)</label><br>
                                                    <label><input class="form-check-input" name="tipo4" type="checkbox" value="Falla mecánica (Dirección)">Falla mecánica (Dirección)</label><br>
                                                    <label><input class="form-check-input" name="tipo5" type="checkbox" value="Falla mecánica (Transmisión)">Falla mecánica (Transmisión)</label>
                                                </div>
                                                <div class="col">
                                                    <label><input class="form-check-input" name="tipo6" type="checkbox" value="Falla mecánica (Motor)">Falla mecánica (Motor)</label><br>
                                                    <label><input class="form-check-input" name="tipo7" type="checkbox" value="Falla eléctrica">Falla eléctrica</label><br>
                                                    <label><input class="form-check-input" name="tipo8" type="checkbox" value="Desgaste de llantas">Desgaste de llantas</label><br>
                                                    <label><input class="form-check-input" name="tipo9" type="checkbox" value="Detalle estético (Carrocería, interiores y exteriores)">Detalle estético (Carrocería, interiores y exteriores)</label><br>
                                                    <label><input class="form-check-input" name="tipo10" type="checkbox" value="Detalles de aditamentos (Burro, porta carrete, porta escalera)">Detalles de aditamentos (Burro, porta carrete, porta escalera)</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nivel De Prioridad</th>
                                        <td>
                                            <select name="prioridad" id="prioridad" class="form-control recibe"
                                                required>
                                                <option value="" disabled selected>Seleccione...</option>
                                                <option value="Alta">Alta</option>
                                                <option value="Media">Media</option>
                                                <option value="Baja">Baja</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ECO</th>
                                        <td>
                                        <select name="eco" id="eco" class="selectpicker proyecto" required data-live-search="true">
                                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                                <?php foreach ($ecos as $key => $value): ?>
                                                <option value="<?php echo $value->iddtl_almacen ?>">                                                    
                                                <?php echo substr(trim($value->numero_interno),0,70) ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                    </tr>
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div style="text-align: center;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="descripcion">
                                            <th>Información Especifica De La Solicitud De Servicio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="descripcion">
                                            <td><label id="descripcion" required></label></td>
                                        </tr>
                                        <tr>
                                        <tr class="descripcion">
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="descripcion" class="form-control"
                                                    placeholder="Descripción"></textarea></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                        <td>Captura (opcional)</td>
                                        </tr>
                                        <tr>                                                      
                                        <td><input type="file" id="evidencias[]" name="evidencias[]" class="form-control" multiple></td>
                                        </tr>
                                    </tbody>
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
                        <a href="<?php echo base_url().'soporte' ?>" class="btn-warning btn"
                            id="btn-cancelar">Cancelar</a>
                        <?= form_hidden('token',$token) ?>
                        <?= form_hidden('tipo_ticket','cv') ?>
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
/*$(document).on('change', '#tipo', function(event) {    
    event.preventDefault();
    var tipo = $("#tipo").val();
    if (tipo == 'Hardware') {
        $(".descripcion").hide(100);
        $("#descripcion").text('Descripción Del Fallo');
        $(".descripcion").show(1000);
    } else if (tipo == 'Software') {
        $(".descripcion").hide(100);
        $("#descripcion").text('Descripción Del Fallo');
        $(".descripcion").show(1000);
    } else if (tipo == 'Red') {
        $(".descripcion").hide(100);
        $("#descripcion").text('Descripción Del Fallo');
        $(".descripcion").show(1000);
    } else {
        $("#descripcion").text('');
        $(".descripcion").hide(1000);
    }
});*/
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
                        });
                        alert('hola');
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
                    });
                    
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