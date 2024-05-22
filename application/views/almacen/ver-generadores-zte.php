<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
        <div class="row">
            <!-- Item -->
            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
                <div class="bg-white has-shadow">
                    <a href="<?= base_url() ?>almacen/cargar-csv" { class="dropdown-item" title="">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-green">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="title">
                                <span>Cargar<br>Cluster</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<section class="projects">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">

                        <h4>Generadores</h4>

                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="tijuana-tab" data-toggle="tab" href="#tijuana"
                                    role="tab" aria-controls="tijuana" aria-selected="true">
                                    Tijuana
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="tuxpan-tab" data-toggle="tab" href="#tuxpan" role="tab"
                                    aria-controls="tuxpan" aria-selected="true">
                                    Tuxpan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="monclova-tab" data-toggle="tab" href="#monclova" role="tab"
                                    aria-controls="monclova" aria-selected="true">
                                    Monclova
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="piedras-tab" data-toggle="tab" href="#piedras" role="tab"
                                    aria-controls="piedras" aria-selected="true">
                                    Piedras Negras
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="reynosa-tab" data-toggle="tab" href="#reynosa" role="tab"
                                    aria-controls="reynosa" aria-selected="true">
                                    Reynosa
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="tijuana" role="tabpanel"
                                aria-labelledby="tijuana-tab">
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill"
                                            href="#pills-salida" role="tab" aria-controls="pills-salida"
                                            aria-selected="true">
                                            Cluster - Tecate
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="natura-tab" data-toggle="tab" href="#natura"
                                            role="tab" aria-controls="natura" aria-selected="true">
                                            Cluster - Natura
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="colinas-tab" data-toggle="tab" href="#colinas"
                                            role="tab" aria-controls="colinas" aria-selected="true">
                                            Cluster - Colinas del Florido
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="b2-tab" data-toggle="tab" href="#b2" role="tab"
                                            aria-controls="b2" aria-selected="true">
                                            Core B2.2
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="magistral-tab" data-toggle="tab" href="#magistral"
                                            role="tab" aria-controls="magistral" aria-selected="true">
                                            Cluster - Magistral 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="rosa-tab" data-toggle="tab" href="#rosa"
                                            role="tab" aria-controls="rosa" aria-selected="true">
                                            Cluster- Rosa Mar
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-salida" role="tabpanel"
                                        aria-labelledby="pills-salida-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/tecate'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover" id="tbgeneradores">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
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


                                    <div class="tab-pane fade" id="natura" role="tabpanel" aria-labelledby="natura-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaNatura">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/natura'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradoresnatura">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionNatura">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="colinas" role="tabpanel" aria-labelledby="colinas-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaColinas">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/colinas'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradorescolinas">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionColinas">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="magistral" role="tabpanel"
                                        aria-labelledby="magistral-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaMagistral">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/magistral'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradoresmagistral">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionMagistral">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="rosa" role="tabpanel"
                                        aria-labelledby="rosa-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaRosa">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/rosa'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradoresrosa">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionRosa">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="b2" role="tabpanel" aria-labelledby="b2-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaB2">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/b2'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradoresb2">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionB2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tuxpan" role="tabpanel" aria-labelledby="tuxpan-tab">
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="centro-tab" data-toggle="tab" href="#centro"
                                            role="tab" aria-controls="centro" aria-selected="true">
                                            Tuxpan - Centro
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="ilustres-tab" data-toggle="tab" href="#ilustres"
                                            role="tab" aria-controls="ilustres" aria-selected="true">
                                            Cluster - Hombres Ilustres
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="centro" role="tabpanel" aria-labelledby="centro-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaCentro">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/centro'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover" id="tbgeneradorescentro">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionCentro">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade" id="ilustres" role="tabpanel" aria-labelledby="ilustres-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaIlustres">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/ilustres'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradoresilustres">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionIlustres">

                                            </div>
                                        </div>
                                    </div>

                                    

                                    
                                </div>

                            </div>


                            <div class="tab-pane fade" id="monclova" role="tabpanel" aria-labelledby="monclova-tab">
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="acereros-tab" data-toggle="tab" href="#acereros"
                                            role="tab" aria-controls="acereros" aria-selected="true">
                                            CLUSTER ACEREROS ACR-1
                                        </a>
                                    </li>                                                                      
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="acereros" role="tabpanel" aria-labelledby="acereros-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaAcereros">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/acereros'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover" id="tbgeneradoresacereros">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionAcereros">

                                            </div>
                                        </div>
                                    </div>                                    
                                    

                                    
                                </div>

                            </div>


                            <div class="tab-pane fade" id="piedras" role="tabpanel" aria-labelledby="piedras-tab">
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="tcg1-tab" data-toggle="tab" href="#tcg1"
                                            role="tab" aria-controls="tcg1" aria-selected="true">
                                            CLUSTER TECNOLOGICO TCG-1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="tcg2-tab" data-toggle="tab" href="#tcg2"
                                            role="tab" aria-controls="tcg2" aria-selected="true">
                                            CLUSTER TECNOLOGICO TCG-2
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="tcg3-tab" data-toggle="tab" href="#tcg3"
                                            role="tab" aria-controls="tcg3" aria-selected="true">
                                            CLUSTER TECNOLOGICO TCG-3
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="tcg1" role="tabpanel" aria-labelledby="tcg1-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaTcg1">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/tcg1'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover" id="tbgeneradorestcg1">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionTcg1">

                                            </div>
                                        </div>
                                    </div>                                    
                                    
                                    <div class="tab-pane fade" id="tcg2" role="tabpanel" aria-labelledby="tcg2-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaTcg2">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/tcg2'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradorestcg2">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionTcg2">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tcg3" role="tabpanel" aria-labelledby="tcg3-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaTcg3">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/tcg3'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradorestcg3">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionTcg3">

                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>

                            </div>


                            <div class="tab-pane fade" id="reynosa" role="tabpanel" aria-labelledby="reynosa-tab">
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="heron-tab" data-toggle="tab" href="#heron"
                                            role="tab" aria-controls="heron" aria-selected="true">
                                            CLUSTER 01 -HERON RAMIREZ
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="jarachina-tab" data-toggle="tab" href="#jarachina"
                                            role="tab" aria-controls="jarachina" aria-selected="true">
                                            CLUSTER 04 - JARACHINA
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="bravo-tab" data-toggle="tab" href="#bravo"
                                            role="tab" aria-controls="bravo" aria-selected="true">
                                            CLUSTER 05 - RIO BRAVO
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="heron" role="tabpanel" aria-labelledby="heron-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaHeron">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/heron'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover" id="tbgeneradoresheron">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionHeron">

                                            </div>
                                        </div>
                                    </div>                                    
                                    
                                    <div class="tab-pane fade" id="jarachina" role="tabpanel" aria-labelledby="jarachina-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaJarachina">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/jarachina'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradoresjarachina">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>.
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionJarachina">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="bravo" role="tabpanel" aria-labelledby="bravo-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaBravo">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/bravo'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbgeneradoresbravo">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionBravo">

                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
</section>
<script>
$(document).ready(function() {
    mostrarDatos("", 1);
    mostrarDatosNatura("", 1);
    mostrarDatosColinas("", 1);
    mostrarDatosB2("", 1);
    mostrarDatosMagistral("", 1);
    mostrarDatosRosa("", 1);
    mostrarDatosCentro("", 1);
    mostrarDatosIlustres("", 1);
    mostrarDatosAcereros("", 1);
    mostrarDatosTcg1("", 1);
    mostrarDatosTcg2("", 1);
    mostrarDatosTcg3("", 1);
    mostrarDatosHeron("", 1);
    mostrarDatosJarachina("", 1);
    mostrarDatosBravo("", 1);


    $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar, 1);
    });
    $("input[name='busquedaNatura']").keyup(function() {
        textoBuscar = $("input[name='busquedaNatura']").val();
        mostrarDatosNatura(textoBuscar, 1);
    });
    $("input[name='busquedaColinas']").keyup(function() {
        textoBuscar = $("input[name='busquedaColinas']").val();
        mostrarDatosColinas(textoBuscar, 1);
    });
    $("input[name='busquedaB2']").keyup(function() {
        textoBuscar = $("input[name='busquedaB2']").val();
        mostrarDatosB2(textoBuscar, 1);
    });
    $("input[name='busquedaMagistral']").keyup(function() {
        textoBuscar = $("input[name='busquedaMagistral']").val();
        mostrarDatosMagistral(textoBuscar, 1);
    });
    $("input[name='busquedaRosa']").keyup(function() {
        textoBuscar = $("input[name='busquedaRosa']").val();
        mostrarDatosRosa(textoBuscar, 1);
    });
    $("input[name='busquedaCentro']").keyup(function() {
        textoBuscar = $("input[name='busquedaCentro']").val();
        mostrarDatosCentro(textoBuscar, 1);
    });
    $("input[name='busquedaIlustres']").keyup(function() {
        textoBuscar = $("input[name='busquedaIlustres']").val();
        mostrarDatosIlustres(textoBuscar, 1);
    });
    $("input[name='busquedaAcereros']").keyup(function() {
        textoBuscar = $("input[name='busquedaAcereros']").val();
        mostrarDatosAcereros(textoBuscar, 1);
    });
    $("input[name='busquedaTcg1']").keyup(function() {
        textoBuscar = $("input[name='busquedaTcg1']").val();
        mostrarDatosTcg1(textoBuscar, 1);
    });
    $("input[name='busquedaTcg2']").keyup(function() {
        textoBuscar = $("input[name='busquedaTcg2']").val();
        mostrarDatosTcg2(textoBuscar, 1);
    });
    $("input[name='busquedaTcg3']").keyup(function() {
        textoBuscar = $("input[name='busquedaTcg3']").val();
        mostrarDatosTcg3(textoBuscar, 1);
    });
    $("input[name='busquedaHeron']").keyup(function() {
        textoBuscar = $("input[name='busquedaHeron']").val();
        mostrarDatosHeron(textoBuscar, 1);
    });
    $("input[name='busquedaJarachina']").keyup(function() {
        textoBuscar = $("input[name='busquedaJarachina']").val();
        mostrarDatosJarachina(textoBuscar, 1);
    });
    $("input[name='busquedaBravo']").keyup(function() {
        textoBuscar = $("input[name='busquedaBravo']").val();
        mostrarDatosBravo(textoBuscar, 1);
    });

    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionNatura li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaNatura']").val();
        mostrarDatosNatura(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionColinas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaColinas']").val();
        mostrarDatosColinas(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionB2 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaB2']").val();
        mostrarDatosB2(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionMagistral li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaMagistral']").val();
        mostrarDatosMagistral(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionRosa li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaRosa']").val();
        mostrarDatosRosa(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionCentro li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaCentro']").val();
        mostrarDatosCentro(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionIlustres li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaIlustres']").val();
        mostrarDatosIlustres(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionAcereros li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaAcereros']").val();
        mostrarDatosAcereros(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionTcg1 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaTcg1']").val();
        mostrarDatosTcg1(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionTcg2 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaTcg2']").val();
        mostrarDatosTcg2(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionTcg3 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaTcg3']").val();
        mostrarDatosTcg3(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionHeron li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaHeron']").val();
        mostrarDatosHeron(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionJarachina li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaJarachina']").val();
        mostrarDatosJarachina(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionBravo li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaBravo']").val();
        mostrarDatosBravo(valorBuscar, valorHref);
    });

});


function mostrarDatos(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZte",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            var kilometraje = 0;
            var kilometraje_acumulado = 0;
            var clase = '';
            $.each(response.generadores, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradores tbody').html(filas);
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

function mostrarDatosNatura(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteNatura",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresNatura, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradoresnatura tbody').html(filas);
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
            $(".paginacionNatura").html(paginador);
        }
    });
}

function mostrarDatosColinas(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteColinas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresColinas, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradorescolinas tbody').html(filas);
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
            $(".paginacionColinas").html(paginador);
        }
    });
}

function mostrarDatosB2(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteB2",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresB2, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradoresb2 tbody').html(filas);
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
            $(".paginacionB2").html(paginador);
        }
    });
}

function mostrarDatosMagistral(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteMagistral",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresMagistral, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradoresmagistral tbody').html(filas);
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
            $(".paginacionMagistral").html(paginador);
        }
    });
}

