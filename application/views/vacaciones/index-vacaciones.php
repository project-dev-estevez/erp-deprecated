<link type="text/css" rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/css/jquery.Jcrop.min.css" />
<script src="<?= base_url() ?>js/jquery.Jcrop.js"></script>
<script src="<?= base_url() ?>js/jquery.color.js"></script>
<div class="over"></div>
<div class="spinner" style="display: none">
    <div class="double-bounce1"></div>
    <div class="double-bounce2"></div>
</div>
<?php $dias_antiguedad = date_diff(date_create($detalle->fecha_ingreso), date_create('now'))->format('%a'); ?>
<section class="no-padding">
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col">
                <?php if ($detalle->estatus == 0) : ?>
                <div class="alert alert-danger" role="alert">
                    El personal se encuentra actualmente con estatus baja. <a
                        href="<?= base_url() ?>personal/detalle-baja/<?= $detalle->uid_usuario ?>"
                        onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">Ver
                        historial</a>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>

<section class="dashboard-counts no-padding botones">
    <div class="container-fluid">

        <div class="row">
            
            <div class="col-xl-3 col-sm-6">
                <div class="bg-white has-shadow">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#vacacionesModal">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-violet"><i class="fa-calendar fa"></i></div>
                            <div class="title"><span>Vacaciones</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Item -->

        </div>
     
    </div>
</section>

