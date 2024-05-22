<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="h4">Entrada</h4>
            <button class="btn btn-secondary btn-info float-right" id="btnImprimirDiv" tabindex="0">
              <span><i class="fa fa-print"></i> Imprimir</span>
          </div>
          <div class="card-body">
            <div class="grid-form">
              <fieldset>
                <div data-row-span="8">
                  <div data-field-span="1">
                    <label>Folio</label>
                    EA-<?= $detalle[0]->folio ?>
                  </div>
                  <div data-field-span="3">
                    <label>Fecha de creación</label>
                    <?= $detalle[0]->fecha ?>
                  </div>
                  <div data-field-span="4">
                    <label>Proyecto</label>
                    <?php if($detalle[0]->numero_proyecto != null && $detalle[0]->nombre_proyecto != null){ ?>
                    <?= $detalle[0]->numero_proyecto ?> - <?= $detalle[0]->nombre_proyecto ?>
                    <?php }else{ ?>
                      <?= $detalle[0]->almacen ?>
                    <?php } ?>
                  </div>
                </div>
                <div data-row-span="8">
                  <div data-field-span="2">
                    <label>Autor</label>
                    <?= $detalle[0]->nombre ?>
                  </div>
                  <div data-field-span="3">
                    <label>Segmento</label>
                    <?= $detalle[0]->nombre_segmento ?>
                  </div>
                </div>
                <?php if($detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                <div data-row-span="8">
                  <div data-field-span="6">
                    <label>Almacén Origen</label>
                    <?= $detalle[0]->nombre_almacen_origen ?>
                  </div>
                </div>
                <?php } ?>
                <?php if($detalle[0]->estatus == 2){ ?>
                <div data-row-span="8">
                  <div data-field-span="6">
                    <label>Motivo Cancelación</label>
                    <?= $detalle[0]->motivo_cancelacion ?>
                  </div>
                </div>
                <?php } ?>
              </fieldset>
            </div>
            <br><br>
            <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 1 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')){ ?>
              <?php echo form_open_multipart(base_url().'almacen/guardar-nueva-entrada-almacen-cliente', 'class="needs-validation" onsubmit="return checkSubmit();" id="formuploadajax" novalidate'); ?>
            <?php } else { ?>
              <?php echo form_open_multipart('', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
            <?php } ?>
            <table class="table table-striped table-bordered display responsive no-wrap" style="width:100%">
              <thead>
                <tr>
                  <th>Neodata<?= $detalle[0]->tipo_movimiento ?></th>
                  <th>Descripción</th>
                  <th>Numero de serie</th>
                  <th>Numero Interno</th>
                  <?php if($detalle[0]->movimiento_virtual == 3){ ?>
                  <th>Existencias</th>
                  <th>Cantidad Inicial</th>
                  <?php } ?>
                  <th>Cantidad Almacén</th>
                  <?php if($detalle[0]->movimiento_virtual == 3 && $detalle[0]->modificado == 1){ ?>
                  <th>Ingresar</th>
                  <?php } ?>
                  
                  <th>Cantidad PM</th>
                  
                  <?php if(($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 1) && $detalle[0]->tipo_movimiento != 'traspaso') || ($this->session->userdata('tipo') == 16 && $detalle[0]->estatus_contabilidad == 'Pendiente')){ ?>
                    <th>Entregado</th>
                  <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 16 && $this->session->userdata('id') == 50) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                    <th>Entregado</th>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 17 || $detalle[0]->idtbl_almacenes == 18 || $detalle[0]->idtbl_almacenes == 19 || $detalle[0]->idtbl_almacenes == 21 || $detalle[0]->idtbl_almacenes == 24 || $detalle[0]->idtbl_almacenes == 25 || $detalle[0]->idtbl_almacenes == 26 || $detalle[0]->idtbl_almacenes == 27) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                      <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 3 && ($detalle[0]->idtbl_almacenes == 29) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                      <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 1) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                      <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 1 && ($detalle[0]->idtbl_almacenes == 2) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                      <?php }else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && ($detalle[0]->tipo_almacen == 'externo' || $detalle[0]->tipo_almacen == 'interno') && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                    <?php }else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 10) && ($detalle[0]->idtbl_almacenes == 23) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                    <?php }?>
                    <?php if($detalle[0]->movimiento_virtual == 3 && $value->cantidad == $value->cantidad_anterior){ ?>
                      <th>Estatus</th>
                    <?php } ?>
                  <th>Unidad</th>
                  <th>Precio</th>
                  <th>Tipo Moneda</th>
                  <th>Nota</th>
                </tr>
              </thead>
              <tbody>
              <?php $incompletos = 0; ?>
              <?php $productos_enviar = array(); ?>
              <?php $index = 0; ?>
                <?php foreach ($detalle as $key => $value) { ?>
                  <?php if ($value->tipo_moneda == 'p') {
                    $moneda = 'Pesos';
                  } else {
                    $moneda = 'Dolares';
                  } ?>                  
                  <tr>
                    <td><?= $value->neodata ?></td>
                    <td><?= $value->descripcion ?></td>
                    <td><?= $value->numero_serie ?></td>
                    <td><?= $value->numero_interno ?></td>
                    <?php if($detalle[0]->movimiento_virtual == 3){ ?>
                      <td id="existencias_almacen_<?= $value->idtbl_catalogo ?>_<?= $key ?>"></td>
                    <?php } ?>
                    <td><?= $value->cantidad ?></td>                    
                    <td><?= $value->cantidad_anterior ?></td>
                    
                    
                    <?php if($detalle[0]->estatus == 0 || $detalle[0]->estatus == 1 && $detalle[0]->movimiento_virtual == 3){ ?>
                    <?php if($detalle[0]->movimiento_virtual == 3 && $value->cantidad != $value->cantidad_anterior && $value->cantidad_anterior != NULL){ ?>
                    <?php $incompletos++; ?>
                    <td>
                      <div id="d_<?= $value->idtbl_catalogo ?>_<?= $index ?>">
                      <input id="cantidad_<?= $value->idtbl_catalogo ?>_<?= $key ?>" type="number" class="form-control" min="0" max="<?= $value->cantidad_anterior - $value->cantidad ?>" name="entregado[]" placeholder="cantidad" required>
                      </div>
                      <input type="hidden" class="form-control" name="cantidad[]" placeholder="cantidad" value="<?= $value->cantidad ?>">
                      <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                      <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                      <input type="hidden" class="form-control" name="numero_serie[]" id="serie_<?= $key ?>" value="<?= $value->numero_serie ?>">
                      <input type="hidden" class="form-control" name="numero_interno[]" id="interno_<?= $key ?>" value="<?= $value->numero_interno ?>">
                      <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                      <input type="hidden" value="" name="idtbl_almacenes">
                      <input type="hidden" value="" name="tipo_almacenes">
                      <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                      <input type="hidden" class="form-control" name="id_detalle_explosion[]" value="<?= $value->dtl_almacen_movimientos_iddtl_almacen_movimientos ?>">

                    </td>
                    <?php array_push($productos_enviar, ["idtbl_catalogo" => $value->idtbl_catalogo, "idctl_categorias" => $value->idctl_categorias]) ?>                   
                    <?php }else{ ?>
                      <td>-</td>
                      <?php } ?>
                      <?php } ?>
                    <?php if($detalle[0]->movimiento_virtual == 3 && $value->cantidad == $value->cantidad_anterior){ ?>
                    <td>
                      Cantidad Total Ingresada
                    <?php array_push($productos_enviar, ["idtbl_catalogo" => $value->idtbl_catalogo, "idctl_categorias" => $value->idctl_categorias]) ?>
                    </td>
                    <?php }elseif($detalle[0]->movimiento_virtual == 3 && $value->cantidad != $value->cantidad_anterior){ ?>
                      <td>No se ha ingresado el total</td>
                      <?php } ?>
                    <?php if($detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                    <td><?= $value->cantidad_anterior ?></td>
                    <?php } ?>
                    <?php if(($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 1 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && $detalle[0]->tipo_movimiento != 'traspaso') || ($this->session->userdata('tipo') == 16 && $detalle[0]->estatus_contabilidad == 'Pendiente')){ ?>                      
                      <td>
                      <div id="d_<?= $value->idtbl_catalogo ?>_<?= $index ?>">
                      <input id="entregado_<?= $value->idtbl_catalogo ?>_<?= $key ?>" type="number" class="form-control" min="0" max="<?= $value->cantidad ?>" name="entregado[]" placeholder="cantidad" required>
                      </div>
                      <input id="cantidad_<?= $value->idtbl_catalogo ?>_<?= $key ?>" type="hidden" class="form-control" name="cantidad[]" placeholder="cantidad" value="<?= $value->cantidad ?>">
                      <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                      <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                      <input type="hidden" class="form-control" name="numero_serie[]" id="serie_<?= $key ?>" value="<?= $value->numero_serie ?>">
                      <input type="hidden" class="form-control" name="numero_interno[]" id="interno_<?= $key ?>" value="<?= $value->numero_interno ?>">
                      <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                      <input type="hidden" value="" name="idtbl_almacenes">
                      <input type="hidden" value="" name="tipo_almacenes">
                      <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                      <input type="hidden" class="form-control" name="id_detalle_explosion[]" value="<?= $value->dtl_almacen_movimientos_iddtl_almacen_movimientos ?>">
                    </td>
                    <?php array_push($productos_enviar, ["idtbl_catalogo" => $value->idtbl_catalogo, "idctl_categorias" => $value->idctl_categorias]) ?>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 16 && $this->session->userdata('id') == 50) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" name="entregado[]" placeholder="cantidad" required>
                      <input type="hidden" class="form-control" name="cantidad[]" placeholder="cantidad" value="<?= $value->cantidad ?>">
                      <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                      <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                      <input type="hidden" class="form-control" name="numero_serie[]" value="<?= $value->numero_serie ?>">
                      <input type="hidden" class="form-control" name="numero_interno[]" value="<?= $value->numero_interno ?>">
                      <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                      <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                      <input type="hidden" class="form-control" name="id_detalle_explosion[]" value="<?= $value->dtl_almacen_movimientos_iddtl_almacen_movimientos ?>">

                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 17 || $detalle[0]->idtbl_almacenes == 18 || $detalle[0]->idtbl_almacenes == 19 || $detalle[0]->idtbl_almacenes == 21 || $detalle[0]->idtbl_almacenes == 24 || $detalle[0]->idtbl_almacenes == 25 || $detalle[0]->idtbl_almacenes == 26 || $detalle[0]->idtbl_almacenes == 27) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" name="entregado[]" placeholder="cantidad" required>
                      <input type="hidden" class="form-control" name="cantidad[]" placeholder="cantidad" value="<?= $value->cantidad ?>">
                      <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                      <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                      <input type="hidden" class="form-control" name="numero_serie[]" value="<?= $value->numero_serie ?>">
                      <input type="hidden" class="form-control" name="numero_interno[]" value="<?= $value->numero_interno ?>">
                      <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                      <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                      <input type="hidden" class="form-control" name="id_detalle_explosion[]" value="<?= $value->dtl_almacen_movimientos_iddtl_almacen_movimientos ?>">

                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 3 && ($detalle[0]->idtbl_almacenes == 29) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" name="entregado[]" placeholder="cantidad" required>
                      <input type="hidden" class="form-control" name="cantidad[]" placeholder="cantidad" value="<?= $value->cantidad ?>">
                      <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                      <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                      <input type="hidden" class="form-control" name="numero_serie[]" value="<?= $value->numero_serie ?>">
                      <input type="hidden" class="form-control" name="numero_interno[]" value="<?= $value->numero_interno ?>">
                      <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                      <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                      <input type="hidden" class="form-control" name="id_detalle_explosion[]" value="<?= $value->dtl_almacen_movimientos_iddtl_almacen_movimientos ?>">

                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 1) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" name="entregado[]" placeholder="cantidad" required>
                      <input type="hidden" class="form-control" name="cantidad[]" placeholder="cantidad" value="<?= $value->cantidad ?>">
                      <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                      <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                      <input type="hidden" class="form-control" name="numero_serie[]" value="<?= $value->numero_serie ?>">
                      <input type="hidden" class="form-control" name="numero_interno[]" value="<?= $value->numero_interno ?>">
                      <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                      <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                      <input type="hidden" class="form-control" name="id_detalle_explosion[]" value="<?= $value->dtl_almacen_movimientos_iddtl_almacen_movimientos ?>">

                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 1 && ($detalle[0]->idtbl_almacenes == 2) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" name="entregado[]" placeholder="cantidad" required>
                      <input type="hidden" class="form-control" name="cantidad[]" placeholder="cantidad" value="<?= $value->cantidad ?>">
                      <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                      <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                      <input type="hidden" class="form-control" name="numero_serie[]" value="<?= $value->numero_serie ?>">
                      <input type="hidden" class="form-control" name="numero_interno[]" value="<?= $value->numero_interno ?>">
                      <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                      <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                      <input type="hidden" class="form-control" name="id_detalle_explosion[]" value="<?= $value->dtl_almacen_movimientos_iddtl_almacen_movimientos ?>">

                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && ($detalle[0]->tipo_almacen == 'externo' || $detalle[0]->tipo_almacen == 'interno') && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" name="entregado[]" placeholder="cantidad" required>
                      <input type="hidden" class="form-control" name="cantidad[]" placeholder="cantidad" value="<?= $value->cantidad ?>">
                      <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                      <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                      <input type="hidden" class="form-control" name="numero_serie[]" value="<?= $value->numero_serie ?>">
                      <input type="hidden" class="form-control" name="numero_interno[]" value="<?= $value->numero_interno ?>">
                      <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                      <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                      <input type="hidden" class="form-control" name="id_detalle_explosion[]" value="<?= $value->dtl_almacen_movimientos_iddtl_almacen_movimientos ?>">

                    </td>
                    <?php } else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 10) && ($detalle[0]->idtbl_almacenes == 23) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" name="entregado[]" placeholder="cantidad" required>
                      <input type="hidden" class="form-control" name="cantidad[]" placeholder="cantidad" value="<?= $value->cantidad ?>">
                      <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                      <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                      <input type="hidden" class="form-control" name="numero_serie[]" value="<?= $value->numero_serie ?>">
                      <input type="hidden" class="form-control" name="numero_interno[]" value="<?= $value->numero_interno ?>">
                      <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                      <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                      <input type="hidden" class="form-control" name="id_detalle_explosion[]" value="<?= $value->dtl_almacen_movimientos_iddtl_almacen_movimientos ?>">

                    <?php } ?>
                    <td><?= $value->unidad_medida_abr ?></td>
                    <td><?= $value->precio ?></td>
                    <td><?= $moneda ?></td>
                    <td><?= $value->nota ?></td>
                  </tr>
                  <?php $index++; ?>
                <?php } ?>
              </tbody>
            </table>
            <input type="hidden" class="form-control" name="tipo_entrada" value="<?= $detalle[0]->tipo_movimiento ?>">
            <?php if($detalle[0]->estatus == 0 && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
            <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-sm" width="100%">
                        <tr>
                          <td>
                            <center>
                                  <canvas id="draw-canvas6" width="240" style="border-style: solid;">
                                                No tienes un buen navegador.
                                  </canvas>
                                  <br>
                                  <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-warning btn-sm" id="draw-submitBtn6"><i style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                                  <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-danger btn-sm" id="draw-clearBtn6"><i style="font-size: 8px;" class="fa fa-trash"></i> Borrar Firma</button>
                                  <div style="display: none">
                                    <label>Color</label>
                                    <input type="color" id="color6">
                                    <label>Tamaño Puntero</label>
                                    <input type="range" id="puntero6" min="1" default="1" max="5" width="10%">
                                  </div>
                                  <textarea style="display: none;" id="draw-dataUrl6" name="imagen6" class="form-control" rows="5"></textarea>
                                  <img style="display: none" id="draw-image6" src="" alt="Tu Imagen aparecera Aqui!" />
                              </center>
                          </td>
                      </tr>
                      <tr>
                        <th scope="row" style="text-align: center;">FIRMA<br><?= $this->session->userdata('nombre') ?></th>
                      </tr>
                  </table>
                </div>
            </div>
            <?php } ?>

            <br><br>
            <h3 class="h3">Documentos</h3>
            <ul>
              <?php $carpeta = './docs'. '/entradas/' . $detalle[0]->uid_movimiento; ?>
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
            </ul>
            <?php if(($detalle[0]->estatus == 1 && $detalle[0]->tipo_movimiento == 'traspaso') || ($detalle[0]->estatus == 1 && $detalle[0]->tbl_almacenes_idtbl_almacenes_destino != NULL)){ ?>
              <button class="btn btn-secondary btn-info float-left" id="btnImprimirDiv1" tabindex="0">
                <span><i class="fa fa-print"></i> Responsiva</span>
              </button>
            <?php } ?>
            <?php if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('tipo') == 1 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''))) && $detalle[0]->tipo_movimiento != 'traspaso'){ ?>
              <?php if ($detalle[0]->tipo_almacen == 'externo') { ?>
              <input type="hidden" class="form-control" name="tipo" value="externo">
              <?php } else { ?>
                <input type="hidden" class="form-control" name="tipo" value="interno">
                <input type="hidden" class="form-control" name="sitio" value="<?= $detalle[0]->sitio ?>">
              <?php } ?>
              <?php if ($detalle[0]->tipo_almacen != 'sub') { ?>
                <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
                <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
                <input type="hidden" name="estatus_entrada" id="estatus_entrada">
                <input type="hidden" name="motivo" id="motivo">
                <input type="hidden" name="movimiento_virtual" value="<?= $detalle[0]->movimiento_virtual ?>">
                <input type="hidden" name="modificado" value="<?= $detalle[0]->modificado ?>">
                <input type="hidden" name="autor" id="autor" value="<?= $detalle[0]->id_autor ?>">
                <input type="hidden" class="form-control" id="almacen_origen" name="almacen_origen" value="<?= $detalle[0]->almacen_origen ?>">
                <button id="cancelar_entrada" class="btn btn-danger fomr_btn_action">Cancelar Entrada</button>
                <button type="submit" class="btn btn-success">Guardar Entrada</button>
              <?php } ?>
            <?php }elseif(($this->session->userdata('tipo') == 4 || ($this->session->userdata('tipo') == 1)) && $detalle[0]->tipo_movimiento != 'traspaso' && $incompletos > 0){ ?>
              <?php if($detalle[0]->tipo_almacen == 'externo'){ ?>
              <input type="hidden" class="form-control" name="tipo" value="externo">
              <?php }else{ ?>
                <input type="hidden" class="form-control" name="tipo" value="interno">
                <input type="hidden" class="form-control" name="sitio" value="<?= $detalle[0]->sitio ?>">
              <?php } ?>
              <?php if($detalle[0]->tipo_almacen != 'sub') { ?>
                <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
                <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
                <input type="hidden" name="estatus_entrada" id="estatus_entrada">
                <input type="hidden" name="movimiento_virtual" value="<?= $detalle[0]->movimiento_virtual ?>">
                <input type="hidden" name="modificado" value="<?= $detalle[0]->modificado ?>">
                <input type="hidden" name="autor" id="autor" value="<?= $detalle[0]->id_autor ?>">
                <input type="hidden" class="form-control" name="almacen_origen" id="almacen_origen" value="<?= $detalle[0]->almacen_origen ?>">
                <!--<button id="cancelar_entrada" class="btn btn-danger">Cancelar Entrada</button>-->
                <button type="submit" class="btn btn-success">Guardar Entrada</button>
              <?php } ?>
            <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 16 && $this->session->userdata('id') == 50) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
              <input type="hidden" class="form-control" name="tipo" value="interno">
              <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
              <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
              <input type="hidden" class="form-control" name="almacen_origen" id="almacen_origen" value="<?= $detalle[0]->almacen_origen ?>">
              <input type="hidden" class="form-control" name="id_traspaso" value="<?= $detalle[0]->idtbl_almacen_movimientos_traspaso ?>">
              <input type="hidden" class="form-control" name="id_salida" value="<?= $detalle[0]->idtbl_almacen_movimientos_salida ?>">
              <input type="hidden" name="movimiento_virtual" value="<?= $detalle[0]->movimiento_virtual ?>">
              <input type="hidden" name="modificado" value="<?= $detalle[0]->modificado ?>">
              <input type="hidden" name="estatus" id="estatus">
            <button type="button" id="aprobar_traspaso" class="btn btn-success fomr_btn_action">Aprobar Entrada </button>
            <button type="button" id="cancelar_traspaso" class="btn-danger btn ocultar fomr_btn_action">Cancelar Entrada</button>
            <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 17 || $detalle[0]->idtbl_almacenes == 18 || $detalle[0]->idtbl_almacenes == 19 || $detalle[0]->idtbl_almacenes == 21 || $detalle[0]->idtbl_almacenes == 24 || $detalle[0]->idtbl_almacenes == 25 || $detalle[0]->idtbl_almacenes == 26 || $detalle[0]->idtbl_almacenes == 27) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
              <input type="hidden" class="form-control" name="tipo" value="interno">
              <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
              <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
              <input type="hidden" class="form-control" name="almacen_origen" id="almacen_origen" value="<?= $detalle[0]->almacen_origen ?>">              
              <input type="hidden" class="form-control" name="id_traspaso" value="<?= $detalle[0]->idtbl_almacen_movimientos_traspaso ?>">
              <input type="hidden" class="form-control" name="id_salida" value="<?= $detalle[0]->idtbl_almacen_movimientos_salida ?>">
              <input type="hidden" name="movimiento_virtual" value="<?= $detalle[0]->movimiento_virtual ?>">
              <input type="hidden" name="modificado" value="<?= $detalle[0]->modificado ?>">
              <input type="hidden" name="estatus" id="estatus">
            <button type="button" id="aprobar_traspaso" class="btn btn-success fomr_btn_action">Aprobar Entrada </button>
            <button type="button" id="cancelar_traspaso" class="btn-danger btn ocultar fomr_btn_action">Cancelar Entrada</button>
            <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 3 && ($detalle[0]->idtbl_almacenes == 29) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
              <input type="hidden" class="form-control" name="tipo" value="interno">
              <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
              <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
              <input type="hidden" class="form-control" name="almacen_origen" id="almacen_origen" value="<?= $detalle[0]->almacen_origen ?>">              
              <input type="hidden" class="form-control" name="id_traspaso" value="<?= $detalle[0]->idtbl_almacen_movimientos_traspaso ?>">
              <input type="hidden" class="form-control" name="id_salida" value="<?= $detalle[0]->idtbl_almacen_movimientos_salida ?>">
              <input type="hidden" name="movimiento_virtual" value="<?= $detalle[0]->movimiento_virtual ?>">
              <input type="hidden" name="modificado" value="<?= $detalle[0]->modificado ?>">
              <input type="hidden" name="estatus" id="estatus">
            <button type="button" id="aprobar_traspaso" class="btn btn-success fomr_btn_action">Aprobar Entrada </button>
            <button type="button" id="cancelar_traspaso" class="btn-danger btn ocultar fomr_btn_action">Cancelar Entrada</button>
            <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 1) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
              <input type="hidden" class="form-control" name="tipo" value="interno">
              <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
              <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
              <input type="hidden" class="form-control" name="almacen_origen" id="almacen_origen" value="<?= $detalle[0]->almacen_origen ?>">              
              <input type="hidden" class="form-control" name="id_traspaso" value="<?= $detalle[0]->idtbl_almacen_movimientos_traspaso ?>">
              <input type="hidden" class="form-control" name="id_salida" value="<?= $detalle[0]->idtbl_almacen_movimientos_salida ?>">
              <input type="hidden" name="movimiento_virtual" value="<?= $detalle[0]->movimiento_virtual ?>">
              <input type="hidden" name="modificado" value="<?= $detalle[0]->modificado ?>">
              <input type="hidden" name="estatus" id="estatus">
            <button type="button" id="aprobar_traspaso" class="btn btn-success fomr_btn_action">Aprobar Entrada </button>
            <button type="button" id="cancelar_traspaso" class="btn-danger btn ocultar fomr_btn_action">Cancelar Entrada</button>
            <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 1 && ($detalle[0]->idtbl_almacenes == 2) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
              <input type="hidden" class="form-control" name="tipo" value="interno">
              <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
              <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
              <input type="hidden" class="form-control" name="almacen_origen" id="almacen_origen" value="<?= $detalle[0]->almacen_origen ?>">              
              <input type="hidden" class="form-control" name="id_traspaso" value="<?= $detalle[0]->idtbl_almacen_movimientos_traspaso ?>">
              <input type="hidden" class="form-control" name="id_salida" value="<?= $detalle[0]->idtbl_almacen_movimientos_salida ?>">
              <input type="hidden" name="movimiento_virtual" value="<?= $detalle[0]->movimiento_virtual ?>">
              <input type="hidden" name="modificado" value="<?= $detalle[0]->modificado ?>">
              <input type="hidden" name="estatus" id="estatus">
            <button type="button" id="aprobar_traspaso" class="btn btn-success fomr_btn_action">Aprobar Entrada </button>
            <button type="button" id="cancelar_traspaso" class="btn-danger btn ocultar fomr_btn_action">Cancelar Entrada</button>
            <?php }else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && ($detalle[0]->tipo_almacen == 'externo' || $detalle[0]->tipo_almacen == 'interno') && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
              <input type="hidden" class="form-control" name="tipo" value="interno">
              <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
              <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
              <input type="hidden" class="form-control" name="almacen_origen" id="almacen_origen" value="<?= $detalle[0]->almacen_origen ?>">              
              <input type="hidden" class="form-control" name="id_traspaso" value="<?= $detalle[0]->idtbl_almacen_movimientos_traspaso ?>">
              <input type="hidden" class="form-control" name="id_salida" value="<?= $detalle[0]->idtbl_almacen_movimientos_salida ?>">
              <input type="hidden" name="movimiento_virtual" value="<?= $detalle[0]->movimiento_virtual ?>">
              <input type="hidden" name="modificado" value="<?= $detalle[0]->modificado ?>">
              <input type="hidden" name="estatus" id="estatus">
            <button type="button" id="aprobar_traspaso" class="btn btn-success fomr_btn_action">Aprobar Entrada </button>
            <button type="button" id="cancelar_traspaso" class="btn-danger btn ocultar fomr_btn_action">Cancelar Entrada</button>
            <?php }else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 10) && ($detalle[0]->idtbl_almacenes == 23) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
              <input type="hidden" class="form-control" name="tipo" value="interno">
              <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
              <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
              <input type="hidden" class="form-control" name="almacen_origen" id="almacen_origen" value="<?= $detalle[0]->almacen_origen ?>">              
              <input type="hidden" class="form-control" name="id_traspaso" value="<?= $detalle[0]->idtbl_almacen_movimientos_traspaso ?>">
              <input type="hidden" class="form-control" name="id_salida" value="<?= $detalle[0]->idtbl_almacen_movimientos_salida ?>">
              <input type="hidden" name="estatus" id="estatus">
            <button type="button" id="aprobar_traspaso" class="btn btn-success fomr_btn_action">Aprobar Entrada </button>
            <button type="button" id="cancelar_traspaso" class="btn-danger btn ocultar fomr_btn_action">Cancelar Entrada</button>
            <?php } ?>
            <?php if($this->session->userdata('tipo') == 16 && $detalle[0]->estatus_contabilidad == 'Pendiente') { ?>
              <div style="text-align: right;">
                <button type="button" id="aprobar" class="btn-primary btn ocultar fomr_btn_action">Aprobar Entrada</button>
                <button type="button" id="modificar" class="btn-info btn ocultar fomr_btn_action">Modificar y aprobar Entrada</button>
                <button type="button" id="cancelar" class="btn-danger btn ocultar fomr_btn_action">Cancelar Entrada</button>
                <input type="hidden" name="estatus" id="estatus">
                <input type="hidden" class="form-control" name="uid_almacen" value="<?= $detalle[0]->uid_almacen ?>">
                <input type="hidden" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
                <input type="hidden" name="movimiento_virtual" value="<?= $detalle[0]->movimiento_virtual ?>">
                <input type="hidden" name="modificado" value="<?= $detalle[0]->modificado ?>">
              </div>
            <?php } ?>
            <input type="hidden" name="uid_movimiento" value="<?= $detalle[0]->uid_movimiento ?>">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div style="display: none;" id="printableArea">
