  <section class="forms">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Relación de materiales.</h3>
        </div>
        <div class="card-body">
          <?= form_open('', 'class="needs-validation" novalidate id="guardar_solicitud_servicio"'); ?>
            <div class="clearfix pt-md">
              <div class="row">
                <h3 class="col-12 text-center">Ubicación</h3>
              </div>
              <?php if($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19){ ?>
              <div class="row">
                <!--<div class="col-md-5">
                  <label>Latitud*</label>
                  <input class="form-control" type="text" id="latitud" name="latitud" <?= $detalle[0]->estatus != "SV" || $detalle[0]->estatus != "SP" ? "value='" . $detalle[0]->latitud ."'" : "" ?>  required readonly>
                </div>
                <div class="col-md-5">
                  <label>Longitud*</label>
                  <input class="form-control" type="text" id="longitud" name="longitud" <?= $detalle[0]->estatus != "SV" || $detalle[0]->estatus != "SP" ? "value='" . $detalle[0]->longitud ."'" : "" ?> required readonly>
                </div>-->
                <div class="col-md-2">
                  <?php if(($this->session->userdata("tipo") == 9 || $this->session->userdata('tipo') == 21) AND $detalle[0]->estatus_solicitud_material == "S" AND ($detalle[0]->estatus == "SV" || $detalle[0]->estatus == "SP")){ ?>
                    <button type="button" id="find_btn" class="btn btn-primary btn-sm">Mostrar Ubicación</button>
                  <?php } ?>
                </div>
              </div>
              <?php } ?>
              <br>
              <div class="row">
                <div class="col-12">
                  <legend>
                    <div style="width: 100%; height: 600px;" id="mapa"></div>
                  </legend>
                </div>
              </div>
              <div class="row">
                <h3 class="col-12 text-center">Evidencia Fotografica</h3>
              </div>
              <?php if(($detalle[0]->estatus == 'SV' || $detalle[0]->estatus == "SP") && ($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19)){ ?>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Foto 1</label>
                    <input type="file" accept="image/*" class="form-control-file" name="foto1">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Foto 2</label>
                    <input type="file" accept="image/*" class="form-control-file" name="foto2">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Foto 3</label>
                    <input type="file" accept="image/*" class="form-control-file" name="foto3">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Foto 4</label>
                    <input type="file" accept="image/*" class="form-control-file" name="foto4">
                  </div>
                </div>
              <?php }elseif(($detalle[0]->estatus == "SV" || $detalle[0]->estatus == "cancelado") && ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19)){ ?>
                <?php }else{ ?>
                <div class="row">
                  <?php foreach ($imagenes as $imagen) { ?>
                    <div class="col-md-6 form-group">
                      <img style="display: block; width: 50%; margin:5px auto;" src="<?= base_url() . '/uploads/solicitud_servicio/' . $uid . '/' . $imagen ?>"/>
                    </div>
                  <?php } ?>
                </div>                
              <?php } ?>
              <?php if($detalle_generador[0]->idtbl_catalogo_mantenimientos != 396 && $detalle_generador[0]->idtbl_catalogo_mantenimientos != 397){ ?>
              <div class="row">
                <div class="col">
                <input type="hidden" value="<?= $uid ?>" name="uid">
                
                <h3 class="text-center">Avance</h3>
                <table class="table table-bordered" id="material">
                  <thead class="text-center">
                    <tr>
                      <th width="300">Supervisor</th>
                      <th>Fecha</th>
                      <th>Latitud</th>
                      <th>Longitud</th>
                      <th>Cantidad Tendido</th>
                      <th>Cantidad Total Tendido</th>
                      <th>Acumulado Anterior</th>                      
                      <th>Cantidad Rematado</th>
                      <th>Cantidad Total Rematado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $acumulado = 0; ?>
                    <?php $acumulado_tendido = 0; ?>
                    <?php if ($detalle[0]->estatus != 'SV') { ?>
                    <?php foreach ($kilometrajes as $key => $reporte) { ?>
                      <?php $acumulado_tendido = $acumulado_tendido + $reporte->kilometraje_tendido; ?>
                    <tr>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $reporte->nombre ?>">
                      </td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $reporte->fecha_justificacion ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $reporte->latitud ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $reporte->longitud ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= $reporte->kilometraje_tendido ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= number_format($acumulado_tendido, 4, '.', '') ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= number_format($acumulado, 4, '.', '') ?>" data-value=""></td>                      
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= number_format($reporte->kilometraje, 4, '.', '') ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= number_format($acumulado + $reporte->kilometraje, 4, '.', '') ?>"></td>
                    </tr>
                    <?php $acumulado = $acumulado + $reporte->kilometraje; ?>
                    <?php } ?>
                    <?php } ?>
                    <?php if ($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19) { ?>
                    <tr>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $this->session->userdata('nombre') ?>">
                      </td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= date('Y-m-d H:i:s') ?>"></td>
                      <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" id="latitud" name="latitud" required readonly></td>
                      <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" id="longitud" name="longitud" required readonly></td>
                      <td><input style="font-size: 10px;text-align: center;" type="number" name="tendido" step="0.0001" id="tendido" class="form-control" placeholder="Tendido"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" type="number" step="0.0001" id="tendido" class="form-control" placeholder="Tendido"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= $acumulado ?>" data-value=""></td>
                      <td><input style="font-size: 10px;text-align: center;" type="number" name="kilometraje" step="0.0001" id="kilometraje" class="form-control" placeholder="Metros"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value=""></td>
                    </tr>
                    <?php } ?>
                    <input type="hidden" class="form-control" name="id_lider" value="<?= $detalle[0]->tbl_usuarios_idtbl_usuarios ?>">
                  </tbody>
                </table>
                </div>
              </div>
              <?php }else{ ?>
                <div class="row">
                <div class="col">
                <input type="hidden" value="<?= $uid ?>" name="uid">
                
                <h3 class="text-center">Avance</h3>
                <table class="table table-bordered" id="material">
                  <thead class="text-center">
                    <tr>
                      <th width="300">Supervisor</th>
                      <th>Fecha</th>
                      <th>Latitud</th>
                      <th>Longitud</th>                      
                      <th>Acumulado Anterior</th>                      
                      <th>Cantidad Splitter</th>
                      <th>Cantidad Total Splitter</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $acumulado = 0; ?>
                    <?php $acumulado_tendido = 0; ?>
                    <?php if ($detalle[0]->estatus != 'SV') { ?>
                    <?php foreach ($kilometrajes as $key => $reporte) { ?>
                      <?php $acumulado_tendido = $acumulado_tendido + $reporte->kilometraje_tendido; ?>
                    <tr>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $reporte->nombre ?>">
                      </td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $reporte->fecha_justificacion ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $reporte->latitud ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $reporte->longitud ?>"></td>                      
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= $acumulado ?>" data-value=""></td>                      
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= $reporte->kilometraje ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= $acumulado + $reporte->kilometraje ?>"></td>
                    </tr>
                    <?php $acumulado = $acumulado + $reporte->kilometraje; ?>
                    <?php } ?>
                    <?php } ?>
                    <?php if ($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19) { ?>
                    <tr>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $this->session->userdata('nombre') ?>">
                      </td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= date('Y-m-d H:i:s') ?>"></td>
                      <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" id="latitud" name="latitud" required readonly></td>
                      <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" id="longitud" name="longitud" required readonly></td>                
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= $acumulado ?>" data-value=""></td>                      
                      <td><input style="font-size: 10px;text-align: center;" type="number" name="kilometraje" step="0.0001" id="kilometraje" class="form-control" placeholder="Piezas"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value=""></td>                      
                    </tr>
                    <?php } ?>
                    <input type="hidden" class="form-control" name="id_lider" value="<?= $detalle[0]->tbl_usuarios_idtbl_usuarios ?>">
                  </tbody>
                </table>
                </div>
              </div>
                <?php } ?>
              <br>

              <?php if(isset($observaciones[0]->nombre)){ ?>
                <div class="row">
                <div class="col">
                <input type="hidden" value="<?= $uid ?>" name="uid">
                
                <h3 class="text-center">Observaciones</h3>
                <table class="table table-bordered" id="material">
                  <thead class="text-center">
                    <tr>
                      <th width="300">Supervisor</th>
                      <th>Fecha</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Observaciones</th>
                    </tr>
                  </thead>
                  <tbody>                    
                    <?php if ($detalle[0]->estatus != 'SV') { ?>
                    <?php foreach ($observaciones as $key => $observacion) { ?>                      
                    <tr>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $observacion->nombre ?>">
                      </td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $observacion->fecha_justificacion ?>"></td>                                        
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $observacion->descripcion ?>"></td>                      
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= $observacion->cantidad ?>"></td>
                      <td><textarea readonly style="font-size: 10px;text-align: center;" class="form-control" rows="5" value=""><?= $observacion->observaciones ?></textarea></td>
                    </tr>                    
                    <?php } ?>
                    <?php } ?>                    
                  </tbody>
                </table>
                </div>
              </div>
                <?php } ?>
                <br>
              <div class="row">
                <div class="col">
                <input type="hidden" value="<?= $uid ?>" name="uid">
                
                <h3 class="text-center">Material</h3>
                <table class="table table-bordered" id="material">
                  <thead class="text-center">
                    <tr>
                      <th width="300">Descripción</th>
                      <th>Unidad</th>
                      <th>Solicitud</th>
                      <th>Entregado</th>
                      <th>Justificación</th>
                      <?php if ($detalle[0]->estatus == 'SP' || $detalle[0]->estatus == 'SPM') { ?>
                        <th>Devuelto</th>
                      <?php } ?>
                      <?php if($detalle[0]->estatus == 'SP' || $detalle[0]->estatus == 'SPM'){ ?>
                        <th>Diferencia</th>
                      <?php } ?> 
                      <th>Comprobación</th>                     
                      <th>Observaciones</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $id_solicitud = ''; ?>                    
                    <?php $i = 0; ?>
                    <?php $no_ceros = 0; ?>
                    <?php $index_justificado = 0; ?>
                    <?php $index_resta = 0; ?>
                    <?php $index_diferencia = 0; ?>
                    <?php foreach($detalleSolicitudMaterial as $material) { ?>
                      <?php if(isset($justificacion[$index_resta]->cantidad_total)){ ?>
                        <?php if($justificacion[$index_resta]->tbl_catalogo_idtbl_catalogo == $material->tbl_catalogo_idtbl_catalogo){ ?>
                        <?php $value_total = $material->entregado - $detalleAsignacionMaterial[$i]->entregado - $justificacion[$index_resta]->cantidad_total; ?>
                        <?php $index_resta++; ?>
                        <?php }else{ ?>
                          <?php $value_total = $material->entregado - $detalleAsignacionMaterial[$i]->entregado; ?>
                          <?php } ?>
                        <?php }else{ ?>
                          <?php $value_total = $material->entregado; ?>
                          <?php } ?>
                          <?php if(number_format($value_total, 4, '.', '') > 0){ ?>
                            <?php $no_ceros++; ?>
                            <?php } ?>
                        <?php $value_incompleto = $material->entregado - $detalleAsignacionMaterial[$i]->entregado; ?>
                    <tr class="<?= number_format($value_total, 4, '.', '') == 0 ? 'table-success' : '' ?>">
                    <input type="hidden" name="iddtl_solicitud_material[]" value="<?= $material->iddtl_solicitud_material ?>">                    
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->descripcion ?>' name="descripcion[]">                      
                      <input type="hidden" name="producto[]" class="form-control" value="<?= $material->tbl_catalogo_idtbl_catalogo ?>">    
                      <input type="hidden" name="iddtl_asignacion[]" value="<?= $detalleAsignacionMaterial[$i]->iddtl_asignacion ?>">
                      </td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->unidad ?>' name="unidad[]"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $material->cantidad ?>" name="cantidad[]"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $material->entregado ?>" name="entregado[]"></td>
                      <?php if(isset($justificacion[$index_justificado]->tbl_catalogo_idtbl_catalogo) && $justificacion[$index_justificado]->tbl_catalogo_idtbl_catalogo == $material->tbl_catalogo_idtbl_catalogo){ ?>
                      <td><input required style="font-size: 10px;text-align: center;" class="form-control" type="number" step="0.0001" value="<?= ($detalle[0]->estatus != "SV" && ($this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 17) && isset($justificacion[$index_justificado]->cantidad_total)) ? $justificacion[$index_justificado]->cantidad_total : 0 ?>" name="cantidad_justificacion[]" <?php if($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19){ ?>max="<?= number_format($value_total, 4, '.', '') ?>"<?php } ?> <?= number_format($value_total, 4, '.', '') == 0 ? 'readonly' : '' ?>></td>
                      <?php $index_justificado++; ?>
                      <?php }else{ ?>
                        <td><input required style="font-size: 10px;text-align: center;" class="form-control" type="number" step="0.0001" value="<?= ($detalle[0]->estatus != "SV" && ($this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 17) && isset($justificacion[$i]->cantidad_total)) ? 0 : 0 ?>" name="cantidad_justificacion[]" <?php if($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19){ ?>max="<?= number_format($value_total, 4, '.', '') ?>"<?php } ?> <?= number_format($value_total, 4, '.', '') == 0 ? 'readonly' : '' ?>></td>
                        <?php } ?>
                      <?php if ($detalle[0]->estatus == 'SP' || $detalle[0]->estatus == 'SPM') { ?>
                        <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" value="<?= $detalleAsignacionMaterial[$i]->entregado ?>" name="devuelto[]"></td>
                      <?php } ?>
                      <?php if ($detalle[0]->estatus == 'SP' || $detalle[0]->estatus == 'SPM') { ?>                        
                        <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="number" step="0.0001" <?= isset($justificacion[$index_justificado-1]->cantidad_total) ? "value='".number_format($value_total, 4, '.', '')."'" : "value='".number_format($value_incompleto, 4, '.', '')."'" ?> name="diferencia[]"></td>
                      <?php } ?>
                      <td><input type="number" name="comprobacion[]" class="form-control" style="font-size: 10px; text-align: center;" <?= ($this->session->userdata('id') == 180) ? '' : 'readonly' ?> placeholder="Comprobar" value="<?= $material->comprobacion ?>"></td>
                      <td><input type="text" name="observacion[]" class="form-control" style="font-size: 10px; text-align: center;" <?= ($this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 21) ? '' : 'readonly' ?> placeholder="Observaciones" value="<?= $detalle[0]->estatus != "SV" ? "" : "" ?>"></td>
                      <?php if($this->session->userdata('tipo') == 0){ ?>
                        <td align='center'><a href='#devolucion_material' data-asignacion="<?= $detalleAsignacionMaterial[$i]->iddtl_asignacion ?>" data-diferencia="<?= isset($justificacion[$index_justificado-1]->cantidad_total) ? number_format($value_total, 4, '.', '') : number_format($value_incompleto, 4, '.', '') ?>" title='Devolver' data-toggle='modal'><i class='fa fa-check-circle' style="color: green;"></i></a></td>
                      <?php } ?>
                    </tr>
                    <?php $id_solicitud = $material->iddtl_solicitud_material; ?>
                    <?php $i++; ?>
                    <?php } ?>
                  </tbody>
                </table>
                </div>
              </div>
              <?php if($detalle[0]->estatus == 'SP' && ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19) && $detalle[0]->tbl_clientes_idtbl_clientes == 4){ ?>
                <br>
                <div class="row">
                  <div class="col-md-4">
                    <label>ID Panda</label>
                    <input type="text" name="id_panda" id="id_panda" class="form-control" placeholder="ID Panda">
                  </div>
                </div>
                <?php } ?>
                
                <?php if(($detalle[0]->estatus == 'SV' || $detalle[0]->estatus == "SP") && ($this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 21)){ ?>
                <br>
                <!--<div class="row">
                  <div class="col-md-4">
                    <label>Kilometraje Avanzado</label>
                    <input type="number" name="kilometraje" step="0.0001" id="kilometraje" class="form-control" placeholder="Kilometraje">
                  </div>
                </div>-->
                <!--<label>Brazo Destino</label>
                <select name="brazo_destino" class="form-control">
                  <option value="" selected>Seleccione...</option>
                <?php foreach($brazos AS $key => $value){ ?>
                    <option value="<?= $value->idtbl_mantenimientos ?>"><?= $value->nombre_oracle ?></option>
                  <?php } ?>
                </select>-->
                <?php } ?>
                <br>
              <div class="row">
                <div class="col">
                <input type="hidden" value="<?= $uid ?>" name="uid">
                
                <h3 class="text-center">Materiales extemporáneos</h3>
                <table class="table table-bordered" id="material">
                  <thead class="text-center">
                    <tr>
                      <th>Neodata</th>
                      <th>Descripción</th>
                      <th>Cantidad</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($materialesExtemporaneos as $material) { ?>
                    <tr>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->neodata ?>'></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $material->descripcion ?>"></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $material->cantidad ?>"></td>
                    <?php } ?>
                  </tbody>
                </table>
                </div>
              </div>
                <br>
                <input type="hidden" name="proyecto" value="<?= $detalle[0]->tbl_proyectos_idtbl_proyectos ?>" class="form-control">
                <input type="hidden" name="segmento" value="<?= $detalle[0]->tbl_segmentos_proyecto_idtbl_segmentos_proyecto ?>" class="form-control">
              <div class="text-center">
                <?php if(($this->session->userdata("tipo") == 9 && $detalle[0]->estatus_solicitud_material == "S" && ($this->session->userdata('id') == $detalle[0]->tbl_users_idtbl_users_supervisor) && ($detalle[0]->estatus == "SV" || $detalle[0]->estatus == "SP")) || ($this->session->userdata('tipo') == 21 && $detalle[0]->estatus_solicitud_material == "S" && ($detalle[0]->estatus == "SV" || $detalle[0]->estatus == "SP"))){ ?>
                  <!--<a href="<?= base_url() ?>almacen/mantenimientos" class="btn btn-default">Cancelar</a>-->
                  <input type="hidden" class="form-control" name="idtbl_mantenimientos" value="<?= $detalle[0]->idtbl_mantenimientos ?>">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('uid',$uid) ?>
                  <!--<button id="traspasar" type="reset" class="btn-success btn">Traspasar</button>-->
                  <button type="submit" class="btn-primary btn">Guardar</button>
                  <?php } else if($detalle[0]->estatus_solicitud_material != "S" AND $detalle[0]->estatus == "SV"){ ?>
                  <p class="text-danger" style="padding: 30px 0px;">Solicitud de almacen pendiente de aprobación.</p>                
                  <?php } else if($detalle[0]->estatus_solicitud_material != "S" AND $detalle[0]->estatus == "SV"){ ?>
                  <p class="text-danger" style="padding: 30px 0px;">Solicitud de almacen pendiente de aprobación.</p>
                  <?php } ?>
                

                  <?php if($detalle[0]->tbl_clientes_idtbl_clientes == 3){ ?>
                    <a href="<?= base_url() ?>almacen/generador-zte" class="btn btn-default">Regresar</a>
                    <?php }else{ ?>
                      <a href="<?= base_url() ?>almacen/mantenimientos" class="btn btn-default">Regresar</a>
                      <?php } ?>
                <?php if(($this->session->userdata("tipo") == 17 || $this->session->userdata('tipo') == 19) && $detalle[0]->estatus_solicitud_material == "S" && $detalle[0]->estatus == "SP"){ ?>                  
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('uid',$uid) ?>
                  <button type="submit" class="btn-primary btn">Verificar</button>
                <?php } ?>
                <?php if(($this->session->userdata("tipo") == 21 && $this->session->userdata('id') == 216) && $detalle[0]->estatus_solicitud_material == "S" && $detalle[0]->estatus == "SP"){ ?>                  
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('uid',$uid) ?>
                  <button type="reset" id="verificar" class="btn-primary btn">Verificar</button>
                <?php } ?>
                <?php if(($this->session->userdata("tipo") == 21 && $this->session->userdata('id') != 216) && $detalle[0]->estatus_solicitud_material == "S" && $detalle[0]->estatus == "SPP"){ ?>
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('uid',$uid) ?>
                  <button type="reset" id="verificar" class="btn-primary btn">Aprobar Verificación</button>
                <?php } ?>
                <?php if(($this->session->userdata("tipo") == 19 || $this->session->userdata('tipo') == 17) && $detalle[0]->estatus_solicitud_material == "S" && $detalle[0]->estatus == "APM"){ ?>
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('uid',$uid) ?>
                  <button type="reset" id="verificar" class="btn-primary btn">Aprobar Verificación</button>
                <?php } ?>
                <?php if(($this->session->userdata("tipo") == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 21) && ($detalle[0]->estatus == "SV" || $detalle[0]->estatus == "SP") && $detalle[0]->tbl_users_idtbl_users_supervisor != NULL){ ?>
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('uid',$uid) ?>
                  <a href="<?= base_url() ?>almacen/solicitud/<?= $detalle[0]->idtbl_mantenimientos ?>" class="btn-primary btn">Agregar Materiales</a>
                <?php } ?> 
                <?php if(($this->session->userdata("tipo") == 17 || $this->session->userdata('tipo') == 19) && $detalle[0]->estatus == "SPM"){ ?>                  
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('uid',$uid) ?>
                  
                    <button type="reset" id="finalizar" class="btn-primary btn">Finalizar Generador</button>
                  
                    <a href="<?= base_url() ?>almacen/devolucion-generador/<?= $detalle[0]->uid ?>" class="btn-primary btn">Agregar Devolución</a>
                    
                <?php } ?>
                <?php if($this->session->userdata("id") == 180){ ?>                  
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('uid',$uid) ?>
                  <a href="<?= base_url() ?>almacen/solicitud/<?= $detalle[0]->idtbl_mantenimientos ?>" class="btn-primary btn">Agregar Materiales Extemporáneos</a>
                    <button type="reset" id="comprobar" class="btn-info btn">Finalizar Comprobación</button>
                
                    
                <?php } ?>
              </div>
            </div>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </section>

  <div id="devolucion_material" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open(base_url() . 'almacen/devolver-material-generador') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Verificar devolución</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">                
                <div class="row">                    
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>UID Devolución</label>
                            <input type="text" placeholder="UID" name="uid_devolucion" class="form-control" required>
                        </div>
                    </div>
                    <input type="hidden" placeholder="0" name="idasignacion" class="form-control" required>
                    <input type="hidden" placeholder="0" name="uid_servicio" value="<?= $uid ?>" class="form-control" required>
                    <input type="hidden" placeholder="0" name="diferencia" class="form-control" required>
                    <input type="hidden" name="estatusanterior">
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('uid', '') ?>
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

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
  });
