<section class="forms nueva-solicitud">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Solicitar Nueva Acta Administrativa</h3>
            </div>
            <div class="card-body">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <?= validation_errors('<span class="error">', '</span>'); ?>
                <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-acta"'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div style="text-align: center;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Fecha</th>
                                        <td>
                                            <?= date('Y-m-d H:i:s') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Solicitante</th>
                                        <td>
                                            <?= $this->session->userdata('nombre') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Personal*</th>
                                        <td>
                                        <select name="personal" id="selectPersonal" class="selectpicker" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($personal as $value): ?>
                  <option value="<?php echo $value->nombres?>"
                    data-direccion="<?php echo $value->nombres?>">
                    <?php echo $value->nombres?> <?php echo $value->apellido_paterno?> <?php echo $value->apellido_materno?>                    
                  </option>
                <?php endforeach ?>
              </select>                                                
                                        </td>
                                    </tr>                                 
                                    <tr>
                                        <th>Motivo*</th>
                                        <td>                                        
                                            <textarea class="form-control" rows="3" name="motivo" id="motivo"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Descripción*</th>
                                        <td>                                        
                                            <textarea class="form-control" rows="5" name="descripcion" id="descripcion"></textarea>
                                        </td>
                                    </tr>                                                                       
                                </table>
                            </div>
                            <div class="row">
                    <div class="col-sm-12">
                        <div style="text-align: center;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="descripcion" style="display: none;">
                                            <th>Información Especifica De Acta Administrativa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="descripcion" style="display: none;">
                                            <td><label id="descripcion" required></label></td>
                                        </tr>
                                        <tr>
                                        <tr class="descripcion" style="display: none;">
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="descripcion" class="form-control"
                                                    placeholder="Descripción" required></textarea></td>
                                        </tr>
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
                        </div>
                    </div>
                </div>
                
                
                <hr>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <a href="<?php echo base_url().'personal/actas_administrativas' ?>" class="btn-warning btn"
                            id="btn-cancelar">Cancelar</a>
                        <?= form_hidden('token',$token) ?>
                        <?= form_hidden('tipo_ticket','ti') ?>
                        <button type="submit" class="btn-primary btn" id="btn-enviar-solicitud">Enviar
                            Solicitud</button>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</section>

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
        });
    }
});
</script>




















<!--script>
$("#form-acta").on("submit", function(event) {
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
            url: "<?= base_url()?>personal/guardarTicket",
            type: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if (resp.status) {
                    Toast.fire({
                        type: 'success',
                        title: resp.message
                    })
                    location.href = "<?= base_url() ?>soporte/sistemas";
                } else {
                    Toast.fire({
                        type: 'error',
                        title: resp.message
                    })
                }
            }
        });
    }
});
</script-->