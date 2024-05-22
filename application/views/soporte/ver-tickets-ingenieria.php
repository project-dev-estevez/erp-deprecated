<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
                <div class="bg-white has-shadow">
                    <a href="<?= base_url() ?>soporte/generar_ticket_ingenieria" class="dropdown-item" title="">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-violet">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="title">
                                <span>Generar<br>Ticket de Ingeniería</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!--<div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
                <div class="bg-white has-shadow">
                    <a href="<?= base_url() ?>soporte/generar-ticket-cv" class="dropdown-item" title="">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-violet">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="title">
                                <span>Generar<br>Ticket de Soporte CV</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
                <div class="bg-white has-shadow">
                    <a href="<?= base_url() ?>soporte/generar-ticket-sistemas" class="dropdown-item" title="">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-violet">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="title">
                                <span>Generar<br>Ticket de Soporte Sistemas</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2 mt-2">
                <div class="bg-white has-shadow">
                    <a href="<?= base_url() ?>soporte/generar-ticket-mantenimiento" class="dropdown-item" title="">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-violet">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="title">
                                <span>Generar<br>Ticket de Mantenimiento</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>-->

        </div>
    </div>
</section>
<section class="projects">

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Tickets</h4>
                    </div>
                    <div>
                        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="pills-soporte-tab" data-toggle="pill" href="#pills-soporte" role="tab" aria-controls="pills-soporte" aria-selected="true">
                                    Tabla
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="pills-sopcv-tab" data-toggle="pill" href="#pills-sopcv" role="tab" aria-controls="pills-sopcv" aria-selected="false">
                                    Grafica
                                </a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link btn" id="pills-sopsis-tab" data-toggle="pill" href="#pills-sopsis" role="tab" aria-controls="pills-sopsis" aria-selected="false">
                                    Soporte Sistemas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="pills-mantenimiento-tab" data-toggle="pill" href="#pills-mantenimiento" role="tab" aria-controls="pills-mantenimiento" aria-selected="false">
                                    Mantenimiento
                                </a>
                            </li>-->
                        </ul>
                        
                        <div class="tab-content" id="pills-tabContent">
                            
                            <!-- Pestaña Soporte -->
                            <div class="tab-pane fade show active" id="pills-soporte" role="tabpanel" aria-labelledby="pills-soporte-tab">
                            <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                                </div>
                                <!--<a href="<?php echo base_url() ?>Soporte/excel_soporte" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>-->
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbtickets">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">uid</th>
                                                <th>Fecha Creación</th>                                        
                                                <th>Cliente</th>                                        
                                                <th>Numero Proyecto</th>
                                                <th>Mercado</th>
                                                <th>Solicitante</th>
                                                <th>Segmento</th>
                                                <th>Área</th>
                                                <th>Dependencia</th>
                                                <th>Coordinador</th>
                                                <th>Supervisor</th>
                                                <th>Proyectista</th>
                                                <th>Estatus Ticket</th>
                                                <th>Fecha Entrega</th>
                                                <th>Tipo Solicitud</th>
                                                <th>Fecha Compromiso</th>
                                                <th>Estatus seguimiento</th>
                                                <th>Especificaciones</th>
                                                <th>Uso Documentos</th>
                                                <th>Observaciones</th>
                                                <th>Documento</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th data-priority="1">uid</th>
                                                <th>Fecha Creación</th>                                        
                                                <th>Cliente</th>                                        
                                                <th>Numero Proyecto</th>
                                                <th>Mercado</th>
                                                <th>Solicitante</th>
                                                <th>Segmento</th>
                                                <th>Área</th>
                                                <th>Dependencia</th>
                                                <th>Coordinador</th>
                                                <th>Supervisor</th>
                                                <th>Proyectista</th>
                                                <th>Estatus Ticket</th>
                                                <th>Fecha Entrega</th>
                                                <th>Tipo Solicitud</th>
                                                <th>Fecha Compromiso</th>
                                                <th>Estatus seguimiento</th>
                                                <th>Especificaciones</th>
                                                <th>Uso Documentos</th>
                                                <th>Observaciones</th>
                                                <th>Documento</th>
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
                            <!-- Termina pestaña Soporte -->

                            <!-- Pestaña Soporte Control Vehicular -->
                            <div class="tab-pane fade" id="pills-sopcv" role="tabpanel" aria-labelledby="pills-sopcv-tab">
                            <div class="card-body">
                                    <h3>Total tickets</h3>
                                    <div class="text-right">
                                        <div class="col-3">
                                        <!--<select class="form-control" id="estatus" onchange="obtener_costos_estatus(this)">
                                            <option value="">Almacen y Asignados</option>
                                            <option value="almacen">Almacen</option>
                                            <option value="asignado">Asignado</option>
                                            <option value="descompuesto">Descompuesto</option>
                                            <option value="robado">Robado</option>
                                            <option value="abuso de confianza">abuso de confianza</option>
                                        </select>-->
                                        </div>
                                    </div>
                                    <div class="chart text-center">
                                        <canvas id="costosAltoCosto"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- Termina pestaña Soporte Control Vehicular -->

                            <!-- Pestaña Soporte Sistemas -->
                            <div class="tab-pane fade" id="pills-sopsis" role="tabpanel" aria-labelledby="pills-sopsis-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
                                </div>
                                <a href="<?php echo base_url() ?>Soporte/excel_soporteSist" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbtickets-sopsis">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">uidsis</th>
                                                <th>Fecha Creación</th>                                        
                                                <th>Autor</th>                                        
                                                <th>Tipo</th>
                                                <th>Estatus</th>
                                                <th>Prioridad</th>
                                                <th>Fecha Aprobación DW</th>
                                                <th>Desarrollador</th>
                                                <th>Porcentaje</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th data-priority="1">uid</th>
                                                <th>Fecha Creación</th>                                        
                                                <th>Autor</th>                                        
                                                <th>Tipo</th>
                                                <th>Estatus</th>
                                                <th>Prioridad</th>
                                                <th>Fecha Aprobación DW</th>
                                                <th>Desarrollador</th>
                                                <th>Porcentaje</th>
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
                            <!-- Termina pestaña Soporte Sistemas -->

                            <!-- Pestaña Soporte Mantenimiento -->
                            <div class="tab-pane fade" id="pills-mantenimiento" role="tabpanel" aria-labelledby="pills-mantenimiento-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda4">
                                </div>
                                <a href="<?php echo base_url() ?>Soporte/excel_mantenimiento" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbtickets-mant">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">uidman</th>
                                                <th>Fecha Creación</th>                                        
                                                <th>Autor</th>                                        
                                                <th>Tipo</th>
                                                <th>Estatus</th>
                                                <th>Prioridad</th>
                                                <th>Fecha Aprobación DW</th>
                                                <th>Desarrollador</th>
                                                <th>Porcentaje</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th data-priority="1">uid</th>
                                                <th>Fecha Creación</th>                                        
                                                <th>Autor</th>                                        
                                                <th>Tipo</th>
                                                <th>Estatus</th>
                                                <th>Prioridad</th>
                                                <th>Fecha Aprobación DW</th>
                                                <th>Desarrollador</th>
                                                <th>Porcentaje</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        </tbody>

                                    </table>
                                    <br>
                                    <div class="paginacion4">

                                    </div>
                                </div>
                            </div>
                            <!-- Termina pestaña Soporte Mantenimiento -->

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--<div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">

                        <h4>Tickets</h4>

                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                        </div>
                        <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbtickets">
                                <thead>
                                    <tr>
                                        <th data-priority="1">uid</th>
                                        <th>Fecha Creación</th>                                        
                                        <th>Autor</th>                                        
                                        <th>Tipo</th>
                                        <th>Estatus</th>
                                        <th>Prioridad</th>
                                        <th>Fecha Aprobación DW</th>
                                        <th>Desarrollador</th>
                                        <th>Porcentaje</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th data-priority="1">uid</th>
                                        <th>Fecha Creación</th>                                        
                                        <th>Autor</th>                                        
                                        <th>Tipo</th>
                                        <th>Estatus</th>
                                        <th>Prioridad</th>
                                        <th>Fecha Aprobación DW</th>
                                        <th>Desarrollador</th>
                                        <th>Porcentaje</th>
                                        <th></th>
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
        </div>
    </div>-->
