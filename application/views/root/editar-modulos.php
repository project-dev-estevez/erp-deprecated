<section class="projects">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h4 class="h4">Editar Usuario</h4>        
      </div>
      <div class="card-body">
        <form class="needs-validation" novalidate action="<?= base_url()?>root/actualizarModulosUsuario" method="post">
          
          
          <?php foreach ($modulos as $key => $value): $aux='';?>
          <div class="form-row">
            <div class="col">
              <label for="validationCustom01">Modulo</label>
              <input type="text" class="form-control" name="" value="<?= $value->modulo ?>" disabled>
              <input type="hidden" class="form-control" name="ctl_modulo_tipo_users_idctl_modulo_tipo_users[]"
                value="<?= $value->idctl_modulo_tipo_users ?>" readonly>
            </div>
            <div class="col">
              <label for="validationCustom01">Permiso</label>
              <?php foreach ($usuario->modulos as $key2 => $value2) {
                if ($value2->ctl_modulo_tipo_users_idctl_modulo_tipo_users==$value->idctl_modulo_tipo_users) {
                    $aux=1;
                }else{
                    $aux=0;
                }
                } ?>
                
              <select name="ctl_tipo_permiso_idctl_tipo_permiso[]" class="form-control">
                <option value="0">Seleccione...</option>
                <option <?= ($aux=='0') ? 'selected' : null ?> value="0">No</option>
                <option <?= ($aux=='1') ? 'selected' : null ?> value="1">Si</option>                
              </select>
            </div>
          </div>
          <?php endforeach ?>
          <?= form_hidden('id',$id) ?>
          <?= form_hidden('token',$token) ?>
          <button class="btn btn-primary" type="submit">Editar</button>
        </form>

      </div>
    </div>
  </div>
</section>