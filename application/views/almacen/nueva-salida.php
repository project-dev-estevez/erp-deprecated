<section class="forms nueva-asignacion">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Nueva Salida de Almacen</h3>
            </div>
            <div class="card-body">
                <?= validation_errors('<span class="error">', '</span>'); ?>
                <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-asignacion"'); ?>
                <div class="row" id="">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="existencias">Personal que recibe*</label>
                            <select name="usuario_recibe" id="" class="selectpicker personal" data-live-search="true" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <?php if (isset($personal)): ?>
                                    <?php foreach ($personal as $key => $value): ?>
                                        <option value="<?php echo $value->idtbl_usuarios ?>" data-uid="<?php echo $value->uid ?>" data-nombre="<?php echo $value->nombres.' '.$value->apellido_paterno.' '.$value->apellido_materno ?>"><?php echo $value->nombres.' '.$value->apellido_paterno.' '.$value->apellido_materno ?> (Número Empleado <?php echo $value->numero_empleado ?>) </option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione al personal
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="existencias">Proyecto*</label>
                            <select name="idtbl_proyectos" id="" class="selectpicker proyecto" data-live-search="true" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <?php foreach ($proyectos as $key => $value): ?>
                                    <option value="<?php echo $value->idtbl_proyectos ?>"><?php echo $value->nombre_proyecto ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione el proyecto
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="existencias">Personal que entrega*</label>
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
                    </div>
                </div>
                <br>
                <div class="row productoFieldset" id="productoFieldset1">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="existencias">Producto*</label>
                            <select name="producto[]" id="" class="selectpicker producto" data-live-search="true"
                                required>
                                <option value="" disabled selected>Seleccione...</option>
                                <?php if (isset($inventario_almacen)): ?>
                                <?php foreach ($inventario_almacen as $key => $value): ?>
                                <option data-marca="<?php echo $value->marca ?>"
                                    data-modelo="<?php echo $value->modelo ?>"
                                    data-descripcion="<?php echo $value->descripcion ?>"
                                    data-existencias="<?php echo $value->existencias ?>"
                                    data-uid="<?php echo $value->uid ?>"
                                    data-unidad="<?php echo $value->unidad_medida_abr ?>"
                                    data-precio="<?php echo ($value->tipo_moneda=='d') ? $value->precio*$precio_dolar : $value->precio ?>"
                                    value="<?php echo $value->iddtl_almacen ?>">
                                    <?php echo $value->descripcion ?> <?php echo $value->modelo ?>
                                    <?php echo ($value->marca) ? "($value->marca)" : null ?>
                                </option>
                                <?php endforeach ?>
                                <?php endif ?>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione un producto
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Existencias</label>
                            <input type="number" class="form-control existencias" disabled readonly value="0" min="1"
                                name="existencias">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="cantidad">Cantidad*</label>
                            <input type="number" class="form-control cantidad" placeholder="" min="0" name="cantidad[]"
                                required>
                            <div class="invalid-feedback">
                                La cantidad no puede ser mayor a las existencias, ni vacia.
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nota</label>
                            <input type="text" class="form-control nota" name="notas[]">
                        </div>
                    </div>
                    <i class="fa fa-close delete-product" style="display:none"></i>
                </div>
                <div class="row">
                    <div class="col text-center">
                    <span class="fa fa-plus" id="nuevoProducto" style="background: green;height: 40px;width: 40px;text-align: center;color: #fff;border-radius: 25px;font-size: 25px;line-height: 1.7;cursor: pointer;"></span></div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="documentoInput">Documento Solicitud de Almacén*</label>
                            <input type="file" class="filestyle pull-left" name='solicitud' required accept=".pdf">
                            <div class="invalid-feedback">
                                Seleccione un documento
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="documentoInput">Responsiva*</label>
                            <input type="file" class="filestyle pull-left" name='responsiva' required accept=".pdf">
                            <div class="invalid-feedback">
                                Seleccione un documento
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
                <div class="text-right">
                    <input type="hidden" name="uid_usuario" id="uid-usuario" value="">
                    <input type="hidden" name="bandera" id="bandera" value="false">
                    <input type="hidden" name="uid_salida" value="<?= $folio ?>">
                    <input type="hidden" name="token" value="<?= $token ?>">
                    <input type="hidden" name="id_almacen" value="<?= $almacen->idtbl_almacenes ?>">
                    <!--<input type="hidden" name="idtbl_proyectos" value="<?= $almacen->idtbl_proyectos ?>">-->
                    <a href="<?php echo base_url().'almacen/detalle/'.$this->uri->segment(3) ?>"
                                class="btn-warning btn">Cancelar</a>
                    <button type="button" class="btn-primary btn" id="generar-documentos">Generar documentos</button>
                    <input type="submit" class="btn-info btn" value="Asignar">
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?= base_url()?>js/bootstrap-filestyle.js"></script>
<script>
$('.filestyle').filestyle({
    text: '&nbsp;Documento',
    btnClass: 'btn-outline-info',
});
</script>


<script>
    
$(document).on('change', '.personal', function(event) {

    $('.nombre_empleado_recibe').html($("option:selected", this).data('nombre'))
    $('#uid-usuario').val($("option:selected", this).data('uid'))
    
});

$(document).on('change', '#personal_entrega', function(event) {

    $('.nombre_empleado_entrega').html($("option:selected", this).data('nombre'))
    
});
$(document).on('change', '.producto', function(event) {
    $('#' + $("option:selected", this).data('uid')).remove();
    var _this = $(this).closest('.productoFieldset');
    _this.find('.existencias').val($("option:selected", this).data('existencias'))
    _this.find('.cantidad').attr('max', $("option:selected", this).data('existencias'))

    $('#tr' + _this.attr('id')).find('.producto').html($("option:selected", this).data('descripcion') + ' ' + $(
        "option:selected", this).data('modelo') + ' (' + $("option:selected", this).data('marca') + ')');

    $('#tr' + _this.attr('id')).find('.codigo-uid').html($("option:selected", this).data('uid') );
    $('#tr' + _this.attr('id')).find('.unidad-medida').html($("option:selected", this).data('unidad') );


});

