  
  <section class="forms">   
    <div class="container-fluid">
      <?php if ($requisicion->estatus=='3'): ?>
        <div class="alert alert-danger" role="alert">
          Requisición Cancelada.
        </div>
      <?php endif ?>
      <?php if ($requisicion!=null): ?>
        <div class="card">
          <div class="card-body">
            <p>Fecha de creación - <?php echo strftime("%d de %b de %Y a las %T",strtotime($requisicion->fecha_creacion)) ?></p>
            <p>Fecha de autorización/cancelación - <?php echo ($requisicion->fecha_aprobacion_cancelacion != null) ? strftime("%d de %b de %Y a las %T",strtotime($requisicion->fecha_aprobacion_cancelacion)) : 'Pendiente' ?></p>
            <p>Fecha de finalización - <?php echo ($requisicion->fecha_finalizacion != null) ? strftime("%d de %b de %Y",strtotime($requisicion->fecha_finalizacion)) : 'Pendiente' ?></p>
          </div>
        </div>
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
          <?php echo form_open_multipart('usuarios/actualizar-requisicion', 'class="grid-form needs-validation" novalidate'); ?>
          <fieldset>
              <legend>Especificaciones de la Requisición</legend>
              <div data-row-span="3">
                <div data-field-span="3">
                  <label>Tipo de puesto*</label>
                  <label><input type="radio" name="tipo_requisicion" <?php echo  ($requisicion->tipo_requisicion=='nuevo') ? 'checked="checked"' : 'disabled' ?> value="nuevo"> Puesto de Nueva Creación</label> &nbsp;
                  <label><input type="radio" name="tipo_requisicion" <?php echo  ($requisicion->tipo_requisicion=='reposicion') ? 'checked="checked"' : 'disabled' ?> value="reposicion" > Reposición de Personal</label> &nbsp;
                </div>               
              </div>
            </fieldset>
            <br><br>

            <fieldset>
              <legend>Definición  del Puesto</legend>

              <?php if ($requisicion->tipo_requisicion=='nuevo'): ?>
              <div id="nuevo-puesto">
                <div data-row-span="2">
                <div data-field-span="1">
                  <label>Departamento*</label>
                  <input type="hidden" name="departamento" value="<?php echo $requisicion->tbl_departamentos_idtbl_departamentos ?>" >
                  <input type="text" readonly value="<?php echo $requisicion->departamento ?>" >
                </div>
                <div data-field-span="1">
                  <label>Nombre de nuevo perfil*</label>
                 <input type="text" name="nombre_nuevo_perfil" readonly value="<?php echo set_value('nombre_nuevo_perfil') ?>">
                </div>
              </div>
              </div>
              <?php endif ?>

              <?php if ($requisicion->tipo_requisicion=='reposicion'): ?>
              <div id="reposicion-puesto">
                <div data-row-span="2">
                <div data-field-span="1">
                  <label>Motivo de la vacante*</label>
                  <input type="hidden" name="motivo_vacante" value="<?php echo $requisicion->ctl_motivos_vacantes_idctl_motivos_vacantes ?>" >
                  <input type="text" readonly value="<?php echo $requisicion->motivo ?>" >
                </div>
                <div data-field-span="1">
                  <label>Nombre de Persona a Sustituir*</label>
                  <input type="text" name="nombre_persona_sustituir" readonly value="<?php echo $requisicion->nombre_sustituir ?>" >
                </div>              
                </div>
                <div data-row-span="2">
                <div data-field-span="1">
                  <label>Departamento*</label>
                  <input type="hidden" name="departamento" value="<?php echo $requisicion->tbl_departamentos_idtbl_departamentos ?>" >
                  <input type="text" readonly value="<?php echo $requisicion->departamento ?>" >
                </div>
                <div data-field-span="1">
                  <label>Perfil*</label>
                  <input type="hidden" name="perfil" value="<?php echo $requisicion->tbl_perfiles_idtbl_perfiles ?>" >
                  <input type="text" readonly value="<?php echo $requisicion->perfil ?>" >
                </div>
              </div>
              </div>
              <?php endif ?>
             
              <div data-row-span="3">
                 <div data-field-span="1">
                  <label>Número de vacantes*</label>
                  <input type="number" name="numero_vacantes" <?= ($requisicion->estatus==0 && $this->session->userdata('perfil')=='Dirección') ? null : 'readonly' ; ?> min="1" required value="<?php echo $requisicion->numero_vacantes ?>">
                </div>
                <div data-field-span="1">
                  <label>Sueldo mensual*</label>
                  <input type="text" placeholder="$" <?= ($requisicion->estatus==0 && $this->session->userdata('perfil')=='Dirección') ? null : 'readonly' ; ?> name="sueldo" required value="<?php echo $requisicion->sueldo_solicitado ?>">
                </div>
                <div data-field-span="1">
                  <label>Tipo de Pago*</label>
                  <label><input type="radio" name="tipo_pago" value="s" required <?php echo  ($requisicion->tipo_pago=='s') ? 'checked="checked"' : 'disabled' ?>> Semanal</label> &nbsp;
                  <label><input type="radio" name="tipo_pago" value="q" required <?php echo  ($requisicion->tipo_pago=='q') ? 'checked="checked"' : 'disabled' ?>> Quincenal</label> &nbsp;
                </div>
              </div>
              <div data-row-span="3">
                <div data-field-span="1">
                  <label>Tipo de contrato*</label>
                  <input type="hidden" name="tipo_contrato" value="<?php echo $requisicion->ctl_contratos_idctl_contratos ?>">
                  <input type="text" readonly value="<?php echo $requisicion->contrato ?>">
                </div>
                 <div data-field-span="1">
                  <label>Horario de jornada laboral*</label>
                  <input type="text" name="horario" readonly value="<?php echo $requisicion->horario ?>">
                </div>
                <div data-field-span="1">
                  <label>IMSS*</label>
                  <label><input type="radio" name="imss" value="1" required <?php echo  ($requisicion->imss=='1') ? 'checked="checked"' : 'disabled' ?>> Aplica</label> &nbsp;
                  <label><input type="radio" name="imss" value="0" required <?php echo  ($requisicion->imss=='0') ? 'checked="checked"' : 'disabled' ?>> No aplica</label> &nbsp;
                </div>
              </div>
              <div data-row-span="1">
                <div data-field-span="1">
                  <label>Proyecto*</label>
                  <input type="hidden" name="proyecto" value="<?php echo $requisicion->tbl_proyectos_idtbl_proyectos ?>">
                  <input type="text" readonly="readonly" value="<?php echo $requisicion->nombre_proyecto ?>">
                </div>
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Rango Edad</label>
                  <input type="text" name="rango_edad" readonly value="<?php echo $requisicion->rango_edad ?>">
                </div>
                 <div data-field-span="1">
                  <label>Años de Experiencia</label>
                  <input type="text" name="anios_experiencia" readonly min="0" value="<?php echo $requisicion->anios_experiencia ?>">
                </div>               
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Sexo</label>
                  <label><input type="radio" name="sexo" value="m" <?php echo  ($requisicion->sexo=='m') ? 'checked="checked"' : 'disabled' ?> > Masculino</label> &nbsp;
                  <label><input type="radio" name="sexo" value="f" <?php echo  ($requisicion->sexo=='f') ? 'checked="checked"' : 'disabled' ?> > Femenino</label> &nbsp;
                  <label><input type="radio" name="sexo" value="n" <?php echo  ($requisicion->sexo=='n') ? 'checked="checked"' : 'disabled' ?> > No aplica</label> &nbsp;
                </div>
                <div data-field-span="1">
                  <label>Estado Civil</label>
                  <label><input type="radio" name="estado_civil" value="c" <?php echo  ($requisicion->sexo=='c') ? 'checked="checked"' : 'disabled' ?> required> Casado (a)</label> &nbsp;
                  <label><input type="radio" name="estado_civil" value="s" <?php echo  ($requisicion->sexo=='s') ? 'checked="checked"' : 'disabled' ?> required> Soltero (a)</label> &nbsp;
                  <label><input type="radio" name="estado_civil" value="n" <?php echo  ($requisicion->sexo=='n') ? 'checked="checked"' : 'disabled' ?> required> No aplica</label> &nbsp;
                </div>
              </div>
               <div data-row-span="1">
                <div data-field-span="1">
                  <label>Funciones Generales del puesto</label>
                  <textarea name="funciones_generales" readonly rows="5"><?php echo $requisicion->descripcion ?></textarea>
                </div>
              </div>
               <div data-row-span="2">
                <div data-field-span="1">
                  <label>Escolaridad*</label>
                  <input type="hidden" name="escolaridad" value="<?php echo $requisicion->ctl_escolaridad_idctl_escolaridad ?>">
                  <input type="text" value="<?php echo $requisicion->escolaridad ?>" readonly="">
                </div>
                <div data-field-span="1">
                  <label>Especialidad</label>
                  <input type="text" name="especialidad" readonly="" value="<?php echo $requisicion->especialidad ?>">
                </div>
              </div>
               <div data-row-span="2">
                <div data-field-span="1">
                  <label>Manejo de Equipo y/o maquinaria</label>
                  <input type="text" value="<?php echo $requisicion->maquinaria ?>" readonly disabled name="manejo_equipo_computo"  data-role="tagsinput" >
                </div>
                <div data-field-span="1">
                  <label>Ofimática</label>
                  <input type="text" value="<?php echo $requisicion->maquinaria ?>" readonly disabled name="ofimatica" data-role="tagsinput" >
                </div>
              </div>

            </fieldset>
            <br><br>
            <fieldset>
              <legend>Equipo requerido</legend>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Equipo de protección Personal (EPP)</label>
                  <input type="text" <?= ($requisicion->estatus==0 && $this->session->userdata('perfil')=='Dirección') ? null : 'disabled readonly' ; ?> value="<?php echo $requisicion->epp ?>" name="epp" data-role="tagsinput" >
                </div>
                <div data-field-span="1">
                  <label>Uniforme</label>
                  <input type="text" <?= ($requisicion->estatus==0 && $this->session->userdata('perfil')=='Dirección') ? null : 'disabled readonly' ; ?> value="<?php echo $requisicion->uniforme ?>" name="uniforme" data-role="tagsinput" >
                </div>
              </div>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>Equipo de Computo</label>
                  <input type="text" <?= ($requisicion->estatus==0 && $this->session->userdata('perfil')=='Dirección') ? null : 'disabled readonly' ; ?> value="<?php echo $requisicion->equipo_computo ?>" name="equipo_computo" data-role="tagsinput" >
                </div>
                <div data-field-span="1">
                  <label>Equipo celular</label>
                  <input type="text" <?= ($requisicion->estatus==0 && $this->session->userdata('perfil')=='Dirección') ? null : 'disabled readonly' ; ?> value="<?php echo $requisicion->equipo_celular ?>" name="equipo_celular" data-role="tagsinput" >
                </div>
              </div>

               <div data-row-span="1">
                <div data-field-span="1">
                  <label>Archivo adjunto</label>
                  
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
                <?= form_hidden('uid-requisicion',$requisicion->uid) ?>
                <?= form_hidden('autor',$requisicion->autor) ?>
                <?= form_hidden('idtbl_requisiciones',$requisicion->idtbl_requisiciones) ?>
                <?php if ($requisicion->estatus==0 && $this->session->userdata('perfil')=='Dirección'): ?>
                <button type="submit" name="aprobar" class="btn-success btn" value="1">Aprobar Requisición</button>
                <button type="submit" name="cancelar" class="btn-danger btn" value="3">Cancelar Requisición</button>
                <?php endif ?>
              </div>
            </div>
          <?=form_close()?>
        </div>
      </div>
      <?php else: ?>
        <div class="alert alert-danger" role="alert">
          No existe información con los datos proporcionados.
        </div>
      <?php endif ?>
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
