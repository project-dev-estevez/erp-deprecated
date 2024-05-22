<!-- Large modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>-->
<?php if(isset($prueba_manejo)) { ?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ASIGNACIÓN DE UNIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-checklist-tab" data-toggle="pill" href="#pills-checklist" role="tab" aria-controls="pills-checklist" aria-selected="true">Checklist</a>
          </li>
          <li class="nav-item" id="tab-last-checklist">
            <a class="nav-link" id="pills-last-checklist-tab" data-toggle="pill" href="#pills-last-checklist" role="tab" aria-controls="pills-last-checklist" aria-selected="false">Último Checklist</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-checklist" role="tabpanel" aria-labelledby="pills-checklist-tab">
            
            <?= validation_errors('<span class="error">', '</span>'); ?>
            <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist"'); ?>
            <div class="container-fluid">
              <h6 style="font-weight: normal;">Recibí de ESTEVEZJOR para el desempeño de mis funciones yo, <strong>C.: <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></strong></h6>
              <h6 style="font-weight: normal">el automóvil con las siguientes características</h6>
              <h6 style="font-weight: normal" align="right" class="ecocheck">Eco: <strong></strong></h6>
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                  <table>
                    <tr>
                      <td class="marcacheck">Marca y Tipo: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="modelocheck">Modelo: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="seriecheck">No. de Serie: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="motorcheck">No. de Motor: <strong></strong></td>
                    </tr>
                  </table> 
                </div>
                <div class="col-sm-5">
                  <table>
                    <tr>
                      <td class="placascheck">Placas: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="polizacheck">Póliza: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="vencimientocheck">Vencimiento: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="segurocheck">Seguro: <strong></strong></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <br>
              <div class="form-group row">
                <div class="col-sm-6 text-center">
                  <h6> Nuevo <input type="radio" class="nuevocheck" disabled> Usado <input type="radio" class="usadocheck" disabled></h6>
                </div>
                <label for="inputPassword" class="col-sm-3 col-form-label">Kilometraje Actual: </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="kilometraje" required placeholder="Kilometraje Actual">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <h6 style="font-weight: normal;" class="text-center">Presentó Licencia: <strong><?= count($prueba_manejo) == 0 ? 'NO' : 'SI' ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Localidad Licencia: <strong><?= $prueba_manejo[0]['localidad_licencia'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Tipo: <strong><?= $prueba_manejo[0]['tipo_licencia'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Vigencia: <strong><?= $prueba_manejo[0]['vigencia_licencia'] ?></strong></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div style="text-align: center;">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        <tr>
                          <th></th>
                          <th>SI</th>
                          <th>NO</th>
                          <th>ESTADO</th>
                        </tr>
                        <tr>
                          <td><input type="text" name="t1" value="Alarma" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r1"></td>
                          <td><input value="no" required type="radio" name="r1"></td>
                          <td><input class="form-control" type="text" name="e1"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t2" value="1 o 2 controles (alarma)" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r2"></td>
                          <td><input value="no" required type="radio" name="r2"></td>
                          <td><input class="form-control" type="text" name="e2"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t3" value="Ceniceros" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r3"></td>
                          <td><input value="no" required type="radio" name="r3"></td>
                          <td><input class="form-control" type="text" name="e3"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t4" value="Encendedor" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r4"></td>
                          <td><input value="no" required type="radio" name="r4"></td>
                          <td><input class="form-control" type="text" name="e4"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t5" value="Antena" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r5"></td>
                          <td><input value="no" required type="radio" name="r5"></td>
                          <td><input class="form-control" type="text" name="e5"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t6" value="Limpiadores" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r6"></td>
                          <td><input value="no" required type="radio" name="r6"></td>
                          <td><input class="form-control" type="text" name="e6"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t7" value="Juego de Llaves" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r7"></td>
                          <td><input value="no" required type="radio" name="r7"></td>
                          <td><input class="form-control" type="text" name="e7"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t8" value="Aire Acondicionado" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r8"></td>
                          <td><input value="no" required type="radio" name="r8"></td>
                          <td><input class="form-control" type="text" name="e8"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t9" value="Autoestereo" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r9"></td>
                          <td><input value="no" required type="radio" name="r9"></td>
                          <td><input class="form-control" type="text" name="e9"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t10" value="1,2,4 bocinas del radio" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r10"></td>
                          <td><input value="no" required type="radio" name="r10"></td>
                          <td><input class="form-control" type="text" name="e10"></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div style="text-align: center;">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        <tr>
                          <th></th>
                          <th>SI</th>
                          <th>NO</th>
                          <th>ESTADO</th>
                        </tr>
                        <tr>
                          <td><input type="text" name="t11" value="Gato" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r11"></td>
                          <td><input value="no" required type="radio" name="r11"></td>
                          <td><input class="form-control" type="text" name="e11"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t12" value="Llave de tuercas" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r12"></td>
                          <td><input value="no" required type="radio" name="r12"></td>
                          <td><input class="form-control" type="text" name="e12"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t13" value="Llanta de refacción" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r13"></td>
                          <td><input value="no" required type="radio" name="r13"></td>
                          <td><input class="form-control" type="text" name="e13"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t14" value="Herramienta" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r14"></td>
                          <td><input value="no" required type="radio" name="r14"></td>
                          <td><input class="form-control" type="text" name="e14"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t15" value="Extintor" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r15"></td>
                          <td><input value="no" required type="radio" name="r15"></td>
                          <td><input class="form-control" type="text" name="e15"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t16" value="Bastón de seguridad" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r16"></td>
                          <td><input value="no" required type="radio" name="r16"></td>
                          <td><input class="form-control" type="text" name="e16"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t17" value="Seguros de ruedas" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r17"></td>
                          <td><input value="no" required type="radio" name="r17"></td>
                          <td><input class="form-control" type="text" name="e17"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t18" value="4 Tapones de ruedas" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r18"></td>
                          <td><input value="no" required type="radio" name="r18"></td>
                          <td><input class="form-control" type="text" name="e18"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t19" value="Fantasmas" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r19"></td>
                          <td><input value="no" required type="radio" name="r19"></td>
                          <td><input class="form-control" type="text" name="e19"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t20" value="Retrovisor" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r20"></td>
                          <td><input value="no" required type="radio" name="r20"></td>
                          <td><input class="form-control" type="text" name="e20"></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div style="text-align: center;">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        <tr>
                          <th></th>
                          <th>SI</th>
                          <th>NO</th>
                          <th>ESTADO</th>
                        </tr>
                        <tr>
                          <td><input type="text" name="t21" value="Parabrisas" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r21"></td>
                          <td><input value="no" required type="radio" name="r21"></td>
                          <td><input class="form-control" type="text" name="e21"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t22" value="Medallón" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r22"></td>
                          <td><input value="no" required type="radio" name="r22"></td>
                          <td><input class="form-control" type="text" name="e22"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t23" value="Ventanas" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r23"></td>
                          <td><input value="no" required type="radio" name="r23"></td>
                          <td><input class="form-control" type="text" name="e23"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t24" value="Defensas" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r24"></td>
                          <td><input value="no" required type="radio" name="r24"></td>
                          <td><input class="form-control" type="text" name="e24"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t25" value="Calaveras y faros" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r25"></td>
                          <td><input value="no" required type="radio" name="r25"></td>
                          <td><input class="form-control" type="text" name="e25"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t26" value="Póliza de seguro" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r26"></td>
                          <td><input value="no" required type="radio" name="r26"></td>
                          <td><input class="form-control" type="text" name="e26"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t27" value="M. Mantenimiento" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r27"></td>
                          <td><input value="no" required type="radio" name="r27"></td>
                          <td><input class="form-control" type="text" name="e27"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t28" value="Asientos" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r28"></td>
                          <td><input value="no" required type="radio" name="r28"></td>
                          <td><input class="form-control" type="text" name="e28"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t29" value="4 o 2 tapetes" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r29"></td>
                          <td><input value="no" required type="radio" name="r29"></td>
                          <td><input class="form-control" type="text" name="e29"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="t30" value="1 o 2 espejos laterales" class="form-control"></td>
                          <td><input value="si" required type="radio" name="r30"></td>
                          <td><input value="no" required type="radio" name="r30"></td>
                          <td><input class="form-control" type="text" name="e30"></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <h6 style="text-align: center;">ESTADO GENERAL DE LA CARROCERÍA</h6>
          
              <center>
                <div id="auto_comparacion1">
                  
                </div>
                <canvas width="280" height="220" id="draw-canvas">
                  No tienes un buen navegador.
                </canvas>
                <br>
                <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn"><i class="fa fa-ban"></i> Crear Imagen</button>
                <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn"><i class="fa fa-trash"></i> Borrar</button>
                <div>
                  <br>
                  <label>Color</label>
                  <input type="color" id="color">
                  <label>Tamaño Puntero</label>
                  <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                </div>
                <textarea style="display: none;" id="draw-dataUrl" name="imagen" class="form-control" rows="5"></textarea>
                <img style="display: none" id="draw-image" src="" alt="Tu Imagen aparecera Aqui!"/>
              </center>

              <center>
                <div id="auto_comparacion2">
                  
                </div>
                <canvas id="draw-canvas2" width="280" height="220">
                  No tienes un buen navegador.
                </canvas>
                <br>
                <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn2"><i class="fa fa-ban"></i> Crear Imagen</button>
                <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn2"><i class="fa fa-trash"></i> Borrar</button>
                <div>
                  <label>Color</label>
                  <input type="color" id="color2">
                  <label>Tamaño Puntero</label>
                  <input type="range" id="puntero2" min="1" default="1" max="5" width="10%">
                </div>
                <textarea style="display: none;" id="draw-dataUrl2" name="imagen2" class="form-control" rows="5"></textarea>
                <img style="display: none" id="draw-image2" src="" alt="Tu Imagen aparecera Aqui!"/>
              </center>

              <center>
                <div id="auto_comparacion3">
                  
                </div>
                <canvas id="draw-canvas3" width="280" height="220">
                  No tienes un buen navegador.
                </canvas>
                <br>
                <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn3"><i class="fa fa-ban"></i> Crear Imagen</button>
                <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn3"><i class="fa fa-trash"></i> Borrar</button>
                <div>
                  <label>Color</label>
                  <input type="color" id="color3">
                  <label>Tamaño Puntero</label>
                  <input type="range" id="puntero3" min="1" default="1" max="5" width="10%">
                </div>
                <textarea style="display: none;" id="draw-dataUrl3" name="imagen3" class="form-control" rows="5"></textarea>
                <img style="display: none" id="draw-image3" src="" alt="Tu Imagen aparecera Aqui!"/>
              </center>
              <div class="row">
                <table class="table table-responsive" style="margin:40px 0px;">
                  <tr>
                    <th>Perfil Frontal</th>
                    <th>Perfil Trasero</th>
                  </tr>
                  <tr>
                    <td><input type="file" name="perfil_frontal"></td>
                    <td><input type="file" name="perfil_trasero"></td>
                  </tr>
                  <tr>
                    <th>Perfil Lateral Izquierdo</th>
                    <th>Perfil Lateral Derecho</th>
                  </tr>
                  <tr>
                    <td><input type="file" name="perfil_lateral_izquierdo"></td>
                    <td><input type="file" name="perfil_lateral_derecho"></td>
                  </tr>
                </table>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-12">
                  <label>Observaciones</label>
                  <textarea class="form-control" name="observaciones" placeholder="Observaciones"></textarea>
                </div>
              </div>
              <br>
              <div>
                <h6>NOTA: EL VEHICULO SE ENTREGA&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="limpio" name="condicion_unidad" required> &nbsp;<span class="label-check" style="font-size: 13px;">LIMPIO</span>&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" value="sucio" name="condicion_unidad" required> &nbsp;<span class="label-check" style="font-size: 13px;">SUCIO</span>&nbsp;&nbsp;&nbsp;&nbsp;EN CASO DE ENTREGAR SUCIA UNIDAD TENDRÁ UN COSTO DE $150.00</h6>
              </div>
              <br>
              <h6 style="font-weight: normal;">Yo <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?> me comprometo a:</h6>
              <p>
                1) Cuidar y conservar la Unidad en las mejores condiciones de operación y apariencia, para lo cual cumpliré con los servicios especificados en el manual del propietario y en la   póliza de garantía teniendo presente la imagen de la unidad y de ESTEVEZJOR SERVICIOS S.A. DE C.V
              </p>
              <p>
                2) Usar el cinturón de seguridad en todo momento, así como también los ocupantes que viajen en la unidad
              </p>
              <p>
                3) Pagar los montos de los deducibles del seguro del vehículo en caso de siniestro cuando el incidente sea debido a mi descuido via nomina
              </p>
              <p>
                4) Pagar los daños que sufra el vehículo y que no están considerados en la cobertura del seguro tales como robos parciales, actos vandálicos y aquellos que impliquen compostura al vehiculo a fin de cumplir con el punto No. 1 de esta carta
              </p>
              <p>
                5) Pagar las multas que se originen por incumplimiento de reglamento de transito, ecología o cualquier otro de carácter municipal, estatal o federal por incumpliento a las leyes de transito vigente 
              </p>
              <p>
                6) Notificar al departamento de Crontol de Vehículos por escrito si hubiere algún cambio que me desligue de toda responsabilidad del vehículo en mi custodia. Sino lo hiciera así me comprometo a pagar o responder jurídicamente cualquier hecho que se presente con la unidad a mi cargo
              </p>
              <p>
                7) Cualquier situación no contemplada en el presente formato, será comentada y autorizada por el Gerente del Area o Dirección General
              </p>
              <p>
                8) Cumplir con las políticas revision y mantenimiento establecidas por ESTEVEZJOR SERVICIOS S.A C.V
              </p>
              <br>
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table table-sm" width="100%">
                      <tr>
                        <td></td>
                        <td>
                          <center>
                            <canvas id="draw-canvas4" width="240" style="border-bottom-style: solid;">
                              No tienes un buen navegador.
                            </canvas>
                            <br>
                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-warning btn-sm" id="draw-submitBtn4"><i style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-danger btn-sm" id="draw-clearBtn4"><i style="font-size: 8px;" class="fa fa-trash"></i> Borrar Firma</button>
                            <div style="display: none">
                              <label>Color</label>
                              <input type="color" id="color4">
                              <label>Tamaño Puntero</label>
                              <input type="range" id="puntero4" min="1" default="1" max="5" width="10%">
                            </div>
                            <textarea style="display: none;" id="draw-dataUrl4" name="imagen4" class="form-control" rows="5"></textarea>
                            <img style="display: none" id="draw-image4" src="" alt="Tu Imagen aparecera Aqui!"/>
                          </center>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="text-center">ME COMPROMETO Y ACEPTO LO ANTERIOR</td>
                        <td class="text-center"><?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
                        <td class="text-center"><?= date('Y-m-d') ?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)</td>
                        <td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <center>
                            <canvas id="draw-canvas5" width="240" style="border-bottom-style: solid;">
                              No tienes un buen navegador.
                            </canvas>
                            <br>
                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-warning btn-sm" id="draw-submitBtn5"><i style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                            <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-danger btn-sm" id="draw-clearBtn5"><i style="font-size: 8px;" class="fa fa-trash"></i> Borrar Firma</button>
                            <div style="display: none">
                              <label>Color</label>
                              <input type="color" id="color5">
                              <label>Tamaño Puntero</label>
                              <input type="range" id="puntero5" min="1" default="1" max="5" width="10%">
                            </div>
                            <textarea style="display: none;" id="draw-dataUrl5" name="imagen5" class="form-control" rows="5"></textarea>
                            <img style="display: none" id="draw-image5" src="" alt="Tu Imagen aparecera Aqui!"/>
                          </center>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="text-center">VEHICULO ENTRGADO POR</td>
                        <td class="text-center"><?= $this->session->userdata('nombre') ?></td>
                        <td class="text-center"><?= date('Y-m-d') ?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)</td>
                        <td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <input type="hidden" name="uid_asignacion" value="<?php echo $uid_asignacion ?>">
                <input type="hidden" name="uid_usuario" value="<?php echo $uid_usuario ?>">
                <input type="hidden" id="idtbl_catalogo" name="idtbl_catalogo">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary" value="Guardar">
              </div>
              <?=form_close()?>

            </div>

          </div>
          <div class="tab-pane fade" id="pills-last-checklist" role="tabpanel" aria-labelledby="pills-last-checklist-tab">
            
            <form id="form-last-checklist">
            <div class="container-fluid">
              <h6 style="font-weight: normal;">Recibí de ESTEVEZJOR para el desempeño de mis funciones yo, <strong>C.: <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></strong></h6>
              <h6 style="font-weight: normal">el automóvil con las siguientes características</h6>
              <h6 style="font-weight: normal" align="right" class="ecocheck">Eco: <strong></strong></h6>
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                  <table>
                    <tr>
                      <td class="marcacheck">Marca y Tipo: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="modelocheck">Modelo: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="seriecheck">No. de Serie: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="motorcheck">No. de Motor: <strong></strong></td>
                    </tr>
                  </table> 
                </div>
                <div class="col-sm-5">
                  <table>
                    <tr>
                      <td class="placascheck">Placas: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="polizacheck">Póliza: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="vencimientocheck">Vencimiento: <strong></strong></td>
                    </tr>
                    <tr>
                      <td class="segurocheck">Seguro: <strong></strong></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <br>
              <div class="form-group row">
                <div class="col-sm-6 text-center">
                  <h6> Nuevo <input type="radio" class="nuevocheck" disabled> Usado <input type="radio" class="usadocheck" disabled></h6>
                </div>
                <label for="inputPassword" class="col-sm-3 col-form-label">Kilometraje Actual: </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control kilometraje" disabled name="kilometraje" required placeholder="Kilometraje Actual">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <h6 style="font-weight: normal;" class="text-center">Presentó Licencia: <strong><?= count($prueba_manejo) == 0 ? 'NO' : 'SI' ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Localidad Licencia: <strong><?= $prueba_manejo[0]['localidad_licencia'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Tipo: <strong><?= $prueba_manejo[0]['tipo_licencia'] ?></strong> &nbsp;&nbsp;&nbsp;&nbsp; Vigencia: <strong><?= $prueba_manejo[0]['vigencia_licencia'] ?></strong></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div style="text-align: center;">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        <tr>
                          <th></th>
                          <th>SI</th>
                          <th>NO</th>
                          <th>ESTADO</th>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt1"></td>
                          <td><input required type="radio" disabled class="rr1" name="rr1"></td>
                          <td><input required type="radio" disabled class="rrr1" name="rr1"></td>
                          <td><input class="form-control ee1" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt2"></td>
                          <td><input value="si" required disabled type="radio" class="rr2" name="rr2"></td>
                          <td><input value="no" required disabled type="radio" class="rrr2" name="rr2"></td>
                          <td><input class="form-control ee2" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt3"></td>
                          <td><input required type="radio" disabled class="rr3" name="rr3"></td>
                          <td><input required type="radio" disabled class="rrr3" name="rr3"></td>
                          <td><input class="form-control ee3" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt4"></td>
                          <td><input required type="radio" disabled class="rr4" name="rr4"></td>
                          <td><input required type="radio" disabled class="rrr4" name="rr4"></td>
                          <td><input class="form-control ee4" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt5"></td>
                          <td><input required type="radio" disabled class="rr5" name="rr5"></td>
                          <td><input required type="radio" disabled class="rrr5" name="rr5"></td>
                          <td><input class="form-control ee5" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt6"></td>
                          <td><input required type="radio" disabled class="rr6" name="rr6"></td>
                          <td><input required type="radio" disabled class="rrr6" name="rr6"></td>
                          <td><input class="form-control ee6" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt7"></td>
                          <td><input required type="radio" disabled class="rr7" name="rr7"></td>
                          <td><input required type="radio" disabled class="rrr7" name="rr7"></td>
                          <td><input class="form-control ee7" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt8"></td>
                          <td><input required type="radio" disabled class="rr8" name="rr8"></td>
                          <td><input required type="radio" disabled class="rrr8" name="rr8"></td>
                          <td><input class="form-control ee8" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt9"></td>
                          <td><input required type="radio" disabled class="rr9" name="rr9"></td>
                          <td><input required type="radio" disabled class="rrr9" name="rr9"></td>
                          <td><input class="form-control ee9" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt10"></td>
                          <td><input required type="radio" disabled class="rr10" name="rr10"></td>
                          <td><input required type="radio" disabled class="rrr10" name="rr10"></td>
                          <td><input class="form-control ee10" disabled type="text"></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div style="text-align: center;">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        <tr>
                          <th></th>
                          <th>SI</th>
                          <th>NO</th>
                          <th>ESTADO</th>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt11"></td>
                          <td><input required type="radio" disabled class="rr11" name="rr11"></td>
                          <td><input required type="radio" disabled class="rrr11" name="rr11"></td>
                          <td><input class="form-control ee11" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt12"></td>
                          <td><input required type="radio" disabled class="rr12" name="rr12"></td>
                          <td><input required type="radio" disabled class="rrr12" name="rr12"></td>
                          <td><input class="form-control ee12" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt13"></td>
                          <td><input required type="radio" disabled class="rr13" name="rr13"></td>
                          <td><input required type="radio" disabled class="rrr13" name="rr13"></td>
                          <td><input class="form-control ee13" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt14"></td>
                          <td><input required type="radio" disabled class="rr14" name="rr14"></td>
                          <td><input required type="radio" disabled class="rrr14" name="rr14"></td>
                          <td><input class="form-control ee14" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt15"></td>
                          <td><input required type="radio" disabled class="rr15" name="rr15"></td>
                          <td><input required type="radio" disabled class="rrr15" name="rr15"></td>
                          <td><input class="form-control ee15" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt16"></td>
                          <td><input required type="radio" disabled class="rr16" name="rr16"></td>
                          <td><input required type="radio" disabled class="rrr16" name="rr16"></td>
                          <td><input class="form-control ee16" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt17"></td>
                          <td><input required type="radio" disabled class="rr17" name="rr17"></td>
                          <td><input required type="radio" disabled class="rrr17" name="rr17"></td>
                          <td><input class="form-control ee17" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt18"></td>
                          <td><input required type="radio" disabled class="rr18" name="rr18"></td>
                          <td><input required type="radio" disabled class="rrr18" name="rr18"></td>
                          <td><input class="form-control ee18" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt19"></td>
                          <td><input required type="radio" disabled class="rr19" name="rr19"></td>
                          <td><input required type="radio" disabled class="rrr19" name="rr19"></td>
                          <td><input class="form-control ee19" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt20"></td>
                          <td><input required type="radio" disabled class="rr20" name="rr20"></td>
                          <td><input required type="radio" disabled class="rrr20" name="rr20"></td>
                          <td><input class="form-control ee20" disabled type="text"></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div style="text-align: center;">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped">
                        <tr>
                          <th></th>
                          <th>SI</th>
                          <th>NO</th>
                          <th>ESTADO</th>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt21"></td>
                          <td><input required type="radio" disabled class="rr21" name="rr21"></td>
                          <td><input required type="radio" disabled class="rrr21" name="rr21"></td>
                          <td><input class="form-control ee21" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt22"></td>
                          <td><input required type="radio" disabled class="rr22" name="rr22"></td>
                          <td><input required type="radio" disabled class="rrr22" name="rr22"></td>
                          <td><input class="form-control ee22" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt23"></td>
                          <td><input required type="radio" disabled class="rr23" name="rr23"></td>
                          <td><input required type="radio" disabled class="rrr23" name="rr23"></td>
                          <td><input class="form-control ee23" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt24"></td>
                          <td><input required type="radio" disabled class="rr24" name="rr24"></td>
                          <td><input required type="radio" disabled class="rrr24" name="rr24"></td>
                          <td><input class="form-control ee24" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt25"></td>
                          <td><input required type="radio" disabled class="rr25" name="rr25"></td>
                          <td><input required type="radio" disabled class="rrr25" name="rr25"></td>
                          <td><input class="form-control ee25" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt26"></td>
                          <td><input required type="radio" disabled class="rr26" name="rr26"></td>
                          <td><input required type="radio" disabled class="rrr26" name="rr26"></td>
                          <td><input class="form-control ee26" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt27"></td>
                          <td><input required type="radio" disabled class="rr27" name="rr27"></td>
                          <td><input required type="radio" disabled class="rrr27" name="rr27"></td>
                          <td><input class="form-control ee27" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt28"></td>
                          <td><input required type="radio" disabled class="rr28" name="rr28"></td>
                          <td><input required type="radio" disabled class="rrr28" name="rr28"></td>
                          <td><input class="form-control ee28" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt29"></td>
                          <td><input required type="radio" disabled class="rr29" name="rr29"></td>
                          <td><input required type="radio" disabled class="rrr29" name="rr29"></td>
                          <td><input class="form-control ee29" disabled type="text"></td>
                        </tr>
                        <tr>
                          <td><input type="text" disabled class="form-control tt30"></td>
                          <td><input required type="radio" disabled class="rr30" name="rr30"></td>
                          <td><input required type="radio" disabled class="rrr30" name="rr30"></td>
                          <td><input class="form-control ee30" disabled type="text"></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <h6 style="text-align: center;">ESTADO GENERAL DE LA CARROCERÍA</h6>
          
              <center>
                <div id="imagen1">
                  
                </div>
              </center>

              <center>
                <div id="imagen2">
                  
                </div>
              </center>

              <center>
                <div id="imagen3">
                  
                </div>
              </center>
              <br>
              <div class="row">
                <div class="col-sm-12">
                  <label>Observaciones</label>
                  <textarea class="form-control observaciones" disabled name="observaciones" placeholder="Observaciones"></textarea>
                </div>
              </div>
              <br>
              <div>
                <h6>NOTA: EL VEHICULO SE ENTREGA&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="limpio" disabled value="limpio" name="condicion_unidad" required> &nbsp;<span class="label-check" style="font-size: 13px;">LIMPIO</span>&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" value="sucio" class="sucio" name="condicion_unidad" disabled required> &nbsp;<span class="label-check" style="font-size: 13px;">SUCIO</span>&nbsp;&nbsp;&nbsp;&nbsp;EN CASO DE ENTREGAR SUCIA UNIDAD TENDRÁ UN COSTO DE $150.00</h6>
              </div>
              <br>
              <h6 style="font-weight: normal;">Yo <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?> me comprometo a:</h6>
              <p>
                1) Cuidar y conservar la Unidad en las mejores condiciones de operación y apariencia, para lo cual cumpliré con los servicios especificados en el manual del propietario y en la   póliza de garantía teniendo presente la imagen de la unidad y de ESTEVEZJOR SERVICIOS S.A. DE C.V
              </p>
              <p>
                2) Usar el cinturón de seguridad en todo momento, así como también los ocupantes que viajen en la unidad
              </p>
              <p>
                3) Pagar los montos de los deducibles del seguro del vehículo en caso de siniestro cuando el incidente sea debido a mi descuido via nomina
              </p>
              <p>
                4) Pagar los daños que sufra el vehículo y que no están considerados en la cobertura del seguro tales como robos parciales, actos vandálicos y aquellos que impliquen compostura al vehiculo a fin de cumplir con el punto No. 1 de esta carta
              </p>
              <p>
                5) Pagar las multas que se originen por incumplimiento de reglamento de transito, ecología o cualquier otro de carácter municipal, estatal o federal por incumpliento a las leyes de transito vigente 
              </p>
              <p>
                6) Notificar al departamento de Crontol de Vehículos por escrito si hubiere algún cambio que me desligue de toda responsabilidad del vehículo en mi custodia. Sino lo hiciera así me comprometo a pagar o responder jurídicamente cualquier hecho que se presente con la unidad a mi cargo
              </p>
              <p>
                7) Cualquier situación no contemplada en el presente formato, será comentada y autorizada por el Gerente del Area o Dirección General
              </p>
              <p>
                8) Cumplir con las políticas revision y mantenimiento establecidas por ESTEVEZJOR SERVICIOS S.A C.V
              </p>
              <br>
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table table-sm" width="100%">
                      <tr>
                        <td></td>
                        <td>
                          <center>
                            <div id="imagen4">
                              
                            </div>
                          </center>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="text-center">ME COMPROMETO Y ACEPTO LO ANTERIOR</td>
                        <td class="text-center" id="usuario"></td>
                        <td class="text-center fecha"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)</td>
                        <td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <center>
                            <div id="imagen5">
                              
                            </div>
                          </center>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="text-center">VEHICULO ENTRGADO POR</td>
                        <td class="text-center" id="user"></td>
                        <td class="text-center fecha"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)</td>
                        <td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </form>

          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<?php } ?>