<div class="card-body" id="printableArea">                        
            <table class="table table-striped table-bordered display responsive no-wrap" style="width:100%" border="1">
              <thead>
                <tr>
                  <th>Neodata</th>
                  <th>Descripción</th>
                  <th>Numero de serie</th>
                  <th>Numero Interno</th>
                  <?php if($detalle[0]->movimiento_virtual == 3){ ?>
                  <th>Existencias</th>
                  <th>Cantidad Inicial</th>
                  <?php } ?>
                  <th>Cantidad</th>
                  <?php if($detalle[0]->movimiento_virtual == 3 && $detalle[0]->modificado == 1){ ?>
                  <th>Ingresar</th>
                  <?php } ?>
                  <?php if($detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                  <th>Cantidad Anterior</th>
                  <?php } ?>
                  <?php if(($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && $detalle[0]->tipo_movimiento != 'traspaso') || ($this->session->userdata('tipo') == 16 && $detalle[0]->estatus_contabilidad == 'Pendiente')){ ?>
                    <th>Entregado</th>
                  <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 16 && $this->session->userdata('id') == 50) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                    <th>Entregado</th>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 17 || $detalle[0]->idtbl_almacenes == 18 || $detalle[0]->idtbl_almacenes == 19 || $detalle[0]->idtbl_almacenes == 21 || $detalle[0]->idtbl_almacenes == 24 || $detalle[0]->idtbl_almacenes == 25 || $detalle[0]->idtbl_almacenes == 26 || $detalle[0]->idtbl_almacenes == 27) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                      <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 3 && ($detalle[0]->idtbl_almacenes == 29) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                      <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 1) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                      <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 1 && ($detalle[0]->idtbl_almacenes == 2) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                      <?php }else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && ($detalle[0]->tipo_almacen == 'externo' || $detalle[0]->tipo_almacen == 'interno') && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                    <?php }else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 10) && ($detalle[0]->idtbl_almacenes == 23) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <th>Entregado</th>
                    <?php }?>
                    <?php if($detalle[0]->movimiento_virtual == 3 && $value->cantidad == $value->cantidad_anterior){ ?>
                      <th>Estatus</th>
                    <?php } ?>
                  <th>Unidad</th>
                  <th>Precio</th>
                  <th>Tipo Moneda</th>
                </tr>
              </thead>
              <tbody>
              <?php $incompletos = 0; ?>
                <?php foreach ($detalle as $key => $value) { ?>
                  <?php if ($value->tipo_moneda == 'p') {
                    $moneda = 'Pesos';
                  } else {
                    $moneda = 'Dolares';
                  } ?>                  
                  <tr>
                    <td><?= $value->neodata ?></td>
                    <td><?= $value->descripcion ?></td>
                    <td><?= $value->numero_serie ?></td>
                    <td><?= $value->numero_interno ?></td>
                    <?php if($detalle[0]->movimiento_virtual == 3){ ?>
                    <td></td>
                    <td><?= $value->cantidad_anterior ?></td>
                    <?php } ?>
                    <td><?= $value->cantidad ?></td>
                    <?php if($detalle[0]->movimiento_virtual == 3 && $value->cantidad != $value->cantidad_anterior && $value->cantidad_anterior != NULL){ ?>
                    <?php $incompletos++; ?>
                    <td><input type="number" class="form-control" placeholder="Cantidad" min="0" max="<?= $value->cantidad_anterior - $value->cantidad ?>" required>                                                            
                    </td>
                    <?php }else if($detalle[0]->movimiento_virtual == 3 && $value->cantidad == $value->cantidad_anterior){ ?>
                    <td>Cantidad Total Ingresada</td>
                    <?php } ?>
                    <?php if($detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                    <td><?= $value->cantidad_anterior ?></td>
                    <?php } ?>
                    <?php if(($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && $detalle[0]->tipo_movimiento != 'traspaso') || ($this->session->userdata('tipo') == 16 && $detalle[0]->estatus_contabilidad == 'Pendiente')){ ?>                      
                      <td><input type="number" class="form-control" min="0" max="<?= $value->cantidad ?>" placeholder="cantidad" required>                      
                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 16 && $this->session->userdata('id') == 50) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" placeholder="cantidad" required>                      
                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 17 || $detalle[0]->idtbl_almacenes == 18 || $detalle[0]->idtbl_almacenes == 19 || $detalle[0]->idtbl_almacenes == 21 || $detalle[0]->idtbl_almacenes == 24 || $detalle[0]->idtbl_almacenes == 25 || $detalle[0]->idtbl_almacenes == 26 || $detalle[0]->idtbl_almacenes == 27) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" placeholder="cantidad" required>                                            
                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 3 && ($detalle[0]->idtbl_almacenes == 29) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" placeholder="cantidad" required>                      
                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 4 && ($detalle[0]->idtbl_almacenes == 1) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" placeholder="cantidad" required>                      
                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && $this->session->userdata('tipo') == 1 && ($detalle[0]->idtbl_almacenes == 2) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" placeholder="cantidad" required>                      
                    </td>
                    <?php }else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && ($detalle[0]->tipo_almacen == 'externo' || $detalle[0]->tipo_almacen == 'interno') && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" placeholder="cantidad" required>                      
                    </td>
                    <?php } else if($detalle[0]->estatus == 0 && ($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 10) && ($detalle[0]->idtbl_almacenes == 23) && $detalle[0]->tipo_movimiento == 'traspaso'){ ?>
                      <td><input type="number" class="form-control" min="1" max="<?= $value->cantidad ?>" placeholder="cantidad" required>                   
                    <?php } ?>
                    <td><?= $value->unidad_medida_abr ?></td>
                    <td><?= $value->precio ?></td>
                    <td><?= $moneda ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>            
          </div>
