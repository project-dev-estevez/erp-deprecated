<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4 class="h4">Salida</h4>
          </div>
          <div class="card-body">
            <div class="grid-form">
              <fieldset>
                <div data-row-span="8">
                  <div data-field-span="1">
                    <label>Folio</label>
                    SA-<?= $detalle[0]->folio ?>
                  </div>
                  <div data-field-span="2">
                    <label>Fecha de creación</label>
                    <?= $detalle[0]->fecha ?>
                  </div>
                  <div data-field-span="3">
                    <label>Proyecto</label>
                    <?= $detalle[0]->numero_proyecto ?> - <?= $detalle[0]->nombre_proyecto ?>
                  </div>
                  <div data-field-span="2">
                    <label>Segmento</label>
                    <?= $detalle[0]->direccion ?>
                  </div>
                </div>
                <?php if($detalle[0]->movimiento_virtual!=2){ ?>
                <div data-row-span="8">
                  <div data-field-span="2">
                    <label>Autor</label>
                    <?= $detalle[0]->nombre_autor ?>
                  </div>
                  <div data-field-span="3">
                    <label>Usuario recibe</label>
                    <?= $detalle[0]->nombres ?> <?= $detalle[0]->apellido_paterno ?> <?= $detalle[0]->apellido_materno ?>
                  </div>
                  <div data-field-span="3">
                    <label>Usuario aprobación</label>
                    <?= $detalle[0]->nombre_autorizacion ?>
                  </div>
                </div>
                <?php if ($detalle[0]->nombrecon != null || $detalle[0]->nombrecon != '') { ?>
                  <div data-row-span="8">
                    <div data-field-span="3">
                      <label>Contratista</label>
                      <?= $detalle[0]->nombrecon ?>
                    </div>
                    <div data-field-span="3">
                      <label>Supervisor</label>
                      <?= $detalle[0]->nombressu ?> <?= $detalle[0]->paternosu ?> <?= $detalle[0]->maternosu ?>
                    </div>
                  </div>
                <?php } ?>
                <div data-row-span="8">
                  <div data-field-span="3">
                    <label>Usuario CO</label>
                    <?= $detalle[0]->nombre_co ?>
                  </div>
                  <div data-field-span="3">
                    <label>Usuario AG</label>
                    <?= $detalle[0]->nombre_ag ?>
                  </div>
                  <div data-field-span="2">
                    <label>Personal entrega</label>
                    <?= $detalle[0]->nombre_entrega ?>
                  </div>
                </div>
                <?php } else{ ?>
                <div data-row-span="4">
                  <div data-field-span="2">
                    <label>Folio Traspaso</label>
                    TP-<?= $detalle[0]->folio ?>
                  </div>
                  <div data-field-span="2">
                    <label>UID Traspaso</label>
                    <?= $detalle[0]->uid ?>
                  </div>
                </div>
                <?php } ?>
              </fieldset>
            </div>
            <br><br>
            <table class="table table-striped table-bordered display responsive no-wrap" style="width:100%">
              <thead>
                <tr>
                  <th>Neodata</th>
                  <th>Descripción</th>
                  <th>Unidad</th>
                  <th>Cantidad</th>                  
                  <th>Entregado</th>                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($detalle as $key => $value) { ?>
                  <tr>
                    <td><?= $value->neodata ?></td>
                    <td><?= $value->descripcion ?></td>
                    <td><?= $value->unidad_medida_abr ?></td>
                    <td><?= $value->cantidad ?></td>                    
                    <td><?= $value->entregado ?></td>                    
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <br><br>
            <div data-row-span="4">
              <div data-field-span="2">
                <!-- $this->session->userdata('tipo') == 11 && -->
                <h3 class="h3">Documentos <?php if($this->session->userdata('tipo') == 11 && $detalle[0]->verificacion_archivo == 0 && $detalle[0]->tbl_almacenes_idtbl_almacenes  == 72){ ?> <button id="verificacion_archivo" data-id="<?= $id_almacen_movimientos ?>" style="font-size:14px; margin-left:10px; margin-top: -5px;" class="btn btn-primary">Archivos Verificados</button><?php } ?></h3>
              </div>
              <div data-field-span="2">

              </div>
            </div>
            <ul>
              <?php $carpeta = './uploads/' . $detalle[0]->uid_user . '/asignaciones/' . $detalle[0]->uid_movimiento; ?>
              <?php $scanned_directory = array_diff(scandir($carpeta), array('..', '.')); ?>
              <?php
                try {
                  foreach ($scanned_directory as $key => $value) {
                    echo '<li><a href="/' . $carpeta . '/' . $value . '" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">' . $value . '</a></li>';
                  }
                } catch (Exception $e) {
                }
                ?>
            </ul>
            <?php if($detalle[0]->activo_fijo == 0 && $this->session->userdata('id') != 50){ ?>
              <button class="btn btn-secondary btn-info float-left" id="btnImprimirDiv" tabindex="0">
              <span><i class="fa fa-print"></i> Responsiva</span>
              </button>
            <?php } ?>
          </div>
        </div>
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
                @page{
                    margin: 2cm;
                    size: 8.5in 11in;
                }
                </style>
                <table class="" style="width:100%" border="1" cellpadding="4" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="b_top b_bottom b_left" style="text-align: center" width="20%" rowspan="2">
                                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png"
                                    style="display: inline-block; width: 80px;">
                            </th>
                            <th class="b_top" width="50%" style="vertical-align: middle; text-align: center">
                                ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.
                            </th>
                            <th class="b_top b_right"
                                style="vertical-align: middle; text-align: center; font-size:12px;" width="25%"
                                rowspan="2">
                                <strong>C&oacute;digo: DA-FE-AL-001</strong>
                            </th>
                        </tr>
                        <tr>
                            <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center">
                                Requisición a Almacén
                            </th>
                        </tr>
                    </thead>
                </table>
                <table id="datos_solicitud" style="width: 100%;font-size: 12px;margin-top: 10px;" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>FECHA Y HORA</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= date("d-m-Y h:i:s", strtotime($detalle[0]->fecha)) ?>
                                        </td>
                                        <td class="default-text b_top b_right b_bottom">
                                            <strong>FOLIO</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->uid_movimiento ?>
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
                                        <td class="b_top b_right b_bottom" style="width: 150px;!important"
                                            align="center">
                                            <?= $detalle[0]->numero_proyecto ?>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->nombre_proyecto ?>
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
                                            <?= (empty($detalle[0]->segmento))? $detalle[0]->direccion : $detalle[0]->segmento; ?>
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
                                            <?= $detalle[0]->nombre_autorizacion ?>
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
                                            <?= $detalle[0]->nombre_autor ?>
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
                                            <?= ($detalle[0]->nombrecon != '') ? $detalle[0]->nombrecon : '&nbsp;' ?>
                                        </td>
                                        <td class="default-text b_top b_right b_bottom">
                                            <strong>SUPERVISOR (Interno)</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= ($detalle[0]->nombressu != '') ? $detalle[0]->nombressu . $detalle[0]->paternosu . $detalle[0]->maternosu : '&nbsp;' ?>
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
                                        <?= $detalle[0]->nombres ?> <?= $detalle[0]->apellido_paterno ?> <?= $detalle[0]->apellido_materno ?>
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
                                            <?= $detalle[0]->comentarios ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;margin-top: 15px;" border="1" cellpadding="4" cellspacing="0" align="center">
                    <thead style="font-size: 12px!important;">
                        <tr>
                            <th><strong>CODIGO</strong></th>
                            <th><strong>DESCRIPCION</strong></th>
                            <th width="50px"><strong>UNIDAD</strong></th>
                            <th width="70px"><strong>CANTIDAD</strong></th>
                            <th width="70px"><strong>ENTREGADO</strong></th>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->sitio != NULL && $value->sitio !== '')){ ?>
                            <th width="50px"><strong>SITIO</strong></th>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_serie != NULL && $value->numero_serie !== '')){ ?>
                            <th width="50px"><strong>NUMERO SERIE</strong></th>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_interno != NULL && $value->numero_interno !== '')){ ?>
                            <th width="50px"><strong>NUMERO INTERNO</strong></th>
                            <?php } ?>
                            <th style="min-width: 150px;"><strong>NOTA</strong></th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px!important;" align="center">
                        <?php foreach ($detalle as $key => $value) : ?>
                        <tr>
                            <td><?php echo $value->neodata ?></td>
                            <td><?php echo $value->descripcion ?></td>
                            <td><?php echo $value->unidad_medida_abr ?></td>                            
                            <td><?= $value->cantidad ?></td>
                            <td><?= $value->entregado ?></td>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->sitio != NULL && $value->sitio !== '')){ ?>
                            <td><?= $value->sitio ?></td>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_serie != NULL && $value->numero_serie !== '')){ ?>
                            <td><?= $value->numero_serie ?></td>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_interno != NULL && $value->numero_interno !== '')){ ?>
                            <td><?= $value->numero_interno ?></td>
                            <?php } ?>
                            <td><?= $value->observaciones ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <br>
                <table style="width: 100%;margin-top: 15px;" border="0" cellpadding="4" cellspacing="0" align="center">
                    <tbody style="font-size: 12px!important;" align="center">
                        <tr>
                          <td colspan="2" width="50%" align="center"><img src="<?= base_url() ?>uploads/firmas/solicitudes/<?= $detalle[0]->uid_movimiento ?>7.png"></td>
                          <td colspan="2" width="50%" align="center"><img src="<?= base_url() ?>uploads/firmas/solicitudes/<?= $detalle[0]->uid_movimiento ?>6.png"></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_recibe">Almacen General
                            </td>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_entrega">
                                <?= $solicitud->recibe ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" align="center">Entrega <?= $detalle[0]->fecha ?>
                            </td>
                            <td colspan="2" width="50%" align="center">Recibe <?= $detalle[0]->fecha ?></td>
                        </tr>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
  $("#verificacion_archivo").on("click", function(){
    var id = $(this).data("id");
    $.ajax({
      url: "<?= base_url() ?>almacen/verificacionArchivo",
      type: "post",
      dataType: "json",
      data: {
        id: id
      },
      cache: false,
      complete: function(res) {
        res = res.responseJSON;
        if(res.error == false){
          Toast.fire({
            type: 'success',
            title: res.message
          });
          $('#verificacion_archivo').css("display", "none");
        }else{
          Toast.fire({
            type: 'error',
            title: res.message
          });
        }
      }
    });
  });

  function imprimirElemento(elemento) {
    var printContents = document.getElementById(elemento).innerHTML;
    var ventana = window.open('', 'PRINT', "width=1000,height=800,scrollbars=NO");    
    ventana.document.write('<link rel="stylesheet" href="style.css">'); //Aquí agregué la hoja de estilos
    ventana.document.write('</head><body >');
    ventana.document.write(printContents);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    
  }
  document.querySelector("#btnImprimirDiv").addEventListener("click", function() {
    imprimirElemento('printableArea');
  });
</script>