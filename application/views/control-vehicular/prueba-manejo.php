<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Prueba de Manejo</h3>
      </div>
      <div class="card-body">
        <?= form_open('ControlVehicular/guardarPruebaManejo', 'class="grid-form needs-validation" novalidate'); ?>
        <div class="row">
          <div class="col-sm-4 text-center">
            <img width="130" height="80" src="<?php echo base_url(); ?>img/logo-estevez-jor.png">
          </div>
          <div class="col-sm-4 text-center">
            <strong>
              ESTEVEZJOR SERVICIOS S.A. DE C.V.<br><br>PRUEBA DE MANEJO
            </strong>
          </div>
          <div class="col-sm-4">
            <table class="table table-sm">
              <tr>
                <td><strong style="font-size: 10px;"><center>Fecha</center></strong><input style="border: none;border-bottom: solid 1px;" class="form-control" required type="date" name="fecha"></td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-sm table-striped">
              <tr>
                <td><strong class="text-center" style="font-size: 10px;"><center>NOMBRE DEL EVALUADO</center></strong><input required type="text" name="nombre_evaluado" value="<?= $detalle->nombres ?> <?= $detalle->apellido_paterno ?> <?= $detalle->apellido_materno ?>" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
                <td><strong style="font-size: 10px;"><center>FIRMA</center></strong><input type="text" name="firma" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
              </tr>
              <tr>
                <td><strong class="text-center" style="font-size: 10px;"><center>NOMBRE DEL APLICANTE</center></strong><input required type="text" name="nombre_aplicante" value="<?= $this->session->userdata('nombre') ?>" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
                <td><strong style="font-size: 10px;"><center>TIPO LICENCIA</center></strong><input required type="text" name="tipo_licencia" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
              </tr>
              <tr>
                <td><strong class="text-center" style="font-size: 10px;"><center>VIGENCIA LICENCIA</center></strong><input required type="date" name="vigencia_licencia" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
                <td><strong style="font-size: 10px;"><center>LOCALIDAD LICENCIA</center></strong><input required type="text" name="localidad_licencia" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-8">
            <table class="table table-sm table-striped text-center">
              <tr>
                <td rowspan="2"><strong style="font-size: 10px;">RANGOS DE EVALUACION</strong></td>
              </tr>
              <tr>
                <td><input type="radio" name="evaluacion" value="deficiente" required>&nbsp;<span class="label-check" style="font-size: 10px;"><strong>DEFICIENTE (D)</strong></span></td>
                <td><input type="radio" name="evaluacion" value="regular" required>&nbsp;<span class="label-check" style="font-size: 10px;"><strong>REGULAR (R)</strong></span></td>
                <td><input type="radio" name="evaluacion" value="bueno" required>&nbsp;<span class="label-check" style="font-size: 10px;"><strong>BUENO (B)</strong></span></td>
              </tr>
            </table>
          </div>
          <div class="col-md-4">
            <table class="table table-sm table-striped text-center">
              <tr>
                <td><strong style="font-size: 10px;">AUTORIZACIÓN</strong></td>
              </tr>
              <tr>
                <td><input type="text" required name="autorizacion" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
              </tr>
              <tr>
                <td><strong style="font-size: 10px;">UNIDAD</strong></td>
              </tr>
              <tr>
                <td><input type="text" required name="unidad" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-sm table-striped text-center">
              <tr>
                <td>ASPECTOS DE LA EVALUACIÓN</td>
                <td>FACTOR EVALUADO</td>
                <td>EV</td>
                <td>PROMEDIO</td>
              </tr>
              <tr>
                <td rowspan="10">CONOCIMIENTO, INSPECCIÓN<br>Y ADAPTACIÓN DEL VEHICULO<br><br><strong>Se da aviso que lo tiene que realizar y reportar a taller mecánico en su caso</strong></td>
                <td>Inspección de los niveles de aceite y gasolina</td>
                <td><input class="check" name="ch1" type="checkbox"></td>
                <td rowspan="10"><input id="promedio1" type="text" value="0" readonly="true" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
              </tr>
              <tr>
                <td>Verificación del estado de la batería y niveles de electrolitos</td>
                <td><input class="check" name="ch2" type="checkbox"></td>
              </tr>
              <tr>
                <td>Inspección y verificación del sistema de frenos</td>
                <td><input class="check" name="ch3" type="checkbox"></td>
              </tr>
              <tr>
                <td>Inspección del nivel de refrigerante</td>
                <td><input class="check" name="ch4" type="checkbox"></td>
              </tr>
              <tr>
                <td>Verificación estado de llantas (Estado y Presión)</td>
                <td><input class="check" name="ch5" type="checkbox"></td>
              </tr>
              <tr>
                <td>Verificación del estado de las luces (Altas, bajas, direccionales, freno, de parquero)</td>
                <td><input class="check" name="ch6" type="checkbox"></td>
              </tr>
              <tr>
                <td>Adaptación o graduación de espejos</td>
                <td><input class="check" name="ch7" type="checkbox"></td>
              </tr>
              <tr>
                <td>Adaptación o graduación del conturón de seguridad</td>
                <td><input class="check" name="ch8" type="checkbox"></td>
              </tr>
              <tr>
                <td>Identificación de los controles</td>
                <td><input class="check" name="ch9" type="checkbox"></td>
              </tr>
              <tr>
                <td>Observaciones / Autorización</td>
                <td><textarea name="observacion1" class="form-control" style="border: none;border-bottom: solid 1px;"></textarea></td>
              </tr>
              
              <tr>
                <td rowspan="15"><strong>DESTREZA Y HABILIDAD<br>EN EL MANEJO DE LOS<br>MECANISMOS DE<br>CONTRIOL Y LA<br>CONDUCCION DEL<br>VEHICULO</strong></td>
                <td>Maniobra de encendido y arranque del vehículo</td>
                <td><input class="check" name="ch10" type="checkbox"></td>
                <td rowspan="15"><input id="promedio2" type="text" value="0" readonly="true" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
              </tr>
              <tr>
                <td>Puesta en marcha en plano y en pendiente</td>
                <td><input class="check" name="ch11" type="checkbox"></td>
              </tr>
              <tr>
                <td>Avance en línea recta y con ángulos</td>
                <td><input class="check" name="ch12" type="checkbox"></td>
              </tr>
              <tr>
                <td>Coordinación de maniobra cambio-embrague</td>
                <td><input class="check" name="ch13" type="checkbox"></td>
              </tr>
              <tr>
                <td>Coordinación de maniobra aceleración-freno-embrague</td>
                <td><input class="check" name="ch14" type="checkbox"></td>
              </tr>
              <tr>
                <td>Utilización de cambios ascendentes-descendentes</td>
                <td><input class="check" name="ch15" type="checkbox"></td>
              </tr>
              <tr>
                <td>Utilización de los frenos</td>
                <td><input class="check" name="ch16" type="checkbox"></td>
              </tr>
              <tr>
                <td>Utilización de los frenos y maniobra de reversa</td>
                <td><input class="check" name="ch17" type="checkbox"></td>
              </tr>
              <tr>
                <td>Descenso y ascenso en terreno inclinado</td>
                <td><input class="check" name="ch18" type="checkbox"></td>
              </tr>
              <tr>
                <td>Detención del vehículo y arranque en pendiente</td>
                <td><input class="check" name="ch19" type="checkbox"></td>
              </tr>
              <tr>
                <td>Maniobra de viraje y adelantamiento</td>
                <td><input class="check" name="ch20" type="checkbox"></td>
              </tr>
              <tr>
                <td>Reducción de velocidad y detenimiento en marcha</td>
                <td><input class="check" name="ch21" type="checkbox"></td>
              </tr>
              <tr>
                <td>Ingreso al área de parqueo</td>
                <td><input class="check" name="ch22" type="checkbox"></td>
              </tr>
              <tr>
                <td>Parqueo en reversa</td>
                <td><input class="check" name="ch23" type="checkbox"></td>
              </tr>
              <tr>
                <td>Observaciones / Autorización</td>
                <td><textarea name="observacion2" class="form-control" style="border: none;border-bottom: solid 1px;"></textarea></td>
              </tr>

              <tr></tr>
              <tr>
                <td rowspan="11">COMPORTAMIENTO DEL CONDUCTO<br> FRENTE AL TRANSITO, RESPETO<br> POR LAS SEÑALES DE TRANSITO,<br> POR EL PEATÓN, USO ADECUADO<br> DE LA INFRAESTRUCTURA<br><br><strong>Se da aviso, es su<br> responsabilidad cualquier incidencia<br> y se cobraran multas</strong></td>
                <td>Utilización de las señales de cruce</td>
                <td><input class="check" name="ch24" type="checkbox"></td>
                <td rowspan="11"><input id="promedio3" type="text" value="0" readonly="true" style="border: none;border-bottom: solid 1px;" class="form-control"></td>
              </tr>
              <tr>
                <td>Distancias de seguimiento, de parada y lateral</td>
                <td><input class="check" name="ch25" type="checkbox"></td>
              </tr>
              <tr>
                <td>Adelantamientos</td>
                <td><input class="check" name="ch26" type="checkbox"></td>
              </tr>
              <tr>
                <td>Cruces</td>
                <td><input class="check" name="ch27" type="checkbox"></td>
              </tr>
              <tr>
                <td>Intersecciones</td>
                <td><input class="check" name="ch28" type="checkbox"></td>
              </tr>
              <tr>
                <td>Glorietas</td>
                <td><input class="check" name="ch29" type="checkbox"></td>
              </tr>
              <tr>
                <td>Cambios de Carril y de calzada</td>
                <td><input class="check" name="ch30" type="checkbox"></td>
              </tr>
              <tr>
                <td>Maniobras de virajes</td>
                <td><input class="check" name="ch31" type="checkbox"></td>
              </tr>
              <tr>
                <td>Utilización de luces direccionales</td>
                <td><input class="check" name="ch32" type="checkbox"></td>
              </tr>
              <tr>
                <td>Seguimiento y cumplimiento de las señales de tránsito</td>
                <td><input class="check" name="ch33" type="checkbox"></td>
              </tr>
              <tr>
                <td>Observaciones / Autorización</td>
                <td><textarea name="observacion3" class="form-control" style="border: none;border-bottom: solid 1px;"></textarea></td>
              </tr>
            </table>
          </div>
        </div>
        <br>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-sm table-striped">
              <tr>
                <td>Se notifica a conductor su responsabilidad una vez asignada la unidad :<strong>sobre mal uso, responsabilidad por faltas a la autoridad y golpes</strong></td>
                <td><input id="promedioGeneral" type="text" value="0" readonly="true" style="border: none;border-bottom: solid 1px;"></td>
              </tr>
              <tr>
                <td>Se le avisa que <strong>en caso de siniestro</strong> avisar a control vehicular y seguro de la póliza en unidad</td>
              </tr>
            </table>
          </div>
        </div>
        <input type="hidden" name="uid" value="<?= $uid ?>">
        <div class="text-right">
          <a href="<?= base_url();?>personal/detalle/<?= $uid ?>" class="btn btn-default">Cancelar</button></a>
          <?= form_hidden('token',$token) ?>
          <input type="submit" value="Guardar" class="btn btn-info">
        </div>
       <?=form_close()?> 
      </div>
    </div>
  </div>