</div>

<section>
    <div style="display: none" class="container-fluid">
        <div class="card">
            <div class="card-body" id="printableArea1">
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
                @page{
                    margin: 2cm;
                    size: 8.5in 11in;
                }
                </style>
                <table class="" style="width:100%" border="1" cellpadding="4" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="b_top b_bottom b_left" style="text-align: center" width="20%" rowspan="2">
                                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png"
                                    style="display: inline-block; width: 80px;">
                            </th>
                            <th class="b_top" width="50%" style="vertical-align: middle; text-align: center">
                                ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.
                            </th>
                            <th class="b_top b_right"
                                style="vertical-align: middle; text-align: center; font-size:12px;" width="25%"
                                rowspan="2">
                                <strong>C&oacute;digo: DA-FE-AL-001</strong>
                            </th>
                        </tr>
                        <tr>
                            <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center">
                                Requisición a Almacén
                            </th>
                        </tr>
                    </thead>
                </table>
                <table id="datos_solicitud" style="width: 100%;font-size: 12px;margin-top: 10px;" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>FECHA Y HORA</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= date("d-m-Y h:i:s", strtotime($detalle[0]->fecha)) ?>
                                        </td>
                                        <td class="default-text b_top b_right b_bottom">
                                            <strong>FOLIO</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->uid_movimiento ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>No. PROYECTO:</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" style="width: 150px;!important"
                                            align="center">
                                            <?= $detalle[0]->numero_proyecto ?>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->nombre_proyecto ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>UBICACIÓN DE TRABAJO</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= (empty($detalle[0]->segmento))? $detalle[0]->direccion : $detalle[0]->segmento; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>RESPONSABLE PROY.</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->nombre_autorizacion ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>CORDINADOR PROY.</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->nombre_autor ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>POR AUSENCIA DE CORD.</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>CONTRATISTA (Externo)</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= ($detalle[0]->nombrecon != '') ? $detalle[0]->nombrecon : '&nbsp;' ?>
                                        </td>
                                        <td class="default-text b_top b_right b_bottom">
                                            <strong>SUPERVISOR (Interno)</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= ($detalle[0]->nombressu != '') ? $detalle[0]->nombressu . $detalle[0]->paternosu . $detalle[0]->maternosu : '&nbsp;' ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>RECIBE</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                        <?= $detalle[0]->nombres ?> <?= $detalle[0]->apellido_paterno ?> <?= $detalle[0]->apellido_materno ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>COMENTARIOS</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->comentarios ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;margin-top: 15px;" border="1" cellpadding="4" cellspacing="0" align="center">
                    <thead style="font-size: 12px!important;">
                        <tr>
                            <th><strong>CODIGO</strong></th>
                            <th><strong>DESCRIPCION</strong></th>
                            <th width="50px"><strong>UNIDAD</strong></th>
                            <th width="70px"><strong>CANTIDAD</strong></th>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->sitio != NULL && $value->sitio !== '')){ ?>
                            <th width="50px"><strong>SITIO</strong></th>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_serie != NULL && $value->numero_serie !== '')){ ?>
                            <th width="50px"><strong>NUMERO SERIE</strong></th>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_interno != NULL && $value->numero_interno !== '')){ ?>
                            <th width="50px"><strong>NUMERO INTERNO</strong></th>
                            <?php } ?>
                            <th style="min-width: 150px;"><strong>NOTA</strong></th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px!important;" align="center">
                        <?php foreach ($detalle as $key => $value) : ?>
                        <tr>
                            <td><?php echo $value->neodata ?></td>
                            <td><?php echo $value->descripcion ?></td>
                            <td><?php echo $value->unidad_medida_abr ?></td>                            
                            <td><?= $value->cantidad ?></td>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->sitio != NULL && $value->sitio !== '')){ ?>
                            <td><?= $value->sitio ?></td>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_serie != NULL && $value->numero_serie !== '')){ ?>
                            <td><?= $value->numero_serie ?></td>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_interno != NULL && $value->numero_interno !== '')){ ?>
                            <td><?= $value->numero_interno ?></td>
                            <?php } ?>
                            <td><?= $value->observaciones ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <br>
                <?php
                if($detalle[0]->uid_entrada != NULL){
                  $uid_str = substr($detalle[0]->uid_entrada,0,-1);
                }else{
                  $uid_str = substr($detalle[0]->uid_movimiento,0,-1);
                }
                ?>
                <table style="width: 100%;margin-top: 15px;" border="0" cellpadding="4" cellspacing="0" align="center">
                    <tbody style="font-size: 12px!important;" align="center">
                        <tr>
                          <td colspan="2" width="50%" align="center"><img src="<?= base_url() ?>uploads/firmas/traspasos/<?= $uid_str ?>_1.png"></td>
                          <td colspan="2" width="50%" align="center"><img src="<?= base_url() ?>uploads/firmas/traspasos/<?= $uid_str ?>_2.png"></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_recibe">
                              <?= $detalle[0]->nombre ?>
                            </td>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_entrega">
                                <?= $detalle[0]->nombre1 ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" align="center">Entrega <?= $detalle[0]->fecha ?>
                            </td>
                            <td colspan="2" width="50%" align="center">Recibe <?= $detalle[0]->fecha ?></td>
                        </tr>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<script>
  <?php if($detalle[0]->movimiento_virtual == 3){ ?>
  $(document).ready(function() {
    //event.preventDefault();
    //console.log("entro");   
    var tipo_almacen = 'sub';
    var id_almacen = $("#almacen_origen").val();           
    $("#formuploadajax input[name='idtbl_almacenes']")[0].value = id_almacen;
    $("#formuploadajax input[name='tipo_almacenes']")[0].value = tipo_almacen;    
    <?php for ($x = 0; $x < sizeof($productos_enviar); $x++) { ?>
      console.log("entro");
    $.ajax({      
        url: "<?= base_url() ?>almacen/getExistencias",
        type: "POST",
        data: "idtbl_catalogo=<?= $productos_enviar[$x]['idtbl_catalogo'] ?>&idtbl_almacenes=" + id_almacen + "&idctl_categorias=<?= $productos_enviar[$x]['idctl_categorias'] ?>",
        success: function(respuesta) {
            var jsonRespuesta = JSON.parse(respuesta);
            if((tipo_almacen != 'interno' || (tipo_almacen == 'interno' && jsonRespuesta.select == false)) && (tipo_almacen != 'sub' || (tipo_almacen == 'sub' && jsonRespuesta.select == false)) && (tipo_almacen != 'externo' || (tipo_almacen == 'externo' && jsonRespuesta.select == false))){
                console.log(jsonRespuesta);
                for(var r=0; r < jsonRespuesta.datos.length; r++){
                $("#existencias_almacen_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").html(jsonRespuesta.datos[r].existencias);
                var cantidad = $('#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>').val();
                //alert(cantidad);
                if(parseFloat(cantidad) > parseFloat(jsonRespuesta.datos[r].existencias)){
                  $('#entregado_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>').attr('max',jsonRespuesta.datos[r].existencias);
                }else{
                  $('#entregado_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>').attr('max',cantidad);
                }
                
                }
                //var input;
                //if (jsonRespuesta.datos.length == 0) {
                //    input = "<input type='text' name='existencias[]' readonly class='form-control' value='0'>";
                    //$("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '0');
                //} else {
                //    input = "<input type='text' name='existencias[]' readonly class='form-control' value='" + jsonRespuesta.datos[0]['existencias'] + "'>";
                    //$("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max',jsonRespuesta.datos[0]['existencias']);
                //}
                //$("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(input);
            }else{
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").html("");
                //$("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '1');
                var select = $("<select name='existencias[]' id='<?= $x ?>' onchange='getActivoFijo(this.id, this.value)' class='selectpicker' data-show-subtext='true' data-live-search='true'><option value=''>Seleccionar ...</option><option value='0'>Sin existencia</option></select>");
                for(var r=0; r < jsonRespuesta.datos.length; r++){
                    select.append('<option value="' + jsonRespuesta.datos[r].iddtl_almacen + '" data-serie="'+jsonRespuesta.datos[r].numero_serie + '" data-interno="' + jsonRespuesta.datos[r].numero_interno +'">' + jsonRespuesta.datos[r].numero_serie + "</option>");                    
                    
                }
                var input = "<input type='hidden' class='form-control' min='0' name='entregado[]' id='entregado_<?= $x ?>' placeholder='cantidad' value='0' required>";
                //select.selectpicker();
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(select);
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?> .selectpicker").selectpicker("refresh");
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(input);
            }
        }
    });
    
    
    <?php } ?>

});
<?php } ?>
</script>
<script>
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
$('#aprobar').click(function(event) {
  event.preventDefault();
  bloqueo_botones(true);
  $("#estatus").val('');
  $("#estatus").val('Aprobada');
  var formData = new FormData(document.getElementById("formuploadajax"));  
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea aprobar la entrada de material?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-manual",
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
                          resp.mensaje,
                          'success'
                      )
                      location.reload();
                  } else {
                      Toast.fire({
                          type: 'error',
                          title: resp.mensaje
                      });
                      bloqueo_botones(false);
                  }
              }
          });
      }else{
        bloqueo_botones(false);
      }
  });
});