</script>

<script>
$('#devolucion_material').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='idasignacion']").val(recipient.asignacion);
    modal.find("input[name='diferencia']").val(recipient.diferencia);
    modal.find("select[name='inventariado']").val(recipient.inventariado);
    modal.find("select[name='rack']").val(recipient.rack);
    modal.find("select[name='modulo']").val(recipient.modulo);
    modal.find("select[name='nivel']").val(recipient.nivel);
    modal.find("input[name='maximo']").val(recipient.maximo);
});
</script>

<script>
  function mapaPosicionActual(){
    <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
    <?php if($detalle[0]->tbl_clientes_idtbl_clientes == 3){ ?>
      var mantenimiento = <?= $detalle[0]->idtbl_mantenimientos ?>;
      var map = L.map('mapa').setView([19.543574, -99.196460], 13);

      //L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png', {
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        detectRetina: true,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);
             
    $.ajax({
      type:"POST",
      url:base_url+'almacen/getGeoreferencias',
      data:'id=' + mantenimiento,
      success:function(r) {
        let registros = eval(r);
        lat_a = registros[0]['lat_a'];
        lon_a = registros[0]['lon_a'];
        lat_b = registros[0]['lat_b'];
        lon_b = registros[0]['lon_b'];
        //alert(punto_a);
        L.marker([lat_a, lon_a]).addTo(map).bindPopup(
            'Inicio.'
        ).openPopup();
        
        if (lat_b != null && lon_b != null) {
            L.marker([lat_b, lon_b]).addTo(map).bindPopup(
                'Final.'
            ).openPopup();
        }
      }
    });

    <?php if ($detalle[0]->estatus == "SP") { ?>
      $.ajax({
      type:"POST",
      url:base_url+'almacen/getGeoreferenciasJustificadas',
      data:'id=' + mantenimiento,
      success:function(r) {
        let registros = eval(r);                       
        var dia = 1;
        var myIcon = L.icon({
            iconUrl: base_url + 'img/marker-green.png',
            iconSize: [25, 41],
            shadowUrl: base_url + 'img/marker-shadow.png',
            shadowSize: [55, 41],            
        });
        for(i = 0; i < registros.length; i++) {
          lat = registros[i]['latitud'];
          lon = registros[i]['longitud'];
          
          L.marker([lat, lon], {icon: myIcon}).addTo(map).bindPopup(
            'Día ' + dia
          ).openPopup();
          dia++;
        }
      }
    });
    <?php } ?>
                
    <?php }else{ ?>
      var map = L.map('mapa').setView([19.543574, -99.196460], 13);

      //L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png', {
      L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        detectRetina: true,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker([19.543574, -99.196460]).addTo(map).bindPopup(
        'Primer punto.'
      ).openPopup();

      L.marker([19.549397, -99.037481]).addTo(map).bindPopup(
        'Segundo punto.'
      ).openPopup();
      <?php } ?>

    <?php }else{ ?>
    
    var mapa = document.getElementById("mapa");
    var options = {
      enableHighAccuracy: true,
      timeout: 6000,
      maximumAge: 0
    };
    navigator.geolocation.getCurrentPosition( success, error, options );
    function success(position) {
      <?php if ($detalle[0]->estatus == "SV" || $detalle[0]->estatus == "SP") { ?>
        var coordenadas = position.coords;
        console.log('Tu posición actual es:');
        console.log('Latitud : ' + coordenadas.latitude);
        console.log('Longitud: ' + coordenadas.longitude);
        console.log('Más o menos ' + coordenadas.accuracy + ' metros.');
        document.getElementById("latitud").value = coordenadas.latitude;
        document.getElementById("longitud").value = coordenadas.longitude;
      <?php } ?>
      mapa.innerHTML = '<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=es&amp;q='+document.getElementById("latitud").value+','+document.getElementById("longitud").value+'&amp;t=&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>'
    };
    function error(error) {
      console.warn('ERROR(' + error.code + '): ' + error.message);
    };
    <?php } ?>
    
  }
  mapaPosicionActual();
  <?php if($detalle[0]->estatus == "SV" || $detalle[0]->estatus == "SP"){ ?>
    $("#find_btn").click(function() {
      mapaPosicionActual();
    });
  <?php } ?>
