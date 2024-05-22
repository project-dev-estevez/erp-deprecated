<section class="forms nueva-solicitud">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Nueva Solicitud de Viaticos</h3>
            </div>
            <div class="card-body">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
                <?php echo form_open_multipart(base_url().'compras/enviar-solicitud', 'class="needs-validation" id="formuploadajax" onsubmit="return checkSubmit();" novalidate'); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tipo de Viatico</label>
                            <select name="tipo_viatico" id="tipo_viatico" class="form-control" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="semanal">Semanal</option>
                                <option value="traslado">Traslado y/o Hospedaje</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione persona autorización
                            </div>
                        </div>
                    </div>
                    <div class="col-6" style="display: none;" id="tipo_transporte">
                        <div class="form-group">
                            <label>Tipo de transporte</label>
                            <select name="tipo_transporte" id="select_tipo_transporte" class="form-control" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <!--<option value="Avión">Avión</option>-->
                                <option value="Camión">Camión</option>
                                <option value="Propiedad Estevez.Jor Foráneo">Propiedad Estevez.Jor Foráneo</option>
                                <option value="Propiedad Estevez.Jor Zona Metropolitana">Propiedad Estevez.Jor Zona Metropolitana</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione persona autorización
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-xs-12 col-md-7">
                        <label>Proyecto*</label>
                        <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required
                            data-live-search="true">
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
                    <div class="col-xs-12 col-md-5">
                        <label>Segmento*</label>
                        <select name="segmento" id="ssegmento" class="selectpicker segmento" required
                            data-live-search="true">
                            <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Persona autorización</label>
                            <select name="persona_autorizacion" id="persona_autorizacion" class="form-control recibe"
                                required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="72">Christian Corpus</option>
                                <option value="284">Marco Rios</option>
                                <option value="239">Carlos Santos</option>
                                <option value="224">Roberto Vieyra</option>
                                <option value="229">Victor Ortega</option>
                                <!--<option value="68">Edgar Cervantes</option>-->
                                <option value="185">Ulises Vargas</option>
                                <option value="184">Julio Balderrama</option>
                                <option value="182">David Gethsemani</option>
                                <option value="151">Alejandro Rios</option>
                                <option value="3">Ingrid Martinez</option>
                                <option value="275">Mirsha Hernandez</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione persona autorización
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Nombre PM a cargo</label>
                            <select name="pm_cargo" id="pm_cargo" class="form-control recibe"
                                required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="107">Brandon Hernandez</option>
                                <option value="86">Octavio Lopez</option>
                                <option value="167">Crystian Aldape</option>
                                <option value="3">Ingrid Martinez</option>
                                <option value="256">Barbara Flores</option>
                                <!--<option value="68">Edgar Cervantes</option>-->
                                <option value="262">Pablo Galvan</option>
                                <option value="274">Jose Amozoc</option>
                                <option value="182">David Gethsemani</option>
                                <option value="304">Itzel Barcena</option>
                                <option value="235">Marco Silva</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione persona autorización
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>Tipo</label>
                            <select name="tipo_recibe" id="tipo_recibe" class="form-control recibe"
                                required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="individual">Individual</option>
                                <option value="cuadrilla">Cuadrilla</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione persona autorización
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="row" style="display: none;" id="recibe_individual">
                    <div class="col">
                        <div class="form-group">
                            <label>Recibe*</label>
                            <select name="recibe" id="select_recibe_individual" class="selectpicker recibe" 
                                data-live-search="true">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($usuarios as $key => $value): ?>
                                <option value="<?php echo $value->idtbl_usuarios ?>"
                                data-nombre="<?= $value->nombres ?>"
                                data-apellidopaterno="<?= $value->apellido_paterno ?>"
                                data-apellidomaterno="<?= $value->apellido_materno ?>">
                                    <?php echo $value->nombres ?> <?= $value->apellido_paterno ?>
                                    <?= $value->apellido_materno ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" style="display: none;" id="recibe_cuadrilla">
                    <div class="col">
                        <div class="form-group">
                            <label>Recibe*</label>
                            <select name="recibe" id="select_recibe_cuadrilla" class="selectpicker recibe" 
                                data-live-search="true">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($cuadrillas as $key => $value): ?>
                                <option value="<?php echo $value->idtbl_cuadrillas ?>"
                                data-cuadrilla="<?= $value->nombre_cuadrilla ?>">
                                    <?php echo $value->nombre_cuadrilla ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>


                <hr>
                <div id="item-producto1" class="itemproducto">
                    <div class="form-row">
                    <div class="col">
                    <label for="cantidad">Ubicación proyecto*</label>
                    <select name="mercado" id="mercado" class="selectpicker mercado" required data-live-search="true">
                                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                                <?php foreach($estados AS $key => $value){ ?>
                                                    <option value="<?= $value->estado ?>"><?= $value->estado ?></option>
                                                <?php } ?>
                                            </select>
                                                </div>
                        <div class="col">
                            <label for="cantidad">Cantidad*</label>
                            <input type="number" name="cantidad" id="cantidad" required class="form-control">
                        </div>

                    </div>

                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="especificaciones">Motivo</label>
                            <textarea name="motivo" id="motivo" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <i class="fa fa-close delete-product" style="display:none"></i>
                    <hr>
                </div>
                <table class="table" id="table_semanal" style="display: none;">
                    <thead>
                        <th>Nombre Completo</th>
                        <th>Cargo</th>
                        <th>Cuadrilla</th>
                        <th>Días a Laborar</th>
                        <th>Cantidad</th>
                        <th>Días a descontar</th>
                        <th>Descuento</th>
                        <th>Total</th>
                        <th>Observaciones</th>
                    </thead>
                    <tbody id="excel_semanal">
                        
                    </tbody>
                </table>

                <table class="table table-responsive" id="table_traslado" style="display: none;">
                    <thead>
                        <th>Nombre Completo</th>
                        <th>Transporte(Monto)</th>
                        <th>Hospedaje(Monto)</th>
                        <th>Casetas(Monto)</th>
                        <th>L</th>
                        <th>M</th>
                        <th>M</th>
                        <th>J</th>
                        <th>V</th>
                        <th>S</th>
                        <th>D</th>
                        <th>Alimentos(Monto)</th>
                        <th>Monto Total</th>
                        <th>Observaciones</th>
                        
                    </thead>
                    <tbody id="excel_traslado">
                        
                    </tbody>
                </table>
                <br><br>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <a href="<?php echo base_url().'almacen/solicitudes_almacen' ?>" class="btn-warning btn"
                            id="btn-cancelar">Cancelar</a>
                        <?= form_hidden('token',$token) ?>
                        <?= form_hidden('tipo','viaticos') ?>
                        <button type="submit" class="btn-primary btn" id="btn-enviar-solicitud">Enviar
                            Solicitud</button>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</section>
