<section class="forms nueva-solicitud">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Crear Nuevo Generador</h3>
            </div>
            <div class="card-body">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <?= validation_errors('<span class="error">', '</span>'); ?>
                <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-checklist"'); ?>
                <div>
                
                    <div class="col-sm-12">
                        <div style="text-align: center;">
                            <div class="row">
                                <div class="col">
                                    <label for="cliente">Cliente</label>
                                    <select name="cliente" id="cliente" onchange="getForm()" class="form-control">
                                        <option value="" selected disabled>Seleccione...</option>
                                        <?php foreach($clientes AS $key => $value){ ?>
                                            <option value="<?= $value->idtbl_clientes ?>"><?= $value->razon_social ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="servicio">Tipo de Servicio</label>
                                    <select name="servicio" id="servicio" onchange="getForm()" class="form-control">
                                        <option value="" selected disabled>Seleccione...</option>
                                        <option value="construccion">Construcción</option>
                                        <option value="acometida">Acometida</option>
                                        <option value="mantenimiento">Mantenimiento</option>
                                    </select>
                                </div>
                            </div>
                                <table id="mantenimiento_att" class="table" style="display: none;">
                                    <!--<tr>
                                        <th>EVENTO No.</th>
                                        <td><input class="form-control" name="evento" placeholder="EVENTO no."></td>
                                        <th>Folio/Evento</th>
                                        <td><input class="form-control" name="folio" placeholder="Folio/Evento"></td>
                                    </tr>-->
                                    <tr>
                                        <th>Fecha*</th>                                        
                                        <td>
                                            <?= date('Y-m-d H:i:s') ?>
                                        </td>
                                        <!--<th>Departamento/área AT&T</th>
                                        <td><input class="form-control" name="departamento" placeholder="Departamento"></td>-->
                                        <th>No. Incidente</th>
                                        <td><input class="form-control" name="incidente" placeholder="Incidente"></td>
                                    </tr>
                                    <tr>
                                        <!--<th>Coordinador AT&T</th>
                                        <td><input type="text" class="form-control" name="coordinadoratt" placeholder="Coordinador AT&T"></td>-->
                                        <th>No. Reporte Proveedor</th>
                                        <td>
                                            <input type="text" class="form-control" name="reporte_proveedor" id="reporte_proveedor" placeholder="No. Reporte Proveedor">
                                        </td>
                                        <!--<th>Zona/Segmento</th>
                                        <td>
                                            <input type="text" class="form-control" name="segmento" placeholder="Zona/Segmento">
                                        </td>-->
                                        <th>Región</th>
                                        <td>
                                            <input type="text" class="form-control" name="region" id="region" placeholder="Región" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Fecha Inicio Trab.</th>
                                        <td><input type="date" class="form-control" name="fecha_inicio"></td>
                                        <th>Fecha Fin Trab.</th>
                                        <td>
                                            <input type="date" class="form-control" name="fecha_fin">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tipo Actividad</th>
                                        <td>
                                            <label for="preventivo">Preventivo</label>
                                            <input type="radio" name="tipo_actividad" id="preventivo" value="preventivo"><br>
                                            <label for="correctivo">Correctivo</label>
                                            <input type="radio" name="tipo_actividad" id="correctivo" value="correctivo"><br>
                                            <label for="patrullaje">Patrullaje</label>
                                            <input type="radio" name="tipo_actividad" id="patrullaje" value="patrullaje">
                                        </td>
                                        <th>Proveedor</th>
                                        <td><input type="text" name="proveedor" class="form-control" value="Estevez.Jor S.A. de C.V." readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Clave Oracle</th>
                                        <td>                                        
                                            <select name="clave_oracle" id="clave_oracle" class="selectpicker tramo"
                                            required data-live-search="true">
                                                <option value="" disabled selected>Seleccione...</option>
                                                <?php foreach($tramos as $key => $value){ ?>
                                                <option value="<?= $value->idtbl_tramo_fibra_optica ?>"
                                                data-region="<?php echo $value->region ?>"
                                                data-nombre="<?php echo $value->nombre_oracle ?>"
                                                data-tipo="<?php echo $value->tipo_localidad ?>"
                                                data-localidad="<?php echo $value->localidad ?>"
                                                data-codigo="<?php echo $value->codigo ?>"
                                                data-mercado="<?php echo $value->market ?>">
                                                <?= $value->clave_oracle ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <th>Tramo</th>
                                        <td><input type="text" class="form-control" name="tramo" id="tramo" placeholder="tramo" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Tipo De Localidad</th>
                                        <td>
                                            <input type="text" class="form-control" name="tipo_localidad" id="tipo_localidad" placeholder="Tipo Localidad" readonly>
                                        </td>
                                        <th>Descripción</th>
                                        <td><input type="text" class="form-control" name="descripcion" placeholder="Descripción"></td>
                                    </tr>
                                    <tr>
                                        <th>Localidad</th>
                                        <td>
                                            <input type="text" class="form-control" name="localidad" id="localidad" placeholder="Localidad" readonly>
                                        </td>
                                        <th>Supervisor AT&T</th>
                                        <td>                                        
                                            <select name="supervisor_att" id="supervisor_att" class="selectpicker supervisor"
                                            required data-live-search="true">
                                                <option value="" disabled selected>Seleccione...</option>
                                                <?php foreach($supervisores as $key => $value){ ?>
                                                <option value="<?= $value->idtbl_supervisor_att ?>"><?= $value->nombre ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Supervisor Proveedor</th>
                                        <td>                                        
                                            <?= $this->session->userdata('nombre') ?>
                                        </td>
                                        <th>Ciudad Mercado</th>
                                        <td><input type="text" name="ciudad_mercado" id="ciudad_mercado" class="form-control" placeholder="Ciudad Mercado" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>ID PANDA</th>
                                        <td>                                        
                                            <input type="text" name="panda" class="form-control" placeholder="ID PANDA">
                                        </td>
                                        <th>Tipo de Afectación</th>
                                        <td><select name="afectacion" id="afectacion" class="form-control afectacion"
                                            required data-live-search="true">
                                                <option value="" disabled selected>Seleccione...</option>
                                                <option value="Corte">Corte</option>
                                                <option value="Vandalismo">Vandalismo</option>
                                                <option value="Camion">Camión (Exceso de dimensiones)</option>
                                                <option value="Mordedura de roedor">Mordedura de Roedor</option>
                                                <option value="Poda de arbol">Poda de Árbol</option>
                                                <option value="Induccion">Inducción</option>
                                                <option value="Incendio">Incendio</option>
                                                <option value="Intermitencia">Intermitencia (Sitio)</option>
                                                <option value="Corte de energia">Corte de Energía (Sitio)</option>
                                                <option value="Manipulacion">Manipulación (Sitio)</option>
                                                <option value="Poste caido">Poste caído</option>
                                                <option value="Excavacion">Excavación</option>
                                                <option value="Otro">Otro</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <th>Observaciones / Comentarios</th>
                                        <td colspan="3">
                                        <textarea rows="4" cols="7"
                                                    name="observaciones" class="form-control"
                                                    placeholder="Observaciones / Comentarios"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Proyecto</th>
                                        <td colspan="3">
                                            <select name="proyecto" id="proyecto" class="selectpicker proyecto" required data-live-search="true">
                                                    <option value="" disabled selected>Seleccione...</option>
                                                    <?php foreach($proyectos AS $key => $value){ ?>
                                                        <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto.' - ' .$value->nombre_proyecto ?></option>
                                                    <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            
                                <table id="construccion_att" class="table" style="display: none;">                                                                        
                                    <tr>
                                    <th>Proveedor</th>
                                        <td><input type="text" name="proveedor" class="form-control" value="Estevez.Jor S.A. de C.V." readonly></td>
                                        <th>No. Reporte Proveedor</th>
                                        <td>
                                            <input type="text" class="form-control" name="reporte_proveedor" id="reporte_proveedor_cons" placeholder="No. Reporte Proveedor">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                    <th>Ciudad Mercado</th>
                                        <td><input type="text" name="ciudad_mercado" id="ciudad_mercado" class="form-control" placeholder="Ciudad Mercado"></td>
                                        <th>Proyecto</th>
                                        <td>
                                            <select name="proyecto" id="proyecto" class="selectpicker proyecto" required data-live-search="true">
                                                    <option value="" disabled selected>Seleccione...</option>
                                                    <?php foreach($proyectos AS $key => $value){ ?>
                                                        <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto.' - ' .$value->nombre_proyecto ?></option>
                                                    <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                        </div>
                    
                

                <!--<div class="row">
                    <div class="col-sm-12">
                        <div style="text-align: center;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="descripcion" style="display: none;">
                                            <th>Información Especifica De La Solicitud De Cambio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="descripcion" style="display: none;">
                                            <td><label id="descripcion"></label></td>
                                        </tr>
                                        <tr>
                                        <tr class="descripcion" style="display: none;">
                                            <td style="text-align: center;"><textarea rows="4" cols="7"
                                                    name="descripcion" class="form-control"
                                                    placeholder="Descripción"></textarea></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                        <th>Fotografía de referencia</th>
                                        </tr>
                                        <tr>                                                      
                                        <td><input type="file" name="evidencias" class="form-control" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>-->

                <br>
                <hr>

                <div id="item-producto1" class="itemproducto">
            <div class="form-row">
              <div class="col">
                <label>Servicio*</label>
                <select name="producto[]" id="product" class="selectpicker producto" data-live-search="true">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                </select>
              </div>
              <div class="col">
                <label for="cantidad">Cantidad*</label>
                <input type="number" name="cantidad[]" id="cantidad" class="form-control" step="0.001" min="0.001">
              </div>
              <div class="col">
                <label for="unidad">Unidad</label>
                <input type="text" disabled="true" class="form-control unidad">
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
            <i class="fa fa-close delete-product" style="display:none"></i>
            <hr>
          </div>
          </div>
                
                <hr>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <a href="<?php echo base_url().'soporte' ?>" class="btn-warning btn"
                            id="btn-cancelar">Cancelar</a>
                            <button type="button" class="btn-info btn" id="nuevoProducto">Añadir Otro Servicio</button>
                        <?= form_hidden('token',$token) ?>
                        <button type="submit" class="btn-primary btn" id="btn-enviar-solicitud">Crear
                            Generador</button>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).on('change', '#product', function (event) {
        event.preventDefault();

        var $div = $('div[id^="item-producto"]:last');
        var num = parseInt($div.prop("id").match(/\d+/g), 10);
        var _this = $(this).closest('#item-producto' + num);    
        
        $(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));
    
    });    

    $(document).on('change', '#servicio', function(event) {
        event.preventDefault();
        var _this=$(this);
        $('#product').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
        $.ajax({
            url: base_url+'almacen/catalogo_servicios',
            type: 'POST',
            dataType: 'json',
            data: {servicio: _this.val()},
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
                $('#product').append($('<option>', {
                value: item.idtbl_catalogo_mantenimientos,
                text : item.numero_parte+'('+item.descripcion+')'
                }));
            });
            $('#product').selectpicker('refresh');
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

$(document).on('change', '#clave_oracle', function (event) {
    event.preventDefault();  
    var reporte = <?= $ultimo[0]->idtbl_mantenimientos ?> + 1;
    var cantidad = reporte.toString().length;
    if(cantidad == 1){
        ceros = '0000';
    }else if(cantidad == 2){
        ceros = '000';
    }else if(cantidad == 3){
        ceros = '00';
    }else if(cantidad == 4){
        ceros = '0';
    }else{
        ceros = '';
    }
    $('#region').val($("option:selected", this).data("region"));
    $('#tramo').val($("option:selected", this).data("nombre"));
    $('#tipo_localidad').val($("option:selected", this).data("tipo"));
    $('#localidad').val($("option:selected", this).data("localidad"));
    $('#ciudad_mercado').val($("option:selected", this).data("mercado"));
    if($("option:selected", this).data("codigo") == 1){
        $('#reporte_proveedor').val("MANPAC"+ceros+reporte);      
    }else if($("option:selected", this).data("codigo") == 2){
        $('#reporte_proveedor').val("MANTOL"+ceros+reporte);
    }else if($("option:selected", this).data("codigo") == 3){
        $('#reporte_proveedor').val("MANIPBH"+ceros+reporte);
    }else{
        $('#reporte_proveedor').val("MAN"+ceros+reporte);
    }
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
$(document).on('change', '#tipo', function(event) {    
    event.preventDefault();
    var tipo = $("#tipo").val();
    if (tipo == 'Nuevo Proceso') {
        $(".descripcion").hide(100);
        $("#descripcion").text('Descripción Nuevo Proceso');
        $(".descripcion").show(1000);
    } else if (tipo == 'Modificacion Proceso') {
        $(".descripcion").hide(100);
        $("#descripcion").text('Descripción De La Modificación');
        $(".descripcion").show(1000);
    } else if (tipo == 'Error') {
        $(".descripcion").hide(100);
        $("#descripcion").text('Descripción Del Error');
        $(".descripcion").show(1000);
    } else {
        $("#descripcion").text('');
        $(".descripcion").hide(1000);
    }
});
$(document).ready(function() {
    $("#form-checklist").on("submit", function(event) {    
    //alert('si');
    //var $form = $(this);

    //var f = $(this);    
    if (event.isDefaultPrevented()) {
        console.log('Error');
        //alert('entro');
    } else {
        //alert('se hará bien');
        event.preventDefault();
        var formData = new FormData(document.getElementById("form-checklist"));
        $.ajax({
            url: "<?= base_url()?>almacen/guardarMantenimiento",
            type: "post",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            complete: function(res) {
                var resp = JSON.parse(res.responseText);
                console.log(resp);
                if (resp.status) {
                    Toast.fire({
                        type: 'success',
                        title: resp.message
                    })
                    location.href = "<?= base_url() ?>almacen/solicitud/"+resp.id_mantenimiento;
                } else {
                    Toast.fire({
                        type: 'error',
                        title: resp.message
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

function getForm(){
    $('#mantenimiento_att :input').attr('disabled', true);
    var servicio = $("#servicio").val();
    var cliente = $("#cliente").val();

    if (servicio != null && cliente != null) {
        if(servicio == 'mantenimiento' && cliente == 4){
            $('#mantenimiento_att :input').attr('disabled', false);
            $('#mantenimiento_att').show(500);
            $('#construccion_att :input').attr('disabled', true);
            $('#construccion_att').hide(500);
        }else if(servicio == 'construccion' && cliente == 4){
            $('#construccion_att :input').attr('disabled', false);
            $('#construccion_att').show(500);
            $('#mantenimiento_att :input').attr('disabled', true);
            $('#mantenimiento_att').hide(500);
        }else{
            $('#mantenimiento_att :input').attr('disabled', true);
            $('#mantenimiento_att').hide(500);
            $('#construccion_att :input').attr('disabled', true);
            $('#construccion_att').hide(500);
        }
    }
}
</script>
