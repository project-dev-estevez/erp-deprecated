<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Detalle Contratista</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <span class="text-danger mb-3"><?php echo validation_errors('<span class="error">', '</span>'); ?></span>
        <?php echo form_open_multipart('contratistas/actualizar-contratista', 'class="grid-form needs-validation" novalidate'); ?>
          <fieldset>
            <div data-row-span="5">
              <div data-field-span="3">
                <label>Razón Social*</label>
                <input type="text" name="razon_social" required value="<?php echo set_value('razon_social', $detalle->razon_social) ?>">
              </div>
              <div data-field-span="2">
                <label>RFC</label>
                <input type="text" name="rfc" value="<?php echo set_value('rfc', $detalle->rfc) ?>" onkeyup="this.value=this.value.toUpperCase()" maxlength="13">
              </div>
            </div>
             <div data-row-span="3">
              <div data-field-span="2">
                <label>Responsable*</label>
                <input type="text" name="responsable" required value="<?php echo set_value('responsable', $detalle->responsable) ?>">
              </div>
              <div data-field-span="1">
                <div class="form-group">
                  <label>Estus*</label>
                  <select name="estatus" id="estatus" class="form-control" required>
                    <option value="activo" <?= ($detalle->estatus == 'activo')? 'selected' : ''; ?>>Activo</option>
                    <option value="pausa" <?= ($detalle->estatus == 'pausa')? 'selected' : ''; ?>>Pausa</option>
                    <option value="proceso" <?= ($detalle->estatus == 'proceso')? 'selected' : ''; ?>>En proceso</option>
                    <option value="baja" <?= ($detalle->estatus == 'baja')? 'selected' : ''; ?>>Baja</option>
                  </select>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <label>Nombre comercial*</label>
                <input type="text" name="nombre_comercial" required value="<?php echo set_value('nombre_comercial', $detalle->nombre_comercial) ?>">
              </div>
            </div>
            <div data-row-span="4">
              <div data-field-span="2">
                <label>E-mail</label>
                <input type="email" name="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="<?php echo set_value('email', $detalle->email) ?>">
              </div>
              <div data-field-span="1">
                <label>Teléfono</label>
                <input type="tel" class="form-control" pattern="[0-9]{10}" maxlength="10" name="telefono" value="<?php echo set_value('telefono', $detalle->telefono) ?>">
              </div>
              <div data-field-span="1">
                <label>Teléfono</label>
                <input type="tel" class="form-control" pattern="[0-9]{10}" maxlength="10" name="telefono_adicional" value="<?php echo set_value('telefono_adicional', $detalle->telefono_adicional) ?>">
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <label>Dirección</label>
                <textarea name="direccion"><?php echo set_value('direccion', $detalle->direccion) ?></textarea>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">Contrato</label>
                  <input type="file" name='contrato'>
                  <?php if(!empty($detalle->contrato)) { ?>
                    <a target="__blank" class="btn btn-primary" href="<?= base_url() ?>/uploads/contratos/<?= $detalle->contrato ?>">Ver Archivo</a>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">Comprobante de Domicilio</label>
                  <input type="file" name='comprobante_domicilio'>
                  <?php if(!empty($detalle->comprobante_domicilio)) { ?>
                    <a target="__blank" class="btn btn-primary" href="<?= base_url() ?>/uploads/comprobantes_domicilio/<?= $detalle->comprobante_domicilio ?>">Ver Archivo</a>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">INE</label>
                  <input type="file" name='ine'>
                  <?php if(!empty($detalle->ine)) { ?>
                    <a target="__blank" class="btn btn-primary" href="<?= base_url() ?>/uploads/ines/<?= $detalle->ine ?>">Ver Archivo</a>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">32D IMSS</label>
                  <input type="file" name='d'>
                  <?php if(!empty($detalle->d)) { ?>
                    <a target="__blank" class="btn btn-primary" href="<?= base_url() ?>/uploads/32d/<?= $detalle->d ?>">Ver Archivo</a>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">32D SAT</label>
                  <input type="file" name='sat'>
                  <?php if(!empty($detalle->sat)) { ?>
                    <a target="__blank" class="btn btn-primary" href="<?= base_url() ?>/uploads/sat/<?= $detalle->sat ?>">Ver Archivo</a>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div data-row-span="1">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">CV</label>
                  <input type="file" name='cv'>
                  <?php if(!empty($detalle->cv)) { ?>
                    <a target="__blank" class="btn btn-primary" href="<?= base_url() ?>/uploads/cv/<?= $detalle->cv ?>">Ver Archivo</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="clearfix pt-md">
            <div class="pull-right">
              <?= form_hidden('token',$token) ?>
              <?= form_hidden('uid',$detalle->uid) ?>
              <a href="<?= base_url()?>contratistas" class="btn-warning btn">Cancelar</a>
              <button type="submit" class="btn-primary btn">Actualizar Contratista</button>
            </div>
          </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>