$('#aprobar_traspaso').click(function(event) {
  event.preventDefault();
  bloqueo_botones(true);
  var entregado = $("#formuploadajax input[name='entregado[]']");
  var cantidad = $("#formuploadajax input[name='cantidad[]']");
  var firma = $("#draw-dataUrl6").val();
  if(firma == "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAACWCAYAAADg+AXVAAAAAXNSR0IArs4c6QAAA6ZJREFUeF7t0wENAAAIAkHpX9ocv50J2CE7R4BAVmDZ5IITIHAG7AkIhAUMOFye6AQM2A8QCAsYcLg80QkYsB8gEBYw4HB5ohMwYD9AICxgwOHyRCdgwH6AQFjAgMPliU7AgP0AgbCAAYfLE52AAfsBAmEBAw6XJzoBA/YDBMICBhwuT3QCBuwHCIQFDDhcnugEDNgPEAgLGHC4PNEJGLAfIBAWMOBweaITMGA/QCAsYMDh8kQnYMB+gEBYwIDD5YlOwID9AIGwgAGHyxOdgAH7AQJhAQMOlyc6AQP2AwTCAgYcLk90AgbsBwiEBQw4XJ7oBAzYDxAICxhwuDzRCRiwHyAQFjDgcHmiEzBgP0AgLGDA4fJEJ2DAfoBAWMCAw+WJTsCA/QCBsIABh8sTnYAB+wECYQEDDpcnOgED9gMEwgIGHC5PdAIG7AcIhAUMOFye6AQM2A8QCAsYcLg80QkYsB8gEBYw4HB5ohMwYD9AICxgwOHyRCdgwH6AQFjAgMPliU7AgP0AgbCAAYfLE52AAfsBAmEBAw6XJzoBA/YDBMICBhwuT3QCBuwHCIQFDDhcnugEDNgPEAgLGHC4PNEJGLAfIBAWMOBweaITMGA/QCAsYMDh8kQnYMB+gEBYwIDD5YlOwID9AIGwgAGHyxOdgAH7AQJhAQMOlyc6AQP2AwTCAgYcLk90AgbsBwiEBQw4XJ7oBAzYDxAICxhwuDzRCRiwHyAQFjDgcHmiEzBgP0AgLGDA4fJEJ2DAfoBAWMCAw+WJTsCA/QCBsIABh8sTnYAB+wECYQEDDpcnOgED9gMEwgIGHC5PdAIG7AcIhAUMOFye6AQM2A8QCAsYcLg80QkYsB8gEBYw4HB5ohMwYD9AICxgwOHyRCdgwH6AQFjAgMPliU7AgP0AgbCAAYfLE52AAfsBAmEBAw6XJzoBA/YDBMICBhwuT3QCBuwHCIQFDDhcnugEDNgPEAgLGHC4PNEJGLAfIBAWMOBweaITMGA/QCAsYMDh8kQnYMB+gEBYwIDD5YlOwID9AIGwgAGHyxOdgAH7AQJhAQMOlyc6AQP2AwTCAgYcLk90AgbsBwiEBQw4XJ7oBAzYDxAICxhwuDzRCRiwHyAQFjDgcHmiEzBgP0AgLGDA4fJEJ2DAfoBAWMCAw+WJTsCA/QCBsIABh8sTnYAB+wECYQEDDpcnOgED9gMEwgIGHC5PdAIG7AcIhAUMOFye6AQM2A8QCAsYcLg80Qk8TesAl3oo5SYAAAAASUVORK5CYII="){
    Toast.fire({
                    type: 'error',
                    title: '¡Debes dibujar tu firma en el recuadro!'
                });
                bloqueo_botones(false);
                return 0;
  }
  for(var r=0; r<entregado.length; r++){       
            if(parseFloat(entregado[r].value) > parseFloat(entregado[r].max)){
                $(entregado[r]).css("border-color", "#d9534f");
                Toast.fire({
                    type: 'error',
                    title: '¡La cantidad no puede ser mayor a la cantidad de traspaso!'
                });
                bloqueo_botones(false);
                return 0;
            }   
            if(isNaN(parseFloat(entregado[r].value))){
              $(entregado[r]).css("border-color", "#d9534f");
              Toast.fire({
                type: 'error',
                title: '¡La cantidad es inválida!'
              });
              bloqueo_botones(false);
              return 0;
            }         
        }
  var formData = new FormData(document.getElementById("formuploadajax"));
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea aprobar la entrada de material?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-almacen-cliente",
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
                          resp.mensaje,
                          'success'
                      )
                      location.reload();
                  } else {
                      Toast.fire({
                          type: 'error',
                          title: resp.mensaje
                      });
                      bloqueo_botones(false);
                  }
              }
          });
      }else{
        bloqueo_botones(false);
      }
  });
});

