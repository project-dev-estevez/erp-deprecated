<section class="forms nueva-asignacion">
  <div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h3 class="h4">Nueva Salida</h3>
    </div>
    <div class="card-body">
    <div class="form-row">
                    <div class="col">
                        <label>Proyecto*</label>
                        <input type="text" name="" id="" class="form-control" disabled
                            value="<?= $solicitud->numero_proyecto.' '.$solicitud->nombre_proyecto;?>">
                    </div>
                    <div class="col">
                        <label>Segmento*</label>
                        <input type="text" name="" id="" class="form-control" disabled
                            value="<?= (empty($solicitud->segmento))? $solicitud->direccion_proyecto : $solicitud->segmento; ?>">
                    </div>
      </div>
      <br>
      <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label>Almacén</label>
                            <input type="text" name="" id="" class="form-control" disabled
                                value="<?= $solicitud->almacen ?>">
                        </div>
                    </div>                
                </div>
      <?= validation_errors('<span class="error">', '</span>'); ?>
      <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-asignacion"'); ?>
        <div class="row" id="">
          <div class="col-12">
            <div class="form-group">
              <label for="existencias">Personal que recibe</label>
              <input type="text" name="" value="<?php echo $solicitud->recibe ?>" class="form-control" readonly>
              <input type="hidden" name="usuario_recibe" value="<?php echo $solicitud->tbl_usuarios_idtbl_usuarios ?>">
            </div>
          </div>
        </div>
        <div class="row" id="">
          <div class="col-12">
            <div class="form-group">
              <label for="existencias">Personal que entrega*</label>
              <?php if($solicitud->tbl_users_idtbl_users_asignacion == NULL && $solicitud->tbl_users_idtbl_users_asignacion == ''){ ?>
              <select name="usuario_entrega" id="personal_entrega" class="form-control" required>
                <option value="" disabled selected>Seleccione...</option>
                <?php foreach ($autorizados as $key => $value): ?>                  
                  <option value="<?php echo $value->idctl_autorizados_entrega ?>" data-nombre="<?php echo $value->nombre?>"><?php echo $value->nombre?></option>
                <?php endforeach ?>
              </select>
              <?php }else{ ?>
                <select name="usuario_entrega" id="personal_entrega" class="form-control" required>
                <option value="" disabled selected>Seleccione...</option>
                <?php foreach ($autorizados as $key => $value): ?>   
                  <?php if($value->tbl_users_idtbl_users == $solicitud->tbl_users_idtbl_users_asignacion){ ?>               
                  <option value="<?php echo $value->idctl_autorizados_entrega ?>" data-nombre="<?php echo $value->nombre?>" selected><?php echo $value->nombre?></option>
                  <?php } ?>
                <?php endforeach ?>
              </select>
                <?php } ?>
              <div class="invalid-feedback">
                Seleccione al personal
              </div>
            </div>
          </div>
        </div>
        <br>
        <?php foreach ($detalle as $key1 => $value1): ?>
          <div class="row productoFieldset" id="productoFieldset<?php echo $key1 ?>">
            <div class="col-12">
              <div class="form-group">
                <label for="existencias">Producto*</label>
                <input type="text" name="" value="<?php echo $value1->neodata.'('.htmlspecialchars(trim($value1->descripcion), ENT_COMPAT) .')' ?>" placeholder="" disabled class="form-control">
                <input type="hidden" name="producto[]" value="<?= $value1->dtl_almacen_iddtl_almacen != NULL ? $value1->dtl_almacen_iddtl_almacen : $value1->iddtl_almacen ?>">
                <input type="hidden" name="categoria[]" value="<?= $value1->ctl_categorias_idctl_categorias ?>">
                <input type="hidden" name="iddtl_solicitud_material[]" value="<?php echo $value1->iddtl_solicitud_material ?>">
              </div>
            </div>

            <?php if ((($solicitud->estatus_solicitud == 'SU AG' || $solicitud->estatus_solicitud == 'SU A') && ($this->session->userdata('tipo')==4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''))) && ((isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0) || (isset($this->session->userdata('permisos')['solicitudes_asignadas']) && $this->session->userdata('permisos')['solicitudes_asignadas'] > 0))) : ?>
              <div class="col-12 col-md-2">
                <div class="form-group">
                  <label for="rack">Rack</label>
                  <input type="text" class="form-control" name="" value="<?php echo $value1->rack ?>" disabled>
                </div>
              </div>
              <div class="col-12 col-md-2">
                <div class="form-group">
                  <label for="nivel">Nivel</label>
                  <input type="text" class="form-control" name="" value="<?php echo $value1->nivel ?>" disabled>
                </div>
              </div>
            <?php endif ?>

            <?php if ((($solicitud->estatus_solicitud == 'SU RCV' || $solicitud->estatus_solicitud == 'SU RCV A') && $this->session->userdata('tipo')==4) && ((isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0) || (isset($this->session->userdata('permisos')['solicitudes_asignadas']) && $this->session->userdata('permisos')['solicitudes_asignadas'] > 0))) : ?>
              <div class="col-12 col-md-2">
                <div class="form-group">
                  <label for="rack">Rack</label>
                  <input type="text" class="form-control" name="" value="<?php echo $value1->rack ?>" disabled>
                </div>
              </div>
              <div class="col-12 col-md-2">
                <div class="form-group">
                  <label for="nivel">Nivel</label>
                  <input type="text" class="form-control" name="" value="<?php echo $value1->nivel ?>" disabled>
                </div>
              </div>
            <?php endif ?>

            <?php if(!isset($this->session->userdata('permisos')['solicitudes_asignadas']) || (isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') == 23)){ ?>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label>Existencias</label>
                <input type="number" class="form-control" disabled value="<?php echo $value1->existencias=($value1->existencias==NULL) ? 0 : $value1->existencias ?>">
              </div>
            </div>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label>Entregado</label>
                <input type="number" class="form-control" disabled value="<?php echo $value1->entregado ?>">
              </div>
            </div>
            <?php } ?>
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label>Solicitado</label>
                <input type="number" class="form-control" name="solicitado[]" readonly value="<?php echo $value1->cantidad ?>">
              </div>
            </div>            
            <div class="col-12 col-md-2">
              <div class="form-group">
                <label for="cantidad">Cantidad*</label>
                <input type="number" class="form-control cantidad" max="<?= $value1->cantidad ?>" step="any" placeholder="" min="0" value="<?= $value1->cantidad ?>" name="cantidad[]" <?php if($this->session->userdata('id')!=45){ ?><?php } ?>
                  required <?= $value1->cantidad == '0.0000' ? 'readonly' : '' ?>>
                <div class="invalid-feedback">
                  La cantidad no puede ser mayor a las existencias, ni vacia.
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Nota</label>
                <input type="text" class="form-control nota" name="notas[]">
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <br><br>
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="form-group">
              <label for="documentoInput">Documento Solicitud de Almacén*</label>
              <input type="file" class="filestyle pull-left" name='solicitud' accept=".pdf">
              <div class="invalid-feedback">
                Seleccione un documento
              </div>
            </div>
          </div>
          
          <?php if($solicitud->activo_fijo == 0 && $this->session->userdata('id') != 50){ ?>
                
                    <div class="col-sm-6">
                        <div class="table-responsive">
                            <table class="table table-sm" width="100%">
                                <tr>
                                    <td>
                                        <center>
                                            <canvas id="draw-canvas6" width="240" style="border-style: solid;">
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
                                        RECIBE<br><?= $solicitud->recibe ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="table-responsive">
                            <table class="table table-sm" width="100%">
                                <tr>
                                    <td>
                                        <center>
                                            <canvas id="draw-canvas7" width="240" style="border-style: solid;">
                                                No tienes un buen navegador.
                                            </canvas>
                                            <br>
                                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button"
                                                class="btn btn-warning btn-sm" id="draw-submitBtn7"><i
                                                    style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button"
                                                class="btn btn-danger btn-sm" id="draw-clearBtn7"><i
                                                    style="font-size: 8px;" class="fa fa-trash"></i> Borrar
                                                Firma</button>
                                            <div style="display: none">
                                                <label>Color</label>
                                                <input type="color" id="color7">
                                                <label>Tamaño Puntero</label>
                                                <input type="range" id="puntero7" min="1" default="1" max="5"
                                                    width="10%">
                                            </div>
                                            <textarea style="display: none;" id="draw-dataUrl7" name="imagen7"
                                                class="form-control" rows="5"></textarea>
                                            <img style="display: none" id="draw-image7" src=""
                                                alt="Tu Imagen aparecera Aqui!" />
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: center;">FIRMA
                                        ENTREGA<br><?= $this->session->userdata('nombre') ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                
                <?php } else{ ?>
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="documentoInput">Responsiva*</label>
              <input type="file" class="filestyle pull-left" name='responsiva' required accept=".pdf">
              <div class="invalid-feedback">
                Seleccione un documento
              </div>
            </div>
          </div>
          <?php } ?>
          <br><br>
        </div>
        <?php //var_dump($solicitud); ?>
        <div class="text-right">
          <input type="hidden" name="activo_fijo" value="<?= $solicitud->activo_fijo == '' ? 0 : $solicitud->activo_fijo ?>">
          <input type="hidden" name="uid_usuario" id="uid-usuario" value="<?php echo $solicitud->uid_recibe ?>">
          <input type="hidden" name="uid" id="uid" value="<?php echo $solicitud->uid ?>">
          <!--<input type="hidden" name="bandera" id="bandera" value="false">-->
          <input type="hidden" name="uid_salida" value="<?= $folio ?>">
          <input type="hidden" name="id_mantenimiento" value="<?= $solicitud->tbl_mantenimientos_idtbl_mantenimientos ?>">
          <input type="hidden" name="token" value="<?= $token ?>">
          <input type="hidden" name="tipo_solicitud" value="<?= $solicitud->tipo_producto ?>">
          <input type="hidden" name="id_almacen" value="<?= $almacen->idtbl_almacenes ?>">
          <input type="hidden" name="idtbl_proyectos" value="<?= $solicitud->idtbl_proyectos ?>">
          <input type="hidden" name="idtbl_segmentos_proyecto" value="<?= $solicitud->idtbl_segmentos_proyecto ?>">
          <input type="hidden" name="idtbl_solicitud_material" value="<?= $solicitud->idtbl_solicitud_material ?>">
          <?php if($this->session->userdata('id') == 50){ ?>
          <button type="button" class="btn-primary btn" id="generar-documentos">Generar documentos</button>
          <?php } ?>
          <input type="submit" class="btn-info btn" value="Asignar">
        </div>
      </form>
    </div>
  </div>
</section>
<script type="text/javascript" src="<?= base_url()?>js/bootstrap-filestyle.js"></script>
<script>
  $('.filestyle').filestyle({
      text: '&nbsp;Documento',
      btnClass: 'btn-outline-info',
  });
</script>
<script>
  $(document).on('change', '.personal', function (event) {
    $('.nombre_empleado_recibe').html($("option:selected", this).data('nombre'));
    $('#uid-usuario').val($("option:selected", this).data('uid'));
  });
  $(document).on('change', '#personal_entrega', function (event) {
    $('.nombre_empleado_entrega').html($("option:selected", this).data('nombre'));
  });
  $(document).on('change', '.cantidad', function (event) {
    var _this = $(this).closest('.productoFieldset');
    $('#tr' + _this.attr('id')).find('.cantidad').html($(this).val());
  });
  $(document).on('change', '.nota', function (event) {
    var _this = $(this).closest('.productoFieldset');
    $('#tr' + _this.attr('id')).find('.notas').html($(this).val());
  });
  $(document).ready(function () {
    <?php if($this->session->userdata('id') == 50){ ?>
    $('#generar-documentos').click(function (event) {
      if ($('#table_material tr').length > 1) {
        Swal.fire({
          title: '¿Desea generar documentos con la información actual?',
          html: $('#table_material'),
          type: 'warning',
          customClass: 'swal-wide',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar'
        }).then((result) => {
          if (result.value) {
            $('#bandera').val('true');
            $("#salida_material").print({
              iframe: true,
              globalStyles: true,
              mediaPrint: true,
              noPrintSelector: '.no-print'
            });
          }
        })
      } else {
        Toast.fire({
          type: 'error',
          title: 'Seleccione al menos un item de la lista.'
        });
      }
    });
    <?php } ?>
    $("#form-asignacion").on("submit", function (event) {
      var ceros = true;
      $('input.cantidad').each(function (index, el) {
        if ($(el).val() != 0) {
          ceros = false;
        }
      });
      /*if (ceros) {
        Toast.fire({
          type: 'error',
          title: 'Todas las cantidades se encuentran en 0'
        })
        return 0;
      }*/
      var $form = $(this);
      //if ($('#bandera').val() == 'true') {
        var f = $(this);
        if (event.isDefaultPrevented()) {
          console.log('Error');
        } else {
          event.preventDefault();
          var formData = new FormData(document.getElementById("form-asignacion"));
          $.ajax({
            url: "<?= base_url()?>almacen/guardar-salida",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function (res) {
              var resp = JSON.parse(res.responseText);
              console.log(resp);
              if (resp.status) {
                location.href = "<?= base_url()?>almacen/detalle_almc/<?= $almacen->uid?>";
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                })
              }
            }
          });
        }
      /*} else {
        event.preventDefault();
        Toast.fire({
          type: 'error',
          title: 'Debe generar los documentos para ser adjuntados.'
        })
      }*/
    });
  });
  $('#nuevoProducto').click(function (event) {
    /* Act on the event */
    var $div = $('[id^="productoFieldset"]:last');
    var $tr = $('[id^="trproductoFieldset"]:last');

    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'productoFieldset' + num);
    var $klonTr = $tr.clone().prop('id', 'trproductoFieldset' + num);

    $klon.css('display', 'none');

    $div.after($klon);
    $tr.after($klonTr);

    $klon.show(500);

    $klon.find('.bootstrap-select').replaceWith(function () {
      return $('select', this);
    });

    $('#productoFieldset' + num + ' .selectpicker').selectpicker();

    $klon.find('.delete-product').css('display', 'block');

    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        $('.select').selectpicker('mobile');
    }*/
    $klon.find('input').val('');
    $klonTr.find('td').html('');
  });
  $(document).on('click', '.delete-product', function () {
    $(this).parents('[id^="productoFieldset"]').remove();
    $('#tr' + $(this).parents('[id^="productoFieldset"]').attr('id')).remove();
  });