<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nueva Asignación / <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?> (Número Empleado <?php echo $detalle->numero_empleado ?>) / <?php echo $detalle->tbl_proyectos_idtbl_proyectos != NULL ? $detalle->nombre_proyecto : "Sin proyecto" ?> / <span class="text-danger">Folio <?php echo $folio ?></span></h3>
      </div>
      <div class="card-body">
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
        </div>
        <?= validation_errors('<span class="error">', '</span>'); ?>
        <div class="table-responsive">
        <table id="tabla" class="table table-striped table-sm table-hover" style="width:100%">
          <thead>
            <tr>
              <th data-priority="1">Código</th>                
              <th>Marca</th>
              <th>Modelo</th>
              <th data-priority="2">Descripción</th>
              <th>Serie</th>
              <th>N° Interno</th>
              <th>Unidad</th>
              <th title="Categoría">Categoría</th>
              <th data-priority="3">Nota</th>
              <th></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Código</th>                
              <th>Marca</th>
              <th>Modelo</th>
              <th>Descripción</th>
              <th>Serie</th>
              <th>N° Interno</th>
              <th>Unidad</th>
              <th title="Categoría">Categoría</th>
              <th>Nota</th>
              <th></th> 
            </tr>
          </tfoot>
          <tbody>
            
          </tbody>
        </table>
        </div>
        <br>
        <div class="paginacion">

        </div>
        <br><br>
        <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-asignacion"'); ?>
        <div class="row">
          <!--<div class="col-12 col-md-6">
            <div class="form-group">
              <label for="documentoInput">Documento Solicitud de Almacén*</label>
              <input type="file" class="filestyle pull-left" name='solicitud' required accept=".pdf">
            </div>
          </div>-->
          <?php if ($tipo=='hilti'): ?>
            <div class="col-12">
              <div class="form-group">
                <label for="documentoInput">Documento Salida de Material*</label>
                <input type="file" class="filestyle pull-left" name='salida-almacen' required accept=".pdf">
              </div>
            </div>
          <?php endif ?>
          <?php if ($tipo=='alto-costo' || $tipo == 'sistemas' || $tipo == 'tarjetas'): ?>
            <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="documentoInput">Contrato*</label>
                <input type="file" class="filestyle pull-left" name='contrato' required accept=".pdf">
              </div>
            </div>
            
            <?php if($this->session->userdata('tipo') == 2){ ?>
              <div class="col-6">
              <center>
                <div id="auto_comparacion1">
                  
                </div>
                <canvas width="280" height="220" id="draw-canvas">
                  No tienes un buen navegador.
                </canvas>
                <br>
                <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn"><i class="fa fa-ban"></i> Crear Imagen</button>
                <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn"><i class="fa fa-trash"></i> Borrar</button>
                <div>
                  <br>
                  <label>Color</label>
                  <input type="color" id="color">
                  <label>Tamaño Puntero</label>
                  <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                </div>
                <textarea style="display: none;" id="draw-dataUrl" name="imagen" class="form-control" rows="5"></textarea>                
              </center>
              </div>

              <div class="col-6">
              <center>
                <div id="auto_comparacion2">
                  
                </div>
                <canvas id="draw-canvas2" width="280" height="220">
                  No tienes un buen navegador.
                </canvas>
                <br>
                <button type="button" class="btn btn-warning btn-sm" id="draw-submitBtn2"><i class="fa fa-ban"></i> Crear Imagen</button>
                <button type="button" class="btn btn-danger btn-sm" id="draw-clearBtn2"><i class="fa fa-trash"></i> Borrar</button>
                <div>
                  <label>Color</label>
                  <input type="color" id="color2">
                  <label>Tamaño Puntero</label>
                  <input type="range" id="puntero2" min="1" default="1" max="5" width="10%">
                </div>
                <textarea style="display: none;" id="draw-dataUrl2" name="imagen2" class="form-control" rows="5"></textarea>
                
              </center>   
              </div>           
              <?php } ?>
              </div>
          <?php endif ?>
          <?php if ($tipo=='control-vehicular'): ?>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="documentoInput">Contrato*</label>
                <input type="file" class="filestyle pull-left" name='contrato' required accept=".pdf">
              </div>
            </div>
          <?php endif ?>
          <?php if ($tipo=='material' || $tipo=='herramienta'): ?>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="documentoInput">Responsiva*</label>
                <input type="file" class="filestyle pull-left" name='responsiva' required accept=".pdf">
              </div>
            </div>
          <?php endif ?>
          <div class="col-12">
            <div class="form-group">
              <label for="documentoInput">Observaciones</label>
              <textarea class="form-control" rows="5" name="observaciones" id="observacion"></textarea>
            </div>
          </div>
          <br><br>
        </div>
        <div class="text-right">
          <input type="hidden" name="bandera" id="bandera" value="false">
          <input type="hidden" name="banderaChecklist" id="banderaChecklist" value="false">
          <input type="hidden" name="uid_usuario" value="<?php echo $uid_usuario ?>">
          <input type="hidden" name="token" value="<?php echo $token ?>">
          <input type="hidden" name="uid_asignacion" value="<?php echo $uid_asignacion ?>">
          <input type="hidden" name="proyecto" value="<?= $detalle->tbl_proyectos_idtbl_proyectos ?>">
          <input type="hidden" name="tipo" value="<?= $tipo ?>">
          <a href="<?php echo base_url().'personal/detalle/'.$uid_usuario ?>" class="btn-warning btn">Regresar</a>
          
          <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Asignación</button>
        
          <button type="button" class="btn-primary btn" id="generar-documentos">Generar documentos</button>
          <?php if($this->session->userdata('tipo') == 3 && $tipo != 'tarjetas') { ?>
            <button type="button" class="btn btn-secondary" id="generar-checklist">Generar CheckList</button>
          <?php } ?>
          <input type="submit" class="btn-info btn" value="Asignar">
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="cancelarModal" tabindex="-1" role="dialog" aria-labelledby="vacacionesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vacacionesLabel">Cancelar asignación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart('almacen/cancelar-asignacion', 'class="needs-validation" novalidate id="formuploadajax-cancel-asignacion"'); ?>
          <div class="form-group">
            <label>Comentarios</label>
            <textarea name="comentarios" class="form-control" rows="5"></textarea>
          </div>
          <br>          
          <input type="hidden" id="token" name="token" value="<?= $token ?>">
          <input type="hidden" id="folio" name="folio" value="<?= $folio ?>">          
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" id="btnCancel" class="btn btn-primary ladda-button" data-style="expand-right">Aceptar</button>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?= base_url()?>js/bootstrap-filestyle.js"></script>
<script>
  $('.filestyle').filestyle({
    text : '&nbsp;Documento',
    btnClass : 'btn-outline-info',
  });
