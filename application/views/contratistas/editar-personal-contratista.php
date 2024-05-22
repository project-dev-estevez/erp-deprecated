
  
  <section class="forms">   
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Editar Personal</h3>
        </div>
        <div class="card-body">
          <div class="over"></div>
          <div class="spinner" style="display: none">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
          </div>
          <?php $get = $this->uri->uri_to_assoc(); ?>
          <?= validation_errors('<span class="error text-danger pb-2">', '</span>'); ?>
          <?= form_open_multipart('contratistas/actualizar-personal', 'class="grid-form needs-validation" novalidate'); ?>
            <fieldset>
              <legend>Datos personales</legend>

              <div data-row-span="7">
                
                <div data-field-span="3">
                  <label>Nombre(s)*</label>
                  <input type="text" name="nombres" required maxlength="150" value="<?= set_value('nombres',$detalle->nombres)?>">
                </div> 
                <div data-field-span="2">
                  <label>Apellido paterno*</label>
                  <input type="text" name="apellido_paterno" required maxlength="100" value="<?= set_value('apellido_paterno',$detalle->apellido_paterno)?>">
                </div>
                <div data-field-span="2">
                  <label>Apellido materno*</label>
                  <input type="text" name="apellido_materno" required maxlength="100" value="<?= set_value('apellido_materno',$detalle->apellido_materno)?>">
                </div>
              </div>
              <div data-row-span="9">
                <div data-field-span="2">
                  <label>Sexo*</label>
                  <label><input type="radio" name="sexo" value="FEMENINO" <?= ($detalle->sexo=='FEMENINO') ? 'checked' : NULL ?> required> Femenino</label> &nbsp;
                  <label><input type="radio" name="sexo" value="MASCULINO" <?= ($detalle->sexo=='MASCULINO') ? 'checked' : NULL ?> required> Masculino</label> &nbsp;
                </div>
                <div data-field-span="2">
                  <label>Fecha de Nacimiento*</label>
                  <input type="date" name="fecha_nacimiento" required value="<?= set_value('fecha_nacimiento', $detalle->fecha_nacimiento)?>">
                </div>
                <div data-field-span="2">
                  <label>Nacionalidad*</label>
                  <input type="text" name="nacionalidad" required maxlength="150" value="<?= set_value('nacionalidad', $detalle->nacionalidad)?>">
                </div>
                <div data-field-span="3">
                  <label>Lugar de Nacimiento</label>
                  <input type="text" name="lugar_nacimiento" maxlength="150" value="<?= set_value('lugar_nacimiento', $detalle->lugar_nacimiento)?>">
                </div>
              </div>

              <div data-row-span="6">
                <div data-field-span="3">
                  <label>Estado Civil*</label>
                  <label><input type="radio" name="estado_civil" value="SOLTERO" <?= ($detalle->estado_civil=='SOLTERO') ? 'checked' : NULL ?> required> Soltero</label> &nbsp;
                  <label><input type="radio" name="estado_civil" value="CASADO" <?= ($detalle->estado_civil=='CASADO') ? 'checked' : NULL ?> required> Casado</label> &nbsp;
                  <label><input type="radio" name="estado_civil" value="UNION LIBRE" <?= ($detalle->estado_civil=='UNION LIBRE') ? 'checked' : NULL ?> required> Unión Libre</label> &nbsp;

                  <label><input type="radio" name="estado_civil" value="DIVORCIADO" <?= ($detalle->estado_civil=='DIVORCIADO') ? 'checked' : NULL ?> required> Divorciado</label> &nbsp;
                  <label><input type="radio" name="estado_civil" value="SEPARADO" <?= ($detalle->estado_civil=='SEPARADO') ? 'checked' : NULL ?> required> Separado</label> &nbsp;
                  <label><input type="radio" name="estado_civil" value="VIUDO" <?= ($detalle->estado_civil=='VIUDO') ? 'checked' : NULL ?> required> Viudo</label> &nbsp;


                </div>
                <div data-field-span="2">
                  <label>Nombre de Pareja</label>
                  <input type="text" name="nombre_pareja" maxlength="150" value="<?= set_value('nombre_pareja', $detalle->nombre_pareja)?>">
                </div>
                <div data-field-span="1">
                  <label>Hijos</label>
                  <input type="number" name="hijos" min="0" value="<?= set_value('hijos', $detalle->hijos)?>">
                </div>
              </div>

              <div data-row-span="6">
                <div data-field-span="1">
                  <label>RFC*</label>
                  <input type="text" name="rfc" required maxlength="13" value="<?= set_value('rfc', $detalle->rfc)?>">
                </div>
                <div data-field-span="2">
                  <label>CURP*</label>
                  <input type="text" name="curp" required minlength="18" maxlength="18" value="<?= set_value('curp', $detalle->curp)?>">
                </div> 
                <div data-field-span="1">
                  <label>NSS*</label>
                  <input type="text" name="nss" required maxlength="50" value="<?= set_value('nss', $detalle->nss)?>">
                </div>
                <div data-field-span="1">
                  <label>Clave Elector*</label>
                  <input type="text" name="clave_elector" required maxlength="50" value="<?= set_value('clave_elector', $detalle->clave_elector)?>">
                </div>
                <div data-field-span="1">
                  <label>Número de Licencia</label>
                  <input type="text" name="numero_licencia" maxlength="50" value="<?= set_value('numero_licencia', $detalle->numero_licencia)?>">
                </div>
              </div>


              <div data-row-span="2">
                <div data-field-span="1">
                  <label>E-mail Personal</label>
                  <input type="email" name="email_personal" maxlength="100" value="<?= set_value('email_personal', $detalle->email_personal)?>">
                </div>
                <div data-field-span="1">
                  <label>E-mail Institucional</label>
                  <input type="email" name="email_institucional" maxlength="100" value="<?= set_value('email_institucional', $detalle->email_institucional)?>">
                </div>
              </div>

              <div data-row-span="3">
                <div data-field-span="1">
                  <label>Teléfono Celular</label>
                  <input type="text" name="telefono" maxlength="20" value="<?= set_value('telefono', $detalle->telefono)?>">
                </div>
                <div data-field-span="1">
                  <label>Teléfono Fijo</label>
                  <input type="text" name="telefono_fijo" maxlength="20" value="<?= set_value('telefono_fijo', $detalle->telefono_fijo)?>">
                </div>
                <div data-field-span="1">
                  <label>Teléfono Empresa</label>
                  <input type="text" name="telefono_empresa" maxlength="20" value="<?= set_value('telefono_empresa', $detalle->telefono_empresa)?>">
                </div>
              </div>
              <div data-row-span="4">
                <div data-field-span="3">
                  <label>Persona de contacto en caso de emergencia*</label>
                  <input type="text" name="persona_contacto" required maxlength="150" value="<?= set_value('persona_contacto', $detalle->persona_contacto)?>">
                </div>
                <div data-field-span="1">
                  <label>Teléfono de emergencia*</label>
                  <input type="text" name="telefono_emergencia" required maxlength="20" value="<?= set_value('telefono_emergencia', $detalle->telefono_emergencia)?>">
                </div>
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Grado Estudios*</label>
                  <select name="ctl_escolaridad_idctl_escolaridad" required>
                    <option value="" disabled="disabled"
                    <?php if ($detalle->ctl_escolaridad_idctl_escolaridad==NULL): ?>
                    selected="selected"  
                    <?php endif ?>
                    >Seleccione...</option>
                    <?php foreach ($escolaridad as $key => $value): ?>
                        <option value="<?= $value->id ?>" <?= ($detalle->ctl_escolaridad_idctl_escolaridad==$value->id) ? 'selected="selected"' : NULL ?>><?= $value->escolaridad ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div data-field-span="1">
                  <label>Titulo*</label>
                  <input type="text" name="estudios" required maxlength="150" value="<?= set_value('estudios', $detalle->estudios)?>">
                </div>
              </div>

              <br>
              <fieldset>
                <legend>Dirección</legend>
                <div data-row-span="5">
                  <div data-field-span="2">
                    <label>Calle*</label>
                    <input type="text" name="calle" required value="<?= set_value('calle', $detalle->calle)?>">
                  </div>
                  <div data-field-span="1">
                    <label>Número*</label>
                    <input type="text" name="numero" required value="<?= set_value('numero', $detalle->numero)?>">
                  </div>
                  <div data-field-span="2">
                    <label>Colonia*</label>
                    <input type="text" name="colonia" required value="<?= set_value('colonia', $detalle->colonia)?>">
                  </div>
                </div>
                <div data-row-span="3">
                  
                  <div data-field-span="1">
                    <label>Estado*</label>
                    <select name="estado" id="estado" required>
                    <option value="" disabled="disabled"
                    <?php if ($detalle->tbl_entidad_idtbl_entidad==NULL): ?>
                    selected="selected"  
                    <?php endif ?>
                    >Seleccione...</option>
                    <?php foreach ($estados as $key => $value): ?>
                        <option value="<?= $value->id ?>" <?= ($detalle->tbl_entidad_idtbl_entidad==$value->id) ? 'selected="selected"' : NULL ?> ><?= $value->estado ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                  <div data-field-span="1">
                    <label>Municipio*</label>
                    <select name="tbl_municipio_idtbl_municipio" required id="municipio">
                        <option value="" disabled="disabled"
                        <?php if ($detalle->idtbl_entidad==NULL): ?>
                        selected="selected"  
                        <?php endif ?>
                        >Seleccione...</option>
                        <?php if (isset($municipios)): ?>
                          
                        
                        <?php foreach ($municipios as $key => $value): ?>
                            <option value="<?= $value->id ?>" <?= ($detalle->tbl_municipio_idtbl_municipio==$value->id) ? 'selected="selected"' : NULL ?>><?= $value->municipio ?></option>
                        <?php endforeach ?>
                        <?php endif ?>
                  </select>
                  </div>
                  <div data-field-span="1">
                    <label>Código Postal*</label>
                    <input type="text" name="cp" required value="<?= set_value('cp', $detalle->cp)?>">
                  </div>
                </div>                
              </fieldset>
            </fieldset>
            <br>

            <fieldset>
              <legend>Datos Laborales</legend>
              <div data-row-span="1">
              <div data-field-span="1">
                  <label>Proyecto</label>
                  <?php $aux_grupo='' ?>
                  <select name="tbl_proyectos_idtbl_proyectos">
                      <option value="" disabled="disabled"
                      <?php if ($detalle->tbl_proyectos_idtbl_proyectos==NULL): ?>
                        selected="selected"  
                      <?php endif ?>
                      >Seleccione...</option>
                      <optgroup label="<?= $proyectos[0]->razon_social ?>">
                        <?php $aux_grupo=$proyectos[0]->tbl_clientes_idtbl_clientes ?>
                      <?php foreach ($proyectos as $key => $value): ?>                          
                            <?php if ($aux_grupo!=$value->tbl_clientes_idtbl_clientes): ?>
                            <?php $aux_grupo=$value->tbl_clientes_idtbl_clientes ?>
                            </optgroup>
                            <optgroup label="<?= $value->razon_social ?>">
                            <option value="<?= $value->idtbl_proyectos ?>" <?= ($detalle->tbl_proyectos_idtbl_proyectos==$value->idtbl_proyectos) ? 'selected="selected"' : NULL ?>><?= $value->numero_proyecto.' '.$value->nombre_proyecto ?></option>
