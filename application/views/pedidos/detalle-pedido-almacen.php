<!-- Solo lo verán los usuarios de compras -->
<?php if($this->session->userdata('tipo') != 7){ ?>
<section class="nueva-solicitud">
  <div class="container-fluid">
     <div class="card">
      <div class="card-header d-flex align-items-center d-print-none">
        <h3 class="h4 mr-auto p-2">Detalle Pedido</h3>
        <div class="p-2 d-print-none">
          <!--<button class="btn btn-secondary btn-info float-right" id="btnImprimirDiv" tabindex="0">
            <span><i class="fa fa-print"></i> Imprimir</span>
          </button>-->
          <a class="btn btn-info" href="<?php echo base_url() ?>Pedidos/imprimirDetallePedido/<?=  $pedido->uid; ?>" onClick="openWin(this)">
            Imprimir Detalle Pedido
          </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table sin-borde">
          <tbody>
            <tr>
              <th colspan="2"><strong>Proyecto:</strong> <?= $pedido->numero_proyecto ?> - <?= $pedido->nombre_proyecto.' ('.$pedido->nombre_comercial_cliente.')' ?></th>
              <th colspan="2"><strong>Segmento: </strong><?= $pedido->direccion ?></th>
            </tr>
            <tr>
              <td colspan="2"><strong>Pedido UID:</strong> <?= $pedido->uid ?></td>
              <td colspan="2"><strong>Requisición: </strong> <?= $pedido->tbl_solicitudes_almacen_idtbl_solicitudes_almacen?></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Autor:</strong> <?= $pedido->nombre ?></td>
              <td colspan="2"><strong>Fecha: </strong> <?= date("d-m-Y", strtotime($pedido->fecha_pedido_estimacion)) ?></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Proveedor:</strong> <?= $pedido->nombre_fiscal ?></td>
              <td colspan="2"><strong>RFC: </strong> <?= $pedido->rfc ?></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Almacén</strong> <?= $pedido->almacen ?></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?php $subtotal=0; ?>
        <div class="table-responsive">
          <table class="table table-border">
            <thead>
              <tr>
                <th>Neodata</th>
                <th>Descripción</th>
                <th>Unidad</th>
                <th style="text-align:center;">Entrega</th>
                <th width="180">Cantidad</th>
                <th>Precio</th>
                <th>Importe</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($detalle as $key => $value): ?>
              <tr>
                <td><?= $value->neodata ?></td>
                <td><?= $value->descripcion ?></td>
                <td><?= $value->unidad_medida_abr ?></td>
                <td style="text-align: center;"><?= $value->fecha_entrega ?></td>
                <?php
                  if( isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0 || 
                  isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0 && $pedido->estatus == null) {
                  ?>
                    <td width="150" class="d-print-none">
                      <input type="hidden" class="form-control" id="cantSolicitadaOrg_<?=$value->iddtl_pedido_catalogo;?>" value="<?= $value->cantidad;?>" >
                      <input type="hidden" class="form-control" id="idtbl_pedidos_<?=$value->iddtl_pedido_catalogo;?>" value="<?=$value->tbl_pedidos_idtbl_pedidos;?>" >
                      <input type="hidden" class="form-control" id="idtbl_catalogo_<?=$value->iddtl_pedido_catalogo;?>" value="<?=$value->tbl_catalogo_idtbl_catalogo;?>" >
                      <input type="hidden" class="form-control" id="idtbl_solicitudes_almacen_<?=$value->iddtl_pedido_catalogo;?>" value="<?= $pedido->tbl_solicitudes_almacen_idtbl_solicitudes_almacen ?>" >
                      <input type="hidden" class="form-control" id="estimacion" value="<?=$pedido->estimacion?>" >
                      <input type="number" class="form-control" style="width:80px; float:left;" value="<?= $value->cantidad;?>"
                        required min="0" step="0.0001" id="cantSolicitada_<?=$value->iddtl_pedido_catalogo;?>">
                      <i class="fa fa-save hand noprint" style="position:relative;float:left" onclick="guardarCantidad(<?=$value->iddtl_pedido_catalogo;?>, '<?=$pedido->uid;?>', 'cantidades')" ></i>
                      <i class="fa fa-history hand noprint" style="position:relative;float:left" onclick="hist_cantidades(<?=$value->tbl_pedidos_idtbl_pedidos;?>, '<?=$value->tbl_catalogo_idtbl_catalogo;?>', 'cantidades')" aria-hidden="true"></i>
                    </td>
                    <td class="d-none d-print-block"><?= $value->cantidad ?></td>
                  <?php }else{ ?>
                    <td><?= $value->cantidad ?></td>
                  <?php }?>
                  <?php if( isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0 || 
                  isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0 && $pedido->estatus == null) { ?>
                    <?php $precioFinal=($pedido->tipo_moneda=='p') ? $value->precio : $value->precio ?>
                    <td width="200" class="d-print-none">
                      <input type="hidden" class="form-control" id="precioOrg_<?=$value->iddtl_pedido_catalogo;?>" value="<?= $value->precio;?>" >
                      <input type="number" class="form-control" style="width:100px; float:left;" value="<?= $precioFinal ?>"
                        required min="0" step="0.0001" id="precio_<?=$value->iddtl_pedido_catalogo;?>">
                      <i class="fa fa-save hand noprint" style="position:relative;float:left" onclick="guardarCantidad(<?=$value->iddtl_pedido_catalogo;?>, '<?=$pedido->uid;?>', 'precios')" ></i>
                      <i class="fa fa-history hand noprint" style="position:relative;float:left" onclick="hist_cantidades(<?=$value->tbl_pedidos_idtbl_pedidos;?>, '<?=$value->tbl_catalogo_idtbl_catalogo;?>', 'precios')" aria-hidden="true"></i>
                    </td>
                  <?php } else { ?>
                    <?php $precioFinal=($pedido->tipo_moneda=='p') ? $value->precio : $value->precio ?>
                    <td>$<?= number_format($precioFinal,2) ?></td>
                  <?php } ?>
                <td>$<?= number_format($value->cantidad*$precioFinal,2); $subtotal+=$value->cantidad*$precioFinal; ?></td>
              </tr>
              <?php endforeach ?>
              <tr>
                <td colspan="5" rowspan="<?= $pedido->porcentaje_retencion != NULL || $pedido->amortizacion != NULL ? strval(6) : strval(5) ?>"><strong>Nota del pedido:</strong> <?= $pedido->observaciones ?></td>
                <th>SUBTOTAL</th>
                <td>$<?= number_format($subtotal,2) ?></td>
              </tr>
              <?php if($pedido->iva === NULL) { ?>
                  <?php $iva = "0.16"; ?>
                 
                <?php } ?>
                <?php if($pedido->iva !== NULL && $pedido->iva !== 0) { ?>
                  <?php $iva = $pedido->iva / 100 ?>
                  
                <?php } ?>
                <?php if($pedido->iva === 0) { ?>
                  
                <?php } ?>
                <?php if($pedido->amortizacion != 0){ ?>
                <tr>
                  <th>Descuento</th>
                  <td>$<?= number_format($pedido->amortizacion,2) ?></td>
                </tr>
              <?php 
                  $subtotal -= $pedido->amortizacion;
                } 
              ?>
              
              
              <tr>
                <th>IVA <?= $pedido->iva === NULL ? '16' : $pedido->iva ?>%</th>
                <?php if($pedido->iva === NULL) { ?>
                  <?php $iva = "0.16"; ?>
                  <td>$<?= number_format($subtotal*$iva,2) ?></td>
                <?php } ?>
                <?php if($pedido->iva !== NULL && $pedido->iva !== 0) { ?>
                  <?php $iva = $pedido->iva / 100 ?>
                  <td>$<?= number_format($subtotal*$iva,2) ?></td>
                <?php } ?>
                <?php if($pedido->iva === 0) { ?>
                  <td>$<?= number_format(0,2) ?></td>
                <?php } ?>
              </tr>
              <?php
                  if(($pedido->iva !== 0 && $pedido->iva !== NULL) || $pedido->iva === NULL) {
                    $total = ($subtotal*$iva)+$subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0);
                  }
                  if($pedido->iva === 0) {
                    $total = $subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0);
                  }
                ?>
              <?php if($pedido->porcentaje_retencion != NULL) { ?>
                <tr>
                  <th>Retención <?= $pedido->porcentaje_retencion ?>%</th>
                  <td>$<?= number_format($pedido->retencion,2) ?></td>
                </tr>
              <?php } ?>
              
              <tr>
                
                
                <th>TOTAL</th>
                <td>$<?= number_format($total,2) ?></td>
              </tr>
              <tr>
                <th>Nota de credito</th>
                <td>$<?= number_format($pedido->nota_credito,2) ?></td>
              </tr>
              <tr>
                <?php $total = number_format($total - $pedido->nota_credito, 2); ?>
                <th>Total</th>
                <td>$<?= $total ?></td>
              </tr>
              <tr>
                <?php if($pedido->tipo_moneda == 'p') { ?>
                  <td colspan="7" align="right">(* <?php echo numletras($total,'p') ?> *)</td>
                <?php } ?>
                <?php if($pedido->tipo_moneda == 'd') { ?>
                  <td colspan="7" align="right">(* <?php echo numletras($total,'d') ?> *)</td>
                <?php } ?>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="clearfix pt-md d-print-none">
          <div class="pull-right">
            <a href="javascript:history.go(-1)" class="btn-warning btn">Regresar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<div id="entrada_virtual" tabindex="-1" role="dialog" aria-labelledby="labelEntradaVirtual" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php echo form_open_multipart(base_url().'almacen/guardar-nueva-entrada-virtual', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Entrada Virtual</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="uid" name="uid" class="form-control" hidden readonly required>
                <input type="text" placeholder="pedido" name="idpedido" class="form-control" hidden required>
                <input type="text" placeholder="proyecto" name="proyecto" class="form-control" hidden required>
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
                </div>
                <div class="row">
                    <div class="col divContratistas" style="display: none;">
                        <div class="form-group">
                            <label>Contratista*</label>
                            <select name="contratista" id="contratista" class="selectpicker form-control"
                                data-live-search="true">
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
                            <select name="supervisor" id="supervisor" class="selectpicker form-control"
                                data-live-search="true">
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
                            <select name="usuario" id="recibe" class="selectpicker form-control" data-live-search="true"
                                required>
                                <option value="" disabled selected>Seleccione...</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione al personal
                            </div>
                        </div>
                    </div>
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

<!-- Lo verán todos los usuarios que no sean compras -->
<?php if($this->session->userdata('tipo') == 7){ ?>
<section class="forms">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Nueva Entrada - Almacen (<?= $pedido->almacen ?>)</h3> <!--ruth-->
            </div> 
            <div class="card-body">
                <?php echo validation_errors('<p class="text-danger">*Adjunte sus archivos nuevamente.</p><p class="text-danger">', '</p>'); ?>
                <?php echo form_open_multipart(base_url().'almacen/guardar-nueva-entrada', 'class="needs-validation" id="formuploadajax" onsubmit="return checkSubmit();" novalidate'); ?>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th colspan="3">Detalles de entrada</th>
                        </tr>
                        <?php if($data['pedido']->entregado != $data['pedido']->cantidad && $data['pedido']->estatus != 'cancelada'){ ?>
                        <tr id="personal_recibe" class="resultado">
                            <td colspan="3">
                                <div class="form-group">
                                    <label for="existencias">Personal que recibe*</label>
                                    <select name="usuario_entrega" id="personal_entrega" class="form-control" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <?php foreach ($autorizados as $key => $value): ?>
                                            <option value="<?php echo $value->idctl_autorizados_entrega ?>" data-nombre="<?php echo $value->nombre?>"><?php echo $value->nombre?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccione al personal
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr class="resultado">
                            <td colspan="3">
                                <table style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <p><strong>Proyecto:</strong> <span id="proyecto"><?= $data['pedido']->nombre_proyecto ?></span></p>
                                                <p><strong>Pedido UID: </strong> <span id="pedido_uid"><?= $data['pedido']->uid ?></span></p>
                                                <p><strong>Autor: </strong> <span id="autor"><?= $data['pedido']->nombre ?></span></p>
                                                <!--<p><strong>Fecha: </strong> <span id="fecha"></span></p>
                                                <p><strong>Requisición: </strong> <span id="requisicion"></span></p>
                                                <p><strong>Lugar de entrega: </strong> <span id="lugar_de_entrega"></span></p>
                                                <p><strong>Tipo de moneda: </strong> <span id="tipo_de_moneda"></span></p>-->
                                            </td>
                                            <td width="50%">
                                                <p><strong>Fecha: </strong> <span id="fecha"></span><?= $data['pedido']->fecha_creacion ?></p>
                                                <p><strong>Requisición: </strong> <span id="requisicion"><?= $data['pedido']->uid_requisicion ?></span></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr class="resultado">
                            <td colspan="3">
                            <?php $entregados = 0; $pendientes = 0; ?>
                                <table style="width:100%" id="table">
                                    <?php foreach($data['detalle'] AS $key => $value){ ?>
                                      <?php if($value->cantidad != $value->entregado){ ?>
                                        <tr class="tr">
                                          <input type="hidden" class="form-control neodata" value="<?= $value->neodata ?>">
                                <td style="width: 180px;"><center><label><strong>Neodata </strong><i style=font-size:18px; class="fa fa-question-circle fa-2xs"data-toggle="tooltip" data-placement="top" title="Cambiar código al homologado"></i>
</button></label></center><center><select style="padding:0px;" class="form-control idcatalogo" name="id-producto-catalogo[]" id="s_<?= $value->tbl_catalogo_idtbl_catalogo ?>_<?= $key ?>"><option value="<?= $value->tbl_catalogo_idtbl_catalogo ?>"><?= $value->neodata ?></option></select></center></td>
                                <td><center><label><strong>Descripción</strong></label></center><center><?= $value->descripcion ?></center></td>
                                <td><center><label><strong>Unidad</strong></label></center><center><?= $value->unidad_medida_abr ?></center></td>
                                <td><center><label><strong>Cantidad Inicial</strong></label></center><center><?= $value->cantidad ?></center></td>
                                <td><center><label><strong>Cantidad Ingresada</strong></label></center><center><?= $value->entregado ?></center></td>
                                <td><center><label><strong>Cantidad a Ingresar</strong></label></center>
                                <input type="number" class="form-control cantidades cantidad" name="cantidad[]" value="0" required  step="0.01" max="<?= $value->cantidad - $value->entregado ?>">
                                <!--<input type="hidden" class="form-control" name="id-producto-catalogo[]" value="<?= $value->tbl_catalogo_idtbl_catalogo ?>" required min="0">-->
                                <input type="hidden" class="form-control" name="id_registro[]" value="<?= $value->iddtl_pedido_catalogo ?>" required min="0">
                                </td>
                                <td><center><label><strong>Precio Unitario</strong></label></center><input type="number" class="form-control cantidades precio" readonly name="precio[]" min="0" value="<?= $value->precio ?>"></span></td>
                                <td class="importes"><center><label><strong>Importe</strong></label></center><center>$<span>0.00</span></center></td>
                                </tr>
                                <tr class="tr" style="<?= $value->ctl_categorias_idctl_categorias == 16 || ($detalle_almacen->idtbl_almacenes == 2 && $value->ctl_categorias_idctl_categorias == 10) || ($detalle_almacen->idtbl_almacenes == 30 && $value->ctl_categorias_idctl_categorias == 10) ? '' : 'display: none' ?>"*/>
                                  <td colspan="2">
                                    <center><label style="color: red;"><strong>Marca*</strong></label></center>
                                    <input type="text" name="marca_almacen[]" class="form-control" <?= $value->ctl_categorias_idctl_categorias == 16 || ($detalle_almacen->idtbl_almacenes == 2 && $value->ctl_categorias_idctl_categorias == 10) ? '' : '' ?> value="">
                                  </td>
                                  <td colspan="6">
                                    <center><label style="color: red;"><strong>Modelo*</strong></label></center>
                                    <input type="text" name="modelo_almacen[]" class="form-control" <?= $value->ctl_categorias_idctl_categorias == 16 || ($detalle_almacen->idtbl_almacenes == 2 && $value->ctl_categorias_idctl_categorias == 10) ? '' : '' ?> value="">
                                  </td>
                                </tr>                                
                                <tr class="tr" style="<?= $value->ctl_categorias_idctl_categorias == 16 || ($detalle_almacen->idtbl_almacenes == 2 && $value->ctl_categorias_idctl_categorias == 10) || ($detalle_almacen->idtbl_almacenes == 30 && $value->ctl_categorias_idctl_categorias == 10) ? '' : 'display: none' ?>">
                                <td colspan="3">
                                <center><label style="color: red;"><strong>Número de serie*</strong></label></center>
                                <input type="text" name="numero_serie[]" class="form-control" <?= $value->ctl_categorias_idctl_categorias == 16 || ($detalle_almacen->idtbl_almacenes == 2 && $value->ctl_categorias_idctl_categorias == 10) ? '' : '' ?> value="">
                                </td>
                                <td colspan="5">
                                <center><label style="color: red;"><strong>Número interno*</strong></label></center>
                                <input type="text" name="numero_interno[]" class="form-control" value="">
                                </td>                                                               
                                </tr>
                      
                                <tr class="resultado">
                                <td id="td_tipo_documento" colspan="3">
                                <center><label><strong>Tipo de Documento*</strong></label></center>
                                <select name="tipo_documento" id="tipo_documento" class="form-control" data-live-search="true">
                                <option value="" selected="selected" disabled="disabled">Seleccione...</option>
                                <option value="1">Factura</option>
                                <option value="2">Nota de Remisión</option>
                                <option value="3">Responsiva</option>
                                <option value="4">Pedido</option>
                                <option value="5">Otro</option>
                                </select>
                                </td>
                                <td id="td_numero_documento" colspan="3">
                                <center><label><strong>Número de Documento*</strong></label></center>
                                <input type="text" name="numero_documento[]" class="mayusculas form-control" required
                                value="<?= set_value('numero_documento')  ?>">
                                </td>
                                <td id="documento_adjunto" colspan="2">
                                <center><label><strong>Documento adjunto</strong></label></center>
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="documento[]" multiple>
                                <label class="custom-file-label" for="customFile">Archivo</label>
                                </div>
                                </td>
                                </tr>
                                <tr class="tr">
                                <td colspan="3"><center><strong>Proveedor</strong></center></td>
                                <td colspan="3"><center><strong>Lugar de Entrega</strong></center></td>
                                <td colspan="2"><center><strong>Fecha de Entrega</strong></center></td>
                                </tr>
                                <tr class="tr">
                                <td colspan="3"><center><?= $value->nombre_fiscal ?></center></td>
                                <td colspan="3"><center><?= $value->lugar_entrega ?></center></td>
                                <td colspan="2"><center><?= $value->fecha_entrega ?></center></td>
                                </tr>
                                <tr>
                                <td style="background-color:gray;" colspan="8"></td>
                                </tr>
                                <?php $pendientes++; ?>
                                      <?php }if($value->cantidad == $value->entregado){ ?>
                                        <tr class="tr">
                                <td style="width: 180px;"><center><label><strong>Neodata</strong></label></center><center><?= $value->neodata ?></center></td>
                                <td><center><label><strong>Código</strong></label></center><center><?= $value->uid ?></center></td>
                                <td><center><label><strong>Descripción</strong></label></center><center><?= $value->descripcion ?></center></td>
                                <td><center><label><strong>Unidad</strong></label></center><center><?= $value->unidad_medida_abr ?></center></td>
                                <td colspan="3"><center><label><strong>Cantidad Inicial</strong></label></center><center><?= $value->cantidad ?></center></td>
                                <td colspan="3"><center><label><strong>Cantidad Ingresada</strong></label></center><center><?= $value->entregado ?></center></td>
                                <tr class="tr">
                                <td colspan="3"><center><strong>Proveedor</strong></center></td>
                                <td colspan="3"><center><strong>Lugar de Entrega</strong></center></td>
                                <td colspan="2"><center><strong>Fecha de Entrega</strong></center></td>
                                </tr>
                                <tr class="tr">
                                <td colspan="3"><center><?= $value->nombre_fiscal ?></center></td>
                                <td colspan="3"><center><?= $value->lugar_entrega ?></center></td>
                                <td colspan="2"><center><?= $value->fecha_entrega ?></center></td>
                                </tr>
                                <tr>
                                <td style="background-color:gray;" colspan="8"></td>
                                </tr>
                                <?php $entregados++; ?>
                                      <?php } ?>
                                    <?php } ?>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <!--<a href="<?php echo base_url().'almacen/detalle/'.$this->uri->segment(3) ?>"
                            class="btn-warning btn">Cancelar</a>-->
                            <?php if($pendientes != 0 && $data['pedido']->estatus != 'cancelada' && $data['pedido']->entrada_virtual == 1){ ?>
                        <a class="btn btn-info" href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual' data-idpedido='<?= $data['pedido']->idtbl_pedidos ?>' data-proyecto='<?= $data['pedido']->tbl_proyectos_idtbl_proyectos ?>' data-uid='<?= $data['pedido']->uid ?>'>Salida Virtual</a>
                        <?php } ?>
                        <a href="<?php echo base_url().'pedidos'?>" class="btn-warning btn">Regresar</a>    
                        <?= form_hidden('token', $token) ?>
                        <?= form_hidden('uid_almacen', $detalle_almacen->uid) ?>
                        <?= form_hidden('nombre_almacen', $detalle_almacen->almacen) ?>
                        <?= form_hidden('id_almacen', $pedido->tbl_almacenes_idtbl_almacenes) ?>
                                                
                        <input type="hidden" name="idtbl_pedidos" id="idtbl_pedidos" value="<?= $data['pedido']->idtbl_pedidos ?>">
                        <input type="hidden" name="tipo_moneda" id="tipo_de_moneda2" value="<?= $data['pedido']->tipo_moneda ?>">
                        <input type="hidden" name="tbl_proyectos_idtbl_proyectos" id="tbl_proyectos_idtbl_proyectos" value="<?= $data['pedido']->tbl_proyectos_idtbl_proyectos ?>">
                        <?php if($pendientes != 0 && $data['pedido']->estatus != 'cancelada'){ ?>
                        <button type="submit" class="btn-primary btn btnGuardarEntrada">Guardar Entrada</button>
                        <?php } ?>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<!--<section>
  <div class="container-fluid" id="imprimible">
    <style>
      body {
        font-family: "Poppins", sans-serif;
        font-size: 12 px;
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
      .td-estatus:first-letter {
        text-transform: uppercase;
      }
    </style>
    <table style="width:100%; width: 100%;" border="1" cellpadding="2" cellspacing="0">
      <thead>
        <tr>
          <th rowspan="2" style="text-align: center;">
            <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 150px;">
          </th>
          <th colspan="2" width="50%" style="vertical-align: middle; text-align: center;">
            <h4>ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.</h4>
          </th>
          <th style="vertical-align: middle; text-align: right;">
            <h6>Folio: <?php echo $pedido->uid ?></h6>
          </th>
        </tr>
        <tr>
          <th colspan="2" class="text-center" style="text-align: center:">
            <h4>Orden de compra</h4>
          </th>
          <th style="vertical-align: middle; text-align: right;">
            <h6>Folio Neodata: <?= $pedido->neodata_pedido ?></h6>
          </th>
        </tr>
      </thead>
    </table>
    <br>
    <table style="width:100%;" border="1" cellpadding="4" cellspacing="0">
      <tbody>
        <tr>
          <th colspan="2" width="50%"><strong>Proyecto:</strong> <?= $pedido->numero_proyecto ?> - <?= $pedido->nombre_proyecto.' ('.$pedido->nombre_comercial_cliente.')' ?></th>
          <th colspan="2" width="50%"><strong>Segmento: </strong><?= $pedido->direccion ?></th>
        </tr>
        <tr>
          <td colspan="2"><strong>Requisición: </strong> <?= $pedido->tbl_solicitudes_almacen_idtbl_solicitudes_almacen ?></td>
          <td colspan="2"><strong>Fecha: </strong> <?= date("d-m-Y h:i:s", strtotime($pedido->fecha_creacion)) ?></td>
        </tr>
        <tr>
          <td colspan="2"><strong>Proveedor:</strong> <?= $pedido->nombre_fiscal ?></td>
          <td colspan="2"><strong>Autor:</strong> <?= $pedido->nombre ?></td>
        </tr>
          <td colspan="2"><strong>RFC: </strong> <?= $pedido->rfc ?></td>
          <?php
            if ($pedido->condicion_pago == 12) {
              $txt_adicional = 'meses';
            } elseif ($pedido->condicion_pago == 'contado') {
              $txt_adicional = '';
            } else {
              $txt_adicional = 'días';
            }
          ?>
          <td colspan="2"><strong>Condicion de pago :</strong> <?= $pedido->condicion_pago. ' '.$txt_adicional ?></td>
        <tr>
        </tr>
      </tbody>
    </table>
    <br>
    <?php $subtotal=0; ?>
    <table class="table table-border">
      <thead>
        <tr>
          <th>Código</th>
          <th>Descripción</th>
          <th>Unidad</th>
          <th>Entrega</th>
          <th width="180">Cantidad</th>
          <th>Precio</th>
          <th>Importe</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($detalle as $key => $value): ?>
        <tr>
          <td><?= $value->neodata ?></td>
          <td><?= $value->descripcion ?></td>
          <td><?= $value->unidad_medida_abr ?></td>
          <td><?= $value->fecha_entrega ?></td>
          <td><?= $value->cantidad ?></td>
          <?php $precioFinal=($pedido->tipo_moneda=='p') ? $value->precio : $value->precio ?> 
          <td>$<?= number_format($precioFinal,4) ?></td>
          <td>$<?= number_format($value->cantidad*$precioFinal,4); $subtotal+=$value->cantidad*$precioFinal; ?></td>
        </tr>
        <?php endforeach ?>
        <tr>
          <td colspan="5" rowspan="<?= $pedido->porcentaje_retencion != NULL ? '4' : '3' ?>"><strong>Nota del pedido:</strong> <?= $pedido->observaciones ?></td>
          <th>SUBTOTAL</th>
          <td>$<?= number_format($subtotal,4) ?></td>
        </tr>
        <tr>
          <th>IVA <?= $pedido->iva === NULL ? '16' : $pedido->iva ?>%</th>
          <?php if($pedido->iva === NULL) { ?>
            <?php $iva = "0.16"; ?>
            <td>$<?= number_format($subtotal*$iva,4) ?></td>
          <?php } ?>
          <?php if($pedido->iva !== NULL && $pedido->iva !== 0) { ?>
            <?php $iva = "0." . $pedido->iva ?>
            <td>$<?= number_format($subtotal*$iva,4) ?></td>
          <?php } ?>
          <?php if($pedido->iva === 0) { ?>
            <td>$<?= number_format(0,4) ?></td>
          <?php } ?>
        </tr>
        <?php if($pedido->porcentaje_retencion != NULL) { ?>
          <tr>
            <th>Retención <?= $pedido->porcentaje_retencion ?>%</th>
            <td>$<?= number_format($pedido->retencion,4) ?></td>
          </tr>
        <?php } ?>
        <tr>
          <th>TOTAL</th>
          <?php if(($pedido->iva !== 0 && $pedido->iva !== NULL) || $pedido->iva === NULL) { ?>
            <td>$<?= number_format(($subtotal*$iva)+$subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0),4) ?></td>
          <?php } ?>
          <?php if($pedido->iva === 0) { ?>
            <td>$<?= number_format($subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0),4) ?></td>
          <?php } ?>
        </tr>
        <tr>
          <?php if($pedido->tipo_moneda == 'p') { ?>
            <?php if(($pedido->iva !== 0 && $pedido->iva !== NULL) || $pedido->iva === NULL) { ?>
              <td colspan="7" align="right">(* <?php $total=number_format(($subtotal*$iva)+$subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0),2); echo numletras($total,'p') ?> *)</td>
            <?php } ?>
            <?php if($pedido->iva === 0) { ?>
              <td colspan="7" align="right">(* <?php $total=number_format($subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0),2); echo numletras($total,'p') ?> *)</td>
            <?php } ?>
          <?php } ?>
          <?php if($pedido->tipo_moneda == 'd') { ?>
            <?php if(($pedido->iva !== 0 && $pedido->iva !== NULL) || $pedido->iva === NULL) { ?>
              <td colspan="7" align="right">(* <?php $total=number_format(($subtotal*$iva)+$subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0),2); echo numletras($total,'d') ?> *)</td>
            <?php } ?>
            <?php if($pedido->iva === 0) { ?>
              <td colspan="7" align="right">(* <?php $total=number_format($subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0),2); echo numletras($total,'d') ?> *)</td>
            <?php } ?>
          <?php } ?>
        </tr>
      </tbody>
    </table>
  </div>