</script>
<?php if ($tipo=='hilti'): ?>
  <script>
    $(document).ready(function() {
      
      $('#generar-documentos').click(function(event) {
        Swal.fire({
          title: '¡Atención!',
          text: "¿Desea generar documentos con la información actual?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar'
        })
        .then((result) => {
          if (result.value) {
            if($('#table_hilti tr').length>1) {
              $('#bandera').val('true');
              $("#salida_material").print({
                iframe : true,
                globalStyles: true,
                mediaPrint: true,
                noPrintSelector :'.no-print'
              });
            } else {
              Toast.fire({
                type: 'error',
                title: 'Seleccione al menos un item de la lista.'
              })
            }
          }
        })
      });
      $("#form-asignacion").on("submit", function(event){
        var $form = $(this);
        var submitButton = $form.find('input[type="submit"]');
        if($('#bandera').val()=='true') {
          var f = $(this);
          if (event.isDefaultPrevented()) {
            console.log('Error')
          } else {
            if($form[0].checkValidity())
              submitButton.prop("disabled", "true");
            event.preventDefault();
            var formData = new FormData(document.getElementById("form-asignacion"));
            $.ajax({
              url: "<?= base_url()?>almacen/guardar-asignacion-hilti",
              type: "post",
              dataType: "json",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if(resp.status){
                  location.href ="<?php echo base_url().'personal/detalle/'.$uid_usuario ?>";
                } else {
                  Toast.fire({
                    type: 'error',
                    title: resp.message
                  });
                  submitButton.prop("disabled", "false");
                }
              }
            });
          }
        } else {
          event.preventDefault();
          Toast.fire({
            type: 'error',
            title: 'Debe generar los documentos para ser adjuntados.'
          })
        }
      });

      $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar,1);
      });

      $("body").on("click",".paginacion li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar,valorHref);
      });

      function mostrarDatos(valorBuscar, pagina){
        $.ajax({
          url: "<?= base_url() ?>almacen/continuar_asignacion_paginacion",
          type: "POST",
          data: {
            buscar:valorBuscar,
            nropagina:pagina,
            uid_asignacion:'<?= $uid_asignacion ?>',
            uid_usuario:'<?= $uid_usuario ?>'
          },
          dataType: "json",
          success:function(response) {
            console.log(response);
            filas = "";
            $.each(response.inventario_almacen,function(key,item) {
              var imagenes = JSON.parse(item.imagenes); 
              filas += "<tr><td>" + item.uid + "</td><td>" + item.marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion + "</td><td>" + item.numero_serie + "</td><td>" + item.numero_interno + "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td><td title='" + item.categoria + "'>" + item.abreviatura + "</td><td>" + item.nota + "</td><td><input class='asignacion' type='checkbox' name='asignacion[]' data-marca='" + item.marca + "' data-modelo='" + item.modelo + "' data-categoria='" + item.categoria + "' data-estado='" + item.estado + "' data-precio='" + item.precio + "' data-descripcion='" + item.descripcion + "' data-numero='" + item.numero_interno + "' data-serie='" + item.numero_serie + "' data-uid='" + item.uid + "' value='" + item.iddtl_almacen + "'></td></tr>";
            });
            $('#tabla tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.count;
            
            //cantidad de registros por página
            cantidadRegistros = 10;

            numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            
            if(linkSeleccionado > 1) {
              paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
              paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
            }
            else {
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if(numeroLinks > cant) {
              pagRestantes = numeroLinks - linkSeleccionado;
              pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            }
            else {
              pagFin = numeroLinks;
            }
            for(var i = pagInicio; i <= pagFin; i++) {
              if(i == linkSeleccionado) {
                paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
              }
              else {
                paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
              }
            }
            if(linkSeleccionado < numeroLinks) {
              paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
              paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
            }
            else {
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion").html(paginador);
            $('.asignacion').change(function(event) {
              if (this.checked) {
                $('#table_hilti tr:last').after('<tr id="'+this.value+'"><td>1</td><td>'+$(this).data('descripcion')+' '+$(this).data('marca')+' '+$(this).data('modelo')+'</td><td>Serie: '+$(this).data('serie')+', ID: '+$(this).data('numero')+'</td></tr>');  
                $("#form-asignacion").append(
                  $('<input>')
                  .attr('type', 'hidden')
                  .attr('id', $(this).data('uid'))
                  .attr('name', 'asignacion[]')
                  .val(this.value)
                )
              } else {
                $('#'+this.value).remove(); 
                $('#'+$(this).data('uid')).remove(); 
              }
            });
          }
        });
      }
      mostrarDatos("", 1);

    });
  </script>
  <style type="text/css" media="print">
    @media print {
      #salida_material{
        padding-top: 0;
      }
      body{
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
      }
    }
  </style>
  <div class="container-fluid">
    <div class="card" id="salida_material" >
      <table width="100%" class="table table-bordered">
        <thead>
          <tr>
            <th style="text-align: center" width="25%"><img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 150px;"></th>
            <th colspan="2" width="50%" style="vertical-align: middle; text-align: center"><h3>ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.</h3></th>
            <th style="vertical-align: middle; text-align: center" width="25%"><h3>Folio: <?php echo $folio ?></h3></th>
          </tr> 
          <tr>
            <th colspan="4" style="text-align: center"><h4>Salida de Material a Almacén de alto costo</h4></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="4">
              <table width="100%" id="table_hilti" class="table table-bordered">
                <thead>
                  <tr>
                    <td><strong>N°</strong></td>
                    <td><strong>Material</strong></td>
                    <td><strong>Detalle</strong></td>
                  </tr>
                </thead>
                <tbody>            
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td align="center" colspan="4">Préstamo proyecto: <?= $detalle->numero_proyecto ?> <?= $detalle->nombre_proyecto ?></td>
          </tr>
          <tr>
            <td height="70" width="100%" colspan="4"></td>
          </tr>
          <tr>
            <td colspan="2" width="50%" align="center"><?= $this->session->userdata('nombre') ?></td>
            <td colspan="2" width="50%" align="center"><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
          </tr>
          <tr>
            <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
            <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<?php elseif($tipo=='alto-costo' || $tipo == 'sistemas' || $tipo == 'tarjetas'): ?>
  <script>
    $(document).ready(function() {
      $('#observacion').change(function(event) {
      $('#observaciones').html(this.value);
    });
      $('#generar-documentos').click(function(event) {
        Swal.fire({
          title: '¡Atención!',
          text: "¿Desea generar documentos con la información actual?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar'
        }).
        then((result) => {
          if (result.value) {
            if($('#bandera').val()=='true'){
              $("#salida_material").print({
                iframe : true,
                globalStyles: true,
                mediaPrint: true,
                noPrintSelector :'.no-print'
              });
            } else {
              Toast.fire({
                type: 'error',
                title: 'Seleccione al menos un item de la lista.'
              })
            }
          }
        })
      });

      $("#form-asignacion").on("submit", function(event){
        var $form = $(this);
        var submitButton = $form.find('input[type="submit"]');
        if($('#bandera').val()=='true'){
          var f = $(this);
          if (event.isDefaultPrevented()) {
            console.log('Error')
          } else {
            if($form[0].checkValidity())
              submitButton.prop("disabled", "true");
            event.preventDefault();          
            var formData = new FormData(document.getElementById("form-asignacion"));
            $.ajax({
              url: "<?= base_url()?>almacen/guardar-asignacion-alto-costo",
              type: "post",
              dataType: "json",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              complete: function(res){
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if(resp.status){
                  location.href ="<?php echo base_url().'personal/detalle/'.$uid_usuario ?>";
                } else {
                  Toast.fire({
                    type: 'error',
                    title: resp.message
                  });
                  submitButton.prop("disabled", "false");
                }
              }
            });
          }
        } else {
          event.preventDefault();
          Toast.fire({
            type: 'error',
            title: 'Debe generar los documentos para ser adjuntados.'
          })
        }
      });

      $('#cancelar').click(function(event) {
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la asignación?",
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
    event.preventDefault();
    //alert(document.getElementById("formuploadajax_cancel_asignacion"));
    //var formData = new FormData(document.getElementById("formuploadajax-cancel-asignacion"));
    var folio = $('#folio').val();
    var token = $('#token').val();
    var comentarios = $('#comentarios').val();
    $.ajax({
      url: "<?= base_url()?>almacen/cancelar-asignacion",
      type: "POST",
      dataType: "json",
      data: {folio: folio, comentarios:comentarios, token:token},
      //cache: false,
      //contentType: false,
      //processData: false,
      complete: function (res) {
        var resp = JSON.parse(res.responseText);
        if (resp.error == false) {
          $('#cancelarModal').modal('hide');
          $('.ocultar').hide();
          Swal.fire(
            '¡Exitoso!',
            resp.mensaje,
            'success'
            )
          location.href="<?= base_url() ?>almacen/asignaciones/alto-costo";
        } else {
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          })
        }
      }
    });
  });

      $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar,1);
      });

      $("body").on("click",".paginacion li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar,valorHref);
      });

      function mostrarDatos(valorBuscar, pagina){
        $.ajax({
          url: "<?= base_url() ?>almacen/continuar_asignacion_paginacion",
          type: "POST",
          data: {
            buscar:valorBuscar,
            nropagina:pagina,
            uid_asignacion:'<?= $uid_asignacion ?>',
            uid_usuario:'<?= $uid_usuario ?>'
          },
          dataType: "json",
          success:function(response) {
            console.log(response);
            filas = "";
            $.each(response.inventario_almacen,function(key,item) {
              var imagenes = JSON.parse(item.imagenes);
              if(imagenes != null){
                filas += "<tr><td>" + item.uid + "</td><td>" + item.marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion + "</td><td>" + item.numero_serie + "</td><td>" + item.numero_interno + "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td><td title='" + item.categoria + "'>" + item.abreviatura + "</td><td>" + item.nota + "</td><td><input class='asignacion' type='radio' name='asignacion[]' data-marca='" + item.marca + "' data-modelo='" + item.modelo + "' data-descripcion='" + item.descripcion + "' data-numero='" + item.numero_interno + "' data-serie='" + item.numero_serie + "' data-nota='" + item.nota + "' data-uid='" + item.uid + "' data-placas='" + item.placas + "' data-letra='(" + item.precio_letra + ")' data-precio='" + item.precio_formato + "' data-motor='" + item.no_motor + "' data-poliza='" + item.poliza + "' data-seguro='" + item.seguro + "' data-vencimiento='" + item.proxima_fecha_tramite + "' data-tipo='" + item.tipo_vehiculo + "' data-estado='" + item.estado + "' data-imagen1='" + imagenes.imagen1 + "' data-imagen2='" + imagenes.imagen2 + "' data-imagen3='" + imagenes.imagen3 + "' data-iddtlalmacen='" + item.iddtl_almacen + "' data-idtbl-catalogo='" + item.idtbl_catalogo + "' value='" + item.iddtl_almacen + "'></td></tr>";                
              }else{
                filas += "<tr><td>" + item.uid + "</td><td>" + item.marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion + "</td><td>" + item.numero_serie + "</td><td>" + item.numero_interno + "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td><td title='" + item.categoria + "'>" + item.abreviatura + "</td><td>" + item.nota + "</td><td><input class='asignacion' type='radio' name='asignacion[]' data-marca='" + item.marca + "' data-modelo='" + item.modelo + "' data-descripcion='" + item.descripcion + "' data-numero='" + item.numero_interno + "' data-serie='" + item.numero_serie + "' data-nota='" + item.nota + "' data-uid='" + item.uid + "' data-precio='" + item.precio_formato + "' value='" + item.iddtl_almacen + "'></td></tr>";
              }
            });
            $('#tabla tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.count;
            
            //cantidad de registros por página
            cantidadRegistros = 10;

            numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            
            if(linkSeleccionado > 1) {
              paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
              paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
            }
            else {
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if(numeroLinks > cant) {
              pagRestantes = numeroLinks - linkSeleccionado;
              pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            }
            else {
              pagFin = numeroLinks;
            }
            for(var i = pagInicio; i <= pagFin; i++) {
              if(i == linkSeleccionado) {
                paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
              }
              else {
                paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
              }
            }
            if(linkSeleccionado < numeroLinks) {
              paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
              paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
            }
            else {
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion").html(paginador);
            $('.asignacion').change(function(event) {
              $('.asignacion-hidden').remove();
              $('#bandera').val('true');
              $("#marca span").html($('input.asignacion:checked').data('marca'));
              $("#modelo span").html($('input.asignacion:checked').data('modelo'));
              $("#valor span").html($('input.asignacion:checked').data('precio'));
              $("#valor2 span").html($('input.asignacion:checked').data('precio'));
              $("#serie span").html($('input.asignacion:checked').data('serie'));
              $("#precio span").html($('input.asignacion:checked').data('precio'));
              $("#numero span").html($('input.asignacion:checked').data('numero'));
              $("#nota span").html($('input.asignacion:checked').data('nota'));
              $("#descripcion span").html($('input.asignacion:checked').data('descripcion'));
              $("#form-asignacion").append(
                $('<input>')
               .attr('type', 'hidden')
               .attr('id', $(this).data('uid'))
               .attr('name', 'asignacion[]')
               .attr('class', 'asignacion-hidden')
               .val(this.value)
              )
              verImagen();
              verImagen2();
              //verImagen3();
            });
          }
        });
      }
      mostrarDatos("", 1);
      
    });

    function verImagen() {
      var canvas = document.getElementById("draw-canvas");
      var ctx = canvas.getContext("2d");
      var img = new Image();
      img.src = "<?= base_url() ?>uploads/sistemas/equipos/" + $('input.asignacion:checked').data('imagen1');
      ctx.drawImage(img, 0, 0);
      img.onload = function(){
        ctx.drawImage(img, 0, 0);
      }
    }

    function verImagen2() {
      var canvas = document.getElementById("draw-canvas2");
      var ctx = canvas.getContext("2d");
      var img = new Image();
      img.src = "<?= base_url() ?>uploads/sistemas/equipos/" + $('input.asignacion:checked').data('imagen2');
      ctx.drawImage(img, 0, 0);
      img.onload = function(){
        ctx.drawImage(img, 0, 0);
      }
    }
  </script>

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
    }
  </style>
  <?php if($tipo != 'tarjetas'){ ?>
    <div class="container-fluid">
    <div class="card" id="salida_material" >
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
                                style="vertical-align: middle; text-align: center; font-size: 20px;" width="25%" >
                                <strong>C&oacute;digo: ANEXO DIB 002</strong>
                            </th>                            
                        </tr>
                        <tr>
                            <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center; font-size: 20px;">
                                CONTRATO DE COMODATO
                            </th>
                            <th class="b_bottom" width="25%" style="vertical-align: middle; text-align: center; font-size: 20px;" colspan="2">
                                Revisión: 00
                            </th>
                            
                        </tr>
                    </thead>
            </table><br>
            <span class="text-right h5">Folio:<?php echo $folio ?></span>

            <?php 
              $mes_numero = date('m');
              if($mes_numero == '01'){
                $mes = 'Enero';
              }elseif($mes_numero == '02'){
                $mes = 'Febrero';
              }elseif($mes_numero == '03'){
                $mes = 'Marzo';
              }elseif($mes_numero == '04'){
                $mes = 'Abril';
              }elseif($mes_numero == '05'){
                $mes = 'Mayo';
              }elseif($mes_numero == '06'){
                $mes = 'Junio';
              }elseif($mes_numero == '07'){
                $mes = 'Julio';
              }elseif($mes_numero == '08'){
                $mes = 'Agosto';
              }elseif($mes_numero == '09'){
                $mes = 'Septiembre';
              }elseif($mes_numero == '10'){
                $mes = 'Octubre';
              }elseif($mes_numero == '11'){
                $mes = 'Noviembre';
              }elseif($mes_numero == '12'){
                $mes = 'Diciembre';
              }
            ?>

            <br><br>
      <table width="100%" class="table">
        <tbody>
          <tr>
            <td colspan="4">
              Que celebran por una parte la sociedad Estevez.Jor Servicios, S.A. de C.V. representada en este acto por  <?= $this->session->userdata('nombre') ?>, a quien de aquí en adelante se denominará “EL COMODANTE” por la otra parte el señor: (<?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?>) por su  propio derecho, con domicilio en la calle: (<?= $detalle->calle. ' ' . $detalle->numero . ', ' . $detalle->colonia . '. ' . $detalle->nombre_municipio . ' ' .$detalle->nombre_entidad ?>) Código Postal: <?= $detalle->cp ?>. Para efectos del presente contrato se denominara “EL COMODATARIO” y el cual se identifica con INE Número de folio: <?php echo $detalle->clave_elector ?>.  por el cual ambas partes se sujetan al tenor de la siguientes:
            </td>
          </tr>
          <tr>
            <td colspan="4" align="center">
              CLAUSULA
            </td>
          </tr>
          <tr>
            <td colspan="4">
              I. El Comodante manifiesta que es dueño único y exclusivo en legítima propiedad de (<span id="descripcion"><span></span></span>), el cual transmite en comodato al Comodatario y este lo acepta después de verificar el buen estado en que se encuentra, bien que se identifica como sigue:
            </td>
          </tr>
          <tr>
            <td>Marca <span></span></td>
            <td>Modelo <span></span></td>
            <td>N° de Serie <span></span></td>
            <td>N° Interno <span></span></td>
          </tr>
          <tr>
            <td id="marca"><span></span></td>
            <td id="modelo"><span></span></td>
            <td id="serie"><span></span></td>
            <td id="numero"><span></span></td>
          </tr>
          <tr>
            <td colspan="4" id="valor">II. El Valor del bien en el mercado es de $<span></span>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4">III. El uso que el COMODATARIO le dará consistirá exclusivamente en (<b>Especificar el uso de la herramienta o equipo</b>) y se obliga a hacer buen uso, cualquier otro uso que le dé será bajo su responsabilidad, en caso de daño por mal uso, los gastos que se generen por la reparación correrán por su cuenta.</td>
          </tr>
          <tr>
            <td colspan="4">IV. El Comodatario se obliga a proveer y prever los máximos cuidados en la conservación del bien y hacer todas las reparaciones necesarias que del uso del bien se deriven, así como ser y hacerse responsable de todos los daños y perjuicios que pudiera causar a un tercero por el proceder de su negligencia deslindando al comodante de toda responsabilidad jurídica o administrativa que pudiera afectarle en su patrimonio.</td>
          </tr>
          <tr>
            <td colspan="4">V. La duración del contrato será de dos años forzosos para el Comodatario y voluntario para el Comodante por lo cual este último lo podrá dar por terminado en cualquier momento sin ninguna responsabilidad.</td>
          </tr>
          <tr>
            <td colspan="4">VI. La devolución del bien ya puntualizado, después de haber transcurrido el término señalado en el punto anterior, deberá ser en el domicilio antes citado del Comodante o en el lugar donde este tenga su residencia. El bien debe estar funcionando de manera correcta a su entrega.</td>
          </tr>
          <tr>
            <td colspan="4" id="valor2">VII. En caso de que el bien llegara a perderse, o quedara inservible, ambas partes comodante y comodatario, están conformes en que, si la pérdida del objeto se deriva de una culpa del comodatario, esté deberá pagar la cantidad de $<span></span> al comodante. En un plazo no mayor de 5 días contados a partir del evento. Esta cláusula quedara sin ningún efecto si la pérdida del objeto se deriva de un caso fortuito o fuerza mayor.</td>
          </tr>
          <tr>
            <td colspan="4">VIII.- Ambas partes convienen en que el bien mueble otorgado al Comodatario en comodato es en forma personal y responderá por cualquier daño que por su negligencia causará en el mismo, razón por lo que desde este momento se prohíbe al comodatario prestar, arrendar o por cualquier medio ceder en parte o en todo la posesión y uso del bien mueble que les sea otorgado en comodato a un tercero en el presente contrato y que quedo debidamente descrito con anterioridad.</td>
          </tr>
          <tr>
            <td colspan="4">IX.- Para el caso de que se termine la relación contractual en el presente contrato, el Comodatario se obliga a hacer la devolución inmediata del bien mueble en el domicilio del Comodante, previo inventario del estado que guarda el bien mueble, por escrito firmado por ambas partes, que servirá como el recibo más amplio que a derecho corresponda. Por lo anterior y a para el caso de que, al terminar la relación en el presente contrato, el comodatario no haga la entrega del bien mueble otorgado en comodato descrito anteriormente, se estará a lo dispuesto en el Código Penal Para el Estado de México en sus Artículos 302 y 303  en su fracción III, al tipificarse el ABUSO DE CONFIANZA artículos que se insertan en el presente contrato y se transcriben a la letra:
            </td>
          </tr>                    
          <tr>
            <td colspan="4">
            a.    “ARTÍCULO 302.- Comete el delito de abuso de confianza, el que con perjuicio de alguien disponga para si o para otro de cualquier bien ajeno mueble, del que se le hubiese transmitido la tenencia y no el dominio.
            </td>
            </tr>
            <tr>
            <td colspan="4">
            b.    ARTÍCULO 303.- Se equipara el delito de abuso de confianza: III.- La ilegitima posesión de bien retenido, si el tenedor o poseedor no lo devuelve a pesar de ser requerido formalmente por quien tenga derecho o no lo entregue a la autoridad para que este disponga del mismo conforme a la ley…”     
            </td>
          </tr>
          <tr>
            <td colspan="4">X.- Para todo lo relativo a la interpretación, cumplimiento y ejecución del presente contrato las partes se someten expresamente a la Jurisdicción de los Tribunales competentes en el Estado de México con residencia en el municipio de Tlalnepantla de Baz y renuncian por lo tanto a cualquier otra jurisdicción que pudiere corresponderles por razón de su domicilio presente o futuro.
            Ambas partes manifiestan que están en pleno uso de sus facultades físicas y mentales y que son capaces para celebrar el contrato de comodato cuyos derechos y obligaciones contenidos en el mismo las entienden de manera precisa, por lo que no existe ningún vicio en la voluntad que anule el mismo y como consecuencia lo ratifican en todas y cada una de sus partes. 
            Este contrato se firma por duplicado quedando un ejemplar para cada una de las partes, a los <?= date('d') ?> días del mes de <?= $mes ?> del año <?= date('Y') ?> en el municipio de Tlalnepantla de Baz, Estado De México.</td>
          </tr> 
          <?php if($this->session->userdata('tipo') == 2){ ?>  
          <tr>
              <td colspan="2" style="text-align: center;;">
        <img style="width: 280px; height: 220;" id="draw-image" src="" alt="Tu Imagen aparecera Aqui!"/>
              </td>
              <td colspan="2" style="text-align: center;">
        <img style="width: 280px; height: 220;" id="draw-image2" src="" alt="Tu Imagen aparecera Aqui!"/>
              </td>
            </tr>
            <?php } ?>
              
          <tr>
            <td height="50" width="100%" colspan="4"></td>
          </tr>
          <tr>
            <td colspan="2" width="50%" align="center"><?= $this->session->userdata('nombre') ?></td>
            <td colspan="2" width="50%" align="center"><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
          </tr>
          <tr>
            <td colspan="2" align="center">COMODANTE</td>
            <td colspan="2" align="center">COMODATARIO</td>
          </tr>
          <tr>
            <td height="50" width="100%" colspan="4"></td>
          </tr>
          
        </tbody>
      </table>
    
    </div>
  </div>
  <?php }else{ ?>
    <div class="container-fluid">
  <div class="card" id="salida_material" >
    <table width="100%" class="table table-bordered">
      <thead>
        <tr>
          <th style="text-align: center" width="25%"><img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 150px;"></th>
          <th colspan="2" width="50%" style="vertical-align: middle; text-align: center"><h3>ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.</h3></th>
          <th style="vertical-align: middle; text-align: center" width="25%"><h3>Folio: <?php echo $folio ?></h3></th>
        </tr> 
        <tr>
          <th colspan="4" style="text-align: center"><h4>RECIBO EQUIPO DE TRABAJO</h4></th>
        </tr>
        <tr>
          <td colspan="4" style="text-align: center">Con esta fecha recibí a mi entera satisfacción de la Empresa ESTEVEZ.JOR SERVICIOS, S.A. DE C.V. las HERRAMIENTAS DE TRABAJO que a continuación se detallan:</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4">
            <table width="100%" id="table_material" class="table table-bordered">              
              <tbody>
              <tr>
            <td id="marca">1.-MARCA: <span></span></td>
            <td id="modelo">2.-MODELO: <span></span></td>
          </tr>
          <tr>
            <td id="serie">3.-Número de Serie: <span></span></td>
            <td id="numero">Número Interno: <span></span></td>
          </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td align="center" colspan="4">Observaciones</td>
        </tr>
        <tr>
          <td colspan="4" id="observaciones"></td>
        </tr>
        <tr>
          <td colspan="4">Proyecto: <?= $detalle->numero_proyecto ?> <?= $detalle->nombre_proyecto ?></td>
        </tr>
        <tr>
          <td colspan="4">
            Hago constar que dichos materiales los recibo nuevos y de la calidad y demás condiciones para el trabajo, por lo que me obligo en términos del artículo 134 fracción VI y 135 fracciones III y IX de la Ley Laboral a conservarlos en buen estado; a utilizarlos para el uso que están destinados dentro de mi puesto y área de trabajo; así como restituirlos única y exclusivamente mediante un canje del usado por otro en mejores condiciones y/o nuevo, el cual lo proporcionara el área de Almacén de materiales y  herramientas, responsabilizándome de los mismos bajo cualquier circunstancia, aceptando que en caso de pérdida o mal uso sean descontados de mi paga, entiendo que salvo por caso **fortuito o fuerza mayor**, se me condonaría del pago de la herramienta y/o materiales en mención. <br> ** Este será valorado por el Área de Recursos Humanos y Materiales.
          </td>
        </tr>
        <tr>
          <td colspan="4" align="center">Tlalnepantla de Baz, Estado de México a <?= strftime('%d de %B del %Y') ?></td>
        </tr>
        <tr>
          <td height="70" width="100%" colspan="4"></td>
        </tr>
        <tr>
          <td colspan="2" width="50%" align="center"><?= $this->session->userdata('nombre') ?></td>
          <td colspan="2" width="50%" align="center"><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
        </tr>
        <?php if($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 10){ ?>
        <tr>
          <td colspan="2" width="50%" align="center"><img id="draw-image7-document" src="" alt="Tu Imagen aparecera Aqui!" /></td>
          <td colspan="2" width="50%" align="center"><img id="draw-image6-document" src="" alt="Tu Imagen aparecera Aqui!" /></td>
        </tr>
        <?php } ?>
        <tr>
          <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
          <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
    <?php } ?>
