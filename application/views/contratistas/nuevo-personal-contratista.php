
  
  <section class="forms">   
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Nuevo Personal Contratista</h3>
        </div>
        <div class="card-body">
          <div class="over"></div>
          <div class="spinner" style="display: none">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
          </div>
          <?php $get = $this->uri->uri_to_assoc(); ?>
          <?php echo validation_errors('<p class="text-danger">*Adjunte sus archivos nuevamente.</p><p class="text-danger">', '</p>'); ?>
          <?= form_open('contratistas/guardar-personal', 'class="grid-form needs-validation" novalidate'); ?>
            <fieldset>
              <legend>Datos personales</legend>

              <div data-row-span="7">
                <div data-field-span="3">
                  <label>Nombre(s)*</label>
                  <input type="text" name="nombres" required maxlength="150" value="<?= set_value('nombres') ?>">
                </div> 
                <div data-field-span="2">
                  <label>Apellido paterno*</label>
                  <input type="text" name="apellido_paterno" required maxlength="100" value="<?= set_value('apellido_paterno') ?>">
                </div>
                <div data-field-span="2">
                  <label>Apellido materno*</label>
                  <input type="text" name="apellido_materno" required maxlength="100" value="<?= set_value('apellido_materno') ?>">
                </div>
              </div>
              <div data-row-span="9">
                <div data-field-span="2">
                  <label>Sexo*</label>
                   <input type="radio" name="sexo" value="FEMENINO" required <?php echo set_radio('sexo', 'FEMENINO'); ?>> &nbsp;<span class="label-check">Femenino</span>
                   <input type="radio" name="sexo" value="MASCULINO" required <?php echo set_radio('sexo', 'MASCULINO'); ?>> &nbsp;<span class="label-check">Masculino</span>
                </div>
                <div data-field-span="2">
                  <label>Fecha de Nacimiento*</label>
                  <input type="date" name="fecha_nacimiento" required value="<?= set_value('fecha_nacimiento') ?>">
                </div>
                <div data-field-span="2">
                  <label>Nacionalidad*</label>
                  <input type="text" name="nacionalidad" required maxlength="150" value="<?= set_value('nacionalidad') ?>">
                </div>
                <div data-field-span="3">
                  <label>Lugar de Nacimiento</label>
                  <input type="text" name="lugar_nacimiento" maxlength="150" value="<?= set_value('lugar_nacimiento') ?>">
                </div>
              </div>

              <div data-row-span="6">
                <div data-field-span="3">
                  <label>Estado Civil*</label>
                  <input type="radio" name="estado_civil" <?php echo set_radio('estado_civil', 'SOLTERO'); ?> value="SOLTERO" required> &nbsp;<span class="label-check">Soltero</span>
                  <input type="radio" name="estado_civil" <?php echo set_radio('estado_civil', 'CASADO'); ?> value="CASADO" required> &nbsp;<span class="label-check">Casado</span>
                  <input type="radio" name="estado_civil" <?php echo set_radio('estado_civil', 'UNION LIBRE'); ?> value="UNION LIBRE" required> &nbsp;<span class="label-check">Unión Libre</span>
                  <input type="radio" name="estado_civil" <?php echo set_radio('estado_civil', 'DIVORCIADO'); ?> value="DIVORCIADO" required> &nbsp;<span class="label-check">Divorciado</span>
                  <input type="radio" name="estado_civil" <?php echo set_radio('estado_civil', 'SEPARADO'); ?> value="SEPARADO" required> &nbsp;<span class="label-check">Separado</span>
                  <input type="radio" name="estado_civil" <?php echo set_radio('estado_civil', 'VIUDO'); ?> value="VIUDO" required> &nbsp;<span class="label-check">Viudo</span>
                </div>
                <div data-field-span="2">
                  <label>Nombre de Pareja</label>
                  <input type="text" name="nombre_pareja" maxlength="150" value="<?= set_value('nombre_pareja') ?>">
                </div>
                <div data-field-span="1">
                  <label>Hijos</label>
                  <input type="number" name="hijos" min="0" value="<?= set_value('hijos') ?>">
                </div>
              </div>

              <div data-row-span="6">
                <div data-field-span="1">
                  <label>RFC*</label>
                  <input type="text" name="rfc" required maxlength="13" value="<?= set_value('rfc') ?>">
                </div>
                <div data-field-span="2">
                  <label>CURP*</label>
                  <input type="text" name="curp" required maxlength="50" value="<?= set_value('curp') ?>">
                </div> 
                <div data-field-span="1">
                  <label>NSS*</label>
                  <input type="text" name="nss" required maxlength="50" value="<?= set_value('nss') ?>">
                </div>
                <div data-field-span="1">
                  <label>Clave Elector*</label>
                  <input type="text" name="clave_elector" required maxlength="50" value="<?= set_value('clave_elector') ?>">
                </div>
                <div data-field-span="1">
                  <label>Número de Licencia</label>
                  <input type="text" name="numero_licencia" maxlength="50" value="<?= set_value('numero_licencia') ?>">
                </div>
              </div>

              <div data-row-span="2">
                <div data-field-span="1">
                  <label>E-mail Personal</label>
                  <input type="email" name="email_personal" maxlength="100" value="<?= set_value('email_personal') ?>">
                </div>
                <div data-field-span="1">
                  <label>E-mail Institucional</label>
                  <input type="email" name="email_institucional" maxlength="100" value="<?= set_value('email_institucional') ?>">
                </div>
              </div>

              <div data-row-span="3">
                <div data-field-span="1">
                  <label>Teléfono Celular</label>
                  <input type="text" name="telefono" maxlength="20" value="<?= set_value('telefono') ?>">
                </div>
                <div data-field-span="1">
                  <label>Teléfono Fijo</label>
                  <input type="text" name="telefono_fijo" maxlength="20" value="<?= set_value('telefono_fijo')?>">
                </div>
                <div data-field-span="1">
                  <label>Teléfono Empresa</label>
                  <input type="text" name="telefono_empresa" maxlength="20" value="<?= set_value('telefono_empresa')?>">
                </div>
              </div>
              <div data-row-span="4">
                <div data-field-span="3">
                  <label>Persona de contacto en caso de emergencia*</label>
                  <input type="text" name="persona_contacto" required maxlength="150" value="<?= set_value('persona_contacto')?>">
                </div>
                <div data-field-span="1">
                  <label>Teléfono de emergencia*</label>
                  <input type="text" name="telefono_emergencia" required maxlength="20" value="<?= set_value('telefono_emergencia') ?>">
                </div>
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Grado Estudios*</label>
                  <select name="ctl_escolaridad_idctl_escolaridad" required>
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($escolaridad as $key => $value): ?>
                        <option value="<?= $value->id ?>"><?= $value->escolaridad ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div data-field-span="1">
                  <label>Titulo*</label>
                  <input type="text" name="estudios" required maxlength="150" value="<?= set_value('estudios') ?>">
                </div>
              </div>

              <br>
              <fieldset>
                <legend>Dirección</legend>
                <div data-row-span="5">
                  <div data-field-span="2">
                    <label>Calle*</label>
                    <input type="text" name="calle" required value="<?= set_value('calle') ?>">
                  </div>
                  <div data-field-span="1">
                    <label>Número*</label>
                    <input type="text" name="numero" required value="<?= set_value('numero') ?>">
                  </div>
                  <div data-field-span="2">
                    <label>Colonia*</label>
                    <input type="text" name="colonia" required value="<?= set_value('colonia') ?>">
                  </div>
                </div>
                <div data-row-span="3">
                  
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
                    <select name="tbl_municipio_idtbl_municipio" required id="municipio">
                        <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  </select>
                  </div>
                  <div data-field-span="1">
                    <label>Código Postal*</label>
                    <input type="text" name="cp" required value="<?= set_value('cp') ?>">
                  </div>
                </div>                
              </fieldset>
            </fieldset>
            <br>

            <fieldset>
              <legend>Datos Laborales</legend>

              
              <div data-row-span="3">
                
                <div data-field-span="2">
                  <label>Proyecto</label>
                  <?php $razon_social='' ?>
                  
                  <select name="tbl_proyectos_idtbl_proyectos">
                      <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                      <optgroup label="<?= $proyectos[0]->razon_social ?>">
                        <?php $razon_social=$proyectos[0]->tbl_clientes_idtbl_clientes ?>
                      <?php foreach ($proyectos as $key => $value): ?>

                            <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto.' '.substr($value->nombre_proyecto,0,70) ?></option>

                        <?php if ($razon_social!=$value->tbl_clientes_idtbl_clientes): ?>
                            <?php $razon_social=$value->tbl_clientes_idtbl_clientes ?>
                            </optgroup>
                            <optgroup label="<?= $value->razon_social ?>">
                        <?php endif ?>
                      <?php endforeach ?>
                       </optgroup>
                  </select>
                </div>
                <div data-field-span="1" style="height: auto;" class="">
                  <label>Fecha de Ingreso*</label>
                  <input type="date" name="fecha_ingreso" required="" value="">
                </div>
              </div>
              <div data-row-span="3">
                
                <div data-field-span="1">
                  <label>Contratista*</label>                  
                  <select name="tbl_contratistas_idtbl_contratistas" required>
                      <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                      <?php foreach ($contratistas as $key => $value): ?>
                            <option value="<?= $value->idtbl_contratistas ?>"><?= $value->nombre_comercial ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
                <div data-field-span="1">
                  <label>Puesto Contrato*</label>
                  <input type="text" name="puesto_contrato" maxlength="150" required value="<?= set_value('puesto_contrato') ?>">
                </div>
                <div data-field-span="1">
                  <label>Permisos de almacen*</label>
                  <input type="radio" name="almacen" value="1" required <?php echo set_radio('almacen', '1'); ?>> &nbsp;<span class="label-check">Si</span>
                  <input type="radio" name="almacen" value="0" required <?php echo set_radio('almacen', '0', true); ?>> &nbsp;<span class="label-check">No</span>
              </div>
              </div>
              <div data-row-span="1">
                <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">Credencial Estevez.Jor</label>
                  <input type="radio" name="credencial_estevez" value="1"> &nbsp;<span class="label-check">Si</span>
                  <input type="radio" name="credencial_estevez" value="0"> &nbsp;<span class="label-check">No</span>
                </div>
              </div>
              </div>
              
              
            </fieldset>

            <br><br>


            
            <div class="clearfix pt-md">
              <div class="pull-right">
                <button class="btn-default btn">Cancelar</button>
                <?= form_hidden('token',$token) ?>
                <button type="submit" class="btn-primary btn">Enviar Datos</button>
              </div>
            </div>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </section>
