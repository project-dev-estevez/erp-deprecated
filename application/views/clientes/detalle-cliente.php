
  <section class="tables">   
    <div class="container-fluid">
      
        
          <div class="card">
            <div class="card-header d-flex align-items-center">

              <h3 class="h4">Cliente - <?php echo $detalle->nombre_comercial ?></h3>
            </div>
            <div class="card-body">
              <div class="dt-buttons btn-group float-right">
                  <?php if (isset($this->session->userdata('permisos')['clientes']) && $this->session->userdata('permisos')['clientes']>2): ?>
                    <button class="btn btn-secondary buttons-pdf buttons-html5 btn-primary no-print" data-target="#editarClienteModal" data-toggle="modal"><span><i class="fa fa-edit"></i> Editar</span></button>
                  <?php endif ?>
                </div>
                <div class="clearfix"></div>
                <br>
              <table width="100%" class="table table-bordered">
                <tbody>
                  <tr>
                    <td align="right"><strong>Razón Social</strong></td>
                    <td><?php echo $detalle->razon_social ?></td>
                    <td align="right"><strong>Nombre Comercial</strong></td>
                    <td><?php echo $detalle->nombre_comercial ?></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>RFC</strong></td>
                    <td><?php echo $detalle->rfc ?></td>
                    <td align="right"><strong>Email</strong></td>
                    <td><?php echo $detalle->email ?></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Teléfono</strong></td>
                    <td><?php echo $detalle->telefono ?></td>
                    <td align="right"><strong>Teléfono Adicional</strong></td>
                    <td><?php echo $detalle->telefono_adicional ?></td>
                  </tr>
                  <tr>
                    <td align="right"><strong>Dirección</strong></td>
                    <td colspan="3"><?php echo $detalle->direccion ?></td>
                  </tr>
                </tbody>
              </table>
              <br>
              <div class="table-responsive">   
                <table class="table table-striped table-sm" id="data-table">
                  <thead>
                    <tr>
                      <th>Número Proyecto</th>
                      <th>Nombre</th>
                      <th>Fecha Creación</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Termino</th>
                      <th>Ubicación</th>
                    </tr>
                  </thead>
                  <tfoot>
                     <tr>
                      <th>Número Proyecto</th>
                      <th>Nombre</th>
                      <th>Fecha Creación</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Termino</th>
                      <th>Ubicación</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php if ($proyectos): ?>
                      <?php foreach ($proyectos as $key => $value): ?>
                            <tr>
                              <td><a href="<?= base_url() ?>proyectos/detalle/<?= $value->uid ?>" title="<?=$value->nombre_proyecto ?>"><?= $value->numero_proyecto ?></a></td>
                              <td><a href="<?= base_url() ?>proyectos/detalle/<?= $value->uid ?>" title="<?=$value->nombre_proyecto ?>"><?= $value->nombre_proyecto ?></a></td>
                              <td><a href="<?= base_url() ?>proyectos/detalle/<?= $value->uid ?>" title="<?=$value->nombre_proyecto ?>"><?= strftime("%d de %b de %Y",strtotime($value->fecha_creacion)) ?></a></td>
                              <td><a href="<?= base_url() ?>proyectos/detalle/<?= $value->uid ?>" title="<?=$value->nombre_proyecto ?>"><?= ($value->fecha_inicio!=NULL) ? strftime("%d de %b de %Y",strtotime($value->fecha_inicio)) : '' ?></a></td>
                              <td><a href="<?= base_url() ?>proyectos/detalle/<?= $value->uid ?>" title="<?=$value->nombre_proyecto ?>"><?= ($value->fecha_termino!=NULL) ? strftime("%d de %b de %Y",strtotime($value->fecha_termino)) : ''  ?></a></td>
                              <td><a href="<?= base_url() ?>proyectos/detalle/<?= $value->uid ?>" title="<?=$value->nombre_proyecto ?>"><?= $value->direccion ?></a></td>
                            </tr>
                      <?php endforeach ?>     
                    <?php endif ?>   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<?php if (isset($this->session->userdata('permisos')['clientes']) && $this->session->userdata('permisos')['clientes']>2): ?>
                  

    <div id="editarClienteModal" tabindex="-1" role="dialog" aria-labelledby="modalEditarCliente" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <?= form_open(base_url().'clientes/editar') ?>
        <div class="modal-header">
          <h4 id="modalEditarCliente" class="modal-title">Editar cliente "<?php echo $detalle->nombre_comercial ?>"</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
           <p><strong>Razón Social:</strong></p>
           <p><input type="text" name="razon_social" class="form-control" required minlength="3" maxlength="150" value="<?php echo $detalle->razon_social ?>" placeholder=""></p>

           <p><strong>Nombre Comercial:</strong></p>
           <p><input type="text" name="nombre_comercial" class="form-control" value="<?php echo $detalle->nombre_comercial ?>" placeholder=""></p>

           <p><strong>RFC:</strong></p>
           <p><input type="text" name="rfc" class="form-control" required minlength="12" maxlength="13" value="<?php echo $detalle->rfc ?>" placeholder=""></p>

           <p><strong>Email:</strong></p>
           <p><input type="text" name="email" class="form-control" value="<?php echo $detalle->email ?>" placeholder=""></p>

           <p><strong>Teléfono:</strong></p>
           <p><input type="text" name="telefono" class="form-control" value="<?php echo $detalle->telefono ?>" placeholder=""></p>

           <p><strong>Teléfono Adicional:</strong></p>
           <p><input type="text" name="telefono_adicional" class="form-control" value="<?php echo $detalle->telefono_adicional ?>" placeholder=""></p>

           <p><strong>Dirección:</strong></p>
           <p><textarea name="direccion" class="form-control"><?php echo $detalle->direccion ?></textarea></p>

              
          
        </div>
        <div class="modal-footer">
          <?= form_hidden('token',$token) ?>
          <?= form_hidden('from','clientes/detalle/'.$detalle->uid) ?>
          <?= form_hidden('idCliente', $detalle->idtbl_clientes) ?>
          <?= form_hidden('uid', $detalle->uid) ?>
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
<?php endif ?>