<?php elseif($tipo=='control-vehicular'): ?>
  <script>
    
    function verImagen() {
      var canvas = document.getElementById("draw-canvas");
      var ctx = canvas.getContext("2d");
      var img = new Image();
      img.src = "<?= base_url() ?>uploads/autos/" + $('input.asignacion:checked').data('imagen1');
      ctx.drawImage(img, 0, 0);
      img.onload = function(){
        ctx.drawImage(img, 0, 0);
      }
    }

    function verImagen2() {
      var canvas = document.getElementById("draw-canvas2");
      var ctx = canvas.getContext("2d");
      var img = new Image();
      img.src = "<?= base_url() ?>uploads/autos/" + $('input.asignacion:checked').data('imagen2');
      ctx.drawImage(img, 0, 0);
      img.onload = function(){
        ctx.drawImage(img, 0, 0);
      }
    }

    function verImagen3() {
      var canvas = document.getElementById("draw-canvas3");
      var ctx = canvas.getContext("2d");
      var img = new Image();
      img.src = "<?= base_url() ?>uploads/autos/" + $('input.asignacion:checked').data('imagen3');
      ctx.drawImage(img, 0, 0);
      img.onload = function(){
        ctx.drawImage(img, 0, 0);
      }
    }


    function getLastChecklist(id) {
      //alert(id);
      $.ajax({
        url: "<?= base_url()?>ControlVehicular/mostrarUltimoChecklist/" + id,
        type: "post",
        success: function(res) {
          var registros = eval(res);
          if(registros.length == 0) {
            $("#tab-last-checklist").css('display','none');
            //alert("no existe checklist");
            if($("#img_comp1")) {
              $("#img_comp1").remove();
            }
            if($("#img_comp2")) {
              $("#img_comp2").remove();
            }
            if($("#img_comp3")) {
              $("#img_comp3").remove();
            }

            if($("#a1")) {
              $("#a1").remove();
            }
            if($("#a2")) {
              $("#a2").remove();
            }
            if($("#a3")) {
              $("#a3").remove();
            }
            if($("#f1")) {
              $("#f1").remove();
            }
            if($("#f2")) {
              $("#f2").remove();
            }
          }
          else {
            if($("#img_comp1")) {
              $("#img_comp1").remove();
            }
            if($("#img_comp2")) {
              $("#img_comp2").remove();
            }
            if($("#img_comp3")) {
              $("#img_comp3").remove();
            }

            if($("#a1")) {
              $("#a1").remove();
            }
            if($("#a2")) {
              $("#a2").remove();
            }
            if($("#a3")) {
              $("#a3").remove();
            }
            if($("#f1")) {
              $("#f1").remove();
            }
            if($("#f2")) {
              $("#f2").remove();
            }
            
            $("#tab-last-checklist").css('display','block');
            //alert('si existe Checklist');
            var checklist = JSON.parse(registros[0]['checklist']);
            var imagenes_checklist = JSON.parse(registros[0]['imagenes_checklist']);
            //alert(checklist['e1']);
            $(".kilometraje").val(registros[0]['kilometraje']);
            ///////////////////////////////////////////////////
            $(".tt1").val(checklist['t1']);
            if(checklist['r1'] == 'si') {
              $(".rr1").attr('checked','true');
            }
            else {
              $(".rrr1").attr('checked','true');
            }
            $(".ee1").val(checklist['e1']);


            $(".tt2").val(checklist['t2']);
            if(checklist['r2'] == 'si') {
              $(".rr2").attr('checked','true');
            }
            else {
              $(".rrr2").attr('checked','true');
            }
            $(".ee2").val(checklist['e2']);


            $(".tt3").val(checklist['t3']);
            if(checklist['r3'] == 'si') {
              $(".rr3").attr('checked','true');
            }
            else {
              $(".rrr3").attr('checked','true');
            }
            $(".ee3").val(checklist['e3']);


            $(".tt4").val(checklist['t4']);
            if(checklist['r4'] == 'si') {
              $(".rr4").attr('checked','true');
            }
            else {
              $(".rrr4").attr('checked','true');
            }
            $(".ee4").val(checklist['e4']);


            $(".tt5").val(checklist['t5']);
            if(checklist['r5'] == 'si') {
              $(".rr5").attr('checked','true');
            }
            else {
              $(".rrr5").attr('checked','true');
            }
            $(".ee5").val(checklist['e5']);


            $(".tt6").val(checklist['t6']);
            if(checklist['r6'] == 'si') {
              $(".rr6").attr('checked','true');
            }
            else {
              $(".rrr6").attr('checked','true');
            }
            $(".ee6").val(checklist['e6']);

            
            $(".tt7").val(checklist['t7']);
            if(checklist['r7'] == 'si') {
              $(".rr7").attr('checked','true');
            }
            else {
              $(".rrr7").attr('checked','true');
            }
            $(".ee7").val(checklist['e7']);

            
            $(".tt8").val(checklist['t8']);
            if(checklist['r8'] == 'si') {
              $(".rr8").attr('checked','true');
            }
            else {
              $(".rrr8").attr('checked','true');
            }
            $(".ee8").val(checklist['e8']);

            
            $(".tt9").val(checklist['t9']);
            if(checklist['r9'] == 'si') {
              $(".rr9").attr('checked','true');
            }
            else {
              $(".rrr9").attr('checked','true');
            }
            $(".ee9").val(checklist['e9']);

            
            $(".tt10").val(checklist['t10']);
            if(checklist['r10'] == 'si') {
              $(".rr10").attr('checked','true');
            }
            else {
              $(".rrr10").attr('checked','true');
            }
            $(".ee10").val(checklist['e10']);

            
            $(".tt11").val(checklist['t11']);
            if(checklist['r11'] == 'si') {
              $(".rr11").attr('checked','true');
            }
            else {
              $(".rrr11").attr('checked','true');
            }
            $(".ee11").val(checklist['e11']);

            
            $(".tt12").val(checklist['t12']);
            if(checklist['r12'] == 'si') {
              $(".rr12").attr('checked','true');
            }
            else {
              $(".rrr12").attr('checked','true');
            }
            $(".ee12").val(checklist['e12']);

            
            $(".tt13").val(checklist['t13']);
            if(checklist['r13'] == 'si') {
              $(".rr13").attr('checked','true');
            }
            else {
              $(".rrr13").attr('checked','true');
            }
            $(".ee13").val(checklist['e13']);

            
            $(".tt14").val(checklist['t14']);
            if(checklist['r14'] == 'si') {
              $(".rr14").attr('checked','true');
            }
            else {
              $(".rrr14").attr('checked','true');
            }
            $(".ee14").val(checklist['e14']);

            
            $(".tt15").val(checklist['t15']);
            if(checklist['r15'] == 'si') {
              $(".rr15").attr('checked','true');
            }
            else {
              $(".rrr15").attr('checked','true');
            }
            $(".ee15").val(checklist['e15']);

            
            $(".tt16").val(checklist['t16']);
            if(checklist['r16'] == 'si') {
              $(".rr16").attr('checked','true');
            }
            else {
              $(".rrr16").attr('checked','true');
            }
            $(".ee16").val(checklist['e16']);

            
            $(".tt17").val(checklist['t17']);
            if(checklist['r17'] == 'si') {
              $(".rr17").attr('checked','true');
            }
            else {
              $(".rrr17").attr('checked','true');
            }
            $(".ee17").val(checklist['e17']);

            
            $(".tt18").val(checklist['t18']);
            if(checklist['r18'] == 'si') {
              $(".rr18").attr('checked','true');
            }
            else {
              $(".rrr18").attr('checked','true');
            }
            $(".ee18").val(checklist['e18']);

            
            $(".tt19").val(checklist['t19']);
            if(checklist['r19'] == 'si') {
              $(".rr19").attr('checked','true');
            }
            else {
              $(".rrr19").attr('checked','true');
            }
            $(".ee19").val(checklist['e19']);

            
            $(".tt20").val(checklist['t20']);
            if(checklist['r20'] == 'si') {
              $(".rr20").attr('checked','true');
            }
            else {
              $(".rrr20").attr('checked','true');
            }
            $(".ee20").val(checklist['e20']);

            
            $(".tt21").val(checklist['t21']);
            if(checklist['r21'] == 'si') {
              $(".rr21").attr('checked','true');
            }
            else {
              $(".rrr21").attr('checked','true');
            }
            $(".ee21").val(checklist['e21']);

            
            $(".tt22").val(checklist['t22']);
            if(checklist['r22'] == 'si') {
              $(".rr22").attr('checked','true');
            }
            else {
              $(".rrr22").attr('checked','true');
            }
            $(".ee22").val(checklist['e22']);

            
            $(".tt23").val(checklist['t23']);
            if(checklist['r23'] == 'si') {
              $(".rr23").attr('checked','true');
            }
            else {
              $(".rrr23").attr('checked','true');
            }
            $(".ee23").val(checklist['e23']);

            
            $(".tt24").val(checklist['t24']);
            if(checklist['r24'] == 'si') {
              $(".rr24").attr('checked','true');
            }
            else {
              $(".rrr24").attr('checked','true');
            }
            $(".ee24").val(checklist['e24']);

            
            $(".tt25").val(checklist['t25']);
            if(checklist['r25'] == 'si') {
              $(".rr25").attr('checked','true');
            }
            else {
              $(".rrr25").attr('checked','true');
            }
            $(".ee25").val(checklist['e25']);

            
            $(".tt26").val(checklist['t26']);
            if(checklist['r26'] == 'si') {
              $(".rr26").attr('checked','true');
            }
            else {
              $(".rrr26").attr('checked','true');
            }
            $(".ee26").val(checklist['e26']);

            
            $(".tt27").val(checklist['t27']);
            if(checklist['r27'] == 'si') {
              $(".rr27").attr('checked','true');
            }
            else {
              $(".rrr27").attr('checked','true');
            }
            $(".ee27").val(checklist['e27']);

            
            $(".tt28").val(checklist['t28']);
            if(checklist['r28'] == 'si') {
              $(".rr28").attr('checked','true');
            }
            else {
              $(".rrr28").attr('checked','true');
            }
            $(".ee28").val(checklist['e28']);

            
            $(".tt29").val(checklist['t29']);
            if(checklist['r29'] == 'si') {
              $(".rr29").attr('checked','true');
            }
            else {
              $(".rrr29").attr('checked','true');
            }
            $(".ee29").val(checklist['e29']);

            
            $(".tt30").val(checklist['t30']);
            if(checklist['r30'] == 'si') {
              $(".rr30").attr('checked','true');
            }
            else {
              $(".rrr30").attr('checked','true');
            }
            $(".ee30").val(checklist['e30']);
            ////////////////////////////////////////////////////
            $(".observaciones").val(registros[0]['observaciones']);
            if(registros[0]['condicion_unidad'] == 'limpio') {
              $(".limpio").attr('checked','true');
            }
            else {
              $(".sucio").attr('checked','true');
            }
            auto1 = "<img id='a1' src='<?= base_url(); ?>" + imagenes_checklist['imagen1'] + "'>";
            auto2 = "<img id='a2' src='<?= base_url(); ?>" + imagenes_checklist['imagen2'] + "'>";
            auto3 = "<img id='a3' src='<?= base_url(); ?>" + imagenes_checklist['imagen3'] + "'>";
            firma1 = "<img id='f1' src='<?= base_url(); ?>" + imagenes_checklist['imagen4'] + "'>";
            firma2 = "<img id='f2' src='<?= base_url(); ?>" + imagenes_checklist['imagen5'] + "'>";

            auto_comparacion1 = "<img id='img_comp1' src='<?= base_url(); ?>" + imagenes_checklist['imagen1'] + "'>";
            auto_comparacion2 = "<img id='img_comp2' src='<?= base_url(); ?>" + imagenes_checklist['imagen2'] + "'>";
            auto_comparacion3 = "<img id='img_comp3' src='<?= base_url(); ?>" + imagenes_checklist['imagen3'] + "'>";

            $("#auto_comparacion1").html(auto_comparacion1);
            $("#auto_comparacion2").html(auto_comparacion2);
            $("#auto_comparacion3").html(auto_comparacion3);

            $("#imagen1").html(auto1);
            $("#imagen2").html(auto2);
            $("#imagen3").html(auto3);
            $("#imagen4").html(firma1);
            $("#imagen5").html(firma2);

            $("#usuario").html(registros[0]['usuario']);
            $("#user").html(registros[0]['user']);

            $(".fecha").html(registros[0]['fecha']);
          }
        }
      });
    }

    $(document).ready(function() {
      $('#generar-documentos').click(function(event) {
        Swal.fire({
          title: '¡Atención!',
          text: "¿Desea generar documentos con la información actual?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar'
        }).
        then((result) => {
          if (result.value) {
            //alert("Verdadero");
            if($('#bandera').val()=='true'){
              $("#salida_material").print({
                iframe : true,
                globalStyles: true,
                mediaPrint: true,
                noPrintSelector :'.no-print'
              });
            } else {
              Toast.fire({
                type: 'error',
                title: 'Seleccione al menos un item de la lista.'
              })
            }
          }
        })
      });

      $('#cancelar').click(function(event) {
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la solicitud de material?",
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
    event.preventDefault();
    //alert(document.getElementById("formuploadajax_cancel_asignacion"));
    //var formData = new FormData(document.getElementById("formuploadajax-cancel-asignacion"));
    var folio = $('#folio').val();
    var token = $('#token').val();
    var comentarios = $('#comentarios').val();
    $.ajax({
      url: "<?= base_url()?>almacen/cancelar-asignacion",
      type: "POST",
      dataType: "json",
      data: {folio: folio, comentarios:comentarios, token:token},
      //cache: false,
      //contentType: false,
      //processData: false,
      complete: function (res) {
        var resp = JSON.parse(res.responseText);
        if (resp.error == false) {
          $('#cancelarModal').modal('hide');
          $('.ocultar').hide();
          Swal.fire(
            '¡Exitoso!',
            resp.mensaje,
            'success'
            )
          location.href="<?= base_url() ?>almacen/asignaciones/alto-costo";
        } else {
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          })
        }
      }
    });
  });

      $('#generar-checklist').click(function(event) {
        Swal.fire({
          title: '¡Atención!',
          text: "¿Desea generar el checklist con la información actual?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar'
        }).
        then((result) => {
          if (result.value) {
            if($('#bandera').val()=='true'){
              $('.bd-example-modal-lg').modal('show');
              getLastChecklist(id);
            } else {
              Toast.fire({
                type: 'error',
                title: 'Seleccione al menos un item de la lista.'
              })
            }
          }
        })
      });

      $("#form-checklist").on("submit", function(event) {
        var $form = $(this);
        var button = $form.find("input[type='submit']");
        button.prop("disabled", true);
        if($('#bandera').val()=='true') {
          var f = $(this);
          if (event.isDefaultPrevented()) {
            console.log('Error');
            button.prop("disabled", false);
          } else {
            event.preventDefault();          
            var formData = new FormData(document.getElementById("form-checklist"));
            $.ajax({
              url: "<?= base_url()?>ControlVehicular/guardarChecklist",
              type: "post",
              dataType: "json",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              complete: function(res){
                var resp = JSON.parse(res.responseText);
                if(resp.status){
                  Toast.fire({
                    type: 'success',
                    title: resp.message
                  })
                  $('.bd-example-modal-lg').modal('toggle');
                  //location.href ="<?php echo base_url().'personal/detalle/'.$uid_usuario ?>";
                  $('#banderaChecklist').val("true")
                  button.prop("disabled", false);
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
        } else {
          event.preventDefault();
          Toast.fire({
            type: 'error',
            title: 'Debe generar los documentos para ser adjuntados.'
          })
        }
      })

      $("#form-asignacion").on("submit", function(event){
        event.preventDefault();
        var $form = $(this);
        var submitButton = $form.find('input[type="submit"]');
        if($('#banderaChecklist').val()!='true'){
          Toast.fire({
            type: 'error',
            title: "No se ha llenado check list de asignación."
          });
          return;
        }
        if($('#bandera').val()=='true'){
          var f = $(this);
          //if($form[0].checkValidity())
            submitButton.prop("disabled", true);         
            var formData = new FormData(document.getElementById("form-asignacion"));
            $.ajax({
              url: "<?= base_url()?>almacen/guardar-asignacion-autos-control-vehicular",
              type: "post",
              dataType: "json",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              complete: function(res){
                var resp = JSON.parse(res.responseText);
                console.log(">> ", resp);
                if(resp.status){
                  location.href ="<?php echo base_url().'personal/detalle/'.$uid_usuario ?>";
                } else {
                  submitButton.prop("disabled", false);
                  Toast.fire({
                    type: 'error',
                    title: resp.message
                  });
                }
              }
            });
          //}
        } else {
          Toast.fire({
            type: 'error',
            title: 'Debe generar los documentos para ser adjuntados.'
          })
        }
      });

      $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar,1);
      });

      $("body").on("click",".paginacion li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar,valorHref);
      });

      function mostrarDatos(valorBuscar, pagina){
        $.ajax({
          url: "<?= base_url() ?>almacen/continuar_asignacion_paginacion",
          type: "POST",
          data: {
            buscar:valorBuscar,
            nropagina:pagina,
            uid_asignacion:'<?= $uid_asignacion ?>',
            uid_usuario:'<?= $uid_usuario ?>'
          },
          dataType: "json",
          success:function(response) {
            console.log(response);
            filas = "";
            $.each(response.inventario_almacen,function(key,item) {
              var imagenes = JSON.parse(item.imagenes); 
              filas += "<tr><td>" + item.uid + "</td><td>" + item.marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion + "</td><td>" + item.numero_serie + "</td><td>" + item.numero_interno + "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td><td title='" + item.categoria + "'>" + item.abreviatura + "</td><td>" + item.nota + "</td><td><input class='asignacion' type='radio' name='asignacion[]' data-marca='" + item.marca + "' data-modelo='" + item.modelo + "' data-descripcion='" + item.descripcion + "' data-numero='" + item.numero_interno + "' data-serie='" + item.numero_serie + "' data-nota='" + item.nota + "' data-uid='" + item.uid + "' data-placas='" + item.placas + "' data-letra='(" + item.precio_letra + ")' data-precio='" + item.precio_formato + "' data-motor='" + item.no_motor + "' data-poliza='" + item.poliza + "' data-seguro='" + item.seguro + "' data-vencimiento='" + item.proxima_fecha_tramite + "' data-tipo='" + item.tipo_vehiculo + "' data-estado='" + item.estado + "' data-imagen1='" + imagenes.imagen1 + "' data-imagen2='" + imagenes.imagen2 + "' data-imagen3='" + imagenes.imagen3 + "' data-iddtlalmacen='" + item.iddtl_almacen + "' data-idtbl-catalogo='" + item.idtbl_catalogo + "' value='" + item.iddtl_almacen + "'></td></tr>";
            });
            $('#tabla tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.count;
            
            //cantidad de registros por página
            cantidadRegistros = 10;

            numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            
            if(linkSeleccionado > 1) {
              paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
              paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
            }
            else {
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if(numeroLinks > cant) {
              pagRestantes = numeroLinks - linkSeleccionado;
              pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            }
            else {
              pagFin = numeroLinks;
            }
            for(var i = pagInicio; i <= pagFin; i++) {
              if(i == linkSeleccionado) {
                paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
              }
              else {
                paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
              }
            }
            if(linkSeleccionado < numeroLinks) {
              paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
              paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
            }
            else {
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion").html(paginador);
            $('.asignacion').change(function(event) {
              $('.asignacion-hidden').remove();
              $('#bandera').val('true');
              $('#banderaChecklist').val('false');
              $('#form-last-checklist')[0].reset()
              $("#marca span").html($('input.asignacion:checked').data('marca'));
              $("#modelo span").html($('input.asignacion:checked').data('modelo'));
              $("#serie span").html($('input.asignacion:checked').data('serie'));
              $("#precio span").html($('input.asignacion:checked').data('precio'));
              $("#numero span").html($('input.asignacion:checked').data('numero'));
              $("#nota span").html($('input.asignacion:checked').data('nota'));
              $("#descripcion span").html($('input.asignacion:checked').data('descripcion'));
              $("#valor span").html($('input.asignacion:checked').data('precio'));
              $("#placas span").html($('input.asignacion:checked').data('placas'));
              $("#valor").append($('input.asignacion:checked').data('letra'));
              var concat = $('input.asignacion:checked').data('precio') + ' ' + $('input.asignacion:checked').data('letra');
              $("#valor2 span").append(concat);
              $("#form-asignacion").append(
                $('<input>')
               .attr('type', 'hidden')
               .attr('id', $(this).data('uid'))
               .attr('name', 'asignacion[]')
               .attr('class', 'asignacion-hidden')
               .val(this.value)
              )

              $("#idtbl_catalogo").val($('input.asignacion:checked').data('idtbl-catalogo'));
              id = $('input.asignacion:checked').data('iddtlalmacen');

              $(".ecocheck strong").html($('input.asignacion:checked').data('numero'));
              $(".marcacheck strong").html($('input.asignacion:checked').data('marca'));
              $(".modelocheck strong").html($('input.asignacion:checked').data('modelo'));
              $(".seriecheck strong").html($('input.asignacion:checked').data('serie'));
              $(".motorcheck strong").html($('input.asignacion:checked').data('motor'));
              $(".placascheck strong").html($('input.asignacion:checked').data('placas'));
              $(".polizacheck strong").html($('input.asignacion:checked').data('poliza'));
              $(".vencimientocheck strong").html($('input.asignacion:checked').data('vencimiento'));
              $(".segurocheck strong").html($('input.asignacion:checked').data('seguro'));
              if($('input.asignacion:checked').data('estado') == 'nuevo') {
                $(".nuevocheck").attr('checked','true');
              }
              else {
                $(".usadocheck").attr('checked','true');
              }

              //img = '';
              //img += '<img src="<?= base_url() ?>uploads/autos/' + $('input.asignacion:checked').data('imagen1') + '">';
              //img += '<img src="<?= base_url() ?>uploads/autos/' + $('input.asignacion:checked').data('imagen2') + '">';
              //img += '<img src="<?= base_url() ?>uploads/autos/' + $('input.asignacion:checked').data('imagen3') + '">';
              //$("#images").html(img);
              verImagen();
              verImagen2();
              verImagen3();


            });
          }
        });
      }
      mostrarDatos("", 1);
    });
  </script>

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
    }
  </style>
  <div class="container-fluid">
    <div class="card" id="salida_material" >
      <table width="100%" class="table">
        <tbody>
          <tr>
            <td colspan="2" align="center">CONTRATO DE COMODATO </td>
          </tr>
          <tr>
            <td colspan="2">
              Tlalnepantla, Estado de México, a <?= strftime('%d de %B del %Y') ?>, por una parte la sociedad Estevez.Jor Servicios, S.A. de C.V. representada en este acto por  <?= $this->session->userdata('nombre') ?>, a quien de aquí en adelante se denominará “EL COMODANTE” por la otra parte el señor <?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?>, por su  propio derecho, con domicilio en : <?= $detalle->calle. ' ' . $detalle->numero . ', ' . $detalle->colonia . '. ' . $detalle->nombre_municipio . ', '.$detalle->cp.' ' .$detalle->nombre_entidad ?>. Para efectos del presente contrato se denominara “EL COMODATARIO” y el cual se identifica con INE Número de folio: <?php echo $detalle->clave_elector ?>   por lo cual ambas partes se sujetan al tenor de la siguientes
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              CLAUSULA
            </td>
          </tr>
          <tr>
            <td colspan="2">
              I. El Comodante manifiesta que es dueño único y exclusivo en legítima propiedad de <span id="descripcion"><span></span></span>, el cual transmite en comodato al Comodatario y este lo acepta después de verificar el buen estado en que se encuentra, bien que se identifica como sigue:
            </td>
          </tr>
          <tr>
            <td id="marca">1.-MARCA: <span></span></td>
            <td id="numero">2.-No. ECO: <span></span></td>
          </tr>
          <tr>
            <td id="placas">3.-Placas: <span></span></td>
            <td id="serie">Serie: <span></span></td>
          </tr>
          <!--<tr>
            <td colspan="2" id="nota"><span></span></td>
          </tr>-->
          <tr>
            <td colspan="2" id="valor">II. El Valor del bien es de $<span></span>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">III. El buen uso que el COMODATARIO le dará al vehículo.</td>
          </tr>
          <tr>
            <td colspan="2">IV. El Comodatario se obliga a proveer y prever los máximos cuidados en la conservación del bien y hacer todas las reparaciones necesarias que del uso del bien se deriven, así como ser y hacerse  responsable de todos los daños y perjuicios que pudiera causar a un tercero por el proceder de su negligencia deslindando al comodante de toda responsabilidad jurídica o administrativa que pudiera afectarle en su patrimonio.</td>
          </tr>
          <tr>
            <td colspan="2">V. La duración del contrato será de dos años forzoso para el Comodatario y voluntario para el Comodante por lo cual lo podrá dar por terminado en cualquier momento sin ninguna responsabilidad.</td>
          </tr>
          <tr>
            <td colspan="2">VI. La devolución del bien ya puntualizado, después de haber transcurrido el término señalado en el punto anterior, deberá ser en el domicilio antes citado del Comodante o en el lugar donde este tenga su residencia.</td>
          </tr>
          <tr>
            <td colspan="2" id="valor2">VII. En caso de que el bien llegara a perderse, o quedara inservible, ambas partes comodante y comodatario, están conformes en que, si la pérdida del objeto se deriva de una culpa del comodatario, esté deberá pagar la cantidad de $<span></span>. En un plazo no mayor de 5 días contados a partir del evento. Esta cláusula quedara sin ningún efecto si la pérdida del objeto se deriva de un caso fortuito o fuerza mayor.</td>
          </tr>
          <tr>
            <td colspan="2">VIII.- Ambas partes convienen en que el bien mueble otorgado al Comodatario en comodato es en forma personalísima y responderá por cualquier daño que por su negligencia causare en el mismo, razón por lo que desde este momento se prohíbe al comodatario prestar, arrendar o por cualquier medio ceder en parte o en todo la posesión y uso del bien mueble que le es otorgado en comodato a un tercero en el presente contrato y que quedo debidamente descrito con anterioridad.</td>
          </tr>
          <tr>
            <td colspan="2">IX.- Para el caso de que se termine la relación contractual en el presente contrato, el Comodatario se obliga a hacer la devolución inmediata  del bien mueble en el domicilio del Comodante, previo inventario del estado que guarda el bien mueble, por escrito firmado por ambas partes, que servirá como el recibo más amplio que a derecho corresponda. Por lo anterior y a para el caso de que al terminar la relación en el presente contrato, el comodatario no haga la entrega del bien mueble otorgado en comodato descrito anteriormente, se estará a lo dispuesto en el Código Penal Para el Estado de México en sus Artículos 302 y 303  en su fracción III, al tipificarse el ABUSO DE CONFIANZA artículos que se insertan en el presente contrato y se transcriben a la letra:
            </td>
          </tr>                    
          <tr>
            <td colspan="2">
              “ARTICULO 302.- Comete el delito de abuso de confianza, el que con perjuicio de alguien disponga para si o para otro de cualquier bien ajeno mueble, del que se le hubiese transmitido la tenencia y no el dominio.
            ARTÍCULO 303.- Se equipara el delito de abuso de confianza: III.- La ilegitima posesión de bien retenido, si el tenedor o poseedor no lo devuelve a pesar de ser requerido formalmente por quien tenga derecho o no lo entregue a la autoridad para que este disponga del mismo conforme a la ley…”     </td>
          </tr>
          <tr>
            <td colspan="2">X.- Para todo lo relativo a la interpretación, cumplimiento y ejecución del presente contrato las partes se someten expresamente a la Jurisdicción de los Tribunales competentes en la Ciudad de México, Distrito Federal y renuncian por lo tanto a cualquier otra jurisdicción que pudiere corresponderles por razón de su domicilio presente o futuro.
            Ambas partes manifiestan que están en pleno uso de sus facultades físicas y mentales y que son capaces para celebrar el contrato de comodato que en este escrito se contiene, firmándose un original y una copia, por todas las personas que en el mismo aparecen bajo diferentes caracteres.</td>
          </tr>                 
          <tr>
            <td height="50" width="100%" colspan="4"></td>
          </tr>
          <tr>
            <td width="50%" align="center"><?= $this->session->userdata('nombre') ?></td>
            <td width="50%" align="center"><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
          </tr>
          <tr>
            <td align="center">COMODANTE</td>
            <td align="center">COMODATARIO</td>
          </tr>
          <tr>
            <td height="50" width="100%" colspan="4"></td>
          </tr>
          <tr>
            <td width="50%" align="center">Testigo</td>
            <td width="50%" align="center">Testigo</td>
          </tr>
        </tbody>
      </table>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <table width="100%" class="table" style="font-size: 10px;text-align: center;text-transform: uppercase;">
        <tr>
          <td>
            
          </td>
          <td style="text-align: center;">
            <strong>LA UNIDAD ES TU RESPONSABILIDAD</strong>
          </td>
          <td style="text-align: center;">
            <strong>EL ASIGNADO:</strong>
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>DEBE CHECAR NIVELES</strong>
          </td>
          <td>
            Todos los días deberá realizarlo y reportar cualquier anomalia a control vehicular.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>DEBE CHECAR LLANTAS</strong>
          </td>
          <td>
            Ya sea inflado de aire o atención a ponchaduras debiendoló reportar a control vehicular con fotos en el chat de mantenimiento, gasolina foranea o el del proyecto y reporte, para reembolso de la misma con nota por la talacha.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>CHECAR LUCES</strong>
          </td>
          <td>
            Reportar fundición de focos en tiempo y forma, presencial en el taller.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>REPORTAR RUIDOS Y DESPERFECTOS</strong>
          </td>
          <td>
            En caso de desperfectos mecanicos reportarlo con personal de taller mecanico presencial y/o monitoreo via remota.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>LLAMAR AL SEGURO EN CASO DE SINIESTRO</strong>
          </td>
          <td>
            En la poliza se encuentra el numero telefonico y despues llamar a control vehicular, RECABAR DOCUMENTACIÓN DEL SEGURO Y ENTREGA A CONTROL VEHICULAR PARA SEGUIMIENTO DE SINIESTRO/ojo*** en caso de no ser responsable, asegurarse que el seguro de pase a taller sin deducible.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>CHECAR TAPONES , BAYONETAS, LLANTAS DE REFACCION Y DOCUMENTOS</strong>
          </td>
          <td>
            Verificar continuamente que se encuentre completo según entrega.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>MULTAS</strong>
          </td>
          <td>
            Tendrá que acatar las leyes de transito, ya que será responsable de las multas o infracción del vehiculo.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>RESGUARDO EN DOMICILIO</strong>
          </td>
          <td>
            En caso de autorización tiene que tener donde resguardar la unidad de manera segura.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>ENTREGA DE UNIDAD DESPUES DE ASIGNACION</strong>
          </td>
          <td>
            Al termino de asignación/proyecto , se devolverá la unidad haciendo check list de auto/adeudos/ estado general/ multas.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>VERIFICACIONES , CAMBIOS DE UNIDAD Y/O MANTENIMIENTO</strong>
          </td>
          <td>
            Tendra que atender a las solicitudes de control vehicular por asi convenir a sus intereses, ya sea para verificación de unidad, cambio de unidad, programación mecanica, etc.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>RESGUARDO EN BODEGA</strong>
          </td>
          <td>
            Se deberá atender el resguardo de unidad en Bodega y cumplir con el espacio asignado , no esta autorizado el uso de las unidades para ir entre patios de Estevezjor, la unidad tendra que salir hasta el momento de atender asignación de trabajo en campo, en caso de tener necesidades de movilidad entre patios Filiberto Gomex 46 y 104 ir caminando ya sea atención de RH, operativa, etc.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>REPORTAR ACTIVIDADES A MONITOREO</strong>
          </td>
          <td>
            El supervisor o el asignado deberá reportar ubicaciones y actividades para monitoreo.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>LIMPIEZA DE UNIDAD</strong>
          </td>
          <td>
            Será responsable de mantener limpia la unidad.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>GESTORIAS E INCIDENCIAS EN CAMPO</strong>
          </td>
          <td>
            Reportar a sus supervisores en primera instancia, ellos tendran que validar la información y solicitar el apoyo a quien corresponda, control vehicular, juridico.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>LLAVES EN VIGILANCIA</strong>
          </td>
          <td>
            En cualquier bodega al llegar y al resguardar, las llaves tendran que entregarse a vigilancia para atender movilidad en patios, debido a que no se cuentan con lugares exclusivos de estacionamiento por el espacio reducido.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>ATENCION DE CARGA DE GASOLINA</strong>
          </td>
          <td>
            Lunes , Miercoles y Viernes de 8am a 10 am y en turno nocturno de 8:30 a 9:30 pm mismos dias, para autos de resguardo en Patios de Filiberto Gomez, según esquema de carga, no deberá circular auto con gasolina menor a 1/4 del tanque.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>CARGA ADECUADA</strong>
          </td>
          <td>
            Vigilar no rebasar las capacidades de carga y de uso de cada unidad.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>LICENCIA VIGENTE OBLIGATORIA</strong>
          </td>
          <td>
            Es su responsabilidad tenerla presencialmente siempre.
          </td>
        </tr>

        <tr>
          <td style="border: solid 1px black;">
            
          </td>
          <td style="text-align: center;">
            <strong>EL VEHICULO ES UNA HERRAMIENTA DE TRABAJO,no para uso personal</strong>
          </td>
          <td>
            <strong>LA ASIGNACION ES INTRANSFERIBLE</strong>
          </td>
        </tr>
      </table>

      <center>
        <br><br>
      <table width="100%" border="1" style="font-size: 10px;text-align: center;text-transform: uppercase;">
        <tr>
          <td style="text-align: center;">
            <strong></strong>
          </td>
          <td>
            <strong></strong>
          </td>
        </tr>

        <?php foreach($personal_control_vehicular as $personal) { ?>
        <tr>
          <td style="text-align: center;">
            <?= $personal['nombre'] ?>
          </td>
          <td>
            <strong><?= $personal['perfil'] ?></strong>
          </td>
        </tr>
        <?php } ?>
      </table>
      </center>

      <br><br><br><br><br>
      <center>
      <table width="100%" style="font-size: 10px;text-align: center;text-transform: uppercase;">
        <tr>
          <td style="text-align: center;">_____________________________________</td>
        </tr>

        <tr>
          <td style="text-align: center;">FIRMA</td>
        </tr>

      </table>
      </center>
    </div>
  </div>
<?php elseif($tipo=='herramienta'): ?>
  <script>
    $(document).ready(function() {
      $('#observacion').change(function(event) {
        $('#observaciones').html(this.value);
      });
      $('#generar-documentos').click(function(event) {
        Swal.fire({
          title: '¡Atención!',
          text: "¿Desea generar documentos con la información actual?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar'
        }).
        then((result) => {
          if (result.value) {
            if($('#table_material tr').length>1){
              $('#bandera').val('true');
              $("#salida_material").print({
                iframe : true,
                globalStyles: true,
                mediaPrint: true,
                noPrintSelector :'.no-print'
              });
            } else {
              Toast.fire({
                type: 'error',
                title: 'Seleccione al menos un item de la lista.'
              })
            }
          }
        })
      });

      $("#form-asignacion").on("submit", function(event){
        var $form = $(this);
        var submitButton = $form.find('input[type="submit"]');
        if($('#bandera').val()=='true'){
          var f = $(this);
          if (event.isDefaultPrevented()) {
            console.log('Error')
          } else {
            if($form[0].checkValidity())
              submitButton.prop("disabled", "true");
            event.preventDefault();
            var formData = new FormData(document.getElementById("form-asignacion"));
            $.ajax({
              url: "<?= base_url()?>almacen/guardar-asignacion-herramienta",
              type: "post",
              dataType: "json",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              complete: function(res){
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if(resp.status){
                  location.href ="<?php echo base_url().'personal/detalle/'.$uid_usuario ?>";
                }else{
                  Toast.fire({
                    type: 'error',
                    title: resp.message
                  });
                  submitButton.prop("disabled", "false");
                }
              }
            });
          }
        } else {
          event.preventDefault();
          Toast.fire({
            type: 'error',
            title: 'Debe generar los documentos para ser adjuntados.'
          })
        }
      });

      function mostrarDatos(valorBuscar, pagina){
        $.ajax({
          url: "<?= base_url() ?>almacen/continuar_asignacion_paginacion",
          type: "POST",
          data: {
            buscar:valorBuscar,
            nropagina:pagina,
            uid_asignacion:'<?= $uid_asignacion ?>',
            uid_usuario:'<?= $uid_usuario ?>'
          },
          dataType: "json",
          success:function(response) {
            console.log(response);
            var tabla = $("#tabla").DataTable();
            $.each(response.inventario_almacen,function(key,item) {
              var imagenes = JSON.parse(item.imagenes); 
              var fila = $("<tr><td>" + item.uid + "</td><td>" + item.marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion + "</td><td>" + item.numero_serie + "</td><td>" + item.numero_interno + "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td><td title='" + item.categoria + "'>" + item.abreviatura + "</td><td>" + item.nota + "</td><td><input class='asignacion' type='checkbox' name='asignacion[]' data-marca='" + item.marca + "' data-modelo='" + item.modelo + "' data-categoria='" + item.categoria + "' data-estado='" + item.estado + "' data-precio='" + item.precio + "' data-descripcion='" + item.descripcion + "' data-numero='" + item.numero_interno + "' data-serie='" + item.numero_serie + "' data-uid='" + item.uid + "' value='" + item.iddtl_almacen + "'></td></tr>");
              fila.on("change", "input" , function(event) {
                if (this.checked) {
                  if($(this).data('estado') == 'nuevo'){
                    var estado = '<td style="text-align:center;">X</td><td></td><td></td><td></td>';
                  }else if($(this).data('estado') == 'usado'){
                    var estado = '<td></td><td style="text-align:center;">X</td><td></td><td></td>';
                  }else if($(this).data('estado') == 'rayado'){
                    var estado = '<td></td><td></td><td style="text-align:center;">X</td><td></td>';
                  }else if($(this).data('estado') == 'fracturado'){
                    var estado = '<td></td><td></td><td></td><td style="text-align:center;">X</td>';
                  }else{
                    var estado = '<td></td><td></td><td></td><td></td>';
                  }
                  $('#table_material tr:last').after('<tr id="'+this.value+'"><td>'+$(this).data('categoria')+'</td><td>'+$(this).data('descripcion')+' '+$(this).data('marca')+'</td><td>'+$(this).data('modelo')+'</td><td>Serie: '+$(this).data('serie')+', ID: '+$(this).data('numero')+'</td>'+estado+'<td>'+$(this).data('precio')+'</td>'+'</tr>');  
                  $("#form-asignacion").append(
                    $('<input>')
                   .attr('type', 'hidden')
                   .attr('id', $(this).data('uid'))
                   .attr('name', 'asignacion[]')
                   .val(this.value)
                  )
                } else {
                  $('#'+this.value).remove(); 
                  $('#'+$(this).data('uid')).remove(); 
                }
              });
              tabla.row.add(fila).draw();
            });
          }
        });
      }
      $('#cancelar').click(function(event) {
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la asignación?",
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
    event.preventDefault();
    //alert(document.getElementById("formuploadajax_cancel_asignacion"));
    //var formData = new FormData(document.getElementById("formuploadajax-cancel-asignacion"));
    var folio = $('#folio').val();
    var token = $('#token').val();
    var comentarios = $('#comentarios').val();
    $.ajax({
      url: "<?= base_url()?>almacen/cancelar-asignacion",
      type: "POST",
      dataType: "json",
      data: {folio: folio, comentarios:comentarios, token:token},
      //cache: false,
      //contentType: false,
      //processData: false,
      complete: function (res) {
        var resp = JSON.parse(res.responseText);
        if (resp.error == false) {
          $('#cancelarModal').modal('hide');
          $('.ocultar').hide();
          Swal.fire(
            '¡Exitoso!',
            resp.mensaje,
            'success'
            )
          location.href="<?= base_url() ?>almacen/asignaciones/alto-costo";
        } else {
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          })
        }
      }
    });
  });
      $('input[name="busqueda"]').css("display", "none");
      mostrarDatos("", 1);
    });
  </script>
  <style type="text/css" media="print">
    @media print {
      #salida_material{
        padding-top: 0;
      }
      body{
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
      }
    }
  </style>
  <div class="container-fluid">
    <div class="card" id="salida_material" >
    
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
                                <strong>C&oacute;digo: ANEXO DIB 003</strong>
                            </th>
                        </tr>
                        <tr>
                            <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center; font-size: 20px;">
                                ASIGNACIÓN DE BIENES
                            </th>
                            <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center; font-size: 20px;">
                                Revisión: 00
                            </th>
                        </tr>
                    </thead>
            </table>

            <br><br>
     
      <table width="100%" class="table">
        <tbody>          
          <tr>
            <td colspan="2">
              Nombre completo: <?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?>
            </td>
          </tr>
          <tr>
            <td>
              Proyecto: <?= $detalle->nombre_proyecto ?>
            </td>
            <td>
              Fecha: <?= date('Y-m-d') ?>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              &nbsp;
            </td>
          </tr>
        </tbody>
        </table>
        <br>
        <table class="" id="table_material" style="width:100%" border="1" cellpadding="4" cellspacing="0">
        <thead>
          <tr>
            <th rowspan="2">Activo</th>
            <th rowspan="2">Tipo de equipo</th>
            <th rowspan="2">Modelo</th>
            <th rowspan="2">N° de Serie/IMEI</th>
            <th colspan="4">Estado Físico</th>
            <th rowspan="2">Importe</th>
          </tr>
          <tr>
            <th>Nuevo</th>
            <th>Usado</th>
            <th>Rayado</th>
            <th>Fracturado</th>
          </tr>
        </thead>
        <tbody>
        
        </tbody>
        </table>
        <br>
        <table class="" style="width:100%" border="1" cellpadding="4" cellspacing="0">
        <thead>
          <th style="text-align: center;">Comentarios u Observaciones</th>
        </thead>
        <tbody>
          
          <td colspan="4" id="observaciones"></td>
        </tbody>
        </table>
        
        <br><br>
        <table class="table">
          <tbody>
          <tr>
            <td colspan="2">
            Hago constar que dichos materiales los recibo nuevos y de la calidad y demás condiciones para el trabajo, por lo que me obligo en términos del artículo 134 fracciones I y VI y 135 fracciones III y IX de la Ley Federal Del Trabajo a              conservarlos en buen estado; a utilizarlos para el uso que están destinados dentro de mi puesto y área de trabajo; así como restituirlos única y exclusivamente mediante un canje del usado por otro en mejores condiciones y/o nuevo, el cual lo proporcionara el área autorizada, responsabilizándome de los mismos bajo cualquier circunstancia, aceptando que en caso de pérdida o mal uso sean descontados en términos del artículo 110 fracción I de la Ley Federal Del Trabajo de mi salario, entiendo que salvo por caso **fortuito o fuerza mayor**, se me condonaría del pago de la herramienta y/o materiales en mención.
