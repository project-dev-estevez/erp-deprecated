<?php if (isset($this->session->userdata('permisos')['proveedores']) && $this->session->userdata('permisos')['proveedores']>1 ): ?>
<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <div class="row">
            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="bg-white has-shadow">
                    <a href="<?= base_url() ?>proveedores/nuevo" class="dropdown-item" title="">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                            <div class="title"><span>Nuevo<br>Proveedor</span>
                            </div>

                        </div>
                    </a>
                </div>
            </div><!-- Item -->

        </div>
    </div>
</section>

<?php endif ?>

<section class="tables">
    <div class="container-fluid">


        <div class="card">

            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Lista de Proveedores</h3>
            </div>
            <div class="card-body">
                <div class="float-right">
                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                </div>
                <button onclick="window.location.href='<?php echo base_url() ?>proveedores/excel-proveedores'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                    <table class="table table-striped table-sm table-hover" id="tbproveedores">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Proveedor</th>
                                <th>Nombre Fiscal</th>
                                <th>RFC</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Proveedor</th>
                                <th>Nombre Fiscal</th>
                                <th>RFC</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <!--<?php if ($proveedores): ?>
                            <?php foreach ($proveedores as $key => $value): ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>proveedores/detalle/<?=$value->idtbl_proveedores?>"><?= $value->idtbl_proveedores ?></a></td>
                                    <td><a href="<?= base_url() ?>proveedores/detalle/<?=$value->idtbl_proveedores?>"><?= $value->nombre_comercial ?></a></td>
                                    <td><a href="<?= base_url() ?>proveedores/detalle/<?=$value->idtbl_proveedores?>"><?= $value->nombre_fiscal ?></a></td>
                                    <td><a href="<?= base_url() ?>proveedores/detalle/<?=$value->idtbl_proveedores?>"><?= $value->rfc ?></a></td>
                                </tr>
                            <?php endforeach; endif ?>-->
                        </tbody>
                    </table>
                    <br>
                    <div class="paginacion">

                    </div>
                </div>
            </div>
        </div>



    </div>
</section>
<script>
  $(document).ready(function(){
    mostrarDatos("",1);
    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar,1);
    });
    $("body").on("click",".paginacion li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      mostrarDatos(valorBuscar,valorHref); 
    });
  });
  function mostrarDatos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Proveedores/mostrarProveedores",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.proveedores,function(key,item) {
          filas += "<tr><td><a href='" + "<?= base_url() ?>proveedores/detalle/" + item.idtbl_proveedores + "'>" + item.idtbl_proveedores + "</a></td><td><a href='" + "<?= base_url() ?>proveedores/detalle/" + item.idtbl_proveedores + "'>" + item.nombre_comercial + "</a></td><td><a href='" + "<?= base_url() ?>proveedores/detalle/" + item.idtbl_proveedores + "'>" + item.nombre_fiscal + "</a></td><td><a href='" + "<?= base_url() ?>proveedores/detalle/" + item.idtbl_proveedores + "'>" + item.rfc + "</a></td></tr>";
        });
        $('#tbproveedores tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion").html(paginador);
      }
    });
  }
</script>