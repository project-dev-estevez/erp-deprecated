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
                <?= form_open('personal/actualizar-personal', 'class="grid-form needs-validation" novalidate'); ?>
                <fieldset>
                    <legend>Datos personales</legend>

                    <div data-row-span="9">
                        <div data-field-span="1">
                            <label>Número de Empleado*</label>
                            <input type="number" name="numero_empleado" required
                                value="<?= set_value('numero_empleado', $detalle->numero_empleado)?>" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'readonly' : '' ?>>
                        </div>
                        <!--<div data-field-span="1">
                            <label>Número de NOI</label>
                            <input type="number" name="numero_empleado_noi"
                                value="<?= set_value('numero_empleado_noi', $detalle->numero_empleado_noi) ?>">
                        </div>-->
                        <div data-field-span="4">
                            <label>Nombre(s)*</label>
                            <input type="text" name="nombres" required maxlength="150"
                                value="<?= set_value('nombres', $detalle->nombres)?>" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'readonly' : '' ?>>
                        </div>
                        <div data-field-span="2">
                            <label>Apellido paterno*</label>
                            <input type="text" name="apellido_paterno" required maxlength="100"
                                value="<?= set_value('apellido_paterno', $detalle->apellido_paterno)?>" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'readonly' : '' ?>>
                        </div>
                        <div data-field-span="2">
                            <label>Apellido materno*</label>
                            <input type="text" name="apellido_materno" required maxlength="100"
                                value="<?= set_value('apellido_materno', $detalle->apellido_materno)?>" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'readonly' : '' ?>>
                        </div>
                    </div>
                    <div data-row-span=11 <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="2">
                            <label>Sexo*</label>
                            <label><input type="radio" name="sexo" value="FEMENINO"
                                    <?= ($detalle->sexo=='FEMENINO') ? 'checked' : null ?> required> Femenino</label>
                            &nbsp;
                            <label><input type="radio" name="sexo" value="MASCULINO"
                                    <?= ($detalle->sexo=='MASCULINO') ? 'checked' : null ?> required> Masculino</label>
                            &nbsp;
                        </div>
                        <div data-field-span="2">
                            <label>Tipo de pago*</label>
                            <label><input type="radio" name="pago" value="semanal"
                                    <?= ($detalle->pago=='semanal') ? 'checked' : null ?> required> Semanal</label>
                            &nbsp;
                            <label><input type="radio" name="pago" value="quincenal"
                                    <?= ($detalle->pago=='quincenal') ? 'checked' : null ?> required> Quincenal</label>
                            &nbsp;
                        </div>
                        <div data-field-span="2">
                            <label>Fecha de Nacimiento*</label>
                            <input type="date" name="fecha_nacimiento" required
                                value="<?= set_value('fecha_nacimiento', $detalle->fecha_nacimiento)?>">
                        </div>
                        <div data-field-span="2">
                            <label>Nacionalidad*</label>
                            <input type="text" name="nacionalidad" required maxlength="150"
                                value="<?= set_value('nacionalidad', $detalle->nacionalidad)?>">
                        </div>
                        <div data-field-span="3">
                            <label>Lugar de Nacimiento</label>
                            <input type="text" name="lugar_nacimiento" maxlength="150"
                                value="<?= set_value('lugar_nacimiento', $detalle->lugar_nacimiento)?>">
                        </div>
                    </div>

                    <div data-row-span="5" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="2">
                            <label>Estado Civil*</label>
                            <label><input type="radio" name="estado_civil" value="SOLTERO"
                                    <?= ($detalle->estado_civil=='SOLTERO') ? 'checked' : null ?> required>
                                Soltero</label> &nbsp;
                            <label><input type="radio" name="estado_civil" value="CASADO"
                                    <?= ($detalle->estado_civil=='CASADO') ? 'checked' : null ?> required>
                                Casado</label> &nbsp;
                            <label><input type="radio" name="estado_civil" value="UNION LIBRE"
                                    <?= ($detalle->estado_civil=='UNION LIBRE') ? 'checked' : null ?> required> Unión
                                Libre</label> &nbsp;

                            <label><input type="radio" name="estado_civil" value="DIVORCIADO"
                                    <?= ($detalle->estado_civil=='DIVORCIADO') ? 'checked' : null ?> required>
                                Divorciado</label> &nbsp;
                            <label><input type="radio" name="estado_civil" value="SEPARADO"
                                    <?= ($detalle->estado_civil=='SEPARADO') ? 'checked' : null ?> required>
                                Separado</label> &nbsp;
                            <label><input type="radio" name="estado_civil" value="VIUDO"
                                    <?= ($detalle->estado_civil=='VIUDO') ? 'checked' : null ?> required> Viudo</label>
                            &nbsp;


                        </div>
                        <div data-field-span="2">
                            <label>Nombre de Pareja</label>
                            <input type="text" name="nombre_pareja" maxlength="150"
                                value="<?= set_value('nombre_pareja', $detalle->nombre_pareja)?>">
                        </div>
                        <div data-field-span="1">
                            <label>Hijos</label>
                            <input type="number" name="hijos" min="0" value="<?= set_value('hijos', $detalle->hijos)?>">
                        </div>
                    </div>

                    <div data-row-span="6" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="1">
                            <label>RFC*</label>
                            <input type="text" name="rfc" required maxlength="13"
                                value="<?= set_value('rfc', $detalle->rfc)?>">
                        </div>
                        <div data-field-span="2">
                            <label>CURP*</label>
                            <input type="text" name="curp" required minlength="18" maxlength="18"
                                value="<?= set_value('curp', $detalle->curp)?>">
                        </div>
                        <div data-field-span="1">
                            <label>NSS*</label>
                            <input type="text" name="nss" required maxlength="50"
                                value="<?= set_value('nss', $detalle->nss)?>">
                        </div>
                        <div data-field-span="1">
                            <label>Clave Elector*</label>
                            <input type="text" name="clave_elector" required maxlength="50"
                                value="<?= set_value('clave_elector', $detalle->clave_elector)?>">
                        </div>
                        <div data-field-span="1">
                            <label>Número de Licencia</label>
                            <input type="text" name="numero_licencia" maxlength="50"
                                value="<?= set_value('numero_licencia', $detalle->numero_licencia)?>">
                        </div>
                    </div>

                    <div data-row-span="2" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="1">
                            <label>Fecha de alta IMSS</label>
                            <input type="date" name="fecha_alta_imss"
                                value="<?= set_value('fecha_alta_imss', $detalle->fecha_alta_imss)?>">
                        </div>
                        <div data-field-span="1">
                            <label>INFONAVIT*</label>
                            <label><input type="radio" name="infonavit" value="SI"
                                    <?= ($detalle->infonavit=='SI') ? 'checked' : null ?> required> Si</label> &nbsp;
                            <label><input type="radio" name="infonavit" value="NO"
                                    <?= ($detalle->infonavit=='NO') ? 'checked' : null ?> required> No</label> &nbsp;
                        </div>
                    </div>

                    <div data-row-span="2" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="1">
                            <label>E-mail Personal</label>
                            <input type="email" name="email_personal" maxlength="100"
                                value="<?= set_value('email_personal', $detalle->email_personal)?>">
                        </div>
                        <div data-field-span="1">
                            <label>E-mail Institucional</label>
                            <input type="email" name="email_institucional" maxlength="100"
                                value="<?= set_value('email_institucional', $detalle->email_institucional)?>">
                        </div>
                    </div>

                    <div data-row-span="3" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="1">
                            <label>Teléfono Celular</label>
                            <input type="text" name="telefono" maxlength="20"
                                value="<?= set_value('telefono', $detalle->telefono)?>">
                        </div>
                        <div data-field-span="1">
                            <label>Teléfono Fijo</label>
                            <input type="text" name="telefono_fijo" maxlength="20"
                                value="<?= set_value('telefono_fijo', $detalle->telefono_fijo)?>">
                        </div>
                        <div data-field-span="1">
                            <label>Teléfono Empresa</label>
                            <input type="text" name="telefono_empresa" maxlength="20"
                                value="<?= set_value('telefono_empresa', $detalle->telefono_empresa)?>">
                        </div>
                    </div>
                    <div data-row-span="4" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="3">
                            <label>Persona de contacto en caso de emergencia*</label>
                            <input type="text" name="persona_contacto" required maxlength="150"
                                value="<?= set_value('persona_contacto', $detalle->persona_contacto)?>">
                        </div>
                        <div data-field-span="1">
                            <label>Teléfono de emergencia*</label>
                            <input type="text" name="telefono_emergencia" required maxlength="20"
                                value="<?= set_value('telefono_emergencia', $detalle->telefono_emergencia)?>">
                        </div>
                    </div>
                    <div data-row-span="2" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="1">
                            <label>Grado Estudios*</label>
                            <select name="ctl_escolaridad_idctl_escolaridad" required>
                                <option value="" disabled="disabled"
                                    <?php if ($detalle->ctl_escolaridad_idctl_escolaridad==null): ?> selected="selected"
                                    <?php endif ?>>Seleccione...</option>
                                <?php foreach ($escolaridad as $key => $value): ?>
                                <option value="<?= $value->id ?>"
                                    <?= ($detalle->ctl_escolaridad_idctl_escolaridad==$value->id) ? 'selected="selected"' : null ?>>
                                    <?= $value->escolaridad ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Titulo*</label>
                            <input type="text" name="estudios" required maxlength="150"
                                value="<?= set_value('estudios', $detalle->estudios)?>">
                        </div>
                    </div>

                    <br>
                    <fieldset <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <legend>Dirección</legend>
                        <div data-row-span="5">
                            <div data-field-span="2">
                                <label>Calle*</label>
                                <input type="text" name="calle" required
                                    value="<?= set_value('calle', $detalle->calle)?>">
                            </div>
                            <div data-field-span="1">
                                <label>Número*</label>
                                <input type="text" name="numero" required
                                    value="<?= set_value('numero', $detalle->numero)?>">
                            </div>
                            <div data-field-span="2">
                                <label>Colonia*</label>
                                <input type="text" name="colonia" required
                                    value="<?= set_value('colonia', $detalle->colonia)?>">
                            </div>
                        </div>
                        <div data-row-span="3">

                            <div data-field-span="1">
                                <label>Estado*</label>
                                <select name="estado" id="estado" required>
                                    <option value="" disabled="disabled"
                                        <?php if ($detalle->tbl_entidad_idtbl_entidad==null): ?> selected="selected"
                                        <?php endif ?>>Seleccione...</option>
                                    <?php foreach ($estados as $key => $value): ?>
                                    <option value="<?= $value->id ?>"
                                        <?= ($detalle->tbl_entidad_idtbl_entidad==$value->id) ? 'selected="selected"' : null ?>>
                                        <?= $value->estado ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div data-field-span="1">
                                <label>Municipio*</label>
                                <select name="tbl_municipio_idtbl_municipio" required id="municipio">
                                    <option value="" disabled="disabled" <?php if ($detalle->idtbl_entidad==null): ?>
                                        selected="selected" <?php endif ?>>Seleccione...</option>
                                    <?php if (isset($municipios)): ?>


                                    <?php foreach ($municipios as $key => $value): ?>
                                    <option value="<?= $value->id ?>"
                                        <?= ($detalle->tbl_municipio_idtbl_municipio==$value->id) ? 'selected="selected"' : null ?>>
                                        <?= $value->municipio ?></option>
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
                    <div data-row-span="4" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="1">
                            <label>Patron</label>
                            <select name="patron" id="patron" required>
                                <option value="" disabled="disabled" <?php if ($detalle->idtbl_empresas==null): ?>
                                    selected="selected" <?php endif ?>>Seleccione...</option>
                                <?php foreach ($patrones as $key => $value): ?>
                                <option value="<?= $value->idtbl_empresas ?>"
                                    <?= ($detalle->idtbl_empresas==$value->idtbl_empresas) ? 'selected="selected"' : null ?>>
                                    <?= $value->empresa ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Establecimiento</label>
                            <select name="establecimiento" id="establecimiento" required>
                                <option value="">Seleccione...</option>                              
                                <?php foreach ($establecimientos as $key => $value): ?>
                                <option value="<?= $value->idctl_establecimiento ?>" <?= $detalle->establecimiento == $value->idctl_establecimiento ? "selected": "" ?>><?= $value->establecimiento ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Dirección</label>
                            <select name="tbl_direccion_idtbl_direccion" id="direcciones">
                                <option value="" disabled="disabled" <?php if ($detalle->idtbl_direcciones==null): ?>
                                    selected="selected" <?php endif ?>>Seleccione...</option>
                                <?php foreach ($direcciones as $key => $value): ?>
                                <option value="<?= $value->id ?>"
                                    <?= ($detalle->idtbl_direcciones==$value->id) ? 'selected="selected"' : null ?>>
                                    <?= $value->direccion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Área</label>
                            <select name="tbl_areas_idtbl_areas" id="areas">
                                <option value="" disabled="disabled"
                                    <?php if ($detalle->idtbl_areas==null): ?> selected="selected"
                                    <?php endif ?>>Seleccione...</option>
                                <?php foreach ($areaDireccion as $key => $value): ?>
                                <option value="<?= $value->id ?>"
                                    <?= ($detalle->idtbl_areas==$value->id) ? 'selected="selected"' : null ?>>
                                    <?= $value->area ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                    </div>

                    <div data-row-span="2" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        
                        
                        <div data-field-span="1">
                            <label>Departamento</label>
                            <select name="departamento" id="departamentos">
                                <option value="" disabled="disabled" <?php if ($detalle->idtbl_departamentos==null): ?>
                                    selected="selected" <?php endif ?>>Seleccione...</option>
                                <?php foreach ($departamentoArea as $key => $value): ?>
                                <option value="<?= $value->id ?>"
                                    <?= ($detalle->idtbl_departamentos==$value->id) ? 'selected="selected"' : null ?>>
                                    <?= $value->departamento ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div data-field-span="1">
                            <label>Perfil</label>
                            <select name="tbl_perfiles_idtbl_perfiles" id="perfil">
                                <option value="" disabled="disabled"
                                    <?php if ($detalle->tbl_perfiles_idtbl_perfiles==null): ?> selected="selected"
                                    <?php endif ?>>Seleccione...</option>
                                <?php foreach ($perfilDepa as $key => $value): ?>
                                <option value="<?= $value->id ?>"
                                    <?= ($detalle->tbl_perfiles_idtbl_perfiles==$value->id) ? 'selected="selected"' : null ?>>
                                    <?= $value->perfil ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                    </div>
                    <div data-row-span="7" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="7">
                            <label>Tipo de nomina*</label>
                            <label><input type="radio" name="tipo_nomina" value="E"
                                    <?= ($detalle->tipo_nomina=='E') ? 'checked' : null ?> required> Efectivo</label>
                            &nbsp;
                            <label><input type="radio" name="tipo_nomina" value="M"
                                    <?= ($detalle->tipo_nomina=='M') ? 'checked' : null ?> required> Mixto</label>
                            &nbsp;
                            <label><input type="radio" name="tipo_nomina" value="I"
                                    <?= ($detalle->tipo_nomina=='I') ? 'checked' : null ?> required> IMSS</label> &nbsp;
                        </div>
                        <!--<div data-field-span="1">
                            <label>Sueldo diario</label>
                            <input type="text" name="sd" value="<?= set_value('sd', $detalle->sd)?>">
                        </div>
                        <div data-field-span="1">
                            <label>Sueldo diario integrado</label>
                            <input type="text" name="sdi" value="<?= set_value('sdi', $detalle->sdi)?>">
                        </div>
                        <div data-field-span="1">
                            <label>Sueldo IMSS</label>
                            <input type="text" name="sueldo_imss"
                                value="<?= set_value('sueldo_imss', $detalle->sueldo_imss)?>">
                        </div>
                        <div data-field-span="2">
                            <label>Sueldo Bruto Mensual</label>
                            <input type="text" name="sueldo_bruto_mensual"
                                value="<?= set_value('sueldo_bruto_mensual', $detalle->sueldo_bruto_mensual)?>">
                        </div>
                        <div data-field-span="2">
                            <label>Sueldo Neto Mensual</label>
                            <input type="text" name="sueldo_neto_mensual"
                                value="<?= set_value('sueldo_neto_mensual', $detalle->sueldo_neto_mensual)?>">
                        </div>-->
                    </div>
                    <div data-row-span="4">
                        <div data-field-span="1" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                            <label>Horario</label>
                            <input type="text" name="horario" maxlength="150"
                                value="<?= set_value('horario', $detalle->horario)?>">
                        </div>
                        <div data-field-span="1" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                            <label>Fecha de Ingreso*</label>
                            <input type="date" name="fecha_ingreso" required
                                value="<?= set_value('fecha_ingreso', $detalle->fecha_ingreso)?>">
                        </div>
                        <div data-field-span="1" <?= ($this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                            <label>Proyecto</label>
                            <?php $aux_grupo='' ?>
                            <select name="tbl_proyectos_idtbl_proyectos" required>
                                <option value="" disabled="disabled"
                                    <?php if ($detalle->tbl_proyectos_idtbl_proyectos==null): ?> selected="selected"
                                    <?php endif ?>>Seleccione...</option>
                                <optgroup label="<?= $proyectos[0]->razon_social ?>">
                                    <?php $aux_grupo=$proyectos[0]->tbl_clientes_idtbl_clientes ?>
                                    <?php foreach ($proyectos as $key => $value): ?>
                                    <?php if ($aux_grupo!=$value->tbl_clientes_idtbl_clientes): ?>
                                    <?php $aux_grupo=$value->tbl_clientes_idtbl_clientes ?>
                                </optgroup>
                                <optgroup label="<?= $value->razon_social ?>">
                                    <option value="<?= $value->idtbl_proyectos ?>"
                                        <?= ($detalle->tbl_proyectos_idtbl_proyectos==$value->idtbl_proyectos) ? 'selected="selected"' : null ?>>
                                        <?= $value->numero_proyecto.' '.$value->nombre_proyecto ?></option>
                                    <?php else: ?>
                                    <option value="<?= $value->idtbl_proyectos ?>"
                                        <?= ($detalle->tbl_proyectos_idtbl_proyectos==$value->idtbl_proyectos) ? 'selected="selected"' : null ?>>
                                        <?= $value->numero_proyecto.' '.$value->nombre_proyecto ?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div data-row-span="2" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="1">
                            <label>Tipo Contrato</label>
                            <select name="ctl_contratos_idctl_contratos" required id="tipo_contrato">
                                <option value="" disabled="disabled" <?php if ($detalle->idctl_contratos==null): ?>
                                    selected="selected" <?php endif ?>>Seleccione...</option>
                                <?php if (isset($contratos)): ?>
                                <?php foreach ($contratos as $key => $value): ?>
                                <option value="<?= $value->id ?>"
                                    <?= ($detalle->ctl_contratos_idctl_contratos==$value->id) ? 'selected="selected"' : null ?>>
                                    <?= $value->contrato ?></option>
                                <?php endforeach ?>
                                <?php endif ?>

                            </select>
                        </div>
                        <!--<div data-field-span="1">
                            <label>Puesto Contrato</label>
                            <input type="text" name="puesto_contrato" maxlength="150"
                                value="<?= set_value('puesto_contrato', $detalle->puesto_contrato)?>">
                        </div>-->
                        <div data-field-span="1" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                            <label>Fuentes de empleo</label>
                            <select name="ctl_fuente_empleos_idctl_fuente_empleos">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($fuente_empleos as $value): ?>
                                    <option value="<?= $value->idctl_fuente_empleos ?>" <?= $detalle->ctl_fuente_empleos_idctl_fuente_empleos == $value->idctl_fuente_empleos ? "selected" : "" ?>><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div data-row-span="4" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                        <div data-field-span="1">
                            <label>Ocupación</label>
                            <select name="idtbl_ocupacion" class="selectpicker" required id="tipo_contrato" data-live-search="true">
                                <option value="" disabled="disabled" <?php if ($detalle->tbl_ocupacion_idtbl_ocupacion==null): ?>
                                    selected="selected" <?php endif ?>>Seleccione...</option>
                                    <?php foreach($ocupaciones AS $key => $value){ ?>
                                        <option value="<?= $value->idtbl_ocupacion ?>" <?= $value->idtbl_ocupacion == $detalle->tbl_ocupacion_idtbl_ocupacion ? 'selected' : '' ?>><?= $value->descripcion ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                        
                        <div data-field-span="1" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                            <label>Estudios</label>
                            <select name="idtbl_estudios">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($estudios as $value): ?>
                                    <option value="<?= $value->idtbl_estudios ?>" <?= $detalle->tbl_estudios_idtbl_estudios == $value->idtbl_estudios ? "selected" : "" ?>><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div data-field-span="1" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                            <label>Documento Probatorio</label>
                            <select name="idtbl_doc_probatorio">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($documentos as $value): ?>
                                    <option value="<?= $value->idtbl_doc_probatorio ?>" <?= $detalle->tbl_doc_probatorio_idtbl_doc_probatorio == $value->idtbl_doc_probatorio ? "selected" : "" ?>><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div data-field-span="1" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 3) ? 'style="display: none;"' : '' ?>>
                            <label>Institución</label>
                            <select name="idtbl_instituciones">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($instituciones as $value): ?>
                                    <option value="<?= $value->idtbl_instituciones ?>" <?= $detalle->tbl_instituciones_idtbl_instituciones == $value->idtbl_instituciones ? "selected" : "" ?>><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <!--<div data-row-span="1" <?= ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21) ? 'style="display: none;"' : '' ?>>

                        <div data-field-span="1">
                            <label>Fuentes de empleo</label>
                            <select name="ctl_fuente_empleos_idctl_fuente_empleos">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($fuente_empleos as $value): ?>
                                    <option value="<?= $value->idctl_fuente_empleos ?>" <?= $detalle->ctl_fuente_empleos_idctl_fuente_empleos == $value->idctl_fuente_empleos ? "selected" : "" ?>><?= $value->descripcion ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>-->

                </fieldset>

                <br><br>



                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <a class="btn-default btn"
                            href="<?= base_url() ?>personal/detalle/<?= $detalle->uid_usuario ?>">Cancelar</a>
                        <?= form_hidden('token', $token) ?>
                        <?= form_hidden('uid', $detalle->uid_usuario) ?>
                        <?= form_hidden('estatus', $detalle->estatus) ?>
                        <button type="submit" class="btn-primary btn">Actualizar</button>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</section>