** Este será valorado por el Área de Recursos Humanos y el área responsable.

            </td>
          </tr>                                                                                                                                  
          <tr>
            <td height="50" width="100%" colspan="4"></td>
          </tr>          
          <tr>
            <td align="center">Entrega</td>
            <td align="center">Recibe</td>
          </tr>
          <tr>
            <td height="50" width="100%" colspan="4"></td>
          </tr>
          <tr>
          <td width="50%" align="center"><?= $this->session->userdata('nombre') ?></td>
          <td width="50%" align="center"><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<?php else: ?>
  <script>
    $(document).ready(function() {
      
      $('#observacion').change(function(event) {
        $('#observaciones').html(this.value);
      });
      $('#generar-documentos').click(function(event) {
        if($('#table_material tr').length>1){
          Swal.fire({
            title: '¿Desea generar documentos con la información actual?',
            html: $('#table_material'),
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
          }).
          then((result) => {
            if (result.value) {
              $('#bandera').val('true');
              $("#salida_material").print({
                iframe : true,
                globalStyles: true,
                mediaPrint: true,
                noPrintSelector :'.no-print'
              });
            }
          })
        } else {
          Toast.fire({
            type: 'error',
            title: 'Seleccione al menos un item de la lista.'
          })
        }
      });
      $("#form-asignacion").on("submit", function(event){
        var $form = $(this);
        var submitButton = $form.find('input[type="submit"]');
        if($('#bandera').val()=='true'){
          var f = $(this);
          if (event.isDefaultPrevented()) {
            console.log('Error')
          } else {
            if($form[0].checkValidity())
              submitButton.prop("disabled", "true");
            event.preventDefault();
            table_without.$('input').each(function(){
              // If checkbox doesn't exist in DOM
              // If checkbox is checked
              if(this.checked){
                // Create a hidden element 
                $form.append(
                  $('<input>')
                  .attr('type', 'hidden')
                  .attr('name', this.name)
                  .val(this.value)
                );
              }         
            });
            var formData = new FormData(document.getElementById("form-asignacion"));
            $.ajax({
              url: "<?= base_url()?>almacen/guardar-asignacion-material",
              type: "post",
              dataType: "json",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              complete: function(res){
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if(resp.status){
                  location.href ="<?php echo base_url().'personal/detalle/'.$uid_usuario ?>";
                }else{
                  Toast.fire({
                    type: 'error',
                    title: resp.message
                  });
                  submitButton.prop("disabled", "false");
                }
              }
            });
          }
        } else {
          event.preventDefault();
          Toast.fire({
            type: 'error',
            title: 'Debe generar los documentos para ser adjuntados.'
          })
        }
      });

      $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar,1);
      });

      $("body").on("click",".paginacion li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar,valorHref);
      });

      function mostrarDatos(valorBuscar, pagina){
        $.ajax({
          url: "<?= base_url() ?>almacen/continuar_asignacion_paginacion",
          type: "POST",
          data: {
            buscar:valorBuscar,
            nropagina:pagina,
            uid_asignacion:'<?= $uid_asignacion ?>',
            uid_usuario:'<?= $uid_usuario ?>'
          },
          dataType: "json",
          success:function(response) {
            console.log(response);
            filas = "";
            $.each(response.inventario_almacen,function(key,item) {
              var imagenes = JSON.parse(item.imagenes); 
              filas += "<tr><td>" + item.uid + "</td><td>" + item.marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion + "</td><td>" + item.numero_serie + "</td><td>" + item.numero_interno + "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td><td title='" + item.categoria + "'>" + item.abreviatura + "</td><td>" + item.nota + "</td><td><input class='asignacion' type='number' name='asignacion_cantidad[]' value='0' minlength='0' maxlength='" + item.existencias + "' data-marca='" + item.marca + "' data-modelo='" + item.modelo + "' data-descripcion='" + item.descripcion + "' data-uid='" + item.uid + "'><input type='hidden' name='asignacion[]' value='" + item.iddtl_almacen + "'></td></tr>";
            });
            $('#tabla tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.count;
            
            //cantidad de registros por página
            cantidadRegistros = 10;

            numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            
            if(linkSeleccionado > 1) {
              paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
              paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
            }
            else {
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if(numeroLinks > cant) {
              pagRestantes = numeroLinks - linkSeleccionado;
              pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            }
            else {
              pagFin = numeroLinks;
            }
            for(var i = pagInicio; i <= pagFin; i++) {
              if(i == linkSeleccionado) {
                paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
              }
              else {
                paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
              }
            }
            if(linkSeleccionado < numeroLinks) {
              paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
              paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
            }
            else {
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
              paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion").html(paginador);
            $('.asignacion').change(function(event) {
              if (this.value>0) {
                $('#'+$(this).data('uid')).remove();
                $('#table_material tr:last').after('<tr id="'+$(this).data('uid')+'"><td>'+$(this).data('descripcion')+' '+$(this).data('modelo')+' ('+$(this).data('marca')+')</td><td>'+this.value+'</td></tr>');  
              } else {
                $('#'+$(this).data('uid')).remove();
              }
            });
          }
        });
      }
      mostrarDatos("", 1);

    });
  </script>
  <style type="text/css" media="print">
    @media print {
      #salida_material{
        padding-top: 0;
      }
      body{
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
      }
    }
  </style>
  <div class="container-fluid">
    <div class="card" id="salida_material" >
      <table width="100%" class="table table-bordered">
        <thead>
          <tr>
            <th style="text-align: center" width="25%"><img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 150px;"></th>
            <th colspan="2" width="50%" style="vertical-align: middle; text-align: center"><h3>ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.</h3></th>
            <th style="vertical-align: middle; text-align: center" width="25%"><h3>Folio: <?php echo $folio ?></h3></th>
          </tr> 
          <tr>
            <th colspan="4" style="text-align: center"><h4>RECIBO EQUIPO DE TRABAJO</h4></th>
          </tr>
          <tr>
            <td colspan="4" style="text-align: center">Con esta fecha recibí a mi entera satisfacción de la Empresa ESTEVEZ.JOR SERVICIOS, S.A. DE C.V. las HERRAMIENTAS DE TRABAJO que a continuación se detallan:</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="4">
              <table width="100%" id="table_material" class="table table-bordered">
                <thead>
                  <tr>
                    <td><strong>Herramienta</strong></td>
                    <td><strong>Cantidad</strong></td>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td align="center" colspan="4">Observaciones</td>
          </tr>
          <tr>
            <td colspan="4" id="observaciones"></td>
          </tr>
          <tr>
            <td colspan="4">Proyecto: <?= $detalle->numero_proyecto ?> <?= $detalle->nombre_proyecto ?></td>
          </tr>
          <tr>
            <td colspan="4">Hago constar que dichos materiales los recibo nuevos y de la calidad y demás condiciones para el trabajo, por lo que me obligo en términos del artículo 134 fracción VI y 135 fracciones III y IX de la Ley Laboral a conservarlos en buen estado; a utilizarlos para el uso que están destinados dentro de mi puesto y área de trabajo; así como restituirlos única y exclusivamente mediante un canje del usado por otro en mejores condiciones y/o nuevo, el cual lo proporcionara el área de Almacén de materiales y  herramientas, responsabilizándome de los mismos bajo cualquier circunstancia, aceptando que en caso de pérdida o mal uso sean descontados de mi paga, entiendo que salvo por caso **fortuito o fuerza mayor**, se me condonaría del pago de la herramienta y/o materiales en mención. <br> ** Este será valorado por el Área de Recursos Humanos y Materiales.
            </td>
          </tr>
          <tr>
            <td colspan="4" align="center">Tlalnepantla de Baz, Estado de México a <?= strftime('%d de %B del %Y') ?></td>
          </tr>
          <tr>
            <td height="70" width="100%" colspan="4"></td>
          </tr>
          <tr>
            <td colspan="2" width="50%" align="center"><?= $this->session->userdata('nombre') ?></td>
            <td colspan="2" width="50%" align="center"><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
          </tr>
          <tr>
            <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
            <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<?php endif ?>