<section class="tables">
    <div class="container-fluid">
        

    <div class="row">
        <div class="col-12">
          
          
            
         
         
            <!-- Detalle Vacaciones y Permisos  -->
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="h4">Detalle Vacaciones y Permisos</h4>
                </div>
                <div class="card-body">
                    <div class="row" style="display:none;">
                        <div class="col-12 col-lg-6">
                            <?php 
                        $total_periodos = []; 
                        $total_dias_disfrutados = 0;
                        foreach($dias_disfrutados_vacaciones AS $value){
                          $itemPeriodo = json_decode($value->periodo);
                          $itemDias = json_decode($value->dias_disfrutar);
                          for($r = 0; $r < count($itemPeriodo); $r++){
                            $total_periodos[$itemPeriodo[$r]] = $total_periodos[$itemPeriodo[$r]] == null ? $itemDias[$r] : $total_periodos[$itemPeriodo[$r]] + $itemDias[$r];
                          }
                        }
                        foreach($total_periodos AS $value){
                          $total_dias_disfrutados += $value;
                        }                        
                      ?>
                            <?php $dias_vacaciones = dias_vacaciones($dias_antiguedad); ?>
                            <p>
                                Años de servicio: <strong><?= number_format($dias_antiguedad / 365, 2) ?> años.</strong>
                            </p>
                            <p>Con derecho a: <strong><?php echo $dias_vacaciones ?> días.</strong></p>
                            <p id="dias_disfrutados">
                                Días de vacaciones disfrutados: <strong><?= $total_dias_disfrutados  ?> días.</strong>
                            </p>
                            <p id="dias_disponibles">
                                Días de vacaciones disponibles:
                                <strong><?= $dias_vacaciones - $total_dias_disfrutados ?> días.</strong>
                            </p>
                            <p id="dias_proporcionales">
                                Días de vacaciones proporcionales: <strong><?= $dias_proporcionales ?> días.</strong>
                            </p>
                        </div>
                        <div class="col-12 col-lg-6">
                            Detalle Periodos
                            <table style="width: 100%" class="table">
                                <thead>
                                    <th class="text-center">Periodo</th>
                                    <th class="text-center">Con derecho a</th>
                                    <th class="text-center">Disfrutados</th>
                                    <th class="text-center">Restan</th>
                                </thead>
                                <tbody>
                                    <?php $dias_totales_vacaciones = 0; ?>
                                    <?php $dias = 365 ?>
                                    <?php $dias_auxiliar = 0 ?>
                                    <?php $dias_disfrutados_vacaciones_aux = 0 ?>
                                    <?php $dias_antes = ((($dias_antiguedad - $dias_antiguedad % 365))) ?>
                                    <?php $dias_total = 0 ?>


                                    <?php for ($x = 0; $x < (($dias_antiguedad - $dias_antiguedad % 365) / 365); $x++) { ?>

                                    <tr>
                                        <td align="center">
                                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?>-<?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))) ?>
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias);
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?>
                                            días.
                                        </td>
                                        <td align="center">
                                            <?php if ((($dias_antiguedad - $dias_antiguedad % 365) / 365) == $x + 1) { ?>
                                            <?php if ($dias_antiguedad - $dias_antes > 182) { ?>
                                            <?= $periodo[$x]['dias'] = 0 ?> días (pasaron 6 meses)
                                            <?php $dias_total += 0; ?>
                                            <?php } else { ?>
                                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?>
                                            días.
                                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones_calculos($dias) - $dias_disfrutados_vacaciones_aux : 0 ?>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <?= $periodo[$x]['dias'] = 0 ?> días
                                            <?php $dias_total += 0; ?>
                                            <?php } ?>
                                            <?php $dias_totales_vacaciones += $periodo[$x]['dias']; ?>
                                        </td>
                                        <?php
                          if ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) {
                              $dias_disfrutados_vacaciones_aux = 0;
                          } else {
                              $dias_disfrutados_vacaciones_aux = $dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias);
                          }
                          ?>
                                    </tr>
                                    <?php $dias += 365; ?>

                                    <?php } ?>
                                    <?php if (($dias_antiguedad % 365) > 1) : ?>
                                    <tr>
                                        <td align="center">
                                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?>
                                            -
                                            <?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))); ?>
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?>
                                            días (Proporcionales).
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?>
                                            días.
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['dias'] = $dias_proporcionales = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?>
                                            días.
                                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones($dias_antiguedad) - $dias_auxiliar - $dias_disfrutados_vacaciones_aux : dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?>
                                            <?php $dias_totales_vacaciones += $periodo[$x]['dias']; ?>
                                        </td>
                                    </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <?php 
                        $total_periodos = []; 
                        $total_dias_disfrutados = 0;
                        foreach($dias_disfrutados_vacaciones AS $value){
                          $itemPeriodo = json_decode($value->periodo);
                          $itemDias = json_decode($value->dias_disfrutar);
                          for($r = 0; $r < count($itemPeriodo); $r++){
                            $total_periodos[$itemPeriodo[$r]] = $total_periodos[$itemPeriodo[$r]] == null ? $itemDias[$r] : $total_periodos[$itemPeriodo[$r]] + $itemDias[$r];
                          }
                        }
                        foreach($total_periodos AS $value){
                          $total_dias_disfrutados += $value;
                        }                        
                      ?>
                            <?php $dias_vacaciones = dias_vacaciones($dias_antiguedad); ?>
                            <p>
                                Años de servicio: <strong><?= number_format($dias_antiguedad / 365, 2) ?> años.</strong>
                            </p>
                            <p>Con derecho a: <strong><?php echo $dias_vacaciones ?> días.</strong></p>
                            <p id="dias_disfrutados">
                                Días de vacaciones disfrutados: <strong><?= $total_dias_disfrutados  ?> días.</strong>
                            </p>
                            <p id="dias_disponibles">
                                Días de vacaciones disponibles: <strong><?= $dias_totales_vacaciones ?> días.</strong>
                            </p>
                            <p id="dias_proporcionales">
                                Días de vacaciones proporcionales: <strong><?= $dias_proporcionales ?> días.</strong>
                            </p>
                        </div>
                        <div class="col-12 col-lg-6">
                            Detalle Periodos
                            <table style="width: 100%" class="table">
                                <thead>
                                    <th class="text-center">Periodo</th>
                                    <th class="text-center">Con derecho a</th>
                                    <th class="text-center">Disfrutados</th>
                                    <th class="text-center">Restan</th>
                                </thead>
                                <tbody>
                                    <?php $dias = 365 ?>
                                    <?php $dias_auxiliar = 0 ?>
                                    <?php $dias_disfrutados_vacaciones_aux = 0 ?>
                                    <?php $dias_antes = ((($dias_antiguedad - $dias_antiguedad % 365))) ?>
                                    <?php $dias_total = 0 ?>


                                    <?php for ($x = 0; $x < (($dias_antiguedad - $dias_antiguedad % 365) / 365); $x++) { ?>

                                    <tr>
                                        <td align="center">
                                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?>-<?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))) ?>
                                        </td>
                                        <td align="center">
                                            <?php if(intval($periodo[$x]['fechaFin']) < 2023){ ?>
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias) - 6;
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                                            <?php }else{ ?>
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias);
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                                            <?php } ?>
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?>
                                            días.
                                        </td>
                                        <td align="center">
                                            <?php if ((($dias_antiguedad - $dias_antiguedad % 365) / 365) == $x + 1) { ?>
                                            <?php if ($dias_antiguedad - $dias_antes > 182) { ?>
                                            <?= $periodo[$x]['dias'] = 0 ?> días (pasaron 6 meses)
                                            <?php $dias_total += 0; ?>
                                            <?php } else { ?>
                                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?>
                                            días.
                                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones_calculos($dias) - $dias_disfrutados_vacaciones_aux : 0 ?>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <?= $periodo[$x]['dias'] = 0 ?> días
                                            <?php $dias_total += 0; ?>
                                            <?php } ?>
                                        </td>
                                        <?php
                          if ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) {
                              $dias_disfrutados_vacaciones_aux = 0;
                          } else {
                              $dias_disfrutados_vacaciones_aux = $dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias);
                          }
                          ?>
                                    </tr>
                                    <?php $dias += 365; ?>

                                    <?php } ?>
                                    <?php if (($dias_antiguedad % 365) > 1) : ?>
                                    <tr>
                                        <td align="center">
                                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?>
                                            -
                                            <?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))); ?>
                                        </td>
                                        <td align="center">
                                            <?php if(intval($periodo[$x]['fechaFin']) < 2023){ ?>
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar - 6 ?>
                                            días (Proporcionales).
                                            <?php }else{ ?>
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?>
                                            días (Proporcionales).
                                            <?php } ?>
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?>
                                            días.
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?>
                                            días.
                                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones($dias_antiguedad) - $dias_auxiliar - $dias_disfrutados_vacaciones_aux : dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?>
                                        </td>
                                    </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="dataTable table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Fecha Registro</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Termino</th>
                                    <th>Días Solicitados</th>
                                    <th>Goce de Sueldo</th>
                                    <th>Comentarios</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($vacaciones_permisos) : ?>
                                <?php foreach ($vacaciones_permisos as $key => $value) : ?>
                                <tr>
                                    <td>
                                        <?= utf8_encode(strftime("%c", strtotime($value->timestamp))) ?>
                                        <span id="canceladas<?= $value->uid ?>" class="text-danger"
                                            style="display: <?= ($value->tipo == 'vacaciones' && $value->estatus == '0') ? 'block' : 'none' ?>">
                                            <strong>Canceladas</strong>
                                        </span>
                                    </td>
                                    <td><?= utf8_encode(strftime("%a %d de %b de %Y", strtotime($value->fecha_inicio))) ?>
                                    </td>
                                    <td><?= utf8_encode(strftime("%a %d de %b de %Y", strtotime($value->fecha_final))) ?>
                                    </td>
                                    <td><?= $value->dias ?></td>
                                    <td><?= ($value->goce_sueldo == '1') ? 'Si' : 'No'; ?></td>
                                    <td><?= $value->comentarios ?></td>
                                    <td><?= ucfirst($value->tipo) ?></td>
                                    <td align="center">
                                        <?php $carpeta = './uploads/' . $detalle->uid_usuario . '/vacaciones/' . $value->uid . '.pdf';
                            if (!file_exists($carpeta)) : ?>
                                        <?php if ($value->periodo != null) : ?>
                                        <a href="<?php echo base_url() ?>personal/formato-vacaciones/<?php echo $value->uid ?>"
                                            onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">
                                            Imprimir Formato
                                        </a>
                                        <?php endif; ?>
                                        <?= form_open_multipart('', 'style="display: inherit" id="formuploadajax_archivos' . $value->uid . '"'); ?>
                                        <input type="file" class="filestyle pull-left archivos"
                                            data-uid="<?= $value->uid ?>" name='archivo' id='<?= $value->uid ?>'
                                            accept=".pdf">
                                        <?= form_hidden('uid', $value->uid) ?>
                                        <?= form_hidden('uid_usuario', $detalle->uid_usuario) ?>
                                        <?= form_hidden('token', $token) ?>
                                        <?= form_hidden('tipo', 'vacaciones') ?>
                                        <?= form_close() ?>
                                        <?php else : ?>
                                        <a href="<?php echo base_url() . 'uploads/' . $detalle->uid_usuario . '/vacaciones/' . $value->uid . '.pdf' ?>"
                                            target="_blank" class="btn btn-info"
                                            onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">
                                            Ver archivo
                                        </a>
                                        <?php endif; ?>
                                        <?php if ($this->session->userdata('tipo') == 5 && $value->tipo == 'vacaciones' && $value->estatus == '1' && !file_exists($carpeta)) : ?>
                                        <?php $periodoCancelar = date("d-m-Y", strtotime($value->fecha_inicio)) . ' al ' . date("d-m-Y", strtotime($value->fecha_final)); ?>
                                        <button type="button" class="btn btn-danger cancelar-vacaciones"
                                            data-uid="<?= $value->uid ?>" data-periodo="<?= $periodoCancelar ?>">
                                            Cancelar Vacaciones
                                        </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Detalle Vacaciones y Permisos -->
            <!-- Horario Laboral  
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4 class="h4">Horario Laboral</h4>
            </div>    
            <div class="card-body">
          
              <div class="table-responsive">   
                <table class="table table-hover table-sm">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Hora de Entrada</th>
                      <th>Hora de Salida</th>
                      <th>Horas Trabajadas</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Fecha</th>
                      <th>Hora de Entrada</th>
                      <th>Hora de Salida</th>
                      <th>Horas Trabajadas</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php if ($asistencias) : ?>
                      <?php foreach ($asistencias as $key => $value) : ?>
                        <tr <?= ($value->entrada != NULL) ? 'class="table-success"' : 'class="table-dark"'; ?>>
                          <td><?php echo utf8_encode(strftime("%A %e de %B de %Y", strtotime($value->fecha_hora . ' ' . $value->entrada))) ?></td>
                          <td><?php echo $value->entrada ?></td>
                          <td><?php echo $value->salida ?></td>
                          <td><?php echo ($value->entrada != NULL) ? gmdate("H:i", timeDiff($value->entrada, $value->salida)) : NULL; ?></td>
                        </tr>
                      <?php endforeach ?>     
                      <?php else : ?>
                        <tr>
                          <td colspan="6" class="text-center">No existen información.</td>
                        </tr>
                      <?php endif ?>               
                    </tbody>
                  </table>
                </div>
                <br>
          
              </div>
            </div> Horario Laboral  -->
        </div>
    </div>
    

    <div class="row">
        <div class="col-12">
            
          
            
            <!-- Cronología  -->
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="h4">Cronología</h4>
                </div>
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
            <!-- Cronología  -->
            
        </div>
    </div>
    </div>
</section>
<!--Detalles de baja-->
<section>
    <!-- Detalles de baja para personal inactivo-->
    <div class="modal fade" id="bajaedit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <?= form_open(base_url() . 'personal/bajaEdit', 'class="needs-validation" novalidate id="ajaxeditarnota"'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Detalles Baja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Fecha de baja</label>
                        <?php foreach ($editar as $baja) { ?>
                        <p class="form-control" value="" type="date" name="fechaeditada" disabled><?= $baja->fecha?></p>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="tipo_baja" class="form-control" disabled>
                            <option value=""><?= $baja->tipo_baja ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Motivo</label>
                        <textarea name="motivo" id="motivoeditado" class="form-control"
                            rows="5"><?= $baja->motivo ?></textarea>
                    </div>
                    <div id="">
                        <div class="row">
                            <div class="col-6">
                                Nombre del colaborador
                            </div>
                            <div class="col-6">
                                Puesto
                            </div>
                            <div class="col-6 ">
                                <p class="form-control font-weight-bold" value="" type="text" name="nombreeditado"
                                    disabled><?= $baja->nombres ?> <?= $baja->apellido_paterno ?>
                                    <?= $baja->apellido_materno ?></p>
                            </div>
                            <div class="col-6">
                                <p class="form-control" value="" type="date" name="departamentoeditado" disabled>
                                    <?= $detalle->perfil ?></p>
                            </div>
                            <div class="col-12">
                                Departamento
                                <div class="col-6">
                                    <p class="form-control" value="" type="date" name="departamentoeditado" disabled>
                                        <?= $detalle->departamento ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_hidden('id_baja', $baja->idtbl_alta_baja) ?>
                <?= form_hidden('uid', $detalle->uid_usuario) ?>
                <?= form_hidden('token', $token) ?>
                <?= form_hidden('nombre', $detalle->nombres) ?>
                <div class="modal-footer">

                    <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <?php } ?>
            </div>
            </form>
        </div>
    </div>
