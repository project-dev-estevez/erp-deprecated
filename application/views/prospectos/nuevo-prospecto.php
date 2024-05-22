<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nuevo Prospecto</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <?= validation_errors('<span class="text-danger">', '</span>'); ?>
        <?= form_open(base_url().'vacantes/prospectos/nuevo/'.$this->uri->segment(4), 'class="grid-form needs-validation" novalidate'); ?>
          <fieldset>
            <legend>Datos personales</legend>
            <div data-row-span="2">
              <div data-field-span="1">
                <label>Nombre(s)*</label>
                <input type="text" name="nombres" required value="<?= set_value('nombres') ?>">
              </div>
              <div data-field-span="1">
                <label>Apellidos*</label>
                <input type="text" name="apellidos" required value="<?= set_value('apellidos') ?>">
              </div>
            </div>
            <div data-row-span="4">
              <div data-field-span="2">
                <label>E-mail</label>
                <input type="email" name="email" required value="<?= set_value('email') ?>">
              </div>
              <div data-field-span="1">
                <label>Fecha de Nacimiento*</label>
                <input type="date" name="fecha_nacimiento" max="<?php $anio=date('Y')-18; echo $anio.'-'.date('m-d');?>" required value="<?= set_value('fecha_nacimiento') ?>">
              </div>
              <div data-field-span="1">
                <label>Teléfono*</label>
                <input type="text" name="telefono" maxlength="15" required value="<?= set_value('telefono') ?>">
              </div>
            </div>
            <br>
            <fieldset>
              <legend>Dirección</legend>
              <div data-row-span="1">
                <div data-field-span="1">
                  <label>Dirección*</label>
                  <textarea name="direccion" required minlength="10"><?= set_value('direccion') ?></textarea>
                </div>
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Estado*</label>
                  <select name="estado" id="estado" required>
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php foreach ($estados as $key => $value): ?>
                    <option value="<?= $value->id ?>"><?= $value->estado ?></option>
                  <?php endforeach ?>
                </select>
                </div>
                <div data-field-span="1">
                  <label>Municipio*</label>
                  <select name="municipio" required id="municipio">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                </select>
                </div>
              </div>
            </fieldset>
          </fieldset>
          <br>
          <fieldset>
            <legend>Detalles</legend>
            <div data-row-span="3">
              <div data-field-span="1">
                <label>Escolaridad*</label>
                <select name="escolaridad" id="escolaridad" required>
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <option value="Primria">Primaria</option>
                  <option value="Secundaria">Secundaria</option>
                  <option value="Preparatoria o Bachillerato">Preparatoria o Bachillerato</option>
                  <option value="Licenciatura">Licenciatura</option>
                  <option value="Posgrado">Posgrado</option>
                </select>
              </div>
              <div data-field-span="1">
                <label>Especialidad</label>
                <input type="text" name="especialidad" value="<?= set_value('especialidad')?>">
              </div>
              <div data-field-span="1">
                <label>Fecha de Entrevista*</label>
                <input type="datetime-local" name="fecha_entrevista" required value="<?= set_value('fecha_entrevista')?>">
              </div>
            </div>
          </fieldset>
          <br><br>
          <div class="clearfix pt-md">
            <div class="pull-right">
              <?php $link=preg_split("/-/",$this->uri->segment(4),2); ?>
              <a href="<?= base_url()?>vacantes/prospectos/<?= $link[0]?>" class="btn-default btn">Cancelar</a>
              <?= form_hidden('token',$token) ?>
              <button type="submit" class="btn-primary btn">Enviar Datos</button>
            </div>
          </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>
