<section class="tables">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Datos de Requisición de Personal</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <tbody>
              <tr>
                <td width="50%"><strong>TIPO DE PUESTO:</strong> <?= ($todo['requisicion']['vacante']['tipo_requisicion']=='nuevo') ? 'Puesto de Nueva Creación' : 'Reposición de Personal';?></td>
                <td width="50%"><strong>PROYECTO:</strong> <?= $todo['requisicion']['proyecto']?></td>
              </tr>
                <?php if ($todo['requisicion']['vacante']['tipo_requisicion']!='nuevo'): ?>
                  <tr>
                    <td><strong>MOTIVO DE LA VACANTE:</strong> <?= $todo['requisicion']['vacante']['motivo']?></td>
                    <td><strong>NOMBRE DE PERSONA A SUSTITUIR:</strong> <?= $todo['requisicion']['vacante']['nombre_sustituir']?></td>
                  </tr>
                <?php endif ?>
              <tr>
                <td><strong>DEPARTAMENTO:</strong> <?= $todo['requisicion']['departamento']?></td>
                <td><?= ($todo['requisicion']['vacante']['tipo_requisicion']=='nuevo') ? '<strong>NOMBRE DE NUEVO PERFIL:</strong> '.$todo['requisicion']['vacante']['nombre_nuevo_puesto'] : '<strong>PERFIL:</strong> '.$todo['requisicion']['perfil'];?></td>
              </tr>
              <tr>
                <td colspan="2" style="padding:0"> 
                  <table class="table table-sm" style="font-size: 13px;">
                    <tbody>
                      <tr style="background:none">
                        <td width="33.33%" style="border:none;"><strong>NÚMERO DE VACANTES:</strong> <?= $todo['requisicion']['vacante']['numero_vacantes']?></td>
                        <td width="33.33%" style="border:none;"><strong>SUELDO MENSUAL:</strong> <?= $todo['requisicion']['vacante']['sueldo_solicitado']?></td>
                        <td width="33.33%" style="border:none;"><strong>TIPO DE PAGO:</strong> <?= ($todo['requisicion']['vacante']['tipo_pago']=='s') ? 'Semanal' : 'Quincenal';?></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="2" style="padding:0">
                  <table class="table table-sm" style="font-size: 13px;">
                    <tbody>
                      <tr>
                        <td width="30%" style="border:none;"><strong>TIPO DE CONTRATO:</strong> <?= $todo['requisicion']['vacante']['tipo_contrato']?></td>
                        <td style="border:none;"><strong>HORARIO DE JORNADA LABORAL:</strong> <?= $todo['requisicion']['vacante']['horario']?></td>
                        <td width="30%" style="border:none;"><strong>IMSS:</strong> <?= ($todo['requisicion']['vacante']['imss']==0) ? 'No aplica' : 'Aplica';?></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="2" style="padding:0">
                  <table class="table table-sm" style="font-size: 13px;">
                    <tbody>
                      <tr style="background:none">
                        <td style="border:none;"><strong>RANGO EDAD:</strong> <?= $todo['requisicion']['vacante']['rango_edad']?></td>
                        <td style="border:none;"><strong>AÑOS DE EXPERIENCIA:</strong> <?= $todo['requisicion']['vacante']['anios_experiencia']?></td>
                        <td style="border:none;"><strong>SEXO:</strong> <?php if ($todo['requisicion']['vacante']['sexo']=='m'){echo "Masculino";}elseif($todo['requisicion']['vacante']['sexo']=='f'){echo "Femenino";}else{echo "No aplica";}?></td>
                        <td style="border:none;"><strong>ESTADO CIVIL:</strong> <?php if ($todo['requisicion']['vacante']['estado_civil']=='c'){echo 'Casado (a) ';}elseif($todo['requisicion']['vacante']['sexo']=='s'){echo 'Soltero (a)';}else{echo 'No aplica';}?></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr><td colspan="2"><strong>FUNCIONES GENERALES DEL PUESTO:</strong> <?= $todo['requisicion']['vacante']['descripcion']?></td></tr>
              <tr>
                <td><strong>ESCOLARIDAD:</strong> <?= $todo['requisicion']['escolaridad']?></td>
                <td><strong>ESPECIALIDAD:</strong> <?= $todo['requisicion']['vacante']['especialidad']?></td>
              </tr>
              <tr>
                <td><strong>MANEJO DE EQUIPO Y/O MAQUINARIA:</strong> <?= $todo['requisicion']['vacante']['maquinaria']?></td>
                <td><strong>OFIMÁTICA:</strong> <?= $todo['requisicion']['vacante']['paqueteria']?></td>
              </tr>
              <tr>
                <td><strong>EQUIPO DE PROTECCIÓN PERSONAL (EPP):</strong> <?= $todo['requisicion']['vacante']['epp']?></td>
                <td><strong>UNIFORME:</strong> <?= $todo['requisicion']['vacante']['uniforme']?></td>
              </tr>
              <tr>
                <td><strong>EQUIPO DE COMPUTO:</strong> <?= $todo['requisicion']['vacante']['equipo_computo']?></td>
                <td><strong>EQUIPO CELULAR:</strong> <?= $todo['requisicion']['vacante']['equipo_celular']?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow">
            <a href="<?= base_url() ?>vacantes/prospectos/nuevo/<?= $this->uri->segment(3)?>" class="dropdown-item"> <i class="fa fa-address-book"></i>Nuevo Prospecto</a>
            <a href="#editarVacanteModal" data-toggle="modal" class="dropdown-item"> <i class="fa fa-edit"></i>Editar Vacante</a>
          </div>
          </div>
        </div>
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
              <?php if ($numero > 0): ?>
              <?php foreach ($todo['prospectos'] as $prospecto): ?>
                <tr onclick='location.href="<?= base_url()?>vacantes/prospectos/editar/<?= $this->uri->segment(3).'-'.$prospecto['uid']?>"' style="cursor: pointer;">
                  <td><?= $prospecto['nombre'].' '.$prospecto['apellidos']?></td>
                  <td><?= $prospecto['telefono']?></td>
                  <td><?= $prospecto['email']?></td>
                </tr>
              <?php endforeach ?>     
              <?php else: ?>
                <tr>
                  <td colspan="6" class="text-center">No hay prospectos.</td>
                </tr>
              <?php endif ?>               
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<div id="editarVacanteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelPerfil" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
      <?= form_open(base_url().'vacantes/editar/'.$this->uri->segment(3)) ?>
      <div class="modal-header">
        <h4 id="exampleModalLabelPerfil" class="modal-title">Editar Vacante <?= $todo['perfil']?></h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Numero de Vacantes*</label>
          <input type="number" class="form-control capitalize" placeholder="Numero de vacantes" name="nvacantes" min="0" value="<?= $todo['disponible']?>" required>
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