<?php else: ?>
<option value="<?= $value->idtbl_proyectos ?>" <?= ($detalle->tbl_proyectos_idtbl_proyectos==$value->idtbl_proyectos) ? 'selected="selected"' : NULL ?>><?= $value->numero_proyecto.' '.$value->nombre_proyecto ?></option>
                        <?php endif ?>
                      <?php endforeach ?>
                       </optgroup>
                  </select>
                </div>
              </div>
             
              <div data-row-span="3">
                
                <div data-field-span="1">
                  <label>Contratista*</label>                  
                  <select name="tbl_contratistas_idtbl_contratistas" required>
                      <option value="" disabled="disabled"  
                      <?php if ($detalle->tbl_contratistas_idtbl_contratistas==NULL): ?>
                        selected="selected"  
                      <?php endif ?>>Seleccione...</option>
                      <?php foreach ($contratistas as $key => $value): ?>
                            <option value="<?= $value->idtbl_contratistas ?>" <?= ($detalle->tbl_contratistas_idtbl_contratistas==$value->idtbl_contratistas) ? 'selected="selected"' : NULL ?>><?= $value->nombre_comercial ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
                <div data-field-span="1">
                  <label>Puesto Contrato*</label>
                  <input type="text" name="puesto_contrato" maxlength="150" required value="<?= set_value('puesto_contrato', $detalle->puesto_contrato) ?>">
                </div>
                <div data-field-span="1">
                  <label>Permisos de almacen*</label>
                  <input type="radio" name="almacen" value="1" required <?php echo set_radio('almacen', '1', ($detalle->almacen=='1') ? true : null); ?>> &nbsp;<span class="label-check">Si</span>
                  <input type="radio" name="almacen" value="0" required <?php echo set_radio('almacen', '0', ($detalle->almacen=='0') ? true : null); ?>> &nbsp;<span class="label-check">No</span>
              </div>
              </div>
              <div data-row-span="2">
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">DC3</label>
                  <input type="file" name='dc3'>
                  <?php if(!empty($detalle->dc3)) { ?>
                    <a target="__blank" class="btn btn-primary" href="<?= base_url() ?>/uploads/dc3/<?= $detalle->dc3 ?>">Ver Archivo</a>
                  <?php } ?>
                </div>
              </div>
              <div data-field-span="1">
                <div class="form-group">
                  <label class="control-label">Credencial Estevez.Jor</label>
                  <input type="radio" name="credencial_estevez" value="1" <?php echo set_radio('credencial_estevez', '1', ($detalle->credencial_estevez=='1') ? true : null); ?>> &nbsp;<span class="label-check">Si</span>
                  <input type="radio" name="credencial_estevez" value="0" <?php echo set_radio('credencial_estevez', '0', ($detalle->credencial_estevez=='0') ? true : null); ?>> &nbsp;<span class="label-check">No</span>
                </div>
              </div>
            </div>
              
            </fieldset>

            <br><br>


            
            <div class="clearfix pt-md">
              <div class="pull-right">
                <a class="btn-default btn" href="<?= base_url() ?>contratistas">Cancelar</a>
                <?= form_hidden('token',$token) ?>
                <?= form_hidden('uid',$detalle->uid_usuario) ?>
                <?= form_hidden('estatus',$detalle->estatus) ?>
                <button type="submit" class="btn-primary btn">Actualizar</button>
              </div>
            </div>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </section>