</section>

<script>
/*global $, document, Chart, LINECHART, data, options, window*/
<?php
    echo "var total_tickets = ". json_encode($totalTickets). ";\n";   
?>
graficar_tickets();
        console.log(total_tickets);
        var myBarChart5;

        function graficar_tickets() {
            var estatus = [];
            var array_total = [];
            for (var r = 1; r <= total_tickets.length; r++) {
                var index = r - 1;
                if (total_tickets != undefined) {
                    array_total[index] = parseFloat(total_tickets[index].total).toFixed(2);
                    estatus[index] = total_tickets[index].estatus;
                } else {
                    array_total[index] = 0;
                }
            }
            //$("#total_ganancias").html(total_ganancias);
            var BARCHART5 = $("#costosAltoCosto");
            myBarChart5 = new Chart(BARCHART5, {
                type: 'bar',
                stack: '',
                data: {
                    labels: estatus,
                    datasets: [{
                        data: array_total,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: ['#55e6a0', '#71d1f2', '#f2993e'],
                        hoverBackgroundColor: ['#55e6a0', '#71d1f2', '#f2993e']
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });
        }


        
</script>


<script>
$(document).ready(function() {          
    selectBuscar = "";
    mostrarDatos("", 1, "");

    $("select[name='select']").on('change', function() {
        selectBuscar = $(this).val();
        mostrarDatos('', 1, selectBuscar);
    });

    $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar, 1, selectBuscar);
    });

    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar, valorHref, selectBuscar);
    });

});