</section>

<div class="modal fade bd-example-modal-lg" id="vacacionesModal" tabindex="-1" role="dialog"
    aria-labelledby="vacacionesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vacacionesLabel">Vacaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="needs-validation" id="formuploadajax_vacaciones" novalidate method="post">
                    <div class="row" style="display:none;">
                        <div class="col-12 col-lg-6">
                            <?php 
                        $total_periodos = []; 
                        $total_dias_disfrutados = 0;
                        foreach($dias_disfrutados_vacaciones AS $value){
                          $itemPeriodo = json_decode($value->periodo);
                          $itemDias = json_decode($value->dias_disfrutar);
                          for($r = 0; $r < count($itemPeriodo); $r++){
                            $total_periodos[$itemPeriodo[$r]] = $total_periodos[$itemPeriodo[$r]] == null ? $itemDias[$r] : $total_periodos[$itemPeriodo[$r]] + $itemDias[$r];
                          }
                        }
                        foreach($total_periodos AS $value){
                          $total_dias_disfrutados += $value;
                        }                        
                      ?>
                            <?php $dias_vacaciones = dias_vacaciones($dias_antiguedad); ?>
                            <p>
                                Años de servicio: <strong><?= number_format($dias_antiguedad / 365, 2) ?> años.</strong>
                            </p>
                            <p>Con derecho a: <strong><?php echo $dias_vacaciones ?> días.</strong></p>
                            <p id="dias_disfrutados">
                                Días de vacaciones disfrutados: <strong><?= $total_dias_disfrutados  ?> días.</strong>
                            </p>
                            <p id="dias_disponibles">
                                Días de vacaciones disponibles:
                                <strong><?= $dias_vacaciones - $total_dias_disfrutados ?> días.</strong>
                            </p>
                            <p id="dias_proporcionales">
                                Días de vacaciones proporcionales: <strong><?= $dias_proporcionales ?> días.</strong>
                            </p>
                        </div>
                        <div class="col-12 col-lg-6">
                            Detalle Periodos
                            <table style="width: 100%" class="table">
                                <thead>
                                    <th class="text-center">Periodo</th>
                                    <th class="text-center">Con derecho a</th>
                                    <th class="text-center">Disfrutados</th>
                                    <th class="text-center">Restan</th>
                                </thead>
                                <tbody>
                                    <?php $dias_totales_vacaciones = 0; ?>
                                    <?php $dias = 365 ?>
                                    <?php $dias_auxiliar = 0 ?>
                                    <?php $dias_disfrutados_vacaciones_aux = 0 ?>
                                    <?php $dias_antes = ((($dias_antiguedad - $dias_antiguedad % 365))) ?>
                                    <?php $dias_total = 0 ?>


                                    <?php for ($x = 0; $x < (($dias_antiguedad - $dias_antiguedad % 365) / 365); $x++) { ?>

                                    <tr>
                                        <td align="center">
                                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?>-<?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))) ?>
                                        </td>
                                        <td align="center">
                                            <?php if(intval($periodo[$x]['fechaFin']) < 2023){ ?>
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias) - 6;
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                                            <?php }else{ ?>
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias);
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                                            <?php } ?>
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?>
                                            días.
                                        </td>
                                        <td align="center">
                                            <?php if ((($dias_antiguedad - $dias_antiguedad % 365) / 365) == $x + 1) { ?>
                                            <?php if ($dias_antiguedad - $dias_antes > 182 && $this->session->userdata('tipo') != 5) { ?>
                                            <?= $periodo[$x]['dias'] = 0 ?> días (pasaron 6 meses)
                                            <?php $dias_total += 0; ?>
                                            <?php } else { ?>
                                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?>
                                            días.
                                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones_calculos($dias) - $dias_disfrutados_vacaciones_aux : 0 ?>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <?= $periodo[$x]['dias'] = 0 ?> días
                                            <?php $dias_total += 0; ?>
                                            <?php } ?>
                                            <?php $dias_totales_vacaciones += $periodo[$x]['dias']; ?>
                                        </td>
                                        <?php
                          if ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) {
                              $dias_disfrutados_vacaciones_aux = 0;
                          } else {
                              $dias_disfrutados_vacaciones_aux = $dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias);
                          }
                          ?>
                                    </tr>
                                    <?php $dias += 365; ?>

                                    <?php } ?>
                                    <?php if (($dias_antiguedad % 365) > 1) : ?>
                                    <tr>
                                        <td align="center">
                                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?>
                                            -
                                            <?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))); ?>
                                        </td>
                                        <td align="center">
                                            <?php if(intval($periodo[$x]['fechaFin']) < 2023){ ?>
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar - 6 ?>
                                            días (Proporcionales).
                                            <?php }else{ ?>
                                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?>
                                            días (Proporcionales).
                                            <?php } ?>
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?>
                                            días.
                                        </td>
                                        <td align="center">
                                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?>
                                            días.
                                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones($dias_antiguedad) - $dias_auxiliar - $dias_disfrutados_vacaciones_aux : dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?>
                                            <?php $dias_totales_vacaciones += $periodo[$x]['dias']; ?>
                                        </td>
                                    </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p id="dias_disponibles">
                        Días de vacaciones: <strong><?= $dias_vacaciones ?> días.</strong>
                    </p>
                    <p id="dias_disponibles">
                        Días de vacaciones disponibles: <strong><?= $dias_totales_vacaciones ?> días.</strong>
                    </p>
                    <p id="dias_disfrutados">
                        Días de vacaciones disfrutados: <strong><?= $total_dias_disfrutados  ?> días.</strong>
                    </p>
                    <div class="form-group">
                        <label>Inicia y Termina</label>
                        <input type="text" id="rango_fechas2" value="" class="form-control" required autocomplete="off">
                        <input type="hidden" name="start" id="start2" required>
                        <input type="hidden" name="end" id="end2" required>
                        <div class="invalid-feedback"> Seleccione una fecha válida</div>
                    </div>
                    <div class="form-group">
                        <label>Días Solicitados</label>
                        <input type="number" id="numero_dias2" name="dias" value="" min="1"
                            <?= $dias_vacaciones > 49 ? '' : 'max="'.$dias_totales_vacaciones.'"' ?> step="1"
                            class="form-control" required autocomplete="off">
                        <div class="invalid-feedback">
                            El máximo de días es <?= $dias_totales_vacaciones ?> y el mínimo de 1
                        </div>
                    </div>
                    <?php if (!isset($periodo)) : ?>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Periodo</label>
                                <input type="text" value="No tiene días de vacaciones disponibles" class="form-control"
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <?php $auxKey = 0; ?>
                    <?php foreach ($periodo as $key => $value) : ?>
                    <?php if ($value['dias'] > 0) : ?>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Periodo</label>
                                <input type="text" name="periodo[]"
                                    value="<?= $value['fechaInicio'] . '-' . $value['fechaFin'] ?>"
                                    class="form-control periodo periodo<?= $auxKey ?>" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Derecho a</label>
                                <input type="text" name="derecho_a[]" value="<?= $value['diasPeriodo'] ?>"
                                    class="form-control derecho_a derecho_a<?= $auxKey ?>" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Disfrutados</label>
                                <input type="text" name="dias_disfrutados_periodo[]"
                                    value="<?= $total_periodos[$value['fechaInicio'] . '-' . $value['fechaFin']] == NULL ? 0 : $total_periodos[$value['fechaInicio'] . '-' . $value['fechaFin']] ?>"
                                    class="form-control dias_disfrutados_periodo dias_disfrutados_periodo<?= $auxKey ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Disponibles</label>
                                <input type="text" name="dias_pendientes_periodo[]"
                                    value="<?= $value['diasPeriodo'] - $total_periodos[$value['fechaInicio'] . '-' . $value['fechaFin']] ?>"
                                    class="form-control dias_pendientes_periodo dias_pendientes_periodo<?= $auxKey ?>"
                                    readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Días a disfrutar</label>
                                <input type="text" id="dias_disfrutar" name="dias_disfrutar[]" value="0" min="0"
                                    class="form-control dias_a_disfrutar dias_a_disfrutar<?= $auxKey ?>"
                                    <?= $this->session->userdata('tipo') == 5 ? '' : 'readonly' ?>>
                            </div>
                        </div>
                    </div>
                    <?php $auxKey++; ?>
                    <?php else: ?>
                    <?php if($dias_vacaciones > 49){ ?>
                    <?php if(!isset($periodo[$key+1]['dias_periodo'])){ ?>
                    <?php } ?>
                    <?php } ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif ?>
                    <div class="form-group">
                        <label>Comentarios</label>
                        <textarea name="comentarios" class="form-control" rows="5"></textarea>
                    </div>
                    <br>
                    <?= form_hidden('uid', $detalle->uid_usuario) ?>
                    <?= form_hidden('tipo', 'vacaciones') ?>
                    <?= form_hidden('token', $token) ?>
                    <?php if (isset($periodo)) : ?>
                    <button type="submit" class="btn btn-primary ladda-button"
                        data-style="expand-right">Autorizar</button>
                    <?php endif ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>





