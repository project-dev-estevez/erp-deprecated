<!-- Modal -->
<div class="modal fade" id="cancelarPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancelar Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="cancelar_Pedido">
          <div class="col">
            <textarea class="form-control" placeholder="Motivo de Cancelación" name="motivo_cancelacion"></textarea>
          </div>
          <input type="hidden" name="uid_pedido">
          <input type="hidden" name="idtbl_solicitudes_almacen">
          <input type="hidden" name="estimacion">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="cancelarPedido()" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cerrarPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cerrar Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">Pagos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-selected="false">Pago</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="pagos-tab">
            <div class="text-right m-2">
              <a class="btnNuevoPago" herf="#" onclick="nuevoPagoPedido()"><i class="fa fa-plus-circle" style="font-size:30px;" aria-hidden="true"></i></a>
            </div>
            <table class="table m-2">
              <thead>
                <tr>
                  <th>Folio Pago</th>
                  <th>Numero Factura</th>
                  <th>Fecha Pago</th>
                  <th>Importe</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pago-tab">
            <form id="cerrar_Pedido" class="m-2">
              <div class="col">
                <div class="form-group">
                  <label>Folio de Pago</label>
                  <input type="text" name="folio_pago" placeholder="Folio" class="form-control">
                </div>
                <div class="form-group">
                  <label>Numero de Factura</label>
                  <input type="text" name="numero_factura" placeholder="Factura" class="form-control">
                </div>
                <div class="form-group">
                  <label>Fecha de Pago</label>
                  <input type="date" name="fecha_pago" placeholder="Fecha" class="form-control">
                </div>
                <div class="form-group">
                  <label>Importe</label>
                  <input type="number" name="importe" placeholder="Importe" class="form-control">
                </div>
                <div class="form-group tipoCambio">
                  <label>Tipo de cambio</label>
                  <input type="number" name="tipo_cambio" placeholder="Tipo de cambio" class="form-control">
                </div>
                <div class="form-group">
                  <label>Tipo de pago</label>
                  <select name="tipo_pago" id="tipo_pago" class="selectpicker" required>
                    <option value="1">Tarjeta Credito</option>
                    <option value="2">Tarjeta Debito</option>
                    <option value="3">Efectivo</option>
                    <option value="4">Tranferencia Electronica</option>
                    <option value="5">Monedero Electronico</option>
                  </select>
                </div>
                <div class="form-group infoBanco" id="numero_tarjeta">
                  <label>Numero de Tarjeta</label>
                  <input type="number" name="numero_tarjeta" placeholder="Numero de tarjeta" minlength="4" maxlength="4" class="form-control">
                </div>
                <div class="form-group infoBanco">
                  <label>Banco</label>
                  <select name="banco" id="banco" class="selectpicker" required data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php if ($bancos): ?>
                      <?php foreach ($bancos as $value): ?>
                        <option value="<?=$value['idtbl_bancos']?>"><?= $value['nombre_banco'] ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="form-group infoBanco">
                  <label>Importe pago</label>
                  <input type="number" name="importe_pago" placeholder="Importe pago" class="form-control">
                </div>
              </div>
              <input type="hidden" name="uid_pedido">
              <input type="hidden" name="idtbl_pedidos">
              <input type="hidden" name="iddtl_pagos">
              <input type="hidden" name="estatus">
              <input type="hidden" name="moneda">
              <!--<input type="hidden" name="idtbl_solicitudes_almacen">
              <input type="hidden" name="estimacion">-->
            </form>
            <div class="text-right">
              <button id="btnAgregarEditar" onclick="agregarEditarPagoPedido()" class="btn btn-sm btn-primary">Agregar</button>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button onclick="cerrarPedido()" class="btn btn-primary btnCerrarPedido">Cerrar Pedido</button>
      </div>
    </div>
  </div>
</div>

