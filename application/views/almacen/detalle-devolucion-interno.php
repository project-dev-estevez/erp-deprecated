<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4 mr-auto p-2">
          Detalle solicitud de devolución
        </h3>
        <?php if ($this->session->userdata('tipo') == 4 && $solicitud->tbl_users_idtbl_users_aprobacion !== NULL) : ?>
          <div class="p-2 d-print-none">
            <button class="btn btn-secondary btn-info float-right" id="btnImprimirDiv" tabindex="0">
              <span><i class="fa fa-print"></i> Imprimir</span>
            </button>
          </div>
        <?php endif; ?>
      </div>
      <div class="card-body">
        <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart('', 'class="needs-validation" novalidate id="formuploadajax"'); ?>
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="form-group">
                <label>Proyecto*</label>
                <input type="text" name="" id="" class="form-control" disabled value="<?= $solicitud->numero_proyecto.' - '.$solicitud->nombre_proyecto ?>">
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="form-group">
                <label>Segmeneto*</label>
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
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <label>Aprobación C.O</label>
                <input type="text" name="" id="" class="form-control" disabled value="<?= $solicitud->aprobacion ?>">
              </div>
            </div>
          </div>
          <div class="form-row">
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
          <div class="form-row">
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
          </div>
          <hr>
          <div class="form-row">
            <div class="col-12">
              <h5>Asignaciones activas / <?= $solicitud->entrega ?></h5>
            </div>
            <div class="col-12 table-responsive">
              <table id="data-table-devolución" class="table table-striped table-bordered display responsive no-wrap">
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Fecha de asignación</th>
                    <th>Código</th>
                    <th>Equipo</th>
                    <th>Unidades Asignadas</th>
                    <th>Unidad de medida</th>
                    <th>Cantidad a entregar</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $tmpidcatalogo = array(); ?>
                  <?php foreach ($asignaciones as $key => $value): ?>
                    <?php
                      $cantidad_a_entregar = '-'; $check = '';
                      foreach ($detalle as $key2 => $value2) {
                        if ($value->tbl_catalogo_idtbl_catalogo == $value2->tbl_catalogo_idtbl_catalogo) {
                          $cantidad_a_entregar = $value2->cantidad;
                          $check = 'checked';
                          array_push($tmpidcatalogo, $value->tbl_catalogo_idtbl_catalogo);
                          break;
                        }
                      }
                    ?>
                    <?php if($cantidad_a_entregar!=0 && $cantidad_a_entregar==NULL){ ?>
                    <tr class="">
                      <td class="text-center">
                        <?php echo ($value->estatus_asignacion=='activa') ? '<a href="'.base_url().'almacen/salida/detalle/'.$value->tbl_almacen_movimientos_idtbl_almacen_movimientos.'" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">'.$value->folio.'</a>' : $value->folio ?>
                      </td>
                      <td>
                        <?php echo strftime("%d de %b de %Y a las %r",strtotime($value->fecha_asignacion)) ?>
                      </td>
                      <td>
                        <?= $value->neodata; ?>
                        </td>
                      <td>
                        <?php echo $value->marca.' '.$value->modelo.'('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>
                      </td>
                      <td>
                        <?php echo $value->cantidad_asignada ?>
                      </td>
                      <td>
                        <?= $value->unidad_medida; ?>
                      </td>
                      <td class="font-weight-bold">
                        <?= ($cantidad_a_entregar == '-')? 0 : $cantidad_a_entregar; ?>
                      </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-primary alto-costo"
                          data-neodata="<?= $value->neodata; ?>"
                          data-descripcion="<?php echo $value->marca.' '.$value->modelo.'('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>"
                          data-tbl_catalogo_idtbl_catalogo="<?= $value->tbl_catalogo_idtbl_catalogo; ?>"
                          data-unidad-medida="<?= $value->unidad_medida; ?>"
                          data-iddtl_asignacion="<?= (isset($value->iddtl_asignacion))? $value->iddtl_asignacion : '-'; ?>"
                          data-tipo=""
                          data-cantidad-entregar="">Desasignar</button>
                        <input type="hidden" name="producto[]" class="productocheck" value="<?= (empty($check))? '-' : $value->tbl_catalogo_idtbl_catalogo; ?>">
                        <input type="hidden" name="iddtl_asignacion[]" value="<?= (isset($value->iddtl_asignacion))? $value->iddtl_asignacion : '-'; ?>">
                      </td>
                    </tr>
                    <?php } ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-row">
            <div class="col-12">
            </div>
          </div>
          <div class="form-row">
            <div class="col table-responsive">
              <table style="width: 100%" class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Fecha de asignación</th>
                    <th>Código</th>
                    <th>Equipo</th>
                    <th>Unidades Asignadas</th>
                    <th>Unidad de medida</th>
                    <th>Entregar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $tmpidcatalogo = array(); ?>
                  <?php if ($asignaciones): ?>
                    <tr>
                      <td colspan="7" class="text-center text-uppercase font-weight-bold font-italic">No hay Asignaciones.</td>
                    </tr>
                  <?php else: ?>
                    <?php foreach ($asignaciones as $key => $value): ?>
                      <?php
                        $cantidad_a_entregar = '-'; $check = '';
                        foreach ($detalle as $key2 => $value2) {
                          if ($value->tbl_catalogo_idtbl_catalogo == $value2->tbl_catalogo_idtbl_catalogo) {?>
                           <tr class="">
                        <td class="text-center">
                          <?php echo ($value->estatus_asignacion=='activa') ? '<a href="'.base_url().'almacen/salida/detalle/'.$value->tbl_almacen_movimientos_idtbl_almacen_movimientos.'" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">'.$value->folio.'</a>' : $value->folio ?>
                        </td>
                        <td>
                          <?php echo strftime("%d de %b de %Y a las %r",strtotime($value->fecha_asignacion)) ?>
                        </td>
                        <td>
                          <?= $value->neodata; ?>
                          </td>
                        <td>
                          <?php echo $value->marca.' '.$value->modelo.'('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>
                        </td>
                        <td>
                          <?php echo $value->cantidad_asignada ?>
                        </td>
                        <td>
                          <?= $value->unidad_medida; ?>
                        </td>
                        <td rowspan="2" class="text-center">
                          <input class="asignacion" type="checkbox" name="asignacion[]"
                            data-neodata="<?= $value->neodata; ?>"
                            data-descripcion="<?php echo $value->marca.' '.$value->modelo.'('.htmlspecialchars(trim($value->descripcion), ENT_COMPAT) .')' ?>"
                            data-tbl_catalogo_idtbl_catalogo="<?= $value->tbl_catalogo_idtbl_catalogo; ?>"
                            data-unidad-medida="<?= $value->unidad_medida; ?>"
                            data-iddtl_asignacion="<?= (isset($value->iddtl_asignacion))? $value->iddtl_asignacion : '--'; ?>"
                            data-tipo=""
                            data-cantidad-entregar=""
                            <?= $check; ?>
                          >
                          <input type="hidden" name="producto[]" class="productocheck" value="<?= (empty($check))? '-' : $value->tbl_catalogo_idtbl_catalogo; ?>">
                          <input type="hidden" name="iddtl_asignacion[]" value="<?= (isset($value->iddtl_asignacion))? $value->iddtl_asignacion : '-'; ?>">
                        </td>
                      </tr>
                      <tr class="productotr<?= $key; ?>">
                        <td colspan="6">
                          <div id="item-producto" class="itemproducto">
                            <table style="width: 100%">
                              <tbody>
                                <tr>
                                  <td style="border: 0px solid #ffffff00!important;">
                                    <div class="form-group">
                                      <label>Cantidad a entregar</label>
                                      <input type="text" name="" class="form-control" disabled value="<?= ($cantidad_a_entregar == '-')? 0 : $cantidad_a_entregar; ?>">
                                      <input type="hidden" name="cantidad_entregar[]" class="form-control" value="<?= $cantidad_a_entregar;  ?>">
                                    </div>
                                  </td>
                                  <td style="border: 0px solid #ffffff00!important;">
                                    <div class="form-group">
                                      <label>Estado<?= (empty($check))? '' : '*'; ?></label>
                                      <select name="estado[]" class="form-control estadoasignado" data-tipo=""
                                        data-tbl_catalogo_idtbl_catalogo="<?= $value->tbl_catalogo_idtbl_catalogo; ?>">
                                        <option value="--" selected>Seleccione...</option>
                                        <option value="almacen">Disponible</option>
                                        <option value="dañado">Dañado</option>
                                        <option value="robado">Robado</option>
                                        <option value="abuso de confianza">abuso de confianza</option>
                                        <option value="justificacion">Justificación</option>
                                      </select>
                                    </div>
                                  </td>
                                  <td style="border: 0px solid #ffffff00!important;">
                                    <div class="form-group">
                                      <label>Entregado<?= (empty($check))? '' : '*'; ?></label>
                                      <input type="number" name="entregado[]" class="form-control entregarasignado" step="0.001" min="0" value="0" required
                                        data-tbl_catalogo_idtbl_catalogo="<?= $value->tbl_catalogo_idtbl_catalogo; ?>"
                                        data-tipo="">
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="6" style="border: 0px solid #ffffff00!important;">
                                    <div class="form-group">
                                      <label>Comentarios</label>
                                      <textarea name="observaciones[]" id="comentarios" class="form-control notaasignado"  rows="3"
                                        data-tbl_catalogo_idtbl_catalogo="<?= $value->tbl_catalogo_idtbl_catalogo; ?>"
                                        data-tipo=""></textarea>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </td>
                      </tr>
                          <?php
                            $cantidad_a_entregar = $value2->cantidad;
                            $check = 'checked';
                            array_push($tmpidcatalogo, $value->tbl_catalogo_idtbl_catalogo);
                            break;
                          }else{
                            ?>
                            
                            <?php
                        }
                      }
                      ?>
                      
                    <?php endforeach; ?>
                  <?php endif; ?>
                  <?php $tmpitems = array(); ?>
                  <?php foreach ($detalle as $key3 => $value3): ?>
                    <?php if (!in_array($value3->tbl_catalogo_idtbl_catalogo, $tmpidcatalogo)): ?>
                      <tr>
                        <td class="text-center" colspan="2">
                          Sin asignacion
                        </td>
                        <td>
                          <?= $value3->neodata; ?>
                        </td>
                        <td>
                          <?php echo $value3->marca.' '.$value3->modelo.'('.htmlspecialchars(trim($value3->descripcion), ENT_COMPAT) .')' ?>
                        </td>
                        <td class="text-center">
                          ---
                        </td>
                        <td title="<?= $value3->unidad_medida_abr; ?>">
                          <?= $value3->unidad_medida_abr ?>
                        </td>
                        <td rowspan="2" class="text-center">
                          <input class="asignacion" type="checkbox" name="asignacion[]"
                            data-descripcion="<?php echo $value3->marca.' '.$value3->modelo.'('.htmlspecialchars(trim($value3->descripcion), ENT_COMPAT) .')' ?>"
                            data-neodata="<?= $value3->neodata; ?>"
                            data-tbl_catalogo_idtbl_catalogo="<?= $value3->tbl_catalogo_idtbl_catalogo; ?>"
                            data-unidad-medida="<?= $value3->unidad_medida_abr ?>"
                            data-iddtl_asignacion="<?= (isset($value3->iddtl_asignacion))? $value3->iddtl_asignacion : '--'; ?>"
                            data-tipo="<?= ( in_array($value3->tbl_catalogo_idtbl_catalogo, $tmpitems) )? 'duplicado' : '' ?>"
                            data-cantidad-entregar="<?= $value3->cantidad; ?>"
                            checked
                          >
                          <input type="hidden" name="producto[]" class="productocheck" value="<?= $value3->tbl_catalogo_idtbl_catalogo; ?>">
                          <input type="hidden" name="iddtl_asignacion[]" value="-">    
                        </td>
                      </tr>
                      <tr class="otrosproductotr<?= $key3; ?>">
                        <td colspan="6">
                          <table style="width: 100%">
                            <tbody>
                              <tr>
                                <td style="border: 0px solid #ffffff00!important;">
                                  <div class="form-group">
                                    <label>Cantidad a entregar</label>
                                    <input type="text" name="" class="form-control" disabled value="<?= $value3->cantidad; ?>">
                                    <input type="hidden" name="cantidad_entregar[]" class="form-control" value="<?= $value3->cantidad; ?>">
                                  </div>
                                </td>
                                <td style="border: 0px solid #ffffff00!important;">
                                  <div class="form-group">
                                    <label>Estado</label>
                                    <select name="estado[]" class="form-control estadoasignado"
                                      data-tbl_catalogo_idtbl_catalogo="<?= $value3->tbl_catalogo_idtbl_catalogo; ?>"
                                      data-tipo="<?= ( in_array($value3->tbl_catalogo_idtbl_catalogo, $tmpitems) )? 'duplicado' : '' ?>">
                                      <option value="--" selected>Seleccione...</option>
                                      <option value="almacen">Disponible</option>
                                      <option value="dañado">Dañado</option>
                                      <option value="robado">Robado</option>
                                      <option value="abuso de confianza">abuso de confianza</option>
                                      <option value="justificacion">Justificación</option>
                                    </select>
                                  </div>
                                </td>
                                <td style="border: 0px solid #ffffff00!important;">
                                  <div class="form-group">
                                    <label>Entregado</label>
                                    <input type="number" name="entregado[]" class="form-control entregarasignado" step="0.001" min="0" value="0" required
                                      data-tbl_catalogo_idtbl_catalogo="<?= $value3->tbl_catalogo_idtbl_catalogo; ?>"
                                      data-tipo="<?= ( in_array($value3->tbl_catalogo_idtbl_catalogo, $tmpitems) )? 'duplicado' : '' ?>">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="6" style="border: 0px solid #ffffff00!important;">
                                  <div class="form-group">
                                    <label>Comentarios</label>
                                    <textarea name="observaciones[]" id="comentarios" class="form-control notaasignado" rows="3"
                                      data-tbl_catalogo_idtbl_catalogo="<?= $value3->tbl_catalogo_idtbl_catalogo; ?>"
                                      data-tipo="<?= ( in_array($value3->tbl_catalogo_idtbl_catalogo, $tmpitems) )? 'duplicado' : '' ?>"></textarea>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <?php array_push($tmpitems, $value3->tbl_catalogo_idtbl_catalogo) ?>
                    <?php endif ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <hr>
          <div id="item-producto0" class="itemproducto" style="display: none;">
            <div class="form-row">
              <div class="col-xs-12 col-md-6">
                <label>Producto*</label>
                <select name="producto[]" id="product" class="selectpicker producto" data-live-search="true">
                  <option value="-" selected="selected">Seleccione...</option>
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
                  <input type="hidden" name="iddtl_asignacion[]" value="-">
                  <input type="number" name="entregado[]" class="form-control entregarnuevo" step="0.001" min="0">
                  <input type="hidden" name="cantidad_entregar[]" class="form-control" value="-">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Estado*</label>
                  <select name="estado[]" class="form-control estadonuevo">
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
                    <textarea name="observaciones[]" id="comentarios" class="form-control notanuevo" rows="3"></textarea>
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
          <div class="row">
            <div class="col text-center">
              <span class="fa fa-plus" id="nuevoProducto" style="background: green;height: 40px;width: 40px;text-align: center;color: #fff;border-radius: 25px;font-size: 25px;line-height: 1.7;cursor: pointer;"></span>
            </div>
          </div>
          <hr>
          <div class="row">
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
          </div>
          <div class="clearfix pt-md">
            <div class="pull-right">
              <?= form_hidden('token',$token) ?>
              <?= form_hidden('uid_usuario',$solicitud->uid_usuario) ?>
              <?= form_hidden('uid_devolucion',$uid_salida) ?>
              <?= form_hidden('parent',$solicitud->idtbl_solicitud_devolucion) ?>
              <?= form_hidden('proyecto',$solicitud->tbl_proyectos_idtbl_proyectos) ?>
              <?= form_hidden('segmento',$solicitud->idtbl_segmentos_proyecto) ?>
              <input type="hidden" name="" id="entregadoEstatus" value="<?= ($solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $permiso > 1 && $this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud != 'cancelada A.G')? 1 : 0; ?>">
              <?php
                $contratistaPersonal = ($solicitud->tbl_contratistas_idtbl_contratistas == '' && $solicitud->tbl_usuarios_idtbl_usuarios_supervisor == '') ? 1 : 0;
                $usuarioalmacen = ($permiso > 1 && $this->session->userdata('tipo') == 4) ? 1 : 0 ;
              ?>
              <a href="<?php echo base_url().'almacen/devoluciones' ?>" class="btn-warning btn">Regresar</a>
              <?php if (($solicitud->tbl_users_idtbl_users_aprobacion == NULL && $this->session->userdata('tipo') == 11) ): ?>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php elseif ($permiso >= 1 && $this->session->userdata('tipo') == 4 && $solicitud->tbl_users_idtbl_users_aprobar_ag == NULL): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="button" id="aprobar" class="btn-primary btn">Aprobar Solicitud</button>
              <?php endif; ?>
              <?php if ($solicitud->tbl_users_idtbl_users_aprobar_ag != NULL && $solicitud->tbl_users_idtbl_users_ag == NULL && $permiso > 1 && $this->session->userdata('tipo') == 4 && $solicitud->estatus_solicitud != 'cancelada A.G'): ?>
                <button type="button" id="cancelar" class="btn-danger btn">Cancelar Solicitud</button>
                <button type="submit" id="guardar" class="btn-primary btn">Realizar Devolución</button>
                <!-- <button type="button" id="guardar" class="btn-primary btn">Realizar Devolución</button> -->
              <?php endif; ?>
            </div>
          </div>
        <?= form_close();?>
      </div>
    </div>
  </div>
