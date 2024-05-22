<div class="container pt-5">
  <div class="row">
    <!-- Recent Updates-->
    <div class="col">
      <div class="recent-updates card">
        <div class="card-header">
          <h3 class="h4">Historial de Servicios</h3>
        </div>
        <div class="card-body">
          <?php if(count ($detalle)>0): ?>
            <div class="row">
              <div class="col">
                <h5 style="color: blue;"><?= $detalle[0]->descripcion ?> <?= $detalle[0]->modelo ?> </h5>
                <h5>Marca: <?= $detalle[0]->marca ?></h5>
                <h5>Número de serie: <?= $detalle[0]->numero_serie ?></h5>
                <h5>Número interno: <?= $detalle[0]->numero_interno ?></h5>
              </div>
            </div>
            <ul class="timeline">
              <?php foreach($detalle as $key=>$value): ?>
                <li>
                  <div class="timeline-badge asignacion finalizada"><em class="fa fa-id-card"></em></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title"><?= ucfirst($value->tipo_movimiento) ?> <?= ucfirst($value->estatus_asignacion) ?></h4>
                    </div>
                    <div class="timeline-body">
                      <p>Mantenimiento: <?= $value->tipo_servicio ?></p>                   
                      <p>Realizado por: <?= $value->nombre ?></p>
                      <p>Fecha: <?php echo strftime("%d de %b de %Y",strtotime($value->fecha)) . " A las $value->hora" ?></p>
                      <p>Observaciones: <?= $value->observaciones ?></p>
                      <a href="<?= base_url() ?>sistemas/detalle-checklist/<?= $value->idtbl_checklist_servicio_sistemas ?>">Ver checklist</a>
                    </div>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
          <?php else: ?>
            No existen movimientos para mostrar
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>
