<div><?= $traspaso->tipo_movimiento ?></div>
<section class="forms nueva-asignacion">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Nuevo Traspaso / <?php echo $almacen_destino->almacen ?> / <span
                        class="text-danger">Folio <?php echo $folio['folio'] ?></span></h3>
            </div>
            <div class="card-body">
                <?= validation_errors('<span class="error">', '</span>'); ?>
                <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-asignacion"'); ?>
                <div class="row">
                    <div class="col-12 col-md-2">
                        <label>Almacen Origen</label>
                        <input type="text" class="form-control" disabled value="<?= ($almacen_origen->almacen) ?>">
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label>Almacen Destino</label>
                            <!--<select name="almacen_destino" id="" class="form-control" data-live-search="true" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <?php foreach ($almacenes as $key => $value) { ?>
                                    <?php if ($value->almacen == $almacen->almacen) { ?>
                                        <option value="<?= $value->idtbl_almacenes ?>" disabled><?= $value->almacen ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $value->idtbl_almacenes ?>"><?= $value->almacen ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>-->
                            <input type="text" name="almacen_destino_nombre" class="form-control"
                                value="<?= $almacen_destino->almacen ?>" readonly>
                            <input type="text" name="almacen_destino" class="form-control"
                                value="<?= $almacen_destino->idtbl_almacenes ?>" hidden>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <i class="fa  fa-arrow-right"></i>
                            <label>Proyecto</label>
                            <select name="idtbl_proyectos_destino" id="destino" class="form-control proyecto">
                                <option value="" disabled selected>Seleccione...</option>
                                <?php foreach ($proyectos as $key => $value) : ?>
                                <option id="<?= substr($value->numero_proyecto.' - '.$value->nombre_proyecto, 0, 60) ?>"
                                    value="<?php echo $value->idtbl_proyectos ?>">
                                    <?= substr($value->numero_proyecto.' - '.$value->nombre_proyecto, 0, 60) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div><br>
                <div class="row productoFieldset" id="productoFieldset1">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <!--<label for="existencias">Producto*</label>
                            <select name="producto[]" id="" class="selectpicker producto" data-live-search="true"
                                required>
                                <option value="" disabled selected>Seleccione...</option>
                                <?php if (isset($inventario_almacen)) : ?>
                                <?php foreach ($inventario_almacen as $key => $value) : ?>
                                <option data-marca="<?php echo $value->marca ?>"
                                    data-neodata="<?php echo $value->neodata ?>"
                                    data-categoria="<?php echo $value->abreviatura ?>"
                                    data-modelo="<?php echo $value->modelo ?>"
                                    data-serie="<?php echo $value->numero_serie ?>"
                                    data-descripcion="<?php echo $value->descripcion ?>"
                                    data-existencias="<?php echo $value->existencias ?>"
                                    data-idcatalogo="<?php echo $value->tbl_catalogo_idtbl_catalogo ?>"
                                    data-interno="<?php echo $value->numero_interno ?>"
                                    value="<?php echo $value->iddtl_almacen ?>">
                                    <?php echo $value->neodata . ' ' . $value->marca . ' ' . $value->modelo . ' ' . $value->numero_serie . ' ' . $value->numero_interno . ' (' . substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT), 0, 70) . ')' ?>
                                </option>

                                <?php endforeach ?>
                                <?php endif ?>
                            </select>-->
                            <label>Producto*</label>
                            <input class="form-control neodata" autocomplete="off" type="text" required>
                            <input class="form-control producto" autocomplete="off" type="hidden" name="producto[]" required>
                            <div class="list-group sugerencias"></div>
                            <input type="hidden" name="producto-catalogo[]" value="" class="producto-catalogo">
                            <input type="hidden" name="producto-interno[]" value="" class="producto-interno">
                            <input type="hidden" name="categoria[]" value="" class="producto-categoria">
                            <input type="hidden" name="producto-serie[]" value="" class="producto-serie">
                            
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
                    <i class="fa fa-close delete-product" style="display:none"></i>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <span class="fa fa-plus" id="nuevoProducto"
                            style="background: green;height: 40px;width: 40px;text-align: center;color: #fff;border-radius: 25px;font-size: 25px;line-height: 1.7;cursor: pointer;"></span>
                    </div>
                </div>

                <br><br>

                <div class="row">

                    <!--<div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="documentoInput">Responsiva*</label>
                            <input type="file" class="filestyle pull-left" name='responsiva' required accept=".pdf">
                        </div>
                    </div>-->

                    <div class="col-12">
                        <div class="form-group">
                            <label for="documentoInput">Observaciones</label>
                            <textarea class="form-control" rows="5" name="observaciones" id="observacion"></textarea>
                        </div>
                    </div>


                    <br><br>
                </div>

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-sm" width="100%">
                            <tr>
                                <td>
                                    <center>
                                    <canvas id="draw-canvas6" width="240" style="border-style: solid;">
                                                No tienes un buen navegador.
                                    </canvas>
                                    <br>
                                    <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-warning btn-sm" id="draw-submitBtn6"><i style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                                    <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-danger btn-sm" id="draw-clearBtn6"><i style="font-size: 8px;" class="fa fa-trash"></i> Borrar Firma</button>
                                    <div style="display: none">
                                        <label>Color</label>
                                        <input type="color" id="color6">
                                        <label>Tamaño Puntero</label>
                                        <input type="range" id="puntero6" min="1" default="1" max="5" width="10%">
                                    </div>
                                    <textarea style="display: none;" id="draw-dataUrl6" name="imagen6" class="form-control" rows="5"></textarea>
                                    <img style="display: none" id="draw-image6" src="" alt="Tu Imagen aparecera Aqui!" />
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align: center;">FIRMA<br><?= $this->session->userdata('nombre') ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
                                    

                <div class="text-right">
                    <input type="hidden" name="id_movimiento" value="<?= $folio['id_movimiento'] ?>">
                    <input type="hidden" name="token" value="<?= $token ?>">
                    <input type="hidden" name="id_almacen" value="<?= $almacen_origen->idtbl_almacenes ?>">
                    <input type="hidden" name="folio" value="<?= $folio ?>">
                    <!--<input type="hidden" name="idtbl_proyectos" value="<?= $almacen->idtbl_proyectos ?>">-->
                    <!--<button type="button" class="btn-secondary btn" id="guardar-productos">Guardar productos</button>-->
                    <!--<button type="button" class="btn-primary btn" id="generar-documentos">Generar documentos</button>-->
                    <button type="button" class="btn-danger btn" id="cancelar_traspaso">Cancelar Traspaso</button>
                    <a href="<?php echo base_url() . 'almacen/detalle_almc/' . $almacen_origen->idtbl_almacenes ?>"
                        class="btn-warning btn">Regresar</a>
                    <input type="submit" class="btn-info btn fomr_btn_action" value="Traspasar">
                </div>
                </form>
            </div>
        </div>
