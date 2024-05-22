<?php if($detalle[0]->tipo == 'caja_chica'){ ?>
<section class="forms nueva-solicitud">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Detalle Caja Chica</h3>
            </div>
            <div class="card-body">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <?= validation_errors('<span class="error">', '</span>'); ?>
                <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist"'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div style="text-align: center;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Fecha*</th>
                                        <td>
                                            <?= $detalle[0]->fecha_creacion ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Solicitante*</th>
                                        <td>
                                            <?= $detalle[0]->autor ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Proyecto</th>
                                        <td>
                                            <?= $detalle[0]->numero_proyecto ?> - <?= $detalle[0]->nombre_proyecto ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Aprobación</th>
                                        <td>
                                            <?= $detalle[0]->nombre_aprobacion ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Recibe</th>
                                        <td>
                                            <?= $detalle[0]->nombre_recibe ?> <?= $detalle[0]->apellido_paterno ?> <?= $detalle[0]->apellido_materno ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cantidad Pedida</th>
                                        <td>
                                            <input type="hidden" name="costo" value="<?= $detalle[0]->cantidad ?>">
                                            <?= $detalle[0]->cantidad ?>
                                        </td>
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
                                <table class="table">
                                    <thead>
                                        <tr class="descripcion">
                                            <th>Motivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                        <tr class="descripcion">
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="motivo" class="form-control" placeholder="Motivo"
                                                    readonly><?= $detalle[0]->motivo ?></textarea></td>
                                        </tr>
                                        </tr>
                                        <?php if(($detalle[0]->estatus == 'DW' && $this->session->userdata('tipo') == 20) || ($this->session->userdata('tipo') == 2 && $detalle[0]->estatus == 'TI') || ($this->session->userdata('tipo') == 7 && $detalle[0]->estatus == 'M')){ ?>
                                        <tr>
                                            <td>Observaciones</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="observaciones" class="form-control"
                                                    placeholder="Observaciones" required></textarea></td>
                                        </tr>
                                        <?php }elseif($detalle[0]->estatus == 'R' || $detalle[0]->estatus == 'cancelado' || $detalle[0]->estatus == 'MF'){ ?>
                                        <tr>
                                            <td>Observaciones</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="observaciones" class="form-control"
                                                    placeholder="Observaciones"
                                                    readonly><?= $detalle[0]->observaciones ?></textarea></td>
                                        </tr>
                                        <?php } ?>
                                        <?php if(($detalle[0]->estatus == 'MF' && $this->session->userdata('id') == $detalle[0]->tbl_users_idtbl_users)){ ?>
                                        <tr>
                                            <td>Observaciones Usuario</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="observaciones_usuario" class="form-control"
                                                    placeholder="Observaciones" required></textarea></td>
                                        </tr>
                                        <?php }elseif($detalle[0]->estatus == 'R' || $detalle[0]->estatus == 'cancelado' || $detalle[0]->estatus == 'MF'){ ?>
                                        <tr>
                                            <td>Observaciones Usuario</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="observaciones_usuario" class="form-control"
                                                    placeholder="Observaciones"
                                                    readonly><?= $detalle[0]->observaciones_usuario ?></textarea></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if($detalle[0]->estatus == 'finalizada' && $detalle[0]->imagenes_firmas == NULL){ ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-sm" width="100%">
                                <tr>
                                    <td>
                                        <center>
                                            <canvas id="draw-canvas6" width="240" style="border: solid;">
                                                No tienes un buen navegador.
                                            </canvas>
                                            <br>
                                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button"
                                                class="btn btn-warning btn-sm" id="draw-submitBtn6"><i
                                                    style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button"
                                                class="btn btn-danger btn-sm" id="draw-clearBtn6"><i
                                                    style="font-size: 8px;" class="fa fa-trash"></i> Borrar
                                                Firma</button>
                                            <div style="display: none">
                                                <label>Color</label>
                                                <input type="color" id="color6">
                                                <label>Tamaño Puntero</label>
                                                <input type="range" id="puntero6" min="1" default="1" max="5"
                                                    width="10%">
                                            </div>
                                            <textarea style="display: none;" id="draw-dataUrl6" name="imagen6"
                                                class="form-control" rows="5"></textarea>
                                            <img style="display: none" id="draw-image6" src=""
                                                alt="Tu Imagen aparecera Aqui!" />
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: center;">FIRMA
                                        SOLICITANTE<br><?= $this->session->userdata('nombre') ?></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="guardar_firma" class="btn-primary btn">Guardar Firma</button>
                    </div>
                </div> 
                <?php }elseif($detalle[0]->estatus == 'finalizada' && $detalle[0]->imagenes_firmas != NULL){ ?>
                    <center>
                        <?php $json = json_decode($detalle[0]->imagenes_firmas) ?>

                        <img src="<?= base_url().$json->imagen6 ?>">
                    </center>
                <?php } ?>
                <?php }else{ ?>
                    <section class="forms nueva-solicitud">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Detalle Viatico</h3>
            </div>
            <div class="card-body">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <?= validation_errors('<span class="error">', '</span>'); ?>
                <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist"'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div style="text-align: center;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Fecha*</th>
                                        <td>
                                            <?= $detalle[0]->fecha_creacion ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Solicitante*</th>
                                        <td>
                                            <?= $detalle[0]->autor ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Proyecto</th>
                                        <td>
                                            <?= $detalle[0]->numero_proyecto ?> - <?= $detalle[0]->nombre_proyecto ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Aprobación</th>
                                        <td>
                                            <?= $detalle[0]->nombre_aprobacion ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Recibe</th>
                                        <td>
                                            <?= $detalle[0]->nombre_recibe ?> <?= $detalle[0]->apellido_paterno ?> <?= $detalle[0]->apellido_materno ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cantidad Pedida</th>
                                        <td>
                                            <?php if($this->session->userdata('tipo') == 5){ ?>
                                                <input type="hidden" name="cantidad_original" class="form-control" value="<?= $detalle[0]->cantidad ?>">
                                                <input type="number" name="cantidad" class="form-control" value="<?= $detalle[0]->cantidad ?>">
                                            <?php }else{ ?>
                                                <?= $detalle[0]->cantidad ?>
                                            <?php } ?>
                                        </td>
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
                                <table class="table">
                                    <thead>
                                        <tr class="descripcion">
                                            <th>Motivo</th>
                                        </tr>
                                        <tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <tr class="descripcion">
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="motivo" class="form-control" placeholder="Motivo"
                                                    readonly><?= $detalle[0]->motivo ?></textarea></td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                                <?php if($detalle[0]->comentarios_regreso != NULL){ ?>
                                <table class="table">
                                    <thead>
                                        <tr class="descripcion">
                                            <th>Motivo Regreso</th>
                                        </tr>
                                        <tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <tr class="descripcion">
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="motivo" class="form-control" placeholder="Motivo"
                                                    readonly><?= $detalle[0]->comentarios_regreso ?></textarea></td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                                <?php } ?>
                                <br>
                                <?php if($detalle[0]->tipo_viatico == 'traslado'){ ?>
                                <table class="table" id="table_traslado">
                                    <thead>
                                        <th>Nombre Completo</th>
                                        <th>Transporte(Monto)</th>
                                        <th>Hospedaje(Monto)</th>
                                        <th>Casetas(Monto)</th>
                                        <th>Lunes</th>
                                        <th>Martes</th>
                                        <th>Miercoles</th>
                                        <th>Jueves</th>
                                        <th>Viernes</th>
                                        <th>Sabado</th>
                                        <th>Domingo</th>
                                        <th>Fechas</th>
                                        <th>Alimentos(Monto)</th>
                                        <th>Monto Total</th>
                                        <th>Observaciones</th>
                                        
                                    </thead>
                                    <tbody id="excel_traslado">
                                    <?php foreach ($detalle_recurso as $key => $value){ ?>
                                        <tr>
                                            <td><input type="hidden" class="form-control iddtl_recurso" name="iddtl_recurso[]" data-index="<?= $key ?>" value="<?= $value->iddtl_solicitud_recursos ?>"><input type="hidden" class="form-control iddtl_recurso" name="idtbl_recurso[]" data-index="<?= $key ?>" value="<?= $value->tbl_solicitud_recursos_idtbl_solicitud_recursos ?>"><?= $value->nombres ?> <?= $value->apellido_paterno ?> <?= $value->apellido_materno ?></td>
                                            <td><i style=font-size:18px; class="fa fa-question-circle fa-2xs"data-toggle="tooltip" data-placement="top" title="<?= $value->transporte_jefe != NULL ? 'Jefe: '.$value->transporte_jefe : '' ?><?= $value->transporte_pm != NULL ? 'PM: '.$value->transporte_pm : '' ?><?= $value->transporte_rh != NULL ? 'RH: '.$value->transporte_rh : '' ?>"></i><input type="number" class="form-control transporte" name="transporte[]" data-index='<?= $key ?>' id='transporte_<?= $key ?>' value="<?= $value->transporte ?>"><input type="hidden" class="form-control" name="transporte_anterior[]" value="<?= $value->transporte ?>"></td>
                                            <td><i style=font-size:18px; class="fa fa-question-circle fa-2xs"data-toggle="tooltip" data-placement="top" title="<?= $value->hospedaje_jefe != NULL ? 'Jefe: '.$value->hospedaje_jefe : '' ?><?= $value->hospedaje_pm != NULL ? 'PM: '.$value->hospedaje_pm : '' ?><?= $value->hospedaje_rh != NULL ? 'RH: '.$value->hospedaje_rh : '' ?>"></i><input type="number" class="form-control hospedaje" name="hospedaje[]" data-index='<?= $key ?>' id='hospedaje_<?= $key ?>' value="<?= $value->hospedaje ?>"><input type="hidden" class="form-control" name="hospedaje_anterior[]" value="<?= $value->hospedaje ?>"></td>
                                            <td><i style=font-size:18px; class="fa fa-question-circle fa-2xs"data-toggle="tooltip" data-placement="top" title="<?= $value->casetas_jefe != NULL ? 'Jefe: '.$value->casetas_jefe : '' ?><?= $value->casetas_pm != NULL ? 'PM: '.$value->casetas_pm : '' ?><?= $value->casetas_rh != NULL ? 'RH: '.$value->casetas_rh : '' ?>"></i><input type="number" class="form-control casetas" name="casetas[]" data-index='<?= $key ?>' id='casetas_<?= $key ?>' value="<?= $value->casetas ?>"><input type="hidden" class="form-control" name="casetas_anterior[]" value="<?= $value->casetas ?>"></td>
                                            <?php $fecha_inicio = substr($value->fechas, 0, -13); ?>
                                            <?php $fecha_final = substr($value->fechas, -10); ?>
                                            <?php $fecha_inicio_guion = str_replace('/','-',$fecha_inicio); ?>
                                            <?php $fecha_final_guion = str_replace('/','-',$fecha_final); ?>
                                            
                                            
                                            <?php
                                                $fechaInicio=strtotime($fecha_inicio_guion);
                                                $fechaFin=strtotime($fecha_final_guion);
                                                $lunes = 0;
                                                $martes = 0;
                                                $miercoles = 0;
                                                $jueves = 0;
                                                $viernes = 0;
                                                $sabado = 0;
                                                $domingo = 0;
                                                for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                    
                                                    if(date('w', $i) == 1){
                                                        $lunes = date("d", $i);
                                                    }elseif(date('w', $i) == 2){
                                                        $martes = date("d", $i);
                                                    }elseif(date('w', $i) == 3){
                                                        $miercoles = date("d", $i);
                                                    }elseif(date('w', $i) == 4){
                                                        $jueves = date("d", $i);
                                                    }elseif(date('w', $i) == 5){
                                                        $viernes = date("d", $i);
                                                    }elseif(date('w', $i) == 6){
                                                        $sabado = date("d", $i);
                                                    }elseif(date('w', $i) == 0){
                                                        $domingo = date("d", $i);
                                                    }
                                                    
                                                }
                                            ?>
                                            <td><?= $value->lunes == 1 ? $lunes : '' ?></td>
                                            <td><?= $value->martes == 1 ? $martes : '' ?></td>
                                            <td><?= $value->miercoles == 1 ? $miercoles : '' ?></td>
                                            <td><?= $value->jueves == 1 ? $jueves : '' ?></td>
                                            <td><?= $value->viernes == 1 ? $viernes : '' ?></td>
                                            <td><?= $value->sabado == 1 ? $sabado : '' ?></td>
                                            <td><?= $value->domingo == 1 ? $domingo : '' ?></td>
                                            <td><?= $value->fechas ?></td>
                                            <td><i style=font-size:18px; class="fa fa-question-circle fa-2xs"data-toggle="tooltip" data-placement="top" title="<?= $value->alimentos_jefe != NULL ? 'Jefe: '.$value->alimentos_jefe : '' ?><?= $value->alimentos_pm != NULL ? 'PM: '.$value->alimentos_pm : '' ?><?= $value->alimentos_rh != NULL ? 'RH: '.$value->alimentos_rh : '' ?>"></i><input type="number" class="form-control alimentos" name="alimentos[]" data-index='<?= $key ?>' id='alimentos_<?= $key ?>' value="<?= $value->alimentos ?>"><input type="hidden" class="form-control" name="alimentos_anterior[]" value="<?= $value->alimentos ?>"></td>
                                            <td><input type="number" class="form-control total" name="total[]" data-index='<?= $key ?>' id='total_<?= $key ?>' value="<?= $value->total ?>" readonly><input type="hidden" class="form-control" name="total_anterior[]" value="<?= $value->total ?>"></td>
                                            <td><?= $value->observaciones ?></td>
                                        </tr>                        

                                    <?php } ?>
                                    </tbody>
                                </table>
                                <?php }else{ ?>
                                    <table class="table" id="table_semanal">
                                    <thead>
                                        <th>Nombre Completo</th>
                                        <th>Cargo</th>
                                        <th>Cuadrilla</th>
                                        <th>Días a Laborar</th>
                                        <th>Cantidad</th>
                                        <th>Lunes</th>
                                        <th>Martes</th>
                                        <th>Miercoles</th>
                                        <th>Jueves</th>
                                        <th>Viernes</th>
                                        <th>Sabado</th>
                                        <th>Domingo</th>
                                        <th>Días a descontar</th>
                                        <th>Descuento</th>
                                        <th>Lunes</th>
                                        <th>Martes</th>
                                        <th>Miercoles</th>
                                        <th>Jueves</th>
                                        <th>Viernes</th>
                                        <th>Sabado</th>
                                        <th>Domingo</th>
                                        <th>Total</th>
                                        <th>Observaciones</th>
                                        
                                    </thead>
                                    <tbody id="excel_semanal">
                                    <?php foreach ($detalle_recurso as $key => $value){ ?>
                                        <tr>
                                            <td><?= $value->nombres ?> <?= $value->apellido_paterno ?> <?= $value->apellido_materno ?></td>
                                            <td><?= $value->perfil ?></td>
                                            <td><?= $value->nombre_cuadrilla ?></td>
                                            <td><?= $value->dias_laborar ?></td>
                                            <td><?= $value->cantidad_dia ?></td>
                                            <td><?= $value->lunes == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->martes == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->miercoles == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->jueves == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->viernes == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->sabado == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->domingo == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->dias_descontar ?></td>
                                            <td><?= $value->descuento ?></td>
                                            <td><?= $value->lunes_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->martes_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->miercoles_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->jueves_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->viernes_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->sabado_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->domingo_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->total ?></td>
                                            <td><?= $value->observaciones ?></td>
                                        </tr>                        

                                    <?php } ?>
                                    </tbody>
                                </table>
                                    <?php } ?>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                <?php if($detalle[0]->tipo_viatico == 'traslado'){ ?>
                            <div class="clearfix pt-md">
                                <div class="pull-right">                       
                                <button class="btn btn-secondary btn-info float-right" id="btnImprimirDiv" tabindex="0">
                                <span><i class="fa fa-print"></i> Imprimir</span>
                                </button>
                                </div>
                            </div>
                            <div class="clearfix pt-md">
                                <div class="pull-right">                       
                                <button class="btn btn-secondary btn-info float-right" id="btnImprimirDivAlimentos" tabindex="0">
                                <span><i class="fa fa-print"></i> Imprimir Alimentos</span>
                                </button>
                                </div>
                            </div>
                <?php }else{ ?>
                    <div class="clearfix pt-md">
                                <div class="pull-right">                       
                                <button class="btn btn-secondary btn-info float-right" id="btnImprimirDivSemanal" tabindex="0">
                                <span><i class="fa fa-print"></i> Imprimir</span>
                                </button>
                                </div>
                            </div>
                    <?php } ?>
                
                    

                <?php } ?>
                
                <hr>
                <?php if(($detalle[0]->estatus == 'creada') && ($detalle[0]->tbl_users_idtbl_users_aprobacion == $this->session->userdata('id')) && $detalle[0]->tipo == 'caja_chica'){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Caja Chica</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" class="btn-primary btn">Aprobar Caja Chica</button1>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'creada') && $detalle[0]->tbl_users_idtbl_users_aprobacion == $this->session->userdata('id') && $detalle[0]->tipo == 'viaticos'){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Viaticos</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" value="<?= $detalle[0]->estatus ?>" class="btn-primary btn">Aprobar Viaticos</button1>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'aprobada') && $detalle[0]->pm_cargo == $this->session->userdata('id') && $detalle[0]->tipo == 'viaticos'){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Viaticos</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" value="<?= $detalle[0]->estatus ?>" class="btn-primary btn">Aprobar Viaticos</button1>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'aprobada_pm') && $this->session->userdata('tipo') == 5 && $detalle[0]->tipo == 'viaticos'){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Viaticos</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button type="button" id="regresar_pm" value="<?= $detalle[0]->estatus ?>" data-tipo="regreso" class="btn-warning btn">Regresar a PM</button>
                        <button id="aprobar" value="<?= $detalle[0]->estatus ?>" class="btn-primary btn">Aprobar Viaticos</button>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'aprobada_rh') && $this->session->userdata('tipo') == 16 && $detalle[0]->tipo == 'viaticos'){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Viaticos</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" value="<?= $detalle[0]->estatus ?>" class="btn-primary btn">Aprobar Viaticos</button1>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'creado') && ($this->session->userdata('tipo') == 2 && $detalle[0]->tipo_ticket == 'ti') && $detalle[0]->tipo == 'caja_chica'){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Ticket</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" class="btn-primary btn">Aprobar Ticket</button>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'creado') && ($this->session->userdata('tipo') == 3 && $detalle[0]->tipo_ticket == 'cv')){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Ticket</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" class="btn-primary btn">Aprobar Ticket</button>
                    </div>
                </div>                
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'creado') && ($this->session->userdata('tipo') == 7 || $detalle[0]->tipo_ticket == 'man')){ ?>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                    <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Ticket</button>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button id="aprobar" class="btn-primary btn">Aprobar Ticket</button>
                    </div>
                </div>                
                <?php } ?>
                <?php if($detalle[0]->estatus == 'creado' || $detalle[0]->estatus == 'DW'){ ?>
                <br><br>
                <h3 class="h3">Documentos</h3>
                <ul>
                    <?php $carpeta = './uploads'. '/soporte/' . $detalle[0]->uid; ?>
                    <?php @$scanned_directory = array_diff(scandir($carpeta), array('..', '.')); ?>
                    <?php if (is_array($scanned_directory) || is_object($scanned_directory)) { ?>
                    <?php if (sizeof($scanned_directory) > 0) { ?>
                    <?php
                  try {
                      foreach ($scanned_directory as $key => $value) {
                          echo '<li><a href="/' . $carpeta . '/' . $value . '" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">' . $value . '</a></li>';
                      }
                  } catch (Exception $e) {
                  }?>
                    <?php } else { ?>
                    <p class="text-danger text-center">No se encontró ningún documento</p>
                    <?php } ?>

                    <?php } else { ?>
                    <p class="text-danger text-center">No se encontró ningún documento</p>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php if(($detalle[0]->estatus == 'aprobada' && $this->session->userdata('tipo') == 16) && $detalle[0]->tipo == 'caja_chica'){ ?>
                    <br>
                <div class="row">
                    <label>Responsiva</label>
                    <input type="file" name="responsiva" class="form-control">
                </div>
                <br>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <a href="<?php echo base_url().'soporte' ?>" class="btn-danger btn"
                            id="btn-cancelar">Regresar</a>
                        <input type="hidden" name="uid" id="uid" class="form-control" value="<?= $detalle[0]->uid ?>">
                        <?= form_hidden('token', $token) ?>
                        <button type="button" class="btn btn-info" onclick="imprimirFormato();">Imprimir Documento</button>
                        <button type="button" id="finalizar" class="btn-primary btn">Finalizar Caja Chica</button>
                    </div>
                </div>

                <?php } ?>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="cancelarModal" tabindex="-1" role="dialog"
    aria-labelledby="vacacionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vacacionesLabel">Cancelar Recurso</h5>
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
                    <?= form_hidden('uid', $detalle[0]->uid) ?>  
                                                   
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

<div class="modal fade bd-example-modal-lg" id="regresarModal" tabindex="-1" role="dialog"
    aria-labelledby="vacacionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vacacionesLabel">Regresar Recurso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="needs-validation" id="formuploadajax_regresar" novalidate method="post">

                    <div class="form-group">
                        <label>Comentarios</label>
                        <textarea name="comentarios" class="form-control" rows="5"></textarea>
                    </div>
                    <br>                    
                    <?= form_hidden('uid', $detalle[0]->uid) ?>  
                                                 
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnRegresar" class="btn btn-primary ladda-button"
                    data-style="expand-right">Aceptar</button>
                <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
            </div>
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
              <td class="" colspan="1" rowspan="2" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 80px;">
              </td>
              <td colspan="5" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <strong>ESTEVEZJOR SERVICIOS S.A DE C.V</strong>
              </td>
              <td colspan="2" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 10pt;">
                <strong>Código: DAF-FO-CN-002</strong>
              </td>
              <tr>
              <td colspan="5" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <strong>VIÁTICOS</strong>
              </td>
              <td colspan="2" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 10pt;">
                <strong>Revisión: 00</strong>
              </td>
             
              
       
        </tr>
        
            </tr>
                                                                                            
                </tbody>              
        </table>

        <table id="datos_solicitud" style="width: 100%;font-size: 12px;margin-top: 10px; border-collapse: collapse;" cellpadding="4" cellspacing="0">                                 
                <tbody>
                <tr>
                    <td colspan="4" class="" style="vertical-align: middle; text-align: center;  font-size: 16pt;">
                    <strong>&nbsp;</strong>
                    </td>
                    <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                        <strong>Fecha de solicitud:</strong>
                    </td>
                    <td colspan="1" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                        <p><?= $detalle[0]->fecha_creacion ?></p>
                    </td>
                </tr>
              <tr>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Proyecto:</strong>
                </td>
                <td colspan="2" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p><?= $detalle[0]->numero_proyecto ?> - <?= $detalle[0]->nombre_proyecto ?></p>
                </td>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Mercado:</strong>
                </td>
                <td colspan="2" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p><?= $detalle[0]->ubicacion ?></p>
                </td>
            </tr>

            <tr>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>PM a cargo:</strong>
                </td>
                <td colspan="1" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p><?= $detalle[0]->nombre_aprobacion ?></p>
                </td>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Fecha de Salida:</strong>
                </td>
                <td colspan="1" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p>21/04/2023</p>
                </td>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Fecha de Llegada:</strong>
                </td>
                <td colspan="1" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p>21/04/2023</p>
                </td>
            </tr>
                                                                                            
                </tbody>              
        </table>
                                                                              
        <table style="width: 100%;margin-top: 15px;" border="1" cellpadding="4" cellspacing="0" align="center">
          <thead style="font-size: 12px!important; background-color: #00B0F0;">
            <tr>
              <th rowspan="2"><strong>Nombre completo</strong></th>
              <th rowspan="2"><strong>Transporte(Monto)</strong></th>
              <th rowspan="2"><strong>Hospedaje(Monto)</strong></th>
              <th rowspan="2"><strong>Casetas(Monto)</strong></th>  
              <th rowspan="1" colspan="7"><strong>Días a laborar</strong></th>
              <th rowspan="2"><strong>Fechas</strong></th>
              <th rowspan="2"><strong>Monto Total</strong></th>
              <th rowspan="2"><strong>Observaciones</strong></th>
              <tr>
                <th>l</th>
                <th>m</th>
                <th>m</th>
                <th>j</th>
                <th>v</th>
                <th>s</th>
                <th>d</th>
            </tr>
                 
            </tr>
          </thead>
          <tbody style="font-size: 12px!important;" align="center">
          <?php foreach ($detalle_recurso as $key => $value){ ?>
                    <tr>
                        <td><?= $value->nombres ?> <?= $value->apellido_paterno ?> <?= $value->apellido_materno ?></td>
                        <td><?= $value->transporte ?></td>
                        <td><?= $value->hospedaje ?></td>
                        <td><?= $value->casetas ?></td>
                        <?php $fecha_inicio = substr($value->fechas, 0, -13); ?>
                                            <?php $fecha_final = substr($value->fechas, -10); ?>
                                            <?php $fecha_inicio_guion = str_replace('/','-',$fecha_inicio); ?>
                                            <?php $fecha_final_guion = str_replace('/','-',$fecha_final); ?>
                                            
                                            
                                            <?php
                                                $fechaInicio=strtotime($fecha_inicio_guion);
                                                $fechaFin=strtotime($fecha_final_guion);
                                                $lunes = 0;
                                                $martes = 0;
                                                $miercoles = 0;
                                                $jueves = 0;
                                                $viernes = 0;
                                                $sabado = 0;
                                                $domingo = 0;
                                                for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                                                    
                                                    if(date('w', $i) == 1){
                                                        $lunes = date("d", $i);
                                                    }elseif(date('w', $i) == 2){
                                                        $martes = date("d", $i);
                                                    }elseif(date('w', $i) == 3){
                                                        $miercoles = date("d", $i);
                                                    }elseif(date('w', $i) == 4){
                                                        $jueves = date("d", $i);
                                                    }elseif(date('w', $i) == 5){
                                                        $viernes = date("d", $i);
                                                    }elseif(date('w', $i) == 6){
                                                        $sabado = date("d", $i);
                                                    }elseif(date('w', $i) == 0){
                                                        $domingo = date("d", $i);
                                                    }
                                                    
                                                }
                                            ?>
                        <td><?= $value->lunes == 1 ? $lunes : '' ?></td>
                        <td><?= $value->martes == 1 ? $martes : '' ?></td>
                        <td><?= $value->miercoles == 1 ? $miercoles : '' ?></td>
                        <td><?= $value->jueves == 1 ? $jueves : '' ?></td>
                        <td><?= $value->viernes == 1 ? $viernes : '' ?></td>
                        <td><?= $value->sabado == 1 ? $sabado : '' ?></td>
                        <td><?= $value->domingo == 1 ? $domingo : '' ?></td>
                        <td><?= $value->fechas ?></td>
                        <td><?= $value->total ?></td>
                        <td><?= $value->observaciones ?></td>
                    </tr>                        

            <?php } ?>
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
              <td colspan="2" align="center">Fecha y firma del Jefe inmediato</td>
              <td colspan="2" align="center">Fecha y firma de Gestion de Talento</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<section style="display: none;">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body" id="printableAreaAlimentos">
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
              <td class="" colspan="1" rowspan="2" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 80px;">
              </td>
              <td colspan="5" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <strong>ESTEVEZJOR SERVICIOS S.A DE C.V</strong>
              </td>
              <td colspan="2" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 10pt;">
                <strong>Código: DAF-FO-CN-002</strong>
              </td>
              <tr>
              <td colspan="5" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <strong>VIÁTICOS</strong>
              </td>
              <td colspan="2" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 10pt;">
                <strong>Revisión: 00</strong>
              </td>
             
              
       
        </tr>
        
            </tr>
                                                                                            
                </tbody>              
        </table>

        <table id="datos_solicitud" style="width: 100%;font-size: 12px;margin-top: 10px; border-collapse: collapse;" cellpadding="4" cellspacing="0">                                 
                <tbody>
                <tr>
                    <td colspan="4" class="" style="vertical-align: middle; text-align: center;  font-size: 16pt;">
                    <strong>&nbsp;</strong>
                    </td>
                    <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                        <strong>Fecha de solicitud:</strong>
                    </td>
                    <td colspan="1" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                        <p><?= $detalle[0]->fecha_creacion ?></p>
                    </td>
                </tr>
              <tr>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Proyecto:</strong>
                </td>
                <td colspan="2" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p><?= $detalle[0]->numero_proyecto ?> - <?= $detalle[0]->nombre_proyecto ?></p>
                </td>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Mercado:</strong>
                </td>
                <td colspan="2" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p><?= $detalle[0]->ubicacion ?></p>
                </td>
            </tr>

            <tr>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>PM a cargo:</strong>
                </td>
                <td colspan="1" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p><?= $detalle[0]->nombre_aprobacion ?></p>
                </td>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Fecha de Salida:</strong>
                </td>
                <td colspan="1" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p>21/04/2023</p>
                </td>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Fecha de Llegada:</strong>
                </td>
                <td colspan="1" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p>21/04/2023</p>
                </td>
            </tr>
                                                                                            
                </tbody>              
        </table>
                                                                              
        <table style="width: 100%;margin-top: 15px;" border="1" cellpadding="4" cellspacing="0" align="center">
          <thead style="font-size: 12px!important; background-color: #00B0F0;">
            <tr>
              <th rowspan="2"><strong>Nombre completo</strong></th>
              <th rowspan="2"><strong>Alimentos(Monto)</strong></th>   
              <th rowspan="1" colspan="7"><strong>Días a laborar</strong></th>
              <th rowspan="2"><strong>Fechas</strong></th>
              <th rowspan="2"><strong>Monto Total</strong></th>
              <th rowspan="2"><strong>Observaciones</strong></th>
              <tr>
                <th>l</th>
                <th>m</th>
                <th>m</th>
                <th>j</th>
                <th>v</th>
                <th>s</th>
                <th>d</th>
            </tr>
                 
            </tr>
          </thead>
          <tbody style="font-size: 12px!important;" align="center">
          <?php foreach ($detalle_recurso as $key => $value){ ?>
                    <tr>
                        <td><?= $value->nombres ?> <?= $value->apellido_paterno ?> <?= $value->apellido_materno ?></td>
                        
                        <td><?= $value->alimentos ?></td>
                        <td><?= $value->lunes == 1 ? 'X' : '' ?></td>
                        <td><?= $value->martes == 1 ? 'X' : '' ?></td>
                        <td><?= $value->miercoles == 1 ? 'X' : '' ?></td>
                        <td><?= $value->jueves == 1 ? 'X' : '' ?></td>
                        <td><?= $value->viernes == 1 ? 'X' : '' ?></td>
                        <td><?= $value->sabado == 1 ? 'X' : '' ?></td>
                        <td><?= $value->domingo == 1 ? 'X' : '' ?></td>
                        <td><?= $value->fechas ?></td>
                        <td><?= $value->total ?></td>
                        <td><?= $value->observaciones ?></td>
                    </tr>                        

            <?php } ?>
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
              <td colspan="2" align="center">Fecha y firma del Jefe inmediato</td>
              <td colspan="2" align="center">Fecha y firma de Gestion de Talento</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>


<section style="display: none;">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body" id="printableAreaSemanal">
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
              <td class="" colspan="1" rowspan="2" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 80px;">
              </td>
              <td colspan="5" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <strong>ESTEVEZJOR SERVICIOS S.A DE C.V</strong>
              </td>
              <td colspan="2" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 10pt;">
                <strong>Código: DAF-FO-CN-002</strong>
              </td>
              <tr>
              <td colspan="5" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 16pt;">
                <strong>VIÁTICOS SEMANAL</strong>
              </td>
              <td colspan="2" class="b_top" style="vertical-align: middle; text-align: center; border: 1px solid #000; font-size: 10pt;">
                <strong>Revisión: 00</strong>
              </td>
             
              
       
        </tr>
        
            </tr>
                                                                                            
                </tbody>              
        </table>

        <table id="datos_solicitud" style="width: 100%;font-size: 12px;margin-top: 10px; border-collapse: collapse;" cellpadding="4" cellspacing="0">                                 
                <tbody>
               
              <tr>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Proyecto:</strong>
                </td>
                <td colspan="2" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p><?= $detalle[0]->numero_proyecto ?> - <?= $detalle[0]->nombre_proyecto ?></p>
                </td>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>Mercado:</strong>
                </td>
                <td colspan="2" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p><?= $detalle[0]->ubicacion ?></p>
                </td>
            </tr>

            <tr>
                <td colspan="1" class="" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                    <strong>PM a cargo:</strong>
                </td>
                <td colspan="5" class="b_bottom" style="vertical-align: middle; text-align: center;  font-size: 10pt;">
                <p><?= $detalle[0]->nombre_aprobacion ?></p>
                </td>
                
            </tr>
                                                                                            
                </tbody>              
        </table>
                                                                              
        <table style="width: 100%;margin-top: 15px;" border="1" cellpadding="4" cellspacing="0" align="center">
          <thead style="font-size: 12px!important; background-color: #00B0F0;">
            <tr>
              <th rowspan="2"><strong>Nombre completo</strong></th>
              <th rowspan="2"><strong>Cargo</strong></th>
              <th rowspan="2"><strong>Cuadrilla</strong></th>
              <th rowspan="2"><strong>Días a Laborar</strong></th>
              <th rowspan="2"><strong>Cantidad</strong></th>   
              <th rowspan="1" colspan="7"><strong>Calendario</strong></th>
              <th rowspan="2"><strong>Días a descontar</strong></th>
              <th rowspan="2"><strong>Descuento</strong></th>
              <th rowspan="1" colspan="7"><strong>Calendario</strong></th>
              
              <th rowspan="2"><strong>Total</strong></th>
              <th rowspan="2"><strong>Observaciones</strong></th>
              
              <tr>
                <th>l</th>
                <th>m</th>
                <th>m</th>
                <th>j</th>
                <th>v</th>
                <th>s</th>
                <th>d</th>
                <th>l</th>
                <th>m</th>
                <th>m</th>
                <th>j</th>
                <th>v</th>
                <th>s</th>
                <th>d</th>
            </tr>
                 
            </tr>
          </thead>
          <tbody style="font-size: 12px!important;" align="center">
          <?php foreach ($detalle_recurso as $key => $value){ ?>
                                        <tr>
                                            <td><?= $value->nombres ?> <?= $value->apellido_paterno ?> <?= $value->apellido_materno ?></td>
                                            <td><?= $value->perfil ?></td>
                                            <td><?= $value->nombre_cuadrilla ?></td>
                                            <td><?= $value->dias_laborar ?></td>
                                            <td><?= $value->cantidad_dia ?></td>
                                            <td><?= $value->lunes == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->martes == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->miercoles == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->jueves == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->viernes == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->sabado == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->domingo == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->dias_descontar ?></td>
                                            <td><?= $value->descuento ?></td>
                                            <td><?= $value->lunes_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->martes_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->miercoles_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->jueves_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->viernes_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->sabado_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->domingo_descuento == 1 ? 'X' : '' ?></td>
                                            <td><?= $value->total ?></td>
                                            <td><?= $value->observaciones ?></td>
                                        </tr>                        

                                    <?php } ?>
          </tbody>
        </table>
        <br>              
        <!--<table style="width: 100%;margin-top: 150px;" border="0" cellpadding="4" cellspacing="0" align="center">
          <tbody style="font-size: 12px!important;" align="center">                                                
            <tr>
              <td colspan="2" align="center">____________________________</td>
              <td colspan="2" align="center">____________________________</td>              
            </tr>

            <tr>
              <td colspan="2" align="center">Fecha y firma del Jefe inmediato</td>
              <td colspan="2" align="center">Fecha y firma de Gestion de Talento</td>
            </tr>
          </tbody>
        </table>-->
      </div>
    </div>
  </div>
</section>

<style type="text/css" media="print">
@media print {
    #salida_material {
        padding-top: 0;
    }

    #salida_material table td {
        border: none;
    }

    body {
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
    }
    #documento_multa{
        font-size: 18px;
    }
    #documento_multa .row{
        margin:0px;
    }
    #documento_multa table tr td{
        padding: 5px;
        text-align: center;
        font-size: 18px;
    }
}
</style>
<div class="container-fluid" style="display: none">
  <div class="card" id="salida_material" >
    <div class="row">
      <div class="col-12">
        <br><br>
          <table class="" style="width:100%" border="0" cellpadding="4" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="" style="text-align: left" width="30%" rowspan="2">
                                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png"
                                    style="display: inline-block; width: 120px;">
                            </th>
                            <th class="" width="50%" style="vertical-align: middle; text-align: center; font-size: 20px;">
                                &nbsp;
                            </th>
                            <th class=""
                                style="vertical-align: middle; text-align: center; font-size: 20px;" width="25%">
                                <strong>&nbsp;</strong>
                            </th>
                        </tr>
                        <tr>
                            <th class="" width="50%" style="vertical-align: middle; text-align: center; font-size: 20px;">
                                &nbsp;
                            </th>
                            <th class="" width="50%" style="vertical-align: middle; text-align: center; font-size: 20px;">
                                &nbsp;
                            </th>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle; text-align: left; font-size: 15px;">ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.</th>
                        </tr>
                    </thead>
            </table>
            <p style="color:#00BFFF;">______________________________________________________________________________________________________</p>

      </div>
    </div>
    <div class="row">
      <div class="col-12">&nbsp;</div>
      <br><br>
      <div class="col-4"></div>      
      <div class="col-8" style="text-align: center;font-size: 20px;">
        <?php setlocale(LC_ALL, 'es_ES'); ?>
        Tlalnepantla de Baz, Estado de México a <?= date('d') ?> de <?=strftime('%B')?> del <?= date('Y') ?>
      </div>
      
      <br><br><br>
      <div class="col-12">
        <p style="font-size: 25px; text-align:center;">CARTA RESPONSIVA</p>
        <!--<h1 style="font-size: 25px;">Nombre: <span class="operador"></span></h1>-->
      </div>
      <br><br><br>
      <div class="col-12">
        <p style="font-size: 25px; text-align:center;">ASIGNACIÓN DE FONDOS</p>
        <!--<h1 style="font-size: 25px;">Nombre: <span class="operador"></span></h1>-->
      </div>
      <br><br><br>
      <div class="col-12">
        <p style="font-size: 25px;text-align: justify;">Yo hago constar que recibo un importe de $<strong><span class="costo"></span> (<span class="letras"></span>)</strong> por concepto de: <b>Fondo Fijo Caja Chica</b> del cual me responsabilizo sobre su buen uso y resguardo, por lo que, me compremeto a utilizarlos para los fines que han sido constituidos, entendiendo y asumiendo las consecuencias a que me puedo hacer acreedor por la desviación de estos recursos financieros.</p>
      </div>            
      <br><br><br><br><br>
      <div class="col-12">
        <p style="font-size: 25px;">Así mismo, hago constar que tengo pleno conocimiento de que dichos valores son propiedad de Estevez.Jor Servicios, S.A de C.V.; por lo que acepto la responsabilidad del manejo de estos a partir del día <?= date('d') ?> de <?=strftime('%B')?> del <?= date('Y') ?>.</p>
      </div>
      <br><br>
      <div style="position: fixed;bottom: 0;width: 100%" class="container-fluid bg-light text-center p-3">
        <div class="row">
            <div class="col-12">
        <p style="font-size: 25px;">Responsable</p><br><br><br>
        <p>____________________________________________</p>
        <!--<p style="font-size: 25px;"><strong><span class="operador"></span></strong></p>-->
        <p style="font-size: 25px;">Nombre y firma</p>
        <br><br><br>
        </div>
        </div>
        <div class="row">
            <div class="col-6">
        <p style="font-size: 25px;">Vo. Bo.</p><br><br><br>
        <p>____________________________________________</p>
        <!--<p style="font-size: 25px;"><strong><span class="operador"></span></strong></p>-->
        <p style="font-size: 25px;">Lic. Elizabeth González Herrera</p>
        <p style="font-size: 25px;">Director de Administración y Finanzas</p>
        <br><br><br>
        </div>
        <div class="col-6">
        <p style="font-size: 25px;">Vo. Bo.</p><br><br><br>
        <p>____________________________________________</p>
        <!--<p style="font-size: 25px;"><strong><span class="operador"></span></strong></p>-->
        <p style="font-size: 25px;">Dra. Maria Fernanda Estevez González</p>
        <p style="font-size: 25px;">Director General</p>
        <br><br><br>
        </div>
        </div>
        <p style="color:#00BFFF;">______________________________________________________________________________________________________</p>
        <p style="font-size: 20px;color:#00BFFF;">CALLE FILIBERTO GOMEZ # 46, CP 54030, COL. CENTRO INDUSTRIAL TLALNEPANTLA, TLALNTEPANTLA DE BAZ</p>
        <p style="font-size: 20px;color:#00BFFF;">TEL. (55) 6552-9100, 6552-9101</p>
      </div>
    </div>