<?php function dias_restantes($fecha_final)
{
  $fecha_actual = date("Y-m-d");
  $s = strtotime($fecha_final) - strtotime($fecha_actual);
  $d = intval($s / 86400);
  $diferencia = $d;
  return $diferencia;
}
function timeDiff($firstTime, $lastTime)
{
  $firstTime = strtotime($firstTime);
  $lastTime = strtotime($lastTime);
  $timeDiff = $lastTime - $firstTime;
  return $timeDiff;
}
function dias_vacaciones($antiguedad)
{

  switch ($antiguedad) {
    case ($antiguedad >= 1 && $antiguedad < 365):
      $dias_anterior = 0;
      $dias = 12;
      break;
    case ($antiguedad >= 365 && $antiguedad < 730):
      $dias_anterior = 12;
      $dias = 14;
      break;
    case ($antiguedad >= 730 && $antiguedad < 1095):
      $dias_anterior = 26;
      $dias = 16;
      break;
    case ($antiguedad >= 1095 && $antiguedad < 1460):
      $dias_anterior = 42;
      $dias = 18;
      break;
    case ($antiguedad >= 1460 && $antiguedad < 1825):
      $dias_anterior = 60;
      $dias = 20;
      break;
    case ($antiguedad >= 1825 && $antiguedad < 2190):
      $dias_anterior = 80;
      $dias = 20;
      break;
    case ($antiguedad >= 2190 && $antiguedad < 2555):
      $dias_anterior = 100;
      $dias = 20;
      break;
    case ($antiguedad >= 2555 && $antiguedad < 2920):
      $dias_anterior = 120;
      $dias = 20;
      break;
    case ($antiguedad >= 2920 && $antiguedad < 3285):
      $dias_anterior = 140;
      $dias = 20;
      break;
    case ($antiguedad >= 3285 && $antiguedad < 3650):
      $dias_anterior = 160;
      $dias = 22;
      break;
    case ($antiguedad >= 3650 && $antiguedad < 4015):
      $dias_anterior = 182;
      $dias = 22;
      break;
    case ($antiguedad >= 4015 && $antiguedad < 4380):
      $dias_anterior = 204;
      $dias = 22;
      break;
    case ($antiguedad >= 4380 && $antiguedad < 4745):
      $dias_anterior = 226;
      $dias = 22;
      break;
    case ($antiguedad >= 4745 && $antiguedad < 5110):
      $dias_anterior = 228;
      $dias = 22;
      break;
    default:
      $dias = 0;
      break;
  }
  $restantes = $antiguedad - (365 * (($antiguedad - $antiguedad % 365) / 365));
  return (int)((($dias / 365) * $restantes) + $dias_anterior);
}
function dias_vacaciones_calculos($antiguedad)
{

  switch ($antiguedad) {
    case ($antiguedad >= 1 && $antiguedad < 366):
      $dias = 12;
      break;
    case ($antiguedad >= 366 && $antiguedad < 731):
      $dias = 14;
      break;
    case ($antiguedad >= 731 && $antiguedad < 1096):
      $dias = 16;
      break;
    case ($antiguedad >= 1096 && $antiguedad < 1461):
      $dias = 18;
      break;
    case ($antiguedad >= 1461 && $antiguedad < 3286):
      $dias = 20;
      break;
    case ($antiguedad >= 3286 && $antiguedad < 5111):
      $dias = 22;
      break;
    case ($antiguedad >= 5111 && $antiguedad < 6936):
      $dias = 24;
      break;
    case ($antiguedad >= 6936 && $antiguedad < 8761):
      $dias = 26;
      break;
    case ($antiguedad >= 8761 && $antiguedad < 10586):
      $dias = 28;
      break;
    case ($antiguedad >= 10586 && $antiguedad < 12410):
      $dias = 30;
      break;
    default:
      $dias = 0;
      break;
  }

  return $dias;
} ?>
<script src="<?= base_url() ?>js/file-image.js?v=1.0.0"></script>
<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-filestyle.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">


$(document).on('click', '.cancelar-vacaciones', function() {
    var _this = $(this);
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea cancelar las vacaciones del " + _this.data('periodo') + "?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url() ?>personal/cancelar-vacaciones",
                type: "post",
                dataType: "json",
                data: {
                    uid: _this.data('uid'),
                    token: '<?= $token ?>'
                },
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    console.log(resp)
                    if (resp.status) {
                        Toast.fire({
                            type: 'success',
                            title: resp.message
                        });
                        location.reload(true);
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.message
                        })
                    }
                }
            });
        }
    })
});

function cargar_archivo(id) {

    var formData = new FormData(document.getElementById("formuploadajax_archivos" + id));
    $.ajax({
        url: "<?= base_url() ?>personal/cargar-archivo",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            console.log(resp)
            if (resp.status) {
                location.reload(true);
            } else {
                Toast.fire({
                    type: 'error',
                    title: resp.message
                })
            }
        }

    }).always(function() {
        $(".archivos").filestyle('clear');
    });;
}
$('#image').filestyle({
    text: '&nbsp;Imagen',
    btnClass: 'btn-outline-info',
    htmlIcon: '<span class="fa fa-picture-o" aria-hidden="true"></span>'
});
$('#documentoInput').filestyle({
    text: '&nbsp;Documento',
    btnClass: 'btn-outline-info',
    htmlIcon: '<span class="fa fa-document" aria-hidden="true"></span>'
});
$(".archivos").filestyle({
    text: '&nbsp;Seleccione archivo PDF',
    btnClass: 'btn-outline-info',
    input: false,
    badge: true,
    onChange: function(files, id) {

        swal({
                title: "¿Desea cargar archivo?",
                text: "El archivo debe ser en formato PDF",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    cargar_archivo(id);
                } else {
                    $(".archivos").filestyle('clear');
                }
            });
    }
});


/*function getDayInRange(dayNumber, startDate, endDate, inclusiveNextDay) {
  var start = moment(startDate),
    end = moment(endDate),
    arr = [];

  // Get "next" given day where 1 is monday and 7 is sunday
  let tmp = start.clone().day(dayNumber);
  if (!!inclusiveNextDay && tmp.isAfter(start, 'd')) {
    arr.push(tmp.format('DD-MM-YYYY'));
  }

  while (tmp.isBefore(end)) {
    tmp.add(7, 'days');
    arr.push(tmp.format('DD-MM-YYYY'));
  }

  // If last day matches the given dayNumber, add it.
  if (end.isoWeekday() === dayNumber) {
    arr.push(end.format('DD-MM-YYYY'));
  }

  return arr;
}

$('#daterange-2')
  .dateRangePicker(configObject2)
  .bind('datepicker-change', function(event, obj) {

    var sundays = getDayInRange(7, moment(obj.date1), moment(obj.date1).add(selectedDatesCount, 'd'));
    console.log(sundays);

    $('#daterange-2')
      .data('dateRangePicker')
      .setDateRange(obj.value, moment(obj.date1)
        .add(selectedDatesCount + sundays.length, 'd')
        .format('DD-MM-YYYY'), true);
  });*/


Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf())
    date.setDate(date.getDate() + days);
    return date;
}