$('#cancelar').click(function(event) {
  event.preventDefault();
  bloqueo_botones(true);
  $("#estatus").val('');
  $("#estatus").val('Cancelada');
  var formData = new FormData(document.getElementById("formuploadajax"));
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la entrada de material?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-manual",
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
                          resp.mensaje,
                          'success'
                      )
                      location.reload();
                  } else {
                      Toast.fire({
                          type: 'error',
                          title: resp.mensaje
                      });
                      bloqueo_botones(false);
                  }
              }
          });
      }else{
        bloqueo_botones(false);
      }
  });
});

$('#cancelar_entrada').click(function(event) {
  event.preventDefault();  
  bloqueo_botones(true);
  $("#estatus_entrada").val('');
  $("#estatus_entrada").val('Cancelada');  
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la entrada de material?",
      input: 'text',
      inputPlaceholder: 'Motivo Cancelación',
      inputAttributes: {
      autocapitalize: 'off'
      },
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar',
      preConfirm: (motivo) => {
    
  },
  }).then((result) => {
      if (result.value) {
        $("#motivo").val(result.value);
        var formData = new FormData(document.getElementById("formuploadajax"));
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-manual",
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
                          resp.mensaje,
                          'success'
                      )
                      location.reload();
                  } else {
                      Toast.fire({
                          type: 'error',
                          title: resp.mensaje
                      });
                      bloqueo_botones(false);
                  }
              }
          });
      }else{
        bloqueo_botones(false);
      }
  });
});

