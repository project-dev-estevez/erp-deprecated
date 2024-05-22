<br>
<div class="container-fluid">
    <div class="row">
        <div class="card">            

                <?= validation_errors('<span class="error">', '</span>'); ?>
                <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist"'); ?>                

                <!-- Si el checklist ya existe -->
                <?php if(isset($checklist)){ ?>
                    <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8">
                            <h2 align="center"><?= $detalle[0]->modelo ?></h2>
                        </div>
                        <div class="col-4">
                            <h6 style="font-weight: normal" align="right" class="ecocheck">Folio:
                                <strong><?= $detalle[0]->idtbl_tramites_vehiculares ?></strong>
                            </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <h3 align="center">ORDEN DE MANTENIMIENTO PREVENTIVO-CORRECTIVO</h3>
                        </div>
                        <div class="col-3">
                            <h6 style="font-weight: normal" align="right" class="ecocheck">Fecha:
                                <strong><?= date('d-m-Y') ?></strong>
                            </h6>
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
                                    <!--<th scope="row" style="text-align: center;">Modulo: </th>
                                    <td colspan="2"><?= $detalleChecklist[0]['modulo'] ?>
                                    </td>-->
                                    <th scope="row" style="text-align: center;">Departamento: </th>
                                    <td colspan="2">Control Vehicular</td>
                                </tr>
                                <tr>
                                    <!--<th scope="row" style="text-align: center;">Departamento: </th>
                                    <td colspan="2">Control Vehicular</td>-->
                                    <th scope="row" style="text-align: center;">Tecnico Asignado: </th>
                                    <td colspan="2"><?= $detalle[0]->mecanico ?></td>
                                    <th scope="row" style="text-align: center;">N° Proyecto</th>
                                    <td colspan="2"><?= $detalleChecklist[0]['numero_proyecto'] ?></td>
                                </tr>
                                <tr>
                                    <!--<th scope="row" style="text-align: center;">N° Proyecto</th>
                                    <td colspan="2"><?= $detalleChecklist[0]['numero_proyecto'] ?></td>-->
                                    <!--<th scope="row" style="text-align: center;">Centro de costo:</th>
                                    <td><?= $detalleChecklist[0]['centro_costo'] ?></td>-->
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
                                    <td rowspan="3" style="text-align: center;">
                                        <?= $detalleChecklist[0]['nivel_gasolina'] ?>
                                    </td>
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
                                            <td><input type="text" name="t1" value="ALARMA" class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r1"
                                                    <?php if($checklist->r1 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r1"
                                                    <?php if($checklist->r1 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t2" value="BIRLOS DE SEGURIDAD"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r2"
                                                    <?php if($checklist->r2 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r2"
                                                    <?php if($checklist->r2 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t3" value="CALAVERAS" class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r3"
                                                    <?php if($checklist->r3 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r3"
                                                    <?php if($checklist->r3 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t4" value="CALCOMANIA VERIFICACION"
                                                    class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r4"
                                                    <?php if($checklist->r4 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r4"
                                                    <?php if($checklist->r4 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t5" value="CUARTO DE LUZ" class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r5"
                                                    <?php if($checklist->r5 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r5"
                                                    <?php if($checklist->r5 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t6" value="DIRECCIONALES" class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r6"
                                                    <?php if($checklist->r6 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r6"
                                                    <?php if($checklist->r6 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t7" value="ELEVADOR DERECHO"
                                                    class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r7"
                                                    <?php if($checklist->r7 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r7"
                                                    <?php if($checklist->r7 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t8" value="ELEVADOR IZQUIERDO"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r8"
                                                    <?php if($checklist->r8 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r8"
                                                    <?php if($checklist->r8 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t9" value="ESPEJO LATERAL DERECHO"
                                                    class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r9"
                                                    <?php if($checklist->r9 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r9"
                                                    <?php if($checklist->r9 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t10" value="ESPEJO LATERAL IZQUIERDO"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r10"
                                                    <?php if($checklist->r10 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r10"
                                                    <?php if($checklist->r10 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t11" value="LIMPIADORES" class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r11"
                                                    <?php if($checklist->r11 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r11"
                                                    <?php if($checklist->r11 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t12" value="LUCES / ALTAS / BAJAS"
                                                    class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r12"
                                                    <?php if($checklist->r12 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r12"
                                                    <?php if($checklist->r12 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t13" value="TAPON DE GASOLINA"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r13"
                                                    <?php if($checklist->r13 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r13"
                                                    <?php if($checklist->r13 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t14" value="TAPONES DE LLANTAS"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r14"
                                                    <?php if($checklist->r14 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r14"
                                                    <?php if($checklist->r14 == 'no'){ ?>checked<?php } ?>></td>
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
                                            <td><input type="text" name="t15" value="CERTIFICADO VERIFICA"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r15"
                                                    <?php if($checklist->r15 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r15"
                                                    <?php if($checklist->r15 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t16" value="CLAXON" class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r16"
                                                    <?php if($checklist->r16 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r16"
                                                    <?php if($checklist->r16 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t17" value="GATO" class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r17"
                                                    <?php if($checklist->r17 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r17"
                                                    <?php if($checklist->r17 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t18" value="INDICADOR GASOLINA"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r18"
                                                    <?php if($checklist->r18 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r18"
                                                    <?php if($checklist->r18 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t19" value="INDICADOR VELOCIDAD"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r19"
                                                    <?php if($checklist->r19 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r19"
                                                    <?php if($checklist->r19 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t20" value="INDICADOR TEMPERATURA"
                                                    class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r20"
                                                    <?php if($checklist->r20 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r20"
                                                    <?php if($checklist->r20 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t21" value="LLANTA DE REFACCION"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r21"
                                                    <?php if($checklist->r21 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r21"
                                                    <?php if($checklist->r21 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t22" value="LLAVE DE TUERCAS"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r22"
                                                    <?php if($checklist->r22 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r22"
                                                    <?php if($checklist->r22 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t23" value="POLIZA DE SEGURO"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r23"
                                                    <?php if($checklist->r23 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r23"
                                                    <?php if($checklist->r23 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t24" value="TARJETA CIRCULACION"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r24"
                                                    <?php if($checklist->r24 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r24"
                                                    <?php if($checklist->r24 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t25" value="TRIANGULOS SEGURIDAD"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r25"
                                                    <?php if($checklist->r25 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r25"
                                                    <?php if($checklist->r25 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t26" value="UNIDAD LIMPIA"
                                                    class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r26"
                                                    <?php if($checklist->r26 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r26"
                                                    <?php if($checklist->r26 == 'no'){ ?>checked<?php } ?>></td>
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
                                            <td><input type="text" name="t27" value="BATERIA" class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r27"
                                                    <?php if($checklist->r27 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r27"
                                                    <?php if($checklist->r27 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t28" value="NIVEL ANTICONGELANTE"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r28"
                                                    <?php if($checklist->r28 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r28"
                                                    <?php if($checklist->r28 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t29" value="NIVEL ACEITE MOTOR"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r29"
                                                    <?php if($checklist->r29 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r29"
                                                    <?php if($checklist->r29 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t30" value="NIVEL LIQUIDO FRENOS"
                                                    class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r30"
                                                    <?php if($checklist->r30 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r30"
                                                    <?php if($checklist->r30 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t31" value="TAPON DE ACEITE"
                                                    class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r31"
                                                    <?php if($checklist->r31 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r31"
                                                    <?php if($checklist->r31 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t32" value="TAPON RADIADOR"
                                                    class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r32"
                                                    <?php if($checklist->r32 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r32"
                                                    <?php if($checklist->r32 == 'no'){ ?>checked<?php } ?>></td>
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
                                            <td><input type="text" name="t33" value="ANTENA" class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r33"
                                                    <?php if($checklist->r33 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r33"
                                                    <?php if($checklist->r33 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t34" value="ENCENDEDOR" class="form-control">
                                            </td>
                                            <td><input value="si" required type="radio" name="r34"
                                                    <?php if($checklist->r34 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r34"
                                                    <?php if($checklist->r34 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t35" value="RADIO / ESTEREO"
                                                    class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r35"
                                                    <?php if($checklist->r35 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r35"
                                                    <?php if($checklist->r35 == 'no'){ ?>checked<?php } ?>></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="t36" value="TAPETES" class="form-control"></td>
                                            <td><input value="si" required type="radio" name="r36"
                                                    <?php if($checklist->r36 == 'si'){ ?>checked<?php } ?>></td>
                                            <td><input value="no" required type="radio" name="r36"
                                                    <?php if($checklist->r36 == 'no'){ ?>checked<?php } ?>></td>
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
                                        <td style="text-align: center;"><input value="electrica" required type="radio"
                                                name="falla"
                                                <?php if($detalleChecklist[0]['falla'] == 'electrica'){ ?>checked<?php } ?>><label
                                                for="electrica">ELÉCTRICA</label></td>
                                        <td style="text-align: center;"><input value="mecanica" required type="radio"
                                                name="falla"
                                                <?php if($detalleChecklist[0]['falla'] == 'mecanica'){ ?>checked<?php } ?>><label
                                                for="mecanica">MECÁNICA</label></td>
                                        <td style="text-align: center;"><input value="hojalateria" required type="radio"
                                                name="falla"
                                                <?php if($detalleChecklist[0]['falla'] == 'hojalateria'){ ?>checked<?php } ?>><label
                                                for="hojalateria">HOJALATERÍA</label></td>
                                        <td style="text-align: center;"><input value="otra" required type="radio"
                                                name="falla"
                                                <?php if($detalleChecklist[0]['falla'] == 'otro'){ ?>checked<?php } ?>><label
                                                for="otra">OTRA</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
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
                                            <td style="text-align: center;">
                                                <?= $detalleChecklist[0]['detalle_conductor'] ?>
                                            </td>
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
                                            <th scope="col" style="text-align: center;">REVISA/REALIZA
                                                TECNICO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">
                                                <?= $detalleChecklist[0]['revisa_realiza_tecnico'] ?></td>
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
                                            <td style="text-align: center;">
                                                <?= $detalleChecklist[0]['servicio_solicitado'] ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="table">
                        <table class="table" style="width: 100%;">
                            <tbody>
                                <tr>
                                    <th rowspan="2" scope="row" style="text-align: center;">TALLER ASIGNADO:
                                    </th>
                                    <td rowspan="2" style="text-align: center;"><?= $detalleChecklist[0]['taller'] ?>
                                    </td>
                                    <th rowspan="2" scope="row" style="text-align: center;">TECNICO QUE
                                        REALIZA EL TRASLADO:</th>
                                    <td rowspan="2" style="text-align: center;">
                                        <?= $detalleChecklist[0]['mecanico_traslado'] ?>
                                    </td>
                                    <th rowspan="2" scope="row" style="text-align: center;">FECHA</th>
                                    <th scope="row" style="text-align: center;">SALIDA A TALLER:</th>
                                    <td style="text-align: center;"><?= $detalleChecklist[0]['salida_taller'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: center;">REGRESO DE TALLER:</th>
                                    <td style="text-align: center;"><?= $detalleChecklist[0]['regreso_taller'] ?></td>
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
                                    <td style="text-align: center;">
                                        <?= $detalleChecklist[0]['observaciones_inventario'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align: center;">DIAGNÓSTICO DE FALLA
                                        (INDICAR SI FUE POR... DESGASTE || USO NORMAL || PROVOCADA)</th>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><?= $detalleChecklist[0]['diagnostico_falla'] ?>
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
                                                    <img id='img_comp1'
                                                        src="<?= base_url().$imagenesChecklist->imagen4 ?>">
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
                                                    <img id='img_comp1'
                                                        src="<?= base_url().$imagenesChecklist->imagen5 ?>">
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
                                                    <img id='img_comp1'
                                                        src="<?= base_url().$imagenesChecklist->imagen6 ?>">
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




                </div>
                <?php } ?>
                <!-- /Si el checklist ya existe -->
            
        </div>
    </div>
</div>