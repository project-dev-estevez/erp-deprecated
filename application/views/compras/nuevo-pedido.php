<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3>Buscar Solicitud</h3>
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="col">
            <label for="">Ingrese número de solicitud</label>
            <input type="text" class="form-control" id="uid">
          </div>
        </div>
        <br>
        <button class="btn btn-primary" type="button" id="buscar">Buscar Solicitud</button>
        <button class="btn btn-primary" type="button" disabled style="display:none" id="loading">
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        Cargando...
        </button>
      </div>
    </div>
    <div class="card" id="resultado" style="display:none">
      <div class="card-header">
        <h3>Datos Pedido</h3>
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="col-xs-12 col-md-7 col-lg-6">
            <label for="">Nombre quien solicita</label>
            <input type="text" class="form-control" disabled id="solicita">            
          </div>
          <div class="col-xs-12 col-md-5 col-lg-6">
            <label for="">Cliente</label>
            <input type="text" class="form-control" disabled id="cliente"> 
          </div>
        </div>
        <div class="form-row pt-2">
          <div class="col">
            <label for="">UID Solicitud</label>
            <input type="text" class="form-control uid-solicitud" disabled> 
          </div>
          <div class="col">
            <label for="">Fecha Límite</label>
            <input type="text" class="form-control" disabled id="fecha-limite">
          </div>
          <div class="col">
            <label for="">Fecha Solicitud</label>
            <input type="text" class="form-control" disabled id="fecha-solicitud">
          </div>
        </div>
        <div class="form-row pt-2">
          <div class="col-xs-12 col-md-7">
            <label for="">Proyecto</label>
            <input type="text" class="form-control" disabled id="proyecto"> 
          </div>
          <div class="col-xs-12 col-md-5">
            <label for="">Segmento</label>
            <input type="text" class="form-control" disabled id="segmento-mostrar"> 
          </div>
        </div>
        <div class="form-row pt-2">
          <div class="col">
            <label for="">Sugerencia de Proveedor</label>
            <input type="text" class="form-control" disabled id="sugerencia"> 
          </div>
        </div>
        <form class="needs-validation" novalidate id="formuploadajax" method="post">
          <div class="form-row pt-2">
            <div class="col">
              <label for="">Proveedor*</label>
                <select name="proveedor" id="proveedor" class="selectpicker" required data-live-search="true">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php if ($proveedores): ?>
                    <?php foreach ($proveedores as $key => $value): ?>
                      <option value="<?=$value->idtbl_proveedores?>"><?= $value->nombre_fiscal ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
            </div>
          </div>
          <div class="form-row pt-2">
            <div class="col">
              <label for="">Almacén*</label>
                <select name="id_almacen" id="id-almacen" class="form-control" required>
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <option value="1">Almacen General</option>
                  <option value="2">Alto Costo</option>
                  <option value="16">Kuali Digital</option>
                  <option value="23">Área Médica</option>
                  <option value="29">Control Vehicular</option>
                  <option value="0">Seguridad e Higiene</option>
                  <option value="30">Sistemas</option>
                  <option value="228">Fundidora</option>
                  <option value="357">Administrativo</option>
                  <option value="358">Mantenimiento</option>
                  <option value="398">Personal</option>
                  <option value="421">Makili</option>
                </select>
            </div>
          </div>
          <div class="form-row pt-2">
            <div class="col-12 col-md-3">
              <label for="">Fecha pedido*</label>
              <input type="date" name="fecha_pedido" class="form-control" required>
            </div>
            <div class="col-12 col-md-3">
              <label for="">Neodata Pedido*</label>
              <input type="text" name="neodata" class="form-control" required minlength="2">
            </div>
            <div class="col-12 col-md-3">
              <label for="">Tipo de Moneda*</label>
              <select name="moneda" class="form-control" required>
                <option value="" disabled selected>Seleccione...</option>
                <option value="p">Pesos</option>
                <option value="d">Dolares</option>
              </select> 
            </div>
            <div class="col-12 col-md-3">
              <label for="">Condición de Pago*</label>
              <select name="condicion-pago" class="form-control" required>
                <option value="" disabled selected>Seleccione...</option>
                <option value="contado">contado</option>
                <option value="15">15 días</option>
                <option value="30">30 días</option>
                <option value="45">45 días</option>
                <option value="60">60 días</option>
                <option value="90">90 días</option>
                <option value="120">120 días</option>
                <option value="180">180 días</option>
                <option value="360">360 días</option>
                <option value="12">12 meses</option>
              </select>
            </div>
            
          </div>
          <div class="form-row pt-2">
            <div class="col-xs-12 col-md-6">
              <label for="">Lugar de entrega*</label>
              <textarea class="form-control" name="lugar-entrega" rows="3" required></textarea>
            </div>
            <div class="col-xs-12 col-md-6">
              <label for="">Observaciones</label>
              <textarea class="form-control" name="observaciones" rows="3"></textarea>
            </div>
          </div>
          <hr>
          <div class="form-row pt-2">
            <div class="col table-responsive">
              <label for=""><h3>Detalle</h3></label>
              <table class="table table-bordered" id="table-pedido">
                <thead>
                  <tr>
                    <th>Descripción</th>
                    <th>Codigo pedido neodata</th>
                    <th>Unidad</th>
                    <th>Entrega*</th>
                    <th style="min-width: 25px;">Cantidad solicitada</th>
                    <th style="min-width: 25px;">Cantidad pedida</th>
                    <th style="min-width: 25px;">Cantidad a pedir*</th>
                    <th style="min-width: 25px;">Precio Unitario*</th>
                    <th style="min-width: 25px;">Precio Promedio</th>
                    <th>Importe</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <div class="form-row p-3">
                <div class="col-12 col-md-4">
                  <label for="devolucion_fondo_garantia">Nota de credito*</label>
                  <input type="number" class="form-control devolucion_fondo_garantia" name="nota_credito" value="0" step="0.0001" required>
                </div>
                <div class="col-12 col-md-4">
              <label for="devolucion_fondo_garantia">Descuento</label>
              <input type="number" class="form-control devolucion_fondo_garantia" name="amortizacion" value="0" step="0.0001" required>
            </div>
              </div>
            </div>
          </div>
          <br>
          <table class="table table-bordered">
            <thead>
              <tr>
                <td width="50%" style="text-align: center;font-weight: bold;">Retención</td>
                <td width="50%" style="text-align: center;font-weight: bold;">IVA</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <center>
                    <div class="row">
                    <div class="col-6">
                      <label>IVA</label><br>
                      <input type="radio" name="iva_retencion" value="4"> <strong>4%</strong>
                      <input type="radio" name="iva_retencion" value="10.67"> <strong>10.67%</strong>
                      <!--<input type="radio" name="porcentaje" value="6"> <strong>6%</strong>-->
                    </div>
                    <div class="col-6">
                      <label>ISR</label><br>
                      <input type="radio" name="porcentaje" value="1.25"> <strong>1.25%</strong>
                      <input type="radio" name="porcentaje" value="10"> <strong>10%</strong>
                      <!--<input type="radio" name="porcentaje" value="6"> <strong>6%</strong>-->
                    </div>
                    </div>
                  </center>
                  <div id="retencion" style="display: none">  
                    <center>
                      <div id="texto0">
                        <label>Retención del 1.25%</label>
                      </div>
                      <div id="texto1">
                        <label>Retención del 10%</label>
                      </div>
                      <!--<div id="texto2">
                        <label>Retención del 6%</label>
                      </div>-->
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="retencion">
                      </div>
                    </center>  
                  </div>
                </td>
                <td>
                  <center>
                    <div class="col-sm-12">
                      <input type="radio" name="iva" value="0" required> <strong>0%</strong>
                      <input type="radio" name="iva" value="8"> <strong>8%</strong>
                      <input type="radio" name="iva" value="16"> <strong>16%</strong>
                    </div>
                  </center>  
                </td>
              </tr>
            </tbody>
          </table>
          <br>
          <div class="col-6">
          <!--br><br> 
          <div id="material_diverso"></div-->
          <div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' id="entrada_virtual" name="entrada_virtual">
          <label class='custom-control-label' for='entrada_virtual'>Servicio</label></div>              
          </div>         
          <?= form_hidden('token',$token) ?>
          <input type="hidden" name="id_autor" class="form-control" id="id-autor">
          <!--<input type="text" name="id_almacen" class="form-control" id="id-almacen">-->
          <input type="hidden" class="uid-solicitud" name="uid">
          <input type="hidden" id="id-solicitud" name="id-solicitud">
          <input type="hidden" id="idproyecto" name="proyecto">
           <input type="hidden" class="form-control" name="segmento" id="segmento"> 
          <button class="btn btn-info pull-right" type="submit" id="btn-generar-pedido">Generar Pedido</button>
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  function calcularPromedio(elemento) {
    var _this = $(elemento).closest('.tr-producto');
    var promedioIn = parseInt(_this.find('.precio-promedio').val());
    var precio = parseFloat($(elemento).val());
    if(promedioIn!=0) {
      var dec=(promedioIn+precio)/2
      _this.find('.precio_promedio').val(dec.toFixed(4));
      console.log((promedioIn+precio)/2);
    } else if(promedioIn==0) {
      var dec=precio;
      _this.find('.precio_promedio').val(dec.toFixed(4));
    }
  }
  $(document).on('change', '.cantidades', function () {
    var _this = $(this).closest('.tr-producto');
    _this.find('.importes span').html((Number(_this.find('.cantidad').val()) * Number(_this.find('.precio').val())).toLocaleString());
    if (_this.find('.cantidad').val() == 0) {
      _this.find('.fecha_entrega').removeAttr('required');
      _this.find('.precio').removeAttr('min');
      _this.find('.precio_promedio').removeAttr('min');
    } else {
      _this.find('.fecha_entrega').attr('required', 'required');
      _this.find('.precio').attr('min', '0.01');
      _this.find('.precio_promedio').attr('min', '0.01');
    }
  });
  $(document).on('change', '.precio', function () {
    var _this = $(this).closest('.tr-producto');
    _this.find('.importes span').html((Number(_this.find('.cantidad').val()) * Number(_this.find('.precio').val())).toLocaleString());
  });
  $(document).ready(function () {
    $("#formuploadajax").on("submit", function (event) {
      var formData = new FormData(event.target);
      //$('#btn-generar-pedido').attr('disabled', true);
      console.log(formData);
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        var ceros = true;
        $('input.cantidad').each(function (index, el) {
          if ($(el).val() != 0 && $($('input[type="date"]')[index]).val() == '') {
            $($('input[type="date"]')[index]).attr('required', 'required');
            $($('input.precio')[index]).attr('min', '0.0001');
            $($('input.precio_promedio')[index]).attr('min', '0.0001');
          }
          if ($(el).val() != 0) {
            ceros = false;
          }
        });
        if (ceros) {
          Toast.fire({
            type: 'error',
            title: 'Todas las cantidades se encuentran en 0'
          });
          return 0;
        } else {
          $.ajax({
            url: "<?= base_url()?>compras/guardar-pedido",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function (res) {
              var resp = JSON.parse(res.responseText);
              console.log(resp)
              if (resp.error == false) {
                $('#btn-generar-pedido').attr('disabled', true);
                window.location.replace("<?= base_url()?>compras");
              } else {
                $('#btn-generar-pedido').attr('disabled', true);
                Toast.fire({
                  type: 'error',
                  title: resp.mensaje
                })
              }

            }
          });
        }
      }
    });
    $('#buscar').on('click', function () {
      $('#table-pedido > tbody').html('');
      if ($('#uid').val() == '') {
        return false
      }
      $uid = $('#uid').val();
      $.ajax({
        type: 'POST',
        url: '<?=base_url()?>compras/datossolicitud',
        data: {
          uid: $('#uid').val(),
          token: '<?= $token ?>'
        },
        beforeSend: function () {
          $('#buscar').hide();
          $('#loading').show();
          $('#resultado').hide();
        },
        success: function (data) {
          if (data.error == false) {
            console.log(data);
            $estatus_solicitud = data.datos.solicitud.estatus_solicitud;
            $('#resultado').show('slow');
            $('#solicita').val(data.datos.solicitud.nombre)
            $('.uid-solicitud').val(data.datos.solicitud.uid)
            $('#fecha-limite').val(data.datos.solicitud.fecha_limite)
            $('#fecha-solicitud').val(data.datos.solicitud.fecha_creacion)
            $('#cliente').val(data.datos.solicitud.nombre_comercial)
            $('#proyecto').val(data.datos.solicitud.numero_proyecto + ' ' + data.datos.solicitud.nombre_proyecto)
            $('#idproyecto').val(data.datos.solicitud.tbl_proyectos_idtbl_proyectos)
            $('#segmento-mostrar').val( (data.datos.solicitud.tbl_segmentos_proyecto_idtbl_segmentos_proyecto == undefined || data.datos.solicitud.tbl_segmentos_proyecto_idtbl_segmentos_proyecto.length == 0)? data.datos.solicitud.direccion : data.datos.solicitud.segmento )
            $('#segmento').val( data.datos.solicitud.tbl_segmentos_proyecto_idtbl_segmentos_proyecto )
            $('#sugerencia').val(data.datos.solicitud.sugerencia_proveedor)
            $('#id-solicitud').val(data.datos.solicitud.idtbl_solicitudes_almacen)
            $('#id-autor').val(data.datos.solicitud.tbl_users_idtbl_users_autor)
            if(data.datos.solicitud.tbl_users_idtbl_users_autor == 34){
              $('#id-almacen').val(0)
            }else{
              $('#id-almacen').val(data.datos.solicitud.tbl_almacenes_idtbl_almacenes)
            }
            var bandera = true;
            //var material_diverso = 0;
            //echo var bandera;
            
            data.datos.detalle.forEach(function (elemento) {
              // console.log(elemento);
              //se cambió está parte del 6to td primer input
              //'<input type="number" class="form-control cantidades cantidad" name="cantidad[]" value="0" required min="0" step="0.0001" max="'+(elemento.cantidad-elemento.comprado)+'">'+
              if (elemento.cantidad != elemento.comprado) {
                bandera = false;
                promedio = parseFloat(data.datos.promedio[elemento.tbl_catalogo_idtbl_catalogo])
                if (isNaN(promedio)) {
                  promedio = 0;
                }
                /*console.log(elemento.neodata); */                  
                       
                $('#table-pedido > tbody:last-child').append(
                  '<tr class="tr tr-producto  productoFieldset">'+
                    '<td><span class="color_azul_claro">' + elemento.neodata + '</span><br>' + escapeHtml(elemento.descripcion) +'</td>'+
                    '<td><input class="form-control neodata" autocomplete="off" type="text" required><input class="form-control producto" id="productos" autocomplete="off" type="hidden" name="producto[]" required><div class="list-group sugerencias"></div>' +'</td>'+
                    '<td>'+elemento.unidad_medida_abr+'</td>'+
                    '<td><input type="date" class="form-control fecha_entrega" name="fechaEntrega[]"></td>'+
                    '<td>'+elemento.cantidad+'</td>'+
                    '<td>'+elemento.comprado+'</td>'+
                    '<td>'+
                      '<input type="number" class="form-control cantidades cantidad" name="cantidad[]" value="0" required min="0" step="0.0001">'+
                      '<input type="hidden" class="form-control" name="id-producto-catalogo[]" value="'+elemento.tbl_catalogo_idtbl_catalogo+'" required>'+
                      '<input type="hidden" class="form-control" name="id_registro[]" value="'+elemento.iddtl_solicitud_catalogo+'" required>'+
                    '</td>'+
                    '<td>'+
                      '<input type="number" class="form-control precio" name="precio[]" onkeyup="calcularPromedio(this);" step="0.0001" value="0">'+
                    '</td>'+
                    '<td>'+
                      '<input type="number" class="form-control precio_promedio" name="precio_promedio[]" step="0.0001" value="' + promedio.toFixed(2) + '"><input type="hidden" class="precio-promedio" value="'+ promedio.toFixed(2) +'">'+
                    '</td>' +
                    '<td class="importes">$<span>0.00</span></td>'+
                  '</tr>'                  
                );
               /* if(elemento.neodata == 'AD-PER-MAT-001'){                  
                  material_diverso ++;                 
                }
                else if(elemento.neodata == 'CN-MAT-DIV-001'){
                  material_diverso ++;
                }
                else if(elemento.neodata == 'CN-MAT-DIV-002'){
                  material_diverso ++;
                }
                else if(elemento.neodata == 'RF-MAT-DIV-001'){
                  material_diverso ++;
                }*/
              }
            });
            console.log("bandera:", bandera)
            if (bandera) {
              $('#btn-generar-pedido').hide();
              $('#table > tbody:last-child').append('<tr><td colspan="9" align="center"><div class="alert alert-success" role="alert">Solicitud Completada</div></td></tr>')
            }
            if ($estatus_solicitud != 'aprobada') {
              $('#btn-generar-pedido').hide();
              $('#table > tbody:last-child').append('<tr><td colspan="9" align="center"><div class="alert alert-warning" role="alert">Esta solicitud no esta aprobada</div></td></tr>')
            }
           /* console.log(material_diverso);
           if(material_diverso > 0){
              $('#material_diverso').append('<input type="file" id="factura[]" name="factura[]" class="" ><br><br><br>');
            }*/

          } else {
            Toast.fire({
              type: 'error',
              title: data.mensaje
            })
          }
        },
        error: function (xhr) { // if error occured
          console.log("error::", xhr)
          Toast.fire({
            type: 'error',
            title: 'Algo salio mal.'
          })

        },
        complete: function () {

        },
        dataType: 'json'
      }).always(function () {
        $('#buscar').show();
        $('#loading').hide();
      });
    })
  });
  $(document).on('change', '.moneda-select', function () {
    var _this = $(this);
    var indentificador = _this.attr('data-producto');
    $(".moneda"+indentificador).val(_this.val());
  });
  $(document).on('change', '.proveedor-select', function () {
    var _this = $(this);
    var indentificador = _this.attr('data-producto');
    $(".proveedor"+indentificador).val(_this.val());
  });  
  $(document).on('change', '.condicion-select', function () {
    var _this = $(this);
    var indentificador = _this.attr('data-producto');
    $(".condicion"+indentificador).val(_this.val());
  });
  function escapeHtml(text) {
    return text
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;")
    .replace(/\//g, "&#47;");
  }
  function guardarCantidad(id, uid) {
    console.log("guardarCantidad:", id)
    cantidad = parseFloat($("#cantSolicitada_" + id).val());
    if (cantidad <= 0) {
      return;
    }
    var formData = new FormData();
    formData.append("token", "<?=$this->session->userdata('token');?>");
    formData.append("iddtl_solicitud_catalogo", id);
    formData.append("cantidad", cantidad);
    $data = formData;
    //console.log(cantidad); return;
    $.ajax({
      url: "<?= base_url()?>compras/edit_cantidad_solicitud",
      type: "post",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      complete: function (res) {
        console.log("res1 ", res)
        var resp = JSON.parse(res.responseText);
        console.log("res2 ", res)
        if (resp.error == false) {
          $max = parseFloat($("#cantpedir_" + id).attr("max"));
          $catidadPedida = parseFloat($("#cantpedir_" + id).attr("catidadPedida"));
          console.log("max:", $max)
          $maxTotal = cantidad - $catidadPedida;
          console.log("maxTotal:", $maxTotal)
          $("#cantpedir_" + id).attr("max", $maxTotal);
          //window.location.replace("<?= base_url()?>compras/nuevo-pedido/"+uid);
          Swal.fire(
            '¡Exitoso!',
            resp.mensaje,
            'success'
          )
        } else {
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          });
        }
      }
    });
  }
