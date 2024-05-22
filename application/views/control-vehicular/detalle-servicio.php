<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4 class="h4">Servicio <?= $detalle[0]->numero_interno ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="grid-form">
                            <fieldset>
                                <div data-row-span="8">
                                    <div data-field-span="1">
                                        <label>Folio</label>
                                        <?= $detalle[0]->idtbl_tramites_vehiculares ?>
                                    </div>
                                    <div data-field-span="3">
                                        <label>Fecha Programada</label>
                                        <?= $detalle[0]->fecha_tramite ?>
                                    </div>
                                    <div data-field-span="3">
                                        <label>Kilometraje</label>
                                        <?= $detalle[0]->kilometraje ?>
                                    </div>
                                </div>
                                <div data-row-span="8">
                                    <div data-field-span="4">
                                        <label>Autor</label>
                                        <?= $detalle[0]->autor ?>
                                    </div>
                                    <div data-field-span="4">
                                        <label>Mecánico</label>
                                        <?= $detalle[0]->mecanico ?>
                                    </div>
                                </div>
                                <div data-row-span="8">
                                    <div data-field-span="3">
                                        <label>Número de serie</label>
                                        <?= $detalle[0]->numero_serie ?>
                                    </div>
                                    <div data-field-span="3">
                                        <label>Placas</label>
                                        <?= $detalle[0]->placas ?>
                                    </div>
                                    <div data-field-span="2">
                                        <label>N° Motor</label>
                                        <?= $detalle[0]->no_motor ?>
                                    </div>
                                </div>
                                <div data-row-span="8">
                                    <div data-field-span="4">
                                        <label>Tipo Vehiculo</label>
                                        <?= $detalle[0]->tipo_vehiculo ?>
                                    </div>
                                    <div data-field-span="4">
                                        <label>Descripción Vehiculo</label>
                                        <?= $detalle[0]->descripcion ?>
                                    </div>
                                </div>
                                <div data-row-span="8">
                                    <div data-field-span="3">
                                        <label>Marca</label>
                                        <?= $detalle[0]->marca ?>
                                    </div>
                                    <div data-field-span="3">
                                        <label>Modelo</label>
                                        <?= $detalle[0]->modelo ?>
                                    </div>
                                </div>
                                <div data-row-span="8">
                                    <div data-field-span="8">
                                        <label>Proyecto</label>
                                        <?php if($detalle[0]->tbl_proyectos_idtbl_proyectos != NULL){ ?>
                                            <?= $detalle[0]->numero_proyecto . " " .$detalle[0]->nombre_proyecto ?>
                                        <?php }else{ ?>
                                            No proyecto
                                        <?php } ?>
                                    </div>
                                </div>
                                <div data-row-span="8">
                                    <div data-field-span="8">
                                        <label>Detalle del Servicio</label>
                                        <?= $detalle[0]->detalle_tramite ?>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="pt-4 pb-4" id="caja_chica_tabla">
                            <h4>Refacciones Caja Chica</h4>
                            <table class="table table-striped" id="tbcajachica">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Uid</th>
                                        <th>Proyecto</th>
                                        <th>Fecha Compra</th>
                                        <th>Monto</th>
                                        <th>Descripción</th>
                                        <th>Comprobante</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Uid</th>
                                        <th>Proyecto</th>
                                        <th>Fecha Compra</th>
                                        <th>Monto</th>
                                        <th>Descripción</th>
                                        <th>Comprobante</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php if($this->session->userdata('id') == 66 || $this->session->userdata('id') == 157){ ?>
                            <a href='#caja_chica_modal' data-toggle='modal' data-action="new" type="button" class="btn btn-success mt-4 mb-4">Refacciones Caja Chica</a>
                        <?php } ?>
                        <?php if(isset($detalle_solicitud_refacciones_cancelado) && !empty($detalle_solicitud_refacciones_cancelado)){ ?>
                            <h3 class="mt-5">Solictid de Refacciones Canceladas</h3>
                            <div class="table-responsive">
                                <table class="table" style="margin: 10px auto;">
                                    <thead>
                                        <tr>
                                            <th>UID</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detalle_solicitud_refacciones_cancelado as $value) { ?>
                                            <tr>
                                                <td><?= $value->uid ?></td>
                                                <td class="text-danger font-weight-bold"><?= $value->estatus_solicitud ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>UID</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        <?php } ?>
                        <?php if($detalle[0]->estatus == "FINALIZADO" AND empty($detalle_solicitud_refacciones)){ ?>
                            <h3 class="mt-5">Sin Solicitud de Refacciones.</h3>
                        <?php } ?>
                        <?php if(($detalle[0]->estatus == "SRCV" AND !empty($detalle_solicitud_refacciones)) OR ($detalle[0]->estatus == "FINALIZADO" AND !empty($detalle_solicitud_refacciones))){ ?>
                        <h3 class="mt-5">Solictid de Refacciones</h3>
                        <div class="table-responsive">
                            <table class="table" style="margin: 10px auto;">
                                <thead>
                                    <tr>
                                        <th>Neodata</th>
                                        <th>UID Solicitud</th>
                                        <th>Descripción</th>
                                        <th>Solicitado</th>
                                        <th>Entregado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $estatusFinalizado = true; 
                                        foreach ($detalle_solicitud_refacciones as $value) { 
                                    ?>
                                        <tr class="<?= $value->estatus_solicitud == "SRCV" ? 'table-success' : '' ?>" >
                                            <td><?= $value->neodata ?></td>
                                            <td><?= $value->uid_tbl_solicitud_material ?></td>
                                            <td><?= $value->marca . " " . $value->modelo . " (" . $value->descripcion .")" ?></td>
                                            <td><?= $value->cantidad ?></td>
                                            <td><?= $value->entregado ?></td>
                                        </tr>
                                    <?php
                                            if($value->estatus_solicitud != "SRCV"){
                                                $estatusFinalizado = false;
                                            } 
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Neodata</th>
                                        <th>UID Solicitud</th>
                                        <th>Descripción</th>
                                        <th>Solicitado</th>
                                        <th>Entregado</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php if($detalle[0]->estatus == "SRCV" && $detalle_solicitud_refacciones[0]->estatus_solicitud != 'SRCV'){ ?>
                            <p class="text-danger font-weight-bold">En espera de refacciones.</p>
                        <?php } ?>
                        <?php } ?>
                        <input type="hidden" id="servicio" name="servicio" value="<?= $detalle[0]->iddtl_servicio ?>">
                        <input type="hidden" id="uid" name="uid" value="<?= $detalle[0]->uid ?>">
                        <br><br>
                        <?php if($detalle[0]->fecha_inicio == NULL && $detalle[0]->estatus == "SA" && ($this->session->userdata('permisos')['servicios_mecanicos'] == 2 || $this->session->userdata('permisos')['servicios_mecanicos'] == 3)){ ?>
                        <button type="button" id="iniciar_servicio" class="btn-success btn cs">Iniciar Servicio</button>
                        <?php } ?>
                        <?php if($detalle[0]->fecha_inicio != NULL && $detalle[0]->estatus == "SI" && $detalle[0]->fecha_finalizacion == NULL && ($this->session->userdata('permisos')['servicios_mecanicos'] == 2 || $this->session->userdata('permisos')['servicios_mecanicos'] == 3) && $detalle[0]->estatus_proceso != 'pausada'){ ?>
                        <button type="button" id="generar-checklist" class="btn btn-success generar-checklist">Check List Auto</button>                        
                        <?php } ?>
                        <?php if($detalle[0]->fecha_inicio != NULL && ($detalle[0]->estatus == "CL" || $detalle[0]->estatus == "SRCV") && $detalle[0]->fecha_finalizacion == NULL && $detalle[0]->tbl_users_idtbl_users == $this->session->userdata('id') && $detalle[0]->estatus_proceso != 'pausada'){ ?>
                            <button type="button" id="generar-solicitud-refacciones" class="btn btn-success generar-solicitud-refacciones">Solicitud Refacciones CV</button>
                        <?php } ?>
                        <?php if($detalle[0]->estatus_proceso != 'pausada' && $detalle[0]->tbl_users_idtbl_users == $this->session->userdata('id') && $detalle[0]->fecha_inicio != NULL && $detalle[0]->estatus == "CL" || (!empty($detalle_solicitud_refacciones) AND $detalle[0]->estatus == "SRCV" && isset($estatusFinalizado) && $estatusFinalizado)){ ?>
                            <button type="button" id="generar-checklist-tecnico" class="btn btn-success generar-checklist-tecnico">Finalizar Servicio</button>
                        <?php } ?>
                        <br><br>
                        <?php if(isset($checklist)){ ?>                            
                        <h3 class="h3">Checklist</h3>
                        <ul>
                        <button type="button" id="generar-checklist2" class="btn btn-info generar-checklist">Ver Checklist</button>
                        <?php if(isset($checklistTecnico)){ ?>  
                            <button type="button" id="generar-checklist2-tecnico" class="btn btn-info generar-checklist-tecnico">Ver Checklist Técnico</button>
                        <?php } ?>
                        </ul>
                        <?php } ?>
                        <?php if($detalle[0]->estatus_proceso == 'pausada'){ ?>
                            <p class="text-danger font-weight-bold">El servicio esta pausado.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_finalizar_servicio" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SERVICIO DE UNIDAD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-checklist-tab" data-toggle="pill"
                                href="#pills-checklist" role="tab" aria-controls="pills-checklist"
                                aria-selected="true">Checklist</a>
                        </li>
                        <!--<li class="nav-item" id="tab-last-checklist">
            <a class="nav-link" id="pills-last-checklist-tab" data-toggle="pill" href="#pills-last-checklist" role="tab" aria-controls="pills-last-checklist" aria-selected="false">Último Checklist</a>
          </li>-->
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-checklist" role="tabpanel"
                            aria-labelledby="pills-checklist-tab">

                            <?= validation_errors('<span class="error">', '</span>'); ?>
                            <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist"'); ?>
                            <!-- Si el checklist no existe -->
                            <?php if(!isset($checklist)){ ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-8">
                                        <h2 align="center"><?= $detalle[0]->modelo ?></h2>
                                    </div>
                                    <div class="col-4">
                                        <h6 style="font-weight: normal" align="right" class="ecocheck">Folio:
                                            <strong><?= $detalle[0]->idtbl_tramites_vehiculares ?></strong></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <h3 align="center">ORDEN DE MANTENIMIENTO PREVENTIVO-CORRECTIVO</h3>
                                    </div>
                                    <div class="col-3">
                                        <h6 style="font-weight: normal" align="right" class="ecocheck">Fecha:
                                            <strong><?= date('d-m-Y') ?></strong></h6>
                                    </div>
                                </div>
                                <br>
                                <div class="table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="6" style="text-align: center;">
                                                    <h2>Usuario</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Nombre: </th>
                                                <td colspan="2"><?= $detalle[0]->nombreOperador ?>
                                                    <?= $detalle[0]->paternoOperador ?>
                                                    <?= $detalle[0]->maternoOperador ?></td>
                                                <th scope="row" style="text-align: center;">N° Proyecto</th>
                                                <td colspan="2"><select name="nproyecto" class="form-control">
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach($proyectos AS $key => $value){ ?>
                                                        <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto ?></option>
                                                    <?php } ?>
                                                </select></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Departamento: </th>
                                                <td colspan="2">Control Vehicular</td>
                                                <th scope="row" style="text-align: center;">Tecnico Asignado: </th>
                                                <td colspan="2"><?= $detalle[0]->mecanico ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="table">
                                    <table style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th colspan="4" scope="col" style="text-align: center;">CARACTERISTICAS
                                                    DEL EQUIPO</th>
                                                <!--<th scope="col" style="text-align: center;">KM. SALIDA</th>-->
                                                <th scope="col" style="text-align: center;"></th>
                                                <th scope="col" style="text-align: center;">NIVEL GASOLINA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="text-align: center;">ECO</th>
                                                <th scope="row" style="text-align: center;">TIPO</th>
                                                <th scope="row" style="text-align: center;">AÑO</th>
                                                <th scope="row" style="text-align: center;">PLACAS</th>
                                                <!--<td style="text-align: center;"><input type="number" class="form-control"
                                                        name="kmsalida" id="kmsalida" placeholder="KM Salida"></td>-->
                                                <td style="text-align: center;"></td>
                                                <td rowspan="3" style="text-align: center;"><input type="text" class="form-control"
                                                        name="gasolina" id="gasolina" style="height: 110px;" placeholder="Nivel Gasolina"></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2" style="text-align: center;">
                                                    <?= $detalle[0]->numero_interno ?></td>
                                                <td rowspan="2" style="text-align: center;">
                                                    <?= $detalle[0]->tipo_vehiculo ?></td>
                                                <td rowspan="2" style="text-align: center;"><?= $detalle[0]->anio ?></td>
                                                <td rowspan="2" style="text-align: center;"><?= $detalle[0]->placas ?>
                                                </td>
                                                <th scope="row" style="text-align: center;">KM. ENTRADA</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><input type="number" class="form-control"
                                                        name="kmentrada" id="kmentrada" placeholder="KM Entrada" min="<?= $detalle[0]->kilometraje ?>" step="0.01" required></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>EXTERIORES</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t1" value="ALARMA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r1"></td>
                                                        <td><input value="no" required type="radio" name="r1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t2" value="BIRLOS DE SEGURIDAD"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r2"></td>
                                                        <td><input value="no" required type="radio" name="r2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t3" value="CALAVERAS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r3"></td>
                                                        <td><input value="no" required type="radio" name="r3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t4" value="CALCOMANIA VERIFICACION"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r4"></td>
                                                        <td><input value="no" required type="radio" name="r4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t5" value="CUARTO DE LUZ"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r5"></td>
                                                        <td><input value="no" required type="radio" name="r5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t6" value="DIRECCIONALES"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r6"></td>
                                                        <td><input value="no" required type="radio" name="r6"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t7" value="ELEVADOR DERECHO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r7"></td>
                                                        <td><input value="no" required type="radio" name="r7"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t8" value="ELEVADOR IZQUIERDO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r8"></td>
                                                        <td><input value="no" required type="radio" name="r8"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t9" value="ESPEJO LATERAL DERECHO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r9"></td>
                                                        <td><input value="no" required type="radio" name="r9"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t10"
                                                                value="ESPEJO LATERAL IZQUIERDO" class="form-control">
                                                        </td>
                                                        <td><input value="si" required type="radio" name="r10"></td>
                                                        <td><input value="no" required type="radio" name="r10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t11" value="LIMPIADORES"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r11"></td>
                                                        <td><input value="no" required type="radio" name="r11"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t12" value="LUCES / ALTAS / BAJAS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r12"></td>
                                                        <td><input value="no" required type="radio" name="r12"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t13" value="TAPON DE GASOLINA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r13"></td>
                                                        <td><input value="no" required type="radio" name="r13"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t14" value="TAPONES DE LLANTAS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r14"></td>
                                                        <td><input value="no" required type="radio" name="r14"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>INTERIORES</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t15" value="CERTIFICADO DE VERIFICACION"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r15"></td>
                                                        <td><input value="no" required type="radio" name="r15"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t16" value="CLAXON"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r16"></td>
                                                        <td><input value="no" required type="radio" name="r16"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t17" value="GATO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r17"></td>
                                                        <td><input value="no" required type="radio" name="r17"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t18" value="INDICADOR GASOLINA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r18"></td>
                                                        <td><input value="no" required type="radio" name="r18"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t19" value="INDICADOR VELOCIDAD"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r19"></td>
                                                        <td><input value="no" required type="radio" name="r19"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t20" value="INDICADOR TEMPERATURA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r20"></td>
                                                        <td><input value="no" required type="radio" name="r20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t21" value="LLANTA DE REFACCION"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r21"></td>
                                                        <td><input value="no" required type="radio" name="r21"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t22" value="LLAVE DE TUERCAS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r22"></td>
                                                        <td><input value="no" required type="radio" name="r22"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t23" value="POLIZA DE SEGURO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r23"></td>
                                                        <td><input value="no" required type="radio" name="r23"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t24" value="TARJETA CIRCULACION"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r24"></td>
                                                        <td><input value="no" required type="radio" name="r24"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t25" value="TRIANGULOS SEGURIDAD"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r25"></td>
                                                        <td><input value="no" required type="radio" name="r25"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t26" value="UNIDAD LIMPIA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r26"></td>
                                                        <td><input value="no" required type="radio" name="r26"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>INTERIOR COFRE</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t27" value="BATERIA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r27"></td>
                                                        <td><input value="no" required type="radio" name="r27"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t28" value="NIVEL ANTICONGELANTE"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r28"></td>
                                                        <td><input value="no" required type="radio" name="r28"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t29" value="NIVEL ACEITE MOTOR"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r29"></td>
                                                        <td><input value="no" required type="radio" name="r29"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t30" value="NIVEL LIQUIDO FRENOS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r30"></td>
                                                        <td><input value="no" required type="radio" name="r30"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t31" value="TAPON DE ACEITE"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r31"></td>
                                                        <td><input value="no" required type="radio" name="r31"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t32" value="TAPON RADIADOR"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r32"></td>
                                                        <td><input value="no" required type="radio" name="r32"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>ACCESORIOS</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t33" value="ANTENA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r33"></td>
                                                        <td><input value="no" required type="radio" name="r33"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t34" value="ENCENDEDOR"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r34"></td>
                                                        <td><input value="no" required type="radio" name="r34"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t35" value="RADIO / ESTEREO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r35"></td>
                                                        <td><input value="no" required type="radio" name="r35"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t36" value="TAPETES"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r36"></td>
                                                        <td><input value="no" required type="radio" name="r36"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h6 style="text-align: center;">ESTADO GENERAL DE LA CARROCERÍA</h6>

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
                                    <textarea style="display: none;" id="draw-dataUrl" name="imagen"
                                        class="form-control" rows="5"></textarea>
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
                                    <textarea style="display: none;" id="draw-dataUrl2" name="imagen2"
                                        class="form-control" rows="5"></textarea>
                                    <img style="display: none" id="draw-image2" src=""
                                        alt="Tu Imagen aparecera Aqui!" />
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
                                    <textarea style="display: none;" id="draw-dataUrl3" name="imagen3"
                                        class="form-control" rows="5"></textarea>
                                    <img style="display: none" id="draw-image3" src=""
                                        alt="Tu Imagen aparecera Aqui!" />
                                </center>
                                <br>
                                <div class="row">
                                    <div class="table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="text-align: center;" colspan="4">
                                                        <h3>DESCRIPCION DE LA FALLA A CORREGIR</h3> (DETALLADO POR EL
                                                        CONDUCTOR)
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;"><input value="electrica" required
                                                            type="radio" name="falla"><label
                                                            for="electrica">ELÉCTRICA</label></td>
                                                    <td style="text-align: center;"><input value="mecanica" required
                                                            type="radio" name="falla"><label
                                                            for="mecanica">MECÁNICA</label></td>
                                                    <td style="text-align: center;"><input value="hojalateria" required
                                                            type="radio" name="falla"><label
                                                            for="hojalateria">HOJALATERÍA</label></td>
                                                    <td style="text-align: center;"><input value="otra" required
                                                            type="radio" name="falla"><label for="otra">OTRA</label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="text-align: center;">DETALLE del
                                                            CONDUCTOR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;"><textarea rows="5"
                                                                name="detalle_conductor" id="detalle_conductor"
                                                                class="form-control" placeholder="Detalle del Conductor"></textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--<div class="col-4">
                                        <div class="table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="text-align: center;">REVISA/REALIZA
                                                            TECNICO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;"><textarea rows="5" name="revisa_tecnico"
                                                                id="revisa_tecnico" class="form-control" placeholder="Revisa/Realiza Tecnico"></textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="text-align: center;">SERVICIO SOLICITADO A TALLER EXTERNO
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;"><textarea rows="5"
                                                                name="servicio_solicitado" id="servicio_solicitado"
                                                                class="form-control" placeholder="Servicio Solicitado"></textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="table">
                                    <table class="table" style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <th rowspan="2" scope="row" style="text-align: center;">TALLER ASIGNADO:
                                                </th>
                                                <td rowspan="2" style="text-align: center;"><input name="taller" class="form-control" placeholder="Taller"></td>
                                                <th rowspan="2" scope="row" style="text-align: center;">TECNICO QUE
                                                    REALIZA EL TRASLADO:</th>
                                                <td rowspan="2" style="text-align: center;"><select name="tecnico_traslado" class="form-control">
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach($mecanicos AS $key => $value){ ?>
                                                        <option value="<?= $value->idtbl_users ?>"><?= $value->nombre ?></option>
                                                    <?php } ?>
                                                </select></td>
                                                <th rowspan="2" scope="row" style="text-align: center;">FECHA</th>
                                                <th scope="row" style="text-align: center;">SALIDA A TALLER:</th>
                                                <td style="text-align: center;"><input name="salida_taller" class="form-control" type="date"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">REGRESO DE TALLER:</th>
                                                <td style="text-align: center;"><input type="date" name="regreso_taller" class="form-control"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="text-align: center;">OBSERVACIONES AL INVENTARIO
                                                    Y DAÑOS EXTERIORES</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><textarea rows="4" cols="7"
                                                        name="observaciones" class="form-control" placeholder="Observaciones al inventario y daños exteriores"></textarea></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">DIAGNÓSTICO DE FALLA
                                                    (INDICAR SI FUE POR... DESGASTE || USO NORMAL || PROVOCADA)</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><select name="diagnostico" class="form-control"><option value="desgaste">Desgaste</option><option value="uso_normal">Uso Normal</option><option value="provocada">Provocada</option></select></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-sm" width="100%">
                                                <tr>
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
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">FIRMA del USUARIO</th>
                                                </tr>
                                                <tr>
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
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">RECIBE || CONTROL
                                                        VEHICULAR</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <canvas id="draw-canvas6" width="240"
                                                                style="border-bottom-style: solid;">
                                                                No tienes un buen navegador.
                                                            </canvas>
                                                            <br>
                                                            <button style="width: 100px;height: 19px;font-size: 8px;"
                                                                type="button" class="btn btn-warning btn-sm"
                                                                id="draw-submitBtn6"><i style="font-size: 8px;"
                                                                    class="fa fa-ban"></i> Crear Firma</button>
                                                            <button style="width: 100px;height: 19px;font-size: 8px;"
                                                                type="button" class="btn btn-danger btn-sm"
                                                                id="draw-clearBtn6"><i style="font-size: 8px;"
                                                                    class="fa fa-trash"></i> Borrar Firma</button>
                                                            <div style="display: none">
                                                                <label>Color</label>
                                                                <input type="color" id="color6">
                                                                <label>Tamaño Puntero</label>
                                                                <input type="range" id="puntero6" min="1" default="1"
                                                                    max="5" width="10%">
                                                            </div>
                                                            <textarea style="display: none;" id="draw-dataUrl6"
                                                                name="imagen6" class="form-control" rows="5"></textarea>
                                                            <img style="display: none" id="draw-image6" src=""
                                                                alt="Tu Imagen aparecera Aqui!" />
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">VoBo SUPERVISOR CV</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="uid_servicio" id="uid_servicio" value="<?php echo $detalle[0]->uid ?>">
                                    <input type="hidden" name="uid_usuario"
                                        value="<?php echo $detalle[0]->uid_operador ?>">
                                    <input type="hidden" name="kilometraje" value="<?= $detalle[0]->kilometraje ?>">
                                    <input type="hidden" name="idtbl_catalogo" value="<?= $detalle[0]->idtbl_catalogo ?>">
                                    <input type="hidden" id="iddtl_almacen" name="iddtl_almacen"
                                        value="<?php echo $detalle[0]->iddtl_almacen ?>">
                                    <input type="hidden" name="servicio" id="servicio" value="<?= $detalle[0]->iddtl_servicio ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                                <?=form_close()?>

                            </div>
                            <?php } ?>
                            <!-- Si el checklist no existe -->


                            <!-- Si el checklist ya existe -->
                            <?php if(isset($checklist)){ ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-8">
                                        <h2 align="center"><?= $detalle[0]->modelo ?></h2>
                                    </div>
                                    <div class="col-4">
                                        <h6 style="font-weight: normal" align="right" class="ecocheck">Folio:
                                            <strong><?= $detalle[0]->idtbl_tramites_vehiculares ?></strong></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <h3 align="center">ORDEN DE MANTENIMIENTO PREVENTIVO-CORRECTIVO</h3>
                                    </div>
                                    <div class="col-3">
                                        <h6 style="font-weight: normal" align="right" class="ecocheck">Fecha:
                                            <strong><?= date('d-m-Y') ?></strong></h6>
                                    </div>
                                </div>
                                <br>
                                <div class="table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="6" style="text-align: center;">
                                                    <h2>Usuario</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Nombre: </th>
                                                <td colspan="2"><?= $detalle[0]->nombreOperador ?>
                                                    <?= $detalle[0]->paternoOperador ?>
                                                    <?= $detalle[0]->maternoOperador ?></td>
                                                <th scope="row" style="text-align: center;">N° Proyecto</th>
                                                <td colspan="2"><?= $detalleChecklist[0]['numero_proyecto'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Departamento: </th>
                                                <td colspan="2">Control Vehicular</td>
                                                <th scope="row" style="text-align: center;">Tecnico Asignado: </th>
                                                <td colspan="2"><?= $detalle[0]->mecanico ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="table">
                                    <table style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th colspan="4" scope="col" style="text-align: center;">CARACTERISTICAS
                                                    DEL EQUIPO</th>
                                                <th scope="col" style="text-align: center;">KM. SALIDA</th>
                                                <th scope="col" style="text-align: center;">NIVEL GASOLINA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="text-align: center;">ECO</th>
                                                <th scope="row" style="text-align: center;">TIPO</th>
                                                <th scope="row" style="text-align: center;">AÑO</th>
                                                <th scope="row" style="text-align: center;">PLACAS</th>
                                                <td style="text-align: center;"><?= $detalleChecklist[0]['km_salida'] ?></td>
                                                <td rowspan="3" style="text-align: center;"><?= $detalleChecklist[0]['nivel_gasolina'] ?></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2" style="text-align: center;">
                                                    <?= $detalle[0]->numero_interno ?></td>
                                                <td rowspan="2" style="text-align: center;">
                                                    <?= $detalle[0]->tipo_vehiculo ?></td>
                                                <td rowspan="2" style="text-align: center;">2020</td>
                                                <td rowspan="2" style="text-align: center;"><?= $detalle[0]->placas ?>
                                                </td>
                                                <th scope="row" style="text-align: center;">KM. ENTRADA</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><?= $detalleChecklist[0]['km_entrada'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>EXTERIORES</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t1" value="ALARMA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r1" <?php if($checklist->r1 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r1" <?php if($checklist->r1 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t2" value="BIRLOS DE SEGURIDAD"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r2" <?php if($checklist->r2 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r2" <?php if($checklist->r2 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t3" value="CALAVERAS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r3" <?php if($checklist->r3 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r3" <?php if($checklist->r3 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t4" value="CALCOMANIA VERIFICACION"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r4" <?php if($checklist->r4 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r4" <?php if($checklist->r4 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t5" value="CUARTO DE LUZ"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r5" <?php if($checklist->r5 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r5" <?php if($checklist->r5 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t6" value="DIRECCIONALES"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r6" <?php if($checklist->r6 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r6" <?php if($checklist->r6 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t7" value="ELEVADOR DERECHO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r7" <?php if($checklist->r7 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r7" <?php if($checklist->r7 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t8" value="ELEVADOR IZQUIERDO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r8" <?php if($checklist->r8 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r8" <?php if($checklist->r8 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t9" value="ESPEJO LATERAL DERECHO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r9" <?php if($checklist->r9 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r9" <?php if($checklist->r9 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t10"
                                                                value="ESPEJO LATERAL IZQUIERDO" class="form-control">
                                                        </td>
                                                        <td><input value="si" required type="radio" name="r10" <?php if($checklist->r10 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r10" <?php if($checklist->r10 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t11" value="LIMPIADORES"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r11" <?php if($checklist->r11 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r11" <?php if($checklist->r11 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t12" value="LUCES / ALTAS / BAJAS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r12" <?php if($checklist->r12 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r12" <?php if($checklist->r12 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t13" value="TAPON DE GASOLINA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r13" <?php if($checklist->r13 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r13" <?php if($checklist->r13 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t14" value="TAPONES DE LLANTAS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r14" <?php if($checklist->r14 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r14" <?php if($checklist->r14 == 'no'){ ?>checked<?php } ?>></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>INTERIORES</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t15" value="CERTIFICADO DE VERIFICACION"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r15" <?php if($checklist->r15 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r15" <?php if($checklist->r15 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t16" value="CLAXON"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r16" <?php if($checklist->r16 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r16" <?php if($checklist->r16 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t17" value="GATO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r17" <?php if($checklist->r17 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r17" <?php if($checklist->r17 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t18" value="INDICADOR GASOLINA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r18" <?php if($checklist->r18 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r18" <?php if($checklist->r18 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t19" value="INDICADOR VELOCIDAD"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r19" <?php if($checklist->r19 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r19" <?php if($checklist->r19 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t20" value="INDICADOR TEMPERATURA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r20" <?php if($checklist->r20 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r20" <?php if($checklist->r20 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t21" value="LLANTA DE REFACCION"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r21" <?php if($checklist->r21 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r21" <?php if($checklist->r21 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t22" value="LLAVE DE TUERCAS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r22" <?php if($checklist->r22 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r22" <?php if($checklist->r22 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t23" value="POLIZA DE SEGURO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r23" <?php if($checklist->r23 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r23" <?php if($checklist->r23 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t24" value="TARJETA CIRCULACION"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r24" <?php if($checklist->r24 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r24" <?php if($checklist->r24 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t25" value="TRIANGULOS SEGURIDAD"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r25" <?php if($checklist->r25 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r25" <?php if($checklist->r25 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t26" value="UNIDAD LIMPIA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r26" <?php if($checklist->r26 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r26" <?php if($checklist->r26 == 'no'){ ?>checked<?php } ?>></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>INTERIOR COFRE</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t27" value="BATERIA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r27" <?php if($checklist->r27 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r27" <?php if($checklist->r27 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t28" value="NIVEL ANTICONGELANTE"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r28" <?php if($checklist->r28 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r28" <?php if($checklist->r28 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t29" value="NIVEL ACEITE MOTOR"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r29" <?php if($checklist->r29 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r29" <?php if($checklist->r29 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t30" value="NIVEL LIQUIDO FRENOS"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r30" <?php if($checklist->r30 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r30" <?php if($checklist->r30 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t31" value="TAPON DE ACEITE"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r31" <?php if($checklist->r31 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r31" <?php if($checklist->r31 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t32" value="TAPON RADIADOR"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r32" <?php if($checklist->r32 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r32" <?php if($checklist->r32 == 'no'){ ?>checked<?php } ?>></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>ACCESORIOS</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t33" value="ANTENA"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r33" <?php if($checklist->r33 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r33" <?php if($checklist->r33 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t34" value="ENCENDEDOR"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r34" <?php if($checklist->r34 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r34" <?php if($checklist->r34 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t35" value="RADIO / ESTEREO"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r35" <?php if($checklist->r35 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r35" <?php if($checklist->r35 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="t36" value="TAPETES"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="r36" <?php if($checklist->r36 == 'si'){ ?>checked<?php } ?>></td>
                                                        <td><input value="no" required type="radio" name="r36" <?php if($checklist->r36 == 'no'){ ?>checked<?php } ?>></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h6 style="text-align: center;">ESTADO GENERAL DE LA CARROCERÍA</h6>

                                <center>
                                    <div id="auto_comparacion1">
                                    <img id='img_comp1' src="<?= base_url().$imagenesChecklist->imagen1 ?>">
                                    </div>
                                    
                                </center>

                                <center>
                                    <div id="auto_comparacion2">
                                    <img id='img_comp1' src="<?= base_url().$imagenesChecklist->imagen2 ?>">
                                    </div>
                                    
                                </center>

                                <center>
                                    <div id="auto_comparacion3">
                                    <img id='img_comp1' src="<?= base_url().$imagenesChecklist->imagen3 ?>">
                                    </div>
                                    
                                </center>
                                <br>
                                <div class="row">
                                    <div class="table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="text-align: center;" colspan="4">
                                                        <h3>DESCRIPCION DE LA FALLA A CORREGIR</h3> (DETALLADO POR EL
                                                        CONDUCTOR)
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;"><input value="electrica" required
                                                            type="radio" name="falla" <?php if($detalleChecklist[0]['falla'] == 'electrica'){ ?>checked<?php } ?>><label
                                                            for="electrica">ELÉCTRICA</label></td>
                                                    <td style="text-align: center;"><input value="mecanica" required
                                                            type="radio" name="falla" <?php if($detalleChecklist[0]['falla'] == 'mecanica'){ ?>checked<?php } ?>><label
                                                            for="mecanica">MECÁNICA</label></td>
                                                    <td style="text-align: center;"><input value="hojalateria" required
                                                            type="radio" name="falla" <?php if($detalleChecklist[0]['falla'] == 'hojalateria'){ ?>checked<?php } ?>><label
                                                            for="hojalateria">HOJALATERÍA</label></td>
                                                    <td style="text-align: center;"><input value="otra" required
                                                            type="radio" name="falla" <?php if($detalleChecklist[0]['falla'] == 'otro'){ ?>checked<?php } ?>><label for="otra">OTRA</label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="text-align: center;">DETALLE del
                                                            CONDUCTOR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;"><?= $detalleChecklist[0]['detalle_conductor'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--<div class="col-4">
                                        <div class="table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="text-align: center;">REVISA/REALIZA
                                                            TECNICO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;"><?= $detalleChecklist[0]['revisa_realiza_tecnico'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="text-align: center;">SERVICIO SOLICITADO
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;"><?= $detalleChecklist[0]['servicio_solicitado'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="table">
                                    <table class="table" style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <th rowspan="2" scope="row" style="text-align: center;">TALLER ASIGNADO:
                                                </th>
                                                <td rowspan="2" style="text-align: center;"><?= $detalleChecklist[0]['taller'] ?></td>
                                                <th rowspan="2" scope="row" style="text-align: center;">TECNICO QUE
                                                    REALIZA EL TRASLADO:</th>
                                                <td rowspan="2" style="text-align: center;"><?= $detalleChecklist[0]['mecanico_traslado'] ?></td>
                                                <th rowspan="2" scope="row" style="text-align: center;">FECHA</th>
                                                <th scope="row" style="text-align: center;">SALIDA A TALLER:</th>
                                                <td style="text-align: center;"><?php if($detalleChecklist[0]['salida_taller'] != '0000-00-00'){ ?><?=$detalleChecklist[0]['salida_taller']?><?php } ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">REGRESO DE TALLER:</th>
                                                <td style="text-align: center;"><?php if($detalleChecklist[0]['regreso_taller'] != '0000-00-00'){ ?><?=$detalleChecklist[0]['regreso_taller']?><?php } ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="text-align: center;">OBSERVACIONES AL INVENTARIO
                                                    Y DAÑOS EXTERIORES</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><?= $detalleChecklist[0]['observaciones_inventario'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">DIAGNÓSTICO DE FALLA
                                                    (INDICAR SI FUE POR... DESGASTE || USO NORMAL || PROVOCADA)</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <select name="diagnostico" class="form-control"><option value="desgaste" <?= $detalleChecklist[0]['diagnostico_falla'] == "desgaste" ? "selected" : "" ?>>Desgaste</option><option value="uso_normal" <?= $detalleChecklist[0]['diagnostico_falla'] == "uso_normal" ? "selected" : "" ?>>Uso Normal</option><option value="provocada" <?= $detalleChecklist[0]['diagnostico_falla'] == "provocada" ? "selected" : "" ?>>Provocada</option></select>
                                                    </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-sm" width="100%">
                                                <tr>
                                                    <td>
                                                        <center>
                                                        <div id="auto_comparacion3">
                                                            <img id='img_comp1' src="<?= base_url().$imagenesChecklist->imagen4 ?>">
                                                        </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">FIRMA del USUARIO</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <center>
                                                        <div id="auto_comparacion3">
                                                            <img id='img_comp1' src="<?= base_url().$imagenesChecklist->imagen5 ?>">
                                                        </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">RECIBE || CONTROL
                                                        VEHICULAR</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <center>
                                                        <div id="auto_comparacion3">
                                                            <img id='img_comp1' src="<?= base_url().$imagenesChecklist->imagen6 ?>">
                                                        </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">VoBo SUPERVISOR CV</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="uid_servicio" id="uid_servicio" value="<?php echo $detalle[0]->uid ?>">
                                    <input type="hidden" name="uid_usuario"
                                        value="<?php echo $detalle[0]->uid_operador ?>">
                                    <input type="hidden" name="kilometraje" value="<?= $detalle[0]->kilometraje ?>">
                                    <input type="hidden" name="idtbl_catalogo" value="<?= $detalle[0]->idtbl_catalogo ?>">
                                    <input type="hidden" id="iddtl_almacen" name="iddtl_almacen"
                                        value="<?php echo $detalle[0]->iddtl_almacen ?>">
                                    <input type="hidden" name="servicio" id="servicio" value="<?= $detalle[0]->iddtl_servicio ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <!--<?php if($detalle[0]->estatus != 'FINALIZADO'){ ?>
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                    <?php } ?>-->
                                </div>
                                

                            </div>
                            <?php } ?>
                            <!-- /Si el checklist ya existe -->
                        </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ***** Nuevo Modal ***** -->
    <div id="modal_finalizar_servicio1" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SERVICIO DE UNIDAD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-checklist-tab" data-toggle="pill"
                                href="#pills-checklist" role="tab" aria-controls="pills-checklist"
                                aria-selected="true">Checklist</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-checklist" role="tabpanel"
                            aria-labelledby="pills-checklist-tab">

                            <?= validation_errors('<span class="error">', '</span>'); ?>
                            <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist-tecnico"'); ?>
                            <!-- Si el checklistTecnico no existe -->
                            <?php if(!isset($checklistTecnico)){ ?>
                            <div class="container-fluid">
                                <div class="table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="4" style="text-align: center;">
                                                    <h2>Usuario</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Mantenimiento Preventivo Menor: </th>
                                                <th scope="row"><input type="radio" name="rt0" style="width: 13px;" class="form-control" value="mantemiento_preventivo_menor" required></th>
                                                <th scope="row" style="text-align: center;">Mantenimiento Preventivo Mayor: </th>
                                                <th scope="row"><input type="radio" name="rt0" style="width: 13px;" class="form-control" value="mantemiento_preventivo_mayor" required></th>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Mantenimiento Correctivo: </th>
                                                <th scope="row"><input type="radio" name="rt0" style="width: 13px;" class="form-control" value="mantemiento_correctivo" required></th>
                                                <th scope="row" style="text-align: center;">Predictivo: </th>
                                                <th scope="row"><input type="radio" name="rt0" style="width: 13px;" class="form-control" value="predictivo" required></th>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;"> Actividad de Apoyo: </th>
                                                <th scope="row"><input type="radio" name="rt0" style="width: 13px;" class="form-control" value="actividad_de_apoyo" required></th>
                                                <th scope="row" style="text-align: center;">Campaña de Prevención: </th>
                                                <th scope="row"><input type="radio" name="rt0" style="width: 13px;" class="form-control" value="campana_de_prevencion" required></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>LUBRICACIÓN</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt1" value="Cambio de Aceite" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt1" class="calculateKM"></td>
                                                        <td><input value="no" required type="radio" name="rt1" class="calculateKM"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt2" value="Correccion de niveles en gral"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt2"></td>
                                                        <td><input value="no" required type="radio" name="rt2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt3" value="Lavado y engrasado gral"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt3"></td>
                                                        <td><input value="no" required type="radio" name="rt3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt4" value="Cambio de aceite caja/diferencial"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt4"></td>
                                                        <td><input value="no" required type="radio" name="rt4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt5" value="Cambio de aceite dirección"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt5"></td>
                                                        <td><input value="no" required type="radio" name="rt5"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>DIRECCIÓN</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt6" value="Repuestos / Cambio Bomba"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt6"></td>
                                                        <td><input value="no" required type="radio" name="rt6"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt7" value="Mangera Alta / Baja"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt7"></td>
                                                        <td><input value="no" required type="radio" name="rt7"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt8" value="Repuesto / Cambio Caja"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt8"></td>
                                                        <td><input value="no" required type="radio" name="rt8"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt9" value="Otro" class="form-control"></td>
                                                        <td colspan="2"><input class="form-control" value="" type="input" name="rt9"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>MOTOR</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt10" value="Afinación"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt10"></td>
                                                        <td><input value="no" required type="radio" name="rt10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt11" value="Cambio Bujias"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt11"></td>
                                                        <td><input value="no" required type="radio" name="rt11"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt12" value="Cambio filtro aire"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt12"></td>
                                                        <td><input value="no" required type="radio" name="rt12"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt13" value="Cambio filtro gasolina"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt13"></td>
                                                        <td><input value="no" required type="radio" name="rt13"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt14" value="Cambio fitro polen" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt14"></td>
                                                        <td><input value="no" required type="radio" name="rt14"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt15" value="Lavado de Inyectores" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt16"></td>
                                                        <td><input value="no" required type="radio" name="rt16"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt17" value="Lavado cuerpo de aceleración" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt17"></td>
                                                        <td><input value="no" required type="radio" name="rt17"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt18" value="Escaneo de sistemas y codigos" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt18"></td>
                                                        <td><input value="no" required type="radio" name="rt18"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>EMBRAGUE</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt19" value="Cambio de embrague" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt19"></td>
                                                        <td><input value="no" required type="radio" name="rt19"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt20" value="cambio kit completo" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt20"></td>
                                                        <td><input value="no" required type="radio" name="rt20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt21" value="cambio bomba esclava"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt21"></td>
                                                        <td><input value="no" required type="radio" name="rt21"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt22" value="Rectificación Volante"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt22"></td>
                                                        <td><input value="no" required type="radio" name="rt22"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>SISTEMA ELÉCTRICO</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt23" value="Cambio de focos (cuartos)"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt23"></td>
                                                        <td><input value="no" required type="radio" name="rt23"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt24" value="Cambio focos (unidades)"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt24"></td>
                                                        <td><input value="no" required type="radio" name="rt24"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt25" value="Corregir corto"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt25"></td>
                                                        <td><input value="no" required type="radio" name="rt25"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt26" value="Reprogramación (EOM)"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt26"></td>
                                                        <td><input value="no" required type="radio" name="rt26"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt27" value="Borrar códigos"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt27"></td>
                                                        <td><input value="no" required type="radio" name="rt27"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt28" value="Reparación Marcha"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt28"></td>
                                                        <td><input value="no" required type="radio" name="rt28"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt29" value="Reparación alternador"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt29"></td>
                                                        <td><input value="no" required type="radio" name="rt29"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt30" value="Cambio acumulador" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt30"></td>
                                                        <td><input value="no" required type="radio" name="rt30"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt31" value="Cambio plumas limpiadoras"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt31"></td>
                                                        <td><input value="no" required type="radio" name="rt31"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt32" value="Otro" class="form-control"></td>
                                                        <td colspan="2"><input class="form-control" value="" type="text" name="rt32"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>SISTEMA DE ENFRIAMENTO</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt33" value="Cambio bomba de agua"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt33"></td>
                                                        <td><input value="no" required type="radio" name="rt33"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt34" value="Cambio radiador"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt34"></td>
                                                        <td><input value="no" required type="radio" name="rt34"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt35" value="Cambio termostato"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt35"></td>
                                                        <td><input value="no" required type="radio" name="rt35"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt36" value="Cambio mangueras"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt36"></td>
                                                        <td><input value="no" required type="radio" name="rt36"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt37" value="Cambio deposíto de refigerante" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt37"></td>
                                                        <td><input value="no" required type="radio" name="rt37"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt38" value="Cambio tapón de Deposo/Radiador" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt38"></td>
                                                        <td><input value="no" required type="radio" name="rt38"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt39" value="Otro" class="form-control"></td>
                                                        <td colspan="2"><input class="form-control" value="" type="text" name="rt39"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>SUSPENSIÓN</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt40" value="Cambio gomas, bases, bujes"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt40"></td>
                                                        <td><input value="no" required type="radio" name="rt40"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt41" value="Cambio horquillas, terminales"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt41"></td>
                                                        <td><input value="no" required type="radio" name="rt41"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt42" value="Alineación eje delantero"
                                                                class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt42"></td>
                                                        <td><input value="no" required type="radio" name="rt42"></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>DELANTEROS</th>
                                                        <th>TRASCEROS</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt43" value="Cambio amortiguadores"
                                                                class="form-control"></td>
                                                        <td><input value="si" type="checkbox" name="rt43_1"></td>
                                                        <td><input value="si" type="checkbox" name="rt43_2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt44" value="Balanceos"
                                                                class="form-control"></td>
                                                        <td><input value="si" type="checkbox" name="rt44_1"></td>
                                                        <td><input value="si" type="checkbox" name="rt44_2"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>FRENOS</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt45" value="Cambio liquido frenos" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt45"></td>
                                                        <td><input value="no" required type="radio" name="rt45"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt46" value="Limpieza y ajuste general" class="form-control"></td>
                                                        <td><input value="si" required type="radio" name="rt46"></td>
                                                        <td><input value="no" required type="radio" name="rt46"></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>Tambores</th>
                                                        <th>Rotores</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt47" value="Rectificación" class="form-control"></td>
                                                        <td><input value="si" type="checkbox" name="rt47_1"></td>
                                                        <td><input value="si" type="checkbox" name="rt47_2"></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>DELANTEROS</th>
                                                        <th>TRASCEROS</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt48" value="Cambio balatas" class="form-control"><select class="form-control" name="rt48_1"><option value="alta">Tiempo de vida alto</option><option value="media">Tiempo de vida medio</option><option value="baja">Tiempo de vida bajo</option></select></td>
                                                        <td><input value="si" type="checkbox" name="rt48_2"></td>
                                                        <td><input value="si" type="checkbox" name="rt48_3"></td>
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
                                                        <th scope="col" colspan="2" style="text-align: center;">
                                                            <h2>LLANTAS</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>ESTADO</th>
                                                        <th>TIEMPO DE VIDA</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Llanta delantera izquierda</td>
                                                        <td><select class="form-control" name="rt49_1"><option value="normal">Normal</option><option value="desgaste">Desgaste</option><option value="superinflado">Superinflado</option><option value="baja precion">Baja preción</option><option value="desgaste regular">Desgaste Regular</option></select></td>
                                                        <td><select name="rt49_2" class="form-control"><option value="alta">Alta</option><option value="media">Media</option><option value="baja">Baja</option></select></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Llanta delantera derecha</td>
                                                        <td><select class="form-control" name="rt49_3"><option value="normal">Normal</option><option value="desgaste">Desgaste</option><option value="superinflado">Superinflado</option><option value="baja precion">Baja preción</option><option value="desgaste regular">Desgaste Regular</option></select></td>
                                                        <td><select name="rt49_4" class="form-control"><option value="alta">Alta</option><option value="media">Media</option><option value="baja">Baja</option></select></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Llanta trasera izquierda</td>
                                                        <td><select class="form-control" name="rt49_5"><option value="normal">Normal</option><option value="desgaste">Desgaste</option><option value="superinflado">Superinflado</option><option value="baja precion">Baja presión</option><option value="desgaste regular">Desgaste Regular</option></select></td>
                                                        <td><select name="rt49_6" class="form-control"><option value="alta">Alta</option><option value="media">Media</option><option value="baja">Baja</option></select></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Llanta trasera derecha</td>
                                                        <td><select class="form-control" name="rt49_7"><option value="normal">Normal</option><option value="desgaste">Desgaste</option><option value="superinflado">Superinflado</option><option value="baja precion">Baja preción</option><option value="desgaste regular">Desgaste Regular</option></select></td>
                                                        <td><select name="rt49_8" class="form-control"><option value="alta">Alta</option><option value="media">Media</option><option value="baja">Baja</option></select></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>KM. SALIDA</th>
                                                <th>KM. Proximo Servicio</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" class="form-control" name="kmsalida" id="kmsalida" placeholder="KM Salida" min="<?= $detalleChecklist[0]['km_entrada'] ?>" step="0.01" required></td>
                                                <td><input type="number" class="form-control" name="kmservicio" placeholder="KM Proximo Servicio" data-value="<?= $detalle[0]->km_servicio ?>" value="<?= $detalle[0]->km_servicio ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">REVISA/REALIZA TECNICO</th>
                                                <th scope="row" style="text-align: center;">SERVICIO DE TALLER EXTERNO</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><textarea rows="5" name="revisa_tecnico" id="revisa_tecnico" class="form-control" placeholder="Revisa/Realiza Tecnico"></textarea></td>
                                                <td style="text-align: center;"><textarea rows="5" name="servicio_solicitado" id="servicio_solicitado" class="form-control" placeholder="Servicio Solicitado"></textarea></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" scope="row" style="text-align: center;">REFACCIONES UTILIZADAS</th>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center;"><textarea rows="4" cols="7" name="rt50" class="form-control" placeholder="REFACIONES UTILIZADAS"></textarea></td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" scope="row" style="text-align: center;">PENDIENTES A REALIZAR (PROGRAMACIÓN)</th>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center;"><textarea rows="4" cols="7" name="rt51" class="form-control" placeholder="PENDIENTES A REALIZAR"></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-sm" width="100%">
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <canvas id="draw-canvas7" width="240"
                                                                style="border-bottom-style: solid;">
                                                                No tienes un buen navegador.
                                                            </canvas>
                                                            <br>
                                                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-warning btn-sm" id="draw-submitBtn7"><i style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                                                            <button style="width: 100px;height: 19px;font-size: 8px;"
                                                                type="button" class="btn btn-danger btn-sm"
                                                                id="draw-clearBtn7"><i style="font-size: 8px;"
                                                                    class="fa fa-trash"></i> Borrar Firma</button>
                                                            <div style="display: none">
                                                                <label>Color</label>
                                                                <input type="color" id="color7">
                                                                <label>Tamaño Puntero</label>
                                                                <input type="range" id="puntero7" min="1" default="1" max="5" width="10%">
                                                            </div>
                                                            <textarea style="display: none;" id="draw-dataUrl7" name="imagen7" class="form-control" rows="5"></textarea>
                                                            <img style="display: none" id="draw-image7" src=""
                                                                alt="Tu Imagen aparecera Aqui!" />
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">FIRMA TÉCNICO</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <canvas id="draw-canvas8" width="240"
                                                                style="border-bottom-style: solid;">
                                                                No tienes un buen navegador.
                                                            </canvas>
                                                            <br>
                                                            <button style="width: 100px;height: 19px;font-size: 8px;"
                                                                type="button" class="btn btn-warning btn-sm"
                                                                id="draw-submitBtn8"><i style="font-size: 8px;"
                                                                    class="fa fa-ban"></i> Crear Firma</button>
                                                            <button style="width: 100px;height: 19px;font-size: 8px;"
                                                                type="button" class="btn btn-danger btn-sm"
                                                                id="draw-clearBtn8"><i style="font-size: 8px;"
                                                                    class="fa fa-trash"></i> Borrar Firma</button>
                                                            <div style="display: none">
                                                                <label>Color</label>
                                                                <input type="color" id="color8">
                                                                <label>Tamaño Puntero</label>
                                                                <input type="range" id="puntero8" min="1" default="1" max="5" width="10%">
                                                            </div>
                                                            <textarea style="display: none;" id="draw-dataUrl8" name="imagen8" class="form-control" rows="5"></textarea>
                                                            <img style="display: none" id="draw-image8" src=""
                                                                alt="Tu Imagen aparecera Aqui!" />
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">VO.BO. CONTROL VEHICULAR</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="uid_servicio" id="uid_servicio" value="<?php echo $detalle[0]->uid ?>">
                                    <input type="hidden" name="uid_usuario"
                                        value="<?php echo $detalle[0]->uid_operador ?>">
                                    <input type="hidden" name="kilometraje" value="<?= $detalle[0]->kilometraje ?>">
                                    <input type="hidden" name="idtbl_catalogo" value="<?= $detalle[0]->idtbl_catalogo ?>">
                                    <input type="hidden" id="iddtl_almacen" name="iddtl_almacen"
                                        value="<?php echo $detalle[0]->iddtl_almacen ?>">
                                    <input type="hidden" name="servicio" id="servicio" value="<?= $detalle[0]->iddtl_servicio ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                                <?=form_close()?>

                            </div>
                            <?php } ?>
                            <!-- Si el checklistTecnico no existe -->


                            <!-- Si el checklistTecnico ya existe -->
                            <?php if(isset($checklistTecnico)){ ?>
                                <div class="container-fluid">
                                <div class="table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="4" style="text-align: center;">
                                                    <h2>Usuario</h2>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php if($checklistTecnico->rt0 == "mantemiento_preventivo"){ ?>
                                                    <th scope="row" style="text-align: center;">Mantenimiento Preventivo: </th>
                                                    <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "mantemiento_preventivo" ? "checked" : "" ?> required></th>
                                                    <th></th>
                                                    <th></th>
                                                <?php }else{ ?>
                                                    <th scope="row" style="text-align: center;">Mantenimiento Preventivo Menor: </th>
                                                    <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "mantemiento_preventivo_menor" ? "checked" : "" ?> required></th>
                                                    <th scope="row" style="text-align: center;">Mantenimiento Preventivo Mayor: </th>
                                                    <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "mantemiento_preventivo_mayor" ? "checked" : "" ?> required></th>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Mantenimiento Correctivo: </th>
                                                <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "mantemiento_correctivo" ? "checked" : "" ?> required></th>
                                                <th scope="row" style="text-align: center;">Predictivo: </th>
                                                <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "predictivo" ? "checked" : "" ?> required></th>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">Defecto de Fabrica: </th>
                                                <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "defecto_de_fabrica" ? "checked" : "" ?> required></th>
                                                <th scope="row" style="text-align: center;">Desgaste: </th>
                                                <th scope="row"><input type="radio" name="r0" style="width: 13px;" class="form-control" <?= $checklistTecnico->rt0 == "desgaste" ? "checked" : "" ?> required></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div style="text-align: center;">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>LUBRICACIÓN</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt1" value="<?= $checklistTecnico->tt1 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt1 == "si" ? "checked" : "" ?> required type="radio" name="rt1"></td>
                                                        <td><input <?= $checklistTecnico->rt1 == "no" ? "checked" : "" ?> required type="radio" name="rt1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt2" value="<?= $checklistTecnico->tt2 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt2 == "si" ? "checked" : "" ?> required type="radio" name="rt2"></td>
                                                        <td><input <?= $checklistTecnico->rt2 == "no" ? "checked" : "" ?> required type="radio" name="rt2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt3" value="<?= $checklistTecnico->tt3 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt3 == "si" ? "checked" : "" ?> required type="radio" name="rt3"></td>
                                                        <td><input <?= $checklistTecnico->rt3 == "no" ? "checked" : "" ?>  required type="radio" name="rt3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt4" value="<?= $checklistTecnico->tt4 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt4 == "si" ? "checked" : "" ?> required type="radio" name="rt4"></td>
                                                        <td><input <?= $checklistTecnico->rt4 == "no" ? "checked" : "" ?> required type="radio" name="rt4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt5" value="<?= $checklistTecnico->tt5 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt5 == "si" ? "checked" : "" ?> required type="radio" name="rt5"></td>
                                                        <td><input <?= $checklistTecnico->rt5 == "no" ? "checked" : "" ?> required type="radio" name="rt5"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>DIRECCIÓN</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt6" value="<?= $checklistTecnico->tt6 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt6 == "si" ? "checked" : "" ?> required type="radio" name="rt6"></td>
                                                        <td><input <?= $checklistTecnico->rt6 == "no" ? "checked" : "" ?> required type="radio" name="rt6"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt7" value="<?= $checklistTecnico->tt7 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt7 == "si" ? "checked" : "" ?> required type="radio" name="rt7"></td>
                                                        <td><input <?= $checklistTecnico->rt7 == "no" ? "checked" : "" ?> required type="radio" name="rt7"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt8" value="<?= $checklistTecnico->tt8 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt8 == "si" ? "checked" : "" ?> required type="radio" name="rt8"></td>
                                                        <td><input <?= $checklistTecnico->rt8 == "no" ? "checked" : "" ?> required type="radio" name="rt8"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt9" value="<?= $checklistTecnico->tt9 ?>" class="form-control"></td>
                                                        <td colspan="2"><input class="form-control" value="<?= $checklistTecnico->rt9 ?>" type="input" name="rt9"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>MOTOR</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt10" value="<?= $checklistTecnico->tt10 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt10 == "si" ? "checked" : "" ?> required type="radio" name="rt10"></td>
                                                        <td><input <?= $checklistTecnico->rt10 == "no" ? "checked" : "" ?> required type="radio" name="rt10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt11" value="<?= $checklistTecnico->tt11 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt11 == "si" ? "checked" : "" ?> required type="radio" name="rt11"></td>
                                                        <td><input <?= $checklistTecnico->rt11 == "no" ? "checked" : "" ?> required type="radio" name="rt11"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt12" value="<?= $checklistTecnico->tt12 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt12 == "si" ? "checked" : "" ?> required type="radio" name="rt12"></td>
                                                        <td><input <?= $checklistTecnico->rt12 == "no" ? "checked" : "" ?> required type="radio" name="rt12"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt13" value="<?= $checklistTecnico->tt13 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt13 == "si" ? "checked" : "" ?> required type="radio" name="rt13"></td>
                                                        <td><input <?= $checklistTecnico->rt13 == "no" ? "checked" : "" ?> required type="radio" name="rt13"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt14" value="<?= $checklistTecnico->tt14 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt14 == "si" ? "checked" : "" ?> required type="radio" name="rt14"></td>
                                                        <td><input <?= $checklistTecnico->rt14 == "no" ? "checked" : "" ?> required type="radio" name="rt14"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt15" value="<?= $checklistTecnico->tt15 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt16 == "si" ? "checked" : "" ?> required type="radio" name="rt16"></td>
                                                        <td><input <?= $checklistTecnico->rt16 == "no" ? "checked" : "" ?> required type="radio" name="rt16"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt17" value="<?= $checklistTecnico->tt17 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt17 == "si" ? "checked" : "" ?> required type="radio" name="rt17"></td>
                                                        <td><input <?= $checklistTecnico->rt17 == "no" ? "checked" : "" ?> required type="radio" name="rt17"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt18" value="<?= $checklistTecnico->tt18 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt18 == "si" ? "checked" : "" ?> required type="radio" name="rt18"></td>
                                                        <td><input <?= $checklistTecnico->rt18 == "no" ? "checked" : "" ?> required type="radio" name="rt18"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>EMBRAGUE</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt19" value="<?= $checklistTecnico->tt19 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt19 == "si" ? "checked" : "" ?> required type="radio" name="rt19"></td>
                                                        <td><input <?= $checklistTecnico->rt19 == "no" ? "checked" : "" ?> required type="radio" name="rt19"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt20" value="<?= $checklistTecnico->tt20 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt20 == "si" ? "checked" : "" ?> required type="radio" name="rt20"></td>
                                                        <td><input <?= $checklistTecnico->rt20 == "no" ? "checked" : "" ?> required type="radio" name="rt20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt21" value="<?= $checklistTecnico->tt21 ?>"class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt21 == "si" ? "checked" : "" ?> required type="radio" name="rt21"></td>
                                                        <td><input <?= $checklistTecnico->rt21 == "no" ? "checked" : "" ?> required type="radio" name="rt21"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt22" value="<?= $checklistTecnico->tt22 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt22 == "si" ? "checked" : "" ?> required type="radio" name="rt22"></td>
                                                        <td><input <?= $checklistTecnico->rt22 == "no" ? "checked" : "" ?> required type="radio" name="rt22"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>SISTEMA ELÉCTRICO</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt23" value="<?= $checklistTecnico->tt23 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt23 == "si" ? "checked" : "" ?> required type="radio" name="rt23"></td>
                                                        <td><input <?= $checklistTecnico->rt23 == "no" ? "checked" : "" ?> required type="radio" name="rt23"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt24" value="<?= $checklistTecnico->tt24 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt24 == "si" ? "checked" : "" ?> required type="radio" name="rt24"></td>
                                                        <td><input <?= $checklistTecnico->rt24 == "no" ? "checked" : "" ?> required type="radio" name="rt24"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt25" value="<?= $checklistTecnico->tt25 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt25 == "si" ? "checked" : "" ?> required type="radio" name="rt25"></td>
                                                        <td><input <?= $checklistTecnico->rt25 == "no" ? "checked" : "" ?> required type="radio" name="rt25"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt26" value="<?= $checklistTecnico->tt26 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt26 == "si" ? "checked" : "" ?> required type="radio" name="rt26"></td>
                                                        <td><input <?= $checklistTecnico->rt26 == "no" ? "checked" : "" ?> required type="radio" name="rt26"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt27" value="<?= $checklistTecnico->tt27 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt27 == "si" ? "checked" : "" ?> required type="radio" name="rt27"></td>
                                                        <td><input <?= $checklistTecnico->rt27 == "no" ? "checked" : "" ?> required type="radio" name="rt27"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt28" value="<?= $checklistTecnico->tt28 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt28 == "si" ? "checked" : "" ?> required type="radio" name="rt28"></td>
                                                        <td><input <?= $checklistTecnico->rt28 == "no" ? "checked" : "" ?> required type="radio" name="rt28"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt29" value="<?= $checklistTecnico->tt29 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt29 == "si" ? "checked" : "" ?> required type="radio" name="rt29"></td>
                                                        <td><input <?= $checklistTecnico->rt29 == "no" ? "checked" : "" ?> required type="radio" name="rt29"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt30" value="<?= $checklistTecnico->tt30 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt30 == "si" ? "checked" : "" ?> required type="radio" name="rt30"></td>
                                                        <td><input <?= $checklistTecnico->rt30 == "no" ? "checked" : "" ?> required type="radio" name="rt30"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt31" value="<?= $checklistTecnico->tt31 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt31 == "si" ? "checked" : "" ?> required type="radio" name="rt31"></td>
                                                        <td><input <?= $checklistTecnico->rt31 == "no" ? "checked" : "" ?> required type="radio" name="rt31"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt32" value="<?= $checklistTecnico->tt32 ?>" class="form-control"></td>
                                                        <td colspan="2"><input class="form-control" value="<?= $checklistTecnico->rt32 ?>" type="text" name="rt32"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>SISTEMA DE ENFRIAMENTO</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt33" value="<?= $checklistTecnico->tt33 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt33 == "si" ? "checked" : "" ?> required type="radio" name="rt33"></td>
                                                        <td><input <?= $checklistTecnico->rt33 == "no" ? "checked" : "" ?> required type="radio" name="rt33"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt34" value="<?= $checklistTecnico->tt34 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt34 == "si" ? "checked" : "" ?>  required type="radio" name="rt34"></td>
                                                        <td><input <?= $checklistTecnico->rt34 == "no" ? "checked" : "" ?> required type="radio" name="rt34"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt35" value="<?= $checklistTecnico->tt35 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt35 == "si" ? "checked" : "" ?>  required type="radio" name="rt35"></td>
                                                        <td><input <?= $checklistTecnico->rt35 == "no" ? "checked" : "" ?> required type="radio" name="r35"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt36" value="<?= $checklistTecnico->tt36 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt36 == "si" ? "checked" : "" ?>  required type="radio" name="rt36"></td>
                                                        <td><input <?= $checklistTecnico->rt36 == "no" ? "checked" : "" ?> required type="radio" name="rt36"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt37" value="<?= $checklistTecnico->tt37 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt37 == "si" ? "checked" : "" ?>  required type="radio" name="rt37"></td>
                                                        <td><input <?= $checklistTecnico->rt37 == "no" ? "checked" : "" ?> required type="radio" name="rt37"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt38" value="<?= $checklistTecnico->tt38 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt38 == "si" ? "checked" : "" ?>  required type="radio" name="rt38"></td>
                                                        <td><input <?= $checklistTecnico->rt38 == "no" ? "checked" : "" ?> required type="radio" name="rt38"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt39" value="<?= $checklistTecnico->tt39 ?>" class="form-control"></td>
                                                        <td colspan="2"><input class="form-control" value="<?= $checklistTecnico->rt39 ?>" type="text" name="rt39"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>SUSPENSIÓN</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt40" value="<?= $checklistTecnico->tt40 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt40 == "si" ? "checked" : "" ?> required type="radio" name="rt40"></td>
                                                        <td><input <?= $checklistTecnico->rt40 == "no" ? "checked" : "" ?> required type="radio" name="rt40"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt41" value="<?= $checklistTecnico->tt41 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt41 == "si" ? "checked" : "" ?> required type="radio" name="rt41"></td>
                                                        <td><input <?= $checklistTecnico->rt41 == "no" ? "checked" : "" ?> required type="radio" name="rt41"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt42" value="<?= $checklistTecnico->tt42 ?>"
                                                                class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt42 == "si" ? "checked" : "" ?> required type="radio" name="rt42"></td>
                                                        <td><input <?= $checklistTecnico->rt42 == "no" ? "checked" : "" ?> required type="radio" name="rt42"></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>DELANTEROS</th>
                                                        <th>TRASCEROS</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt43" value="<?= $checklistTecnico->tt43 ?>" class="form-control"></td>
                                                        <td><input <?= isset($checklistTecnico->rt43_1) && $checklistTecnico->rt43_1 == "si" ? "checked" : "" ?> type="checkbox" name="rt43_1"></td>
                                                        <td><input <?= isset($checklistTecnico->rt43_2) && $checklistTecnico->rt43_2 == "si" ? "checked" : "" ?> type="checkbox" name="rt43_2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt44" value="<?= $checklistTecnico->tt44 ?>" class="form-control"></td>
                                                        <td><input <?= isset($checklistTecnico->rt44_1) && $checklistTecnico->rt44_1 == "si" ? "checked" : "" ?> type="checkbox" name="rt44_1"></td>
                                                        <td><input <?= isset($checklistTecnico->rt44_2) && $checklistTecnico->rt44_2 == "si" ? "checked" : "" ?> type="checkbox" name="rt44_2"></td>
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
                                                        <th scope="col" colspan="3" style="text-align: center;">
                                                            <h2>FRENOS</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>SI</th>
                                                        <th>NO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt45" value="<?= $checklistTecnico->tt45 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt45 == "si" ? "checked" : "" ?> required type="radio" name="rt45"></td>
                                                        <td><input <?= $checklistTecnico->rt45 == "no" ? "checked" : "" ?> required type="radio" name="rt45"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt46" value="<?= $checklistTecnico->tt46 ?>" class="form-control"></td>
                                                        <td><input <?= $checklistTecnico->rt46 == "si" ? "checked" : "" ?> required type="radio" name="rt46"></td>
                                                        <td><input <?= $checklistTecnico->rt46 == "no" ? "checked" : "" ?> required type="radio" name="rt46"></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>Tambores</th>
                                                        <th>Rotores</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt47" value="<?= $checklistTecnico->tt47 ?>" class="form-control"></td>
                                                        <td><input <?= isset($checklistTecnico->rt47_1) && $checklistTecnico->rt47_1 == "si" ? "checked" : "" ?> type="checkbox" name="rt47_1"></td>
                                                        <td><input <?= isset($checklistTecnico->rt47_2) && $checklistTecnico->rt47_2 == "si" ? "checked" : "" ?> type="checkbox" name="rt47_2"></td>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>DELANTEROS</th>
                                                        <th>TRASCEROS</th>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="tt48" value="<?= $checklistTecnico->tt48 ?>" class="form-control"><select class="form-control" name="rt48_1"><option value="alta" <?= $checklistTecnico->rt48_1 == "alta" ? "selected" : "" ?>>Tiempo de vida alto</option><option value="media" <?= $checklistTecnico->rt48_1 == "media" ? "selected" : "" ?>>Tiempo de vida medio</option><option value="baja" <?= $checklistTecnico->rt48_1 == "baja" ? "selected" : "" ?>>Tiempo de vida bajo</option></select></td>
                                                        <td><input <?= isset($checklistTecnico->rt48_2) && $checklistTecnico->rt48_2 == "si" ? "checked" : "" ?>  type="checkbox" name="rt48_2"></td>
                                                        <td><input <?= isset($checklistTecnico->rt48_3) && $checklistTecnico->rt48_3 == "si" ? "checked" : "" ?>  type="checkbox" name="rt48_3"></td>
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
                                                        <th scope="col" colspan="2" style="text-align: center;">
                                                            <h2>LLANTAS</h2>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>ESTADO</th>
                                                        <th>TIEMPO DE VIDA</th>
                                                    </tr>
                                                    <tr>
                                                        <?php if(isset($checklistTecnico->rt49_3) && isset($checklistTecnico->rt49_5) && isset($checklistTecnico->rt49_7)){ 
                                                        ?>
                                                        <td>Llanta delantera izquierda</td>
                                                        <?php } ?>
                                                        <td><select class="form-control" name="rt49_1"><option value="normal" <?= $checklistTecnico->rt49_1 == "normal" ? "selected" : "" ?>>Normal</option><option value="desgaste" <?= $checklistTecnico->rt49_1 == "desgaste" ? "selected" : "" ?>>Desgaste</option><option value="superinflado" <?= $checklistTecnico->rt49_1 == "superinflado" ? "selected" : "" ?>>Superinflado</option><option value="baja precion" <?= $checklistTecnico->rt49_1 == "baja_precion" ? "selected" : "" ?>>Baja preción</option><option value="desgaste regular" <?= $checklistTecnico->rt49_1 == "desgaste regular" ? "selected" : "" ?>>Desgaste Regular</option></select></td>
                                                        <td><select name="r49_2" class="form-control"><option value="alta" <?= $checklistTecnico->rt49_2 == "alta" ? "selected" : "" ?>>Alta</option><option value="media" <?= $checklistTecnico->rt49_2 == "media" ? "selected" : "" ?>>Media</option><option value="baja" <?= $checklistTecnico->rt49_2 == "baja" ? "selected" : "" ?>>Baja</option></select></td>
                                                    </tr>
                                                    <?php if(isset($checklistTecnico->rt49_3)){ ?>
                                                    <tr>
                                                        <td>Llanta delantera derecha</td>
                                                        <td><select class="form-control" name="rt49_3"><option value="normal" <?= $checklistTecnico->rt49_3 == "normal" ? "selected" : "" ?>>Normal</option><option value="desgaste" <?= $checklistTecnico->rt49_3 == "desgaste" ? "selected" : "" ?>>Desgaste</option><option value="superinflado" <?= $checklistTecnico->rt49_3 == "superinflado" ? "selected" : "" ?>>Superinflado</option><option value="baja precion" <?= $checklistTecnico->rt49_3 == "baja_precion" ? "selected" : "" ?>>Baja preción</option><option value="desgaste regular" <?= $checklistTecnico->rt49_3 == "desgaste regular" ? "selected" : "" ?>>Desgaste Regular</option></select></td>
                                                        <td><select name="r49_4" class="form-control"><option value="alta" <?= $checklistTecnico->rt49_4 == "alta" ? "selected" : "" ?>>Alta</option><option value="media" <?= $checklistTecnico->rt49_4 == "media" ? "selected" : "" ?>>Media</option><option value="baja" <?= $checklistTecnico->rt49_4 == "baja" ? "selected" : "" ?>>Baja</option></select></td>
                                                    </tr>
                                                    <?php } if(isset($checklistTecnico->rt49_5)){ ?>
                                                    <tr>
                                                        <td>Llanta trasera izquierda</td>
                                                        <td><select class="form-control" name="rt49_5"><option value="normal" <?= $checklistTecnico->rt49_5 == "normal" ? "selected" : "" ?>>Normal</option><option value="desgaste" <?= $checklistTecnico->rt49_5 == "desgaste" ? "selected" : "" ?>>Desgaste</option><option value="superinflado" <?= $checklistTecnico->rt49_5 == "superinflado" ? "selected" : "" ?>>Superinflado</option><option value="baja precion" <?= $checklistTecnico->rt49_5 == "baja_precion" ? "selected" : "" ?>>Baja preción</option><option value="desgaste regular" <?= $checklistTecnico->rt49_5 == "desgaste regular" ? "selected" : "" ?>>Desgaste Regular</option></select></td>
                                                        <td><select name="r49_6" class="form-control"><option value="alta" <?= $checklistTecnico->rt49_6 == "alta" ? "selected" : "" ?>>Alta</option><option value="media" <?= $checklistTecnico->rt49_6 == "media" ? "selected" : "" ?>>Media</option><option value="baja" <?= $checklistTecnico->rt49_6 == "baja" ? "selected" : "" ?>>Baja</option></select></td>
                                                    </tr>
                                                    <?php } if(isset($checklistTecnico->rt49_7)){ ?>
                                                    <tr>
                                                        <td>Llanta trasera derecha</td>
                                                        <td><select class="form-control" name="rt49_7"><option value="normal" <?= $checklistTecnico->rt49_7 == "normal" ? "selected" : "" ?>>Normal</option><option value="desgaste" <?= $checklistTecnico->rt49_7 == "desgaste" ? "selected" : "" ?>>Desgaste</option><option value="superinflado" <?= $checklistTecnico->rt49_7 == "superinflado" ? "selected" : "" ?>>Superinflado</option><option value="baja precion" <?= $checklistTecnico->rt49_7 == "baja precion" ? "selected" : "" ?>>Baja presión</option><option value="desgaste regular" <?= $checklistTecnico->rt49_7 == "desgaste regular" ? "selected" : "" ?>>Desgaste Regular</option></select></td>
                                                        <td><select name="r49_8" class="form-control"><option value="alta" <?= $checklistTecnico->rt49_8 == "alta" ? "selected" : "" ?>>Alta</option><option value="media" <?= $checklistTecnico->rt49_8 == "media" ? "selected" : "" ?>>Media</option><option value="baja" <?= $checklistTecnico->rt49_8 == "baja" ? "selected" : "" ?>>Baja</option></select></td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>KM. SALIDA</th>
                                                <th>KM. Proximo Servicio</th>
                                            </tr>
                                            <tr>
                                                <td><input type="number" class="form-control" name="kmsalida" value="<?= $detalleChecklist[0]['km_salida'] ?>" placeholder="KM Salida"></td>
                                                <td><input type="number" class="form-control" name="kmservicio" placeholder="KM Proximo Servicio" value="<?= $detalle[0]->km_servicio ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">REVISA/REALIZA TECNICO</th>
                                                <th scope="row" style="text-align: center;">SERVICIO DE TALLER EXTERNO</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><textarea rows="5" name="revisa_tecnico" class="form-control" placeholder="Revisa/Realiza Tecnico"><?= $detalleChecklist[0]['revisa_realiza_tecnico'] ?></textarea></td>
                                                <td style="text-align: center;"><textarea rows="5" name="servicio_solicitado" class="form-control" placeholder="Servicio Solicitado"><?= $detalleChecklist[0]['servicio_solicitado'] ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">REFACCIONES UTILIZADAS</th>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center;"><textarea rows="4" cols="7" name="r50" class="form-control" placeholder="REFACIONES UTILIZADAS"><?= $checklistTecnico->rt50 ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="text-align: center;">PENDIENTES A REALIZAR (PROGRAMACIÓN)</th>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center;"><textarea rows="4" cols="7" name="r51" class="form-control" placeholder="PENDIENTES A REALIZAR"><?= $checklistTecnico->rt51 ?></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-sm" width="100%">
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <div id="auto_comparacion7">
                                                                <img id='img_comp7' src="<?= base_url().$imagenesChecklistTecnico->imagen7 ?>">
                                                            </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">FIRMA TÉCNICO</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <center>
                                                            <div id="auto_comparacion8">
                                                                <img id='img_comp8' src="<?= base_url().$imagenesChecklistTecnico->imagen8 ?>">
                                                            </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="text-align: center;">VO.BO. CONTROL VEHICULAR</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="uid_servicio" id="uid_servicio" value="<?php echo $detalle[0]->uid ?>">
                                    <input type="hidden" name="uid_usuario"
                                        value="<?php echo $detalle[0]->uid_operador ?>">
                                    <input type="hidden" name="kilometraje" value="<?= $detalle[0]->kilometraje ?>">
                                    <input type="hidden" name="idtbl_catalogo" value="<?= $detalle[0]->idtbl_catalogo ?>">
                                    <input type="hidden" id="iddtl_almacen" name="iddtl_almacen"
                                        value="<?php echo $detalle[0]->iddtl_almacen ?>">
                                    <input type="hidden" name="servicio" id="servicio" value="<?= $detalle[0]->iddtl_servicio ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <?php if($detalle[0]->estatus != 'FINALIZADO'){ ?>
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                    <?php } ?>
                                </div>
                                <?=form_close()?>

                            </div>
                            <?php } ?>
                            <!-- /Si el checklistTecnico ya existe -->

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ***** Nuevo Modal ***** -->

</section>

<div id="caja_chica_modal" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart("", "id='caja_chica_form'") ?>
            <div class="modal-header">
                <h4>Refacciones Caja Chica</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-lg-6">
                        <div class="form-group">
                            <label>Unidad</label>
                            <input type="text" placeholder="Unidad" readonly name="unidad" class="form-control" value="<?= $detalle[0]->numero_interno ?>" required>
                        </div>
                    </div>
                    <input type="hidden" name="iddtl_almacen" value="<?php echo $detalle[0]->iddtl_almacen ?>">
                    <input type="hidden" name="idtbl_tramites_vehiculares" value="<?php echo $detalle[0]->idtbl_tramites_vehiculares ?>">
                    <input type="hidden" name="idtbl_caja_chica">
                    <input type="hidden" name="uid">
                    <input type="hidden" name="tipo" value="servicio">
                    <div class="col-3 col-lg-3">
                        <div class="form-group">
                            <label>Fecha de compra</label>
                            <input type="date" placeholder="Fecha de compra" name="fecha_compra" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-3 col-lg-3" id="proxima_fecha">
                        <div class="form-group">
                            <label>Comprobante</label>
                            <select name="comprobante" class="form-control" required>
                                <option value="">Seleccionar . . .</option>
                                <option value="factura">Factura</option>
                                <option value="nota">Nota</option>
                                <option value="vale">Vale</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea placeholder="Descripción" name="descripcion" required
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-3 col-lg-3">
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="number" placeholder="Costo" step="0.0001" name="costo" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Proyecto*</label>
                            <select name="idtbl_proyectos" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($proyectos as $key => $value): ?>
                                  <option value="<?php echo $value->idtbl_proyectos ?>"
                                    data-direccion="<?php echo $value->direccion ?>">
                                    <?php echo $value->numero_proyecto ?> -
                                    <?php echo substr($value->nombre_proyecto, 0, 70) ?>
                                  </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12" id="archivo">
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="archivo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--<input type="hidden" name="idtbl_proyectos" value="<?php echo $detalle[0]->tbl_proyectos_idtbl_proyectos != NULL ? $detalle[0]->tbl_proyectos_idtbl_proyectos : 9 ?>">-->
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
  function verImagen() {
    <?php $imagenes = json_decode($detalle[0]->imagenes); ?>
    var canvas = document.getElementById("draw-canvas");
    if(canvas == null){
        return;
    }
    var ctx = canvas.getContext("2d");
    var img = new Image();
    img.src = "<?= base_url() ?>uploads/autos/" + '<?= $imagenes->imagen1 ?>';
    ctx.drawImage(img, 0, 0);
    img.onload = function() {
        ctx.drawImage(img, 0, 0);
    }
}

function verImagen2() {
    <?php $imagenes = json_decode($detalle[0]->imagenes); ?>
    var canvas = document.getElementById("draw-canvas2");
    if(canvas == null){
        return;
    }
    var ctx = canvas.getContext("2d");
    var img = new Image();
    img.src = "<?= base_url() ?>uploads/autos/" + '<?= $imagenes->imagen2 ?>';
    ctx.drawImage(img, 0, 0);
    img.onload = function() {
        ctx.drawImage(img, 0, 0);
    }
}

function verImagen3() {
    <?php $imagenes = json_decode($detalle[0]->imagenes); ?>
    var canvas = document.getElementById("draw-canvas3");
    if(canvas == null){
        return;
    }
    var ctx = canvas.getContext("2d");
    var img = new Image();
    img.src = "<?= base_url() ?>uploads/autos/" + '<?= $imagenes->imagen3 ?>';
    ctx.drawImage(img, 0, 0);
    img.onload = function() {
        ctx.drawImage(img, 0, 0);
    }
}
$('#iniciar_servicio').click(function(event) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar el servicio?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            var servicio = $('#servicio').val();
            var uid = $('#uid').val();
            $.ajax({
                url: "<?= base_url()?>control-vehicular/iniciar-servicio",
                type: "post",
                dataType: "json",
                data: {
                    'servicio': servicio
                },
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        )
                        location.href =
                            "<?= base_url() ?>control-vehicular/detalle-servicio/" + uid;
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

$('.generar-checklist').click(function(event){
  //alert('si');
    $('#modal_finalizar_servicio').modal('show');
    verImagen();
    verImagen2();
    verImagen3();
    //var id_last_checklist = $("#iddtl-almacen").val();
    
    //getLastChecklist(id_last_checklist); 
});


$('.generar-checklist-tecnico').click(function(event){
  //alert('si');
    $('#modal_finalizar_servicio1').modal('show');
    //verImagen();
    //verImagen2();
    //verImagen3();
    //var id_last_checklist = $("#iddtl-almacen").val();
    
    //getLastChecklist(id_last_checklist); 
});

$('.generar-solicitud-refacciones').click(function(event){
    window.location.href = "<?= base_url()?>almacen/solicitud-refacciones-control-vehicular/<?= $detalle[0]->idtbl_tramites_vehiculares ?>/<?= $detalle[0]->dtl_almacen_iddtl_almacen ?>/<?= $uid ?>";
});

/*$('#finalizar_servicio').click(function(event) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea finalizar el servicio?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            var servicio = $('#servicio').val();
            var uid = $('#uid').val();
            $.ajax({
                url: "<?= base_url()?>control-vehicular/finalizar-servicio",
                type: "post",
                dataType: "json",
                data: {
                    'servicio': servicio
                },
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        )
                        location.href =
                            "<?= base_url() ?>control-vehicular/detalle-servicio/" + uid;
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
});*/
$(".calculateKM").click(function(){
    calculateKM();
});
$("#kmsalida").keyup(function(){
    calculateKM();
});
$("#kmsalida").blur(function(){
    calculateKM();
});

function calculateKM(){
    console.log("kmsalida");
    var radios = $(".calculateKM");
    if(radios[0].checked){
        kmsalida= $("input[name='kmsalida']").val();
        if(kmsalida == "")
            return;
        element = $("input[name='kmservicio']");
        element.val((parseFloat(kmsalida) + 7000).toFixed(2));
    }else{
        element = $("input[name='kmservicio']");
        element.val(element.data("value"));
    }
}

/*$('#caja_chica_modal').on('show.bs.modal', function (e) {
    var modal = $(this);
    modal.find("select[name='idtbl_proyectos']").val("<?php echo $detalle[0]->tbl_proyectos_idtbl_proyectos != NULL ? $detalle[0]->tbl_proyectos_idtbl_proyectos : '' ?>");
    $('.selectpicker').selectpicker('refresh');
});*/

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
    var canvas = document.getElementById("draw-canvas");
    if(canvas == null){
        return;
    }
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
    if(canvas2 == null){
        return;
    }
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
    if(canvas3 == null){
        return;
    }
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
    if(canvas4 == null){
        return;
    }
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
</script>
<script>
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
    if(canvas5 == null){
        return;
    }
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
    var canvas7 = document.getElementById("draw-canvas7");
    if(canvas7 == null){
        return;
    }
    var ctx7 = canvas7.getContext("2d");

    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText7 = document.getElementById("draw-dataUrl7");
    var drawImage7 = document.getElementById("draw-image7");
    var clearBtn7 = document.getElementById("draw-clearBtn7");
    var submitBtn7 = document.getElementById("draw-submitBtn7");
    clearBtn7.addEventListener("click", function(e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        $('#draw-submitBtn5').attr("disabled", false);
        $('#draw-submitBtn5').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn5").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
        drawImage5.setAttribute("src", "");
    }, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
    submitBtn7.addEventListener("click", function(e) {
        var dataUrl = canvas7.toDataURL();
        drawText7.innerHTML = dataUrl;
        drawImage7.setAttribute("src", dataUrl);
        $('#draw-submitBtn7').attr("disabled", true);
        $('#draw-submitBtn7').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn7").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
    }, false);

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;
    canvas7.addEventListener("mousedown", function(e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint7 = document.getElementById("color7");
        var punta7 = document.getElementById("puntero7");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas7, e);
    }, false);
    canvas7.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);
    canvas7.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas7, e);
    }, false);

    // Activamos touchEvent para nuestra pagina
    canvas7.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas7, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas7.dispatchEvent(mouseEvent);
    }, false);
    canvas7.addEventListener("touchend", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas7.dispatchEvent(mouseEvent);
    }, false);
    canvas7.addEventListener("touchleave", function(e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas7.dispatchEvent(mouseEvent);
    }, false);
    canvas7.addEventListener("touchmove", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas7.dispatchEvent(mouseEvent);
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
            var tint7 = document.getElementById("color7");
            var punta7 = document.getElementById("puntero7");
            ctx7.strokeStyle = tint7.value;
            ctx7.beginPath();
            ctx7.moveTo(lastPos.x, lastPos.y);
            ctx7.lineTo(mousePos.x, mousePos.y);
            console.log(punta7.value);
            ctx7.lineWidth = punta7.value;
            ctx7.stroke();
            ctx7.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas7.width = canvas7.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();

})();

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
    var canvas8 = document.getElementById("draw-canvas8");
    if(canvas8 == null){
        return;
    }
    var ctx8 = canvas8.getContext("2d");

    // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
    var drawText8 = document.getElementById("draw-dataUrl8");
    var drawImage8 = document.getElementById("draw-image8");
    var clearBtn8 = document.getElementById("draw-clearBtn8");
    var submitBtn8 = document.getElementById("draw-submitBtn8");
    clearBtn8.addEventListener("click", function(e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        $('#draw-submitBtn8').attr("disabled", false);
        $('#draw-submitBtn8').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn8").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
        drawImage5.setAttribute("src", "");
    }, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
    submitBtn8.addEventListener("click", function(e) {
        var dataUrl = canvas8.toDataURL();
        drawText8.innerHTML = dataUrl;
        drawImage8.setAttribute("src", dataUrl);
        $('#draw-submitBtn8').attr("disabled", true);
        $('#draw-submitBtn8').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn8").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
    }, false);

    // Activamos MouseEvent para nuestra pagina
    var drawing = false;
    var mousePos = {
        x: 0,
        y: 0
    };
    var lastPos = mousePos;
    canvas8.addEventListener("mousedown", function(e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint8 = document.getElementById("color8");
        var punta8 = document.getElementById("puntero8");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas8, e);
    }, false);
    canvas8.addEventListener("mouseup", function(e) {
        drawing = false;
    }, false);
    canvas8.addEventListener("mousemove", function(e) {
        mousePos = getMousePos(canvas8, e);
    }, false);

    // Activamos touchEvent para nuestra pagina
    canvas8.addEventListener("touchstart", function(e) {
        mousePos = getTouchPos(canvas8, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas8.dispatchEvent(mouseEvent);
    }, false);
    canvas8.addEventListener("touchend", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas8.dispatchEvent(mouseEvent);
    }, false);
    canvas8.addEventListener("touchleave", function(e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas8.dispatchEvent(mouseEvent);
    }, false);
    canvas8.addEventListener("touchmove", function(e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
            clientX: touch.clientX,
            clientY: touch.clientY
        });
        canvas8.dispatchEvent(mouseEvent);
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
            var tint8 = document.getElementById("color8");
            var punta8 = document.getElementById("puntero8");
            ctx8.strokeStyle = tint8.value;
            ctx8.beginPath();
            ctx8.moveTo(lastPos.x, lastPos.y);
            ctx8.lineTo(mousePos.x, mousePos.y);
            console.log(punta8.value);
            ctx8.lineWidth = punta8.value;
            ctx8.stroke();
            ctx8.closePath();
            lastPos = mousePos;
        }
    }

    function clearCanvas() {
        canvas8.width = canvas8.width;
    }

    // Allow for animation
    (function drawLoop() {
        requestAnimFrame(drawLoop);
        renderCanvas();
    })();

})();

$("#form-checklist").on("submit", function(event) {
    var button = $(this).find("input[type='submit']");
    var servicio = $('#servicio').val();
    var uid = $('#uid_servicio').val();
    if (event.isDefaultPrevented()) {
        console.log('Error');
    } else {
        event.preventDefault();
        button.prop("disabled", true);
        var formData = new FormData(document.getElementById("form-checklist"));
        $.ajax({
            url: "<?= base_url()?>control-vehicular/guardarChecklistServicio",
            type: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if (resp.status) {
                    Toast.fire({
                        type: 'success',
                        title: resp.message
                    })
                    location.href = "<?= base_url() ?>control-vehicular/detalle-servicio/" + uid;
                } else {
                    Toast.fire({
                        type: 'error',
                        title: resp.message
                    });
                    button.prop("disabled", false);
                }
            },
            error: function(){
                button.prop("disabled", false);
            }
        });
    }
});

$("#form-checklist-tecnico").on("submit", function(event){
    event.preventDefault();
    event.stopPropagation();
    var form = $("#form-checklist-tecnico")[0];
    var button = $(this).find("input[type='submit']");
    if (form.checkValidity() === false) {
        return;         
    }
    var jsonChecklist = {checklist:{}, data:{}, images: {}};
    var formData = new FormData(form);
    var pattern = /^(rt|tt)([0-9]+)/;
    var patternImagenes = /^imagen([0-9]+)/;
    for(var key of formData.keys()){
        if(pattern.test(key)){
            jsonChecklist.checklist[key] = formData.get(key);
        }else if(patternImagenes.test(key)){
            jsonChecklist.images[key] = formData.get(key);
        }else{
            jsonChecklist.data[key] = formData.get(key);
        }
    }
    console.log(jsonChecklist);
    button.prop("disabled", true);
    $.ajax({
        url: "<?= base_url()?>control-vehicular/guardarChecklistTecnicoServicio",
        type: "post",
        dataType: "text",
        data: JSON.stringify(jsonChecklist),
        processData: false,
        contentType: false,
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
                Toast.fire({
                    type: 'success',
                    title: resp.message
                })
                location.href = "<?= base_url() ?>control-vehicular/detalle-servicio/" + jsonChecklist.data.uid_servicio;
            } else {
                Toast.fire({
                    type: 'error',
                    title: resp.message
                });
                button.prop("disabled", false);
            }
        },
        error: function(){
            button.prop("disabled", false);
        }
    });
});

$('#caja_chica_modal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data();
    var modal = $('#caja_chica_modal');
    if(recipient.action == "new"){
        modal.find("input[name='fecha_compra']").val("");
        modal.find("select[name='comprobante']").val("");
        modal.find("textarea[name='descripcion']").val("");
        modal.find("input[name='costo']").val("");
        modal.find("input[name='archivo']").val("");
        modal.find("input[name='archivo']").prop("required", true);
        modal.find("input[name='idtbl_caja_chica']").val("");
        modal.find("input[name='uid']").val("");
        modal.find("select[name='idtbl_proyectos']").val("<?php echo $detalle[0]->tbl_proyectos_idtbl_proyectos != NULL ? $detalle[0]->tbl_proyectos_idtbl_proyectos : '' ?>");
        $('.selectpicker').selectpicker('refresh');
    }else{
        modal.find("input[name='fecha_compra']").val(recipient.fechaCompra);
        modal.find("select[name='comprobante']").val(recipient.comprobante);
        modal.find("textarea[name='descripcion']").val(recipient.descripcion);
        modal.find("input[name='costo']").val(recipient.monto);
        modal.find("input[name='archivo']").val("");
        modal.find("input[name='archivo']").prop("required", false);
        modal.find("input[name='idtbl_caja_chica']").val(recipient.idtblCajaChica);
        modal.find("input[name='uid']").val(recipient.uid);
        modal.find("select[name='idtbl_proyectos']").val(recipient.idtblProyecto);
        $('.selectpicker').selectpicker('refresh');
    }
});

$("#caja_chica_form").on("submit", function(e){
    e.preventDefault();
    var form = $(this);
    var button = form.find("button[type='submit']");
    var formData = new FormData(this);
    button.prop("disabled",true);
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/registro_caja_chica",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (!resp.error) {
                Toast.fire({
                    type: 'success',
                    title: resp.mensaje
                })
                mostrarDatos();
                button.prop("disabled",false);
                $('#caja_chica_modal').modal('hide');
            } else {
                Toast.fire({
                    type: 'error',
                    title: resp.mensaje
                });
                button.prop("disabled",false);
            }
        }
    });
});

$("body").on('click', '.eliminar_registro_caja_chica', function(e){
    e.preventDefault();
    var button = $(this);
    var recipient = button.data();
    button.prop("disabled",true);
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/eliminar_registro_caja_chica",
        type: "post",
        data: {
            idtbl_caja_chica: recipient.idtblCajaChica,
            token: '<?= $token ?>'
        },
        dataType: "json",
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (!resp.error) {
                Toast.fire({
                    type: 'success',
                    title: resp.mensaje
                })
                mostrarDatos();
                button.prop("disabled",false);
                $('#caja_chica_modal').modal('hide');
            } else {
                Toast.fire({
                    type: 'error',
                    title: resp.mensaje
                });
                button.prop("disabled",false);
            }
        }
    });
});

mostrarDatos();
function mostrarDatos() {
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/obtener_caja_chica",
        type: "POST",
        data: {
            "idtbl_tramites_vehiculares" : <?= $detalle[0]->idtbl_tramites_vehiculares ?>
        },
        dataType: "json",
        success: function(response) {
            console.log(response);
            $('#tbcajachica tbody').html("");
            if(response.length == 0){
                $("#caja_chica_tabla").css("display", "none");
                return;
            }else{
                $("#caja_chica_tabla").css("display", "block");
            }
            var filas = "";
            $.each(response, function(key, item) {
                filas += "<tr>";
                filas += "<td>" + item.idtbl_caja_chica  + "</td>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.numero_proyecto + " " + item.nombre_proyecto + "</td>";
                filas += "<td>" + item.fecha_compra + "</td>";
                filas += "<td>" + item.monto + "</td>";
                filas += "<td>" + item.descripcion + "</td>";
                filas += "<td>" + item.comprobante + "</td>";
                filas += "<td>";
                <?php if($this->session->userdata('id') == 66 || $this->session->userdata('id') == 157){ ?>
                    filas += "<a href='#caja_chica_modal' data-toggle='modal' data-action='edit' data-fecha-compra='" + item.fecha_compra + "' data-monto='" + item.monto + "' data-descripcion='" + item.descripcion + "' data-comprobante='" + item.comprobante + "' data-idtbl-caja-chica='" + item.idtbl_caja_chica + "' data-uid='" + item.uid + "' data-idtbl-proyecto='" + item.tbl_proyectos_idtbl_proyectos +  "' type='button'><li class='fa fa-edit'></li></a><a href='#' class='eliminar_registro_caja_chica' data-idtbl-caja-chica='" + item.idtbl_caja_chica + "'><li class='fa fa-trash-o'></li></a>";
                <?php } ?>
                filas += "<a href='<?= base_url() ?>uploads/caja_chica/" + item.uid + ".pdf' target='_black'><i class='fa fa-file-pdf-o'></i></a>";
                filas += "</td>";
                filas += "</tr>";
            });
            $('#tbcajachica tbody').html(filas);
        }
    });
}

</script>

