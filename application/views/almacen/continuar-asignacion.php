<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Continuar Asignación / <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?> (Número Empleado <?php echo $detalle->numero_empleado ?>) / Folio <?php echo $folio ?></h3>
      </div>
      <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-asignacion"'); ?>    
      <div class="card-body">
        <?= validation_errors('<span class="error">', '</span>'); ?>
        <table id="data-table-without" class="table table-striped table-bordered display responsive no-wrap" style="width:100%">
          <thead>
            <tr>
              <th data-priority="1">Código</th>                
              <th>Marca</th>
              <th>Modelo</th>
              <th data-priority="2">Descripción</th>
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
              <th>Unidad</th>
              <th title="Categoría">Categoría</th>
              <th>Nota</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
            <?php if (isset($inventario_almacen)): ?>
              <?php foreach ($inventario_almacen as $key => $value): ?>
                <tr>
                  <td><?php echo $value->uid ?></td>
                  <td><?php echo $value->marca ?></td>
                  <td><?php echo $value->modelo ?></td>
                  <td><?php echo $value->descripcion ?>
                    <?php if ($value->tipo==1): ?>
                      <br><small class="text-muted">N° Serie: <?php echo $value->numero_serie ?></small><br><small class="text-muted">N° Interno: <?php echo $value->numero_interno ?>                  
                    <?php endif ?>
                  </td>
                  <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida_abr ?></td>
                  <td title="<?php echo $value->categoria ?>"><?php echo $value->abreviatura ?></td>
                  <td><?php echo $value->nota ?></td>
                  <td align="center">
                    <?php if ($tipo=='alto-costo'): ?>                  
                      <input class="asignacion" type="radio" name="asignacion[]"
                      data-marca="<?php echo $value->marca ?>"
                      data-modelo="<?php echo $value->modelo ?>"
                      data-descripcion="<?php echo $value->descripcion ?>"
                      data-numero="<?php echo $value->numero_interno ?>"
                      data-serie="<?php echo $value->numero_serie ?>"
                      data-nota="<?php echo $value->nota ?>"
                      data-precio="<?php echo ($value->tipo_moneda=='d') ? $value->precio*$precio_dolar : $value->precio ?>"
                      value="<?php echo $value->iddtl_almacen ?>">
                    <?php elseif ($tipo=='hilti'): ?>
                      <input class="asignacion" type="checkbox" name="asignacion[]"
                      data-marca="<?php echo $value->marca ?>"
                      data-modelo="<?php echo $value->modelo ?>"
                      data-descripcion="<?php echo $value->descripcion ?>"
                      data-numero="<?php echo $value->numero_interno ?>"
                      data-serie="<?php echo $value->numero_serie ?>"
                      value="<?php echo $value->iddtl_almacen ?>">
                    <?php else: ?>
                      <input class="asignacion" type="number" name="asignacion_cantidad[]" value="0" minlength="0" maxlength="<?= $value->existencias ?>"
                      data-uid="<?php echo $value->uid ?>"
                      data-marca="<?php echo $value->marca ?>"
                      data-modelo="<?php echo $value->modelo ?>"
                      data-descripcion="<?php echo $value->descripcion ?>">
                      <input type="hidden" name="asignacion[]" value="<?php echo $value->iddtl_almacen ?>">
                    <?php endif ?>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td colspan="8" align="center">No existen productos para mostrar</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
        <br><br>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="form-group">
              <label for="documentoInput">Documento Solicitud de Almacén*</label>
              <input type="file" class="filestyle pull-left" name='solicitud' required accept=".pdf">
            </div>
          </div>
          <?php if ($tipo=='hilti'): ?>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="documentoInput">Documento Salida de Material*</label>
                <input type="file" class="filestyle pull-left" name='salida-almacen' required accept=".pdf">
              </div>
            </div>
          <?php endif ?>
          <?php if ($tipo=='alto-costo'): ?>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="documentoInput">Contrato*</label>
                <input type="file" class="filestyle pull-left" name='contrato' required accept=".pdf">
              </div>
            </div>
          <?php endif ?>
          <?php if ($tipo=='material'): ?>
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
      </div>
      <div class="card-footer text-right">
        <input type="hidden" name="bandera" id="bandera" value="false">
        <input type="hidden" name="uid_usuario" value="<?php echo $this->uri->segment(5) ?>">
        <input type="hidden" name="token" value="<?php echo $token ?>">
        <input type="hidden" name="uid_asignacion" value="<?php echo $uid_asignacion ?>">
        <input type="hidden" name="proyecto" value="<?= $detalle->tbl_proyectos_idtbl_proyectos ?>">
        <input type="hidden" name="tipo" value="<?= $tipo ?>">
        <a href="<?php echo base_url() ?>almacen/asignaciones/alto-costo" class="btn-warning btn">Cancelar</a>
        <button type="button" class="btn-primary btn" id="generar-documentos">Generar documentos</button>
        <input type="submit" class="btn-info btn" value="Asignar">
      </div>
    </div>
  </div>
