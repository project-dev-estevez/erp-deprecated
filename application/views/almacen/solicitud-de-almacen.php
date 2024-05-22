<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nueva Solicitud de Almacen(Almacen General)</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart(base_url().'compras/enviar-solicitud', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
          <div class="form-row">
            <div class="col-xs-12 col-md-4">
              <label>Proyecto*</label>
              <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($proyectos as $key => $value): ?>
                  <option value="<?php echo $value->idtbl_proyectos ?>"
                    data-direccion="<?php echo $value->direccion ?>"
                    data-cliente="<?= $value->tbl_clientes_idtbl_clientes ?>">
                    <?php echo $value->numero_proyecto ?> -
                    <?php echo substr(trim($value->nombre_proyecto),0,70) ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-xs-12 col-md-4">
              <label>Segmento*</label>
              <select name="segmento" id="ssegmento" class="selectpicker segmento" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              </select>
            </div>
            <div class="col-xs-12 col-md-4" style="display: none;" id="almacen">
              <label>Almacén*</label>
              <select name="uid_almacen" id="uid_almacen" class="form-control almacen">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                  <option value="" disabled selected>Seleccione...</option>
                  <option value="interno">Interno</option>
                  <option value="contratista">Contratista</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione el tipo personal
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>Persona autorización</label>
                <select name="persona_autorizacion" id="persona_autorizacion" class="form-control recibe" required>
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione persona autorización
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col divContratistas" style="display: none;">
              <div class="form-group">
                <label>Contratista*</label>
                <select name="contratista" id="contratista" class="selectpicker form-control"  data-live-search="true">
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione al contratista
                </div>
              </div>
            </div>
            <div class="col divContratistas" style="display: none;">
              <div class="form-group">
                <label>Supervisor*</label>
                <select name="supervisor" id="supervisor" class="selectpicker form-control" data-live-search="true">
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione al supervisor
                </div>
              </div>
            </div>
            <div class="col divContratistas" style="display: none;">
              <div class="form-group">
                <label for="cleanup">Clean Up</label><br>
                <input type="radio" id="cleanupy" name="cleanup" value="1">
                <label for="cleanupy">Si</label><br>
                <input type="radio" id="cleanupn" name="cleanup" value="0">
                <label for="cleanupn">No</label><br>
              </div>
            </div>
            <div class="col divInternos">
              <div class="form-group">
                <label>Recibe*</label>
                <select name="usuario" id="recibe" class="selectpicker form-control" data-live-search="true">
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione al personal
                </div>
              </div>
            </div>
            
          </div>
          <div class="form-row">
            <div class="col">
              <label for="comentarios">Comentarios</label>
              <textarea name="comentarios" id="comentarios" class="form-control" rows="5"></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-6">
              <label for="tipo_almacen">Tipo Almacén</label>
              <select name="tipo_almacen" id="tipo_almacen" class="form-control" required>
                <option value="">Seleccione...</option>
                <option value="Almacen General">Almacén General</option>
                <option value="Cliente">Cliente</option>
              </select>
            </div>
          </div>
          <input type="hidden" name="tipo_producto" value="Almacen General">
          <input type="hidden" name="id_cliente" id="id_cliente" value="">

          <hr>
          <div id="hoja_asignacion">
          <div id="item-producto1" class="itemproducto">
            <div class="form-row">
              <div class="col">                
                <label>Producto*</label>
                <input class="form-control neodata" autocomplete="off" type="text" required>
                <small>Teclea el nombre del producto</small>
                <input class="form-control producto" id="product" autocomplete="off" type="hidden" name="producto[]" required>
                <div class="list-group sugerencias"></div>
                <input type="hidden" name="categoria[]" class="categoria" value="">
                <input type="hidden" name="existencias[]" class="existencias" value="">
              </div>
              <div class="col">
                <label for="cantidad">Cantidad*</label>
                <input type="number" name="cantidad[]" id="cantidad" required class="form-control cantidad" step="0.001" min="0.001">
              </div>
              <div class="col">
                <label for="unidad">Unidad</label>
                <input type="text" disabled="true" class="form-control unidad">
              </div>
              <div class="col campos_ac" style="display: none">
                <label>Sitio</label>
                <select name="sitio[]" id="sitio" require class="selectpicker sitio" data-live-search="true">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                </select>
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col">
                <label for="especificaciones">Descripción</label>
                <input type="text" name="" id="" class="form-control descripcion" disabled>
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col">
                <label for="especificaciones">Observaciones</label>
                <textarea name="observaciones[]" id="especificaciones" class="form-control"
                  rows="5"></textarea>
              </div>
            </div>
            <i class="fa fa-close delete-product" style="display:none"></i>
            <hr>
          </div>
        </div>
          <br><br>
          <div class="clearfix pt-md">
            <div class="pull-right">
              <a href="<?php echo base_url().'almacen/solicitudes_almacen' ?>"
                class="btn-warning btn" id="btn-cancelar">Cancelar</a>
              <button type="button" class="btn-info btn" id="nuevoProducto">Añadir Otro Producto</button>              
              <?= form_hidden('token',$token) ?>
              <button type="submit" class="btn-primary btn" id="btn-enviar-solicitud">Enviar Solicitud</button>
            </div>
          </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>
<script>

  //if($('#tipo').val() == 'interno'){

  $(document).on('change', '#recibe', function (event) {
    event.preventDefault();
    
    $.ajax({
      type:"POST",
      url:base_url+'almacen/getHojaAsignacion',
      data:'user='+$('#recibe').val()+'&proyecto='+$('#selectProyecto').val()+'&segmento='+$('#ssegmento').val(),
      success:function(r) {  
        let registros = eval(r);
        
        if(registros.length == 0) {
          Toast.fire({
            type: 'error',
            title: "No cuenta con hoja de asignación."
          });
          return;
        }
        html = "";
        $('#hoja_asignacion').html(html);
        $('#hoja_asignacion').append('<input type="hidden" name="id_hoja_asignacion" value="'+registros[0].idtbl_hoja_asignacion+'">');
        var index=1;
        for(i = 0; i < registros.length; i++) {
          $('#hoja_asignacion').append('<div id="item-producto'+index+'" class="itemproducto"><div class="form-row">'+
              '<div class="col">'+                
                '<label>Producto*</label>'+
                '<input class="form-control neodata" autocomplete="off" value="'+registros[i].descripcion+'" type="text" required>'+
                '<small>Teclea el nombre del producto</small>'+
                '<input class="form-control producto" id="product" autocomplete="off" value="'+registros[i].idtbl_catalogo+'" type="hidden" name="producto[]" required>'+
                '<div class="list-group sugerencias"></div>'+
                '<input type="hidden" name="categoria[]" class="categoria" value="'+registros[i].ctl_categorias_idctl_categorias+'">'+
                '<input type="hidden" name="iddtl_hoja_asignacion[]" class="categoria" value="'+registros[i].iddtl_hoja_asignacion+'">'+
                '<input type="hidden" name="existencias[]" class="existencias" value="">'+
              '</div>'+
              '<div class="col">'+
                '<label for="cantidad">Cantidad*</label>'+
                '<input type="number" name="cantidad[]" id="cantidad" value="'+registros[i].cantidad+'" required class="form-control cantidad" step="0.001" min="0.001">'+
              '</div>'+
              '<div class="col">'+
                '<label for="unidad">Unidad</label>'+
                '<input type="text" disabled="true" value="'+registros[i].unidad_medida_abr+'" class="form-control unidad">'+
              '</div>'+
              '<div class="col campos_ac" style="display: none">'+
                '<label>Sitio</label>'+
                '<select name="sitio[]" id="sitio" require class="selectpicker sitio" data-live-search="true">'+
                  '<option value="" disabled="disabled" selected="selected">Seleccione...</option>'+
                '</select>'+
              '</div>'+
            '</div>'+
            '<br>'+
            '<div class="form-row">'+
              '<div class="col">'+
                '<label for="especificaciones">Descripción</label>'+
                '<input type="text" name="" id="" class="form-control descripcion" disabled>'+
              '</div>'+
            '</div>'+
            '<br>'+
            '<div class="form-row">'+
              '<div class="col">'+
                '<label for="especificaciones">Observaciones</label>'+
                '<textarea name="observaciones[]" id="especificaciones" class="form-control" rows="5"></textarea>'+
              '</div>'+
            '</div>'+
            '<i class="fa fa-close delete-product" style="display:none"></i>'+
            '<hr></div>');
            index++;
        }
        /*Toast.fire({
            type: 'success',
            title: "Se cargo correctamente la hoja de asignación."
          });
      }
    });
    
  });
}else{

  $(document).on('change', '#contratista', function (event) {
    event.preventDefault();
    
    $.ajax({
      type:"POST",
      url:base_url+'almacen/getHojaAsignacion',
      data:'user='+$('#recibe').val()+'&proyecto='+$('#selectProyecto').val()+'&segmento='+$('#ssegmento').val()+'&tipo='+$('#tipo').val()+'&contratista='+$('#contratista').val(),
      success:function(r) {  
        let registros = eval(r);
        
        if(registros.length == 0) {
          Toast.fire({
            type: 'error',
            title: "No cuenta con hoja de asignación."
          });
          return;
        }
        html = "";
        $('#hoja_asignacion').html(html);
        $('#hoja_asignacion').append('<input type="hidden" name="id_hoja_asignacion" value="'+registros[0].idtbl_hoja_asignacion+'">');
        var index=1;
        for(i = 0; i < registros.length; i++) {
          $('#hoja_asignacion').append('<div id="item-producto'+index+'" class="itemproducto"><div class="form-row">'+
            '<div class="col">'+                
                '<label>Neodata*</label>'+
                '<input class="form-control" autocomplete="off" value="'+registros[i].neodata+'" type="text" required readonly>'+
                '</div>'+
                
              '<div class="col">'+                
                '<label>Producto*</label>'+
                '<input class="form-control neodata" autocomplete="off" value="'+registros[i].descripcion+'" type="text" required readonly>'+
                '<small>Teclea el nombre del producto</small>'+
                '<input class="form-control producto" id="product" autocomplete="off" value="'+registros[i].idtbl_catalogo+'" type="hidden" name="producto[]" required>'+
                '<div class="list-group sugerencias"></div>'+
                '<input type="hidden" name="categoria[]" class="categoria" value="'+registros[i].ctl_categorias_idctl_categorias+'">'+
                '<input type="hidden" name="iddtl_hoja_asignacion[]" class="categoria" value="'+registros[i].iddtl_hoja_asignacion+'">'+
                '<input type="hidden" name="existencias[]" class="existencias" value="">'+
              '</div>'+
              '<div class="col">'+                
                '<label>Asignado*</label>'+
                '<input class="form-control" autocomplete="off" value="'+registros[i].cantidad+'" type="text" required readonly>'+
                '</div>'+
                '<div class="col">'+                
                '<label>Disponible*</label>'+
                '<input class="form-control" autocomplete="off" value="'+(registros[i].cantidad - registros[i].entregado)+'" type="text" required readonly>'+
                '</div>'+
              '<div class="col">'+
                '<label for="cantidad">Cantidad*</label>'+
                '<input type="number" name="cantidad[]" id="cantidad" value="'+registros[i].cantidad+'" required class="form-control cantidad" step="0.001" min="0.001" max="'+(registros[i].cantidad - registros[i].entregado)+'">'+
              '</div>'+
              '<div class="col">'+
                '<label for="unidad">Unidad</label>'+
                '<input type="text" disabled="true" value="'+registros[i].unidad_medida_abr+'" class="form-control unidad">'+
              '</div>'+
              '<div class="col campos_ac" style="display: none">'+
                '<label>Sitio</label>'+
                '<select name="sitio[]" id="sitio" require class="selectpicker sitio" data-live-search="true">'+
                  '<option value="" disabled="disabled" selected="selected">Seleccione...</option>'+
                '</select>'+
              '</div>'+
            '</div>'+
            '<br>'+
            '<div class="form-row">'+
              '<div class="col">'+
                '<label for="especificaciones">Descripción</label>'+
                '<input type="text" name="" id="" class="form-control descripcion" disabled>'+
              '</div>'+
            '</div>'+
            '<br>'+
            '<div class="form-row">'+
              '<div class="col">'+
                '<label for="especificaciones">Observaciones</label>'+
                '<textarea name="observaciones[]" id="especificaciones" class="form-control" rows="5"></textarea>'+
              '</div>'+
            '</div>'+
            '<i class="fa fa-close delete-product" style="display:none"></i>'+
            '<hr></div>');
            index++;
        }
        Toast.fire({
            type: 'success',
            title: "Se cargo correctamente la hoja de asignación."
          });*/
      }
    });
    
  });
//}

  $(document).on('change', '#selectProyecto', function (event) {
    event.preventDefault();
    $('#ssegmento').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#ssegmento').selectpicker('refresh');
    let cliente = $('#selectProyecto').find(':selected').data('cliente');
    $('#id_cliente').val(cliente);
    //alert(cliente);
    $.ajax({
      type:"POST",
      url:base_url+'almacen/getSegmento',
      data:'id=' + $('#selectProyecto').val(),
      success:function(r) {  
        let registros = eval(r);
        if(registros.length == 0) {
          let direccion = $("#selectProyecto").find(':selected').data('direccion');
          direccion = direccion.substring(0, 65);
          $('#ssegmento').append($('<option>', {
            value : '',
            text : direccion
          }));
          $('#ssegmento').selectpicker('refresh');
          return;
        }
        html = "";
        for(i = 0; i < registros.length; i++) {
          let segmento = registros[i]['segmento'];
          segmento = segmento.substring(0, 605);
          $('#ssegmento').append($('<option>', {
            value: registros[i]['idtbl_segmentos_proyecto'],
            text : segmento
          }));
        }
        $('#ssegmento').selectpicker('refresh');
      }
    });
    if(cliente == 47 || cliente == 11 || cliente == 28){
      $('#almacen').show(300);
      $("#uid_almacen").prop('required', true);
      $('#uid_almacen').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');

      $.ajax({
      type:"POST",
      url:base_url+'almacen/getAlmacenesByProject',
      data:'id=' + $('#selectProyecto').val(),
      success:function(r) {  
        let registros = eval(r);
        if(registros.length == 0) {
          $('#uid_almacen').append($('<option>', {
            value: '25839864557600770',
            text : 'ALMACEN GENERAL'
          }));
          return;
        }
        html = "";
        $('#uid_almacen').append($('<option>', {
            value: '25839864557600770',
            text : 'ALMACEN GENERAL'
          }));
        for(i = 0; i < registros.length; i++) {
          let almacen = registros[i]['almacen'];
          almacen = almacen.substring(0, 605);
          $('#uid_almacen').append($('<option data-segmento="'+registros[i]['tbl_segmentos_proyecto_idtbl_segmentos_proyecto']+'" value="'+registros[i]['uid']+'">'+registros[i]['almacen']+'</option>'));
        }
        //$('#uid_almacen').selectpicker('refresh');
      }
    });
    }else{
      $('#almacen').hide(300);
      $("#uid_almacen").prop('required', false);

    }
  });
  $(document).on('change', '#product', function (event) {
    event.preventDefault();    
    var proyecto = $("#selectProyecto").val();
    var segmento = $("#ssegmento").val();
    var tipo_almacen = $("#tipo_almacen").val();
    if(proyecto == null || segmento == null){
      $(this).val("");
      $(this).selectpicker('refresh');
      Toast.fire({
            type: 'error',
            title: "Seleccione proyecto y segmento."
      });
      return;
    }
    if(tipo_almacen == null){
      $(this).val("");
      $(this).selectpicker('refresh');
      Toast.fire({
        type: 'error',
        title: "Seleccione el tipo de almacén"
      });
      return;
    }
    var $div = $('div[id^="item-producto"]:last');
    var num = parseInt($div.prop("id").match(/\d+/g), 10);
    var _this = $(this).closest('#item-producto' + num);
    $(_this).find('#sitio').find('option').remove().end().append('<option value="" selected="selected">Seleccione...</option>');
    $(_this).find('#sitio').selectpicker('refresh');
    $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));
    $(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));
    //alert($('#product').val());
    if($("option:selected", this).data("idtblcatalogo") == 19420 || $("option:selected", this).data("idtblcatalogo") == 25053 || $("option:selected", this).data("idtblcatalogo") == 25054 || $("option:selected", this).data("idtblcatalogo") == 19955 || $("option:selected", this).data("idtblcatalogo") == 22124 || $("option:selected", this).data("idtblcatalogo") == 22882 || $("option:selected", this).data("idtblcatalogo") == 22463 || $("option:selected", this).data("idtblcatalogo") == 22918 || $("option:selected", this).data("idtblcatalogo") == 22763 || $("option:selected", this).data("idtblcatalogo") == 19421 || $("option:selected", this).data("idtblcatalogo") == 24792 || $("option:selected", this).data("idtblcatalogo") == 24793 || $("option:selected", this).data("idtblcatalogo") == 19428 || $("option:selected", this).data("idtblcatalogo") == 19429 || $("option:selected", this).data("categoria") == 7 || $("option:selected", this).data("categoria") == 16) {
      if($("option:selected", this).data("idtblcatalogo") == 19420 || $("option:selected", this).data("idtblcatalogo") == 25053 || $("option:selected", this).data("idtblcatalogo") == 25054 || $("option:selected", this).data("idtblcatalogo") == 19955 || $("option:selected", this).data("idtblcatalogo") == 19421 || $("option:selected", this).data("idtblcatalogo") == 24792 || $("option:selected", this).data("idtblcatalogo") == 24793 || $("option:selected", this).data("idtblcatalogo") == 19428 || $("option:selected", this).data("idtblcatalogo") == 19429){
      $(_this).find('.campos_ac').show(500);
      }
      $(_this).find('#cantidad').attr('readonly', 'readonly').val('1');
      $.ajax({
        type:"POST",
        url:base_url+'almacen/getSitiosByProducto',
        data:'id='+$('#product').val()+'&proyecto='+proyecto+'&segmento='+segmento,
        success:function(r) {
          let registros = eval(r);
          if(registros.length == 0) {
            $(_this).find('#sitio').append($('<option>', {
              value : '',
              text : 'No hay un sitio asignado a este producto'
            }));
            $(_this).find('#sitio').selectpicker('refresh');
            return;
          }
          html = "";
          for(i = 0; i < registros.length; i++) {
            let sitio = registros[i]['sitio'];
            sitio = sitio.substring(0, 605);
            $(_this).find('#sitio').append($('<option value="' + registros[i]['sitio'] + '"' + (registros[i]['sitio_solicitud'] != null ? '' : '') + '>' + sitio + '</option>'));
          }
          $(_this).find('#sitio').selectpicker('refresh');       
        }
      })
    } else if($("option:selected", this).data("idtblcatalogo") == 25698) {
      $(_this).find('.campos_ac').show(500);
      $(_this).find('#cantidad').removeAttr('readonly').val('');
      $.ajax({
        type:"POST",
        url:base_url+'almacen/getSitiosByProducto',
        data:'id='+$('#product').val(),
        success:function(r) {
          let registros = eval(r);
          if(registros.length == 0) {
            $(_this).find('#sitio').append($('<option>', {
              value : '',
              text : 'No hay un sitio asignado a este producto'
            }));
            $(_this).find('#sitio').selectpicker('refresh');
            return;
          }
          html = "";
          for(i = 0; i < registros.length; i++) {
            let sitio = registros[i]['sitio'];
            sitio = sitio.substring(0, 605);
            $(_this).find('#sitio').append($('<option value="' + registros[i]['sitio'] + '"' + (registros[i]['sitio_solicitud'] != null ? 'disabled' : '') + '>' + sitio + '</option>'));
          }
          $(_this).find('#sitio').selectpicker('refresh');       
        }
      })
    } else if($("option:selected", this).data("categoria") == 16) {
      $(_this).find('.campos_ac').hide(500);
      $(_this).find('#cantidad').attr('readonly', 'readonly').val('1');      
    } else {
      $(_this).find('.campos_ac').hide(500);
      $(_this).find('#cantidad').removeAttr('readonly').val('');
    }
  });
  $(document).on('change', '.proyecto', function (event) {
    event.preventDefault();
    console.log($("option:selected", this).val())
    $('.recibe').find('.options').hide();
    $('.recibe').find('.proyecto' + $("option:selected", this).val()).show()

  });
  $(document).on('change', '#tipo', function(event) {
    event.preventDefault();
    var _this=$(this);
    $('#recibe').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#persona_autorizacion').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    const personalAutoriza = JSON.parse('<?php echo json_encode($persona_autorizacion); ?>');
    $.ajax({
      url: base_url+'almacen/tipo-personal',
      type: 'POST',
      dataType: 'json',
      data: {tipo: _this.val()},
      beforeSend: function() {
        _this.closest('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        if (_this.val() == 'interno') {
          $.each(data[0].personal_recibe, function (i, item) {
            $('#recibe').append($('<option>', {
              value: item.idtbl_usuarios,
              text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+' (Número Empleado '+item.numero_empleado+')'
            }));
            $('#supervisor_interno').append($('<option>', {
              value: item.idtbl_usuarios,
              text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+' (Número Empleado '+item.numero_empleado+')'
            }));
          });
          $.each(personalAutoriza, function (i, item) {
            if (item.idtbl_users != 17){
            $('#persona_autorizacion').append($('<option>', {
              value: item.idtbl_users,
              text : item.nombre
            }));
          }
          });
          $('#persona_autorizacion').append($('<option>', {
              value: 226,
              text : 'Abraham Sierra'
            }));
          $('.divContratistas').hide('slow');
          $('#recibe').selectpicker('refresh');
          $('#supervisor_interno').selectpicker('refresh');
        } else {
          $.each(data[0].contratistas, function (i, item) {
            $('#contratista').append($('<option>', { 
              value: item.idtbl_contratistas,
              text : item.nombre_comercial
            }));
          });
          $.each(data[0].supervisores, function (i, item) {
            $('#supervisor').append($('<option>', { 
              value: item.idtbl_usuarios,
              text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+' (Número Empleado '+item.numero_empleado+')'
            }));
          });
          $.each(personalAutoriza, function (i, item) {
            //if (item.idtbl_users == 17){
              $('#persona_autorizacion').append($('<option>', {
                value: item.idtbl_users,
                text : item.nombre
              }));
            //}
          });
          $('#contratista').selectpicker('refresh');
          $('#supervisor').selectpicker('refresh');
          $('#recibe').selectpicker('refresh');
          $('.divContratistas').show('slow');
          $('#supervisor_interno').hide(500);
        }        
      },
      error : function(data) {
        console.log(data);
      }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      _this.closest('.card-body').removeClass('load');
    });
  });
  $(document).on('change', '#contratista', function(event) {
    event.preventDefault();
    var _this=$(this);
    $('#recibe').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $.ajax({
      url: base_url+'almacen/personal-contratista',
      type: 'POST',
      dataType: 'json',
      data: {contratista: _this.val()},
      beforeSend: function() {
        _this.closest('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        $.each(data[0], function (i, item) {
          $('#recibe').append($('<option>', {
            value: item.idtbl_usuarios,
            text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno
          }));
        });
        $('#recibe').selectpicker('refresh');
      },
      error : function(data) {
        console.log(data);
      }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      _this.closest('.card-body').removeClass('load');
    });
  });
  $('#nuevoProducto').click(function (event) {

    /* Act on the event */
    var $div = $('div[id^="item-producto"]:last');

    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'item-producto' + num);

    $klon.css('display', 'none');

    $klon.find('.campos_ac').css('display', 'none');

    $div.after($klon);

    $klon.show(500);

    $klon.find('.bootstrap-select').replaceWith(function () {
      return $('select', this);
    });


    $('#item-producto' + num + ' .selectpicker').selectpicker();

    $klon.find('input,textarea').val('');
    $klon.find('.delete-product').css('display', 'block');

  });
  $(document).on('click', '.delete-product', function () {
    $(this).parents('div[id^="item-producto"]').remove();
  });
  $(document).ready(function () {
    $("#formuploadajax").on("submit", function (event) {
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        var button = $("#btn-enviar-solicitud"); 
        button.prop("disabled", true);
        var f = $(this);
        var tipo_almacen = $("#tipo_almacen").val();
        var formData = new FormData(document.getElementById("formuploadajax"));
        if(tipo_almacen == 'Cliente' || tipo_almacen == 'Almacen General'){
            
            var cantidad = $("#formuploadajax input[name='cantidad[]'");
            var existencias = $("#formuploadajax input[name='existencias[]']");
            
            for(var r=0; r<cantidad.length; r++){
                
                if(parseFloat(existencias[r].value) < parseFloat(cantidad[r].value)){
                    $(cantidad[r]).css("border-color", "#d9534f");
                    Toast.fire({
                        type: 'error',
                        title: '¡El almacén no cuenta con esa cantidad!'
                    });
                    button.prop("disabled", false);
                    return 0;
                }                
            }
        }
        $.ajax({
          url: "<?= base_url()?>almacen/nueva-solicitud",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function (res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
              $("#btn-enviar-solicitud").css('display','none');
              $("#btn-cancelar").css('display','none');
              $("#nuevoProducto").css('display','none');
              window.location.replace("<?= base_url()?>almacen/solicitudes-almacen");
            } else {
              button.prop("disabled", false);
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
<script>
  var statSend = false;
function checkSubmit() {
    if (!statSend) {
        statSend = true;
        return true;
    } else {
        //alert("El formulario ya se esta enviando...");
        return false;
    }
}
</script>

<script>

  $(document).on('submit', '.form', function (event) {
    $(this).find("button[type='submit']").prop("disabled", "true");
  });

  /* ********** Eventos Busqueda Productos ********** */
  $("body").on('keyup', ".neodata", function(event) {
    var element = $(this);
    var _this=$(this).closest('.itemproducto');
    var neodata = element.val();
    var proyecto = $("#selectProyecto").val();
    var segmento = $("#ssegmento").val();
    if($('#uid_almacen').val() != null && $('#uid_almacen').val() != '25839864557600770'){
      segmento = $("option:selected", '#uid_almacen').data("segmento");
    }
    var tipo_almacen = $("#tipo_almacen").val();
    if($('#uid_almacen').val() != '' && $('#uid_almacen').val() != null){
      var uid_almacen = $('#uid_almacen').val();
      var dataString = 'neodata=' + neodata + '&tipo=almacen_general' + '&tipo_almacen=' + tipo_almacen + '&proyecto=' + proyecto + '&segmento=' + segmento + '&uid_almacen=' + uid_almacen;    
    }else{
      var dataString = 'neodata=' + neodata + '&tipo=almacen_general' + '&tipo_almacen=' + tipo_almacen + '&proyecto=' + proyecto + '&segmento=' + segmento;    
    }
    if(proyecto == null || segmento == null){
      $(this).val("");
      $(this).selectpicker('refresh');
      Toast.fire({
            type: 'error',
            title: "Seleccione proyecto y segmento."
      });
      return;
    }
    if(tipo_almacen == ""){
      $(this).val("");
      $(this).selectpicker('refresh');
      Toast.fire({
        type: 'error',
        title: "Seleccione el tipo de almacén"
      });
      return;
    }
    $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>/almacen/getCatalogoPorNeodata",
        data: dataString,
        dataType: "json",
        success:function(data) {
            parent = element.closest("div");
            filas = "";
            $.each(data, function(key, item) {
                filas += "<div><a class='elemento-sugerido list-group-item' data-idtblcatalogo='" + item.idtbl_catalogo + "' data='" + item.neodata + " " + item.marca + " " + item.modelo + " (" + item.descripcion.substr(0,60) + ")" + "' data-precio='" + item.precio + "' data-unidad_medida='" + item.unidad_medida + "' data-existencias='" + item.existencias  + "' data-moneda='" + item.tipo_moneda +"' data-preciolabel='" + parseFloat(item.precio).toFixed(2) + (item.tipo_moneda == "p" ? ' Pesos' : ' Dolares') + "' data-categoria='" + item.ctl_categorias_idctl_categorias + "'>" + item.neodata + " " + item.marca + " " + item.modelo + " (" + item.descripcion.substr(0,60) + ")" + "</a></div>";
            });
            parent.find('.sugerencias').fadeIn(1000).html(filas);
            parent.find('.elemento-sugerido').on('click', function(){
                $(_this).find('.categoria').val($(this).data("categoria"));
                $(_this).find('.existencias').val($(this).data("existencias"));
                $(_this).find('.catalogo').val($(this).data("idtblcatalogo"));
                $(_this).find('.precio').val($(this).data("precio"));
                $(_this).find('.precioLabel').val($(this).data("preciolabel"));
                $(_this).find('.moneda').val($(this).data("moneda"));
                if($(this).data("idtblcatalogo") == 19420 || $(this).data("idtblcatalogo") == 25053 || $(this).data("idtblcatalogo") == 25054 || $(this).data("idtblcatalogo") == 19955 || $(this).data("idtblcatalogo") == 22124 || $(this).data("idtblcatalogo") == 22882 || $(this).data("idtblcatalogo") == 22463 || $(this).data("idtblcatalogo") == 22918 || $(this).data("idtblcatalogo") == 22763 || $(this).data("idtblcatalogo") == 19421 || $(this).data("idtblcatalogo") == 24792 || $(this).data("idtblcatalogo") == 24793 || $(this).data("idtblcatalogo") == 19428 || $(this).data("idtblcatalogo") == 19429 || $(this).data("categoria") == 7 || $(this).data("categoria") == 16) {
                  if($(this).data("idtblcatalogo") == 19420 || $(this).data("idtblcatalogo") == 25053 || $(this).data("idtblcatalogo") == 25054 || $(this).data("idtblcatalogo") == 19955 || $(this).data("idtblcatalogo") == 19421 || $(this).data("idtblcatalogo") == 24792 || $(this).data("idtblcatalogo") == 24793 || $(this).data("idtblcatalogo") == 19428 || $(this).data("idtblcatalogo") == 19429){                    
                    $(_this).find('.campos_ac').show(500);
                    $(_this).find('.unidad').val($(this).data("unidad_medida"));
                  }                  
                  $(_this).find('#cantidad').attr('readonly', 'readonly').val('1');
                  $(_this).find('.unidad').val($(this).data("unidad_medida"));                  
      $.ajax({
        type:"POST",
        url:base_url+'almacen/getSitiosByProducto',
        data:'id='+$(this).data("idtblcatalogo")+'&proyecto='+proyecto+'&segmento='+segmento,
        success:function(r) {
          let registros = eval(r);
          if(registros.length == 0) {
            $(_this).find('#sitio').append($('<option>', {
              value : '',
              text : 'No hay un sitio asignado a este producto'
            }));
            $(_this).find('#sitio').selectpicker('refresh');
            return;
          }
          html = "";
          for(i = 0; i < registros.length; i++) {
            let sitio = registros[i]['sitio'];
            sitio = sitio.substring(0, 605);
            $(_this).find('#sitio').append($('<option value="' + registros[i]['sitio'] + '"' + (registros[i]['sitio_solicitud'] != null ? '' : '') + '>' + sitio + '</option>'));
          }
          $(_this).find('#sitio').selectpicker('refresh');       
        }
      })
    } else if($(this).data("idtblcatalogo") == 25698) {
      $(_this).find('.campos_ac').show(500);
      $(_this).find('#cantidad').removeAttr('readonly').val('');
      $(_this).find('.unidad').val($(this).data("unidad_medida"));
      $.ajax({
        type:"POST",
        url:base_url+'almacen/getSitiosByProducto',
        data:'id='+$(this).data("idtblcatalogo"),
        success:function(r) {
          let registros = eval(r);
          if(registros.length == 0) {
            $(_this).find('#sitio').append($('<option>', {
              value : '',
              text : 'No hay un sitio asignado a este producto'
            }));
            $(_this).find('#sitio').selectpicker('refresh');
            return;
          }
          html = "";
          for(i = 0; i < registros.length; i++) {
            let sitio = registros[i]['sitio'];
            sitio = sitio.substring(0, 605);
            $(_this).find('#sitio').append($('<option value="' + registros[i]['sitio'] + '"' + (registros[i]['sitio_solicitud'] != null ? 'disabled' : '') + '>' + sitio + '</option>'));
          }
          $(_this).find('#sitio').selectpicker('refresh');       
        }
      })
    } else if($(this).data("categoria") == 16) {
      $(_this).find('.campos_ac').hide(500);
      $(_this).find('#cantidad').attr('readonly', 'readonly').val('1');   
      $(_this).find('.unidad').val($(this).data("unidad_medida"));   
    } else {
      $(_this).find('.campos_ac').hide(500);
      $(_this).find('#cantidad').removeAttr('readonly').val('');
      $(_this).find('.unidad').val($(this).data("unidad_medida"));
    }
                //Obtenemos la id unica de la sugerencia pulsada
                var idtbl_catalogo = $(this).data("idtblcatalogo");
                var descripcion = $(this).attr('data');
                //Editamos el valor del input con data de la sugerencia pulsada
                parent.find('.neodata').val(descripcion);
                parent.find('.producto').val(idtbl_catalogo);
                //Hacemos desaparecer el resto de sugerencias
                $('.sugerencias').fadeOut(500);
                parent.find('.sugerencias').html("");
                return false;
            });
        }
    })
  });

  $("body").on('keydown', ".neodata", function(event){
    var element = $(this);
    var _this=$(this).closest('.itemproducto');
    if($(_this).find('.producto').val() != ""){
      element.val("");
      $(_this).find('.producto').val("");
      $(_this).find('.categoria').val("");
      $(_this).find('.existencias').val("");
      $(_this).find('.catalogo').val("");
      $(_this).find('.precio').val("");
      $(_this).find('.precioLabel').val("");
      $(_this).find('.moneda').val("");
      $(_this).find('.cantidad').removeAttr('readonly').val('');
      $(_this).find('.campos_ac').hide(500);
      $(_this).find('.campos_ac').find('input').attr('disabled', 'disabled').removeAttr('required');
    }
  });

  $("body").on('blur', ".neodata", function(event){
    var element = $(this);
    var _this=$(this).closest('.itemproducto');
    if($(_this).find('.producto').val() == ""){
      element.val("");
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
  /* ********** Eventos Busqueda Productos ********** */
</script>