<?php
  function numletras($numero, $_moneda) {
    $numero = str_replace(',', '', $numero);
    /* 
    $numero=valor a retornar en letras. 
    $_moneda=1=Colones, 2=Dólares 3=Euros 
    Las siguientes funciones (unidad() hasta milmillon() forman parte de ésta función 
    */
    switch ($_moneda) {
      case 'p':
        $_nommoneda = 'PESOS';
        $_fin       = ' M.N.';
        break;
      case 'd':
        $_nommoneda = 'DÓLARES';
        $_fin       = ' DLS.';
        break;
    } //$_moneda
    //*** 
    $tempnum = explode('.', $numero);
    if ($tempnum[0] !== "") {
      $numf = milmillon($tempnum[0]);
      if ($numf == "UNO") {
        $numf = substr($numf, 0, -1);
      } //$numf == "UNO"
      $TextEnd = $numf . ' ';
      $TextEnd .= $_nommoneda . ' ';
    } //$tempnum[0] !== ""
    if ($tempnum[1] == "" || $tempnum[1] >= 100) {
      $tempnum[1] = "00";
    } //$tempnum[1] == "" || $tempnum[1] >= 100
    $TextEnd .= $tempnum[1];
    $TextEnd .= "/100" . $_fin;
    return $TextEnd;
  }
  function unidad($numuero) {
    switch ($numuero) {
      case 9:
        $numu = "NUEVE";
        break;
      case 8:
        $numu = "OCHO";
        break;
      case 7:
        $numu = "SIETE";
        break;
      case 6:
        $numu = "SEIS";
        break;
      case 5:
        $numu = "CINCO";
        break;
      case 4:
        $numu = "CUATRO";
        break;
      case 3:
        $numu = "TRES";
        break;
      case 2:
        $numu = "DOS";
        break;
      case 1:
        $numu = "UNO";
        break;
      case 0:
        $numu = "";
        break;
    } //$numuero
    return $numu;
  }
  function decena($numdero) {
    if ($numdero >= 90 && $numdero <= 99) {
      $numd = "NOVENTA ";
      if ($numdero > 90)
        $numd = $numd . "Y " . (unidad($numdero - 90));
    } //$numdero >= 90 && $numdero <= 99
    else if ($numdero >= 80 && $numdero <= 89) {
      $numd = "OCHENTA ";
      if ($numdero > 80) {
        $numd = $numd . "Y " . (unidad($numdero - 80));
      } //$numdero > 80
    } //$numdero >= 80 && $numdero <= 89
    else if ($numdero >= 70 && $numdero <= 79) {
      $numd = "SETENTA ";
      if ($numdero > 70)
        $numd = $numd . "Y " . (unidad($numdero - 70));
    } //$numdero >= 70 && $numdero <= 79
    else if ($numdero >= 60 && $numdero <= 69) {
      $numd = "SESENTA ";
      if ($numdero > 60) {
        $numd = $numd . "Y " . (unidad($numdero - 60));
      } //$numdero > 60
    } //$numdero >= 60 && $numdero <= 69
    else if ($numdero >= 50 && $numdero <= 59) {
      $numd = "CINCUENTA ";
      if ($numdero > 50)
        $numd = $numd . "Y " . (unidad($numdero - 50));
    } //$numdero >= 50 && $numdero <= 59
    else if ($numdero >= 40 && $numdero <= 49) {
      $numd = "CUARENTA ";
      if ($numdero > 40)
        $numd = $numd . "Y " . (unidad($numdero - 40));
    } //$numdero >= 40 && $numdero <= 49
    else if ($numdero >= 30 && $numdero <= 39) {
      $numd = "TREINTA ";
      if ($numdero > 30)
        $numd = $numd . "Y " . (unidad($numdero - 30));
    } //$numdero >= 30 && $numdero <= 39
    else if ($numdero >= 20 && $numdero <= 29) {
      if ($numdero == 20) {
        $numd = "VEINTE ";
      } //$numdero == 20
      else {
        $numd = "VEINTI" . (unidad($numdero - 20));
      }
    } //$numdero >= 20 && $numdero <= 29
    else if ($numdero >= 10 && $numdero <= 19) {
      switch ($numdero) {
        case 10:
          $numd = "DIEZ ";
          break;
        case 11:
          $numd = "ONCE ";
          break;
        case 12:
          $numd = "DOCE ";
          break;
        case 13:
          $numd = "TRECE ";
          break;
        case 14:
          $numd = "CATORCE ";
          break;
        case 15:
          $numd = "QUINCE ";
          break;
        case 16:
          $numd = "DIECISEIS ";
          break;
        case 17:
          $numd = "DIECISIETE ";
          break;
        case 18:
          $numd = "DIECIOCHO ";
          break;
        case 19:
          $numd = "DIECINUEVE ";
          break;
      } //$numdero
    } //$numdero >= 10 && $numdero <= 19
    else {
      $numd = unidad($numdero);
    }
    return $numd;
  }
  function centena($numc) {
    if ($numc >= 100) {
      if ($numc >= 900 && $numc <= 999) {
        $numce = "NOVECIENTOS ";
        if ($numc > 900)
          $numce = $numce . (decena($numc - 900));
      } //$numc >= 900 && $numc <= 999
      else if ($numc >= 800 && $numc <= 899) {
        $numce = "OCHOCIENTOS ";
        if ($numc > 800)
          $numce = $numce . (decena($numc - 800));
      } //$numc >= 800 && $numc <= 899
      else if ($numc >= 700 && $numc <= 799) {
        $numce = "SETECIENTOS ";
        if ($numc > 700)
          $numce = $numce . (decena($numc - 700));
      } //$numc >= 700 && $numc <= 799
      else if ($numc >= 600 && $numc <= 699) {
        $numce = "SEISCIENTOS ";
        if ($numc > 600)
          $numce = $numce . (decena($numc - 600));
      } //$numc >= 600 && $numc <= 699
      else if ($numc >= 500 && $numc <= 599) {
        $numce = "QUINIENTOS ";
        if ($numc > 500)
          $numce = $numce . (decena($numc - 500));
      } //$numc >= 500 && $numc <= 599
      else if ($numc >= 400 && $numc <= 499) {
        $numce = "CUATROCIENTOS ";
        if ($numc > 400)
          $numce = $numce . (decena($numc - 400));
      } //$numc >= 400 && $numc <= 499
      else if ($numc >= 300 && $numc <= 399) {
        $numce = "TRESCIENTOS ";
        if ($numc > 300)
          $numce = $numce . (decena($numc - 300));
      } //$numc >= 300 && $numc <= 399
      else if ($numc >= 200 && $numc <= 299) {
        $numce = "DOSCIENTOS ";
        if ($numc > 200)
          $numce = $numce . (decena($numc - 200));
      } //$numc >= 200 && $numc <= 299
      else if ($numc >= 100 && $numc <= 199) {
        if ($numc == 100)
          $numce = "CIEN ";
        else
          $numce = "CIENTO " . (decena($numc - 100));
      } //$numc >= 100 && $numc <= 199
    } //$numc >= 100
    else
      $numce = decena($numc);
    return $numce;
  }
  function miles($nummero) {
    if ($nummero >= 1000 && $nummero < 2000) {
      $numm = "MIL " . (centena($nummero % 1000));
    } //$nummero >= 1000 && $nummero < 2000
    if ($nummero >= 2000 && $nummero < 10000) {
      $numm = unidad(Floor($nummero / 1000)) . " MIL " . (centena($nummero % 1000));
    } //$nummero >= 2000 && $nummero < 10000
    if ($nummero < 1000)
      $numm = centena($nummero);
    return $numm;
  }
  function decmiles($numdmero) {
    if ($numdmero == 10000)
      $numde = "DIEZ MIL";
    if ($numdmero > 10000 && $numdmero < 20000) {
      $numde = decena(Floor($numdmero / 1000)) . "MIL " . (centena($numdmero % 1000));
    } //$numdmero > 10000 && $numdmero < 20000
    if ($numdmero >= 20000 && $numdmero < 100000) {
      $numde = decena(Floor($numdmero / 1000)) . " MIL " . (miles($numdmero % 1000));
    } //$numdmero >= 20000 && $numdmero < 100000
    if ($numdmero < 10000)
      $numde = miles($numdmero);
    return $numde;
  }
  function cienmiles($numcmero) {
    if ($numcmero == 100000)
      $num_letracm = "CIEN MIL";
    if ($numcmero >= 100000 && $numcmero < 1000000) {
      $num_letracm = centena(Floor($numcmero / 1000)) . " MIL " . (centena($numcmero % 1000));
    } //$numcmero >= 100000 && $numcmero < 1000000
    if ($numcmero < 100000)
      $num_letracm = decmiles($numcmero);
    return $num_letracm;
  }
  function millon($nummiero) {
    if ($nummiero >= 1000000 && $nummiero < 2000000) {
      $num_letramm = "UN MILLON " . (cienmiles($nummiero % 1000000));
    } //$nummiero >= 1000000 && $nummiero < 2000000
    if ($nummiero >= 2000000 && $nummiero < 10000000) {
      $num_letramm = unidad(Floor($nummiero / 1000000)) . " MILLONES " . (cienmiles($nummiero % 1000000));
    } //$nummiero >= 2000000 && $nummiero < 10000000
    if ($nummiero < 1000000)
      $num_letramm = cienmiles($nummiero);
    return $num_letramm;
  }
  function decmillon($numerodm) {
    if ($numerodm == 10000000)
      $num_letradmm = "DIEZ MILLONES";
    if ($numerodm > 10000000 && $numerodm < 20000000) {
      $num_letradmm = decena(Floor($numerodm / 1000000)) . "MILLONES " . (cienmiles($numerodm % 1000000));
    } //$numerodm > 10000000 && $numerodm < 20000000
    if ($numerodm >= 20000000 && $numerodm < 100000000) {
      $num_letradmm = decena(Floor($numerodm / 1000000)) . " MILLONES " . (millon($numerodm % 1000000));
    } //$numerodm >= 20000000 && $numerodm < 100000000
    if ($numerodm < 10000000) {
      $num_letradmm = millon($numerodm);
    } //$numerodm < 10000000
    return $num_letradmm;
  }
  function cienmillon($numcmeros) {
    if ($numcmeros == 100000000)
      $num_letracms = "CIEN MILLONES";
    if ($numcmeros >= 100000000 && $numcmeros < 1000000000) {
      $num_letracms = centena(Floor($numcmeros / 1000000)) . " MILLONES " . (millon($numcmeros % 1000000));
    } //$numcmeros >= 100000000 && $numcmeros < 1000000000
    if ($numcmeros < 100000000)
      $num_letracms = decmillon($numcmeros);
    return $num_letracms;
  }
  function milmillon($nummierod) {
    if ($nummierod >= 1000000000 && $nummierod < 2000000000) {
      $num_letrammd = "MIL " . (cienmillon($nummierod % 1000000000));
    } //$nummierod >= 1000000000 && $nummierod < 2000000000
    if ($nummierod >= 2000000000 && $nummierod < 10000000000) {
      $num_letrammd = unidad(Floor($nummierod / 1000000000)) . " MIL " . (cienmillon($nummierod % 1000000000));
    } //$nummierod >= 2000000000 && $nummierod < 10000000000
    if ($nummierod < 1000000000)
      $num_letrammd = cienmillon($nummierod);
    return $num_letrammd;
  }
