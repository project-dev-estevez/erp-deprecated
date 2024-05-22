<section class="tables">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Lista de Personal Contratistas</h3>
      </div>
      <div class="card-header d-flex align-items-center">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn active" id="activos-tab" data-toggle="tab" href="#activos" role="tab" aria-controls="activos" aria-selected="false">
              Personal Activo
            </a>
          </li>
          <?php if($this->session->userdata("tipo") != 3 &&  $this->session->userdata("tipo") != 15){ ?>
          <li class="nav-item">
            <a class="nav-link btn" id="inactivos-tab" data-toggle="tab" href="#inactivos" role="tab" aria-controls="inactivos" aria-selected="true">
              Personal Inactivo
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="activos" role="tabpanel" aria-labelledby="activos-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
            </div>
            <a href="<?php echo base_url() ?>contratistas/excel-personalActivo" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
            <div class="table-responsive">
              <table id="tbpersonalactivo" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Nombre</th>
                    <th>Contratista</th>
                    <th>Proyecto</th>
                    <th>Puesto</th>
                    <th>N° IMSS</th>
                    <th>CURP</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Estatus</th>
                    <th>Almacen</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Nombre</th>
                    <th class="estatus">Contratista</th>
                    <th>Proyecto</th>
                    <th>Puesto</th>
                    <th>N° IMSS</th>
                    <th>CURP</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th class="estatus">Estatus</th>
                    <th class="estatus">Almacen</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  
                </tbody>
              </table>
              <br>
              <div class="paginacion2">

              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="inactivos" role="tabpanel" aria-labelledby="inactivos-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
            </div>
            <a href="<?php echo base_url() ?>contratistas/excel-personalInactivo" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
            <div class="table-responsive">
              <table id="tbpersonalinactivo" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Nombre</th>
                    <th>Contratista</th>
                    <th>Proyecto</th>
                    <th>Puesto</th>
                    <th>N° IMSS</th>
                    <th>CURP</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Estatus</th>
                    <th>Almacen</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Nombre</th>
                    <th class="estatus">Contratista</th>
                    <th>Proyecto</th>
                    <th>Puesto</th>
                    <th>N° IMSS</th>
                    <th>CURP</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th class="estatus">Estatus</th>
                    <th class="estatus">Almacen</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  
                </tbody>
              </table>
              <br>
              <div class="paginacion3">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function(){
    mostrarDatos("",1);
    mostrarDatos2("",1);
    mostrarDatos3("",1);
    mostrarDatosContratistasInactivos("",1)

    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar,1);
    });
    $("input[name='busquedaContratistasInactivos']").keyup(function() {
      textoBuscar = $("input[name='busquedaContratistasInactivos']").val();
      mostrarDatosContratistasInactivos(textoBuscar,1);
    });
    $("input[name='busqueda2']").keyup(function() {
      textoBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(textoBuscar,1);
    });
    $("input[name='busqueda3']").keyup(function() {
      textoBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(textoBuscar,1);
    });
    $("body").on("click",".paginacion li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      mostrarDatos(valorBuscar,valorHref); 
    });
    $("body").on("click",".paginacionContratistasInactivos li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaContratistasInactivos']").val();
      mostrarDatosContratistasInactivos(valorBuscar,valorHref); 
    });
    $("body").on("click",".paginacion2 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(valorBuscar,valorHref); 
    });
    $("body").on("click",".paginacion3 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(valorBuscar,valorHref); 
    });
  });
  function mostrarDatos(valorBuscar,pagina) {
    var uid = '<?= $uid ?>';
    $.ajax({
      url: "<?= base_url() ?>Contratistas/mostrarContratistas",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.departamentos,function(key,item) {
          switch (item.estatus) {
            case 'activo':
              calssTr ='success';
              break;
            case 'pausa':
            calssTr ='warning';
            break;
            case 'proceso':
              calssTr ='primary';
              break;
            case 'baja':
              calssTr ='danger';
              break;
          }
          filas += "<tr class='table-" + calssTr + "'><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.uid + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.razon_social + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.nombre_comercial + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.rfc + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.email + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.telefono + "<br>" + item.telefono_adicional + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.responsable + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.direccion + "</a></td><td class='text-capitalize font-weight-bold'>" + item.estatus + "</td><td><a href='<?= base_url() ?>contratistas/asignaciones_por_contratista/" + item.uid + "'><i class='fa fa-question-circle' aria-hidden='true'></i></a><a href='<?= base_url() ?>contratistas/personal_por_contratista/" + item.uid + "'><i class='fa fa-user' aria-hidden='true'></i></a></td></tr>";
        });
        $('#tbcontratistas tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        /*paginador = "<ul class='pagination'>";
        for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
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

  function mostrarDatosContratistasInactivos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Contratistas/mostrarContratistasInactivos",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.contratistas,function(key,item) {
          switch (item.estatus) {
            case 'activo':
              calssTr ='success';
              break;
            case 'pausa':
            calssTr ='warning';
            break;
            case 'proceso':
              calssTr ='primary';
              break;
            case 'baja':
              calssTr ='danger';
              break;
          }
          filas += "<tr class='table-" + calssTr + "'><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.uid + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.razon_social + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.nombre_comercial + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.rfc + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.email + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.telefono + "<br>" + item.telefono_adicional + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.responsable + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.direccion + "</a></td><td class='text-capitalize font-weight-bold'>" + item.estatus + "</td><td><a href='<?= base_url() ?>contratistas/asignaciones_por_contratista/" + item.uid + "'><i class='fa fa-question-circle' aria-hidden='true'></i></a></td></tr>";
        });
        $('#tbcontratistasinactivos tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        /*paginador = "<ul class='pagination'>";
        for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
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
        $(".paginacionContratistasInactivos").html(paginador);
      }
    });
  }

  function mostrarDatos2(valorBuscar,pagina) {
    var uid = '<?= $uid ?>';
    $.ajax({
      url: "<?= base_url() ?>Contratistas/mostrarPersonalPorContratistaActivo",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid:uid},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.activos,function(key,item) {
          if(item.almacen == 1) {
            clase = "text-success";
            texto = "Autorizado";
          }
          else {
            clase = "text-danger";
            texto = "No autorizado";
          }
          filas += "<tr><td>" + item.uid + "</td><td title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "</td><td>" + item.nombre_comercial + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td><td>" + item.puesto_contrato + "</td><td>" + item.nss + "</td><td>" + item.curp + "</td><td>" + item.email_personal + "</td><td>" + item.telefono + "</td><td class='text-center text-capitalize font-weight-bold'>" + 'Activo' + "</td><td class='text-center text-capitalize font-weight-bold " + clase + "'>" + texto + "</td><td>";
          <?php if($this->session->userdata("tipo") != 3 &&  $this->session->userdata("tipo") != 15){ ?>
            filas += "<a href='"+"<?= base_url() ?>contratistas/editar-personal/" + item.uid +"'>" + "<i class='fa fa-edit'></i>" + "</a>";
          <?php } ?>
          filas += "<a href='" + "<?= base_url() ?>contratistas/detalle-usuario/" + item.uid + "'>" + "<i class='fa fa-info-circle'></i>" + "</a></td></tr>";
        });
        $('#tbpersonalactivo tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        /*paginador = "<ul class='pagination'>";
        for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
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
        $(".paginacion2").html(paginador);
      }
    });
  }

  function mostrarDatos3(valorBuscar,pagina) {
    var uid = '<?= $uid ?>';
    $.ajax({
      url: "<?= base_url() ?>Contratistas/mostrarPersonalPorContratistaInactivo",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid:uid},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.inactivos,function(key,item) {
          if(item.almacen == 1) {
            clase = "text-success";
            texto = "Autorizado";
          }
          else {
            clase = "text-danger";
            texto = "No autorizado";
          }
          filas += "<tr class='table-danger'><td>" + item.uid + "</td><td title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "</td><td>" + item.nombre_comercial + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td><td>" + item.puesto_contrato + "</td><td>" + item.nss + "</td><td>" + item.curp + "</td><td>" + item.email_personal + "</td><td>" + item.telefono + "</td><td class='text-center text-capitalize font-weight-bold'>" + 'Baja' + "</td><td class='text-center text-capitalize font-weight-bold " + clase + "'>" + texto + "</td><td>"+ "<a href='" + "<?= base_url() ?>contratistas/detalle-usuario/" + item.uid + "'>" + "<i class='fa fa-info-circle'></i>" + "</a><a href='<?= base_url() ?>personal/detalle/" + item.uid + "'><i class='fa fa-question-circle' aria-hidden='true'></i></a></td></tr>";
        });
        $('#tbpersonalinactivo tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        /*paginador = "<ul class='pagination'>";
        for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
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
        $(".paginacion3").html(paginador);
      }
    });
  }
</script>