</section>-->
<?php
  function numletras($numero, $_moneda) {
    $numero = str_replace(',', '', $numero);
    /*
    $numero=valor a retornar en letras.
    $_moneda=1=Colones, 2=Dólares 3=Euros
    Las siguientes funciones (unidad() hasta milmillon() forman parte de ésta función
    */
    switch ($_moneda) {
      case 'p':
        $_nommoneda = 'PESOS';
        $_fin       = ' M.N.';
        break;
      case 'd':
        $_nommoneda = 'DÓLARES';
        $_fin       = ' DLS.';
        break;
    } //$_moneda
    //*** 
    $tempnum = explode('.', $numero);
    if ($tempnum[0] !== "") {
      $numf = milmillon($tempnum[0]);
      if ($numf == "UNO") {
        $numf = substr($numf, 0, -1);
      } //$numf == "UNO"
      $TextEnd = $numf . ' ';
      $TextEnd .= $_nommoneda . ' ';
    } //$tempnum[0] !== ""
    if ($tempnum[1] == "" || $tempnum[1] >= 100) {
      $tempnum[1] = "00";
    } //$tempnum[1] == "" || $tempnum[1] >= 100
    $TextEnd .= $tempnum[1];
    $TextEnd .= "/100" . $_fin;
    return $TextEnd;
  }
  function unidad($numuero) {
    switch ($numuero) {
      case 9:
        $numu = "NUEVE";
        break;
      case 8:
        $numu = "OCHO";
        break;
      case 7:
        $numu = "SIETE";
        break;
      case 6:
        $numu = "SEIS";
        break;
      case 5:
        $numu = "CINCO";
        break;
      case 4:
        $numu = "CUATRO";
        break;
      case 3:
        $numu = "TRES";
        break;
      case 2:
        $numu = "DOS";
        break;
      case 1:
        $numu = "UNO";
        break;
      case 0:
        $numu = "";
        break;
    } //$numuero
    return $numu;
  }
  function decena($numdero) {
    if ($numdero >= 90 && $numdero <= 99) {
      $numd = "NOVENTA ";
      if ($numdero > 90)
        $numd = $numd . "Y " . (unidad($numdero - 90));
    } //$numdero >= 90 && $numdero <= 99
    else if ($numdero >= 80 && $numdero <= 89) {
      $numd = "OCHENTA ";
      if ($numdero > 80) {
        $numd = $numd . "Y " . (unidad($numdero - 80));
      } //$numdero > 80
    } //$numdero >= 80 && $numdero <= 89
    else if ($numdero >= 70 && $numdero <= 79) {
      $numd = "SETENTA ";
      if ($numdero > 70)
        $numd = $numd . "Y " . (unidad($numdero - 70));
    } //$numdero >= 70 && $numdero <= 79
    else if ($numdero >= 60 && $numdero <= 69) {
      $numd = "SESENTA ";
      if ($numdero > 60) {
        $numd = $numd . "Y " . (unidad($numdero - 60));
      } //$numdero > 60
    } //$numdero >= 60 && $numdero <= 69
    else if ($numdero >= 50 && $numdero <= 59) {
      $numd = "CINCUENTA ";
      if ($numdero > 50)
        $numd = $numd . "Y " . (unidad($numdero - 50));
    } //$numdero >= 50 && $numdero <= 59
    else if ($numdero >= 40 && $numdero <= 49) {
      $numd = "CUARENTA ";
      if ($numdero > 40)
        $numd = $numd . "Y " . (unidad($numdero - 40));
    } //$numdero >= 40 && $numdero <= 49
    else if ($numdero >= 30 && $numdero <= 39) {
      $numd = "TREINTA ";
      if ($numdero > 30)
        $numd = $numd . "Y " . (unidad($numdero - 30));
    } //$numdero >= 30 && $numdero <= 39
    else if ($numdero >= 20 && $numdero <= 29) {
      if ($numdero == 20) {
        $numd = "VEINTE ";
      } //$numdero == 20
      else {
        $numd = "VEINTI" . (unidad($numdero - 20));
      }
    } //$numdero >= 20 && $numdero <= 29
    else if ($numdero >= 10 && $numdero <= 19) {
      switch ($numdero) {
        case 10:
          $numd = "DIEZ ";
          break;
        case 11:
          $numd = "ONCE ";
          break;
        case 12:
          $numd = "DOCE ";
          break;
        case 13:
          $numd = "TRECE ";
          break;
        case 14:
          $numd = "CATORCE ";
          break;
        case 15:
          $numd = "QUINCE ";
          break;
        case 16:
          $numd = "DIECISEIS ";
          break;
        case 17:
          $numd = "DIECISIETE ";
          break;
        case 18:
          $numd = "DIECIOCHO ";
          break;
        case 19:
          $numd = "DIECINUEVE ";
          break;
      } //$numdero
    } //$numdero >= 10 && $numdero <= 19
    else {
      $numd = unidad($numdero);
    }
    return $numd;
  }
  function centena($numc) {
    if ($numc >= 100) {
      if ($numc >= 900 && $numc <= 999) {
        $numce = "NOVECIENTOS ";
        if ($numc > 900)
          $numce = $numce . (decena($numc - 900));
      } //$numc >= 900 && $numc <= 999
      else if ($numc >= 800 && $numc <= 899) {
        $numce = "OCHOCIENTOS ";
        if ($numc > 800)
          $numce = $numce . (decena($numc - 800));
      } //$numc >= 800 && $numc <= 899
      else if ($numc >= 700 && $numc <= 799) {
        $numce = "SETECIENTOS ";
        if ($numc > 700)
          $numce = $numce . (decena($numc - 700));
      } //$numc >= 700 && $numc <= 799
      else if ($numc >= 600 && $numc <= 699) {
        $numce = "SEISCIENTOS ";
        if ($numc > 600)
          $numce = $numce . (decena($numc - 600));
      } //$numc >= 600 && $numc <= 699
      else if ($numc >= 500 && $numc <= 599) {
        $numce = "QUINIENTOS ";
        if ($numc > 500)
          $numce = $numce . (decena($numc - 500));
      } //$numc >= 500 && $numc <= 599
      else if ($numc >= 400 && $numc <= 499) {
        $numce = "CUATROCIENTOS ";
        if ($numc > 400)
          $numce = $numce . (decena($numc - 400));
      } //$numc >= 400 && $numc <= 499
      else if ($numc >= 300 && $numc <= 399) {
        $numce = "TRESCIENTOS ";
        if ($numc > 300)
          $numce = $numce . (decena($numc - 300));
      } //$numc >= 300 && $numc <= 399
      else if ($numc >= 200 && $numc <= 299) {
        $numce = "DOSCIENTOS ";
        if ($numc > 200)
          $numce = $numce . (decena($numc - 200));
      } //$numc >= 200 && $numc <= 299
      else if ($numc >= 100 && $numc <= 199) {
        if ($numc == 100)
          $numce = "CIEN ";
        else
          $numce = "CIENTO " . (decena($numc - 100));
      } //$numc >= 100 && $numc <= 199
    } //$numc >= 100
    else
      $numce = decena($numc);
    return $numce;
  }
  function miles($nummero) {
    if ($nummero >= 1000 && $nummero < 2000) {
      $numm = "MIL " . (centena($nummero % 1000));
    } //$nummero >= 1000 && $nummero < 2000
    if ($nummero >= 2000 && $nummero < 10000) {
      $numm = unidad(Floor($nummero / 1000)) . " MIL " . (centena($nummero % 1000));
    } //$nummero >= 2000 && $nummero < 10000
    if ($nummero < 1000)
      $numm = centena($nummero);
    return $numm;
  }
  function decmiles($numdmero) {
    if ($numdmero == 10000)
      $numde = "DIEZ MIL";
    if ($numdmero > 10000 && $numdmero < 20000) {
      $numde = decena(Floor($numdmero / 1000)) . "MIL " . (centena($numdmero % 1000));
    } //$numdmero > 10000 && $numdmero < 20000
    if ($numdmero >= 20000 && $numdmero < 100000) {
      $numde = decena(Floor($numdmero / 1000)) . " MIL " . (miles($numdmero % 1000));
    } //$numdmero >= 20000 && $numdmero < 100000
    if ($numdmero < 10000)
      $numde = miles($numdmero);
    return $numde;
  }
  function cienmiles($numcmero) {
    if ($numcmero == 100000)
      $num_letracm = "CIEN MIL";
    if ($numcmero >= 100000 && $numcmero < 1000000) {
      $num_letracm = centena(Floor($numcmero / 1000)) . " MIL " . (centena($numcmero % 1000));
    } //$numcmero >= 100000 && $numcmero < 1000000
    if ($numcmero < 100000)
      $num_letracm = decmiles($numcmero);
    return $num_letracm;
  }
  function millon($nummiero) {
    if ($nummiero >= 1000000 && $nummiero < 2000000) {
      $num_letramm = "UN MILLON " . (cienmiles($nummiero % 1000000));
    } //$nummiero >= 1000000 && $nummiero < 2000000
    if ($nummiero >= 2000000 && $nummiero < 10000000) {
      $num_letramm = unidad(Floor($nummiero / 1000000)) . " MILLONES " . (cienmiles($nummiero % 1000000));
    } //$nummiero >= 2000000 && $nummiero < 10000000
    if ($nummiero < 1000000)
      $num_letramm = cienmiles($nummiero);
    return $num_letramm;
  }
  function decmillon($numerodm) {
    if ($numerodm == 10000000)
      $num_letradmm = "DIEZ MILLONES";
    if ($numerodm > 10000000 && $numerodm < 20000000) {
      $num_letradmm = decena(Floor($numerodm / 1000000)) . "MILLONES " . (cienmiles($numerodm % 1000000));
    } //$numerodm > 10000000 && $numerodm < 20000000
    if ($numerodm >= 20000000 && $numerodm < 100000000) {
      $num_letradmm = decena(Floor($numerodm / 1000000)) . " MILLONES " . (millon($numerodm % 1000000));
    } //$numerodm >= 20000000 && $numerodm < 100000000
    if ($numerodm < 10000000) {
      $num_letradmm = millon($numerodm);
    } //$numerodm < 10000000
    return $num_letradmm;
  }
  function cienmillon($numcmeros) {
    if ($numcmeros == 100000000)
      $num_letracms = "CIEN MILLONES";
    if ($numcmeros >= 100000000 && $numcmeros < 1000000000) {
      $num_letracms = centena(Floor($numcmeros / 1000000)) . " MILLONES " . (millon($numcmeros % 1000000));
    } //$numcmeros >= 100000000 && $numcmeros < 1000000000
    if ($numcmeros < 100000000)
      $num_letracms = decmillon($numcmeros);
    return $num_letracms;
  }
  function milmillon($nummierod) {
    if ($nummierod >= 1000000000 && $nummierod < 2000000000) {
      $num_letrammd = "MIL " . (cienmillon($nummierod % 1000000000));
    } //$nummierod >= 1000000000 && $nummierod < 2000000000
    if ($nummierod >= 2000000000 && $nummierod < 10000000000) {
      $num_letrammd = unidad(Floor($nummierod / 1000000000)) . " MIL " . (cienmillon($nummierod % 1000000000));
    } //$nummierod >= 2000000000 && $nummierod < 10000000000
    if ($nummierod < 1000000000)
      $num_letrammd = cienmillon($nummierod);
    return $num_letrammd;
  }
