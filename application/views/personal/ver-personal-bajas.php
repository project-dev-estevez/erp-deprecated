<section class="tables">   
    <div class="container-fluid">
      
        
          <div class="card">
           
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Lista de Personal (Bajas)</h3>
            </div>
            <div class="card-body">
              <div class="float-right">
                <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
              </div>
              <a href="<?php echo base_url() ?>personal/excel-personal-bajas" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
              <div class="table-responsive">   
                <table class="table table-striped table-sm table-hover" id="tbpersonalbajas">
                  <thead>
                    <tr>
                    <th>UID</th>
                      <th>N° de empleado</th>
                      <th>NOI</th>
                      <th>Nombre</th>
                      <th>Departamento</th>
                      <th>Perfil</th>
                      <th>Proyecto</th>
                      <th>Fecha Nacimiento</th>
                      <th>Descuento</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>UID</th>
                      <th>N° de empleado</th>
                      <th>NOI</th>
                      <th>Nombre</th>
                      <th>Departamento</th>
                      <th>Perfil</th>
                      <th>Proyecto</th>
                      <th>Fecha Nacimiento</th>
                      <th>Descuento</th>
                    </tr>
                  </tfoot>
                  <tbody>
                               
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
      url: "<?= base_url() ?>Personal/mostrarPersonalBaja",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        var descuento = 0;
        $.each(response.personalBaja,function(key,item) {
          if(item.descuento_total != null){
            descuento = item.descuento_total;
          }
          filas += "<tr>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.uid + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.numero_empleado + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.numero_empleado_noi + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.apellido_paterno + ' ' + item.apellido_materno + ' ' + item.nombres + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.departamento + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.perfil + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.fecha_nacimiento + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'> $" + descuento + "</a></td>";
          filas += "</tr>";
        });
        $('#tbpersonalbajas tbody').html(filas);
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