</script>

<script>
  $("#traspasar").click(function(event){
    var formData = new FormData(document.getElementById("guardar_solicitud_servicio"));
    event.preventDefault();    
    var inputs_justificado = $("#guardar_solicitud_servicio").find("input[name='cantidad_justificacion[]']");
    for(var r=0; r<inputs_justificado.length; r++){
      var input_justificado = inputs_justificado[r];
      //alert($(input_justificado).val());
    }
    
      Swal.fire({
        title: '¡Atención!',
        text: "¿Esta seguro de traspasar el material?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?= base_url() ?>almacen/traspaso-brazo",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
              var resp = JSON.parse(res.responseText);
              if (resp.error == false) {
                Swal.fire(
                  '¡Exitoso!',
                  resp.message,
                  'success'
                );
                location.reload();
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                });
              }
            }
          });
        }
      });
    
  });


  $("#guardar_solicitud_servicio").submit(function(event){
    <?php if($this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 21){ ?>
    var latitud = $('#latitud').val();
    //alert(latitud);
    if(latitud == null || latitud == ''){
      Toast.fire({
            type: 'error',
            title: '¡No has activado tu ubicación!'
        });
        return 0;
    }
    <?php } ?>
    var formData = new FormData(this);
    event.preventDefault();
    if(!this.checkValidity()){
      return;
    }
    var alert_flag = false;
    var inputs_justificado = $("#guardar_solicitud_servicio").find("input[name='cantidad_justificacion[]']");
    for(var r=0; r<inputs_justificado.length; r++){
      var input_justificado = inputs_justificado[r];
      if($(input_justificado).val() != $(input_justificado).data("value")){
        alert_flag = true;
      }
    }
    if(alert_flag){
      Swal.fire({
        title: '¡Atención!',
        text: "Hay cambios en la cantidad de justificación ¿Desea continuar?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
        if (result.value) {
            guardarSolicitudServicio(formData);
        }
      });
    }else{
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea reportar el avance?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
      guardarSolicitudServicio(formData);
    });
    }
  });

  function guardarSolicitudServicio(formData){
    $.ajax({
      url: "<?= base_url() ?>almacen/guardarSolicitudServicio",
      type: "post",
      dataType: "json",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      complete: function(res) {
        var resp = JSON.parse(res.responseText);
        if (resp.error == false) {
          Swal.fire(
            '¡Exitoso!',
            resp.message,
            'success'
          );
          location.reload();
        } else {
          Toast.fire({
            type: 'error',
            title: resp.message
          });
        }
      }
    });
  }

  $('#finalizar').click(function(event) {
    var formData = new FormData(document.getElementById("guardar_solicitud_servicio"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Esta seguro de finalizar el generador?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?= base_url() ?>almacen/finalizarGenerador",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
              var resp = JSON.parse(res.responseText);
              if (resp.error == false) {
                Swal.fire(
                  '¡Exitoso!',
                  resp.message,
                  'success'
                );
                location.reload();
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                });
              }
            }
          });
        }
      });
  });

  $('#comprobar').click(function(event) {
    var formData = new FormData(document.getElementById("guardar_solicitud_servicio"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Esta seguro de finalizar la comprobación?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?= base_url() ?>almacen/comprobarGenerador",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
              var resp = JSON.parse(res.responseText);
              if (resp.error == false) {
                Swal.fire(
                  '¡Exitoso!',
                  resp.message,
                  'success'
                );
                location.reload();
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                });
              }
            }
          });
        }
      });
  });

  $('#verificar').click(function(event) {
    var formData = new FormData(document.getElementById("guardar_solicitud_servicio"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Esta seguro de verificar el generador?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?= base_url() ?>almacen/verificarGenerador",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
              var resp = JSON.parse(res.responseText);
              if (resp.error == false) {
                Swal.fire(
                  '¡Exitoso!',
                  resp.message,
                  'success'
                );
                location.reload();
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                });
              }
            }
          });
        }
      });
  });

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