<script>
$(document).on('change', '#selectProyecto', function(event) {
    event.preventDefault();
    $('#ssegmento').find('option').remove().end().append(
        '<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#ssegmento').selectpicker('refresh');
    $.ajax({
        type: "POST",
        url: base_url + 'almacen/getSegmento',
        data: 'id=' + $('#selectProyecto').val(),
        success: function(r) {
            let registros = eval(r);
            if (registros.length == 0) {
                let direccion = $("#selectProyecto").find(':selected').data('direccion');
                direccion = direccion.substring(0, 65);
                $('#ssegmento').append($('<option>', {
                    value: '',
                    text: direccion
                }));
                $('#ssegmento').selectpicker('refresh');
                return;
            }
            html = "";
            for (i = 0; i < registros.length; i++) {
                let segmento = registros[i]['segmento'];
                segmento = segmento.substring(0, 605);
                $('#ssegmento').append($('<option>', {
                    value: registros[i]['idtbl_segmentos_proyecto'],
                    text: segmento
                }));
            }
            $('#ssegmento').selectpicker('refresh');
        }
    });
});

$(document).on('change', '#select_recibe_cuadrilla', function(event) {
    event.preventDefault();
    
    $.ajax({
        type: "POST",
        url: base_url + 'almacen/getPersonalCuadrilla',
        data: 'id=' + $('#select_recibe_cuadrilla').val(),
        success: function(r) {
            let registros = eval(r);
            let cuadrilla = $("#select_recibe_cuadrilla").find(':selected').data('cuadrilla');
            html = "";
            
            for (i = 0; i < registros.length; i++) {
                for(x = 0; x < registros[i].personal_recibe.length; x++){
                    console.log(registros[i].personal_recibe[x]);
                    var tipo_viatico = $('#tipo_viatico').val();
                    var nombre = registros[i].personal_recibe[x]['nombres'] + ' ' + registros[i].personal_recibe[x]['apellido_paterno'] + ' ' + registros[i].personal_recibe[x]['apellido_materno'];
                    var idtbl_usuario = registros[i].personal_recibe[x]['idtbl_usuarios'];
                    //segmento = segmento.substring(0, 605);
                    if(tipo_viatico == 'traslado'){
                        $('#excel_traslado').append("<tr><td>"+nombre+"<input type='hidden' name='idtbl_usuarios[]' value='"+idtbl_usuario+"'>'</td><td><input type='text' name='transporte[]' data-index='"+x+"' class='form-control transporte' id='transporte_"+x+"'></td><td><input type='number' name='hospedaje[]' data-index='"+x+"' class='form-control hospedaje' id='hospedaje_"+x+"'></td><td><input type='number' data-index='"+x+"' name='casetas[]' class='form-control casetas' id='casetas_"+x+"'></td><td><input type='checkbox' name='ch1["+x+"]' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch2["+x+"]' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch3["+x+"]' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch4["+x+"]' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch5["+x+"]' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch6["+x+"]' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch7["+x+"]' data-index='0' value='1' class='form-control'></td><td><input type='text' name='alimentos[]' data-index='"+x+"' class='form-control alimentos' id='alimentos_"+x+"'></td><td><input type='text' name='total[]' data-index='"+x+"' class='form-control total' id='total_"+x+"' value='0' readonly></td><td><input type='text' name='observaciones[]' data-index='"+x+"' class='form-control' id='observaciones_"+x+"'></td></tr>");
                    }else{
                        $('#excel_semanal').append("<tr><td>"+nombre+"<input type='hidden' name='idtbl_usuarios[]' value='"+idtbl_usuario+"'>'</td><td></td><td>"+cuadrilla+"</td><td><input type='text' name='dias_laborar[]' data-index='"+x+"' class='form-control dias_laborar' id='dias_laborar_"+x+"'></td><td><input type='number' name='cantidad_dia[]' data-index='"+x+"' class='form-control cantidad_laborar' id='cantidad_laborar_"+x+"'></td><td><input type='number' data-index='"+x+"' name='dias_descontar[]' class='form-control dias_descontar' id='dias_descontar_"+x+"'></td><td><input type='text' name='descuento[]' data-index='"+x+"' class='form-control descuento' id='descuento_"+x+"' readonly></td><td><input type='text' name='total[]' data-index='"+x+"' class='form-control total' id='total_"+x+"' readonly></td><td><input type='text' name='observaciones[]' data-index='"+x+"' class='form-control' id='observaciones_"+x+"'></td></tr>");
                    }
                }
                
            }
        }
    });
});
$(document).on('change', '#tipo_viatico', function (event) {
    var _this = $(this);
    if(_this.val() == 'semanal'){
        var fecha = new Date();
        var dia = fecha.getDay();

        if(dia != 1){
            Toast.fire({
                type: 'error',
                title: '¡El formato solo esta disponible los días Jueves!'
            });
            $('#btn-enviar-solicitud').prop('disabled', true);
            return 0;
        }
    }
    if(_this.val() == 'traslado'){
        $('#btn-enviar-solicitud').prop('disabled', false);
      $('#tipo_transporte').show(1000);
      $('#select_tipo_transporte').prop('required', true);
      $('#table_semanal').hide(1000);
      $('#table_traslado').show(1000);
    }else{
      $('#tipo_transporte').hide(1000);
      $('#zona_metropolitana').hide(1000);
      $('#select_tipo_transporte').prop('required', false);
      $('#select_zona_metropolitana').prop('required', false);
      $('#table_traslado').hide(1000);
      $('#table_semanal').show(1000);
    }
  });
  

  $(document).on('change', '#tipo_recibe', function (event) {
    var _this = $(this);
    if(_this.val() == 'individual'){
      $('#recibe_cuadrilla').hide(1000);
      $('#select_recibe_cuadrill').prop('required', false);
      $('#recibe_individual').show(1000);
      $('#select_recibe_individual').prop('required', true);
    }else{
      $('#recibe_cuadrilla').show(1000);
      $('#select_recibe_cuadrilla').prop('required', true);
      $('#recibe_individual').hide(1000);
      $('#select_recibe_individual').prop('required', false);

    }
  });

  $(document).on('change', '#select_recibe_individual', function (event) {

    var _this = $(this);
    var tipo_viatico = $('#tipo_viatico').val();
    let nombre = $('#select_recibe_individual').find(':selected').data('nombre');
    let apellido_paterno = $('#select_recibe_individual').find(':selected').data('apellidopaterno');
    let apellido_materno = $('#select_recibe_individual').find(':selected').data('apellidomaterno');

    if(tipo_viatico == 'traslado'){
        $("#excel_traslado").html("<tr><td>"+nombre+" "+apellido_paterno+" "+apellido_materno+"</td><td><input type='number' name='transporte[]' data-index='0' class='form-control transporte' id='transporte_0'></td><td><input type='number' name='hospedaje[]' data-index='0' class='form-control hospedaje' id='hospedaje_0'></td><td><input type='number' name='casetas[]' data-index='0' class='form-control casetas' id='casetas_0'></td><td><input type='checkbox' name='ch1' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch2' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch3' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch4' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch5' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch6' data-index='0' value='1' class='form-control'></td><td><input type='checkbox' name='ch7' data-index='0' value='1' class='form-control'></td><td><input type='number' name='alimentos[]' data-index='0' class='form-control alimentos' id='alimentos_0'></td><td><input type='text' name='total' data-index='0' class='form-control total' id='total_0' readonly></td><td><input type='text' name='observaciones' data-index='0' class='form-control' id='observaciones_0'></td></tr>")

    }else{
        $("#excel_semanal").html("<tr><td>"+nombre+" "+apellido_paterno+" "+apellido_materno+"</td><td>Supervisor</td><td></td><td><input type='text' name='dias_laborar[]' class='form-control' id='dias_laborar'></td><td><input type='number' name='cantidad_dia[]' class='form-control' id='cantidad_laborar'></td><td><input type='number' name='dias_descontar[]' class='form-control' id='dias_descontar'></td><td><input type='text' name='descuento[]' class='form-control' id='descuento' readonly></td><td><input type='text' name='total[]' class='form-control' id='total' readonly></td><td><input type='text' name='observaciones[]' class='form-control' id='observaciones'></td></tr>")
    }
});

  $(document).on('change', '#select_tipo_transporte', function (event) {
    var _this = $(this);
    if(_this.val() == 'Propiedad Estevez.Jor Zona Metropolitana'){
      $('#zona_metropolitana').show(1000);
      $('#select_zona_metropolitana').prop('required', true);
    }else{
      $('#zona_metropolitana').hide(1000);
      $('#select_zona_metropolitana').prop('required', false);

    }
  });

  $(document).on('keyup', '.transporte', function (event) {
    var index = $(this).data('index');
    var transporte = $('#transporte_'+index).val();
    var hospedaje = $('#hospedaje_'+index).val();
    var casetas = $('#casetas_'+index).val();
    var alimentos = $('#alimentos_'+index).val();
  
    if((transporte != '' || transporte != null) && (hospedaje != '' || hospedaje != null) && (casetas != '' || casetas != null) && (alimentos != '' || alimentos != null)){
      calculo_monto(index, transporte, hospedaje, casetas, alimentos);
    }
  });

  $(document).on('keyup', '.hospedaje', function (event) {
    var index = $(this).data('index');
    var transporte = $('#transporte_'+index).val();
    var hospedaje = $('#hospedaje_'+index).val();
    var casetas = $('#casetas_'+index).val();
    var alimentos = $('#alimentos_'+index).val();
  
    if((transporte != '' || transporte != null) && (hospedaje != '' || hospedaje != null) && (casetas != '' || casetas != null) && (alimentos != '' || alimentos != null)){
      calculo_monto(index, transporte, hospedaje, casetas, alimentos);
    }
  });

  $(document).on('keyup', '.casetas', function (event) {
    var index = $(this).data('index');
    var transporte = $('#transporte_'+index).val();
    var hospedaje = $('#hospedaje_'+index).val();
    var casetas = $('#casetas_'+index).val();
    var alimentos = $('#alimentos_'+index).val();
  
    if((transporte != '' || transporte != null) && (hospedaje != '' || hospedaje != null) && (casetas != '' || casetas != null) && (alimentos != '' || alimentos != null)){
      calculo_monto(index, transporte, hospedaje, casetas, alimentos);
    }
  });

  $(document).on('keyup', '.alimentos', function (event) {
    var index = $(this).data('index');
    var transporte = $('#transporte_'+index).val();
    var hospedaje = $('#hospedaje_'+index).val();
    var casetas = $('#casetas_'+index).val();
    var alimentos = $('#alimentos_'+index).val();
  
    if((transporte != '' || transporte != null) && (hospedaje != '' || hospedaje != null) && (casetas != '' || casetas != null) && (alimentos != '' || alimentos != null)){
      calculo_monto(index, transporte, hospedaje, casetas, alimentos);
    }
  });

  $(document).on('keyup', '.dias_laborar', function (event) {
    var index = $(this).data('index');
    var dias_laborar = $('#dias_laborar_'+index).val();
    var descuento = $('#descuento_'+index).val();
    var cantidad = $('#cantidad_laborar_'+index).val();
    var dias_descontar = $('#dias_descontar_'+index).val();
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_cuad(index, dias_laborar, descuento, cantidad, dias_descontar);
    }
  });
  
  $(document).on('keyup', '.cantidad', function (event) {
    var index = $(this).data('index');
    var dias_laborar = $('#dias_laborar_'+index).val();
    var descuento = $('#descuento_'+index).val();
    var cantidad = $('#cantidad_laborar_'+index).val();
    var dias_descontar = $('#dias_descontar_'+index).val();
    if((cantidad != '' || cantidad != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_descuento_cuad(index, dias_descontar, cantidad);
    }
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_cuad(index, dias_laborar, descuento, cantidad, dias_descontar);
    }
  });
  $(document).on('keyup', '.dias_descontar', function (event) {
    var index = $(this).data('index');
    var dias_laborar = $('#dias_laborar_'+index).val();
    
    var cantidad = $('#cantidad_laborar_'+index).val();
    var dias_descontar = $('#dias_descontar_'+index).val();
    if((cantidad != '' || cantidad != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_descuento_cuad(index, dias_descontar, cantidad);
    }
    var descuento = $('#descuento_'+index).val();
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_cuad(index, dias_laborar, descuento, cantidad, dias_descontar);
    }
  });


  $(document).on('keyup', '#dias_laborar', function (event) {
    var dias_laborar = $('#dias_laborar').val();
    var descuento = $('#descuento').val();
    var cantidad = $('#cantidad_laborar').val();
    var dias_descontar = $('#dias_descontar').val();
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo();
    }
  });
  
  $(document).on('keyup', '#cantidad', function (event) {
    var dias_laborar = $('#dias_laborar').val();
    var descuento = $('#descuento').val();
    var cantidad = $('#cantidad_laborar').val();
    var dias_descontar = $('#dias_descontar').val();
    if((cantidad != '' || cantidad != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_descuento();
    }
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo();
    }
  });
  $(document).on('keyup', '#dias_descontar', function (event) {
    var dias_laborar = $('#dias_laborar').val();
    var descuento = $('#descuento').val();
    var cantidad = $('#cantidad_laborar').val();
    var dias_descontar = $('#dias_descontar').val();
    if((cantidad != '' || cantidad != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo_descuento();
    }
    if((descuento != '' || descuento != null) && (cantidad != '' || cantidad != null) && (dias_laborar != '' || dias_laborar != null) && (dias_descontar != '' || dias_descontar != null)){
      calculo();
    }
  });
$(document).on('change', '.producto', function(event) {
    event.preventDefault();
    var _this = $(this).closest('.itemproducto');
    $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));
    $(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));
});
$(document).on('change', '.proyecto', function(event) {
    event.preventDefault();
    console.log($("option:selected", this).val())
    $('.recibe').find('.options').hide();
    $('.recibe').find('.proyecto' + $("option:selected", this).val()).show()

});

