<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Generador</title>
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
        </style>  
</head>
<body>
<section>
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">              
        <table id="datos_solicitud" border="1" style="width: 100%;font-size: 12px;margin-top: 10px; border-collapse: collapse;" cellpadding="4" cellspacing="0">
            <tbody>
                <tr>
                    <td rowspan="4" style="text-align: center;"><img src="img/logo-estevez-jor.png" width="70"></td>
                    <td colspan="7" style="text-align: center;">ESTEVEZ.JOR SERVICIOS S.A. DE C.V.</td>
                </tr>
                <tr>
                    <td colspan="4" rowspan="2">MEXICO TOTAL PLAY FTTH PROJECT</td>
                    <td>NUMEROS GENERADORES</td>
                    <td>1</td>
                    <td>FOLIO</td>                    
                </tr>
                <tr>
                    <td>ESTIMACIÓN No.:</td>
                    <td>Aquí va el número</td>
                    <td>1</td>                    
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td>FECHA:</td>
                    <td>hoy</td>
                    <td>&nbsp;</td>                    
                </tr>
                <tr>
                    <td>UBICACIÓN:</td>
                    <td colspan="4" rowspan="2">Aquí va la ubicación</td>
                    <td>PERIODO DE EJECUCIÓN</td>
                    <td>periodo</td>
                    <td>HOJA No.:</td>                    
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>1 de 4</td>                    
                </tr>
                <tr>
                    <td>CONTRATO:</td>
                    <td>DESARROLLO TECATE</td>
                    <td rowspan="3">OBSERVACIONES</td>
                    <td rowspan="3" colspan="5">obs</td>
                </tr>
                <tr>
                    <td>ASIGNACIÓN:</td>
                    <td>BLOQUE #4</td>
                </tr>
                <tr>
                    <td>CLAVE:</td>
                    <td>SIUUU</td>
                </tr>
            </tbody> 
        </table>
                                                                              
        <table align="center" border="1" style="width: 100%;font-size: 12px;margin-top: 10px; border-collapse: collapse;" >
          <thead>
            <tr>
              <th>TRAMO</th>
              <th>GEOREFERENCIA INICIO</th>
              <th>GEOREFERENCIA FINAL</th>
              <th>CONCEPTO</th>
              <th>UNIDAD</th>
              <th>CANTIDAD PROYECTADA</th>
              <th>ACUMULADO ANTERIOR</th>
              <th>CANTIDAD EJECUTADA</th>
              <th>CANTIDAD TOTAL EJECUTADA</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $kilometraje = 0;
                $kilometraje_acumulado = 0;
            ?>
              <?php foreach($detalle AS $key => $value){ ?>
                <?php 
                    if($value->kilometraje == null){
                        $kilometraje = 0;
                    }else{
                        $kilometraje = $kilometraje;
                    }
                ?>

                <tr>
                    <td><?= $value->nombre_oracle ?></td>
                    <td><?= $value->lat_a . ',' . $value->lon_a ?></td>
                    <?php if($value->lat_b != ''){ ?>
                        <td><?= $value->lat_b . ',' . $value->lon_b ?></td>
                    <?php }else{ ?>
                        <td>&nbsp;</td>
                    <?php } ?>
                    <td><?= $value->descripcion_servicio ?></td>
                    <td><?= $value->unidad_medida_abr ?></td>
                    <td><?= $value->cantidad ?></td>                    
                    <td><?= $kilometraje_acumulado ?></td>
                    <td><?= $value->kilometraje ?></td>
                    <td><?= ($kilometraje_acumulado + $value->kilometraje) ?></td>
                </tr>
                <?= $kilometraje_acumulado = $kilometraje_acumulado + $value->kilometraje ?>
              <?php } ?>
          </tbody>
        </table>
        <br>              
        <table style="width: 100%;margin-top: 150px;" border="0" cellpadding="4" cellspacing="0" align="center">
          <tbody style="font-size: 12px!important;" align="center">                                                
            <tr>
              <td colspan="2" align="center">____________________________</td>
              <td colspan="2" align="center">____________________________</td>              
            </tr>
            <tr>
              <td colspan="2" align="center">ELABORÓ:</td>
              <td colspan="2" align="center">REVISÓ:</td>              
            </tr>
            <tr>
              <td colspan="2" align="center">Residente de Obra</td>
              <td colspan="2" align="center">Supervisor de campo</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
</body>