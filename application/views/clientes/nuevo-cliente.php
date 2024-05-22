  
  <section class="forms">   
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Nuevo Cliente</h3>
        </div>
        <div class="card-body">
          <div class="over"></div>
          <div class="spinner" style="display: none">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
          </div>
          <span class="text-danger mb-3"><?php echo validation_errors('<span class="error">', '</span>'); ?></span>
          <?php echo form_open('clientes/guardar_cliente', 'class="grid-form needs-validation" novalidate'); ?>
            <fieldset>
              <legend>Datos de cliente</legend>

              <div data-row-span="5">
                <div data-field-span="3">
                  <label>Razón Social*</label>
                  <input type="text" name="razon_social" required value="<?php echo set_value('razon_social') ?>">
                </div>
                <div data-field-span="2">
                  <label>RFC*</label>
                  <input type="text" name="rfc" required value="<?php echo set_value('rfc') ?>" onkeyup="this.value=this.value.toUpperCase()" maxlength="13">
                </div>
              </div>
              <div data-row-span="1">
                <div data-field-span="1">
                  <label>Nombre comercial</label>
                  <input type="text" name="nombre_comercial" value="<?php echo set_value('nombre_comercial') ?>">
                </div>
               
              </div>
              <div data-row-span="4">
                <div data-field-span="2">
                  <label>E-mail</label>
                  <input type="email" name="email" value="<?php echo set_value('email') ?>">
                </div>
                <div data-field-span="1">
                  <label>Teléfono</label>
                  <input type="text" name="telefono" value="<?php echo set_value('telefono') ?>">
                </div>
                <div data-field-span="1">
                  <label>Teléfono</label>
                  <input type="text" name="telefono_2" value="<?php echo set_value('telefono_2') ?>">
                </div>
              </div>
               <div data-row-span="1">
                  <div data-field-span="1">
                    <label>Dirección</label>
                    <textarea name="direccion"><?php echo set_value('direccion') ?></textarea>
                  </div>
              <br>
             
            </fieldset>
            <br><br>
            <div class="clearfix pt-md">
              <div class="pull-right">
                <?= form_hidden('token',$token) ?>
                <button type="submit" class="btn-primary btn">Enviar Datos</button>
              </div>
            </div>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </section>
