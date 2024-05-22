<section class="forms">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Nuevo Personal HOLA</h3>
            </div>
            <div class="card-body">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <?php $get = $this->uri->uri_to_assoc(); ?>
                <?php echo validation_errors('<p class="text-danger">*Adjunte sus archivos nuevamente.</p><p class="text-danger">', '</p>'); ?>
                <?= form_open_multipart('personal/guardar-personal', 'class="grid-form needs-validation" novalidate'); ?>
                <fieldset>
                    <legend>Datos personales</legend>

                    <div data-row-span="8">
                        <div data-field-span="1">
                            <label>Número de Empleado*</label>
                            <input type="number" name="numero_empleado" required
                                value="<?= set_value('numero_empleado') ?>">
                        </div>
                        <div data-field-span="3">
                            <label>Nombre(s)*</label>
                            <input type="text" name="nombres" required maxlength="150"
                                value="<?= set_value('nombres') ?>">
                        </div>
                        <div data-field-span="2">
                            <label>Apellido paterno*</label>
                            <input type="text" name="apellido_paterno" required maxlength="100"
                                value="<?= set_value('apellido_paterno') ?>">
                        </div>
                        <div data-field-span="2">
                            <label>Apellido materno*</label>
                            <input type="text" name="apellido_materno" required maxlength="100"
                                value="<?= set_value('apellido_materno') ?>">
                        </div>
                    </div>
                    <div data-row-span="11">
                        <div data-field-span="2">
                            <label>Sexo*</label>
                            <input type="radio" name="sexo" value="FEMENINO" required> &nbsp;<span
                                class="label-check">Femenino</span>
                            <input type="radio" name="sexo" value="MASCULINO" required> &nbsp;<span
                                class="label-check">Masculino</span>
                        </div>
                        <div data-field-span="2">
                            <label>Tipo de pago*</label>
                            <input type="radio" name="pago" value="semanal" required> &nbsp;<span
                                class="label-check">Semanal</span>
                            <input type="radio" name="pago" value="quincenal" required> &nbsp;<span
                                class="label-check">Quincenal</span>
                        </div>
                        <div data-field-span="2">
                            <label>Fecha de Nacimiento*</label>
                            <input type="date" name="fecha_nacimiento" required
                                value="<?= set_value('fecha_nacimiento') ?>">
                        </div>
                        <div data-field-span="2">
                            <label>Nacionalidad*</label>
                            <input type="text" name="nacionalidad" required maxlength="150"
                                value="<?= set_value('nacionalidad') ?>">
                        </div>
                        <div data-field-span="3">
                            <label>Lugar de Nacimiento</label>
                            <input type="text" name="lugar_nacimiento" maxlength="150"
                                value="<?= set_value('lugar_nacimiento') ?>">
                        </div>
                    </div>

                    <div data-row-span="6">
                        <div data-field-span="3">
                            <label>Estado Civil*</label>
                            <input type="radio" name="estado_civil" value="SOLTERO" required> &nbsp;<span
                                class="label-check">Soltero</span>
                            <input type="radio" name="estado_civil" value="CASADO" required> &nbsp;<span
                                class="label-check">Casado</span>
                            <input type="radio" name="estado_civil" value="UNION LIBRE" required> &nbsp;<span
                                class="label-check">Unión Libre</span>
                            <input type="radio" name="estado_civil" value="DIVORCIADO" required> &nbsp;<span
                                class="label-check">Divorciado</span>
                            <input type="radio" name="estado_civil" value="SEPARADO" required> &nbsp;<span
                                class="label-check">Separado</span>
                            <input type="radio" name="estado_civil" value="VIUDO" required> &nbsp;<span
                                class="label-check">Viudo</span>
                        </div>
                        <div data-field-span="2">
                            <label>Nombre de Pareja</label>
                            <input type="text" name="nombre_pareja" maxlength="150"
                                value="<?= set_value('nombre_pareja') ?>">
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
                            <input type="text" name="clave_elector" required maxlength="50"
                                value="<?= set_value('clave_elector') ?>">
                        </div>
                        <div data-field-span="1">
                            <label>Número de Licencia</label>
                            <input type="text" name="numero_licencia" maxlength="50"
                                value="<?= set_value('numero_licencia') ?>">
                        </div>
                    </div>

                    <div data-row-span="2">
                        <div data-field-span="1">
                            <label>Fecha de alta IMSS</label>
                            <input type="date" name="fecha_alta_imss" value="<?= set_value('fecha_alta_imss') ?>">
                        </div>
                        <div data-field-span="1">
                            <label>INFONAVIT*</label>
                            <input type="radio" name="infonavit" value="SI" required> &nbsp;<span
                                class="label-check">Si</span>
                            <input type="radio" name="infonavit" value="NO" required> &nbsp;<span
                                class="label-check">No</span>
                        </div>
                    </div>

                    <div data-row-span="2">
                        <div data-field-span="1">
                            <label>E-mail Personal</label>
                            <input type="email" name="email_personal" maxlength="100"
                                value="<?= set_value('email_personal') ?>" required>
                        </div>
                        <div data-field-span="1">
                            <label>E-mail Institucional</label>
                            <input type="email" name="email_institucional" maxlength="100"
                                value="<?= set_value('email_institucional') ?>">
                        </div>
                    </div>

                    <div data-row-span="3">
                        <div data-field-span="1">
                            <label>Teléfono Celular</label>
                            <input type="text" name="telefono" maxlength="20" value="<?= set_value('telefono') ?>">
                        </div>
                        <div data-field-span="1">
                            <label>Teléfono Fijo</label>
                            <input type="text" name="telefono_fijo" maxlength="20"
                                value="<?= set_value('telefono_fijo')?>">
                        </div>
                        <div data-field-span="1">
                            <label>Teléfono Empresa</label>
                            <input type="text" name="telefono_empresa" maxlength="20"
                                value="<?= set_value('telefono_empresa')?>">
                        </div>
                    </div>
                    <div data-row-span="4">
                        <div data-field-span="3">
                            <label>Persona de contacto en caso de emergencia*</label>
                            <input type="text" name="persona_contacto" required maxlength="150"
                                value="<?= set_value('persona_contacto')?>">
                        </div>
                        <div data-field-span="1">
                            <label>Teléfono de emergencia*</label>
                            <input type="text" name="telefono_emergencia" required maxlength="20"
                                value="<?= set_value('telefono_emergencia') ?>">
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
                            <input type="text" name="estudios" required maxlength="150"
                                value="<?= set_value('estudios') ?>">
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
                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>Patron</label>
                            <select name="patron" id="patron" required>
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($patrones as $key => $value): ?>
                                <option value="<?= $value->idtbl_empresas ?>"><?= $value->empresa ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Establecimiento</label>
                            <select name="establecimiento" id="establecimiento" required>
                                <option value="">Seleccione...</option>                              
                                <?php foreach ($establecimientos as $key => $value): ?>
                                <option value="<?= $value->idctl_establecimiento ?>"><?= $value->establecimiento ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Dirección</label>
                            <select name="tbl_direccion_idtbl_direccion" id="direcciones">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Área</label>
                            <select name="tbl_areas_idtbl_areas" id="areas">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                            </select>
                        </div>
                        
                    </div>
                    <div data-row-span="4">
                        <div data-field-span="2">
                            <label>Departamento</label>
                            <select name="tbl_empresas_idtbl_empresas" id="departamentos">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                            </select>
                        </div>
                        <div data-field-span="2">
                            <label>Perfil</label>
                            <select name="tbl_perfiles_idtbl_perfiles" id="perfil">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                            </select>
                        </div>
                                </div>
                    <div data-row-span="7">
                        <div data-field-span="7">
                            <label>Tipo de nomina*</label>
                            <input type="radio" name="tipo_nomina" value="E" required> &nbsp; <span
                                class="label-check">Efectivo</span>
                            <input type="radio" name="tipo_nomina" value="M" required> &nbsp; <span
                                class="label-check">Mixto</span>
                            <input type="radio" name="tipo_nomina" value="I" required> &nbsp; <span
                                class="label-check">IMSS</span>
                        </div>
                        <!--<div data-field-span="1">
                            <label>Sueldo diario</label>
                            <input type="text" name="sd" value="<?= set_value('sd') ?>">
                        </div>
                        <div data-field-span="1">
                            <label>Sueldo diario integrado</label>
                            <input type="text" name="sdi" value="<?= set_value('sdi') ?>">
                        </div>
                        <div data-field-span="1">
                            <label>Sueldo IMSS</label>
                            <input type="text" name="sueldo_imss" value="<?= set_value('sueldo_imss') ?>">
                        </div>
                        <div data-field-span="2">
                            <label>Sueldo Bruto Mensual</label>
                            <input type="text" name="sueldo_bruto_mensual"
                                value="<?= set_value('sueldo_bruto_mensual')?>">
                        </div>
                        <div data-field-span="2">
                            <label>Sueldo Neto Mensual</label>
                            <input type="text" name="sueldo_neto_mensual"
                                value="<?= set_value('sueldo_neto_mensual')?>">
                        </div>-->
                    </div>
                    <div data-row-span="4">
                        <div data-field-span="1">
                            <label>Horario</label>
                            <input type="text" name="horario" maxlength="150" value="<?= set_value('horario') ?>">
                        </div>
                        <div data-field-span="1">
                            <label>Fecha de Ingreso*</label>
                            <input type="date" name="fecha_ingreso" required value="<?= set_value('fecha_ingreso')?>">
                        </div>
                        
                        <div data-field-span="2">
                            <label>Proyecto</label>
                            <?php $razon_social='' ?>

                            <select name="tbl_proyectos_idtbl_proyectos" required>
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <optgroup label="<?= $proyectos[0]->razon_social ?>">
                                    <?php $razon_social=$proyectos[0]->tbl_clientes_idtbl_clientes ?>
                                    <?php foreach ($proyectos as $key => $value): ?>

                                    <option value="<?= $value->idtbl_proyectos ?>">
                                        <?= $value->numero_proyecto.' '.substr($value->nombre_proyecto,0,70) ?></option>

                                    <?php if ($razon_social!=$value->tbl_clientes_idtbl_clientes): ?>
                                    <?php $razon_social=$value->tbl_clientes_idtbl_clientes ?>
                                </optgroup>
                                <optgroup label="<?= $value->razon_social ?>">
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div data-row-span="2">

                        <div data-field-span="1">
                            <label>Tipo Contrato</label>
                            <select name="ctl_contratos_idctl_contratos" required id="tipo_contrato">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Fuentes de empleo</label>
                            <select name="ctl_fuente_empleos_idctl_fuente_empleos">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($fuente_empleos as $value): ?>
                                    <option value="<?= $value->idctl_fuente_empleos ?>"><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!--<div data-field-span="1">
                            <label>Puesto Contrato</label>
                            <input type="text" name="puesto_contrato" maxlength="150">
                        </div>-->
                    </div>
                    <div data-row-span="4">

                        <div data-field-span="1">
                            <label>Ocupación</label>
                            <select name="idtbl_ocupacion" class="selectpicker" required id="tipo_contrato" data-live-search="true">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach($ocupaciones AS $key => $value){ ?>
                                        <option value="<?= $value->idtbl_ocupacion ?>" ><?= $value->descripcion ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Estudios</label>
                            <select name="idtbl_estudios">">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($estudios as $value): ?>
                                    <option value="<?= $value->idtbl_estudios ?>"><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Documento Probatorio</label>
                            <select name="idtbl_doc_probatorio">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($documentos_probatorios as $value): ?>
                                    <option value="<?= $value->idtbl_doc_probatorio ?>"><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Institución</label>
                            <select name="idtbl_instituciones">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($instituciones as $value): ?>
                                    <option value="<?= $value->idtbl_instituciones ?>" ><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                    </div>
                    <!--<div data-row-span="1">

                        <div data-field-span="1">
                            <label>Fuentes de empleo</label>
                            <select name="ctl_fuente_empleos_idctl_fuente_empleos">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($fuente_empleos as $value): ?>
                                    <option value="<?= $value->idctl_fuente_empleos ?>"><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>-->

                </fieldset>

                <br>

                <fieldset>
                    <legend>Documentos</legend>
                    <?php
                        $index = 0; 
                        while($index<count($documentos)) { 
                    ?>
                        <div data-row-span="2">
                          <?php if($index < count($documentos)){ ?>
                          <div data-field-span="1">
                            <div class="form-group">
                              <label class="control-label"><?= $documentos[$index]->documento ?></label>
                              <input type="file" name='<?= $documentos[$index]->idtbl_documentos ?>'>
                            </div>
                          </div>
                          <?php $index++; } if($index < count($documentos)){ ?>
                          <div data-field-span="1">
                            <div class="form-group">
                              <label class="control-label"><?= $documentos[$index]->documento ?></label>
                              <input type="file" name='<?= $documentos[$index]->idtbl_documentos ?>'>
                            </div>
                          </div>
                          <?php $index++; } ?>
                        </div>
                    <?php } ?>
                </fieldset>

                <br>

                <fieldset>
                    <legend>Cursos</legend>
                    <div>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#nuevo_cursos">Agregar Curso</a>
                    </div>
                    <br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="table_cursos">
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Curso</th>
                                <th width="120">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
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
<div class="modal fade" id="nuevo_cursos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal-header -->
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="form-group">
            <label>Cursos</label>
            <select name="idtbl_cursos" class="form-control" required>
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <?php foreach ($cursos  as $key => $value) : ?>
                <option value="<?php echo  $value->idtbl_cursos ?>"><?php echo  $value->nombre_curso ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
      </div>
      <!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="agregar_curso">Agregar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<script type="text/javascript">
    $("#agregar_curso").on("click", function(){
        var modal = $("#nuevo_cursos");
        var idtbl_cursos = modal.find("select[name='idtbl_cursos']").val();
        if(idtbl_cursos == ""){
            return;
        }
        var nombre_curso = modal.find("select[name='idtbl_cursos'] option:selected").html();
        var fila = "<tr>";
        fila += "<td>" + nombre_curso + "<input type='hidden' value='" + idtbl_cursos + "' name='cursos[]'></td>"
        fila += "<td><a href='#' class='eliminar_curso'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>"
        fila += "</tr>";
        $("#table_cursos").append($(fila));
        modal.modal("hide");
    });
    $("#nuevo_cursos").on("show.bs.modal", function(){
        var modal = $("#nuevo_cursos");
        modal.find("select[name='idtbl_cursos']").val("");
    });
    $("#table_cursos").on("click", ".eliminar_curso", function(event){
        event.preventDefault();
        var curso = $(this).closest("tr");
        curso.remove();
    });
</script>
<script>
  <?php if($this->session->flashdata('error')) { ?>
    Swal.fire(
  'Oops!',
  '<?= $this->session->flashdata('error') ?>',
  'error'
  )
  <?php } ?>
</script>