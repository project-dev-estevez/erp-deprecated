<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4 class="h4">Traspaso</h4>
          </div>
          <div class="card-body">
            <div class="grid-form">
              <fieldset>
                <div data-row-span="8">

                  <div data-field-span="2">
                    <label>Folio</label>
                    TP-<?= $detalle[0]->folio ?>
                  </div>

                  <div data-field-span="3">
                    <label>Fecha de creación</label>
                    <?= $detalle[0]->fecha ?>
                  </div>

                  <div data-field-span="3">
                    <label>Proyecto</label>
                    <?= $detalle[0]->numero_destino ?> - <?= $detalle[0]->nombre_destino ?>
                  </div>

                </div>

                <div data-row-span="8">

                  <div data-field-span="3">
                    <label>Almacen Destino</label>
                    <?= $detalle[0]->almacen_destino ?>
                  </div>

                  <div data-field-span="2">
                    <label>Autor</label>
                    <?= $detalle[0]->nombre ?>
                  </div>

                </div>
                <div data-row-span="8">
                  <div data-field-span="8">
                    <label>Observaciones</label>
                    <!--<?= $detalle[0]->observaciones ?>-->
                  </div>
                </div>



              </fieldset>
            </div>
            <br><br>

            <table class="table table-striped table-bordered display responsive no-wrap" style="width:100%">
              <thead>
                <tr>
                  <th>Neodata</th>
                  <th>Descripción</th>
                  <th>Unidad</th>
                  <th>Cantidad</th>
              </thead>
              <tbody>

                <?php foreach ($detalle as $key => $value) { ?>

                  <tr>
                    <td><?= $value->neodata ?></td>
                    <td><?= $value->descripcion.' '.$value->numero_serie.' '.$value->numero_interno ?></td>
                    <td><?= $value->unidad_medida_abr ?></td>
                    <td><?= $value->cantidad ?></td>

                  </tr>

                <?php } ?>


              </tbody>

            </table>

            <br><br>
            <h3 class="h3">Documentos</h3>
            <ul>
            <?php $carpeta = './uploads/' . $detalle[0]->tbl_almacenes_idtbl_almacenes . '/traspasos/' . $detalle[0]->id_movimiento; ?>
              <?php @$scanned_directory = array_diff(scandir($carpeta), array('..', '.')); ?>
              <?php if (is_array($scanned_directory) || is_object($scanned_directory)) { ?>
                <?php if(sizeof($scanned_directory) > 0) { ?>
                  <?php
                  try {
                    foreach ($scanned_directory as $key => $value) {
                      echo '<li><a href="/' . $carpeta . '/' . $value . '" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">' . $value . '</a></li>';
                    }
                  } catch (Exception $e) {
                  }?>
                <?php }else { ?>
                  <p class="text-danger text-center">No se encontró ningún documento</p>
                <?php } ?>

              <?php }else { ?>
                <p class="text-danger text-center">No se encontró ningún documento</p>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>