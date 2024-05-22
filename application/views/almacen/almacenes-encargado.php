<section class="projects">
    <div class="container-fluid">
        <div class="card">            
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">                                        
                    <!---->

                    <!---->                    
                        <!--<div style="text-align: right">
                            <?php if($this->session->userdata('tipo') != 4){?><button class="btn btn-primary btn-sm"
                                data-toggle="modal" data-target="#nuevo_almacen"><i class="fa fa-plus-circle"></i> Nuevo
                                Almacen</button><?php } ?>
                        </div>-->                        
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link btn active" data-toggle="pill" href="#alamacenes_externos" role="tab"
                                    aria-selected="true">
                                    Almacenes
                                </a>
                            </li>                                                     
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="alamacenes_externos">
                                <br>
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar"
                                        name="busquedaalmacenesexternos">
                                </div>
                                <a href="<?php echo base_url() ?>almacen/excel-almacenes"
                                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                        Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbalmacenesexterno">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Almacén</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionalmacenesexternos">

                                    </div>
                                </div>
                            </div>                                                        
                        </div>                    
                    <!---->                                        
                </div>
            </div>
        </div>
    </div>
</section>


<div id="nuevo_almacen" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open_multipart('class="needs-validation" id="formuploadajax" novalidate'); ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Agregar Nuevo Almacen</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <?php if($this->session->userdata('tipo') != 19) { ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Proyecto</label>
                            <select name="proyecto" id="selectProyecto" class="selectpicker" data-live-search="true"
                                required>
                                <option value="">Seleccione...</option>
                                <?php foreach($proyectos AS $key => $value){ ?>
                                <option value="<?= $value->idtbl_proyectos ?>"
                                    data-direccion="<?php echo $value->direccion ?>"><?= $value->numero_proyecto?> -
                                    <?=$value->nombre_proyecto ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Segmento*</label>
                        <select name="segmento" id="ssegmento" class="selectpicker segmento" required
                            data-live-search="true">
                            <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                        </select>
                    </div>
                </div>
                <?php } ?>
                <?php if($this->session->userdata('tipo') == 19){ ?>
                <!--<div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Sitio</label>
                            <select name="sitio" id="sitio" class="selectpicker" data-live-search="true" required>
                                <option value="">Seleccione...</option>
                                <?php foreach($sitios AS $key => $value){ ?>
                                <option value="<?= $value->idtbl_sitios ?>"><?= $value->nombre?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Proyecto</label>
                            <select name="proyecto" id="selectProyecto" class="selectpicker" data-live-search="true"
                                required>
                                <option value="">Seleccione...</option>
                                <?php foreach($proyectos AS $key => $value){ ?>
                                <option value="<?= $value->idtbl_proyectos ?>"
                                    data-direccion="<?php echo $value->direccion ?>"><?= $value->numero_proyecto?> -
                                    <?=$value->nombre_proyecto ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Nombre*</label>
                        <input type="text" name="nombre" placeholder="Nombre" required class="form-control">
                    </div>
                </div>
                <?php } ?>
                <!--<div class="row">
          <div class="col-12">
            <div class="form-group">
              <label>Almacén</label>
              <input type="text" name="almacen" class="form-control" required minlength="3">
            </div>
          </div>
        </div>-->
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-primary btn-sm">Guardar Almacen</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).on('change', '#selectProyecto', function(event) {
    //alert('si');
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
            console.log(registros);
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
$(document).ready(function() {
    $("#formuploadajax").on("submit", function(event) {
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            $.ajax({
                url: "<?= base_url() ?>almacen/guardarAlmacen",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
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
                }
            });
        }
    });
});
</script>

<script>
$('#editar_producto').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='minimo']").val(recipient.minimo);
    modal.find("select[name='inventariado']").val(recipient.inventariado);
    modal.find("input[name='maximo']").val(recipient.maximo);
})
</script>

<script>
$('#editar_estatus').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes    
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='minimo']").val(recipient.minimo);
    modal.find("select[name='inventariado']").val(recipient.inventariado);    
    if(recipient.estatusanterior == 'dañado'){       
        modal.find("select[name='estatus']").empty().append($("<option>", {
            value: 'baja',
            text: 'baja'
        }));
    }else{
        modal.find("select[name='estatus']").empty();
        $.each([ "almacen", "dañado", "robado", "abuso de confianza", "justificacion" ], function( index, value ) {
            if(recipient.estatusanterior != value){
                modal.find("select[name='estatus']").append($("<option>", {
                    value: value,
                    text: value
                }));
            }
        });
    }
    modal.find("input[name='existencias']").val(recipient.existencias);
    modal.find("input[name='estatusanterior']").val(recipient.estatusanterior);
    modal.find("input[name='existenciascambiar']").attr('max', recipient.existencias);
});
</script>

