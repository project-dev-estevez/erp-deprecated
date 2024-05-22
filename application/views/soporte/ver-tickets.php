<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
                <div class="bg-white has-shadow">
                    <a href="<?= base_url() ?>soporte/generar-ticket" class="dropdown-item" title="">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-violet">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="title">
                                <span>Generar<br>Ticket de Soporte Desarrollo Web</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
                <div class="bg-white has-shadow">
                    <a href="<?= base_url() ?>soporte/generar-ticket-cv" class="dropdown-item" title="">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-violet">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="title">
                                <span>Generar<br>Ticket de Soporte Control Vehicular</span>
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
            </div>

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
                                    Soporte
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="pills-sopcv-tab" data-toggle="pill" href="#pills-sopcv" role="tab" aria-controls="pills-sopcv" aria-selected="false">
                                    Soporte CV
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="pills-sopsis-tab" data-toggle="pill" href="#pills-sopsis" role="tab" aria-controls="pills-sopsis" aria-selected="false">
                                    Soporte Sistemas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="pills-mantenimiento-tab" data-toggle="pill" href="#pills-mantenimiento" role="tab" aria-controls="pills-mantenimiento" aria-selected="false">
                                    Mantenimiento
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="pills-ingenieria-tab" data-toggle="pill" href="#pills-ingenieria" role="tab" aria-controls="pills-ingenieria" aria-selected="false">
                                    Ingeniería
                                </a>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="pills-tabContent">
                            
                            <!-- Pestaña Soporte -->
                            <div class="tab-pane fade show active" id="pills-soporte" role="tabpanel" aria-labelledby="pills-soporte-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                                </div>
                                <a href="<?php echo base_url() ?>Soporte/excel_soporte" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
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
                            <!-- Termina pestaña Soporte -->

                            <!-- Pestaña Soporte Control Vehicular -->
                            <div class="tab-pane fade" id="pills-sopcv" role="tabpanel" aria-labelledby="pills-sopcv-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
                                </div>
                                <a href="<?php echo base_url() ?>Soporte/excel_soporteCV" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbtickets-sopcv">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">UID CV</th>
                                                <th>Fecha Creación</th>                                        
                                                <th>Autor</th>
                                                <th>Eco</th>                                                                              
                                                <th>Tipo</th>
                                                <th>Estatus</th>
                                                <th>Prioridad</th>
                                                <th>Fecha Aprobación CV</th>
                                                <th>Técnico</th>
                                                <th>Porcentaje</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th data-priority="1">uid</th>
                                                <th>Fecha Creación</th>                                        
                                                <th>Autor</th>
                                                <th>Eco</th>                                        
                                                <th>Tipo</th>
                                                <th>Estatus</th>
                                                <th>Prioridad</th>
                                                <th>Fecha Aprobación CV</th>
                                                <th>Técnico</th>
                                                <th>Porcentaje</th>
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
                                                <th>Atiende</th>
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
                                                <th>Atiende</th>
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
                                                <th>Atiende</th>
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
                                                <th>Atiende</th>
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

                            <!-- Pestaña Soporte Ingeniería -->
                            <div class="tab-pane fade" id="pills-ingenieria" role="tabpanel" aria-labelledby="pills-ingenieria-tab">
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="pills-tablaing-tab" data-toggle="pill" href="#pills-tablaing" role="tab" aria-controls="pills-tablaing" aria-selected="true">
                                    Tabla
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="pills-graficaing-tab" data-toggle="pill" href="#pills-graficaing" role="tab" aria-controls="pills-graficaing" aria-selected="false">
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
                            <div class="tab-pane fade show active" id="pills-tablaing" role="tabpanel" aria-labelledby="pills-tablaing-tab">
                            <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaTablaing">
                                </div>
                                <!--<a href="<?php echo base_url() ?>Soporte/excel_soporte" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>-->
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbticketsTablaing">
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
                                                <th>Estatus Ticket</th>
                                                <th>Supervisor</th>
                                                <th>Estatus Supervisor</th>
                                                <th>Proyectista</th>
                                                <th>Estatus seguimiento</th>
                                                <th>Fecha Entrega</th>
                                                <th>Tipo Solicitud</th>
                                                <th>Fecha Compromiso</th>
                                                
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
                                                <th>Estatus Ticket</th>
                                                <th>Supervisor</th>
                                                <th>Estatus Supervisor</th>
                                                <th>Proyectista</th>
                                                <th>Estatus seguimiento</th>
                                                <th>Fecha Entrega</th>
                                                <th>Tipo Solicitud</th>
                                                <th>Fecha Compromiso</th>
                                                
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
                                    <div class="paginacionTablaing">

                                    </div>
                                </div>    
                            
                            </div>
                            <!-- Termina pestaña Soporte -->

                            <!-- Pestaña Soporte Control Vehicular -->
                            <div class="tab-pane fade" id="pills-graficaing" role="tabpanel" aria-labelledby="pills-graficaing-tab">
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

                                    <div class="row">
                                        <!-- Line Chart -->
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="work-amount card">
                                                <div class="card-body">
                                                    <h3>Productividad por usuario</h3><small>Tickets</small>
                                                    <div class="text-right">
                                                        <select id="year" style="width:100%; max-width: 300px;">
                                                        </select>    
                                                    </div>
                                                    <div class="chart text-center">                            
                                                        <canvas id="bar-chart-productividad" width="800" height="350"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