function mostrarDatos(valorBuscar, pagina, valorBuscar2) {    
    $.ajax({
        url: "<?= base_url() ?>soporte/mostrarTicketsIngenieria",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            estatus = "";
            porcentaje = "";
            estatus_seguimiento = "";
            $.each(response.tickets, function(key, item) {
                if (item.estatus == '') {
                    estatus = 'Pendiente Aprobación DW';
                    clase = 'table-secondary';
                    porcentaje = '33%';
                } else if (item.estatus == 'En proceso') {
                    estatus = 'Aprobado por DW';
                    clase = 'table-warning';
                    porcentaje = '66%'
                } else if (item.estatus == 'Listo') {
                    estatus = 'Finalizado';
                    clase = 'table-success';
                    porcentaje = '100%';
                } else if (item.estatus == 'En espera') {
                    estatus = 'En curso';
                    clase = 'table-danger';
                    porcentaje = '80%';
                } else {
                    estatus = 'Cancelada';
                    clase = 'table-danger';
                    porcentaje = '0%';
                }
                if(item.estatus_seguimiento == 'Entregado'){
                    estatus_seguimiento = "class='table-success'";
                } else if(item.estatus_seguimiento == 'Vo. Bo. Coordinacion'){
                    estatus_seguimiento = "class='table-info'";
                } else if(item.estatus_seguimiento == 'Terminado'){
                    estatus_seguimiento = "class='table-warning'";
                } else if(item.estatus_seguimiento == 'Proyeccion'){
                    estatus_seguimiento = "style='background-color:#B255CD'"
                } else if(item.estatus_seguimiento == 'Modificacion Operacion'){
                    estatus_seguimiento = "style='background-color:#E79825'"
                } else if(item.estatus_seguimiento == 'Modificacion Derecho de Via'){
                    estatus_seguimiento = "class='table-danger'";
                }else{
                    estatus_seguimiento = "class='table-secondary'";
                }
                var especificaciones = item.especificaciones;
                if(especificaciones !== null){
                    var new_esp = especificaciones.slice(0,19);
                }else{
                    var new_esp = null;
                }
                filas += "<tr>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.fecha + "</td>";                
                filas += "<td>" + item.nombre_comercial + "</td>";
                filas += "<td>" + item.numero_proyecto + "</td>";
                filas += "<td>" + item.mercado + "</td>";
                filas += "<td>" + item.autor + "</td>";
                filas += "<td>" + item.segmento + "</td>";
                filas += "<td>" + item.area + "</td>";
                filas += "<td>" + item.dependencia + "</td>";
                filas += "<td>" + item.nombre_desarrollador + "</td>";
                if(<?= $this->session->userdata("id") ?> == item.id_coordinador) {
                    filas += "<td><select onchange='actualizar_supervisor(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><?php foreach($usuarios AS $key => $value){ ?><option value='<?= $value->idtbl_users ?>'" + (item.tbl_users_idtbl_users_supervisor == <?= $value->idtbl_users ?> ? 'selected' : '') + "><?= $value->nombre ?></option><?php } ?></select></td>";
                }else{
                    filas += "<td>" + item.nombre_supervisor + "</td>";
                }
                if(<?= $this->session->userdata("id") ?> == item.id_coordinador) {
                    filas += "<td><select onchange='actualizar_proyectista(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><?php foreach($usuarios AS $key => $value){ ?><option value='<?= $value->idtbl_users ?>'" + (item.tbl_user_idtbl_users_proyectista == <?= $value->idtbl_users ?> ? 'selected' : '') + "><?= $value->nombre ?></option><?php } ?></select></td>";
                }else{
                    filas += "<td>" + item.nombre_proyectista + "</td>";
                }
                if(<?= $this->session->userdata("id") ?> == item.id_coordinador) {
                    filas += "<td class='"+clase+"'><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='Listo'" + (item.estatus == 'Listo' ? 'selected' : '') + ">Listo</option><option value='En espera'" + (item.estatus == 'En espera' ? 'selected' : '') + ">En espera</option><option value='En proceso'" + (item.estatus == 'En proceso' ? 'selected' : '') + ">En proceso</option><option value=''" + (item.estatus == '' ? 'selected' : '') + "> </option></select></td>";
                }else{
                    filas += "<td class='"+clase+"'>" + item.estatus + "</td>";
                }
                filas += "<td>" + item.fecha_entrega + "</td>";
                filas += "<td>" + item.tipo + "</td>";
                if(<?= $this->session->userdata("id") ?> == item.id_coordinador) {
                    filas += "<td><input type='date' onchange='actualizar_fecha_compromiso(this.value,\"" + item.uid + "\")' class='form-control' value='"+(item.fecha_compromiso != null ? item.fecha_compromiso : '')+"' uid='" + item.uid + "'>";
                }else{
                    filas += "<td>" + item.fecha_compromiso + "</td>";
                }
                if(<?= $this->session->userdata("id") ?> == item.id_proyectista) {
                    filas += "<td "+estatus_seguimiento+"><select onchange='actualizar_estatus_seguimiento(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='Entregado'" + (item.estatus_seguimiento == 'Entregado' ? 'selected' : '') + ">Entregado</option><option value='Vo. Bo. Coordinacion'" + (item.estatus_seguimiento == 'Vo. Bo. Coordinacion' ? 'selected' : '') + ">Vo. Bo. Coordinacion</option><option value='Terminado'" + (item.estatus_seguimiento == 'Terminado' ? 'selected' : '') + ">Terminado</option><option value='Proyeccion'" + (item.estatus_seguimiento == 'Proyeccion' ? 'selected' : '') + ">Proyeccion</option><option value='Modificacion Operacion'" + (item.estatus_seguimiento == 'Modificacion Operacion' ? 'selected' : '') + ">Modificacion Operacion</option><option value='Modificacion Derecho de Via'" + (item.estatus_seguimiento == 'Modificacion Derecho de Via' ? 'selected' : '') + ">Modificacion Derecho de Via</option></select></td>";
                }else{
                    filas += "<td "+estatus_seguimiento+">" + item.estatus_seguimiento + "</td>";
                }
                filas += "<td><span data-toggle='tooltip' data-placement='left' title='"+item.especificaciones+"'>" + new_esp + "</span></td>";
                filas += "<td>" + item.uso + "</td>";
                filas += "<td>" + item.observaciones + "</td>";
                filas += "<td><a href='<?= base_url() ?>uploads/soporte/" + item.uid + "/"+item.archivo+"' download><i class='fa fa-file-pdf-o'></i></a></td>";

                
               
                filas += "</tr>";
            });
            $('#tbtickets tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";      
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
            $(".paginacion").html(paginador);
        }
    });
}