</div>
</div>

<script>

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



$(document).on('keyup', '.transporte', function (event) {
    var index = $(this).data('index');
    var transporte = $('#transporte_'+index).val();
    
    var hospedaje = $('#hospedaje_'+index).val();
    var casetas = $('#casetas_'+index).val();
    var alimentos = $('#alimentos_'+index).val();
  
    if((transporte != '' && transporte != null) && (hospedaje != '' && hospedaje != null) && (casetas != '' && casetas != null)){
      calculo_monto(index, transporte, hospedaje, casetas);
    }
  });

  $(document).on('keyup', '.hospedaje', function (event) {
    var index = $(this).data('index');
    var transporte = $('#transporte_'+index).val();
    var hospedaje = $('#hospedaje_'+index).val();
    var casetas = $('#casetas_'+index).val();
    var alimentos = $('#alimentos_'+index).val();
  
    if((transporte != '' && transporte != null) && (hospedaje != '' && hospedaje != null) && (casetas != '' && casetas != null)){
      calculo_monto(index, transporte, hospedaje, casetas);
    }
  });

  $(document).on('keyup', '.casetas', function (event) {
    var index = $(this).data('index');
    var transporte = $('#transporte_'+index).val();
    var hospedaje = $('#hospedaje_'+index).val();
    var casetas = $('#casetas_'+index).val();
    var alimentos = $('#alimentos_'+index).val();
  
    if((transporte != '' && transporte != null) && (hospedaje != '' && hospedaje != null) && (casetas != '' && casetas != null)){
      calculo_monto(index, transporte, hospedaje, casetas);
    }
  });

  /*$(document).on('keyup', '.alimentos', function (event) {
    var index = $(this).data('index');
    var transporte = $('#transporte_'+index).val();
    var hospedaje = $('#hospedaje_'+index).val();
    var casetas = $('#casetas_'+index).val();
    var alimentos = $('#alimentos_'+index).val();
  
    if((transporte != '' || transporte != null) && (hospedaje != '' || hospedaje != null) && (casetas != '' || casetas != null) && (alimentos != '' || alimentos != null)){
      calculo_monto(index, transporte, hospedaje, casetas, alimentos);
    }
  });*/

  $(document).on('keyup', '.dias_laborar', function (event) {
    var index = $(this).data('index');
    var dias_laborar = $('#dias_laborar_'+index).val();
    var descuento = $('#descuento_'+index).val();
    var cantidad = $('#cantidad_laborar_'+index).val();
    var dias_descontar = $('#dias_descontar_'+index).val();
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_cuad(index, dias_laborar, descuento, cantidad, dias_descontar);
    }
  });
  
  $(document).on('keyup', '.cantidad', function (event) {
    var index = $(this).data('index');
    var dias_laborar = $('#dias_laborar_'+index).val();
    var descuento = $('#descuento_'+index).val();
    var cantidad = $('#cantidad_laborar_'+index).val();
    var dias_descontar = $('#dias_descontar_'+index).val();
    if((cantidad != '' || cantidad != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_descuento_cuad(index, dias_descontar, cantidad);
    }
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_cuad(index, dias_laborar, descuento, cantidad, dias_descontar);
    }
  });
  $(document).on('keyup', '.dias_descontar', function (event) {
    var index = $(this).data('index');
    var dias_laborar = $('#dias_laborar_'+index).val();
    
    var cantidad = $('#cantidad_laborar_'+index).val();
    var dias_descontar = $('#dias_descontar_'+index).val();
    if((cantidad != '' || cantidad != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_descuento_cuad(index, dias_descontar, cantidad);
    }
    var descuento = $('#descuento_'+index).val();
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_cuad(index, dias_laborar, descuento, cantidad, dias_descontar);
    }
  });


  $(document).on('keyup', '#dias_laborar', function (event) {
    var dias_laborar = $('#dias_laborar').val();
    var descuento = $('#descuento').val();
    var cantidad = $('#cantidad_laborar').val();
    var dias_descontar = $('#dias_descontar').val();
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo();
    }
  });
  
  $(document).on('keyup', '#cantidad', function (event) {
    var dias_laborar = $('#dias_laborar').val();
    var descuento = $('#descuento').val();
    var cantidad = $('#cantidad_laborar').val();
    var dias_descontar = $('#dias_descontar').val();
    if((cantidad != '' || cantidad != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_descuento();
    }
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo();
    }
  });
  $(document).on('keyup', '#dias_descontar', function (event) {
    var dias_laborar = $('#dias_laborar').val();
    var descuento = $('#descuento').val();
    var cantidad = $('#cantidad_laborar').val();
    var dias_descontar = $('#dias_descontar').val();
    if((cantidad != '' || cantidad != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_descuento();
    }
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo();
    }
  });
  