$('#cancelar_traspaso').click(function(event) {
  event.preventDefault();
  bloqueo_botones(true);
  $("#estatus").val('');
  $("#estatus").val('Cancelada');
  var formData = new FormData(document.getElementById("formuploadajax"));
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la entrada de material?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-almacen-cliente",
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
                          resp.mensaje,
                          'success'
                      )
                      location.reload();
                  } else {
                      Toast.fire({
                          type: 'error',
                          title: resp.mensaje
                      });
                      bloqueo_botones(false);
                  }
              }
          });
      }else{
        bloqueo_botones(false);
      }
  });
});

$('#modificar').click(function(event) {
    event.preventDefault();
    bloqueo_botones(true);
    $("#estatus").val('');
  $("#estatus").val('Modificada');
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea modificar y aprobar la entrada de material?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            /*var cant2 = 0;
            $(".cantidad").each(function() {
                cant2 += parseFloat($(this).val());
            });
            console.log(cant2);
            console.log(cant);
            if (cant == cant2) {
                Toast.fire({
                    type: 'error',
                    title: '¡No hubo cambios!'
                })
            } else {*/
                $.ajax({
                    url: "<?= base_url() ?>almacen/guardar-nueva-entrada-manual",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.error == false) {
                            $('.cantidad').attr('disabled', 'true');
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
                            });
                            bloqueo_botones(false);
                        }
                    }
                });
            //}
        }else{
          bloqueo_botones(false);
        }
    })
});