$(document).ready(function() {          
    selectBuscar = "";
    mostrarDatosCV("", 1, "");

    $("select[name='select']").on('change', function() {
        selectBuscar = $(this).val();
        mostrarDatosCV('', 1, selectBuscar);
    });

    $("input[name='busqueda2']").keyup(function() {
        textoBuscar = $("input[name='busqueda2']").val();
        mostrarDatosCV(textoBuscar, 1, selectBuscar);
    });

    $("body").on("click", ".paginacion2 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda2']").val();
        mostrarDatosCV(valorBuscar, valorHref, selectBuscar);
    });

});

$(document).ready(function() {          
    selectBuscar = "";
    mostrarDatosSis("", 1, "");

    $("select[name='select']").on('change', function() {
        selectBuscar = $(this).val();
        mostrarDatosSis('', 1, selectBuscar);
    });

    $("input[name='busqueda3']").keyup(function() {
        textoBuscar = $("input[name='busqueda3']").val();
        mostrarDatosSis(textoBuscar, 1, selectBuscar);
    });

    $("body").on("click", ".paginacion3 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda3']").val();
        mostrarDatosSis(valorBuscar, valorHref, selectBuscar);
    });

});

$(document).ready(function() {          
    selectBuscar = "";
    mostrarDatosMant("", 1, "");

    $("select[name='select']").on('change', function() {
        selectBuscar = $(this).val();
        mostrarDatosMant('', 1, selectBuscar);
    });

    $("input[name='busqueda4']").keyup(function() {
        textoBuscar = $("input[name='busqueda4']").val();
        mostrarDatosMant(textoBuscar, 1, selectBuscar);
    });

    $("body").on("click", ".paginacion4 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda4']").val();
        mostrarDatosMant(valorBuscar, valorHref, selectBuscar);
    });

});


function mostrarDatos(valorBuscar, pagina, valorBuscar2) {    
    $.ajax({
        url: "<?= base_url() ?>soporte/mostrarTickets",
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
                    estatus = 'Pendiente Aprobación DW';
                    clase = 'table-secondary';
                    porcentaje = '33%';
                } else if (item.estatus == 'DW') {
                    estatus = 'Aprobado por DW';
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
                <?php if($this->session->userdata('id') == 121){ ?>               
                if (item.estatus != 'R' && item.estatus != 'cancelado' && item.estatus == 'creado') {
                    filas += "<td><select onchange=actualizar_dw(this," + item
                        .idtbl_tickets +
                        ") class='form-control btn-atiende' data-selected='" + item.tbl_users_idtbl_users_dw + "' data-estatus='" + item.estatus + "'><option value''>Seleccione...</option>";
                        filas += "<?php foreach($desarrolladores as $item){ ?><option value='<?= $item->idtbl_users  ?>'" + (item.tbl_users_idtbl_users_dw == <?= $item->idtbl_users  ?> ? "selected" : "" ) + "><?= $item->nombre ?></option><?php } ?>";                    
                    filas += "</select></td>";
                } 
                else if(item.estatus != 'R' && item.estatus != 'cancelado' && item.estatus != 'creado'){
                    filas += "<td><select onchange=actualizar_dw_dos(this," + item
                        .idtbl_tickets +
                        ") class='form-control btn-atiende' data-selected='" + item.tbl_users_idtbl_users_dw + "' data-estatus='" + item.estatus + "'><option value''>Seleccione...</option>";
                        filas += "<?php foreach($desarrolladores as $item){ ?><option value='<?= $item->idtbl_users  ?>'" + (item.tbl_users_idtbl_users_dw == <?= $item->idtbl_users  ?> ? "selected" : "" ) + "><?= $item->nombre ?></option><?php } ?>";                    
                    filas += "</select></td>";
                }
                else {
                if(item.estatus == 'cancelado'){
                filas += "<td>" + "Cancelado" + "</td>";
                }else{
                    filas += "<td>" + item.nombre_desarrollador + "</td>";
                }}
                <?php }else{ ?>
                if (item.tbl_users_idtbl_users_dw == null) {
                    filas += "<td>No asignado</td>";
                } else {
                    filas += "<td>" + item.nombre_desarrollador + "</td>";
                }
                <?php } ?>                                        
                filas += "<td>" + porcentaje + "</td>";
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "soporte/detalle-ticket/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";               
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
                filas += "<td>" + item.autor + "</td>";  
                filas += "<td>" + item.numero_interno + "</td>";                
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
                if(item.autor == null){
                    filas += "<td>" + item.nomb + ' ' + item.paterno + ' ' + item.materno + "</td>";
                }else{
                    filas += "<td>" + item.autor + "</td>";                
                }                
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
                        backgroundColor: ['#7A7A7A', '#71d1f2', '#f2993e', '#ECD01F', '#2CB600', '#E426ED'],
                        hoverBackgroundColor: ['#7A7A7A', '#71d1f2', '#f2993e', '#ECD01F', '#2CB600', '#E426ED']
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
    mostrarDatosIngenieria("", 1, "");

    $("select[name='select']").on('change', function() {
        selectBuscar = $(this).val();
        mostrarDatosIngenieria('', 1, selectBuscar);
    });

    $("input[name='busquedaTablaing']").keyup(function() {
        textoBuscar = $("input[name='busquedaTablaing']").val();
        mostrarDatosIngenieria(textoBuscar, 1, selectBuscar);
    });

    $("body").on("click", ".paginacionTablaing li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaTablaing']").val();
        mostrarDatosIngenieria(valorBuscar, valorHref, selectBuscar);
    });

});