</script>
<script>
  $("input[name=porcentaje]").click(function () {    
    valor =  $('input:radio[name=porcentaje]:checked').val();
    if(valor == 1.25) {
      $("#texto0").css('display','block');
      $("#texto1").css('display','none');
      $("#texto2").css('display','none');
      $("#retencion").css('display','block');
    }
    if(valor == 10) {
      $("#texto0").css('display','none');
      $("#texto1").css('display','block');
      $("#texto2").css('display','none');
      $("#retencion").css('display','block');
    }
    if(valor ==6) {
      $("#texto0").css('display','none');
      $("#texto1").css('display','none');
      $("#texto2").css('display','block');
      $("#retencion").css('display','block');
    }
  });

  /* ********** Eventos Busqueda Productos ********** */
  var jsonData = {};
  <?php if($this->session->userdata('tipo') == 14){ ?>
    jsonData['tipo'] = "area_medica";
  <?php } else if($this->session->userdata('tipo') == 3){ ?>
    jsonData['tipo'] = "refacciones_control_vehicular";
  <?php } else if($this->session->userdata('tipo') == 10){ ?>
    jsonData['tipo'] = "seguridad_e_higiene";
  <?php } else if($this->session->userdata('tipo') == 2){ ?>
    jsonData['tipo'] = "sistemas";
  <?php } ?>


  $("body").on('keyup', ".neodata", function(event) {
    
    console.log("keyup");
    var element = $(this);
    var almacen = $('#almacen_compra').val();
    var _this=$(this).closest('.productoFieldset');
    var neodata = element.val();
    jsonData['neodata'] = neodata;
    var data = jsonData;
    $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>/almacen/getCatalogoPorNeodata",
        data: data,
        dataType: "json",
        success:function(data) {
            //console.log(data);
            parent = element.closest("tr");
            filas = "";
            $.each(data, function(key, item) {
                filas += "<div><a class='elemento-sugerido list-group-item' " + " data-descripcion='" + item.descripcion.substr(0,60).trim() + "' data-value='" + item.idtbl_catalogo + "' data-unidad-medida='" + item.unidad_medida + "' data-categoria='" + item.idctl_categorias + "'>" + item.neodata + " " + item.marca + " " + item.modelo + " (" + item.descripcion.substr(0,60).trim() + ")" + "</a></div>";
            });
            parent.find('.sugerencias').fadeIn(1000).html(filas);
            parent.find('.elemento-sugerido').on('click', function(){
              console.log($(this).data());
              _this.find('.unidad').val($(this).data('unidadMedida'));
              _this.find('.descripcion').val($(this).data('descripcion'));

              //Obtenemos la id unica de la sugerencia pulsada
              var iddtl_almacen = $(this).data("value");
              var descripcion = $(this).data('descripcion');
              //Editamos el valor del input con data de la sugerencia pulsada
              parent.find('.neodata').val(descripcion);
              parent.find('.producto').val(iddtl_almacen);
              //Hacemos desaparecer el resto de sugerencias
              //$('.sugerencias').fadeOut(500);
              parent.find('.sugerencias').html("");
              if($(this).data("categoria") == 16 || (almacen == 2 && $(this).data("categoria") == 10) || (almacen == 30 && $(this).data("categoria") == 10)) {         
              $(_this).find('#cantidad').attr('readonly', 'readonly').val('1');
              }else{
                $(_this).find('#cantidad').attr('readonly', false);
              }
              return false;
            });                        
        }
    })
  });

  $("body").on('keydown', ".neodata", function(event){
    var element = $(this);
    var _this=$(this).closest('.productoFieldset');
    if($(_this).find('.producto').val() != ""){
      element.val("");
      $(_this).find('.producto').val("");
      $(_this).find('.unidad').val("");
      $(_this).find('.descripcion').val("");
    }
  });

  $("body").on('blur', ".neodata", function(event){
    var element = $(this);
    var _this=$(this).closest('.productoFieldset');
    if($(_this).find('.producto').val() == ""){
      element.val("");
      $(_this).find('.producto').val("")
      $(_this).find('.unidad').val("");
      $(_this).find('.descripcion').val("");
    }
  });

  $("body").on('click', function() {
      $('.sugerencias').html("");
      $('.sugerencias').fadeOut(500);
  });
  $("body").on('click', ".neodata", function() {
    var element = $(this);
    element[0].setSelectionRange(0, element.val().length);
  });
</script>
