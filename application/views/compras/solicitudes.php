
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Solictudes<br>Pendientes</span></div>
                    <div class="number"><strong><?= $total ?></strong></div>
                </div>
            </div>
            
        </div>
    </div>
</section>


<section class="tables dashboard-counts">
    <div class="container-fluid">


        <div class="card">

            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Solicitudes de Compra</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>Creación</th>
                                <th>Limite</th>
                                <th>Creador</th>
                                <th>Proyecto</th>
                                <th>Estatus</th>
                                <th>Progreso</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>UID</th>
                                <th>Creación</th>
                                <th>Limite</th>
                                <th>Creador</th>
                                <th>Proyecto</th>
                                <th>Estatus</th>
                                <th>Progreso</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if ($solicitudes): ?>
                            <?php foreach ($solicitudes as $key => $value): ?>
                                <tr>
                                    <td><?= $value->uid ?></td>
                                    <td> <?php echo strftime("%d de %b de %Y a las %r",strtotime($value->fecha_creacion)) ?></td>
                                    <td> <?php echo strftime("%d de %b de %Y",strtotime($value->fecha_limite)) ?></td>
                                    <td><?= $value->nombre ?></td>
                                    <td title="<?= $value->nombre_proyecto ?>"><?= $value->numero_proyecto ?></td>
                                    <td><?= ucfirst($value->estatus_solicitud) ?></td>
                                    <td align="center">
                                    <?= ($value->comprado*100)/$value->cantidad ?>%
                                    <div class="progress">
                                      <div role="progressbar" style="width: <?= ($value->comprado*100)/$value->cantidad ?>%; height: 4px;" aria-valuemin="0" aria-valuemax="100" class="progress-bar
                                      <?php
                                      if(($value->comprado*100)/$value->cantidad<30)
                                      echo 'bg-red';
                                      if(($value->comprado*100)/$value->cantidad>30 && ($value->comprado*100)/$value->cantidad<70 )                        
                                      echo 'bg-orange';
                                      else
                                      echo 'bg-green';
                                      ?>
                                      
                                      "></div>
                                    </div>
                                    </td>
                                    <td align="center"><a href="<?= base_url() ?>compras/detalle-solicitud/<?= $value->uid ?>" title="Detalle"><i class="fa fa-info-circle"></i></a></td>
                                </tr>
                            <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        

    </div>
</section>