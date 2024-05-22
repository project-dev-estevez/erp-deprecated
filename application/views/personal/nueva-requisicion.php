  
  <section class="forms">   
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Formato de Requisición de Personal </h3>
        </div>
        <div class="card-body">
          <div class="over"></div>
          <div class="spinner" style="display: none">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
          </div>
          <?php echo validation_errors('<span class="error">', '</span>'); ?>
          <?php echo form_open_multipart('usuarios/guardar-requisicion', 'class="grid-form needs-validation" novalidate'); ?>
          <fieldset>
              <legend>Especificaciones de la Requisición</legend>
              <div data-row-span="3">
                <div data-field-span="3">
                  <label>Tipo de puesto*</label>
                  <label><input type="radio" name="tipo_requisicion" onclick="tipo_puesto(this);" <?php echo  set_radio('tipo_requisicion', 'nuevo'); ?> value="nuevo" required> Puesto de Nueva Creación</label> &nbsp;
                  <label><input type="radio" name="tipo_requisicion" onclick="tipo_puesto(this);" <?php echo  set_radio('tipo_requisicion', 'reposicion', TRUE); ?> value="reposicion" required checked="checked"> Reposición de Personal</label> &nbsp;
                </div>               
              </div>
            </fieldset>
            <br><br>

            <fieldset>
              <legend>Definición  del Puesto</legend>
              <div id="nuevo-puesto">
                <div data-row-span="2">
                <div data-field-span="1">
                  <label>Departamento*</label>
                  <select name="departamento" required disabled>
                    <option value="" disabled="disabled" <?php echo  set_select('departamento', '', true); ?>>Seleccione...</option>
                    <?php foreach ($departamentos as $key => $value): ?>
                      <option value="<?php echo $value->id ?>" <?php echo  set_select('departamento', $value->id); ?>><?php echo $value->departamento ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div data-field-span="1">
                  <label>Nombre de nuevo perfil*</label>
                 <input type="text" name="nombre_nuevo_perfil" required disabled value="<?php echo set_value('nombre_nuevo_perfil') ?>">
                </div>
              </div>
              </div>
              <div id="reposicion-puesto">
                <div data-row-span="2">
                <div data-field-span="1">
                  <label>Motivo de la vacante*</label>
                  <select name="motivo_vacante" required>
                    <option value="" disabled="disabled" <?php echo  set_select('motivo_vacante', '', true); ?> >Seleccione...</option>
                    <?php foreach ($motivo_vacante as $key => $value): ?>
                      <option value="<?php echo $value->id ?>" <?php echo  set_select('motivo_vacante', $value->id); ?>><?php echo $value->motivo ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div data-field-span="1">
                  <label>Nombre de Persona a Sustituir*</label>
                  <input type="text" name="nombre_persona_sustituir" required value="<?php echo set_value('nombre_persona_sustituir') ?>">
                </div>              
                </div>
                <div data-row-span="2">
                <div data-field-span="1">
                  <label>Departamento*</label>
                  <select name="departamento" id="departamento" required>
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($departamentos as $key => $value): ?>
                      <option value="<?php echo $value->id ?>"><?php echo $value->departamento ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div data-field-span="1">
                  <label>Perfil*</label>
                  <select name="perfil" id="perfil" required>
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  </select>
                </div>
              </div>
              </div>
             
              <div data-row-span="3">
                 <div data-field-span="1">
                  <label>Número de vacantes*</label>
                  <input type="number" name="numero_vacantes" min="1" required value="<?php echo set_value('numero_vacantes') ?>">
                </div>
                <div data-field-span="1">
                  <label>Sueldo mensual*</label>
                  <input type="text" placeholder="$" name="sueldo" required value="<?php echo set_value('sueldo') ?>">
                </div>
                <div data-field-span="1">
                  <label>Tipo de Pago*</label>
                  <label><input type="radio" name="tipo_pago" value="s" required <?php echo  set_radio('tipo_pago', 's'); ?>> Semanal</label> &nbsp;
                  <label><input type="radio" name="tipo_pago" value="q" required <?php echo  set_radio('tipo_pago', 'q'); ?>> Quincenal</label> &nbsp;
                </div>
              </div>
              <div data-row-span="3">
                <div data-field-span="1">
                  <label>Tipo de contrato*</label>
                  <select name="tipo_contrato" required>
                    <option value="" disabled="disabled" <?php echo  set_select('tipo_contrato', '', true); ?> >Seleccione...</option>
                    <?php foreach ($contratos as $key => $value): ?>
                      <option value="<?php echo $value->id ?>" <?php echo  set_select('tipo_contrato', $value->id); ?>><?php echo $value->contrato ?></option>
                    <?php endforeach ?>
                  </select>                 
                </div>
                 <div data-field-span="1">
                  <label>Horario de jornada laboral*</label>
                  <input type="text" name="horario" required value="<?php echo set_value('horario') ?>">
                </div>
                <div data-field-span="1">
                  <label>IMSS*</label>
                  <label><input type="radio" name="imss" value="1" required <?php echo  set_radio('imss', '1'); ?>> Aplica</label> &nbsp;
                  <label><input type="radio" name="imss" value="0" required <?php echo  set_radio('imss', '0'); ?>> No aplica</label> &nbsp;
                </div>
              </div>
              <div data-row-span="1">
                <div data-field-span="1">
                  <label>Proyecto*</label>
                  <?php $razon_social='' ?>
                  <select name="proyecto" required="required">
                      <option value="" disabled="disabled" <?php echo  set_select('proyecto', '', true); ?>>Seleccione...</option>
                      <optgroup label="<?php echo $proyectos[0]->razon_social ?>">
                        <?php $razon_social=$proyectos[0]->razon_social ?>
                      <?php foreach ($proyectos as $key => $value): ?>

                            <option value="<?php echo $value->idtbl_proyectos ?>" <?php echo  set_select('proyecto', $value->idtbl_proyectos); ?>><?php echo $value->numero_proyecto.' '.$value->nombre_proyecto ?></option>

                        <?php if ($razon_social!=$value->razon_social): ?>
                            <?php $razon_social==$value->razon_social ?>
                            </optgroup>
                            <optgroup label="<?php echo $value->razon_social ?>">
                        <?php endif ?>
                      <?php endforeach ?>
                       </optgroup>
                  </select>
                </div>
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Rango Edad</label>
                  <input type="text" name="rango_edad" value="<?php echo set_value('rango_edad') ?>">
                </div>
                 <div data-field-span="1">
                  <label>Años de Experiencia</label>
                  <input type="number" name="anios_experiencia" value="0" min="0" value="<?php echo set_value('anios_experiencia') ?>">
                </div>               
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Sexo</label>
                  <label><input type="radio" name="sexo" value="m" required> Masculino</label> &nbsp;
                  <label><input type="radio" name="sexo" value="f" required> Femenino</label> &nbsp;
                  <label><input type="radio" name="sexo" value="n" required checked> No aplica</label> &nbsp;
                </div>
                <div data-field-span="1">
                  <label>Estado Civil</label>
                  <label><input type="radio" name="estado_civil" value="c" <?php echo  set_radio('estado_civil', 'c'); ?> required> Casado (a)</label> &nbsp;
                  <label><input type="radio" name="estado_civil" value="s" <?php echo  set_radio('estado_civil', 's'); ?> required> Soltero (a)</label> &nbsp;
                  <label><input type="radio" name="estado_civil" value="n" <?php echo  set_radio('estado_civil', 'n', TRUE); ?> required> No aplica</label> &nbsp;
                </div>
              </div>
               <div data-row-span="1">
                <div data-field-span="1">
                  <label>Funciones Generales del puesto</label>
                  <textarea name="funciones_generales" rows="5"><?php echo set_value('funciones_generales'); ?></textarea>
                </div>
              </div>
               <div data-row-span="2">
                <div data-field-span="1">
                  <label>Escolaridad*</label>
                  <select name="escolaridad">
                    <option value="" name="escolaridad" required disabled="disabled" <?php echo  set_select('escolaridad', '', true); ?>>Seleccione...</option>
                    <?php foreach ($escolaridad as $key => $value): ?>
                      <option value="<?php echo $value->id ?>" <?php echo  set_select('escolaridad', $value->id); ?>><?php echo $value->escolaridad ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div data-field-span="1">
                  <label>Especialidad</label>
                  <input type="text" name="especialidad" value="<?php echo set_value('especialidad') ?>">
                </div>
              </div>
               <div data-row-span="2">
                <div data-field-span="1">
                  <label>Manejo de Equipo y/o maquinaria</label>
                  <input type="text" value="<?php echo set_value('manejo_equipo_computo') ?>" name="manejo_equipo_computo"  data-role="tagsinput" >
                </div>
                <div data-field-span="1">
                  <label>Ofimática</label>
                  <input type="text" value="<?php echo set_value('ofimatica') ?>" name="ofimatica" data-role="tagsinput" >
                </div>
              </div>

            </fieldset>
            <br><br>
            <fieldset>
              <legend>Equipo requerido</legend>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Equipo de protección Personal (EPP)</label>
                  <input type="text" value="<?php echo set_value('epp') ?>" name="epp" data-role="tagsinput" >
                </div>
                <div data-field-span="1">
                  <label>Uniforme</label>
                  <input type="text" value="<?php echo set_value('uniforme') ?>" name="uniforme" data-role="tagsinput" >
                </div>
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Equipo de Computo</label>
                  <input type="text" value="<?php echo set_value('equipo_computo') ?>" name="equipo_computo" data-role="tagsinput" >
                </div>
                <div data-field-span="1">
                  <label>Equipo celular</label>
                  <input type="text" value="<?php echo set_value('equipo_celular') ?>" name="equipo_celular" data-role="tagsinput" >
                </div>
              </div>

               <div data-row-span="1">
                <div data-field-span="1">
                  <label>Archivo adjunto</label>
                  <input type="file" name="archivo_adjunto" value="" placeholder="">
                </div>
              </div>

                <div data-field-span="1" style="height: 56px;">
                 <br><br>
                  <label>&#8226; Los nuevos puestos, requieren ser autorizados previamente por Dirección, el proceso para cobertura inicia a partir de que se recaba la firma de Autorización.</label>
                  <label>&#8226; Las solicitudes con propuesta de candidato, deberán anexar una copia legible y en buen estado de curriculum.</label>
                </div>
              
            </fieldset>
            
            <br>

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

  <script src="<?php echo base_url() ?>js/bootstrap-tagsinput.js"> </script>

  <script>
    $(document).on("keypress", "form", function(event) { 
      return event.keyCode != 13;
    });

    
    function tipo_puesto(radio) {
      if(radio.value=="nuevo"){
        $('#reposicion-puesto').hide(500).find('input, select').attr('disabled', 'disabled');
        $('#nuevo-puesto').show(500).find('input, select').removeAttr('disabled');
      }else{
        $('#reposicion-puesto').show(500).find('input, select').removeAttr('disabled');
        $('#nuevo-puesto').hide(500).find('input, select').attr('disabled', 'disabled');
      }
    }

  </script>