function mostrarDatosRosa(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteRosa",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresRosa, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradoresrosa tbody').html(filas);
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
            $(".paginacionRosa").html(paginador);
        }
    });
}


function mostrarDatosCentro(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteCentro",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresCentro, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradorescentro tbody').html(filas);
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
            $(".paginacionCentro").html(paginador);
        }
    });
}


function mostrarDatosIlustres(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteIlustres",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresIlustres, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradoresilustres tbody').html(filas);
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
            $(".paginacionIlustres").html(paginador);
        }
    });
}


function mostrarDatosAcereros(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteAcereros",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresAcereros, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }                                
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradoresacereros tbody').html(filas);
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
            $(".paginacionAcereros").html(paginador);
        }
    });
}


function mostrarDatosTcg1(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteTcg1",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresTcg1, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradorestcg1 tbody').html(filas);
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
            $(".paginacionTcg1").html(paginador);
        }
    });
}


function mostrarDatosTcg2(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteTcg2",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresTcg2, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradorestcg2 tbody').html(filas);
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
            $(".paginacionTcg2").html(paginador);
        }
    });
}


function mostrarDatosTcg3(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteTcg3",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresTcg3, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradorestcg3 tbody').html(filas);
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
            $(".paginacionTcg3").html(paginador);
        }
    });
}


