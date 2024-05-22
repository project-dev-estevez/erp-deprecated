<section class="dashboard-counts no-padding-bottom botones">
  <div class="container-fluid">
    <div class="row">
      <?php if (isset($this->session->userdata('permisos')['almacen_seguridad_e_higiene']) && $this->session->userdata('permisos')['almacen_seguridad_e_higiene'] > 2) : ?>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="bg-white has-shadow">
          <a href="<?php echo base_url() ?>almacen/catalogo">
            <div class="item d-flex align-items-center pr-4 pl-4">
              <div class="icon bg-green"><i class="fa fa-list"></i></div>
              <div class="title"><span>Ver<br>Catálogo</span>
            </div>
          </div>
        </a>
      </div>
    </div>
    <?php endif ?>
    <!-- Item -->
    <div class="col-xl-3 col-sm-6">
      <div class="bg-white has-shadow">
        <a href="<?php echo base_url() ?>almacen/asignaciones">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-violet"><i class="fa fa-list"></i></div>
            <div class="title"><span>Ver<br>Asignaciones</span>
          </div>
        </div>
      </a>
    </div>
    
  </div>
  <div class="col-xl-3 col-sm-6">
                <div class="bg-white has-shadow">
                    <a href="<?php echo base_url() ?>almacen/traspasos/1">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-blue"><i class="fa fa-list"></i></div>
                            <div class="title"><span>Ver<br>Traspasos</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
</div>
</div>
</section>
<section>
<div class="container-fluid">
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h4>ALMACEN SEGURIDAD E HIGIENE</h4>
      </div>
      <div class="card-body">
      <div class="float-right">
        <input type="text" class="form-control" placeholder="Buscar" name="busqueda10">
      </div>
      <a href="<?php echo base_url() ?>almacen/excel-productoAG/seguridad" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
      <a href="<?php echo base_url() . 'almacen/nueva-entrada-alto-costo/' . $almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i> Entrada</a>
      <?php if (isset($this->session->userdata('permisos')['traspasos']) && $this->session->userdata('permisos')['traspasos']>2): ?>
                                            <a href="#nuevo_traspaso" data-toggle='modal'
                                                data-uid="<?= $almacen->uid ?>" class="btn btn-outline-primary"><i
                                                    class="fa fa-random"></i> Traspaso</a>
                                            <?php endif ?>
      <div class="table-responsive">
        <table class="table table-striped table-sm table-hover" id="tbproductoshigiene">
          <thead>
            <tr>
              <th data-priority="1">Código</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th data-priority="2">Descripción</th>
              <th>Unidad</th>
              <th title="Categoría">Categoría</th>
              <th data-priority="3">Existencias</th>
              <th>Estatus</th>
              <th>Precio Unitario</th>
              <th>Total</th>
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
                <th>Existencias</th>
                <th width="120"><select name="selectHigiene" style="font-size: 10px;" class="form-control">
                  <option value="">Seleccionar</option>
                  <option value="almacen">Almacen</option>
                  <option value="dañado">Dañado</option>
                  <option value="robado">Robado</option>
                  <option value="abuso de confianza">abuso de confianza</option>
                </select></th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th></th>
              </tr>
            </tfoot>
          <tbody>

          </tbody>
        </table>
        <br>

        <div class="paginacion10">

        </div>
      </div>
      </div>

      </div>
    </div>
  </div>
</div>
</section>
<div id="editar_producto" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open(base_url() . 'almacen/actualizar-producto-almacen') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Editar Producto en Catálogo</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-12 col-lg-6">
              <div class="form-group">
                <label>Rack</label>
                <select name="rack" class="form-control">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php for ($x = 1; $x <= 20; $x++) { ?>
                  <option value="<?= $x ?>">Rack <?= $x ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label>Modulo</label>
                <select name="modulo" class="form-control">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>                  
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  <option value="F">F</option>
                  <option value="G">G</option>
                  <option value="H">H</option>
                </select>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label>Nivel</label>
                <select name="nivel" class="form-control">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php for ($x = 1; $x <= 10; $x++) { ?>
                  <option value="<?= $x ?>">Nivel <?= $x ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>                                      
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idalmacen" class="form-control">
                <?= form_hidden('uid', '') ?>
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div id="nuevo_traspaso" tabindex="-1" role="dialog" aria-labelledby="labelNuevoTraspaso" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <?= form_open(base_url().'almacen/nuevo-traspaso') ?>
            <div class="modal-header">
                <h4 id="labelNuevoTraspaso" class="modal-title">Nuevo Traspaso</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Almacen Destino</label>
                            <select name="almacen_destino" id="" class="form-control" data-live-search="true" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <?php foreach ($almacenes as $key => $value) { ?>
                                <?php if ($value->almacen == $almacen->almacen) { ?>
                                <option value="<?= $value->idtbl_almacenes ?>" disabled><?= $value->almacen ?></option>
                                <?php } else { ?>
                                <option value="<?= $value->idtbl_almacenes ?>"><?= $value->almacen ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input name="almacen_origen" type="text" value="25839864557600770" hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-primary btn-sm">Nuevo Traspaso</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
  $('#editar_producto').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);
    modal.find("input[name='minimo']").val(recipient.minimo);
    modal.find("select[name='inventariado']").val(recipient.inventariado);
    modal.find("select[name='rack']").val(recipient.rack);
    modal.find("select[name='modulo']").val(recipient.modulo);
    modal.find("select[name='nivel']").val(recipient.nivel);
    modal.find("input[name='maximo']").val(recipient.maximo);
});
</script>
<script>
  $(document).ready(function(){
    
    mostrarDatos10("", 1, "");

    $("input[name='busqueda10']").keyup(function() {
        textoBuscar = $("input[name='busqueda10']").val();
        textoBuscar2 = $("select[name='selectHigiene']").val();
        mostrarDatos10(textoBuscar, 1, textoBuscar2);
    });

    $("body").on("click", ".paginacion10 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda10']").val();
        valorBuscar2 = $("select[name='selectHigiene']").val();
        mostrarDatos10(valorBuscar, valorHref, valorBuscar2);
    });

  });
  

  function mostrarDatos10(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarProductosSeguridadHigiene",
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
            $.each(response.productosSeguridadHigiene, function(key, item) {
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
                    .existencias + "'" + " data-idalmacen='" + item.iddtl_almacen + "'" + "data-estatusanterior='" + item.estatus + "'" +
                    " data-uid='" + item.uid + "'>" + item.estatus + "</a><?php }else{ ?>" + item
                    .estatus + "<?php } ?></td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .precio) + "</td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .precio * item.existencias) + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-rack='" + item.rack + "'" + " data-modulo='" + item.modulo + "'" + " data-nivel='" + item.nivel + "'" + " data-idalmacen='" + item.iddtl_almacen + "'" + " data-minimo='" + item
                    .minimo + "'" + " data-maximo='" + item.maximo + "'" + " data-uid='" + item
                    .uid + "'><i class='fa fa-edit'></i></a></td></tr>";
            });
            $('#tbproductoshigiene tbody').html(filas);
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
            $(".paginacion10").html(paginador);
        }
    });
  }
</script>