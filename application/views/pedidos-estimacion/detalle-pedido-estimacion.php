<section class="nueva-solicitud">
  <div class="container-fluid">
     <div class="card">
      <div class="card-header d-flex align-items-center d-print-none">
        <h3 class="h4 mr-auto p-2">Detalle Pedido</h3>
        <div class="p-2 d-print-none">
          <!--<button class="btn btn-secondary btn-info float-right" id="btnImprimirDiv" tabindex="0">
            <span><i class="fa fa-print"></i> Imprimir</span>
          </button>-->
          <a class="btn btn-info" href="<?php echo base_url() ?>pedidosestimacion/imprimirDetallePedidoEstimacion/<?=  $pedido->uid; ?>" onClick="openWin(this)">
            Imprimir Detalle Pedido
          </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table sin-borde">
          <tbody>
            <tr>
              <th colspan="2"><strong>Proyecto:</strong> <?= $pedido->numero_proyecto ?> - <?= $pedido->nombre_proyecto.' ('.$pedido->nombre_comercial_cliente.')' ?></th>
              <th colspan="2"><strong>Segmento: </strong><?= $pedido->direccion ?></th>
            </tr>
            <tr>
              <td colspan="2"><strong>Pedido UID:</strong> <?= $pedido->uid ?></td>
              <td colspan="2"><strong>Requisición: </strong> <?= $pedido->tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion?></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Autor:</strong> <?= $pedido->nombre ?></td>
              <td colspan="2"><strong>Fecha: </strong> <?= date("d-m-Y", strtotime($pedido->fecha_pedido_estimacion)) ?></td>
            </tr>
            <tr>
              <td colspan="2"><strong>Proveedor:</strong> <?= $pedido->nombre_fiscal ?></td>
              <td colspan="2"><strong>RFC: </strong> <?= $pedido->rfc ?></td>
            </tr>
          </tbody>
        </table>
        <hr>
        <?php $subtotal=0; ?>
        <div class="table-responsive">
          <table class="table table-border">
            <thead>
              <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Unidad</th>
                <th>Cantidad Contrato</th>
                <th width="180">Cantidad</th>
                <th>Precio</th>
                <th>Importe</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($detalle as $key => $value): ?>
              <tr>
                <td><?= $value->neodata ?></td>
                <td><?= $value->descripcion ?></td>
                <td><?= $value->unidad_medida_abr ?></td>
                <td><?= $value->cantidad_contrato ?></td>
                <?php
                  if( isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0 || 
                  isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0 && $pedido->estatus == null) {
                  ?>               
                    <td width="150" class="d-print-none">
                      <input type="hidden" class="form-control" id="cantSolicitadaOrg_<?=$value->iddtl_pedido_catalogo;?>" value="<?= $value->cantidad;?>" >
                      <input type="hidden" class="form-control" id="idtbl_pedidos_<?=$value->iddtl_pedido_catalogo;?>" value="<?=$value->tbl_pedidos_idtbl_pedidos;?>" >
                      <input type="hidden" class="form-control" id="idtbl_catalogo_<?=$value->iddtl_pedido_catalogo;?>" value="<?=$value->tbl_catalogo_idtbl_catalogo;?>" >
                      <input type="hidden" class="form-control" id="idtbl_solicitudes_almacen_<?=$value->iddtl_pedido_catalogo;?>" value="<?= $pedido->tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion ?>" >
                      <input type="hidden" class="form-control" id="estimacion" value="<?=$pedido->estimacion?>" >
                      <input type="number" class="form-control" style="width:80px; float:left;" value="<?= $value->cantidad;?>" 
                        required min="0" step="0.0001" id="cantSolicitada_<?=$value->iddtl_pedido_catalogo;?>"> 
                      <i class="fa fa-save hand noprint" style="position:relative;float:left" onclick="guardarCantidad(<?=$value->iddtl_pedido_catalogo;?>, '<?=$pedido->uid;?>', 'cantidades')" ></i>
                      <i class="fa fa-history hand noprint" style="position:relative;float:left" onclick="hist_cantidades(<?=$value->tbl_pedidos_idtbl_pedidos;?>, '<?=$value->tbl_catalogo_idtbl_catalogo;?>', 'cantidades')" aria-hidden="true"></i>
                    </td> 
                    <td class="d-none d-print-block"><?= $value->cantidad ?></td>               
                  <?php }else{ ?>
                    <td><?= $value->cantidad ?></td>
                  <?php }?>
                  <?php if( isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0 || 
                  isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0 && $pedido->estatus == null) { ?>
                    <?php $precioFinal=($pedido->tipo_moneda=='p') ? $value->precio : $value->precio ?> 
                    <td width="200" class="d-print-none">
                      <input type="hidden" class="form-control" id="precioOrg_<?=$value->iddtl_pedido_catalogo;?>" value="<?= $value->precio;?>" >
                      <input type="number" class="form-control" style="width:100px; float:left;" value="<?= $precioFinal ?>" 
                        required min="0" step="0.0001" id="precio_<?=$value->iddtl_pedido_catalogo;?>"> 
                      <i class="fa fa-save hand noprint" style="position:relative;float:left" onclick="guardarCantidad(<?=$value->iddtl_pedido_catalogo;?>, '<?=$pedido->uid;?>', 'precios')" ></i>
                      <i class="fa fa-history hand noprint" style="position:relative;float:left" onclick="hist_cantidades(<?=$value->tbl_pedidos_idtbl_pedidos;?>, '<?=$value->tbl_catalogo_idtbl_catalogo;?>', 'precios')" aria-hidden="true"></i>
                    </td>
                  <?php } else { ?>
                    <?php $precioFinal=($pedido->tipo_moneda=='p') ? $value->precio : $value->precio ?> 
                    <td>$<?= number_format($precioFinal,2) ?></td>
                  <?php } ?> 
                <td>$<?= number_format($value->cantidad*$precioFinal,2); $subtotal+=$value->cantidad*$precioFinal; ?></td>
              </tr>
              <?php endforeach ?>
              <tr>
                <td colspan="5" rowspan="9"><strong>Nota del pedido:</strong> <?= $pedido->observaciones ?></td>
                <th>Importe de la estimación</th>
                <td>$<?= number_format($subtotal,2) ?></td>
              </tr>
              <?php 
              $retension_fondo_garantia = $subtotal * (intval($pedido->porcentaje_fondo_retencion_garantia) / 100); 
              $subtotal_estimacion = $subtotal - $retension_fondo_garantia;?>
                <tr>
                  <th>Retención de fondo de garantia(<?= $pedido->porcentaje_fondo_retencion_garantia ?>%):</th>
                  <td>$<?= number_format($retension_fondo_garantia, 2); ?></td>
                </tr>
                <tr>
                  <th>Sub Total:</th>
                  <td>$<?= number_format($subtotal_estimacion, 2); ?></td>
                </tr>
              <tr>
                <th>IVA <?= $pedido->iva === NULL ? '16' : $pedido->iva ?>%</th>
                <?php if($pedido->iva === NULL) { ?>
                  <?php $iva = "0.16"; ?>
                  <td>$<?= number_format($subtotal_estimacion*$iva,2) ?></td>
                <?php } ?>
                <?php if($pedido->iva !== NULL && $pedido->iva !== 0) { ?>
                  <?php $iva = "0." . $pedido->iva ?>
                  <td>$<?= number_format($subtotal_estimacion*$iva,2) ?></td>
                <?php } ?>
                <?php if($pedido->iva === 0) { ?>
                  <td>$<?= number_format(0,2) ?></td>
                <?php } ?>
              </tr>
              
              <?php if($pedido->porcentaje_retencion != NULL) { ?>
                <tr>
                  <th>Retención <?= $pedido->porcentaje_retencion ?>%</th>
                  <td>$<?= number_format($subtotal_estimacion * ($pedido->porcentaje_retencion/100),2) ?></td>
                </tr>
              <?php } 
              $total = ($subtotal_estimacion*$iva)+$subtotal_estimacion-$subtotal_estimacion * ($pedido->porcentaje_retencion/100);
              ?>
              <?php if($pedido->amortizacion != 0){ ?>
                <tr>
                  <th>Descuento</th>
                  <td>$<?= number_format($pedido->amortizacion,2) ?></td>
                </tr>
              <?php 
                  $total -= $pedido->amortizacion;
                } 
              ?>
