<section class="forms nueva-solicitud">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Detalle Generador</h3>
            </div>
            <div class="card-body">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div style="text-align: center;">
                            <div class="table-responsive">
                              <?php if($detalle[0]->tipo_servicio == 'mantenimiento'){ ?>
                                <table class="table">
                                    <tr>
                                        <th>Fecha</th>
                                        <td><?= $detalle[0]->fecha ?></td>
                                        <th>No° Incidente</th>
                                        <td><?= $detalle[0]->incidente ?></td>
                                    </tr>
                                    <tr>
                                        <th>No. Reporte Proveedor</th>
                                        <td><?= $detalle[0]->reporte_proveedor ?></td>
                                        <th>Región</th>                                        
                                        <td>
                                            <?= $detalle[0]->region ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Fecha Inicio Trab.</th>
                                        <td><?= $detalle[0]->fecha_inicio ?></td>
                                        <th>Fecha Fin Trab.</th>
                                        <td>
                                            <?= $detalle[0]->fecha_fin ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tipo Actividad</th>
                                        <td>
                                            <?= $detalle[0]->tipo_actividad ?>
                                        </td>
                                        <th>Proveedor</th>
                                        <td><?= $detalle[0]->proveedor ?></td>
                                    </tr>
                                    <tr>
                                        <th>Clave Oracle</th>
                                        <td>                                        
                                            <?= $detalle[0]->clave_oracle ?>
                                        </td>
                                        <th>Tramo</th>
                                        <td><?= $detalle[0]->nombre_oracle ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tipo Localidad</th>
                                        <td>                                        
                                            <?= $detalle[0]->tipo_localidad ?>
                                        </td>
                                        <th>Descripción</th>
                                        <td><?= $detalle[0]->descripcion_mant ?></td>
                                    </tr>
                                    <tr>
                                        <th>Localidad</th>
                                        <td>                                        
                                            <?= $detalle[0]->localidad ?>
                                        </td>
                                        <th>Supervisor AT&T</th>
                                        <td><?= $detalle[0]->nombre_supervisor ?></td>
                                    </tr>
                                    <tr>
                                        <th>Supervisor Proveedor</th>
                                        <td>                                        
                                            <?= $detalle[0]->autor ?>
                                        </td>
                                        <th>Ciudad Mercado</th>
                                        <td><?= $detalle[0]->market ?></td>
                                    </tr>
                                    <tr>
                                        <th>ID PANDA</th>
                                        <td>                                        
                                            <?= $detalle[0]->id_panda ?>
                                        </td>
                                        <th>Tipo de Afectación</th>
                                        <td><?= $detalle[0]->tipo_afectacion ?></td>
                                    </tr>
                                    <tr>
                                        <th>Observaciones / Comentarios</th>
                                        <td colspan="3">
                                        <?= $detalle[0]->observaciones ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Proyecto</th>
                                        <td colspan="3">
                                        <?= $detalle[0]->numero_proyecto . ' - ' . $detalle[0]->nombre_proyecto ?>
                                        </td>
                                    </tr>
                                </table>
                                <?php }elseif($detalle[0]->tipo_servicio == 'construccion'){ ?>
                                  <table class="table">
                                    <!--<tr>
                                        <th>Fecha</th>
                                        <td colspan="3"><?= $detalle[0]->fecha ?></td>
                                        
                                    </tr>-->
                                    <tr>
                                        <th>No. Reporte Proveedor</th>
                                        <td><?= $detalle[0]->reporte_proveedor ?></td>
                                        <th>Proveedor</th>
                                        <td><?= $detalle[0]->proveedor ?></td>
                                    </tr>
                                    <tr>
                                        <th>Supervisor Proveedor</th>
                                        <td>                                        
                                            <?= $detalle[0]->autor ?>
                                        </td>
                                        <th>Lider Cuadrilla</th>
                                        <td>
                                          <?= $detalle[0]->nombres . ' ' . $detalle[0]->apellido_paterno . ' ' . $detalle[0]->apellido_materno ?>
                                        </td>
                                    </tr>
                                  
                                    <tr>
                                        <th>Ciudad/Mercado</th>
                                        <td>
                                        <?= $detalle[0]->ciudad_mercado ?>
                                        </td>
                                        <th>Proyecto</th>
                                        <td>
                                        <?= $detalle[0]->numero_proyecto . ' - ' . $detalle[0]->nombre_proyecto ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tramo</th>
                                        <td><?= $detalle[0]->nombre_oracle ?></td>
                                        <th>Fecha Asignación</th>
                                        <td><?= isset($detalleSolicitudMaterial[0]->fecha_creacion) ? $detalleSolicitudMaterial[0]->fecha_creacion : '' ?></td>
                                    </tr>
                                    
                                    <tr>
                                      <?php if(isset($detalleSolicitudMaterial[0]->fecha_creacion)){ ?>
                                      <?php $dias = round($detalle_generador[0]->cantidad/800, 0, PHP_ROUND_HALF_UP) ?>
                                      <th>Fecha estimada de termino</th>                                      
                                      <td>
                                      <?php $dia_extra = 0; ?>
                                        <?php if (date("H", strtotime(($detalleSolicitudMaterial[0]->fecha_creacion))) > 8) { ?>                                          
                                          <?php $dia_extra = 1; ?>
                                          <?php } ?>
                                          <?php $dias = $dias + $dia_extra; ?>
                                          <?= date("Y-m-d", strtotime($detalleSolicitudMaterial[0]->fecha_creacion."+ $dias days")); ?>
                                      </td>
                                      <?php } ?>
                                    <?php if($detalle[0]->fecha_finalizacion != NULL){ ?>
                                        <th>Fecha Finalización</th>
                                        <td colspan="3"><?= $detalle[0]->fecha_finalizacion ?></td>                                                                            
                                    <?php } ?>
                                    </tr>
                                </table>
                                <?php } ?>
                                
                
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr>                    
                <?php foreach($detalle_generador as $key => $value){ ?>
                <div id="item-producto1" class="itemproducto">
            <div class="form-row">
            <div class="col">
                <label>Linea</label>
                <input type="text" name="linea" class="form-control" value="<?= $value->linea ?>" readonly>
              </div>
              <div class="col">
                <label>Articulo</label>
                <input type="text" name="producto" class="form-control" value="<?= $value->numero_parte ?>" readonly>
              </div>
              <div class="col">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad[]" id="cantidad" class="form-control" value="<?= $value->cantidad ?>" readonly>
              </div>
              <div class="col">
                <label for="unidad">Unidad</label>
                <input type="text" class="form-control unidad" value="<?= $value->unidad_medida_abr ?>" readonly>
              </div>              
            </div>
            <br>
            <div class="form-row">
              <div class="col">
                <label for="especificaciones">Concepto</label>
                <input type="text" name="" id="" class="form-control descripcion" value="<?= $value->descripcion ?>" readonly>
              </div>
            </div>
            <br>            
            <hr>
          </div>
          <?php } ?>
          <!--<?php if(($detalle[0]->estatus == 'SV') && ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19)){ ?>
          <?php echo form_open_multipart('', 'class="needs-validation" id="formuploadMetrajeFinal" novalidate'); ?>
                <div class="form-row">
                <div class="p-2 d-print-none">
                    <h5>Tendido</h5>
                </div>
                <div class="p-2 d-print-none">
                    <input name="tendido_final" type="text" class="form-control" placeholder="Metros">
                </div>
                <div class="p-2 d-print-none">
                    <h5>Rematado</h5>
                </div>
                <div class="p-2 d-print-none">
                    <input name="rematado_final" type="text" class="form-control" placeholder="Metros">
                </div>
                <div class="p-2 d-print-none">
                    <h5>Supervisor</h5>
                </div>
                <div class="p-2 d-print-none">
                    <select name="supervisor_asignado" class="form-control">
                      <option value="" disabled selected>Seleccione...</option>
                      <option value="145">Juan Antonio Limón Sánchez</option>
                      <?php foreach($supervisores AS $key => $value){ ?>
                      <option value="<?= $value->idtbl_users ?>"><?= $value->nombres . ' ' . $value->apellido_paterno . ' ' . $value->apellido_materno ?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="p-2 d-print-none">
                    <h5>Lider</h5>
                </div>
                <div class="p-2 d-print-none">
                    <select name="lider_asignado" class="form-control">
                      <option value="" disabled selected>Seleccione...</option>
                      <option value="2432">Juan Antonio Limón Sánchez</option>
                      <?php foreach($lideres AS $key => $value){ ?>
                      <option value="<?= $value->idtbl_usuarios ?>"><?= $value->nombres . ' ' . $value->apellido_paterno . ' ' . $value->apellido_materno ?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="p-2 d-print-none">
                    <button class="btn btn-secondary btn-success float-left" id="guardarRecorrido" type="button">
                        <span><i class="fa fa-save"></i> Guardar</span>
                    </button>
                </div>
                </div>
                <?= form_hidden('idtbl_mantenimientos', $detalle[0]->idtbl_mantenimientos) ?>
                <?= form_hidden('uid', $detalle[0]->uid) ?>  
                </form>
                <?php } ?>-->
          <br>
            <!--<h3 class="h3">Documentos</h3>
            <ul>
              <?php $carpeta = './uploads'. '/mantenimientos/' . $detalle[0]->uid_mantenimiento; ?>
              <?php @$scanned_directory = array_diff(scandir($carpeta), array('..', '.')); ?>
              <?php if (is_array($scanned_directory) || is_object($scanned_directory)) { ?>
                <?php if(sizeof($scanned_directory) > 0) { ?>
                  <?php
                  try {
                    foreach ($scanned_directory as $key => $value) {
                      echo '<li><a href="/' . $carpeta . '/' . $value . '" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">' . $value . '</a></li>';
                    }
                  } catch (Exception $e) {
                  }?>
                <?php }else { ?>
                  <p class="text-danger text-center">No se encontró ningún documento</p>
                <?php } ?>

              <?php }else { ?>
                <p class="text-danger text-center">No se encontró ningún documento</p>
              <?php } ?>
            </ul>-->
            
            <?php if($detalle[0]->tbl_clientes_idtbl_clientes == 4){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">                       
                    <button class="btn btn-secondary btn-info float-right" id="btnImprimirDiv" tabindex="0">
                      <span><i class="fa fa-print"></i> Imprimir</span>
                    </button>
                    </div>
                </div>
              <?php } ?>                
            </div>
        </div>
    </div>
</section>
<section style="display: none;">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body" id="printableArea">
        <style>
          body {
            font-family: "Poppins", sans-serif;
          }

          .b_top {
            border-top: 1px solid #000;
          }

          .b_right {
            border-right: 1px solid #000;
          }

          .b_bottom {
            border-bottom: 1px solid #000;
          }

          .b_left {
            border-left: 1px solid #000;
          }

          #datos_solicitud {
            border-collapse: separate;
            border-spacing: 0px 5px !important;
          }

          .default-text {
            width: 160px !important;
          }
        </style>        
        <table id="datos_solicitud" style="width: 100%;font-size: 12px;margin-top: 10px; border-collapse: collapse;" cellpadding="4" cellspacing="0">                                 
                <tbody>
                <tr>
              <td class="" colspan="3">
                <img src="<?php echo base_url(); ?>uploads/att.jpg" style="display: inline-block; width: 80px;">
              </td>
              <td colspan="6" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <strong>GENERADOR DE CAMPO</strong>
              </td>
              <td colspan="2" class="" style="vertical-align: middle; text-align: center; font-size:12px;">
                &nbsp;
              </td>
            </tr>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>FECHA</strong>
                    </td>
                    <td class="b_top b_right b_bottom" style="color: #2108B8;" align="center">
                      <?= $detalle[0]->fecha ?>
                    </td>
                    <td class="default-text b_top b_right b_bottom">
                      <strong>No. INCIDENTE</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                        <?= $detalle[0]->incidente ?>
                    </td>
                    <td class="b_top b_right b_bottom">
                      <strong>No. REPORTE PROVEEDOR</strong>
                    </td>
                    <td class="b_top b_right b_bottom" style="color: #2108B8;">
                      <?= $detalle[0]->reporte_proveedor ?>
                    </td>
                    <td class="b_top b_right b_bottom">
                      <strong>FECHA INICIO TRAB.</strong>
                    </td>
                    <td class="b_top b_right b_bottom" style="color: #2108B8;" align="center">
                      <?= $detalle[0]->fecha_inicio ?>
                    </td>
                    <td class="b_top b_right b_bottom">
                      <strong>FECHA FIN TRAB.</strong>
                    </td>
                    <td class="b_top b_right b_bottom" style="color: #2108B8;" align="center">
                      <?= $detalle[0]->fecha_fin ?>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <strong>REGIÓN</strong>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" class="b_top b_right b_bottom b_left" align="center">
                      <strong>TIPO ACTIVIDAD</strong>
                    </td>
                    <td colspan="2" class="b_top b_right b_bottom" align="center">
                      <strong>PROVEEDOR</strong>
                    </td>
                    <td class="b_top b_right b_bottom">
                      <strong>CLAVE ORACLE</strong>
                    </td>
                    <td class="b_top b_right b_bottom">
                      <?= $detalle[0]->clave_oracle ?>
                    </td>
                    <td colspan="4" class="b_top b_right b_bottom" align="center">
                      <?= $detalle[0]->nombre_oracle ?>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $detalle[0]->region ?>
                    </td>                                        
                  </tr>
                  <tr>
                    <td colspan="2" class="b_top b_right b_bottom b_left" align="center">
                      <?= $detalle[0]->tipo_actividad ?>
                    </td>
                    <td colspan="2" class="b_top b_right b_bottom" align="center">
                      <?= $detalle[0]->proveedor ?>
                    </td>
                    <td class="b_top b_right b_bottom">
                      <strong>TIPO DE LOCALIDAD</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $detalle[0]->tipo_localidad ?>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <strong>DESCRIPCIÓN</strong>
                    </td>
                    <td colspan="2" class="b_top b_right b_bottom" align="center">
                      <?= $detalle[0]->descripcion_mant ?>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <strong>LOCALIDAD</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $detalle[0]->localidad ?>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" class="b_top b_right b_bottom b_left">
                      <strong>SUPERVISOR AT&T</strong>
                    </td>
                    <td colspan="3" class="b_top b_right b_bottom">
                      <?= $detalle[0]->nombre_supervisor ?>
                    </td>
                    <td class="b_top b_right b_bottom b_left" align="center">
                      <strong>SUPERVISOR PROVEEDOR</strong>
                    </td>
                    <td colspan="5" class="b_top b_right b_bottom" align="center">
                      <?= $detalle[0]->autor ?>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" class="b_top b_right b_bottom b_left" align="center">
                      <strong>CIUDAD/MERCADO</strong>
                    </td>
                    <td colspan="2" class="b_top b_right b_bottom" align="center">
                      <?= $detalle[0]->market ?>
                    </td>
                    <td class="b_top b_right b_bottom">
                      <strong>ID PANDA</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $detalle[0]->id_panda ?>
                    </td>
                    <td colspan="5" class="b_top b_right b_bottom">
                      &nbsp;
                    </td>
                  </tr>
                  <tr>
                    <td colspan="11" class="b_top b_right b_bottom b_left">
                      <strong>OBSERVACIONES/COMENTARIOS</strong><br>
                      <?= $detalle[0]->observaciones ?>
                    </td>
                  </tr>                                                                                                              
                </tbody>              
        </table>
                                                                              
        <table style="width: 100%;margin-top: 15px;" border="1" cellpadding="4" cellspacing="0" align="center">
          <thead style="font-size: 12px!important; background-color: #00B0F0;">
            <tr>
              <th style="background-color: #00B0F0;"><strong>LINEA</strong></th>
              <th><strong>ARTICULO</strong></th>
              <th><strong>DESCRIPCIÓN</strong></th>
              <th width="50px"><strong>UNIDAD</strong></th>
              <th width="70px"><strong>CANTIDAD</strong></th>               
            </tr>
          </thead>
          <tbody style="font-size: 12px!important;" align="center">
            <?php foreach ($detalle as $key => $value) : ?>
              <tr>
                <td><?= $value->linea ?></td>
                <td><?php echo $value->numero_parte ?></td>
                <td><?php echo $value->descripcion ?></td>
                <td><?php echo $value->unidad_medida_abr ?></td>
                <td><?= $value->cantidad ?></td>                
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <br>              
        <table style="width: 100%;margin-top: 150px;" border="0" cellpadding="4" cellspacing="0" align="center">
          <tbody style="font-size: 12px!important;" align="center">                                                
            <tr>
              <td colspan="2" align="center">____________________________</td>
              <td colspan="2" align="center">____________________________</td>              
            </tr>
            <tr>
              <td colspan="2" align="center">Nombre, Firma y Fecha</td>
              <td colspan="2" align="center">Nombre, Firma y Fecha</td>              
            </tr>
            <tr>
              <td colspan="2" align="center">Supervisor Proveedor</td>
              <td colspan="2" align="center">Supervisor AT&T</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<script>
$('#nuevoProducto').click(function (event) {

/* Act on the event */
var $div = $('div[id^="item-producto"]:last');

// Read the Number from that DIV's ID (i.e: 3 from "klon3")
// And increment that number by 1
var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
var $klon = $div.clone().prop('id', 'item-producto' + num);

$klon.css('display', 'none');

$klon.find('.campos_ac').css('display', 'none');

$div.after($klon);

$klon.show(500);

$klon.find('.bootstrap-select').replaceWith(function () {
  return $('select', this);
});


$('#item-producto' + num + ' .selectpicker').selectpicker();

$klon.find('input,textarea').val('');
$klon.find('.delete-product').css('display', 'block');

});
$(document).on('click', '.delete-product', function () {
$(this).parents('div[id^="item-producto"]').remove();
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
$('#guardarRecorrido').click(function(event) {    
    event.preventDefault();
    var formDataMetraje = new FormData(document.getElementById("formuploadMetrajeFinal"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea guardar el recorrido?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url() ?>almacen/guardar-recorrido",
                type: "post",
                dataType: "json",
                data: formDataMetraje,
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
$(document).ready(function() {
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
            url: "<?= base_url()?>almacen/guardarMantenimiento",
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
                    location.href = "<?= base_url() ?>almacen/mantenimientos";
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
function imprimirElemento(elemento) {
    var printContents = document.getElementById(elemento).innerHTML;
    var ventana = window.open('', 'PRINT', '');    
    ventana.document.write('<link rel="stylesheet" href="style.css">'); //Aquí agregué la hoja de estilos
    ventana.document.write('</head><body >');
    ventana.document.write(printContents);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.onload = function() {
      ventana.print();
      ventana.close();
    };
  }
document.querySelector("#btnImprimirDiv").addEventListener("click", function() {
    imprimirElemento('printableArea');
  });
</script>
