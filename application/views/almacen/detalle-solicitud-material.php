<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4 mr-auto p-2">
          Detalle solicitud de material
        </h3>
        <?php if ($this->session->userdata('tipo') == 4 && $permiso > 0 && ($solicitud->estatus_solicitud == 'AG' || $solicitud->estatus_solicitud == 'SU'  || $solicitud->estatus_solicitud == 'S')) : ?>
          <div class="p-2 d-print-none">
            <button class="btn btn-secondary btn-info float-right" id="btnImprimirDiv" tabindex="0">
              <span><i class="fa fa-print"></i> Imprimir</span>
            </button>
          </div>
        <?php endif ?>
      </div>
      <div class="card-body">
        <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart('', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
    
       
      
      
      
       
        
        <?php $productos_enviar = array(); ?>
        <?php if(isset($solicitudPM->estatus_solicitud)=='modificada PM' && isset($solicitudCO->estatus_solicitud)=='modificada CO'){ $i=0; ?>
        <?php foreach ($detalle as $key => $value) : ?>
          
          <div id="item-producto<?= $key ?>" class="itemproducto">
            <div class="form-row">
              <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Producto*</label> 
                <?php if ($value->tbl_catalogo_idtbl_catalogo == NULL) : ?>
                  <?php if (isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras'] > 2) : ?>
                    <select name="producto[]" class="selectpicker producto" required data-live-search="true">
                      <option value="0" selected="selected">Producto inexistente en el catálogo</option>
                      <?php foreach ($catalogo as $key => $values) : ?>
                        <option value="<?php echo $values->idtbl_catalogo ?>" data-precio="<?php echo $values->precio ?>" data-moneda="<?php echo $values->tipo_moneda ?>" data-preciolabel="<?php echo number_format($values->precio, 2) . (($values->tipo_moneda == 'p') ? ' Pesos' : ' Dolares') ?>" data-descripcion="<?php echo $values->descripcion ?>" data-categoria="<?php echo $values->idctl_categorias ?>">
                          <?php echo $values->uid . ' ' . $values->marca . ' ' . $values->modelo . ' (' . substr($values->descripcion, 0, 70) . ')' ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                    <input type="hidden" class="id" value="<?php echo $value->iddtl_solicitud_catalogo ?>">
                    <input type="hidden" class="nuevo">
                    <button type="button" class="btn btn-info actualizar">Actualizar</button>
                  <? else : ?>
                    <input type="text" name="" class="form-control" disabled value="Producto inexistente en el catálogo">
                    <input type="hidden" name="producto[]" class="form-control" value="0">
                  <?php endif ?>
                <?php else : ?>
                  <?php array_push($productos_enviar, $value->tbl_catalogo_idtbl_catalogo) ?>
                  <input type="text" name="" class="form-control" disabled value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                  <input type="hidden" name="producto[]" class="form-control product" value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                <?php endif ?>
              </div>
              <?php if ($this->session->userdata('tipo') == 11) { ?>
                <div class="col">
                  <label for="cantida">Cantidad*</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $value->cantidad ?>">
                </div>
              <?php } ?>
              <?php if ($this->session->userdata('tipo') != 11) { ?>
                <div class="col">
                  <label for="cantida">Cantidad*</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $value->cantidad ?>">
                </div>
              <?php } ?>
        
              <?php if ($this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud == 'AG') { ?>
                <div class="col">
                  <label for="cantidad">Existencias</label>
                  <input type="text" name="" id="<?= $value->idtbl_catalogo ?>" disabled class="form-control">
                </div>
              <?php } ?>
            </div>
            <br>
            <?php if(isset($solicitudCO->estatus_solicitud)=='modificada CO' && $this->session->userdata('tipo')!=4){ ?>
            <div class="form-row">
              
              <?php if ($this->session->userdata('tipo') == 11) { ?>
                <?php if($detalleCO[$i]->cantidad!=$value->cantidad){ ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado por:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->nombreCO ?> (CO)" disabled>
              </div>
                <div class="col">
                  <label for="cantidad">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-md-5 col-lg-6">
                <label style="display: none;">Modificado por:</label>                 
                <input type="hidden" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->nombreCO ?> (CO)" disabled>
              </div>
                <div class="col">
                  <label style="display: none;" for="cantidad">Cantidad anterior:</label>
                  <input type="hidden" name="cantidad[]" id="cantidad" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                </div>
                <?php } ?>
              <?php } ?>
              <?php if ($this->session->userdata('tipo') != 11) { ?>
                <?php if($detalleCO[$i]->cantidad!=$value->cantidad){ ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado por:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitudCO->nombreCO ?> (CO)" disabled>
              </div>
                <div class="col">
                  <label for="cantida">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-md-5 col-lg-6">
                <label style="display: none;">Modificado por:</label>                 
                <input type="hidden" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->nombreCO ?> (CO)" disabled>
              </div>
                <div class="col">
                  <label style="display: none;" for="cantida">Cantidad anterior:</label>
                  <input type="hidden" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                </div>
                <?php } ?>
              <?php } ?>           
            </div>
            <br>
              <?php } ?> 
              <?php if(isset($solicitudPM->estatus_solicitud)=='modificada PM' && $this->session->userdata('tipo')!=4){ ?>
            <div class="form-row">
              
              <?php if ($this->session->userdata('tipo') == 11) { ?>
                <?php if($detallePM[$i]->cantidad!=$value->cantidad){ ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado por:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->responsable ?> (PM)" disabled>
              </div>
                <div class="col">
                  <label for="cantidad">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad ?>" disabled>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-md-5 col-lg-6">
                <label style="display: none;">Modificado por:</label>                 
                <input type="hidden" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->responsable ?> (PM)" disabled>
              </div>
                <div class="col">
                  <label style="display: none;" for="cantidad">Cantidad anterior:</label>
                  <input type="hidden" name="cantidad[]" id="cantidad" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad ?>" disabled>
                </div>
                <?php } ?>
              <?php } ?>
              <?php if ($this->session->userdata('tipo') != 11) { ?>
                <?php if($detallePM[$i]->cantidad!=$value->cantidad){ ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado por:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->responsable ?> (PM)" disabled>
              </div>
                <div class="col">
                  <label for="cantida">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad ?>" disabled>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-md-5 col-lg-6">
                <label style="display: none;">Modificado por:</label>                 
                <input type="hidden" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->responsable ?> (PM)" disabled>
              </div>
                <div class="col">
                  <label style="display: none;" for="cantida">Cantidad anterior:</label>
                  <input type="hidden" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad ?>" disabled>
                </div>
                <?php } ?>
              <?php } ?>           
            </div>
            <br>
              <?php } ?>
            <div class="form-row">
             
            </div>
            <br>
            <i class="fa fa-close delete-product" style="display:none"></i>
            <hr>
          </div>
          <?php $i++; endforeach ?>
        
              <?php } else if(isset($solicitudCO->estatus_solicitud)=='modificada CO'){ $i=0;?>
                <?php foreach ($detalle as $key => $value) : ?>   
            
          <div id="item-producto<?= $key ?>" class="itemproducto">
            <div class="form-row">
              <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Producto*</label> 
                <?php if ($value->tbl_catalogo_idtbl_catalogo == NULL) : ?>
                  <?php if (isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras'] > 2) : ?>
                    <select name="producto[]" class="selectpicker producto" required data-live-search="true">
                      <option value="0" selected="selected">Producto inexistente en el catálogo</option>
                      <?php foreach ($catalogo as $key => $values) : ?>
                        <option value="<?php echo $values->idtbl_catalogo ?>" data-precio="<?php echo $values->precio ?>" data-moneda="<?php echo $values->tipo_moneda ?>" data-preciolabel="<?php echo number_format($values->precio, 2) . (($values->tipo_moneda == 'p') ? ' Pesos' : ' Dolares') ?>" data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>" data-categoria="<?php echo $values->idctl_categorias ?>">
                          <?php echo $values->uid . ' ' . $values->marca . ' ' . $values->modelo . ' (' . substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT), 0, 70) . ')' ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                    <input type="hidden" class="id" value="<?php echo $value->iddtl_solicitud_catalogo ?>">
                    <input type="hidden" class="nuevo">
                    <button type="button" class="btn btn-info actualizar">Actualizar</button>
                  <? else : ?>
                    <input type="text" name="" class="form-control" disabled value="Producto inexistente en el catálogo">
                    <input type="hidden" name="producto[]" class="form-control" value="0">
                  <?php endif ?>
                <?php else : ?>
                  <?php array_push($productos_enviar, $value->tbl_catalogo_idtbl_catalogo) ?>
                  <input type="text" name="" class="form-control" disabled value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                  <input type="hidden" name="producto[]" class="form-control product" value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                <?php endif ?>
              </div>
              <?php if ($this->session->userdata('tipo') == 11) { ?>
                <div class="col">
                  <label for="cantidad">Cantidad*</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $value->cantidad ?>">
                </div>
              <?php } ?>
              <?php if ($this->session->userdata('tipo') != 11) { ?>
                <div class="col">
                  <label for="cantida">Cantidad*</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $value->cantidad ?>">
                </div>
              <?php } ?>
           
              <?php if ($this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud == 'AG') { ?>
                <div class="col">
                  <label for="cantidad">Existencias</label>
                  <input type="text" name="" id="<?= $value->idtbl_catalogo ?>" disabled class="form-control">
                </div>
              <?php } ?>
            </div>
            <br>
            <?php if(isset($solicitudCO->estatus_solicitud)=='modificada CO' && $this->session->userdata('tipo')!=4){ ?>
            <div class="form-row">
              
              <?php if ($this->session->userdata('tipo') == 11 && $detalleCO[$i]->cantidad != $value->cantidad) { ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado por:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->nombreCO ?> (CO)" disabled>
              </div>
                <div class="col">
                  <label for="cantidad">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                </div>
              <?php } ?>
              <?php if ($this->session->userdata('tipo') != 11) { ?>
                <?php if($detalleCO[$i]->cantidad != $value->cantidad){ ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado por:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->nombreCO ?> (CO)" disabled>
              </div>
                <div class="col">
                  <label for="cantida">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-md-5 col-lg-6">
                <label style="display: none;">Modificado por:</label>                 
                <input type="hidden" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->nombreCO ?> (CO)" disabled>
              </div>
                <div class="col">
                  <label style="display: none;" for="cantida">Cantidad anterior:</label>
                  <input type="hidden" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                </div>
                <?php } ?>
              <?php } ?>           
            </div>
            <br>
              <?php } ?> 
            <div class="form-row">
             
            </div>
            <br>
            <i class="fa fa-close delete-product" style="display:none"></i>
            <hr>
          </div>
          <?php $i++; endforeach ?>
            
              <?php }else if(isset($solicitudPM->estatus_solicitud)=='modificada PM'){ $i=0;?>
                <?php foreach ($detalle as $key => $value) : ?>
                  
          <div id="item-producto<?= $key ?>" class="itemproducto">
            <div class="form-row">
              <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Producto*</label> 
                <?php if ($value->tbl_catalogo_idtbl_catalogo == NULL) : ?>
                  <?php if (isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras'] > 2) : ?>
                    <select name="producto[]" class="selectpicker producto" required data-live-search="true">
                      <option value="0" selected="selected">Producto inexistente en el catálogo</option>
                      <?php foreach ($catalogo as $key => $values) : ?>
                        <option value="<?php echo $values->idtbl_catalogo ?>" data-precio="<?php echo $values->precio ?>" data-moneda="<?php echo $values->tipo_moneda ?>" data-preciolabel="<?php echo number_format($values->precio, 2) . (($values->tipo_moneda == 'p') ? ' Pesos' : ' Dolares') ?>" data-descripcion="<?php echo $values->descripcion ?>" data-categoria="<?php echo $values->idctl_categorias ?>">
                          <?php echo $values->uid . ' ' . $values->marca . ' ' . $values->modelo . ' (' . substr($values->descripcion, 0, 70) . ')' ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                    <input type="hidden" class="id" value="<?php echo $value->iddtl_solicitud_catalogo ?>">
                    <input type="hidden" class="nuevo">
                    <button type="button" class="btn btn-info actualizar">Actualizar</button>
                  <? else : ?>
                    <input type="text" name="" class="form-control" disabled value="Producto inexistente en el catálogo">
                    <input type="hidden" name="producto[]" class="form-control" value="0">
                  <?php endif ?>
                <?php else : ?>
                  <?php array_push($productos_enviar, $value->tbl_catalogo_idtbl_catalogo) ?>
                  <input type="text" name="" class="form-control" disabled value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                  <input type="hidden" name="producto[]" class="form-control product" value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                <?php endif ?>
              </div>
              <?php if ($this->session->userdata('tipo') == 11) { ?>
                <div class="col">
                  <label for="cantidad">Cantidad*</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $value->cantidad ?>">
                </div>
              <?php } ?>
              <?php if ($this->session->userdata('tipo') != 11) { ?>
                <div class="col">
                  <label for="cantida">Cantidad*</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $value->cantidad ?>">
                </div>
              <?php } ?>
           
              <?php if ($this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud == 'AG') { ?>
                <div class="col">
                  <label for="cantidad">Existencias</label>
                  <input type="text" name="" id="<?= $value->idtbl_catalogo ?>" disabled class="form-control">
                </div>
              <?php } ?>
            </div>
            <br>
              <?php if(isset($solicitudPM->estatus_solicitud)=='modificada PM' && $this->session->userdata('tipo')!=4 && $this->session->userdata('tipo')!=1){ ?>
                
            <div class="form-row">
              
              <?php if ($this->session->userdata('tipo') == 11) { ?>
                <?php if($detallePM[$i]->cantidad != $value->cantidad){ ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado por:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->responsable ?> (PM)" disabled>
              </div>
                <div class="col">
                  <label for="cantida">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad; ?>" disabled>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-md-5 col-lg-6">
                <label style="display: none;">Modificado por:</label>                 
                <input type="hidden" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->responsable ?> (PM)" disabled>
              </div>
                <div class="col" style="display: none;">
                  <label style="display: none;" for="cantida">Cantidad anterior:</label>
                  <input type="hidden" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad; ?>" disabled>
                </div>
                <?php } ?>
              <?php } ?>
              <?php if ($this->session->userdata('tipo') != 11) { ?>
                <?php if($detallePM[$i]->cantidad != $value->cantidad){ ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado por:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->responsable ?> (PM)" disabled>
              </div>
                <div class="col">
                  <label for="cantida">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad; ?>" disabled>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-md-5 col-lg-6">
                <label style="display: none;">Modificado por:</label>                 
                <input type="hidden" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->responsable ?> (PM)" disabled>
              </div>
                <div class="col" style="display: none;">
                  <label style="display: none;" for="cantida">Cantidad anterior:</label>
                  <input type="hidden" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad; ?>" disabled>
                </div>
                <?php } ?>
              <?php  } ?>           
            </div>
            <br>
            
              <?php } ?>
              <?php if(isset($solicitudPM->estatus_solicitud)==='modificada AC' && $this->session->userdata('tipo')==1){ ?>
            <div class="form-row">
              
              <?php if ($this->session->userdata('tipo') == 11) { ?>
                <?php if($detallePM[$i]->cantidad != $value->cantidad){ ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado pors:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->responsable ?> (PM)" disabled>
              </div>
                <div class="col">
                  <label for="cantida">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad; ?>" disabled>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-md-5 col-lg-6">
                <label style="display: none;">Modificado por:</label>                 
                <input type="hidden" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->tbl_users_idtbl_users_ac ?> (AC)" disabled>
              </div>
                <div class="col" style="display: none;">
                  <label style="display: none;" for="cantida">Cantidad anterior:</label>
                  <input type="hidden" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad; ?>" disabled>
                </div>
                <?php } ?>
              <?php } ?>
              <?php if ($this->session->userdata('tipo') != 11) { ?>
                <?php if($detallePM[$i]->cantidad != $value->cantidad){ ?>
                <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Modificado por:</label>                 
                <input type="text" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitudPM->nombreAC ?> (AC)" disabled>
              </div>
                <div class="col">
                  <label for="cantida">Cantidad anterior:</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad; ?>" disabled>
                </div>
                <?php }else{ ?>
                  <div class="col-xs-12 col-md-5 col-lg-6">
                <label style="display: none;">Modificado por:</label>                 
                <input type="hidden" name="modPM" id="modPM" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $solicitud->tbl_users_idtbl_users_ac ?> (AC)" disabled>
              </div>
                <div class="col" style="display: none;">
                  <label style="display: none;" for="cantida">Cantidad anterior:</label>
                  <input type="hidden" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $detallePM[$i]->cantidad; ?>" disabled>
                </div>
                <?php } ?>
              <?php  } ?>           
            </div>
            <br>
            
              <?php } ?>
            <div class="form-row">
            
            </div>
            <br>
            <i class="fa fa-close delete-product" style="display:none"></i>
            <hr>
          </div>
          <?php $i++; endforeach ?>
       
              <?php }else{ ?>
                <?php foreach ($detalle as $key => $value) : ?>
        
          <div id="item-producto<?= $key ?>" class="itemproducto">
            <div class="form-row">
              <div class="col-xs-12 col-md-5 col-lg-6">
                <label>Producto*</label> 
                <?php if ($value->tbl_catalogo_idtbl_catalogo == NULL) : ?>
                  <?php if (isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras'] > 2) : ?>
                    <select name="producto[]" class="selectpicker producto" required data-live-search="true">
                      <option value="0" selected="selected">Producto inexistente en el catálogo</option>
                      <?php foreach ($catalogo as $key => $values) : ?>
                        <option value="<?php echo $values->idtbl_catalogo ?>" data-precio="<?php echo $values->precio ?>" data-moneda="<?php echo $values->tipo_moneda ?>" data-preciolabel="<?php echo number_format($values->precio, 2) . (($values->tipo_moneda == 'p') ? ' Pesos' : ' Dolares') ?>" data-descripcion="<?php echo $values->descripcion ?>" data-categoria="<?php echo $values->idctl_categorias ?>">
                          <?php echo $values->uid . ' ' . $values->marca . ' ' . $values->modelo . ' (' . substr($values->descripcion, 0, 70) . ')' ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                    <input type="hidden" class="id" value="<?php echo $value->iddtl_solicitud_catalogo ?>">
                    <input type="hidden" class="nuevo">
                    <button type="button" class="btn btn-info actualizar">Actualizar</button>
                  <? else : ?>
                    <input type="text" name="" class="form-control" disabled value="Producto inexistente en el catálogo">
                    <input type="hidden" name="producto[]" class="form-control" value="0">
                  <?php endif ?>
                <?php else : ?>
                  <?php array_push($productos_enviar, $value->tbl_catalogo_idtbl_catalogo) ?>
                  <input type="text" name="" class="form-control" disabled value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                  <input type="hidden" name="producto[]" class="form-control product" value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                <?php endif ?>
              </div>
              <?php if ($this->session->userdata('tipo') == 11) { ?>
                <div class="col">
                  <label for="cantidad">Cantidad*</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?> required class="form-control cantidad" value="<?= $value->cantidad ?>">
                </div>
              <?php } ?>
              <?php if ($this->session->userdata('tipo') != 11) { ?>
                <div class="col">
                  <label for="cantida">Cantidad*</label>
                  <input type="number" name="cantidad[]" id="cantidad" <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?> required class="form-control cantidad" value="<?= $value->cantidad ?>">
                </div>
              <?php } ?>
           
              <?php if ($this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud == 'AG') { ?>
                <div class="col">
                  <label for="cantidad">Existencias</label>
                  <input type="text" name="" id="<?= $value->idtbl_catalogo ?>" disabled class="form-control">
                </div>
              <?php } ?>
            </div>
            <br>
         
           
            <div class="form-row">
       
            </div>
            <br>
            <i class="fa fa-close delete-product" style="display:none"></i>
            <hr>
          </div>
          <?php endforeach ?>
          
              <?php } ?>
        <br><br>
        <div class="clearfix pt-md">
          <div class="pull-right">
            <?= form_hidden('token', $token) ?>
            <?= form_hidden('uid', $solicitud->uid) ?>
    
            <?php if (($solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO PM') && $this->session->userdata('tipo') == 11) { ?>
              <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
              <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar Solicitud</button>
              <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
            <?php } ?>
            <?php if ($solicitud->user_aprobacion_id == $this->session->userdata('id') &&  ($solicitud->estatus_solicitud == 'creada' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'PM') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) : ?>
              <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
              <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar Solicitud</button>
              <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
            <?php endif ?>
            <?php if (($solicitud->estatus_solicitud == 'AG') && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && (($value->entregado * 100) / $value->cantidad) < 100) : ?>
              <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
              <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
              <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <div id="hiper">

              </div>
              <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
            <?php endif ?>
            <?php if (($solicitud->estatus_solicitud == 'AC') && $this->session->userdata('tipo')==1 && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && (($value->entregado * 100) / $value->cantidad) < 100) : ?>
              <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
              <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
              <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <div id="hiper">

              </div>
              <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
            <?php endif ?>

            <?php if (($solicitud->estatus_solicitud == 'SU') && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && (($value->entregado * 100) / $value->cantidad) < 100 && $permiso > 2) : ?>
              <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
              <a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen_seleccionado ?>/<?php echo $solicitud->uid ?>/<?php echo $solicitud->uid_proyecto ?>" class="btn-primary btn surtir">
                Surtir
              </a>

              <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
            <?php endif ?>

            <?php if (($solicitud->estatus_solicitud == 'SU AC') && $this->session->userdata('tipo')==1 && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && 100 && $permiso > 2) : ?>
              
              <a href="<?= base_url() ?>almacen/nueva-salidaAC/<?php echo $solicitud->uid ?>" class="btn-primary btn surtir" id="surtido">
                Surtido
              </a>

              <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
            <?php endif ?>

            <?php if (($solicitud->estatus_solicitud == 'SU CV') && $this->session->userdata('tipo')==3 && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && (($value->entregado * 100) / $value->cantidad) < 100 && $permiso > 2) : ?>
              
              <a href="<?= base_url() ?>almacen/nueva-salidaCV/<?php echo $solicitud->uid ?>" class="btn-primary btn surtir" id="surtidocv">
                Surtido
              </a>

              <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
            <?php endif ?>

            <?php if ($this->session->userdata('permiso_autorizar') == 'si' && ($solicitud->estatus_solicitud == 'SU RCV') && $this->session->userdata('tipo')==3 && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && (($value->entregado * 100) / $value->cantidad) < 100 && $permiso > 2) : ?>
              
              <a href="<?= base_url() ?>almacen/nueva-salidaRCV/<?php echo $solicitud->uid ?>" class="btn-primary btn surtir" id="surtidorcv">
                Surtido
              </a>

              <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
            <?php endif ?>

            <?php if ($this->session->userdata('permiso_autorizar') == 'si' && ($solicitud->estatus_solicitud == 'SU Sis') && $this->session->userdata('tipo')==2 && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && (($value->entregado * 100) / $value->cantidad) < 100 && $permiso > 2) : ?>
              
              <a href="<?= base_url() ?>almacen/nueva-salidaSistemas/<?php echo $solicitud->uid ?>" class="btn-primary btn surtir" id="surtidosistemas">
                Surtido
              </a>

              <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
            <?php endif ?>

            <?php if (($solicitud->estatus_solicitud == 'SU AM' && ($this->session->userdata('tipo')==10 || $this->session->userdata('tipo')==14)) && (($value->entregado * 100) / $value->cantidad) < 100 ) : ?>
              
              <a href="<?= base_url() ?>almacen/nueva-salidaAC/<?php echo $solicitud->uid ?>" class="btn-primary btn surtir" id="surtido">
                Surtido
              </a>

            <?php endif ?>

          </div>
        </div>
        <?= form_close() ?>
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
        <table class="" style="width:100%" border="1" cellpadding="4" cellspacing="0">
          <thead>
            <tr>
              <th class="b_top b_bottom b_left" style="text-align: center" width="20%" rowspan="2">
                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 80px;">
              </th>
              <th class="b_top" width="50%" style="vertical-align: middle; text-align: center">
                ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.
              </th>
              <th class="b_top b_right" style="vertical-align: middle; text-align: center; font-size:12px;" width="25%" rowspan="2">
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
        <table id="datos_solicitud" style="width: 100%;font-size: 12px;margin-top: 10px;" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>FECHA Y HORA</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= date("d-m-Y h:i:s", strtotime($solicitud->fecha_creacion)) ?>
                    </td>
                    <td class="default-text b_top b_right b_bottom">
                      <strong>FOLIO</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $solicitud->uid ?>
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
                    <td class="b_top b_right b_bottom" style="width: 150px;!important" align="center">
                      <?= $solicitud->numero_proyecto ?>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $solicitud->nombre_proyecto ?>
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
                      <?= (empty($solicitud->segmento))? $solicitud->direccion_proyecto : $solicitud->segmento; ?>
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
                      <?= $solicitud->responsable ?>
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
                      <?= $solicitud->coordinador ?>
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
                      <?= ($solicitud->tbl_contratistas_idtbl_contratistas != '' && $solicitud->tbl_usuarios_idtbl_usuarios_supervisor) ? $solicitud->contratista : '&nbsp;' ?>
                    </td>
                    <td class="default-text b_top b_right b_bottom">
                      <strong>SUPERVISOR (Interno)</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= ($solicitud->tbl_contratistas_idtbl_contratistas != '' && $solicitud->tbl_usuarios_idtbl_usuarios_supervisor) ? $solicitud->supervisor : '&nbsp;' ?>
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
                      <?= $solicitud->recibe ?>
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
                <td><?= $value->observaciones ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <br>
        <table style="width: 100%;margin-top: 15px;" border="0" cellpadding="4" cellspacing="0" align="center">
          <tbody style="font-size: 12px!important;" align="center">
            <tr>
              <td colspan="2" width="50%" align="center" class="nombre_empleado_recibe">Almacen General</td>
              <td colspan="2" width="50%" align="center" class="nombre_empleado_entrega"><?= $solicitud->recibe ?></td>
            </tr>
            <tr>
              <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y %H') ?></td>
              <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<div class="modal fade bd-example-modal-lg" id="cancelarModal" tabindex="-1" role="dialog" aria-labelledby="vacacionesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vacacionesLabel">Cancelar solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" class="needs-validation" id="formuploadajax_cancel" novalidate method="post">

  
          <br>
          <?= form_hidden('uid', $solicitud->uid) ?>
          <?= form_hidden('token', $token) ?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" id="btnCancel" class="btn btn-primary ladda-button" data-style="expand-right">Aceptar</button>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).on('change', '#selectAlmacen', function(event) {
    event.preventDefault();
    var id_almacen = $("#selectAlmacen").find(':selected').data('idtbl-almacenes');
    <?php for ($x = 0; $x < sizeof($productos_enviar); $x++) { ?>
      $.ajax({
        url: "<?= base_url() ?>almacen/getExistencias",
        type: "POST",
        data: "idtbl_catalogo=" + <?= $productos_enviar[$x] ?> + "&idtbl_almacenes=" + id_almacen,
        success: function(respuesta) {
          //alert(<?= $productos_enviar[$x] ?>+" "+id_almacen);
          var registros = eval(respuesta);
          if ($.isEmptyObject(registros)) {
            $("#<?= $productos_enviar[$x] ?>").attr('value', '0');
          } else {
            $("#<?= $productos_enviar[$x] ?>").attr('value', registros[0]['existencias']);
          }
        }
      });
    <?php } ?>
  });
</script>
<script>
  var cant=0;
  $(".cantidad").each(function(){
    cant += parseFloat($(this).val());
  });
  $('.as').click(function(event) {
    $('.surtir').removeAttr('style');
    $("#almacen").removeAttr('style');
    $('.as').css('display', 'none');
    $('.cs').css('display', 'none');
  });
  $(document).on('change', '.producto', function(event) {
    event.preventDefault();
    var _this = $(this).closest('.itemproducto');
    $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));
    $(_this).find('.nuevo').val($("option:selected", this).val());
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
  $('#surtir').click(function(event) {
    window.open('<?= base_url() ?>almacen/detalle-solicitud-material/<?= $uid ?>','Materiales', 'width=800, height=600');
  });
  $('#btnCancel').click(function(event) {
    var formData = new FormData(document.getElementById("formuploadajax_cancel"));
    $.ajax({
      url: "<?= base_url()?>almacen/cancelar-solicitud",
      type: "post",
      dataType: "json",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      complete: function (res) {
        var resp = JSON.parse(res.responseText);
        if (resp.error == false) {
          $('#cancelarModal').modal('hide');
          $('.ocultar').hide();
          Swal.fire(
            '¡Exitoso!',
            resp.mensaje,
            'success'
            )
          location.href="<?= base_url() ?>almacen/solicitudes-almacen";
        } else {
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          })
        }
      }
    });
  });
  $('#modificar').click(function(event) {
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea modificar y aprobar la solicitud de compra?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        var cant2=0;
        $(".cantidad").each(function(){    
        cant2 += parseFloat($(this).val());
       });
        //alert(cant2);
        if(cant==cant2){
          Toast.fire({
                type: 'error',
                title: '¡No hubo cambios!'
              })
        }else{
        $.ajax({
          url: "<?= base_url() ?>almacen/modificar-solicitud",
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
              })
            }
          }
        });
      }
      }
    })
  });
  $('#aprobar').click(function(event) {
    event.preventDefault();
    var tipo = <?= $this->session->userdata('tipo')?>;
    console.log(tipo);
    if ( ($("#selectAlmacen").val() == '' || $("#selectAlmacen").val() == null) && tipo == 4) {
      Toast.fire({
        type: 'error',
        title: '¡No has seleccionado un Almacen!'
      });
      return 0;
    }
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea aprobar la solicitud de material?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>almacen/aprobar-solicitud",
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

  $('#surtido').click(function(event) {
    event.preventDefault();
    var tipo = <?= $this->session->userdata('tipo')?>;
    console.log(tipo);
    if ( ($("#selectAlmacen").val() == '' || $("#selectAlmacen").val() == null) && tipo == 4) {
      Toast.fire({
        type: 'error',
        title: '¡No has seleccionado un Almacen!'
      });
      return 0;
    }
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Los materiales ya fueron surtidos?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>almacen/surtir-solicitudAC",
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

  $('#surtidocv').click(function(event) {
    event.preventDefault();
    var tipo = <?= $this->session->userdata('tipo')?>;
    console.log(tipo);
    if ( ($("#selectAlmacen").val() == '' || $("#selectAlmacen").val() == null) && tipo == 4) {
      Toast.fire({
        type: 'error',
        title: '¡No has seleccionado un Almacen!'
      });
      return 0;
    }
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Los materiales ya fueron surtidos?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>almacen/surtir-solicitudCV",
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

  $('#surtidorcv').click(function(event) {
    event.preventDefault();
    var tipo = <?= $this->session->userdata('tipo')?>;
    console.log(tipo);
    if ( ($("#selectAlmacen").val() == '' || $("#selectAlmacen").val() == null) && tipo == 4) {
      Toast.fire({
        type: 'error',
        title: '¡No has seleccionado un Almacen!'
      });
      return 0;
    }
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Los materiales ya fueron surtidos?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>almacen/surtir-solicitudRCV",
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

  $('#surtidosistemas').click(function(event) {
    event.preventDefault();
    var tipo = <?= $this->session->userdata('tipo')?>;
    console.log(tipo);
    if ( ($("#selectAlmacen").val() == '' || $("#selectAlmacen").val() == null) && tipo == 4) {
      Toast.fire({
        type: 'error',
        title: '¡No has seleccionado un Almacen!'
      });
      return 0;
    }
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Los materiales ya fueron surtidos?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>almacen/surtir-solicitudSistemas",
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

  function imprimirElemento(elemento) {
    var printContents = document.getElementById(elemento).innerHTML;
    var ventana = window.open('', 'PRINT', '');
    ventana.document.write('<html><head><title>Requisición a Almacén</title>');
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