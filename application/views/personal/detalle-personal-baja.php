<div class="container pt-5">
  <div class="row">
  <!-- Recent Updates-->
    <div class="col">
      <div class="recent-updates card">
        <div class="card-header">
          <h3 class="h4">Historial altas/bajas</h3>
        </div>
        <?php if(sizeof($detalle) != 0) { ?>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5><?= $detalle[0]->nombres ?>  <?= $detalle[0]->apellido_materno ?> <?= $detalle[0]->apellido_paterno ?> </h5>
            </div>
          </div>
          <?php if(count ($detalle)>0): ?>
            <ul class="timeline">
              <?php foreach($detalle as $key=>$value): ?>
              <li>
                <div class="timeline-badge <?= $value->tipo ?>"><em class="fa fa-arrow-down"></em></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title"><?= ucfirst($value->tipo) ?></h4>
                  </div>
                  <div class="timeline-body">
                    <p>Creado el <?php echo strftime("%d de %b de %Y a las %T",strtotime($value->fecha_creacion)) ?> por <?php echo $value->nombre ?></p>
                    <br>Fecha de baja: <?php echo strftime("%d de %B de %Y",strtotime($value->fecha)) ?>
                    <br>Motivo: <?php echo $value->motivo ?>
                    <br>Posible recontratación : <?= ($value->termino==1) ? '<span class="text-success bold">Viable</span>' : '<span class="text-success bold">Inviable</span>' ?>
                  </div>
                </div>
              </li>
              <?php endforeach ?>
            </ul>
          <?php else: ?>
          No existen movimientos para mostrar
          <?php endif ?>
        </div>
        <?php } ?>
        <?php if(sizeof($detalle) == 0) { ?>
          <div class="card-body">
            No existen movimientos para mostrar
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
