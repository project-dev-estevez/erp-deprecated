<section class="forms nueva-solicitud">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4 mr-auto p-2">
                    Detalle solicitud de devolución
                </h3>
            </div>
            <div class="card-body">
                <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
                <?php echo form_open_multipart('', 'class="needs-validation" novalidate id="formuploadajax"'); ?>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label>Entrega*</label>
                            <input type="text" name="" id="" class="form-control" disabled
                                value="<?= $solicitud->entrega ?>">
                            <input type="hidden" name="entrega" required
                                value="<?= $solicitud->tbl_usuarios_idtbl_usuarios ?>">
                        </div>                        
                    </div>
                </div>
                <?php if ((($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && $this->session->userdata('id') != 50) && $solicitud->tbl_users_idtbl_users_ag == NULL) { ?>
                <?= $solicitud->tbl_users_idtbl_users_ag ?>
                <?php  
                    $lista = array("ALMACÉN ALTO COSTO", "KUALLI", "Área Médica", "ALMACEN AUTOS CONTROL VEHICULAR", "ALMACÉN SISTEMAS");
                ?>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="comentarios">Almacen*</label>
                            <select class="form-control" name="uid_almacen" id="selectAlmacen"
                            data-live-search="true" required>
                            <?php $index_for = 0; ?>
                            <option disabled selected="selected">Seleccione Almacen</option>
                            <?php if($solicitud->tipo_devolucion == 'Refacciones Control Vehicular'){ ?>
                            <option value="5f5661ca14d2f" data-idtbl-almacenes="29">
                                <?php echo 'ALMACEN REFACCIONES CONTROL VEHICULAR' ?>
                            </option>
                            <?php }else if($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''){ ?>
                                <?php foreach($almacenes AS $key => $value){ ?>
                                    <?php foreach($this->session->userdata('encargado_almacen') AS $key2 => $value2){ ?>
                                        <?php if ($this->session->userdata('id') != 137 && $this->session->userdata('id') != 207 && $this->session->userdata('id') != 462 && $this->session->userdata('id') != 421 && $this->session->userdata('id') != 172 && $this->session->userdata('id') != 139 && $this->session->userdata('id') != 226 && $this->session->userdata('id') != 253 && $this->session->userdata('id') != 325 && $this->session->userdata('id') != 322 && $this->session->userdata('id') != 323 && $this->session->userdata('id') != 329) { ?>
                                    <?php if ($value->idtbl_almacenes == $value2 && $solicitud->tbl_proyectos_idtbl_proyectos == $value->tbl_proyectos_idtbl_proyectos) { ?>
                                        <?php if ($value->almacen == $solicitud->segmento) { ?>
                            <option value="<?= $value->uid ?>" data-idtbl-almacenes="<?= $value->idtbl_almacenes ?>">
                                <?= $value->almacen ?>
                            </option>
                            <?php } ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <?php if ($value->idtbl_almacenes == $value2 && $solicitud->tbl_proyectos_idtbl_proyectos == $value->tbl_proyectos_idtbl_proyectos) { ?>
                                <option value="<?= $value->uid ?>" data-idtbl-almacenes="<?= $value->idtbl_almacenes ?>">
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
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Personal que recibe*</label>
                            <select name="usuario_entrega" id="personal_entrega" class="form-control" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <?php foreach ($autorizados as $key => $value) : ?>
                                <option value="<?php echo $value->idctl_autorizados_entrega ?>"
                                    data-nombre="<?php echo $value->nombre ?>">
                                    <?php echo $value->nombre ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php if (($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50) && $solicitud->tbl_users_idtbl_users_kuali == NULL) { ?>
                <?= $solicitud->tbl_users_idtbl_users_ag ?>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">


                            <input type="hidden" name="almacen" class="form-control" id="selectAlmacen" value="16"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Personal que recibe*</label>
                            <select name="usuario_entrega" id="personal_entrega" class="form-control" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <?php foreach ($autorizados as $key => $value) : ?>
                                <option value="<?php echo $value->idctl_autorizados_entrega ?>"
                                    data-nombre="<?php echo $value->nombre ?>">
                                    <?php echo $value->nombre ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 2)&& $solicitud->estatus_solicitud != 'entregado') { ?>
                    <?php if($this->session->userdata('tipo') == 3){ ?>
                    <?= $solicitud->tbl_users_idtbl_users_ag ?>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label>Personal que recibe*</label>
                                <select name="usuario_recibe" id="personal_recibe" class="form-control producto" required>
                                    <option value="" disabled selected>Seleccione...</option>
                                    <?php foreach ($personal_autorizacion_control_vehicular as $key => $value) : ?>
                                    <option value="<?php echo $value->idtbl_users ?>"
                                        data-nombre="<?php echo $value->nombre ?>"
                                        data-idtblusers="<?php echo $value->idtbl_users ?>">
                                        <?php echo $value->nombre ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if (($this->session->userdata('tipo') == 2) && $solicitud->estatus_solicitud != 'entregado') { ?>
                    <?= $solicitud->tbl_users_idtbl_users_ag ?>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label>Personal que recibe*</label>
                                <select name="usuario_recibe" id="personal_recibe" class="form-control producto" required>
                                    <option value="" disabled selected>Seleccione...</option>                                    
                                    <?php foreach ($personal_autorizacion_sistemas as $key => $value) : ?>
                                    <option value="<?php echo $value->idtbl_users ?>"
                                        data-nombre="<?php echo $value->nombre ?>"
                                        data-idtblusers="<?php echo $value->idtbl_users ?>">
                                        <?php echo $value->nombre ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                <hr><?php } ?>
                    
                    <?php if($solicitud->tipo_devolucion != 'Refacciones Control Vehicular' && $solicitud->tipo_devolucion != 'Tarjetas') { ?>
                        <?php if($this->session->userdata('tipo') == 3) { ?>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Eco* <?= $solicitud->tipo_devolucion ?></label>
                                        <select name="eco_asignado" id="eco_asignado" class="form-control eco" required>
                                            <option value="" disabled selected>Seleccione...</option>
                                            <?php foreach ($ecos_asignados as $key => $value) : ?>
                                            <option value="<?php echo $value->numero_interno ?>"
                                                data-idtblcatalogo="<?php echo $value->tbl_catalogo_idtbl_catalogo ?>"
                                                data-iddtlalmacen="<?php echo $value->iddtl_almacen ?>"
                                                data-numerointerno="<?php echo $value->numero_interno ?>"
                                                data-marca="<?php echo $value->marca ?>" data-modelo="<?php echo $value->modelo ?>"
                                                data-numeroserie="<?php echo $value->numero_serie ?>"
                                                data-nomotor="<?php echo $value->no_motor ?>"
                                                data-placas="<?php echo $value->placas ?>"
                                                data-poliza="<?php echo $value->poliza ?>"
                                                data-vencimiento="<?php echo $value->proxima_fecha_tramite ?>"
                                                data-seguro="<?php echo $value->seguro ?>"                                                
                                                data-estadovehiculo="<?php echo $value->estado ?>">
                                                <?php echo $value->numero_interno ?>                                                
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="banderaChecklist" value="false">
                        <?php } elseif($this->session->userdata('tipo') == 2 && $detalle[0]->ctl_categorias_idctl_categorias == 16) { ?>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label>Equipo* <?= $solicitud->tipo_devolucion ?></label>
                                        <select name="eco_asignado" id="eco_asignado" class="form-control eco" required>
                                            <option value="" disabled selected>Seleccione...</option>
                                            <?php foreach ($ecos_asignados as $key => $value) : ?>
                                            <option value="<?php echo $value->numero_interno ?>"
                                                data-idtblcatalogo="<?php echo $value->tbl_catalogo_idtbl_catalogo ?>"
                                                data-iddtlalmacen="<?php echo $value->iddtl_almacen ?>"
                                                data-iddtlasignacion="<?= $value->iddtl_asignacion ?>"
                                                data-numerointerno="<?php echo $value->numero_interno ?>"
                                                data-marca="<?php echo $value->marca ?>" data-modelo="<?php echo $value->modelo ?>"
                                                data-numeroserie="<?php echo $value->numero_serie ?>"
                                                data-nomotor="<?php echo $value->no_motor ?>"
                                                data-placas="<?php echo $value->placas ?>"
                                                data-estadovehiculo="<?php echo $value->estado ?>"
                                                data-imagenescheck='<?= $value->imagenes_checklist ?>'
                                                data-imagenes='<?= $value->imagenes ?>'>
                                                <?php echo $value->numero_interno ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php if($detalle[0]->ctl_categorias_idctl_categorias == 16) { ?>
                                <div class="row">
                                    <div class="col-6">
                                        <img id="imagen1">
                                    </div>
                                    <div class="col-6">
                                        <img id="imagen2">
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-6">
                                        <center>                    
                                            <div id="auto_comparacion1">

                                            </div>
                                            <canvas width="280" height="220" id="draw-canvas">
                                                No tienes un buen navegador.
                                            </canvas>
                                            <br>
                                            <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn"><i
                                                    class="fa fa-ban"></i> Crear Imagen</button>
                                            <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn"><i
                                                        class="fa fa-trash"></i> Borrar</button>
                                            <div>
                                                <br>
                                                <label>Color</label>
                                                <input type="color" id="color">
                                                <label>Tamaño Puntero</label>
                                                <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                                            </div>
                                            <textarea style="display: none;" id="draw-dataUrl" name="imagen" class="form-control"
                                                    rows="5">            
                                            </textarea>
                                            <img style="display: none" id="draw-image" src="" alt="Tu Imagen aparecera Aqui!" />
                                        </center>
                                    </div>

                                    <div class="col-6">
                                        <center>
                                            <div id="auto_comparacion2">

                                            </div>
                                            <canvas id="draw-canvas2" width="280" height="220">
                                                No tienes un buen navegador.
                                            </canvas>
                                            <br>
                                            <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn2"><i
                                                    class="fa fa-ban"></i> Crear Imagen</button>
                                            <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn2"><i
                                                        class="fa fa-trash"></i> Borrar</button>
                                            <div>
                                                <br>
                                                <label>Color</label>
                                                <input type="color" id="color2">
                                                <label>Tamaño Puntero</label>
                                                <input type="range" id="puntero2" min="1" default="1" max="5" width="10%">
                                            </div>
                                            <textarea style="display: none;" id="draw-dataUrl2" name="imagen2" class="form-control"
                                                rows="5">
                                            </textarea>
                                            <img style="display: none" id="draw-image2" src="" alt="Tu Imagen aparecera Aqui!" />
                                        </center>
                                    </div>
                                </div>
                            <?php } ?>
                            
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                
                <?php foreach ($detalle as $posicion => $value) : ?>
                <div id="item-producto<?= $posicion ?>" class="itemproducto">
                    <?php if($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) { ?>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group .producto-input">
                                    <label>Producto*</label>
                                    <input type="text" name="" class="form-control producto-input" disabled
                                        value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . '(' . htmlspecialchars(trim($value->descripcion), ENT_COMPAT) . ')' ?>">
                                    <?php if($this->session->userdata('id') == 50) { ?>
                                    <input type="hidden" name="producto_p[]" required class="form-control producto-select"
                                        data-descripcion="<?= htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                                        value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Cantidad a entregar*</label>
                                    <input type="text" name="" class="form-control" disabled
                                        value="<?= $value->cantidad . ' ' . $value->unidad_medida_abr ?>">
                                    <?php if($this->session->userdata('id') == 50) { ?>        
                                    <input type="hidden" name="cantidad_p[]" required class="form-control cantidad"
                                        value="<?= $value->cantidad ?>">
                                    <?php } ?>
                                </div>
                            </div>


                            <?php if($this->session->userdata('id') == 50) { ?>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Entregado*</label>
                                        
                                        <input type="number" name="entregado[]" class="form-control entregar" step="0.001"
                                            min="0" required value="<?= $value->entregado ?>">
                                        
                                    </div>
                                </div>
                                <input type="hidden" name="iddtl_devolucion[]" value="<?= $value->iddtl_solicitud_devolucion ?>">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Estado*</label>                    
                                        <?php if ($value->entregado != $value->cantidad) : ?>
                                            <select name="estado[]" id="estado<?= $posicion ?>" class="form-control estado" required>
                                                <option value="" selected disabled="">Seleccione...</option>
                                                <option value="almacen">Disponible</option>
                                                <option value="dañado">Dañado</option>
                                                <option value="robado">Robado</option>
                                                <option value="abuso de confianza">abuso de confianza</option>
                                                <option value="justificacion">Justificación</option>
                                            </select>
                                        <?php else: ?>
                                            <input type="text" name="estado[]" class="form-control" readonly value="<?= $value->estado ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if($this->session->userdata('id') != 50) { ?>
                            <input type="hidden" name="estado[]" value="">
                            <div style="display: none;">
                                <div id="clon<?= $posicion ?>">
                                    <input type="hidden" name="producto_p[]" required class="form-control producto-select"
                                        data-descripcion="<?= htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                                        value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                                    <input type="hidden" name="cantidad_p[]" required class="form-control cantidad"
                                        value="<?= $value->cantidad ?>">
                                    <br><i class="fa fa-close delete-product2" style="display:none; color:red; font-size: 20px;"></i>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Entregado*</label>
                                            
                                            <input type="number" name="entregado[]" class="form-control entregar" step="0.001"
                                                min="0" required value="<?= $value->entregado ?>">
                                            
                                        </div>
                                    </div>
                                    <input type="hidden" name="iddtl_devolucion[]" value="<?= $value->iddtl_solicitud_devolucion ?>">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Estado*</label>                    
                                            <?php if ($value->entregado != $value->cantidad) : ?>
                                                <select name="estado[]" id="estado<?= $posicion ?>" class="form-control estado" required>
                                                    <option value="" selected disabled="">Seleccione...</option>
                                                    <option value="almacen">Disponible</option>
                                                    <option value="dañado">Dañado</option>
                                                    <option value="robado">Robado</option>
                                                    <option value="abuso de confianza">abuso de confianza</option>
                                                    <option value="justificacion">Justificación</option>
                                                </select>
                                            <?php else: ?>
                                                <input type="text" name="estado[]" class="form-control" readonly value="<?= $value->estado ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                    
                        </div>

                        <?php if ((($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && $this->session->userdata('id') != 50) && $solicitud->tbl_users_idtbl_users_ag == NULL) { ?>
                            <div class="form-row">
                                <div class="col-md-12 text-center">
                                    <button type="button" onclick="clonar(<?= $posicion ?>)" class="btn btn-primary btn-rounded">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div id="datos-clonados<?= $posicion ?>">
                                </div>
                            </div>
                        </div>

                    <?php } elseif($this->session->userdata('tipo') != 4) { ?>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group .producto-input">
                                    <label>Producto*</label>
                                    <input type="text" name="" class="form-control producto-input" disabled
                                        value="<?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . '(' . htmlspecialchars(trim($value->descripcion), ENT_COMPAT) . ')' ?>">
                                    <input type="hidden" name="producto_p[]" required class="form-control producto-select"
                                        data-descripcion="<?= htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                                        value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                                    <input type="hidden" name="categoria_p[]" required class="form-control producto-select"
                                        value="<?= $value->ctl_categorias_idctl_categorias ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Cantidad a entregar*</label>
                                    <input type="text" name="" class="form-control" disabled
                                        value="<?= $value->cantidad . ' ' . $value->unidad_medida_abr ?>">
                                    <input type="hidden" name="cantidad[]" required class="form-control cantidad"
                                        value="<?= $value->cantidad ?>">
                                </div>
                            </div>        
                            <div class="col">
                                <div class="form-group">
                                    <label>Entregado*</label>
                                    <?php if ($solicitud->tbl_users_idtbl_users_aprobacion != NULL && $solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $this->session->userdata('tipo') == 4 && $permiso > 1 && $solicitud->estatus_solicitud != 'cancelada A.G') : ?>
                                    <input type="number" name="entregado[]" class="form-control entregar" step="0.001"
                                        min="0" required value="<?= $value->entregado ?>">
                                    <?php else : ?>
                                    <input type="text" name="" class="form-control entregar"
                                        value="<?= $value->entregado ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <input type="hidden" name="iddtl_devolucion[]" value="<?= $value->iddtl_solicitud_devolucion ?>">
                            <div class="col">
                                <div class="form-group">
                                    <label>Estado*</label>                    
                                    <?php if ($value->entregado != $value->cantidad) : ?>
                                        <select name="estado[]" id="estado<?= $posicion ?>" class="form-control estado" required>
                                            <option value="" selected disabled="">Seleccione...</option>
                                            <option value="almacen">Disponible</option>
                                            <option value="dañado">Dañado</option>
                                            <option value="robado">Robado</option>
                                            <option value="abuso de confianza">abuso de confianza</option>
                                            <option value="justificacion">Justificación</option>
                                        </select>
                                    <?php else: ?>
                                        <input type="text" name="estado[]" class="form-control" readonly value="<?= $value->estado ?>">
                                    <?php endif; ?>
                                </div>                                
                            </div>
                                
                             

                        </div>

                    <?php } ?>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                            <?php if(($this->session->userdata('tipo') != 4 || $this->session->userdata('id') == 50) && ($this->session->userdata('encargado_almacen') == null && $this->session->userdata('encargado_almacen') == '')){ ?>
                                <?php if ($value->entregado != $value->cantidad) : ?>
                                <a class="btn-primary btn surtir aprobar btn-ocultar" name="dev" <?= $this->session->userdata('tipo') == 3 && $solicitud->tipo_devolucion == 'tarjetas' ? 'style="display: none;"' : '' ?> id="<?= $posicion ?>">
                                    Devolución 
                                </a>                          
                                <?php endif; ?>
                                <?php } ?>
                                <?php if($this->session->userdata('tipo') == 3 && $solicitud->tbl_users_idtbl_users_acv == NULL && $solicitud->tipo_devolucion == 'Autos Control Vehicular') { ?>
                                <button type="button" class="btn btn-secondary btn-checklist" id="generar-checklist">Generar
                                    CheckList</button> 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">

                            </div>
                        </div>
                    </div>

                    <hr>
                </div>
                <?php endforeach; ?>
                <?php if ($solicitud->tbl_users_idtbl_users_aprobacion != NULL && $solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag  == NULL && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && $permiso > 1 && $solicitud->estatus_solicitud != 'cancelada A.G') : ?>
                <div id="item-producto<?= ($posicion + 1) ?>" class="itemproducto" style="display: none;">
                    <div class="form-row">
                        <div class="col-xs-12 col-md-6">
                            <label>Producto*</label>
                            <select name="producto[]" id="product" class="selectpicker producto"
                                data-live-search="true">
                                <option value="test" selected="selected">Seleccione...</option>
                                <?php foreach ($catalogo as $key => $value) : ?>
                                <option value="<?php echo $value->idtbl_catalogo ?>"
                                    data-neodata="<?php echo $value->neodata; ?>"
                                    data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                                    data-unidad-medida="<?php echo $value->unidad_medida ?>"
                                    data-categoria="<?php echo $value->idctl_categorias ?>">
                                    <?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . ' (' . substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT), 0, 70) . ')' ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <label for="">Descripción</label>
                            <input type="text" class="form-control descripcion" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="unidad">Unidad</label>
                            <input type="text" disabled="true" class="form-control unidad">
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Entregado*</label>
                                <input type="hidden" name="cantidad[]" required class="form-control cantidad" value="-">
                                <input type="number" name="entregado[]" class="form-control entregar" step="0.001"
                                    min="0">
                            </div>
                        </div>

                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <?php if ($solicitud->tbl_users_idtbl_users_aprobacion != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''))) : ?>
                                <label>Comentarios</label>
                                <textarea name="observaciones[]" id="comentarios" class="form-control nota"
                                    rows="3"></textarea>
                                <?php elseif ($solicitud->tbl_users_idtbl_users_ag != NULL) : ?>
                                <label>Comentarios</label>
                                <textarea name="" id="" disabled class="form-control"
                                    rows="3"><?= $value->observaciones ?></textarea>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <br><i class="fa fa-close delete-product" style="display:none"></i>
                    <hr>
                </div>
            <?php if(($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && $solicitud->contratista != NULL){ ?>
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
                <?php endif; ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">                    
                        <!--<?= form_hidden('token', $token) ?>-->
                        <?= form_hidden('uid_usuario', $solicitud->uid_usuario) ?>
                        <?= form_hidden('uid_devolucion', $uid_salida) ?>
                        <?= form_hidden('tipo_devolucion', $solicitud->tipo_devolucion) ?>
                        <?= form_hidden('parent', $solicitud->idtbl_solicitud_devolucion) ?>                        
                        <?= form_hidden('proyecto', $solicitud->tbl_proyectos_idtbl_proyectos) ?>
                        <?= form_hidden('segmento', $solicitud->idtbl_segmentos_proyecto) ?>
                        <?php
                        $contratistaPersonal = ($solicitud->tbl_contratistas_idtbl_contratistas == '' && $solicitud->tbl_usuarios_idtbl_usuarios_supervisor == '') ? 1 : 0;
                        $usuarioalmacen = ($permiso > 1 && $this->session->userdata('tipo') == 4) ? 1 : 0;
                        ?>
                        <?php if(($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && $this->session->userdata('id') != 50 && $solicitud->estatus_solicitud != 'entregado'){ ?>
                    <a class="btn btn-primary" name="dev" id="devolucion">
                                    Devolución
                                </a>   
                                <?php } ?>
                    </div>
                </div>
                <?= form_close(); ?>
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

                .td-estatus:first-letter {
                    text-transform: uppercase;
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
                                <strong>C&oacute;digo: DA-FE-AL-002</strong>
                            </th>
                        </tr>
                        <tr>
                            <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center">
                                Devolución a Almacén
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
                                            <?= (empty($solicitud->segmento)) ? $solicitud->direccion_proyecto : $solicitud->segmento; ?>
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
                                            <?= $solicitud->autor ?>
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
                                            <?= $solicitud->aprobacion ?>
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
                                            <?= $solicitud->entrega ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;margin-top: 15px;" border="1" cellpadding="4" cellspacing="0" align="center">
                    <thead style="font-size: 12px!important;">
                        <tr align="center">
                            <th><strong>CODIGO</strong></th>
                            <th><strong>DESCRIPCION</strong></th>
                            <th width="70px"><strong>CANTIDAD</strong></th>
                            <th width="50px"><strong>UNIDAD</strong></th>
                            <?php if ($solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $permiso > 1 && $this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud != 'cancelada A.G') : ?>
                            <th><strong>ENTREGADO</strong></th>
                            <th><strong>ESTATUS</strong></th>
                            <?php endif ?>
                            <th style="min-width: 150px;"><strong>NOTA</strong></th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px!important;" align="center">
                        <?php foreach ($detalle as $key => $value) : ?>
                        <tr id="tritem-producto<?= $key ?>">
                            <td class="td-codigo-uid"><?php echo $value->neodata ?></td>
                            <td class="td-producto"><?php echo $value->descripcion ?></td>
                            <td class="td-cantidad"><?= $value->cantidad ?></td>
                            <td class="td-unidad-medida"><?php echo $value->unidad_medida_abr ?></td>
                            <?php if ($solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $permiso > 1 && $this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud != 'cancelada A.G') : ?>
                            <td class="td-entregado"></td>
                            <td class="td-estatus"></td>
                            <?php endif ?>
                            <td class="td-observaciones"><?= $value->observaciones ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br><br><br><br>
                <table style="width: 100%;margin-top: 15px;" border="0" cellpadding="4" cellspacing="0" align="center">
                    <tbody style="font-size: 12px!important;" align="center">
                        <tr>
                            <td colspan="2" width="50%" align="center"></td>
                            <td colspan="2" width="50%" align="center"></td>
                        </tr>
                        <?php if ($solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $permiso > 1 && $this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud != 'cancelada A.G') : ?>
                        <tr>
                            <td colspan="4" width="50%" align="center" class="nombre_empleado_recibe"></td>
                        </tr>
                        <tr>
                            <td colspan="4" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
                        </tr>
                        <?php else : ?>
                        <tr>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_entrega">
                                <?= $solicitud->entrega ?></td>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_recibe">Almacen General
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
                            <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
                        </tr>
                        <?php endif ?>
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
                <h5 class="modal-title" id="vacacionesLabel">Cancelar solicitud de devolución</h5>
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
                    <?= form_hidden('solicitudUID', $solicitud->idtbl_solicitud_devolucion) ?>
                    <?= form_hidden('uid', $this->uri->segment(3)) ?>
                    <?= form_hidden('token', $token) ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnCancel" class="btn btn-primary ladda-button"
                    data-style="expand-right">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-filestyle.js"></script>
<script>
$('.filestyle').filestyle({
    text: '&nbsp;Documento',
    btnClass: 'btn-outline-info',
});
$(document).on('change', '#personal_entrega', function(event) {
    $('.nombre_empleado_recibe').html($("option:selected", this).data('nombre'));
});
$(document).on('change', '.entregar', function(event) {
    var _this = $(this).closest('.itemproducto');
    $('#tr' + _this.attr('id')).find('.td-entregado').html($(this).val());
});
$(document).on('change', '.estado', function(event) {
    var _this = $(this).closest('.itemproducto');
    $('#tr' + _this.attr('id')).find('.td-estatus').html($(this).val());
});
$(document).on('change', '.nota', function(event) {
    var _this = $(this).closest('.itemproducto');
    $('#tr' + _this.attr('id')).find('.td-observaciones').html($(this).val());
});
$(document).on('change', '.producto', function(event) {
    event.preventDefault();
    var _this = $(this).closest('.itemproducto');
    console.log($('#tr' + _this.attr('id')).find('.tr-producto'));
    $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));
    $(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));
    $(_this).find('.cantidad').val('-');
    $('#tr' + _this.attr('id')).find('.td-codigo-uid').html($("option:selected", this).data("neodata"));
    $('#tr' + _this.attr('id')).find('.td-producto').html($("option:selected", this).data("descripcion"));
    $('#tr' + _this.attr('id')).find('.td-unidad-medida').html($("option:selected", this).data(
    "unidad-medida"));
});
$(document).on('click', '.delete-product', function() {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea remover este producto de la solicitud de devolución?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $(this).parents('div[id^="item-producto"]').remove();
            $('#tr' + $(this).parents('[id^="item-producto"]').attr('id')).remove();
        }
    });
});
$(document).on('click', '.delete-product2', function() {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea remover esta fila?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $(this).parents('div[id^="div-clonado"]').remove();
        }
    });
});
$('#nuevoProducto').click(function(event) {
    /* Act on the event */
    var $div = $('div[id^="item-producto"]:last');
    var $tr = $('[id^="tritem-producto"]:last');
    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'item-producto' + num);
    var $klonTr = $tr.clone().prop('id', 'tritem-producto' + num);

    $klon.css('display', 'none');

    $div.after($klon);
    $tr.after($klonTr);

    $klon.show(500);

    $klon.find('.bootstrap-select').replaceWith(function() {
        return $('select', this);
    });
    $('#item-producto' + num + ' .selectpicker').selectpicker();
    $klon.find('input,textarea').val('');
    $klonTr.find('td').html('');
    $klon.find('.delete-product').css('display', 'block');
});

$("#eco_asignado").on("change", function(){
    <?php if($this->session->userdata('tipo') == 3){ ?>
    console.log("entro");
    $("#formuploadajax").find("input[name='banderaChecklist']").val("false");
    console.log($("#formuploadajax").find("input[name='banderaChecklist']"));
    <?php }elseif($this->session->userdata('tipo') == 2){ ?>
        var imagenes = ($("option:selected", this).data("imagenes"));
        var imagenescheck = ($("option:selected", this).data("imagenescheck"));
        console.log(imagenes);
        console.log(imagenescheck);
        //$('#imagen1').attr('src', '../../'+imagenescheck.imagen1);
        //$('#imagen2').attr('src', '../../'+imagenescheck.imagen2);
        verImagen();
        verImagen2();
    <?php } ?>
});

$('.aprobar').click(function(event) {
    console.log("Envio 1");
    <?php if($this->session->userdata('tipo') != 4 || $this->session->userdata('id') == 50){ ?>
    var id_estado = "#estado"+this.id;
    var estado = $(id_estado.toString()).val();    
    if(estado == null || estado == ''){
        $(id_estado).css("border-color", "#d9534f");
                Toast.fire({
                    type: 'error',
                    title: '¡No haz seleccionado el estado!'
                });
        return 0;
    }
    <?php } ?>
    <?php if($this->session->userdata('tipo') == 4){ ?>
    if($("#selectAlmacen").val() == null || $("#selectAlmacen").val() == ''){
        $("#selectAlmacen").css("border-color", "#d9534f");
        Toast.fire({
                    type: 'error',
                    title: '¡No haz seleccionado el almacén!'
                });
        return 0;
    }
    if($("#personal_entrega").val() == null || $("#personal_entrega").val() == ''){
        $("#personal_entrega").css("border-color", "#d9534f");
        Toast.fire({
                    type: 'error',
                    title: '¡No haz seleccionado el personal de entrega!'
                });
        return 0;
    }
    <?php } ?>
    var segmento = '<?= $this->uri->segment(3); ?>';
    var contratistaPersonal = "<?= $contratistaPersonal ?>";
    var usuarioalmacen = "<?= $usuarioalmacen; ?>";
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea realizar la devolución?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        <?php if($this->session->userdata('tipo') == 3 && $solicitud->tipo_devolucion != 'Refacciones Control Vehicular') { ?>
            /*if ($("#formuploadajax").find("input[name='banderaChecklist']").val() != false) {
                Toast.fire({
                    type: 'error',
                    title: 'Crear checklist para continuar.'
                })
                return;
            }*/
        <?php } ?>
        <?php if(($this->session->userdata('tipo') == 3 && $solicitud->tipo_devolucion != 'Refacciones Control Vehicular') || $this->session->userdata('tipo') == 2) { ?>
        if ($("#personal_recibe").val() == '' || $("#personal_recibe").val() == null) {
            Toast.fire({
                type: 'error',
                title: 'Seleccione al personal que recibe.'
            })
        } 
        <?php if($detalle[0]->ctl_categorias_idctl_categorias == 16){ ?>
        else if ($("#eco_asignado").val() == '' || $("#eco_asignado").val() == null) {
            <?php if($this->session->userdata('tipo') == 3){ ?>
                Toast.fire({
                    type: 'error',
                    title: 'Seleccione el eco que se va a devolver.'
                });
            <?php }elseif($this->session->userdata('tipo') == 2){ ?>
                Toast.fire({
                    type: 'error',
                    title: 'Seleccione el equipo que se va a devolver.'
                });
            <?php } ?>
        }
        <?php } ?> 
        else {
            if (result.value) {
                //alert(this.id);
                $.ajax({
                    url: "<?= base_url() ?>almacen/devolucion-alto-costo/" + this.id,
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.status) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            );
                            if (contratistaPersonal == 1 && usuarioalmacen == 1) {
                                location.reload();
                            } else {
                                location.reload();
                            }
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
        <?php } else if($this->session->userdata('tipo') == 3 && $solicitud->tipo_devolucion == 'Refacciones Control Vehicular') { ?>
        if ($("#idtbl-users").val() == '' || $("#idtbl-users").val() == null) {
            Toast.fire({
                type: 'error',
                title: 'Seleccione al personal que recibe.'
            })
        } else {
            if (result.value) {
                //alert(this.id);
                $.ajax({
                    url: "<?= base_url() ?>almacen/devolucion-alto-costo/" + this.id,
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.status) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            );
                            if (contratistaPersonal == 1 && usuarioalmacen == 1) {
                                location.reload();
                            } else {
                                location.reload();
                            }
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
        <?php } else { ?>
        if (result.value) {
            //alert(this.id);
            $.ajax({
                url: "<?= base_url() ?>almacen/devolucion-alto-costo/" + this.id,
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        );
                        if (contratistaPersonal == 1 && usuarioalmacen == 1) {
                            location.reload();
                        } else {
                            location.reload();
                        }
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        })
                    }
                }
            });
        }
        <?php } ?>
    })
});

var numero = 0;

function clonar(id) {
    console.log(id);
    numero = numero + 1;
    clon = $("#clon" + id).clone().prop('id', 'div-clonado' + numero);
    //var $klon = $div.clone().prop('id', 'item-producto' + num);
    $("#datos-clonados" + id).append(clon);
    clon.find('.delete-product2').css('display', 'block');
}

$('#devolucion').click(function(event) {        
    <?php if($this->session->userdata('tipo') == 4){ ?>
    if($("#selectAlmacen").val() == null || $("#selectAlmacen").val() == ''){
        $("#selectAlmacen").css("border-color", "#d9534f");
        Toast.fire({
                    type: 'error',
                    title: '¡No haz seleccionado el almacén!'
                });
        return 0;
    }
    if($("#personal_entrega").val() == null || $("#personal_entrega").val() == ''){
        $("#personal_entrega").css("border-color", "#d9534f");
        Toast.fire({
                    type: 'error',
                    title: '¡No haz seleccionado el personal de entrega!'
                });
        return 0;
    }
    <?php } ?>
    var segmento = '<?= $this->uri->segment(3); ?>';
    var contratistaPersonal = "<?= $contratistaPersonal ?>";
    var usuarioalmacen = "<?= $usuarioalmacen; ?>";
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea realizar la devolución?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {        
        if (result.value) {
            //alert(this.id);
            $.ajax({
                url: "<?= base_url() ?>almacen/completar-devolucion/",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        );
                        if (contratistaPersonal == 1 && usuarioalmacen == 1) {
                            location.reload();
                        } else {
                            location.reload();
                        }
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        })
                    }
                }
            });
        }
        
    })
});
$('#realizarDevolucion').click(function(event) {
    window.open('<?= base_url() ?>almacen/detalle-devolucion-material/<?= $solicitud->uid ?>', 'Materiales',
        'width=800, height=600');
});
$('#cancelar').click(function(event) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea cancelar la solicitud de devolución?",
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
$('#btnCancel').click(function(event) {
    var formData = new FormData(document.getElementById("formuploadajax_cancel"));
    $.ajax({
        url: "<?= base_url() ?>almacen/cancelar-solicitud-devolucion",
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
                );
                location.href = "<?= base_url() ?>almacen/devoluciones";
            } else {
                Toast.fire({
                    type: 'error',
                    title: resp.mensaje
                });
            }
        }
    });
});
$('#guardar').on("submit", function(event) {
    // $('#guardar').click(function (event) {
    console.log("Envio");
    if (event.isDefaultPrevented()) {
        console.log('Error')
    } else {
        event.preventDefault();
        var formData = new FormData(document.getElementById("formuploadajax"));
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea guardar la solicitud de devolución?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url() ?>almacen/guardar-devolucion",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        console.log(resp.mensaje);
                        if (resp.status) {
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
    }
});

function imprimirElemento(elemento) {
    var printContents = document.getElementById(elemento).innerHTML;
    var ventana = window.open('', 'PRINT', '');
    ventana.document.write('<html><head><title>Devolucion a Almacen</title>');
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
<script>
<?php if($solicitud->tipo_devolucion == "Autos Control Vehicular" || $solicitud->tipo_devolucion == "Sistemas") { ?>

function verImagen() {
    <?php $imagenes = json_decode($detalle_auto[0]->imagenes); ?>
    var canvas = document.getElementById("draw-canvas");
    var ctx = canvas.getContext("2d");
    var img = new Image();
    <?php if($this->session->userdata('tipo') == 2){ ?>
        img.src = "<?= base_url() ?>uploads/sistemas/equipos/" + '<?= $imagenes->imagen1 ?>';
        <?php }else{ ?>
    img.src = "<?= base_url() ?>uploads/autos/" + '<?= $imagenes->imagen1 ?>';
    <?php } ?>
    ctx.drawImage(img, 0, 0);
    img.onload = function() {
        ctx.drawImage(img, 0, 0);
    }
}

function verImagen2() {
    <?php $imagenes = json_decode($detalle_auto[0]->imagenes); ?>
    var canvas = document.getElementById("draw-canvas2");
    var ctx = canvas.getContext("2d");
    var img = new Image();
    <?php if($this->session->userdata('tipo') == 2){ ?>
        img.src = "<?= base_url() ?>uploads/sistemas/equipos/" + '<?= $imagenes->imagen2 ?>';
    <?php }else{ ?>
    img.src = "<?= base_url() ?>uploads/autos/" + '<?= $imagenes->imagen2 ?>';
    <?php } ?>
    ctx.drawImage(img, 0, 0);
    img.onload = function() {
        ctx.drawImage(img, 0, 0);
    }
}

<?php if($this->session->userdata('tipo') == 3){ ?>
function verImagen3() {
    <?php $imagenes = json_decode($detalle_auto[0]->imagenes); ?>
    var canvas = document.getElementById("draw-canvas3");
    var ctx = canvas.getContext("2d");
    var img = new Image();
    img.src = "<?= base_url() ?>uploads/autos/" + '<?= $imagenes->imagen3 ?>';
    ctx.drawImage(img, 0, 0);
    img.onload = function() {
        ctx.drawImage(img, 0, 0);
    }
}
<?php } ?>
<?php } ?>

function getLastChecklist(id) {
    //alert(id);
    $.ajax({
        url: "<?= base_url()?>ControlVehicular/mostrarUltimoChecklist/" + id,
        type: "post",
        success: function(res) {
            var registros = eval(res);
            if (registros.length == 0) {
                $("#tab-last-checklist").css('display', 'none');
                //alert("no existe checklist");
                if ($("#img_comp1")) {
                    $("#img_comp1").remove();
                }
                if ($("#img_comp2")) {
                    $("#img_comp2").remove();
                }
                if ($("#img_comp3")) {
                    $("#img_comp3").remove();
                }

                if ($("#a1")) {
                    $("#a1").remove();
                }
                if ($("#a2")) {
                    $("#a2").remove();
                }
                if ($("#a3")) {
                    $("#a3").remove();
                }
                if ($("#f1")) {
                    $("#f1").remove();
                }
                if ($("#f2")) {
                    $("#f2").remove();
                }
            } else {
                if ($("#img_comp1")) {
                    $("#img_comp1").remove();
                }
                if ($("#img_comp2")) {
                    $("#img_comp2").remove();
                }
                if ($("#img_comp3")) {
                    $("#img_comp3").remove();
                }

                if ($("#a1")) {
                    $("#a1").remove();
                }
                if ($("#a2")) {
                    $("#a2").remove();
                }
                if ($("#a3")) {
                    $("#a3").remove();
                }
                if ($("#f1")) {
                    $("#f1").remove();
                }
                if ($("#f2")) {
                    $("#f2").remove();
                }

                $("#tab-last-checklist").css('display', 'block');
                $("#pills-last-checklist").find("input[type='radio']").attr('checked', false);
                //alert('si existe Checklist');
                var checklist = JSON.parse(registros[0]['checklist']);
                var imagenes_checklist = JSON.parse(registros[0]['imagenes_checklist']);
                
                //alert(checklist['e1']);
                $(".kilometraje").val(registros[0]['kilometraje']); 
                $(".uid_asignacion").val(registros[0]['uid_asignacion']);               
                ///////////////////////////////////////////////////
                $("input[name='tt1']").val(checklist['t1']);
                if (checklist['r1'] == 'si') {
                    $("input[name='rr1']").attr('checked', 'true');
                } else {
                    $("input[name='rrr1']").attr('checked', 'true');
                }
                $("input[name='ee1']").val(checklist['e1']);


                $("input[name='tt2']").val(checklist['t2']);
                if (checklist['r2'] == 'si') {
                    $("input[name='rr2']").attr('checked', 'true');
                } else {
                    $("input[name='rrr2']").attr('checked', 'true');
                }
                $("input[name='ee2']").val(checklist['e2']);


                $("input[name='tt3']").val(checklist['t3']);
                if (checklist['r3'] == 'si') {
                    $("input[name='rr3']").attr('checked', 'true');
                } else {
                    $("input[name='rrr3']").attr('checked', 'true');
                }
                $("input[name='ee3']").val(checklist['e3']);

                $("input[name='tt4']").val(checklist['t4']);
                if (checklist['r4'] == 'si') {
                    $("input[name='rr4']").attr('checked', 'true');
                } else {
                    $("input[name='rrr4']").attr('checked', 'true');
                }
                $("input[name='ee4']").val(checklist['e4']);

                $("input[name='tt5']").val(checklist['t5']);
                if (checklist['r5'] == 'si') {
                    $("input[name='rr5']").attr('checked', 'true');
                } else {
                    $("input[name='rrr5']").attr('checked', 'true');
                }
                $("input[name='ee5']").val(checklist['e5']);

                $("input[name='tt6']").val(checklist['t6']);
                if (checklist['r6'] == 'si') {
                    $("input[name='rr6']").attr('checked', 'true');
                } else {
                    $("input[name='rrr6']").attr('checked', 'true');
                }
                $("input[name='ee6']").val(checklist['e6']);

                $("input[name='tt7']").val(checklist['t7']);
                if (checklist['r7'] == 'si') {
                    $("input[name='rr7']").attr('checked', 'true');
                } else {
                    $("input[name='rrr7']").attr('checked', 'true');
                }
                $("input[name='ee7']").val(checklist['e7']);

                $("input[name='tt8']").val(checklist['t8']);
                if (checklist['r8'] == 'si') {
                    $("input[name='rr8']").attr('checked', 'true');
                } else {
                    $("input[name='rrr8']").attr('checked', 'true');
                }
                $("input[name='ee8']").val(checklist['e8']);

                $("input[name='tt9']").val(checklist['t9']);
                if (checklist['r9'] == 'si') {
                    $("input[name='rr9']").attr('checked', 'true');
                } else {
                    $("input[name='rrr9']").attr('checked', 'true');
                }
                $("input[name='ee9']").val(checklist['e9']);

                $("input[name='tt10']").val(checklist['t10']);
                if (checklist['r10'] == 'si') {
                    $("input[name='rr10']").attr('checked', 'true');
                } else {
                    $("input[name='rrr10']").attr('checked', 'true');
                }
                $("input[name='ee10']").val(checklist['e10']);

                $("input[name='tt11']").val(checklist['t11']);
                if (checklist['r11'] == 'si') {
                    $("input[name='rr11']").attr('checked', 'true');
                } else {
                    $("input[name='rrr11']").attr('checked', 'true');
                }
                $("input[name='ee11']").val(checklist['e11']);

                $("input[name='tt12']").val(checklist['t12']);
                if (checklist['r12'] == 'si') {
                    $("input[name='rr12']").attr('checked', 'true');
                } else {
                    $("input[name='rrr12']").attr('checked', 'true');
                }
                $("input[name='ee12']").val(checklist['e12']);

                $("input[name='tt13']").val(checklist['t13']);
                if (checklist['r13'] == 'si') {
                    $("input[name='rr13']").attr('checked', 'true');
                } else {
                    $("input[name='rrr13']").attr('checked', 'true');
                }
                $("input[name='ee13']").val(checklist['e13']);

                $("input[name='tt14']").val(checklist['t14']);
                if (checklist['r14'] == 'si') {
                    $("input[name='rr14']").attr('checked', 'true');
                } else {
                    $("input[name='rrr14']").attr('checked', 'true');
                }
                $("input[name='ee14']").val(checklist['e14']);

                $("input[name='tt15']").val(checklist['t15']);
                if (checklist['r15'] == 'si') {
                    $("input[name='rr15']").attr('checked', 'true');
                } else {
                    $("input[name='rrr15']").attr('checked', 'true');
                }
                $("input[name='ee15']").val(checklist['e15']);

                $("input[name='tt16']").val(checklist['t16']);
                if (checklist['r16'] == 'si') {
                    $("input[name='rr16']").attr('checked', 'true');
                } else {
                    $("input[name='rrr16']").attr('checked', 'true');
                }
                $("input[name='ee16']").val(checklist['e16']);

                $("input[name='tt17']").val(checklist['t17']);
                if (checklist['r17'] == 'si') {
                    $("input[name='rr17']").attr('checked', 'true');
                } else {
                    $("input[name='rrr17']").attr('checked', 'true');
                }
                $("input[name='ee17']").val(checklist['e17']);

                $("input[name='tt18']").val(checklist['t18']);
                if (checklist['r18'] == 'si') {
                    $("input[name='rr18']").attr('checked', 'true');
                } else {
                    $("input[name='rrr18']").attr('checked', 'true');
                }
                $("input[name='ee18']").val(checklist['e18']);

                $("input[name='tt19']").val(checklist['t19']);
                if (checklist['r19'] == 'si') {
                    $("input[name='rr19']").attr('checked', 'true');
                } else {
                    $("input[name='rrr19']").attr('checked', 'true');
                }
                $("input[name='ee19']").val(checklist['e19']);

                $("input[name='tt20']").val(checklist['t20']);
                if (checklist['r20'] == 'si') {
                    $("input[name='rr20']").attr('checked', 'true');
                } else {
                    $("input[name='rrr20']").attr('checked', 'true');
                }
                $("input[name='ee20']").val(checklist['e20']);

                $("input[name='tt21']").val(checklist['t21']);
                if (checklist['r21'] == 'si') {
                    $("input[name='rr21']").attr('checked', 'true');
                } else {
                    $("input[name='rrr21']").attr('checked', 'true');
                }
                $("input[name='ee21']").val(checklist['e21']);

                $("input[name='tt22']").val(checklist['t22']);
                if (checklist['r22'] == 'si') {
                    $("input[name='rr22']").attr('checked', 'true');
                } else {
                    $("input[name='rrr22']").attr('checked', 'true');
                }
                $("input[name='ee22']").val(checklist['e22']);

                $("input[name='tt23']").val(checklist['t23']);
                if (checklist['r23'] == 'si') {
                    $("input[name='rr23']").attr('checked', 'true');
                } else {
                    $("input[name='rrr23']").attr('checked', 'true');
                }
                $("input[name='ee23']").val(checklist['e23']);

                $("input[name='tt24']").val(checklist['t24']);
                if (checklist['r24'] == 'si') {
                    $("input[name='rr24']").attr('checked', 'true');
                } else {
                    $("input[name='rrr24']").attr('checked', 'true');
                }
                $("input[name='ee24']").val(checklist['e24']);

                $("input[name='tt25']").val(checklist['t25']);
                if (checklist['r25'] == 'si') {
                    $("input[name='rr25']").attr('checked', 'true');
                } else {
                    $("input[name='rrr25']").attr('checked', 'true');
                }
                $("input[name='ee25']").val(checklist['e25']);

                $("input[name='tt26']").val(checklist['t26']);
                if (checklist['r26'] == 'si') {
                    $("input[name='rr26']").attr('checked', 'true');
                } else {
                    $("input[name='rrr26']").attr('checked', 'true');
                }
                $("input[name='ee26']").val(checklist['e26']);

                $("input[name='tt27']").val(checklist['t27']);
                if (checklist['r27'] == 'si') {
                    $("input[name='rr27']").attr('checked', 'true');
                } else {
                    $("input[name='rrr27']").attr('checked', 'true');
                }
                $("input[name='ee27']").val(checklist['e27']);

                $("input[name='tt28']").val(checklist['t28']);
                if (checklist['r28'] == 'si') {
                    $("input[name='rr28']").attr('checked', 'true');
                } else {
                    $("input[name='rrr28']").attr('checked', 'true');
                }
                $("input[name='ee28']").val(checklist['e28']);

                $("input[name='tt29']").val(checklist['t29']);
                if (checklist['r29'] == 'si') {
                    $("input[name='rr29']").attr('checked', 'true');
                } else {
                    $("input[name='rrr29']").attr('checked', 'true');
                }
                $("input[name='ee29']").val(checklist['e29']);

                $("input[name='tt30']").val(checklist['t30']);
                if (checklist['r30'] == 'si') {
                    $("input[name='rr30']").attr('checked', 'true');
                } else {
                    $("input[name='rrr30']").attr('checked', 'true');
                }
                $("input[name='ee30']").val(checklist['e30']);
                ////////////////////////////////////////////////////
                $(".observaciones").val(registros[0]['observaciones']);
                if (registros[0]['condicion_unidad'] == 'limpio') {
                    $(".limpio").attr('checked', 'true');
                } else {
                    $(".sucio").attr('checked', 'true');
                }
                auto1 = "<img id='a1' src='<?= base_url(); ?>" + imagenes_checklist['imagen1'] + "'>";
                auto2 = "<img id='a2' src='<?= base_url(); ?>" + imagenes_checklist['imagen2'] + "'>";
                auto3 = "<img id='a3' src='<?= base_url(); ?>" + imagenes_checklist['imagen3'] + "'>";
                firma1 = "<img id='f1' src='<?= base_url(); ?>" + imagenes_checklist['imagen4'] + "'>";
                firma2 = "<img id='f2' src='<?= base_url(); ?>" + imagenes_checklist['imagen5'] + "'>";

                auto_comparacion1 = "<img id='img_comp1' src='<?= base_url(); ?>" + imagenes_checklist[
                    'imagen1'] + "'>";
                auto_comparacion2 = "<img id='img_comp2' src='<?= base_url(); ?>" + imagenes_checklist[
                    'imagen2'] + "'>";
                auto_comparacion3 = "<img id='img_comp3' src='<?= base_url(); ?>" + imagenes_checklist[
                    'imagen3'] + "'>";

                $("#auto_comparacion1").html(auto_comparacion1);
                $("#auto_comparacion2").html(auto_comparacion2);
                $("#auto_comparacion3").html(auto_comparacion3);

                $("#imagen1").html(auto1);
                $("#imagen2").html(auto2);
                $("#imagen3").html(auto3);
                $("#imagen4").html(firma1);
                $("#imagen5").html(firma2);

                $("#usuario").html(registros[0]['usuario']);
                $("#user").html(registros[0]['user']);

                $(".fecha").html(registros[0]['fecha']);                
                $(".uid_asignacion").html(registros[0]['uid_asignacion']);                
            }
        }
    });
}

$('#generar-checklist').click(function(event) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea generar el checklist con la información actual?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar'
    }).
    then((result) => {
        if ($("#idtbl-users").val() == '' || $("#idtbl-users").val() == null) {
            Toast.fire({
                type: 'error',
                title: 'Seleccione al personal que recibe.'
            })
        } else if ($("#iddtl-almacen").val() == '' || $("#iddtl-almacen").val() == null) {
            Toast.fire({
                type: 'error',
                title: 'Seleccione el eco que se va a devolver.'
            })
        } else {
            if (result.value) {
                $('.bd-example-modal-lg2').modal('show');
                verImagen();
                verImagen2();
                verImagen3();
                var id_last_checklist = $("#iddtl-almacen").val();
                //getLastChecklist(<?= $detalle_auto[0]->iddtl_almacen ?>);
                getLastChecklist(id_last_checklist);
            }
        }
    })
});
$(document).on('change', '.producto', function(event) {
    event.preventDefault();
    //var _this = $(this).closest('.itemproducto');
    var nombre = ($("option:selected", this).data("nombre"));
    var idtblusers = ($("option:selected", this).data("idtblusers"));
    $("#recibido-por").html(nombre);
    $("#idtbl-users").val(idtblusers);
});
$(document).on('change', '.eco', function(event) {
    event.preventDefault();
    $(".auto").html("");
    $(".marca").html("");
    $(".modelo").html("");
    $(".numeroserie").html("");
    $(".nomotor").html("");
    $(".placas").html("");
    $(".poliza").html("");
    $(".vencimiento").html("");
    $(".seguro").html(""); 
    $(".uid_asignacion").html("");    
    $(".uid").html("");
    $(".estadovehiculo").html("");
    //var _this = $(this).closest('.itemproducto');
    var iddtlalmacen = ($("option:selected", this).data("iddtlalmacen"));
    var idtblcatalogo = ($("option:selected", this).data("idtblcatalogo"));


    var numerointerno = ($("option:selected", this).data("numerointerno"));
    var marca = ($("option:selected", this).data("marca"));
    var modelo = ($("option:selected", this).data("modelo"));
    var numeroserie = ($("option:selected", this).data("numeroserie"));
    var nomotor = ($("option:selected", this).data("nomotor"));
    var placas = ($("option:selected", this).data("placas"));
    var poliza = ($("option:selected", this).data("poliza"));
    var vencimiento = ($("option:selected", this).data("vencimiento"));
    var seguro = ($("option:selected", this).data("seguro"));
    var uid_asignacion = ($("option:selected", this).data("uid_asignacion"));    
    //var uid = ($("option:selected", this).data("uid"));
    var estadovehiculo = ($("option:selected", this).data("estadovehiculo"));

    $("#iddtl-almacen").val(iddtlalmacen);
    $("#idtblcatalogo").val(idtblcatalogo);


    $(".auto").append(numerointerno);
    $(".marca").append(marca);
    $(".modelo").append(modelo);
    $(".numeroserie").append(numeroserie);
    $(".nomotor").append(nomotor);
    $(".placas").append(placas);
    $(".poliza").append(poliza);
    $(".vencimiento").append(vencimiento);
    $(".seguro").append(seguro);
    $(".uid_asignacion").append(uid_asignacion);
    //$(".uid").append(uid);
    if (estadovehiculo == 'nuevo') {
        var input = "Nuevo <input type='radio' checked disabled> Usado <input type='radio' disabled>";
        $(".estadovehiculo").append(input);
    } else if (estadovehiculo == 'usado') {
        var input = "Nuevo <input type='radio' disabled> Usado <input type='radio' checked disabled>";
        $(".estadovehiculo").append(input);
    } else {
        var input = "Nuevo <input type='radio' disabled> Usado <input type='radio' disabled>";
        $(".estadovehiculo").append(input);
    }
});
</script>
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ASIGNACIÓN DE UNIDAD control-vehicular</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-checklist-tab" data-toggle="pill" href="#pills-checklist"
                            role="tab" aria-controls="pills-checklist" aria-selected="true">Checklist</a>
                    </li>
                    <li class="nav-item" id="tab-last-checklist">
                        <a class="nav-link" id="pills-last-checklist-tab" data-toggle="pill"
                            href="#pills-last-checklist" role="tab" aria-controls="pills-last-checklist"
                            aria-selected="false">Último Checklist</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-checklist" role="tabpanel"
                        aria-labelledby="pills-checklist-tab">

                        <?= validation_errors('<span class="error">', '</span>'); ?>
                        <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist"'); ?>
                        <div class="container-fluid">
                            <!--<h6 style="font-weight: normal;">Se devolvió el auto con las siguientes características</h6>-->
                            <h6 style="font-weight: normal" align="right">Eco: <strong class="auto"></strong></h6>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                    <table>
                                        <tr>
                                            <td>Marca y Tipo: <strong class="marca"></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Modelo: <strong class="modelo"></strong></td>
                                        </tr>
                                        <tr>
                                            <td>No. de Serie: <strong class="numeroserie"></strong></td>
                                        </tr>
                                        <tr>
                                            <td>No. de Motor: <strong class="nomotor"></strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-5">
                                    <table>
                                        <tr>
                                            <td>Placas: <strong class="placas"></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Póliza: <strong class="poliza"></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Vencimiento: <strong class="vencimiento"></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Seguro: <strong class="seguro"></strong></td>
                                        </tr>
                                        <tr>
                                            <!--td>Prueba: <strong class="uid_asignacion"></strong></td-->
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-6 text-center">
                                    <h6 class="estadovehiculo"> </h6>
                                </div>
                                <label for="inputPassword" class="col-sm-3 col-form-label">Kilometraje Actual: </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="kilometraje" required
                                        placeholder="Kilometraje Actual">
                                </div>
                                
                                    <div class="col-sm-3">
                                        <input type="hidden" class="form-control uid_asignacion" name="uid_asignacion"
                                            required placeholder="Asignacion">
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div style="text-align: center;">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-striped">
                                                <tr>
                                                    <th></th>
                                                    <th>SI</th>
                                                    <th>NO</th>
                                                    <th>ESTADO</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t1" value="Alarma"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r1"></td>
                                                    <td><input value="no" required type="radio" name="r1"></td>
                                                    <td><input class="form-control" type="text" name="e1"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t2" value="1 o 2 controles (alarma)"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r2"></td>
                                                    <td><input value="no" required type="radio" name="r2"></td>
                                                    <td><input class="form-control" type="text" name="e2"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t3" value="Ceniceros"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r3"></td>
                                                    <td><input value="no" required type="radio" name="r3"></td>
                                                    <td><input class="form-control" type="text" name="e3"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t4" value="Encendedor"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r4"></td>
                                                    <td><input value="no" required type="radio" name="r4"></td>
                                                    <td><input class="form-control" type="text" name="e4"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t5" value="Antena"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r5"></td>
                                                    <td><input value="no" required type="radio" name="r5"></td>
                                                    <td><input class="form-control" type="text" name="e5"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t6" value="Limpiadores"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r6"></td>
                                                    <td><input value="no" required type="radio" name="r6"></td>
                                                    <td><input class="form-control" type="text" name="e6"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t7" value="Juego de Llaves"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r7"></td>
                                                    <td><input value="no" required type="radio" name="r7"></td>
                                                    <td><input class="form-control" type="text" name="e7"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t8" value="Aire Acondicionado"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r8"></td>
                                                    <td><input value="no" required type="radio" name="r8"></td>
                                                    <td><input class="form-control" type="text" name="e8"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t9" value="Autoestereo"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r9"></td>
                                                    <td><input value="no" required type="radio" name="r9"></td>
                                                    <td><input class="form-control" type="text" name="e9"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t10" value="1,2,4 bocinas del radio"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r10"></td>
                                                    <td><input value="no" required type="radio" name="r10"></td>
                                                    <td><input class="form-control" type="text" name="e10"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div style="text-align: center;">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-striped">
                                                <tr>
                                                    <th></th>
                                                    <th>SI</th>
                                                    <th>NO</th>
                                                    <th>ESTADO</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t11" value="Gato" class="form-control">
                                                    </td>
                                                    <td><input value="si" required type="radio" name="r11"></td>
                                                    <td><input value="no" required type="radio" name="r11"></td>
                                                    <td><input class="form-control" type="text" name="e11"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t12" value="Llave de tuercas"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r12"></td>
                                                    <td><input value="no" required type="radio" name="r12"></td>
                                                    <td><input class="form-control" type="text" name="e12"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t13" value="Llanta de refacción"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r13"></td>
                                                    <td><input value="no" required type="radio" name="r13"></td>
                                                    <td><input class="form-control" type="text" name="e13"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t14" value="Herramienta"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r14"></td>
                                                    <td><input value="no" required type="radio" name="r14"></td>
                                                    <td><input class="form-control" type="text" name="e14"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t15" value="Extintor"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r15"></td>
                                                    <td><input value="no" required type="radio" name="r15"></td>
                                                    <td><input class="form-control" type="text" name="e15"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t16" value="Bastón de seguridad"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r16"></td>
                                                    <td><input value="no" required type="radio" name="r16"></td>
                                                    <td><input class="form-control" type="text" name="e16"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t17" value="Seguros de ruedas"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r17"></td>
                                                    <td><input value="no" required type="radio" name="r17"></td>
                                                    <td><input class="form-control" type="text" name="e17"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t18" value="4 Tapones de ruedas"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r18"></td>
                                                    <td><input value="no" required type="radio" name="r18"></td>
                                                    <td><input class="form-control" type="text" name="e18"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t19" value="Fantasmas"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r19"></td>
                                                    <td><input value="no" required type="radio" name="r19"></td>
                                                    <td><input class="form-control" type="text" name="e19"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t20" value="Retrovisor"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r20"></td>
                                                    <td><input value="no" required type="radio" name="r20"></td>
                                                    <td><input class="form-control" type="text" name="e20"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div style="text-align: center;">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-striped">
                                                <tr>
                                                    <th></th>
                                                    <th>SI</th>
                                                    <th>NO</th>
                                                    <th>ESTADO</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t21" value="Parabrisas"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r21"></td>
                                                    <td><input value="no" required type="radio" name="r21"></td>
                                                    <td><input class="form-control" type="text" name="e21"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t22" value="Medallón"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r22"></td>
                                                    <td><input value="no" required type="radio" name="r22"></td>
                                                    <td><input class="form-control" type="text" name="e22"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t23" value="Ventanas"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r23"></td>
                                                    <td><input value="no" required type="radio" name="r23"></td>
                                                    <td><input class="form-control" type="text" name="e23"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t24" value="Defensas"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r24"></td>
                                                    <td><input value="no" required type="radio" name="r24"></td>
                                                    <td><input class="form-control" type="text" name="e24"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t25" value="Calaveras y faros"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r25"></td>
                                                    <td><input value="no" required type="radio" name="r25"></td>
                                                    <td><input class="form-control" type="text" name="e25"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t26" value="Póliza de garantía"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r26"></td>
                                                    <td><input value="no" required type="radio" name="r26"></td>
                                                    <td><input class="form-control" type="text" name="e26"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t27" value="M. Mantenimiento"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r27"></td>
                                                    <td><input value="no" required type="radio" name="r27"></td>
                                                    <td><input class="form-control" type="text" name="e27"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t28" value="Asientos"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r28"></td>
                                                    <td><input value="no" required type="radio" name="r28"></td>
                                                    <td><input class="form-control" type="text" name="e28"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t29" value="4 o 2 tapetes"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r29"></td>
                                                    <td><input value="no" required type="radio" name="r29"></td>
                                                    <td><input class="form-control" type="text" name="e29"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="t30" value="1 o 2 espejos laterales"
                                                            class="form-control"></td>
                                                    <td><input value="si" required type="radio" name="r30"></td>
                                                    <td><input value="no" required type="radio" name="r30"></td>
                                                    <td><input class="form-control" type="text" name="e30"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h6 style="text-align: center;">ESTADO GENERAL DE LA LLL</h6>

                            <center>
                                <div id="auto_comparacion1">

                                </div>
                                <canvas width="280" height="220" id="draw-canvas">
                                    No tienes un buen navegador.
                                </canvas>
                                <br>
                                <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn"><i
                                        class="fa fa-ban"></i> Crear Imagen</button>
                                <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn"><i
                                        class="fa fa-trash"></i> Borrar</button>
                                <div>
                                    <br>
                                    <label>Color</label>
                                    <input type="color" id="color">
                                    <label>Tamaño Puntero</label>
                                    <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                                </div>
                                <textarea style="display: none;" id="draw-dataUrl" name="imagen" class="form-control"
                                    rows="5"></textarea>
                                <img style="display: none" id="draw-image" src="" alt="Tu Imagen aparecera Aqui!" />
                            </center>

                            <center>
                                <div id="auto_comparacion2">

                                </div>
                                <canvas id="draw-canvas2" width="280" height="220">
                                    No tienes un buen navegador.
                                </canvas>
                                <br>
                                <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn2"><i
                                        class="fa fa-ban"></i> Crear Imagen</button>
                                <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn2"><i
                                        class="fa fa-trash"></i> Borrar</button>
                                <div>
                                    <label>Color</label>
                                    <input type="color" id="color2">
                                    <label>Tamaño Puntero</label>
                                    <input type="range" id="puntero2" min="1" default="1" max="5" width="10%">
                                </div>
                                <textarea style="display: none;" id="draw-dataUrl2" name="imagen2" class="form-control"
                                    rows="5"></textarea>
                                <img style="display: none" id="draw-image2" src="" alt="Tu Imagen aparecera Aqui!" />
                            </center>

                            <center>
                                <div id="auto_comparacion3">

                                </div>
                                <canvas id="draw-canvas3" width="280" height="220">
                                    No tienes un buen navegador.
                                </canvas>
                                <br>
                                <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn3"><i
                                        class="fa fa-ban"></i> Crear Imagen</button>
                                <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn3"><i
                                        class="fa fa-trash"></i> Borrar</button>
                                <div>
                                    <label>Color</label>
                                    <input type="color" id="color3">
                                    <label>Tamaño Puntero</label>
                                    <input type="range" id="puntero3" min="1" default="1" max="5" width="10%">
                                </div>
                                <textarea style="display: none;" id="draw-dataUrl3" name="imagen3" class="form-control"
                                    rows="5"></textarea>
                                <img style="display: none" id="draw-image3" src="" alt="Tu Imagen aparecera Aqui!" />
                            </center>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Observaciones</label>
                                    <textarea class="form-control" name="observaciones"
                                        placeholder="Observaciones"></textarea>
                                </div>
                            </div>
                            <br>
                            <div>
                                <h6>NOTA: EL VEHICULO SE ENTREGA&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"
                                        value="limpio" name="condicion_unidad" required> &nbsp;<span class="label-check"
                                        style="font-size: 13px;">LIMPIO</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" value="sucio" name="condicion_unidad" required> &nbsp;<span
                                        class="label-check"
                                        style="font-size: 13px;">SUCIO</span>&nbsp;&nbsp;&nbsp;&nbsp;EN CASO DE ENTREGAR
                                    SUCIA UNIDAD TENDRÁ UN COSTO DE $150.00
                                </h6>
                            </div>
                            <br>
                            <!--<h6 style="font-weight: normal;">Yo <?php echo $solicitud->entrega; ?> me comprometo a:</h6>
                            <p>
                            1) Cuidar y conservar la Unidad en las mejores condiciones de operación y apariencia, para lo cual cumpliré con los servicios especificados en el manual del propietario y en la   póliza de garantía teniendo presente la imagen de la unidad y de ESTEVEZJOR SERVICIOS S.A. DE C.V
                            </p>
                            <p>
                            2) Usar el cinturón de seguridad en todo momento, así como también los ocupantes que viajen en la unidad
                            </p>
                            <p>
                            3) Pagar los montos de los deducibles del seguro del vehículo en caso de siniestro cuando el incidente sea debido a mi descuido via nomina
                            </p>
                            <p>
                            4) Pagar los daños que sufra el vehículo y que no están considerados en la cobertura del seguro tales como robos parciales, actos vandálicos y aquellos que impliquen compostura al vehiculo a fin de cumplir con el punto No. 1 de esta carta
                            </p>
                            <p>
                            5) Pagar las multas que se originen por incumplimiento de reglamento de transito, ecología o cualquier otro de carácter municipal, estatal o federal por incumpliento a las leyes de transito vigente 
                            </p>
                            <p>
                            6) Notificar al departamento de Crontol de Vehículos por escrito si hubiere algún cambio que me desligue de toda responsabilidad del vehículo en mi custodia. Sino lo hiciera así me comprometo a pagar o responder jurídicamente cualquier hecho que se presente con la unidad a mi cargo
                            </p>
                            <p>
                            7) Cualquier situación no contemplada en el presente formato, será comentada y autorizada por el Gerente del Area o Dirección General
                            </p>
                            <p>
                            8) Cumplir con las políticas revision y mantenimiento establecidas por ESTEVEZJOR SERVICIOS S.A C.V
                            </p>
                            <br>-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-sm" width="100%">
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <canvas id="draw-canvas4" width="240"
                                                            style="border-bottom-style: solid;">
                                                            No tienes un buen navegador.
                                                        </canvas>
                                                        <br>
                                                        <button style="width: 100px;height: 19px;font-size: 8px;"
                                                            type="button" class="btn btn-warning btn-sm"
                                                            id="draw-submitBtn4"><i style="font-size: 8px;"
                                                                class="fa fa-ban"></i> Crear Firma</button>
                                                        <button style="width: 100px;height: 19px;font-size: 8px;"
                                                            type="button" class="btn btn-danger btn-sm"
                                                            id="draw-clearBtn4"><i style="font-size: 8px;"
                                                                class="fa fa-trash"></i> Borrar Firma</button>
                                                        <div style="display: none">
                                                            <label>Color</label>
                                                            <input type="color" id="color4">
                                                            <label>Tamaño Puntero</label>
                                                            <input type="range" id="puntero4" min="1" default="1"
                                                                max="5" width="10%">
                                                        </div>
                                                        <textarea style="display: none;" id="draw-dataUrl4"
                                                            name="imagen4" class="form-control" rows="5"></textarea>
                                                        <img style="display: none" id="draw-image4" src=""
                                                            alt="Tu Imagen aparecera Aqui!" />
                                                    </center>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">ME COMPROMETO Y ACEPTO LO ANTERIOR</td>
                                                <td class="text-center"><?php echo $solicitud->entrega ?></td>
                                                <td class="text-center"><?= date('Y-m-d') ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)
                                                </td>
                                                <td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <canvas id="draw-canvas5" width="240"
                                                            style="border-bottom-style: solid;">
                                                            No tienes un buen navegador.
                                                        </canvas>
                                                        <br>
                                                        <button style="width: 100px;height: 19px;font-size: 8px;"
                                                            type="button" class="btn btn-warning btn-sm"
                                                            id="draw-submitBtn5"><i style="font-size: 8px;"
                                                                class="fa fa-ban"></i> Crear Firma</button>
                                                        <button style="width: 100px;height: 19px;font-size: 8px;"
                                                            type="button" class="btn btn-danger btn-sm"
                                                            id="draw-clearBtn5"><i style="font-size: 8px;"
                                                                class="fa fa-trash"></i> Borrar Firma</button>
                                                        <div style="display: none">
                                                            <label>Color</label>
                                                            <input type="color" id="color5">
                                                            <label>Tamaño Puntero</label>
                                                            <input type="range" id="puntero5" min="1" default="1"
                                                                max="5" width="10%">
                                                        </div>
                                                        <textarea style="display: none;" id="draw-dataUrl5"
                                                            name="imagen5" class="form-control" rows="5"></textarea>
                                                        <img style="display: none" id="draw-image5" src=""
                                                            alt="Tu Imagen aparecera Aqui!" />
                                                    </center>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">VEHICULO ENTREGADO POR</td>
                                                <td class="text-center" id="recibido-por"></td>
                                                <td class="text-center"><?= date('Y-m-d') ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)
                                                </td>
                                                <td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <input type="hidden" name="idtbl_users" id="idtbl-users">
                                <input type="hidden" name="iddtl_almacen" id="iddtl-almacen">
                                <input type="hidden" name="uid_devolucion" value="<?php echo $uid_devolucion ?>">                                
                                <input type="hidden" name="uid_usuario" value="<?php echo $solicitud->uid_usuario ?>"> 
                                
                                <!--?php foreach ($ecos_asignados as $key => $value) : ?>
                                <input type="text" name="uid_desasignacion" value="<?php echo $value->uid_desasignacion ?>">
                                <input type="text" name="uid_usuario" value="<?php echo $value->numero_interno ?>"--> 
                                <!--?php endforeach; ?-->
                                <input type="hidden" name="idtbl_catalogo" id="idtblcatalogo">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                            <?=form_close()?>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-last-checklist" role="tabpanel"
                        aria-labelledby="pills-last-checklist-tab">

                        <form id="form-last-checklist">
                            <div class="container-fluid">
                                <!--<h6 style="font-weight: normal;">Recibí de ESTEVEZJOR para el desempeño de mis funciones yo, <strong>C.: <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></strong></h6>
              <h6 style="font-weight: normal">el automóvil con las siguientes características</h6>-->
                                <h6 style="font-weight: normal" align="right">Eco: <strong class="auto"></strong></h6>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <table>
                                            <tr>
                                                <td>Marca y Tipo: <strong class="marca"></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Modelo: <strong class="modelo"></strong></td>
                                            </tr>
                                            <tr>
                                                <td>No. de Serie: <strong class="numeroserie"></strong></td>
                                            </tr>
                                            <tr>
                                                <td>No. de Motor: <strong class="nomotor"></strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-5">
                                        <table>
                                            <tr>
                                                <td>Placas: <strong class="placas"></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Póliza: <strong class="poliza"></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Vencimiento: <strong class="vencimiento"></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Seguro: <strong class="seguro"></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Prueba: <strong class="uid_asignacion"></strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-6 text-center">
                                        <h6 class="estadovehiculo"> </h6>
                                    </div>
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Kilometraje Actual:
                                    </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control kilometraje" disabled name="kilometraje"
                                            required placeholder="Kilometraje Actual">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!--<h6 style="font-weight: normal;" class="text-center">Presentó Licencia: <strong><?= count($prueba_manejo) == 0 ? 'NO' : 'SI' ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Localidad Licencia: <strong><?= $prueba_manejo[0]['localidad_licencia'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Tipo: <strong><?= $prueba_manejo[0]['tipo_licencia'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Vigencia: <strong><?= $prueba_manejo[0]['vigencia_licencia'] ?></strong></h6>-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                        <th>ESTADO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt1" disabled class="form-control">
                                                        </td>
                                                        <td><input required type="radio" disabled name="rr1"></td>
                                                        <td><input required type="radio" disabled name="rrr1"></td>
                                                        <td><input class="form-control" disabled type="text" name="ee1">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt2" disabled class="form-control">
                                                        </td>
                                                        <td><input value="si" required disabled type="radio" name="rr2">
                                                        </td>
                                                        <td><input value="no" required disabled type="radio"
                                                                name="rrr2"></td>
                                                        <td><input class="form-control" disabled type="text" name="ee2">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt3" disabled class="form-control">
                                                        </td>
                                                        <td><input required type="radio" disabled name="rr3"></td>
                                                        <td><input required type="radio" disabled name="rrr3"></td>
                                                        <td><input class="form-control" disabled type="text" name="ee3">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt4" disabled class="form-control">
                                                        </td>
                                                        <td><input required type="radio" disabled name="rr4"></td>
                                                        <td><input required type="radio" disabled name="rrr4"></td>
                                                        <td><input class="form-control" disabled type="text" name="ee4">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt5" disabled class="form-control">
                                                        </td>
                                                        <td><input required type="radio" disabled name="rr5"></td>
                                                        <td><input required type="radio" disabled name="rrr5"></td>
                                                        <td><input class="form-control" disabled type="text" name="ee5">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt6" disabled class="form-control">
                                                        </td>
                                                        <td><input required type="radio" disabled name="rr6"></td>
                                                        <td><input required type="radio" disabled name="rrr6"></td>
                                                        <td><input class="form-control" disabled type="text" name="ee6">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt7" disabled class="form-control">
                                                        </td>
                                                        <td><input required type="radio" disabled name="rr7"></td>
                                                        <td><input required type="radio" disabled name="rrr7"></td>
                                                        <td><input class="form-control" disabled type="text" name="ee7">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt8" disabled class="form-control">
                                                        </td>
                                                        <td><input required type="radio" disabled name="rr8"></td>
                                                        <td><input required type="radio" disabled name="rrr8"></td>
                                                        <td><input class="form-control" disabled type="text" name="ee8">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt9" disabled class="form-control">
                                                        </td>
                                                        <td><input required type="radio" disabled name="rr9"></td>
                                                        <td><input required type="radio" disabled name="rrr9"></td>
                                                        <td><input class="form-control" disabled type="text" name="ee9">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt10" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr10"></td>
                                                        <td><input required type="radio" disabled name="rrr10"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee10"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                        <th>ESTADO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt11" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr11"></td>
                                                        <td><input required type="radio" disabled name="rrr11"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee11"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt12" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr12"></td>
                                                        <td><input required type="radio" disabled name="rrr12"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee12"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt13" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr13"></td>
                                                        <td><input required type="radio" disabled name="rrr13"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee13"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt14" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr14"></td>
                                                        <td><input required type="radio" disabled name="rrr14"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee14"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt15" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr15"></td>
                                                        <td><input required type="radio" disabled name="rrr15"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee15"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt16" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr16"></td>
                                                        <td><input required type="radio" disabled name="rrr16"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee16"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt17" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr17"></td>
                                                        <td><input required type="radio" disabled name="rrr17"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee17"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt18" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr18"></td>
                                                        <td><input required type="radio" disabled name="rrr18"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee18"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt19" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr19"></td>
                                                        <td><input required type="radio" disabled name="rrr19"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee19"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt20" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr20"></td>
                                                        <td><input required type="radio" disabled name="rrr20"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee20"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                        <th>ESTADO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt21" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr21"></td>
                                                        <td><input required type="radio" disabled name="rrr21"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee21"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt22" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr22"></td>
                                                        <td><input required type="radio" disabled name="rrr22"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee22"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt23" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr23"></td>
                                                        <td><input required type="radio" disabled name="rrr23"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee23"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt24" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr24"></td>
                                                        <td><input required type="radio" disabled name="rrr24"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee24"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt25" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr25"></td>
                                                        <td><input required type="radio" disabled name="rrr25"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee25"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt26" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr26"></td>
                                                        <td><input required type="radio" disabled name="rrr26"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee26"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt27" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr27"></td>
                                                        <td><input required type="radio" disabled name="rrr27"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee27"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt28" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr28"></td>
                                                        <td><input required type="radio" disabled name="rrr28"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee28"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt29" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr29"></td>
                                                        <td><input required type="radio" disabled name="rrr29"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee29"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt30" disabled
                                                                class="form-control"></td>
                                                        <td><input required type="radio" disabled name="rr30"></td>
                                                        <td><input required type="radio" disabled name="rrr30"></td>
                                                        <td><input class="form-control" disabled type="text"
                                                                name="ee30"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h6 style="text-align: center;">ESTADO GENERAL DE LA CARROCERÍA</h6>

                                <center>
                                    <div id="imagen1">

                                    </div>
                                </center>

                                <center>
                                    <div id="imagen2">

                                    </div>
                                </center>

                                <center>
                                    <div id="imagen3">

                                    </div>
                                </center>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Observaciones</label>
                                        <textarea class="form-control observaciones" disabled name="observaciones"
                                            placeholder="Observaciones"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <h6>NOTA: EL VEHICULO SE ENTREGA&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"
                                            class="limpio" disabled value="limpio" name="condicion_unidad" required>
                                        &nbsp;<span class="label-check"
                                            style="font-size: 13px;">LIMPIO</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" value="sucio" class="sucio" name="condicion_unidad" disabled
                                            required> &nbsp;<span class="label-check"
                                            style="font-size: 13px;">SUCIO</span>&nbsp;&nbsp;&nbsp;&nbsp;EN CASO DE
                                        ENTREGAR SUCIA UNIDAD TENDRÁ UN COSTO DE $150.00
                                    </h6>
                                </div>
                                <br>
                                <!--<h6 style="font-weight: normal;">Yo <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?> me comprometo a:</h6>
              <p>
                1) Cuidar y conservar la Unidad en las mejores condiciones de operación y apariencia, para lo cual cumpliré con los servicios especificados en el manual del propietario y en la   póliza de garantía teniendo presente la imagen de la unidad y de ESTEVEZJOR SERVICIOS S.A. DE C.V
              </p>
              <p>
                2) Usar el cinturón de seguridad en todo momento, así como también los ocupantes que viajen en la unidad
              </p>
              <p>
                3) Pagar los montos de los deducibles del seguro del vehículo en caso de siniestro cuando el incidente sea debido a mi descuido via nomina
              </p>
              <p>
                4) Pagar los daños que sufra el vehículo y que no están considerados en la cobertura del seguro tales como robos parciales, actos vandálicos y aquellos que impliquen compostura al vehiculo a fin de cumplir con el punto No. 1 de esta carta
              </p>
              <p>
                5) Pagar las multas que se originen por incumplimiento de reglamento de transito, ecología o cualquier otro de carácter municipal, estatal o federal por incumpliento a las leyes de transito vigente 
              </p>
              <p>
                6) Notificar al departamento de Crontol de Vehículos por escrito si hubiere algún cambio que me desligue de toda responsabilidad del vehículo en mi custodia. Sino lo hiciera así me comprometo a pagar o responder jurídicamente cualquier hecho que se presente con la unidad a mi cargo
              </p>
              <p>
                7) Cualquier situación no contemplada en el presente formato, será comentada y autorizada por el Gerente del Area o Dirección General
              </p>
              <p>
                8) Cumplir con las políticas revision y mantenimiento establecidas por ESTEVEZJOR SERVICIOS S.A C.V
              </p>
              <br>-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-sm" width="100%">
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <center>
                                                            <div id="imagen4">

                                                            </div>
                                                        </center>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">ME COMPROMETO Y ACEPTO LO ANTERIOR</td>
                                                    <td class="text-center" id="usuario"></td>
                                                    <td class="text-center fecha"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="border-top: solid 1px;" class="text-center">(Nombre y
                                                        Firma)</td>
                                                    <td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <center>
                                                            <div id="imagen5">

                                                            </div>
                                                        </center>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">VEHICULO ENTREGADO POR</td>
                                                    <td class="text-center" id="user"></td>
                                                    <td class="text-center fecha"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td style="border-top: solid 1px;" class="text-center">(Nombre y
                                                        Firma)</td>
                                                    <td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php if($solicitud->tipo_devolucion == 'Autos Control Vehicular' || $solicitud->tipo_devolucion == 'Sistemas') { ?>
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
    var canvas = document.getElementById("draw-canvas");
    var ctx = canvas.getContext("2d");


    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText = document.getElementById("draw-dataUrl");
    var drawImage = document.getElementById("draw-image");
    var clearBtn = document.getElementById("draw-clearBtn");
    var submitBtn = document.getElementById("draw-submitBtn");
    clearBtn.addEventListener("click", function(e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        verImagen();
        drawImage.setAttribute("src", "");
        $('#draw-submitBtn').attr("disabled", false);
        $('#draw-submitBtn').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn").html('<i class="fa fa-ban"></i> Crear Imagen');
    }, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
    submitBtn.addEventListener("click", function(e) {
        var dataUrl = canvas.toDataURL();
        drawText.innerHTML = dataUrl;
        drawImage.setAttribute("src", dataUrl);
        $('#draw-submitBtn').attr("disabled", true);
        $('#draw-submitBtn').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn").html('<i class="fa fa-check"></i> Imagen Creada');
    }, false);

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;
    canvas.addEventListener("mousedown", function(e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint = document.getElementById("color");
        var punta = document.getElementById("puntero");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas, e);
    }, false);
    canvas.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);
    canvas.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas, e);
    }, false);

    // Activamos touchEvent para nuestra pagina
    canvas.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
    }, false);
    canvas.addEventListener("touchend", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
    }, false);
    canvas.addEventListener("touchleave", function(e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
    }, false);
    canvas.addEventListener("touchmove", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
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
            var tint = document.getElementById("color");
            var punta = document.getElementById("puntero");
            ctx.strokeStyle = tint.value;
            ctx.beginPath();
            ctx.moveTo(lastPos.x, lastPos.y);
            ctx.lineTo(mousePos.x, mousePos.y);
            console.log(punta.value);
            ctx.lineWidth = punta.value;
            ctx.stroke();
            ctx.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas.width = canvas.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();

})();
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
    var canvas2 = document.getElementById("draw-canvas2");
    var ctx2 = canvas2.getContext("2d");


    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText2 = document.getElementById("draw-dataUrl2");
    var drawImage2 = document.getElementById("draw-image2");
    var clearBtn2 = document.getElementById("draw-clearBtn2");
    var submitBtn2 = document.getElementById("draw-submitBtn2");
    clearBtn2.addEventListener("click", function(e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        verImagen2();
        $('#draw-submitBtn2').attr("disabled", false);
        $('#draw-submitBtn2').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn2").html('<i class="fa fa-ban"></i> Crear Imagen');
        drawImage2.setAttribute("src", "");
    }, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
    submitBtn2.addEventListener("click", function(e) {
        var dataUrl = canvas2.toDataURL();
        drawText2.innerHTML = dataUrl;
        drawImage2.setAttribute("src", dataUrl);
        $('#draw-submitBtn2').attr("disabled", true);
        $('#draw-submitBtn2').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn2").html('<i class="fa fa-check"></i> Imagen Creada');
    }, false);

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;
    canvas2.addEventListener("mousedown", function(e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint2 = document.getElementById("color2");
        var punta2 = document.getElementById("puntero2");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas2, e);
    }, false);
    canvas2.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);
    canvas2.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas2, e);
    }, false);

    // Activamos touchEvent para nuestra pagina
    canvas2.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas2, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas2.dispatchEvent(mouseEvent);
    }, false);
    canvas2.addEventListener("touchend", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas2.dispatchEvent(mouseEvent);
    }, false);
    canvas2.addEventListener("touchleave", function(e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas2.dispatchEvent(mouseEvent);
    }, false);
    canvas2.addEventListener("touchmove", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas2.dispatchEvent(mouseEvent);
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
            var tint2 = document.getElementById("color2");
            var punta2 = document.getElementById("puntero2");
            ctx2.strokeStyle = tint2.value;
            ctx2.beginPath();
            ctx2.moveTo(lastPos.x, lastPos.y);
            ctx2.lineTo(mousePos.x, mousePos.y);
            console.log(punta2.value);
            ctx2.lineWidth = punta2.value;
            ctx2.stroke();
            ctx2.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas2.width = canvas2.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();

})();
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
    var canvas3 = document.getElementById("draw-canvas3");
    var ctx3 = canvas3.getContext("2d");


    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText3 = document.getElementById("draw-dataUrl3");
    var drawImage3 = document.getElementById("draw-image3");
    var clearBtn3 = document.getElementById("draw-clearBtn3");
    var submitBtn3 = document.getElementById("draw-submitBtn3");
    clearBtn3.addEventListener("click", function(e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        verImagen3();
        $('#draw-submitBtn3').attr("disabled", false);
        $('#draw-submitBtn3').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn3").html('<i class="fa fa-ban"></i> Crear Imagen');
        drawImage3.setAttribute("src", "");
    }, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
    submitBtn3.addEventListener("click", function(e) {
        var dataUrl = canvas3.toDataURL();
        drawText3.innerHTML = dataUrl;
        drawImage3.setAttribute("src", dataUrl);
        $('#draw-submitBtn3').attr("disabled", true);
        $('#draw-submitBtn3').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn3").html('<i class="fa fa-check"></i> Imagen Creada');
    }, false);

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;
    canvas3.addEventListener("mousedown", function(e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint3 = document.getElementById("color3");
        var punta3 = document.getElementById("puntero3");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas3, e);
    }, false);
    canvas3.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);
    canvas3.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas3, e);
    }, false);

    // Activamos touchEvent para nuestra pagina
    canvas3.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas3, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas3.dispatchEvent(mouseEvent);
    }, false);
    canvas3.addEventListener("touchend", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas3.dispatchEvent(mouseEvent);
    }, false);
    canvas3.addEventListener("touchleave", function(e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas3.dispatchEvent(mouseEvent);
    }, false);
    canvas3.addEventListener("touchmove", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas3.dispatchEvent(mouseEvent);
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
            var tint3 = document.getElementById("color3");
            var punta3 = document.getElementById("puntero3");
            ctx3.strokeStyle = tint3.value;
            ctx3.beginPath();
            ctx3.moveTo(lastPos.x, lastPos.y);
            ctx3.lineTo(mousePos.x, mousePos.y);
            console.log(punta3.value);
            ctx3.lineWidth = punta3.value;
            ctx3.stroke();
            ctx3.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas3.width = canvas3.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();

})();
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
    var canvas4 = document.getElementById("draw-canvas4");
    var ctx4 = canvas4.getContext("2d");


    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText4 = document.getElementById("draw-dataUrl4");
    var drawImage4 = document.getElementById("draw-image4");
    var clearBtn4 = document.getElementById("draw-clearBtn4");
    var submitBtn4 = document.getElementById("draw-submitBtn4");
    clearBtn4.addEventListener("click", function(e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        $('#draw-submitBtn4').attr("disabled", false);
        $('#draw-submitBtn4').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn4").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
        drawImage4.setAttribute("src", "");
    }, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
    submitBtn4.addEventListener("click", function(e) {
        var dataUrl = canvas4.toDataURL();
        drawText4.innerHTML = dataUrl;
        drawImage4.setAttribute("src", dataUrl);
        $('#draw-submitBtn4').attr("disabled", true);
        $('#draw-submitBtn4').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn4").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
    }, false);

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;
    canvas4.addEventListener("mousedown", function(e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint4 = document.getElementById("color4");
        var punta4 = document.getElementById("puntero4");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas4, e);
    }, false);
    canvas4.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);
    canvas4.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas4, e);
    }, false);

    // Activamos touchEvent para nuestra pagina
    canvas4.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas4, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas4.dispatchEvent(mouseEvent);
    }, false);
    canvas4.addEventListener("touchend", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas4.dispatchEvent(mouseEvent);
    }, false);
    canvas4.addEventListener("touchleave", function(e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas4.dispatchEvent(mouseEvent);
    }, false);
    canvas4.addEventListener("touchmove", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas4.dispatchEvent(mouseEvent);
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
            var tint4 = document.getElementById("color4");
            var punta4 = document.getElementById("puntero4");
            ctx4.strokeStyle = tint4.value;
            ctx4.beginPath();
            ctx4.moveTo(lastPos.x, lastPos.y);
            ctx4.lineTo(mousePos.x, mousePos.y);
            console.log(punta4.value);
            ctx4.lineWidth = punta4.value;
            ctx4.stroke();
            ctx4.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas4.width = canvas4.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();

})();
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
    var canvas5 = document.getElementById("draw-canvas5");
    var ctx5 = canvas5.getContext("2d");


    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText5 = document.getElementById("draw-dataUrl5");
    var drawImage5 = document.getElementById("draw-image5");
    var clearBtn5 = document.getElementById("draw-clearBtn5");
    var submitBtn5 = document.getElementById("draw-submitBtn5");
    clearBtn5.addEventListener("click", function(e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        $('#draw-submitBtn5').attr("disabled", false);
        $('#draw-submitBtn5').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn5").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
        drawImage5.setAttribute("src", "");
    }, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
    submitBtn5.addEventListener("click", function(e) {
        var dataUrl = canvas5.toDataURL();
        drawText5.innerHTML = dataUrl;
        drawImage5.setAttribute("src", dataUrl);
        $('#draw-submitBtn5').attr("disabled", true);
        $('#draw-submitBtn5').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn5").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
    }, false);

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;
    canvas5.addEventListener("mousedown", function(e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint5 = document.getElementById("color5");
        var punta5 = document.getElementById("puntero5");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas5, e);
    }, false);
    canvas5.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);
    canvas5.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas5, e);
    }, false);

    // Activamos touchEvent para nuestra pagina
    canvas5.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas5, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas5.dispatchEvent(mouseEvent);
    }, false);
    canvas5.addEventListener("touchend", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas5.dispatchEvent(mouseEvent);
    }, false);
    canvas5.addEventListener("touchleave", function(e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas5.dispatchEvent(mouseEvent);
    }, false);
    canvas5.addEventListener("touchmove", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas5.dispatchEvent(mouseEvent);
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
            var tint5 = document.getElementById("color5");
            var punta5 = document.getElementById("puntero5");
            ctx5.strokeStyle = tint5.value;
            ctx5.beginPath();
            ctx5.moveTo(lastPos.x, lastPos.y);
            ctx5.lineTo(mousePos.x, mousePos.y);
            console.log(punta5.value);
            ctx5.lineWidth = punta5.value;
            ctx5.stroke();
            ctx5.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas5.width = canvas5.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();

})();

$("#form-checklist").on("submit", function(event) {
    var $form = $(this);

    var f = $(this);
    if (event.isDefaultPrevented()) {
        console.log('Error')
    } else {
        event.preventDefault();
        var formData = new FormData(document.getElementById("form-checklist"));
        $.ajax({
            url: "<?= base_url()?>ControlVehicular/guardarChecklistDevolucion",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if (resp.status) {
                    Toast.fire({
                        type: 'success',
                        title: resp.message
                    })
                    $('.bd-example-modal-lg2').modal('toggle');
                    $('.btn-ocultar').css('display','block');
                    $('.btn-checklist').css('display','none');
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
<?php } ?>