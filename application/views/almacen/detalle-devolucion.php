<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4 mr-auto p-2">
          Detalle solicitud de devolución
        </h3>
        <?php if (($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 11 || $this->session->userdata('tipo') == 1) || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) : ?>
          <div class="p-2 d-print-none">
            <button class="btn btn-secondary btn-info float-right" id="btnImprimirDiv" tabindex="0">
              <span><i class="fa fa-print"></i> Imprimir</span>
            </button>
          </div>
        <?php endif; ?>
      </div>
      <div class="card-body">
        <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart('almacen/guardar-devolucion', 'class="needs-validation" novalidate id="formuploadajax"'); ?>
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="form-group">
                <label>Proyecto*</label>
                <input type="text" name="" id="" class="form-control" disabled value="<?= $solicitud->numero_proyecto.' - '.$solicitud->nombre_proyecto ?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="form-group">
                <label>Segmento*</label>
                <input type="text" name="" class="form-control" disabled value="<?= (is_null($solicitud->segmento))? $solicitud->direccion_proyecto : $solicitud->segmento ?>">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label>Creado por*</label>
                <input type="text" name="" id="" class="form-control" disabled value="<?= $solicitud->autor ?>">
              </div>
            </div>
            <?php if($this->session->userdata('id')!=50){ ?>
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <?php if($this->session->userdata("tipo") != 14){?>
                  <label>Aprobación C.O</label>
                  <input type="text" name="" id="" class="form-control" disabled value="<?= $solicitud->aprobacion ?>">
                <?php } ?>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="form-row">
            <?php if ($solicitud->tbl_contratistas_idtbl_contratistas!='' && $solicitud->tbl_usuarios_idtbl_usuarios_supervisor): ?>
              <div class="col">
                <div class="form-group">
                  <label>Contratista*</label>
                  <input type="text" name="contratista" id="" class="form-control" readonly value="<?= $solicitud->contratista ?>">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Supervisor</label>
                  <input type="text" name="" id="" class="form-control" disabled value="<?= $solicitud->supervisor ?>">
                </div>
              </div>
            <?php endif; ?>
            <div class="col">
              <div class="form-group">
                <label>Entrega*</label>
                <input type="text" name="" id="" class="form-control" disabled value="<?= $solicitud->entrega ?>">
                <input type="hidden" name="entrega" required value="<?= $solicitud->tbl_usuarios_idtbl_usuarios ?>">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea name="comentarios" id="comentarios" class="form-control" rows="3" disabled><?= $solicitud->comentarios ?></textarea>
              </div>
            </div>
          </div>
          <!--<div class="form-row">
            <?php if ($solicitud->tbl_users_idtbl_users_aprobacion == NULL && $solicitud->tipo_devolucion != 'Refacciones Control Vehicular' && $solicitud->tbl_users_idtbl_users_aprobar_ag == NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && ($this->session->userdata('tipo') == 4 && $this->session->userdata('id')!=50) && $permiso > 1 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label for="comentarios">Almacen*</label>
                    <select name="almacen" class="selectpicker" id="selectAlmacen" required data-live-search="true">
                      <option value="" disabled selected="selected">Seleccione Almacen</option>
                      <?php foreach ($almacenes as $key => $values): ?>
                        <option value="<?php echo $values->idtbl_almacenes ?>">
                          <?php echo $values->almacen; ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Personal que recibe*</label>
                  <select name="usuario_entrega" id="personal_entrega" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <?php foreach ($autorizados as $key => $value): ?>
                      <option value="<?php echo $value->idctl_autorizados_entrega ?>" data-nombre="<?php echo $value->nombre?>">
                        <?php echo $value->nombre?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            <?php elseif($solicitud->tbl_users_idtbl_users_aprobar_ag == NULL && $solicitud->tbl_users_idtbl_users_ag != NULL): ?>
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Almacen*</label>
                  <?php foreach ($almacenes as $key => $values): ?>
                    <?php if ($values->idtbl_almacenes == $solicitud->idalmacen): ?>
                      <input type="text" class="form-control" disabled value="<?= $values->almacen ?>">
                      <?php break; ?>
                    <?php endif; ?>
                  <?php endforeach ?>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label>Personal que recibe*</label>
                  <?php foreach ($autorizados as $key => $value): ?>
                    <?php if ($value->idctl_autorizados_entrega == $solicitud->usuario_recibe): ?>
                      <input type="text" class="form-control" disabled value="<?= $value->nombre ?>">
                      <?php break; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>-->
          <hr>
          <?php foreach($detalle as $posicion => $value): ?>
            <div id="item-producto<?= $posicion ?>" class="itemproducto">
              <div class="form-row">
                <div class="col">
                  <div class="form-group .producto-input">
                    <label>Producto*</label>
                    <!--<?php if(isset($value->tipo_devolucion) && isset($value->iddtl_almacen_relacion)) { ?>
                      <input type="text" name="" class="form-control producto-input" disabled value="<?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.'('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .') ' . $value->numero_interno ?>">
                    <?php } ?>
                    <?php if(isset($value->tipo_devolucion) && !isset($value->iddtl_almacen_relacion)) { ?>
                      <input type="text" name="" class="form-control producto-input" disabled value="M <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.'('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                    <?php } ?>
                    <?php if(!isset($value->tipo_devolucion) && !isset($value->iddtl_almacen_relacion)) { ?>-->
                      <input type="text" name="" class="form-control producto-input" disabled value="<?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.'('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>">
                    <!--<?php } ?>-->
                    <input type="hidden" name="producto[]" required class="form-control producto-select" data-descripcion="<?= htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>" value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label>Cantidad a entregar*</label>
                    <input type="text" name="" class="form-control" disabled value="<?= $value->cantidad.' '.$value->unidad_medida_abr ?>">
                    <input type="hidden" name="cantidad[]" required class="form-control cantidad" value="<?= $value->cantidad ?>">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Entregado*</label>                    
                    <?php if ($solicitud->tbl_users_idtbl_users_aprobacion == NULL && $solicitud->tipo_devolucion != 'Refacciones Control Vehicular' && $solicitud->tipo_devolucion != 'Seguridad e Higiene' && $solicitud->tipo_devolucion != 'Almacen General' && $solicitud->tbl_users_idtbl_users_aprobar_ag == NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && ($this->session->userdata('tipo') == 4 && $this->session->userdata('id')!=50) && $permiso > 1 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
                      <input type="number" name="entregado[]" class="form-control entregar" step="0.001" min="0" required>
                    <?php else: ?>
                      <input type="text" name="" class="form-control entregar" disabled value="<?= $value->entregado ?>">
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Estado*</label>
                    <?php if ($solicitud->tbl_users_idtbl_users_aprobacion == NULL && $solicitud->tipo_devolucion != 'Refacciones Control Vehicular' && $solicitud->tipo_devolucion != 'Seguridad e Higiene' && $solicitud->tipo_devolucion != 'Almacen General' && $solicitud->tbl_users_idtbl_users_aprobar_ag == NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && ($this->session->userdata('tipo') == 4 && $this->session->userdata('id')!=50) && $permiso > 1 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
                      <select name="estado[]" class="form-control estado" required>
                        <option value="" selected disabled="">Seleccione...</option>
                        <option value="almacen">Disponible</option>
                        <option value="dañado">Dañado</option>
                        <option value="robado">Robado</option>
                        <option value="abuso de confianza">abuso de confianza</option>
                        <option value="justificacion">Justificación</option>
                      </select>
                    <?php else: ?>
                      <input type="text" name="" class="form-control" disabled value="<?= $value->estado ?>">
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <?php if ($solicitud->tbl_users_idtbl_users_aprobacion != NULL && $solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $this->session->userdata('tipo') == 4 && $permiso > 1 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
                      <label>Comentarios</label>
                      <textarea name="observaciones[]" id="comentarios" class="form-control nota" rows="3"></textarea>
                    <?php elseif($solicitud->tbl_users_idtbl_users_ag != NULL): ?>
                      <label>Comentarios</label>
                      <textarea name="" id="" disabled class="form-control nota" notas rows="3"><?= $value->observaciones ?></textarea>
                    <?php endif; ?>
                    <?php if($this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 4){ ?>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Comentarios Neodata</label>
                            <input type="text" name="observacionesNeodata[]" id="" class="form-control descripcion"                                
                                value="<?php echo $value->observaciones_neodata ?>">
                        </div>
                    </div>
                    <input type="hidden" name="iddtl_solicitud_devolucion[]" value="<?php echo $value->iddtl_solicitud_devolucion ?>">
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php if ($solicitud->tbl_users_idtbl_users_aprobacion != NULL && $solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag  == NULL && $this->session->userdata('tipo') == 4 && $permiso > 1 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
                <!--<br><i class="fa fa-close delete-product"></i>-->
              <?php endif ?>
              <hr>
            </div>
          <?php endforeach; ?>
          <?php if ($solicitud->tbl_users_idtbl_users_aprobacion != NULL && $solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag  == NULL && $this->session->userdata('tipo') == 4 && $permiso > 1 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
            <div id="item-producto<?= ($posicion + 1)?>" class="itemproducto" style="display: none;">
              <div class="form-row">
                <div class="col-xs-12 col-md-6">
                  <label>Producto*</label>
                  <select name="producto[]" id="product" class="selectpicker producto" data-live-search="true">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-neodata="<?php echo $value->neodata; ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-6">
                  <label for="">Descripción</label>
                  <input type="text" class="form-control descripcion" disabled>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col">
                  <label for="unidad">Unidad</label>
                  <input type="text" disabled="true" class="form-control unidad">
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Entregado*</label>
                    <input type="hidden" name="cantidad[]" required class="form-control cantidad" value="-">
                    <input type="number" name="entregado[]" class="form-control entregar" step="0.001" min="0">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Estado*</label>
                      <select name="estado[]" class="form-control estado">
                        <option value="" selected>Seleccione...</option>
                        <option value="almacen">Disponible</option>
                        <option value="dañado">Dañado</option>
                        <option value="robado">Robado</option>
                        <option value="abuso de confianza">abuso de confianza</option>
                        <option value="justificacion">Justificación</option>
                      </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <?php if ($solicitud->tbl_users_idtbl_users_aprobacion != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $this->session->userdata('tipo') == 4): ?>
                      <label>Comentarios</label>
                      <textarea name="observaciones[]" id="comentarios" class="form-control nota" rows="3"></textarea>
                    <?php elseif($solicitud->tbl_users_idtbl_users_ag != NULL): ?>
                      <label>Comentarios</label>
                      <textarea name="" id="" disabled class="form-control" rows="3"><?= $value->observaciones ?></textarea>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <br><i class="fa fa-close delete-product" style="display:none"></i>
              <hr>
            </div>
            <!--<div class="row">
              <div class="col text-center">
                <span class="fa fa-plus" id="nuevoProducto" style="background: green;height: 40px;width: 40px;text-align: center;color: #fff;border-radius: 25px;font-size: 25px;line-height: 1.7;cursor: pointer;"></span>
              </div>
            </div>-->
            <br>
            <!--<div class="row">
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="documentoInput">Documento Solicitud de Almacén*</label>
                  <input type="file" class="filestyle pull-left" name='solicitud' required accept=".pdf">
                  <div class="invalid-feedback">
                    Seleccione un documento
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="documentoInput">Responsiva*</label>
                  <input type="file" class="filestyle pull-left" name='responsiva' required accept=".pdf">
                  <div class="invalid-feedback">
                    Seleccione un documento
                  </div>
                </div>
              </div>
            </div>-->
          <?php endif; ?>
          <div class="clearfix pt-md">
            <div class="pull-right">              
              <?= form_hidden('token',$token) ?>
              <?= form_hidden('uid_usuario',$solicitud->uid_usuario) ?>
              <?= form_hidden('uid_devolucion',$uid_salida) ?>
              <?= form_hidden('tipo_devolucion',$solicitud->tipo_devolucion) ?>
              <?= form_hidden('parent',$solicitud->idtbl_solicitud_devolucion) ?>
              <?= form_hidden('proyecto',$solicitud->tbl_proyectos_idtbl_proyectos) ?>
              <?= form_hidden('segmento',$solicitud->idtbl_segmentos_proyecto) ?>
              <?php
                $contratistaPersonal = ($solicitud->tbl_contratistas_idtbl_contratistas == '' && $solicitud->tbl_usuarios_idtbl_usuarios_supervisor == '') ? 1 : 0;
                $usuarioalmacen = ($permiso > 1 && $this->session->userdata('tipo') == 4 && $this->session->userdata('id')!=50) ? 1 : 0 ;
              ?>              
              <a onClick="history.go(-1);" class="btn-warning btn">Regresar</a>
              <?php if (($solicitud->tbl_users_idtbl_users_aprobacion == NULL && $this->session->userdata('tipo') == 11 && $solicitud->tbl_contratistas_idtbl_contratistas != NULL) ): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif (($permiso >= 1) && ($solicitud->tipo_devolucion == 'Almacen General' || $solicitud->tipo_devolucion == 'Seguridad e Higiene') && (($this->session->userdata('tipo') == 4 && $this->session->userdata('id')!=50) || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && ($solicitud->tbl_users_idtbl_users_aprobar_ag == NULL && $solicitud->fecha_aprobacion_co != NULL || $solicitud->estatus_solicitud != 'C.O' && $solicitud->estatus_solicitud != 'aprobada' && $solicitud->estatus_solicitud != 'entregado')): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif (($permiso >= 1) && $solicitud->tipo_devolucion == 'Seguridad e Higiene' && ($this->session->userdata('tipo') == 10) && ($solicitud->tbl_users_idtbl_user_aprobar_sh == NULL)): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif (($permisoAC >= 1) && $solicitud->tipo_devolucion == 'Alto Costo' && ($this->session->userdata('tipo') == 1) && ($solicitud->tbl_users_idtbl_users_aprobar_ac == NULL) && $solicitud->estatus_solicitud == 'A.C'): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif (($permisoK >= 1) && $solicitud->tipo_devolucion == 'Kuali' && (($this->session->userdata('tipo') == 4 && $this->session->userdata('id')==50)) && ($solicitud->tbl_users_idtbl_users_aprobar_kuali == NULL && $solicitud->tbl_users_idtbl_users_aprobar_ac == NULL)): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif (($permisoACV >= 1) && $solicitud->tipo_devolucion == 'Autos Control Vehicular' && (($this->session->userdata('tipo') == 3)) && ($solicitud->tbl_users_idtbl_users_aprobar_acv == NULL && $solicitud->tbl_users_idtbl_users_aprobar_ac == NULL)): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif (($permisoRCV >= 1) && $solicitud->tipo_devolucion == 'Refacciones Control Vehicular' && (($this->session->userdata('tipo') == 4)) && ($solicitud->tbl_users_idtbl_users_aprobar_ag == NULL && $solicitud->tbl_users_idtbl_users_aprobar_ac == NULL)): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif (($permisoRCV >= 1) && $solicitud->tipo_devolucion == 'Tarjetas' && (($this->session->userdata('tipo') == 3)) && ($solicitud->tbl_users_idtbl_users_aprobar_rcv == NULL && $solicitud->tbl_users_idtbl_users_aprobar_rcv == NULL)): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif (($permisoSistemas >= 1) && $solicitud->tipo_devolucion == 'Sistemas' && (($this->session->userdata('tipo') == 2)) && ($solicitud->tbl_users_idtbl_users_aprobar_sis == NULL && $solicitud->tbl_users_idtbl_users_aprobar_ac == NULL)): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif (($permisoAreaMedica >= 1) && $solicitud->tipo_devolucion == 'Area Medica' && (($this->session->userdata('tipo') == 14)) && ($solicitud->tbl_users_idtbl_users_aprobar_am == NULL)): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php endif; ?>
              <?php if($solicitud->tbl_mantenimientos_idtbl_mantenimientos == NULL && $solicitud->tbl_mantenimientos_idtbl_mantenimientos == ''){ ?>
              <?php if (($solicitud->tipo_devolucion == 'Almacen General' || $solicitud->tipo_devolucion == 'Seguridad e Higiene') && $solicitud->tbl_users_idtbl_users_aprobar_ag != null && $solicitud->tbl_users_idtbl_users_ag == null && $permiso > 1 && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && ($solicitud->estatus_solicitud != 'cancelada A.G' && $solicitud->estatus_solicitud != 'entregado')): ?>                
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <a href="<?= base_url() ?>almacen/devolucion-almacen/<?php echo $solicitud->uid_usuario ?>" class="btn-primary btn surtir" id="realizarDevolucion">
                Realizar Devolución
              </a>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
              <?php }else{ ?>
                <?php if ($solicitud->tbl_users_idtbl_users_aprobar_ag != null && $solicitud->tbl_users_idtbl_users_ag == null && $permiso > 1 && ($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')) && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>                
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <a href="<?= base_url() ?>almacen/devolucion-asignacion-generador/<?php echo $solicitud->uid_usuario ?>/<?= $solicitud->tbl_mantenimientos_idtbl_mantenimientos ?>" class="btn-primary btn surtir" id="realizarDevolucion">
                Realizar Devolución
              </a>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
                <?php } ?>
              <?php if ($solicitud->tbl_users_idtbl_users_aprobar_kuali != NULL && $solicitud->tbl_users_idtbl_users_kuali == NULL && $permisoK > 1 && $this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud != 'cancelada K'): ?>                
                <a href="<?= base_url() ?>almacen/devolucion/<?php echo $solicitud->uid_usuario ?>" class="btn-primary btn surtir" id="realizarDevolucion">
                Realizar Devolución
              </a>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
              <?php if ($solicitud->tipo_devolucion == 'Refacciones Control Vehicular' && ($solicitud->tbl_users_idtbl_users_aprobar_rcv != NULL || $solicitud->tbl_users_idtbl_users_aprobar_ag !=NULL) && $solicitud->tbl_users_idtbl_users_rcv == NULL && ($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo_anterior')==23) && ($solicitud->estatus_solicitud != 'cancelada RCV' && $solicitud->estatus_solicitud != 'entregado')): ?>                
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <a href="<?= base_url() ?>almacen/devolucion/<?php echo $solicitud->uid_usuario ?>/refacciones" class="btn-primary btn surtir" id="realizarDevolucion">
                Realizar Devolución
              </a>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
              <?php if ($solicitud->tbl_users_idtbl_users_aprobar_ac != NULL && $solicitud->tbl_users_idtbl_users_ac == NULL && $permisoAC > 1 && $this->session->userdata('tipo') == 1 && ($solicitud->estatus_solicitud != 'cancelada A.C' && $solicitud->estatus_solicitud != 'entregado')): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <a href="<?= base_url() ?>almacen/devolucion/<?php echo $solicitud->uid_usuario ?>" class="btn-primary btn surtir" id="realizarDevolucion">
                Realizar Devolucion
              </a>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
              <?php if ($solicitud->tbl_users_idtbl_users_aprobar_rcv != NULL && $solicitud->tbl_users_idtbl_users_rcv == NULL && $this->session->userdata('tipo') == 3 && ($solicitud->estatus_solicitud != 'cancelada C.V' && $solicitud->estatus_solicitud != 'entregado')): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <a href="<?= base_url() ?>almacen/devolucion/<?php echo $solicitud->uid_usuario ?>/tarjetas" class="btn-primary btn surtir" id="realizarDevolucion">
                Realizar Devolucion
              </a>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
              <?php if ($solicitud->tipo_devolucion == 'Autos Control Vehicular' && $solicitud->tbl_users_idtbl_users_aprobar_acv != NULL && $solicitud->tbl_users_idtbl_users_acv == NULL && $permisoACV > 1 && $this->session->userdata('tipo') == 3 && ($solicitud->estatus_solicitud != 'cancelada C.V' && $solicitud->estatus_solicitud != 'entregado')): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <a href="<?= base_url() ?>almacen/devolucion/<?php echo $solicitud->uid_usuario ?>?parent=<?=$solicitud->idtbl_solicitud_devolucion?>" class="btn-primary btn surtir" id="realizarDevolucion">
                Realizar Devolucion
              </a>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
              <?php if ($solicitud->tbl_users_idtbl_users_aprobar_sis != NULL && $solicitud->tbl_users_idtbl_users_sis == NULL && $permisoSistemas >= 1 && $this->session->userdata('tipo') == 2 && ($solicitud->estatus_solicitud != 'cancelada Sis' && $solicitud->estatus_solicitud != 'entregado')): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <a href="<?= base_url() ?>almacen/devolucion/<?php echo $solicitud->uid_usuario ?>" class="btn-primary btn surtir" id="realizarDevolucion">
                Realizar Devolucion
              </a>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
              <?php if ($solicitud->fecha_aprobacion_am != NULL && $permisoAreaMedica >= 1 && $this->session->userdata('tipo') == 14 && ($solicitud->estatus_solicitud != 'cancelada A.M' && $solicitud->estatus_solicitud != 'entregado')): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <a href="<?= base_url() ?>almacen/devolucion/<?php echo $solicitud->uid_usuario ?>" class="btn-primary btn surtir" id="realizarDevolucion">
                Realizar Devolucion
              </a>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
              <?php if ($this->session->userdata('tipo') == 6 && ($solicitud->estatus_solicitud == 'entregado')): ?>                                            
                        <button type="button" id="neodata_comentarios" class="btn-primary btn ocultar">Guardar</button>
              <?php endif; ?>
            </div>
          </div>
        <?= form_close();?>
      </div>
    </div>
  </div>
</section>
<section style="display: none;">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body" id="printableArea">
        <style>
          body {
            font-family: "Poppins", sans-serif;
          }

          .b_top {
            border-top: 1px solid #000;
          }

          .b_right {
            border-right: 1px solid #000;
          }

          .b_bottom {
            border-bottom: 1px solid #000;
          }

          .b_left {
            border-left: 1px solid #000;
          }

          #datos_solicitud {
            border-collapse: separate;
            border-spacing: 0px 5px !important;
          }
          .default-text {
            width: 160px !important;
          }
          .td-estatus:first-letter {
            text-transform: uppercase;
          }
        </style>
        <table class="" style="width:100%" border="1" cellpadding="4" cellspacing="0">
          <thead>
            <tr>
              <th class="b_top b_bottom b_left" style="text-align: center" width="20%" rowspan="2">
                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 80px;">
              </th>
              <th class="b_top" width="50%" style="vertical-align: middle; text-align: center">
                ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.
              </th>
              <th class="b_top b_right" style="vertical-align: middle; text-align: center; font-size:12px;" width="25%" rowspan="2">
                <strong>C&oacute;digo: DA-FE-AL-002</strong>
              </th>
            </tr>
            <tr>
              <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center">
                Devolución a Almacén
              </th>
            </tr>
          </thead>
        </table>
        <table id="datos_solicitud" style="width: 100%;font-size: 12px;margin-top: 10px;" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>FECHA Y HORA</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= date("d-m-Y h:i:s", strtotime($solicitud->fecha_creacion)) ?>
                    </td>
                    <td class="default-text b_top b_right b_bottom">
                      <strong>FOLIO</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $solicitud->uid ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>No. PROYECTO:</strong>
                    </td>
                    <td class="b_top b_right b_bottom" style="width: 150px;!important" align="center">
                      <?= $solicitud->numero_proyecto ?>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $solicitud->nombre_proyecto ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>UBICACIÓN DE TRABAJO</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= (empty($solicitud->segmento))? $solicitud->direccion_proyecto : $solicitud->segmento; ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>RESPONSABLE PROY.</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $solicitud->autor ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>CORDINADOR PROY.</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $solicitud->aprobacion ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>POR AUSENCIA DE CORD.</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>CONTRATISTA (Externo)</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= ($solicitud->tbl_contratistas_idtbl_contratistas != '' && $solicitud->tbl_usuarios_idtbl_usuarios_supervisor) ? $solicitud->contratista : '&nbsp;' ?>
                    </td>
                    <td class="default-text b_top b_right b_bottom">
                      <strong>SUPERVISOR (Interno)</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= ($solicitud->tbl_contratistas_idtbl_contratistas != '' && $solicitud->tbl_usuarios_idtbl_usuarios_supervisor) ? $solicitud->supervisor : '&nbsp;' ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>ENTREGA</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $solicitud->entrega ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                <tbody>
                  <tr>
                    <td class="default-text b_top b_right b_bottom b_left">
                      <strong>COMENTARIOS</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $solicitud->comentarios ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </table>
        <table style="width: 100%;margin-top: 15px;" border="1" cellpadding="4" cellspacing="0" align="center">
          <thead style="font-size: 12px!important;">
            <tr align="center">
              <th><strong>CODIGO</strong></th>
              <th><strong>DESCRIPCION</strong></th>
              <th width="70px"><strong>CANTIDAD</strong></th>
              <th width="50px"><strong>UNIDAD</strong></th>
              <?php if ($solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $permiso > 1 && $this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
                <th><strong>ENTREGADO</strong></th>
                <th><strong>ESTATUS</strong></th>
              <?php endif ?>
              <th style="min-width: 150px;"><strong>NOTA</strong></th>
            </tr>
          </thead>
          <tbody style="font-size: 12px!important;" align="center">
            <?php foreach ($detalle as $key => $value) : ?>
              <tr id="tritem-producto<?= $key?>">
                <td class="td-codigo-uid"><?php echo $value->neodata ?></td>
                <td class="td-producto"><?php echo $value->descripcion ?></td>
                <td class="td-cantidad"><?= $value->cantidad ?></td>
                <td class="td-unidad-medida"><?php echo $value->unidad_medida_abr ?></td>
                <?php if ($solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $permiso > 1 && $this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
                  <td class="td-entregado"></td>
                  <td class="td-estatus"></td>
                <?php endif ?>
                <td class="td-observaciones"><?= $value->observaciones ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <br><br><br><br>
        <table style="width: 100%;margin-top: 15px;" border="0" cellpadding="4" cellspacing="0" align="center">
          <tbody style="font-size: 12px!important;" align="center">
            <tr>
              <td colspan="2" width="50%" align="center"></td>
              <td colspan="2" width="50%" align="center"></td>
            </tr>
            <?php if ($solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $permiso > 1 && $this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
              <tr>
                <td colspan="4" width="50%" align="center" class="nombre_empleado_recibe"></td>
              </tr>
              <tr>
                <td colspan="4" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
              </tr>
            <?php else: ?>
              <tr>
                <td colspan="2" width="50%" align="center" class="nombre_empleado_entrega"><?= $solicitud->entrega ?></td>
                <td colspan="2" width="50%" align="center" class="nombre_empleado_recibe">Almacen General</td>
              </tr>
              <tr>
                <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
                <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<div class="modal fade bd-example-modal-lg" id="cancelarModal" tabindex="-1" role="dialog" aria-labelledby="vacacionesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vacacionesLabel">Cancelar solicitud de devolución</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" class="needs-validation" id="formuploadajax_cancel" novalidate method="post">

          <div class="form-group">
            <label>Comentarios</label>
            <textarea name="comentarios" class="form-control" rows="5"></textarea>
          </div>
          <input type="hidden" name="tipo_devolucion" value="<?= $solicitud->tipo_devolucion ?>">
          <br>
          <?= form_hidden('solicitudUID',$solicitud->idtbl_solicitud_devolucion) ?>
          <?= form_hidden('uid',$this->uri->segment(3)) ?>
          <?= form_hidden('token', $token) ?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnCancel" class="btn btn-primary ladda-button" data-style="expand-right">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?= base_url()?>js/bootstrap-filestyle.js"></script>
<script>
  $('.filestyle').filestyle({
    text: '&nbsp;Documento',
    btnClass: 'btn-outline-info',
  });
  $(document).on('change', '#personal_entrega', function (event) {
    $('.nombre_empleado_recibe').html($("option:selected", this).data('nombre'));
  });
  $(document).on('change', '.entregar', function (event) {
    var _this = $(this).closest('.itemproducto');
    $('#tr' + _this.attr('id')).find('.td-entregado').html($(this).val());
  });
  $(document).on('change', '.estado', function (event) {
    var _this = $(this).closest('.itemproducto');
    $('#tr' + _this.attr('id')).find('.td-estatus').html($(this).val());
  });
  $(document).on('change', '.nota', function (event) {
    var _this = $(this).closest('.itemproducto');
    $('#tr' + _this.attr('id')).find('.td-observaciones').html($(this).val());
  });
  $(document).on('change', '.producto', function (event) {
    event.preventDefault();
    var _this = $(this).closest('.itemproducto');
    console.log( $('#tr' + _this.attr('id')).find('.tr-producto') );
    $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));
    $(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));
    $(_this).find('.cantidad').val('-');
    $('#tr' + _this.attr('id')).find('.td-codigo-uid').html($("option:selected", this).data("neodata"));
    $('#tr' + _this.attr('id')).find('.td-producto').html($("option:selected", this).data("descripcion"));
    $('#tr' + _this.attr('id')).find('.td-unidad-medida').html($("option:selected", this).data("unidad-medida"));
  });
  $(document).on('click', '.delete-product', function () {
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea remover este producto de la solicitud de devolución?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $(this).parents('div[id^="item-producto"]').remove();
        $('#tr' + $(this).parents('[id^="item-producto"]').attr('id')).remove();
      }
    });
  });
  $('#nuevoProducto').click(function (event) {
    /* Act on the event */
    var $div = $('div[id^="item-producto"]:last');
    var $tr = $('[id^="tritem-producto"]:last');
    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'item-producto' + num);
    var $klonTr = $tr.clone().prop('id', 'tritem-producto' + num);

    $klon.css('display', 'none');
    
    $div.after($klon);
    $tr.after($klonTr);
    
    $klon.show(500);
    
    $klon.find('.bootstrap-select').replaceWith(function () {
      return $('select', this);
    });
    $('#item-producto' + num + ' .selectpicker').selectpicker();
    $klon.find('input,textarea').val('');
    $klonTr.find('td').html('');
    $klon.find('.delete-product').css('display', 'block');
  });

  $('#neodata_comentarios').click(function(event) {
    event.preventDefault();    
    
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea guardar los comentarios de Neodata?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url() ?>almacen/comentarios-neodata-devolucion",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        )
                        location.reload();
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        })
                    }
                }
            });
        }
    });
});
  $('#aprobar').click(function (event) {
    var segmento = '<?= $this->uri->segment(3); ?>';
    var contratistaPersonal = "<?= $contratistaPersonal?>" ;
    var usuarioalmacen = "<?= $usuarioalmacen; ?>";
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea aprobar la solicitud de devolución?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url()?>almacen/guardar-solicitud-devolucion",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function (res) {
            var resp = JSON.parse(res.responseText);
            if (resp.status) {
              $('.ocultar').hide();
              Swal.fire(
                '¡Exitoso!',
                resp.mensaje,
                'success'
              );
              if (contratistaPersonal== 1 && usuarioalmacen == 1) {
                window.location.assign('<?= base_url()?>almacen/detalle-devolucion/'+segmento);
              } else {
                location.reload();
              }
            } else {
              Toast.fire({
                type: 'error',
                title: resp.mensaje
              })
            }
          }
        });
      }
    })
  });
  $('#realizarDevolucion').click(function(event) {
    window.open('<?= base_url() ?>almacen/detalle-devolucion-material/<?= $solicitud->uid ?>','Materiales', 'width=800, height=600');
  });
  $('#cancelar').click(function(event) {
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la solicitud de devolución?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $("#cancelarModal").modal("show");
      }
    })
  });
  $('#btnCancel').click(function(event) {
    var formData = new FormData(document.getElementById("formuploadajax_cancel"));
    $.ajax({
      url: "<?= base_url()?>almacen/cancelar-solicitud-devolucion",
      type: "post",
      dataType: "json",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      complete: function (res) {
        var resp = JSON.parse(res.responseText);
        if (resp.error == false) {
          $('#cancelarModal').modal('hide');
          $('.ocultar').hide();
          Swal.fire(
            '¡Exitoso!',
            resp.mensaje,
            'success'
          );
          <?php if($this->session->userdata("tipo") != 14){?>
            location.href="<?= base_url() ?>almacen/devoluciones";
          <?php }else{?>
            location.href="<?= base_url() ?>almacen/devoluciones-area-medica";
          <?php } ?>
        } else {
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          });
        }
      }
    });
  });
  $('#guardar').on("submit", function (event) {
  // $('#guardar').click(function (event) {
    if (event.isDefaultPrevented()) {
      console.log('Error')
    } else {
      event.preventDefault();
      var formData = new FormData(document.getElementById("formuploadajax"));
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea guardar la solicitud de devolución?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?= base_url()?>almacen/guardar-devolucion",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function (res) {
              var resp = JSON.parse(res.responseText);
              console.log(resp.mensaje);
              if (resp.status) {
                $('.ocultar').hide();
                Swal.fire(
                  '¡Exitoso!',
                  resp.mensaje,
                  'success'
                )
                location.reload();
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.mensaje
                })
              }
            }
          });
        }
      });
    }
  });
  function imprimirElemento(elemento) {
    var printContents = document.getElementById(elemento).innerHTML;
    var ventana = window.open('', 'PRINT', '');
    ventana.document.write('<html><head><title>Devolucion a Almacen</title>');
    ventana.document.write('<link rel="stylesheet" href="style.css">'); //Aquí agregué la hoja de estilos
    ventana.document.write('</head><body >');
    ventana.document.write(printContents);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.onload = function() {
      ventana.print();
      ventana.close();
    };
  }
  document.querySelector("#btnImprimirDiv").addEventListener("click", function() {
    imprimirElemento('printableArea');
  });
</script>