<!--<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Relación de materiales utilizados</h3>
      </div>
      <div class="card-body">
        <?= form_open('servicios/guardar_material', 'class="grid-form needs-validation" novalidate'); ?>
          <div class="clearfix pt-md">
            <div class="row">
              <div class="col-sm-3">
              </div>
              <div class="col-sm-6">
              <?php if($tipo_servicio == 'F.O') { ?>
              <input type="hidden" value="<?= $uid ?>" name="uid">
              <input type="hidden" value="<?= $tipo_servicio ?>" name="tipo_servicio">
              <h4 class="text-center">Fibra Óptica</h4>
              <table class="table table-bordered">
                <thead class="text-center">
                  <tr>
                    <th width="300">Descripción</th>
                    <th>Unidad</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="ALCOHOL ISOPROPILICO" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="LTS" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="ARMELLA 3/16" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="CANDADO DE ACOMETIDA" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="CINCHO DE NYLON CORTO STEREN" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="CINTA DE AISLAR" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="FIBRA 1 CORE DROP" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="MTS" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="FLEJE DE ACERO 5/8" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="MTS" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="GRAPA PLASTICA 4mm" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="GRAPA PLASTICA 7mm" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="HEBILLA 5/8" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="HERRAJE TIPO 'D'" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="JUMPER SC/UPC-APC" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="NEOPRENO" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="ONU" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PIJA CON PUNTA DE 1/4" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PIJA CONICA 3/6" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="ROSETA" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="SC/APC ACOPLADOR" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="SC/APC ACOPLADOR PREPULIDO" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="SILICON SELLADOR" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="LTS" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="TAQUETE 1/4" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="TENSOR CLAMP LOOP" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="TOALLAS KIMTECH" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                </tbody>
              </table>
              <?php } ?>
              <?php if($tipo_servicio == 'Wireless') { ?>
              <input type="hidden" value="<?= $uid ?>" name="uid">
              <input type="hidden" value="<?= $tipo_servicio ?>" name="tipo_servicio">
              <h4 class="text-center">Wireless</h4>
              <table class="table table-bordered">
                <thead class="text-center">
                  <tr>
                    <th width="300">Descripción</th>
                    <th>Unidad</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="ABRAZADERA TIPO OMEGA 1 1/2 GRANDE" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="ALAMBRE GALVANIZADO Cal. 14" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="MTS" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="ANTENA (SUSCRIPT MODULE)" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="ARMELLA CERRADA DE 1/4" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="CABLE UTP Cat.5e" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="MTS" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="CINCHO DE NYLON 15cm" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="CINCHO DE NYLON CORTO STEREN" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="CONECTOR RJ45" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="GRAPA PLASTICA 4mm" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="GRAPA PLASTICA 7mm" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PACTH CORE UTP" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value='PIJA CABEZA EXAGONAL 1/4 X 2"' name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="ROUTER WIRELES (MODEM)" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="TAQUETE 3/8" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="TENSOR DE 3/16" name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                  <tr>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="TUBO CONDUIT P.D.G. 1 1/2 X 3MTS." name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" readonly value="PZA" name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="0" name="cantidad[]"></td>
                  </tr>
                </tbody>
              </table>
              <?php } ?>
              </div>
              <div class="col-sm-3">
              </div>
            </div>
            <div class="text-center">
              <a href="<?= base_url() ?>servicios/ordenes" class="btn btn-default">Cancelar</a>
              <?= form_hidden('token',$token) ?>
              <?php if($bandera == null) { ?>
                <?php if($this->session->userdata('permisos')['orden_servicio'] == 2) { ?>
                  <button type="submit" class="btn-primary btn">Guardar Material</button>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>-->
<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nueva Solicitud de Almacen(Kuali Digital)</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart(base_url().'compras/enviar-solicitud', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
          <input type="hidden" value="<?= $uid ?>" name="uid">
          <div class="form-row">
            <div class="col-xs-12 col-md-7">
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
            <div class="col-xs-12 col-md-5">
              <label>Segmento*</label>
              <select name="segmento" id="ssegmento" class="selectpicker segmento" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                  <option value="" disabled selected>Seleccione...</option>
                  <option value="interno">Interno</option>
                  <option value="contratista">Contratista</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione el tipo personal
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>Persona autorización</label>
                <select name="persona_autorizacion" id="persona_autorizacion" class="form-control recibe" required>
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione persona autorización
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col divContratistas" style="display: none;">
              <div class="form-group">
                <label>Contratista*</label>
                <select name="contratista" id="contratista" class="selectpicker form-control"  data-live-search="true">
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione al contratista
                </div>
              </div>
            </div>
            <div class="col divContratistas" style="display: none;">
              <div class="form-group">
                <label>Supervisor*</label>
                <select name="supervisor" id="supervisor" class="selectpicker form-control" data-live-search="true">
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione al supervisor
                </div>
              </div>
            </div>
            <div class="col divInternos">
              <div class="form-group">
                <label>Recibe*</label>
                <select name="usuario" id="recibe" class="selectpicker form-control" data-live-search="true">
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione al personal
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="comentarios">Comentarios</label>
              <textarea name="comentarios" id="comentarios" class="form-control" rows="5"></textarea>
            </div>
          </div>
          <input type="hidden" name="tipo_producto" value="Material Instalacion Kuali">
          <hr>
          <div id="item-producto1" class="itemproducto">
            <div class="form-row">
              <div class="col">
                <label>Producto*</label>
                <select name="producto[]" id="product" class="selectpicker producto" required data-live-search="true">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <option value="0">Producto inexistente en el catálogo</option>
                  <?php foreach ($catalogo as $key => $value): ?>
                   
                    <option value="<?php echo $value->idtbl_catalogo ?>"
                      data-precio="<?php echo $value->precio ?>"
                      data-moneda="<?php echo $value->tipo_moneda ?>"
                      data-preciolabel="<?php echo number_format($value->precio,2) . (($value->tipo_moneda=='p') ? ' Pesos' : ' Dolares') ?>"
                      data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT); ?>"
                      data-unidad-medida="<?php echo $value->unidad_medida ?>"
                      data-categoria="<?php echo $value->idctl_categorias ?>">
                      <?php echo $value->neodata  . ' ' . $value->numero_serie . ' ' . $value->numero_interno . ' (' . substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT), 0, 70) . ')' ?>
                    </option>
                   
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col">
                <label for="cantidad">Cantidad*</label>
                <input type="number" name="cantidad[]" id="cantidad" required class="form-control" step="0.001" min="0.001">
              </div>
              <div class="col">
                <label for="unidad">Unidad</label>
                <input type="text" disabled="true" class="form-control unidad">
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col">
                <label for="especificaciones">Descripción</label>
                <input type="text" name="" id="" class="form-control descripcion" disabled>
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col">
                <label for="especificaciones">Observaciones</label>
                <textarea name="observaciones[]" id="especificaciones" class="form-control"
                  rows="5"></textarea>
              </div>
            </div>
            <i class="fa fa-close delete-product" style="display:none"></i>
            <hr>
          </div>
          <br><br>
          <div class="clearfix pt-md">
            <div class="pull-right">
              <a href="<?php echo base_url().'almacen/solicitudes_almacen' ?>"
                class="btn-warning btn" id="btn-cancelar">Cancelar</a>
              <button type="button" class="btn-info btn" id="nuevoProducto">Añadir Otro Producto</button>
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
  $(document).on('change', '.producto', function (event) {
    event.preventDefault();
    var _this = $(this).closest('.itemproducto');
    $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));
    $(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));
  });
  $(document).on('change', '.proyecto', function (event) {
    event.preventDefault();
    console.log($("option:selected", this).val())
    $('.recibe').find('.options').hide();
    $('.recibe').find('.proyecto' + $("option:selected", this).val()).show()

  });
  $(document).on('change', '#tipo', function(event) {
    event.preventDefault();
    var _this=$(this);
    $('#recibe').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#persona_autorizacion').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    const personalAutoriza = JSON.parse('<?php echo json_encode($persona_autorizacion); ?>');
    $.ajax({
      url: base_url+'almacen/tipo-personal',
      type: 'POST',
      dataType: 'json',
      data: {tipo: _this.val()},
      beforeSend: function() {
        _this.closest('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        if (_this.val() == 'interno') {
          $.each(data[0].personal_recibe, function (i, item) {
            $('#recibe').append($('<option>', {
              value: item.idtbl_usuarios,
              text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+' (Número Empleado '+item.numero_empleado+')'
            }));
          });
          $.each(personalAutoriza, function (i, item) {
            $('#persona_autorizacion').append($('<option>', {
              value: item.idtbl_users,
              text : item.nombre
            }));
          });
          $('.divContratistas').hide('slow');
          $('#recibe').selectpicker('refresh');
        } else {
          $.each(data[0].contratistas, function (i, item) {
            $('#contratista').append($('<option>', { 
              value: item.idtbl_contratistas,
              text : item.nombre_comercial
            }));
          });
          $.each(data[0].supervisores, function (i, item) {
            $('#supervisor').append($('<option>', { 
              value: item.idtbl_usuarios,
              text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+' (Número Empleado '+item.numero_empleado+')'
            }));
          });
          $.each(personalAutoriza, function (i, item) {
            if (item.idtbl_users == 17){
              $('#persona_autorizacion').append($('<option>', {
                value: item.idtbl_users,
                text : item.nombre
              }));
            }
          });
          $('#contratista').selectpicker('refresh');
          $('#supervisor').selectpicker('refresh');
          $('#recibe').selectpicker('refresh');
          $('.divContratistas').show('slow');
        }        
      },
      error : function(data) {
        console.log(data);
      }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      _this.closest('.card-body').removeClass('load');
    });
  });
  $(document).on('change', '#contratista', function(event) {
    event.preventDefault();
    var _this=$(this);
    $('#recibe').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $.ajax({
      url: base_url+'almacen/personal-contratista',
      type: 'POST',
      dataType: 'json',
      data: {contratista: _this.val()},
      beforeSend: function() {
        _this.closest('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        $.each(data[0], function (i, item) {
          $('#recibe').append($('<option>', {
            value: item.idtbl_usuarios,
            text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno
          }));
        });
        $('#recibe').selectpicker('refresh');
      },
      error : function(data) {
        console.log(data);
      }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      _this.closest('.card-body').removeClass('load');
    });
  });
  $('#nuevoProducto').click(function (event) {

    /* Act on the event */
    var $div = $('div[id^="item-producto"]:last');

    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'item-producto' + num);

    $klon.css('display', 'none');

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
  $(document).ready(function () {
    $("#formuploadajax").on("submit", function (event) {
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
          complete: function (res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
              $("#btn-enviar-solicitud").css('display','none');
              $("#btn-cancelar").css('display','none');
              $("#nuevoProducto").css('display','none');
              window.location.replace("<?= base_url()?>servicios/ordenes");
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