</section>
<!--<style type="text/css" media="print">
@media print {
    #salida_material {
        padding-top: 0;
    }

    body {
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
    }
}
</style>-->

<!--<div class="container-fluid">
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
                        <h3>Folio: <?php echo $folio['folio'] ?></h3>
                    </th>
                </tr>
                <tr>
                    <th colspan="4" style="text-align: center">
                        <h4>Traspaso de Material</h4>
                    </th>
                </tr>-->
                <!--<tr>
          <td colspan="4" style="text-align: center">Con esta fecha recibí a mi entera satisfacción de la Empresa ESTEVEZ.JOR SERVICIOS, S.A. DE C.V. las HERRAMIENTAS DE TRABAJO que a continuación se detallan:</td>
        </tr>-->
            <!--</thead>
            <tbody>
                <tr>
                    <td colspan="4">
                        <table width="100%" id="table_material" class="table table-bordered">
                            <thead>
                                <tr>
                                    <td><strong>Neodata</strong></td>
                                    <td><strong>Producto</strong></td>
                                    <td><strong>Marca</strong></td>
                                    <td><strong>Modelo</strong></td>
                                    <td><strong>Numero de Serie</strong></td>
                                    <td><strong>Numero Interno</strong></td>
                                    <td><strong>Cantidad</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="trproductoFieldset1">
                                    <td class="neodata"></td>
                                    <td class="producto"></td>
                                    <td class="marca"></td>
                                    <td class="modelo"></td>
                                    <td class="serie"></td>
                                    <td class="interno"></td>
                                    <td class="cantidad"></td>
                                </tr>
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
                    <td colspan="4" class="proyecto" id="proyectos">Proyecto: </td>
                </tr>

                <tr>
                    <td colspan="4" align="center">Tlalnepantla de Baz, Estado de México a
                        <?= strftime('%d de %B del %Y') ?></td>
                </tr>
                <tr>
                    <td height="70" width="100%" colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2" width="50%" align="center"><?= $this->session->userdata('nombre') ?></td>
                    <td colspan="2" width="50%" align="center"><?= $almacen->almacen ?></td>
                </tr>
                <tr>
                    <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
                    <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() ?>js/bootstrap-filestyle.js"></script>