</section>
<script>
  $('.check').change(function(event) {
      
    $("input[name=ch1]:checked").val() == 'on' ? ch1 = 10 : ch1 = 0;
    $("input[name=ch2]:checked").val() == 'on' ? ch2 = 10 : ch2 = 0;
    $("input[name=ch3]:checked").val() == 'on' ? ch3 = 10 : ch3 = 0;
    $("input[name=ch4]:checked").val() == 'on' ? ch4 = 10 : ch4 = 0;
    $("input[name=ch5]:checked").val() == 'on' ? ch5 = 10 : ch5 = 0;
    $("input[name=ch6]:checked").val() == 'on' ? ch6 = 10 : ch6 = 0;
    $("input[name=ch7]:checked").val() == 'on' ? ch7 = 10 : ch7 = 0;
    $("input[name=ch8]:checked").val() == 'on' ? ch8 = 10 : ch8 = 0;
    $("input[name=ch9]:checked").val() == 'on' ? ch9 = 10 : ch9 = 0;
    resultado = (ch1 + ch2 + ch3 + ch4 + ch5 + ch6 + ch7 + ch8 + ch9) / 9;
    $("#promedio1").val(resultado.toFixed(2));

    $("input[name=ch10]:checked").val() == 'on' ? ch10 = 10 : ch10 = 0;
    $("input[name=ch11]:checked").val() == 'on' ? ch11 = 10 : ch11 = 0;
    $("input[name=ch12]:checked").val() == 'on' ? ch12 = 10 : ch12 = 0;
    $("input[name=ch13]:checked").val() == 'on' ? ch13 = 10 : ch13 = 0;
    $("input[name=ch14]:checked").val() == 'on' ? ch14 = 10 : ch14 = 0;
    $("input[name=ch15]:checked").val() == 'on' ? ch15 = 10 : ch15 = 0;
    $("input[name=ch16]:checked").val() == 'on' ? ch16 = 10 : ch16 = 0;
    $("input[name=ch17]:checked").val() == 'on' ? ch17 = 10 : ch17 = 0;
    $("input[name=ch18]:checked").val() == 'on' ? ch18 = 10 : ch18 = 0;
    $("input[name=ch19]:checked").val() == 'on' ? ch19 = 10 : ch19 = 0;
    $("input[name=ch20]:checked").val() == 'on' ? ch20 = 10 : ch20 = 0;
    $("input[name=ch21]:checked").val() == 'on' ? ch21 = 10 : ch21 = 0;
    $("input[name=ch22]:checked").val() == 'on' ? ch22 = 10 : ch22 = 0;
    $("input[name=ch23]:checked").val() == 'on' ? ch23 = 10 : ch23 = 0;
    resultado2 = (ch10 + ch11 + ch12 + ch13 + ch14 + ch15 + ch16 + ch17 + ch18 + ch19 + ch20 + ch21 + ch22 + ch23) / 14;
    $("#promedio2").val(resultado2.toFixed(2));

    $("input[name=ch24]:checked").val() == 'on' ? ch24 = 10 : ch24 = 0;
    $("input[name=ch25]:checked").val() == 'on' ? ch25 = 10 : ch25 = 0;
    $("input[name=ch26]:checked").val() == 'on' ? ch26 = 10 : ch26 = 0;
    $("input[name=ch27]:checked").val() == 'on' ? ch27 = 10 : ch27 = 0;
    $("input[name=ch28]:checked").val() == 'on' ? ch28 = 10 : ch28 = 0;
    $("input[name=ch29]:checked").val() == 'on' ? ch29 = 10 : ch29 = 0;
    $("input[name=ch30]:checked").val() == 'on' ? ch30 = 10 : ch30 = 0;
    $("input[name=ch31]:checked").val() == 'on' ? ch31 = 10 : ch31 = 0;
    $("input[name=ch32]:checked").val() == 'on' ? ch32 = 10 : ch32 = 0;
    $("input[name=ch33]:checked").val() == 'on' ? ch33 = 10 : ch33 = 0;
    resultado3 = (ch24 + ch25 + ch26 + ch27 + ch28 + ch29 + ch30 + ch31 + ch32 + ch33) / 10;
    $("#promedio3").val(resultado3.toFixed(2));

    promedioGeneral = (resultado + resultado2 + resultado3) / 3;

    $("#promedioGeneral").val(promedioGeneral.toFixed(2));

  });
</script>