</section>

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
      $('.asignacion').change(function(event) {
        if (this.checked) {
          $('#table_hilti tr:last').after('<tr id="'+this.value+'"><td>1</td><td>'+$(this).data('descripcion')+' '+$(this).data('marca')+' '+$(this).data('modelo')+'</td><td>Serie: '+$(this).data('serie')+', ID: '+$(this).data('numero')+'</td></tr>');  
        } else {
          $('#'+this.value).remove(); 
        }
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
            if($('#table_hilti tr').length>1) {
              $('#bandera').val('true');
              if(!$('.asignacion').is(':hidden'))
                $('.asignacion').after('Desactivado');             
              $('.asignacion').hide();
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
      $("#form-asignacion").on("submit", function(event) {
        if($('#bandera').val()=='true') {
          var f = $(this);
          var formData = new FormData(document.getElementById("form-asignacion"));
          if (event.isDefaultPrevented()) {
            console.log('Error')
          } else {
            event.preventDefault();
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
                if(resp.status) {
                  location.href ="<?php echo base_url().'personal/detalle/'.$this->uri->segment(5) ?>";
                } else {
                  Toast.fire({
                    type: 'error',
                    title: resp.message
                  })
                }
              }
            });
          }
        } else {
          Toast.fire({
            type: 'error',
            title: 'Debe generar los documentos para ser adjuntados.'
          })
        }
      });
    });
  </script>
  <style type="text/css" media="print">
    @media print {
      #salida_material {
        padding-top: 0;
        display: block!important;
      }
      body {
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
      }
    }
  </style>
  <div id="salida_material" style="display: none">
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
<?php elseif($tipo=='alto-costo'): ?>
  <script>
    $(document).ready(function() {
      $('#form-asignacion .asignacion').on('change', function() {
        $('#bandera').val('true');
        $("#marca span").html($('input.asignacion:checked').data('marca'));
        $("#modelo span").html($('input.asignacion:checked').data('modelo'));
        $("#serie span").html($('input.asignacion:checked').data('serie'));
        $("#numero span").html($('input.asignacion:checked').data('numero'));
        $("#nota span").html($('input.asignacion:checked').data('nota'));
        $("#descripcion span").html($('input.asignacion:checked').data('descripcion'));
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
              if(!$('.asignacion').is(':hidden'))
                $('.asignacion').after('Desactivado');             
              $('.asignacion').hide();
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
        if($('#bandera').val()=='true'){
          var f = $(this);
          var formData = new FormData(document.getElementById("form-asignacion"));
          if (event.isDefaultPrevented()) {
            console.log('Error')
          } else {
            event.preventDefault();
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
                  location.href ="<?php echo base_url().'personal/detalle/'.$this->uri->segment(5) ?>";
                } else {
                  Toast.fire({
                    type: 'error',
                    title: resp.message
                  })
                }
              }
            });
          }
        } else {
          Toast.fire({
            type: 'error',
            title: 'Debe generar los documentos para ser adjuntados.'
          })
        }

      });

    });
  </script>
  <style type="text/css" media="print">
    @media print {
      #salida_material{
        padding-top: 0;
        display: block!important;
      }
      #salida_material table td{
        border: none;
      }
      body{
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
      }
    }
  </style>
  <div id="salida_material" style="display: none">
    <table width="100%" class="table">
      <tbody>
        <tr>
          <td colspan="2" align="center">CONTRATO DE COMODATO </td>
        </tr>
        <tr>
          <td colspan="2">
            Tlalnepantla, Estado de México, a <?= strftime('%d de %B del %Y') ?>, por una parte la sociedad Estevez.Jor Servicios, S.A. de C.V. representada en este acto por  <?= $this->session->userdata('nombre') ?>, a quien de aquí en adelante se denominará “EL COMODANTE” por la otra parte el señor <?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?>, por su  propio derecho, con domicilio en : <?= $detalle->calle. ' ' . $detalle->numero . ', ' . $detalle->colonia . '. ' . $detalle->nombre_municipio . ', '.$detalle->cp.' ' .$detalle->nombre_entidad ?>. Para efectos del presente contrato se denominara “EL COMODATARIO” y el cual se identifica con IFE  Número con clave de elector: <?php echo $detalle->clave_elector ?>   por lo cual ambas partes se sujetan al tenor de la siguientes
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
          <td id="modelo">2.-MODELO: <span></span></td>
        </tr>
        <tr>
          <td id="serie">3.-Número de Serie: <span></span></td>
          <td id="numero">4.-Número Interno: <span></span></td>
        </tr>
        <tr>
          <td colspan="2" id="nota"><span></span></td>
        </tr>
        <tr>
          <td colspan="2">II. El Valor del bien es de $150,000.00 (Ciento cincuenta  mil  pesos 00/100 moneda nacional).</td>
        </tr>
        <tr>
          <td colspan="2">III. El uso que el COMODATARIO le dará buen uso.</td>
        </tr>
        <tr>
          <td colspan="2">
            IV. El Comodatario se obliga a proveer y prever los máximos cuidados en la conservación del bien y hacer todas las reparaciones necesarias que del uso del bien se deriven, así como ser y hacerse  responsable de todos los daños y perjuicios que pudiera causar a un tercero por el proceder de su negligencia deslindando al comodante de toda responsabilidad jurídica o administrativa que pudiera afectarle en su patrimonio.
          </td>
        </tr>
        <tr>
          <td colspan="2">
            V. La duración del contrato será de dos años forzoso para el Comodatario y voluntario para el Comodante por lo cual lo podrá dar por terminado en cualquier momento sin ninguna responsabilidad.
          </td>
        </tr>
        <tr>
          <td colspan="2">
            VI. La devolución del bien ya puntualizado, después de haber transcurrido el término señalado en el punto anterior, deberá ser en el domicilio antes citado del Comodante o en el lugar donde este tenga su residencia.
          </td>
        </tr>
        <tr>
          <td colspan="2">
            VII. En caso de que el bien llegara a perderse, o quedara inservible, ambas partes comodante y comodatario, están conformes en que, si la pérdida del objeto  se deriva de una culpa del comodatario, éste deberá pagar la cantidad de $150,000.00. (Ciento cincuenta  mil  pesos 00/100 moneda nacional) al comodante. En un plazo no mayor de 5 días contados a partir del evento. Esta cláusula quedará sin ningún efecto si la pérdida del objeto se deriva de un caso fortuito o fuerza mayor.
          </td>
        </tr>
        <tr>
          <td colspan="2">
            VIII.- Ambas partes convienen en que el bien mueble otorgado al Comodatario en comodato es en forma personalísima y responderá por cualquier daño que por su negligencia causare en el mismo, razón por lo que desde este momento se prohíbe al comodatario prestar, arrendar o por cualquier medio ceder en parte o en todo la posesión y uso del bien mueble que le es otorgado en comodato a un tercero en el presente contrato y que  quedo debidamente descrito con anterioridad.
          </td>
        </tr>
        <tr>
          <td colspan="2">
            IX.- Para el caso de que se termine la relación contractual en el presente contrato, el Comodatario se obliga a hacer la devolución inmediata  del bien mueble en el domicilio del Comodante, previo inventario del estado que guarda el bien mueble, por escrito firmado por ambas partes, que servirá como el recibo más amplio que a derecho corresponda. Por lo anterior y a para el caso de que al terminar la relación en el presente contrato, el comodatario no haga la entrega del bien mueble otorgado en comodato descrito anteriormente, se estará a lo dispuesto en el Código Penal Para el Estado de México en sus Artículos 302 y 303  en su fracción III, al tipificarse el ABUSO DE CONFIANZA artículos que se insertan en el presente contrato y se transcriben a la letra:
          </td>
        </tr>                    
        <tr>
          <td colspan="2">
            “ARTICULO 302.- Comete el delito de abuso de confianza, el que con perjuicio de alguien disponga para si o para otro de cualquier bien ajeno mueble, del que se le hubiese transmitido la tenencia y no el dominio.
            ARTÍCULO 303.- Se equipara el delito de abuso de confianza: III.- La ilegitima posesión de bien retenido, si el tenedor o poseedor no lo devuelve a pesar de ser requerido formalmente por quien tenga derecho o no lo entregue a la autoridad para que este disponga del mismo conforme a la ley…”
          </td>
        </tr>
        <tr>
          <td colspan="2">
            X.- Para todo lo relativo a la interpretación, cumplimiento y ejecución del presente contrato las partes se someten expresamente a la Jurisdicción de los Tribunales competentes en la Ciudad de México, Distrito Federal y renuncian por lo tanto a cualquier otra jurisdicción que pudiere corresponderles por razón de su domicilio presente o futuro.
            Ambas partes manifiestan que están en pleno uso de sus facultades físicas y mentales y que son capaces para celebrar el contrato de comodato que en este escrito se contiene, firmándose un original y una copia, por todas las personas que en el mismo aparecen bajo diferentes caracteres.
          </td>
        </tr>                      
        <tr>
          <td height="50" width="100%" colspan="4">
            
          </td>
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
  </div>
