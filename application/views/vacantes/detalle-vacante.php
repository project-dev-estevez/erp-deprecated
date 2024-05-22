  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="<?= base_url() ?>vacantes/prospectos/nuevo/<?= $this->uri->segment(3)?>" title="">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
            <div class="title"><span>Nuevo<br>prospecto</span>              
            </div>
            
          </div>
          </a>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#editarVacanteModal" data-toggle="modal" title="">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-violet"><i class="fa-undo fa"></i></div>
            <div class="title"><span>Actualizar<br>vacante</span>
            </div>
          </div>
          </a>
          </div>
        </div>
  
      </div>
    </div>
  </section>
<section class="tables">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Datos de Requisición de Personal</h3>
      </div>
      <div class="card-body">
        <p>Fecha de creación - <?php echo strftime("%d de %b de %Y a las %T",strtotime($requisicion->fecha_creacion)) ?></p>
            <p>Fecha de autorización/cancelación - <?php echo ($requisicion->fecha_aprobacion_cancelacion != null) ? strftime("%d de %b de %Y a las %T",strtotime($requisicion->fecha_aprobacion_cancelacion)) : 'Pendiente' ?></p>
            <p>Fecha de finalización - <?php echo ($requisicion->fecha_finalizacion != null) ? strftime("%d de %b de %Y",strtotime($requisicion->fecha_finalizacion)) : 'Pendiente' ?></p>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <tbody>
              <tr>
                <td colspan="2"><strong>TIPO DE PUESTO:</strong> <?= ($requisicion->tipo_requisicion=='nuevo') ? 'Puesto de Nueva Creación' : 'Reposición de Personal';?></td>
                <td colspan="2"><strong>PROYECTO:</strong> <?= $requisicion->nombre_proyecto?></td>
              </tr>
                <?php if ($requisicion->tipo_requisicion!='nuevo'): ?>
                  <tr>
                    <td colspan="2"><strong>MOTIVO DE LA VACANTE:</strong> <?= $requisicion->motivo?></td>
                    <td colspan="2"><strong>NOMBRE DE PERSONA A SUSTITUIR:</strong> <?= $requisicion->nombre_sustituir?></td>
                  </tr>
                <?php endif ?>
              <tr>
                <td colspan="2"><strong>DEPARTAMENTO:</strong> <?= $requisicion->departamento?></td>
                <td colspan="2"><?= ($requisicion->tipo_requisicion=='nuevo') ? '<strong>NOMBRE DE NUEVO PERFIL:</strong> '.$requisicion->nombre_nuevo_puesto : '<strong>PERFIL:</strong> '.$requisicion->perfil;?></td>
              </tr>

              <tr>
                <td ><strong>NÚMERO DE VACANTES:</strong> <?= $requisicion->numero_vacantes?></td>
                <td colspan="2"><strong>SUELDO MENSUAL AUTORIZADO:</strong> $<?= number_format($requisicion->sueldo_solicitado) ?></td>
                <td ><strong>TIPO DE PAGO:</strong> <?= ($requisicion->tipo_pago=='s') ? 'Semanal' : 'Quincenal';?></td>
              </tr>
              <tr>
                <td><strong>TIPO DE CONTRATO:</strong> <?= $requisicion->contrato?></td>
                <td colspan="2"><strong>HORARIO DE JORNADA LABORAL:</strong> <?= $requisicion->horario?></td>
                <td><strong>IMSS:</strong> <?= ($requisicion->imss==0) ? 'No aplica' : 'Aplica';?></td>
              </tr>
              <tr>
                <td ><strong>RANGO EDAD:</strong> <?= $requisicion->rango_edad?></td>
                <td ><strong>AÑOS DE EXPERIENCIA:</strong> <?= $requisicion->anios_experiencia?></td>
                <td ><strong>SEXO:</strong> <?php if ($requisicion->sexo=='m'){echo "Masculino";}elseif($requisicion->sexo=='f'){echo "Femenino";}else{echo "No aplica";}?></td>
                <td ><strong>ESTADO CIVIL:</strong> <?php if ($requisicion->estado_civil=='c'){echo 'Casado (a) ';}elseif($requisicion->sexo=='s'){echo 'Soltero (a)';}else{echo 'No aplica';}?></td>
              </tr>
              <tr>
                <td colspan="4"><strong>FUNCIONES GENERALES DEL PUESTO:</strong> <?= $requisicion->descripcion?></td>
              </tr>
              <tr>
                <td colspan="2"><strong>ESCOLARIDAD:</strong> <?= $requisicion->escolaridad?></td>
                <td colspan="2"><strong>ESPECIALIDAD:</strong> <?= $requisicion->especialidad?></td>
              </tr>
              <tr>
                <td colspan="2"><strong>MANEJO DE EQUIPO Y/O MAQUINARIA:</strong> <?= $requisicion->maquinaria?></td>
                <td colspan="2"><strong>OFIMÁTICA:</strong> <?= $requisicion->paqueteria?></td>
              </tr>
              <tr>
                <td colspan="2"><strong>EQUIPO DE PROTECCIÓN PERSONAL (EPP):</strong> <?= $requisicion->epp?></td>
                <td colspan="2"><strong>UNIFORME:</strong> <?= $requisicion->uniforme?></td>
              </tr>
              <tr>
                <td colspan="2"><strong>EQUIPO DE COMPUTO:</strong> <?= $requisicion->equipo_computo?></td>
                <td colspan="2"><strong>EQUIPO CELULAR:</strong> <?= $requisicion->equipo_celular?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Listado de Prospectos</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">   
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
              </tr>
            </tfoot>
            <tbody>
                       
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?php  ?>
<div id="editarVacanteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelPerfil" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <?= form_open(base_url().'vacantes/editar/'.$this->uri->segment(3)) ?>
      <div class="modal-header">
        <h4 id="exampleModalLabelPerfil" class="modal-title">Editar Vacante <?= $requisicion->perfil ?></h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Numero de Vacantes*</label>
          <input type="number" class="form-control capitalize" placeholder="Numero de vacantes" name="nvacantes" min="0" value="<?= $requisicion->numero_vacantes ?>" max="<?= $requisicion->numero_vacantes ?>" required>
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token',$token) ?>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      <?=form_close()?>
    </div>
  </div>
</div>
<?php ?>