$('#aprobar').click(function(event) {
    event.preventDefault();
    var tipo = <?= $this->session->userdata('tipo')?>;
    var user = <?= $this->session->userdata('id')?>;
    var estatus = $(this).val();

    var formData = new FormData(document.getElementById("form-checklist"));
    formData.append("estatus", estatus);
    formData.append("tipo", '<?= $detalle[0]->tipo ?>');
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea aprobar <?= $detalle[0]->tipo ?>?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url() ?>almacen/aprobar_caja_chica/aprobar",
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

$('#regresar_pm').click(function(event) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea regresar la solicitud?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $("#regresarModal").modal("show");
        }
    })
});

$('#btnRegresar').click(function(event) {
    event.preventDefault();
   

    var formData = new FormData(document.getElementById("formuploadajax_regresar"));

            $.ajax({
                url: "<?= base_url() ?>almacen/regresar_viaticos/",
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
       
});



function imprimirFormato() {
    price = $("input[name='costo']").val();

    letras = numeroALetras(price, {
      plural: "PESOS",
      singular: "PESO",
      centPlural: "a",
      centSingular: "a"
    });
    $(".letras").html('');
    $(".concepto").html('');
    $(".costo").html('');

    $(".costo").html(price);
    $(".letras").html(letras);
    $("#salida_material").print({
        iframe: true,
        globalStyles: true,
        mediaPrint: true,
        noPrintSelector: '.no-print'
    });
  }

$('#cancelar').click(function(event) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea cancelar la caja chica?",
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
        url: "<?= base_url()?>almacen/cancelar_recurso",
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
                location.href = "<?= base_url() ?>almacen/caja_chica";
            } else {
                Toast.fire({
                    type: 'error',
                    title: resp.mensaje
                });
            }
        }
    });
});
$('#finalizar').click(function(event) {
    //alert('si');
    //var $form = $(this);

        var proceso = 'finalizar';
    //var f = $(this);    
    if (event.isDefaultPrevented()) {
        console.log('Error');
        //alert('entro');
    } else {
        //alert('se hará bien');
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea aprobar la caja chica?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("form-checklist"));
        $.ajax({
            url: "<?= base_url()?>almacen/aprobar_caja_chica/"+proceso,
            type: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if (resp.error == false) {
                    Toast.fire({
                        type: 'success',
                        title: resp.message
                    });
                        location.href = "<?= base_url() ?>almacen/caja_chica";
                    
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
    }
});
</script>


<script>


function calculo(){
    var dias_laborar = parseInt($('#dias_laborar').val());
    var cantidad_laborar = parseInt($('#cantidad_laborar').val());
    var descuento = parseInt($('#descuento').val());
    var dias_descontar = parseInt($('#dias_descontar').val());

    console.log(dias_laborar,cantidad_laborar,descuento,dias_descontar);
    var calculo = (dias_laborar * cantidad_laborar) - descuento;
    $('#total').val(calculo);
    var cantidad_total = 0;
    $('.total').each(function(){
        var monto_total=$(this).val();
        cantidad_total = cantidad_total + parseInt(monto_total);
        $('#cantidad').val(cantidad_total);
    });
}

function calculo_descuento(){
    var dias_laborar = parseInt($('#dias_laborar').val());
    var cantidad_laborar = parseInt($('#cantidad_laborar').val());
    var dias_descontar = parseInt($('#dias_descontar').val());

    console.log(dias_descontar,cantidad_laborar);
    var calculo = dias_descontar * cantidad_laborar;
    $('#descuento').val(calculo);
}

function calculo_cuad(index, dias_laborar, descuento, cantidad, dias_descontar){
    
    //alert(descuento);
    //console.log(dias_laborar,cantidad,descuento,dias_descontar);
    var calculo = (dias_laborar * cantidad) - descuento;
    //alert(calculo);
    $('#total_'+index).val(calculo);
    var cantidad_total = 0;
    $('.total').each(function(){
        var monto_total=$(this).val();
        cantidad_total = cantidad_total + parseInt(monto_total);
        
        $('#cantidad').val(cantidad_total);
    });
}

function calculo_descuento_cuad(index, dias_descontar, cantidad){
    

    //console.log(dias_descontar,cantidad);
    var calculo = dias_descontar * cantidad;
    //alert(calculo);
    $('#descuento_'+index).val(calculo);
}

function calculo_monto(index, transporte, hospedaje, casetas){
    
    console.log(index,transporte,hospedaje,casetas);
    var total = parseInt(transporte)+parseInt(hospedaje)+parseInt(casetas);
    //alert(calculo);
    var cantidad = $('#cantidad').val();
    $('#total_'+index).val(total);
    var cantidad_total = 0;
    $('.total').each(function(){
        var monto_total=$(this).val();
        cantidad_total = cantidad_total + parseInt(monto_total);
        //alert(cantidad_total);
        $('#cantidad').val(cantidad_total);
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

var numeroALetras = (function() {
    // Código basado en el comentario de @sapienman
    // Código basado en https://gist.github.com/alfchee/e563340276f89b22042a
    function Unidades(num) {

        switch (num) {
            case 1:
                return 'UN';
            case 2:
                return 'DOS';
            case 3:
                return 'TRES';
            case 4:
                return 'CUATRO';
            case 5:
                return 'CINCO';
            case 6:
                return 'SEIS';
            case 7:
                return 'SIETE';
            case 8:
                return 'OCHO';
            case 9:
                return 'NUEVE';
        }

        return '';
    } //Unidades()

    function Decenas(num) {

        let decena = Math.floor(num / 10);
        let unidad = num - (decena * 10);

        switch (decena) {
            case 1:
                switch (unidad) {
                    case 0:
                        return 'DIEZ';
                    case 1:
                        return 'ONCE';
                    case 2:
                        return 'DOCE';
                    case 3:
                        return 'TRECE';
                    case 4:
                        return 'CATORCE';
                    case 5:
                        return 'QUINCE';
                    default:
                        return 'DIECI' + Unidades(unidad);
                }
            case 2:
                switch (unidad) {
                    case 0:
                        return 'VEINTE';
                    default:
                        return 'VEINTI' + Unidades(unidad);
                }
            case 3:
                return DecenasY('TREINTA', unidad);
            case 4:
                return DecenasY('CUARENTA', unidad);
            case 5:
                return DecenasY('CINCUENTA', unidad);
            case 6:
                return DecenasY('SESENTA', unidad);
            case 7:
                return DecenasY('SETENTA', unidad);
            case 8:
                return DecenasY('OCHENTA', unidad);
            case 9:
                return DecenasY('NOVENTA', unidad);
            case 0:
                return Unidades(unidad);
        }
    } //Unidades()

    function DecenasY(strSin, numUnidades) {
        if (numUnidades > 0)
            return strSin + ' Y ' + Unidades(numUnidades)

        return strSin;
    } //DecenasY()

    function Centenas(num) {
        let centenas = Math.floor(num / 100);
        let decenas = num - (centenas * 100);

        switch (centenas) {
            case 1:
                if (decenas > 0)
                    return 'CIENTO ' + Decenas(decenas);
                return 'CIEN';
            case 2:
                return 'DOSCIENTOS ' + Decenas(decenas);
            case 3:
                return 'TRESCIENTOS ' + Decenas(decenas);
            case 4:
                return 'CUATROCIENTOS ' + Decenas(decenas);
            case 5:
                return 'QUINIENTOS ' + Decenas(decenas);
            case 6:
                return 'SEISCIENTOS ' + Decenas(decenas);
            case 7:
                return 'SETECIENTOS ' + Decenas(decenas);
            case 8:
                return 'OCHOCIENTOS ' + Decenas(decenas);
            case 9:
                return 'NOVECIENTOS ' + Decenas(decenas);
        }

        return Decenas(decenas);
    } //Centenas()

    function Seccion(num, divisor, strSingular, strPlural) {
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let letras = '';

        if (cientos > 0)
            if (cientos > 1)
                letras = Centenas(cientos) + ' ' + strPlural;
            else
                letras = strSingular;

        if (resto > 0)
            letras += '';

        return letras;
    } //Seccion()

    function Miles(num) {
        let divisor = 1000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMiles = Seccion(num, divisor, 'UN MIL', 'MIL');
        let strCentenas = Centenas(resto);

        if (strMiles == '')
            return strCentenas;

        return strMiles + ' ' + strCentenas;
    } //Miles()

    function Millones(num) {
        let divisor = 1000000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMillones = Seccion(num, divisor, 'UN MILLON DE', 'MILLONES DE');
        let strMiles = Miles(resto);

        if (strMillones == '')
            return strMiles;

        return strMillones + ' ' + strMiles;
    } //Millones()

    return function NumeroALetras(num, currency) {
        currency = currency || {};
        let data = {
            numero: num,
            enteros: Math.floor(num),
            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
            letrasCentavos: '',
            letrasMonedaPlural: currency.plural || 'PESOS CHILENOS', //'PESOS', 'Dólares', 'Bolívares', 'etcs'
            letrasMonedaSingular: currency.singular || 'PESO CHILENO', //'PESO', 'Dólar', 'Bolivar', 'etc'
            letrasMonedaCentavoPlural: currency.centPlural || 'CHIQUI PESOS CHILENOS',
            letrasMonedaCentavoSingular: currency.centSingular || 'CHIQUI PESO CHILENO'
        };

        //if (data.centavos > 0) {
            data.letrasCentavos = data.centavos + "/100 MN";
            /*data.letrasCentavos = 'CON ' + (function() {
                if (data.centavos == 1)
                    return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
                else
                    return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
            })();*/
        //};

        if (data.enteros == 0)
            return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
        if (data.enteros == 1)
            return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
        else
            return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    };

})();


<?php if($detalle[0]->tipo_viatico == 'traslado'){ ?>
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


  function imprimirElementoAlimentos(elemento) {
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
document.querySelector("#btnImprimirDivAlimentos").addEventListener("click", function() {
    imprimirElemento('printableAreaAlimentos');
  });
<?php }else{ ?>

  function imprimirElementoSemanal(elemento) {
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
document.querySelector("#btnImprimirDivSemanal").addEventListener("click", function() {
    imprimirElementoSemanal('printableAreaSemanal');
  });

  <?php } ?>
  
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
    var canvas6 = document.getElementById("draw-canvas6");
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


$("#guardar_firma").click(function(event) {
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
            url: "<?= base_url()?>almacen/guardarFirma",
            type: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
            $('.card-body').addClass('load');          
          },  
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if (resp.status) {
                    Toast.fire({
                        type: 'success',
                        title: resp.message
                    })
                    location.href = "<?= base_url() ?>almacen/caja_chica";
                } else {
                    Toast.fire({
                        type: 'error',
                        title: resp.message
                    })
                }
            }
        }).done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.card-body').removeClass('load');
  });
    }
});
</script>