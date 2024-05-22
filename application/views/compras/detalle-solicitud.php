<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        
            <div class="col-5" style="height: 80px;">
                <h3 class="h4 ver_solicitud hand">Detalle Solicitud de Compra&nbsp;</h3>
                <!-- // Nuevos cambios -->
                <h4 class="h6">
                  <?=($solicitud->estatus_solicitud=='aprobada') ? ' (UID: '.$solicitud->uid.')' : null ?>
                </h4>
                <?php $classEstatus = '';
                  if ($solicitud->estatus_solicitud == 'aprobada') {
                    $classEstatus='text-success';
                  } elseif ($solicitud->estatus_solicitud == 'cancelada') {
                    $classEstatus='text-danger';
                  } else {
                    $classEstatus='text-warning';
                  }
                ?>
                <h4 class="h5 <?= $classEstatus?>">
                  <?= ucfirst($solicitud->estatus_solicitud) ?>
                </h4>
                <!-- // Nuevos cambios -->
            </div>
            <div class="col-5" style="height: 80px;">
                <?php
                  if( isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0 || 
                  isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0 ):?>                   
                      <h3 class="h4">Pedido </h3>
                  <?php endif; ?>
            </div> 
            <div class="card-body detalle_compra">
                <?php
                if( isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0 || 
                isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0 || isset($this->session->userdata('permisos')['solicitud-compra']) && $this->session->userdata('permisos')['solicitud-compra']>0 ){
                ?> 
                  <button type="button" onclick="printDiv('printableArea')" value="Print Invoice" class="btn-info btn ocultar">Imprimir</button>
                <?php } ?>   
            </div>                       
        </div>
            <div class="card-body detalle_compra">
                <div id="print-me"></div>
                <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
                <?php echo form_open_multipart('', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
                <input type="hidden" name="estatus_solicitud" value="<?= $solicitud->estatus_solicitud ?>">
                <input type="hidden" name="uid" value="<?= $uid ?>">
                <input type="hidden" name="token" value="<?= $token ?>">
                <div class="form-row">
                    <div class="col">
                        <label for="fecha-limite">Fecha limite de entrega*</label>
                        <input type="date" name="" id="fecha-limite" class="form-control" disabled
                            value="<?= $solicitud->fecha_limite ?>">
                    </div>
                    <div class="col">
                    <label for="tipo_solicitud">Tipo*</label>
                        <input type="text" name="" id="tipo_solicitud" class="form-control" disabled
                            value="<?= $solicitud->tipo_solicitud ?>">
                    </div>                    
                </div>
                <br>
                <div class="form-row">
                <div class="col">
                        <label>Proyecto*</label>
                        <input type="text" name="" id="" class="form-control" disabled
                            value="<?= substr($solicitud->nombre_proyecto,0,70) ?>">
                    </div>
                  <div class="col">
                  <label>Segmento*</label>
                  <input type="text" name="" id="" class="form-control" disabled
                            value="<?php
                            if($solicitud->tbl_segmentos_proyecto_idtbl_segmentos_proyecto==0){
                              echo $solicitud->direccion;
                            }else{
                              echo $solicitud->segmento;
                            }  ?>">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col">
                    <label>Almacén</label>
                    <input type="text" name="" id="" class="form-control" disabled value="<?= $solicitud->almacen ?>">
                    <input type="hidden" id="id_almacen" class="form-control" readonly value="<?= $solicitud->tbl_almacenes_idtbl_almacenes ?>">
                  </div>
                </div>
                <br>
                <?php if($solicitud->tbl_almacenes_idtbl_almacenes == 30){ ?>
                <?php if (isset($solicitud->primera_sugerencia)) { ?>
                <div class="form-row">
              <div class="col">
                <label for="sugerencia">Sugerencia de Proveedor</label>
                <textarea name="sugerencia_proveedor1" id="sugerencia" class="form-control" rows="1" readonly><?= $solicitud->primera_sugerencia ?></textarea>
              </div>
              <div class="col">
                <label for="costo1">Costo</label>
                <input type="number" name="costo1" id="costo1" class="form-control" value="<?= $solicitud->primer_costo ?>" readonly>
              </div> 
              <div class="col">
                <label for="sugerencia">Comentario</label>
                <textarea name="comentario_proveedor1" id="comentario" class="form-control" rows="1" required><?= $solicitud->primer_comentario ?></textarea>
              </div> 
              <div class="col">
              <a class="btn" href="<?= base_url() . "uploads/compras/" . $solicitud->uid . "/" . $solicitud->primer_archivo . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a>
              </div>               
            </div>
            <?php } ?>
            <?php if (isset($solicitud->segunda_sugerencia)) { ?>
            <div class="form-row">
              <div class="col">
                <label for="sugerencia">Sugerencia de Proveedor</label>
                <textarea name="sugerencia_proveedor2" id="sugerencia" class="form-control" rows="1" readonly><?= $solicitud->segunda_sugerencia ?></textarea>
              </div>
              <div class="col">
                <label for="costo1">Costo</label>
                <input type="number" name="costo2" id="costo2" class="form-control" value="<?= $solicitud->segundo_costo ?>" readonly>
              </div>
              <div class="col">
                <label for="sugerencia">Comentario</label>
                <textarea name="comentario_proveedor2" id="comentario" class="form-control" rows="1" required><?= $solicitud->segundo_comentario ?></textarea>
              </div> 
              <div class="col">
              <a class="btn" href="<?= base_url() . "uploads/compras/" . $solicitud->uid . "/" . $solicitud->segundo_archivo . ".pdf"?>" target="__blank"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a>
              </div>         
            </div> 
            <?php } ?>   
            <?php if (isset($solicitud->tercera_sugerencia)) { ?>        
            <div class="form-row">
              <div class="col">
                <label for="sugerencia">Sugerencia de Proveedor</label>
                <textarea name="sugerencia_proveedor3" id="sugerencia" class="form-control" rows="1" readonly><?= $solicitud->tercera_sugerencia ?></textarea>
              </div>
              <div class="col">
                <label for="costo1">Costo</label>
                <input type="number" name="costo3" id="costo3" class="form-control" value="<?= $solicitud->tercer_costo ?>" readonly>
              </div>  
              <div class="col">
                <label for="sugerencia">Comentario</label>
                <textarea name="comentario_proveedor3" id="comentario" class="form-control" rows="1" required><?= $solicitud->tercer_comentario ?></textarea>
              </div>
              <div class="col">
              <a class="btn" href="<?= base_url() . "uploads/compras/" . $solicitud->uid . "/" . $solicitud->tercer_archivo . ".pdf"?>" target="__blank"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a>
              </div>               
            </div>
            <?php } ?>
            <?php }else{ ?>
              <div class="form-row">
                    <div class="col">
                        <label for="sugerencia">Sugerencia de Proveedor</label>
                        <textarea name="" id="sugerencia" class="form-control" rows="5"
                            disabled><?= $solicitud->sugerencia_proveedor ?></textarea>
                    </div>
                </div>

              <?php } ?>
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="comentarios">Comentarios</label>
                        <textarea name="comentarios" id="comentarios" class="form-control" rows="5"
                            <?= ($solicitud->estatus_solicitud=='creada' && isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0) ? null : 'disabled' ?>><?= $solicitud->comentarios ?></textarea>
                    </div>
                </div>
                <hr>
                <?php 
                /****************************** CABECERA LISTA PRODUCTOS IMPRIMIR *********************************/
                $filas_prod = count($detalle);
                $tr_prod ='
                <tr style="font-size:10px;">
                  <td align="center"  width="22"><b>CANTIDAD</b></td>
                  <td align="center"  width="22"><b>UNIDAD</b></td>
                  <td align="center"  width="150"><b>C&Oacute;DIGO</b></td>
                  <td align="center" ><b>DESCRIPCI&Oacute;N</b></td>
                  <td align="center" ><b>OBSERVACIONES</b></td>
                </tr>';
                /****************************** CABECERA LISTA PRODUCTOS IMPRIMIR *********************************/
                ?>
                <?php foreach($detalle as $key => $value): ?>
                  <?php if($value->cantidad_anterior != NULL){ ?>
                  <div class="form-row">
                  <div class="col">
                      <label>Modificado Por:</label>
                      <input type="text" class="form-control" value="<?= $solicitud->nombre_ag ?>" readonly>
                    </div>
                    <div class="col">
                      <label>Cantidad Anterior</label>
                      <input type="text" class="form-control" value="<?= $value->cantidad_anterior ?>" readonly>
                    </div>
                    
                </div>
                <br>
                <?php } ?>
                  <div class="form-row" id="div_productos_<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                </div>
                <div id="item-producto<?= $key ?>" class="itemproducto">
                    <div class="form-row">
                        <div class="col">
                            <label>Producto*</label>
                            <?php if($value->tbl_catalogo_idtbl_catalogo==NULL): ?>

                                <?php if(isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>2): ?>

                                    <select name="producto[]" class="selectpicker producto" required data-live-search="true">
                                        <option value="0" selected="selected">Producto inexistente en el catálogo</option>
                                        <?php foreach ($catalogo as $key => $values): ?>
                                        <option value="<?php echo $values->idtbl_catalogo ?>"
                                            data-precio="<?php echo $values->precio ?>"
                                            data-moneda="<?php echo $values->tipo_moneda ?>"
                                            data-preciolabel="<?php echo number_format($values->precio,2) . (($values->tipo_moneda=='p') ? ' Pesos' : ' Dolares') ?>"
                                            data-descripcion="<?php echo $values->descripcion ?>"
                                            data-categoria="<?php echo $values->idctl_categorias ?>">
                                            <?php echo $values->uid.' '.$values->marca.' '.$values->modelo.' ('.substr($values->descripcion,0,70).')' ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                    <input type="hidden" class="id" value="<?php echo $value->iddtl_solicitud_catalogo ?>">
                                    <input type="hidden" class="nuevo">
                                    <button type="button" class="btn btn-info actualizar">Actualizar</button>

                                <? else: ?>

                                    <input type="text" name="" class="form-control" disabled value="Producto inexistente en el catálogo">
                                    <input type="hidden" name="producto[]" class="form-control" value="0">

                                <?php endif ?>

                            <?php else: ?>
                              <input type="text" name="" id="<?= $value->tbl_catalogo_idtbl_catalogo ?>" class="form-control" disabled
                                value="<?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.' ('.substr($value->descripcion,0,70).')' ?>">
                              <input type="hidden" name="producto[]" class="form-control producto_compra"
                                value="<?= $value->tbl_catalogo_idtbl_catalogo ?>">
                            <?php endif ?>
                             
                            <?php 
                            /****************************** LISTA PRODUCTOS IMPRIMIR *********************************/
                            if($value->tbl_catalogo_idtbl_catalogo!=NULL) {
                
                              $tr_prod .=' 
                              <tr style="font-size:10px;">
                                <td class="" align="center">'.$value->cantidad.'</td>
                                <td class="" align="center">'.$value->unidad_medida_abr.'</td>
                                <td class="">'.$value->neodata.'</td>
                                <td class="">'.substr($value->descripcion,0,70).'</td>
                                <td class="">'.substr($value->especificaciones,0,70).'</td>
                              </tr>                                              
                              ';                              
                            }
                            /****************************** LISTA PRODUCTOS IMPRIMIR *********************************/
                            ?>
                        </div>
                        <div class="col">
                          <input type="hidden" name="iddtl_solicitud_catalogo[]" class="form-control" value="<?= $value->iddtl_solicitud_catalogo ?>">
                            <input type="hidden" name="cantidad_anterior[]" class="form-control" value="<?= $value->cantidad ?>">
                            <label for="cantidad">Cantidad*</label>
                            <input type="text" name="cantidad[]" id="cantidad"
                                <?= (($solicitud->estatus_solicitud=='pendiente ag' || $solicitud->estatus_solicitud == 'pendiente sis' || $solicitud->estatus_solicitud=='pendiente cv2') && $this->session->userdata('id') == 3) ? null : 'disabled' ?>
                                required class="form-control" value="<?= $value->cantidad ?>">
                        </div>

                        <div class="col">
                            <label for="cantidad">Pedido*</label>
                            <input type="text" name="" id="pedido"
                                disabled
                                required class="form-control" value="<?= $value->comprado ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Descripción</label>
                            <input type="text" name="" id="" class="form-control descripcion" disabled
                                value="<?php echo $value->descripcion ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Especificaciones</label>
                            <textarea name="especificaciones[]" id="especificaciones" class="form-control" rows="5"
                                readonly><?= $value->especificaciones ?></textarea>
                        </div>
                    </div>
                    <?php if(sizeof($detalle) > 1 && $solicitud->estatus_solicitud == 'pendiente' && $this->session->userdata('tipo') == 7) { ?>
                      <i class="fa fa-close delete-product" onclick="deleteProduct(<?= $value->iddtl_solicitud_catalogo ?>)"></i>
                    <?php } ?>
                    <hr>
                </div>
                <?php endforeach ?>

                <br><br>

            <h3 class="h3">Documentos</h3>
            <ul>              
              <?php $carpeta = './uploads/compras/' . $solicitud->uid; ?>              
              <?php if(isset($imagen->factura)){ ?>                
              <?php $carpeta = './uploads/compras_facturas/'. $imagen->factura; ?>
              <?php } ?>
              <?php @$scanned_directory = array_diff(scandir($carpeta), array('..', '.')); ?>
              <?php if (is_array($scanned_directory) || is_object($scanned_directory)) { ?>
                <?php if(sizeof($scanned_directory) > 0) { ?>
                  <?php
                  try {
                    foreach ($scanned_directory as $key => $value) {
                      echo '<li><a href="/' . $carpeta . '/' . $value . '" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">' . $value . '</a></li>';
                    }
                  } catch (Exception $e) {
                  }?>
                <?php }else { ?>
                  <p class="text-danger text-center">No se encontró ningún documento</p>
                <?php } ?>

              <?php }else { ?>
                <p class="text-danger text-center">No se encontró ningún documento</p>
              <?php } ?>
            </ul>          
            
                <!--************************* DIV contenedor de la tabla para imprimir hide*************************-->
                <div class="card-body detalle_compra hide"  id="printableArea">
                  <style>
                    .b_top{ border-top:1px solid #000; }
                    .b_right{ border-right:1px solid #000; }
                    .b_bottom{ border-bottom:1px solid #000; }
                    .b_left{ border-left:1px solid #000; }
                  </style>
                  <table class="" style="width:100%" border="1" cellpadding="4" cellspacing="0">
                    <thead>
                        <tr>
                          <th class="b_top b_bottom b_left" style="text-align: center" width="20%" rowspan="2">
                              <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 80px;">
                          </th>
                          <th class="b_top" width="50%" style="vertical-align: middle; text-align: center" >
                               ESTEVEZ.JOR SERVICIOS, S.A. DE C.V. 
                          </th> 
                          <th class="b_top b_right" style="vertical-align: middle; text-align: center; font-size:10px;" width="25%">
                               C&oacute;digo: DA-FE-CM-001 
                          </th>  
                        </tr>
                        <tr> 
                          <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center" >
                               Solicitud de Compras y Servicios 
                          </th>  
                          <th class="b_bottom b_right" style="vertical-align: top; text-align: center; font-size:10px;" width="25%">
                               C&oacute;digo Interno: <?= $solicitud->uid ?>
                          </th>  
                        </tr>
                    </thead>
                  </table>
                  <table class="" style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                    <?php
                    $m_meses = [
                      "01" => "ENE",
                      "02" => "FEB",
                      "03" => "MAR",
                      "04" => "ABR",
                      "05" => "MAY",
                      "06" => "JUN",
                      "07" => "JUL",
                      "08" => "AGO",
                      "09" => "SEP",
                      "10" => "OCT",
                      "11" => "NOV",
                      "12" => "DIC" 
                    ];                    
                    $fecha_creacion_proyecto = explode( "-",$solicitud->fecha_creacion_proyecto );
                    $fecha_creacion = explode( "-",$solicitud->fecha_creacion_almacen );
                    $fecha_limite = explode( "-",$solicitud->fecha_limite );
                    $fecha_creacion_proyecto = $fecha_creacion_proyecto[ 2 ]."-".$m_meses[ $fecha_creacion_proyecto[ 1 ] ]."-".$fecha_creacion_proyecto[ 0 ];
                    $fecha_creacion = $fecha_creacion[ 2 ]."-".$m_meses[ $fecha_creacion[ 1 ] ]."-".$fecha_creacion[ 0 ];
                    $fecha_limite = $fecha_limite[ 2 ]."-".$m_meses[ $fecha_limite[ 1 ] ]."-".$fecha_limite[ 0 ];
                    ?>
                    <tr><td></td></tr>
                      <tr>
                        <td width="30%">CLIENTE:</td>
                        <td><div class="b_top b_right b_bottom b_left" style="position:relative;float:right;width:99%;height:20px;font-size:10px;padding:1px;" align="center"><?= $solicitud->nombre_proyecto ?></div></td>
                      </tr>
                      <tr><td></td></tr>
                      <tr>
                        <td>No. PROYECTO:</td>
                        <td><div class="b_top b_right b_bottom b_left" style="position:relative;float:right;width:40%;height:20px;padding:1px 3px 0 0;" align="right"><?= $solicitud->numero_proyecto ?></div></td>
                      </tr>
                      <tr><td></td></tr>
                      <tr>
                        <td>FECHA DE INICIO DE PROYECTO:</td>
                        <td><div class="b_top b_right b_bottom b_left" style="position:relative;float:right;width:40%;height:20px;padding:1px 3px 0 0;" align="right"> <?= $fecha_creacion_proyecto ?></div></td>
                      </tr>
                      <tr><td></td></tr>
                      <tr>
                        <td>FECHA DE SOLICITUD:</td>
                        <td><div class="b_top b_right b_bottom b_left" style="position:relative;float:right;width:40%;height:20px;padding:1px 3px 0 0;" align="right"> <?= $fecha_creacion ?></div></td>
                      </tr>   
                      <tr><td></td></tr>
                      <tr>
                        <td>FECHA LIMITE DE ENTREGA:</td>
                        <td><div class="b_top b_right b_bottom b_left" style="position:relative;float:right;width:40%;height:20px;padding:1px 3px 0 0;" align="right"><?= $fecha_limite ?></div></td>
                      </tr>  
                      <tr><td></td></tr>
                      <tr>
                        <td>
                          <div style="position:relative;float:left;height:20px; padding-top:2px;">SERVICIO:</div>
                          <div class="b_top b_right b_bottom b_left" style="position:relative;float:left;width:50%;height:20px; margin-left:5px;padding:1px 3px 0 0;" align="center"> </div>
                        </td>
                        <td>
                          <div class="b_top b_right b_bottom b_left" style="position:relative;float:right;width:40%;height:20px;padding:1px 0px 0 4px;"><?= ucfirst ($solicitud->tipo_solicitud) ?> </div>
                          <div style="position:relative;float:right;height:20px; padding-top:2px;" align="center">MATERIAL / HERRAMIENTA / EQUIPO:</div>
                        </td>
                      </tr> 
                      <tr><td></td></tr>
                      <tr>
                        <td colspan="2">
                          <div class="b_top b_right b_bottom b_left" style="position:relative;float:right;width:50%;height:20px;padding:1px;" align="center"><?= $solicitud->sugerencia_proveedor ?></div>
                          <div style="position:relative;float:right;height:20px; padding-top:2px;" align="center">SUGERENCIA DE PROVEEDOR:</div>
                        </td>
                      </tr>  
                      <tr><td></td></tr>
                      <tr>
                        <td colspan="2">
                          <div  style="position:relative;float:left;height:20px; padding-top:7px;width:12%;padding:4px;">NOTA:</div>
                          <div  style="position:relative;float:left;width:84%;height:20px;padding:4px;"><?= $solicitud->comentarios ?></div>
                        </td>
                      </tr> 
                      
                  </table> 
                  <?php
                  if ($filas_prod <= 17) {  
                    while( $filas_prod <= 17 ){
                      
                      $tr_prod .=' 
                      <tr style="font-size:10px;">
                        <td style="height:18px;"></td>
                        <td class="" align="center"></td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class=""></td>
                      </tr>                                              
                      '; 
                      $filas_prod++;
                    }

                  }
                  
                  ?>
                  <table  style="width:100%;font-size:10px;" border="1" cellspacing="0">
                    <?php echo $tr_prod; ?>    
                  </table>
                  <table><tr><td></td></tr></table>
                  <table  style="width:100%;font-size:10px;" border="1" cellspacing="0">                    
                  <tr>
                      <td width="70%" align="center">NOMBRE Y FIRMA DEL SOLICITANTE</td>
                      <td width="30%" align="center">FECHA SOLICITUD</td>
                    </tr>
                    <tr>
                      <td height="40"> </td>
                      <td align="center"> <?= $fecha_creacion ?> </td>
                    </tr>                    
                  </table>
                  <table><tr><td></td></tr></table>
                  <table  style="width:100%;font-size:10px;" border="1" cellspacing="0">                    
                  <tr>
                      <td width="100%" align="center">AUTORIZACI&Oacute;N DE COMPRA</td> 
                    </tr>
                    <tr>
                      <td height="70"> </td> 
                    </tr>  
                    <tr>
                      <td align="center" height="30" style="border-top:0px;"> 
                        FECHA Y FIRMA<br>
                        DIRECCIÓN GENERAL / DIRECCIÓN ADMINISTRATIVA<br>
                        FILIBERTO GOMEZ No.46, COL. CENTRO INDUSTRIAL TLALNEPANTLA, TLALNEPANTLA DE BAZ, C.P. 54030, ESTADO DE MEXICO
                      </td> 
                    </tr>                                        
                  </table>                  

                </div> 
                <!-- ****************************** SUBIR ARCHIVOS ****************************** -->
                <?php
                if( isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0 || 
                isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0 && $this->session->userdata('tipo')==7){
                ?>                
                  <div class="row noprint">
                      <div class="col-12">
                          <div id="msgFile"></div>
                          <form method="post" action="" enctype="multipart/form-data" id="myform" name="myform">            
                              <div>
                                <div class="form-group">
                                  
                                  <input type="hidden" id="frm_idtbl_solicitudes_almacen" value="<?php echo $solicitud->idtbl_solicitudes_almacen ?>">
                                  <input type="hidden" id="frm_uid" value="<?php echo $solicitud->uid ?>">
                                  <div class="form-row">
                                    <div style="float:left;">
                                      <label for="file" class="subir hand hide">Seleccionar archivo</label>
                                      <input type="file" id="file" name="filestyle pull-left file" class="file" onchange='cambiar_file()' accept=".pdf, image/*" style='display: ;' />
                                    </div>    
                                    <div style="font-size:15px; margin:4px 0 0 5px;">  
                                      <!-- Ning&uacute;n archivo seleccionado -->
                                      <div id="info_file"></div>
                                    </div>  
                                  </div>      
                                </div>                                 
                              </div> 
                          </form>
                      </div> 
                  </div>
                  <div style="margin-top:10px;" id="cont_files_solicitud" class="noprint">
                  <?php                
                    //localhost: 
                    // $directorio = $_SERVER["DOCUMENT_ROOT"]."/erp2/uploads/compras_solicitud_material/".$solicitud->uid;

                    // server test:
                    $directorio = $_SERVER["DOCUMENT_ROOT"]."/test-erp/uploads/compras_solicitud_material/".$solicitud->uid;

                    // server:
                    //$directorio = $_SERVER["DOCUMENT_ROOT"]."/uploads/compras_solicitud_material/".$solicitud->uid;

                    if (file_exists($directorio)) {                    
                        $directorio = opendir($directorio);
                        $cont=0;
                        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                        {
                            if (is_dir($archivo))//verificamos si es o no un directorio
                            {
                                // echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
                            }
                            else
                            {
                                $info = new SplFileInfo($archivo);
                                $ext = $info->getExtension();
                                $file = base_url().'uploads/compras_solicitud_material/'.$solicitud->uid.'/'.$archivo;
                                echo '
                                <span id="conFile_'.$cont.'">
                                    <a href="'.$file.'" target="_blank">
                                        <img src="'.base_url().'js/upfile/php/uploads/iconos_documentos/'.$ext.'.png"> 
                                    </a>
                                    <img src="'.base_url().'js/upfile/php/uploads/iconos_documentos/delete.png" 
                                      class="btn_del_file hand" file="'.$archivo.'" cont="'.$cont.'" carpeta="'.$solicitud->uid.'"
                                      style="position:absolute;margin: -5px 0 0 -50px;" width="17" >
                                </span>';
                            }
                            $cont++;
                        }                    
                    }           
                    ?>
                    </div>                
                    <br><br>

                    <div class="clearfix pt-md noprint">
                        <div class="pull-right">
                            <?= form_hidden('token',$token) ?>
                            <?= form_hidden('uid',$solicitud->uid) ?>
              

                            <!-- <?php // if($solicitud->estatus_solicitud=='creada' && (isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0)): ?> -->
                            <?php if($solicitud->estatus_solicitud=='creada' && (isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0  )): ?>

                            <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>
                            <button type="button" id="modificar" class="btn-info btn ocultar">Modificar y aprobar Solicitud</button>
                            <button type="button" id="aprobar" class="btn-primary btn ocultar">Aprobar Solicitud</button>
                            <?php endif ?>
                        </div>
                    </div>
                    <?=form_close()?>
                <?php } ?>

                <?php
                if( isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0 || 
                isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0 && $this->session->userdata('tipo') == 7){
                ?> 
                    <div class="clearfix pt-md noprint">
                        <div class="pull-right">                                            
                            <button type="button" id="but_upload" class="btn-info btn ocultar">Adjuntar</button>
                            <a href="javascript:history.go(-1)" class="btn-warning btn">Regresar</a>
                        </div>
                    </div>                            
                <?php }else{ ?>
                  <div class="clearfix pt-md noprint">
                        <div class="pull-right">
                            <?= form_hidden('token',$token) ?>
                            <?= form_hidden('uid',$solicitud->uid) ?>
                            <?php if(($solicitud->estatus_solicitud == "pendiente cv1" && $this->session->userdata('id') == 66 && $this->session->userdata('id_user_direccion') === NULL) || ($solicitud->estatus_solicitud == "pendiente cv2" && (($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3) || $this->session->userdata('id') == 3))){ ?>
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>    
                              <button id="aprobar_solicitud_compras" class="btn-success btn" data-uid="<?= $uid ?>" data-estatus="<?= $solicitud->estatus_solicitud ?>">Aprobar Solicitud</button>
                            <?php } else if($solicitud->estatus_solicitud == "pendiente ag" && $this->session->userdata('id') == 18){ ?>
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>    
                              <button id="aprobar_solicitud_compras" class="btn-success btn" data-uid="<?= $uid ?>" data-estatus="<?= $solicitud->estatus_solicitud ?>">Aprobar Solicitud</button>
                            <?php }else if($solicitud->estatus_solicitud == "pendiente cv1"){ ?>
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button> 
                            <?php }else if($solicitud->estatus_solicitud == "pendiente ac" && (($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3) || $this->session->userdata('id') == 3)){ ?> 
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>    
                              <button id="aprobar_solicitud_compras" class="btn-success btn" data-uid="<?= $uid ?>" data-estatus="<?= $solicitud->estatus_solicitud ?>">Aprobar Solicitud</button>
                              <?php }else if($solicitud->estatus_solicitud == "pendiente sis" && (($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3) || $this->session->userdata('id') == 3)){ ?> 
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>    
                              <button id="aprobar_solicitud_compras" class="btn-success btn" data-uid="<?= $uid ?>" data-estatus="<?= $solicitud->estatus_solicitud ?>">Aprobar Solicitud</button>
                              <?php }else if($solicitud->estatus_solicitud == "pendiente kuali" && (($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3) || $this->session->userdata('id') == 3)){ ?> 
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>    
                              <button id="aprobar_solicitud_compras" class="btn-success btn" data-uid="<?= $uid ?>" data-estatus="<?= $solicitud->estatus_solicitud ?>">Aprobar Solicitud</button>
                              <?php }else if($solicitud->estatus_solicitud == "pendiente ag" && (($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3) || $this->session->userdata('id') == 3)){ ?> 
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>    
                              <button id="aprobar_solicitud_compras" class="btn-success btn" data-uid="<?= $uid ?>" data-estatus="<?= $solicitud->estatus_solicitud ?>">Aprobar Solicitud</button>
                              <?php }else if($solicitud->estatus_solicitud == "pendiente fundidora1" && ($this->session->userdata('id') == 264)){ ?> 
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>    
                              <button id="aprobar_solicitud_compras" class="btn-success btn" data-uid="<?= $uid ?>" data-estatus="<?= $solicitud->estatus_solicitud ?>">Aprobar Solicitud</button>
                              <?php }else if($solicitud->estatus_solicitud == "pendiente fundidora2" && ($this->session->userdata('id') == 3)){ ?> 
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>    
                              <button id="aprobar_solicitud_compras" class="btn-success btn" data-uid="<?= $uid ?>" data-estatus="<?= $solicitud->estatus_solicitud ?>">Aprobar Solicitud</button>
                              <?php }else if($solicitud->estatus_solicitud == "pendiente direccion" && ($this->session->userdata('tipo') == 8)){ ?> 
                              <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Solicitud</button>    
                              <button id="aprobar_solicitud_compras" class="btn-success btn" data-uid="<?= $uid ?>" data-estatus="<?= $solicitud->estatus_solicitud ?>">Aprobar Solicitud</button>
                            <?php } ?>  
                            <a href="javascript:history.go(-1)" class="btn-warning btn">Regresar</a>
                        </div>
                    </div>
                <?php } ?> 
            </div>
            <div class="card-body orden_compra hide">
                
                <?php 
                // echo "<pre>"; print_r($get_detalle_prod_pedidos); echo "</pre>"; 
                $card = '';
                $table_prodPedidos = '';
                if($pedidos){
                    foreach($pedidos as $key => $value){
                        $row_prod = '';
                        $tr_prodPedidos = '';
                        //echo "<pre>"; print_r($get_detalle_prod_pedidos[$pedidos[$key]->idtbl_pedidos]); echo "</pre>"; 
                        $row_prod.='
                        <div class="row bg-light  text-white">
                            <div class="col-5">
                                <p class="card-text text-dark"><b>Producto:</b> </p>
                            </div>
                            <div class="col-2">
                                <p class="card-text text-dark"><b>Cantidad:</b> </p>
                            </div>    
                            <div class="col-2">
                                <p class="card-text text-dark"><b>Precio:</b> </p>
                            </div>   
                            <div class="col-3">
                                <p class="card-text text-dark"><b>Fecha Entrega:</b> </p>
                            </div>                                                                                       
                        </div>';    
                        $tr_prodPedidos .='
                        <tr>
                          <td><b>Producto:</b></td>
                          <td><b>Cantidad:</b></td>
                          <td><b>Precio:</b></td>
                          <td><b>Fecha Entrega:</b></td>        
                        </tr>                                                
                        '; 

                      


                        foreach($get_detalle_prod_pedidos[$pedidos[$key]->idtbl_pedidos] as $key2 => $value){
                            $row_prod.='
                            <div class="row">
                                <div class="col-5">
                                    <p>'.$value->descripcion.'</p>
                                </div>
                                <div class="col-2">
                                    <p>'.$value->cantidad.'</p>
                                </div>    
                                <div class="col-2">
                                    <p>'.$value->precio.'</p>
                                </div>   
                                <div class="col-3">
                                    <p>'.strftime("%d/%b/%Y",strtotime($value->fecha_entrega)).'</p>
                                </div>                                                                                       
                            </div>';
                        
                            $tr_prodPedidos .='
                            <tr>
                              <td>'.$value->descripcion.')</td>
                              <td>'.$value->cantidad.'</td>
                              <td>'.$value->precio.'</td>
                              <td>'.strftime("%d/%b/%Y",strtotime($value->fecha_entrega)).'</td>        
                            </tr>                                                
                            ';                            
                        }
                        
                        
                        $table_prodPedidos .='
                        <table style="border:1px solid; padding:7px;font-size:12px;" width="100%" cellpadding="4">  
                        <tr>
                          <td colspan="2"><b>Condición de Pago:</b> </td>
                          <td colspan="2" align="right">'.strftime("%d de %b de %Y a las %r",strtotime($pedidos[$key]->fecha_creacion)).'</td>
                        </tr>
                        <tr>
                          <td colspan="2"><b>Moneda:</b> </td> 
                        </tr> 
                        '.$tr_prodPedidos.'
                        <tr>
                          <td colspan="2"><b>Lugar de Entrega:</b> </td> 
                        </tr> 
                        <tr>
                          <td colspan="2"><b>Observaciones:</b> '.$pedidos[$key]->observaciones.'</td> 
                        </tr>
                        </table>                                                                        
                        ';
                    }
                    echo '<h5 class="card-title text-center">'.$pedidos[$key]->nombre_proyecto.'</h5>';
                }
                echo $card;
                ?> 
                <!--************************* DIV contenedor de la tabla para imprimir *************************-->
                <div class="card-body detalle_compra hide"  id="printableAreaPedido">
                  <?php echo $table_prodPedidos; ?> 
                </div>  
                <button type="button" onclick="printDiv('printableAreaPedido')" value="Print Invoice" class="btn-info btn ocultar">Imprimir</button>               
            </div>


        </div>
    </div>
</section>
<script>
$(document).ready(function() {
  //event.preventDefault();
    console.log("entro");
  $( ".producto_compra" ).each(function( index ) {
  var idcatalogo = $(this).val();
  var almacen = $('#id_almacen').val();
  $.ajax({
    url: "<?= base_url()?>pedidos/ultimoPedido",
    type: "post",
    data: 'idtbl_catalogo='+ idcatalogo + '&id_almacen='+almacen,
    dataType: 'json',
    processData: false,
    success : function(data) {
      //console.log(data[0]);
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        $.each(data, function (i, item) {
            $('#div_productos_'+idcatalogo).append('<div class="col"><label>Existencias Actual</label><input type="text" readonly class="form-control" value="'+item.existencias+'"></div>'+'<div class="col"><label>Fecha Último Pedido</label><input type="text" readonly class="form-control" value="'+item.ultima_fecha+'"></div>'+'<div class="col"><label>Cantidad Pedida</label><input type="text" readonly class="form-control" value="'+item.cantidad+'"></div>'+'<div class="col"><label>UID del pedido</label><input type="text" readonly class="form-control" value="'+item.uid+'"></div>'+'<div class="col"><label>Cantidad Ingresada</label><input type="text" readonly class="form-control" value="'+item.entregado+'"></div>');
        });
        //$('#recibe').selectpicker('refresh');
      },
      error : function(data) {
        console.log(data);
      }
    });
  });
});
</script>
<script>
$(document).ready(function() { 
    $(".ver_solicitud").click(function(event){ 
            $(".orden_compra").hide(); 
            $(".detalle_compra").show();
            $("#printableArea").hide();
    });
    $(".ver_ordenes").click(function(event){
        $(".orden_compra").show();
        $(".detalle_compra").hide();
                   
    }) 
    function removeItemFromArr ( arr, item ) {
        var i = arr.indexOf( item );
    
        if ( i !== -1 ) {
            arr.splice( i, 1 );
        }
    }
    $(".btn_del_file").click(function(event){
 
      $file = $(this).attr('file');
      $carpeta = $(this).attr('carpeta');
      $cont = $(this).attr('cont');
      console.log("cont::", $cont)
 
      $data = "file="+encodeURI($file)+"&carpeta="+$carpeta+"&op=delete";
      Swal.fire({
        title: 'Eliminar?',
        text: "Deseas eliminar el archivo!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        animation: false
        }).then((result) => {
          if (result.value) {  
            $.ajax({ 
                url: "<?= base_url()?>js/upfile/php/delete.php", 
                type: 'post', 
                data: $data,  
                processData: false, 
                success: function(response){ 
                    console.log(response) 
                    // return;
                    if(response != 0){ 
                        var obj = jQuery.parseJSON(response);
                        console.log(obj)
                        document.querySelector('.file').value = '';
                        $("#conFile_"+$cont).remove();
                        // $link = '<a href="<?= base_url()?>uploads/compras_solicitud_material/'+$frm_uid+'/'+obj[0]+'" target="_blank"> <img src="<?= base_url()?>js/upfile/php/uploads/iconos_documentos/txt.png"></a>';                                        
                        // $("#cont_files_solicitud").append($link); 
                        Swal.fire(
                                '¡Exitoso!',
                                'Archivo eliminado correctamente.',
                                'success'
                        );  
                        return;     
                    }else{
                      Swal.fire(
                                'Error!',
                                'No se puede eliminar el archivo.',
                                'warning'
                            )
                    }  
                }, 
            });

          }
      });             
    });

});
function cambiar_file(){
  // var pdrs = document.getElementById('file').files[0].name;
  // $("#info_file").html( pdrs );
}
function printDiv(divName) { 

    var printContents = document.getElementById(divName).innerHTML;
      var ventana = window.open('', 'PRINT', '');
      ventana.document.write('<html><head><title>' + document.title + '</title>');
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
      return true;          
}

$(document).on('change', '.producto', function(event) {
    event.preventDefault();
    var _this = $(this).closest('.itemproducto');

    $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));

    $(_this).find('.nuevo').val($("option:selected", this).val());

});

$(document).on('click', '.actualizar' , function(event) {   
    var _this = $(this).closest('.itemproducto');

    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea actualizar el item de la solicitud de compra?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url()?>compras/actualizaritem",
                type: "post",
                dataType: "json",
                data: {token: '<?= $token ?>', id: _this.find('.id').val(), new: _this.find('.nuevo').val()},                
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $('.ocultar').hide();
                        _this.find('.dropdown-toggle').attr('disabled','disabled');
                        _this.find('.actualizar').hide()
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        )
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
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea cancelar la solicitud de compra?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url()?>compras/cancelar-solicitud",
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
                        ).then((result) => {
                          location.reload();
                        });
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
$('#modificar').click(function(event) {
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea modificar y aprobar la solicitud de compra?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url()?>compras/modificar-solicitud",
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

$("#but_upload").click(function() { 
                var fd = new FormData(); 
                var files = $('#file')[0].files[0]; 
                console.log("file::",files)
                if (files === undefined) {
                    return;
                }
                $frm_uid = $("#frm_uid").val();
                fd.append('myfile', files); 
                fd.append('uid', $frm_uid); 
       
                $.ajax({ 
                    url: "<?= base_url()?>js/upfile/php/upload.php", 
                    type: 'post', 
                    data: fd, 
                    contentType: false, 
                    processData: false, 
                    success: function(response){ 
                        // console.log(response) 
                        // return;
                        if(response != 0){ 
                            var obj = jQuery.parseJSON(response);
                            document.querySelector('.file').value = '';
                            $("#info_file").empty();
                            $link = '<a href="<?= base_url()?>uploads/compras_solicitud_material/'+$frm_uid+'/'+obj[0]+'" target="_blank"> <img src="<?= base_url()?>js/upfile/php/uploads/iconos_documentos/txt.png"></a>';                                        
                            $("#cont_files_solicitud").append($link);
                            Swal.fire(
                                    '¡Exitoso!',
                                    'Archivo adjunto correctamente.',
                                    'success'
                            );
                            return;                          
                        } 
                        else{ 
                            document.querySelector('.file').value = '';
                            Swal.fire(
                                    'Error!',
                                    'Archivo no permitido.',
                                    'warning'
                                )
                        } 
                    }, 
                }); 
});
$('#aprobar').click(function(event) {
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea aprobar la solicitud de compra?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url()?>compras/aprobar-solicitud",
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
                        ).then((result) => {
                          location.reload();
                        });
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
function deleteProduct(id) {
  Swal.fire({
        title: '¡Atención!',
        text: "¿Desea eliminar este producto de la solicitud de compra?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url()?>compras/deleteProduct",
                type: "post",
                //dataType: "json",
                data: {iddtl_solicitud_catalogo:id},
                //cache: false,
                //contentType: false,
                //processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $('.ocultar').hide();
                        /*Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        )*/
                        location.reload();
                    } else {
                        /*Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        })*/
                        location.reload();
                    }
                }
            });
        }
    })
}
$("#aprobar_solicitud_compras").on("click", function(e){
  e.preventDefault();
  var data = $(this).data();
  var formData = new FormData(document.getElementById("formuploadajax"));
 
  Swal.fire({
        title: '¡Atención!',
        text: "¿Estás seguro de aprobar la compra?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
  $.ajax({
    url: "<?= base_url()?>compras/aprobar_solicitud_cv",
    type: "post",
    dataType: "json",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    complete: function(res) {
      var resp = res.responseJSON;
      if (resp.error == false) {
        $('.ocultar').hide();
          Swal.fire(
            '¡Exitoso!',
            resp.mensaje,
            'success'
          ).then((result) => {
              location.reload();
          });
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
</script>