$('#rango_fechas').on('apply.daterangepicker', function(ev, picker) {

    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    $('.form-group').removeClass('has-error');
    $('#start').val(picker.startDate.format('YYYY-MM-DDTHH:mm'));
    $('#end').val(picker.endDate.format('YYYY-MM-DDTHH:mm'));

    $('#numero_dias').val((moment.duration(moment(picker.endDate).diff(moment(picker.startDate))).days() + 1));

});

$('#rango_fechas2').on('apply.daterangepicker', function(ev, picker) {

    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    $('.form-group').removeClass('has-error');
    var startDate = new Date(picker.startDate.format('MM/DD/YYYY'));
    var endDate = new Date(picker.endDate.format('MM/DD/YYYY'));
    $('#start2').val(picker.startDate.format('YYYY-MM-DDTHH:mm'));
    $('#end2').val(picker.endDate.format('YYYY-MM-DDTHH:mm'));

    var totalSundays = 0;
    for (var i = startDate; i <= endDate; i.setDate(i.getDate() + 1)) {
        //console.log(i);
        if (i.getDay() === 0) {
            totalSundays++;
            //alert(i.getDay());
        }

    }


    //alert(totalSundays);

    if (startDate == endDate) {
        $('#numero_dias2').val((1));;
    } else {

        $('#numero_dias2').val((moment.duration(moment(picker.endDate).diff(moment(picker.startDate))).days() +
                1 - totalSundays))
            .trigger("change");;
    }

});

$('#rango_fechas_incapacidad').on('apply.daterangepicker', function(ev, picker) {

    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    $('.form-group').removeClass('has-error');
    $('#start_incapacidad').val(picker.startDate.format('YYYY-MM-DDTHH:mm'));
    $('#end_incapacidad').val(picker.endDate.format('YYYY-MM-DDTHH:mm'));

    $('#numero_dias_incapacidad').val((moment.duration(moment(picker.endDate).diff(moment(picker.startDate)))
        .days() + 1)).trigger("change");;


});


$(document).on('change', '#tipo-incapacidad', function() {
    if ($("option:selected", this).val() == 'm') {
        $('#subtipo-incapacidad').prop('selectedIndex', 0);
        $('#subtipo-incapacidad option[value="e"]').removeAttr('disabled');
    } else {
        $('#subtipo-incapacidad').prop('selectedIndex', 0);
        $('#subtipo-incapacidad option[value="e"]').attr('disabled', 'disabled');
    }
});

$(document).on('change', '#numero_dias2', function() {
    var x = 0;
    var valor = parseInt($(this).val());

    while (x < $('.dias_pendientes_periodo').length) {

        if (valor <= parseInt($('.dias_pendientes_periodo' + x).val())) {

            $('.dias_a_disfrutar' + x).val(valor)
            break;

        } else {

            $('.dias_a_disfrutar' + x).val(parseInt($('.dias_pendientes_periodo' + x).val()));
            valor = (valor - parseInt($('.dias_pendientes_periodo' + x).val()));

        }

        x++;
    }

});