function actualizar(valor,uid) {
    //$(".btn_status").on('change', function() {
        // console.log("select::", $(this).attr('uid'))
        console.log("this.value::", valor)
        console.log("uid:", uid);
        if ( valor == '' ) {
            console.log('Error null');
            return;
        } 
       
        Swal.fire({
            title: '¿Deseas confirmar el movimiento?',
            text: "Cofirmación movimiento",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
    if (result.value) {
          var formData = new FormData();
          formData.append("token", "<?=$this->session->userdata('token');?>");
          formData.append("uid", uid );
          formData.append("estatus", valor)
          $data = formData;
          // console.log(formData); return;
            $.ajax({
                url: "<?= base_url() ?>soporte/changeStatus",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log("res1 ",res)
                    var resp = JSON.parse(res.responseText);
                    // console.log("res2 ",res)
                    if (resp.error==false) {
                        window.location.replace("<?= base_url()?>soporte/ticket_ingenieria");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
        }
    });
     
  //});
  }

  function actualizar_estatus_seguimiento(valor,uid) {
    //$(".btn_status").on('change', function() {
        // console.log("select::", $(this).attr('uid'))
        console.log("this.value::", valor)
        console.log("uid:", uid);
        if ( valor == '' ) {
            console.log('Error null');
            return;
        } 
       

        Swal.fire({
            title: '¿Deseas confirmar el movimiento?',
            text: "Cofirmación movimiento",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
    if (result.value) {
          var formData = new FormData();
          formData.append("token", "<?=$this->session->userdata('token');?>");
          formData.append("uid", uid );
          formData.append("estatus", valor)
          $data = formData;
          // console.log(formData); return;
            $.ajax({
                url: "<?= base_url() ?>soporte/changeStatusSeguimiento",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log("res1 ",res)
                    var resp = JSON.parse(res.responseText);
                    // console.log("res2 ",res)
                    if (resp.error==false) {
                        window.location.replace("<?= base_url()?>soporte/ticket_ingenieria");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
        }
    });
     
  //});
  }

  function actualizar_supervisor(valor,uid) {
    //$(".btn_status").on('change', function() {
        // console.log("select::", $(this).attr('uid'))
        console.log("this.value::", valor)
        console.log("uid:", uid);
        if ( valor == '' ) {
            console.log('Error null');
            return;
        } 
       

        Swal.fire({
            title: '¿Deseas confirmar el movimiento?',
            text: "Cofirmación movimiento",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
    if (result.value) {
          var formData = new FormData();
          formData.append("token", "<?=$this->session->userdata('token');?>");
          formData.append("uid", uid );
          formData.append("supervisor", valor)
          $data = formData;
          // console.log(formData); return;
            $.ajax({
                url: "<?= base_url() ?>soporte/changeSupervisor",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log("res1 ",res)
                    var resp = JSON.parse(res.responseText);
                    // console.log("res2 ",res)
                    if (resp.error==false) {
                        window.location.replace("<?= base_url()?>soporte/ticket_ingenieria");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
        }
    });
     
  //});
  }

  function actualizar_proyectista(valor,uid) {
    //$(".btn_status").on('change', function() {
        // console.log("select::", $(this).attr('uid'))
        console.log("this.value::", valor)
        console.log("uid:", uid);
        if ( valor == '' ) {
            console.log('Error null');
            return;
        } 
       

        Swal.fire({
            title: '¿Deseas confirmar el movimiento?',
            text: "Cofirmación movimiento",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
    if (result.value) {
          var formData = new FormData();
          formData.append("token", "<?=$this->session->userdata('token');?>");
          formData.append("uid", uid );
          formData.append("proyectista", valor)
          $data = formData;
          // console.log(formData); return;
            $.ajax({
                url: "<?= base_url() ?>soporte/changeProyectista",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log("res1 ",res)
                    var resp = JSON.parse(res.responseText);
                    // console.log("res2 ",res)
                    if (resp.error==false) {
                        window.location.replace("<?= base_url()?>soporte/ticket_ingenieria");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
        }
    });
     
  //});
  }

  function actualizar_fecha_compromiso(valor,uid) {
    //$(".btn_status").on('change', function() {
        // console.log("select::", $(this).attr('uid'))
        console.log("this.value::", valor)
        console.log("uid:", uid);
        if ( valor == '' ) {
            console.log('Error null');
            return;
        } 
       

        Swal.fire({
            title: '¿Deseas confirmar el movimiento?',
            text: "Cofirmación movimiento",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
    if (result.value) {
          var formData = new FormData();
          formData.append("token", "<?=$this->session->userdata('token');?>");
          formData.append("uid", uid );
          formData.append("fecha_compromiso", valor)
          $data = formData;
          // console.log(formData); return;
            $.ajax({
                url: "<?= base_url() ?>soporte/changeFechaCompromiso",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log("res1 ",res)
                    var resp = JSON.parse(res.responseText);
                    // console.log("res2 ",res)
                    if (resp.error==false) {
                        window.location.replace("<?= base_url()?>soporte/ticket_ingenieria");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
        }
    })
     
  //});
  }


function mostrarDatosCV(valorBuscar, pagina, valorBuscar2) {    
    $.ajax({
        url: "<?= base_url() ?>soporte/mostrarTicketsCV",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            estatus = "";
            porcentaje = "";
            $.each(response.tickets, function(key, item) {
                if (item.estatus == 'creado') {
                    estatus = 'Pendiente Aprobación CV';
                    clase = 'table-secondary';
                    porcentaje = '33%';
                } else if (item.estatus == 'CV') {
                    estatus = 'Aprobado por CV';
                    clase = 'table-warning';
                    porcentaje = '66%'
                } else if (item.estatus == 'R') {
                    estatus = 'Finalizado';
                    clase = 'table-success';
                    porcentaje = '100%';
                } else if (item.estatus == 'SI') {
                    estatus = 'En curso';
                    clase = 'table-info';
                    porcentaje = '80%';
                } else {
                    estatus = 'Cancelada';
                    clase = 'table-danger';
                    porcentaje = '0%';
                }
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.fecha + "</td>";                
                filas += "<td>" + item.autor + "</td>"                
                filas += "<td>" + item.tipo + "</td>";
                filas += "<td>" + estatus + "</td>";
                filas += "<td>" + item.prioridad + "</td>";
                if (item.fecha_aprobacion_dw == null){
                    filas += "<td>--</td>"
                }else{
                    filas += "<td>" + item.fecha_aprobacion_dw + "</td>"
                }
                if (item.nombre_desarrollador == null) {
                    filas += "<td>No asignado</td>";
                } else {
                    filas += "<td>" + item.nombre_desarrollador + "</td>";
                }   
                filas += "<td>" + porcentaje + "</td>";
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "soporte/detalle-ticket/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";               
                filas += "</tr>";
            });
            $('#tbtickets-sopcv tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
    
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
            $(".paginacion2").html(paginador);
        }
    });
}

function mostrarDatosSis(valorBuscar, pagina, valorBuscar2) {    
    $.ajax({
        url: "<?= base_url() ?>soporte/mostrarTicketsSistemas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            estatus = "";
            porcentaje = "";
            $.each(response.tickets, function(key, item) {
                if (item.estatus == 'creado') {
                    estatus = 'Pendiente Aprobación Sistemas';
                    clase = 'table-secondary';
                    porcentaje = '33%';
                } else if (item.estatus == 'TI') {
                    estatus = 'Aprobado por Sistemas';
                    clase = 'table-warning';
                    porcentaje = '66%'
                } else if (item.estatus == 'R') {
                    estatus = 'Finalizado';
                    clase = 'table-success';
                    porcentaje = '100%';
                } else if (item.estatus == 'SI') {
                    estatus = 'En curso';
                    clase = 'table-info';
                    porcentaje = '80%';
                } else {
                    estatus = 'Cancelada';
                    clase = 'table-danger';
                    porcentaje = '0%';
                }
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.fecha + "</td>";                
                filas += "<td>" + item.autor + "</td>"                
                filas += "<td>" + item.tipo + "</td>";
                filas += "<td>" + estatus + "</td>";
                filas += "<td>" + item.prioridad + "</td>";
                if (item.fecha_aprobacion_dw == null){
                    filas += "<td>--</td>"
                }else{
                    filas += "<td>" + item.fecha_aprobacion_dw + "</td>"
                }
                if (item.nombre_desarrollador == null) {
                    filas += "<td>No asignado</td>";
                } else {
                    filas += "<td>" + item.nombre_desarrollador + "</td>";
                }
                              
                filas += "<td>" + porcentaje + "</td>";
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "soporte/detalle-ticket/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";               
                filas += "</tr>";
            });
            $('#tbtickets-sopsis tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
           
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
            $(".paginacion3").html(paginador);
        }
    });
}

function mostrarDatosMant(valorBuscar, pagina, valorBuscar2) {    
    $.ajax({
        url: "<?= base_url() ?>soporte/mostrarTicketsMantenimiento",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            estatus = "";
            porcentaje = "";
            $.each(response.tickets, function(key, item) {
                if (item.estatus == 'creado') {
                    estatus = 'Pendiente Aprobación Mantenimiento';
                    clase = 'table-secondary';
                    porcentaje = '30%';
                } else if (item.estatus == 'M') {
                    estatus = 'Aprobado por Mantenimiento';
                    clase = 'table-warning';
                    porcentaje = '60%'
                } else if (item.estatus == 'MF') {
                    estatus = 'Verificación usuario';
                    clase = 'table-info';
                    porcentaje = '90%'
                }  else if (item.estatus == 'R') {
                    estatus = 'Finalizado';
                    clase = 'table-success';
                    porcentaje = '100%';
                } else if (item.estatus == 'SI') {
                    estatus = 'En curso';
                    clase = 'table-info';
                    porcentaje = '80%';
                } else {
                    estatus = 'Cancelada';
                    clase = 'table-danger';
                    porcentaje = '0%';
                }
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.fecha + "</td>";                
                filas += "<td>" + item.autor + "</td>"                
                filas += "<td>" + item.tipo + "</td>";
                filas += "<td>" + estatus + "</td>";
                filas += "<td>" + item.prioridad + "</td>";
                if (item.fecha_aprobacion_dw == null){
                    filas += "<td>--</td>"
                }else{
                    filas += "<td>" + item.fecha_aprobacion_dw + "</td>"
                }
                if (item.nombre_desarrollador == null) {
                    filas += "<td>No asignado</td>";
                } else {
                    filas += "<td>" + item.nombre_desarrollador + "</td>";
                }
                              
                filas += "<td>" + porcentaje + "</td>";
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "soporte/detalle-ticket/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";               
                filas += "</tr>";
            });
            $('#tbtickets-mant tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
           
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
            $(".paginacion4").html(paginador);
        }
    });
}
</script>