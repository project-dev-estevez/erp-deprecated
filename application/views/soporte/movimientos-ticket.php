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
                <!--<h5><?= $detalle[0]->descripcion ?> <?= $detalle[0]->modelo ?> </h5>
                <h5>Marca: <?= $detalle[0]->marca ?></h5>
                <h5>Número de serie: <?= $detalle[0]->numero_serie ?></h5>
                <h5>Número interno: <?= $detalle[0]->numero_interno ?></h5>-->
              </div>
            </div>
            <ul class="timeline">
              <?php foreach($detalle as $key=>$value): ?>
                <li>
                  <div class="timeline-badge asignacion activa"><em class="fa fa-id-card"></em></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title"><?= ucfirst($value->log) ?></h4>
                    </div>
                    <div class="timeline-body">
                      <?= $value->fecha ?> 
                      <!--<p>Asignado por <?= $value->nombre ?></p>-->
                      
                      
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
      <style type="text/css" media="print">
@media print {
    #salida_material {
        padding-top: 0;
    }

    #salida_material table td {
        border: none;
    }

    body {
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
    }
    #documento_multa{
        font-size: 18px;
    }
    #documento_multa .row{
        margin:0px;
    }
    #documento_multa table tr td{
        padding: 5px;
        text-align: center;
        font-size: 18px;
    }
}
</style>
<script>
  function openWin(obj) {
    event.preventDefault();
    myWindow = window.open(obj.getAttribute("href"), '_blank', 'width=1000,height=800,left=0,top=0');
    myWindow.document.close(); //missing code
    myWindow.focus();
    myWindow.print();
    //myWindow.close();

  }
</script>