<!--<script>
  $('#editar_producto').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='numero_serie']").val(recipient.serie);
    modal.find("input[name='numero_interno']").val(recipient.interno);
    modal.find("textarea[name='nota']").val(recipient.nota);
    modal.find("select[name='estatus']").val(recipient.estatus);
    modal.find("input[name='existencias']").val(recipient.existencias);
    modal.find("select[name='rack']").val(recipient.rack);
    modal.find("select[name='nivel']").val(recipient.nivel);
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);

    if (recipient.estatus == 'asignado')
      modal.find("select[name='estatus']").attr('disabled', 'disabled')
    else
      modal.find("#estatus option[value='asignado']").attr('disabled', 'disabled')

    if (recipient.abreviatura == 'HAC' || recipient.abreviatura == 'HMC' || recipient.abreviatura == 'HIL')
      modal.find("input[name='existencias']").attr('disabled', 'disabled')


    if (recipient.abreviatura == 'CAC') {
      modal.find("input[name='numero_serie']").attr('disabled', 'disabled')
      modal.find("input[name='numero_interno']").attr('disabled', 'disabled')
      modal.find("textarea[name='nota']").attr('disabled', 'disabled')
      modal.find("select[name='estatus']").attr('disabled', 'disabled')

    }

  })

  $('#editar_producto').on('hide.bs.modal', function (event) {
    var modal = $(this);
    modal.find("input[name='numero_serie']").removeAttr('disabled');
    modal.find("input[name='numero_interno']").removeAttr('disabled');
    modal.find("textarea[name='nota']").removeAttr('disabled');
    modal.find("select[name='estatus']").removeAttr('disabled');
    modal.find("input[name='existencias']").removeAttr('disabled');
    modal.find("select[name='rack']").removeAttr('disabled');
    modal.find("select[name='nivel']").removeAttr('disabled');
  })
</script>-->
<script>
$(document).ready(function() {
   
    mostrarDatos6("", 1);        

    $("input[name='busquedaalmacenesexternos']").keyup(function() {
        textoBuscar = $("input[name='busquedaalmacenesexternos']").val();        
        mostrarDatos6(textoBuscar, 1);        
    });


    $("body").on("click", ".paginacionalmacenesexternos li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaalmacenesexternos']").val();        
        mostrarDatos6(valorBuscar, valorHref);        
    });
    

});



function mostrarDatos6(valorBuscar, pagina, tipo) {
    console.log(tipo);
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarAlmacenesEncargado",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            tipo: tipo
        },
        dataType: "json",
        success: function(response) {

            filas = "";
            console.log(response);
            $.each(response.almacenes, function(key, item) {
                filas += "<tr><td><a href='" + "<?= base_url() ?>almacen/detalle_almc/" + item.uid +
                    "'>" + item.uid + "</a></td><td><a href='" +
                    "<?= base_url() ?>almacen/detalle_almc/" + item.uid + "'>" + item.almacen + ' ' + item.nombre +
                    "</a></td></tr>";
            });
                        
                idTable = "tbalmacenesexterno";
                classPaginador = "paginacionalmacenesexternos";
                       

            $('#' + idTable + ' tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            /*for(var i = 1; i <= numeroLinks; i++) {
              if(i == linkSeleccionado) 
                paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
              else
                paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
            if (linkSeleccionado > 1) {
                paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) +
                    "' class='page-link'>&lsaquo;</a></li>";
            } else {
                paginador +=
                "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if (numeroLinks > cant) {
                pagRestantes = numeroLinks - linkSeleccionado;
                pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            } else {
                pagFin = numeroLinks;
            }
            for (var i = pagInicio; i <= pagFin; i++) {
                if (i == linkSeleccionado) {
                    paginador +=
                        "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" +
                        i + "</a></li>";
                } else {
                    paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i +
                        "</a></li>";
                }
            }
            if (linkSeleccionado < numeroLinks) {
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) +
                    "' class='page-link'>&rsaquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + numeroLinks +
                    "' class='page-link'>&raquo;</a></li>";
            } else {
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
                paginador +=
                "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $("." + classPaginador).html(paginador);
        }
    });
}

