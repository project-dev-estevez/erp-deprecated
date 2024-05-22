<section class="tables">
  <div class="container-fluid">
    <!-- Asignaciones  -->
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h4 class="h4">Asignaciones activas / <?php echo $tipo . $detalle->nombres . ' ' . $detalle->apellido_paterno . ' ' . $detalle->apellido_materno ?> (Número Empleado <?php echo $detalle->numero_empleado ?>)</h4>
      </div>
      <div class="card-body">
        <table style="width: 100%" id="data-table-without" class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Folio</th>
              <?php if($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')){ ?>
              <th>UID Solicitud</th>
              <th>Proyecto</th>
              <th>Segmento</th>
              <?php } ?>
              <th>Fecha de asignación</th>
              <th>Neodata</th>
              <th>Equipo</th>
              <th>Serie</th>
              <th>N° Interno</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Unidades Asignadas</th>
              <th>Unidad de medida</th>
              <th>Categoría</th>
              <th>Nota</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if ($asignaciones) : ?>
              <?php $tmpitems2 = array(); ?>
              <?php foreach ($asignaciones as $key => $value) : ?>
                <?php if ($value->total != 0 && $value->cantidad != 0) : ?>
                  <tr id="tritem-producto<?= (in_array($value->tbl_catalogo_idtbl_catalogo, $tmpitems2)) ? 'duplicado' : '' ?><?= $value->tbl_catalogo_idtbl_catalogo; ?>">
                    <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?></td>                    
                    <?php if($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')){ ?>
                    <td><?= $value->uid_solicitud ?></td>                    
                    <td><?= $value->numero_proyecto . ' - ' .$value->nombre_proyecto?></td>
                    <td><?= $value->segmento ?></td>
                    <?php } ?>                    
                    <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?></td>
                    <td><?= $value->neodata ?></td>
                    <td><?php echo $value->descripcion ?></td>
                    <td><?php echo $value->numero_serie ?></td>
                    <td><?php echo $value->numero_interno ?></td>
                    <td><?php echo $value->marca ?></td>
                    <td><?php echo $value->modelo ?></td>
                    <td class="unidades"><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?></td>
                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                    <td><?php echo $value->nota ?></td>
                    <td align="center">
                    <?php if($this->session->userdata('tipo') == 1){ ?>
                      <?php if ($value->abreviatura === 'CN') { ?>
                        <button type="button" class="btn btn-info consumibles" data-producto="<?= $value->idtbl_catalogo ?> " data-categoria="<?= $value->abreviatura ?>" data-maximo="<?= $value->total ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Devolución</button>
                      <?php } elseif ($value->abreviatura === 'AF') { ?>
                        <button type="button" class="btn btn-primary alto-costo" data-marca="<?php echo $value->marca ?>" data-modelo="<?php echo $value->modelo ?>" data-descripcion="<?php echo $value->descripcion ?>" data-numero="<?php echo $value->numero_interno ?>" data-serie="<?php echo $value->numero_serie ?>" data-nota="<?php echo $value->nota ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Desasignar</button>
                      <?php } elseif ($value->abreviatura === 'HR') { ?>
                        <button type="button" class="btn btn-primary alto-costo" data-marca="<?php echo $value->marca ?>" data-modelo="<?php echo $value->modelo ?>" data-descripcion="<?php echo $value->descripcion ?>" data-numero="<?php echo $value->numero_interno ?>" data-serie="<?php echo $value->numero_serie ?>" data-nota="<?php echo $value->nota ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Desasignar</button>
                      <?php } ?>
                    <?php }else{ ?>
                      <?php if ($this->session->userdata('tipo') == 3 && $tipo != 'refacciones') { ?>
                        <button type="button" class="btn btn-primary alto-costo" data-marca="<?php echo $value->marca ?>" data-modelo="<?php echo $value->modelo ?>" data-descripcion="<?php echo $value->descripcion ?>" data-numero="<?php echo $value->numero_interno ?>" data-serie="<?php echo $value->numero_serie ?>" data-nota="<?php echo $value->nota ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Desasignar</button>
                      <?php } elseif ($this->session->userdata('tipo') == 3 && $tipo == 'refacciones') { ?>
                        <button type="button" class="btn btn-info consumibles" data-producto="<?= $value->idtbl_catalogo ?> " data-categoria="<?= $value->abreviatura ?>" data-maximo="<?= $value->total ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Devolución</button>
                      <?php } elseif ($value->abreviatura === 'EQC') { ?>
                        <button type="button" class="btn btn-primary alto-costo" data-marca="<?php echo $value->marca ?>" data-modelo="<?php echo $value->modelo ?>" data-descripcion="<?php echo $value->descripcion ?>" data-numero="<?php echo $value->numero_interno ?>" data-serie="<?php echo $value->numero_serie ?>" data-nota="<?php echo $value->nota ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Desasignar</button>
                      <?php } elseif ($value->abreviatura === 'CSI') { ?>
                        <button type="button" class="btn btn-info consumibles" data-producto="<?= $value->idtbl_catalogo ?> " data-categoria="<?= $value->abreviatura ?>" data-maximo="<?= $value->total ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Devolución</button>
                        <?php } elseif ($value->idtbl_catalogo === '25053' || $value->idtbl_catalogo === '19955' || $value->idtbl_catalogo === '25054' || $value->idtbl_catalogo == "22124" || $value->idtbl_catalogo == "22882" || $value->idtbl_catalogo == "22463" || $value->idtbl_catalogo == "22918" || $value->idtbl_catalogo === '19420' || $value->idtbl_catalogo === '19421' || $value->idtbl_catalogo == '22763' || $value->idtbl_catalogo === '24792' || $value->idtbl_catalogo === '24793' || $value->idtbl_catalogo === '19428' || $value->idtbl_catalogo === '19429') { ?>
                        <button type="button" class="btn btn-primary alto-costo" data-marca="<?php echo $value->marca ?>" data-modelo="<?php echo $value->modelo ?>" data-descripcion="<?php echo $value->descripcion ?>" data-numero="<?php echo $value->numero_interno ?>" data-serie="<?php echo $value->numero_serie ?>" data-nota="<?php echo $value->nota ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Desasignar</button>
                      <?php } elseif ($value->abreviatura === 'AF' || ($this->session->userdata('tipo') == 2 && $value->abreviatura == 'HR')) { ?>
                        <button type="button" class="btn btn-primary alto-costo" data-marca="<?php echo $value->marca ?>" data-modelo="<?php echo $value->modelo ?>" data-descripcion="<?php echo $value->descripcion ?>" data-numero="<?php echo $value->numero_interno ?>" data-serie="<?php echo $value->numero_serie ?>" data-nota="<?php echo $value->nota ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Desasignar</button>
                      <?php } elseif ($value->abreviatura === 'HIL') { ?>
                        <button type="button" class="btn btn-primary alto-costo" data-marca="<?php echo $value->marca ?>" data-modelo="<?php echo $value->modelo ?>" data-descripcion="<?php echo $value->descripcion ?>" data-numero="<?php echo $value->numero_interno ?>" data-serie="<?php echo $value->numero_serie ?>" data-nota="<?php echo $value->nota ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Desasignar</button>
                      <?php } else { ?>
                        <button type="button" class="btn btn-info consumibles" data-producto="<?= $value->idtbl_catalogo ?> " data-categoria="<?= $value->abreviatura ?>" data-maximo="<?= $value->total ?>" data-id="<?= $value->iddtl_almacen ?>" data-asignacion="<?= $value->iddtl_asignacion ?>">Devolución</button>
                      <?php } ?>
                    <?php } ?>
                    </td>
                  </tr>
                <?php endif ?>
                <?php array_push($tmpitems2, $value->tbl_catalogo_idtbl_catalogo) ?>
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>
        
        <?php echo form_open('', 'class="needs-validation" novalidate id="formuploadajaxmats"'); ?>
          <div id="item-producto-1" class="itemproducto" style="display: none;">
          
            <div class="form-row">
              <div class="col">
                <label>Producto*</label>
                <select name="producto" id="producto" class="selectpicker producto" data-live-search="true">
                  <option value="" selected="selected">Seleccione...</option>
                  <?php foreach ($catalogo as $key => $value) : ?>
                    <option value="<?php echo $value->idtbl_catalogo ?>" data-neodata="<?php echo $value->neodata; ?>" data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>" data-unidad-medida="<?php echo $value->unidad_medida ?>" data-categoria="<?php echo $value->idctl_categorias ?>">
                      <?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . ' (' . substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT), 0, 70) . ')' ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col">
                <label>Proyecto*</label>
                <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($proyectos as $key => $value): ?>
                  <option value="<?php echo $value->idtbl_proyectos ?>"
                    data-direccion="<?php echo $value->direccion ?>">
                    <?php echo $value->numero_proyecto ?> -
                    <?php echo substr(trim($value->nombre_proyecto),0,70) ?>
                  </option>
                <?php endforeach ?>
              </select>
              </div>
              <div class="col">
              <label>Segmento*</label>
              <select name="segmento_final" id="segmento_final" class="form-control segmento_final" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              </select>
            </div>
            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label>Entregado*</label>
                  <input type="number" name="entregado" id="entregado" class="form-control entregar" step="0.001" min="0">
                </div>
              </div>              
              <div class="col">
                <div class="form-group">
                  <label>Estado*</label>
                  <select name="estado" id="estad" class="form-control estado">
                    <option value="" selected>Seleccione...</option>
                    <option value="almacen">Disponible</option>
                    <option value="dañado">Dañado</option>
                    <option value="robado">Robado</option>
                    <option value="abuso de confianza">abuso de confianza</option>
                    <option value="justificacion">Justificación</option>
                  </select>
                </div>
              </div> 
              <div class="col">
                <label>Almacén*</label>
                <select name="almacen_final" id="almacen_final" class="selectpicker almacen" data-live-search="true">
                  <option value="" selected="selected">Seleccione...</option>
                  <?php foreach ($almacenes as $key => $value) : ?>
                    <option value="<?php echo $value->idtbl_almacenes ?>">
                      <?php echo $value->almacen ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>            
            </div>
            <br>
            <input type="hidden" name="usuario" id="usuario" value="<?= $detalle->id_usuario ?>">
            <a class="btn-primary btn aprobar" name="dev" id="aprobar">
                Devolución
              </a>
            <br>

            <br>
            
            <i class="fa fa-close delete-product" style="display:none"></i>
            <hr>
          </div>
        </form>
                
        <?php if($this->session->userdata('tipo')==1 || $this->session->userdata('tipo')==4 || $this->session->userdata('tipo')==2 || $this->session->userdata('tipo') == 9){ ?>
        <div class="row">
          <div class="col text-center">
            <span class="fa fa-plus" id="nuevoProducto" style="background: green;height: 40px;width: 40px;text-align: center;color: #fff;border-radius: 25px;font-size: 25px;line-height: 1.7;cursor: pointer;"></span>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="card-footer text-right">
        <a href="<?php echo base_url() . 'personal/detalle/' . $uid_usuario ?>" class="btn-warning btn">Cancelar</a>
      </div>
    </div><!-- Asignaciones -->
  </div>
</section>

<script>
  $(document).on('change', '#selectProyecto', function (event) {
    event.preventDefault();
    $('.segmento_final').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    //$('.segmento_final').selectpicker('refresh');
    $.ajax({
      type:"POST",
      url:base_url+'almacen/getSegmento',
      data:'id=' + $(this).val(),
      success:function(r) {
        let registros = eval(r);
        if(registros.length == 0) {
          let direccion = $("#selectProyecto").find(':selected').data('direccion');
          //alert(direccion);
          //direccion = direccion.substring(0, 65);
          $('.segmento_final').append($('<option>', {
            value : '',
            text : 'direccion'
          }));
          $('.segmento_final').selectpicker('refresh');
          return;
        }
        console.log(registros);
        html = "";
        for(i = 0; i < registros.length; i++) {
          let segmento = registros[i]['segmento'];
          segmento = segmento.substring(0, 65);
          $('.segmento_final').append($('<option>', {
            value: registros[i]['idtbl_segmentos_proyecto'],
            text : segmento
          }));
        }
        //$('.segmento_final').selectpicker('refresh');
      }
    });
  });
  function sumar(maximo) {
    if ((Number($('#swal-input1').val()) + Number($('#swal-input2').val()) + Number($('#swal-input3').val()) + Number($('#swal-input4').val()) + Number($('#swal-input5').val())) > maximo)
      return true;
    else
      return false;
  }
  $('.asignacion').change(function(event) {
    var entregadoEstatus = $('#entregadoEstatus').val();
    var _this = $(this).closest('tr');
    // console.log($('#contenido-imprimir-table tr:last'));
    if (this.checked) {
      // if ($('#contenido-imprimir-table').html().trim() == '') {
      $(_this).find('.productocheck').val($(this).data('tbl_catalogo_idtbl_catalogo'));
      if ($(this).data('tipo') == 'duplicado') {
        $('#contenido-imprimir-table tr:last').after(
          '<tr id="tritem-producto-duplicado' + $(this).data('tbl_catalogo_idtbl_catalogo') + '">' +
          '<td class="td-codigo-uid">' + $(this).data('neodata') + '</td>' +
          '<td class="td-producto">' + $(this).data('descripcion') + '</td>' +
          '<td class="td-cantidad"></td>' +
          '<td class="td-unidad-medida">' + $(this).data('cantidad-entregar') + '</td>' +
          '<td class="td-entregado"></td>' +
          '<td class="td-estatus"></td>' +
          '<td class="td-observaciones"></td>' +
          '</tr>'
        );
      } else {
        $('#contenido-imprimir-table tr:last').after(
          '<tr id="tritem-producto' + $(this).data('tbl_catalogo_idtbl_catalogo') + '">' +
          '<td class="td-codigo-uid">' + $(this).data('neodata') + '</td>' +
          '<td class="td-producto">' + $(this).data('descripcion') + '</td>' +
          '<td class="td-cantidad">' + $(this).data('cantidad-entregar') + '</td>' +
          '<td class="td-unidad-medida">' + $(this).data('unidad-medida') + '</td>' +
          '<td class="td-entregado"></td>' +
          '<td class="td-estatus"></td>' +
          '<td class="td-observaciones"></td>' +
          '</tr>'
        );
      }
      // }
    } else {
      var _this = $(this).closest('tr');
      $(_this).find('.productocheck').val('-');
      if ($(this).data('tipo') == 'nuevo') {
        $('#tritem-producto-nuevo' + $(this).data('tbl_catalogo_idtbl_catalogo')).remove();
      } else {
        $('#tritem-producto' + $(this).data('tbl_catalogo_idtbl_catalogo')).remove();
      }
    }
  });
  $('#nuevoProducto').click(function(event) {
    $('#nuevoProducto').hide();
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

    $klon.find('.bootstrap-select').replaceWith(function() {
      return $('select', this);
    });
    $('#item-producto' + num + ' .selectpicker').selectpicker();
    //$klon.find('input,textarea').val('');
    $klonTr.find('td').html('');
    $klon.find('.delete-product').css('display', 'block');
  });
  $(document).on('click', '.delete-product', function() {
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
        $('#nuevoProducto').show();
        $(this).parents('div[id^="item-producto"]').remove();
        $('#tr' + $(this).parents('[id^="item-producto"]').attr('id')).remove();
      }
    });
  });

  $(document).on('click', '#aprobar', function(event) {    
    event.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajaxmats"));    
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea realizar la devolución?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                //alert(this.id);
                $(this).parents('div[id^="item-producto"]').remove();
                $('#tr' + $(this).parents('[id^="item-producto"]').attr('id')).remove();                
                $.ajax({
                    url: "<?= base_url() ?>almacen/devolucion-material-alto-costo/",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.status) {                          
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            );                                                         
                            location.reload();                            
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }, error: function(){
                      console.log("Error 1");
                    }
                });
            }
        })
    });

  $(document).on('click', '.consumibles', function() {
    var _this = $(this);

    if (Number(_this.data('maximo')) == 0) {
      Toast.fire({
        type: 'error',
        title: 'No existen unidades para devolución'
      })
      return false;
    }

    _swal = Swal.fire({
      title: 'Ingrese cantidades (máx ' + _this.data('maximo') + ')',
      type: 'question',
      html: '<input type="hidden" value="' + _this.data('maximo') + '" name="devinicial" id="devinicial"><div class="form-group"><label>Disponibles:</label><input id="swal-input1" min="0" value="0" max="' + _this.data('maximo') + '" type="number" class="form-control swal2-input" placeholder="Devolución"></div>' +
        '<div class="form-group"><label>Justificados:</label><input id="swal-input2" min="0" value="0" max="' + _this.data('maximo') + '" type="number" class="form-control swal2-input" placeholder="Justificación"></div>' +
        '<div class="form-group"><label>Dañados:</label><input id="swal-input3" min="0" value="0" max="' + _this.data('maximo') + '" type="number" class="form-control swal2-input" placeholder="Dañados"></div>' +
        '<div class="form-group"><label>Robados:</label><input id="swal-input4" min="0" value="0" max="' + _this.data('maximo') + '" type="number" class="form-control swal2-input" placeholder="Robados"></div>' +
        '<div class="form-group"><label>Merma:</label><input id="swal-input6" min="0" value="0" max="' + _this.data('maximo') + '" type="number" class="form-control swal2-input" placeholder="Merma"></div>' +
        '<div class="form-group"><label>Abuso de confianza:</label><input id="swal-input5" min="0" value="0" max="' + _this.data('maximo') + '" type="number" class="form-control swal2-input" placeholder="Abuso de confianza"></div>'<?php if($this->session->userdata('tipo')==4){ ?>+'<div class="form-group"><label>Almacen: </label><select class="form-control swal2-input" id="almacen" name="almacen"><?php if($this->session->userdata('id')==50){ ?><?php foreach($kuali as $val){
              echo "<option value=\"" . 
              $val->idtbl_almacenes . "\">" . substr($val->almacen, 0, 70) . "</option>";              
            }     }            
               
               elseif($this->session->userdata('tipo_anterior')==23 && $tipo == 'refacciones'){
                foreach($refacciones as $refa){
                  echo "<option value=\"" . 
                $refa->idtbl_almacenes . "\">" . substr($refa->almacen, 0, 70) . "</option>";
                }
               }

               elseif($this->session->userdata('tipo_anterior')==23 && $tipo != 'refacciones'){
                foreach($uno as $gen){
                  echo "<option value=\"" . 
                $gen->idtbl_almacenes . "\">" . substr($gen->almacen, 0, 70) . "</option>";
                }
               }
              
              else{ foreach($almacenes as $general){
                echo "<option value=\"" . 
              $general->idtbl_almacenes . "\">" . substr($general->almacen, 0, 70) . "</option>";
              }                         
            }                           
          ?>'<?php } ?>           
          
          
          <?php if($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''){ ?>+'<div class="form-group"><label>Almacen: </label><select class="form-control swal2-input" id="almacen"><?php foreach($almacenes as $value){
                  foreach($this->session->userdata('encargado_almacen') AS $key2 => $value2){                    
                    if($value->tbl_almacenes_idtbl_almacenes == $value2 ){
                      echo "<option value=\"" . 
                      $value->idtbl_almacenes . "\">" . substr($value->almacen, 0, 70) . "</option>";
                    } elseif ($value->idtbl_almacenes == $value2 && $value->tbl_almacenes_idtbl_almacenes == NULL && ($this->session->userdata('id') == '3786' || $this->session->userdata('id') == '3582')){
                      echo "<option value=\"" .
                      $value->idtbl_almacenes . "\">" . substr($value->almacen, 0, 70) . "</option>";                    
                    } elseif ($value->idtbl_almacenes == $value2 && ($this->session->userdata('tipo')!=9 || $this->session->userdata('id')==325 || $this->session->userdata('id')==226 || $this->session->userdata('id')==253 || $this->session->userdata('id')==139) && $value->tbl_almacenes_idtbl_almacenes == NULL ){
                      echo "<option value=\"" .
                      $value->idtbl_almacenes . "\">" . substr($value->almacen, 0, 70) . "</option>";                      
                    }                   
                  } }
                  
            echo "</select></div>";
          ?>'<?php } ?>,
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonText: 'Devolver',
      confirmButtonAriaLabel: 'Devolver',
      cancelButtonText: 'Cancelar',
      cancelButtonAriaLabel: 'Cancelar',
      showLoaderOnConfirm: true,
      preConfirm: () => {
        if (Number($('#swal-input1').val()) == 0 && Number($('#swal-input2').val()) == 0 && Number($('#swal-input3').val()) == 0 && Number($('#swal-input4').val()) == 0 && Number($('#swal-input5').val()) == 0 && Number($('#swal-input6').val()) == 0) {
          Swal.showValidationMessage('Los valores deben ser mayores a 0');
          return false;
        }

        if (sumar(_this.data('maximo'))) {
          Swal.showValidationMessage('La suma no debe ser mayor a las unidades asignadas(' + _this.data('maximo') + ')');
          return false;
        }

        return new Promise(function(resolve) {
          $.ajax({
            type: "post",
            url: "<?= base_url() ?>almacen/ajax-devolucion",
            data: {
              id: _this.data('id'),
              devolucion: $('#swal-input1').val(),
              justificacion: $('#swal-input2').val(),
              token: '<?= $token ?>',
              uid_usuario: '<?= $uid_usuario ?>',
              asignacion: _this.data('asignacion'),
              danado: $('#swal-input3').val(),
              robado: $('#swal-input4').val(),
              robadobaja: $('#swal-input5').val(),
              merma: $('#swal-input6').val(),
              producto: _this.data('producto'),
              devinicial: $('#devinicial').val(),
              almacen: $("#almacen").val()
            },
            dataType: "json",
            success: function(resp) {
              resolve(resp)
            },
            error: function(req, status, err) {
              Swal.hideLoading()
              Swal.showValidationMessage(
                status
              )
            }
          })
        })

      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((data) => {
      if (data.value.error == false) {
        var tr = _this.closest('tr').addClass('table-warning');
        var nuevoMaximo = Number(_this.data('maximo')) - Number($('#swal-input1').val()) - Number($('#swal-input2').val());
        //_this.data('maximo') = nuevoMaximo;
        tr.find('.unidades').html(parseFloat(nuevoMaximo));
        _this.data('maximo', nuevoMaximo);
        Swal.fire({
          type: 'success',
          title: 'La desasignación ha ocurrido con éxito.',
        })
      } else {
        Swal.fire({
          type: 'error',
          title: data.value.mensaje,
        })
      }
    })




  });
  $(document).on('click', '.alto-costo', function() {
    var _this = $(this);

    Swal.fire({
      title: '¡Alto!',
      type: 'warning',
      html: 'Confirmar desasignación:' +
        '<table width="100%" class="table table-bordered">' +
        '<tr><td><strong>Equipo:</strong></td><td>' + _this.data('descripcion') + ' ' + _this.data('modelo') + '</td></tr>' +
        '<tr><td><strong>N° de serie:</strong></td><td>' + _this.data('serie') + '</td></tr>' +
        '<tr><td><strong>N° Interno:</strong></td><td>' + _this.data('numero') + '</td></tr>' +
        '<tr><td><strong>Marca:</strong></td><td>' + _this.data('marca') + '</td></tr>' +
        '<tr><td><strong>Nota:</strong></td><td>' + _this.data('nota') + '</td></tr>' +
        '<tr><td><strong>Estatus:</strong></td><td>' + '<select id="estatus" name="status" class="form-control">' +
        '<option value="" selected>Seleccione un estatus</option>' +
        <?php if($this->session->userdata('tipo')==3 && $tipo != 'refacciones' && $tipo != 'tarjetas'){ ?>
          '<option value="disponible">Disponible</option>' +
          '<option value="reparacion">Reparacion</option>' +
          '<option value="robado">Robado</option>' +
          '<option value="perdida total">Perdida Total</option>' +
          '<option value="vendida">Vendida</option>' +
          '<option value="colision">Colisión</option>' +
          '<option value="tramite vehicular">Tramite Vehicular</option>' +
          <?php } elseif($this->session->userdata('tipo')==3 && $tipo == 'tarjetas') { ?>
          '<option value="almacen">Almacen</option>' +
          '<option value="asignado">Asignado</option>' +
          '<option value="baja">Baja</option>' +          
          '<option value="abuso de confianza">Abuso de confianza</option>' +          
        <?php } else { ?>        
          '<option value="almacen">Disponible</option>' +
          '<option value="dañado">Dañado</option>' +
          '<option value="baja">Baja</option>' +
          '<option value="robado">Robado</option>' +
          '<option value="abuso de confianza">abuso de confianza</option>' +
          '<option value="justificacion">Justificación</option>' +
        <?php } ?>
        '</select></td></tr>' + <?php if($this->session->userdata('tipo') == 4){ ?>
        '<tr><td><strong>Almacén:</strong></td><td>' + '<select id="almacen" name="almacen" class="form-control">' +
        <?php foreach($almacenes as $value){ ?>
        '<option value="<?= $value->idtbl_almacenes ?>"><?= $value->almacen ?></option>' +
        <?php } ?>    
        '</select></td></tr>' + <?php } elseif($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != ''){ ?>'<tr><td><strong>Almacén:</strong></td><td>'+'<select id="almacen" name="almacen" class="form-control">'<?php foreach($almacenes as $value){
                  foreach($this->session->userdata('encargado_almacen') AS $key2 => $value2){                    
                    if($value->tbl_almacenes_idtbl_almacenes == $value2 ){
                      echo "+'<option value=\"" . 
                      $value->idtbl_almacenes . "\">" . substr($value->almacen, 0, 70) . "</option>'";
                    } elseif ($value->idtbl_almacenes == $value2 && $value->tbl_almacenes_idtbl_almacenes == NULL && ($this->session->userdata('id') == '3786' || $this->session->userdata('id') == '3582')){
                      echo "<option value=\"" .
                      $value->idtbl_almacenes . "\">" . substr($value->almacen, 0, 70) . "</option>";                    
                    } elseif ($value->idtbl_almacenes == $value2 && ($this->session->userdata('tipo')!=9 || $this->session->userdata('id')==325 || $this->session->userdata('id')==226 || $this->session->userdata('id')==253 || $this->session->userdata('id')==139) && $value->tbl_almacenes_idtbl_almacenes == NULL ){
                      echo "+'<option value=\"" .
                      $value->idtbl_almacenes . "\">" . substr($value->almacen, 0, 70) . "</option>'";                      
                    }                   
                  } 
                }
                  
            echo "+'</select></div>";
          ?>'<?php } ?> +
        '</table>',
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonText: 'Desasignar',
      confirmButtonAriaLabel: 'Desasignar',
      cancelButtonText: 'Cancelar',
      cancelButtonAriaLabel: 'Cancelar',
      showLoaderOnConfirm: true,
      preConfirm: () => {
        return new Promise(function(resolve) {
          $.ajax({
            type: "post",
            url: "<?= base_url() ?>almacen/ajax-desasignacion",
            data: {
              id: _this.data('id'),
              token: '<?= $token ?>',
              uid_usuario: '<?= $uid_usuario ?>',
              asignacion: _this.data('asignacion'),
              estatus: $('#estatus').val(),
              <?php if($this->session->userdata('tipo') == 4 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')){ ?>almacen: $('#almacen').val(),<?php } ?>
              parent: <?= $this->session->userdata('tipo') == 3 && isset($_GET['parent']) ? $_GET['parent'] : 'null' ?>
            },
            dataType: "json",
            success: function(resp) {
              resolve(resp)
            },
            error: function(req, status, err) {
              Swal.hideLoading()
              Swal.showValidationMessage(
                status
              )
            }
          })
        })

      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((data) => {
      if (data.value.error == false) {
        var tr = _this.closest('tr').addClass('table-warning');
        _this.closest('td').html('Desasignado');
        _this.remove();
        Swal.fire({
          type: 'success',
          title: 'La desasignación ha ocurrido con éxito.',
        })
      } else {
        Swal.fire({
          type: 'error',
          title: data.value.mensaje,
        })
      }
    })




  });
</script>