$("button[type='submit']").on("click", function(){
  bloqueo_botones(true);
});

</script>

<script>
  function getActivoFijo(id, value){
      //alert(id);
      if(value != '' && value != null){        
        var serie = $('#'+id).find(':selected').data('serie');
        var interno = $('#'+id).find(':selected').data('interno');
      
        $('#serie_'+id).val(serie);
        $('#interno_'+id).val(interno);
        $('#entregado_'+id).val(1);
      }else{
        $('#serie_'+id).val('');
        $('#interno_'+id).val('');
        $('#entregado_'+id).val(0);
      }
      
    }
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
        if(canvas6 == null){
          return;
        }
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

  function imprimirElemento1(elemento) {
    var printContents = document.getElementById(elemento).innerHTML;
    var ventana = window.open('', 'PRINT', "width=1000,height=800,scrollbars=NO");    
    ventana.document.write('<link rel="stylesheet" href="style.css">'); //Aquí agregué la hoja de estilos
    ventana.document.write('</head><body >');
    ventana.document.write(printContents);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
  }
  document.querySelector("#btnImprimirDiv1").addEventListener("click", function(e) {
    e.preventDefault();
    imprimirElemento1('printableArea1');
  });
  function bloqueo_botones(valor){
    var buttons = $(".fomr_btn_action");
    buttons.prop("disabled", valor);
  }
  $(document).on('submit', '.form', function (event) {
    $(this).find("button[type='submit']").prop("disabled", "true");
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