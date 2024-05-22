
<section class="tables">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-close">
        <div class="dropdown">
          <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
          <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow">
            <a href="#nuevaVacanteModal" data-toggle="modal" class="dropdown-item"> <i class="icon-user"></i>Nueva Vacante</a>
          </div>
          </div>
        </div>
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Todas las Vacantes</h3>
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
                <th>Prospectos</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Departamento</th>
                <th>Perfil</th>
                <th>Vacantes</th>
                <th>Proyecto</th>
                <th>Prospectos</th>
              </tr>
            </tfoot>
            <tbody>
              <?php if (count($vacantes)>0): ?>
              <?php foreach ($vacantes as $vacante): ?>
                <tr onclick='location.href="<?= base_url()?>vacantes/detalle-vacante/<?= $vacante->uid?>"' style="cursor: pointer;">
                  <td><?= $vacante->departamento ?></td>
                  <td><?= $vacante->perfil ?></td>
                  <td><?= $vacante->numero_vacantes ?></td>
                  <td><?= $vacante->nombre_proyecto ?></td>
                  <td><?= $vacante->perfil ?></td>
                </tr>
              <?php endforeach ?>     
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center">No hay vacantes.</td>
                </tr>
              <?php endif ?>               
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>