<section class="projects">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h4 class="h4">Editar Usuario</h4>
        <?= $this->session->userdata('tipo') ?>
      </div>
      <div class="card-body">
        <form class="needs-validation" novalidate action="<?= base_url()?>root/actualizarusuario" method="post">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationCustom01">Nombre</label>
              <input type="text" class="form-control" name="nombre" required value="<?= $usuario->nombre ?>">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustomUsername">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
                <input type="text" class="form-control" name="username" placeholder="Username"
                  aria-describedby="inputGroupPrepend" required value="<?= $usuario->username ?>">
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
              
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustomUsername">Tipo</label>
              <select name="tipo" class="form-control" required>
                <?php foreach ($tipos as $key => $value) : ?>
                  <option <?= ($usuario->tipo == $value->idctl_tipo_users) ? 'selected' : null ?> value="<?= $value->idctl_tipo_users ?>">
                    <?= $value->tipo ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="">Permiso autorizar</label>
              <select name="permiso_autorizar" class="form-control" required>
                <option <?= ($usuario->permiso_autorizar=='') ? 'selected' : null ?> value="no">NO</option>
                <option <?= ($usuario->permiso_autorizar=='si') ? 'selected' : null ?> value="si">SI</option>
              </select>
            </div>
            <div class="col">
              <label for="">Jefe Área</label>
              <select name="jefe_area" class="form-control" required>
                <option <?= ($usuario->jefe_area==0) ? 'selected' : null ?> value="0">NO</option>
                <option <?= ($usuario->jefe_area==1) ? 'selected' : null ?> value="1">SI</option>
              </select>
            </div>
            <div class="col">
              <label for="">Perfil Personal</label>
              <select name="idtbl_usuarios" class="form-control" required>
                <option value="" selected disabled>Seleccione...</option>
                <?php foreach($personal AS $key => $value){ ?>
                  <option value="<?= $value->idtbl_usuarios ?>" <?= $usuario->tbl_usuarios_idtbl_usuarios == $value->idtbl_usuarios ? 'selected' : '' ?>><?= $value->nombres ?> <?= $value->apellido_paterno ?> <?= $value->apellido_materno ?></option>
                  <?php } ?>
              </select>
            </div>
          </div>
          <?php foreach ($permisos as $key => $value): $aux='';?>
          <div class="form-row">
            <div class="col">
              <label for="validationCustom01">Modulo</label>
              <input type="text" class="form-control" name="" value="<?= $value->leyenda ?>" disabled>
              <input type="hidden" class="form-control" name="ctl_permisos_idctl_permisos[]"
                value="<?= $value->idctl_permisos ?>" readonly>
            </div>
            <div class="col">
              <label for="validationCustom01">Permiso</label>
              <?php foreach ($usuario->permisos as $key2 => $value2) {
                if($value2->ctl_permisos_idctl_permisos==$value->idctl_permisos)
                    $aux=$value2->ctl_tipo_permiso_idctl_tipo_permiso;
                } ?>
              <select name="ctl_tipo_permiso_idctl_tipo_permiso[]" class="form-control">
                <option value="0">Seleccione...</option>
                <option <?= ($aux=='1') ? 'selected' : null ?> value="1">Lectura</option>
                <option <?= ($aux=='2') ? 'selected' : null ?> value="2">Escritura</option>
                <option <?= ($aux=='3') ? 'selected' : null ?> value="3">Edición</option>
              </select>
            </div>
          </div>
          <?php endforeach ?>
          <?= form_hidden('id',$id) ?>
          <?= form_hidden('token',$token) ?>
          <button class="btn btn-primary" type="submit">Editar</button>
        </form>

        <br>
        <hr>

        <form class="needs-validation" novalidate action="<?= base_url()?>root/actualizarEncargados" method="post">                  
          <?php foreach ($almacenes as $key => $value): $aux2=0;?>
          <div class="form-row">
            <div class="col">
              <label for="validationCustom01">Almacén</label>
              <input type="text" class="form-control" name="" value="<?= $value->almacen ?>" disabled>
              <input type="hidden" class="form-control" name="idtbl_almacenes[]"
                value="<?= $value->idtbl_almacenes ?>" readonly>
            </div>
            <div class="col">
              <label for="validationCustom01">Encargado</label>
              <select name="tbl_encargado_almacen[]" class="form-control">
                <?php if($encargado_almacen->permisos){ ?>
              <?php foreach ($encargado_almacen->permisos as $key2 => $value2) { ?>                
              <?php if ($value2->tbl_almacenes_idtbl_almacenes==$value->idtbl_almacenes) { ?>
                <option value="1" selected>Si</option>
                <option value="0">No</option>
                <?php } else { ?>
                  <option value="1">Si</option>
                  <option value="0" selected>No</option>
                <?php } ?>
                  <?php } ?>
                  <?php }else{ ?>
                    <option value="1">Si</option>
                    <option value="0" selected>No</option>
                    <?php } ?>
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