<?php if($pedido->iva_retencion != NULL) { ?>
                <tr>
                  <th>IVA <?= $pedido->iva_retencion ?>%</th>
                  <td>$<?= number_format($subtotal_estimacion * ($pedido->iva_retencion/100),2) ?></td>
                </tr>
                <?php $total -= $subtotal_estimacion * ($pedido->iva_retencion/100) ?>
              <?php } ?>
              <?php if($pedido->amortizacion_anticipo != 0){ ?>
                <tr>
                  <th>Amortización Anticipo</th>
                  <td>$<?= number_format($pedido->amortizacion_anticipo,2) ?></td>
                </tr>
              <?php 
                  $total -= $pedido->amortizacion_anticipo;
                } 
              ?>
              
              <tr>
                <th>TOTAL</th>
                <?php if(($pedido->iva !== 0 && $pedido->iva !== NULL) || $pedido->iva === NULL) { ?>
                  <td>$<?= number_format($total,2) ?></td>
                <?php } ?>
              </tr>
              <tr>
                <th>Nota Credito</th>
                  <td>$<?= number_format($pedido->nota_credito,2) ?></td>
              </tr>
              <tr>
                <th>Total</th>
                  <td>$<?= number_format($total - $pedido->nota_credito,2) ?></td>
              </tr>
              <tr>
                <?php if($pedido->tipo_moneda == 'p') { ?>
                  <?php if(($pedido->iva !== 0 && $pedido->iva !== NULL) || $pedido->iva === NULL) { ?>
                    <td colspan="7" align="right">(* <?= numletras(number_format($total - $pedido->nota_credito,2),'p') ?> *)</td>
                  <?php } ?>
                <?php } ?>
                <?php if($pedido->tipo_moneda == 'd') { ?>
                  <?php if(($pedido->iva !== 0 && $pedido->iva !== NULL) || $pedido->iva === NULL) { ?>
                    <td colspan="7" align="right">(* <?= numletras(number_format($total - $pedido->nota_credito,2),'d') ?> *)</td>
                  <?php } ?>
                <?php } ?>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="clearfix pt-md d-print-none">
          <div class="pull-right">
            <a href="javascript:history.go(-1)" class="btn-warning btn">Regresar</a> 
          </div>
        </div>
      </div>
    </div>
  </div> 