$(document).on('change', '.cantidad', function(event) {

    var _this = $(this).closest('.productoFieldset');
    $('#tr' + _this.attr('id')).find('.cantidad').html($(this).val());
});

$(document).on('change', '.nota', function(event) {

    var _this = $(this).closest('.productoFieldset');
    $('#tr' + _this.attr('id')).find('.notas').html($(this).val());
});


$(document).ready(function() {

    $('#generar-documentos').click(function(event) {

        if ($('#table_material tr').length > 1) {



            Swal.fire({
                title: '¿Desea generar documentos con la información actual?',
                html: $('#table_material'),
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.value) {
                    $('#bandera').val('true');



                    $("#salida_material").print({
                        iframe: true,
                        globalStyles: true,
                        mediaPrint: true,
                        noPrintSelector: '.no-print'

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

    $("#form-asignacion").on("submit", function(event) {
        var $form = $(this);
        if ($('#bandera').val() == 'true') {
            var f = $(this);

            if (event.isDefaultPrevented()) {
                console.log('Error')
            } else {
                event.preventDefault();


                var formData = new FormData(document.getElementById("form-asignacion"));
                $.ajax({
                    url: "<?= base_url()?>almacen/guardar-salida",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        console.log(resp);
                        if (resp.status) {
                            location.href = "<?= base_url()?>almacen/detalle/<?= $almacen->uid?>";
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
            event.preventDefault();
            Toast.fire({
                type: 'error',
                title: 'Debe generar los documentos para ser adjuntados.'
            })
        }

    });

});


$('#nuevoProducto').click(function(event) {
    /* Act on the event */
    var $div = $('[id^="productoFieldset"]:last');
    var $tr = $('[id^="trproductoFieldset"]:last');

    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'productoFieldset' + num);
    var $klonTr = $tr.clone().prop('id', 'trproductoFieldset' + num);

    $klon.css('display', 'none');

    $div.after($klon);
    $tr.after($klonTr);

    $klon.show(500);

    $klon.find('.bootstrap-select').replaceWith(function() {
        return $('select', this);
    });

    $('#productoFieldset' + num + ' .selectpicker').selectpicker();

    $klon.find('.delete-product').css('display', 'block');

    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        $('.select').selectpicker('mobile');
    }*/
    $klon.find('input').val('');
    $klonTr.find('td').html('');
});
$(document).on('click', '.delete-product', function() {
    $(this).parents('[id^="productoFieldset"]').remove();
    $('#tr' + $(this).parents('[id^="productoFieldset"]').attr('id')).remove();
});
</script>
<style type="text/css" media="print">
@media print {
    #salida_material {
        padding-top: 0;
    }

    body {
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
    }
}
</style>
<div class="container-fluid">
    <div class="card" id="salida_material">
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center" width="25%"><img
                            src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png"
                            style="display: inline-block; width: 150px;"></th>
                    <th colspan="2" width="50%" style="vertical-align: middle; text-align: center">
                        <h3>ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.</h3>
                    </th>
                    <th style="vertical-align: middle; text-align: center" width="25%">
                        <h3>Folio: <?php echo $folio ?></h3>
                    </th>
                </tr>
                <tr>
                    <td colspan="4" class="encabezado-table">
                        <table width="100%" class="table table-bordered encabezado-table">
                            <tbody>
                                <tr>
                    <td width="25%">Fecha</td>
                    <td colspan="3"><?= strftime('%d de %B del %Y') ?></td>
                </tr>
                <tr>
                    <td>Proyecto</td>
                    <td colspan="3"><?= $almacen->numero_proyecto ?> <?= $almacen->nombre_proyecto ?></td>
                </tr>
                <tr>
                    <td>Ubicación</td>
                    <td colspan="3"><?= $almacen->direccion ?></td>
                </tr>
                <tr>
                    <td>Responsable de proyecto</td>
                    <td colspan="3"><?php echo $almacen->responsable ?></td>
                </tr>
                <tr>
                    <td>Coordinador de proyecto</td>
                    <td colspan="3"><?php echo $almacen->coordinador ?></td>
                </tr>
                <tr>
                    <td>Recibe</td>
                    <td colspan="3" class="nombre_empleado_recibe"></td>
                </tr>
                <tr>
                    <td>Entrega</td>
                    <td colspan="3" class="nombre_empleado_entrega"></td>
                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>   
               
            </thead>
            <tbody>
                <tr>
                    <td colspan="4">
                        <table width="100%" id="table_material" class="table table-bordered">
                            <thead>
                                <tr>
                                    <td><strong>Código</strong></td>
                                    <td><strong>Herramienta</strong></td>
                                    <td><strong>Unidad</strong></td>
                                    <td><strong>Cantidad</strong></td>
                                    <td><strong>Nota</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="trproductoFieldset1">
                                    <td class="codigo-uid"></td>
                                    <td class="producto"></td>
                                    <td class="unidad-medida"></td>
                                    <td class="cantidad"></td>
                                    <td class="notas"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
               
                <tr>
                    <td height="70" width="100%" colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2" width="50%" align="center" class="nombre_empleado_entrega"></td>
                    <td colspan="2" width="50%" align="center" class="nombre_empleado_recibe"></td>
                </tr>
                <tr>
                    <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
                    <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>