<?php else: ?>
  <script>
    $(document).ready(function() {
      $('.asignacion').change(function(event) {
        if (this.value>0) {
          $('#'+$(this).data('uid')).remove();
          $('#table_material tr:last').after('<tr id="'+$(this).data('uid')+'"><td>'+$(this).data('descripcion')+' '+$(this).data('modelo')+' ('+$(this).data('marca')+')</td><td>'+this.value+'</td></tr>');  
        } else {
          $('#'+$(this).data('uid')).remove();
        }
      });
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
              if(!$('.asignacion').is(':hidden'))
                $('.asignacion').after('Desactivado');             
              $('.asignacion').hide();
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
        if($('#bandera').val()=='true'){
          var f = $(this);
          var formData = new FormData(document.getElementById("form-asignacion"));
          if (event.isDefaultPrevented()) {
            console.log('Error')
          } else {
            event.preventDefault();
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
                  location.href ="<?php echo base_url().'personal/detalle/'.$this->uri->segment(5) ?>";
                } else {
                  Toast.fire({
                    type: 'error',
                    title: resp.message
                  })
                }
              }
            });
          }
        } else {
          Toast.fire({
            type: 'error',
            title: 'Debe generar los documentos para ser adjuntados.'
          })
        }
      });
    });
  </script>
  <style type="text/css" media="print">
    @media print {
      #salida_material{
        padding-top: 0;
        display: block!important;
      }
      body{
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
      }
    }
  </style>
  <div id="salida_material" style="display: none">
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
        <tr>
          <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
          <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
        </tr>
      </tbody>
    </table>
  </div>
<?php endif ?>


