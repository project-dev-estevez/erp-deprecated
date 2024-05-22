<div class="container pt-5">
  <div class="row">
    <!-- Recent Updates-->
    <div class="col">
      <div class="recent-updates card">
        <div class="card-header">
          <h3 class="h4">Últimos movimientos</h3>
        </div>
        <div class="card-body">
          <?php if(count ($detalle)>0): ?>
            <div class="row">
              <div class="col">
                <h5><?= $detalle[0]->descripcion ?> <?= $detalle[0]->modelo ?> </h5>
                <h5>Marca: <?= $detalle[0]->marca ?></h5>
                <h5>Número de serie: <?= $detalle[0]->numero_serie ?></h5>
                <h5>Número interno: <?= $detalle[0]->numero_interno ?></h5>
              </div>
            </div>
            <ul class="timeline">
              <?php foreach($detalle as $key=>$value): ?>
                <li>
                  <div class="timeline-badge asignacion <?= $key == 0 ? 'activa' : 'finalizada' ?>"><em class="fa fa-id-card"></em></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title">KM: <?= $value->km_actual ?></h4>
                    </div>
                    <div class="timeline-body">
                      Carga (Litros): <?= $value->litros_combustible ?>
                      <p>Fecha Carga: <?= $value->fecha_carga ?></p>
                      <p>Precio (Litro): <?= $value->precio ?></p>
                      <p>Registrado por: <?= $value->nombre ?></p>
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
