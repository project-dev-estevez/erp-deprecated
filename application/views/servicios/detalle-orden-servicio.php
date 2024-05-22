<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Detalle Orden de Servicio</h3>
        <a class="btn btn-info ml-auto" href="<?php echo base_url() ?>Servicios/imprimirDetalleOrdenServicio/<?=  $uid; ?>" onClick="openWin(this)">
          Imprimir Detalle de la Orden de Servicio
        </a>
      </div>
      <div class="card-body">
        <?php if($this->session->userdata('permisos')['orden_servicio'] == 3) { ?>
          <?= form_open('', 'class="grid-form needs-validation" id="formuploadajax" novalidate'); ?>
        <?php } else { ?>
          <?= form_open('servicios/guardar_orden_servicio', 'class="grid-form needs-validation" novalidate'); ?>
        <?php } ?>
        <fieldset>
          <input type="hidden" name="uid" value="<?= $uid ?>">
          <div data-row-span=12 style="border-top: solid 3px;border-right: solid 3px;border-left: solid 3px;border-top-left-radius: 5px;border-top-right-radius: 5px;">
            <legend>Datos del contrato</legend>
            <div data-field-span="2">
              <label>Contrato*</label>
              <input type="number" name="contrato" required value="<?= $orden[0]['contrato'] ?>">
            </div>
            <div data-field-span="5">
              <label>Nombre*</label>
              <input type="text" name="nombre" required value="<?= $orden[0]['nombre'] ?>">
            </div> 
            <div data-field-span="5">
              <label>Dirección*</label>
              <input type="text" name="direccion" required value="<?= $orden[0]['direccion'] ?>">
            </div>
          </div>
          <div data-row-span=12 style="border-right: solid 3px;border-left: solid 3px;">
            <div data-field-span="3">
              <label>Fecha*</label>
              <input type="date" name="fecha" required value="<?= $orden[0]['fecha'] ?>">
            </div>
            <div data-field-span="2">
              <label>Colonia*</label>
              <input type="text" name="colonia" required value="<?= $orden[0]['colonia'] ?>">
            </div>
            <div data-field-span="2">
              <label>Población*</label>
              <input type="text" name="poblacion" required value="<?= $orden[0]['poblacion'] ?>">
            </div>
            <div data-field-span="5">
              <label>Entre calles*</label>
              <input type="text" name="entre_calles" required value="<?= $orden[0]['entre_calles'] ?>">
            </div>
          </div>
          <div data-row-span=12 class="mb-1" style="border-right: solid 3px;border-left: solid 3px;border-bottom: solid 3px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
            <div data-field-span="3">
              <label>Teléfono*</label>
              <input type="number" name="telefono" required value="<?= $orden[0]['telefono'] ?>">
            </div>
            <div data-field-span="3">
              <label>Celular</label>
              <input type="number" name="celular" value="<?= $orden[0]['celular'] ?>">
            </div>
            <div data-field-span="3">
              <label>Latitud*</label>
              <input type="text" id="latitud" name="latitud" required value="<?= $orden[0]['latitud'] ?>">
            </div>
            <div data-field-span="3">
              <label>Longitud*</label>
              <input type="text" id="longitud" name="longitud" required value="<?= $orden[0]['longitud'] ?>">
            </div>
          </div>
          <div data-row-span=12 class="mb-1" style="border-left: solid 3px;border-right: solid 3px;border-bottom: solid 3px;border-top: solid 3px;border-top-right-radius: 5px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
            <div data-field-span="12">
              <label>Servicios a realizar*</label>
              <input type="text" name="servicios_realizar" required value="<?= $orden[0]['servicios_realizar'] ?>">
            </div>
          </div>
          <div data-row-span=12 style="border: solid 3px;border-radius: 5px;">
            <div data-field-span="6">
              <label>Generó Orden*</label>
              <input type="text" name="genero_orden" required value="<?= $orden[0]['genero_orden'] ?>">
            </div>
            <div data-field-span="6">
              <label>Observaciones</label>
              <input type="text" name="observaciones" value="<?= $orden[0]['observaciones'] ?>">
            </div>
            <!--<div data-field-span="2">
              <label>Servicio*</label>
              <input type="radio" <?= $orden[0]['tipo_servicio'] === 'F.O' ? 'checked' : '' ?> value="F.O" name="tipo_servicio" required> &nbsp;<span class="label-check">F.O</span>
              <input type="radio" <?= $orden[0]['tipo_servicio'] === 'Wireless' ? 'checked' : '' ?> value="Wireless" name="tipo_servicio" required> &nbsp;<span class="label-check">Wireless</span>
            </div>
            <div data-field-span="2">
              <label>Televisores Adicionales</label>
              <input type="number" name="televisores_adicionales" value="<?= $orden[0]['televisores_adicionales'] ?>">
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
              <input type="radio" <?= $orden[0]['tipo_servicio'] === 'F.O' ? 'checked' : '' ?> value="F.O" name="tipo_servicio" required> &nbsp;<span class="label-check" style="font-size: 13px;">F.O</span>
              <input type="radio" <?= $orden[0]['tipo_servicio'] === 'Wireless' ? 'checked' : '' ?> value="Wireless" name="tipo_servicio" required> &nbsp;<span class="label-check" style="font-size: 13px;">Wireless</span>
            </div>
            <div data-field-span="2">
              <label>Televisores Adicionales</label>
              <input type="number" name="televisores_adicionales" value="<?= $orden[0]['televisores_adicionales'] ?>">
            </div>
          </div>          
          <div class="fo" data-row-span=12 style="display: none;border-left: solid 3px;border-right: solid 3px;border-top: solid 3px;border-top-left-radius: 5px;border-top-right-radius: 5px;">
            <legend>Equipos instalados F.O</legend>
            <div data-field-span="2">
              <label>Terminal Óptica</label>
              <input type="text" name="terminal_optica" value="<?= $orden[0]['terminal_optica'] ?>">
            </div>
            <div data-field-span="2">
              <label>Pto</label>
              <input type="text" name="pto" value="<?= $orden[0]['pto'] ?>">
            </div>
            <div data-field-span="4">
              <label>Candado</label>
              <input type="text" name="candado" value="<?= $orden[0]['candado'] ?>">
            </div>
            <div data-field-span="4">
              <label>No. serie</label>
              <input type="text" name="no_serie_fo" value="<?= $orden[0]['no_serie_fo'] ?>">
            </div>
          </div>
          <div class="fo mb-1" data-row-span=12 style="display: none;border-left: solid 3px;border-right: solid 3px;border-bottom: solid 3px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
            <div data-field-span="3">
              <label>No. GPON</label>
              <input type="text" name="no_gpon" value="<?= $orden[0]['no_gpon'] ?>">
            </div>
            <div data-field-span="3">
              <label>MAC</label>
              <input type="text" name="mac" value="<?= $orden[0]['mac'] ?>">
            </div>
            <div data-field-span="3">
              <label>IP</label>
              <input type="text" name="ip_fo" value="<?= $orden[0]['ip_fo'] ?>">
            </div>
            <div data-field-span="3">
              <label>Clave</label>
              <input type="text" name="clave" value="<?= $orden[0]['clave'] ?>">
            </div>
          </div>                    
          <div class="wireless mb-1" data-row-span=12 style="display: none;border: solid 3px;border-radius: 5px;">
            <legend>Equipos instalados wireless</legend>
            <div data-field-span="6">
              <label>Torre</label>
              <input type="text" name="torre" value="<?= $orden[0]['torre'] ?>">
            </div>
            <div data-field-span="6">
              <label>Sector</label>
              <input type="text" name="sector" value="<?= $orden[0]['sector'] ?>">
            </div>
          </div>
          <div class="wireless mb-1" data-row-span=12 style="display: none;border: solid 3px;">
            <legend>Antena cliente suscript module</legend>
            <div data-field-span="3">
              <label>No. serie</label>
              <input type="text" name="no_serie_wireless" value="<?= $orden[0]['no_serie_wireless'] ?>">
            </div>
            <div data-field-span="3">
              <label>MAC ESN</label>
              <input type="text" name="mac_esn" value="<?= $orden[0]['mac_esn'] ?>">
            </div>
            <div data-field-span="3">
              <label>Wireless MAC</label>
              <input type="text" name="wireless_mac" value="<?= $orden[0]['wireless_mac'] ?>">
            </div>
            <div data-field-span="3">
              <label>IP</label>
              <input type="text" name="ip_wireless" value="<?= $orden[0]['ip_wireless'] ?>">
            </div>
          </div>
          <div class="wireless mb-1" data-row-span=12 style="display: none;border: solid 3px;">
            <legend>Modem</legend>
            <div data-field-span="3">
              <label>No. serie</label>
              <input type="text" name="no_serie_modem" value="<?= $orden[0]['no_serie_modem'] ?>">
            </div>
            <div data-field-span="3">
              <label>MAC ESN</label>
              <input type="text" name="mac_esn_modem" value="<?= $orden[0]['mac_esn_modem'] ?>">
            </div>
            <div data-field-span="3">
              <label>IP</label>
              <input type="text" name="ip_modem" value="<?= $orden[0]['ip_modem'] ?>">
            </div>
            <div data-field-span="3">
              <label>Password</label>
              <input type="text" name="password" value="<?= $orden[0]['password'] ?>">
            </div>
          </div>          
          <div data-row-span=12 class="mb-1" style="border: solid 3px;border-radius: 5px;">
            <div data-field-span="3">
              <label>Potencia*</label>
              <input type="text" name="potencia" required value="<?= $orden[0]['potencia'] ?>">
            </div>
            <div data-field-span="2">
              <label>Cap. de servicio*</label>
              <input type="text" name="cap_servicio" required value="<?= $orden[0]['cap_servicio'] ?>">
            </div>
            <div data-field-span="3">
              <label>Fecha llegada al servicio*</label>
              <input type="date" name="fecha_llegada_servicio" required value="<?= $orden[0]['fecha_llegada_servicio'] ?>">
            </div>
            <div data-field-span="2">
              <label>Hora inicio*</label>
              <input type="text" name="hora_inicio" readonly="readonly" required value="<?= $orden[0]['hora_inicio'] ?>">
            </div>
            <div data-field-span="2">
              <label>Hora Fin</label>
              <input type="text" name="hora_fin" value="<?= $orden[0]['hora_fin'] ?>">
            </div>
          </div>
          <div data-row-span=12 class="mb-1" style="border: solid 3px;border-radius: 5px;">
            <div data-field-span="6">
              <label>Comentarios cliente</label>
              <textarea name="comentarios_cliente"><?= $orden[0]['comentarios_cliente'] ?></textarea>
            </div>
            <div data-field-span="6">
              <label>Comentarios técnico</label>
              <textarea name="comentarios_tecnico"><?= $orden[0]['comentarios_tecnico'] ?></textarea>
            </div>
          </div>
          <div data-row-span=12 style="border: solid 3px;border-radius: 5px;">
            <div data-field-span="6">
              <center>
                <img class="img-fluid" src="<?= base_url(); ?>uploads/firmas/<?= $uid ?>fc.png">
                <p style="border-bottom-style: solid;"></p>
                <p>Firma del cliente</p>
              </center>
            </div>
            <div data-field-span="6">
              <center>
                <img class="img-fluid" src="<?= base_url(); ?>uploads/firmas/<?= $uid ?>ft.png">
                <p style="border-bottom-style: solid;"></p>
                <p>Firma del técnico</p>
              </center>
            </div>
          </div>
          <input type="hidden" value="<?= $orden[0]['estatus'] ?>" name="estatus_orden">
        </fieldset>
        <div class="clearfix pt-md">
          <div class="pull-right">
            <a href="<?= base_url();?>servicios/ordenes" class="btn btn-default">Cancelar</button></a>
            <?php if($this->session->userdata('permisos')['orden_servicio'] == 2 && $orden[0]['estatus'] == null) { ?>
              <!--<a href="<?= base_url();?>" class="btn btn-default">Cancelar</button></a>-->
              <?= form_hidden('token',$token) ?>
              <button type="submit" class="btn-primary btn">Guardar Orden de Servicio</button>
            <?php } else { ?>
              <?php if($orden[0]['estatus'] == null && $this->session->userdata('permisos')['orden_servicio'] == 3 && $this->session->userdata('tipo') == 9) { ?>
                <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Orden de Servicio</button>
                <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y Aprobar Orden de Servicio</button>
                <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Orden de Servicio</button>
              <?php } ?>
              <?php if($orden[0]['estatus'] == 'aprobada pm' && $this->session->userdata('permisos')['orden_servicio'] == 3 && $this->session->userdata('tipo') == 4) { ?>
                <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Orden de Servicio</button>
                <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Orden de Servicio</button>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>


<?php if($bandera != null) { ?>
  <section class="forms">   
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Relación de materiales utilizados modificar</h3>
          <a class="btn btn-info ml-auto" href="<?php echo base_url() ?>Servicios/imprimirDetalleMaterial/<?= $tipo_servicio ?>/<?=  $uid; ?>" onClick="openWin(this)">
            Imprimir Detalle del Material
          </a>
        </div>
        <div class="card-body">
          <?= form_open('servicios/actualizar_material', 'class="grid-form needs-validation" novalidate'); ?>
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
                    <?php foreach($materiales as $material) { ?>
                    <tr>
                      <input type="hidden" name="iddtl_solicitud_material_orden_servicio[]" value="<?= $material->iddtl_solicitud_material_orden_servicio ?>">
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->descripcion ?>' name="descripcion[]"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->unidad ?>' name="unidad[]"></td>
                      <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $material->cantidad ?>" name="cantidad[]"></td>
                    </tr>
                    <?php } ?>
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
                    <?php foreach($materiales as $material) { ?>
                    <tr>
                      <input type="hidden" name="iddtl_solicitud_material_orden_servicio[]" value="<?= $material->iddtl_solicitud_material_orden_servicio ?>">
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->descripcion ?>' name="descripcion[]"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->unidad ?>' name="unidad[]"></td>
                      <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $material->cantidad ?>" name="cantidad[]"></td>
                    </tr>
                    <?php } ?>
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
                <?php if(($this->session->userdata('permisos')['orden_servicio'] == 2 || $this->session->userdata('permisos')['orden_servicio'] == 3) && $materiales[0]->estatus == null) { ?>
                  <button type="submit" class="btn-primary btn">Guardar Material</button>
                <?php } ?>
              </div>
            </div>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<?php if($bandera == null) { ?>
  <section class="forms">   
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Relación de materiales utilizados crear</h3>
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
                <?php if($this->session->userdata('permisos')['orden_servicio'] == 2) { ?>
                  <button type="submit" class="btn-primary btn">Guardar Material</button>
                <?php } ?>
              </div>
            </div>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<script>
  $(document).ready(function() {
    if($('input:radio[name=tipo_servicio]:checked').val() == 'F.O') {
          $(".wireless").css('display','none');
          $(".fo").css('display','block');
    }
    if($('input:radio[name=tipo_servicio]:checked').val() == 'Wireless') {
      $(".fo").css('display','none');
      $(".wireless").css('display','block');
    }
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
    mapa.innerHTML = '<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=es&amp;q='+document.getElementById("latitud").value+','+document.getElementById("longitud").value+'&amp;t=&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>'
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
      mapa.innerHTML = '<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=es&amp;q='+document.getElementById("latitud").value+','+document.getElementById("longitud").value+'&amp;t=&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>'
    };

    function error(error) {
      console.warn('ERROR(' + error.code + '): ' + error.message);
    };
  })
</script>

<script>
  $('#aprobar').click(function(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea aprobar la orden de servicio?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).
    then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>servicios/aprobar_orden_servicio",
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
      text: "¿Desea cancelar la orden de servicio?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).
    then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>servicios/cancelar_orden_servicio",
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

  $('#modificar').click(function(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea modificar y aprobar la orden de servicio?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).
    then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>servicios/modificar_aprobar_orden_servicio",
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
  function openWin(obj) {
    event.preventDefault();
    myWindow = window.open(obj.getAttribute("href"), '_blank', 'width=1000,height=800,left=0,top=0');
    myWindow.document.close(); //missing code
    myWindow.focus();
    myWindow.print();
  }
</script>