$('#rango_fechas, #rango_fechas2, #rango_fechas_incapacidad').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});
$(document).ready(function() {

    $('#nuevaAsignacion_material').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea iniciar una asignación de material?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/material';
            }
        })
    });

    $('#nuevaAsignacion_refaccion').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea iniciar una asignación de refaccion?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>/almacen/asignacion/refaccion/nueva/<?php echo $detalle->uid_usuario ?>';
            }
        })
    });
    $('#nuevaAsignacion_tarjeta').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea iniciar una asignación de tarjeta?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/tarjetas';
            }
        })
    });

    $('#nuevaAsignacion_herramienta').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea iniciar una asignación de herramienta?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/herramienta';
            }
        })
    });

    $('#justificacion_materiales').click(function(event) {
        var formData = new FormData(document.getElementById("formuploadajax_justificaciones"));
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea justificar todo el material?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                var id_usuario = <?= $detalle->idtbl_usuarios ?>;
                $.ajax({
                    url: "<?= base_url() ?>personal/justificar_materiales",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.error == false) {
                            location.reload(true);
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.message
                            });
                        }
                    }
                });
            }
        })
    });

    $('#pruebaManejo').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea iniciar una prueba de manejo?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>ControlVehicular/nueva_prueba_manejo/<?php echo $detalle->uid_usuario ?>';
            }
        })
    });

    $('#pruebaManejoA').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea editar la prueba de manejo?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>ControlVehicular/editar_prueba_manejo/<?php echo $detalle->uid_usuario ?>';
            }
        })
    });

    $('#nuevaAsignacion_alto-costo').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea iniciar una asignación de material de activo fijo?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/alto-costo';
            }
        });
    });

    $('#nuevaAsignacion_sistemas').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea iniciar una asignación de material de alto costo?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/sistemas';
            }
        });
    });

    $('#nuevaAsignacion_control-vehicular').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea iniciar una asignación de material de control vehicular?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/control-vehicular';
            }
        });
    });

    $('#nuevaAsignacion_hilti').click(function(event) {
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea iniciar una asignación de material Hilti?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                location.href =
                    '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/hilti';
            }
        })

    });

    $(document).on('shown.bs.tab', function(e) {
        $.fn.dataTable.tables({
            visible: true,
            api: true
        }).columns.adjust();
    });
    var date = new Date();
    var currentDate = '';
    var currentYear = date.getFullYear();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    <?php if($this->session->userdata('tipo') == 5){ ?>
    currentYear -= 1;
    currentDate -= 15;
    <?php } ?>
    <?php if($this->session->userdata('tipo') != 5){ ?>
    currentDate += 15;
    <?php } ?>
    $('#rango_fechas, #rango_fechas2, #rango_fechas_incapacidad').daterangepicker({
        minDate: new Date(currentYear, currentMonth, currentDate),
        timePicker: false,
        autoUpdateInput: false,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom",
                "Lun",
                "Mar",
                "Mie",
                "Jue",
                "Vie",
                "Sab"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre",
            ],
            "firstDay": 1
        }
    });
});
$(document).ready(function() {

    $("#formuploadajax").on("submit", function(e) {
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        $.ajax({
            url: "<?= base_url() ?>personal/cambiar-foto",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                if (resp.status == true) {
                    location.reload(true);
                } else {
                    $("#error").html(resp.message);
                }
            }
        });
    });

    $("#formuploadajax_baja").on("submit", function(event) {
        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax_baja"));
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            var button = f.find("button[type='submit']");
            button.prop("disabled", true);
            event.preventDefault();
            $.ajax({
                url: "<?= base_url() ?>personal/baja",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        location.reload(true);
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.message
                        });
                        button.prop("disabled", false);
                    }
                }
            });
        }
    });

    $("#formuploadajax_alta").on("submit", function(event) {

        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax_alta"));
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            $.ajax({
                url: "<?= base_url() ?>personal/alta",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        location.reload(true);
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

    $("#formuploadajax_acta").on("submit", function(event) {

        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax_acta"));
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            $.ajax({
                url: "<?= base_url() ?>personal/nueva-acta",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        location.reload(true);
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

    $('#formuploadajax_vacaciones').on("submit", function(event) {
        var formData = new FormData(event.target);
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            $.ajax({
                url: "<?= base_url() ?>personal/vacaciones",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        location.reload(true);
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

    $('#formuploadajax_descuentos').on("submit", function(event) {
        var formData = new FormData(event.target);
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            $.ajax({
                url: "<?= base_url() ?>personal/justificar_descontar",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        location.reload(true);
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

    $('#formuploadajax_incapacidad').on("submit", function(event) {
        var formData = new FormData(event.target);
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            $.ajax({
                url: "<?= base_url() ?>personal/incapacidades",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        location.reload(true);
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

    $("#formuploadajax_permisos").on("submit", function(event) {
        var formData = new FormData(event.target);
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            console.log('Entra')
            $.ajax({
                url: "<?= base_url() ?>personal/permiso",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        location.reload(true);
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

    var t = moment().startOf("day"),
        e = t.format("YYYY-MM"),
        a = t.clone().subtract(1, "day").format("YYYY-MM-DD"),
        n = t.format("YYYY-MM-DD"),
        r = t.clone().add(1, "day").format("YYYY-MM-DD");

    $("#calendar").fullCalendar({
        lang: 'es',
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay,listWeek"
        },
        editable: 0,
        eventLimit: !0,
        navLinks: !0,
        themeSystem: "bootstrap3",
        bootstrapGlyphicons: !1,
        eventColor: 'rgba(54, 162, 235,0.7)',
        events: [

            <?php if ($asistencias) : ?>
            <?php foreach ($asistencias as $key => $value) : ?>
            <?php if ($value->entrada != NULL) : ?> {
                title: "Entrada",
                start: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_hora . ' ' . $value->entrada)) ?>",
                end: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_hora . ' ' . $value->entrada)) ?>"
            },
            {
                title: "Salida",
                start: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_hora . ' ' . $value->salida)) ?>",
                end: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_hora . ' ' . $value->salida)) ?>"
            },

            <?php endif; ?>
            <?php endforeach ?>
            <?php endif; ?>

            <?php if ($vacaciones_permisos) : ?>
            <?php foreach ($vacaciones_permisos as $key => $value) : ?>
            <?php if ($value->tipo == 'vacaciones') : ?> {
                color: 'rgba(153, 102, 255, 0.5)',
                title: "<?= ucfirst($value->tipo) ?>",
                start: "<?php echo strftime("%Y-%m-%d", strtotime($value->fecha_inicio)) ?>T00:00:00",
                end: "<?php echo strftime("%Y-%m-%d", strtotime($value->fecha_final)) ?>T23:59:59"
            },
            <?php else : ?> {
                color: 'rgba(75, 192, 192, 0.5)',
                title: "<?= ucfirst($value->tipo) ?>",
                start: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_inicio)) ?>",
                end: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_final)) ?>"
            },
            <?php endif ?>
            <?php endforeach ?>
            <?php endif ?>

            <?php if ($actas) : ?>
            <?php foreach ($actas as $key => $value) : ?> {
                color: 'rgba(255, 99, 132, 0.75)',
                title: "Acta Administrativa",
                start: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->timestamp)) ?>"
            }
            <?php endforeach ?>
            <?php endif ?>

            
        ]
    });
});

$(document).on('click', '#nuevo-contrato', function(event) {

    Swal.fire({
        title: '¡Atención!',
        text: '¿Desea generar un nuevo contrato?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar'
    }).then((result) => {
        if (result.value) {

            (async function getFormValues() {
                const {
                    value: formValues
                } = await Swal.fire({
                    title: 'Detalles de contrato',
                    html: '<div class="form-group"><label for="swal-input1">Fecha Inicio Contrato*</label><input required id="swal-input1" type="date" class="swal2-input form-control"></div>' +
                        '<div class="form-group"><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="determinado" checked>Determinado</label></div><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="indeterminado">Indeterminado</label></div><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="por proyecto u obra">Por proyecto u obra</label></div></div>' +
                        '<div class="form-group" id="dias_contrato"><label for="swal-input2">Días</label><input id="swal-input2" type="text" step="1" class="swal2-input form-control"><small class="form-text text-muted">Ingrese días de duración del contrato determinado</small></div>',
                    focusConfirm: false,
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return [
                            document.getElementById('swal-input1').value,
                            document.getElementById('swal-input2').value,
                            $("input[name='tipo_contrato']:checked").val(),
                            '<?= $token ?>'
                        ]
                    }
                })

                if (formValues) {

                    if (formValues[0] != '') {

                        if (formValues[2] == 'determinado' && formValues[1] == '') {
                            Toast.fire({
                                type: 'error',
                                title: 'Debe ingresar el campo días para contrato determinado.'
                            })
                            return 0;
                        }

                        $.ajax({
                                url: '<?= base_url() ?>personal/nuevo-contrato',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    fecha: formValues[0],
                                    dias: formValues[1],
                                    tipo: formValues[2],
                                    token: formValues[3],
                                    uid: '<?= $detalle->uid_usuario ?>',
                                    contrato: '<?= $detalle->idctl_contratos ?>'
                                },
                                beforeSend: function() {
                                    $('body').addClass('load');
                                },
                                success: function(data) {
                                    if (data.error)
                                        Toast.fire({
                                            type: 'error',
                                            title: data.error
                                        });
                                    else {
                                        location.reload(true);
                                    }

                                },
                                error: function(data) {
                                    Toast.fire({
                                        type: 'error',
                                        title: 'Ocurrio un error intente nuevamente.'
                                    })
                                }
                            })
                            .done(function() {

                            })
                            .fail(function() {
                                Toast.fire({
                                    type: 'error',
                                    title: 'Ocurrio un error intente nuevamente.'
                                })
                            })
                            .always(function() {
                                $('body').removeClass('load');
                            });

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: 'Debe Ingresar los datos Solicitados.'
                        })
                    }


                }
            })()

        }
    })

});

function openWin(obj) {
    event.preventDefault();
    myWindow = window.open(obj.getAttribute("href"), '_blank', 'width=1000,height=800,left=0,top=0');
    myWindow.document.close(); //missing code
    myWindow.focus();
    myWindow.print();
    //myWindow.close();

}
$('#justificar_asignacion').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find("input[name='estatus_devolucion_rh']").val("Perndiente Almacen");
    modal.find("input[name='iddtl_asignacion']").val(recipient.iddtlAsignacion);
});

$('#justificar_asignaciones').on('show.bs.modal', function(event) {
    $("#descuentos").empty();
    $("#justificaciones").empty();
    $("#total_justificacion").empty();
    $("#total_descuento").empty();
    var total = 0;
    var total_descuento = 0;
    //var checkbox = 0;
    $('input[name="material_justificar[]"]:checked').each(function() {
        console.log("Checkbox " + $(this).data("precio") + " (" + $(this).val() + ") Seleccionado");
        total += (parseFloat($(this).data("precio")) * parseFloat($(this).data("unidades")));
        $("#justificaciones").append("<li class='list-group-item'>" + $(this).data("equipo") + ": $" + (
                parseFloat($(this).data("precio")) * parseFloat($(this).data("unidades"))) +
            "</li>");
        $("#justificaciones").append("<input type='hidden' name='justificaciones[]' value='" + $(this)
            .val() + "'>");
        $("#justificaciones").append("<input type='hidden' name='catalogo_justificacion[]' value='" + $(
            this).data("catalogo") + "'>");
        $("#justificaciones").append("<input type='hidden' name='cantidad_justificacion[]' value='" + $(
            this).data("unidades") + "'>");
    });
    $('#total_justificacion').append('Total de justificación: $' +
        '<input name="total_justificacion" class="form-control" value="' + total + '">');
    $('input[name="material_justificar[]"]').prop("checked", false).each(function() {
        console.log("Checkbox " + $(this).data("precio") + " (" + $(this).val() + ") Seleccionado");
        total_descuento += (parseFloat($(this).data("precio")) * parseFloat($(this).data("unidades")));
        $("#descuentos").append("<li class='list-group-item'>" + $(this).data("equipo") + ": $" + (
                parseFloat($(this).data("precio")) * parseFloat($(this).data("unidades"))) +
            "</li>");
        $("#descuentos").append("<input type='hidden' name='descuentos[]' value='" + $(this).val() +
            "'>");
        $("#descuentos").append("<input type='hidden' name='catalogo_descuento[]' value='" + $(this)
            .data("catalogo") + "'>");
        $("#descuentos").append("<input type='hidden' name='cantidad_descuento[]' value='" + $(this)
            .data("unidades") + "'>");
    });
    $('#total_descuento').append('Total de descuento: $' +
        '<input name="total_descuento" class="form-control" value="' + total_descuento + '">');
    /*if(checkbox == 0){
      $('#btn_justificaciones').prop('disabled', true); 
    }else{
      $('#btn_justificaciones').prop('disabled', false); 
    }*/
});

$('#editar_estatus_incidencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $("#unidad").empty();
    $("#fecha").empty();
    $("#costo").empty();
    $("#incidencia").empty();
    $("#comentario_estatus").empty();
    modal.find("input[name='idtbl_incidencias']").val(recipient.idtbl_incidencias);
    $("#unidad").append(recipient.unidad);
    $("#fecha").append(recipient.fecha_incidencia);
    $("#costo").append(recipient.costo);
    $("#incidencia").append(recipient.incidencia);
    $("#estatus").val(recipient.estatus);
    $("#comentario_estatus").append(recipient.comentario_estatus);
    $('#historialOperador').modal('hide');

});

