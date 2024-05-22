<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/css/jquery.Jcrop.min.css" />
<script src="<?= base_url()?>js/jquery.Jcrop.js"></script>
<script src="<?= base_url()?>js/jquery.color.js"></script>
<div class="over"></div>
<div class="spinner" style="display: none">
  <div class="double-bounce1"></div>
  <div class="double-bounce2"></div>
</div>
<section class="no-padding">
  <div class="container-fluid pt-5">
    <div class="row">
      <div class="col">
        <?php if ($detalle->estatus==0): ?>
          <div class="alert alert-danger" role="alert">
            El personal se encuentra actualmente con estatus baja. <a
              href="<?= base_url() ?>contratistas/detalle-baja/<?=$detalle->uid_usuario?>"
              onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;">Ver
            historial</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<section class="dashboard-counts no-padding botones">
  <div class="container-fluid">
    <div class="row">
      <div class="col pt-3 pb-1">
        <?php if($detalle->almacen=='1'): ?>
          <div class="alert alert-success" role="alert">
            <strong>Autorizado para almacen</strong>
          </div>
        <?php endif; ?>
        <div class="alert
          <?php if (count($actas)==1): ?>
            alert-info
          <?php elseif(count($actas)==2): ?>
            alert-warning
          <?php elseif(count($actas)>2): ?>
            alert-danger
          <?php else: ?>
            d-none
          <?php endif; ?>
          " role="alert">
          <strong>El personal cuenta con <?php echo count($actas) ?> actas administrativas.</strong>
        </div>
      </div>
    </div>
  </div>
