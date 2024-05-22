<section class="forms">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Nueva Entrada - Almacen (<?= $detalle_almacen->almacen ?>)</h3>
            </div>
            <div class="card-body">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <?php echo validation_errors('<p class="text-danger">*Adjunte sus archivos nuevamente.</p><p class="text-danger">', '</p>'); ?>
                <?php echo form_open_multipart(base_url().'almacen/guardar-nueva-entrada', 'class="needs-validation" id="formuploadajax" onsubmit="return checkSubmit();" novalidate'); ?>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th colspan="3">Detalles de entrada</th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label for="">Ingrese número de pedido*</label>
                                <input type="text" class="form-control" id="uid" required>
                                <button type="button" class="btn btn-primary mb-2" id="buscar">Buscar</button>
                                <button class="btn btn-primary" type="button" disabled style="display:none"
                                    id="loading">
                                    <span class="spinner-grow spinner-grow-sm" role="status"
                                        aria-hidden="true"></span>
                                    Cargando...
                                </button>
                            </td>
                        </tr>
                        <tr id="personal_recibe" class="resultado" style="display:none">
                            <td colspan="3">
                                <div class="form-group">
                                    <label for="existencias">Personal que recibe*</label>
                                    <select name="usuario_entrega" id="personal_entrega" class="form-control" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <?php foreach ($autorizados as $key => $value): ?>
                                            <option value="<?php echo $value->idctl_autorizados_entrega ?>" data-nombre="<?php echo $value->nombre?>"><?php echo $value->nombre?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccione al personal
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="resultado" style="display:none">
                            <td colspan="3">
                                <table style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td width="50%">
                                                <p><strong>Proyecto:</strong> <span id="proyecto"></span></p>
                                                <p><strong>Pedido UID: </strong> <span id="pedido_uid"></span></p>
                                                <p><strong>Autor: </strong> <span id="autor"></span></p>
                                                <!--<p><strong>Fecha: </strong> <span id="fecha"></span></p>
                                                <p><strong>Requisición: </strong> <span id="requisicion"></span></p>
                                                <p><strong>Lugar de entrega: </strong> <span id="lugar_de_entrega"></span></p>
                                                <p><strong>Tipo de moneda: </strong> <span id="tipo_de_moneda"></span></p>-->
                                            </td>
                                            <td width="50%">
                                                <p><strong>Fecha: </strong> <span id="fecha"></span></p>
                                                <p><strong>Requisición: </strong> <span id="requisicion"></span></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr class="resultado" style="display:none">
                            <td colspan="3">
                                <table style="width:100%" id="table">
                                    <thead>
                                        <!--<tr>
                                            <td>Códigos</td>
                                            <td>Descripción</td>
                                            <td>Unidad</td>
                                            <td>Cantidad inicial</td>
                                            <td>Cantidad ingresada</td>
                                            <td>Cantidad a ingresar*</td>
                                            <td>Precio Unitario*</td>
                                            <td>Importe</td>
                                        </tr>-->
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <div class="clearfix pt-md">
                    <div class="pull-right">
                        <!--<a href="<?php echo base_url().'almacen/detalle/'.$this->uri->segment(3) ?>"
                            class="btn-warning btn">Cancelar</a>-->
                        <a href="<?php echo base_url().'almacen'?>" class="btn-warning btn">Cancelar</a>    
                        <?= form_hidden('token',$token) ?>
                        <?= form_hidden('uid_almacen', $detalle_almacen->uid ) ?>
                        <?= form_hidden('nombre_almacen', $detalle_almacen->almacen ) ?>
                        <?= form_hidden('id_almacen', $detalle_almacen->idtbl_almacenes ) ?>


                        <input type="hidden" name="idtbl_pedidos" id="idtbl_pedidos">
                        <input type="hidden" name="tipo_moneda" id="tipo_de_moneda2">
                        <input type="hidden" name="tbl_proyectos_idtbl_proyectos" id="tbl_proyectos_idtbl_proyectos">
                        <button type="submit" class="btn-primary btn btnGuardarEntrada">Guardar Entrada</button>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).on('change', '.cantidades', function(){
        var _this = $(this).closest('.tr');
        console.log(Number(_this.find('.cantidad').val()) * Number(_this.find('.precio').val()))
        _this.find('.importes span').html( (Number(_this.find('.cantidad').val()) * Number(_this.find('.precio').val())).toLocaleString() ); 
    });
    $(document).ready(function() {
        $("#formuploadajax").on("submit", function(event) {
            var formData = new FormData(event.target);
            if (event.isDefaultPrevented()) {
                console.log('Error')
            } else {
                event.preventDefault();
                $.ajax({
                    url: "<?= base_url()?>almacen/guardar-nueva-entrada",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        console.log(resp)
                        if (resp.error == false) {
                            //window.location.replace("<?= base_url()?>almacen/detalle/<?= $detalle_almacen->uid ?>");
                            window.location.replace("<?= base_url()?>almacen");
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
    $('#buscar').on('click', function() {
        var id_proyecto = "<?= $detalle_almacen->idtbl_almacenes ?>";
        $('#table > tbody').html('');
        if ($('#uid').val() == '')
            return false
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>pedidos/datospedido',
            data: {
                uid: $('#uid').val(),
                token: '<?=$token?>'
            },
            beforeSend: function() {
                $('#buscar').hide();
                $('#loading').show();
                $('.resultado').hide();
            },
            success: function(data) {
                if (data.error == false) {
                    if(data.datos.pedido.tbl_almacenes_idtbl_almacenes!=id_proyecto){
                        return Swal.fire({
                          type: 'error',
                          title: 'Oops...',
                          text: 'El pedido que ingreso no corresponde a este almacen'
                        })
                    }
                    if(data.msg == "yes") {
                        Swal.fire({
                          type: 'info',
                          title: 'Pedido surtido',
                          text: 'El pedido ha sido surtido en su totalidad'
                        });
                        $(".btnGuardarEntrada").remove();
                        $("#personal_recibe").remove();  
                    }
                    $('.resultado').show('slow');
                    $('#tbl_proyectos_idtbl_proyectos').val(data.datos.pedido.tbl_proyectos_idtbl_proyectos);
                    $('#proyecto').html(data.datos.pedido.nombre_proyecto);
                    $('#pedido_uid').html(data.datos.pedido.uid);
                    $('#autor').html(data.datos.pedido.nombre);
                    $('#fecha').html(data.datos.pedido.fecha_creacion);
                    $('#requisicion').html(data.datos.pedido.uid_requisicion);
                    $('#lugar_de_entrega').html(data.datos.pedido.lugar_entrega);
                    $('#tipo_de_moneda2').val(data.datos.pedido.tipo_moneda);
                    $('#idtbl_pedidos').val(data.datos.pedido.idtbl_pedidos);
                    if(data.datos.pedido.tipo_moneda=='p')
                        data.datos.pedido.tipo_moneda='PESOS';
                    else
                        data.datos.pedido.tipo_moneda='DOLARES';
                    $('#tipo_de_moneda').html(data.datos.pedido.tipo_moneda);
                    $('#proveedor').html(data.datos.pedido.nombre_fiscal);
                    $('#rfc').html(data.datos.pedido.rfc);
                    $('#contacto').html(data.datos.pedido.persona_contacto);
                    $('#telefono').html(data.datos.pedido.telefonos);
                    $('#direccion').html(data.datos.pedido.direccion);
                    var bandera = true;
                    data.datos.detalle.forEach(function(elemento) {
                        console.log(elemento)
                        if (elemento.cantidad != elemento.comprado) {
                            bandera = false;
                            tabla = '';
                            //*************************
                            if(elemento.cantidad != elemento.entregado) {
                                tabla += '<tr class="tr">';
                                tabla += '<td><center><label><strong>Código</strong></label></center><center>' + elemento.uid + '</center></td>';
                                tabla += '<td><center><label><strong>Descripción</strong></label></center><center>' + elemento.descripcion + '</center></td>';
                                tabla += '<td><center><label><strong>Unidad</strong></label></center><center>' + elemento.unidad_medida_abr + '</center></td>';
                                tabla += '<td><center><label><strong>Cantidad Inicial</strong></label></center><center>' + elemento.cantidad + '</center></td>';
                                tabla += '<td><center><label><strong>Cantidad Ingresada</strong></label></center><center>' + elemento.entregado + '</center></td>';
                                tabla += '<td><center><label><strong>Cantidad a Ingresar</strong></label></center>';
                                tabla += '<input type="number" class="form-control cantidades cantidad" name="cantidad[]" value="0" required  step="0.01" max="' + (elemento.cantidad - elemento.entregado) + '">';
                                tabla += '<input type="hidden" class="form-control" name="id-producto-catalogo[]" value="' + elemento.tbl_catalogo_idtbl_catalogo +'" required min="0">';
                                tabla += '<input type="hidden" class="form-control" name="id_registro[]" value="'+elemento.iddtl_pedido_catalogo+'" required min="0">';
                                tabla += '</td>';
                                tabla += '<td><center><label><strong>Precio Unitario</strong></label></center><input type="number" class="form-control cantidades precio" readonly name="precio[]" min="0" value="' + elemento.precio +'"></span></td>';
                                tabla += '<td class="importes"><center><label><strong>Importe</strong></label></center><center>$<span>0.00</span></center></td>';
                                tabla += '</tr>';
                                tabla += '<tr class="resultado">';
                                tabla += '<td id="td_tipo_documento" colspan="3">';
                                tabla += '<center><label><strong>Tipo de Documento*</strong></label></center>';
                                tabla += '<select name="tipo_documento" id="tipo_documento" class="form-control" data-live-search="true">';
                                tabla += '<option value="" selected="selected" disabled="disabled">Seleccione...</option>';                          
                                tabla += '<option value="1">Factura</option>';
                                tabla += '<option value="2">Nota de Remisión</option>';
                                tabla += '<option value="3">Responsiva</option>';
                                tabla += '<option value="4">Pedido</option>';
                                tabla += '<option value="5">Otro</option>';
                                tabla += '</select>';
                                tabla += '</td>';
                                tabla += '<td id="td_numero_documento" colspan="3">';
                                tabla += '<center><label><strong>Número de Documento*</strong></label></center>';
                                tabla += '<input type="text" name="numero_documento[]" class="mayusculas form-control" required';
                                tabla += 'value="<?= set_value('numero_documento')  ?>">';
                                tabla += '</td>';
                                tabla += '<td id="documento_adjunto" colspan="2">';
                                tabla += '<center><label><strong>Documento adjunto</strong></label></center>';
                                tabla += '<div class="custom-file">';
                                tabla += '<input type="file" class="custom-file-input" id="customFile" name="documento[]" multiple';
                                tabla += '>';
                                tabla += '<label class="custom-file-label" for="customFile">Archivo</label>';
                                tabla += '</div>';
                                tabla += '</td>';
                                tabla += '</tr>';
                                tabla += '<tr class="tr">';
                                tabla += '<td colspan="3"><center><strong>'+'Proveedor'+'</strong></center></td>';
                                tabla += '<td colspan="3"><center><strong>'+'Lugar de Entrega'+'</strong></center></td>';
                                tabla += '<td colspan="2"><center><strong>'+'Fecha de Entrega'+'</strong></center></td>';
                                tabla += '</tr>';
                                tabla += '<tr class="tr">';
                                tabla += '<td colspan="3"><center>'+elemento.nombre_fiscal+'</center></td>';
                                tabla += '<td colspan="3"><center>'+elemento.lugar_entrega+'</center></td>';
                                tabla += '<td colspan="2"><center>'+elemento.fecha_entrega+'</center></td>';
                                tabla += '</tr>';                                    
                                tabla += '<tr>';
                                tabla += '<td style="background-color:gray;" colspan="8"></td>';
                                tabla += '</tr>';
                            }
                            if(elemento.cantidad == elemento.entregado) {
                                tabla += '<tr class="tr">';
                                tabla += '<td><center><label><strong>Código</strong></label></center><center>' + elemento.uid + '</center></td>';
                                tabla += '<td><center><label><strong>Descripción</strong></label></center><center>' + elemento.descripcion + '</center></td>';
                                tabla += '<td><center><label><strong>Unidad</strong></label></center><center>' + elemento.unidad_medida_abr + '</center></td>';
                                tabla += '<td colspan="3"><center><label><strong>Cantidad Inicial</strong></label></center><center>' + elemento.cantidad + '</center></td>';
                                tabla += '<td colspan="3"><center><label><strong>Cantidad Ingresada</strong></label></center><center>' + elemento.entregado + '</center></td>';
                                tabla += '<tr class="tr">';
                                tabla += '<td colspan="3"><center><strong>'+'Proveedor'+'</strong></center></td>';
                                tabla += '<td colspan="3"><center><strong>'+'Lugar de Entrega'+'</strong></center></td>';
                                tabla += '<td colspan="2"><center><strong>'+'Fecha de Entrega'+'</strong></center></td>';
                                tabla += '</tr>';
                                tabla += '<tr class="tr">';
                                tabla += '<td colspan="3"><center>'+elemento.nombre_fiscal+'</center></td>';
                                tabla += '<td colspan="3"><center>'+elemento.lugar_entrega+'</center></td>';
                                tabla += '<td colspan="2"><center>'+elemento.fecha_entrega+'</center></td>';
                                tabla += '</tr>';                                    
                                tabla += '<tr>';
                                tabla += '<td style="background-color:gray;" colspan="8"></td>';
                                tabla += '</tr>';
                            }
                            //*************************
                            $('#table > tbody:last-child').append(tabla);
                        }
                    });
                    if (bandera) {
                        $('#btn-generar-pedido').hide();
                        $('#table > tbody:last-child').append(
                            '<tr><td colspan="9" align="center">Solicitud Completada</td></tr>'
                        )
                    }
                    } else {
                        Swal.fire({
                          type: 'error',
                          title: 'Oops...',
                          text: data.mensaje
                        });
                    }
                },
                error: function(xhr) { // if error occured
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Algo salio mal.'
                    });
                },
                complete: function() {
                },
                dataType: 'json'
            }).always(function() {
                $('#buscar').show();
                $('#loading').hide();
            });
        })
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