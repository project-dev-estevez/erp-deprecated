<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4 class="h4">Devolución</h4>
          </div>
          <div class="card-body">
            <div class="grid-form">
              <fieldset>
                <div data-row-span="8">

                  <div data-field-span="2">
                    <label>Folio</label>
                    DA-<?= $detalle[0]->folio ?>
                  </div>

                  <div data-field-span="3">
                    <label>Fecha de creación</label>
                    <?= $detalle[0]->fecha ?>
                  </div>

                  <div data-field-span="3">
                    <label>Proyecto</label>
                    <?= $detalle[0]->numero_proyecto ?> - <?= $detalle[0]->nombre_proyecto ?>
                  </div>

                </div>

                <div data-row-span="8">



                  <div data-field-span="3">
                    <label>Autor</label>
                    <?= $detalle[0]->nombre_autor ?>
                  </div>

                  <div data-field-span="3">
                    <label>Personal Recibe</label>
                    <?= $detalle[0]->autorizado_nombre == NULL ? $detalle[0]->user_recibe : $detalle[0]->autorizado_nombre ?>
                  </div>

                  <div data-field-span="2">
                    <label>Personal entrega</label>
                    <?= $detalle[0]->nombres ?> <?= $detalle[0]->apellido_paterno ?> <?= $detalle[0]->apellido_materno ?>
                  </div>

                </div>
                <?php if ($detalle[0]->nombre_comercial != null || $detalle[0]->nombre_comercial != '') { ?>
                  <div data-row-span="8">
                    <div data-field-span="3">
                      <label>Contratista</label>
                      <?= $detalle[0]->nombre_comercial ?>
                    </div>

                    <div data-field-span="3">
                      <label>Supervisor</label>
                      <?= $detalle[0]->nombre_supervisor ?> <?= $detalle[0]->paternosu ?> <?= $detalle[0]->maternosu ?>
                    </div>

                  </div>
                <?php } ?>
                <div data-row-span="8">

                  <div data-field-span="4">
                    <label>Usuario AG</label>
                    <?= $detalle[0]->nombre_ag ?>
                  </div>

                  <div data-field-span="4">
                    <label>Usuario Aprobación</label>
                    <?= $detalle[0]->nombre_aprobacion ?>
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
                  <th>Entregado</th>
                  <th>Estado</th>
                  <th>Observaciones</th>
              </thead>
              <tbody>

                <?php foreach ($detalle as $key => $value) { ?>

                  <tr>
                    <td><?= $value->neodata ?></td>
                    <td><?= $value->descripcion ?></td>
                    <td><?= $value->unidad_medida_abr ?></td>
                    <td><?= $value->cantidad ?></td>
                    <td><?= $value->entregado ?></td>
                    <td><?= $value->estado ?></td>
                    <td><?= $value->observaciones ?></td>
                  </tr>

                <?php } ?>


              </tbody>

            </table>

            <br><br>
            <h3 class="h3">Documentos</h3>
            <ul>
              <?php $carpeta = './uploads/'. $detalle[0]->uidentrega . '/devoluciones/' . $detalle[0]->uid_movimiento; ?>
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