$(document).on('change', '#contratista', function(event) {
    event.preventDefault();
    var _this = $(this);
    $('#recibe').find('option').remove().end().append(
        '<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $.ajax({
            url: base_url + 'almacen/personal-contratista',
            type: 'POST',
            dataType: 'json',
            data: {
                contratista: _this.val()
            },
            beforeSend: function() {
                _this.closest('.card-body').addClass('load');
            },
            success: function(data) {
                if (data.error) {
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    });
                }
                $.each(data[0], function(i, item) {
                    $('#recibe').append($('<option>', {
                        value: item.idtbl_usuarios,
                        text: item.nombres + ' ' + item.apellido_paterno + ' ' +
                            item.apellido_materno
                    }));
                });
                $('#recibe').selectpicker('refresh');
            },
            error: function(data) {
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
$('#nuevoProducto').click(function(event) {

    /* Act on the event */
    var $div = $('div[id^="item-producto"]:last');

    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'item-producto' + num);

    $klon.css('display', 'none');

    $div.after($klon);

    $klon.show(500);

    $klon.find('.bootstrap-select').replaceWith(function() {
        return $('select', this);
    });


    $('#item-producto' + num + ' .selectpicker').selectpicker();

    $klon.find('input,textarea').val('');
    $klon.find('.delete-product').css('display', 'block');

});
$(document).on('click', '.delete-product', function() {
    $(this).parents('div[id^="item-producto"]').remove();
});
$(document).ready(function() {
    $("#formuploadajax").on("submit", function(event) {
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            $.ajax({
                url: "<?= base_url()?>almacen/nueva_solicitud_viaticos",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $("#btn-enviar-solicitud").css('display', 'none');
                        $("#btn-cancelar").css('display', 'none');
                        $("#nuevoProducto").css('display', 'none');
                        window.location.replace("<?= base_url()?>almacen/viaticos");
                    } else {
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

function calculo(){
    var dias_laborar = parseInt($('#dias_laborar').val());
    var cantidad_laborar = parseInt($('#cantidad_laborar').val());
    var descuento = parseInt($('#descuento').val());
    var dias_descontar = parseInt($('#dias_descontar').val());

    console.log(dias_laborar,cantidad_laborar,descuento,dias_descontar);
    var calculo = (dias_laborar * cantidad_laborar) - descuento;
    $('#total').val(calculo);
}

function calculo_descuento(){
    var dias_laborar = parseInt($('#dias_laborar').val());
    var cantidad_laborar = parseInt($('#cantidad_laborar').val());
    var dias_descontar = parseInt($('#dias_descontar').val());

    console.log(dias_descontar,cantidad_laborar);
    var calculo = dias_descontar * cantidad_laborar;
    $('#descuento').val(calculo);
}

function calculo_cuad(index, dias_laborar, descuento, cantidad, dias_descontar){
    
    //alert(descuento);
    //console.log(dias_laborar,cantidad,descuento,dias_descontar);
    var calculo = (dias_laborar * cantidad) - descuento;
    //alert(calculo);
    $('#total_'+index).val(calculo);
}

function calculo_descuento_cuad(index, dias_descontar, cantidad){
    

    //console.log(dias_descontar,cantidad);
    var calculo = dias_descontar * cantidad;
    //alert(calculo);
    $('#descuento_'+index).val(calculo);
}

function calculo_monto(index, transporte, hospedaje, casetas, alimentos){
    
    console.log(index,transporte,hospedaje,casetas,alimentos);
    var total = parseInt(transporte)+parseInt(hospedaje)+parseInt(casetas)+parseInt(alimentos);
    //alert(calculo);
    $('#total_'+index).val(total);
}
</script>