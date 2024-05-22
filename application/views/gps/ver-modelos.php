 <section class="tables">   
    <div class="container-fluid">

          <div class="card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow">
                  <a href="#nuevoDispositivoModal" data-toggle="modal" class="dropdown-item"> <i class="fa fa-cube"></i>Nuevo Dispositivo</a>
                </div>
                </div>
              </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Dispositivos GPS</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">   
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>#UID</th>
                      <th>IMEI</th>
                      <th>MODELO</th>
                      <th>NÚMERO TELEFÓNICO</th>
                      <th>ASIGNACIÓN</th>
                      <th>ICONO</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#UID</th>
                      <th>IMEI</th>
                      <th>MODELO</th>
                      <th>NÚMERO TELEFÓNICO</th>
                      <th>ASIGNACIÓN</th>
                      <th>ICONO</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php if ($dispositivos): ?>
                    <?php foreach ($dispositivos as $key => $value): ?>
                      <tr>
                        <td><?= $value->idtbl_gps ?></td>
                        <td><?= $value->imei ?></td>
                        <td><?= $value->modelo ?> (<?= $value->marca ?>)</td>
                        <td><?= $value->numero ?></td>
                        <td>
                          <?php if ($value->numero_interno): ?>
                            <?php echo $value->descripcion.' #'.$value->numero_interno ?>
                          <?php else: ?>
                            N/A
                          <?php endif ?>
                        </td>
                        <td><?= $value->icono ?></td>
                      </tr>
                    <?php endforeach ?>     
                    <?php else: ?>
                      <tr>
                        <td colspan="6" class="text-center">No existen dispositivos GPS.</td>
                      </tr>
                    <?php endif ?>        
                  </tbody>
                </table>
              </div>
            </div>
          </div>

           <div class="card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow">
                  <a href="#nuevoProyectoModal" data-toggle="modal" class="dropdown-item"> <i class="icon-user"></i>Nuevo Modelo</a>
                </div>
                </div>
              </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Todos los Modelos</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">   
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>#UID</th>
                      <th>Marca</th>
                      <th>Modelos</th>
                      <th>Comandos</th>
                      <th>Fecha Creación</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#UID</th>
                      <th>Marca</th>
                      <th>Modelos</th>
                      <th>Comandos</th>
                      <th>Fecha Creación</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php if ($modelos): ?>
                    <?php foreach ($modelos as $key => $value): ?>
                      <tr>
                        <td><?= $value->idtbl_modelos_gps ?></td>
                        <td><?= $value->marca ?></td>
                        <td><?= $value->modelo ?></td>
                        <td><?= $value->comandos ?></td>
                        <td><?= $value->fecha_creacion ?></td>
                      </tr>
                    <?php endforeach ?>     
                    <?php else: ?>
                      <tr>
                        <td colspan="6" class="text-center">No existen modelos GPS.</td>
                      </tr>
                    <?php endif ?>        
                  </tbody>
                </table>
              </div>
            </div>
          </div>        
      
    </div>
  </section>

 <div id="nuevoDispositivoModal" tabindex="-1" role="dialog" aria-labelledby="modalLabelDispositivo" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <?= form_open(base_url().'gps/nuevo_dispositivo') ?>
        <div class="modal-header">
          <h4 id="modalLabelDispositivo" class="modal-title">Nuevo Dispositivo GPS</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
              <label>Seleccione Modelo</label>
              <select name="modelo" class="form-control" required="required">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($modelos as $key => $value): ?>
                  <option value="<?= $value->idtbl_modelos_gps ?>"><?= $value->modelo ?> (<?= $value->marca ?>)</option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">       
              <label>IMEI</label>
              <input type="text" placeholder="IMEI" name="imei" data-mask="999999999999999" maxlength="15" minlength="15" class="form-control" required="required">
            </div>
            <div class="form-group">       
              <label>Número Telefónico Asociado</label>
              <input type="text" placeholder="Número Telefónico diez dígitos" name="numero" data-mask="9999999999" minlength="10" maxlength="10" class="form-control" required="required">
            </div> 
            <div class="form-group">
              <label>Icono</label>
              <select name="icono" class="form-control" required="required">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <option value="default">Default</option>
                <<option value="otdr">OTDR</option>
                <<option value="empalmadora">Empalmadora</option>
                <<option value="automovil">Automovil</option>
                <<option value="maquinaria_pesada">Maquinaria Pesada</option>
              </select>
            </div>         
        </div>
        <div class="modal-footer">
          <?= form_hidden('token',$token) ?>
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?=form_close()?>
      </div>
    </div>
  </div>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
  <script>
    

  </script>