</section>
<section style="display: ;">
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
                      <strong>RECIBE</strong>
                    </td>
                    <td class="b_top b_right b_bottom" align="center">
                      <?= $solicitud->entrega ?>
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
          <tbody style="font-size: 12px!important;" id="contenido-imprimir-table" align="center">
            <?php $tmpitems2 = array(); ?>
            <?php foreach ($detalle as $key => $value) : ?>
              <tr id="tritem-producto<?= ( in_array($value->tbl_catalogo_idtbl_catalogo, $tmpitems2) )? 'duplicado' : '' ?><?= $value->tbl_catalogo_idtbl_catalogo; ?>">
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
              <?php array_push($tmpitems2, $value->tbl_catalogo_idtbl_catalogo) ?>
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
  $(document).on('change', '.entregarnuevo', function (event) {
    var _this = $(this).closest('.itemproducto');
    $('#tr' + _this.attr('id')).find('.td-entregado').html($(this).val());
  });
  $(document).on('change', '.estadonuevo', function (event) {
    var _this = $(this).closest('.itemproducto');
    $('#tr' + _this.attr('id')).find('.td-estatus').html($(this).val());
  });
  $(document).on('change', '.notanuevo', function (event) {
    var _this = $(this).closest('.itemproducto');
    $('#tr' + _this.attr('id')).find('.td-observaciones').html($(this).val());
  });
  $(document).on('change', '.estadoasignado', function (event) {
    var _this = $(this).closest('.itemproducto');
    console.log($('#tritem-producto'+ $(this).data('tipó') +''+ $(this).data('tbl_catalogo_idtbl_catalogo')).html())
    $('#tritem-producto'+ $(this).data('tipo') +''+ $(this).data('tbl_catalogo_idtbl_catalogo')).find('.td-estatus').html($(this).val());
  });
  $(document).on('change', '.entregarasignado', function (event) {
    var _this = $(this).closest('.itemproducto');
    $('#tritem-producto'+ $(this).data('tipo') +''+ $(this).data('tbl_catalogo_idtbl_catalogo')).find('.td-entregado').html($(this).val());
  });
  $(document).on('change', '.notaasignado', function (event) {
    var _this = $(this).closest('.itemproducto');
    $('#tritem-producto'+ $(this).data('tipo') +''+ $(this).data('tbl_catalogo_idtbl_catalogo')).find('.td-observaciones').html($(this).val());
  });
  $(document).on('change', '.producto', function (event) {
    event.preventDefault();
    var _this = $(this).closest('.itemproducto');
    console.log( _this );
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
  $('.asignacion').change(function(event) {
    var entregadoEstatus = $('#entregadoEstatus').val();
    var _this = $(this).closest('tr');
    // console.log($('#contenido-imprimir-table tr:last'));
    if (this.checked) {
      // if ($('#contenido-imprimir-table').html().trim() == '') {
        $(_this).find('.productocheck').val($(this).data('tbl_catalogo_idtbl_catalogo'));
        if ($(this).data('tipo')=='duplicado') {
          $('#contenido-imprimir-table tr:last').after(
            '<tr id="tritem-producto-duplicado'+ $(this).data('tbl_catalogo_idtbl_catalogo') +'">' +
              '<td class="td-codigo-uid">'+ $(this).data('neodata') +'</td>'+
              '<td class="td-producto">'+ $(this).data('descripcion') +'</td>'+
              '<td class="td-cantidad"><?= $value->cantidad ?></td>'+
              '<td class="td-unidad-medida">'+ $(this).data('cantidad-entregar') +'</td>'+
              '<td class="td-entregado"></td>'+
              '<td class="td-estatus"></td>'+
              '<td class="td-observaciones"></td>'+
            '</tr>'
          );
        } else {
          $('#contenido-imprimir-table tr:last').after(
            '<tr id="tritem-producto'+ $(this).data('tbl_catalogo_idtbl_catalogo') +'">' +
              '<td class="td-codigo-uid">'+ $(this).data('neodata') +'</td>'+
              '<td class="td-producto">'+ $(this).data('descripcion') +'</td>'+
              '<td class="td-cantidad">'+ $(this).data('cantidad-entregar') +'</td>'+
              '<td class="td-unidad-medida">'+ $(this).data('unidad-medida') +'</td>'+
              '<td class="td-entregado"></td>'+
              '<td class="td-estatus"></td>'+
              '<td class="td-observaciones"></td>'+
            '</tr>'
          );
        }
      // }
    }else{
      var _this = $(this).closest('tr');
      $(_this).find('.productocheck').val('-');
      if ($(this).data('tipo')=='nuevo') {
        $( '#tritem-producto-nuevo'+ $(this).data('tbl_catalogo_idtbl_catalogo') ).remove();
      } else {
        $( '#tritem-producto'+ $(this).data('tbl_catalogo_idtbl_catalogo') ).remove();
      }
    }
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
  $('#aprobar').click(function (event) {
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
    })
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
          location.href="<?= base_url() ?>almacen/devoluciones";
        } else {
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          });
        }
      }
    });
  });
  $('#formuploadajax').on("submit", function (event) {
  // $('#guardar').click(function (event) {
    event.isDefaultPrevented()
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
            url: "<?= base_url()?>almacen/guardar-devolucion-interno",
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
                )
                window.location.replace("<?= base_url() ?>almacen/detalle-devolucion/<?= $this->uri->segment(3)?>");
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                });
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