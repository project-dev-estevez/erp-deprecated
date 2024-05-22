<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $titulo ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
  </head>
  <body>
    <div class="page <?php echo $clase_pagina ?>">
      <table style="width:100%; width: 100%;" border="1" cellpadding="2" cellspacing="0">
        <thead>
          <tr>
            <th rowspan="2" style="text-align: center;">
              <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 100px;">
            </th>
            <th colspan="2" width="50%" style="vertical-align: middle; text-align: center;">
              <h4 style="font-size:11px;">ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.</h4>
            </th>
            <th style="vertical-align: middle; text-align: right;">
              <h6 style="font-size:11px;">Folio: <?php echo $pedido->uid ?></h6>
            </th>
          </tr>
          <tr>
            <th colspan="2" class="text-center" style="text-align: center:">
              <h4 style="font-size:11px;">Orden de compra</h4>
            </th>
            <th style="vertical-align: middle; text-align: right;">
              <h6 style="font-size:11px;">Folio Neodata: <?= $pedido->neodata_pedido ?></h6>
            </th>
          </tr>
        </thead>
      </table>
      <br>
      <table style="width:100%;font-size: 8px;" border="1" cellpadding="4" cellspacing="0">
        <tbody>
          <tr>
            <th style="text-align: left" colspan="2" width="50%"><strong>Proyecto:</strong> <?= $pedido->numero_proyecto ?> - <?= $pedido->nombre_proyecto.' ('.$pedido->nombre_comercial_cliente.')' ?></th>
            <th style="text-align: left" colspan="2" width="50%"><strong>Segmento: </strong><?= $pedido->direccion ?></th>
          </tr>
          <tr>
            <td style="text-align: left" colspan="2"><strong>Requisición: </strong> <?= $pedido->tbl_solicitudes_almacen_idtbl_solicitudes_almacen ?></td>
            <td style="text-align: left" colspan="2"><strong>Fecha: </strong> <?= date("d-m-Y", strtotime($pedido->fecha_pedido_estimacion)) ?></td>
          </tr>
          <tr>
            <td style="text-align: left" colspan="2"><strong>Proveedor:</strong> <?= $pedido->nombre_fiscal ?></td>
            <td style="text-align: left" colspan="2"><strong>Autor:</strong> <?= $pedido->nombre ?></td>
          </tr>
          <tr>
            <td style="text-align: left" colspan="2"><strong>RFC: </strong> <?= $pedido->rfc ?></td>
            <?php
              if ($pedido->condicion_pago == 12) {
                $txt_adicional = 'meses';
              } elseif ($pedido->condicion_pago == 'contado') {
                $txt_adicional = '';
              } else {
                $txt_adicional = 'días';
              }
            ?>
            <td style="text-align: left" colspan="2"><strong>Condicion de pago: </strong> <?= $pedido->condicion_pago. ' '.$txt_adicional ?></td>
          
          </tr>
          <tr>
            <td style="text-align: left;" colspan="2"><strong>Almacén: </strong><?= $pedido->almacen ?></td>
          </tr>
          <?php if($pedido->fecha_pago != ""){ ?>
            <tr>
              <td style="text-align: left" colspan="4"><strong>Fecha de Pago</strong> <?= date("d-m-Y", strtotime($pedido->fecha_pago))?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <br>
      <?php $subtotal=0; ?>
      <table style="font-size:8px;" class="table table-border" border="1" cellspacing="0">
        <thead>
          <tr>
            <th width="120" style="text-align: center;">Código</th>
            <th width="800" style="text-align: center;">Descripción</th>
            <th style="text-align:center;">Unidad</th>
            <?php if($pedido->estimacion == "0"){ ?>
              <th style="text-align:center;">Entrega</th>
            <?php } else{?>
              <th style="text-align:center;">Cantidad Contrato</th>
              <th style="text-align:center;">Cantidad Estimada</th>
              <th style="text-align:center;">Cantidad Acomulada</th>
            <?php }?>
            <th style="text-align: center;">Cantidad</th>
            <th style="text-align: center;">Precio</th>
            <th style="text-align: center;">Importe</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($detalle as $key => $value): ?>
          <tr>
            <td style="text-align: center;"><?= $value->neodata ?></td>
            <td style="text-align: justify;"><?= $value->descripcion ?></td>
            <td style="text-align: center;"><?= $value->unidad_medida_abr ?></td>
            <?php if($pedido->estimacion == "0"){ ?>
              <td width="50" style="text-align: center;"><?= $value->fecha_entrega ?></td>
            <?php } else{?>
              <td style="text-align:center;"><?= $value->cantidad_estimada ?></td>
              <td style="text-align:center;"><?= $value->cantidad_estimada ?></td>
              <td style="text-align:center;"><?= $value->comprado ?></td>
            <?php }?>
            <td style="text-align: center;"><?= $value->cantidad ?></td>
            <?php $precioFinal=($pedido->tipo_moneda=='p') ? $value->precio : $value->precio ?> 
            <td style="text-align: center;">$<?= $precioFinal ?></td>
            <td style="text-align: center;">$<?= number_format($value->cantidad*$precioFinal,2); $subtotal+=$value->cantidad*$precioFinal; ?></td>
          </tr>
          <?php endforeach ?>
          <?php $rows = $pedido->estimacion == 1 ? 5 : 0; ?>
          <tr>
            <td style="text-align: left;" colspan="5" rowspan="<?= $pedido->porcentaje_retencion != NULL ? strval(6+$rows) : strval(5+$rows) ?>"><strong>Nota del pedido:</strong> <?= $pedido->observaciones ?></td>
            <th colspan="<?= $pedido->estimacion == 0 ? "1" : "3" ?>" style="text-align: left;"><?= $pedido->estimacion == 0 ? "SUBTOTAL" : "Importe de la estimación"; ?></th>
            <td style="text-align: left;">$<?= number_format($subtotal,2) ?></td>
          </tr>
          <?php 
              $retension_fondo_garantia = $subtotal*0.05;
              $subtotal_estimacion = $subtotal - $retension_fondo_garantia;
              if($pedido->estimacion == 1){ ?>
                <tr>
                  <th colspan="3" style="text-align: left;">Amortización del anticipo:</th>
                  <td><?= number_format($pedido->amortizacion_anticipo, 2); ?></td>
                </tr>
                <tr>
                  <th colspan="3" style="text-align: left;">Retención de fondo de garantia:</th>
                  <td><?= number_format($retension_fondo_garantia, 2); ?></td>
                </tr>
                <tr>
                  <th colspan="3" style="text-align: left;">Devolución de fondo de garantia:</th>
                  <td><?= number_format($pedido->devolucion_fondo_garantia, 2); ?></td>
                </tr>
                <tr>
                  <th colspan="3" style="text-align: left;">Total de descuentos:</th>
                  <td><?= number_format($pedido->total_descuentos, 2); ?></td>
                </tr>
                <tr>
                  <th colspan="3" style="text-align: left;">Subt Total:</th>
                  <td><?= number_format($subtotal_estimacion, 2); ?></td>
                </tr>
              <?php } ?>
          <tr>
            <th colspan="<?= $pedido->estimacion == 0 ? "1" : "3" ?>" style="text-align: left;">IVA <?= $pedido->iva === NULL ? '16' : $pedido->iva ?>%</th>
            <?php if($pedido->iva === NULL) { ?>
              <?php $iva = "0.16"; ?>
              <td style="text-align: left;">$<?= number_format($pedido->estimacion == 0 ? $subtotal*$iva : $subtotal_estimacion*$iva,2) ?></td>
            <?php } ?>
            <?php if($pedido->iva !== 0 && $pedido->iva !== NULL) { ?>
              <?php $iva = "0." . $pedido->iva ?>
              <td style="text-align: left;">$<?= number_format($pedido->estimacion == 0 ? $subtotal*$iva : $subtotal_estimacion*$iva,2) ?></td>
            <?php } ?>
            <?php if($pedido->iva === 0) { ?>
              <td style="text-align: left;">$<?= number_format(0,2) ?></td>
            <?php } ?>
          </tr>
          <?php if($pedido->porcentaje_retencion != NULL) { ?>
            <tr>
              <th colspan="<?= $pedido->estimacion == 0 ? "1" : "3" ?>" style="text-align: left;">Retención <?= $pedido->porcentaje_retencion ?>%</th>
              <td style="text-align: left;">$<?= number_format($pedido->estimacion == 0 ? $pedido->retencion : $subtotal_estimacion * ($pedido->porcentaje_retencion/100),2) ?></td>
            </tr>
          <?php } ?>
          <tr>
            <?php
              if(($pedido->iva !== 0 && $pedido->iva !== NULL) || $pedido->iva === NULL) {
                $total = ($subtotal*$iva)+$subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0);
              }
              if($pedido->iva === 0) {
                $total = $subtotal-($pedido->porcentaje_retencion != NULL ? $pedido->retencion : 0);
              }
            ?>
            <th colspan="<?= $pedido->estimacion == 0 ? "1" : "3" ?>" style="text-align: left;">TOTAL</th>
            <td style="text-align: left;">$<?= number_format($total,2) ?></td>
          </tr>
          <tr>
            <th>Nota de credito</th>
            <td>$<?= number_format($pedido->nota_credito,2) ?></td>
          </tr>
          <tr>
            <?php $total = number_format($total - $pedido->nota_credito, 2); ?>
            <th>Total</th>
            <td>$<?= $total ?></td>
          </tr>
          <tr>
            <?php if($pedido->tipo_moneda == 'p') { ?>
              <td style="text-align: right;" colspan="<?= $pedido->estimacion == 0 ? "7" : "9" ?>" align="right">(* <?php echo numletras($total,'p') ?> *)</td>
            <?php } ?>
            <?php if($pedido->tipo_moneda == 'd') { ?>
              <td style="text-align: right;" colspan="<?= $pedido->estimacion == 0 ? "7" : "9" ?>" align="right">(* <?php echo numletras($total,'d') ?> *)</td>
            <?php } ?>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
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