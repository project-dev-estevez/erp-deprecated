<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/css/jquery.Jcrop.min.css" />
<script src="<?= base_url() ?>js/jquery.Jcrop.js"></script>
<script src="<?= base_url() ?>js/jquery.color.js"></script>
<div class="over"></div>
<div class="spinner" style="display: none">
  <div class="double-bounce1"></div>
  <div class="double-bounce2"></div>
</div>
<?php $dias_antiguedad = date_diff(date_create($detalle->fecha_ingreso), date_create('now'))->format('%a'); ?>
<section class="no-padding">
  <div class="container-fluid pt-5">
    <div class="row">
      <div class="col">
        <?php if ($detalle->estatus == 0) : ?>
          <div class="alert alert-danger" role="alert">
            El personal se encuentra actualmente con estatus baja. <a href="<?= base_url() ?>personal/detalle-baja/<?= $detalle->uid_usuario ?>" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">Ver
              historial</a>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</section>
<?php if ($this->session->userdata('permisos')['personal'] > 1) : ?>
<section class="dashboard-counts no-padding botones">
  <div class="container-fluid">
    <div class="row">
      <div class="col pt-3 pb-1">
        <div class="alert
          <?php if (count($actas) == 1) : ?>
            alert-info
          <?php elseif (count($actas) == 2) : ?>
            alert-warning
          <?php elseif (count($actas) > 2) : ?>
            alert-danger
          <?php else : ?>
            d-none
          <?php endif; ?>
          " role="alert">
          <strong>El personal cuenta con <?php echo count($actas) ?> actas administrativas.</strong>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif ?>
<?php if (isset($this->session->userdata('permisos')['personal']) && $this->session->userdata('permisos')['personal'] > 1) : ?>
  <section class="dashboard-counts no-padding botones">
    <div class="container-fluid">
      <?php if ($detalle->estatus == 1) : ?>
        <div class="row">
          <!-- Item -->
          <div class="col-xl-3 col-sm-6">
            <div class="bg-white has-shadow">
              <a href="javascript:void(0);" data-toggle="modal" data-target="#cambiar-foto">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-orange"><i class="fa fa-address-card"></i></div>
                  <div class="title"><span>Asignar/Cambiar Foto</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6">
            <div class="bg-white has-shadow">
              <a href="javascript:void(0);" data-toggle="modal" data-target="#vacacionesModal">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet"><i class="fa-calendar fa"></i></div>
                  <div class="title"><span>Vacaciones</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6">
            <div class="bg-white has-shadow">
              <a href="javascript:void(0);" data-toggle="modal" data-target="#permisosModal">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-blue"><i class="fa-calendar fa"></i></div>
                  <div class="title"><span>Permisos</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6">
            <div class="bg-white has-shadow">
              <a href="javascript:void(0);" data-toggle="modal" data-target="#incapacidad">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-green"><i class="fa fa-exclamation"></i></div>
                  <div class="title"><span>Incapacidad</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6">
            <div class="bg-white has-shadow">
              <a href="javascript:void(0);" data-toggle="modal" data-target="#actas">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-red"><i class="fa fa-exclamation"></i></div>
                  <div class="title"><span>Nueva Acta Administrativa</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>
  </section>