</section>
<?php if (isset($this->session->userdata('permisos')['contratistas']) && $this->session->userdata('permisos')['contratistas']>1 ): ?>
  <section class="dashboard-counts no-padding botones">
    <div class="container-fluid">
      <?php if ($detalle->estatus==1 && $this->session->userdata("tipo") != 3 &&  $this->session->userdata("tipo") != 15): ?>
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
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-5 col-xl-4">
        <div class="card">
          <div class="card-body text-center">
            <?php $carpeta = './uploads/'.$detalle->uid_usuario.'/'.$detalle->uid_usuario.'-img-credencial.jpg';
              $carpeta2 = './uploads/'.$detalle->uid_usuario.'/'.$detalle->uid_usuario.'-img-credencial.JPG'; if (!file_exists($carpeta) && !file_exists($carpeta2)){ ?>
              <img class="img-fluid" src="<?= base_url()?>uploads/default-user-image.png">
            <?php }elseif(file_exists($carpeta)){ ?>
              <img class="img-fluid"
              src="<?= base_url().'uploads/'.$detalle->uid_usuario.'/'.$detalle->uid_usuario.'-img-credencial.jpg' ?>">
            <?php }elseif(file_exists($carpeta2)){ ?>
              <img class="img-fluid"
              src="<?= base_url().'uploads/'.$detalle->uid_usuario.'/'.$detalle->uid_usuario.'-img-credencial.JPG' ?>">
            <?php } ?>
            <h4 class="h4 mt-3">Número Empleado: <?php echo $detalle->numero_empleado ?></h4>
            <h3 class="h4 mt-2">
              <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?>
              <br> <small class="text-gris"> Fecha de nacimiento:
              <?php echo strftime("%d de %b de %Y",strtotime($detalle->fecha_nacimiento)) ?></small>
            </h3>
            <h3 class="h4 mt-2"><small>Proyecto: <?= $detalle->numero_proyecto ?>
              <?= $detalle->nombre_proyecto ?></small>
            </h3>
            <div class="dt-buttons btn-group">
              <?php if($this->session->userdata("tipo") != 3 &&  $this->session->userdata("tipo") != 15){ ?>
                <?php if ($detalle->estatus==1): ?>
                <a href="javascript:void(0);" data-toggle="modal"
                  class="btn buttons-pdf buttons-html5 btn-danger" data-target="#baja"><span><i
                  class="fa fa-trash"></i> Baja</span></a>
                <?php else: ?>
                <a href="javascript:void(0);" data-toggle="modal"
                  class="btn buttons-pdf buttons-html5 btn-success" data-target="#alta"><span><i
                  class="fa fa-check"></i> Alta</span></a>
                <?php endif; ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-7 col-xl-8">
        <div class="card">
          <?php if($this->session->userdata("tipo") != 3 &&  $this->session->userdata("tipo") != 15){ ?>
          <div class="card-header d-flex align-items-right">
            <button class="btn btn-primary btn-sm" onclick="javascript:window.print();">Imprimir</button>
          </div>
          <?php } ?>
          <div class="card-header d-flex align-items-center">
            <h4 class="h4">Datos personales</h4>
          </div>
          <div class="card-body grid-form">
            <fieldset>
              <div data-row-span="8">
                <div data-field-span="3">
                  <label>Nombre(s)</label>
                  <?= $detalle->nombres?>
                </div>
                <div data-field-span="2">
                  <label>Apellido paterno</label>
                  <?= $detalle->apellido_paterno?>
                </div>
                <div data-field-span="2">
                  <label>Apellido materno</label>
                  <?= $detalle->apellido_materno?>
                </div>
                <div data-field-span="1">
                  <label>Edad</label>
                  <?= $detalle->edad?>
                </div>
              </div>
              <div data-row-span="9">
                <div data-field-span="2">
                  <label>Sexo</label>
                  <?= $detalle->sexo ?>
                </div>
                <div data-field-span="2">
                  <label>Fecha de Nacimiento</label>
                  <?= $detalle->fecha_nacimiento?>
                </div>
                <div data-field-span="2">
                  <label>Nacionalidad</label>
                  <?= $detalle->nacionalidad?>
                </div>
                <div data-field-span="3">
                  <label>Lugar de Nacimiento</label>
                  <?= $detalle->lugar_nacimiento?>
                </div>
              </div>
              <div data-row-span="5">
                <div data-field-span="2">
                  <label>Estado Civil</label>
                  <?= $detalle->estado_civil?>
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
                  <?= $detalle->rfc?>
                </div>
                <div data-field-span="2">
                  <label>CURP</label>
                  <?= $detalle->curp?>
                </div>
                <div data-field-span="1">
                  <label>NSS</label>
                  <?= $detalle->nss?>
                </div>
              </div>
              <div data-row-span="3">
                <div data-field-span="1">
                  <label>Clave Elector</label>
                  <?= $detalle->clave_elector?>
                </div>
                <div data-field-span="1">
                  <label>Número de Licencia</label>
                  <?= $detalle->numero_licencia?>
                </div>
                <div data-field-span="1">
                  <label>INFONAVIT</label>
                  <?= $detalle->infonavit?>
                </div>
              </div>
            </fieldset>
            <br>
            <fieldset>
              <legend>Dirección</legend>
              <div data-row-span="5">
                <div data-field-span="2">
                  <label>Calle</label>
                  <?= $detalle->calle?>
                </div>
                <div data-field-span="1">
                  <label>Número</label>
                  <?= $detalle->numero?>
                </div>
                <div data-field-span="2">
                  <label>Colonia</label>
                  <?= $detalle->colonia?>
                </div>
              </div>
              <div data-row-span="3">
                <div data-field-span="1">
                  <label>Estado</label>
                  <?= $detalle->nombre_entidad?>
                </div>
                <div data-field-span="1">
                  <label>Municipio</label>
                  <?= $detalle->nombre_municipio?>
                </div>
                <div data-field-span="1">
                  <label>Código Postal</label>
                  <?= $detalle->cp?>
                </div>
              </div>
            </fieldset>
            <br>
            <fieldset>
              <legend>Contacto</legend>
              <div data-row-span="2">
                <div data-field-span="1">
                  <label>E-mail Personal</label>
                  <?= $detalle->email_personal?>
                </div>
                <div data-field-span="1">
                  <label>E-mail Institucional</label>
                  <?= $detalle->email_institucional?>
                </div>
              </div>
              <div data-row-span="3">
                <div data-field-span="1">
                  <label>Teléfono Celular</label>
                  <?= $detalle->telefono?>
                </div>
                <div data-field-span="1">
                  <label>Teléfono Fijo</label>
                  <?= $detalle->telefono_fijo?>
                </div>
                <div data-field-span="1">
                  <label>Teléfono Empresa</label>
                  <?= $detalle->telefono_empresa?>
                </div>
              </div>
              <div data-row-span="4">
                <div data-field-span="3">
                  <label>Persona de contacto en caso de emergencia</label>
                  <?= $detalle->persona_contacto ?>
                </div>
                <div data-field-span="1">
                  <label>Teléfono de emergencia</label>
                  <?= $detalle->telefono_emergencia?>
                </div>
              </div>
              <div data-row-span="1">
                <div data-field-span="1">
                  <label>Credencial Estevez.Jor</label>
                  <?= $detalle->credencial_estevez == 1 ? 'Si' : 'No'; ?>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <!-- Hoja asignación  -->
        <div class="card">
          <div class="card-header">
            <h4 class="h4">Hoja Asignación <small class="float-right">Precio Dolar
              $<?php echo $precio_dolar ?></small>
            </h4>
          </div>
          <div class="card-body grid-form">
            <a href="<?= base_url() ?>Almacen/nueva_hoja_asignacion/<?= $detalle->uid_usuario ?>" class="btn btn-info">Nueva Hoja Asignación</a>
            <table style="width: 100%" class="dataTable table table-striped table-sm">
              <thead>
                <tr>
                  <th>uid</th>
                  <th>Fecha creación</th>
                  <th>Estatus</th>
                  <th>Autor</th>
                  <th>Proyecto</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php $total = 0; ?>
                <?php if ($hojas_asignacion): ?>
                <?php foreach ($hojas_asignacion as $key => $value): ?>
                
                <tr>
                  <td><?php echo $value->uid ?></td>
                  <td><?php echo $value->fecha_creacion ?></td>
                  <td><?php echo $value->estatus ?></td>
                  <td><?php echo $value->nombre ?></td>
                  <td><?php echo $value->numero_proyecto ?></td>
                  <td><a href='#historialOperador' title='Solicitudes' data-toggle='modal' data-idtbl_hoja_asignacion='<?= $value->idtbl_hoja_asignacion ?>' data-iddtl_almacen='item.iddtl_almacen' data-operador='item.nombres'><i class="fa fa-folder-open"></i></a></td>
                </tr>
               
                <?php endforeach ?>
                <?php endif; ?>
              </tbody>
                           
            </table>
            <?php if ($this->session->userdata('tipo') == '4') : ?>
            <div class="text-right" style="box-sizing: border-box; padding: 10px;">
            <a href="<?php echo base_url() ?>almacen/devolucion-almacen/<?= $detalle->uid_usuario ?>" class="btn btn-danger">Retirar
              material y/o herramienta</a>
            </div>
          <?php endif ?>
          </div>
          <?php if ($this->session->userdata('tipo')=='1'): ?>
          <!-- Si el usuario es de alto costo -->
          <div class="card-footer">
            <button type="button" id="nuevaAsignacion_herramienta" class="btn btn-secondary">Nueva
            asignación Herramienta</button>
            <button type="button" id="nuevaAsignacion_alto-costo" class="btn btn-warning">Nueva asignación
            Alto Costo</button>
            <button type="button" id="nuevaAsignacion_hilti" class="btn btn-success">Nueva asignación
            HILTI</button>
            <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">Nueva asignación
            Material</button>
            <a href="/almacen/devolucion/<?= $detalle->uid_usuario?>" class="btn btn-danger">Retirar
            material y/o herramienta</a>
            <a href="<?php echo base_url().'almacen/detalle-personal/'.$detalle->uid_usuario ?>"
              class="btn btn-info"
              onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i
              class="fa fa-info-circle"></i></a>
          </div>
          <?php endif; ?>
        </div>
        <!-- Hoja asignacion -->
        <!-- Asignaciones  -->
        <div class="card">
          <div class="card-header">
            <h4 class="h4">Asignaciones<small class="float-right">Precio Dolar
              $<?php echo $precio_dolar ?></small>
            </h4>
          </div>
          <div class="card-body grid-form">
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
                <?php if ($asignaciones): ?>
                <?php foreach ($asignaciones as $key => $value): ?>
                <?php if($value->total!=0 && $value->cantidad!=0): ?>
                <tr>
                  <td><?php echo ($value->estatus_asignacion=='activa') ? '<a href="'.base_url().'almacen/asignacion/detalle/'.$value->uid.'" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">'.$value->folio.'</a>' : $value->folio ?>
                  </td>
                  <td><?php echo strftime("%d de %b de %Y a las %r",strtotime($value->fecha_asignacion)) ?>
                  </td>
                  <td><?php echo $value->descripcion ?></td>
                  <td><?php echo $value->numero_serie ?></td>
                  <td><?php echo $value->numero_interno ?></td>
                  <td><?php echo $value->marca ?></td>
                  <td><?php echo $value->modelo ?></td>
                  <td><?php echo ($value->total!='1.00') ? $value->total : $value->cantidad ?></td>
                  <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                  </td>
                  <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                  <td><?php echo $value->nota ?></td>
                  <?php if ($value->tipo_moneda=='d'): ?>
                  <?php $value->precio=$value->precio*$precio_dolar; $total+=$value->precio*$value->cantidad ?>
                  <?php endif; ?>
                  <td>$<?php echo number_format($value->precio, 2) ?></td>
                  <td>$<?php echo number_format( ($value->precio*$value->cantidad) , 2) ?></td>
                </tr>
                <?php endif; ?>
                <?php endforeach ?>
                <?php endif; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="12" style="text-align:right">Total:</th>
                  <th>$<?= number_format($total, 2) ?></th>
                </tr>
              </tfoot>              
            </table>
            <?php if ($this->session->userdata('tipo') == '4') : ?>
            <div class="text-right" style="box-sizing: border-box; padding: 10px;">
            <a href="<?php echo base_url() ?>almacen/devolucion-almacen/<?= $detalle->uid_usuario ?>" class="btn btn-danger">Retirar
              material y/o herramienta</a>
            </div>
          <?php endif ?>
          </div>
          <?php if ($this->session->userdata('tipo')=='1'): ?>
          <!-- Si el usuario es de alto costo -->
          <div class="card-footer">
            <button type="button" id="nuevaAsignacion_herramienta" class="btn btn-secondary">Nueva
            asignación Herramienta</button>
            <button type="button" id="nuevaAsignacion_alto-costo" class="btn btn-warning">Nueva asignación
            Alto Costo</button>
            <button type="button" id="nuevaAsignacion_hilti" class="btn btn-success">Nueva asignación
            HILTI</button>
            <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">Nueva asignación
            Material</button>
            <a href="/almacen/devolucion/<?= $detalle->uid_usuario?>" class="btn btn-danger">Retirar
            material y/o herramienta</a>
            <a href="<?php echo base_url().'almacen/detalle-personal/'.$detalle->uid_usuario ?>"
              class="btn btn-info"
              onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i
              class="fa fa-info-circle"></i></a>
          </div>
          <?php endif; ?>
        </div>
        <!-- Asignaciones -->
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
                  <!--<?php $ine=false ?>
                  <?php if (isset($documentos_asignados) && sizeof($documentos_asignados)>0): ?>
                  <?php foreach ($documentos_asignados as $key => $value): ?>
                  <?php if ( (ID_INE==$value->tbl_documentos_idtbl_documentos && $this->session->userdata('tipo')== 1) ||  $this->session->userdata('tipo')!=1 ): ?>
                  <?php $ine = (ID_INE==$value->tbl_documentos_idtbl_documentos) ? true : false ?>
                  <tr>
                    <td><a href="<?php echo base_url().'uploads/'.$detalle->uid_usuario.'/documentos/'.$value->uid.'.pdf' ?>"
                      target="_blank"
                      onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><?= $value->documento ?></a>
                    </td>
                    <td><?=  strftime("%d de %b de %Y a las %r",strtotime($value->fecha_creacion)) ?>
                    </td>
                    <td>
                      <?php if ($this->session->userdata('tipo')!=1): ?>
                      <a href="<?php echo base_url().'personal/eliminar/documentos/'.$detalle->uid_usuario.'/'.$value->uid.'/'.$token ?>"
                        title="">Eliminar</a> 
                    </td>
                    <?php endif; ?>
                  </tr>
                  <?php endif; ?>
                  <?php endforeach ?>
                  <?php else: ?>
                  <tr>
                    <td colspan="3" align="center">Ningun documento asignado</td>
                  </tr>
                  <?php endif; ?>
                -->
                <?php if(!empty($detalle->dc3)) { ?>
                  <tr>
                    <td><a target="__blank" class="btn btn-primary" href="<?= base_url() ?>uploads/dc3/<?= $detalle->dc3 ?>">Ver Documento</a></td>
                    <td><?= date('Y-m-d') ?></td>
                  </tr>
                <?php } ?>
                <?php if(empty($detalle->dc3)) { ?>
                  <tr>
                    <td colspan="3" align="center">Ningun documento asignado</td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <br>
            <?php if (
              $detalle->estatus==1 && 
              (
                isset($this->session->userdata('permisos')['personal']) &&
                $this->session->userdata('permisos')['personal']>1 ||
                ($this->session->userdata('tipo')==1 && !$ine)
              )
              ): ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#documento">Nuevo
            Documento</button>
            <?php endif; ?>
          </div>
        </div>
        <!-- Expediente  -->
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="baja" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelbaja"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open(base_url().'contratistas/baja', 'class="needs-validation" novalidate id="formuploadajax_baja"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabelbaja">Detalles Baja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
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
          <label>Motivo</label>
          <textarea name="motivo" class="form-control" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('uid',$detalle->uid_usuario) ?>
        <?= form_hidden('token',$token) ?>
        <?= form_hidden('nombre',$detalle->nombres) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Generar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade" id="alta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelalta"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open(base_url().'contratistas/alta','class="needs-validation" novalidate id="formuploadajax_alta"'); ?>
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
        <?= form_hidden('uid',$detalle->uid_usuario) ?>
        <?= form_hidden('token',$token) ?>
        <?= form_hidden('nombre',$detalle->nombres) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Generar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade" id="actas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelActas"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open(base_url().'personal/nueva-acta', 'class="needs-validation" novalidate id="formuploadajax_acta"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabelActas">Nueva acta administrativa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Descripción*</label>
          <textarea name="descripcion" class="form-control" rows="5" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('uid',$detalle->uid_usuario) ?>
        <?= form_hidden('token',$token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Generar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="cambiar-foto" tabindex="-1" role="dialog"
  aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open_multipart(base_url().'usuarios/cambiar-foto', 'id="formuploadajax"'); ?>
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
        <?= form_hidden('token',$token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="certificado" tabindex="-1" role="dialog"
  aria-labelledby="myLargeModalLabeldocumento" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open_multipart(base_url().'personal/nuevo-certificado', 'class="needs-validation" novalidate'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Certificado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal-header -->
      <div class="modal-body">
        <div class="row">
          <div class="form-group col">
            <label>Tipo de certificado*</label>
            <select name="id" class="form-control" required>
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <?php foreach ($certificados  as $key => $value): ?>
              <option value="<?php echo  $value->idtbl_certificados ?>"><?php echo  $value->nombre ?>
              </option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group col">
            <label>Folio*</label>
            <input type="text" name="folio" value="" class="form-control" placeholder=""
              required="required">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label>Fecha de Inicio*</label>
            <input type="date" name="fecha_inicio" value="" class="form-control" placeholder=""
              required="required">
          </div>
          <div class="form-group col">
            <label>Fecha de Termino*</label>
            <input type="date" name="fecha_termino" value="" class="form-control" placeholder=""
              required="required">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label>Horas de curso*</label>
            <input type="number" name="duracion" value="" class="form-control" step="1" min="1"
              required="required">
          </div>
          <div class="form-group col">
            <label class="control-label">Instructor*</label>
            <select name="tutor" class="form-control" required="required">
              <option value="" disabled="" selected="">Seleccione...</option>
              <option value="ELIZABETH GONZALEZ HERRERA">ELIZABETH GONZALEZ HERRERA</option>
              <option value="GUSTAVO ALEJANDRO ZAPATA YAÑEZ">GUSTAVO ALEJANDRO ZAPATA YAÑEZ</option>
            </select>
          </div>
        </div>
      </div>
      <!-- modal-body -->
      <div class="modal-footer">
        <input type="hidden" name="from" value="personal/detalle/<?php echo $detalle->uid_usuario ?>">
        <input type="hidden" name="uid_usuario" value="<?php echo $detalle->uid_usuario ?>">
        <?= form_hidden('token',$token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Certificado</button>
      </div>
    </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="documento" tabindex="-1" role="dialog"
  aria-labelledby="myLargeModalLabeldocumento" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open_multipart(base_url().'personal/nuevo-documento', 'id="documentoForm"'); ?>
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
              <?php if ($this->session->userdata('tipo')==1): ?>
              <input type="text" value="INE" class="form-control" readonly="readonly" disabled="">
              <input type="hidden" name="id" value="<?php echo ID_INE ?>" class="form-control">
              <?php else: ?>
              <select name="id" class="form-control" required>
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($documentos  as $key => $value): ?>
                <option value="<?php echo  $value->idtbl_documentos ?>"><?php echo  $value->documento ?>
                </option>
                <?php endforeach ?>
              </select>
              <?php endif; ?>
            </div>
            <label class="control-label">Documento</label>
            <input type="file" class="filestyle pull-left" id="documentoInput" name='archivo' required
              accept=".pdf">
          </div>
        </div>
      </div>
      <!-- modal-body -->
      <div class="modal-footer">
        <input type="hidden" name="from" value="personal/detalle/<?php echo $detalle->uid_usuario ?>">
        <input type="hidden" name="uid_usuario" value="<?php echo $detalle->uid_usuario ?>">
        <?= form_hidden('token',$token) ?>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Cargar Documento</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div id="historialOperador" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="operador" class="modal-title"></h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-unidadesasignadas-tab" data-toggle="pill"
                            href="#pills-unidadesasignadas" role="tab" aria-controls="pills-unidadesasignadas"
                            aria-selected="true">Solicitudes</a>
                    </li>
                   
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-unidadesasignadas" role="tabpanel"
                        aria-labelledby="pills-unidadesasignadas-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar"
                                name="busquedaunidadesasignadas">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbunidadesasignadas">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Fecha Creación</th>
                                        <th>Estatus</th>
                                        <th>Autor</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>UID</th>
                                        <th>Fecha Creación</th>
                                        <th>Estatus</th>
                                        <th>Autor</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionunidadesasignadas">

                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="permisosModal" tabindex="-1" role="dialog"
  aria-labelledby="permisosLabel" aria-hidden="true">
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
            <input type="number" id="numero_dias" name="dias" value="" class="form-control" required
              autocomplete="off">
          </div>
          <div class="custom-control custom-radio custom-control-inline goce">
            <input type="radio" id="goce_sueldo1" name="goce_sueldo" value="1" required
              class="custom-control-input">
            <label class="custom-control-label" for="goce_sueldo1">Con goce de sueldo</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline goce">
            <input type="radio" id="goce_sueldo2" name="goce_sueldo" value="0" required
              class="custom-control-input">
            <label class="custom-control-label" for="goce_sueldo2">Sin goce de sueldo</label>
          </div>
          <div class="clearfix"> </div>
          <div class="form-group">
            <label>Comentarios</label>
            <textarea name="comentarios" class="form-control" rows="5"></textarea>
          </div>
          <br>
          <?= form_hidden('tipo','permiso') ?>
          <?= form_hidden('uid',$detalle->uid_usuario) ?>
          <?= form_hidden('token',$token) ?>
          <button type="submit" class="btn btn-primary ladda-button"
            data-style="expand-right">Autorizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" id="incapacidad" tabindex="-1" role="dialog" aria-labelledby=""
  aria-hidden="true">
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
            <input type="text" id="rango_fechas_incapacidad" value="" class="form-control" required
              autocomplete="off">
            <input type="hidden" name="start" id="start_incapacidad" required>
            <input type="hidden" name="end" id="end_incapacidad" required>
            <div class="invalid-feedback">
              Seleccione una fecha válida
            </div>
          </div>
          <div class="form-group">
            <label>Días incapacidad</label>
            <input type="number" id="numero_dias_incapacidad" name="dias" value="" class="form-control"
              required autocomplete="off">
          </div>
          <div class="clearfix"> </div>
          <div class="form-group">
            <label>Comentarios</label>
            <textarea name="comentarios" class="form-control" rows="5"></textarea>
          </div>
          <br>
          <?= form_hidden('uid',$detalle->uid_usuario) ?>
          <?= form_hidden('token',$token) ?>
          <button type="submit" class="btn btn-primary ladda-button"
            data-style="expand-right">Autorizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?= base_url()?>js/bootstrap-filestyle.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url()?>js/file-image.js?v=1.0.0"></script>
<?php

  function dias_restantes($fecha_final) {  
    $fecha_actual = date("Y-m-d");  
    $s = strtotime($fecha_final)-strtotime($fecha_actual);  
    $d = intval($s/86400);  
    $diferencia = $d;  
    return $diferencia;
  }
  function timeDiff($firstTime,$lastTime) {
    $firstTime=strtotime($firstTime);
    $lastTime=strtotime($lastTime);
    $timeDiff=$lastTime-$firstTime;
    return $timeDiff;
  }
  function dias_vacaciones($antiguedad) {
    switch ($antiguedad) {
      case ($antiguedad>=1 &&$antiguedad<365):
        $dias_anterior=0;
        $dias = 6;
      break;
      case ($antiguedad>=365 && $antiguedad<730):
        $dias_anterior=6;
        $dias = 8;
      break;
      case ($antiguedad>=730 && $antiguedad<1095):
        $dias_anterior=14;
        $dias = 10;
      break;
      case ($antiguedad>=1095 && $antiguedad<1460):
        $dias_anterior=24;
        $dias = 12;
      break;
      case ($antiguedad>=1460 && $antiguedad<1825):
        $dias_anterior=36;
        $dias = 14;
      break;
      case ($antiguedad>=1825 && $antiguedad<2190):
        $dias_anterior=50;
        $dias = 14;
      break;
      case ($antiguedad>=2190 && $antiguedad<2555):
        $dias_anterior=64;
        $dias = 14;
      break;
      case ($antiguedad>=2555 && $antiguedad<2920):
        $dias_anterior=78;
        $dias = 14;
      break;
      case ($antiguedad>=2920 && $antiguedad<3285):
        $dias_anterior=92;
        $dias = 14;
      break;
      case ($antiguedad>=3285 && $antiguedad<3650):
        $dias_anterior=106;
        $dias = 16;
      break;
      case ($antiguedad>=3650 && $antiguedad<4015):
        $dias_anterior=122;
        $dias = 16;
      break;
      case ($antiguedad>=4015 && $antiguedad<4380):
        $dias_anterior=138;
        $dias = 16;
      break;
      case ($antiguedad>=4380 && $antiguedad<4745):
        $dias_anterior=154;
        $dias = 16;
      break;
      case ($antiguedad>=4745 && $antiguedad<5110):
        $dias_anterior=170;
        $dias = 16;
      break;      
      default:
        $dias = 0;
      break;
    }
    $restantes = $antiguedad - (365 * intdiv($antiguedad,365) );
    return (int)( (($dias/365)* $restantes)+$dias_anterior );
  }
  function dias_vacaciones_calculos($antiguedad) {
    switch ($antiguedad) {
      case ($antiguedad>=1 &&$antiguedad<366):
        $dias = 6;
      break;
      case ($antiguedad>=366 &&$antiguedad<731):
        $dias = 8;
      break;
      case ($antiguedad>=731 &&$antiguedad<1096):
        $dias = 10;
      break;
      case ($antiguedad>=1096 &&$antiguedad<1461):
        $dias = 12;
      break;
      case ($antiguedad>=1461 && $antiguedad<3286):
        $dias = 14;
      break;
      case ($antiguedad>=3286 && $antiguedad<5111):
        $dias = 16;
      break;
      case ($antiguedad>=5111 && $antiguedad<6936):
        $dias = 18;
      break;
      case ($antiguedad>=6936 && $antiguedad<8761):
        $dias = 20;
      break;
      case ($antiguedad>=8761 && $antiguedad<10586):
        $dias = 22;
      break;
      case ($antiguedad>=10586 && $antiguedad<12410):
        $dias = 24;
      break;
      default:
        $dias = 0;
      break;
    }
  
    return $dias;
  }
?>
<script type="text/javascript">
$(document).on('click', '.cancelar-contrato', function () {
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
        url: "<?= base_url()?>personal/cancelar-contrato",
        type: "post",
        dataType: "json",
        data: {
          uid: _this.data('uid'),
          token: '<?= $token ?>'
        },
        complete: function (res) {
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

$('#historialOperador').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    $("#operador").empty();
    html = "";
    html += "<span>Historial " + "</span>"
    $("#operador").append(html);

    $("#btn-nueva-incidencia").empty();
    html = "";
    
    if(recipient.idtbl_usuarios != ""){
        $("#pills-unidadesasignadas-tab").css("display", "block")
        $("#pills-unidadesasignadas-tab").tab("show");
        mostrarSolicitudesHojaAsignacion("", 1, recipient.idtbl_hoja_asignacion);
    }else{
        $("#pills-unidadesasignadas-tab").css("display", "none")
        $("#pills-incidencias-tab").tab("show");
    }
    

    $("input[name='busquedaunidadesasignadas']").keyup(function() {
        textoBuscar = $("input[name='busquedaunidadesasignadas']").val();
        mostrarSolicitudesHojaAsignacion(textoBuscar, 1, recipient.idtbl_hoja_asignacion);
    });

    $("body").on("click", ".paginacionunidadesasignadas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaunidadesasignadas']").val();
        mostrarSolicitudesHojaAsignacion(valorBuscar, valorHref, recipient.idtbl_hoja_asignacion);
    });


})


function mostrarSolicitudesHojaAsignacion(valorBuscar, pagina, idtbl_hoja_asignacion) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesHojaAsignacion",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            idtbl_hoja_asignacion: idtbl_hoja_asignacion
        },
        dataType: "json",
        success: function(response) {
            filas = "";

            $.each(response.solicitudesHojaAsignacion, function(key, item) {
                if (item.estatus_solicitud == 'SU') {
                    var clase = 'table-success';
                } else {
                    var clase = 'table-warning';
                }
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.fecha_creacion + "</td>";
                filas += "<td>" + item.estatus_solicitud + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td><a href='" + "<?= base_url() ?>almacen/detalle-solicitud/" +
                    item.uid + "' title='Detalles'" +
                    "onClick=\"window.open(this.href, this.target, \'width=800,height=600,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></td>";
                filas += "</tr>";
            });
            $('#tbunidadesasignadas tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            /*for(var i = 1; i <= numeroLinks; i++) {
              if(i == linkSeleccionado) 
                paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
              else
                paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
            if (linkSeleccionado > 1) {
                paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) +
                    "' class='page-link'>&lsaquo;</a></li>";
            } else {
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if (numeroLinks > cant) {
                pagRestantes = numeroLinks - linkSeleccionado;
                pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            } else {
                pagFin = numeroLinks;
            }
            for (var i = pagInicio; i <= pagFin; i++) {
                if (i == linkSeleccionado) {
                    paginador +=
                        "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" +
                        i + "</a></li>";
                } else {
                    paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i +
                        "</a></li>";
                }
            }
            if (linkSeleccionado < numeroLinks) {
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) +
                    "' class='page-link'>&rsaquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + numeroLinks +
                    "' class='page-link'>&raquo;</a></li>";
            } else {
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacionunidadesasignadas").html(paginador);
        }
    });
}

function cargar_archivo(id) {
  var formData = new FormData(document.getElementById("formuploadajax_archivos" + id));
  $.ajax({
    url: "<?= base_url()?>personal/cargar-archivo",
    type: "post",
    dataType: "json",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    complete: function (res) {
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
  }).always(function () {
    $(".archivos").filestyle('clear');
  });
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
  onChange: function (files, id) {
    swal({
      title: "¿Desea cargar archivo?",
      text: "El archivo debe ser en formato PDF",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        cargar_archivo(id);
      } else {
        $(".archivos").filestyle('clear');
      }
    });
  }
});
$('#rango_fechas').on('apply.daterangepicker', function (ev, picker) {
  $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  $('.form-group').removeClass('has-error');
  $('#start').val(picker.startDate.format('YYYY-MM-DDTHH:mm'));
  $('#end').val(picker.endDate.format('YYYY-MM-DDTHH:mm'));
  $('#numero_dias').val((moment.duration(moment(picker.endDate).diff(moment(picker.startDate))).days() + 1));
});
$('#rango_fechas2').on('apply.daterangepicker', function(ev, picker) {
  
  $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  $('.form-group').removeClass('has-error');
  var startDate=new Date(picker.startDate.format('MM/DD/YYYY'));
  var endDate=new Date(picker.endDate.format('MM/DD/YYYY'));
  $('#start2').val(picker.startDate.format('YYYY-MM-DDTHH:mm'));
  $('#end2').val(picker.endDate.format('YYYY-MM-DDTHH:mm'));

  var totalSundays = 0;
 for (var i = startDate; i <= endDate; i.setDate(i.getDate()+1)){
     //console.log(i);
     if (i.getDay() === 1 || i.getDay() === '0') totalSundays++;
 }
 //alert(totalSundays);

 if(startDate==endDate){
     $('#numero_dias2').val((1));;
 }else{
  
  $('#numero_dias2').val((moment.duration(moment(picker.endDate).diff(moment(picker.startDate))).days() + 1 - totalSundays))
      .trigger("change");;
 }

});
$('#rango_fechas_incapacidad').on('apply.daterangepicker', function (ev, picker) {

  $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  $('.form-group').removeClass('has-error');
  $('#start_incapacidad').val(picker.startDate.format('YYYY-MM-DDTHH:mm'));
  $('#end_incapacidad').val(picker.endDate.format('YYYY-MM-DDTHH:mm'));

  $('#numero_dias_incapacidad').val((moment.duration(moment(picker.endDate).diff(moment(picker.startDate)))
    .days() + 1)).trigger("change");
});

$(document).on('change', '#tipo-incapacidad', function () {
  if ($("option:selected", this).val() == 'm') {
    $('#subtipo-incapacidad').prop('selectedIndex', 0);
    $('#subtipo-incapacidad option[value="e"]').removeAttr('disabled');
  } else {
    $('#subtipo-incapacidad').prop('selectedIndex', 0);
    $('#subtipo-incapacidad option[value="e"]').attr('disabled', 'disabled');
  }
});

$(document).on('change', '#numero_dias2', function () {
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

$('#rango_fechas, #rango_fechas2, #rango_fechas_incapacidad').on('cancel.daterangepicker', function (ev, picker) {
  $(this).val('');
});
$(document).ready(function () {

  $('#nuevaAsignacion_material').click(function (event) {
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
          '/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/material';
      }
    })
  });

  $('#nuevaAsignacion_herramienta').click(function (event) {
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
          '/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/herramienta';
      }
    })
  });

  $('#nuevaAsignacion_alto-costo').click(function (event) {
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
          '/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/alto-costo';
      }
    });
  });
  $('#nuevaAsignacion_hilti').click(function (event) {
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
          '/almacen/asignacion/nueva/<?php echo $detalle->uid_usuario ?>/hilti';
      }
    })

  });

  $(document).on('shown.bs.tab', function (e) {
    $.fn.dataTable.tables({
      visible: true,
      api: true
    }).columns.adjust();
  });

  $('#rango_fechas, #rango_fechas2, #rango_fechas_incapacidad').daterangepicker({
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
$(document).ready(function () {

  $("#formuploadajax").on("submit", function (e) {
    e.preventDefault();
    var f = $(this);
    var formData = new FormData(document.getElementById("formuploadajax"));
    $.ajax({
      url: "<?= base_url()?>personal/cambiar-foto",
      type: "post",
      dataType: "json",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      complete: function (res) {
        var resp = JSON.parse(res.responseText);
        if (resp.status == true) {
          location.reload(true);
        } else {
          $("#error").html(resp.message);
        }
      }
    });
  });

  $("#formuploadajax_baja").on("submit", function (event) {

    var f = $(this);
    var formData = new FormData(document.getElementById("formuploadajax_baja"));
    if (event.isDefaultPrevented()) {
      console.log('Error')
    } else {
      event.preventDefault();
      $.ajax({
        url: "<?= base_url()?>contratistas/baja",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function (res) {
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

  $("#formuploadajax_alta").on("submit", function (event) {
    var f = $(this);
    var formData = new FormData(document.getElementById("formuploadajax_alta"));
    if (event.isDefaultPrevented()) {
      console.log('Error')
    } else {
      event.preventDefault();
      $.ajax({
        url: "<?= base_url()?>contratistas/alta",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function (res) {
          var resp = JSON.parse(res.responseText);
          if (resp.status) {
            Swal.fire(
              '¡Exitoso!',
              'success'
            );
            location.reload();
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

  $("#formuploadajax_acta").on("submit", function (event) {

    var f = $(this);
    var formData = new FormData(document.getElementById("formuploadajax_acta"));
    if (event.isDefaultPrevented()) {
      console.log('Error')
    } else {
      event.preventDefault();
      $.ajax({
        url: "<?= base_url()?>personal/nueva-acta",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function (res) {
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

  $('#formuploadajax_vacaciones').on("submit", function (event) {
    var formData = new FormData(event.target);
    if (event.isDefaultPrevented()) {
      console.log('Error')
    } else {
      event.preventDefault();
      $.ajax({
        url: "<?= base_url()?>personal/vacaciones",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function (res) {
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

  $('#formuploadajax_incapacidad').on("submit", function (event) {
    var formData = new FormData(event.target);
    if (event.isDefaultPrevented()) {
      console.log('Error')
    } else {
      event.preventDefault();
      $.ajax({
        url: "<?= base_url()?>personal/incapacidades",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function (res) {
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

  $("#formuploadajax_permisos").on("submit", function (event) {
    var formData = new FormData(event.target);
    if (event.isDefaultPrevented()) {
      console.log('Error')
    } else {
      event.preventDefault();
      console.log('Entra')
      $.ajax({
        url: "<?= base_url()?>personal/permiso",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function (res) {
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

      <?php if ($asistencias): ?>
      <?php foreach ($asistencias as $key => $value): ?>
      <?php if($value->entrada !=NULL): ?> {
        title: "Entrada",
        start: "<?php echo strftime(" % Y - % m - % dT % T ",strtotime($value->fecha_hora.' '.$value->entrada)) ?>",
        end: "<?php echo strftime(" % Y - % m - % dT % T ",strtotime($value->fecha_hora.' '.$value->entrada)) ?>"
      },
      {
        title: "Salida",
        start: "<?php echo strftime(" % Y - % m - % dT % T ",strtotime($value->fecha_hora.' '.$value->salida)) ?>",
        end: "<?php echo strftime(" % Y - % m - % dT % T ",strtotime($value->fecha_hora.' '.$value->salida)) ?>"
      },

      <?php endif; ?>
      <?php endforeach ?>
      <?php endif; ?>

      <?php if ($vacaciones_permisos): ?>
      <?php foreach ($vacaciones_permisos as $key => $value): ?>
      <?php if($value->tipo=='vacaciones'): ?> {
        color: 'rgba(153, 102, 255, 0.5)',
        title: "<?= ucfirst($value->tipo) ?>",
        start: "<?php echo strftime(" % Y - % m - % d ",strtotime($value->fecha_inicio)) ?>T00:00:00",
        end: "<?php echo strftime(" % Y - % m - % d ",strtotime($value->fecha_final)) ?>T23:59:59"
      },
      <?php else: ?> {
        color: 'rgba(75, 192, 192, 0.5)',
        title: "<?= ucfirst($value->tipo) ?>",
        start: "<?php echo strftime(" % Y - % m - % dT % T ",strtotime($value->fecha_inicio)) ?>",
        end: "<?php echo strftime(" % Y - % m - % dT % T ",strtotime($value->fecha_final)) ?>"
      },
      <?php endif; ?>
      <?php endforeach ?>
      <?php endif; ?>

      <?php if ($actas): ?>
      <?php foreach ($actas as $key => $value): ?> {
        color: 'rgba(255, 99, 132, 0.75)',
        title: "Acta Administrativa",
        start: "<?php echo strftime(" % Y - % m - % dT % T ",strtotime($value->timestamp)) ?>"
      },
      <?php endforeach ?>
      <?php endif; ?>

      {
        color: 'rgba(75, 192, 192, 0.5)',
        title: "Inicio de Contrato",
        start: "<?php echo strftime(" % Y - % m - % d ",strtotime($detalle->fecha_inicio)) ?>T00:00:00"
      },
      {
        color: 'rgba(75, 192, 192, 0.5)',
        title: "Fin de Contrato",
        start: "<?php echo strftime(" % Y - % m - % d ",strtotime($detalle->fecha_inicio." + ".$detalle->duracion."
        days ")) ?>T23:59:59"
      }
    ]
  });
});

$(document).on('click', '#nuevo-contrato', function (event) {

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
            '<div class="form-group"><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="determinado" checked>Determinado</label></div><div class="radio"><label><input type="radio" name="tipo_contrato" class="tipo-contrato" value="indeterminado">Indeterminado</label></div></div>' +
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
                beforeSend: function () {
                  $('body').addClass('load');
                },
                success: function (data) {
                  if (data.error)
                    Toast.fire({
                      type: 'error',
                      title: data.error
                    });
                  else {
                    location.reload(true);
                  }

                },
                error: function (data) {
                  Toast.fire({
                    type: 'error',
                    title: 'Ocurrio un error intente nuevamente.'
                  })
                }
              })
              .done(function () {

              })
              .fail(function () {
                Toast.fire({
                  type: 'error',
                  title: 'Ocurrio un error intente nuevamente.'
                })
              })
              .always(function () {
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
}
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