$('#nueva_incidencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    <?php if($this->session->userdata('tipo') == 3){ ?>
    $.ajax({
        url: "<?php echo base_url();?>ControlVehicular/getTodosAutosAsignados",
        type: "POST",
        data: {
            idtbl_usuarios: recipient.idtbl_usuarios
        },
        dataType: "json",
        cache: false,
        success: function(resp) {
            $("#selecteco").empty();
            html = '';
            html += '<select class="form-control" name="iddtl_almacen" required>';
            html +=
                '<option value="" disabled="disabled" selected="selected">Seleccione...</option>';
            html +=
                '<option value="" selected="selected">Sin unidad</option>';
            for (var i = 0; i < resp.length; i++) {
                html += '<option value="' + resp[i]['iddtl_almacen'] + '">' + resp[i][
                    'numero_interno'
                ] + '</option>';
            }
            html += '</select>';
            $("#selecteco").append(html);
        }
    });
    <?php }elseif($this->session->userdata('tipo') == 2){ ?>
    $.ajax({
        url: "<?php echo base_url();?>Sistemas/getTodosActivosAsignados",
        type: "POST",
        data: {
            idtbl_usuarios: recipient.idtbl_usuarios
        },
        dataType: "json",
        cache: false,
        success: function(resp) {
            $("#selecteco").empty();
            html = '';
            html += '<select class="form-control" name="iddtl_almacen" required>';
            html +=
                '<option value="" disabled="disabled" selected="selected">Seleccione...</option>';
            for (var i = 0; i < resp.length; i++) {
                html += '<option value="' + resp[i]['iddtl_almacen'] + '">' + resp[i][
                    'numero_interno'
                ] + '</option>';
            }
            html += '</select>';
            $("#selecteco").append(html);
        }
    });
    <?php } ?>

    modal.find("input[name='idtbl_usuarios']").val(recipient.idtbl_usuarios);
    $(".operador").html('');
    $(".operador").html(recipient.operador);

});

$("#baja").on("show.bs.modal", function(event) {
    <?php if(!$verficacion_baja){ ?>
    Swal.fire({
        title: '¡Atención!',
        text: "El usuario tiene asignaciones, no se puede dar de baja.",
        type: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        $("#baja").modal('hide');
    });
    <?php } ?>
});

$("#editar_documento").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data(); // Extract info from data-* attributes
    var modal = $(this);
    modal.find("input[name='uid_documento']").val(recipient.uidDocumento);
    modal.find("input[name='uid_usuario']").val(recipient.uidUsuario);
});

$("#editar_cursos").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data(); // Extract info from data-* attributes
    console.log(recipient);
    var modal = $(this);
    modal.find("select[name='idtbl_cursos']").val(recipient.idtblCursos);
    modal.find("select[name='id']").val(recipient.idtblCertificados);
    modal.find("input[name='folio']").val(recipient.folio);
    modal.find("input[name='fecha_inicio']").val(recipient.fechaInicio);
    modal.find("input[name='fecha_termino']").val(recipient.fechaTermino);
    modal.find("input[name='duracion']").val(recipient.duracion);
    modal.find("select[name='tutor']").val(recipient.tutor);
    modal.find("select[name='patron_representante']").val(recipient.patronRepresentante);
    modal.find("select[name='representante_trabajadores']").val(recipient.representanteTrabajadores);
    modal.find("input[name='iddtl_certificados_personal']").val(recipient.iddtlCertificadosPersonal);
});

$("select[name='tipo_baja']").on("change", function() {
    var value = $(this).val();
    if (value == "Renuncia voluntaria") {
        $("#encuesta-salida-personal").css("display", "block");
    } else {
        $("#encuesta-salida-personal").css("display", "none");
    }
});

function imprimirIncidencia() {
    price = $("input[name='costo']").val();
    incidencia = $("select[id='tipo_incidencia'] option:selected").text();
    letras = numeroALetras(price, {
        plural: "PESOS",
        singular: "PESO",
        centPlural: "a",
        centSingular: "a"
    });
    $(".letras").html('');
    $(".concepto").html('');
    $(".costo").html('');
    $(".concepto").html(incidencia);
    $(".costo").html(price);
    $(".letras").html(letras);
    $("#salida_material").print({
        iframe: true,
        globalStyles: true,
        mediaPrint: true,
        noPrintSelector: '.no-print'
    });
}

$(".generar-contrato").on('click', function(e) {
    (async function getFormValues() {
        const {
            value: formValues
        } = await Swal.fire({
            title: 'Detalles de contrato',
            html: '<div class="form-group"><label for="swal-input1">Fecha Inicio Contrato*</label><input required id="swal-input1" type="date" class="swal2-input form-control"></div>' +
                '<div class="form-group"><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="determinado" checked>Determinado</label></div><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="indeterminado">Indeterminado</label></div><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="por proyecto u obra">Por proyecto u obra</label></div></div>' +
                '<div class="form-group" id="dias_contrato"><label for="swal-input2">Días</label><input id="swal-input2" type="text" step="1" class="swal2-input form-control"><small class="form-text text-muted">Ingrese días de duración del contrato determinado</small></div>',
            focusConfirm: false,
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return [
                    document.getElementById('swal-input1').value,
                    document.getElementById('swal-input2').value,
                    $("input[name='tipo_contrato']:checked").val(),
                    '<?= $token ?>'
                ]
            }
        })

        if (formValues) {

            if (formValues[0] != '') {

                if (formValues[2] == 'determinado' && formValues[1] == '') {
                    Toast.fire({
                        type: 'error',
                        title: 'Debe ingresar el campo días para contrato determinado.'
                    })
                    return 0;
                }

                var button = $(this);
                button.prop("disabled", true);
                var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO",
                    "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
                ];
                var tipo_duracion = formValues[2];
                var duracion = "";
                if (tipo_duracion != "indeterminado") {
                    duracion = numeroALetras(formValues[1], {
                        plural: "DIAS",
                        singular: "DIA ",
                        centPlural: "",
                        centSingular: ""
                    });
                    duracion = duracion.replace(" 0/100 MN", "");
                }
                var fechaArray = formValues[0].split("-");
                var fecha = fechaArray[2] + " DE " + meses[parseInt(fechaArray[1]) - 1] + " DE " +
                    fechaArray[0];

                $.ajax({
                    url: "<?php echo base_url();?>personal/generarContrato",
                    method: 'GET',
                    data: {
                        empresa: '<?= $detalle->empresa ?>'.toUpperCase(),
                        departamento: '<?= $detalle->departamento ?>'.toUpperCase(),
                        puesto_contrato: '<?= $detalle->perfil ?>'.toUpperCase(),
                        nacionalidad: '<?= $detalle->nacionalidad ?>'.toUpperCase(),
                        edad: '<?= $detalle->edad ?>'.toUpperCase(),
                        nombre: '<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>'
                            .toUpperCase(),
                        estado_civil: '<?= $detalle->estado_civil ?>'.toUpperCase(),
                        rfc: '<?= $detalle->rfc ?>'.toUpperCase(),
                        curp: '<?= $detalle->curp ?>'.toUpperCase(),
                        domicilio: '<?= $detalle->calle . " #" . $detalle->numero . ", " . $detalle->colonia . " C.P. " . $detalle->cp . " " . $detalle->nombre_municipio . ", " . $detalle->nombre_entidad ?>'
                            .toUpperCase(),
                        fecha: fecha,
                        sexo: "<?= $detalle->sexo ?>".toUpperCase(),
                        tipo_duracion: tipo_duracion.toUpperCase(),
                        duracion: duracion.toUpperCase()
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(data) {
                        var a = document.createElement('a');
                        var url = window.URL.createObjectURL(data);
                        a.style.visibility = "visible";
                        a.href = url;
                        a.download = 'contrato.docx';
                        document.body.append(a);
                        a.click();
                        a.remove();
                        window.URL.revokeObjectURL(url);
                        button.prop("disabled", false);
                    },
                    error: function(data) {
                        button.prop("disabled", false);
                    }
                });

            } else {
                Toast.fire({
                    type: 'error',
                    title: 'Debe Ingresar los datos Solicitados.'
                })
            }
        }
    })()
});