<?php endif ?>
<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-5 col-xl-4">
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
              <?php if ((isset($this->session->userdata('permisos')['personal']) && $this->session->userdata('permisos')['personal'] > 2) || ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21)) : ?>
                <?php if ($detalle->estatus == 1) : ?>
                  <a class="btn btn-secondary buttons-pdf buttons-html5 btn-primary" href="<?= base_url() ?>personal/editar/<?php echo $detalle->uid_usuario ?>"><span><i class="fa fa-edit"></i> Editar</span></a>
                <?php endif ?>
                <?php if($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19 && $this->session->userdata('tipo') != 21){ ?>
                <?php if ($detalle->estatus == 1) : ?>
                  <a href="javascript:void(0);" data-toggle="modal" class="btn buttons-pdf buttons-html5 btn-danger" data-target="#baja"><span><i class="fa fa-trash"></i> Baja</span></a>
                  <?php if ($dias_antiguedad < 8) { ?>
                    <a href="javascript:void(0);" data-toggle="modal" class="btn buttons-pdf buttons-html5 btn-danger" data-target="#eliminar"><span><i class="fa fa-trash"></i> Eliminar</span></a>
                    <?php } ?>
                <?php else : ?>
                  <a href="javascript:void(0);" data-toggle="modal" class="btn buttons-pdf buttons-html5 btn-success" data-target="#alta"><span><i class="fa fa-check"></i> Alta</span></a>
                  <?php if($this->session->userdata('tipo') == 5){ ?>
                  <a href="" data-toggle="modal" class="btn btn-secondary buttons-pdf buttons-html5 btn-primary" data-target="#bajaedit"><span><i class="fa fa-edit"></i>Editar</span></a>
                  <?php } ?>
                  <?php if ($encuesta->idtbl_encuestas_baja != null) { ?>
                    <a href="javascript:void(0);" data-toggle="modal" class="btn buttons-pdf buttons-html5 btn-primary" data-target="#encuesta"><span><i class="fa fa-check"></i> Encuesta</span></a>
                  <?php } ?>
                <?php endif ?>
                <?php } ?>
              <?php endif ?>
              <!--<?php if ((isset($this->session->userdata('permisos')['personal'])) || ($this->session->userdata('tipo') == 3)) : ?>
                <a class="btn btn-secondary buttons-pdf buttons-html5 btn-primary" href="<?= base_url() ?>personal/editar/<?php echo $detalle->uid_usuario ?>"><span><i class="fa fa-edit"></i> Editar</span></a>
                <?php endif ?>-->
            </div>
          </div>
        </div>
      </div>
      <?php if($this->session->userdata('tipo') == 14){ ?>
      <div class="col-12 col-sm-6 col-lg-7 col-xl-8">
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
      <?php } ?>
      <?php if ($this->session->userdata('permisos')['personal'] == 1) : ?>
      </div>
        <?php endif ?>
      <?php if ($this->session->userdata('permisos')['personal'] > 1) : ?>
      <div class="col-12 col-sm-6 col-lg-7 col-xl-8">
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
          <!-- Datos Laborales  -->
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4 class="h4">Datos Laborales</h4>
            </div>
            <div class="card-body grid-form">
              <fieldset>
                <div data-row-span="4">
                  <div data-field-span="1">
                    <label>Departamento</label>
                    <?= $detalle->departamento ?>
                  </div>
                  <div data-field-span="2">
                    <label>Perfil</label>
                    <?= $detalle->perfil ?>
                  </div>
                  <!--<div data-field-span="1">
                    <label>Sueldo Bruto Mensual</label>
                    <?= $detalle->sueldo_bruto_mensual ?>
                  </div>
                  <div data-field-span="1">
                    <label>Sueldo Neto Mensual</label>
                    <?= $detalle->sueldo_neto_mensual ?>
                  </div>-->
                  <div data-field-span="1">
                    <label>Tipo de nomina</label>
                    <?= $detalle->tipo_nomina ?>
                  </div>
                </div>
                <!--<div data-row-span="4">
                  <div data-field-span="1">
                    <label>Sueldo diario</label>
                    <?= $detalle->sd ?>
                  </div>
                  <div data-field-span="1">
                    <label>Sueldo diario integrado</label>
                    <?= $detalle->sdi ?>
                  </div>
                  <div data-field-span="1">
                    <label>Sueldo IMSS</label>
                    <?= $detalle->sueldo_imss ?>
                  </div>
                  <div data-field-span="1">
                    <label>Tipo de nomina</label>
                    <?= $detalle->tipo_nomina ?>
                  </div>
                </div>-->
                <div data-row-span="3">
                  <div data-field-span="1">
                    <label>Horario</label>
                    <?= $detalle->horario ?>
                  </div>
                  <div data-field-span="1">
                    <label>Proyecto</label>
                    <?= $detalle->nombre_proyecto ?>
                  </div>
                  <div data-field-span="1">
                    <label>Fecha de alta IMSS</label>
                    <?= $detalle->fecha_alta_imss ?>
                  </div>
                </div>
              </fieldset>
              <br>
              <fieldset>
                <legend>Datos Contrato</legend>
                <div data-row-span="4">
                  <div data-field-span="1">
                    <label>Patron</label>
                    <?= $detalle->empresa ?>
                  </div>
                  <div data-field-span="1">
                    <label>Tipo contrato</label>
                    <?= $detalle->tipo_contrato ?>
                  </div>
                  <div data-field-span="1">
                    <label>Establecimiento</label>
                    <?= $detalle->nombre_establecimiento ?>
                  </div>
                  <div data-field-span="1">
                    <label>Perfil</label>
                    <?= $detalle->perfil ?>
                  </div>
                </div>
                <div data-row-span="4">
                  <div data-field-span="1">
                    <label>Fecha de Ingreso</label>
                    <?php echo ($detalle->fecha_ingreso == NULL) ? '' : strftime("%d de %b de %Y", strtotime($detalle->fecha_ingreso)) ?>
                  </div>
                  <div data-field-span="1">
                    <label>Inicio de contrato</label>
                    <?php echo ($detalle->fecha_inicio == NULL) ? '' : strftime("%d de %b de %Y", strtotime($detalle->fecha_inicio)) ?>
                  </div>
                  <div data-field-span="1">
                    <label>Fin de contrato</label>
                    <?php echo ($detalle->fecha_inicio == NULL) ? '' : strftime("%d de %b de %Y", strtotime($detalle->fecha_inicio . "+ " . $detalle->duracion . " days")) ?>
                  </div>
                  <div data-field-span="1">
                    <label>Vencimiento</label>
                    <?php if ($detalle->tipo_contrato == 'indeterminado') : ?>
                      Contrato indeterminado
                    <?php else : ?>
                      <?= $tiempo_expirado = date_diff(date_create(strftime("%d-%m-%Y", strtotime($detalle->fecha_inicio . "+ " . $detalle->duracion . " days"))), date_create('now'))->format('%R%a'); ?>
                      días
                    <?php endif ?>
                  </div>
                </div>
                <div data-row-span="4">
                  <div data-field-span="1">
                    <label>Pago</label>
                    <?php echo $detalle->pago ?>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="card-footer">
              <?php ?>
              <button type="button" class="btn btn-info" id="nuevo-contrato">Nuevo contrato</button>
              <button type="button" class="btn btn-primary generar-contrato">Generar Contrato</button>
              <button type="button" class="btn btn-info" id="carta-patronal">Carta Patronal</button>
              <button type="button" class="btn btn-info" id="convenio-salida">Convenio Salida</button>
              <button type="button" class="btn btn-info" id="ofi-remis">Oficio de Remis</button>
            </div>
          </div>
          <!-- Datos Laborales -->
          <!-- Formación  -->
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4 class="h4">Formación</h4>
            </div>
            <div class="card-body grid-form">
              <fieldset>
                <div data-row-span="2">
                  <div data-field-span="1">
                    <label>Grado Estudios</label>
                    <?= $detalle->escolaridad ?>
                  </div>
                  <div data-field-span="1">
                    <label>Titulo</label>
                    <?= $detalle->estudios ?>
                  </div>
                </div>
              </fieldset>
              <br>
              <fieldset>
                <legend>Cursos</legend>
              </fieldset>
              <br>
              <fieldset>
                <legend>Competencias</legend>
              </fieldset>
            </div>
          </div>
          <!-- Formación  -->
          <!-- Contratos  -->
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4 class="h4">Contratos</h4>
            </div>
            <div class="card-body">
              <?php if (isset($contratos)) : ?>
                <table class="table table-striped table-sm dataTable" style="width: 100%">
                  <thead>
                    <tr>
                      <th>UID</th>
                      <th>Fecha Creación</th>
                      <th>Fecha Inicio</th>
                      <th>Duración</th>
                      <th>Fecha Fin</th>
                      <th>Estatus</th>
                      <?php if($this->session->userdata('id') == 4 || $this->session->userdata('id') == 2){ ?>
                        <th>Autor</th>
                      <?php } ?>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($contratos as $key => $value) : ?>
                      <tr>
                        <td><?php echo $value->uid ?></td>
                        <td><?php echo $value->fecha_creacion ?></td>
                        <td><?php echo $value->fecha_inicio ?></td>
                        <td>
                          <?php if ($value->tipo == 'indeterminado') : ?>
                            <span class="text-success bold">Indeterminado</span>
                          <?php else : ?>
                            <?php echo $value->duracion ?>
                          <?php endif ?>
                        </td>
                        <td>
                          <?php if ($value->tipo == 'indeterminado') : ?>
                            <span class="text-success bold">Indeterminado</span>
                          <?php else : ?>
                            <?php echo date("d-m-Y", strtotime($value->fecha_inicio . "+ " . $value->duracion . " days")); ?>
                        </td>
                      <?php endif ?>
                      <td class="estatus-contrato">
                        <?php if ($value->estatus == 1) : ?>
                          <?php if ($value->tipo == 'indeterminado') : ?>
                            <span class="text-success bold">Indeterminado</span>
                          <?php else : ?>
                            <?php echo (date_diff(date_create(strftime("%d-%m-%Y", strtotime($value->fecha_inicio . "+ " . $value->duracion . " days"))), date_create('now'))->format('%R') == '-') ? '<span class="text-success bold">Vigente</span>' : '<span class="text-danger bold">Vencido (' . date_diff(date_create(strftime("%d-%m-%Y", strtotime($value->fecha_inicio . "+ " . $value->duracion . " days"))), date_create('now'))->format('%a') . ' días)</span>' ?>
                      </td>
                    <?php endif ?>
                  <?php else : ?>
                    <span class="text-warning bold">Cancelado</span>
                  <?php endif ?>
                  <?php if($this->session->userdata('id')==4 || $this->session->userdata('id')==2){ ?>
                  <!--FILA DE CREADORES-->
                  <td><?php echo $value->nombre ?></td>
                  <?php } ?>
                  <td align="center">
                    <?php $dir = './uploads/' . $detalle->uid_usuario . '/contratos/' . $value->uid . '.pdf' ?>
                    <?php if (!file_exists($dir)) : ?>
                      <?php if ($value->estatus == 1) : ?>
                        <button type="button" class="btn btn-danger cancelar-contrato" data-uid="<?= $value->uid ?>">Cancelar Contrato</button></br>
                      <?php endif ?>
                      <?= form_open_multipart('', 'style="display: inherit" id="formuploadajax_archivos' . $value->uid . '"'); ?>
                      <input type="file" class="filestyle pull-left archivos" data-uid="<?= $value->uid ?>" name='archivo' id='<?= $value->uid ?>' accept=".pdf">
                      <?= form_hidden('uid', $value->uid) ?>
                      <?= form_hidden('uid_usuario', $detalle->uid_usuario) ?>
                      <?= form_hidden('token', $token) ?>
                      <?= form_hidden('tipo', 'contratos') ?>
                      <?= form_close() ?>
                    <?php else : ?>
                      <a href="<?php echo base_url() . 'uploads/' . $detalle->uid_usuario . '/contratos/' . $value->uid . '.pdf' ?>" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">Ver
                        Contrato</a>
                    <?php endif ?>
                  </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              <?php endif ?>
            </div>
          </div>
          <!-- Contratos  -->
          <!-- Actas administrativas  -->
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4 class="h4">Actas administrativas</h4>
            </div>
            <div class="card-body">
              <table class="table" style="width: 100%">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Fecha de Creación</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($actas) : ?>
                    <?php foreach ($actas as $key => $value) : ?>
                      <tr>
                        <td><?= $value->uid ?></td>
                        <td><?= $value->timestamp ?></td>
                        <td><?= $value->detalle ?></td>
                        <td><?= $value->fecha ?></td>
                        <td align="center">
                          <?php $carpeta = './uploads/' . $detalle->uid_usuario . '/actas/' . $value->uid . '.pdf';
                          if (!file_exists($carpeta)) : ?>
                            <?= form_open_multipart('', 'id="formuploadajax_archivos' . $value->uid . '"'); ?>
                            <input type="file" class="filestyle pull-left archivos" data-uid="<?= $value->uid ?>" name='archivo' id='<?= $value->uid ?>' accept=".pdf">
                            <?= form_hidden('uid', $value->uid) ?>
                            <?= form_hidden('uid_usuario', $detalle->uid_usuario) ?>
                            <?= form_hidden('token', $token) ?>
                            <?= form_hidden('tipo', 'actas') ?>
                            <?= form_close() ?>
                          <?php else : ?>
                            <a href="<?php echo base_url() . 'uploads/' . $detalle->uid_usuario . '/actas/' . $value->uid . '.pdf' ?>" target="_blank" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">Ver archivo</a>
                          <?php endif ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php else : ?>
                    <tr>
                      <td colspan="5" align="center">No existen actas administrativas.</td>
                    </tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- Actas administrativas  -->
          <!-- Incapacidades  -->
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4 class="h4">Incapacidades</h4>
            </div>
            <div class="card-body">
              <table class="table" style="width: 100%">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Folio</th>
                    <th>Fecha Incidente</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Días</th>
                    <th>Tipo</th>
                    <th>Comentarios</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($incapacidades) : ?>
                    <?php foreach ($incapacidades as $key => $value) : ?>
                      <tr>
                        <td><?= $value->uid ?></td>
                        <td><?= $value->folio ?></td>
                        <td><?= strftime("%d-%m-%Y", strtotime($value->fecha_incidente)) ?></td>
                        <td><?= strftime("%d-%m-%Y", strtotime($value->fecha_inicio)) ?></td>
                        <td><?= strftime("%d-%m-%Y", strtotime($value->fecha_fin)) ?></td>
                        <td><?= $value->dias_expedidos ?></td>
                        <td>
                          <?php
                          if (substr($value->tipo, 0, 2) == 'eg')
                            echo 'Enfermedad General ';
                          elseif (substr($value->tipo, 0, 2) == 'rt')
                            echo 'Riesgo de trabajo ';
                          elseif (substr($value->tipo, 0, 2) == 'ma')
                            echo 'Maternidad ';

                          if (substr($value->tipo, 2, 1) == 'i')
                            echo 'Inicial';
                          elseif (substr($value->tipo, 2, 1) == 's')
                            echo 'Subsecuente';
                          elseif (substr($value->tipo, 2, 1) == 'a')
                            echo 'Alta';
                          elseif (substr($value->tipo, 2, 1) == 'p')
                            echo 'Periodo Único';
                          ?>
                        </td>
                        <td><?= $value->comentarios ?></td>
                        <td align="center">
                          <?php $carpeta = './uploads/' . $detalle->uid_usuario . '/incapacidades/' . $value->uid . '.pdf';
                          if (!file_exists($carpeta)) : ?>
                            <?= form_open_multipart('', 'id="formuploadajax_archivos' . $value->uid . '"'); ?>
                            <input type="file" class="filestyle pull-left archivos" data-uid="<?= $value->uid ?>" name='archivo' id='<?= $value->uid ?>' accept=".pdf">
                            <?= form_hidden('uid', $value->uid) ?>
                            <?= form_hidden('uid_usuario', $detalle->uid_usuario) ?>
                            <?= form_hidden('token', $token) ?>
                            <?= form_hidden('tipo', 'incapacidades') ?>
                            <?= form_close() ?>
                          <?php else : ?>
                            <a href="<?php echo base_url() . 'uploads/' . $detalle->uid_usuario . '/incapacidades/' . $value->uid . '.pdf' ?>" target="_blank" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">Ver archivo</a>
                          <?php endif ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php else : ?>
                    <tr>
                      <td colspan="5" align="center">No existen incapacidades.</td>
                    </tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- Incapacidades  -->
          <!-- Detalle Vacaciones y Permisos  -->
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4 class="h4">Detalle Vacaciones y Permisos</h4>
            </div>
            <div class="card-body">
              <div class="row" style="display:none;">
              <div class="col-12 col-lg-6">
                      <?php 
                        $total_periodos = []; 
                        $total_dias_disfrutados = 0;
                        foreach($dias_disfrutados_vacaciones AS $value){
                          $itemPeriodo = json_decode($value->periodo);
                          $itemDias = json_decode($value->dias_disfrutar);
                          for($r = 0; $r < count($itemPeriodo); $r++){
                            $total_periodos[$itemPeriodo[$r]] = $total_periodos[$itemPeriodo[$r]] == null ? $itemDias[$r] : $total_periodos[$itemPeriodo[$r]] + $itemDias[$r];
                          }
                        }
                        foreach($total_periodos AS $value){
                          $total_dias_disfrutados += $value;
                        }                        
                      ?>
                  <?php $dias_vacaciones = dias_vacaciones($dias_antiguedad); ?>
                  <p>
                    Años de servicio: <strong><?= number_format($dias_antiguedad / 365, 2) ?> años.</strong>
                  </p>
                  <p>Con derecho a: <strong><?php echo $dias_vacaciones ?> días.</strong></p>
                  <p id="dias_disfrutados">
                    Días de vacaciones disfrutados: <strong><?= $total_dias_disfrutados  ?> días.</strong>
                  </p>
                  <p id="dias_disponibles">
                    Días de vacaciones disponibles: <strong><?= $dias_vacaciones - $total_dias_disfrutados ?> días.</strong>
                  </p>
                  <p id="dias_proporcionales">
                    Días de vacaciones proporcionales: <strong><?= $dias_proporcionales ?> días.</strong>
                  </p>
                </div>
                <div class="col-12 col-lg-6">
                  Detalle Periodos
                  <table style="width: 100%" class="table">
                    <thead>
                      <th class="text-center">Periodo</th>
                      <th class="text-center">Con derecho a</th>
                      <th class="text-center">Disfrutados</th>
                      <th class="text-center">Restan</th>
                    </thead>
                    <tbody>
                      <?php $dias_totales_vacaciones = 0; ?>
                      <?php $dias = 365 ?>
                      <?php $dias_auxiliar = 0 ?>
                      <?php $dias_disfrutados_vacaciones_aux = 0 ?>
                      <?php $dias_antes = ((($dias_antiguedad - $dias_antiguedad % 365))) ?>
                      <?php $dias_total = 0 ?>
                      
                      
                      <?php for ($x = 0; $x < (($dias_antiguedad - $dias_antiguedad % 365) / 365); $x++) { ?>
                        
                        <tr>
                          <td align="center">
                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?>-<?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))) ?>
                          </td>
                          <td align="center">
                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias);
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                          </td>
                          <td align="center">
                            <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?> días.
                          </td>
                          <td align="center">
                            <?php if ((($dias_antiguedad - $dias_antiguedad % 365) / 365) == $x + 1) { ?>
                            <?php if ($dias_antiguedad - $dias_antes > 182) { ?>
                              <?= $periodo[$x]['dias'] = 0 ?> días (pasaron 6 meses)
                              <?php $dias_total += 0; ?>
                              <?php } else { ?>
                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?> días.
                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones_calculos($dias) - $dias_disfrutados_vacaciones_aux : 0 ?>
                            <?php } ?>
                            <?php } else { ?>
                              <?= $periodo[$x]['dias'] = 0 ?> días
                              <?php $dias_total += 0; ?>
                              <?php } ?>
                              <?php $dias_totales_vacaciones += $periodo[$x]['dias']; ?>
                          </td>
                          <?php
                          if ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) {
                              $dias_disfrutados_vacaciones_aux = 0;
                          } else {
                              $dias_disfrutados_vacaciones_aux = $dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias);
                          }
                          ?>
                        </tr>
                        <?php $dias += 365; ?>
                        
                      <?php } ?>
                      <?php if (($dias_antiguedad % 365) > 1) : ?>
                        <tr>
                          <td align="center">
                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?> - <?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))); ?>
                          </td>
                          <td align="center">
                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?> días (Proporcionales).
                          </td>
                          <td align="center">
                          <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?> días.
                          </td>
                          <td align="center">                                                       
                            <?= $periodo[$x]['dias'] = $dias_proporcionales = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?> días.
                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones($dias_antiguedad) - $dias_auxiliar - $dias_disfrutados_vacaciones_aux : dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?>
                            <?php $dias_totales_vacaciones += $periodo[$x]['dias']; ?>
                          </td>
                        </tr>
                      <?php endif ?>
                    </tbody>
                  </table>
                </div>
                </div>
                <div class="row">
                <div class="col-12 col-lg-6">
                      <?php 
                        $total_periodos = []; 
                        $total_dias_disfrutados = 0;
                        foreach($dias_disfrutados_vacaciones AS $value){
                          $itemPeriodo = json_decode($value->periodo);
                          $itemDias = json_decode($value->dias_disfrutar);
                          for($r = 0; $r < count($itemPeriodo); $r++){
                            $total_periodos[$itemPeriodo[$r]] = $total_periodos[$itemPeriodo[$r]] == null ? $itemDias[$r] : $total_periodos[$itemPeriodo[$r]] + $itemDias[$r];
                          }
                        }
                        foreach($total_periodos AS $value){
                          $total_dias_disfrutados += $value;
                        }                        
                      ?>
                  <?php $dias_vacaciones = dias_vacaciones($dias_antiguedad); ?>
                  <p>
                    Años de servicio: <strong><?= number_format($dias_antiguedad / 365, 2) ?> años.</strong>
                  </p>
                  <p>Con derecho a: <strong><?php echo $dias_vacaciones ?> días.</strong></p>
                  <p id="dias_disfrutados">
                    Días de vacaciones disfrutados: <strong><?= $total_dias_disfrutados  ?> días.</strong>
                  </p>
                  <p id="dias_disponibles">
                    Días de vacaciones disponibles: <strong><?= $dias_totales_vacaciones ?> días.</strong>
                  </p>
                  <p id="dias_proporcionales">
                    Días de vacaciones proporcionales: <strong><?= $dias_proporcionales ?> días.</strong>
                  </p>
                </div>
                <div class="col-12 col-lg-6">
                  Detalle Periodos
                  <table style="width: 100%" class="table">
                    <thead>
                      <th class="text-center">Periodo</th>
                      <th class="text-center">Con derecho a</th>
                      <th class="text-center">Disfrutados</th>
                      <th class="text-center">Restan</th>
                    </thead>
                    <tbody>
                      <?php $dias = 365 ?>
                      <?php $dias_auxiliar = 0 ?>
                      <?php $dias_disfrutados_vacaciones_aux = 0 ?>
                      <?php $dias_antes = ((($dias_antiguedad - $dias_antiguedad % 365))) ?>
                      <?php $dias_total = 0 ?>
                      
                      
                      <?php for ($x = 0; $x < (($dias_antiguedad - $dias_antiguedad % 365) / 365); $x++) { ?>
                        
                        <tr>
                          <td align="center">
                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?>-<?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))) ?>
                          </td>
                          <td align="center">
                            <?php if(intval($periodo[$x]['fechaFin']) < 2023){ ?>
                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias) - 6;
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                            <?php }else{ ?>
                              <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias);
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                              <?php } ?>
                          </td>
                          <td align="center">
                            <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?> días.
                          </td>
                          <td align="center">
                            <?php if ((($dias_antiguedad - $dias_antiguedad % 365) / 365) == $x + 1) { ?>
                            <?php if ($dias_antiguedad - $dias_antes > 182) { ?>
                              <?= $periodo[$x]['dias'] = 0 ?> días (pasaron 6 meses)
                              <?php $dias_total += 0; ?>
                              <?php } else { ?>
                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?> días.
                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones_calculos($dias) - $dias_disfrutados_vacaciones_aux : 0 ?>
                            <?php } ?>
                            <?php } else { ?>
                              <?= $periodo[$x]['dias'] = 0 ?> días
                              <?php $dias_total += 0; ?>
                              <?php } ?>                              
                          </td>
                          <?php
                          if ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) {
                              $dias_disfrutados_vacaciones_aux = 0;
                          } else {
                              $dias_disfrutados_vacaciones_aux = $dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias);
                          }
                          ?>
                        </tr>
                        <?php $dias += 365; ?>
                        
                      <?php } ?>
                      <?php if (($dias_antiguedad % 365) > 1) : ?>
                        <tr>
                          <td align="center">
                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?> - <?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))); ?>
                          </td>
                          <td align="center">
                          <?php if(intval($periodo[$x]['fechaFin']) < 2023){ ?>
                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar - 6 ?> días (Proporcionales).
                            <?php }else{ ?>
                              <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?> días (Proporcionales).
                              <?php } ?>
                          </td>
                          <td align="center">
                          <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?> días.
                          </td>
                          <td align="center">                                                       
                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?> días.
                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones($dias_antiguedad) - $dias_auxiliar - $dias_disfrutados_vacaciones_aux : dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?>                                                
                          </td>
                        </tr>
                      <?php endif ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="table-responsive">
                <table class="dataTable table table-hover table-sm">
                  <thead>
                    <tr>
                      <th>Fecha Registro</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Termino</th>
                      <th>Días Solicitados</th>
                      <th>Goce de Sueldo</th>
                      <th>Comentarios</th>
                      <th>Tipo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($vacaciones_permisos) : ?>
                      <?php foreach ($vacaciones_permisos as $key => $value) : ?>
                        <tr>
                          <td>
                            <?= utf8_encode(strftime("%c", strtotime($value->timestamp))) ?>
                            <span id="canceladas<?= $value->uid ?>" class="text-danger" style="display: <?= ($value->tipo == 'vacaciones' && $value->estatus == '0') ? 'block' : 'none' ?>">
                              <strong>Canceladas</strong>
                            </span>
                          </td>
                          <td><?= utf8_encode(strftime("%a %d de %b de %Y", strtotime($value->fecha_inicio))) ?></td>
                          <td><?= utf8_encode(strftime("%a %d de %b de %Y", strtotime($value->fecha_final))) ?></td>
                          <td><?= $value->dias ?></td>
                          <td><?= ($value->goce_sueldo == '1') ? 'Si' : 'No'; ?></td>
                          <td><?= $value->comentarios ?></td>
                          <td><?= ucfirst($value->tipo) ?></td>
                          <td align="center">
                            <?php $carpeta = './uploads/' . $detalle->uid_usuario . '/vacaciones/' . $value->uid . '.pdf';
                            if (!file_exists($carpeta)) : ?>
                              <?php if ($value->periodo != null) : ?>
                                <a href="<?php echo base_url() ?>personal/formato-vacaciones/<?php echo $value->uid ?>" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">
                                  Imprimir Formato
                                </a>
                              <?php endif; ?>
                              <?= form_open_multipart('', 'style="display: inherit" id="formuploadajax_archivos' . $value->uid . '"'); ?>
                              <input type="file" class="filestyle pull-left archivos" data-uid="<?= $value->uid ?>" name='archivo' id='<?= $value->uid ?>' accept=".pdf">
                              <?= form_hidden('uid', $value->uid) ?>
                              <?= form_hidden('uid_usuario', $detalle->uid_usuario) ?>
                              <?= form_hidden('token', $token) ?>
                              <?= form_hidden('tipo', 'vacaciones') ?>
                              <?= form_close() ?>
                            <?php else : ?>
                              <a href="<?php echo base_url() . 'uploads/' . $detalle->uid_usuario . '/vacaciones/' . $value->uid . '.pdf' ?>" target="_blank" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">
                                Ver archivo
                              </a>
                            <?php endif; ?>
                            <?php if ($value->tipo == 'vacaciones' && $value->estatus == '1' && !file_exists($carpeta)) : ?>
                              <?php $periodoCancelar = date("d-m-Y", strtotime($value->fecha_inicio)) . ' al ' . date("d-m-Y", strtotime($value->fecha_final)); ?>
                              <button type="button" class="btn btn-danger cancelar-vacaciones" data-uid="<?= $value->uid ?>" data-periodo="<?= $periodoCancelar ?>">
                                Cancelar Vacaiones
                              </button>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Detalle Vacaciones y Permisos -->
          <!-- Horario Laboral  
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4 class="h4">Horario Laboral</h4>
            </div>    
            <div class="card-body">
          
              <div class="table-responsive">   
                <table class="table table-hover table-sm">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Hora de Entrada</th>
                      <th>Hora de Salida</th>
                      <th>Horas Trabajadas</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Fecha</th>
                      <th>Hora de Entrada</th>
                      <th>Hora de Salida</th>
                      <th>Horas Trabajadas</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php if ($asistencias) : ?>
                      <?php foreach ($asistencias as $key => $value) : ?>
                        <tr <?= ($value->entrada != NULL) ? 'class="table-success"' : 'class="table-dark"'; ?>>
                          <td><?php echo utf8_encode(strftime("%A %e de %B de %Y", strtotime($value->fecha_hora . ' ' . $value->entrada))) ?></td>
                          <td><?php echo $value->entrada ?></td>
                          <td><?php echo $value->salida ?></td>
                          <td><?php echo ($value->entrada != NULL) ? gmdate("H:i", timeDiff($value->entrada, $value->salida)) : NULL; ?></td>
                        </tr>
                      <?php endforeach ?>     
                      <?php else : ?>
                        <tr>
                          <td colspan="6" class="text-center">No existen información.</td>
                        </tr>
                      <?php endif ?>               
                    </tbody>
                  </table>
                </div>
                <br>
          
              </div>
            </div> Horario Laboral  -->
        </div>
      </div>
      <!-- Certificados  -->
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4 class="h4">Cursos</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-sm dataTable" style="width: 100%">
              <thead>
                <tr>
                  <th>Curso</th>
                  <th>Fecha Registro</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Termino</th>
                  <th>Duración</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($certificados_asignados) : ?>
                  <?php foreach ($certificados_asignados as $key => $value) : ?>
                    <tr>
                      <td><?= $value->nombre_curso ?></td>
                      <td><?= date("Y-m-d", strtotime($value->fecha_creacion)) ?></td>
                      <td><?= ($value->fecha_inicio != '0000-00-00') ? $value->fecha_inicio : 'N/A' ?></td>
                      <td><?= ($value->fecha_termino != '0000-00-00') ? $value->fecha_termino : 'N/A' ?></td>
                      <td><?= $value->duracion ?> horas.</td>
                      <td align="center">
                        <?php $dir = './uploads/' . $detalle->uid_usuario . '/certificados/' . $value->uid . '.pdf' ?>
                        <?php if (!file_exists($dir)) : ?>
                          <a href="<?php echo base_url() ?>personal/certificado/<?php echo $value->uid ?>" onClick="openWin(this)"><i class="fa fa-print">Imprimir</i></a><br>
                          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editar_cursos" data-idtbl-cursos="<?= $value->tbl_cursos_idtbl_cursos ?>" data-fecha-inicio="<?= $value->fecha_inicio ?>" data-fecha-termino="<?= $value->fecha_termino ?>" data-duracion="<?= $value->duracion ?>" data-tutor="<?= $value->tutor ?>" data-folio="<?= $value->folio ?>" data-tutor="<?= $value->tutor ?>" data-patron-representante="<?= $value->patron_representante ?>" data-representante-trabajadores="<?= $value->representante_trabajadores ?>" data-idtbl-certificados="<?= $value->tbl_certificados_idtbl_certificados ?>" data-iddtl-certificados-personal="<?= $value->iddtl_certificados_personal ?>">Editar</button>
                          <br>
                          <?= form_open_multipart('', 'style="display: inherit" id="formuploadajax_archivos' . $value->uid . '"'); ?>
                          <input type="file" class="filestyle pull-left archivos" data-uid="<?= $value->uid ?>" name='archivo' id='<?= $value->uid ?>' accept=".pdf">
                          <?= form_hidden('uid', $value->uid) ?>
                          <?= form_hidden('uid_usuario', $detalle->uid_usuario) ?>
                          <?= form_hidden('token', $token) ?>
                          <?= form_hidden('tipo', 'certificados') ?>
                          <?= form_close() ?>
                        <?php else : ?>
                          <a href="<?php echo base_url() . 'uploads/' . $detalle->uid_usuario . '/certificados/' . $value->uid . '.pdf' ?>" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">
                            Ver Certificado</a>
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
              </tbody>
            </table>
          </div>
          <br>
          <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#certificado">Nuevo
            Curso</button>-->
        </div>
      </div>
      <!-- Certificados  -->
    <?php endif ?>
    <?php if($this->session->userdata('tipo') == 10){ ?>
       <!-- Certificados  -->
       <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4 class="h4">Cursos</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-sm dataTable" style="width: 100%">
              <thead>
                <tr>
                  <th>Curso</th>
                  <th>Fecha Registro</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Termino</th>
                  <th>Duración</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($certificados_asignados) : ?>
                  <?php foreach ($certificados_asignados as $key => $value) : ?>
                    <tr>
                      <td><?= $value->nombre_curso ?></td>
                      <td><?= date("Y-m-d", strtotime($value->fecha_creacion)) ?></td>
                      <td><?= ($value->fecha_inicio != '0000-00-00') ? $value->fecha_inicio : 'N/A' ?></td>
                      <td><?= ($value->fecha_termino != '0000-00-00') ? $value->fecha_termino : 'N/A' ?></td>
                      <td><?= $value->duracion ?> horas.</td>
                      <td align="center">
                        <?php $dir = './uploads/' . $detalle->uid_usuario . '/certificados/' . $value->uid . '.pdf' ?>
                        <?php if (!file_exists($dir)) : ?>
                          <a href="<?php echo base_url() ?>personal/certificado/<?php echo $value->uid ?>" onClick="openWin(this)"><i class="fa fa-print">Imprimir</i></a><br>
                          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editar_cursos" data-idtbl-cursos="<?= $value->tbl_cursos_idtbl_cursos ?>" data-fecha-inicio="<?= $value->fecha_inicio ?>" data-fecha-termino="<?= $value->fecha_termino ?>" data-duracion="<?= $value->duracion ?>" data-tutor="<?= $value->tutor ?>" data-folio="<?= $value->folio ?>" data-tutor="<?= $value->tutor ?>" data-patron-representante="<?= $value->patron_representante ?>" data-representante-trabajadores="<?= $value->representante_trabajadores ?>" data-idtbl-certificados="<?= $value->tbl_certificados_idtbl_certificados ?>" data-iddtl-certificados-personal="<?= $value->iddtl_certificados_personal ?>">Editar</button>
                          <br>
                          <?= form_open_multipart('', 'style="display: inherit" id="formuploadajax_archivos' . $value->uid . '"'); ?>
                          <input type="file" class="filestyle pull-left archivos" data-uid="<?= $value->uid ?>" name='archivo' id='<?= $value->uid ?>' accept=".pdf">
                          <?= form_hidden('uid', $value->uid) ?>
                          <?= form_hidden('uid_usuario', $detalle->uid_usuario) ?>
                          <?= form_hidden('token', $token) ?>
                          <?= form_hidden('tipo', 'certificados') ?>
                          <?= form_close() ?>
                        <?php else : ?>
                          <a href="<?php echo base_url() . 'uploads/' . $detalle->uid_usuario . '/certificados/' . $value->uid . '.pdf' ?>" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">
                            Ver Certificado</a>
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
              </tbody>
            </table>
          </div>
          <br>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#certificado">Nuevo
            Curso</button>
        </div>
      </div>
      <!-- Certificados  -->
      <?php } ?>
    <div class="row">
      <div class="col-12">
        <!-- Asignaciones  -->
        <div class="card">
          <div class="card-header">
            <h4 class="h4"> Asignaciones<small class="float-right">Precio Dolar
                $<?php echo $precio_dolar ?></small>
            </h4>
          </div>
          <div class="card-body grid-form">
            <div style="padding-top: 10px;">            
              <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                <!-- Tabs que verán almacén, alto costo y RH -->
              <?php if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 5 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 12){ ?>
                <li class="nav-item">
                  <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
                    Almacen general
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill" href="#pills-devolucion" role="tab" aria-controls="pills-devolucion" aria-selected="false">
                    Alto costo
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
                    Kuali
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
                    Control Vehicular
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-areamedica-tab" data-toggle="pill" href="#pills-areamedica" role="tab" aria-controls="pills-areamedica" aria-selected="false">
                    Área Médica
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                    Refacciones Control Vehicular
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                    Sistemas
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-seguridad-e-higiene-tab" data-toggle="pill" href="#pills-seguridad-e-higiene" role="tab" aria-controls="pills-seguridad-e-higiene" aria-selected="false">
                    Seguridad e Higiene
                  </a>
                </li>
              <?php } ?>
              <!-- /Tabs almacén y alto costo -->

              <!-- Tabs que verán Control vehicular -->
              <?php if($this->session->userdata('tipo') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn active" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
                    Control Vehicular
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                    Refacciones Control Vehicular
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-tarjetas-tab" data-toggle="pill" href="#pills-tarjetas" role="tab" aria-controls="pills-tarjetas" aria-selected="false">
                    Tarjetas
                  </a>
                </li>
                <?php } ?>
                <!-- /Tabs Control vehicular -->

                <!-- Tabs que verá Área médica -->
                <?php if($this->session->userdata('tipo') == 14){ ?>
                  <li class="nav-item">
                  <a class="nav-link btn active" id="pills-areamedica-tab" data-toggle="pill" href="#pills-areamedica" role="tab" aria-controls="pills-areamedica" aria-selected="false">
                    Área Médica
                  </a>
                 </li>
                  <?php } ?>
                  <!-- /Tabs Área Médica -->

                  <!-- Tabs que verá Sistemas -->
                  <?php if($this->session->userdata('tipo') == 2){ ?>
                    <li class="nav-item">
                  <a class="nav-link btn active" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                    Sistemas
                  </a>
                 </li>
                  <?php } ?>
                  <!-- Tabs Sistemas -->

                  <!-- Tabs que verán Seguridad e higiene -->
                    <?php if($this->session->userdata('tipo') == 10){ ?>
                <li class="nav-item">
                  <a class="nav-link btn active" id="pills-ehs-tab" data-toggle="pill" href="#pills-ehs" role="tab" aria-controls="pills-ehs" aria-selected="false">
                    EHS
                  </a>
                 </li>
                    <?php } ?>
                  <!-- /Tabs Seguridad e Higiene -->

                  <!-- Tabs que verán Almacen General -->
                  <?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50 && !$_SESSION['tipo_anterior']){ ?>
                    <li class="nav-item">
                  <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
                    Almacen general
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                    Refacciones Control Vehicular
                  </a>
                </li>               
                    <?php } ?>
                  <!-- /Tabs Almacen General -->

                  <!-- Tabs que verán Subalmacenes -->
                  <?php if($_SESSION['tipo_anterior'] && $this->session->userdata('tipo_anterior') == 23){ ?>
                    <li class="nav-item">
                    <a class="nav-link btn active" id="pills-ehs-tab" data-toggle="pill" href="#pills-ehs" role="tab" aria-controls="pills-ehs" aria-selected="false">
                    Seguridad e Higiene
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                    Refacciones Control Vehicular
                  </a>
                </li>               
                    <?php } ?>
                  <!-- /Tabs Almacen General -->

                  <!-- Tabs que verán Kuali -->
                  <?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50){ ?>
                    <li class="nav-item">
                  <a class="nav-link btn active" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
                    Kuali
                  </a>
                </li>               
                    <?php } ?>
                  <!-- /Tabs Kuali -->
              </ul>
              
              <div class="tab-content" id="pills-tabContent">

                <!-- Datos a mostrar en Alto Costo y RH -->
                <?php if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 5 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 12){ ?>
                
                  <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
                  <!---->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link btn active" data-toggle="pill" href="#asignacionesActivas" role="tab" aria-selected="true">
                        Herramienta
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#activofijo" role="tab" aria-selected="true">
                        Activo Fijo
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#asignacionesConsumibles" role="tab" aria-selected="true">Consumibles</a>
                    </li>
                  </ul>
                  <!-- Tab panes -->
                  <form action="" class="needs-validation" id="formuploadajax_justificaciones" novalidate method="post">
                  <div class="tab-content">
                    <div class="tab-pane active" id="asignacionesActivas">
                      <div class="table-responsive">
                        <table style="width: 100%" class="dataTable table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Folio</th>
                              <th>Fecha de asignación</th>
                              <th>Neodata</th>
                              <th>Equipo</th>
                              <th>Serie</th>
                              <th>N° Interno</th> 
                            
                              <th>Modelo</th>                  
                              <th>Unidades</th>
                              <th>Unidad de medida</th>
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesActivas) : ?>
                              <?php foreach ($asignacionesActivas as $key => $value) : ?>
                                <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                                  <tr>
                                    <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                    </td>
                                    <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                    </td>
                                   <td><?= $value->neodata ?></td>
                                    <td><?php echo $value->descripcion ?></td>                                    
                                    <td><?php echo $value->numero_serie ?></td>
                                    <td><?php echo $value->numero_interno ?></td>  
                                   
                                    <td><?php echo $value->modelo ?></td>    
                                    <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
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
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="activofijo">
                      <div class="table-responsive">
                        <table style="width: 100%" class="dataTable table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Folio</th>
                              <th>Fecha de asignación </th>
                              <th>Equipo</th>
                              <th>Serie</th>
                              <th>N° Interno</th>
                              <th>Marca</th>
                              <th>Modelo</th>
                              <th>Unidades</th>
                              <th>Unidad de medida</th>
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($activofijo) : ?>
                              <?php foreach ($activofijo as $key => $value) : ?>
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
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
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
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="asignacionesEPP">
                      <div class="table-responsive">
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
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesEPP) : ?>
                              <?php foreach ($asignacionesEPP as $key => $value) : ?>
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
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
                                    <?php if ($value->tipo_moneda == 'd') : ?>
                                      <?php $value->precio = $value->precio * $precio_dolar;
                                      $total += $value->precio * $value->cantidad ?>
                                    <?php endif ?>
                                    <td>$<?php echo number_format($value->precio, 2) ?></td>
                                    <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                    <?php if($this->session->userdata("tipo") == 5 && ($value->categoria == 'HERRAMIENTA' || $value->categoria == 'ACTIVO FIJO')){ ?>
                                      <td><input type="checkbox"class="form-control" name="material_justificar[]" data-equipo='<?= $value->descripcion ?>' data-unidades='<?= $value->cantidad ?>' data-catalogo='<?= $value->tbl_catalogo_idtbl_catalogo ?>' data-precio='<?= $value->precio ?>' value="<?= $value->iddtl_asignacion ?>"></td>
                                <?php } ?>
                                  </tr>
                                <?php endif ?>
                              <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="asignacionesUniforme">
                      <div class="table-responsive">
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
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesUniformes) : ?>
                              <?php foreach ($asignacionesUniformes as $key => $value) : ?>
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
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
                                    <?php if ($value->tipo_moneda == 'd') : ?>
                                      <?php $value->precio = $value->precio * $precio_dolar;
                                      $total += $value->precio * $value->cantidad ?>
                                    <?php endif ?>
                                    <td>$<?php echo number_format($value->precio, 2) ?></td>
                                    <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                    <?php if($this->session->userdata("tipo") == 5 && ($value->categoria == 'HERRAMIENTA' || $value->categoria == 'ACTIVO FIJO')){ ?>
                                      <td><input type="checkbox"class="form-control" name="material_justificar[]" data-equipo='<?= $value->descripcion ?>' data-unidades='<?= $value->cantidad ?>' data-catalogo='<?= $value->tbl_catalogo_idtbl_catalogo ?>' data-precio='<?= $value->precio ?>' value="<?= $value->iddtl_asignacion ?>"></td>
                                <?php } ?>
                                  </tr>
                                <?php endif ?>
                              <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="asignacionesConsumibles">
                      <div class="table-responsive">
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
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesConsumibles) : ?>
                              <?php foreach ($asignacionesConsumibles as $key => $value) : ?>
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
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
                                    <?php if ($value->tipo_moneda == 'd') : ?>
                                      <?php $value->precio = $value->precio * $precio_dolar;
                                      $total += $value->precio * $value->cantidad ?>
                                    <?php endif ?>
                                    <td>$<?php echo number_format($value->precio, 2) ?></td>
                                    <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                    <?php if($this->session->userdata("tipo") == 5 && ($value->categoria == 'HERRAMIENTA' || $value->categoria == 'ACTIVO FIJO')){ ?>
                                      <td><input type="checkbox"class="form-control" name="material_justificar[]" data-equipo='<?= $value->descripcion ?>' data-unidades='<?= $value->cantidad ?>' data-catalogo='<?= $value->tbl_catalogo_idtbl_catalogo ?>' data-precio='<?= $value->precio ?>' value="<?= $value->iddtl_asignacion ?>"></td>
                                <?php } ?>
                                  </tr>
                                <?php endif ?>
                              <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="tab-pane fade" id="pills-devolucion" role="tabpanel" aria-labelledby="pills-devolucion-tab">
                  <!---->
                  <a class="btn btn-info" href="<?php echo base_url() ?>personal/impAsignacionesAC/<?php echo $uid; ?>" onClick="openWin(this)"><i class="fa fa-print"><span></i>Imprimir Asignaciones</span></a>
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAC) : ?>
                          <?php foreach ($asignacionesAC as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  
                  <?php if ($this->session->userdata('tipo') == '1') : ?>
                    <!-- Si el usuario es de alto costo -->
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_herramienta" class="btn btn-secondary">Nueva
                        asignación Herramienta</button>
                      <button type="button" id="nuevaAsignacion_alto-costo" class="btn btn-warning">Nueva asignación
                        Activo Fijo</button>
                      <!--<button type="button" id="nuevaAsignacion_hilti" class="btn btn-success">Nueva asignación
            HILTI</button>-->
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">Nueva asignación
                        Consumible</button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">Retirar
                        consumible y/o herramienta</a>
                      <a href="<?php echo base_url() . 'almacen/detalle-personal/' . $detalle->uid_usuario ?>" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i class="fa fa-info-circle"></i></a>
                    </div>
                  <?php endif ?>

                  <hr>
                  <div class="table-responsive">
                    <h1>Incidencias</h1>
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Unidad</th>
                          <th>Placas</th>
                          <th>Incidencia</th>
                          <th>Fecha</th>
                          <th>Costo</th>
                          <th>Estatus C.V.</th>
                          <th>Comentarios Estatus C.V.</th>
                          <th>Estatus Contabilidad</th>
                          <th>Comentarios Estatus Contabilidad</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php foreach($incidencias as $inc) { ?>
                          <tr class="<?= $inc->estatus == 'Reparada' ? 'table-success' : 'table-warning' ?>">
                            <td><?= $inc->idtbl_incidencias ?></td>
                            <td><?= $inc->numero_interno ?></td>
                            <td><?= $inc->placas ?></td>
                            <td><?= $inc->incidencia ?></td>
                            <td><?= $inc->fecha_incidencia ?></td>
                            <td><?= $inc->costo ?></td>
                            <td><?= $inc->estatus ?></td>
                            <td><?= $inc->comentario_estatus ?></td>
                            <td><?= $inc->estatus_contabilidad ?></td>
                            <td><?= $inc->comentario_estatus_contabilidad ?></td>
                            <td><a href="#editar_estatus_incidencia" data-comentario_estatus="<?= $inc->comentario_estatus ?>" data-idtbl_incidencias="<?= $inc->idtbl_incidencias ?>" data-incidencia="<?= $inc->incidencia ?>" data-unidad="<?= $inc->numero_interno ?>" data-fecha_incidencia="<?= $inc->fecha_incidencia ?>" data-costo="<?= $inc->costo ?>" data-estatus="<?= $inc->estatus ?>" data-toggle="modal"><i class="fa fa-edit"></i></a><a target="__blank" href="<?= base_url(); ?>uploads/incidencias/<?= $inc->documento_incidencia ?>.pdf"><i class='fa fa-eye'></i></a></td>
                          </tr>
                          <?php $total = $total + $inc->costo; ?>
                        <?php } ?>
                      </tbody>
                      <tr>
                        <th colspan="10" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>
                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == 1) { ?>
                    <div class="card-footer">
                      
                      <a href='#nueva_incidencia' data-toggle='modal' class='btn btn-primary' title='Nueva Incidencia' data-operador='<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>' data-idtbl_usuarios='<?= $detalle->idtbl_usuarios ?>'>Nueva Incidencia</a>
                      
                    </div>
                  <?php } ?>
                </div>
                <div class="tab-pane fade" id="pills-kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesKualiT) : ?>
                          <?php foreach ($asignacionesKualiT as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  
                </div>
                <!--tab de control vehicular-->
                <div class="tab-pane fade" id="pills-control-vehicular" role="tabpanel" aria-labelledby="pills-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAutosControlVehicular) : ?>
                          <?php foreach ($asignacionesAutosControlVehicular as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  
                  <hr>
                  <div class="table-responsive">
                    <h1>Incidencias</h1>
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Unidad</th>
                          <th>Placas</th>
                          <th>Incidencia</th>
                          <th>Fecha</th>
                          <th>Costo</th>
                          <th>Estatus C.V.</th>
                          <th>Comentarios Estatus C.V.</th>
                          <th>Estatus Contabilidad</th>
                          <th>Comentarios Estatus Contabilidad</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php foreach($incidencias as $inc) { ?>
                          <?php if($inc->estatus_contabilidad == 'Recibido') { ?>
                            <?php $clase = 'table-primary'; ?>
                          <?php } else if($inc->estatus_contabilidad == 'Pagado') { ?>
                            <?php $clase = 'table-success'; ?>
                          <?php } else {?>
                            <?php $clase = 'table-warning' ?>
                          <?php } ?>
                          <tr class="<?= $clase ?>">
                            <td><?= $inc->idtbl_incidencias ?></td>
                            <td><?= $inc->numero_interno ?></td>
                            <td><?= $inc->placas ?></td>
                            <td><?= $inc->incidencia ?></td>
                            <td><?= $inc->fecha_incidencia ?></td>
                            <td><?= $inc->costo ?></td>
                            <td><?= $inc->estatus ?></td>
                            <td><?= $inc->comentario_estatus ?></td>
                            <td><?= $inc->estatus_contabilidad ?></td>
                            <td><?= $inc->comentario_estatus_contabilidad ?></td>
                          </tr>
                          <?php $total = $total + $inc->costo; ?>
                        <?php } ?>
                      </tbody>
                      <tr>
                        <th colspan="9" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>
                    </table>
                  </div>
                  <?php if($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <?php if(sizeof($prueba_manejo) == 0) { ?>
                        <button type="button" id="pruebaManejo" class="btn btn-secondary">
                          Prueba de Manejo
                        </button>
                      <?php } ?>
                      <?php if(sizeof($prueba_manejo) != 0) { ?>
                        <button type="button" id="pruebaManejoA" class="btn btn-secondary">
                          Editar Prueba de Manejo
                        </button>
                      <?php } ?>
                      <button type="button" id="nuevaAsignacion_control-vehicular" class="btn btn-warning">
                        Nueva asignación de Control Vehicular
                      </button>
                    </div>
                  <?php } ?>
                </div>
                <!--fin de tab control vehicular-->

                <!-- Tab Área Médica -->
                <div class="tab-pane fade" id="pills-areamedica" role="tabpanel" aria-labelledby="pills-areamedica-tab">
                  <!---->
                  <a class="btn btn-info" href="<?php echo base_url() ?>personal/impAsignacionesAreaMedica/<?php echo $uid; ?>" onClick="openWin(this)"><i class="fa fa-print"><span></i>Imprimir Asignaciones</span></a>
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5 && ($value->categoria == 'HERRAMIENTA' || $value->categoria == 'ACTIVO FIJO')){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAreaMedica) : ?>
                          <?php foreach ($asignacionesAreaMedica as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                              
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  
                  <?php if ($this->session->userdata('tipo') == '14' || $this->departamentos_model->permisos('almacen_area_medica') > 1) : ?>
                    <!-- Si el usuario es de área médica -->
                    <div class="card-footer">
                      <!--<button type="button" id="nuevaAsignacion_herramienta" class="btn btn-secondary">Nueva
                        asignación Herramienta</button>-->
                      <!--<button type="button" id="nuevaAsignacion_alto-costo" class="btn btn-warning">Nueva asignación
                        Alto Costo</button>-->
                      <!--<button type="button" id="nuevaAsignacion_hilti" class="btn btn-success">Nueva asignación
            HILTI</button>-->
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">Nueva asignación
                        Material</button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">Retirar
                        material y/o herramienta</a>                     
                    </div>
                  <?php endif ?>
                </div>
                    <!-- /Tab de área Médica -->

                <!--tab refacciones control vehicular-->
                <div class="tab-pane fade" id="pills-refacciones-control-vehicular" role="tabpanel" aria-labelledby="pills-refacciones-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesRefaccionesControlVehicular) : ?>
                          <?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  
                  <?php if($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_refaccion" class="btn btn-dark">
                        Nueva asignación refacción
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>/refacciones" class="btn btn-danger">
                        Retirar refacción
                      </a>
                    </div>
                  <?php } ?>
                </div>
                <!--fin de tab refacciones control vehicular-->

                    <!--tab tarjetas-->
                <div class="tab-pane fade" id="pills-tarjetas" role="tabpanel" aria-labelledby="pills-tarjetas-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesRefaccionesControlVehicular) : ?>
                          <?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>                    
                  </div>
                  <?php if($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_refaccion" class="btn btn-dark">
                        Nueva asignación refacción
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>/refacciones" class="btn btn-danger">
                        Retirar refacción
                      </a>
                    </div>
                  <?php } ?>
                </div>
                <!--fin de tab tarjetas-->

                <!--Inicio de tab sistemas-->
                <div class="tab-pane fade" id="pills-sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
                  <!---->
                  <!--<a class="btn btn-info" href="<?php echo base_url() ?>personal/impAsignacionesAC/<?php echo $uid; ?>" onClick="openWin(this)"><i class="fa fa-print"><span></i>Imprimir Asignaciones</span></a>-->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesSistemas) : ?>
                          <?php foreach ($asignacionesSistemas as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  
                  <?php if ($this->session->userdata('tipo') == '2') : ?>
                    <!-- Si el usuario es de alto costo -->
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_sistemas" class="btn btn-warning">
                        Nueva asignación Activo Fijo
                      </button>
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">
                        Nueva asignación Consumible
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">
                        Retirar material
                      </a>
                      <a href="<?php echo base_url() . 'almacen/detalle-personal/' . $detalle->uid_usuario ?>" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i class="fa fa-info-circle"></i></a>
                    </div>
                  <?php endif ?>
                </div>
                <!--Fin de tab sistemas-->
                <div class="tab-pane fade" id="pills-seguridad-e-higiene" role="tabpanel" aria-labelledby="pills-sistemas-tab">
                  <!---->
                  <!--<a class="btn btn-info" href="<?php echo base_url() ?>personal/impAsignacionesAC/<?php echo $uid; ?>" onClick="openWin(this)"><i class="fa fa-print"><span></i>Imprimir Asignaciones</span></a>-->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesEHS) : ?>
                          <?php foreach ($asignacionesEHS as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5 && ($value->categoria == 'HERRAMIENTA' || $value->categoria == 'ACTIVO FIJO')){ ?>
                                  <td><input type="checkbox"class="form-control" name="material_justificar[]" data-equipo='<?= $value->descripcion ?>' data-unidades='<?= $value->cantidad ?>' data-catalogo='<?= $value->tbl_catalogo_idtbl_catalogo ?>' data-precio='<?= $value->precio ?>' value="<?= $value->iddtl_asignacion ?>"></td>
                                <?php } ?>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == '2') : ?>
                    <!-- Si el usuario es de alto costo -->
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_sistemas" class="btn btn-warning">
                        Nueva asignación Activo Fijo
                      </button>
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">
                        Nueva asignación Consumible
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">
                        Retirar material
                      </a>
                      <a href="<?php echo base_url() . 'almacen/detalle-personal/' . $detalle->uid_usuario ?>" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i class="fa fa-info-circle"></i></a>
                    </div>
                  <?php endif ?>
                  
                  
                </div>
                </form>
                <?php if($this->session->userdata('tipo') == 5){ ?>
                  <a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#justificar_asignaciones">Justificar Asignaciones</a>
                      <?php } ?>
                  <?php } ?>
                  <!-- /Datos Alto Costo y RH -->

                  <!-- Datos a mostrar en Control Vehicular -->
                  <?php if($this->session->userdata('tipo') == 3){ ?>
                  <!--tab de control vehicular-->
                <div class="tab-pane fade show active" id="pills-control-vehicular" role="tabpanel" aria-labelledby="pills-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAutosControlVehicular) : ?>
                          <?php foreach ($asignacionesAutosControlVehicular as $key => $value) : ?>
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
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
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

                      <tr>
                        <th colspan="12" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <hr>
                  <div class="table-responsive">
                    <h1>Incidencias</h1>
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Unidad</th>
                          <th>Placas</th>
                          <th>Incidencia</th>
                          <th>Fecha</th>
                          <th>Costo</th>
                          <th>Estatus C.V.</th>
                          <th>Comentarios Estatus C.V.</th>
                          <th>Estatus Contabilidad</th>
                          <th>Comentarios Estatus Contabilidad</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php foreach($incidencias as $inc) { ?>
                          <tr class="<?= $inc->estatus == 'Reparada' ? 'table-success' : 'table-warning' ?>">
                            <td><?= $inc->idtbl_incidencias ?></td>
                            <td><?= $inc->numero_interno ?></td>
                            <td><?= $inc->placas ?></td>
                            <td><?= $inc->incidencia ?></td>
                            <td><?= $inc->fecha_incidencia ?></td>
                            <td><?= $inc->costo ?></td>
                            <td><?= $inc->estatus ?></td>
                            <td><?= $inc->comentario_estatus ?></td>
                            <td><?= $inc->estatus_contabilidad ?></td>
                            <td><?= $inc->comentario_estatus_contabilidad ?></td>
                            <td><a href="#editar_estatus_incidencia" data-comentario_estatus="<?= $inc->comentario_estatus ?>" data-idtbl_incidencias="<?= $inc->idtbl_incidencias ?>" data-incidencia="<?= $inc->incidencia ?>" data-unidad="<?= $inc->numero_interno ?>" data-fecha_incidencia="<?= $inc->fecha_incidencia ?>" data-costo="<?= $inc->costo ?>" data-estatus="<?= $inc->estatus ?>" data-toggle="modal"><i class="fa fa-edit"></i></a><a target="__blank" href="<?= base_url(); ?>uploads/incidencias/<?= $inc->documento_incidencia ?>.pdf"><i class='fa fa-eye'></i></a></td>
                          </tr>
                          <?php $total = $total + $inc->costo; ?>
                        <?php } ?>
                      </tbody>
                      <tr>
                        <th colspan="10" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>
                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <?php if (sizeof($prueba_manejo) == 0) { ?>
                        <button type="button" id="pruebaManejo" class="btn btn-secondary">
                          Prueba de Manejo
                        </button>
                      <?php } ?>
                      <?php if (sizeof($prueba_manejo) != 0) { ?>
                        <button type="button" id="pruebaManejoA" class="btn btn-secondary">
                          Editar Prueba de Manejo
                        </button>
                      <?php } ?>
                      <a href='#nueva_incidencia' data-toggle='modal' class='btn btn-primary' title='Nueva Incidencia' data-operador='<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>' data-idtbl_usuarios='<?= $detalle->idtbl_usuarios ?>'>Nueva Incidencia</a>
                      <button type="button" id="nuevaAsignacion_control-vehicular" class="btn btn-warning">
                        Nueva asignación de Control Vehicular
                      </button>
                    </div>
                  <?php } ?>
                </div>
                <!--fin de tab control vehicular-->

                <!--tab refacciones control vehicular-->
                <div class="tab-pane fade" id="pills-refacciones-control-vehicular" role="tabpanel" aria-labelledby="pills-refacciones-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesRefaccionesControlVehicular) : ?>
                          <?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
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
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
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

                      <tr>
                        <th colspan="12" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_refaccion" class="btn btn-dark">
                        Nueva asignación refacción
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>/refacciones" class="btn btn-danger">
                        Retirar refacción
                      </a>
                    </div>
                  <?php } ?>
                </div>


                 <!--tab tarjetas-->
                 <div class="tab-pane fade" id="pills-tarjetas" role="tabpanel" aria-labelledby="pills-tarjetas-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesTarjetas) : ?>
                          <?php foreach ($asignacionesTarjetas as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5){ ?>
                                  <td><?php if($value->estatus_devolucion_rh == NULL){ ?><a class="btn" data-iddtl-asignacion="<?= $value->iddtl_asignacion ?>" data-toggle="modal" data-target="#justificar_asignacion"><i class="fa fa-upload" aria-hidden="true"></i></a> <?php } else { ?> <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><?php } ?></td>
                                <?php } ?>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                    <?php if ($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_tarjeta" class="btn btn-warning"> 
                        Nueva asignación de tarjeta
                      </button> 
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>/tarjetas" type="button" class="btn btn-danger"> 
                        Retirar tarjeta
                  </a>                       
                    </div>
                  <?php } ?>
     
                  </div>                  
                </div>
                <!--fin de tab tarjetas-->
                  <?php } ?>
                <!--fin de tab refacciones control vehicular-->
                <!-- /Datos Control Vehicular -->

                <!-- Datos a mostrar en Área Médica -->
                <?php if($this->session->userdata('tipo') == 14){ ?>
                    <!-- Tab Área Médica -->
                <div class="tab-pane fade show active" id="pills-areamedica" role="tabpanel" aria-labelledby="pills-areamedica-tab">
                  <!---->
                  <a class="btn btn-info" href="<?php echo base_url() ?>personal/impAsignacionesAreaMedica/<?php echo $uid; ?>" onClick="openWin(this)"><i class="fa fa-print"><span></i>Imprimir Asignaciones</span></a>
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
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
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
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

                      <tr>
                        <th colspan="12" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == '14' || $this->departamentos_model->permisos('almacen_area_medica') > 1) : ?>
                    <!-- Si el usuario es de área médica -->
                    <div class="card-footer">
                      <!--<button type="button" id="nuevaAsignacion_herramienta" class="btn btn-secondary">Nueva
                        asignación Herramienta</button>-->
                      <!--<button type="button" id="nuevaAsignacion_alto-costo" class="btn btn-warning">Nueva asignación
                        Alto Costo</button>-->
                      <!--<button type="button" id="nuevaAsignacion_hilti" class="btn btn-success">Nueva asignación
            HILTI</button>-->
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">Nueva asignación
                        Material</button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">Retirar
                        material y/o herramienta</a>                     
                    </div>
                  <?php endif ?>
                </div>
                  <?php } ?>
                    <!-- /Tab de área Médica -->
                <!-- /Datos Área Médica -->

                <!-- Datos a mostrar en Sistemas -->
                    <?php if($this->session->userdata('tipo') == 2){ ?>
                      <!--Inicio de tab sistemas-->
                <div class="tab-pane fade show active" id="pills-sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
                  <!---->
                  <!--<a class="btn btn-info" href="<?php echo base_url() ?>personal/impAsignacionesAC/<?php echo $uid; ?>" onClick="openWin(this)"><i class="fa fa-print"><span></i>Imprimir Asignaciones</span></a>-->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesSistemas) : ?>
                          <?php foreach ($asignacionesSistemas as $key => $value) : ?>
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
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
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

                      <tr>
                        <th colspan="12" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <hr>
                  <div class="table-responsive">
                    <h1>Incidencias</h1>
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Unidad</th>                          
                          <th>Incidencia</th>
                          <th>Fecha</th>
                          <th>Costo</th>
                          <th>Estatus Sistemas</th>
                          <th>Comentarios Estatus Sistemas</th>
                          <th>Estatus Contabilidad</th>
                          <th>Comentarios Estatus Contabilidad</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php foreach($incidencias_sistemas as $inc) { ?>
                          <?php if($inc->estatus_contabilidad == 'Recibido') { ?>
                            <?php $clase = 'table-primary'; ?>
                          <?php } else if($inc->estatus_contabilidad == 'Pagado') { ?>
                            <?php $clase = 'table-success'; ?>
                          <?php } else {?>
                            <?php $clase = 'table-warning' ?>
                          <?php } ?>
                          <tr class="<?= $clase ?>">
                            <td><?= $inc->idtbl_incidencias ?></td>
                            <td><?= $inc->numero_interno ?></td>                            
                            <td><?= $inc->incidencia ?></td>
                            <td><?= $inc->fecha_incidencia ?></td>
                            <td><?= $inc->costo ?></td>
                            <td><?= $inc->estatus ?></td>
                            <td><?= $inc->comentario_estatus ?></td>
                            <td><?= $inc->estatus_contabilidad ?></td>
                            <td><?= $inc->comentario_estatus_contabilidad ?></td>
                            <td><a href="#editar_estatus_incidencia" data-comentario_estatus="<?= $inc->comentario_estatus ?>" data-idtbl_incidencias="<?= $inc->idtbl_incidencias ?>" data-incidencia="<?= $inc->incidencia ?>" data-unidad="<?= $inc->numero_interno ?>" data-fecha_incidencia="<?= $inc->fecha_incidencia ?>" data-costo="<?= $inc->costo ?>" data-estatus="<?= $inc->estatus ?>" data-toggle="modal"><i class="fa fa-edit"></i></a><a target="__blank" href="<?= base_url(); ?>uploads/incidencias/<?= $inc->documento_incidencia ?>.pdf"><i class='fa fa-eye'></i></a></td>
                          </tr>
                          <?php $total = $total + $inc->costo; ?>
                        <?php } ?>
                      </tbody>
                      <tr>
                        <th colspan="9" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>
                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == '2') : ?>
                    <!-- Si el usuario es de alto costo -->
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_sistemas" class="btn btn-warning">
                        Nueva asignación Activo Fijo
                      </button>
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">
                        Nueva asignación Consumible
                      </button>
                      <button type="button" id="nuevaAsignacion_herramienta" class="btn btn-secondary">Nueva
                        asignación Herramienta</button>
                      <a href='#nueva_incidencia' data-toggle='modal' class='btn btn-primary' title='Nueva Incidencia' data-operador='<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>' data-idtbl_usuarios='<?= $detalle->idtbl_usuarios ?>'>Nueva Incidencia</a>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">
                        Retirar material
                      </a>
                      <a href="<?php echo base_url() . 'almacen/detalle-personal/' . $detalle->uid_usuario ?>" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i class="fa fa-info-circle"></i></a>
                    </div>
                  <?php endif ?>
                </div>
                <!--Fin de tab sistemas-->
                    <?php } ?>
                <!-- /Datos Sistemas -->

                <!-- Datos a mostrar para Seguridad e Higiene -->
                <?php if($this->session->userdata('tipo') == 10){ ?>

                    <!-- Tab Área Médica -->
                <div class="tab-pane active show fade" id="pills-ehs" role="tabpanel" aria-labelledby="pills-ehs-tab">
                  <!---->
                  <a class="btn btn-info" href="<?php echo base_url() ?>personal/impAsignacionesAreaMedica/<?php echo $uid; ?>" onClick="openWin(this)"><i class="fa fa-print"><span></i>Imprimir Asignaciones</span></a>
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesEHS) : ?>
                          <?php foreach ($asignacionesEHS as $key => $value) : ?>
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
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
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

                      <tr>
                        <th colspan="12" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == '10' || $this->departamentos_model->permisos('almacen_area_medica') > 1) : ?>
                    <!-- Si el usuario es de área médica -->
                    <div class="card-footer">
                      <!--<button type="button" id="nuevaAsignacion_herramienta" class="btn btn-secondary">Nueva
                        asignación Herramienta</button>-->
                      <!--<button type="button" id="nuevaAsignacion_alto-costo" class="btn btn-warning">Nueva asignación
                        Alto Costo</button>-->
                      <!--<button type="button" id="nuevaAsignacion_hilti" class="btn btn-success">Nueva asignación
            HILTI</button>-->
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">Nueva asignación
                        Material</button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">Retirar
                        material y/o herramienta</a>                     
                    </div>
                  <?php endif ?>
                </div>
                  <?php } ?>
                    <!-- /Tab de área Médica -->
                <!-- /Datos Seguridad e Higiene -->

                <!-- Datos a mostrar para Almacen General -->
                <?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50 && !$_SESSION['tipo_anterior']){ ?>
                  <!-- Tab de datos de Almacen General -->
                  <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
                  <!---->
                  <!--<?= json_encode($asignacionesActivas) ?>-->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link btn active" data-toggle="pill" href="#asignacionesActivas" role="tab" aria-selected="true">
                        Herramienta
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#activofijo" role="tab" aria-selected="true">
                        Activo Fijo
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#asignacionesUniforme" role="tab" aria-selected="true">
                        Uniformes
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#asignacionesEPP" role="tab" aria-selected="true">
                        EPP
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#asignacionesConsumibles" role="tab" aria-selected="true">Consumibles</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane active" id="asignacionesActivas">
                      <div class="table-responsive">
                        <table style="width: 100%" class="dataTable table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Folio</th>
                              <th>Fecha de asignación</th>
                              <th>Neodata</th>
                              <th>Equipo</th>
                              <th>Serie</th>
                              <th>N° Interno</th>
                              
                              <th>Modelo</th>
                              <th>Unidades</th>
                              <th>Unidad de medida</th>
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesActivas) : ?>
                              <?php foreach ($asignacionesActivas as $key => $value) : ?>
                                <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                                  <tr>
                                    <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                    </td>
                                    <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                    </td>
                                    <td><?php echo $value->neodata ?></td>
                                    <td><?php echo $value->descripcion ?></td>
                                    <td><?php echo $value->numero_serie ?></td>
                                    <td><?php echo $value->numero_interno ?></td>
                                   
                                    <td><?php echo $value->modelo ?></td>
                                    <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
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
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="activofijo">
                      <div class="table-responsive">
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
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($activofijo) : ?>
                              <?php foreach ($activofijo as $key => $value) : ?>
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
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
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
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="asignacionesEPP">
                      <div class="table-responsive">
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
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesEPP) : ?>
                              <?php foreach ($asignacionesEPP as $key => $value) : ?>
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
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
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
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="asignacionesUniforme">
                      <div class="table-responsive">
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
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesUniformes) : ?>
                              <?php foreach ($asignacionesUniformes as $key => $value) : ?>
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
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
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
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="asignacionesConsumibles">
                      <div class="table-responsive">
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
                              <th>Categoría</th>
                              <th>Nota</th>
                              <th>Precio</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesConsumibles) : ?>
                              <?php foreach ($asignacionesConsumibles as $key => $value) : ?>
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
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td><?php echo $value->nota ?></td>
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
                          <tfoot>
                            <tr>
                              <th colspan="12" style="text-align:right">Total:</th>
                              <th>$<?= number_format($total, 2) ?></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Tab de datos de Almacen General -->

                

                <!--tab refacciones control vehicular-->
                <div class="tab-pane fade" id="pills-refacciones-control-vehicular" role="tabpanel" aria-labelledby="pills-refacciones-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesRefaccionesControlVehicular) : ?>
                          <?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
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
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
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

                      <tr>
                        <th colspan="12" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_refaccion" class="btn btn-dark">
                        Nueva asignación refacción
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>/refacciones" class="btn btn-danger">
                        Retirar refacción
                      </a>
                    </div>
                  <?php } ?>
                </div>



                <?php } ?>
                <!-- /Datos Almacen General -->


                <!-- Datos a mostrar para Almacen General -->
                <?php if($_SESSION['tipo_anterior'] && $this->session->userdata('tipo_anterior') == 23){ ?>
                  

                 <!-- Tab Ehs -->
                 <div class="tab-pane active show fade" id="pills-ehs" role="tabpanel" aria-labelledby="pills-ehs-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesEHS) : ?>
                          <?php foreach ($asignacionesEHS as $key => $value) : ?>
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
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
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

                      <tr>
                        <th colspan="12" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == '10' || $this->departamentos_model->permisos('almacen_area_medica') > 1) : ?>
                    <!-- Si el usuario es de área médica -->
                    <div class="card-footer">
                      <!--<button type="button" id="nuevaAsignacion_herramienta" class="btn btn-secondary">Nueva
                        asignación Herramienta</button>-->
                      <!--<button type="button" id="nuevaAsignacion_alto-costo" class="btn btn-warning">Nueva asignación
                        Alto Costo</button>-->
                      <!--<button type="button" id="nuevaAsignacion_hilti" class="btn btn-success">Nueva asignación
            HILTI</button>-->
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">Nueva asignación
                        Material</button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">Retirar
                        material y/o herramienta</a>                     
                    </div>
                  <?php endif ?>
                </div>

                <!--tab refacciones control vehicular-->
                <div class="tab-pane fade" id="pills-refacciones-control-vehicular" role="tabpanel" aria-labelledby="pills-refacciones-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
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
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesRefaccionesControlVehicular) : ?>
                          <?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
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
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
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

                      <tr>
                        <th colspan="12" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_refaccion" class="btn btn-dark">
                        Nueva asignación refacción
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>/refacciones" class="btn btn-danger">
                        Retirar refacción
                      </a>
                    </div>
                  <?php } ?>
                </div>



                <?php } ?>
                <!-- /Datos Sub almacenes -->


                <!-- Datos a mostrar para Kuali -->
                <?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50){ ?>
                  <!-- Tab de datos de Kuali -->
                  <div class="tab-pane fade show active" id="pills-kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Neodata</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesKualiT) : ?>
                          <?php foreach ($asignacionesKualiT as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr>
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->neodata ?></td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                           
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
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

                      <tr>
                        <th colspan="12" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                </div>
                <!-- /Tab de datos de Kuali -->
                <?php } ?>
                <!-- /Datos Kuali -->
              </div>
            </div>

          </div>

          <?php if ($this->session->userdata('tipo') == '4' || $this->session->userdata('id') == 322) : ?>
            <div class="text-right" style="box-sizing: border-box; padding: 10px;">
            <a href="<?php echo base_url() ?>almacen/devolucion-almacen/<?= $detalle->uid_usuario ?>" class="btn btn-danger">Retirar
              material y/o herramienta</a>
            </div>
          <?php endif ?>
          <?php 
            if($this->session->userdata("tipo") == 10){
          ?>
            <div class="text-right" style="box-sizing: border-box; padding: 10px;">
              <button type="button" class="btn btn-info" id="carta-patronal">Carta Patronal</button>
              <button type="button" class="btn btn-info" id="convenio-salida">Convenio Salida</button>
              <button type="button" class="btn btn-info" id="ofi-remis">Oficio de Remis</button>
            </div>
          <?php 
            }
          ?>
        </div>
        <!-- Asignaciones -->
        <?php if ($this->session->userdata('permisos')['personal'] > 1) : ?>
        <!-- Expediente  -->
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4 class="h4">Documentos</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" style="width: 100%">
                <thead>
                  <tr>
                    <th>Documento</th>
                    <th>Actualización</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $ine = false ?>
                  <?php if (isset($documentos_asignados) && sizeof($documentos_asignados) > 0) : ?>
                    <?php foreach ($documentos_asignados as $key => $value) : ?>
                      <?php if ((ID_INE == $value->tbl_documentos_idtbl_documentos && $this->session->userdata('tipo') == 1) ||  $this->session->userdata('tipo') != 1) : ?>
                        <?php $ine = (ID_INE == $value->tbl_documentos_idtbl_documentos) ? true : false ?>
                        <tr>
                          <td><a href="<?php echo base_url() . 'uploads/' . $detalle->uid_usuario . '/documentos/' . $value->uid . '.pdf' ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><?= $value->documento ?></a>
                          </td>
                          <td><?= strftime("%d de %b de %Y a las %r", strtotime($value->fecha_creacion)) ?>
                          </td>
                          <td>
                            <?php if ($this->session->userdata('tipo') != 1) : ?>
                              <a href="#" data-toggle="modal" data-target="#editar_documento" data-uid-documento="<?= $value->uid ?>" data-uid-usuario="<?= $detalle->uid_usuario ?>">Editar</a>
                              <a href="<?php echo base_url() . 'personal/eliminar/documentos/' . $detalle->uid_usuario . '/' . $value->uid . '/' . $token ?>" title="">Eliminar</a>
                          </td>
                        <?php endif ?>
                        </tr>
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php else : ?>
                    <tr>
                      <td colspan="3" align="center">Ningun documento asignado</td>
                    </tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
            <br>
            <?php if (
              $detalle->estatus == 1 &&
              (isset($this->session->userdata('permisos')['personal']) &&
                $this->session->userdata('permisos')['personal'] > 1 ||
                ($this->session->userdata('tipo') == 1 && !$ine))
            ) : ?>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#documento">Nuevo
                Documento</button>
            <?php endif ?>
          </div>
        </div>
        <!-- Expediente  -->
        <!-- Cronología  -->
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4 class="h4">Cronología</h4>
          </div>
          <div class="card-body">
            <div id="calendar"></div>
          </div>
        </div>
        <!-- Cronología  -->
        <?php endif ?>
      </div>
    </div>
  </div>
</section> <!--Detalles de baja-->
<section>
<!-- Detalles de baja para personal inactivo-->
<div class="modal fade" id="bajaedit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open(base_url() . 'personal/bajaEdit', 'class="needs-validation" novalidate id="ajaxeditarnota"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Detalles Baja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Fecha de baja</label>
          <?php foreach ($editar as $baja) { ?>	            
            <p class="form-control" value="" type="date" name="fechaeditada" disabled><?= $baja->fecha?></p>                      
        </div>                
        <div class="form-group">
          <label>Tipo</label>
          <select name="tipo_baja" class="form-control" disabled>
            <option value=""><?= $baja->tipo_baja ?></option>           
          </select>
        </div>
        <div class="form-group">
          <label>Motivo</label>
          <textarea name="motivo" id="motivoeditado" class="form-control" rows="5"><?= $baja->motivo ?></textarea>
        </div>         
        <div id="">
          <div class="row">
            <div class="col-6">
              Nombre del colaborador
            </div>
            <div class="col-6">
               Puesto
            </div>
            <div class="col-6 ">
              <p class="form-control font-weight-bold" value="" type="text" name="nombreeditado" disabled><?= $baja->nombres ?> <?= $baja->apellido_paterno ?> <?= $baja->apellido_materno ?></p>
            </div>
            <div class="col-6">
              <p class="form-control" value="" type="date" name="departamentoeditado" disabled><?= $detalle->perfil ?></p>
            </div>
            <div class="col-12">
              Departamento                       
            <div class="col-6">
            <p class="form-control" value="" type="date" name="departamentoeditado" disabled><?= $detalle->departamento ?></p>                           
            </div>   
          </div>                    
          </div>                                                                                                       
        </div>        
      </div>
      <?= form_hidden('id_baja', $baja->idtbl_alta_baja) ?>
        <?= form_hidden('uid', $detalle->uid_usuario) ?>
        <?= form_hidden('token', $token) ?>
        <?= form_hidden('nombre', $detalle->nombres) ?>   
      <div class="modal-footer">
           
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      <?php } ?>
    </div>
    </form>
  </div>
</div>
</section>
<div class="modal fade" id="baja" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelbaja" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open(base_url() . 'personal/baja', 'class="needs-validation" novalidate id="formuploadajax_baja"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabelbaja">Detalles Baja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Detalle de baja para personal activo -->
      <div class="modal-body">
        <div class="form-group">
          <label>Fecha de baja</label>
          <input type="date" name="fecha" value="" placeholder="" required class="form-control">
        </div>
        <div class="form-group">
          <label>Posible recontratación</label>
          <select name="termino" class="form-control" required>
            <option value="" disabled selected>Seleccione...</option>
            <option value="1">Viable</option>
            <option value="0">No viable</option>
          </select>
        </div>
        <div class="form-group">
          <label>Tipo</label>
          <select name="tipo_baja" class="form-control" required>
            <option value="Renuncia voluntaria">Renuncia voluntaria</option>
            <option value="Termino de contrato">Termino de contrato</option>
            <option value="Abandono">Abandono</option>
            <option value="Despido faltas injustificadas">Despido faltas injustificadas</option>
            <option value="Despido bajo desempeño">Despido bajo desempeño</option>
            <option value="Despido falta de probidad">Despido falta de probidad</option>
          </select>
        </div>
        <div class="form-group">
          <label>Motivo</label>
          <textarea name="motivo" class="form-control" rows="5"></textarea>
        </div>
        <div id="encuesta-salida-personal">
          <div class="row">
            <div class="col-6 font-weight-bold">
              Nombre del colaborador
            </div>
            <div class="col-6 font-weight-bold">
               Puesto
            </div>
            <div class="col-6 text-center">
              <?= $detalle->nombres ?> <?= $detalle->apellido_paterno ?> <?= $detalle->apellido_materno ?>
            </div>
            <div class="col-6 text-center">
               <?= $detalle->perfil ?>
            </div>
            <div class="col-6 font-weight-bold">
              Departamento
            </div>
            <div class="col-6 font-weight-bold">
               Antiguedad
            </div>
            <div class="col-6 text-center">
              <?= $detalle->departamento ?>
            </div>
            <div class="col-6 text-center">
               <?= number_format($dias_antiguedad / 365, 2) ?> años.
            </div>
          </div>
          <div class="row options">
            <div class="col-12 font-weight-bold">
              1.   ¿Por cual de las razones decide Ud. Retirarse de la Empresa?
            </div>
            <!-- Fila 1 -->
            <div class="col-5">
              Baja Remuneración
            </div>
            <div class="col-1">
              <input type="checkbox" name="baja_remuneracion" value="SI">
            </div>
            <div class="col-5">
              Problemas personales y/o enfermedad
            </div>
            <div class="col-1">
              <input type="checkbox" name="problemas_personales_enfermedad" value="SI">
            </div>
            <!-- Fila 1 -->
            <!-- Fila 2 -->
            <div class="col-5">
              Falta de reconocimiento a su labor
            </div>
            <div class="col-1">
              <input type="checkbox" name=" falta_reconocimiento_labor" value="SI">
            </div>
            <div class="col-5">
              Demasiada presión, stress
            </div>
            <div class="col-1">
              <input type="checkbox" name="presion_estres" value="SI">
            </div>
            <!-- Fila 2 -->
            <!-- Fila 3 -->
            <div class="col-5">
              Ambiente laboral de trabajo
            </div>
            <div class="col-1">
              <input type="checkbox" name="ambiente_fisico_trabajo" value="SI">
            </div>
            <div class="col-5">
              Incumplimiento de lo ofrecido al ingresar
            </div>
            <div class="col-1">
              <input type="checkbox" name="incumplimiento_ofrecido_ingreso" value="SI">
            </div>
            <!-- Fila 3 -->
            <!-- Fila 4 -->
            <div class="col-5">
              Problemas con el jefe directo
            </div>
            <div class="col-1">
              <input type="checkbox" name="problemas_jefe_directo" value="SI">
            </div>
            <div class="col-5">
              Falta de oportunidad de desarrollo profesional
            </div>
            <div class="col-1">
              <input type="checkbox" name="falta_oportunidad_profesional" value="SI">
            </div>
            <!-- Fila 4 -->
            <!-- Fila 6 -->
            <div class="col-5">
              Falta de motivación del grupo
            </div>
            <div class="col-1">
              <input type="checkbox" name="falta_motivacion_grupo" value="SI">
            </div>
            <div class="col-5">
              Horario de trabajo
            </div>
            <div class="col-1">
              <input type="checkbox" name="horarios_trabajo" value="SI">
            </div>
            <!-- Fila 6 -->
            <!-- Fila 7 -->
            <div class="col-5">
              Conflicto con sus compañeros
            </div>
            <div class="col-1">
              <input type="checkbox" name="conflicto_compañeros" value="SI">
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Mejoras Laborales (Indique el Rubro de su nueva organización)</label>
                <input type="text" class="form-control" name="rubro_nueva_empresa" autocomplete="off"> 
              </div>
            </div>
            <!-- Fila 7 -->
            <!-- Fila 8 -->
            <div class="col-12">
              <div class="form-group">
                <label>De las alternativas marcadas, especifique sus razones:</label>
                <input type="text" class="form-control" name="descripcion_razon_retiro"> 
              </div>
            </div>
          </div>
          <div class="row options">
            <div class="col-12 font-weight-bold">
              2. ¿Califique Usted los siguientes Aspectos en la empresa?
            </div>
            <!-- Fila 1 -->
            <div class="col-7 gray-title">
              Aspectos
            </div>
            <div class="col-1 gray-title">
              Muy Bueno
            </div>
            <div class="col-1 gray-title">
              Bueno
            </div>
            <div class="col-1 gray-title">
              Regular
            </div>
            <div class="col-1 gray-title">
              Malo
            </div>
            <div class="col-1 gray-title">
              Muy Malo
            </div>
            <!-- Fila 1 -->
            <!-- Fila 2 -->
            <div class="col-7">
              1. Ambiente Laboral
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="5">
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="4">
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="3">
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="2">
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="1">
            </div>
            <!-- Fila 2 -->
            <!-- Fila 3 -->
            <div class="col-7">
              2. Inducción
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="5">
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="4">
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="3">
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="2">
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="1">
            </div>
            <!-- Fila 3 -->
            <!-- Fila 4 -->
            <div class="col-7">
              3. Capacitación
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="5">
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="4">
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="3">
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="2">
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="1">
            </div>
            <!-- Fila 4 -->
            <!-- Fila 5 -->
            <div class="col-7">
              4. Condiciones de trabajo
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="5">
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="4">
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="3">
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="2">
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="1">
            </div>
            <!-- Fila 5 -->
            <!-- Fila 6 -->
            <div class="col-7">
              5. Reconocimiento a su labor
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="5">
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="4">
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="3">
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="2">
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="1">
            </div>
            <!-- Fila 6 -->
            <!-- Fila 7 -->
            <div class="col-7">
              6. Sueldo y comisiones
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="5">
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="4">
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="3">
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="2">
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="1">
            </div>
            <!-- Fila 7 -->
            <!-- Fila 8 -->
            <div class="col-7">
              7.Trato por parte del supervisor y/o jefe
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="5">
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="4">
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="3">
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="2">
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="1">
            </div>
            <!-- Fila 8 -->
            <!-- Fila 9 -->
            <div class="col-7">
              8. Trato que recibió por el área RRHH
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="5">
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="4">
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="3">
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="2">
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="1">
            </div>
            <!-- Fila 9 -->
            <!-- Fila 10 -->
            <div class="col-7">
              9. Prestaciones
            </div>
            <div class="col-1">
              <input type="radio" name="prestaciones" value="5">
            </div>
            <div class="col-1">
              <input type="radio" name="prestaciones" value="4">
            </div>
            <div class="col-1">
              <input type="radio" name="prestaciones" value="3">
            </div>
            <div class="col-1">
              <input type="radio" name="prestaciones" value="2">
            </div>
            <div class="col-1">
              <input type="radio" name="prestaciones" value="1">
            </div>
            <!-- Fila 10 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-10 font-weight-bold">
              3. ¿Las responsabilidades y labores de su puesto correspondían a lo que Ud., esperaba?
            </div>
            <div class="col-2">
              <div class="form-check form-check-inline">
                <label class="form-check-label">SI</label>
                <input type="radio" class="form-check-input" name="resposabilidad_labores_correspodian" value="SI">              
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">NO</label>
                <input type="radio" class="form-check-input" name="resposabilidad_labores_correspodian" value="NO">
              </div>
            </div>
            <!-- Fila 1 -->
            <!-- Fila 2 -->
            <div class="col-12">
              <div class="form-group">
                <label>¿Por qué?</label>
                <input type="text" class="form-control" name="resposabilidad_labores_descripcion" autocomplete="off">
              </div>
            </div>
            <!-- Fila 2 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">4. ¿Qué era lo que más le gustaba de sus Labores?</label>
                <input type="text" class="form-control" name="labores_gusto" autocomplete="off">
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">5. ¿Y lo que menos le gustaba?</label>
                <input type="text" class="form-control" name="labores_no_gusto" autocomplete="off">
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">6. Si estuviese en sus manos ¿Qué hubiera hecho Ud. Para impedir su salida de la empresa?</label>
                <input type="text" class="form-control" name="option_para_no_salir" autocomplete="off">
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">7. A fin de mejorar nuestra gestión. ¿Qué comentarios o sugerencias, haría Ud. Finalmente?</label>
                <input type="text" class="form-control" name="option_mejorar_gestion" autocomplete="off">
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">Comentario:</label>
                <input type="text" class="form-control" name="comentario" autocomplete="off">
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('uid', $detalle->uid_usuario) ?>
        <?= form_hidden('token', $token) ?>
        <?= form_hidden('nombre', $detalle->nombres) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Generar</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade" id="alta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelalta" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open(base_url() . 'personal/alta', 'class="needs-validation" novalidate id="formuploadajax_alta"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabelalta">Detalles alta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Fecha de alta</label>
          <input type="date" name="fecha" value="" placeholder="" required class="form-control">
        </div>
        <div class="form-group">
          <label>Motivo</label>
          <textarea name="motivo" class="form-control" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('uid', $detalle->uid_usuario) ?>
        <?= form_hidden('token', $token) ?>
        <?= form_hidden('nombre', $detalle->nombres) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Generar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelalta" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open(base_url() . 'personal/eliminar-usuario', 'class="needs-validation" novalidate id="formuploadajax_alta"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabelalta">Eliminar Personal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">        
        <div class="form-group">
          <label>Motivo</label>
          <textarea name="motivo_elim" class="form-control" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('uid', $detalle->uid_usuario) ?>
        <?= form_hidden('token', $token) ?>
        <?= form_hidden('nombre', $detalle->nombres) ?>
        <button type="button" class="btn btn btn-warning" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<?php if(isset($encuesta)){ ?>
<div class="modal fade" id="encuesta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelalta" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open(base_url() . 'personal/alta', 'class="needs-validation" novalidate id="formuploadajax_alta"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabelalta">Encuesta Baja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="encuesta-salida-personal">
          <div class="row">
            <div class="col-6 font-weight-bold">
              Nombre del colaborador
            </div>
            <div class="col-6 font-weight-bold">
               Puesto
            </div>
            <div class="col-6 text-center">
              <?= $detalle->nombres ?> <?= $detalle->apellido_paterno ?> <?= $detalle->apellido_materno ?>
            </div>
            <div class="col-6 text-center">
               <?= $detalle->perfil ?>
            </div>
            <div class="col-6 font-weight-bold">
              Departamento
            </div>
            <div class="col-6 font-weight-bold">
               Antiguedad
            </div>
            <div class="col-6 text-center">
              <?= $detalle->departamento ?>
            </div>
            <div class="col-6 text-center">
               <?= number_format($dias_antiguedad / 365, 2) ?> años.
            </div>
          </div>
          <div class="row options">
            <div class="col-12 font-weight-bold">
              1.   ¿Por cual de las razones decide Ud. Retirarse de la Empresa?
            </div>
            <!-- Fila 1 -->
            <div class="col-5">
              Baja Remuneración
            </div>
            <div class="col-1">
              <input type="checkbox" name="baja_remuneracion" value="SI" <?= $encuesta->baja_remuneracion == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <div class="col-5">
              Problemas personales y/o enfermedad
            </div>
            <div class="col-1">
              <input type="checkbox" name="problemas_personales_enfermedad" value="SI" <?= $encuesta->problemas_personales_enfermedad == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 1 -->
            <!-- Fila 2 -->
            <div class="col-5">
              Falta de reconocimiento a su labor
            </div>
            <div class="col-1">
              <input type="checkbox" name="falta_reconocimiento_labor" value="SI" <?= $encuesta->falta_reconocimiento_labor == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <div class="col-5">
              Demasiada presión, stress
            </div>
            <div class="col-1">
              <input type="checkbox" name="presion_estres" value="SI" <?= $encuesta->presion_estres == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 2 -->
            <!-- Fila 3 -->
            <div class="col-5">
              Ambiente físico de trabajo
            </div>
            <div class="col-1">
              <input type="checkbox" name="ambiente_fisico_trabajo" value="SI" <?= $encuesta->ambiente_fisico_trabajo == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <div class="col-5">
              Incumplimiento de lo ofrecido al ingresar
            </div>
            <div class="col-1">
              <input type="checkbox" name="incumplimiento_ofrecido_ingreso" value="SI" <?= $encuesta->incumplimiento_ofrecido_ingreso == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 3 -->
            <!-- Fila 4 -->
            <div class="col-5">
              Problemas con el jefe directo
            </div>
            <div class="col-1">
              <input type="checkbox" name="problemas_jefe_directo" value="SI" <?= $encuesta->problemas_jefe_directo == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <div class="col-5">
              Falta de oportunidad de desarrollo profesional
            </div>
            <div class="col-1">
              <input type="checkbox" name="falta_oportunidad_profesional" value="SI" <?= $encuesta->falta_oportunidad_profesional == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 4 -->
            <!-- Fila 6 -->
            <div class="col-5">
              Falta de motivación del grupo
            </div>
            <div class="col-1">
              <input type="checkbox" name="falta_motivacion_grupo" value="SI" <?= $encuesta->falta_motivacion_grupo == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <div class="col-5">
              Horario de trabajo
            </div>
            <div class="col-1">
              <input type="checkbox" name="horarios_trabajo" value="SI" <?= $encuesta->horarios_trabajo == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 6 -->
            <!-- Fila 7 -->
            <div class="col-5">
              Conflicto con sus compañeros
            </div>
            <div class="col-1">
              <input type="checkbox" name="conflicto_compañeros" value="SI" <?= $encuesta->conflicto_compañeros == 'SI' ? "checked" : "" ?> disabled>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Mejoras Laborales (Indique el Rubro de su nueva organización)</label>
                <input type="text" class="form-control" name="rubro_nueva_empresa" autocomplete="off" value="<?= $encuesta->rubro_nueva_empresa ?>" disabled> 
              </div>
            </div>
            <!-- Fila 7 -->
            <!-- Fila 8 -->
            <div class="col-12">
              <div class="form-group">
                <label>De las alternativas marcadas, especifique sus razones:</label>
                <input type="text" class="form-control" name="descripcion_razon_retiro" value="<?= $encuesta->descripcion_razon_retiro ?>" disabled> 
              </div>
            </div>
          </div>
          <div class="row options">
            <div class="col-12 font-weight-bold">
              2. ¿Califique Usted los siguientes Aspectos en la empresa?
            </div>
            <!-- Fila 1 -->
            <div class="col-7 gray-title">
              Aspectos
            </div>
            <div class="col-1 gray-title">
              Muy Bueno
            </div>
            <div class="col-1 gray-title">
              Bueno
            </div>
            <div class="col-1 gray-title">
              Regular
            </div>
            <div class="col-1 gray-title">
              Malo
            </div>
            <div class="col-1 gray-title">
              Muy Malo
            </div>
            <!-- Fila 1 -->
            <!-- Fila 2 -->
            <div class="col-7">
              1. Ambiente Laboral
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="5" <?= $encuesta->ambiente_laboral == 5 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="4" <?= $encuesta->ambiente_laboral == 4 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="3" <?= $encuesta->ambiente_laboral == 3 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="2" <?= $encuesta->ambiente_laboral == 2 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="ambiente_laboral" value="1" <?= $encuesta->ambiente_laboral == 1 ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 2 -->
            <!-- Fila 3 -->
            <div class="col-7">
              2. Inducción
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="5" <?= $encuesta->induccion == 5 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="4" <?= $encuesta->induccion == 4 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="3" <?= $encuesta->induccion == 3 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="2" <?= $encuesta->induccion == 2 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="induccion" value="1" <?= $encuesta->induccion == 1 ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 3 -->
            <!-- Fila 4 -->
            <div class="col-7">
              3. Capacitación
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="5" <?= $encuesta->capacitacion == 5 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="4" <?= $encuesta->capacitacion == 4 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="3" <?= $encuesta->capacitacion == 3 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="2" <?= $encuesta->capacitacion == 2 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="capacitacion" value="1" <?= $encuesta->capacitacion == 1 ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 4 -->
            <!-- Fila 5 -->
            <div class="col-7">
              4. Condiciones de trabajo
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="5" <?= $encuesta->condicciones_trabajo == 5 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="4" <?= $encuesta->condicciones_trabajo == 4 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="3" <?= $encuesta->condicciones_trabajo == 3 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="2" <?= $encuesta->condicciones_trabajo == 2 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="condicciones_trabajo" value="1" <?= $encuesta->condicciones_trabajo == 1 ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 5 -->
            <!-- Fila 6 -->
            <div class="col-7">
              5. Reconocimiento a su labor
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="5" <?= $encuesta->reconocimiento_labor == 5 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="4" <?= $encuesta->reconocimiento_labor == 4 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="3" <?= $encuesta->reconocimiento_labor == 3 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="2" <?= $encuesta->reconocimiento_labor == 2 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="reconocimiento_labor" value="1" <?= $encuesta->reconocimiento_labor == 1 ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 6 -->
            <!-- Fila 7 -->
            <div class="col-7">
              6. Sueldo y comisiones
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="5" <?= $encuesta->sueldo_comisiones == 5 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="4" <?= $encuesta->sueldo_comisiones == 4 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="3"<?= $encuesta->sueldo_comisiones == 3 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="2" <?= $encuesta->sueldo_comisiones == 2 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="sueldo_comisiones" value="1" <?= $encuesta->sueldo_comisiones == 1 ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 7 -->
            <!-- Fila 8 -->
            <div class="col-7">
              7.Trato por parte del supervisor y/o jefe
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="5" <?= $encuesta->trato_jefe_supervisor == 5 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="4" <?= $encuesta->trato_jefe_supervisor == 4 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="3" <?= $encuesta->trato_jefe_supervisor == 3 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="2" <?= $encuesta->trato_jefe_supervisor == 2 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="trato_jefe_supervisor" value="1" <?= $encuesta->trato_jefe_supervisor == 1 ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 8 -->
            <!-- Fila 9 -->
            <div class="col-7">
              8. Trato que recibió por el área RRHH
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="5" <?= $encuesta->trato_rrhh == 5 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="4" <?= $encuesta->trato_rrhh == 4 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="3" <?= $encuesta->trato_rrhh == 3 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="2" <?= $encuesta->trato_rrhh == 2 ? "checked" : "" ?> disabled>
            </div>
            <div class="col-1">
              <input type="radio" name="trato_rrhh" value="1" <?= $encuesta->trato_rrhh == 1 ? "checked" : "" ?> disabled>
            </div>
            <!-- Fila 9 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-10 font-weight-bold">
              3. ¿Las responsabilidades y labores de su puesto correspondían a lo que Ud., esperaba?
            </div>
            <div class="col-2">
              <div class="form-check form-check-inline">
                <label class="form-check-label">SI</label>
                <input type="radio" class="form-check-input" name="resposabilidad_labores_correspodian" value="SI" <?= $encuesta->resposabilidad_labores_correspodian == "SI" ? "checked" : "" ?> disabled>              
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">NO</label>
                <input type="radio" class="form-check-input" name="resposabilidad_labores_correspodian" value="NO" <?= $encuesta->resposabilidad_labores_correspodian == "NO" ? "checked" : "" ?> disabled>
              </div>
            </div>
            <!-- Fila 1 -->
            <!-- Fila 2 -->
            <div class="col-12">
              <div class="form-group">
                <label>¿Por qué?</label>
                <input type="text" class="form-control" name="resposabilidad_labores_descripcion" autocomplete="off" value="<?= $encuesta->resposabilidad_labores_descripcion ?>" disabled>
              </div>
            </div>
            <!-- Fila 2 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">4. ¿Qué era lo que más le gustaba de sus Labores?</label>
                <input type="text" class="form-control" name="labores_gusto" autocomplete="off" value="<?= $encuesta->labores_gusto ?>" disabled>
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">5. ¿Y lo que menos le gustaba?</label>
                <input type="text" class="form-control" name="labores_no_gusto" autocomplete="off" value="<?= $encuesta->labores_no_gusto ?>" disabled>
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">6. Si estuviese en sus manos ¿Qué hubiera hecho Ud. Para impedir su salida de la empresa?</label>
                <input type="text" class="form-control" name="option_para_no_salir" autocomplete="off" value="<?= $encuesta->option_para_no_salir ?>" disabled>
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">7. A fin de mejorar nuestra gestión. ¿Qué comentarios o sugerencias, haría Ud. Finalmente?</label>
                <input type="text" class="form-control" name="option_mejorar_gestion" autocomplete="off" value="<?= $encuesta->option_mejorar_gestion ?>" disabled>
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
          <div class="row">
            <!-- Fila 1 -->
            <div class="col-12">
              <div class="form-group">
                <label class="font-weight-bold">Comentario:</label>
                <input type="text" class="form-control" name="comentario" autocomplete="off" value="<?= $encuesta->comentario ?>" disabled>
              </div>
            </div>
            <!-- Fila 1 -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<?php } ?>
<div class="modal fade" id="actas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelActas" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open(base_url() . 'personal/nueva-acta', 'class="needs-validation" novalidate id="formuploadajax_acta"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabelActas">Nueva acta administrativa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Fecha*</label>
          <input type='date' name="fecha" class="form-control" required>
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Descripción*</label>
          <textarea name="descripcion" class="form-control" rows="5" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('uid', $detalle->uid_usuario) ?>
        <?= form_hidden('token', $token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Generar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="cambiar-foto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open_multipart(base_url() . 'usuarios/cambiar-foto', 'id="formuploadajax"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cargar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
            <label class="control-label">Imagen de personal</label>
            <div id='error' style="color:red;"></div>
            <input type="file" class="filestyle" name='image' id='image' accept=".jpg">
          </div>
        </div>
        <!--Image Preview-->
        <div class='row'>
          <div class='col-12 imagen-recorte'>
            <img src="" class="crop" id="dp_preview" />
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" name="x2" id="x2" />
            <input type="hidden" name="y2" id="y2" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="from" value="usuario">
        <input type="hidden" name="uid" value="<?php echo $detalle->uid_usuario ?>">
        <?= form_hidden('token', $token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="certificado" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabeldocumento" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open_multipart(base_url() . 'personal/nuevo-certificado', 'class="needs-validation" novalidate'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cursos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal-header -->
      <div class="modal-body">
        <div class="row">
          <div class="form-group col">
            <label>Curso*</label>
            <select name="idtbl_cursos" class="form-control" required>
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <?php foreach ($cursos  as $key => $value) : ?>
                <option value="<?php echo  $value->idtbl_cursos ?>"><?php echo  $value->nombre_curso ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label>Tipo de certificado</label>
            <select name="id" class="form-control">
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <?php foreach ($certificados  as $key => $value) : ?>
                <option value="<?php echo  $value->idtbl_certificados ?>"><?php echo  $value->nombre ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
          <!--<div class="form-group col">
            <label>Folio</label>
            <input type="text" name="folio" value="" class="form-control" placeholder="" disabled="true">
          </div>-->
          <div class="form-group col">
            <label>Horas de curso*</label>
            <input type="number" name="duracion" value="" class="form-control" step="1" min="1" required="required">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label>Fecha de Inicio*</label>
            <input type="date" name="fecha_inicio" value="" class="form-control" placeholder="" required="required">
          </div>
          <div class="form-group col">
            <label>Fecha de Termino*</label>
            <input type="date" name="fecha_termino" value="" class="form-control" placeholder="" required="required">
          </div>
        </div>
        <div class="row">
                <div class="form-group col">
                    <label class="control-label">Instructor*</label>
                    <select name="tutor" class="form-control" required="required">
                    <option value="" disabled="" selected="">Seleccione...</option>
                    <?php foreach($instructores AS $key => $value){ ?>
                        <?php if($value->nombres != NULL && $value->nombres != ''){ ?>
                            <option value="<?= $value->idtbl_instructores ?>"><?= $value->nombres ?></option>
                            <?php }else{ ?>
                        <option value="<?= $value->idtbl_instructores ?>"><?= $value->nombre_usuario . ' ' . $value->apellido_paterno . ' ' . $value->apellido_materno ?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label class="control-label">Patron/Representante*</label>
            <select name="patron_representante" class="form-control" required="required">
              <option value="" disabled="" selected="">Seleccione...</option>
              <option value="JORGE ESTEVEZ ABREU">JORGE ESTEVEZ ABREU</option>
              <option value="GUSTAVO JUAREZ MENDOZA">GUSTAVO JUAREZ MENDOZA</option>
            </select>
          </div>
          <div class="form-group col">
            <label class="control-label">Representante de Trabajadores*</label>
            <select name="representante_trabajadores" class="form-control" required="required">
              <option value="JESSICA CARINA CALLEJAS VAZQUEZ">JESSICA CARINA CALLEJAS VAZQUEZ</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label class="control-label">Tipo Agente*</label>
            <select name="tipo_agente" class="form-control" required="required">
              <option value="" disabled="" selected="">Seleccione...</option>
              <option value="1">Interno</option>
              <option value="2">Externo</option>
              <option value="3">Otro</option>
            </select>
          </div>
          <div class="form-group col">
            <label class="control-label">Modalidad*</label>
            <select name="modalidad" class="form-control" required="required">
              <option value="" disabled="" selected="">Seleccione...</option>
              <option value="1">Presencial</option>
              <option value="2">En línea</option>
              <option value="3">Mixta</option>
            </select>
          </div>
        </div>
      </div>
      <!-- modal-body -->
      <div class="modal-footer">
        <input type="hidden" name="from" value="personal/detalle/<?php echo $detalle->uid_usuario ?>">
        <input type="hidden" name="uid_usuario" value="<?php echo $detalle->uid_usuario ?>">
        <?= form_hidden('token', $token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Certificado</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="editar_cursos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabeldocumento" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open_multipart(base_url() . 'personal/editar-certificado', 'class="needs-validation" novalidate'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cursos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal-header -->
      <div class="modal-body">
        <div class="row">
          <div class="form-group col">
            <label>Curso*</label>
            <select name="idtbl_cursos" class="form-control" required>
              <option value="" selected="selected">Seleccione...</option>
              <?php foreach ($cursos  as $key => $value) : ?>
                <option value="<?php echo  $value->idtbl_cursos ?>"><?php echo  $value->nombre_curso ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label>Tipo de certificado</label>
            <select name="id" class="form-control">
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <?php foreach ($certificados  as $key => $value) : ?>
                <option value="<?php echo  $value->idtbl_certificados ?>"><?php echo  $value->nombre ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group col">
            <label>Folio</label>
            <input type="text" name="folio" value="" class="form-control" placeholder="" readonly="true">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label>Fecha de Inicio*</label>
            <input type="date" name="fecha_inicio" value="" class="form-control" placeholder="" required="required">
          </div>
          <div class="form-group col">
            <label>Fecha de Termino*</label>
            <input type="date" name="fecha_termino" value="" class="form-control" placeholder="" required="required">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label>Horas de curso*</label>
            <input type="number" name="duracion" value="" class="form-control" step="1" min="1" required="required">
          </div>
          <div class="form-group col">
                    <label class="control-label">Instructor*</label>
                    <select name="tutor" class="form-control" required="required">
                    <option value="" disabled="" selected="">Seleccione...</option>
                    <?php foreach($instructores AS $key => $value){ ?>
                        <?php if($value->nombres != NULL && $value->nombres != ''){ ?>
                            <option value="<?= $value->idtbl_instructores ?>"><?= $value->nombres ?></option>
                            <?php }else{ ?>
                        <option value="<?= $value->idtbl_instructores ?>"><?= $value->nombre_usuario . ' ' . $value->apellido_paterno . ' ' . $value->apellido_materno ?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label class="control-label">Patron/Representante*</label>
            <select name="patron_representante" class="form-control" required="required">
              <option value="" disabled="" selected="">Seleccione...</option>
              <option value="JORGE ESTEVEZ ABREU">JORGE ESTEVEZ ABREU</option>
              <option value="GUSTAVO JUAREZ MENDOZA">GUSTAVO JUAREZ MENDOZA</option>
            </select>
          </div>
          <div class="form-group col">
            <label class="control-label">Representante de Trabajadores*</label>
            <select name="representante_trabajadores" class="form-control" required="required">
              <option value="JESSICA CARINA CALLEJAS VAZQUEZ">JESSICA CARINA CALLEJAS VAZQUEZ</option>
            </select>
          </div>
        </div>
      </div>
      <!-- modal-body -->
      <div class="modal-footer">
        <input type="hidden" name="iddtl_certificados_personal" value="<?php echo $detalle->uid_usuario ?>">
        <input type="hidden" name="from" value="personal/detalle/<?php echo $detalle->uid_usuario ?>">
        <?= form_hidden('token', $token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Certificado</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="documento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabeldocumento" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open_multipart(base_url() . 'personal/nuevo-documento', 'id="documentoForm"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal-header -->
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
            <div class="form-group">
              <label>Tipo de documento</label>
              <?php if ($this->session->userdata('tipo') == 1) : ?>
                <input type="text" value="INE" class="form-control" readonly="readonly" disabled="">
                <input type="hidden" name="id" value="<?php echo ID_INE ?>" class="form-control">
              <?php else : ?>
                <select name="id" class="form-control" required>
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php foreach ($documentos  as $key => $value) : ?>
                    <option value="<?php echo  $value->idtbl_documentos ?>"><?php echo  $value->documento ?>
                    </option>
                  <?php endforeach ?>
                </select>
              <?php endif ?>
            </div>
            <label class="control-label">Documento</label>
            <input type="file" class="filestyle pull-left" id="documentoInput" name='archivo' required accept=".pdf">
          </div>
        </div>
      </div>
      <!-- modal-body -->
      <div class="modal-footer">
        <input type="hidden" name="from" value="personal/detalle/<?php echo $detalle->uid_usuario ?>">
        <input type="hidden" name="uid_usuario" value="<?php echo $detalle->uid_usuario ?>">
        <?= form_hidden('token', $token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Cargar Documento</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="editar_documento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabeldocumento" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open_multipart(base_url() . 'personal/editar_documento', 'id="documentoForm"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal-header -->
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
            <label class="control-label">Documento</label>
            <input type="file" class="filestyle pull-left" id="documentoInput1" name='archivo' required accept=".pdf">
          </div>
        </div>
      </div>
      <!-- modal-body -->
      <div class="modal-footer">
        <input type="hidden" name="from" value="personal/detalle/<?= $detalle->uid_usuario ?>">
        <input type="hidden" name="uid_documento">
        <input type="hidden" name="uid_usuario">
        <?= form_hidden('token', $token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Cargar Documento</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="vacacionesModal" tabindex="-1" role="dialog" aria-labelledby="vacacionesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vacacionesLabel">Vacaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" class="needs-validation" id="formuploadajax_vacaciones" novalidate method="post">
        <div class="row" style="display:none;">
              <div class="col-12 col-lg-6">
                      <?php 
                        $total_periodos = []; 
                        $total_dias_disfrutados = 0;
                        foreach($dias_disfrutados_vacaciones AS $value){
                          $itemPeriodo = json_decode($value->periodo);
                          $itemDias = json_decode($value->dias_disfrutar);
                          for($r = 0; $r < count($itemPeriodo); $r++){
                            $total_periodos[$itemPeriodo[$r]] = $total_periodos[$itemPeriodo[$r]] == null ? $itemDias[$r] : $total_periodos[$itemPeriodo[$r]] + $itemDias[$r];
                          }
                        }
                        foreach($total_periodos AS $value){
                          $total_dias_disfrutados += $value;
                        }                        
                      ?>
                  <?php $dias_vacaciones = dias_vacaciones($dias_antiguedad); ?>
                  <p>
                    Años de servicio: <strong><?= number_format($dias_antiguedad / 365, 2) ?> años.</strong>
                  </p>
                  <p>Con derecho a: <strong><?php echo $dias_vacaciones ?> días.</strong></p>
                  <p id="dias_disfrutados">
                    Días de vacaciones disfrutados: <strong><?= $total_dias_disfrutados  ?> días.</strong>
                  </p>
                  <p id="dias_disponibles">
                    Días de vacaciones disponibles: <strong><?= $dias_vacaciones - $total_dias_disfrutados ?> días.</strong>
                  </p>
                  <p id="dias_proporcionales">
                    Días de vacaciones proporcionales: <strong><?= $dias_proporcionales ?> días.</strong>
                  </p>
                </div>
                <div class="col-12 col-lg-6">
                  Detalle Periodos
                  <table style="width: 100%" class="table">
                    <thead>
                      <th class="text-center">Periodo</th>
                      <th class="text-center">Con derecho a</th>
                      <th class="text-center">Disfrutados</th>
                      <th class="text-center">Restan</th>
                    </thead>
                    <tbody>
                      <?php $dias_totales_vacaciones = 0; ?>
                      <?php $dias = 365 ?>
                      <?php $dias_auxiliar = 0 ?>
                      <?php $dias_disfrutados_vacaciones_aux = 0 ?>
                      <?php $dias_antes = ((($dias_antiguedad - $dias_antiguedad % 365))) ?>
                      <?php $dias_total = 0 ?>
                      
                      
                      <?php for ($x = 0; $x < (($dias_antiguedad - $dias_antiguedad % 365) / 365); $x++) { ?>
                        
                        <tr>
                          <td align="center">
                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?>-<?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))) ?>
                          </td>
                          <td align="center">
                          <?php if(intval($periodo[$x]['fechaFin']) < 2023){ ?>
                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias) - 6;
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                            <?php }else{ ?>
                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones_calculos($dias);
                            $dias_auxiliar += dias_vacaciones_calculos($dias) ?> días.
                            <?php } ?>
                          </td>
                          <td align="center">
                            <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?> días.
                          </td>
                          <td align="center">
                            <?php if ((($dias_antiguedad - $dias_antiguedad % 365) / 365) == $x + 1) { ?>
                            <?php if ($dias_antiguedad - $dias_antes > 182 && $this->session->userdata('tipo') != 5) { ?>
                              <?= $periodo[$x]['dias'] = 0 ?> días (pasaron 6 meses)
                              <?php $dias_total += 0; ?>
                              <?php } else { ?>
                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?> días.
                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones_calculos($dias) - $dias_disfrutados_vacaciones_aux : 0 ?>
                            <?php } ?>
                            <?php } else { ?>
                              <?= $periodo[$x]['dias'] = 0 ?> días
                              <?php $dias_total += 0; ?>
                              <?php } ?>
                              <?php $dias_totales_vacaciones += $periodo[$x]['dias']; ?>
                          </td>
                          <?php
                          if ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) {
                              $dias_disfrutados_vacaciones_aux = 0;
                          } else {
                              $dias_disfrutados_vacaciones_aux = $dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias);
                          }
                          ?>
                        </tr>
                        <?php $dias += 365; ?>
                        
                      <?php } ?>
                      <?php if (($dias_antiguedad % 365) > 1) : ?>
                        <tr>
                          <td align="center">
                            <?= $periodo[$x]['fechaInicio'] = date('Y', strtotime('+' . ($x) . ' year', strtotime($detalle->fecha_ingreso))) ?> - <?= $periodo[$x]['fechaFin'] = date('Y', strtotime('+' . ($x + 1) . ' year', strtotime($detalle->fecha_ingreso))); ?>
                          </td>
                          <td align="center">
                            <?php if(intval($periodo[$x]['fechaFin']) < 2023){ ?>
                              <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar - 6 ?> días (Proporcionales).
                              <?php }else{ ?>
                            <?= $periodo[$x]['diasPeriodo'] = dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?> días (Proporcionales).
                              <?php } ?>
                          </td>
                          <td align="center">
                          <?= $periodo[$x]['disfrutados'] = $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] != null ? $total_periodos[$periodo[$x]['fechaInicio'].'-'.$periodo[$x]['fechaFin']] : 0 ?> días.
                          </td>
                          <td align="center">                                                       
                            <?= $periodo[$x]['dias'] = $periodo[$x]['diasPeriodo'] - $periodo[$x]['disfrutados'] ?> días.
                            <?php $dias_total += ($dias_disfrutados_vacaciones_aux - dias_vacaciones_calculos($dias) < 0) ? dias_vacaciones($dias_antiguedad) - $dias_auxiliar - $dias_disfrutados_vacaciones_aux : dias_vacaciones($dias_antiguedad) - $dias_auxiliar ?>
                            <?php $dias_totales_vacaciones += $periodo[$x]['dias']; ?>
                          </td>
                        </tr>
                      <?php endif ?>
                    </tbody>
                  </table>
                </div>
                </div>
                
          <p id="dias_disponibles">
            Días de vacaciones: <strong><?= $dias_vacaciones ?> días.</strong>
          </p>
          <p id="dias_disponibles">
            Días de vacaciones disponibles: <strong><?= $dias_totales_vacaciones ?> días.</strong>
          </p>
          <p id="dias_disfrutados">
            Días de vacaciones disfrutados: <strong><?= $total_dias_disfrutados  ?> días.</strong>
          </p>
          <div class="form-group">
            <label>Inicia y Termina</label>
            <input type="text" id="rango_fechas2" value="" class="form-control" required autocomplete="off">
            <input type="hidden" name="start" id="start2" required>
            <input type="hidden" name="end" id="end2" required>
            <div class="invalid-feedback"> Seleccione una fecha válida</div>
          </div>
          <div class="form-group">
            <label>Días Solicitados</label>
            <input type="number" id="numero_dias2" name="dias" value="" min="1" <?= $dias_vacaciones > 49 ? '' : 'max="'.$dias_totales_vacaciones.'"' ?> step="1" class="form-control" required autocomplete="off">
            <div class="invalid-feedback">
              El máximo de días es <?= $dias_totales_vacaciones ?> y el mínimo de 1
            </div>
          </div>
          <?php if (!isset($periodo)) : ?>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Periodo</label>
                  <input type="text" value="No tiene días de vacaciones disponibles" class="form-control" readonly>
                </div>
              </div>
            </div>
          <?php else : ?>
            <?php $auxKey = 0; ?>
            <?php foreach ($periodo as $key => $value) : ?>
              <?php if ($value['dias'] > 0) : ?>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Periodo</label>
                      <input type="text" name="periodo[]" value="<?= $value['fechaInicio'] . '-' . $value['fechaFin'] ?>" class="form-control periodo periodo<?= $auxKey ?>" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Derecho a</label>
                      <input type="text" name="derecho_a[]" value="<?= $value['diasPeriodo'] ?>" class="form-control derecho_a derecho_a<?= $auxKey ?>" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Disfrutados</label>
                      <input type="text" name="dias_disfrutados_periodo[]" value="<?= $total_periodos[$value['fechaInicio'] . '-' . $value['fechaFin']] == NULL ? 0 : $total_periodos[$value['fechaInicio'] . '-' . $value['fechaFin']] ?>" class="form-control dias_disfrutados_periodo dias_disfrutados_periodo<?= $auxKey ?>" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Disponibles</label>
                      <input type="text" name="dias_pendientes_periodo[]" value="<?= $value['diasPeriodo'] - $total_periodos[$value['fechaInicio'] . '-' . $value['fechaFin']] ?>" class="form-control dias_pendientes_periodo dias_pendientes_periodo<?= $auxKey ?>" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label>Días a disfrutar</label>
                      <input type="text" id="dias_disfrutar" name="dias_disfrutar[]" value="0" min="0" class="form-control dias_a_disfrutar dias_a_disfrutar<?= $auxKey ?>" <?= $this->session->userdata('tipo') == 5 ? '' : 'readonly' ?>>
                    </div>
                  </div>
                </div>
                <?php $auxKey++; ?>
              <?php else: ?>
                <?php if($dias_vacaciones > 49){ ?>
                  <?php if(!isset($periodo[$key+1]['dias_periodo'])){ ?>
                    <?php } ?>
                  <?php } ?>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif ?>
          <div class="form-group">
            <label>Comentarios</label>
            <textarea name="comentarios" class="form-control" rows="5"></textarea>
          </div>
          <br>
          <?= form_hidden('uid', $detalle->uid_usuario) ?>
          <?= form_hidden('tipo', 'vacaciones') ?>
          <?= form_hidden('token', $token) ?>
          <?php if (isset($periodo)) : ?>
            <button type="submit" class="btn btn-primary ladda-button" data-style="expand-right">Autorizar</button>
          <?php endif ?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="permisosModal" tabindex="-1" role="dialog" aria-labelledby="permisosLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="permisosLabel">Permisos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" id="formuploadajax_permisos" novalidate method="post">
          <div class="form-group">
            <label>Inicia y Termina</label>
            <input type="text" id="rango_fechas" value="" class="form-control" required autocomplete="off">
            <input type="hidden" name="start" id="start" required>
            <input type="hidden" name="end" id="end" required>
            <div class="invalid-feedback">
              Seleccione una fecha válida
            </div>
          </div>
          <div class="form-group">
            <label>Días Solicitados</label>
            <input type="number" id="numero_dias" name="dias" value="" class="form-control" required autocomplete="off">
          </div>
          <div class="custom-control custom-radio custom-control-inline goce">
            <input type="radio" id="goce_sueldo1" name="goce_sueldo" value="1" required class="custom-control-input">
            <label class="custom-control-label" for="goce_sueldo1">Con goce de sueldo</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline goce">
            <input type="radio" id="goce_sueldo2" name="goce_sueldo" value="0" required class="custom-control-input">
            <label class="custom-control-label" for="goce_sueldo2">Sin goce de sueldo</label>
          </div>
          <div class="clearfix"> </div>
          <div class="form-group">
            <label>Comentarios</label>
            <textarea name="comentarios" class="form-control" rows="5"></textarea>
          </div>
          <br>
          <?= form_hidden('tipo', 'permiso') ?>
          <?= form_hidden('uid', $detalle->uid_usuario) ?>
          <?= form_hidden('token', $token) ?>
          <button type="submit" class="btn btn-primary ladda-button" data-style="expand-right">Autorizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="incapacidad" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vacacionesLabel">Incapacidades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" id="formuploadajax_incapacidad" novalidate method="post">
          <div class="row">
            <div class="form-group col">
              <label>Incapacidad</label>
              <select class="form-control" name="tipo" id="tipo-incapacidad" required>
                <option value="" selected disabled>Seleccione...</option>
                <option value="eg">Enfermedad General</option>
                <option value="rt">Riesgo de Trabajo</option>
                <option value="ma">Maternidad</option>
              </select>
            </div>
            <div class="form-group col">
              <label>Tipo</label>
              <select class="form-control" name="subtipo" id="subtipo-incapacidad" required>
                <option value="" selected disabled>Seleccione...</option>
                <option value="i">Inicial</option>
                <option value="s">Subsecuente</option>
                <option value="a">Alta</option>
                <option value="p" disabled>Periodo Único</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <label>No. Folio*</label>
              <input type="text" name="folio" value="" class="form-control" required>
            </div>
            <div class="form-group col">
              <label>Fecha incidente</label>
              <input type="date" name="fecha_incidente" value="" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label>Inicia y Termina</label>
            <input type="text" id="rango_fechas_incapacidad" value="" class="form-control" required autocomplete="off">
            <input type="hidden" name="start" id="start_incapacidad" required>
            <input type="hidden" name="end" id="end_incapacidad" required>
            <div class="invalid-feedback">
              Seleccione una fecha válida
            </div>
          </div>
          <div class="form-group">
            <label>Días incapacidad</label>
            <input type="number" id="numero_dias_incapacidad" name="dias" value="" class="form-control" required autocomplete="off">
          </div>
          <div class="clearfix"> </div>
          <div class="form-group">
            <label>Comentarios</label>
            <textarea name="comentarios" class="form-control" rows="5"></textarea>
          </div>
          <br>
          <?= form_hidden('uid', $detalle->uid_usuario) ?>
          <?= form_hidden('token', $token) ?>
          <button type="submit" class="btn btn-primary ladda-button" data-style="expand-right">Autorizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="justificar_asignaciones" tabindex="-1" role="dialog" aria-labelledby="permisosLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="permisosLabel">Descuentos o justificaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" id="formuploadajax_descuentos" novalidate method="post">
          <div class="row">
            <div class="col">
              <ul class="" id="justificaciones">
              </ul>
              <div class="" id="total_justificacion">
              </div>
            </div>
            <div class="col">
              <ul class="" id="descuentos">
              </ul>
              <div class="" id="total_descuento">
              </div>
            </div>
          </div>
          <br>
          <?= form_hidden('tipo', 'permiso') ?>
          <?= form_hidden('uid', $detalle->uid_usuario) ?>
          <?= form_hidden('token', $token) ?>
          <button type="submit" class="btn btn-primary ladda-button" id="btn_justificaciones" data-style="expand-right">Autorizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="editar_estatus_incidencia" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'ControlVehicular/editar-estatus-incidencia') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Editar estatus de incidencia</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="form-group">
              <label>Estatus</label>
              <select class="form-control" id="estatus" name="estatus_incidencia" required>
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Reparada">Reparada</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-12">
            <div class="form-group">
              <label>Comentarios de cambio de estatus</label>
              <textarea name="comentario_estatus" class="form-control" required></textarea>
            </div>
          </div>
          <div class="col-4 col-lg-4">
            <div class="form-group">
              <strong>Unidad: </strong><span id="unidad"></span>
            </div>
          </div>
          <div class="col-4 col-lg-4">
            <div class="form-group">
              <strong>Fecha: </strong><span id="fecha"></span>
            </div>
          </div>
          <div class="col-4 col-lg-4">
            <div class="form-group">
              <strong>Costo: </strong><span id="costo"></span>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label><strong>Explicación de incidencia</strong></label>
              <p id="incidencia"></p>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label><strong>Explicación de cambio de estatus</strong></label>
              <p id="comentario_estatus"></p>
            </div>
          </div>
          <input type="hidden" name="tipo" value="controlvehicular">
          <input type="hidden" name="idtbl_incidencias">
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token', $token) ?>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div id="justificar_asignacion" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(null,'id="form_justificar_asignacion"') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Justificar Asignación</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="form-group">
              <label>Archivo</label>
              <input type="file" name="file" class="form-control" required>
            </div>
          </div>
          <input type="hidden" name="estatus_devolucion_rh">
          <input type="hidden" name="iddtl_asignacion">
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token', $token) ?>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>


  <?php if($this->session->userdata('tipo') == 3){ ?>
  <div id="nueva_incidencia" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart(base_url() . 'ControlVehicular/nueva-incidencia') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Nueva Incidencia</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="form-group">
                            <label>Unidad</label>
                            <div id="selecteco"></div>
                        </div>
                    </div>
                    <input type="hidden" name="idtbl_usuarios">
                    <div class="col-9 col-lg-9">
                        <div class="form-group">
                            <label>Fecha de Incidencia</label>
                            <input type="date" placeholder="Fecha de Incidencia" name="fecha_incidencia"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-3 col-lg-3">
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="number" step="0.01" placeholder="Costo" name="costo" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Incidencia</label>
                            <textarea placeholder="Incidencia" name="incidencia" required
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Tipo de incidencia</label>
                            <select class="form-control" name="tipo" id="tipo_incidencia">
                                <option value="multa">Multa</option>
                                <option value="legal">Legal</option>
                                <option value="juridico">Juridico</option>
                                <option value="transito">Transito</option>
                                <option value="pena convencional">Pena Convencional</option>
                                <option value="choque">Choque</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Archivo</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                    <input type="hidden" name="tipo_incidencia" value="control_vehicular">
                    <input type="hidden" name="uid_usuario" value="<?= $detalle->uid_usuario ?>">
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token', $token) ?>
                <button type="button" class="btn btn-primary" onclick="imprimirIncidencia();">Imprimir Documento</button>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
  </div>
  <?php }elseif($this->session->userdata('tipo') == 2){ ?>
    <div id="nueva_incidencia" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart(base_url() . 'ControlVehicular/nueva-incidencia') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Nueva Incidencia</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="form-group">
                            <label>Unidad</label>
                            <div id="selecteco"></div>
                        </div>
                    </div>
                    <input type="hidden" name="idtbl_usuarios">
                    <div class="col-9 col-lg-9">
                        <div class="form-group">
                            <label>Fecha de Incidencia</label>
                            <input type="date" placeholder="Fecha de Incidencia" name="fecha_incidencia"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-3 col-lg-3">
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="number" step="0.01" placeholder="Costo" name="costo" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Incidencia</label>
                            <textarea placeholder="Incidencia" name="incidencia" required
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Tipo de incidencia</label>
                            <select class="form-control" name="tipo" id="tipo_incidencia">
                                <option value="" selected disabled>Seleccione...</option>
                                <option value="Ruptura de carcasa">Ruptura de carcasa</option>
                                <option value="Golpe">Golpe</option>
                                <option value="Derrame de liquido">Derrame de liquido</option>
                                <option value="Ruptura de pantalla">Ruptura de pantalla</option>
                                <option value="Daño total o parcial de botones">Daño total o parcial de botones</option>
                                <option value="Sobrecarga electrica">Sobrecarga electrica</option>
                                <option value="Daño total o parcial del equipo">Daño total o parcial del equipo</option>
                                <option value="Perdida">Perdida</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Archivo</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                    <input type="hidden" name="tipo_incidencia" value="sistemas">
                    <input type="hidden" name="uid_usuario" value="<?= $detalle->uid_usuario ?>">
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token', $token) ?>
                <button type="button" class="btn btn-primary" onclick="imprimirIncidencia();">Imprimir Documento</button>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
  </div>
  <?php }elseif($this->session->userdata('tipo') == 1){ ?>
    <div id="nueva_incidencia" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart(base_url() . 'ControlVehicular/nueva-incidencia') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Nueva Incidencia</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="form-group">
                            <label>Unidad</label>
                            <div id="selecteco"></div>
                        </div>
                    </div>
                    <input type="hidden" name="idtbl_usuarios">
                    <div class="col-9 col-lg-9">
                        <div class="form-group">
                            <label>Fecha de Incidencia</label>
                            <input type="date" placeholder="Fecha de Incidencia" name="fecha_incidencia"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-3 col-lg-3">
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="number" step="0.01" placeholder="Costo" name="costo" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Incidencia</label>
                            <textarea placeholder="Incidencia" name="incidencia" required
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Tipo de incidencia</label>
                            <select class="form-control" name="tipo" id="tipo_incidencia">
                                <option value="" selected disabled>Seleccione...</option>
                                <option value="Ruptura de carcasa">Ruptura de carcasa</option>
                                <option value="Golpe">Golpe</option>
                                <option value="Derrame de liquido">Derrame de liquido</option>
                                <option value="Ruptura de pantalla">Ruptura de pantalla</option>
                                <option value="Daño total o parcial de botones">Daño total o parcial de botones</option>
                                <option value="Sobrecarga electrica">Sobrecarga electrica</option>
                                <option value="Daño total o parcial del equipo">Daño total o parcial del equipo</option>
                                <option value="Perdida">Perdida</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Archivo</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                    <input type="hidden" name="tipo_incidencia" value="alto_costo">
                    <input type="hidden" name="uid_usuario" value="<?= $detalle->uid_usuario ?>">
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token', $token) ?>
                <button type="button" class="btn btn-primary" onclick="imprimirIncidencia();">Imprimir Documento</button>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
  </div>
    <?php } ?>
   
  <style type="text/css" media="print">
@media print {
    #salida_material {
        padding-top: 0;
    }

    #salida_material table td {
        border: none;
    }

    body {
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
    }
    #documento_multa{
        font-size: 18px;
    }
    #documento_multa .row{
        margin:0px;
    }
    #documento_multa table tr td{
        padding: 5px;
        text-align: center;
        font-size: 18px;
    }
}
</style>
<div class="container-fluid" style="display: none">
  <div class="card" id="salida_material" >
    <div class="row">
      <div class="col-12">
        <br><br>
          <table class="" style="width:100%" border="1" cellpadding="4" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="b_top b_bottom b_left" style="text-align: center" width="20%" rowspan="2">
                                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png"
                                    style="display: inline-block; width: 120px;">
                            </th>
                            <th class="b_top" width="50%" style="vertical-align: middle; text-align: center; font-size: 20px;">
                                ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.
                            </th>
                            <th class="b_top b_right"
                                style="vertical-align: middle; text-align: center; font-size: 20px;" width="25%">
                                <strong>C&oacute;digo: ANEXO DIB 001</strong>
                            </th>
                        </tr>
                        <tr>
                            <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center; font-size: 20px;">
                                CARTA COMPROMISO DE PAGO
                            </th>
                            <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center; font-size: 20px;">
                                Revisión: 00
                            </th>
                        </tr>
                    </thead>
            </table>
      </div>
    </div>
    <div class="row">
      <div class="col-12">&nbsp;</div>
      <br><br><br><br>
      <div class="col-4"></div>      
      <div class="col-8" style="text-align: center;font-size: 20px;">
        <?php setlocale(LC_ALL, 'es_ES'); ?>
        Tlalnepantla Estado de México a <?= date('d') ?> de <?=strftime('%B')?> del <?= date('Y') ?>
      </div>
      
      <br><br><br><br><br><br>
      <div class="col-12">
        <p style="font-size: 25px;">A quien corresponda:</p>
        <!--<h1 style="font-size: 25px;">Nombre: <span class="operador"></span></h1>-->
      </div>
      <br><br><br><br>
      <div class="col-12">
        <p style="font-size: 25px;text-align: justify;">Por medio de la presente solicito se me descuente la cantidad de $<strong><span class="costo"></span> (<span class="letras"></span>)</strong> por concepto de: <span class="concepto"></span></p>
      </div>            
      <br><br><br><br><br><br>
      <div class="col-12">
        <p style="font-size: 25px;">Acepto el descuento y me comprometo a pagar.</p>
      </div>
      <br><br>
      <div style="position: fixed;bottom: 0;width: 100%" class="container-fluid bg-light text-center p-3">
        <p>____________________________________________</p>
        <p style="font-size: 25px;"><strong><span class="operador"></span></strong></p>
        <p style="font-size: 25px;">Autorizo se realice el descuento</p>
        <br><br><br>
        <p style="color:#00BFFF;">______________________________________________________________________________________________________</p>
        <p style="font-size: 20px;color:#00BFFF;">CALLE FILIBERTO GOMEZ No. 46, COL. CENTRO INDUSTRIAL C.P. 54030 TLALNEPANTLA DE BAZ, MÉXICO.</p>
        <p style="font-size: 20px;color:#00BFFF;">TEL. (55) 6552-9104, 6552-9101</p>
      </div>
    </div>
</div>
</div>


<?php function dias_restantes($fecha_final)
{
  $fecha_actual = date("Y-m-d");
  $s = strtotime($fecha_final) - strtotime($fecha_actual);
  $d = intval($s / 86400);
  $diferencia = $d;
  return $diferencia;
}
function timeDiff($firstTime, $lastTime)
{
  $firstTime = strtotime($firstTime);
  $lastTime = strtotime($lastTime);
  $timeDiff = $lastTime - $firstTime;
  return $timeDiff;
}
function dias_vacaciones($antiguedad)
{

  switch ($antiguedad) {
    case ($antiguedad >= 1 && $antiguedad < 365):
      $dias_anterior = 0;
      $dias = 12;
      break;
    case ($antiguedad >= 365 && $antiguedad < 730):
      $dias_anterior = 12;
      $dias = 14;
      break;
    case ($antiguedad >= 730 && $antiguedad < 1095):
      $dias_anterior = 26;
      $dias = 16;
      break;
    case ($antiguedad >= 1095 && $antiguedad < 1460):
      $dias_anterior = 42;
      $dias = 18;
      break;
    case ($antiguedad >= 1460 && $antiguedad < 1825):
      $dias_anterior = 60;
      $dias = 20;
      break;
    case ($antiguedad >= 1825 && $antiguedad < 2190):
      $dias_anterior = 80;
      $dias = 20;
      break;
    case ($antiguedad >= 2190 && $antiguedad < 2555):
      $dias_anterior = 100;
      $dias = 20;
      break;
    case ($antiguedad >= 2555 && $antiguedad < 2920):
      $dias_anterior = 120;
      $dias = 20;
      break;
    case ($antiguedad >= 2920 && $antiguedad < 3285):
      $dias_anterior = 140;
      $dias = 20;
      break;
    case ($antiguedad >= 3285 && $antiguedad < 3650):
      $dias_anterior = 160;
      $dias = 22;
      break;
    case ($antiguedad >= 3650 && $antiguedad < 4015):
      $dias_anterior = 182;
      $dias = 22;
      break;
    case ($antiguedad >= 4015 && $antiguedad < 4380):
      $dias_anterior = 204;
      $dias = 22;
      break;
    case ($antiguedad >= 4380 && $antiguedad < 4745):
      $dias_anterior = 226;
      $dias = 22;
      break;
    case ($antiguedad >= 4745 && $antiguedad < 5110):
      $dias_anterior = 228;
      $dias = 22;
      break;
    default:
      $dias = 0;
      break;
  }
  $restantes = $antiguedad - (365 * (($antiguedad - $antiguedad % 365) / 365));
  return (int)((($dias / 365) * $restantes) + $dias_anterior);
}
function dias_vacaciones_calculos($antiguedad)
{

  switch ($antiguedad) {
    case ($antiguedad >= 1 && $antiguedad < 366):
      $dias = 12;
      break;
    case ($antiguedad >= 366 && $antiguedad < 731):
      $dias = 14;
      break;
    case ($antiguedad >= 731 && $antiguedad < 1096):
      $dias = 16;
      break;
    case ($antiguedad >= 1096 && $antiguedad < 1461):
      $dias = 18;
      break;
    case ($antiguedad >= 1461 && $antiguedad < 3286):
      $dias = 20;
      break;
    case ($antiguedad >= 3286 && $antiguedad < 5111):
      $dias = 22;
      break;
    case ($antiguedad >= 5111 && $antiguedad < 6936):
      $dias = 24;
      break;
    case ($antiguedad >= 6936 && $antiguedad < 8761):
      $dias = 26;
      break;
    case ($antiguedad >= 8761 && $antiguedad < 10586):
      $dias = 28;
      break;
    case ($antiguedad >= 10586 && $antiguedad < 12410):
      $dias = 30;
      break;
    default:
      $dias = 0;
      break;
  }

  return $dias;
} ?>
<script src="<?= base_url() ?>js/file-image.js?v=1.0.0"></script>
<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-filestyle.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  
  $(function() {

  });
  $(document).on('click', '.cancelar-contrato', function() {
    var _this = $(this);
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar el contrato?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>personal/cancelar-contrato",
          type: "post",
          dataType: "json",
          data: {
            uid: _this.data('uid'),
            token: '<?= $token ?>'
          },
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            console.log(resp)
            if (resp.status) {
              _this.closest('tr').find('.estatus-contrato').html(
                '<span class="text-warning bold">Cancelado</span>')
              _this.remove();
              Toast.fire({
                type: 'success',
                title: resp.message
              })
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              })
            }
          }
        });
      }
    })
  });
  $(document).on('click', '.cancelar-vacaciones', function() {
    var _this = $(this);
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar las vacaciones del " + _this.data('periodo') + "?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>personal/cancelar-vacaciones",
          type: "post",
          dataType: "json",
          data: {
            uid: _this.data('uid'),
            token: '<?= $token ?>'
          },
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            console.log(resp)
            if (resp.status) {
              Toast.fire({
                type: 'success',
                title: resp.message
              });
              location.reload(true);
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              })
            }
          }
        });
      }
    })
  });

  function cargar_archivo(id) {

    var formData = new FormData(document.getElementById("formuploadajax_archivos" + id));
    $.ajax({
      url: "<?= base_url() ?>personal/cargar-archivo",
      type: "post",
      dataType: "json",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      complete: function(res) {
        var resp = JSON.parse(res.responseText);
        console.log(resp)
        if (resp.status) {
          location.reload(true);
        } else {
          Toast.fire({
            type: 'error',
            title: resp.message
          })
        }
      }

    }).always(function() {
      $(".archivos").filestyle('clear');
    });;
  }
  $('#image').filestyle({
    text: '&nbsp;Imagen',
    btnClass: 'btn-outline-info',
    htmlIcon: '<span class="fa fa-picture-o" aria-hidden="true"></span>'
  });
  $('#documentoInput').filestyle({
    text: '&nbsp;Documento',
    btnClass: 'btn-outline-info',
    htmlIcon: '<span class="fa fa-document" aria-hidden="true"></span>'
  });
  $(".archivos").filestyle({
    text: '&nbsp;Seleccione archivo PDF',
    btnClass: 'btn-outline-info',
    input: false,
    badge: true,
    onChange: function(files, id) {

      swal({
          title: "¿Desea cargar archivo?",
          text: "El archivo debe ser en formato PDF",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            cargar_archivo(id);
          } else {
            $(".archivos").filestyle('clear');
          }
        });
    }
  });


  /*function getDayInRange(dayNumber, startDate, endDate, inclusiveNextDay) {
    var start = moment(startDate),
      end = moment(endDate),
      arr = [];
  
    // Get "next" given day where 1 is monday and 7 is sunday
    let tmp = start.clone().day(dayNumber);
    if (!!inclusiveNextDay && tmp.isAfter(start, 'd')) {
      arr.push(tmp.format('DD-MM-YYYY'));
    }
  
    while (tmp.isBefore(end)) {
      tmp.add(7, 'days');
      arr.push(tmp.format('DD-MM-YYYY'));
    }
  
    // If last day matches the given dayNumber, add it.
    if (end.isoWeekday() === dayNumber) {
      arr.push(end.format('DD-MM-YYYY'));
    }
  
    return arr;
  }
  
  $('#daterange-2')
    .dateRangePicker(configObject2)
    .bind('datepicker-change', function(event, obj) {
  
      var sundays = getDayInRange(7, moment(obj.date1), moment(obj.date1).add(selectedDatesCount, 'd'));
      console.log(sundays);
  
      $('#daterange-2')
        .data('dateRangePicker')
        .setDateRange(obj.value, moment(obj.date1)
          .add(selectedDatesCount + sundays.length, 'd')
          .format('DD-MM-YYYY'), true);
    });*/


  Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf())
    date.setDate(date.getDate() + days);
    return date;
  }


  $('#rango_fechas').on('apply.daterangepicker', function(ev, picker) {

    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    $('.form-group').removeClass('has-error');
    $('#start').val(picker.startDate.format('YYYY-MM-DDTHH:mm'));
    $('#end').val(picker.endDate.format('YYYY-MM-DDTHH:mm'));

    $('#numero_dias').val((moment.duration(moment(picker.endDate).diff(moment(picker.startDate))).days() + 1));

  });

  $('#rango_fechas2').on('apply.daterangepicker', function(ev, picker) {

    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    $('.form-group').removeClass('has-error');
    var startDate = new Date(picker.startDate.format('MM/DD/YYYY'));
    var endDate = new Date(picker.endDate.format('MM/DD/YYYY'));
    $('#start2').val(picker.startDate.format('YYYY-MM-DDTHH:mm'));
    $('#end2').val(picker.endDate.format('YYYY-MM-DDTHH:mm'));

    var totalSundays = 0;
    for (var i = startDate; i <= endDate; i.setDate(i.getDate() + 1)) {
      //console.log(i);
      if (i.getDay() === 0) {
        totalSundays++;
        //alert(i.getDay());
      }
      
    }

    
    //alert(totalSundays);

    if (startDate == endDate) {
      $('#numero_dias2').val((1));;
    } else {

      $('#numero_dias2').val((moment.duration(moment(picker.endDate).diff(moment(picker.startDate))).days() + 1 - totalSundays))
        .trigger("change");;
    }

  });

  $('#rango_fechas_incapacidad').on('apply.daterangepicker', function(ev, picker) {

    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    $('.form-group').removeClass('has-error');
    $('#start_incapacidad').val(picker.startDate.format('YYYY-MM-DDTHH:mm'));
    $('#end_incapacidad').val(picker.endDate.format('YYYY-MM-DDTHH:mm'));

    $('#numero_dias_incapacidad').val((moment.duration(moment(picker.endDate).diff(moment(picker.startDate)))
      .days() + 1)).trigger("change");;


  });


  $(document).on('change', '#tipo-incapacidad', function() {
    if ($("option:selected", this).val() == 'm') {
      $('#subtipo-incapacidad').prop('selectedIndex', 0);
      $('#subtipo-incapacidad option[value="e"]').removeAttr('disabled');
    } else {
      $('#subtipo-incapacidad').prop('selectedIndex', 0);
      $('#subtipo-incapacidad option[value="e"]').attr('disabled', 'disabled');
    }
  });

  $(document).on('change', '#numero_dias2', function() {
    var x = 0;
    var valor = parseInt($(this).val());

    while (x < $('.dias_pendientes_periodo').length) {

      if (valor <= parseInt($('.dias_pendientes_periodo' + x).val())) {

        $('.dias_a_disfrutar' + x).val(valor)
        break;

      } else {

        $('.dias_a_disfrutar' + x).val(parseInt($('.dias_pendientes_periodo' + x).val()));
        valor = (valor - parseInt($('.dias_pendientes_periodo' + x).val()));

      }

      x++;
    }

  });

  $('#rango_fechas, #rango_fechas2, #rango_fechas_incapacidad').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
  });
  $(document).ready(function() {

    $('#nuevaAsignacion_material').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar una asignación de material?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/material';
        }
      })
    });

    $('#nuevaAsignacion_refaccion').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar una asignación de refaccion?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>/almacen/asignacion/refaccion/nueva/<?php echo $detalle->uid_usuario ?>';
        }
      })
    });
    $('#nuevaAsignacion_tarjeta').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar una asignación de tarjeta?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/tarjetas';
        }
      })
    });

    $('#nuevaAsignacion_herramienta').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar una asignación de herramienta?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/herramienta';
        }
      })
    });

    $('#justificacion_materiales').click(function(event) {
      var formData = new FormData(document.getElementById("formuploadajax_justificaciones"));
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea justificar todo el material?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          var id_usuario = <?= $detalle->idtbl_usuarios ?>;
          $.ajax({
          url: "<?= base_url() ?>personal/justificar_materiales",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
              location.reload(true);
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              });
            }
          }
        });
        }
      })
    });

    $('#pruebaManejo').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar una prueba de manejo?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>ControlVehicular/nueva_prueba_manejo/<?php echo $detalle->uid_usuario ?>';
        }
      })
    });

    $('#pruebaManejoA').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea editar la prueba de manejo?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>ControlVehicular/editar_prueba_manejo/<?php echo $detalle->uid_usuario ?>';
        }
      })
    });

    $('#nuevaAsignacion_alto-costo').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar una asignación de material de activo fijo?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/alto-costo';
        }
      });
    });

    $('#nuevaAsignacion_sistemas').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar una asignación de material de alto costo?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/sistemas';
        }
      });
    });

    $('#nuevaAsignacion_control-vehicular').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar una asignación de material de control vehicular?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/control-vehicular';
        }
      });
    });

    $('#nuevaAsignacion_hilti').click(function(event) {
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea iniciar una asignación de material Hilti?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          location.href =
            '<?php echo base_url() ?>/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/hilti';
        }
      })

    });

    $(document).on('shown.bs.tab', function(e) {
      $.fn.dataTable.tables({
        visible: true,
        api: true
      }).columns.adjust();
    });
    var date = new Date();
    var currentDate = '';
    var currentYear = date.getFullYear();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    <?php if($this->session->userdata('tipo') == 5){ ?>
      currentYear -= 1;
      currentDate -= 15;
      <?php } ?>
    <?php if($this->session->userdata('tipo') != 5){ ?>
      currentDate += 15;
      <?php } ?>
    $('#rango_fechas, #rango_fechas2, #rango_fechas_incapacidad').daterangepicker({
      minDate: new Date(currentYear, currentMonth, currentDate),
      timePicker: false,
      autoUpdateInput: false,
      "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "daysOfWeek": [
          "Dom",
          "Lun",
          "Mar",
          "Mie",
          "Jue",
          "Vie",
          "Sab"
        ],
        "monthNames": [
          "Enero",
          "Febrero",
          "Marzo",
          "Abril",
          "Mayo",
          "Junio",
          "Julio",
          "Agosto",
          "Septiembre",
          "Octubre",
          "Noviembre",
          "Diciembre",
        ],
        "firstDay": 1
      }
    });
  });
  $(document).ready(function() {

    $("#formuploadajax").on("submit", function(e) {
      e.preventDefault();
      var f = $(this);
      var formData = new FormData(document.getElementById("formuploadajax"));
      $.ajax({
        url: "<?= base_url() ?>personal/cambiar-foto",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function(res) {
          var resp = JSON.parse(res.responseText);
          if (resp.status == true) {
            location.reload(true);
          } else {
            $("#error").html(resp.message);
          }
        }
      });
    });

    $("#formuploadajax_baja").on("submit", function(event) {
      var f = $(this);
      var formData = new FormData(document.getElementById("formuploadajax_baja"));
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        var button = f.find("button[type='submit']");
        button.prop("disabled", true);
        event.preventDefault();
        $.ajax({
          url: "<?= base_url() ?>personal/baja",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
              location.reload(true);
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              });
              button.prop("disabled", false);
            }
          }
        });
      }
    });

    $("#formuploadajax_alta").on("submit", function(event) {

      var f = $(this);
      var formData = new FormData(document.getElementById("formuploadajax_alta"));
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        $.ajax({
          url: "<?= base_url() ?>personal/alta",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
              location.reload(true);
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              })
            }
          }
        });
      }
    });

    $("#formuploadajax_acta").on("submit", function(event) {

      var f = $(this);
      var formData = new FormData(document.getElementById("formuploadajax_acta"));
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        $.ajax({
          url: "<?= base_url() ?>personal/nueva-acta",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
              location.reload(true);
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              })
            }
          }
        });
      }
    });

    $('#formuploadajax_vacaciones').on("submit", function(event) {
      var formData = new FormData(event.target);
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        $.ajax({
          url: "<?= base_url() ?>personal/vacaciones",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
              location.reload(true);
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              })
            }

          }
        });
      }
    });

    $('#formuploadajax_descuentos').on("submit", function(event) {
      var formData = new FormData(event.target);
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        $.ajax({
          url: "<?= base_url() ?>personal/justificar_descontar",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
              location.reload(true);
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              })
            }

          }
        });
      }
    });

    $('#formuploadajax_incapacidad').on("submit", function(event) {
      var formData = new FormData(event.target);
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        $.ajax({
          url: "<?= base_url() ?>personal/incapacidades",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
              location.reload(true);
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              })
            }

          }
        });
      }
    });

    $("#formuploadajax_permisos").on("submit", function(event) {
      var formData = new FormData(event.target);
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        console.log('Entra')
        $.ajax({
          url: "<?= base_url() ?>personal/permiso",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
              location.reload(true);
            } else {
              Toast.fire({
                type: 'error',
                title: resp.message
              })
            }

          }
        });
      }
    });

    var t = moment().startOf("day"),
      e = t.format("YYYY-MM"),
      a = t.clone().subtract(1, "day").format("YYYY-MM-DD"),
      n = t.format("YYYY-MM-DD"),
      r = t.clone().add(1, "day").format("YYYY-MM-DD");

    $("#calendar").fullCalendar({
      lang: 'es',
      header: {
        left: "prev,next today",
        center: "title",
        right: "month,agendaWeek,agendaDay,listWeek"
      },
      editable: 0,
      eventLimit: !0,
      navLinks: !0,
      themeSystem: "bootstrap3",
      bootstrapGlyphicons: !1,
      eventColor: 'rgba(54, 162, 235,0.7)',
      events: [

        <?php if ($asistencias) : ?>
          <?php foreach ($asistencias as $key => $value) : ?>
            <?php if ($value->entrada != NULL) : ?> {
                title: "Entrada",
                start: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_hora . ' ' . $value->entrada)) ?>",
                end: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_hora . ' ' . $value->entrada)) ?>"
              },
              {
                title: "Salida",
                start: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_hora . ' ' . $value->salida)) ?>",
                end: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_hora . ' ' . $value->salida)) ?>"
              },

            <?php endif; ?>
          <?php endforeach ?>
        <?php endif; ?>

        <?php if ($vacaciones_permisos) : ?>
          <?php foreach ($vacaciones_permisos as $key => $value) : ?>
            <?php if ($value->tipo == 'vacaciones') : ?> {
                color: 'rgba(153, 102, 255, 0.5)',
                title: "<?= ucfirst($value->tipo) ?>",
                start: "<?php echo strftime("%Y-%m-%d", strtotime($value->fecha_inicio)) ?>T00:00:00",
                end: "<?php echo strftime("%Y-%m-%d", strtotime($value->fecha_final)) ?>T23:59:59"
              },
            <?php else : ?> {
                color: 'rgba(75, 192, 192, 0.5)',
                title: "<?= ucfirst($value->tipo) ?>",
                start: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_inicio)) ?>",
                end: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->fecha_final)) ?>"
              },
            <?php endif ?>
          <?php endforeach ?>
        <?php endif ?>

        <?php if ($actas) : ?>
          <?php foreach ($actas as $key => $value) : ?> {
              color: 'rgba(255, 99, 132, 0.75)',
              title: "Acta Administrativa",
              start: "<?php echo strftime("%Y-%m-%dT%T", strtotime($value->timestamp)) ?>"
            },
          <?php endforeach ?>
        <?php endif ?>

        {
          color: 'rgba(75, 192, 192, 0.5)',
          title: "Inicio de Contrato",
          start: "<?php echo strftime("%Y-%m-%d", strtotime($detalle->fecha_inicio)) ?>T00:00:00"
        },
        {
          color: 'rgba(75, 192, 192, 0.5)',
          title: "Fin de Contrato",
          start: "<?php echo strftime("%Y-%m-%d", strtotime($detalle->fecha_inicio . "+ " . $detalle->duracion . " days")) ?>T23:59:59"
        }
      ]
    });
  });

  $(document).on('click', '#nuevo-contrato', function(event) {

    Swal.fire({
      title: '¡Atención!',
      text: '¿Desea generar un nuevo contrato?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmar'
    }).then((result) => {
      if (result.value) {

        (async function getFormValues() {
          const {
            value: formValues
          } = await Swal.fire({
            title: 'Detalles de contrato',
            html: '<div class="form-group"><label for="swal-input1">Fecha Inicio Contrato*</label><input required id="swal-input1" type="date" class="swal2-input form-control"></div>' +
              '<div class="form-group"><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="determinado" checked>Determinado</label></div><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="indeterminado">Indeterminado</label></div><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="por proyecto u obra">Por proyecto u obra</label></div></div>' +
              '<div class="form-group" id="dias_contrato"><label for="swal-input2">Días</label><input id="swal-input2" type="text" step="1" class="swal2-input form-control"><small class="form-text text-muted">Ingrese días de duración del contrato determinado</small></div>',
            focusConfirm: false,
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return [
                document.getElementById('swal-input1').value,
                document.getElementById('swal-input2').value,
                $("input[name='tipo_contrato']:checked").val(),
                '<?= $token ?>'
              ]
            }
          })

          if (formValues) {

            if (formValues[0] != '') {

              if (formValues[2] == 'determinado' && formValues[1] == '') {
                Toast.fire({
                  type: 'error',
                  title: 'Debe ingresar el campo días para contrato determinado.'
                })
                return 0;
              }

              $.ajax({
                  url: '<?= base_url() ?>personal/nuevo-contrato',
                  type: 'POST',
                  dataType: 'json',
                  data: {
                    fecha: formValues[0],
                    dias: formValues[1],
                    tipo: formValues[2],
                    token: formValues[3],
                    uid: '<?= $detalle->uid_usuario ?>',
                    contrato: '<?= $detalle->idctl_contratos ?>'
                  },
                  beforeSend: function() {
                    $('body').addClass('load');
                  },
                  success: function(data) {
                    if (data.error)
                      Toast.fire({
                        type: 'error',
                        title: data.error
                      });
                    else {
                      location.reload(true);
                    }

                  },
                  error: function(data) {
                    Toast.fire({
                      type: 'error',
                      title: 'Ocurrio un error intente nuevamente.'
                    })
                  }
                })
                .done(function() {

                })
                .fail(function() {
                  Toast.fire({
                    type: 'error',
                    title: 'Ocurrio un error intente nuevamente.'
                  })
                })
                .always(function() {
                  $('body').removeClass('load');
                });

            } else {
              Toast.fire({
                type: 'error',
                title: 'Debe Ingresar los datos Solicitados.'
              })
            }


          }
        })()

      }
    })

  });

  function openWin(obj) {
    event.preventDefault();
    myWindow = window.open(obj.getAttribute("href"), '_blank', 'width=1000,height=800,left=0,top=0');
    myWindow.document.close(); //missing code
    myWindow.focus();
    myWindow.print();
    //myWindow.close();

  }
  $('#justificar_asignacion').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find("input[name='estatus_devolucion_rh']").val("Perndiente Almacen");
    modal.find("input[name='iddtl_asignacion']").val(recipient.iddtlAsignacion);
  });

  $('#justificar_asignaciones').on('show.bs.modal', function(event) {
    $("#descuentos").empty();
    $("#justificaciones").empty();
    $("#total_justificacion").empty();
    $("#total_descuento").empty();
    var total = 0;
    var total_descuento = 0;
    //var checkbox = 0;
    $('input[name="material_justificar[]"]:checked').each(function() {
        console.log("Checkbox " + $(this).data("precio") +  " (" + $(this).val() + ") Seleccionado");
        total += (parseFloat($(this).data("precio")) * parseFloat($(this).data("unidades")));
      $("#justificaciones").append("<li class='list-group-item'>"+ $(this).data("equipo") + ": $" + (parseFloat($(this).data("precio")) * parseFloat($(this).data("unidades")))+"</li>");
      $("#justificaciones").append("<input type='hidden' name='justificaciones[]' value='" + $(this).val() + "'>");
      $("#justificaciones").append("<input type='hidden' name='catalogo_justificacion[]' value='" + $(this).data("catalogo") + "'>");
      $("#justificaciones").append("<input type='hidden' name='cantidad_justificacion[]' value='" + $(this).data("unidades") + "'>");
    });
    $('#total_justificacion').append('Total de justificación: $' + '<input name="total_justificacion" class="form-control" value="' + total + '">');
    $('input[name="material_justificar[]"]').prop("checked", false).each(function(){
      console.log("Checkbox " + $(this).data("precio") +  " (" + $(this).val() + ") Seleccionado");
      total_descuento += (parseFloat($(this).data("precio")) * parseFloat($(this).data("unidades")));
      $("#descuentos").append("<li class='list-group-item'>"+ $(this).data("equipo") + ": $" + (parseFloat($(this).data("precio")) * parseFloat($(this).data("unidades")))+"</li>");
      $("#descuentos").append("<input type='hidden' name='descuentos[]' value='" + $(this).val() + "'>");
      $("#descuentos").append("<input type='hidden' name='catalogo_descuento[]' value='" + $(this).data("catalogo") + "'>");
      $("#descuentos").append("<input type='hidden' name='cantidad_descuento[]' value='" + $(this).data("unidades") + "'>");
    });
    $('#total_descuento').append('Total de descuento: $' + '<input name="total_descuento" class="form-control" value="' + total_descuento + '">');
    /*if(checkbox == 0){
      $('#btn_justificaciones').prop('disabled', true); 
    }else{
      $('#btn_justificaciones').prop('disabled', false); 
    }*/
  });

  $('#editar_estatus_incidencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $("#unidad").empty();
    $("#fecha").empty();
    $("#costo").empty();
    $("#incidencia").empty();
    $("#comentario_estatus").empty();
    modal.find("input[name='idtbl_incidencias']").val(recipient.idtbl_incidencias);
    $("#unidad").append(recipient.unidad);
    $("#fecha").append(recipient.fecha_incidencia);
    $("#costo").append(recipient.costo);
    $("#incidencia").append(recipient.incidencia);
    $("#estatus").val(recipient.estatus);
    $("#comentario_estatus").append(recipient.comentario_estatus);
    $('#historialOperador').modal('hide');

  });

  $('#nueva_incidencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    <?php if($this->session->userdata('tipo') == 3){ ?>
    $.ajax({
        url: "<?php echo base_url();?>ControlVehicular/getTodosAutosAsignados",
        type: "POST",
        data: {
            idtbl_usuarios: recipient.idtbl_usuarios
        },
        dataType: "json",
        cache: false,
        success: function(resp) {
            $("#selecteco").empty();
            html = '';
            html += '<select class="form-control" name="iddtl_almacen" required>';
            html +=
                '<option value="" disabled="disabled" selected="selected">Seleccione...</option>';
                html +=
                '<option value="" selected="selected">Sin unidad</option>';
            for (var i = 0; i < resp.length; i++) {
                html += '<option value="' + resp[i]['iddtl_almacen'] + '">' + resp[i][
                    'numero_interno'
                ] + '</option>';
            }
            html += '</select>';
            $("#selecteco").append(html);
        }
    });
    <?php }elseif($this->session->userdata('tipo') == 2){ ?>
      $.ajax({
        url: "<?php echo base_url();?>Sistemas/getTodosActivosAsignados",
        type: "POST",
        data: {
            idtbl_usuarios: recipient.idtbl_usuarios
        },
        dataType: "json",
        cache: false,
        success: function(resp) {
            $("#selecteco").empty();
            html = '';
            html += '<select class="form-control" name="iddtl_almacen" required>';
            html +=
                '<option value="" disabled="disabled" selected="selected">Seleccione...</option>';
            for (var i = 0; i < resp.length; i++) {
                html += '<option value="' + resp[i]['iddtl_almacen'] + '">' + resp[i][
                    'numero_interno'
                ] + '</option>';
            }
            html += '</select>';
            $("#selecteco").append(html);
        }
    });
    <?php }elseif($this->session->userdata('tipo') == 1){ ?>
      $.ajax({
        url: "<?php echo base_url();?>Almacen/getTodosActivosAsignados",
        type: "POST",
        data: {
            idtbl_usuarios: recipient.idtbl_usuarios
        },
        dataType: "json",
        cache: false,
        success: function(resp) {
            $("#selecteco").empty();
            html = '';
            html += '<select class="form-control" name="iddtl_almacen" required>';
            html +=
                '<option value="" disabled="disabled" selected="selected">Seleccione...</option>';
            for (var i = 0; i < resp.length; i++) {
                html += '<option value="' + resp[i]['iddtl_almacen'] + '">' + resp[i][
                    'numero_interno'
                ] + '</option>';
            }
            html += '</select>';
            $("#selecteco").append(html);
        }
    });
      <?php } ?>

    modal.find("input[name='idtbl_usuarios']").val(recipient.idtbl_usuarios);
    $(".operador").html('');
    $(".operador").html(recipient.operador);
    
  });

  $("#baja").on("show.bs.modal", function(event){
    <?php if(!$verficacion_baja){ ?>
       Swal.fire({
        title: '¡Atención!',
        text: "El usuario tiene asignaciones, no se puede dar de baja.",
        type: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        $("#baja").modal('hide');
      });
    <?php } ?>
  });

  $("#editar_documento").on("show.bs.modal", function(event){
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data(); // Extract info from data-* attributes
    var modal = $(this);
    modal.find("input[name='uid_documento']").val(recipient.uidDocumento);
    modal.find("input[name='uid_usuario']").val(recipient.uidUsuario);
  });

  $("#editar_cursos").on("show.bs.modal", function(event){
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data(); // Extract info from data-* attributes
    console.log(recipient);
    var modal = $(this);
    modal.find("select[name='idtbl_cursos']").val(recipient.idtblCursos);
    modal.find("select[name='id']").val(recipient.idtblCertificados);
    modal.find("input[name='folio']").val(recipient.folio);
    modal.find("input[name='fecha_inicio']").val(recipient.fechaInicio);
    modal.find("input[name='fecha_termino']").val(recipient.fechaTermino);
    modal.find("input[name='duracion']").val(recipient.duracion);
    modal.find("select[name='tutor']").val(recipient.tutor);
    modal.find("select[name='patron_representante']").val(recipient.patronRepresentante);
    modal.find("select[name='representante_trabajadores']").val(recipient.representanteTrabajadores);
    modal.find("input[name='iddtl_certificados_personal']").val(recipient.iddtlCertificadosPersonal);
  });

  $("select[name='tipo_baja']").on("change", function(){
    var value = $(this).val();
    if(value == "Renuncia voluntaria"){
      $("#encuesta-salida-personal").css("display", "block");
    }else{
      $("#encuesta-salida-personal").css("display", "none");
    }
  });

  function imprimirIncidencia() {
    price = $("input[name='costo']").val();
    incidencia = $("select[id='tipo_incidencia'] option:selected").text();
    letras = numeroALetras(price, {
      plural: "PESOS",
      singular: "PESO",
      centPlural: "a",
      centSingular: "a"
    });
    $(".letras").html('');
    $(".concepto").html('');
    $(".costo").html('');
    $(".concepto").html(incidencia);
    $(".costo").html(price);
    $(".letras").html(letras);
    $("#salida_material").print({
        iframe: true,
        globalStyles: true,
        mediaPrint: true,
        noPrintSelector: '.no-print'
    });
  }

  $(".generar-contrato").on('click', function(e){
    (async function getFormValues() {
          const {
            value: formValues
          } = await Swal.fire({
            title: 'Detalles de contrato',
            html: '<div class="form-group"><label for="swal-input1">Fecha Inicio Contrato*</label><input required id="swal-input1" type="date" class="swal2-input form-control"></div>' +
              '<div class="form-group"><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="determinado" checked>Determinado</label></div><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="indeterminado">Indeterminado</label></div><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="por proyecto u obra">Por proyecto u obra</label></div></div>' +
              '<div class="form-group" id="dias_contrato"><label for="swal-input2">Días</label><input id="swal-input2" type="text" step="1" class="swal2-input form-control"><small class="form-text text-muted">Ingrese días de duración del contrato determinado</small></div>',
            focusConfirm: false,
            showLoaderOnConfirm: true,
            preConfirm: () => {
              return [
                document.getElementById('swal-input1').value,
                document.getElementById('swal-input2').value,
                $("input[name='tipo_contrato']:checked").val(),
                '<?= $token ?>'
              ]
            }
          })

          if (formValues) {

            if (formValues[0] != '') {

              if (formValues[2] == 'determinado' && formValues[1] == '') {
                Toast.fire({
                  type: 'error',
                  title: 'Debe ingresar el campo días para contrato determinado.'
                })
                return 0;
              }

              var button = $(this);
              button.prop("disabled", true);
              var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
              var tipo_duracion = formValues[2];
              var duracion = "";
              if(tipo_duracion != "indeterminado"){
                duracion = numeroALetras(formValues[1], {
                  plural: "DIAS", 
                  singular: "DIA ", 
                  centPlural: "", 
                  centSingular: ""
                });
                duracion = duracion.replace(" 0/100 MN", "");
              }
              var fechaArray = formValues[0].split("-");
              var fecha = fechaArray[2] + " DE " + meses[parseInt(fechaArray[1])-1] + " DE " + fechaArray[0];
              
              $.ajax({
                  url: "<?php echo base_url();?>personal/generarContrato",
                  method: 'GET',
                  data: {
                    empresa: '<?= $detalle->empresa ?>'.toUpperCase(),
                    departamento: '<?= $detalle->departamento ?>'.toUpperCase() ,
                    puesto_contrato: '<?= $detalle->perfil ?>'.toUpperCase(),
                    nacionalidad: '<?= $detalle->nacionalidad ?>'.toUpperCase(),
                    edad: '<?= $detalle->edad ?>'.toUpperCase(),
                    nombre: '<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>'.toUpperCase(),
                    estado_civil: '<?= $detalle->estado_civil ?>'.toUpperCase(),
                    rfc: '<?= $detalle->rfc ?>'.toUpperCase(),
                    curp: '<?= $detalle->curp ?>'.toUpperCase(),
                    domicilio: '<?= $detalle->calle . " #" . $detalle->numero . ", " . $detalle->colonia . " C.P. " . $detalle->cp . " " . $detalle->nombre_municipio . ", " . $detalle->nombre_entidad ?>'.toUpperCase(),
                    fecha: fecha,
                    sexo: "<?= $detalle->sexo ?>".toUpperCase(),
                    tipo_duracion: tipo_duracion.toUpperCase(),
                    duracion: duracion.toUpperCase()
                  },
                  xhrFields: {
                      responseType: 'blob'
                  },
                  success: function (data) {
                      var a = document.createElement('a');
                      var url = window.URL.createObjectURL(data);
                      a.style.visibility = "visible";
                      a.href = url;
                      a.download = 'contrato.docx';
                      document.body.append(a);
                      a.click();
                      a.remove();
                      window.URL.revokeObjectURL(url);
                      button.prop("disabled", false);
                  },
                  error: function (data){
                    button.prop("disabled", false);
                  }
              });

            } else {
              Toast.fire({
                type: 'error',
                title: 'Debe Ingresar los datos Solicitados.'
              })
            }
          }
        })()
  });

  $("#carta-patronal").on('click', function(e){
    var button = $(this);
    button.prop("disabled", true);
    var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    var fechaArray = '<?= $detalle->fecha_ingreso ?>'.split("-");
    var fecha_ingreso = fechaArray[2] + "-" + meses[parseInt(fechaArray[1])-1] + "-" + fechaArray[0];
    var fecha = new Date();
    fecha = fecha.getDate() + " DE " + meses[fecha.getMonth()] + " DE " + fecha.getFullYear()
    console.log(fecha);
    $.ajax({
        url: "<?php echo base_url();?>personal/generarCartaPatronal",
        method: 'POST',
        data: {
          uid_usuario: '<?= $detalle->uid_usuario ?>',
          fecha: fecha,
          nombre: '<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>'.toUpperCase(),
          fecha_ingreso: fecha_ingreso,
          rfc: '<?= $detalle->rfc ?>'.toUpperCase(),
          nss: '<?= $detalle->nss ?>'.toUpperCase(),
          puesto_contrato: '<?= $detalle->perfil ?>'.toUpperCase(),
          domicilio: '<?= $detalle->calle . " #" . $detalle->numero . ", " . $detalle->colonia . " " . $detalle->nombre_municipio . ", " . $detalle->nombre_entidad . " C.P. " . $detalle->cp  ?>'.toUpperCase(),
          empresa: '<?= $detalle->empresa ?>'.toUpperCase(),
          image_empresa : '<?= $detalle->image_empresa ?>',
          domicilio_empresa: '<?= $detalle->domicilio ?>',
          rfc_empresa: '<?= $detalle->rfc_empresa ?>'.toUpperCase(),
          registro_patronal: '<?= $detalle->registro_patronal ?>'.toUpperCase(),
        },
        xhrFields: {
            responseType: 'blob'
        },
        success: function (data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.style.visibility = "visible";
            a.href = url;
            a.download = 'carta-patronal.docx';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
            button.prop("disabled", false);
        },
        error: function (data){
          button.prop("disabled", false);
        }
    });
  });

  $("#convenio-salida").on('click', function(e){
    var button = $(this);
    button.prop("disabled", true);
    var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    var fechaArray = '<?= $detalle->fecha_ingreso ?>'.split("-");
    var fecha_ingreso = fechaArray[2] + "-" + meses[parseInt(fechaArray[1])-1] + "-" + fechaArray[0];
    var fecha = new Date();
    fecha = fecha.getDate() + " DE " + meses[fecha.getMonth()] + " DE " + fecha.getFullYear()
    console.log(fecha);
    $.ajax({
        url: "<?php echo base_url();?>personal/generarConvenioSalida",
        method: 'POST',
        data: {
          fecha: fecha,
          empresa: '<?= $detalle->empresa ?>'.toUpperCase(),
          nombre: '<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>'.toUpperCase(),
          fecha_ingreso: fecha_ingreso,
          puesto_contrato: '<?= $detalle->perfil ?>'.toUpperCase(),
          domicilio: '<?= $detalle->calle . " #" . $detalle->numero . ", " . $detalle->colonia . " " . $detalle->nombre_municipio . ", " . $detalle->nombre_entidad . " C.P. " . $detalle->cp  ?>'.toUpperCase(),
          domicilio_empresa: '<?= $detalle->domicilio ?>'.toUpperCase(),
          horario:  '<?= $detalle->horario ?>'.toUpperCase(),
        },
        xhrFields: {
            responseType: 'blob'
        },
        success: function (data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.style.visibility = "visible";
            a.href = url;
            a.download = 'convenio-salida.docx';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
            button.prop("disabled", false);
        },
        error: function (data){
          button.prop("disabled", false);
        }
    });
  });

  $("#ofi-remis").on('click', function(e){
    var button = $(this);
    button.prop("disabled", true);
    var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    var fecha = new Date();
    fecha = fecha.getDate() + " DE " + meses[fecha.getMonth()] + " DE " + fecha.getFullYear()
    console.log(fecha);
    $.ajax({
        url: "<?php echo base_url();?>personal/generarOfiRemis",
        method: 'POST',
        data: {
          fecha: fecha,
          empresa: '<?= $detalle->empresa ?>'.toUpperCase(),
          nombre: '<?= $detalle->nombres . " " . $detalle->apellido_paterno . " " . $detalle->apellido_materno ?>'.toUpperCase(),
          domicilio: '<?= $detalle->calle . " #" . $detalle->numero . ", " . $detalle->colonia . " " . $detalle->nombre_municipio . ", " . $detalle->nombre_entidad . " C.P. " . $detalle->cp  ?>'.toUpperCase(),
          domicilio_empresa: '<?= $detalle->domicilio ?>',
          domicilio_juridico: '<?= $detalle->domicilio_juridico ?>',
          actividad_empresa: '<?= $detalle->actividad_empresa ?>',
          domicilio_tribunal_laboral: '<?= $detalle->domicilio_tribunal_laboral ?>'.toUpperCase(),
          domicilio_centro_conciliacion_laboral: '<?= $detalle->domicilio_centro_conciliacion_laboral ?>'.toUpperCase(),
        },
        xhrFields: {
            responseType: 'blob'
        },
        success: function (data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.style.visibility = "visible";
            a.href = url;
            a.download = 'ofi-remis.docx';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
            button.prop("disabled", false);
        },
        error: function (data){
          button.prop("disabled", false);
        }
    });
  });

  $("#form_justificar_asignacion").on("submit", function(event){
    event.preventDefault();
    var form = $($(this)[0]);
    var button = form.find("button[type='submit']");
    button.prop("disabled", true);
    var frm = new FormData($(this)[0]);
    $.ajax({
      type: "POST",
      url: '<?= base_url() . 'almacen/justificarAsignacionRH' ?>',
      data: frm,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (data) {
        if(!data.error){
          Toast.fire({
            type: 'success',
            title: data.mensaje
          });
          window.location.reload();
        }else{
          Toast.fire({
            type: 'error',
            title: data.mensaje
          });
          button.prop("disabled", false);
        }
      },
      error: function (data) {
        Toast.fire({
          type: 'error',
          title: data.mensaje
        });
        button.prop("disabled", false);
      }
    }); 
  });

