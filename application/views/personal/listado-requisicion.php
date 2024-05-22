

  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="<?= base_url()?>usuarios/nueva-requisicion" title="">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-violet"><i class="fa fa-check"></i></div>
            <div class="title"><span>Nueva<br>Requisición</span>              
            </div>
            
          </div>
          </a>
          </div>
        </div>
        <?php /* ?>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#" title="">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-violet"><i class="fa-eye fa"></i></div>
            <div class="title"><span>Ver<br>Listas CSV</span>
            </div>
          </div>
          </a>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#" title="">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-green"><i class="fa fa-upload"></i></div>
            <div class="title"><span>Cargar<br>Lista Manual</span>
            </div>
          </div>
          </a>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#" title="">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-green"><i class="fa fa-eye"></i></div>
            <div class="title"><span>Ver<br>Listas Manuales</span>
            </div>
          </div>
          </a>
          </div>
        </div>
        <?php */ ?>
      </div>
    </div>
  </section>

<section class="tables">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Requisiciones</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">   
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th>Departamento</th>
                <th>Perfil</th>
                <th>Vacantes</th>
                <th>Proyecto</th>
                <th>Estatus</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Departamento</th>
                <th>Perfil</th>
                <th>Vacantes</th>
                <th>Proyecto</th>
                <th>Estatus</th>
              </tr>
            </tfoot>
            <tbody>
              <?php if (count($todo['requisiciones'])>0): ?>
              <?php foreach ($todo['requisiciones'] as $vavante): ?>
                <?php if ( 
                  ( $this->session->userdata('perfil')=='Dirección') ||
                  ( $this->session->userdata('perfil')=='Root') ||
                  ( $vavante['autor']==$this->session->userdata('idtbl_usuarios') ) ||
                  ( $this->session->userdata('perfil')==ID_DEPARTAMENTO_RH && $vavante['autor']==1 ) ||
                  ( $this->session->userdata('perfil')==ID_DEPARTAMENTO_RH && $vavante['autor']==2 ) ||
                  ( $this->session->userdata('perfil')==ID_DEPARTAMENTO_RH && $vavante['autor']==3 )
                ): ?>
                <tr onclick='location.href="<?= base_url()?>usuarios/revisar-requisicion/<?= $vavante['uid']?>"' style="cursor: pointer;">
                  <td><?= $todo['departamento'.$vavante['uid']]?></td>
                  <td><?= ($vavante['tipo_requisicion']=='nuevo') ? $vavante['nombre_nuevo_puesto'] : $todo['perfil'.$vavante['uid']];?></td>
                  <td class="text-center"><?= $vavante['numero_vacantes']?></td>
                  <td><?= $todo['proyecto'.$vavante['uid']]?></td>
                  <td><?php
                    if($vavante['estatus']==0)
                      echo '<strong class="text-primary">Pendiente de aprobación</strong>';
                    elseif($vavante['estatus']==1)
                      echo '<strong class="text-success">En proceso</strong>';
                    elseif($vavante['estatus']==2)
                      echo '<strong class="text-default">Finalizada</strong>';
                    elseif($vavante['estatus']==3)
                      echo '<strong class="text-danger">Cancelada</strong>';
                    else
                      echo 'N/A';
                  ?></td>
                </tr>
                <?php endif ?>
              <?php endforeach ?>     
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">No hay requisiciones.</td>
                </tr>
              <?php endif ?>               
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>