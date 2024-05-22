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
          <?php $fecha_cortada = explode(' ', $detalle[0]->fecha_creacion) ?>
          <div class="form-row">
            <div class="col-8">
              <label>Fecha</label>
              <input type="date" readonly class="form-control" name="fecha_creacion" value="<?= $fecha_cortada[0] ?>">
            </div>
            <div class="col-4">
              <label>Hora y minutos</label>
              <input type="text" class="form-control" readonly name="hora_minuto" value="<?= $fecha_cortada[1] ?>">
            </div>
            <div class="col-6">
              <label>Nombre de Empalmador</label>
              <input class="form-control" type="text" disabled value="<?= $detalle[0]->nombre_empalmador ?>">
            </div>
            <div class="col-6">
              <label>Nombre de Auxiliar</label>
              <input class="form-control" type="text" disabled value="<?= $detalle[0]->nombre_auxiliar ?>">
            </div>
            <div class="col-6">
              <label>Nombre del Coordinador/Supervisor</label>
              <input class="form-control" type="text" disabled value="<?= $detalle[0]->nombre_supervisor ?>">
            </div>
            <div class="col-6">
              <label>Área</label>
              <input class="form-control" type="text" disabled value="<?= $detalle[0]->area ?>">
            </div>
            <div class="col-6">
              <label>Proyecto*</label>
              <input class="form-control" type="text" disabled value="<?= $detalle[0]->numero_proyecto . ' ' . $detalle[0]->nombre_proyecto ?>">
            </div>
            <div class="col-6">
              <label>Segmento*</label>
              <input class="form-control" type="text" disabled value="<?= $detalle[0]->segmento_proyecto == null ? $detalle[0]->direccion_segmento : $detalle[0]->segmento_proyecto ?>">
            </div>
            <div class="col-6">
              <label>Mercado*</label>
              <input class="form-control" type="text" disabled value="<?= $detalle[0]->mercado ?>">
            </div>
            <div class="col-6">
              
            </div>
          </div>
          <br>
          <h1 style="text-align: center;">DATOS DE SERVICIO</h1>
          <div class="form-row">
            <div class="col-6">
              <label>Segmento*</label>
              <input type="text" name="segmento2" disabled value="<?= $detalle[0]->segmento_justificacion ?>" class="form-control">
            </div>
            <div class="col-6">
              <label>ID de sitio*</label>
              <input type="text" name="id_sitio" disabled class="form-control" value="<?= $detalle[0]->id_sitio ?>">
            </div>
            <div class="col-6">
              <label>Nombre del Sitio*</label>
              <input type="text" name="nombre_sitio" disabled class="form-control" value="<?= $detalle[0]->nombre_sitio ?>">
            </div>
            <div class="col-6">
              <label>Activo Fijo DFO*</label>
              <input type="text" name="activo_fijo_dfo" disabled class="form-control" value="<?= $detalle[0]->activo_fijo_dfo ?>">
            </div>
            <div class="col-6">
              <label>Activo Fijo de Caja de Empalme*</label>
              <input type="text" name="activo_fijo_caja_empalme" disabled class="form-control" value="<?= $detalle[0]->activo_fijo_caja_empalme ?>">
            </div>
            <div class="col-6">
              
            </div>
          </div>
          <br>
          <h1 style="text-align: center;">DATOS DE ACTIVIDADES</h1>
          <?php $actividades = json_decode($detalle[0]->actividades_realizadas);?>
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
                  <td><input type="checkbox" disabled <?= $actividades->pi1 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe1 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p1 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
                <tr>
                  <td>Clean Up</td>
                  <td><input type="checkbox" disabled <?= $actividades->pi2 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe2 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p2 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
                <tr>
                  <td>Conectividad</td>
                  <td><input type="checkbox" disabled <?= $actividades->pi3 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe3 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p3 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
                <tr>
                  <td>Derivación</td>
                  <td><input type="checkbox" disabled <?= $actividades->pi4 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe4 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p4 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
                <tr>
                  <td>Emergencia</td>
                  <td><input type="checkbox" disabled <?= $actividades->pi5 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe5 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p5 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
                <tr>
                  <td>ODK</td>
                  <td><input type="checkbox" disabled <?= $actividades->pi6 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe6 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p6 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
                <tr>
                  <td>Revisión de cajas</td>
                  <td><input type="checkbox" disabled <?= $actividades->pi7 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe7 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p7 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
                <tr>
                  <td>Reubicación</td>
                  <td><input type="checkbox" disabled <?= $actividades->pi8 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe8 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p8 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
                <tr>
                  <td>Venatana de mantenimiento</td>
                  <td><input type="checkbox" disabled <?= $actividades->pi9 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe9 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p9 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
                <tr>
                  <td>(PAI-PDI) Mediciones bidireccionales</td>
                  <td><input type="checkbox" disabled <?= $actividades->pi10 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->pe10 != null ? 'checked' : '' ?>  class="form-control"></td>
                  <td><input type="checkbox" disabled <?= $actividades->p10 != null ? 'checked' : '' ?>  class="form-control"></td>
                </tr>
              </table>
            </div>
          </div>
          <br>
          <h1 style="text-align: center;">DATOS DE MATERIAL</h1>
          <div class="form-row">
            <h1>MATERIAL ALMACÉN GENERAL UTILIZADO</h1>
            <div class="col-12">
              <table class="table" width="100%">
                <tr>
                  <td></td>
                  <td>CANTIDAD</td>
                  <td>UNIDAD</td>
                  <td>CANTIDAD JUSTIFICADA</td>
                  <td>CANTIDAD A JUSTIFICAR</td>
                  <td>OBSERVACIONES</td>
                </tr>
                <?php foreach ($detalle_material_ag as $key => $value) { ?>
                  <?php $aux = 0; ?>
                  <?php $cantidad_justificada = $value->cantidad_justificada_2 == null ? $aux : $value->cantidad_justificada_2; ?>
                  <?php $max = $value->cantidad - $cantidad_justificada; ?>
                  <tr>
                    <td><?= $value->descripcion ?></td>
                    <input type="hidden" name="iddtl_asignacion[]" value="<?= $value->iddtl_asignacion ?>">
                    <td><input class="form-control" type="text" disabled value="<?= $value->cantidad ?>"></td>
                    <td><input class="form-control" type="text" disabled value="<?= $value->unidad_medida_abr ?>"></td>
                    <td><input class="form-control" disabled type="text" value="<?= $cantidad_justificada ?>"></td>
                    <td><input class="form-control" disabled type="number" max="<?= $max ?>" value="<?= $value->cantidad_justificada ?>" name="cantidad_justificada[]"></td>
                    <td><input class="form-control" disabled type="text" value="<?= $value->observaciones ?>" name="observaciones[]"></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
            <h1>MATERIAL ALMACÉN ALTO COSTO UTILIZADO</h1>
            <div class="col-12">
              <table class="table" width="100%">
                <tr>
                  <td></td>
                  <td>CANTIDAD</td>
                  <td>UNIDAD</td>
                  <td>CANTIDAD JUSTIFICADA</td>
                  <td>CANTIDAD A JUSTIFICAR</td>
                  <td>OBSERVACIONES</td>
                </tr>
                <?php foreach ($detalle_material_ac as $key => $value) { ?>
                  <?php $aux = 0; ?>
                  <?php $cantidad_justificada = $value->cantidad_justificada_2 == null ? $aux : $value->cantidad_justificada_2; ?>
                  <?php $max = $value->cantidad - $cantidad_justificada; ?>
                  <tr>
                    <td><?= $value->descripcion ?></td>
                    <input type="hidden" name="iddtl_asignacion[]" value="<?= $value->iddtl_asignacion ?>">
                    <td><input class="form-control" type="text" disabled value="<?= $value->cantidad ?>"></td>
                    <td><input class="form-control" type="text" disabled value="<?= $value->unidad_medida_abr ?>"></td>
                    <td><input class="form-control" disabled type="text" value="<?= $cantidad_justificada ?>"></td>
                    <td><input class="form-control" disabled type="number" max="<?= $max ?>" value="<?= $value->cantidad_justificada ?>" name="cantidad_justificada[]"></td>
                    <td><input class="form-control" disabled type="text" value="<?= $value->observaciones ?>" name="observaciones[]"></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
          <br>
          <h1 style="text-align: center;">ESTATUS DE ACTIVIDAD</h1>
          <div class="form-row">
            <div class="col-6">
              <label>¿Se concluyó la actividad?</label>
              <input type="text" disabled class="form-control" value="<?= $detalle[0]->actividad_finalizada == 1 ? 'Si' : 'No' ?>">
            </div>
            <div class="col-6">
              <label>Estatus de ODK</label>
              <input type="text" disabled class="form-control" value="<?= $detalle[0]->estatus_odk == 1 ? 'Con ODK' : 'Sin ODK' ?>">
            </div>
            <div class="col-6">
              <label>¿Se tuvieron incidencias</label>
              <input type="text" disabled class="form-control" value="<?= $detalle[0]->incidencia ?>">
            </div>
            <div class="col-6">
              <label>Folio de incidencia</label>
              <input type="text" class="form-control" disabled value="<?= $detalle[0]->folio_incidencia ?>">
            </div>
            <div class="col-12">
              <label>Comentarios</label>
              <textarea class="form-control" disabled><?= $detalle[0]->comentarios ?></textarea>
            </div>
            <div class="col-12">
              <label>Evidencia fotográfica</label>
              <div>
                <a href="<?= base_url() ?>uploads/justificaciones/<?= $detalle[0]->uid_justificacion ?>/evidencias.pdf"><i class="fa fa-file"></i></a>
              </div>
            </div>
            <div class="col-12">
              <label>Firma</label>
            </div>
            <div class="col-12">
              <img class="img-fluid" src="<?= base_url() ?>uploads/justificaciones/firmas/<?= $detalle[0]->uid_justificacion ?>.png">
            </div>
          </div>
          <br><br>
          <div class="clearfix pt-md">
            <div class="pull-right">
              <a href="<?php echo base_url().'almacen/justificaciones_material' ?>"
                class="btn-warning btn" id="btn-cancelar">Cancelar</a>
              <?= form_hidden('token',$token) ?>
              <?php if($detalle[0]->estatus_justificacion == 'Supervisor' && isset($this->session->userdata('permisos')['supervisor']) && $this->session->userdata('permisos')['supervisor']>0) { ?>
                <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                <input type="hidden" name="uid_justificacion" value="<?= $detalle[0]->uid_justificacion ?>">
              <?php } ?>
            </div>
          </div>
        <?=form_close()?>
      </div>  
    </div>
  </div>
</section>
<script>
$('#aprobar').click(function(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea aprobar la justificación de material?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url() ?>almacen/aprobar-justificacion",
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
    event.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea cancelar la justificación de material?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url() ?>almacen/cancelar-justificacion",
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