$("#carta-patronal").on('click', function(e) {
    var button = $(this);
    button.prop("disabled", true);
    var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE",
        "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
    ];
    var fechaArray = '<?= $detalle->fecha_ingreso ?>'.split("-");
    var fecha_ingreso = fechaArray[2] + "-" + meses[parseInt(fechaArray[1]) - 1] + "-" + fechaArray[0];
    var fecha = new Date();
    fecha = fecha.getDate() + " DE " + meses[fecha.getMonth()] + " DE " + fecha.getFullYear()
    console.log(fecha);
    $.ajax({
        url: "<?php echo base_url();?>personal/generarCartaPatronal",
        method: 'POST',
        data: {
            uid_usuario: '<?= $detalle->uid_usuario ?>',
            fecha: fecha,
            nombre: '<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>'
                .toUpperCase(),
            fecha_ingreso: fecha_ingreso,
            rfc: '<?= $detalle->rfc ?>'.toUpperCase(),
            nss: '<?= $detalle->nss ?>'.toUpperCase(),
            puesto_contrato: '<?= $detalle->perfil ?>'.toUpperCase(),
            domicilio: '<?= $detalle->calle . " #" . $detalle->numero . ", " . $detalle->colonia . " " . $detalle->nombre_municipio . ", " . $detalle->nombre_entidad . " C.P. " . $detalle->cp  ?>'
                .toUpperCase(),
            empresa: '<?= $detalle->empresa ?>'.toUpperCase(),
            image_empresa: '<?= $detalle->image_empresa ?>',
            domicilio_empresa: '<?= $detalle->domicilio ?>',
            rfc_empresa: '<?= $detalle->rfc_empresa ?>'.toUpperCase(),
            registro_patronal: '<?= $detalle->registro_patronal ?>'.toUpperCase(),
        },
        xhrFields: {
            responseType: 'blob'
        },
        success: function(data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.style.visibility = "visible";
            a.href = url;
            a.download = 'carta-patronal.docx';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
            button.prop("disabled", false);
        },
        error: function(data) {
            button.prop("disabled", false);
        }
    });
});

$("#convenio-salida").on('click', function(e) {
    var button = $(this);
    button.prop("disabled", true);
    var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE",
        "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
    ];
    var fechaArray = '<?= $detalle->fecha_ingreso ?>'.split("-");
    var fecha_ingreso = fechaArray[2] + "-" + meses[parseInt(fechaArray[1]) - 1] + "-" + fechaArray[0];
    var fecha = new Date();
    fecha = fecha.getDate() + " DE " + meses[fecha.getMonth()] + " DE " + fecha.getFullYear()
    console.log(fecha);
    $.ajax({
        url: "<?php echo base_url();?>personal/generarConvenioSalida",
        method: 'POST',
        data: {
            fecha: fecha,
            empresa: '<?= $detalle->empresa ?>'.toUpperCase(),
            nombre: '<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>'
                .toUpperCase(),
            fecha_ingreso: fecha_ingreso,
            puesto_contrato: '<?= $detalle->perfil ?>'.toUpperCase(),
            domicilio: '<?= $detalle->calle . " #" . $detalle->numero . ", " . $detalle->colonia . " " . $detalle->nombre_municipio . ", " . $detalle->nombre_entidad . " C.P. " . $detalle->cp  ?>'
                .toUpperCase(),
            domicilio_empresa: '<?= $detalle->domicilio ?>'.toUpperCase(),
            horario: '<?= $detalle->horario ?>'.toUpperCase(),
        },
        xhrFields: {
            responseType: 'blob'
        },
        success: function(data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.style.visibility = "visible";
            a.href = url;
            a.download = 'convenio-salida.docx';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
            button.prop("disabled", false);
        },
        error: function(data) {
            button.prop("disabled", false);
        }
    });
});

$("#ofi-remis").on('click', function(e) {
    var button = $(this);
    button.prop("disabled", true);
    var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE",
        "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"
    ];
    var fecha = new Date();
    fecha = fecha.getDate() + " DE " + meses[fecha.getMonth()] + " DE " + fecha.getFullYear()
    console.log(fecha);
    $.ajax({
        url: "<?php echo base_url();?>personal/generarOfiRemis",
        method: 'POST',
        data: {
            fecha: fecha,
            empresa: '<?= $detalle->empresa ?>'.toUpperCase(),
            nombre: '<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>'
                .toUpperCase(),
            domicilio: '<?= $detalle->calle . " #" . $detalle->numero . ", " . $detalle->colonia . " " . $detalle->nombre_municipio . ", " . $detalle->nombre_entidad . " C.P. " . $detalle->cp  ?>'
                .toUpperCase(),
            domicilio_empresa: '<?= $detalle->domicilio ?>',
            domicilio_juridico: '<?= $detalle->domicilio_juridico ?>',
            actividad_empresa: '<?= $detalle->actividad_empresa ?>',
            domicilio_tribunal_laboral: '<?= $detalle->domicilio_tribunal_laboral ?>'.toUpperCase(),
            domicilio_centro_conciliacion_laboral: '<?= $detalle->domicilio_centro_conciliacion_laboral ?>'
                .toUpperCase(),
        },
        xhrFields: {
            responseType: 'blob'
        },
        success: function(data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.style.visibility = "visible";
            a.href = url;
            a.download = 'ofi-remis.docx';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
            button.prop("disabled", false);
        },
        error: function(data) {
            button.prop("disabled", false);
        }
    });
});

$("#form_justificar_asignacion").on("submit", function(event) {
    event.preventDefault();
    var form = $($(this)[0]);
    var button = form.find("button[type='submit']");
    button.prop("disabled", true);
    var frm = new FormData($(this)[0]);
    $.ajax({
        type: "POST",
        url: '<?= base_url() . 'almacen/justificarAsignacionRH' ?>',
        data: frm,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(data) {
            if (!data.error) {
                Toast.fire({
                    type: 'success',
                    title: data.mensaje
                });
                window.location.reload();
            } else {
                Toast.fire({
                    type: 'error',
                    title: data.mensaje
                });
                button.prop("disabled", false);
            }
        },
        error: function(data) {
            Toast.fire({
                type: 'error',
                title: data.mensaje
            });
            button.prop("disabled", false);
        }
    });
});
</script>
<script>
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
            letrasMonedaPlural: currency.plural ||
            'PESOS CHILENOS', //'PESOS', 'Dólares', 'Bolívares', 'etcs'
            letrasMonedaSingular: currency.singular ||
            'PESO CHILENO', //'PESO', 'Dólar', 'Bolivar', 'etc'
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

$('#ajaxeditarnota').submit(function(event) {

    //alert('se hará bien');
    event.preventDefault();
    var formData = new FormData(document.getElementById("ajaxeditarnota"));
    $.ajax({
        type: "post",
        //dataType: "json", 
        url: '<?= base_url(). 'personal/bajaEdit'?>',
        data: formData,
        processData: false,
        contentType: false,
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
                Swal.fire(
                    '¡Exitoso!',
                    resp.mensaje,
                    'success'
                );
                location.reload();
            } else {
                Toast.fire({
                    type: 'error',
                    title: resp.mensaje
                })
            }
        },
        error: function(data) {
            Toast.fire({
                type: 'error',
                title: "Ocurrio un problema."
            });
        }
    });
});
</script>
<style>
.swal2-popup #swal2-content {
    text-align: inherit !important;
}

.swal2-popup .swal2-checkbox,
.swal2-popup .swal2-file,
.swal2-popup .swal2-input,
.swal2-popup .swal2-radio,
.swal2-popup .swal2-select,
.swal2-popup .swal2-textarea {
    margin: 0.5em auto !important;
}
</style>