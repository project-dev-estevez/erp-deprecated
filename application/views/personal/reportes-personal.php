<section class="forms nueva-asignacion">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Reportes de personal</h3>
            </div>

            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">General</a>
                        <!--<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Filtros</a>-->
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                        <?= form_open('personal/reporte-general', 'class="needs-validation" novalidate'); ?>
                            <div class="form-row">
                                <div class="col">
                                    <label class="form-check-label">Tipo</label>
                                    <select name="tipo_empleado" id="tipo_empleado" class="form-control" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="interno">Internos</option>
                                        <option value="contratista">Contratistas</option>
                                        <option value="dc3">DC3</option>
                                        <?php if($this->session->userdata('id') == 458){ ?>
                                        <option value="cumple">Cumpleaños</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-check-label">Estatus</label>
                                    <select name="estatus_empleado" id="estatus_empleado" class="form-control" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="1">Activos</option>
                                        <option value="0">Bajas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row" id="cumple" style="display: none;">
                                <div class="col">
                                    <label class="form-check-label">Tipo Cumpleaños</label>
                                    <select name="tipo_cumple" id="tipo_cumple" class="form-control" disabled>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="dia">Día</option>
                                        <option value="mensual">Mensual</option>
                                    </select>
                                </div>
                                <div class="col" id="mes_cumple" style="display: none;">
                                    <label class="form-check-label">Mes</label>
                                    <select name="mes_cumple" id="mes_cumple_select" class="form-control" disabled>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="01">Enero</option>
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                </div>
                            </div>   
                            <div class="form-row" id="campos_baja" style="display: none;">
                                <div class="col">
                                    <label class="form-check-label">Empresa</label>
                                    <select name="establecimiento" id="establecimiento" class="form-control" disabled>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <?php foreach($establecimientos AS $key => $value){ ?>
                                            <option value="<?= $value->idctl_establecimiento ?>"><?= $value->establecimiento ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-check-label">Departamento</label>
                                    <select name="departamento" id="departamentos" class="form-control" disabled>
                                        <option value="" disabled selected>Seleccione...</option>                                                          
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-check-label">Puesto</label>
                                    <select name="perfil" id="perfil" class="form-control" disabled>
                                        <option value="" disabled selected>Seleccione...</option>                                                          
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-check-label">Tipo Baja</label>
                                    <select name="tipo_baja" id="tipo_baja" class="form-control" disabled>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="Renuncia voluntaria">Renunca voluntaria</option>
                                        <option value="Termino de contrato">Termino de contrato</option>
                                        <option value="Abandono">Abandono</option>
                                        <option value="Despido faltas injustificados">Despido faltas injustificadas</option>
                                        <option value="Despido bajo desempeño">Despido bajo desempeño</option>
                                        <option value="Despido falta de providad">Despido falta de providad</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="numero_empleado">
                                        <label class="form-check-label">Número Empleado</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="numero_empleado_noi">
                                        <label class="form-check-label">Número Empleado Noi</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" checked="" disabled>
                                        <input type="hidden" value="true" name="nombres">
                                        <label class="form-check-label">Nombres</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" checked="" disabled>
                                        <input type="hidden" value="true" name="apellido_paterno">
                                        <label class="form-check-label">Apellido Paterno</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" checked="" disabled>
                                        <input type="hidden" value="true" name="apellido_materno">
                                        <label class="form-check-label">Apellido Materno</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="sexo">
                                        <label class="form-check-label">Sexo</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="pago">
                                        <label class="form-check-label">Pago</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="rfc">
                                        <label class="form-check-label">Rfc</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="curp">
                                        <label class="form-check-label">Curp</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nss">
                                        <label class="form-check-label">Nss</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="fecha_nacimiento">
                                        <label class="form-check-label">Fecha Nacimiento</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="lugar_nacimiento">
                                        <label class="form-check-label">Lugar Nacimiento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nacionalidad">
                                        <label class="form-check-label">Nacionalidad</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="email_personal">
                                        <label class="form-check-label">Email Personal</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="email_institucional">
                                        <label class="form-check-label">Email Institucional</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="estudios">
                                        <label class="form-check-label">Estudios</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="clave_elector">
                                        <label class="form-check-label">Clave Elector</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="numero_licencia">
                                        <label class="form-check-label">Número Licencia</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="calle">
                                        <label class="form-check-label">Calle</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="numero">
                                        <label class="form-check-label">Número</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="colonia">
                                        <label class="form-check-label">Colonia</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nombre_municipio">
                                        <label class="form-check-label">Municipio</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nombre_entidad">
                                        <label class="form-check-label">Estado</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="cp">
                                        <label class="form-check-label">Cp</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="telefono_fijo">
                                        <label class="form-check-label">Telefono Fijo</label>
                                    </div>
                                </div>




                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="telefono">
                                        <label class="form-check-label">Telefono</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="telefono_empresa">
                                        <label class="form-check-label">Telefono Empresa</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="estado_civil">
                                        <label class="form-check-label">Estado Civil</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nombre_pareja">
                                        <label class="form-check-label">Nombre Pareja</label>
                                    </div>
                                </div>




                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="hijos">
                                        <label class="form-check-label">Hijos</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nombre_proyecto">
                                        <label class="form-check-label">Nombre Proyecto</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="numero_proyecto">
                                        <label class="form-check-label">Número Proyecto</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nombre_perfil">
                                        <label class="form-check-label">Perfil</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="fecha_alta_imss">
                                        <label class="form-check-label">Fecha Alta Imss</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="infonavit">
                                        <label class="form-check-label">Infonavit</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="tipo_nomina">
                                        <label class="form-check-label">Tipo Nomina</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="telefono_emergencia">
                                        <label class="form-check-label">Telefono Emergencia</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="persona_contacto">
                                        <label class="form-check-label">Persona Contacto</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="uid">
                                        <label class="form-check-label">Uid</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="horario">
                                        <label class="form-check-label">Horario</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="estatus">
                                        <label class="form-check-label">Estatus</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="escolaridad">
                                        <label class="form-check-label">Escolaridad</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="fecha_ingreso">
                                        <label class="form-check-label">Fecha Ingreso</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nombre_establecimiento">
                                        <label class="form-check-label">Establecimiento</label>
                                    </div>
                                </div>

                                <!--<div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="sd">
                                        <label class="form-check-label">Sueldo Diario</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="sdi">
                                        <label class="form-check-label">Sueldo Diario Integrado</label>
                                    </div>
                                </div>-->
                            </div>
                            <div class="form-row">

                                <!--<div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="sueldo_imss">
                                        <label class="form-check-label">Sueldo Imss</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="sueldo_bruto_mensual">
                                        <label class="form-check-label">Sueldo Bruto Mensual</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="sueldo_neto_mensual">
                                        <label class="form-check-label">Sueldo Neto Mensual</label>
                                    </div>
                                </div>-->
                            </div>
                            <div class="form-row">

                            <div class="col">
                                <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="fecha_inicio">
                                        <label class="form-check-label">Fecha Inicio Contrato</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="duracion">
                                        <label class="form-check-label">Duración Contrato</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="tipo_contrato">
                                        <label class="form-check-label">Tipo de Contrato</label>
                                    </div>
                                </div>
                            


                                <!--<div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="puesto_contrato">
                                        <label class="form-check-label">Puesto Contrato</label>
                                    </div>
                                </div>-->
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="acta_administrativa">
                                        <label class="form-check-label">Acta administrativa</label>
                                    </div>
                                </div>

                                

                            </div>
                            <div class="form-row">

                            <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="tipo">
                                        <label class="form-check-label">Tipo</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nombre_comercial">
                                        <label class="form-check-label">Contratista</label>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="almacen">
                                        <label class="form-check-label">Permisos Almacen</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="fecha_creacion">
                                        <label class="form-check-label">Fecha creación</label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="fecha_baja">
                                        <label class="form-check-label">Fecha de baja</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="nombre_departamento">
                                        <label class="form-check-label">Departamento</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="dias_vacaciones">
                                        <label class="form-check-label">Días vacaciones</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="dias_tomados">
                                        <label class="form-check-label">Días tomados</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="empresa">
                                        <label class="form-check-label">Patrón</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" name="motivo">
                                        <label class="form-check-label">Motivo</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">                                        
                                        <label class="form-check-label">&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">                                        
                                        <label class="form-check-label">&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col check_baja" style="display: none;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" id="razones_renuncia">
                                        <label class="form-check-label">Razones renuncia</label>
                                    </div>
                                </div>
                                <div class="col check_baja" style="display: none;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="true" id="calificaciones">
                                        <label class="form-check-label">Calificaciones</label>
                                    </div>
                                </div>
                            </div>

                            
                            <div style="display: none;">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="true" checked="" disabled>
                                            <input type="hidden" value="true" name="fecha_acta_administrativa">
                                            <label class="form-check-label">Fecha acta administrativa</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="true" checked="" disabled>
                                            <input type="hidden" value="true" name="detalle">
                                            <label class="form-check-label">Detalle</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row" style="display: none;">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="baja_remuneracion">
                                        <label class="form-check-label">Baja Remuneracion</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="problemas_personales_enfermedad">
                                        <label class="form-check-label">Problemas personales</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="falta_reconocimiento_labor">
                                        <label class="form-check-label">Falta reconocimiento</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="presion_estres">
                                        <label class="form-check-label">Presion Estres</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="ambiente_fisico_trabajo">
                                        <label class="form-check-label">Ambiente fisico</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="incumplimiento_ofrecido_ingreso">
                                        <label class="form-check-label">incumplimiento</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="problemas_jefe_directo">
                                        <label class="form-check-label">Problemas Jefe</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="falta_oportunidad_profesional">
                                        <label class="form-check-label">Falta oportunidad</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="falta_motivacion_grupo">
                                        <label class="form-check-label">Falta motivacion</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="horarios_trabajo">
                                        <label class="form-check-label">Horario trabajo</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input razones" type="checkbox" value="true" name="conflicto_compañeros">
                                        <label class="form-check-label">Conflicto compañeros</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row" style="display: none;">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input calificaciones" type="checkbox" value="true" name="ambiente_laboral">
                                        <label class="form-check-label">Ambiente laboral</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input calificaciones" type="checkbox" value="true" name="induccion">
                                        <label class="form-check-label">induccion</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input calificaciones" type="checkbox" value="true" name="capacitacion">
                                        <label class="form-check-label">Capacitacion</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input calificaciones" type="checkbox" value="true" name="condicciones_trabajo">
                                        <label class="form-check-label">Codiciones</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input calificaciones" type="checkbox" value="true" name="reconocimiento_labor">
                                        <label class="form-check-label">Reconocimiento</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input calificaciones" type="checkbox" value="true" name="sueldo_comisiones">
                                        <label class="form-check-label">Sueldo</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input calificaciones" type="checkbox" value="true" name="trato_jefe_supervisor">
                                        <label class="form-check-label">Trato Jefe</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input calificaciones" type="checkbox" value="true" name="trato_rrhh">
                                        <label class="form-check-label">Trato RH</label>
                                    </div>
                                </div>                                
                            </div>

                            <!--<div class="form-row" >
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input calificaciones" type="checkbox" value="true" name="id_db">
                                        <label class="form-check-label">ID Usuario</label>
                                    </div>
                                </div>
                            </div>-->

                            <div class="form-row">
                                <div class="col text-right pt-5">
                                    <button type="submit" class="btn btn-primary">Generar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <!--<?= form_open('personal/reporte-general', 'class="needs-validation" novalidate'); ?>
                            <div class="row">
                                <select name="empresa">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                        </form>-->
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<script>
$(document).on('change', '#estatus_empleado', function (event) {
    event.preventDefault();
    if(this.value == 0){
        $('#establecimiento').prop('disabled', false);
        $('#departamentos').prop('disabled', false);
        $('#perfil').prop('disabled', false);
        $('#tipo_baja').prop('disabled', false);
        $('#campos_baja').show(500);        
    }else{
        $('#establecimiento').prop('disabled', true);
        $('#departamentos').prop('disabled', true);
        $('#perfil').prop('disabled', true);
        $('#tipo_baja').prop('disabled', true);
        $('#campos_baja').hide(500);        
    }
});

$(document).on('change', '#tipo_empleado', function (event) {
    event.preventDefault();
    if(this.value == 'cumple'){
        $('#tipo_cumple').prop('disabled', false);
        $('#cumple').show(500);        
    }else{
        $('#tipo_cumple').prop('disabled', true);
        $('#cumple').hide(500);        
    }
});

$(document).on('change', '#tipo_cumple', function (event) {
    event.preventDefault();
    if(this.value == 'mensual'){
        $('#mes_cumple_select').prop('disabled', false);
        $('#mes_cumple').show(500);        
    }else{
        $('#mes_cumple_select').prop('disabled', true);
        $('#mes_cumple').hide(500);        
    }
});

$(document).on('change', '#calificaciones', function (event) {
    event.preventDefault();
    if($('#calificaciones').is(":checked")){        
        $('.calificaciones').prop('checked', true);
    }else{        
        $('.calificaciones').prop('checked', false);
    }    
});

$(document).on('change', '#razones_renuncia', function (event) {
    event.preventDefault();
    if($('#razones_renuncia').is(":checked")){        
        $('.razones').prop('checked', true);
    }else{        
        $('.razones').prop('checked', false);
    }    
});

$(document).on('change', '#tipo_baja', function (event) {
    event.preventDefault();
    if(this.value == 'Renuncia voluntaria'){    
        $('.check_baja').show(500);
    }else{        
        $('.check_baja').hide(500);
    }
});

</script>