function mostrarDatosIngenieria(valorBuscar, pagina, valorBuscar2) {    
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
            estatus_supervisor = "";
            $.each(response.tickets, function(key, item) {
                if (item.estatus == 'Entregado') {
                    clase = "class='table-success'";
                    porcentaje = '33%';
                } else if (item.estatus == 'Vo. Bo. Coordinacion') {
                    clase = "class='table-info'";
                    porcentaje = '66%'
                } else if (item.estatus == 'Terminado') {
                    clase = "class='table-warning'";
                    porcentaje = '100%';
                } else if (item.estatus == 'Proyeccion') {
                    clase = "style='background-color:#B255CD'";
                    porcentaje = '80%';
                } else if(item.estatus == 'Modificacion Operacion'){
                    clase = "style='background-color:#E79825'";
                } else if(item.estatus == 'Modificacion Derecho de Via'){
                    clase = "class='table-danger'";
                } else {
                    estatus = 'Cancelada';
                    clase = 'table-danger';
                    porcentaje = '0%';
                }
                if(item.estatus_seguimiento == 'En proceso'){
                    estatus_seguimiento = "class='table-info'";
                } else if(item.estatus_seguimiento == 'Revision'){
                    estatus_seguimiento = "class='table-warning'";
                } else if(item.estatus_seguimiento == 'Terminado'){
                    estatus_seguimiento = "class='table-success'";
                } else{
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
                    filas += "<td "+clase+"><select style='width: 130px;' onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='Entregado'" + (item.estatus == 'Entregado' ? 'selected' : '') + ">Entregado</option><option value='Vo. Bo. Coordinacion'" + (item.estatus == 'Vo. Bo. Coordinacion' ? 'selected' : '') + ">Vo. Bo. Coordinacion</option><option value='Terminado'" + (item.estatus == 'Terminado' ? 'selected' : '') + ">Terminado</option><option value='Proyeccion'" + (item.estatus == 'Proyeccion' ? 'selected' : '') + ">Proyeccion</option><option value='Modificacion Operacion'" + (item.estatus == 'Modificacion Operacion' ? 'selected' : '') + ">Modificacion Operacion</option><option value='Modificacion Derecho de Via'" + (item.estatus == 'Modificacion Derecho de Via' ? 'selected' : '') + ">Modificacion Derecho de Via</option><option value='Cancelado y/o detenido'" + (item.estatus == 'Cancelado y/o detenido' ? 'selected' : '') + ">Cancelado y/o detenido</option></select></td>";

                }else{
                    filas += "<td "+clase+">" + item.estatus + "</td>";
                }
                if(<?= $this->session->userdata("id") ?> == item.id_coordinador) {
                    filas += "<td><select style='width: 130px;' onchange='actualizar_supervisor(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><?php foreach($usuarios AS $key => $value){ ?><option value='<?= $value->idtbl_users ?>'" + (item.tbl_users_idtbl_users_supervisor == <?= $value->idtbl_users ?> ? 'selected' : '') + "><?= $value->nombre ?></option><?php } ?></select></td>";
                }else{
                    filas += "<td>" + item.nombre_supervisor + "</td>";
                }
                if(<?= $this->session->userdata("id") ?> == item.id_supervisor) {
                    filas += "<td "+estatus_supervisor+"><select style='width: 130px;' onchange='actualizar_estatus_supervisor(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='En revision'" + (item.estatus_supervisor == 'En revision' ? 'selected' : '') + ">En revisión</option><option value='Vo. Bo. Coordinacion'" + (item.estatus_supervisor == 'Vo. Bo. Coordinacion' ? 'selected' : '') + ">Vo. Bo. Coordinacion</option><option value='En proceso'" + (item.estatus_supervisor == 'En proceso' ? 'selected' : '') + ">En proceso</option><option value='Entregado'" + (item.estatus_supervisor == 'Entregado' ? 'selected' : '') + ">Entregado</option><option value='Cancelado y/o detenido'" + (item.estatus_supervisor == 'Cancelado y/o detenido' ? 'selected' : '') + ">Cancelado y/o detenido</option></select></td>";
                }else{
                    filas += "<td "+estatus_supervisor+">" + item.estatus_supervisor + "</td>";
                }
                if(<?= $this->session->userdata("id") ?> == item.id_supervisor) {
                    filas += "<td><select style='width: 130px;' onchange='actualizar_proyectista(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><?php foreach($usuarios AS $key => $value){ ?><option value='<?= $value->idtbl_users ?>'" + (item.tbl_user_idtbl_users_proyectista == <?= $value->idtbl_users ?> ? 'selected' : '') + "><?= $value->nombre ?></option><?php } ?></select></td>";
                }else{
                    filas += "<td>" + item.nombre_proyectista + "</td>";
                }
                if(<?= $this->session->userdata("id") ?> == item.id_proyectista) {
                    filas += "<td "+estatus_seguimiento+"><select style='width: 130px;' onchange='actualizar_estatus_seguimiento(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='En proceso'" + (item.estatus_seguimiento == 'En proceso' ? 'selected' : '') + ">En proceso</option><option value='Revision'" + (item.estatus_seguimiento == 'Revision' ? 'selected' : '') + ">Revision</option><option value='Terminado'" + (item.estatus_seguimiento == 'Terminado' ? 'selected' : '') + ">Terminado</option><option value='Cancelado y/o detenido'" + (item.estatus_seguimiento == 'Cancelado y/o detenido' ? 'selected' : '') + ">Cancelado y/o detenido</option></select></td>";
                }else{
                    filas += "<td "+estatus_seguimiento+">" + item.estatus_seguimiento + "</td>";
                }
                filas += "<td>" + item.fecha_entrega + "</td>";
                filas += "<td>" + item.tipo + "</td>";
                if(<?= $this->session->userdata("id") ?> == item.id_coordinador) {
                    filas += "<td><input type='date' onchange='actualizar_fecha_compromiso(this.value,\"" + item.uid + "\")' class='form-control' value='"+(item.fecha_compromiso != null ? item.fecha_compromiso : '')+"' uid='" + item.uid + "'>";
                }else{
                    filas += "<td>" + item.fecha_compromiso + "</td>";
                }
                
                filas += "<td><span data-toggle='tooltip' data-placement='left' title='"+item.especificaciones+"'>" + new_esp + "</span></td>";
                filas += "<td>" + item.uso + "</td>";
                filas += "<td>" + item.observaciones + "</td>";
                if(item.archivo != null){
                filas += "<td><a href='<?= base_url() ?>uploads/soporte/" + item.uid + "/"+item.archivo+"' download><i class='fa fa-file-pdf-o'></i></a></td>";
                }else{
                    filas += "<td>Sin documento</td>"
                }
                filas += "<td><a href='" + "<?= base_url()?>soporte/movimientos_ticket/" + item.uid + "' title='Movimientos' onClick='" + "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a></td>";

                
               
                filas += "</tr>";
            });
            $('#tbticketsTablaing tbody').html(filas);
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
            $(".paginacionTablaing").html(paginador);
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
                        Toast.fire({
                            type: 'success',
                            title: resp.mensaje
                        });
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
                        Toast.fire({
                            type: 'success',
                            title: resp.mensaje
                        });
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

  function actualizar_estatus_supervisor(valor,uid) {
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
                url: "<?= base_url() ?>soporte/changeStatusSupervisor",
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
                        Toast.fire({
                            type: 'success',
                            title: resp.mensaje
                        });
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
                        Toast.fire({
                            type: 'success',
                            title: resp.mensaje
                        });
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
                        Toast.fire({
                            type: 'success',
                            title: resp.mensaje
                        });
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
                        Toast.fire({
                            type: 'success',
                            title: resp.mensaje
                        });
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

  function actualizar_dw(desarrollador, ticket) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea asignar el ticket?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Acepto'
    }).then((result) => {
        if (result.value) {
            var estatus = desarrollador.getAttribute("data-estatus");
            estatus = estatus == "creado" ? "DW" : estatus;
            $.ajax({
                url: "<?= base_url()?>soporte/asignar_ticket",
                type: "post",
                dataType: "json",
                data: {
                    'desarrollador': desarrollador.value,
                    'ticket': ticket,
                    'estatus': estatus
                },
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        )
                        location.href = "<?= base_url() ?>soporte";
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        })
                    }
                }
            });
        }else{
            desarrollador.value = desarrollador.getAttribute("data-selected");
        }
    })
}