</script>
<style type="text/css" media="print">
  @media print {
    #salida_material {
      padding-top: 0;
    }
    body {
      font-family: "Times New Roman", Times, serif;
      font-size: 16px;
    }
  }
</style>
<?php if($this->session->userdata('id') == 50){ ?>
<div class="container-fluid">
  <div class="card" id="salida_material">
    <table width="100%" class="table table-bordered">
      <thead>
        <tr>
          <th style="text-align: center" width="25%"><img
            src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png"
            style="display: inline-block; width: 150px;"></th>
          <th colspan="2" width="50%" style="vertical-align: middle; text-align: center">
            <h3>ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.</h3>
          </th>
          <th style="vertical-align: middle; text-align: center" width="25%">
            <h3>Folio: <?php echo $folio; ?></h3>
          </th>
        </tr>
        <tr>
          <td colspan="4" class="encabezado-table">
            <table width="100%" class="table table-bordered encabezado-table">
              <tbody>
                <tr>
                  <td width="25%">Fecha</td>
                  <td colspan="3"><?= strftime('%d de %B del %Y') ?></td>
                </tr>
                <tr>
                  <td>Proyecto</td>
                  <td colspan="3"><?= $solicitud->numero_proyecto ?> <?= $solicitud->nombre_proyecto ?></td>
                </tr>
                <tr>
                  <td>Ubicación</td>
                  <td colspan="3"><?= (empty($solicitud->segmento))? $solicitud->direccion_proyecto : $solicitud->segmento; ?></td>
                </tr>
                <tr>
                  <td>Responsable de proyecto</td>
                  <td colspan="3"><?php echo $solicitud->responsable ?></td>
                </tr>
                <tr>
                  <td>Coordinador de proyecto</td>
                  <td colspan="3"><?php echo $solicitud->coordinador ?></td>
                </tr>
                <tr>
                  <td>Recibe</td>
                  <td colspan="3" class="nombre_empleado_recibe"><?php echo $solicitud->recibe ?></td>
                </tr>
                <tr>
                  <td>Entrega</td>
                  <td colspan="3" class="nombre_empleado_entrega"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4">
            <table width="100%" id="table_material" class="table table-bordered">
              <thead>
                <tr>
                  <td><strong>Código</strong></td>
                  <td><strong>Herramienta</strong></td>
                  <td><strong>Unidad</strong></td>
                  <td><strong>Cantidad</strong></td>
                  <td><strong>Nota</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($detalle as $key => $value): ?>
                <tr id="trproductoFieldset<?php echo $key ?>">
                  <td class="codigo-uid"><?php echo $value->neodata ?></td>
                  <td class="producto"><?php echo $value->descripcion ?></td>
                  <td class="unidad-medida"><?php echo $value->unidad_medida_abr ?></td>
                  <td class="cantidad"><?= $value->cantidad ?></td>
                  <td class="notas"></td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td height="70" width="100%" colspan="4"></td>
        </tr>
        <tr>
          <td colspan="4" width="100%" align="center" class="nombre_empleado_entrega"></td>
        </tr>
        <tr>
          <td colspan="4" width="100%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php } ?>

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
    var canvas7 = document.getElementById("draw-canvas7");
    var ctx7 = canvas7.getContext("2d");


    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText7 = document.getElementById("draw-dataUrl7");
    var drawImage7 = document.getElementById("draw-image7");
    var clearBtn7 = document.getElementById("draw-clearBtn7");
    var submitBtn7 = document.getElementById("draw-submitBtn7");
    clearBtn7.addEventListener("click", function(e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        $('#draw-submitBtn7').attr("disabled", false);
        $('#draw-submitBtn7').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn7").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
        drawImage7.setAttribute("src", "");
    }, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
    submitBtn7.addEventListener("click", function(e) {
        var dataUrl = canvas7.toDataURL();
        drawText7.innerHTML = dataUrl;
        drawImage7.setAttribute("src", dataUrl);
        $('#draw-submitBtn7').attr("disabled", true);
        $('#draw-submitBtn7').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn7").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
    }, false);

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;
    canvas7.addEventListener("mousedown", function(e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint7 = document.getElementById("color7");
        var punta7 = document.getElementById("puntero7");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas7, e);
    }, false);
    canvas7.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);
    canvas7.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas7, e);
    }, false);

    // Activamos touchEvent para nuestra pagina
    canvas7.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas7, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas7.dispatchEvent(mouseEvent);
    }, false);
    canvas7.addEventListener("touchend", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas7.dispatchEvent(mouseEvent);
    }, false);
    canvas7.addEventListener("touchleave", function(e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas7.dispatchEvent(mouseEvent);
    }, false);
    canvas7.addEventListener("touchmove", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas7.dispatchEvent(mouseEvent);
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
            var tint7 = document.getElementById("color7");
            var punta7 = document.getElementById("puntero7");
            ctx7.strokeStyle = tint7.value;
            ctx7.beginPath();
            ctx7.moveTo(lastPos.x, lastPos.y);
            ctx7.lineTo(mousePos.x, mousePos.y);
            console.log(punta7.value);
            ctx7.lineWidth = punta7.value;
            ctx7.stroke();
            ctx7.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas7.width = canvas7.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();

})();

</script>