</script>
<script>
var numeroALetras = (function() {
    // Código basado en el comentario de @sapienman
    // Código basado en https://gist.github.com/alfchee/e563340276f89b22042a
    function Unidades(num) {

        switch (num) {
            case 1:
                return 'UN';
            case 2:
                return 'DOS';
            case 3:
                return 'TRES';
            case 4:
                return 'CUATRO';
            case 5:
                return 'CINCO';
            case 6:
                return 'SEIS';
            case 7:
                return 'SIETE';
            case 8:
                return 'OCHO';
            case 9:
                return 'NUEVE';
        }

        return '';
    } //Unidades()

    function Decenas(num) {

        let decena = Math.floor(num / 10);
        let unidad = num - (decena * 10);

        switch (decena) {
            case 1:
                switch (unidad) {
                    case 0:
                        return 'DIEZ';
                    case 1:
                        return 'ONCE';
                    case 2:
                        return 'DOCE';
                    case 3:
                        return 'TRECE';
                    case 4:
                        return 'CATORCE';
                    case 5:
                        return 'QUINCE';
                    default:
                        return 'DIECI' + Unidades(unidad);
                }
            case 2:
                switch (unidad) {
                    case 0:
                        return 'VEINTE';
                    default:
                        return 'VEINTI' + Unidades(unidad);
                }
            case 3:
                return DecenasY('TREINTA', unidad);
            case 4:
                return DecenasY('CUARENTA', unidad);
            case 5:
                return DecenasY('CINCUENTA', unidad);
            case 6:
                return DecenasY('SESENTA', unidad);
            case 7:
                return DecenasY('SETENTA', unidad);
            case 8:
                return DecenasY('OCHENTA', unidad);
            case 9:
                return DecenasY('NOVENTA', unidad);
            case 0:
                return Unidades(unidad);
        }
    } //Unidades()

    function DecenasY(strSin, numUnidades) {
        if (numUnidades > 0)
            return strSin + ' Y ' + Unidades(numUnidades)

        return strSin;
    } //DecenasY()

    function Centenas(num) {
        let centenas = Math.floor(num / 100);
        let decenas = num - (centenas * 100);

        switch (centenas) {
            case 1:
                if (decenas > 0)
                    return 'CIENTO ' + Decenas(decenas);
                return 'CIEN';
            case 2:
                return 'DOSCIENTOS ' + Decenas(decenas);
            case 3:
                return 'TRESCIENTOS ' + Decenas(decenas);
            case 4:
                return 'CUATROCIENTOS ' + Decenas(decenas);
            case 5:
                return 'QUINIENTOS ' + Decenas(decenas);
            case 6:
                return 'SEISCIENTOS ' + Decenas(decenas);
            case 7:
                return 'SETECIENTOS ' + Decenas(decenas);
            case 8:
                return 'OCHOCIENTOS ' + Decenas(decenas);
            case 9:
                return 'NOVECIENTOS ' + Decenas(decenas);
        }

        return Decenas(decenas);
    } //Centenas()

    function Seccion(num, divisor, strSingular, strPlural) {
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let letras = '';

        if (cientos > 0)
            if (cientos > 1)
                letras = Centenas(cientos) + ' ' + strPlural;
            else
                letras = strSingular;

        if (resto > 0)
            letras += '';

        return letras;
    } //Seccion()

    function Miles(num) {
        let divisor = 1000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMiles = Seccion(num, divisor, 'UN MIL', 'MIL');
        let strCentenas = Centenas(resto);

        if (strMiles == '')
            return strCentenas;

        return strMiles + ' ' + strCentenas;
    } //Miles()

    function Millones(num) {
        let divisor = 1000000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMillones = Seccion(num, divisor, 'UN MILLON DE', 'MILLONES DE');
        let strMiles = Miles(resto);

        if (strMillones == '')
            return strMiles;

        return strMillones + ' ' + strMiles;
    } //Millones()

    return function NumeroALetras(num, currency) {
        currency = currency || {};
        let data = {
            numero: num,
            enteros: Math.floor(num),
            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
            letrasCentavos: '',
            letrasMonedaPlural: currency.plural || 'PESOS CHILENOS', //'PESOS', 'Dólares', 'Bolívares', 'etcs'
            letrasMonedaSingular: currency.singular || 'PESO CHILENO', //'PESO', 'Dólar', 'Bolivar', 'etc'
            letrasMonedaCentavoPlural: currency.centPlural || 'CHIQUI PESOS CHILENOS',
            letrasMonedaCentavoSingular: currency.centSingular || 'CHIQUI PESO CHILENO'
        };

        //if (data.centavos > 0) {
            data.letrasCentavos = data.centavos + "/100 MN";
            /*data.letrasCentavos = 'CON ' + (function() {
                if (data.centavos == 1)
                    return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
                else
                    return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
            })();*/
        //};

        if (data.enteros == 0)
            return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
        if (data.enteros == 1)
            return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
        else
            return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    };

})();

$('#ajaxeditarnota').submit(function(event) {               
        
        //alert('se hará bien');
        event.preventDefault();        
        var formData = new FormData(document.getElementById("ajaxeditarnota"));
        $.ajax({
          type: "post", 
          //dataType: "json", 
          url: '<?= base_url(). 'personal/bajaEdit'?>',
            data: formData,
            processData: false,
            contentType: false,
            complete: function(res) {
              var resp = JSON.parse(res.responseText);
              if (resp.status) {                            
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            );                            
                              location.reload();                            
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
          },
          error: function (data) {
            Toast.fire({
                type: 'error',
                title: "Ocurrio un problema."
              });
          }
        });
    }
);
</script>
<style>
  .swal2-popup #swal2-content {
    text-align: inherit !important;
  }

  .swal2-popup .swal2-checkbox,
  .swal2-popup .swal2-file,
  .swal2-popup .swal2-input,
  .swal2-popup .swal2-radio,
  .swal2-popup .swal2-select,
  .swal2-popup .swal2-textarea {
    margin: 0.5em auto !important;
  }
</style>