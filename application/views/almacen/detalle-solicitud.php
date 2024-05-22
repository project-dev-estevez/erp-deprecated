<section class="forms nueva-solicitud">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4 mr-auto p-2">
                    Detalle solicitud de material
                </h3>
                <?php if(($solicitud->estatus_solicitud == 'S' || $solicitud->estatus_solicitud == 'SRCV') && $this->session->userdata('tipo') == 4){ ?>
                <?php echo form_open_multipart('', 'class="needs-validation" id="formuploadNeodata" novalidate'); ?>
                <div class="form-row">
                    <div class="p-2 d-print-none">
                        <h5>Neodata Salida</h5>
                    </div>
                    <div class="p-2 d-print-none">
                        <input name="neodata" type="text" class="form-control" placeholder="Neodata" value="<?= $solicitud->neodata_salida != NULL ? $solicitud->neodata_salida : '' ?>">
                    </div>
                    <div class="p-2 d-print-none">
                        <button class="btn btn-secondary btn-success float-left" id="actNeodata" type="button">
                            <span><i class="fa fa-edit"></i> Actualizar</span>
                        </button>
                    </div>
                </div>
                <?= form_hidden('uid', $solicitud->uid) ?>
                <?= form_hidden('token', $token) ?>
                </form>
                <?php } ?>
                <div class="p-2 d-print-none">
                    <button class="btn btn-secondary btn-info float-right" id="btnImprimirDiv" tabindex="0">
                        <span><i class="fa fa-print"></i> Imprimir</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
            <!--div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div-->
                <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
                <?php echo form_open_multipart('', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
                <div class="form-row">
                    <div class="col">
                        <label>Creado por*</label>
                        <input type="text" name="" id="" class="form-control" disabled
                            value="<?= $solicitud->user_autor ?>">
                    </div>
                </div>
                <br>
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
                <?php if ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) { ?>
                <?php if ($solicitud->estatus_solicitud == 'SU' || $solicitud->estatus_solicitud == 'S' || $solicitud->estatus_solicitud == 'SU RCV') { ?>
                <div class="form-row">
                    <div class="col">
                        <label>Almacen</label>
                        <input type="text" name="" id="" class="form-control" disabled
                            value="<?= $almacen_seleccionado[0]['almacen'] ?>">
                    </div>
                </div>
                <?php } ?>
                <?php if (($solicitud->estatus_solicitud == 'AG' || $solicitud->estatus_solicitud == 'K') && $solicitud->uid_almacen_seleccionado == NULL) { ?>
                <?php  
                    $lista = array("ALMACÉN ALTO COSTO", "KUALLI", "Área Médica", "ALMACEN AUTOS CONTROL VEHICULAR", "ALMACÉN SISTEMAS");
                ?>
                <div class="form-row">
                    <div class="col">
                        <label>Almacen*</label>
                        <select class="form-control" name="uid_almacen" id="selectAlmacen"
                            data-live-search="true" required>
                            <?php $index_for = 0; ?>
                            <option disabled selected="selected">Seleccione Almacen</option>
                            <?php if($solicitud->tipo_producto == 'Refacciones Control Vehicular'){ ?>
                            <option value="5f5661ca14d2f" data-idtbl-almacenes="29">
                                <?php echo 'ALMACEN REFACCIONES CONTROL VEHICULAR' ?>
                            </option>
                            <?php }else if($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''){ ?>
                                <?php foreach($almacenes AS $key => $value){ ?>
                                    <?php foreach($this->session->userdata('encargado_almacen') AS $key2 => $value2){ ?>
                                        <?php if ($this->session->userdata('id') != 137 && $this->session->userdata('id') != 207 && $this->session->userdata('id') != 461 && $this->session->userdata('id') != 462 && $this->session->userdata('id') != 253 && $this->session->userdata('id') != 172 && $this->session->userdata('id') != 139 && $this->session->userdata('id') != 226 && $this->session->userdata('id') != 50 && $this->session->userdata('id') != 322 && $this->session->userdata('id') != 325 && $this->session->userdata('id') != 421 && $this->session->userdata('id') != 323 && $this->session->userdata('id') != 329) { ?>
                                    <?php if ($value->idtbl_almacenes == $value2 && $solicitud->tbl_proyectos_idtbl_proyectos == $value->tbl_proyectos_idtbl_proyectos) { ?>
                                        <?php if ($value->almacen == $solicitud->segmento) { ?>
                            <option value="<?= $value->uid ?>" data-idtbl-almacenes="<?= $value->idtbl_almacenes ?>" data-tipo-almacen="<?= $value->tipo ?>">
                                <?= $value->almacen ?>
                            </option>
                            <?php } ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <?php if ($value->idtbl_almacenes == $value2 && $solicitud->tbl_proyectos_idtbl_proyectos == $value->tbl_proyectos_idtbl_proyectos) { ?>
                                <option value="<?= $value->uid ?>" data-idtbl-almacenes="<?= $value->idtbl_almacenes ?>" data-tipo-almacen="<?= $value->tipo ?>">
                                <?= $value->almacen ?></option>
                                <?php } ?>
                                <?php if($this->session->userdata('id') == 207 && $index_for == 0){ ?>
                                    <option value="624c4b671c283" data-idtbl-almacenes="112">ALMACEN MXT FIBER</option>
                                    <?php $index_for++; ?>
                                <?php } ?>
                                <?php } ?>
                            <?php } ?>
                            <?php } ?>
                            <?php }else{ ?>
                            <?php if(isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') == 23){ ?>
                                <option value="25839864557600770" data-idtbl-almacenes="1">Seguridad e higiene</option>
                            <?php }else{ ?>
                            <?php foreach ($almacenes as $key => $values) : ?>
                            <?php if(!in_array($values->almacen, $lista)) { ?>
                                <option value="<?php echo $values->uid?>"
                                    data-tipo-almacen="<?= $values->tipo ?>"
                                    data-idtbl-almacenes="<?php echo $values->idtbl_almacenes ?>">
                                    <?php echo $values->almacen; ?>
                                </option>
                            <?php } ?>
                            <?php endforeach ?>
                            <?php } ?>
                            <?php } ?>
                        </select>
                        <input type="hidden" value="" name="idtbl_almacenes">
                        <input type="hidden" value="" name="tipo_almacenes">
                    </div>
                </div>
                <?php }else{ ?>
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
                    <input type="hidden" id="selectAlmacen" name="uid_almacen" value="<?= $solicitud->uid_almacen_seleccionado ?>">
                    <input type="hidden" name="idtbl_almacenes" value="<?= $solicitud->idtbl_almacenes ?>">
                    <?php } ?>
                <?php } ?>
                <?php if(($solicitud->tipo_producto == 'Almacen General' || $solicitud->tipo_producto == 'Seguridad e Higiene' || $solicitud->tipo_producto == 'Refacciones Control Vehicular') && ($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) && $solicitud->activo_fijo == 0 && $solicitud->estatus_solicitud == 'AG') { ?>
                    <div class="form-group">
                        <label for="existencias">Personal que entrega*</label>
                        <select name="user_asignacion" id="personal_entrega" class="form-control" required>
                            <option value="" selected>Seleccione...</option>
                            <?php foreach ($autorizados as $key => $value): ?>
                                <?php if(isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') == 23){ ?>
                                    <?php if($this->session->userdata('nombre') == $value->nombre){ ?>
                                        <option value="<?php echo $value->idctl_autorizados_entrega ?>" data-nombre="<?php echo $value->nombre?>"><?php echo $value->nombre?></option>
                                        <?php } ?>
                                    <?php }else{ ?>
                                        <option value="<?php echo $value->idctl_autorizados_entrega ?>" data-nombre="<?php echo $value->nombre?>"><?php echo $value->nombre?></option>
                                <?php } ?>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione al personal
                        </div>
                    </div>
                <?php } ?>
                <?php if ($solicitud->tbl_contratistas_idtbl_contratistas != '') : ?>
                <br>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label>Contratista*</label>
                            <input type="text" name="" id="" class="form-control" disabled
                                value="<?= $solicitud->contratista ?>">
                        </div>
                    </div>                
                </div>
                <input type="hidden" name="contratista" value="<?= $solicitud->tbl_contratistas_idtbl_contratistas ?>">
                <?php endif ?>
                <?php if ($solicitud->tbl_usuarios_idtbl_usuarios_supervisor) : ?>
                    <div class="col">
                        <div class="form-group">
                            <label>Supervisor</label>
                            <input type="text" name="" id="" class="form-control" disabled
                                value="<?= $solicitud->supervisor ?>">
                        </div>
                    </div>
                    <?php endif ?>
                <br>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label>Recibe*</label>
                            <input type="text" name="" id="" class="form-control" disabled
                                value="<?= $solicitud->recibe ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Persona autorización</label>
                            <input type="text" name="" id="" class="form-control" disabled
                                value="<?= $solicitud->responsable ?>">
                        </div>
                    </div>
                </div>
                <?php if($solicitud->estatus_solicitud == 'S' || $solicitud->estatus_solicitud == 'SRCV'){ ?>
                    <br>
                    <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label>Personal Entrega*</label>
                            <input type="text" name="" id="" class="form-control" disabled
                                value="<?= $entrega ?>">
                        </div>
                    </div>                    
                </div>
                    <?php } ?>
                <br>
                <div class="form-row">
                    <div class="col">
                        <label
                            for="comentarios"><?= $solicitud->tipo_producto == 'Refacciones Control Vehicular' ? 'Diagnóstico' : 'Comentarios' ?></label>
                        <textarea name="comentarios" id="comentarios" class="form-control" rows="5"
                            <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') &&  $solicitud->estatus_solicitud == 'creada' && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>><?= $solicitud->comentarios ?></textarea>
                    </div>
                </div>
                <?php if($solicitud->tipo_producto == 'Refacciones Control Vehicular') { ?>
                <div class="form-row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label>Eco*</label>
                            <input type="text" name="" id="" class="form-control" disabled
                                value="<?= $solicitud->numero_interno ?>">
                        </div>
                    </div>
                </div>
                <?php } ?>
                <hr>
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
                                <option value="<?php echo $values->idtbl_catalogo ?>"
                                    data-precio="<?php echo $values->precio ?>"
                                    data-moneda="<?php echo $values->tipo_moneda ?>"
                                    data-preciolabel="<?php echo number_format($values->precio, 2) . (($values->tipo_moneda == 'p') ? ' Pesos' : ' Dolares') ?>"
                                    data-descripcion="<?php echo $values->descripcion ?>"
                                    data-categoria="<?php echo $values->idctl_categorias ?>">
                                    <?php echo $values->uid . ' ' . $values->marca . ' ' . $values->modelo . ' (' . substr($values->descripcion, 0, 70) . ')' ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <input type="hidden" class="id" value="<?php echo $value->iddtl_solicitud_catalogo ?>">
                            <input type="hidden" class="nuevo">
                            <button type="button" class="btn btn-info actualizar">Actualizar</button>
                            <? else : ?>
                            <input type="text" name="" class="form-control" disabled
                                value="Producto inexistente en el catálogo">
                            <input type="hidden" name="producto[]" class="form-control" value="0">
                            <?php endif ?>
                            <?php else : ?>
                            <?php array_push($productos_enviar, $value->tbl_catalogo_idtbl_catalogo) ?>
                            <input type="text" name="" class="form-control" disabled
                                value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo. ' ' . $value->numero_serie. ' ' . $value->numero_interno . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                            <input type="hidden" name="producto[]" class="form-control product"
                                value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                            <?php endif ?>

                        </div>
                        <?php if ($this->session->userdata('tipo') == 11) { ?>
                        <div class="col">
                            <label for="cantida">Cantidad*</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                <?= $this->session->userdata('tipo') == 6 ? 'disabled' : '' ?>
                                required class="form-control cantidad" value="<?= $value->cantidad ?>">
                        </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>
                        <div class="col">
                            <label for="cantida">Cantidad*</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= (($solicitud->user_aprobacion_id == $this->session->userdata('id') ||  $this->session->userdata('tipo')==1 ||  $this->session->userdata('tipo')==3) && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'AC' || $solicitud->estatus_solicitud == 'CV') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                <?= $this->session->userdata('tipo') == 6 ? 'disabled' : '' ?>
                                required class="form-control cantidad" value="<?= $value->cantidad ?>">
                        </div>
                        <?php } ?>
                        <?php if($this->session->userdata('tipo')!=1){ ?>
                        <div class="col">
                            <label for="cantidad">Entregado*</label>
                            <input type="text" name="" id="pedido" disabled required class="form-control"
                                value="<?= $value->entregado ?>">
                        </div>
                        <?php } ?>
                        <?php if ((($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && $solicitud->estatus_solicitud == 'AG') || ($this->session->userdata('tipo') == 1 && $solicitud->estatus_solicitud == 'AC')) { ?>
                        <div class="col">
                            <label for="cantidad">Existencias</label>
                            <input type="text" name="existencias[]" id="<?= $value->idtbl_catalogo ?>" disabled class="form-control">
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
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->nombreCO ?> (CO)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantidad">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->nombreCO ?> (CO)"
                                disabled>
                        </div>
                        <div class="col">
                            <label style="display: none;" for="cantidad">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>
                        <?php if($detalleCO[$i]->cantidad!=$value->cantidad){ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label>Modificado por:</label>
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitudCO->nombreCO ?> (CO)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantida">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->nombreCO ?> (CO)"
                                disabled>
                        </div>
                        <div class="col">
                            <label style="display: none;" for="cantida">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
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
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantidad">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad ?>" disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col">
                            <label style="display: none;" for="cantidad">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad ?>" disabled>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>
                        <?php if($detallePM[$i]->cantidad!=$value->cantidad){ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label>Modificado por:</label>
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantida">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad ?>" disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col">
                            <label style="display: none;" for="cantida">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad ?>" disabled>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                    <br>
                    <?php } ?>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Comentarios</label>
                            <input type="text" name="observaciones[]" id="" class="form-control descripcion" readonly
                                value="<?php echo $value->observaciones ?>">
                        </div>
                    </div>
                    <br>
                    <i class="fa fa-close delete-product" style="display:none"></i>
                    <hr>
                </div>
                <?php $i++; endforeach ?>

                <?php } else if(isset($solicitudCO->estatus_solicitud)=='modificada CO'){ $i=0;?>
                    <?php $index = 0; ?>
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
                                <option value="<?php echo $values->idtbl_catalogo ?>"
                                    data-precio="<?php echo $values->precio ?>"
                                    data-moneda="<?php echo $values->tipo_moneda ?>"
                                    data-preciolabel="<?php echo number_format($values->precio, 2) . (($values->tipo_moneda == 'p') ? ' Pesos' : ' Dolares') ?>"
                                    data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                                    data-categoria="<?php echo $values->idctl_categorias ?>">
                                    <?php echo $values->uid . ' ' . $values->marca . ' ' . $values->modelo . ' (' . substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT), 0, 70) . ')' ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <input type="hidden" class="id" value="<?php echo $value->iddtl_solicitud_catalogo ?>">
                            <input type="hidden" class="nuevo">
                            <button type="button" class="btn btn-info actualizar">Actualizar</button>
                            <? else : ?>
                            <input type="text" name="" class="form-control" disabled
                                value="Producto inexistente en el catálogo">
                            <input type="hidden" name="producto[]" class="form-control" value="0">
                            <?php endif ?>
                            <?php else : ?>
                                <?php array_push($productos_enviar, ["idtbl_catalogo" => $value->tbl_catalogo_idtbl_catalogo, "sitio" => $value->sitio, "idctl_categorias" => $value->ctl_categorias_idctl_categorias]) ?>
                            <input type="text" name="" class="form-control" disabled
                                value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo. ' ' . $value->numero_serie. ' ' . $value->numero_interno . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                            <input type="hidden" name="producto[]" class="form-control product"
                                value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                            <input type="hidden" name="categoria[]" class="form-control product"
                                value="<?= $value->ctl_categorias_idctl_categorias ?>">
                            <?php endif ?>
                        </div>
                        <?php if ($this->session->userdata('tipo') == 11) { ?>
                        <div class="col">
                            <label for="cantidad">Cantidad*</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                <?= $this->session->userdata('tipo') == 6 ? 'disabled' : '' ?>
                                required class="form-control cantidad" value="<?= $value->cantidad ?>">
                        </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>
                        <div class="col">
                        <input type="hidden" name="cantidad_inicial[]" id="cantidad_inicial_<?= $value->idtbl_catalogo ?>_<?= $index ?>"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'AC') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : '' ?>
                                required class="form-control cantidad_inicial" value="<?= $value->cantidad ?>" min="<?= $value->cantidad ?>" max="<?= isset($value->existencias) ? $value->existencias : 0 ?>">
                            <label for="cantida">Cantidad*</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= (($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'AG' || $solicitud->estatus_solicitud == 'AC') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                <?= $this->session->userdata('tipo') == 6 ? 'disabled' : '' ?>
                                required class="form-control cantidad" value="<?= $value->cantidad ?>">
                        </div>
                        <?php } ?>
                        <?php if($this->session->userdata('tipo')!=1){ ?>
                        <div class="col">
                            <label for="cantidad">Entregado*</label>
                            <input type="text" name="" id="pedido" disabled required class="form-control"
                                value="<?= $value->entregado ?>">
                        </div>
                        <?php if($this->session->userdata('tipo') == 4 || (($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''))){ ?>
                        <div class="col">
                            <label for="cantidad">Existencias</label>
                            <?php if (isset($value->existencias)) { ?>
                            <div id="d_<?= $value->idtbl_catalogo ?>_<?= $i ?>">
                                <input type="text" name="existencias[]" id="<?= $value->idtbl_catalogo ?>" readonly class="form-control"
                                value="<?= $value->existencias ?>">
                            </div>
                            <?php } else { ?>
                                <div id="d_<?= $value->idtbl_catalogo ?>">
                                <input type="text" name="existencias[]" id="<?= $value->idtbl_catalogo ?>" readonly class="form-control"
                                value="0">
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php if (($this->session->userdata('tipo') == 1 && $solicitud->estatus_solicitud == 'AC')) { ?>
                            <div class="col">
                            <label for="cantidad">Existencias</label>
                            <?php if(isset($value->existencias)){ ?>
                            <div id="d_<?= $value->idtbl_catalogo ?>_<?= $i ?>">
                                <input type="text" name="existencias[]" id="<?= $value->idtbl_catalogo ?>" readonly class="form-control"
                                value="<?= $value->existencias ?>">
                            </div>
                            <?php } else{ ?>
                                <div id="d_<?= $value->idtbl_catalogo ?>">
                                <input type="text" name="existencias[]" id="<?= $value->idtbl_catalogo ?>" readonly class="form-control"
                                value="0">
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <br>
                    <?php if(isset($solicitudCO->estatus_solicitud)=='modificada CO'){ ?>
                    <div class="form-row">

                        <?php if ($this->session->userdata('tipo') == 11 && $detalleCO[$i]->cantidad != $value->cantidad) { ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label>Modificado por:</label>
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->nombreCO ?> (CO)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantidad">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                        </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>
                        <?php if($detalleCO[$i]->cantidad != $value->cantidad){ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label>Modificado por:</label>
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->nombreCO ?> (CO)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantida">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->nombreCO ?> (CO)"
                                disabled>
                        </div>
                        <div class="col">
                            <label style="display: none;" for="cantida">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detalleCO[$i]->cantidad ?>" disabled>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                    <br>
                    <?php } ?>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Comentarios</label>
                            <input type="text" name="observaciones[]" id="" class="form-control descripcion" readonly
                                value="<?php echo $value->observaciones ?>">
                        </div>
                    </div>
                    <?php if($this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 4){ ?>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Comentarios Neodata</label>
                            <input type="text" name="observacionesNeodata[]" id="" class="form-control descripcion"                                
                                value="<?php echo $value->observaciones_neodata ?>">
                        </div>
                    </div>
                    <input type="hidden" name="iddtl_solicitud_material[]" value="<?php echo $value->iddtl_solicitud_material ?>">
                    <?php } ?>
                    <br>
                    <i class="fa fa-close delete-product" style="display:none"></i>
                    <hr>
                </div>
                <?php $i++; endforeach ?>

                <?php }else if(isset($solicitudPM->estatus_solicitud)=='modificada PM' || isset($solicitudAG->estatus_solicitud)=='modificada AG'){ $i=0;?>
                    <?php $index = 0; ?>
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
                                <option value="<?php echo $values->idtbl_catalogo ?>"
                                    data-precio="<?php echo $values->precio ?>"
                                    data-moneda="<?php echo $values->tipo_moneda ?>"
                                    data-preciolabel="<?php echo number_format($values->precio, 2) . (($values->tipo_moneda == 'p') ? ' Pesos' : ' Dolares') ?>"
                                    data-descripcion="<?php echo $values->descripcion ?>"
                                    data-categoria="<?php echo $values->idctl_categorias ?>">
                                    <?php echo $values->uid . ' ' . $values->marca . ' ' . $values->modelo . ' (' . substr($values->descripcion, 0, 70) . ')' ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <input type="hidden" class="id" value="<?php echo $value->iddtl_solicitud_catalogo ?>">
                            <input type="hidden" class="nuevo">
                            <button type="button" class="btn btn-info actualizar">Actualizar</button>
                            <? else : ?>
                            <input type="text" name="" class="form-control" disabled
                                value="Producto inexistente en el catálogo">
                            <input type="hidden" name="producto[]" class="form-control" value="0">
                            <?php endif ?>
                            <?php else : ?>
                                <?php array_push($productos_enviar, ["idtbl_catalogo" => $value->tbl_catalogo_idtbl_catalogo, "sitio" => $value->sitio, "idctl_categorias" => $value->ctl_categorias_idctl_categorias]) ?>
                            <input type="text" name="" class="form-control" disabled
                                value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo. ' ' . $value->numero_serie. ' ' . $value->numero_interno . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                            <input type="hidden" name="producto[]" class="form-control product"
                                value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                                <input type="hidden" name="categoria[]" class="form-control product"
                                value="<?= $value->ctl_categorias_idctl_categorias ?>">
                            <?php endif ?>
                        </div>
                        <?php if ($this->session->userdata('tipo') == 11) { ?>
                        <div class="col">
                            <label for="cantidad">Cantidad*</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' || $solicitud->estatus_solicitud == 'CO CV' ? '' : 'disabled' ?>
                                <?= $this->session->userdata('tipo') == 6 ? 'disabled' : '' ?>
                                required class="form-control cantidad" value="<?= $value->cantidad ?>">
                        </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>
                            <div class="col">
                        <input type="hidden" name="cantidad_inicial[]" id="cantidad_inicial_<?= $value->idtbl_catalogo ?>_<?= $index ?>"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'AC') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : '' ?>
                                required class="form-control cantidad_inicial" value="<?= $value->cantidad ?>" min="<?= $value->cantidad ?>" max="<?= isset($value->existencias) ? $value->existencias : 0 ?>">
                            <label for="cantida">Cantidad*</label>
                            <input type="number" name="cantidad[]" id="cantidad_<?= $value->idtbl_catalogo ?>_<?= $index ?>"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'AC') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : '' ?>
                                <?= $this->session->userdata('tipo') == 6 ? 'disabled' : '' ?>
                                required class="form-control cantidad" value="<?= $value->cantidad ?>" min="<?= $value->cantidad ?>" max="<?= isset($value->existencias) ? $value->existencias : 0 ?>">
                        </div>
                        <?php } ?>
                        <?php if($this->session->userdata('tipo')!=1){ ?>
                        <div class="col">
                            <label for="cantidad">Entregado*</label>
                            <input type="text" name="" id="pedido" disabled required class="form-control"
                                value="<?= $value->entregado ?>">
                        </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud == 'AG' || ($this->session->userdata('tipo') == 1 && $solicitud->estatus_solicitud == 'AC')) { ?>
                        <div class="col">
                            <label for="cantidad">Existencias</label>
                            <?php if(isset($value->existencias)){ ?>
                            <div id="d_<?= $value->idtbl_catalogo ?>_<?= $index ?>">
                                <input type="text" name="existencias[]" id="<?= $value->idtbl_catalogo ?>" readonly class="form-control"
                                value="<?= $value->existencias ?>">
                            </div>
                            <?php } else{ ?>
                                <div id="d_<?= $value->idtbl_catalogo ?>">
                                <input type="text" name="existencias[]" id="<?= $value->idtbl_catalogo ?>" readonly class="form-control"
                                value="0">
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_serie != NULL && $value->numero_serie !== '')){ ?>
                            <div class="col">                            
                                <label for="cantidad">Número de serie</label>
                                <div>
                                    <input type="text" name="numero_serie[]" readonly class="form-control"
                                    value="<?= $value->numero_serie ?>">
                                </div>
                            </div>
                        <?php } ?>
                        <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_interno != NULL && $value->numero_interno !== '')){ ?>
                            <div class="col">                            
                                <label for="cantidad">Número interno</label>
                                <div>
                                    <input type="text" name="numero_interno[]" readonly class="form-control"
                                    value="<?= $value->numero_interno ?>">
                                </div>
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
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantida">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col" style="display: none;">
                            <label style="display: none;" for="cantida">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>
                        <?php if($detallePM[$i]->cantidad != $value->cantidad){ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label>Modificado por:</label>
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantida">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col" style="display: none;">
                            <label style="display: none;" for="cantida">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php } ?>
                        <?php  } ?>
                    </div>
                    <br>

                    <?php } ?>
                    <?php if(isset($solicitudAG->estatus_solicitud)){ ?>
                    <div class="form-row">                        
                        <?php if ($this->session->userdata('tipo') == 11) { ?>
                        <?php if($detallePM[$i]->cantidad != $value->cantidad){ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label>Modificado por:</label>
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantida">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control"
                                value="<?= $solicitud->tbl_users_idtbl_users_ag ?> (AG)" disabled>
                        </div>
                        <div class="col" style="display: none;">
                            <label style="display: none;" for="cantida">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>                                                        
                        <?php if(($detalleAG[$i]->cantidad != $value->cantidad)){ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label>Modificado por:</label>
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= isset($solicitudAG->nombreAG) ? $solicitudAG->nombreAG : '' ?> (AG)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantida">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detalleAG[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control"
                                value="<?= $solicitud->tbl_users_idtbl_users_ag ?> (AG)" disabled>
                        </div>
                        <div class="col" style="display: none;">
                            <label style="display: none;" for="cantida">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detalleAG[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php } ?>
                        <?php  } ?>                        
                    </div>
                    <br>

                    <?php } ?>
                    <?php if(isset($solicitudPM->estatus_solicitud)=='modificada AC' && $this->session->userdata('tipo')==1){ ?>
                    <div class="form-row">

                        <?php if ($this->session->userdata('tipo') == 11) { ?>
                        <?php if($detallePM[$i]->cantidad != $value->cantidad){ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label>Modificado pors:</label>
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitud->responsable ?> (PM)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantida">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control"
                                value="<?= $solicitud->tbl_users_idtbl_users_ac ?> (AC)" disabled>
                        </div>
                        <div class="col" style="display: none;">
                            <label style="display: none;" for="cantida">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>
                        <?php if($detallePM[$i]->cantidad != $value->cantidad){ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label>Modificado por:</label>
                            <input type="text" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                required class="form-control" value="<?= $solicitudPM->nombreAC ?> (AC)"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="cantida">Cantidad anterior:</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php }else{ ?>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <label style="display: none;">Modificado por:</label>
                            <input type="hidden" name="modPM" id="modPM"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' ? '' : 'disabled' ?>
                                required class="form-control"
                                value="<?= $solicitud->tbl_users_idtbl_users_ac ?> (AC)" disabled>
                        </div>
                        <div class="col" style="display: none;">
                            <label style="display: none;" for="cantida">Cantidad anterior:</label>
                            <input type="hidden" name="cantidad[]" id="cantidad"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $detallePM[$i]->cantidad; ?>"
                                disabled>
                        </div>
                        <?php } ?>
                        <?php  } ?>
                    </div>
                    <br>

                    <?php } ?>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Comentarios</label>
                            <input type="text" name="observaciones[]" id="" class="form-control descripcion" readonly
                                value="<?php echo $value->observaciones ?>">
                        </div>
                    </div>
                    <?php if($this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 4){ ?>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Comentarios Neodata</label>
                            <input type="text" name="observacionesNeodata[]" id="" class="form-control descripcion"                                
                                value="<?php echo $value->observaciones_neodata ?>">
                        </div>
                    </div>
                    <input type="hidden" name="iddtl_solicitud_material[]" value="<?php echo $value->iddtl_solicitud_material ?>">
                    <?php } ?>
                    <br>
                    <i class="fa fa-close delete-product" style="display:none"></i>
                    <hr>
                </div>
                <?php $index++; ?>
                <?php $i++; endforeach ?>
                <?php }else{ ?>
                <?php $index = 0; ?>
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
                                <option value="<?php echo $values->idtbl_catalogo ?>"
                                    data-precio="<?php echo $values->precio ?>"
                                    data-moneda="<?php echo $values->tipo_moneda ?>"
                                    data-preciolabel="<?php echo number_format($values->precio, 2) . (($values->tipo_moneda == 'p') ? ' Pesos' : ' Dolares') ?>"
                                    data-descripcion="<?php echo $values->descripcion ?>"
                                    data-categoria="<?php echo $values->idctl_categorias ?>">
                                    <?php echo $values->uid . ' ' . $values->marca . ' ' . $values->modelo . ' (' . substr($values->descripcion, 0, 70) . ')' ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <input type="hidden" name="categoria[]" class="form-control product"
                                value="<?= $value->ctl_categorias_idctl_categorias ?>">
                            <input type="hidden" class="id" value="<?php echo $value->iddtl_solicitud_catalogo ?>">
                            <input type="hidden" class="nuevo">
                            <button type="button" class="btn btn-info actualizar">Actualizar</button>
                            <? else : ?>
                            <input type="text" name="" class="form-control" disabled
                                value="Producto inexistente en el catálogo">
                            <input type="hidden" name="producto[]" class="form-control" value="0">
                            <?php endif ?>
                            <?php else : ?>              
                            <?php array_push($productos_enviar, ["idtbl_catalogo" => $value->tbl_catalogo_idtbl_catalogo, "sitio" => $value->sitio, "idctl_categorias" => $value->ctl_categorias_idctl_categorias]) ?>
                            <!--<?php if(isset($value->tipo_producto) && isset($value->iddtl_almacen_relacion)) { ?>
                            <input type="text" name="" class="form-control" disabled value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo. ' ' . $value->numero_serie. ' ' . $value->numero_interno . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                            <?php } ?>
                            <?php if(isset($value->tipo_producto) && !isset($value->iddtl_almacen_relacion)) { ?>
                            <input type="text" name="" class="form-control" disabled value="<?php echo 'M' . ' ' . $value->marca . ' ' . $value->modelo. ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                            <?php } ?>
                            <?php if(!isset($value->tipo_producto) && !isset($value->iddtl_almacen_relacion)) { ?>-->
                            <!--<input type="text" name="" class="form-control" disabled value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo. ' ' . $value->numero_serie. ' ' . $value->numero_interno . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">-->
                            <!--<?php } ?>-->
                            <input type="text" name="" class="form-control" disabled
                                value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . ' ('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                            <input type="hidden" name="producto[]" class="form-control product"
                                value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                            <input type="hidden" name="categoria[]" class="form-control product"
                                value="<?= $value->ctl_categorias_idctl_categorias ?>">
                            <input type="hidden" name="iddtl_solicitud_material[]" value="<?php echo $value->iddtl_solicitud_material ?>">
                            <?php endif ?>

                        </div>
                        <?php if ($this->session->userdata('tipo') == 11) { ?>
                        <div class="col">
                        <input type="hidden" name="cantidad_inicial[]" id="cantidad_inicial_<?= $value->idtbl_catalogo ?>_<?= $index ?>"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'AC') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : '' ?>
                                required class="form-control cantidad_inicial" value="<?= $value->cantidad ?>" min="<?= $value->cantidad ?>" max="<?= isset($value->existencias) ? $value->existencias : 0 ?>">
                            <label for="cantidad">Cantidad*</label>
                            <input type="number" name="cantidad[]" id="cantidad"
                                <?= $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO AC' ? '' : 'disabled' ?>
                                <?= $this->session->userdata('tipo') == 6 ? 'disabled' : '' ?>
                                required class="form-control cantidad" value="<?= $value->cantidad ?>">
                        </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('tipo') != 11) { ?>
                        <div class="col">
                        <input type="hidden" name="cantidad_inicial[]" id="cantidad_inicial_<?= $value->idtbl_catalogo ?>_<?= $index ?>"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'AC') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : '' ?>
                                required class="form-control cantidad_inicial" value="<?= $value->cantidad ?>" min="<?= $value->cantidad ?>" max="<?= isset($value->existencias) ? $value->existencias : 0 ?>">
                            <label for="cantida">Cantidad*</label>
                            <input type="number" name="cantidad[]" id="cantidad_<?= $value->idtbl_catalogo ?>_<?= $index ?>"
                                <?= ($solicitud->user_aprobacion_id == $this->session->userdata('id') && ($solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'AC') && isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen'] > 2) ? null : '' ?>
                                <?= $this->session->userdata('tipo') == 6 ? 'disabled' : '' ?>
                                required class="form-control cantidad" value="<?= $value->cantidad ?>" min="<?= $value->cantidad ?>" max="<?= isset($value->existencias) ? $value->existencias : 0 ?>">
                        </div>
                        <?php } ?>
                        <?php if($this->session->userdata('tipo') == 12){ ?>
                        <div class="col">
                            <label for="unidad">Unidad</label>
                            <input type="text" name="unidad[]" id="unidad" class="form-control" value="<?= $value->unidad_medida_abr ?>" disabled>
                        </div>
                        <?php } ?>
                        <?php if($this->session->userdata('tipo')!=1){ ?>
                        <div class="col">
                            <label for="cantidad">Entregado*</label>
                            <input type="text" name="" id="pedido" disabled required class="form-control"
                                value="<?= $value->entregado ?>">
                        </div>
                        <?php } ?>                        
                        <?php if (($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && ($solicitud->estatus_solicitud == 'AG' || $solicitud->estatus_solicitud == 'K') || ($this->session->userdata('tipo') == 1 && $solicitud->estatus_solicitud == 'AC')) { ?>
                        <div class="col">
                            <label for="cantidad">Existencias</label>
                            <?php if(isset($value->existencias)){ ?>
                            <div id="d_<?= $value->idtbl_catalogo ?>_<?= $index ?>">
                                <input type="text" name="existencias[]" id="<?= $value->idtbl_catalogo ?>" readonly class="form-control"
                                value="<?= $value->existencias ?>">
                            </div>
                            <?php } else{ ?>
                                <div id="d_<?= $value->idtbl_catalogo ?>">
                                <input type="text" name="existencias[]" id="<?= $value->idtbl_catalogo ?>" readonly class="form-control"
                                value="0">
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>                        
                        <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->sitio != NULL && $value->sitio !== '')){ ?>
                            <div class="col">                            
                                <label for="cantidad">Sitio</label>
                                <div>
                                    <input type="text" name="sitios[]" readonly class="form-control"
                                    value="<?= $value->sitio ?>">
                                </div>
                            </div>
                        <?php } ?>
                        <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && (isset($value->numero_serie) && $value->numero_serie != NULL && $value->numero_serie !== '')){ ?>
                            <div class="col">                            
                                <label for="cantidad">Número de serie</label>
                                <div>
                                    <input type="text" name="numero_serie[]" readonly class="form-control"
                                    value="<?= $value->numero_serie ?>">
                                </div>
                            </div>
                        <?php } ?>
                        <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && (isset($value->numero_interno) && $value->numero_interno != NULL && $value->numero_interno !== '')){ ?>
                            <div class="col">                            
                                <label for="cantidad">Número interno</label>
                                <div>
                                    <input type="text" name="numero_interno[]" readonly class="form-control"
                                    value="<?= $value->numero_interno ?>">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <br>
                    <?php if($value->aditamento != NULL && $value->aditamento != 0){ ?>                                                    
                                <label>Aditamento:</label>  
                                <?php if($value->aditamento == 1){ ?>
                                <input type="text" class="form-control descripcion" value="<?php echo 'Porta carrete' ?>" disabled>                                
                                <?php } else if($value->aditamento == 2){ ?> 
                            <input type="text" class="form-control descripcion" value="<?php echo 'Porta escaleras' ?>" disabled>
                            <?php }else if($value->aditamento == 3){ ?>
                                <input type="text" class="form-control descripcion" value="<?php echo 'Ambos' ?>" disabled>                                                                
                                                                  
                                            
                    <?php }}?>
                    <br>
                    <?php if($this->session->userdata('tipo') != 6){ ?>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Comentarios</label>
                            <input type="text" name="observaciones[]" id="" class="form-control descripcion"
                                <?= $solicitud->tipo_producto == 'Refacciones Control Vehicular' && $solicitud->estatus_solicitud == 'RCV' ? '' : '' ?>
                                value="<?php echo $value->observaciones ?>">
                        </div>
                    </div>                                     
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 4){ ?>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Comentarios Neodata</label>
                            <input type="text" name="observacionesNeodata[]" id="" class="form-control descripcion"                                
                                value="<?php echo $value->observaciones_neodata ?>">
                        </div>
                    </div>
                    <?php } ?>
                    <br>
                    <i class="fa fa-close delete-product" style="display:none"></i>
                    <hr>                    
                </div>                
                <?php $index++; ?>
                <?php endforeach ?>

                <?php } ?>                
                <br><br>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <?= form_hidden('token', $token) ?>
                        <?= form_hidden('estatus', $solicitud->estatus_solicitud) ?>
                        <?= form_hidden('id_mantenimiento', $solicitud->tbl_mantenimientos_idtbl_mantenimientos) ?>
                        <?= form_hidden('uid', $solicitud->uid) ?>
                        <a href="javascript:history.go(-1)" class="btn-warning btn">Regresar</a>
                        <?php if (($solicitud->estatus_solicitud == 'CO SH' || $solicitud->estatus_solicitud == 'CO PM' || $solicitud->estatus_solicitud == 'CO AC' || $solicitud->estatus_solicitud == 'CO CV') && $this->session->userdata('tipo') == 11) { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar
                            Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if($solicitud->estatus_solicitud == 'CV' && $this->session->userdata('tipo') == 3) { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar
                            Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if($solicitud->estatus_solicitud == 'RCV' && $this->session->userdata('tipo') == 3 && $this->session->userdata('permiso_autorizar') == 'si') { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar
                            Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if($solicitud->estatus_solicitud == 'Sis' && $this->session->userdata('tipo') == 2 && $this->session->userdata('permiso_autorizar') == 'si') { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <!--<button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar Solicitud</button>-->
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if (($solicitud->estatus_solicitud == 'AC') && $this->session->userdata('tipo') == 1) { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar
                            Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if (($solicitud->estatus_solicitud == 'AG') && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''))) { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar
                            Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if (($solicitud->estatus_solicitud == 'PM K') && ($this->session->userdata('id') == 60 || $this->session->userdata('id') == 48 || $this->session->userdata('id') == 369 || $this->session->userdata('tipo') == 10 || $this->session->userdata('id') == 226 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19)) { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar
                            Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if (($solicitud->estatus_solicitud == 'K') && $this->session->userdata('id') == 50) { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if (($solicitud->estatus_solicitud == 'CO K') && $this->session->userdata('id') == 48) { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if (($solicitud->estatus_solicitud == 'AM') && $this->session->userdata('tipo') == 14 && $this->session->userdata('permiso_autorizar') == 'si') { ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php } ?>
                        <?php if (($solicitud->user_aprobacion_id == $this->session->userdata('id')) && ($solicitud->estatus_solicitud == 'creada' || $solicitud->estatus_solicitud == 'SH' || $solicitud->estatus_solicitud == 'PM' || $solicitud->estatus_solicitud == 'PM AC') && (isset($this->session->userdata('permisos')['solicitud-almacen'])) && ($this->session->userdata('permisos')['solicitud-almacen'] > 2)) : ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">
                        <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                        <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar
                            Solicitud</button>
                        <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                        <?php endif ?>
                        <?php if (($this->session->userdata('tipo') == 6) && ($solicitud->estatus_solicitud == 'S' || $solicitud->estatus_solicitud == 'SRCV') ) : ?>
                        <input type="hidden" name="tipo_solicitud" value="<?php echo $solicitud->tipo_producto ?>">                        
                        <button type="button" id="neodata_comentarios" class="btn-primary btn ocultar">Guardar</button>
                        <?php endif ?>

                            
                            <!-- se quito del if de abajo && (($value->entregado * 100) / $value->cantidad) < 100-->
                        <?php if ((($solicitud->estatus_solicitud == 'SU' || $solicitud->estatus_solicitud == 'SU A') && ($this->session->userdata('tipo')==4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''))) && ((isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0) || (isset($this->session->userdata('permisos')['solicitudes_asignadas']) && $this->session->userdata('permisos')['solicitudes_asignadas'] > 0))) : ?>
                        <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
                        <a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen_seleccionado ?>/<?php echo $solicitud->uid ?>/<?php echo $solicitud->uid_proyecto ?>"
                            class="btn-primary btn surtir">
                            Surtir
                        </a>

                        <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
                        <?php endif ?>

                        <?php if ((($solicitud->estatus_solicitud == 'SU RCV' || $solicitud->estatus_solicitud == 'SU RCV A') && $this->session->userdata('tipo')==4) && ((isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0) || (isset($this->session->userdata('permisos')['solicitudes_asignadas']) && $this->session->userdata('permisos')['solicitudes_asignadas'] > 0))) : ?>
                        <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
                        <a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen_seleccionado ?>/<?php echo $solicitud->uid ?>/<?php echo $solicitud->uid_proyecto ?>"
                            class="btn-primary btn surtir">
                            Surtir
                        </a>

                        <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
                        <?php endif ?>

                        <?php if ((($solicitud->estatus_solicitud == 'SU RCV') && $this->session->userdata('tipo')==3) && ((isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0) && $solicitud->tipo_producto = 'Tarjetas' )) : ?>
                        <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
                        <a href="<?= base_url() ?>almacen/asignacion/nueva/<?php echo $solicitud->uid_recibe ?>/tarjetas"
                            class="btn-primary btn surtir" id="surtir">
                            Surtir
                        </a>

                        <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
                        <?php endif ?>

                        <?php if (($solicitud->estatus_solicitud == 'SU AM' && ($this->session->userdata('tipo')==10 || $this->session->userdata('tipo')==14)) && (($value->entregado * 100) / $value->cantidad) < 100 ) : ?>
                        <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
                        <a href="<?= base_url() ?>almacen/asignacion/nueva/<?php echo $solicitud->uid_recibe ?>/material"
                            class="btn-primary btn surtir" id="surtir">
                            Surtir
                        </a>

                        <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
                        <?php endif ?>

                        <?php if (($solicitud->estatus_solicitud == 'SU K' && $this->session->userdata('id')==50) && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && $permiso > 2) : ?>
                        <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
                        <a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen_seleccionado ?>/<?php echo $solicitud->uid ?>/<?php echo $solicitud->uid_proyecto ?>"
                            class="btn-primary btn surtir">
                            Surtir
                        </a>

                        <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
                        <?php endif ?>

                        <?php if (($solicitud->estatus_solicitud == 'SU AC') && $this->session->userdata('tipo')==1 && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && $permiso > 2) : ?>
                        <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
                        <a href="<?= base_url() ?>personal/detalle/<?php echo $solicitud->uid_recibe ?>"
                            class="btn-primary btn surtir" id="surtir">
                            Surtir
                        </a>

                        <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
                        <?php endif ?>

                        <?php if (($solicitud->estatus_solicitud == 'SU CV') && $this->session->userdata('tipo')==3 && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && $permiso > 2) : ?>
                        <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
                        <a href="<?= base_url() ?>personal/detalle/<?php echo $solicitud->uid_recibe ?>"
                            class="btn-primary btn surtir" id="surtir">
                            Surtir
                        </a>

                        <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
                        <?php endif ?>


                        <?php if ($this->session->userdata('permiso_autorizar') == 'si' && ($solicitud->estatus_solicitud == 'SU Sis') && $this->session->userdata('tipo')==2 && isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes'] > 0 && $permiso > 2) : ?>
                        <button type="button" id="cancelar" class="btn-danger btn cs">Cancelar Solicitud</button>
                        <a href="<?= base_url() ?>personal/detalle/<?php echo $solicitud->uid_recibe ?>"
                            class="btn-primary btn surtir" id="surtir">
                            Surtir
                        </a>

                        <!--<a href="<?= base_url() ?>almacen/nueva-salida/<?php echo $solicitud->uid_almacen ?>/<?php echo $solicitud->uid ?>" title="" style="display:none;" class="btn-primary btn surtir">
                  Surtir
                </a>-->
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
                                        <td class="b_top b_right b_bottom" style="width: 150px;!important"
                                            align="center">
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
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>COMENTARIOS</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $solicitud->comentarios ?>
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
                <table style="width: 100%;margin-top: 15px;" border="0" cellpadding="4" cellspacing="0" align="center">
                    <tbody style="font-size: 12px!important;" align="center">
                        <tr>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_recibe">Almacen General
                            </td>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_entrega">
                                <?= $solicitud->recibe ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" align="center">Entrega <?= date("Y-m-d", strtotime('now')); ?>
                            </td>
                            <td colspan="2" width="50%" align="center">Recibe <?= date("Y-m-d", strtotime('now')); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade bd-example-modal-lg" id="cancelarModal" tabindex="-1" role="dialog"
    aria-labelledby="vacacionesLabel" aria-hidden="true">
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

                    <div class="form-group">
                        <label>Comentarios</label>
                        <textarea name="comentarios" class="form-control" rows="5"></textarea>
                    </div>
                    <br>
                    <?= form_hidden('almacen_tipo', $solicitud->estatus_solicitud != 'SU' ? '' : $almacen_seleccionado[0]['tipo']) ?>
                    <?= form_hidden('uid', $solicitud->uid) ?>
                    <?= form_hidden('estatus', $solicitud->estatus_solicitud) ?>
                    <?= form_hidden('tipo_solicitud', $solicitud->tipo_producto) ?>
                    <?= form_hidden('token', $token) ?>
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
<script>
<?php if($this->session->userdata('id') == 50){ ?>
$(document).ready(function() {          
    console.log("entro");
    var id_almacen = 16;    
    //alert(id_almacen);
    //alert(tipo_almacen);
    $("#formuploadajax input[name='idtbl_almacenes']")[0].value = id_almacen;


    <?php for ($x = 0; $x < sizeof($productos_enviar); $x++) { ?>
    $.ajax({
        url: "<?= base_url() ?>almacen/getExistencias",
        type: "POST",
        data: "idtbl_catalogo=<?= $productos_enviar[$x]['idtbl_catalogo'] ?>&idtbl_almacenes=" + id_almacen + "&idctl_categorias=<?= $productos_enviar[$x]['idctl_categorias'] ?>",
        success: function(respuesta) {
            var jsonRespuesta = JSON.parse(respuesta);
            if(jsonRespuesta.select == false){
                //alert(id_almacen);                
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").html("");
                var input;
                if (jsonRespuesta.datos.length == 0) {
                    input = "<input type='text' name='existencias[]' readonly class='form-control' value='0'>";
                    $("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '0');
                    $("#cantidad_inicial_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '0');
                } else {
                    input = "<input type='text' name='existencias[]' readonly class='form-control' value='" + jsonRespuesta.datos[0]['existencias'] + "'>";
                    $("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max',jsonRespuesta.datos[0]['existencias']);
                    $("#cantidad_inicial_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max',jsonRespuesta.datos[0]['existencias']);
                }
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(input);
            }else{
                //alert('siuu');
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").html("");
                $("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '1');
                $("#cantidad_inicial_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '1');
                var select = $("<select name='existencias[]' class='selectpicker' data-show-subtext='true' data-live-search='true'><option value=''>Seleccionar ...</option></select>");
                for(var r=0; r < jsonRespuesta.datos.length; r++){
                    select.append("<option value=" + jsonRespuesta.datos[r].iddtl_almacen + ">" + jsonRespuesta.datos[r].numero_serie + "</option>");                    
                    
                }
                //select.selectpicker();
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(select);
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?> .selectpicker").selectpicker("refresh");
            }
        }
    });
    <?php } ?>

});
<?php } ?>    
$(document).on('change', '#selectAlmacen', function(event) {
    event.preventDefault();
    console.log("entro");
    var tipo_almacen = $("#selectAlmacen").find(':selected').data('tipo-almacen');
    var id_almacen = $("#selectAlmacen").find(':selected').data('idtbl-almacenes');    
    //alert(id_almacen);
    //alert(tipo_almacen);
    $("#formuploadajax input[name='idtbl_almacenes']")[0].value = id_almacen;
    $("#formuploadajax input[name='tipo_almacenes']")[0].value = tipo_almacen;
    $.ajax({
        url: "<?= base_url() ?>almacen/actualizar_existencias_cuadre",
        type: "POST",
        data: "idtbl_almacenes=" + id_almacen,
        success: function(respuesta) {
            console.log(respuesta);
        }
    });
    <?php for ($x = 0; $x < sizeof($productos_enviar); $x++) { ?>
    $.ajax({
        url: "<?= base_url() ?>almacen/getExistencias",
        type: "POST",
        data: "idtbl_catalogo=<?= $productos_enviar[$x]['idtbl_catalogo'] ?>&idtbl_almacenes=" + id_almacen + "&sitio=<?= $productos_enviar[$x]['sitio'] ?>" + "&idctl_categorias=<?= $productos_enviar[$x]['idctl_categorias'] ?>",
        success: function(respuesta) {
            var jsonRespuesta = JSON.parse(respuesta);
            if((tipo_almacen != 'interno' || (tipo_almacen == 'interno' && jsonRespuesta.select == false)) && (tipo_almacen != 'sub' || (tipo_almacen == 'sub' && jsonRespuesta.select == false)) && (tipo_almacen != 'externo' || (tipo_almacen == 'externo' && jsonRespuesta.select == false))){
                //alert(id_almacen);                
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").html("");
                var input;
                if (jsonRespuesta.datos.length == 0) {
                    input = "<input type='text' name='existencias[]' readonly class='form-control' value='0'>";
                    $("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '0');
                    $("#cantidad_inicial_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '0');
                } else {
                    input = "<input type='text' name='existencias[]' readonly class='form-control' value='" + jsonRespuesta.datos[0]['existencias'] + "'>";
                    $("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max',jsonRespuesta.datos[0]['existencias']);
                    $("#cantidad_inicial_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max',jsonRespuesta.datos[0]['existencias']);
                }
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(input);
            }else{
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").html("");
                $("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '1');
                $("#cantidad_inicial_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '1');
                var select = $("<select name='existencias[]' class='selectpicker' data-show-subtext='true' data-live-search='true'><option value=''>Seleccionar ...</option></select>");
                for(var r=0; r < jsonRespuesta.datos.length; r++){
                    select.append("<option value=" + jsonRespuesta.datos[r].iddtl_almacen + ">" + jsonRespuesta.datos[r].numero_serie + "</option>");                    
                    
                }
                //select.selectpicker();
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(select);
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?> .selectpicker").selectpicker("refresh");
            }
        }
    });
    <?php } ?>
});
</script>
<script>
var cant = 0;
$(".cantidad").each(function() {
    cant += parseFloat($(this).val());
    console.log(cant);
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
    window.open('<?= base_url() ?>almacen/detalle-solicitud-material/<?= $uid ?>', 'Materiales',
        'width=800, height=600');
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
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
                $('#cancelarModal').modal('hide');
                $('.ocultar').hide();
                Swal.fire(
                    '¡Exitoso!',
                    resp.mensaje,
                    'success'
                )
                location.href = "<?= base_url() ?>almacen/solicitudes-almacen";
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
    event.preventDefault();
    var tipo = <?= $this->session->userdata('tipo')?>;
    var user = <?= $this->session->userdata('id')?>;    
    if (($("#selectAlmacen").val() == '' || $("#selectAlmacen").val() == null) && ((tipo == 4 || tipo == 9) && (user != 226))) {
        Toast.fire({
            type: 'error',
            title: '¡No has seleccionado un Almacen!'
        });
        return 0;
    }
    if (($("#personal_entrega").val() == '' || $("#personal_entrega").val() == null) && ((tipo == 4) && (user != 50))) {
        Toast.fire({
            type: 'error',
            title: '¡No has seleccionado el personal que entrega!'
        });
        return 0;
    }
    var cantidad_inicial = $("#formuploadajax input[name='cantidad_inicial[]'");
    var cantidad = $("#formuploadajax input[name='cantidad[]'");
    var existencias = $("#formuploadajax select[name='existencias[]']");
    if((tipo == 4 || tipo == 9)){
        for(var r=0; r<cantidad.length; r++){
            console.log(">> ",cantidad[r].value,cantidad[r].max);
            if(parseFloat(cantidad[r].value) > parseFloat(cantidad[r].max)){
                $(cantidad[r]).css("border-color", "#d9534f");
                Toast.fire({
                    type: 'error',
                    title: '¡La cantidad no puede ser mayor a la existencias!'
                });
                return 0;
            }
            /*if((parseFloat(cantidad_inicial[r].value) > parseFloat(cantidad[r].value) && parseFloat(cantidad_inicial[r].value) < parseFloat(cantidad[r].max))){
                $(cantidad[r]).css("border-color", "#d9534f");
                Toast.fire({
                    type: 'error',
                    title: '¡Si tienes existencias para ' + cantidad_inicial[r].value +'!'
                });
                return 0;
            }*/
        }
        for(var r=0; r<existencias.length; r++){
            if(existencias[r].value == ""){
                $(existencias[r]).css("border-color", "#d9534f");
                Toast.fire({
                    type: 'error',
                    title: '¡Seleccionar numero de serie!'
                });
                return 0;
            }
        }
    }
    //if(tipo == 11){
        var modificados = 0;
        for(var r=0; r<cantidad.length; r++){
            console.log(">>> ",cantidad[r].value,cantidad_inicial[r].value);
            if(parseFloat(cantidad[r].value) != parseFloat(cantidad_inicial[r].value)){
                modificados++;
                
            }
            if(modificados == 0 && r==cantidad.length){
                $(cantidad[r]).css("border-color", "#d9534f");
                Toast.fire({
                    type: 'error',
                    title: '¡No has modificado cantidades!'
                });
                return 0;
            }
            
        }
    //}
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
            var cant2 = 0;
            $(".cantidad").each(function() {
                cant2 += parseFloat($(this).val());
            });
            console.log(cant2);
            console.log(cant);
            //if (cant == cant2) {
            //    Toast.fire({
            //        type: 'error',
            //        title: '¡No hubo cambios!'
            //    })
            //} else {
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
            //}
        }
    })
});
$("#formuploadajax input[name='cantidad[]']").click(function (event){
    $(this).css("border-color", "#dee2e6");
});
$("#formuploadajax select[name='existencias[]']").on("change",function (event){
    console.log("existencias");
    $(this).css("border-color", "#dee2e6");
});
$('#aprobar').click(function(event) {
    
    event.preventDefault();    
    var tipo = <?= $this->session->userdata('tipo')?>;
    var user = <?= $this->session->userdata('id')?>;    
    if (($("#selectAlmacen").val() == '' || $("#selectAlmacen").val() == null) && ((tipo == 4 || tipo == 9) && (user != 226))) {
        Toast.fire({
            type: 'error',
            title: '¡No has seleccionado un Almacen!'
        });
        return 0;
    }
    if (($("#personal_entrega").val() == '' || $("#personal_entrega").val() == null) && ((tipo == 4) && (user != 50))) {
        Toast.fire({
            type: 'error',
            title: '¡No has seleccionado el personal que entrega!'
        });
        return 0;
    }
    var cantidad = $("#formuploadajax input[name='cantidad_inicial[]']");
    var existencias = $("#formuploadajax select[name='existencias[]']");
    if((tipo == 4 || tipo == 9) && (user != 226)){
        /*for(var r=0; r<cantidad.length; r++){
            if(parseFloat(cantidad[r].value) != parseFloat(cantidad[r].min)){
                $(cantidad[r]).css("border-color", "#d9534f");
                Toast.fire({
                    type: 'error',
                    title: '¡La cantidad no es igual a la solicitada!'
                });
                return 0;
            }
        }*/
        if(user != 50000){
            for(var r=0; r<cantidad.length; r++){         
                if(parseFloat(cantidad[r].value) > parseFloat(cantidad[r].max)){
                    $(cantidad[r]).css("border-color", "#d9534f");
                    Toast.fire({
                        type: 'error',
                        title: '¡La cantidad no puede ser mayor a la existencias!'
                    });
                    return 0;
                }
            }
        }else{
            for(var r=0; r<existencias.length; r++){
                if(existencias[r].value == ""){
                    $(existencias[r]).css("border-color", "#d9534f");
                    Toast.fire({
                        type: 'error',
                        title: '¡Seleccionar numero de serie!'
                    });
                    return 0;
                }
            }
        }
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
               processData: false,
                cache: false,
                contentType: false,                
               /* beforeSend: function(){
                    $('.card-body').addClass('load');
                },*/
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

$('#neodata_comentarios').click(function(event) {
    event.preventDefault();    
    
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea guardar los comentarios de Neodata?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url() ?>almacen/comentarios-neodata",
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

$('#actNeodata').click(function(event) {    
    event.preventDefault();
    var formData = new FormData(document.getElementById("formuploadNeodata"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea actualizar el Neodata de Salida?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url() ?>almacen/actualizar-neodata",
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
    //ventana.document.write('<link rel="stylesheet" href="style.css">'); //Aquí agregué la hoja de estilos
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