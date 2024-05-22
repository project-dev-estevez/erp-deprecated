 <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="<?= base_url() ?>clientes/nuevo" title="">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
            <div class="title"><span>Nuevo<br>Cliente</span>              
            </div>
            
          </div>
          </a>
          </div>
        </div>
 
      </div>
    </div>
  </section>


 <section class="tables">   
    <div class="container-fluid">
      
        
      <div class="card">

        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Todos los Clientes</h3>
        </div>
        <div class="card-body">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
          </div>
          <a href="<?php echo base_url() ?>clientes/excel-clientes" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
          <div class="table-responsive">   
            <table class="table table-striped table-sm table-hover" id="tbclientes">
              <thead>
                <tr>
                  <th>RFC</th>
                  <th>Nombre Comercial</th>
                  <th>Razón Social</th>
                  <th>Email</th>
                  <th>Teléfonos</th>
                  <th>Dirección</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>RFC</th>
                  <th>Nombre Comercial</th>
                  <th>Razón Social</th>
                  <th>Email</th>
                  <th>Teléfonos</th>
                  <th>Dirección</th>
                </tr>
              </tfoot>
              <tbody>
                <!--<?php if ($clientes): ?>
                <?php foreach ($clientes as $key => $value): ?>
                  <tr>
                    <td><a href="<?= base_url().'clientes/detalle/'.$value->uid ?>" title="<?=$value->nombre_comercial?>"><?=$value->rfc?></a></td>
                    <td><a href="<?= base_url().'clientes/detalle/'.$value->uid ?>" title="<?=$value->nombre_comercial?>"><?=$value->nombre_comercial?></a></td>
                    <td><a href="<?= base_url().'clientes/detalle/'.$value->uid ?>" title="<?=$value->nombre_comercial?>"><?=$value->razon_social?></a></td>
                    <td><a href="<?= base_url().'clientes/detalle/'.$value->uid ?>" title="<?=$value->nombre_comercial?>"><?=$value->email?></a></td>
                    <td><a href="<?= base_url().'clientes/detalle/'.$value->uid ?>" title="<?=$value->nombre_comercial?>"><?=$value->telefono?><?= ($value->telefono_adicional!='') ? ' y '.$value->telefono_adicional : '' ; ?></a></td>
                    <td><a href="<?= base_url().'clientes/detalle/'.$value->uid ?>" title="<?=$value->nombre_comercial?>"><?=$value->direccion?></a></td>
                  </tr>
                <?php endforeach ?>     
                <?php else: ?>
                  <tr>
                    <td colspan="6" class="text-center">No existen clientes.</td>
                  </tr>
                <?php endif ?>-->               
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
      url: "<?= base_url() ?>Clientes/mostrarClientes",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.clientes,function(key,item) {
          filas += "<tr><td><a href='" + "<?= base_url() ?>" + "clientes/detalle/" + item.uid + "' title='" + item.nombre_comercial + "'>" + item.rfc + "</a></td><td><a href='" + "<?= base_url() ?>" + "clientes/detalle/" + item.uid + "' title='" + item.nombre_comercial + "'>" + item.nombre_comercial + "</a></td><td><a href='" + "<?= base_url() ?>" + "clientes/detalle/" + item.uid + "' title='" + item.nombre_comercial + "'>" + item.razon_social + "</a></td><td><a href='" + "<?= base_url() ?>" + "clientes/detalle/" + item.uid + "' title='" + item.nombre_comercial + "'>" + item.email + "</a></td><td><a href='" + "<?= base_url() ?>" + "clientes/detalle/" + item.uid + "' title='" + item.nombre_comercial + "'>" + item.telefono + (item.telefono_adicional != '' ? ' y ' + item.telefono_adicional : '') + "</a></td><td><a href='" + "<?= base_url() ?>" + "clientes/detalle/" + item.uid + "' title='" + item.nombre_comercial + "'>" + item.direccion + "</a></td></tr>";
        });
        $('#tbclientes tbody').html(filas);
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