function mostrarDatosHeron(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteHeron",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresHeron, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradoresheron tbody').html(filas);
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
            $(".paginacionHeron").html(paginador);
        }
    });
}


function mostrarDatosJarachina(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteJarachina",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresJarachina, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradoresjarachina tbody').html(filas);
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
            $(".paginacionJarachina").html(paginador);
        }
    });
}


function mostrarDatosBravo(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarGeneradoresZteBravo",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.generadoresBravo, function(key, item) {
                var hoy = new Date().toISOString().slice(0, 10);
                var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                if(item.estatus == 'SPM'){
                    clase = 'table-success';
                }else if(item.nombre != null && hoy == item.ultima_fecha){
                    clase = 'table-info';
                }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                    clase = 'table-danger';
                }else{
                    clase = '';
                }    
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.tipo_red + "</td>";
                filas += "<td>" + item.nombre_oracle + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                filas += "<td>" + item.descripcion_servicio + "</td>";
                filas += "<td>" + item.unidad_medida_abr + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                filas += "<td>" + "" + "</td>";
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if (item.tbl_users_idtbl_users_supervisor != null) {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                } else {
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/solicitud/" + item.idtbl_mantenimientos +
                        "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                }
                <?php }else{ ?>
                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                        "almacen/devolucion-generador/" + item.uid +
                        "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                <?php } ?>
                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                    "almacen/detalle_servicio/" + item.uid +
                    "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                    if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null){
                        filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                    }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbgeneradoresbravo tbody').html(filas);
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
            $(".paginacionBravo").html(paginador);
        }
    });
}

$(document).on('click', '.delete-arm', function() {
    console.log("Envio 1");              
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea eliminar el brazo?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            //alert(this.id);
            $.ajax({
                url: "<?= base_url() ?>almacen/delete_arm/" + this.id,
                type: "post",
                dataType: "json",
                data: "id="+this.id,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        $('.ocultar').hide();
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
    })
});
</script>