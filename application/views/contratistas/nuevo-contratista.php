<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nuevo Contratista</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <span class="text-danger mb-3"><?php echo validation_errors('<span class="error">', '</span>'); ?></span>
        <?php echo form_open_multipart('contratistas/guardar-contratista', 'class="grid-form needs-validation" novalidate onsubmit="return checkSubmit();"'); ?>
          <fieldset>
            <div data-row-span="5">
              <div data-field-span="3">
                <div class="form-group">
                  <label>Razón Social*</label>
                  <input type="text" name="razon_social" required value="<?php echo set_value('razon_social') ?>">
                </div>
              </div>
              <div data-field-span="2">
                <div class="form-group">
                  <label>RFC</label>
                  <input type="text" name="rfc" value="<?php echo set_value('rfc') ?>" onkeyup="this.value=this.value.toUpperCase()" maxlength="13">
                </div>
              </div>
            </div>
            <div data-row-span="3">
              <div data-field-span="2">
                <div class="form-group">
                  <label>Responsable*</label>
                  <input type="text" name="responsable" required minlength="4" value="<?php echo set_value('responsable') ?>">
                </div>
              </div>
              <div data-field-span="1">
                <div class="form-group">
                  <label>Estus*</label>
                  <select name="estatus" id="estatus" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="activo" <?php echo  set_select('estatus', 'activo'); ?>>Activo</option>
                    <option value="pausa" <?php echo  set_select('estatus', 'pausa'); ?>>Pausa</option>
                    <option value="proceso" <?php echo  set_select('estatus', 'proceso'); ?>>En proceso</option>
                    <option value="baja" <?php echo  set_select('estatus', 'baja'); ?>>Baja</option>
                  </select>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label>Nombre comercial*</label>
                  <input type="text" name="nombre_comercial" required value="<?php echo set_value('nombre_comercial') ?>">
                </div>
              </div>
            </div>
            <div data-row-span="4">
              <div data-field-span="2">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" name="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="<?php echo set_value('email') ?>">
                </div>
              </div>
              <div data-field-span="1">
                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="tel" class="form-control" name="telefono" pattern="[0-9]{10}" maxlength="10" value="<?php echo set_value('telefono') ?>">
                </div>
              </div>
              <div data-field-span="1">
                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="tel" class="form-control" name="telefono_2" pattern="[0-9]{10}" maxlength="12" value="<?php echo set_value('telefono_2') ?>">
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label>Dirección</label>
                  <textarea name="direccion" minlength="4"><?php echo set_value('direccion') ?></textarea>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">Contrato</label>
                  <input type="file" name='contrato'>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">Comprobante de Domicilio</label>
                  <input type="file" name='comprobante_domicilio'>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">INE</label>
                  <input type="file" name='ine'>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">32D IMSS</label>
                  <input type="file" name='d'>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">32D SAT</label>
                  <input type="file" name='sat'>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">CV</label>
                  <input type="file" name='cv'>
                </div>
              </div>
            </div>
          </fieldset>
          <br>
          <div class="clearfix pt-md">
            <div class="pull-right">
              <?= form_hidden('token',$token) ?>
              <a href="<?= base_url()?>contratistas" class="btn-warning btn">Cancelar</a>
              <button type="submit" id="button" class="btn-primary btn" onsubmit="">Enviar Datos</button>
            </div>
          </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>
<script>
  var statSend = false;
function checkSubmit() {
    if (!statSend) {
        statSend = true;
        return true;
    } else {
        //alert("El formulario ya se esta enviando...");
        return false;
    }
}
</script>