<script>
$('.filestyle').filestyle({
    text: '&nbsp;Documento',
    btnClass: 'btn-outline-info',
});
</script>-->


<script>
/*$(document).on('change', '.producto', function(event) {
    $('#' + $("option:selected", this).data('uid')).remove();
    var _this = $(this).closest('.productoFieldset');
    _this.find('.existencias').val($("option:selected", this).data('existencias'))
    _this.find('.cantidad').attr('max', $("option:selected", this).data('existencias'))
    _this.find('.producto-catalogo').val($("option:selected", this).data('idcatalogo'))
    _this.find('.producto-interno').val($("option:selected", this).data('interno'))
    _this.find('.producto-serie').val($("option:selected", this).data('serie'))
    _this.find('.producto-categoria').val($("option:selected", this).data('categoria'))

});

$(document).on('change', '.producto', function(event) {
    $('#' + $("option:selected", this).data('uid')).remove();
    var _this = $(this).closest('.productoFieldset');
    _this.find('.existencias').val($("option:selected", this).data('existencias'))
    _this.find('.cantidad').attr('max', $("option:selected", this).data('existencias'))
    $('#tr' + _this.attr('id')).find('.producto').html($("option:selected", this).data('descripcion') );
});

$(document).on('change', '.producto', function(event) {
    $('#' + $("option:selected", this).data('uid')).remove();
    var _this = $(this).closest('.productoFieldset');
    _this.find('.existencias').val($("option:selected", this).data('existencias'))
    _this.find('.cantidad').attr('max', $("option:selected", this).data('existencias'))
    $('#tr' + _this.attr('id')).find('.neodata').html($("option:selected", this).data('neodata') );
});

$(document).on('change', '.producto', function(event) {
    $('#' + $("option:selected", this).data('uid')).remove();
    var _this = $(this).closest('.productoFieldset');
    _this.find('.existencias').val($("option:selected", this).data('existencias'))
    _this.find('.cantidad').attr('max', $("option:selected", this).data('existencias'))
    $('#tr' + _this.attr('id')).find('.marca').html($("option:selected", this).data('marca') );
});

$(document).on('change', '.producto', function(event) {
    $('#' + $("option:selected", this).data('uid')).remove();
    var _this = $(this).closest('.productoFieldset');
    _this.find('.existencias').val($("option:selected", this).data('existencias'))
    _this.find('.cantidad').attr('max', $("option:selected", this).data('existencias'))
    $('#tr' + _this.attr('id')).find('.modelo').html($("option:selected", this).data('modelo') );
});

$(document).on('change', '.producto', function(event) {
    $('#' + $("option:selected", this).data('uid')).remove();
    var _this = $(this).closest('.productoFieldset');
    _this.find('.existencias').val($("option:selected", this).data('existencias'))
    _this.find('.cantidad').attr('max', $("option:selected", this).data('existencias'))
    $('#tr' + _this.attr('id')).find('.serie').html($("option:selected", this).data('serie') );
});

$(document).on('change', '.producto', function(event) {
    $('#' + $("option:selected", this).data('uid')).remove();
    var _this = $(this).closest('.productoFieldset');
    _this.find('.existencias').val($("option:selected", this).data('existencias'))
    _this.find('.cantidad').attr('max', $("option:selected", this).data('existencias'))
    $('#tr' + _this.attr('id')).find('.interno').html($("option:selected", this).data('interno') );
});*/

