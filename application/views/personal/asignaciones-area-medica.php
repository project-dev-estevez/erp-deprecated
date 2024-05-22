<div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body text-center">
                        <?php $carpeta = './uploads/' . $detalle->uid_usuario . '/' . $detalle->uid_usuario . '-img-credencial.jpg';
                        $carpeta2 = './uploads/' . $detalle->uid_usuario . '/' . $detalle->uid_usuario . '-img-credencial.JPG';
                        if (!file_exists($carpeta) && !file_exists($carpeta2)) { ?>
                            <img class="img-fluid" src="<?= base_url() ?>uploads/default-user-image.png">
                        <?php } elseif (file_exists($carpeta)) { ?>
                            <img class="img-fluid" src="<?= base_url() . 'uploads/' . $detalle->uid_usuario . '/' . $detalle->uid_usuario . '-img-credencial.jpg' ?>">
                        <?php } elseif (file_exists($carpeta2)) { ?>
                            <img class="img-fluid" src="<?= base_url() . 'uploads/' . $detalle->uid_usuario . '/' . $detalle->uid_usuario . '-img-credencial.JPG' ?>">
                        <?php } ?>
                        <h4 class="h4 mt-3">Número Empleado: <?php echo $detalle->numero_empleado ?></h4>
                        <h3 class="h4 mt-2">
                            <?php echo $detalle->nombres . ' ' . $detalle->apellido_paterno . ' ' . $detalle->apellido_materno ?>
                            <br> <small class="text-gris"> Fecha de nacimiento:
                                <?php echo strftime("%d de %b de %Y", strtotime($detalle->fecha_nacimiento)) ?></small>
                        </h3>
                        <h3 class="h4 mt-2"><small>Proyecto: <?= $detalle->numero_proyecto ?>
                                <?= $detalle->nombre_proyecto ?></small>
                        </h3>
                        <div class="dt-buttons btn-group">
                            <?php if (isset($this->session->userdata('permisos')['personal']) && $this->session->userdata('permisos')['personal'] > 2) : ?>
                                <?php if ($detalle->estatus == 1) : ?>
                                    <a class="btn btn-secondary buttons-pdf buttons-html5 btn-primary" href="<?= base_url() ?>personal/editar/<?php echo $detalle->uid_usuario ?>"><span><i class="fa fa-edit"></i> Editar</span></a>
                                <?php endif ?>
                                <?php if ($detalle->estatus == 1) : ?>
                                    <a href="javascript:void(0);" data-toggle="modal" class="btn buttons-pdf buttons-html5 btn-danger" data-target="#baja"><span><i class="fa fa-trash"></i> Baja</span></a>
                                <?php else : ?>
                                    <a href="javascript:void(0);" data-toggle="modal" class="btn buttons-pdf buttons-html5 btn-success" data-target="#alta"><span><i class="fa fa-check"></i> Alta</span></a>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4 class="h4">Datos personales</h4>
                    </div>
                    <div class="card-body grid-form">
                        <fieldset>
                            <div data-row-span="8">
                                <div data-field-span="3">
                                    <label>Nombre(s)</label>
                                    <?= $detalle->nombres ?>
                                </div>
                                <div data-field-span="2">
                                    <label>Apellido paterno</label>
                                    <?= $detalle->apellido_paterno ?>
                                </div>
                                <div data-field-span="2">
                                    <label>Apellido materno</label>
                                    <?= $detalle->apellido_materno ?>
                                </div>
                                <div data-field-span="1">
                                    <label>Edad</label>
                                    <?= $detalle->edad ?>
                                </div>
                            </div>
                            <div data-row-span="9">
                                <div data-field-span="2">
                                    <label>Sexo</label>
                                    <?= $detalle->sexo ?>
                                </div>
                                <div data-field-span="2">
                                    <label>Fecha de Nacimiento</label>
                                    <?= $detalle->fecha_nacimiento ?>
                                </div>
                                <div data-field-span="2">
                                    <label>Nacionalidad</label>
                                    <?= $detalle->nacionalidad ?>
                                </div>
                                <div data-field-span="3">
                                    <label>Lugar de Nacimiento</label>
                                    <?= $detalle->lugar_nacimiento ?>
                                </div>
                            </div>
                            <div data-row-span="5">
                                <div data-field-span="2">
                                    <label>Estado Civil</label>
                                    <?= $detalle->estado_civil ?>
                                </div>
                                <div data-field-span="2">
                                    <label>Nombre de Pareja</label>
                                    <?= $detalle->nombre_pareja ?>
                                </div>
                                <div data-field-span="1">
                                    <label>Hijos</label>
                                    <?= $detalle->hijos ?>
                                </div>
                            </div>
                            <div data-row-span="5">
                                <div data-field-span="2">
                                    <label>RFC</label>
                                    <?= $detalle->rfc ?>
                                </div>
                                <div data-field-span="2">
                                    <label>CURP</label>
                                    <?= $detalle->curp ?>
                                </div>
                                <div data-field-span="1">
                                    <label>NSS</label>
                                    <?= $detalle->nss ?>
                                </div>
                            </div>
                            <div data-row-span="3">
                                <div data-field-span="1">
                                    <label>Clave Elector</label>
                                    <?= $detalle->clave_elector ?>
                                </div>
                                <div data-field-span="1">
                                    <label>Número de Licencia</label>
                                    <?= $detalle->numero_licencia ?>
                                </div>
                                <div data-field-span="1">
                                    <label>INFONAVIT</label>
                                    <?= $detalle->infonavit ?>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>Dirección</legend>
                            <div data-row-span="5">
                                <div data-field-span="2">
                                    <label>Calle</label>
                                    <?= $detalle->calle ?>
                                </div>
                                <div data-field-span="1">
                                    <label>Número</label>
                                    <?= $detalle->numero ?>
                                </div>
                                <div data-field-span="2">
                                    <label>Colonia</label>
                                    <?= $detalle->colonia ?>
                                </div>
                            </div>
                            <div data-row-span="3">
                                <div data-field-span="1">
                                    <label>Estado</label>
                                    <?= $detalle->nombre_entidad ?>
                                </div>
                                <div data-field-span="1">
                                    <label>Municipio</label>
                                    <?= $detalle->nombre_municipio ?>
                                </div>
                                <div data-field-span="1">
                                    <label>Código Postal</label>
                                    <?= $detalle->cp ?>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>Contacto</legend>
                            <div data-row-span="2">
                                <div data-field-span="1">
                                    <label>E-mail Personal</label>
                                    <?= $detalle->email_personal ?>
                                </div>
                                <div data-field-span="1">
                                    <label>E-mail Institucional</label>
                                    <?= $detalle->email_institucional ?>
                                </div>
                            </div>
                            <div data-row-span="3">
                                <div data-field-span="1">
                                    <label>Teléfono Celular</label>
                                    <?= $detalle->telefono ?>
                                </div>
                                <div data-field-span="1">
                                    <label>Teléfono Fijo</label>
                                    <?= $detalle->telefono_fijo ?>
                                </div>
                                <div data-field-span="1">
                                    <label>Teléfono Empresa</label>
                                    <?= $detalle->telefono_empresa ?>
                                </div>
                            </div>
                            <div data-row-span="4">
                                <div data-field-span="3">
                                    <label>Persona de contacto en caso de emergencia</label>
                                    <?= $detalle->persona_contacto ?>
                                </div>
                                <div data-field-span="1">
                                    <label>Teléfono de emergencia</label>
                                    <?= $detalle->telefono_emergencia ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Asignaciones  -->
                <div class="card">
                    <div class="card-body grid-form">
                        <div style="padding-top: 10px;">
                            <div class="tab-content" id="pills-tabContent">
                                <table style="width: 100%" class="dataTable table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Folio</th>
                                            <th>Fecha de asignación</th>
                                            <th>Equipo</th>
                                            <th>Serie</th>
                                            <th>N° Interno</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Unidades</th>
                                            <th>Unidad de medida</th>
                                            <!--<th>Categoría</th>-->
                                            <!--<th>Nota</th>-->
                                            <th>Precio</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; ?>
                                        <?php if ($asignacionesAreaMedica) : ?>
                                            <?php foreach ($asignacionesAreaMedica as $key => $value) : ?>
                                                <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                                                    <tr>
                                                        <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                                        </td>
                                                        <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                                        </td>
                                                        <td><?php echo $value->descripcion ?></td>
                                                        <td><?php echo $value->numero_serie ?></td>
                                                        <td><?php echo $value->numero_interno ?></td>
                                                        <td><?php echo $value->marca ?></td>
                                                        <td><?php echo $value->modelo ?></td>
                                                        <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                                        <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida_abr ?>
                                                        </td>
                                                        <!--<td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>-->
                                                        <!--<td><?php echo $value->nota ?></td>-->
                                                        <?php if ($value->tipo_moneda == 'd') : ?>
                                                            <?php $value->precio = $value->precio * $precio_dolar;
                                                            $total += $value->precio * $value->cantidad ?>
                                                        <?php endif ?>
                                                        <td>$<?php echo number_format($value->precio, 2) ?></td>
                                                        <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </tbody>                                
                                </table>
                            </div>
                            <!-- Asignaciones -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