<section class="tables">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Pedidos Estimación</h3>
      </div>
      <div class="card-body">
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
        </div>
        <a href="<?php echo base_url() ?>pedidosestimacion/excel-pedidos-estimacion" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
        <div class="table-responsive">
          <table class="table table-striped table-sm table-hover" id="tbpedidos">
            <thead>
              <tr>
                <th>UID</th>
                <th>Neodata</th>
                <th>Creación</th>
                <th>Requisición</th>
                <th>Creador</th>
                <th>Proyecto</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>UID</th>
                <th class="estatus">Neodata</th>
                <th>Creación</th>
                <th>Requisición</th>
                <th>Creador</th>
                <th class="estatus">Proyecto</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              <!--<?php if ($pedidos): ?>
              <?php foreach ($pedidos as $key => $value): ?>
              <tr>
                <td><?= $value->uid; ?></td>
                <td><?= $value->neodata_pedido; ?></td>
                <td> <?php echo strftime("%d de %b de %Y a las %r",strtotime($value->fecha_creacion)) ?></td>
                <td> <?= $value->uid_requisicion ?></td>
                <td><?= $value->nombre ?></td>
                <td title="<?= $value->nombre_proyecto ?>"><?= $value->numero_proyecto.' '.$value->nombre_proyecto ?></td>
                <td align="center">
                  <a href="<?= base_url() ?>pedidos/detalle-pedido/<?= $value->uid ?>" title="Detalle">
                    <i class="fa fa-info-circle"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach ?>
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
    $("#tipo_pago").on("change", function(e){
      var value = parseInt($(this).val());
      if(value < 3){
        $(".infoBanco").css("display","block");
      }else if(value == 3){
        var form = $('#myTabContent form');
        var banco = form.find("select[name='banco']");
        banco.val("");
        banco.selectpicker('refresh');
        form.find("input[name='numero_tarjeta']").val("");
        form.find("input[name='importe_pago']").val("");
        $(".infoBanco").css("display","none"); 
      }else{
        var form = $('#myTabContent form');
        form.find("select[name='numero_tarjeta']").val("");
        $(".infoBanco").css("display","block"); 
        form.find("#numero_tarjeta").css("display","none");
      }
    });
  });
  function mostrarDatos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>pedidosestimacion/mostrarPedidos",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.pedidos,function(key,item) {
          clase = "table-warning";
          if(item.estatus == "cancelada") {
            clase = "table-danger";
          }
          if(item.estatus == "cerrada") {
            clase = "table-success";
          }
          filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item.neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" +  item.uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto +"'>" + item.numero_proyecto + ' ' + item.nombre_proyecto + "</td>";
          filas += "<td><a href='" + "<?= base_url() ?>pedidosestimacion/detalle-pedido/" + item.uid + "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
          <?php if($this->session->userdata('tipo') == 7) { ?>
            if(item.estatus != "cancelada") {  
              filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "' data-idtbl_solicitudes_almacen='" + (item.estimacion == "0" ? item.tbl_solicitudes_almacen_idtbl_solicitudes_almacen : item.tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion) + "' data-estimacion='" + item.estimacion + "' data-motivo_cancelacion='" + item.motivo_cancelacion + "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
              /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
            }
            if(item.estatus != "cancelada"){
              filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item.idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" + item.estatus + "' data-moneda='" + item.tipo_moneda + "'><i style = 'color:green;' class='fa fa-check'></i></a>";
            }
          <?php } ?> 
          
          filas +=  "</td></tr>";
        });
        $('#tbpedidos tbody').html(filas);

        $(".cerrarPedido").on("click", function(event){
          event.preventDefault();
          var button = $(this);
          var recipient = button.data();
          dtlCerrarPedido(recipient);
        });

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

  $('#cerrarPedido').on('show.bs.modal', function(event){
    $('#myTab a[href="#tab2"]').addClass("disabled");
    $('#myTab a[href="#tab1"]').tab('show');
  });
  $('#myTab a[href="#tab1"]').on('click', function (e) {
    $('#myTab a[href="#tab2"]').addClass('disabled');
  });
  $('#myTabContent table').on('click', "a" , function (e) {
    e.preventDefault();
  });

  function dtlCerrarPedido(recipient){
    $.ajax({
      url: "<?= base_url() ?>pedidos/pago-pedido",
      type: "POST",
      data: {"idtbl_pedidos": recipient.idPedido},
      dataType: "json",
      success:function(response) {
        var filas = "";
        var modal = $('#cerrarPedido');
        for(var r=0; r<response.length; r++){
          var item = response[r];
          filas += "<tr><td>" + item.folio_pago + "</td><td>" + item.numero_factura + "</td><td>" + item.fecha_pago + "</td><td class='text-right'>$" + item.importe + "</td><td class='text-center'><a href='#' data-folio-pago='" + item.folio_pago + "' data-numero-factura='" + item.numero_factura + "' data-fecha-pago='" + item.fecha_pago + "' data-importe='" + item.importe + "' data-iddtl-pagos='" + item.iddtl_pagos + "' data-iddtl-pedidos='" + item.tbl_pedidos_idtbl_pedidos + "' data-iddtl-bancos='" + item. tbl_bancos_idtbl_bancos + "' data-tipo-cambio='" + item.tipo_cambio + "' data-importe-pago='" + item.importe_pago + "' data-tipo-pago='" + item.tipo_pago + "' data-numero-tarjeta='" + item.numero_tarjeta + "' onclick='editarPagoPedido(this)'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td></tr>"
        }
        modal.find("table tbody").html(filas);
        modal.find("input[name='uid_pedido']").val(recipient.uid_pedido);
        modal.find("input[name='idtbl_pedidos']").val(recipient.idPedido);
        modal.find("input[name='estatus']").val(recipient.estatus);
        modal.find("input[name='moneda']").val(recipient.moneda);
        modal.find(".btnNuevoPago").css("display", recipient.estatus === null || recipient.estatus === "" ? "inline-block" : "none");
        modal.find(".btnCerrarPedido").attr("disabled", recipient.estatus === null || recipient.estatus === "" ? false : true);
        modal.find("#btnAgregarEditar").attr("disabled", recipient.estatus === null || recipient.estatus === "" ? false : true);
        modal.find(".tipoCambio").css("display", recipient.moneda === 'p' ? 'none' : 'block');
        modal.modal('show');
      }
    });
  }

  function agregarEditarPagoPedido(){
    var formData = new FormData($("#cerrar_Pedido")[0]);
    if((formData.get("tipo_pago") < 3 && (formData.get("folio_pago") == "" || formData.get("numero_factura") == "" || formData.get("fecha_pago") == "" || formData.get("importe") == "" || formData.get("banco") == null || formData.get("banco") == "" || formData.get("numero_tarjeta") == "")) || (formData.get("tipo_pago") == 3 && (formData.get("folio_pago") == "" || formData.get("numero_factura") == "" || formData.get("fecha_pago") == "" || formData.get("importe") == "")) || (formData.get("tipo_pago") == 4 && (formData.get("folio_pago") == "" || formData.get("numero_factura") == "" || formData.get("fecha_pago") == "" || formData.get("importe") == "" || formData.get("banco") == null || formData.get("banco") == ""))){
      Toast.fire({
          type: 'error',
          title: 'Es necesario llenar todos los campos'
      });
      return;
    }
    $.ajax({
      url: "<?= base_url()?>pedidos/agregarEditarPagoPedido",
      type: "post",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res) {
        if (res=="OK") { 
          Toast.fire({
            type: 'success',
            title: 'El pago se ha sido cerrado correctamente'
          });
          var modal = $('#cerrarPedido');
          var recipient = { 
            uid_pedido : modal.find("input[name='uid_pedido']").val(),
            idPedido : modal.find("input[name='idtbl_pedidos']").val(),
            estatus: modal.find("input[name='estatus']").val(),
            moneda: modal.find("input[name='moneda']").val()
          }
          dtlCerrarPedido(recipient);
          $('#myTab a[href="#tab2"]').addClass("disabled");
          $('#myTab a[href="#tab1"]').tab('show');
          return;    
        } 
        if(res=="ERROR") {
          Toast.fire({
            type: 'error',
            title: 'Error al crear pago.'
          });
        }
      }
    });
  }

  function nuevoPagoPedido(){
    var form = $('#myTabContent form');
    form.find("input[name='folio_pago']").val("");
    form.find("input[name='numero_factura']").val("");
    form.find("input[name='fecha_pago']").val("");
    form.find("input[name='importe']").val("");
    form.find("input[name='tipo_cambio']").val("");
    form.find("input[name='importe_pago']").val("");
    form.find("input[name='numero_tarjeta']").val("");
    var tipo_pago = form.find("select[name='tipo_pago']");
    tipo_pago.val(1);
    tipo_pago.selectpicker('refresh');
    var banco = form.find("select[name='banco']");
    banco.val("");
    banco.selectpicker('refresh');
    form.find("input[name='iddtl_pagos']").val("");
    $(".infoBanco").css("display","block");
    $("#btnAgregarEditar").html("Agregar");
    $('#myTab a[href="#tab2"]').removeClass("disabled");
    $('#myTab a[href="#tab2"]').tab('show');
  }

  function editarPagoPedido(e){
    var data = $(e).data();
    var form = $('#myTabContent form');
    form.find("input[name='folio_pago']").val(data.folioPago);
    form.find("input[name='numero_factura']").val(data.numeroFactura);
    form.find("input[name='fecha_pago']").val(data.fechaPago);
    form.find("input[name='importe']").val(data.importe);
    form.find("input[name='tipo_cambio']").val(data.tipoCambio);
    form.find("input[name='importe_pago']").val(data.importePago);
    form.find("input[name='numero_tarjeta']").val(data.numeroTarjeta);
    var banco = form.find("select[name='banco']");
    banco.val(data.iddtlBancos);
    banco.selectpicker('refresh');
    var tipo_pago = 1;
    if(data.tipoPago == "Tarjeta Debito")
      tipo_pago = 2;
    else if(data.tipoPago == "Efectivo")
      tipo_pago = 3;
    else if(data.tipoPago == "Tranferencia Electronica")
      tipo_pago = 4;
    else if(data.tipoPago == "Monedero Electronico")
      tipo_pago = 5;
    var banco = form.find("select[name='tipo_pago']");
    banco.val(tipo_pago);
    banco.selectpicker('refresh');
    form.find("input[name='iddtl_pagos']").val(data.iddtlPagos);
    $("#btnAgregarEditar").html("Guardar");
    $('#myTab a[href="#tab2"]').removeClass("disabled");
    if(tipo_pago < 3){
      $(".infoBanco").css("display","block");
    }else if(tipo_pago == 3){
      $(".infoBanco").css("display","none"); 
    }else{
      var form = $('#myTabContent form');
      $(".infoBanco").css("display","block"); 
      form.find("#numero_tarjeta").css("display","none");
    }
    $('#myTab a[href="#tab2"]').tab('show');
  }

  function cerrarPedido(uid_pedido) {
    var formData = new FormData($("#cerrar_Pedido")[0]);
    Swal.fire({
    title: 'Cerrar Pedido?',
    text: "Deseas cerrar el pedido ?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url()?>pedidos/cerrarPedido",
          type: "post",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(res) {
            if (res=="OK") { 
              Toast.fire({
                type: 'success',
                title: 'El pedido ha sido cerrado correctamente'
              });
              mostrarDatos("",1);
              $('#cerrarPedido').modal('hide');
              return;    
            } 
            if(res=="ERROR") {
              Toast.fire({
                  type: 'error',
                  title: 'Error al cerrar el pedido'
              });
            }
          }
        });
      }
    })  
  }

  /*$('#cerrarPedido').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find("input[name='uid_pedido']").val(recipient.uid_pedido);
  });

  function cerrarPedido(uid_pedido) {
    var formData = new FormData($("#cerrar_Pedido")[0]);
    if(formData.get("folio_pago") == "" || formData.get("numero_factura") == "" || formData.get("banco") == ""){
      Toast.fire({
          type: 'error',
          title: 'Es necesario llenar todos los campos'
      });
      return;  
    }
    Swal.fire({
    title: 'Cerrar Pedido?',
    text: "Deseas cerrar el pedido ?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url()?>pedidosestimacion/cerrarPedido",
          type: "post",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(res) {
            if (res=="OK") { 
              Toast.fire({
                type: 'success',
                title: 'El pedido ha sido cerrado correctamente'
              });
              mostrarDatos("",1);
              return;    
            } 
            if(res=="ERROR") {
              Toast.fire({
                  type: 'error',
                  title: 'Error al cerrar el pedido'
              });
            }
          }
        });
      }
    })  
  }*/

  $('#cancelarPedido').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find("input[name='uid_pedido']").val(recipient.uid_pedido);
    modal.find("input[name='idtbl_solicitudes_almacen']").val(recipient.idtbl_solicitudes_almacen);
    modal.find("input[name='estimacion']").val(recipient.estimacion);
    modal.find("textarea[name='motivo_cancelacion']").val(recipient.motivo_cancelacion);
  });

  function cancelarPedido(uid_pedido, idtbl_solicitudes_almacen) {
    if($("textarea[name='motivo_cancelacion']").val() == '') {
      Toast.fire({
          type: 'error',
          title: 'Es necesario agregar un motivo de cancelación'
      });
      return;  
    }
    var formData = new FormData($("#cancelar_Pedido")[0]);
    Swal.fire({
    title: 'Cancelar Pedido?',
    text: "Deseas cancelar el pedido ?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url()?>pedidosestimacion/cancelarPedido",
          type: "post",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(res) {
            if (res=="OK") { 
              Toast.fire({
                type: 'success',
                title: 'El pedido ha sido cancelado correctamente'
              });
              mostrarDatos("",1);
              $('#cancelarPedido').modal('hide');
              return;    
            } 
            if(res=="ERROR") {
              Toast.fire({
                  type: 'error',
                  title: 'Error al cancelar el pedido'
              });
            }
          }
        });
      }
    })
  }
</script>