function mostrarDatos7(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenGeneralActivos",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            clase = '';
            filas = "";
            $.each(response.productosAlmacenGeneralActivos, function(key, item) {
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                if (new Intl.NumberFormat("en-IN").format(item.existencias) == new Intl
                    .NumberFormat("en-IN").format(item.minimo)) {
                    clase = 'table-warning';
                }
                filas += "<tr class='" + clase + "'><td>" + item.neodata + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr +
                    "</td><td title='" + item.categoria + "'>" + item.categoria + "</td><td>" + item
                    .existencias + "</td><td>" + item.numero_serie + "</td><td>" + item
                    .numero_interno +
                    "</td><td><?php if($this->session->userdata('tipo') == 30){ ?><a href='#editar_estatus' data-toggle='modal' title='" +
                    item.idtbl_catalogo + "'" + " data-inventariado='" + item.inventariado + "'" +
                    " data-minimo='" + item.minimo + "'" + " data-existencias='" + item
                    .existencias + "'" + "data-estatusanterior='" + item.estatus + "'" +
                    " data-uid='" + item.uid + "'>" + item.estatus + "</a><?php }else{ ?>" + item
                    .estatus + "<?php } ?></td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .precio) + "</td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .precio * item.existencias) + "</td><td>" + "<a href='" +
                    "<?= base_url()?>almacen/detalle-producto/" + item.iddtl_almacen +
                    "' title='Información' onClick='" +
                    "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-minimo='" + item
                    .minimo + "'" + " data-maximo='" + item.maximo + "'" + " data-uid='" + item
                    .uid + "'><i class='fa fa-edit'></i></a></td></tr>";
            });
            $('#tbproductosalmacengeneralactivos tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            /*for(var i = 1; i <= numeroLinks; i++) {
              if(i == linkSeleccionado) 
                paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
              else
                paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
            if (linkSeleccionado > 1) {
                paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) +
                    "' class='page-link'>&lsaquo;</a></li>";
            } else {
                paginador +=
                "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if (numeroLinks > cant) {
                pagRestantes = numeroLinks - linkSeleccionado;
                pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            } else {
                pagFin = numeroLinks;
            }
            for (var i = pagInicio; i <= pagFin; i++) {
                if (i == linkSeleccionado) {
                    paginador +=
                        "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" +
                        i + "</a></li>";
                } else {
                    paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i +
                        "</a></li>";
                }
            }
            if (linkSeleccionado < numeroLinks) {
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) +
                    "' class='page-link'>&rsaquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + numeroLinks +
                    "' class='page-link'>&raquo;</a></li>";
            } else {
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
                paginador +=
                "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion7").html(paginador);
        }
    });
}

function mostrarDatos8(valorBuscar, pagina, valorBuscar2) {    
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenGeneralConsumibles",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            clase = '';
            filas = "";
            $.each(response.productosAlmacenGeneralConsumibles, function(key, item) {
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                if (new Intl.NumberFormat("en-IN").format(item.existencias) == new Intl
                    .NumberFormat("en-IN").format(item.minimo)) {
                    clase = 'table-warning';
                }
                filas += "<tr class='" + clase + "'><td>" + item.neodata + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr +
                    "</td><td title='" + item.categoria + "'>" + item.categoria + "</td><td>" + item
                    .existencias +
                    "</td><td><?php if($this->session->userdata('tipo') == 4){ ?><a href='#editar_estatus' data-toggle='modal' title='" +
                    item.idtbl_catalogo + "'" + " data-inventariado='" + item.inventariado + "'" +
                    " data-minimo='" + item.minimo + "'" + " data-existencias='" + item
                    .existencias + "'" + "data-estatusanterior='" + item.estatus + "'" +
                    " data-uid='" + item.uid + "'>" + item.estatus + "</a><?php }else{ ?>" + item
                    .estatus + "<?php } ?></td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .precio) + "</td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .precio * item.existencias) + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-minimo='" + item
                    .minimo + "'" + " data-maximo='" + item.maximo + "'" + " data-uid='" + item
                    .uid + "'><i class='fa fa-edit'></i></a></td></tr>";
            });
            $('#tbproductosalmacengeneralconsumibles tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            /*for(var i = 1; i <= numeroLinks; i++) {
              if(i == linkSeleccionado) 
                paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
              else
                paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
            if (linkSeleccionado > 1) {
                paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) +
                    "' class='page-link'>&lsaquo;</a></li>";
            } else {
                paginador +=
                "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if (numeroLinks > cant) {
                pagRestantes = numeroLinks - linkSeleccionado;
                pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            } else {
                pagFin = numeroLinks;
            }
            for (var i = pagInicio; i <= pagFin; i++) {
                if (i == linkSeleccionado) {
                    paginador +=
                        "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" +
                        i + "</a></li>";
                } else {
                    paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i +
                        "</a></li>";
                }
            }
            if (linkSeleccionado < numeroLinks) {
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) +
                    "' class='page-link'>&rsaquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + numeroLinks +
                    "' class='page-link'>&raquo;</a></li>";
            } else {
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
                paginador +=
                "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion8").html(paginador);
        }
    });
}
</script>