function actualizar_dw_dos(desarrollador, ticket) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea asignar el ticket?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Acepto'
    }).then((result) => {
        if (result.value) {
            var estatus = desarrollador.getAttribute("data-estatus");
            estatus = estatus == "creado" ? "DW" : estatus;
            $.ajax({
                url: "<?= base_url()?>soporte/asignar_ticket_dos",
                type: "post",
                dataType: "json",
                data: {
                    'desarrollador': desarrollador.value,
                    'ticket': ticket,
                    'estatus': estatus
                },
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        )
                        location.href = "<?= base_url() ?>soporte";
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        })
                    }
                }
            });
        }else{
            desarrollador.value = desarrollador.getAttribute("data-selected");
        }
    })
}

</script>

<script>

    var BARCHART10 = $("#bar-chart-productividad");
    myBarChart10 = new Chart(BARCHART10, {
        type: 'bar',
        stack: '',
        data: {
            labels: [],
            datasets: [{
                label: 2021,
                data: [],
                borderWidth: [0, 0, 0, 0],
                backgroundColor: '#3d8cdb',
                hoverBackgroundColor: '#3d8cdb'
            }, {
                label: 2020,
                data: [],
                borderWidth: [0, 0, 0, 0],
                backgroundColor: "#c42d50",
                hoverBackgroundColor: "#c42d50"
            }]
        },
        options: {
            legend: {
                display: true
            }
        }
    });

    function yearSelect(){
        var yearSelect = $("#year");
        var anioActual = new Date().getFullYear();
        yearSelect.html("");
        for(var anio=2021; anio<=anioActual; anio++){
            if(anio == anioActual){
                yearSelect.append($("<option value='" + anio + "' selected>" + anio + "</option>"));
            }else{
                yearSelect.append($("<option value='" + anio + "'>" + anio + "</option>"));
            }
        }
    }

    yearSelect();

        function productividad_por_usuario(){
            $.ajax({
                url: "<?= base_url()?>soporte/obtenerProductividadAnioMesIngenieria",
                type: "POST",
                data:{
                    year: $("#year").val(),
                    tipo: $("#tipo_mantenimiento").val()
                },
                dataType: "json",
                success: function(result) {
                    var backgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                    var hoverBackgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                    
                    var array_datasets = [];

                    var obj_tickets = {};
                    for(var r=0; r<result.usuarios.length; r++){
                        var id_usuario = result.usuarios[r].idtbl_users;
                        obj_tickets[id_usuario] = {nombre: result.usuarios[r].nombre, data:new Array(12)};
                        for(var r1=0; r1<result.tickets.length; r1++){
                            var id_usuario_mantenimiento = result.tickets[r1].idtbl_users;
                            if(id_usuario == id_usuario_mantenimiento){
                                obj_tickets[id_usuario].data[parseInt(result.tickets[r1].mes)-1] = result.tickets[r1];
                            }
                        }
                    }
                    
                    var index = 0;
                    var total = 0;
                    for(var key in obj_tickets){
                        var item = obj_tickets[key];
                        for(var r1=0; r1<item.data.length; r1++){
                            if(item.data[r1] == undefined){
                                item.data[r1] = 0;
                            }else{
                                item.data[r1] = parseInt(item.data[r1].total_productividad);
                                total += item.data[r1];
                            }
                        }
                        if(total > 0){
                            array_datasets.push({label:item.nombre, data:item.data, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            index++;
                        }
                        total = 0
                    }
                                                            
                    myBarChart10.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChart10.data.datasets = array_datasets;
                    myBarChart10.update();
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        productividad_por_usuario();

        $("#year").on("change",function(){
            productividad_por_usuario();
        });
</script>