
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <?php if($this->session->userdata('password') != '12345678') { ?>
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Estevez.Jor</h1>
                  </div>
                  <p>Sistema para gestión de almacen.</p><br>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <?= form_open(base_url().'login/iniciar_sesion') ?>
                    <div class="form-group">
                      <input id="login-username" type="text" name="username" required="" class="input-material">
                      <label for="login-username" class="label-material">Nombre de Usuario</label>
                      <small class="form-text text-danger"><?=form_error('username')?></small>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required="" class="input-material">
                      <label for="login-password" class="label-material">Contraseña</label>
                      <small class="form-text text-danger"><?=form_error('password')?></small>
                    </div>
                    <input type="submit" name="" value="Ingresar" class="btn btn-primary">
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                    <?= form_hidden('token',$token) ?>
                  <?=form_close()?>
                  <small class="form-text text-danger">
                    <?php if ($this->session->flashdata('usuario_incorrecto')): ?>
                    <?php echo $this->session->flashdata('usuario_incorrecto') ?>
                  <?php endif ?></small>
                  <small class="forgot-pass">Si olvido su contraseña pongase en contacto con <a href="mailto:soporte@estevezjor.mx?subject=Olvide mi contraseña">soporte@estevezjor.mx</a></small><br>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://jadevelopers.com.mx?from=estevezjorapp" target="_blank" class="external">JADEVELOPERS</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>