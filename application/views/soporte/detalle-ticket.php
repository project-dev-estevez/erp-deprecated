<section class="forms nueva-solicitud">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Detalle Ticket</h3>                
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
                                            <?= $detalle[0]->fecha ?>
                                        </td>
                                    </tr>
                                    <?php if($detalle[0]->tipo_ticket == 'man'){ ?>
                                    <tr>
                                        <th>Solicitante*</th>                                        
                                        <td>
                                            <?= $detalle[0]->nom ?> <?= $detalle[0]->apat ?> <?= $detalle[0]->amat ?>
                                        </td>
                                    </tr>
                                    <?php }else{ ?>
                                        <tr>
                                        <th>Solicitante*</th>                                        
                                        <td>
                                            <?= $detalle[0]->autor ?>                                            
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($detalle[0]->tipo_ticket == 'cv') { ?>
                                        <tr>
                                        <th>Tipo De Servicio</th>
                                        <?php $prueba = json_decode($detalle[0]->tipo) ?>
                                        <td>
                                            <?php foreach($prueba AS $key => $value){ ?>
                                                <?php if($value != '' && $value != NULL){ ?>
                                                    <?= $value ?><br>
                                                <?php } ?>
                                            <?php } ?>
                            
                                        </td>
                                    </tr> <?php } else{ ?>
                                    <tr>
                                        <th>Tipo De Cambio</th>
                                        <td>
                                            <?= $detalle[0]->tipo ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Nivel De Prioridad</th>
                                        <td>
                                            <?= $detalle[0]->prioridad ?>
                                        </td>
                                    </tr>
                                    <?php if($detalle[0]->tipo_ticket == 'cv') {?>
                                        <tr>
                                            <th>Eco</th>
                                            <td>
                                                <?= $detalle[0]->numero_interno ?>
                                            </td>
                                        </tr> <?php } ?>
                                    <?php if($detalle[0]->tipo_ticket == 'man'){ ?>
                                    <tr>
                                        <th>Tipo De Servicio</th>
                                        <td>
                                            <?= $detalle[0]->tipo_servicio ?>
                                        </td>
                                    </tr>
                                    <?php } ?>                                    
                                    
                                    <?php if($detalle[0]->tipo_ticket == 'ti'){ ?>
                                    <tr>
                                    <td><label style="color: red;"><b>Tiempo Estimado</b></label></td>
                                    <?php if($detalle[0]->tiempo_estimado == NULL || $detalle[0]->tiempo_estimado == ''){ ?>
                                    <td><input type="text" id="time" class="form-control" placeholder="Horas:Minutos" name="tiempo_estimado"></td>
                                    <?php }else{ ?>
                                        <td><?= $detalle[0]->tiempo_estimado ?></td>
                                    <?php } ?>
                                    </tr>
                                    <?php } ?>                                
                                </table>
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
                                            <th>Información Especifica De La Solicitud De Cambio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="descripcion">
                                            <td><label id="descripcion">Detalle del usuario</label></td>
                                        </tr>
                                        <tr>
                                        <tr class="descripcion">
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="descripcion" class="form-control" placeholder="Descripción"
                                                    readonly><?= $detalle[0]->descripcion ?></textarea></td>
                                        </tr>
                                        </tr>
                                        <?php if(($detalle[0]->estatus == 'DW' && $this->session->userdata('tipo') == 20) || ($this->session->userdata('tipo') == 2 && $detalle[0]->estatus == 'TI') || ($this->session->userdata('tipo') == 7 && $detalle[0]->estatus == 'M')){ ?>
                                        <tr>
                                            <td>Observaciones</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="observaciones" class="form-control"
                                                    placeholder="Observaciones" required></textarea></td>
                                        </tr>
                                        <?php }elseif($detalle[0]->estatus == 'R' || $detalle[0]->estatus == 'cancelado' || $detalle[0]->estatus == 'MF'){ ?>
                                        <tr>
                                            <td>Observaciones</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="observaciones" class="form-control"
                                                    placeholder="Observaciones"
                                                    readonly><?= $detalle[0]->observaciones ?></textarea></td>
                                        </tr>
                                        <?php } ?>
                                        <?php if(($detalle[0]->estatus == 'MF' && $this->session->userdata('id') == $detalle[0]->tbl_users_idtbl_users)){ ?>
                                        <tr>
                                            <td>Observaciones Usuario</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="observaciones_usuario" class="form-control"
                                                    placeholder="Observaciones" required></textarea></td>
                                        </tr>
                                        <?php }elseif($detalle[0]->estatus == 'R' || $detalle[0]->estatus == 'cancelado' || $detalle[0]->estatus == 'MF'){ ?>
                                        <tr>
                                            <td>Observaciones Usuario</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="observaciones_usuario" class="form-control"
                                                    placeholder="Observaciones"
                                                    readonly><?= $detalle[0]->observaciones_usuario ?></textarea></td>
                                        </tr>
                                        <?php } ?>                                        
                                    </tbody>                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($this->session->userdata('id')==236 && $detalle[0]->estatus !='MF' && $detalle[0]->estatus !='creado' ){ ?>
                    <tr>                              
                                        <td><input type="file" name="evidencias[]" id=evidencias[] class="form-control" multiple=""></td>                                        
                                        </tr>
                <?php } ?>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-sm" width="100%">
                                <tr>
                                    <td>
                                        <center>
                                            <?php $json = json_decode($detalle[0]->imagenes_firmas) ?>
                                            <?php $json2 = json_decode($detalle[0]->imagenes_firmas_dw) ?>

                                            <img src="<?= base_url().$json->imagen6 ?>">
                                        </center>
                                    </td>
                                    <?php if(($detalle[0]->estatus == 'DW' && $this->session->userdata('tipo') == 20) || ($detalle[0]->estatus == 'TI' && $this->session->userdata('tipo') == 2) || ($detalle[0]->estatus == 'CV' && $this->session->userdata('tipo') == 3) || ($detalle[0]->estatus == 'M' && $this->session->userdata('tipo') == 7)){ ?>
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
                                            <textarea style="display: none;" id="draw-dataUrl6" name="imagen7"
                                                class="form-control" rows="5"></textarea>
                                            <img style="display: none" id="draw-image6" src=""
                                                alt="Tu Imagen aparecera Aqui!" />
                                        </center>
                                    </td>
                                    <?php }else if($detalle[0]->estatus == 'R' || $detalle[0]->estatus == 'MF'){ ?>
                                    <td>
                                        <center>
                                            <img src="<?= base_url().$json2->imagen7 ?>">
                                        </center>
                                    </td>
                                    <?php } ?>
                                </tr>
                                
                                <tr>
                                    
                                    <th scope="row" style="text-align: center;">FIRMA
                                        SOLICITANTE<br><?= $detalle[0]->autor ?></th>
                                    <?php if(($detalle[0]->estatus == 'DW' && $this->session->userdata('tipo') == 20) || ($detalle[0]->estatus == 'TI' && $this->session->userdata('tipo') == 2) || ($detalle[0]->estatus == 'CV' && $this->session->userdata('tipo') == 3) || ($detalle[0]->estatus == 'M' && $this->session->userdata('tipo') == 7)){ ?>
                                    <th scope="row" style="text-align: center;">FIRMA
                                        <br><?= $this->session->userdata('nombre') ?></th>
                                    <?php }elseif($detalle[0]->estatus == 'R' || $detalle[0]->estatus == 'MF'){ ?>
                                    <th scope="row" style="text-align: center;">FIRMA
                                        <br><?= $detalle[0]->nombre_desarrollador ?></th>
                                    <?php } ?>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <?php if(($detalle[0]->estatus == 'creado') && ($this->session->userdata('tipo') == 20 && $detalle[0]->tipo_ticket == 'dw')){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Ticket</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" class="btn-primary btn">Aprobar Ticket</button>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'creado') && ($this->session->userdata('tipo') == 2 && $detalle[0]->tipo_ticket == 'ti')){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Ticket</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" class="btn-primary btn">Aprobar Ticket</button>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'creado') && ($this->session->userdata('tipo') == 3 && $detalle[0]->tipo_ticket == 'cv')){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Ticket</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" class="btn-primary btn">Aprobar Ticket</button>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'creado') && ($this->session->userdata('tipo') == 7 && $detalle[0]->tipo_ticket == 'man')){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Ticket</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" class="btn-primary btn">Aprobar Ticket</button>
                    </div>
                </div>                
                <?php } ?>
                <?php if($detalle[0]->estatus == 'creado' || $detalle[0]->estatus == 'DW' || $detalle[0]->estatus == 'CV'){ ?>
                <br><br>
                <h3 class="h3">Documentos</h3>
                <ul>
                    <?php $carpeta = './uploads'. '/soporte/' . $detalle[0]->uid; ?>
                    <?php @$scanned_directory = array_diff(scandir($carpeta), array('..', '.')); ?>
                    <?php if (is_array($scanned_directory) || is_object($scanned_directory)) { ?>
                    <?php if (sizeof($scanned_directory) > 0) { ?>
                    <?php
                  try {
                      foreach ($scanned_directory as $key => $value) {
                          echo '<li><a href="/' . $carpeta . '/' . $value . '" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">' . $value . '</a></li>';
                      }
                  } catch (Exception $e) {
                  }?>
                    <?php } else { ?>
                    <p class="text-danger text-center">No se encontró ningún documento</p>
                    <?php } ?>

                    <?php } else { ?>
                    <p class="text-danger text-center">No se encontró ningún documento</p>
                    <?php } ?>
                </ul>
                <?php } else if($detalle[0]->estatus == 'MF' || $detalle[0]->estatus == 'R' && $detalle[0]->tipo_ticket == 'man'){ ?>
                    <br><br>
                <h3 class="h3">Documentos</h3>
                <ul>
                    <?php $carpeta = './uploads'. '/soporte/' . '/mantenimiento/' . $detalle[0]->uid; ?>
                    <?php @$scanned_directory = array_diff(scandir($carpeta), array('..', '.')); ?>
                    <?php if (is_array($scanned_directory) || is_object($scanned_directory)) { ?>
                    <?php if (sizeof($scanned_directory) > 0) { ?>
                    <?php
                  try {
                      foreach ($scanned_directory as $key => $value) {
                          echo '<li><a href="/' . $carpeta . '/' . $value . '" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">' . $value . '</a></li>';
                      }
                  } catch (Exception $e) {
                  }?>
                    <?php } else { ?>
                    <p class="text-danger text-center">No se encontró ningún documento</p>
                    <?php } ?>

                    <?php } else { ?>
                    <p class="text-danger text-center">No se encontró ningún documento</p>
                    <?php } ?>
                </ul>
                    <?php } ?>
                <?php if(($detalle[0]->estatus == 'DW' && $this->session->userdata('tipo') == 20) || ($detalle[0]->estatus == 'TI' && $this->session->userdata('tipo') == 2) || ($detalle[0]->estatus == 'CV' && $this->session->userdata('tipo') == 3) || ($detalle[0]->estatus == 'M' && $this->session->userdata('tipo') == 7) || ($detalle[0]->estatus == 'MF' && $this->session->userdata('id') == $detalle[0]->tbl_users_idtbl_users) || ($detalle[0]->estatus == 'M' && $this->session->userdata('id')== 236)){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <a href="<?php echo base_url().'soporte' ?>" class="btn-danger btn"
                            id="btn-cancelar">Regresar</a>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>                        
                        <input type="hidden" id='tipo_ticket' value="<?= $detalle[0]->tipo_ticket ?>">
                        
                        <button id="finalizar" class="btn-primary btn">Finalizar Ticket</button>
                    </div>
                </div>

                <?php } ?>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="cancelarModal" tabindex="-1" role="dialog"
    aria-labelledby="vacacionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vacacionesLabel">Cancelar Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="needs-validation" id="formuploadajax_cancel" novalidate method="post">

                    <div class="form-group">
                        <label>Comentarios</label>
                        <textarea name="comentarios" class="form-control" rows="5"></textarea>
                    </div>
                    <br>                    
                    <?= form_hidden('uid', $detalle[0]->uid) ?>                                       
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnCancel" class="btn btn-primary ladda-button"
                    data-style="expand-right">Aceptar</button>
                <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
</section>
<script>
    $(document).ready(function() {
        var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'blue-grey'
});
timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
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
$('#aprobar').click(function(event) {
    event.preventDefault();
    var tipo = <?= $this->session->userdata('tipo')?>;
    var user = <?= $this->session->userdata('id')?>;

    var formData = new FormData(document.getElementById("form-checklist"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea aprobar el ticket?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url() ?>soporte/aprobar-ticket/aprobar",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        )
                        location.reload();
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

$('#cancelar').click(function(event) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea cancelar la solicitud de material?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $("#cancelarModal").modal("show");
        }
    })
});


$('#btnCancel').click(function(event) {
    var formData = new FormData(document.getElementById("formuploadajax_cancel"));
    $.ajax({
        url: "<?= base_url()?>soporte/cancelar_ticket",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
                $('#cancelarModal').modal('hide');
                $('.ocultar').hide();
                Swal.fire(
                    '¡Exitoso!',
                    resp.mensaje,
                    'success'
                );
                location.href = "<?= base_url() ?>almacen/solicitudes-almacen";
            } else {
                Toast.fire({
                    type: 'error',
                    title: resp.mensaje
                });
            }
        }
    });
});
$('#finalizar').click(function(event) {
    //alert('si');
    //var $form = $(this);
    //var hola = $('#ama').val();      
    var tipo = $('#tipo_ticket').val();    
    <?php if($this->session->userdata('tipo') == 7 && $detalle[0]->tbl_usuarios_idtbl_usuariosman == NULL){ ?>
        var proceso = 'mantenimiento';
    <?php }
    else if($this->session->userdata('id') == $detalle[0]->tbl_users_idtbl_users){ ?>
        var proceso = 'finalizar';
    <?php }
    else{ ?>
        var proceso = 'terminado';
    <?php } ?>
    //var f = $(this);    
    if (event.isDefaultPrevented()) {
        console.log('Error');
        //alert('entro');
    } else {
        //alert('se hará bien');
        event.preventDefault();
        var formData = new FormData(document.getElementById("form-checklist"));
        $.ajax({
            url: "<?= base_url()?>soporte/aprobar-ticket/"+proceso,
            type: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if (resp.error == false) {
                    Toast.fire({
                        type: 'success',
                        title: resp.message
                    });
                    if(tipo == 'dw'){
                        location.href = "<?= base_url() ?>soporte";
                    }else if(tipo == 'ti'){
                        location.href = "<?= base_url() ?>soporte/sistemas";
                    }else if(tipo == 'cv'){
                        location.href = "<?= base_url() ?>soporte/control_vehicular";
                    }else if(tipo == 'man'){
                        location.href = "<?= base_url() ?>soporte/mantenimiento";
                    }
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



</script>