?>
<script>
    /*
      El siguiente codigo en JS Contiene mucho codigo
      de las siguietes 3 fuentes:
      https://stipaltamar.github.io/dibujoCanvas/
      https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
      http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
    */

    (function() { // Comenzamos una funcion auto-ejecutable

      // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
      window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimaitonFrame ||
          function (callback) {
            window.setTimeout(callback, 1000/60);
            // Retrasa la ejecucion de la funcion para mejorar la experiencia
          };
      })();

      // Traemos el canvas mediante el id del elemento html
      var canvas = document.getElementById("draw-canvas");
      var ctx = canvas.getContext("2d");


      // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
      var drawText = document.getElementById("draw-dataUrl");
      var drawImage = document.getElementById("draw-image");
      var clearBtn = document.getElementById("draw-clearBtn");
      var submitBtn = document.getElementById("draw-submitBtn");
      clearBtn.addEventListener("click", function (e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        verImagen();
        drawImage.setAttribute("src", "");
        $('#draw-submitBtn').attr("disabled", false);
        $('#draw-submitBtn').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn").html('<i class="fa fa-ban"></i> Crear Imagen');
      }, false);
      // Definimos que pasa cuando el boton draw-submitBtn es pulsado
      submitBtn.addEventListener("click", function (e) {
        var dataUrl = canvas.toDataURL();
        drawText.innerHTML = dataUrl;
        drawImage.setAttribute("src", dataUrl);
        $('#draw-submitBtn').attr("disabled", true);
        $('#draw-submitBtn').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn").html('<i class="fa fa-check"></i> Imagen Creada');
      }, false);

      // Activamos MouseEvent para nuestra pagina
      var drawing = false;
      var mousePos = { x:0, y:0 };
      var lastPos = mousePos;
      canvas.addEventListener("mousedown", function (e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint = document.getElementById("color");
        var punta = document.getElementById("puntero");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas, e);
      }, false);
      canvas.addEventListener("mouseup", function (e) {
        drawing = false;
      },  false);
      canvas.addEventListener("mousemove", function (e) {
        mousePos = getMousePos(canvas, e);
      }, false);

      // Activamos touchEvent para nuestra pagina
      canvas.addEventListener("touchstart", function (e) {
        mousePos = getTouchPos(canvas, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
      }, false);
      canvas.addEventListener("touchend", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
      }, false);
      canvas.addEventListener("touchleave", function (e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas.dispatchEvent(mouseEvent);
      }, false);
      canvas.addEventListener("touchmove", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas.dispatchEvent(mouseEvent);
      }, false);

      // Get the position of the mouse relative to the canvas
      function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: mouseEvent.clientX - rect.left,
          y: mouseEvent.clientY - rect.top
        };
      }

      // Get the position of a touch relative to the canvas
      function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        console.log(touchEvent);
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
          y: touchEvent.touches[0].clientY - rect.top
        };
      }

      // Draw to the canvas
      function renderCanvas() {
        if (drawing) {
          var tint = document.getElementById("color");
          var punta = document.getElementById("puntero");
          ctx.strokeStyle = tint.value;
          ctx.beginPath();
          ctx.moveTo(lastPos.x, lastPos.y);
          ctx.lineTo(mousePos.x, mousePos.y);
          console.log(punta.value);
          ctx.lineWidth = punta.value;
          ctx.stroke();
          ctx.closePath();
          lastPos = mousePos;
        }
      }

      function clearCanvas() {
        canvas.width = canvas.width;
      }

      // Allow for animation
      (function drawLoop () {
        requestAnimFrame(drawLoop);
        renderCanvas();
      })();

    })();

  </script>

  <script>
    /*
      El siguiente codigo en JS Contiene mucho codigo
      de las siguietes 3 fuentes:
      https://stipaltamar.github.io/dibujoCanvas/
      https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
      http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
    */

    (function() { // Comenzamos una funcion auto-ejecutable

      // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
      window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimaitonFrame ||
          function (callback) {
            window.setTimeout(callback, 1000/60);
            // Retrasa la ejecucion de la funcion para mejorar la experiencia
          };
      })();

      // Traemos el canvas mediante el id del elemento html
      var canvas2 = document.getElementById("draw-canvas2");
      var ctx2 = canvas2.getContext("2d");


      // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
      var drawText2 = document.getElementById("draw-dataUrl2");
      var drawImage2 = document.getElementById("draw-image2");
      var clearBtn2 = document.getElementById("draw-clearBtn2");
      var submitBtn2 = document.getElementById("draw-submitBtn2");
      clearBtn2.addEventListener("click", function (e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        verImagen2();
        $('#draw-submitBtn2').attr("disabled", false);
        $('#draw-submitBtn2').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn2").html('<i class="fa fa-ban"></i> Crear Imagen');
        drawImage2.setAttribute("src", "");
      }, false);
      // Definimos que pasa cuando el boton draw-submitBtn es pulsado
      submitBtn2.addEventListener("click", function (e) {
        var dataUrl = canvas2.toDataURL();
        drawText2.innerHTML = dataUrl;
        drawImage2.setAttribute("src", dataUrl);
        $('#draw-submitBtn2').attr("disabled", true);
        $('#draw-submitBtn2').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn2").html('<i class="fa fa-check"></i> Imagen Creada');
      }, false);

      // Activamos MouseEvent para nuestra pagina
      var drawing = false;
      var mousePos = { x:0, y:0 };
      var lastPos = mousePos;
      canvas2.addEventListener("mousedown", function (e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint2 = document.getElementById("color2");
        var punta2 = document.getElementById("puntero2");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas2, e);
      }, false);
      canvas2.addEventListener("mouseup", function (e) {
        drawing = false;
      },  false);
      canvas2.addEventListener("mousemove", function (e) {
        mousePos = getMousePos(canvas2, e);
      }, false);

      // Activamos touchEvent para nuestra pagina
      canvas2.addEventListener("touchstart", function (e) {
        mousePos = getTouchPos(canvas2, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas2.dispatchEvent(mouseEvent);
      }, false);
      canvas2.addEventListener("touchend", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas2.dispatchEvent(mouseEvent);
      }, false);
      canvas2.addEventListener("touchleave", function (e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas2.dispatchEvent(mouseEvent);
      }, false);
      canvas2.addEventListener("touchmove", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas2.dispatchEvent(mouseEvent);
      }, false);

      // Get the position of the mouse relative to the canvas
      function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: mouseEvent.clientX - rect.left,
          y: mouseEvent.clientY - rect.top
        };
      }

      // Get the position of a touch relative to the canvas
      function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        console.log(touchEvent);
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
          y: touchEvent.touches[0].clientY - rect.top
        };
      }

      // Draw to the canvas
      function renderCanvas() {
        if (drawing) {
          var tint2 = document.getElementById("color2");
          var punta2 = document.getElementById("puntero2");
          ctx2.strokeStyle = tint2.value;
          ctx2.beginPath();
          ctx2.moveTo(lastPos.x, lastPos.y);
          ctx2.lineTo(mousePos.x, mousePos.y);
          console.log(punta2.value);
          ctx2.lineWidth = punta2.value;
          ctx2.stroke();
          ctx2.closePath();
          lastPos = mousePos;
        }
      }

      function clearCanvas() {
        canvas2.width = canvas2.width;
      }

      // Allow for animation
      (function drawLoop () {
        requestAnimFrame(drawLoop);
        renderCanvas();
      })();

    })();

  </script>

  <script>
    /*
      El siguiente codigo en JS Contiene mucho codigo
      de las siguietes 3 fuentes:
      https://stipaltamar.github.io/dibujoCanvas/
      https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
      http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
    */

    (function() { // Comenzamos una funcion auto-ejecutable

      // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
      window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimaitonFrame ||
          function (callback) {
            window.setTimeout(callback, 1000/60);
            // Retrasa la ejecucion de la funcion para mejorar la experiencia
          };
      })();

      // Traemos el canvas mediante el id del elemento html
      var canvas3 = document.getElementById("draw-canvas3");
      var ctx3 = canvas3.getContext("2d");


      // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
      var drawText3 = document.getElementById("draw-dataUrl3");
      var drawImage3 = document.getElementById("draw-image3");
      var clearBtn3 = document.getElementById("draw-clearBtn3");
      var submitBtn3 = document.getElementById("draw-submitBtn3");
      clearBtn3.addEventListener("click", function (e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        verImagen3();
        $('#draw-submitBtn3').attr("disabled", false);
        $('#draw-submitBtn3').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn3").html('<i class="fa fa-ban"></i> Crear Imagen');
        drawImage3.setAttribute("src", "");
      }, false);
      // Definimos que pasa cuando el boton draw-submitBtn es pulsado
      submitBtn3.addEventListener("click", function (e) {
        var dataUrl = canvas3.toDataURL();
        drawText3.innerHTML = dataUrl;
        drawImage3.setAttribute("src", dataUrl);
        $('#draw-submitBtn3').attr("disabled", true);
        $('#draw-submitBtn3').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn3").html('<i class="fa fa-check"></i> Imagen Creada');
      }, false);

      // Activamos MouseEvent para nuestra pagina
      var drawing = false;
      var mousePos = { x:0, y:0 };
      var lastPos = mousePos;
      canvas3.addEventListener("mousedown", function (e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint3 = document.getElementById("color3");
        var punta3 = document.getElementById("puntero3");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas3, e);
      }, false);
      canvas3.addEventListener("mouseup", function (e) {
        drawing = false;
      },  false);
      canvas3.addEventListener("mousemove", function (e) {
        mousePos = getMousePos(canvas3, e);
      }, false);

      // Activamos touchEvent para nuestra pagina
      canvas3.addEventListener("touchstart", function (e) {
        mousePos = getTouchPos(canvas3, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas3.dispatchEvent(mouseEvent);
      }, false);
      canvas3.addEventListener("touchend", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas3.dispatchEvent(mouseEvent);
      }, false);
      canvas3.addEventListener("touchleave", function (e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas3.dispatchEvent(mouseEvent);
      }, false);
      canvas3.addEventListener("touchmove", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas3.dispatchEvent(mouseEvent);
      }, false);

      // Get the position of the mouse relative to the canvas
      function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: mouseEvent.clientX - rect.left,
          y: mouseEvent.clientY - rect.top
        };
      }

      // Get the position of a touch relative to the canvas
      function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        console.log(touchEvent);
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
          y: touchEvent.touches[0].clientY - rect.top
        };
      }

      // Draw to the canvas
      function renderCanvas() {
        if (drawing) {
          var tint3 = document.getElementById("color3");
          var punta3 = document.getElementById("puntero3");
          ctx3.strokeStyle = tint3.value;
          ctx3.beginPath();
          ctx3.moveTo(lastPos.x, lastPos.y);
          ctx3.lineTo(mousePos.x, mousePos.y);
          console.log(punta3.value);
          ctx3.lineWidth = punta3.value;
          ctx3.stroke();
          ctx3.closePath();
          lastPos = mousePos;
        }
      }

      function clearCanvas() {
        canvas3.width = canvas3.width;
      }

      // Allow for animation
      (function drawLoop () {
        requestAnimFrame(drawLoop);
        renderCanvas();
      })();

    })();

  </script>

  <script>
    /*
      El siguiente codigo en JS Contiene mucho codigo
      de las siguietes 3 fuentes:
      https://stipaltamar.github.io/dibujoCanvas/
      https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
      http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
    */

    (function() { // Comenzamos una funcion auto-ejecutable

      // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
      window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimaitonFrame ||
          function (callback) {
            window.setTimeout(callback, 1000/60);
            // Retrasa la ejecucion de la funcion para mejorar la experiencia
          };
      })();

      // Traemos el canvas mediante el id del elemento html
      var canvas4 = document.getElementById("draw-canvas4");
      var ctx4 = canvas4.getContext("2d");


      // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
      var drawText4 = document.getElementById("draw-dataUrl4");
      var drawImage4 = document.getElementById("draw-image4");
      var clearBtn4 = document.getElementById("draw-clearBtn4");
      var submitBtn4 = document.getElementById("draw-submitBtn4");
      clearBtn4.addEventListener("click", function (e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        $('#draw-submitBtn4').attr("disabled", false);
        $('#draw-submitBtn4').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn4").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
        drawImage4.setAttribute("src", "");
      }, false);
      // Definimos que pasa cuando el boton draw-submitBtn es pulsado
      submitBtn4.addEventListener("click", function (e) {
        var dataUrl = canvas4.toDataURL();
        drawText4.innerHTML = dataUrl;
        drawImage4.setAttribute("src", dataUrl);
        $('#draw-submitBtn4').attr("disabled", true);
        $('#draw-submitBtn4').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn4").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
      }, false);

      // Activamos MouseEvent para nuestra pagina
      var drawing = false;
      var mousePos = { x:0, y:0 };
      var lastPos = mousePos;
      canvas4.addEventListener("mousedown", function (e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint4 = document.getElementById("color4");
        var punta4 = document.getElementById("puntero4");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas4, e);
      }, false);
      canvas4.addEventListener("mouseup", function (e) {
        drawing = false;
      },  false);
      canvas4.addEventListener("mousemove", function (e) {
        mousePos = getMousePos(canvas4, e);
      }, false);

      // Activamos touchEvent para nuestra pagina
      canvas4.addEventListener("touchstart", function (e) {
        mousePos = getTouchPos(canvas4, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas4.dispatchEvent(mouseEvent);
      }, false);
      canvas4.addEventListener("touchend", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas4.dispatchEvent(mouseEvent);
      }, false);
      canvas4.addEventListener("touchleave", function (e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas4.dispatchEvent(mouseEvent);
      }, false);
      canvas4.addEventListener("touchmove", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas4.dispatchEvent(mouseEvent);
      }, false);

      // Get the position of the mouse relative to the canvas
      function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: mouseEvent.clientX - rect.left,
          y: mouseEvent.clientY - rect.top
        };
      }

      // Get the position of a touch relative to the canvas
      function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        console.log(touchEvent);
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
          y: touchEvent.touches[0].clientY - rect.top
        };
      }

      // Draw to the canvas
      function renderCanvas() {
        if (drawing) {
          var tint4 = document.getElementById("color4");
          var punta4 = document.getElementById("puntero4");
          ctx4.strokeStyle = tint4.value;
          ctx4.beginPath();
          ctx4.moveTo(lastPos.x, lastPos.y);
          ctx4.lineTo(mousePos.x, mousePos.y);
          console.log(punta4.value);
          ctx4.lineWidth = punta4.value;
          ctx4.stroke();
          ctx4.closePath();
          lastPos = mousePos;
        }
      }

      function clearCanvas() {
        canvas4.width = canvas4.width;
      }

      // Allow for animation
      (function drawLoop () {
        requestAnimFrame(drawLoop);
        renderCanvas();
      })();

    })();

  </script>

  <script>
    /*
      El siguiente codigo en JS Contiene mucho codigo
      de las siguietes 3 fuentes:
      https://stipaltamar.github.io/dibujoCanvas/
      https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
      http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
    */

    (function() { // Comenzamos una funcion auto-ejecutable

      // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
      window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimaitonFrame ||
          function (callback) {
            window.setTimeout(callback, 1000/60);
            // Retrasa la ejecucion de la funcion para mejorar la experiencia
          };
      })();

      // Traemos el canvas mediante el id del elemento html
      var canvas5 = document.getElementById("draw-canvas5");
      var ctx5 = canvas5.getContext("2d");


      // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
      var drawText5 = document.getElementById("draw-dataUrl5");
      var drawImage5 = document.getElementById("draw-image5");
      var clearBtn5 = document.getElementById("draw-clearBtn5");
      var submitBtn5 = document.getElementById("draw-submitBtn5");
      clearBtn5.addEventListener("click", function (e) {
        // Definimos que pasa cuando el boton draw-clearBtn es pulsado
        clearCanvas();
        $('#draw-submitBtn5').attr("disabled", false);
        $('#draw-submitBtn5').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
        $("#draw-submitBtn5").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
        drawImage5.setAttribute("src", "");
      }, false);
      // Definimos que pasa cuando el boton draw-submitBtn es pulsado
      submitBtn5.addEventListener("click", function (e) {
        var dataUrl = canvas5.toDataURL();
        drawText5.innerHTML = dataUrl;
        drawImage5.setAttribute("src", dataUrl);
        $('#draw-submitBtn5').attr("disabled", true);
        $('#draw-submitBtn5').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
        $("#draw-submitBtn5").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
      }, false);

      // Activamos MouseEvent para nuestra pagina
      var drawing = false;
      var mousePos = { x:0, y:0 };
      var lastPos = mousePos;
      canvas5.addEventListener("mousedown", function (e) {
        /*
        Mas alla de solo llamar a una funcion, usamos function (e){...}
        para mas versatilidad cuando ocurre un evento
        */
        var tint5 = document.getElementById("color5");
        var punta5 = document.getElementById("puntero5");
        console.log(e);
        drawing = true;
        lastPos = getMousePos(canvas5, e);
      }, false);
      canvas5.addEventListener("mouseup", function (e) {
        drawing = false;
      },  false);
      canvas5.addEventListener("mousemove", function (e) {
        mousePos = getMousePos(canvas5, e);
      }, false);

      // Activamos touchEvent para nuestra pagina
      canvas5.addEventListener("touchstart", function (e) {
        mousePos = getTouchPos(canvas5, e);
        console.log(mousePos);
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousedown", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas5.dispatchEvent(mouseEvent);
      }, false);
      canvas5.addEventListener("touchend", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas5.dispatchEvent(mouseEvent);
      }, false);
      canvas5.addEventListener("touchleave", function (e) {
        // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var mouseEvent = new MouseEvent("mouseup", {});
        canvas5.dispatchEvent(mouseEvent);
      }, false);
      canvas5.addEventListener("touchmove", function (e) {
        e.preventDefault(); // Prevent scrolling when touching the canvas
        var touch = e.touches[0];
        var mouseEvent = new MouseEvent("mousemove", {
          clientX: touch.clientX,
          clientY: touch.clientY
        });
        canvas5.dispatchEvent(mouseEvent);
      }, false);

      // Get the position of the mouse relative to the canvas
      function getMousePos(canvasDom, mouseEvent) {
        var rect = canvasDom.getBoundingClientRect();
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: mouseEvent.clientX - rect.left,
          y: mouseEvent.clientY - rect.top
        };
      }

      // Get the position of a touch relative to the canvas
      function getTouchPos(canvasDom, touchEvent) {
        var rect = canvasDom.getBoundingClientRect();
        console.log(touchEvent);
        /*
        Devuelve el tamaño de un elemento y su posición relativa respecto
        a la ventana de visualización (viewport).
        */
        return {
          x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
          y: touchEvent.touches[0].clientY - rect.top
        };
      }

      // Draw to the canvas
      function renderCanvas() {
        if (drawing) {
          var tint5 = document.getElementById("color5");
          var punta5 = document.getElementById("puntero5");
          ctx5.strokeStyle = tint5.value;
          ctx5.beginPath();
          ctx5.moveTo(lastPos.x, lastPos.y);
          ctx5.lineTo(mousePos.x, mousePos.y);
          console.log(punta5.value);
          ctx5.lineWidth = punta5.value;
          ctx5.stroke();
          ctx5.closePath();
          lastPos = mousePos;
        }
      }

      function clearCanvas() {
        canvas5.width = canvas5.width;
      }

      // Allow for animation
      (function drawLoop () {
        requestAnimFrame(drawLoop);
        renderCanvas();
      })();

    })();

  </script>
