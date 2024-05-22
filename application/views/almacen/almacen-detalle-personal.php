<div class="container pt-5">
  <div class="row">
    <!-- Recent Updates-->
    <div class="col">
      <div class="recent-updates card">
        <div class="card-header">
          <h3 class="h4">Últimos movimientos</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5><?= $detalle[0]->nombres ?> <?= $detalle[0]->apellido_paterno ?> <?= $detalle[0]->apellido_materno ?> Empleado N° <?= $detalle[0]->numero_empleado ?></h5>
            </div>
          </div>
          <ul class="timeline">						
            <?php foreach($detalle as $key=>$value): ?>
              <?php if($value->tipo_movimiento!==NULL): ?>
                <li>
  							  <div class="timeline-badge <?= $value->tipo_movimiento ?>"><em class="fa fa-id-card"></em></div>
  							  <div class="timeline-panel">
                    <div class="timeline-heading">
  									  <h4 class="timeline-title"><?= ucfirst($value->tipo_movimiento) ?></h4>
                    </div>
                    <div class="timeline-body">
                      <?= $value->descripcion ?> <?= $value->modelo ?> (<?= $value->marca ?>)
                      <p>Unidades: <?= $value->cantidad ?></p>
                      <?php if($value->abreviatura!='CAC'): ?>
                        <p>Número de serie: <?= $value->numero_serie ?></p>
                        <p>Número de interno: <?= $value->numero_interno ?></p>
                        <p>Notas: <?= $value->nota ?></p>
                      <?php endif ?>
                      <p><?= $value->numero_proyecto ?> <?= $value->nombre_proyecto ?></p>
                      <p>Asignado por <?= $value->nombre ?></p>
                      <p>Fecha asignación: <?php echo strftime("%d de %b de %Y a las %T",strtotime($value->fecha_asignacion)) ?></p>
                      <?php if($value->abreviatura!='CAC'): ?>
                        <p>Fecha finalización: <?php echo ($value->fecha_finalizacion) ? strftime("%d de %b de %Y a las %T",strtotime($value->fecha_finalizacion)) : 'Asignación activa' ?></p>
                      <?php endif ?>
                    </div>
                  </div>
                </li>
              <?php else: ?>
                <li>No existen movimientos</li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