?>

<script>
$('#entrada_virtual').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='idpedido']").val(recipient.idpedido);
    modal.find("input[name='proyecto']").val(recipient.proyecto);
})
</script>
<script>
  $(document).on('change', '#tipo', function(event) {
    event.preventDefault();
    var _this = $(this);
    $('#recibe').find('option').remove().end().append(
        '<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#persona_autorizacion').find('option').remove().end().append(
        '<option value="" disabled="disabled" selected="selected">Seleccione...</option>');

    $.ajax({
            url: base_url + 'almacen/tipo-personal',
            type: 'POST',
            dataType: 'json',
            data: {
                tipo: _this.val()
            },
            beforeSend: function() {
                _this.closest('.card-body').addClass('load');
            },
            success: function(data) {
                if (data.error) {
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    });
                }
                if (_this.val() == 'interno') {
                    $.each(data[0].personal_recibe, function(i, item) {
                        $('#recibe').append($('<option>', {
                            value: item.idtbl_usuarios,
                            text: item.nombres + ' ' + item.apellido_paterno + ' ' +
                                item.apellido_materno + ' (Número Empleado ' + item
                                .numero_empleado + ')'
                        }));
                    });

                    $('.divContratistas').hide('slow');
                    $('#recibe').selectpicker('refresh');
                } else {
                    $.each(data[0].contratistas, function(i, item) {
                        $('#contratista').append($('<option>', {
                            value: item.idtbl_contratistas,
                            text: item.nombre_comercial
                        }));
                    });
                    $.each(data[0].supervisores, function(i, item) {
                        $('#supervisor').append($('<option>', {
                            value: item.idtbl_usuarios,
                            text: item.nombres + ' ' + item.apellido_paterno + ' ' +
                                item.apellido_materno + ' (Número Empleado ' + item
                                .numero_empleado + ')'
                        }));
                    });

                    $('#contratista').selectpicker('refresh');
                    $('#supervisor').selectpicker('refresh');
                    $('#recibe').selectpicker('refresh');
                    $('.divContratistas').show('slow');
                }
            },
            error: function(data) {
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
$(document).ready(function() {
  //event.preventDefault();
    console.log("entro");
  $( ".idcatalogo" ).each(function( index ) {
  var neodata = $(this).text();
  var idcatalogo = $(this).val();
  var id_select = $(this).attr("id");
  $.ajax({
    url: "<?= base_url()?>compras/getNeodata",
    type: "post",
    data: 'neodata='+ neodata,
    dataType: 'json',
    processData: false,
    success : function(data) {
      //console.log(data[0]);
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        $.each(data, function (i, item) {
          if(item.idtbl_catalogo != idcatalogo){
            $('#'+id_select).append($('<option>', {
              value: item.idtbl_catalogo,
              text : item.neodata
            }));
          }
        });
        //$('#recibe').selectpicker('refresh');
      },
      error : function(data) {
        console.log(data);
      }
    });
  });
});
</script>
<script>
  /*document.querySelector("#btnImprimirDiv").addEventListener("click", function (e) {
    var printContents = document.getElementById("imprimible").innerHTML;
    var ventana = window.open('', 'PRINT', '');
    ventana.document.write('<html><head><title>Pedido</title>');
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
  });
  */

  function openWin(obj) {
      event.preventDefault();
      myWindow = window.open(obj.getAttribute("href"), '_blank', 'width=1000,height=800,left=0,top=0');
      myWindow.document.close(); //missing code
      myWindow.focus();
      myWindow.print();
  }

  function guardarCantidad(id, uid, tipo){
    console.log("guardarCantidad:", id)
    
    cantidad = parseFloat($("#cantSolicitada_"+id).val());
    cantSolicitadaOrg = parseFloat($("#cantSolicitadaOrg_"+id).val());
    precio = parseFloat($("#precio_"+id).val());
    precioOrg = parseFloat($("#precioOrg_"+id).val());
    idtbl_pedidos = parseInt($("#idtbl_pedidos_"+id).val());
    idtbl_catalogo = parseInt($("#idtbl_catalogo_"+id).val());
    idtbl_solicitudes_almacen = parseInt($("#idtbl_solicitudes_almacen_"+id).val());
    estimacion = parseInt($("#estimacion").val());
    if(cantidad <= 0)
        return;

    var formData = new FormData();
    formData.append("token", "<?=$this->session->userdata('token');?>");
    formData.append("iddtl_solicitud_catalogo", id );
    formData.append("cantidad", cantidad );
    formData.append("cantSolicitadaOrg", cantSolicitadaOrg );
    formData.append("precio", precio );
    formData.append("tipo", tipo);
    formData.append("precioOrg", precioOrg );
    formData.append("idtbl_pedidos", idtbl_pedidos );
    formData.append("idtbl_catalogo", idtbl_catalogo );
    formData.append("idtbl_solicitudes_almacen", idtbl_solicitudes_almacen );
    formData.append("estimacion", estimacion);
    $data = formData;

    // console.log("idtbl_solicitudes_almacen::", idtbl_solicitudes_almacen);
 
    // console.log(cantidad); return;
    if(tipo == "cantidades") {
      titulo = "Cambiar cantidad?";
      texto = "Deseas editar la cantidad?";
    }
    if(tipo == "precios") {
      titulo = "Cambiar precio?";
      texto = "Deseas editar el precio?";
    }

    Swal.fire({
    title: titulo,
    text: texto,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
            $.ajax({
              url: "<?= base_url()?>compras/edit_cantidad_solicitud",
              type: "post",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              complete: function(res) {
                  console.log("res1 ",res)
                  var resp = JSON.parse(res.responseText);
                  console.log("res2 ",res)
                  if (resp.error==false) {
                      window.location.replace("<?= base_url()?>pedidos/detalle-pedido/"+uid );
                  } else {
                      Toast.fire({
                          type: 'error',
                          title: resp.mensaje
                      });
                  }
              }
          });
      }
    })
  }

  function hist_cantidades(idtbl_pedidos, idtbl_catalogo, tipo){

      var formData = new FormData();
      formData.append("token", "<?=$this->session->userdata('token');?>");
      formData.append("idtbl_pedidos", idtbl_pedidos );
      formData.append("idtbl_catalogo", idtbl_catalogo );
      formData.append("tipo", tipo);
      //alert(tipo);

      console.log("idtbl_pedidos::", idtbl_pedidos);
      console.log("idtbl_catalogo::", idtbl_catalogo);

      $data = formData;
      $.ajax({
          url: "<?= base_url()?>compras/detalle_pedido_hist_cantidad",
          type: 'POST',
          data: formData,
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          complete: function(data) {
            console.log("data::", data);
              json = JSON.parse(data.responseText);
              console.log("buscar::", json.error);
              if(json.error==false){
                  // console.log("buscar::", data)
                  // $estatus_solicitud =  data.datos.solicitud.estatus_solicitud ;
                  // var bandera=true;
                  if(tipo == "cantidades") {
                    $table = $('<table class="table table-border" ></table>');
                    $table.append(
                      '<thead>'+
                        '<tr>'+
                              '<th>Producto</th> '+
                              '<th>Usuario</th> '+
                              '<th>Cantidad</th> '+
                              '<th>Cantidad Nueva</th> '+
                              '<th>Fecha</th> '+
                        '</tr>'+
                      '</thead> '
                    );
                    json.datos.forEach(function(elemento) {
                      console.log("elemento::", elemento);
                            bandera=false;
                            $table.append(
                            '<tr class="tr" style="font-size:11px;">'+
                            '<td><span class="color_azul_claro">'+elemento.modelo+'</span><br>'+elemento.descripcion+'</td>'+
                            '<td>'+elemento.nombre_usr+'</td>'+
                            '<td align="center">'+elemento.cantidad_anterior+'</td>'+
                            '<td align="center">'+elemento.cantidad_nueva+'</td>'+
                            '<td>'+elemento.fecha+'</td>'+
                            '</tr>'
                            );
                        
                    });
                  }
                  if(tipo == "precios") {
                    $table = $('<table class="table table-border" ></table>');
                    $table.append(
                      '<thead>'+
                        '<tr>'+
                              '<th>Producto</th> '+
                              '<th>Usuario</th> '+
                              '<th>Precio</th> '+
                              '<th>Precio Nuevo</th> '+
                              '<th>Fecha</th> '+
                        '</tr>'+
                      '</thead> '
                    );
                    json.datos.forEach(function(elemento) {
                      console.log("elemento::", elemento);
                            bandera=false;
                            $table.append(
                            '<tr class="tr" style="font-size:11px;">'+
                            '<td><span class="color_azul_claro">'+elemento.modelo+'</span><br>'+elemento.descripcion+'</td>'+
                            '<td>'+elemento.nombre_usr+'</td>'+
                            '<td align="center">'+elemento.precio_anterior+'</td>'+
                            '<td align="center">'+elemento.precio_nuevo+'</td>'+
                            '<td>'+elemento.fecha+'</td>'+
                            '</tr>'
                            );
                        
                    });
                  }
                  Swal.fire({
                    width: 900,
                    html:$table,
                    animation: false,
                    confirmButtonText: 'Cerrar'
                  })
              }else{
                  Toast.fire({
                      type: 'error',
                      title: json.mensaje
                  })
              }
          },
          error: function(xhr) { // if error occured
              Toast.fire({
                  type: 'error',
                  title: 'Algo salio mal.'
              })
              
          }
      });
 
          
  }
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
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>