$(document).on('change', '.cantidad', function(event) {
    var _this = $(this).closest('.productoFieldset');
    $('#tr' + _this.attr('id')).find('.cantidad').html($(this).val());
});



$(document).on('change', '#destino', function(event) {

    $('#idtbl_proyectos_destino').val($("option:selected", this).data('proyecto'));


});

$(document).ready(function() {
    $('#observacion').change(function(event) {
        $('#observaciones').html(this.value);
    });
    $('#destino').change(function(event) {
        $('#proyectos').html($("#destino option:selected").text());
    });
    $('#generar-documentos').click(function(event) {
        if ($('#table_material tr').length > 1) {
            Swal.fire({
                title: '¿Desea generar documentos con la información actual?',
                html: $('#table_material'),
                type: 'warning',
                width: 700,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).
            then((result) => {
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
    $('#cancelar_traspaso').click(function(event) {
            Swal.fire({
                title: '¿Desea cancelar el traspaso?',
                type: 'warning',            
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).
            then((result) => {
                var formData = new FormData(document.getElementById("form-asignacion"));
                $.ajax({
                    url: "<?= base_url() ?>almacen/cancelar-traspaso",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        console.log(res);
                        var resp = JSON.parse(res.responseText);
                        console.log(resp);                                            
                        if (resp.error == false) {
                            location.href = "<?= base_url() ?>almacen/traspasos/1 ?>";
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.message
                            })
                        }                    
                    }
                });
            });      
        });


        $('#guardar-productos').click(function(event) {
            Swal.fire({
                title: '¿Desea guardar los productos?',
                type: 'warning',            
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).
            then((result) => {
                if(result.value){
                    var productos = $("#formuploadajax input[name='producto[]']");
                    var formData = new FormData(document.getElementById("form-asignacion"));
                    $.ajax({
                        url: "<?= base_url() ?>almacen/cancelar-traspaso",
                        type: "post",
                        dataType: "json",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        complete: function(res) {
                            console.log(res);
                            var resp = JSON.parse(res.responseText);
                            console.log(resp);                                            
                            if (resp.error == false) {
                                location.href = "<?= base_url() ?>almacen/traspasos/1 ?>";
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
});

$(document).ready(function() {

    $("#form-asignacion").on("submit", function(event) {
        
        var $form = $(this);

        var f = $(this);

        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            bloqueo_botones(true);

            var formData = new FormData(document.getElementById("form-asignacion"));
            $.ajax({
                url: "<?= base_url() ?>almacen/guardar-traspaso",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log(res);
                    var resp = JSON.parse(res.responseText);
                    console.log(resp);
                    <?php if($this->session->userdata('tipo') == 1) { ?>
                        console.log("1");
                        if (resp.error == false) {
                            location.href = "<?= base_url() ?>almacen/traspasos/2";
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.message
                            });
                            bloqueo_botones(false);
                        }
                    <?php } else if($this->session->userdata('tipo') == 3) { ?>
                        console.log("2");
                        if (resp.error == false) {
                            location.href = "<?= base_url() ?>almacen/traspasos/29";
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.message
                            });
                            bloqueo_botones(false);
                        }
                    <?php } else { ?>
                        console.log("else");
                        if (resp.error == false) {
                            location.href = "<?= base_url() ?>almacen/detalle_almc/<?= $almacen_origen->uid ?>";
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.message
                            });
                            bloqueo_botones(false);
                        }
                    <?php } ?>
                }
            });
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

/* ********** Eventos Busqueda Productos ********** */
  $("body").on('keyup', ".neodata", function(event) {
    var element = $(this);
    var _this=$(this).closest('.productoFieldset');
    var neodata = element.val();
    //var dataString = "{'neodata':'" + neodata + "', 'tipo_movimiento': '<?= $datos['traspaso']->tipo_movimiento ?>', 'almacen_origen': '<?= $datos['almacen_origen'] ? $datos['almacen_origen']->idtbl_almacenes : false ?>'}";
    //console.log(dataString);
    var data = {
        'neodata': neodata,
        'tipo_movimiento': '<?= $traspaso->tipo_movimiento ?>',
        'almacen_origen': '<?= $almacen_origen ? $almacen_origen->idtbl_almacenes : false ?>'
    }
    $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>/almacen/getCatalogoTraspasos",
        data: data,
        dataType: "json",
        success:function(data) {
            parent = element.closest("div");
            filas = "";
            $.each(data, function(key, item) {
                filas += "<div><a class='elemento-sugerido list-group-item' data-marca='" + item.marca + "' data-neodata='" + item.neodata + "' data-categoria='" + item.abreviatura + "' data-modelo='" + item.modelo + "' data-serie='" + item.numero_serie + "' data-descripcion='" + item.neodata + " " + item.marca + " " + item.modelo + " " + item.numero_serie + " (" + item.descripcion.substr(0,60).trim() + ")" + "' data-existencias='" + item.existencias + "' data-idcatalogo='" + item.tbl_catalogo_idtbl_catalogo + "' data-interno='" + item.numero_interno + "' data-value='" + item.iddtl_almacen + "'>" + item.neodata + " " + item.marca + " " + item.modelo + " " + item.numero_serie + " (" + item.descripcion.substr(0,60).trim() + ")" + "</a></div>";
            });
            parent.find('.sugerencias').fadeIn(1000).html(filas);
            parent.find('.elemento-sugerido').on('click', function(){
                
                _this.find('.existencias').val($(this).data('existencias'));
                _this.find('.cantidad').attr('max', $(this).data('existencias'));
                _this.find('.producto-catalogo').val($(this).data('idcatalogo'));
                _this.find('.producto-interno').val($(this).data('interno'));
                _this.find('.producto-serie').val($(this).data('serie'));
                _this.find('.producto-categoria').val($(this).data('categoria'));
                /*$('#tr' + _this.attr('id')).find('.producto').html($(this).data('descripcion') );
                $('#tr' + _this.attr('id')).find('.neodata').html($(this).data('neodata') );
                $('#tr' + _this.attr('id')).find('.marca').html($(this).data('marca') );
                $('#tr' + _this.attr('id')).find('.modelo').html($(this).data('modelo'));
                $('#tr' + _this.attr('id')).find('.serie').html($(this).data('serie'));
                $('#tr' + _this.attr('id')).find('.interno').html($(this).data('interno'));*/

                //Obtenemos la id unica de la sugerencia pulsada
                var iddtl_almacen = $(this).data("value");
                var descripcion = $(this).data('descripcion');
                //Editamos el valor del input con data de la sugerencia pulsada
                parent.find('.neodata').val(descripcion);
                parent.find('.producto').val(iddtl_almacen);
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
    var _this=$(this).closest('.productoFieldset');
    if($(_this).find('.producto').val() != ""){
      element.val("");
      $(_this).find('.producto').val("");
      $(_this).find('.categoria').val("");
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
    var _this=$(this).closest('.productoFieldset');
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

    (function() { // Comenzamos una funcion auto-ejecutable

        // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
        window.requestAnimFrame = (function(callback) {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                    // Retrasa la ejecucion de la funcion para mejorar la experiencia
                };
        })();

        // Traemos el canvas mediante el id del elemento html
        var canvas6 = document.getElementById("draw-canvas6");
        var ctx6 = canvas6.getContext("2d");


        // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
        var drawText6 = document.getElementById("draw-dataUrl6");
        var drawImage6 = document.getElementById("draw-image6");
        var clearBtn6 = document.getElementById("draw-clearBtn6");
        var submitBtn6 = document.getElementById("draw-submitBtn6");
        clearBtn6.addEventListener("click", function(e) {
            // Definimos que pasa cuando el boton draw-clearBtn es pulsado
            clearCanvas();
            $('#draw-submitBtn6').attr("disabled", false);
            $('#draw-submitBtn6').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
            $("#draw-submitBtn6").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
            drawImage6.setAttribute("src", "");
        }, false);
        // Definimos que pasa cuando el boton draw-submitBtn es pulsado
        submitBtn6.addEventListener("click", function(e) {
            var dataUrl = canvas6.toDataURL();
            drawText6.innerHTML = dataUrl;
            drawImage6.setAttribute("src", dataUrl);
            $('#draw-submitBtn6').attr("disabled", true);
            $('#draw-submitBtn6').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
            $("#draw-submitBtn6").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
        }, false);

        // Activamos MouseEvent para nuestra pagina
        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;
        canvas6.addEventListener("mousedown", function(e) {
            /*
            Mas alla de solo llamar a una funcion, usamos function (e){...}
            para mas versatilidad cuando ocurre un evento
            */
            var tint6 = document.getElementById("color6");
            var punta6 = document.getElementById("puntero6");
            console.log(e);
            drawing = true;
            lastPos = getMousePos(canvas6, e);
        }, false);
        canvas6.addEventListener("mouseup", function(e) {
            drawing = false;
        }, false);
        canvas6.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas6, e);
        }, false);

        // Activamos touchEvent para nuestra pagina
        canvas6.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas6, e);
            console.log(mousePos);
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas6.dispatchEvent(mouseEvent);
        }, false);
        canvas6.addEventListener("touchend", function(e) {
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas6.dispatchEvent(mouseEvent);
        }, false);
        canvas6.addEventListener("touchleave", function(e) {
            // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas6.dispatchEvent(mouseEvent);
        }, false);
        canvas6.addEventListener("touchmove", function(e) {
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas6.dispatchEvent(mouseEvent);
        }, false);

        // Get the position of the mouse relative to the canvas
        function getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            /*
            Devuelve el tamaño de un elemento y su posición relativa respecto
            a la ventana de visualización (viewport).
            */
            return {
                x: mouseEvent.clientX - rect.left,
                y: mouseEvent.clientY - rect.top
            };
        }

        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            console.log(touchEvent);
            /*
            Devuelve el tamaño de un elemento y su posición relativa respecto
            a la ventana de visualización (viewport).
            */
            return {
                x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
                y: touchEvent.touches[0].clientY - rect.top
            };
        }

        // Draw to the canvas
        function renderCanvas() {
            if (drawing) {
                var tint6 = document.getElementById("color6");
                var punta6 = document.getElementById("puntero6");
                ctx6.strokeStyle = tint6.value;
                ctx6.beginPath();
                ctx6.moveTo(lastPos.x, lastPos.y);
                ctx6.lineTo(mousePos.x, mousePos.y);
                console.log(punta6.value);
                ctx6.lineWidth = punta6.value;
                ctx6.stroke();
                ctx6.closePath();
                lastPos = mousePos;
            }
        }

        function clearCanvas() {
            canvas6.width = canvas6.width;
        }

        // Allow for animation
        (function drawLoop() {
            requestAnimFrame(drawLoop);
            renderCanvas();
        })();

    })();

    function bloqueo_botones(valor){
    var buttons = $(".fomr_btn_action");
    buttons.prop("disabled", valor);
  }
</script>