<?php if (isset($this->session->userdata('permisos')['empresas']) && $this->session->userdata('permisos')['empresas']>1): ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#nuevoPerfilModal" data-toggle="modal">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
            <div class="title"><span>Nuevo<br>Perfil</span>              
            </div>
            
          </div>
          </a>
          </div>
        </div>

      </div>
    </div>
  </section>
  <?php endif ?>
  <section class="tables">   
    <div class="container-fluid">
      
        
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4"><?php echo $detalle['nombre'] ?></h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">   
                <table class="table table-striped table-sm" id="data-table">
                  <thead>
                    <tr>
                      <th>Cve Perfil</th>
                      <th>Perfil</th>
                      <th>Personal</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>CVE Perfil</th>
                      <th>Perfil</th>
                      <th>Personal</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($detalle['perfiles'] as $key => $value): ?>
                      <tr>
                       <td><?=$value->uid ?></td>
                       <td><a href="<?= base_url() ?>departamentos/perfil/<?= $value->uid ?>"><?=$value->perfil ?></a></td>
                       <td><?=$value->personal ?></td>
                       <td><a href='#editar_departamento' data-toggle='modal' title='<?= $value->perfil ?>' data-perfil='<?= $value->perfil ?>' data-uid='<?= $value->uid ?>'>Editar</a></td>
                      </tr>
                    <?php endforeach ?>                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        
      
    </div>
  </section>


  <div id="nuevoPerfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelPerfil" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <?= form_open(base_url().'departamentos/nuevo-perfil') ?>
        <div class="modal-header">
          <h4 id="exampleModalLabelPerfil" class="modal-title">Nuevo Perfil</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
              <label>Departamento</label>
              <input type="text" name="" class="form-control" disabled="disabled" value="<?php echo $detalle['nombre'] ?>" placeholder="">
            </div>
            <div class="form-group">       
              <label>Nombre de nuevo perfil</label>
              <input type="text" placeholder="Perfil" name="perfil" class="form-control capitalize">
            </div>
          
        </div>
        <div class="modal-footer">
          <?= form_hidden('token',$token) ?>
          <?= form_hidden('from','departamentos/departamento/'.$detalle['uid']) ?>
          <?= form_hidden('departamento', $detalle['id']) ?>
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
  <div id="editar_departamento" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open(base_url() . 'departamentos/actualizar-perfil') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Editar Perfil</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Nombre Perfil</label>
              <input type="text" placeholder="Departamento" name="nombreperfil" class="form-control" required>
            </div>
          </div>
        </div>         
      </div>
      <div class="modal-footer">
        <?= form_hidden('uid', '') ?>
        <?= form_hidden('token', $token) ?>
        <?= form_hidden('departamento', $departamento) ?>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

  <script>
  $('#editar_departamento').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='nombreperfil']").val(recipient.perfil);
  })
</script>