</section>
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
  /*document.querySelector("#btnImprimirDiv").addEventListener("click", function (e) {
    var printContents = document.getElementById("imprimible").innerHTML;
    var ventana = window.open('', 'PRINT', '');
    ventana.document.write('<html><head><title>Pedido</title>');
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
  });
  */
  function openWin(obj) {
      event.preventDefault();
      myWindow = window.open(obj.getAttribute("href"), '_blank', 'width=1000,height=800,left=0,top=0');
      myWindow.document.close(); //missing code
      myWindow.focus();
      myWindow.print();
  }

  function guardarCantidad(id, uid, tipo){
    console.log("guardarCantidad:", id)
    
    cantidad = parseFloat($("#cantSolicitada_"+id).val());
    cantSolicitadaOrg = parseFloat($("#cantSolicitadaOrg_"+id).val());
    precio = parseFloat($("#precio_"+id).val());
    precioOrg = parseFloat($("#precioOrg_"+id).val());
    idtbl_pedidos = parseInt($("#idtbl_pedidos_"+id).val());
    idtbl_catalogo = parseInt($("#idtbl_catalogo_"+id).val());
    idtbl_solicitudes_almacen = parseInt($("#idtbl_solicitudes_almacen_"+id).val());
    estimacion = parseInt($("#estimacion").val());
    if(cantidad <= 0)
        return;

    var formData = new FormData();
    formData.append("token", "<?=$this->session->userdata('token');?>");
    formData.append("iddtl_solicitud_catalogo", id );
    formData.append("cantidad", cantidad );
    formData.append("cantSolicitadaOrg", cantSolicitadaOrg );
    formData.append("precio", precio );
    formData.append("tipo", tipo);
    formData.append("precioOrg", precioOrg );
    formData.append("idtbl_pedidos", idtbl_pedidos );
    formData.append("idtbl_catalogo", idtbl_catalogo );
    formData.append("idtbl_solicitudes_almacen", idtbl_solicitudes_almacen );
    formData.append("estimacion", estimacion);
    $data = formData;     

    // console.log("idtbl_solicitudes_almacen::", idtbl_solicitudes_almacen); 
 
    // console.log(cantidad); return;
    if(tipo == "cantidades") {
      titulo = "Cambiar cantidad?";
      texto = "Deseas editar la cantidad?"; 
    }
    if(tipo == "precios") {
      titulo = "Cambiar precio?";
      texto = "Deseas editar el precio?"; 
    }

    Swal.fire({
    title: titulo,
    text: texto,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
            $.ajax({
              url: "<?= base_url()?>compras/edit_cantidad_solicitud",
              type: "post",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              complete: function(res) {
                  console.log("res1 ",res)
                  var resp = JSON.parse(res.responseText);
                  console.log("res2 ",res)
                  if (resp.error==false) { 
                      window.location.replace("<?= base_url()?>pedidosestimacion/detalle-pedido/"+uid );
                  } else {
                      Toast.fire({
                          type: 'error',
                          title: resp.mensaje
                      });
                  }
              }
          });
      }
    }) 
  }

  function hist_cantidades(idtbl_pedidos, idtbl_catalogo, tipo){

      var formData = new FormData();
      formData.append("token", "<?=$this->session->userdata('token');?>");
      formData.append("idtbl_pedidos", idtbl_pedidos );
      formData.append("idtbl_catalogo", idtbl_catalogo );
      formData.append("tipo", tipo);
      //alert(tipo);

      console.log("idtbl_pedidos::", idtbl_pedidos); 
      console.log("idtbl_catalogo::", idtbl_catalogo); 

      $data = formData;     
      $.ajax({
          url: "<?= base_url()?>compras/detalle_pedido_hist_cantidad",
          type: 'POST', 
          data: formData,
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          complete: function(data) {
            console.log("data::", data); 
              json = JSON.parse(data.responseText);
              console.log("buscar::", json.error); 
              if(json.error==false){ 
                  // console.log("buscar::", data)
                  // $estatus_solicitud =  data.datos.solicitud.estatus_solicitud ;
                  // var bandera=true;
                  if(tipo == "cantidades") {
                    $table = $('<table class="table table-border" ></table>');
                    $table.append(
                      '<thead>'+
                        '<tr>'+
                              '<th>Producto</th> '+
                              '<th>Usuario</th> '+
                              '<th>Cantidad</th> '+
                              '<th>Cantidad Nueva</th> '+
                              '<th>Fecha</th> '+
                        '</tr>'+
                      '</thead> '               
                    );
                    json.datos.forEach(function(elemento) {  
                      console.log("elemento::", elemento); 
                            bandera=false; 
                            $table.append(
                            '<tr class="tr" style="font-size:11px;">'+
                            '<td><span class="color_azul_claro">'+elemento.modelo+'</span><br>'+elemento.descripcion+'</td>'+
                            '<td>'+elemento.nombre_usr+'</td>'+
                            '<td align="center">'+elemento.cantidad_anterior+'</td>'+
                            '<td align="center">'+elemento.cantidad_nueva+'</td>'+
                            '<td>'+elemento.fecha+'</td>'+
                            '</tr>'
                            );
                        
                    });
                  }
                  if(tipo == "precios") {
                    $table = $('<table class="table table-border" ></table>');
                    $table.append(
                      '<thead>'+
                        '<tr>'+
                              '<th>Producto</th> '+
                              '<th>Usuario</th> '+
                              '<th>Precio</th> '+
                              '<th>Precio Nuevo</th> '+
                              '<th>Fecha</th> '+
                        '</tr>'+
                      '</thead> '               
                    );
                    json.datos.forEach(function(elemento) {  
                      console.log("elemento::", elemento); 
                            bandera=false; 
                            $table.append(
                            '<tr class="tr" style="font-size:11px;">'+
                            '<td><span class="color_azul_claro">'+elemento.modelo+'</span><br>'+elemento.descripcion+'</td>'+
                            '<td>'+elemento.nombre_usr+'</td>'+
                            '<td align="center">'+elemento.precio_anterior+'</td>'+
                            '<td align="center">'+elemento.precio_nuevo+'</td>'+
                            '<td>'+elemento.fecha+'</td>'+
                            '</tr>'
                            );
                        
                    });
                  }
                  Swal.fire({
                    width: 900,
                    html:$table,
                    animation: false,
                    confirmButtonText: 'Cerrar'
                  })     
              }else{
                  Toast.fire({
                      type: 'error',
                      title: json.mensaje
                  })
              }
          },
          error: function(xhr) { // if error occured
              Toast.fire({
                  type: 'error',
                  title: 'Algo salio mal.'
              })
              
          }  
      }); 
 
          
  }  
</script>