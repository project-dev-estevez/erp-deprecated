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
                                        <option value="6">Nota de Crédito</option>
                                        <option value="7">Cheque</option>
                                    </select>
                                </div>
                                <div class="form-group infoBanco" id="numero_tarjeta">
                                    <label>Numero de Tarjeta</label>
                                    <input type="number" name="numero_tarjeta" placeholder="Numero de tarjeta" minlength="4" maxlength="4" class="form-control">
                                </div>
                                <div class="form-group infoBanco">
                                    <label>Banco</label>
                                    <select name="banco" id="banco" class="selectpicker" required
                                        data-live-search="true">
                                        <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                        <?php if ($bancos): ?>
                                        <?php foreach ($bancos as $value): ?>
                                        <option value="<?=$value['idtbl_bancos']?>"><?= $value['nombre_banco'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group infoBanco">
                                    <label>Importe pago</label>
                                    <input type="number" name="importe_pago" placeholder="Importe pago" class="form-control">
                                </div>
                                <div class="form-group notaCredito">
                                    <label>Numero Nota de Credito</label>
                                    <input type="text" name="numero_nota_credito" placeholder="Numero nota credito" class="form-control">
                                </div>
                                <div class="form-group notaCredito">
                                    <label>Importe Pago</label>
                                    <input type="number" name="importe_nota_credito" placeholder="Importe pago" class="form-control">
                                </div>
                                <div class="form-group cheque">
                                    <label>Banco</label>
                                    <select name="cheque_banco" id="cheque_banco" class="selectpicker" required data-live-search="true">
                                        <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                        <?php if ($bancos): ?>
                                        <?php foreach ($bancos as $value): ?>
                                        <option value="<?=$value['idtbl_bancos']?>"><?= $value['nombre_banco'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group cheque">
                                    <label>Numero Cheque</label>
                                    <input type="text" name="numero_cheque" placeholder="Numero cheque" class="form-control">
                                </div>
                                <div class="form-group monederoElectronico">
                                    <label>Importe pago</label>
                                    <input type="number" name="importe_pago_monedero_electronico" placeholder="Importe pago" class="form-control">
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                    <li class="nav-item">
                        <a class="nav-link btn active" id="pills-pedidos-tab" data-toggle="pill" href="#pedidos"
                        role="tab" aria-controls="pills-pedidos" aria-selected="true">Pedidos AG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="virtuales-tab" data-toggle="tab" href="#virtuales" role="tab"
                        aria-controls="virtuales" aria-selected="false"> Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pedidoscv-tab" data-toggle="tab" href="#pedidosehs" role="tab"
                        aria-controls="pedidoscv" aria-selected="false">Pedidos EHS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pedidoscv-tab" data-toggle="tab" href="#pedidoscv" role="tab"
                        aria-controls="pedidoscv" aria-selected="false">Pedidos CV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="sistemas-tab" data-toggle="tab" href="#sistemas" role="tab"
                        aria-controls="sistemas" aria-selected="false">Sistemas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pedidosac-tab" data-toggle="tab" href="#pedidosac" role="tab"
                        aria-controls="pedidosac" aria-selected="false">Pedidos AC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pedidosam-tab" data-toggle="tab" href="#pedidosam" role="tab"
                        aria-controls="pedidosam" aria-selected="false">Pedidos AM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pedidosad-tab" data-toggle="tab" href="#pedidosad" role="tab"
                        aria-controls="pedidosad" aria-selected="false">Pedidos AD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pedidosmt-tab" data-toggle="tab" href="#pedidosmt" role="tab"
                        aria-controls="pedidosmt" aria-selected="false">Pedidos MT</a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link btn" id="virtuales-tab" data-toggle="tab" href="#kuali" role="tab"
                        aria-controls="virtuales" aria-selected="false">Pedidos Kuali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="personal-tab" data-toggle="tab" href="#pedidospersonal" role="tab"
                        aria-controls="personal" aria-selected="false">Pedidos Personal</a>
                    </li>
                   
                    <?php }elseif($this->session->userdata('tipo') == 1){ ?>
                    <li class="nav-item">
                        <a class="nav-link btn active" id="pedidosac-tab" data-toggle="tab" href="#pedidosac" role="tab"
                        aria-controls="pedidosac" aria-selected="false">Pedidos AC</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                
                <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 7){ ?>
                    <div class="tab-pane fade show active" id="pedidos" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="pills-pedidospendientes-tab" data-toggle="pill" href="#pedidospendientes"
                                role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                            </li>
                            <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                            <li class="nav-item">
                                <a class="nav-link btn" id="progreso-tab" data-toggle="tab" href="#progreso" role="tab"
                                aria-controls="progreso" aria-selected="false">Pedidos Progreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="finalizados-tab" data-toggle="tab" href="#finalizados" role="tab"
                                aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                            </li>   
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pedidospendientes" role="tabpanel" aria-labelledby="pills-pedidospendientes-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientes">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidospendientes">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidos" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionPendientes">                                                    
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="progreso" role="tabpanel" aria-labelledby="pills-progreso-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgreso">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosprogreso">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionProgreso">
                                    </div>
                                </div>
                            </div>
                                                    
                            <div class="tab-pane fade" id="finalizados" role="tabpanel" aria-labelledby="pills-finalizados-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizados">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizado">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionFinalizado">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="virtuales" role="tabpanel" aria-labelledby="pills-virtuales-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover" id="tbpedidosvirtuales">
                                    <thead>
                                        <tr>
                                            <th>UID</th>
                                            <th>Neodata</th>
                                            <th>Creación</th>
                                            <th>Requisición</th>
                                            <th>Creador</th>
                                            <th>Proyecto</th>
                                            <?php if($this->session->userdata('tipo')!=7){ ?>
                                                <th>progreso</th>
                                                <th>Estatus</th>
                                            <?php } ?>
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
                                            <?php if($this->session->userdata('tipo')!=7) { ?>
                                                <th>
                                                    <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                        <option value="">Seleccionar</option>
                                                        <option value="Pendientes">Pendientes</option>
                                                    </select>
                                                </th>
                                                <th>Estatus</th>
                                            <?php } ?>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                                <br>
                                <div class="paginacion2">
                                </div>
                                <input type="text" class="form-control" id="busquedaPaginacionServicios">
                            </div>
                        </div>

                        <?php if($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 7){ ?>
                        <div class="tab-pane fade" id="pedidosehs" role="tabpanel" aria-labelledby="pills-pedidoscv-tab">
                            <div class="float-right">
                                <input type="text" class="form-control" placeholder="Buscar" name="busquedaehs">
                            </div>
                            <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover" id="tbpedidosehs">
                                    <thead>
                                        <tr>
                                            <th>UID</th>
                                            <th>Neodata</th>
                                            <th>Creación</th>
                                            <th>Requisición</th>
                                            <th>Creador</th>
                                            <th>Proyecto</th>
                                            <?php if($this->session->userdata('tipo')!=7){ ?>
                                                <th>progreso</th>
                                                <th>Estatus</th>
                                            <?php } ?>
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
                                            <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                            <?php } ?>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                                <br>
                                <div class="paginacionehs">                                            
                                </div>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="tab-pane fade" id="pedidosehs" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-pedidospendientesehs-tab" data-toggle="pill" href="#pedidospendientesehs"
                                    role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                                </li>
                                <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="progresoehs-tab" data-toggle="tab" href="#progresoehs" role="tab"
                                    aria-controls="progreso" aria-selected="false">Pedidos Progreso
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="finalizadosehs-tab" data-toggle="tab" href="#finalizadosehs" role="tab"
                                    aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                                </li>
                                <?php } ?>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="pedidospendientesehs" role="tabpanel" aria-labelledby="pills-pedidoscv-tab">
                                    <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientesehs">
                                    </div>
                                    <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbpedidospendientesehs">
                                            <thead>
                                                <tr>
                                                    <th>UID</th>
                                                    <th>Neodata</th>
                                                    <th>Creación</th>
                                                    <th>Requisición</th>
                                                    <th>Creador</th>
                                                    <th>Proyecto</th>
                                                    <?php if($this->session->userdata('tipo')!=7){ ?>
                                                        <th>progreso</th>
                                                        <th>Estatus</th>
                                                    <?php } ?>
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
                                                    <?php if($this->session->userdata('tipo')!=7) { ?>
                                                        <th>
                                                        <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                        </th>
                                                        <th>Estatus</th>
                                                    <?php } ?>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="paginacionPendientesehs">
                                        </div>
                                    </div>
                                </div>
                    
                    <div class="tab-pane fade" id="progresoehs" role="tabpanel" aria-labelledby="pills-progresoehs-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresoehs">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosprogresoehs">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionProgresoehs">
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="finalizadosehs" role="tabpanel" aria-labelledby="pills-finalizadosehs-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadoehs">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadoehs">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionFinalizadoehs">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 7){ ?>
                <div class="tab-pane fade" id="pedidoscv" role="tabpanel" aria-labelledby="pills-pedidoscv-tab">
                    <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" name="busquedacv">
                    </div>
                    <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover" id="tbpedidoscv">
                            <thead>
                                <tr>
                                    <th>UID</th>
                                    <th>Neodata</th>
                                    <th>Creación</th>
                                    <th>Requisición</th>
                                    <th>Creador</th>
                                    <th>Proyecto</th>
                                    <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                    <?php } ?>
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
                                    <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                    <?php } ?>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                        <br>
                        <div class="paginacioncv">
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="tab-pane fade" id="pedidoscv" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link btn active" id="pills-pedidospendientescv-tab" data-toggle="pill" href="#pedidospendientescv"
                            role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                        </li>
                        <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                        <li class="nav-item">
                            <a class="nav-link btn" id="progresocv-tab" data-toggle="tab" href="#progresocv" role="tab"
                            aria-controls="progreso" aria-selected="false">Pedidos Progreso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" id="finalizadoscv-tab" data-toggle="tab" href="#finalizadoscv" role="tab"
                            aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="pedidospendientescv" role="tabpanel" aria-labelledby="pills-pedidoscv-tab">
                            <div class="float-right">
                                <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientescv">
                            </div>
                            <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover" id="tbpedidospendientescv">
                                    <thead>
                                        <tr>
                                            <th>UID</th>
                                            <th>Neodata</th>
                                            <th>Creación</th>
                                            <th>Requisición</th>
                                            <th>Creador</th>
                                            <th>Proyecto</th>
                                            <?php if($this->session->userdata('tipo')!=7){ ?>
                                                <th>progreso</th>
                                                <th>Estatus</th>
                                            <?php } ?>
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
                                            <?php if($this->session->userdata('tipo')!=7) { ?>
                                                <th>
                                                    <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                        <option value="">Seleccionar</option>
                                                        <option value="Pendientes">Pendientes</option>
                                                    </select>
                                                </th>
                                                <th>Estatus</th>
                                            <?php } ?>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                                <br>
                                <div class="paginacionPendientescv">
                                </div>
                            </div>
                        </div>
                    
                        <div class="tab-pane fade" id="progresocv" role="tabpanel" aria-labelledby="pills-progresocv-tab">
                            <div class="float-right">
                                <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresocv">
                            </div>
                            <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover" id="tbpedidosprogresocv">
                                    <thead>
                                        <tr>
                                            <th>UID</th>
                                            <th>Neodata</th>
                                            <th>Creación</th>
                                            <th>Requisición</th>
                                            <th>Creador</th>
                                            <th>Proyecto</th>
                                            <?php if($this->session->userdata('tipo')!=7){ ?>
                                                <th>progreso</th>
                                                <th>Estatus</th>
                                            <?php } ?>
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
                                            <?php if($this->session->userdata('tipo')!=7) { ?>
                                                <th>
                                                    <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                        <option value="">Seleccionar</option>
                                                        <option value="Pendientes">Pendientes</option>
                                                    </select>
                                                </th>
                                                <th>Estatus</th>
                                            <?php } ?>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                                <br>    
                                <div class="paginacionProgresocv">
                                </div>
                            </div>
                        </div>
                    
                        <div class="tab-pane fade" id="finalizadoscv" role="tabpanel" aria-labelledby="pills-finalizadosehs-tab">
                            <div class="float-right">
                                <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadocv">
                            </div>
                            <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadocv">
                                    <thead>
                                        <tr>
                                            <th>UID</th>
                                            <th>Neodata</th>
                                            <th>Creación</th>
                                            <th>Requisición</th>
                                            <th>Creador</th>
                                            <th>Proyecto</th>
                                            <?php if($this->session->userdata('tipo')!=7){ ?>
                                                <th>progreso</th>
                                                <th>Estatus</th>
                                            <?php } ?>
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
                                            <?php if($this->session->userdata('tipo')!=7) { ?>
                                                <th>
                                                    <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                        <option value="">Seleccionar</option>
                                                        <option value="Pendientes">Pendientes</option>
                                                </select>
                                                </th>
                                                <th>Estatus</th>
                                            <?php } ?>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                                <br>
                                <div class="paginacionFinalizadocv">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                    
                <?php if($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 7){ ?>
                    <div class="tab-pane fade" id="sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedasistemas">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel_pedidos_kuali"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidossistemas">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>                                            
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionsistemas">
                            </div>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="tab-pane fade" id="sistemas" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="pills-pedidospendientessistemas-tab" data-toggle="pill" href="#pedidospendientessistemas"
                                role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                            </li>
                            <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                            <li class="nav-item">
                                <a class="nav-link btn" id="progresosistemas-tab" data-toggle="tab" href="#progresosistemas" role="tab"
                                aria-controls="progreso" aria-selected="false">Pedidos Progreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="finalizadossistemas-tab" data-toggle="tab" href="#finalizadossistemas" role="tab"
                                aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pedidospendientessistemas" role="tabpanel" aria-labelledby="pills-pedidoscv-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientessistemas">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidospendientessistemas">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionPendientessistemas">
                                    </div>
                                </div>
                            </div>
                                                    
                    <div class="tab-pane fade" id="progresosistemas" role="tabpanel" aria-labelledby="pills-progresocv-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresosistemas">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosprogresosistemas">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionProgresosistemas">
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="finalizadossistemas" role="tabpanel" aria-labelledby="pills-finalizadossistemas-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadosistemas">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadosistemas">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosSistemas" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionFinalizadosistemas">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 7){ ?>
                <div class="tab-pane fade" id="pedidosac" role="tabpanel" aria-labelledby="pills-pedidosac-tab">
                    <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" name="busquedaac">
                    </div>
                    <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover" id="tbpedidosac">
                            <thead>
                                <tr>
                                    <th>UID</th>
                                    <th>Neodata</th>
                                    <th>Creación</th>
                                    <th>Requisición</th>
                                    <th>Creador</th>
                                    <th>Proyecto</th>
                                    <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                    <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosAc" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                    <?php } ?>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                        <br>
                        <div class="paginacionac">
                        </div>
                    </div>
                </div>

                <?php }else{ ?>
                    <div class="tab-pane fade" id="pedidosac" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="pills-pedidospendientesac-tab" data-toggle="pill" href="#pedidospendientesac"
                                role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                            </li>
                            <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                            <li class="nav-item">
                                <a class="nav-link btn" id="progresoac-tab" data-toggle="tab" href="#progresoac" role="tab"
                                aria-controls="progreso" aria-selected="false">Pedidos Progreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="finalizadosac-tab" data-toggle="tab" href="#finalizadosac" role="tab"
                                aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pedidospendientesac" role="tabpanel" aria-labelledby="pills-pedidosac-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientesac">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidospendientesac">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionPendientesac">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="progresoac" role="tabpanel" aria-labelledby="pills-progresocv-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresoac">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">      
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosprogresoac">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>   
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionProgresoac">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="finalizadosac" role="tabpanel" aria-labelledby="pills-finalizadosac-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadoac">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadoac">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosAc" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>           
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionFinalizadoac">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                    <?php if($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 7){ ?>
                    <div class="tab-pane fade" id="pedidosam" role="tabpanel" aria-labelledby="pills-pedidosam-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaam">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosam">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosAm" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionam">
                            </div>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="tab-pane fade" id="pedidosam" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="pills-pedidospendientesam-tab" data-toggle="pill" href="#pedidospendientesam"
                                role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                            </li>
                            <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                            <li class="nav-item">
                                <a class="nav-link btn" id="progresoam-tab" data-toggle="tab" href="#progresoam" role="tab"
                                aria-controls="progreso" aria-selected="false">Pedidos Progreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="finalizadosam-tab" data-toggle="tab" href="#finalizadosam" role="tab"
                                aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pedidospendientesam" role="tabpanel" aria-labelledby="pills-pedidosam-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientesam">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidospendientesam">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionPendientesam">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="progresoam" role="tabpanel" aria-labelledby="pills-progresoam-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresoam">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosprogresoam">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionProgresoam">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="finalizadosam" role="tabpanel" aria-labelledby="pills-finalizadosam-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadoam">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadoam">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosAm" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>           
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionFinalizadoam">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <!--administrativos-->

                    <?php if($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 7){ ?>
                    <div class="tab-pane fade" id="pedidosad" role="tabpanel" aria-labelledby="pills-pedidosad-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaad">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosad">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosAd" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionad">
                            </div>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="tab-pane fade" id="pedidosad" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="pills-pedidospendientesad-tab" data-toggle="pill" href="#pedidospendientesad"
                                role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                            </li>
                            <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                            <li class="nav-item">
                                <a class="nav-link btn" id="progresoad-tab" data-toggle="tab" href="#progresoad" role="tab"
                                aria-controls="progreso" aria-selected="false">Pedidos Progreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="finalizadosad-tab" data-toggle="tab" href="#finalizadosad" role="tab"
                                aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pedidospendientesad" role="tabpanel" aria-labelledby="pills-pedidosad-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientesad">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidospendientesad">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionPendientesad">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="progresoad" role="tabpanel" aria-labelledby="pills-progresoad-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresoad">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosprogresoad">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionProgresoad">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="finalizadosad" role="tabpanel" aria-labelledby="pills-finalizadosad-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadoad">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadoad">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosAd" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>           
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionFinalizadoad">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <!--fin administrativo-->

                    <!--personal-->

                    <?php if($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 7){ ?>
                    <div class="tab-pane fade" id="pedidospersonal" role="tabpanel" aria-labelledby="pills-pedidospersonal-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedapersonal">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidospersonal">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosAd" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionpersonal">
                            </div>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="tab-pane fade" id="pedidospersonal" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="pills-pedidospendientespersonal-tab" data-toggle="pill" href="#pedidospendientespersonal"
                                role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                            </li>
                            <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                            <li class="nav-item">
                                <a class="nav-link btn" id="progresoad-tab" data-toggle="tab" href="#progresopersonal" role="tab"
                                aria-controls="progreso" aria-selected="false">Pedidos Progreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="finalizadospersonal-tab" data-toggle="tab" href="#finalizadospersonal" role="tab"
                                aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pedidospendientespersonal" role="tabpanel" aria-labelledby="pills-pedidospersonal-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientespersonal">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidospendientespersonal">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionPendientespersonal">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="progresopersonal" role="tabpanel" aria-labelledby="pills-progresopersonal-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresopersonal">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosprogresopersonal">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionProgresopersonal">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="finalizadospersonal" role="tabpanel" aria-labelledby="pills-finalizadospersonal-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadopersonal">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadopersonal">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosAd" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>           
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionFinalizadopersonal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <!--fin personal-->

                    <!--mantenimiento-->

                    <?php if($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 7){ ?>
                    <div class="tab-pane fade" id="pedidosmt" role="tabpanel" aria-labelledby="pills-pedidosmt-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedamt">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosmt">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosAm" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionmt">
                            </div>
                        </div>
                    </div>

                    <?php }else{ ?>
                    <div class="tab-pane fade" id="pedidosmt" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link btn active" id="pills-pedidospendientesmt-tab" data-toggle="pill" href="#pedidospendientesmt"
                                role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                            </li>
                            <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                            <li class="nav-item">
                                <a class="nav-link btn" id="progresomt-tab" data-toggle="tab" href="#progresomt" role="tab"
                                aria-controls="progreso" aria-selected="false">Pedidos Progreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" id="finalizadosmt-tab" data-toggle="tab" href="#finalizadosmt" role="tab"
                                aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pedidospendientesmt" role="tabpanel" aria-labelledby="pills-pedidosmt-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientesmt">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidospendientesmt">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionPendientesmt">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="progresomt" role="tabpanel" aria-labelledby="pills-progresomt-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresomt">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosprogresomt">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionProgresomt">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="tab-pane fade" id="finalizadosmt" role="tabpanel" aria-labelledby="pills-finalizadosmt-tab">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadomt">
                                </div>
                                <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadomt">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Requisición</th>
                                                <th>Creador</th>
                                                <th>Proyecto</th>
                                                <?php if($this->session->userdata('tipo')!=7){ ?>
                                                    <th>progreso</th>
                                                    <th>Estatus</th>
                                                <?php } ?>
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
                                                <?php if($this->session->userdata('tipo')!=7) { ?>
                                                    <th>
                                                        <select name="selectPedidosmt" style="font-size: 10px;" class="form-control">
                                                            <option value="">Seleccionar</option>
                                                            <option value="Pendientes">Pendientes</option>
                                                        </select>
                                                    </th>           
                                                    <th>Estatus</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionFinalizadomt">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <!--fin mantenimiento-->
                    


                    <?php if($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 7){ ?>
                    <div class="tab-pane fade" id="kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedakuali">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel_pedidos_kuali"
                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidoskuali">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                            <th>progreso</th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                            <th>
                                                <select name="selectPedidosKuali" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="Pendientes">Pendientes</option>
                                                </select>
                                            </th>
                                            <th>Estatus</th>
                                        <?php } ?>
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
                    <?php }else{ ?>
                        <div class="tab-pane fade" id="kuali" role="tabpanel" aria-labelledby="pills-pedidos-tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-pedidospendienteskuali-tab" data-toggle="pill" href="#pedidospendienteskuali"
                                    role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">Pedidos Pendientes</a>
                                </li>
                                <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7){ ?>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="progresokuali-tab" data-toggle="tab" href="#progresokuali" role="tab"
                                    aria-controls="progreso" aria-selected="false">Pedidos Progreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="finalizadoskuali-tab" data-toggle="tab" href="#finalizadoskuali" role="tab"
                                    aria-controls="finalizados" aria-selected="false">Pedidos Finalizados</a>
                                </li>
                                <?php } ?>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="pedidospendienteskuali" role="tabpanel" aria-labelledby="pills-pedidoskuali-tab">
                                    <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendienteskuali">
                                    </div>
                                    <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbpedidospendienteskuali">
                                            <thead>
                                                <tr>
                                                    <th>UID</th>
                                                    <th>Neodata</th>
                                                    <th>Creación</th>
                                                    <th>Requisición</th>
                                                    <th>Creador</th>
                                                    <th>Proyecto</th>
                                                    <?php if($this->session->userdata('tipo')!=7){ ?>
                                                        <th>progreso</th>
                                                        <th>Estatus</th>
                                                    <?php } ?>
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
                                                    <?php if($this->session->userdata('tipo')!=7) { ?>
                                                        <th>
                                                            <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                <option value="Pendientes">Pendientes</option>
                                                            </select>
                                                        </th>
                                                        <th>Estatus</th>
                                                    <?php } ?>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="paginacionPendienteskuali">
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="tab-pane fade" id="progresokuali" role="tabpanel" aria-labelledby="pills-progresoam-tab">
                                    <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresokuali">
                                    </div>
                                    <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbpedidosprogresokuali">
                                            <thead>
                                                <tr>
                                                    <th>UID</th>
                                                    <th>Neodata</th>
                                                    <th>Creación</th>
                                                    <th>Requisición</th>
                                                    <th>Creador</th>
                                                    <th>Proyecto</th>
                                                    <?php if($this->session->userdata('tipo')!=7){ ?>
                                                        <th>progreso</th>
                                                        <th>Estatus</th>        
                                                    <?php } ?>
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
                                                    <?php if($this->session->userdata('tipo')!=7) { ?>
                                                        <th>
                                                            <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                <option value="Pendientes">Pendientes</option>
                                                            </select>
                                                        </th>
                                                        <th>Estatus</th>
                                                    <?php } ?>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="paginacionProgresokuali">
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="tab-pane fade" id="finalizadoskuali" role="tabpanel" aria-labelledby="pills-finalizadoskuali-tab">
                                    <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadokuali">
                                    </div>
                                    <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadokuali">
                                            <thead>
                                                <tr>
                                                    <th>UID</th>
                                                    <th>Neodata</th>
                                                    <th>Creación</th>
                                                    <th>Requisición</th>
                                                    <th>Creador</th>
                                                    <th>Proyecto</th>
                                                    <?php if($this->session->userdata('tipo')!=7){ ?>
                                                        <th>progreso</th>
                                                        <th>Estatus</th>
                                                    <?php } ?>
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
                                                    <?php if($this->session->userdata('tipo')!=7) { ?>
                                                        <th>
                                                            <select name="selectPedidosKuali" style="font-size: 10px;" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                <option value="Pendientes">Pendientes</option>
                                                            </select>
                                                        </th>
                                                        <th>Estatus</th>
                                                    <?php } ?>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            </tbody>
                            </table>
                            <br>
                            <div class="paginacionFinalizadokuali">

                            </div>
                        </div>
                    </div>
                                        </div>
                                        </div>
                        <?php } ?>
                </div>

                <?php }elseif($this->session->userdata('tipo') == 1){ ?>
                 
                        <div class="tab-pane fade show active" id="pedidosac" role="tabpanel"
                        aria-labelledby="pills-pedidos-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link btn active" id="pills-pedidospendientesac-tab" data-toggle="pill" href="#pedidospendientesac"
                            role="tab" aria-controls="pills-pedidospendientes" aria-selected="true">
                            Pedidos Pendientes
                        </a>
                    </li>
          
                    <li class="nav-item">
                        <a class="nav-link btn" id="progresoac-tab" data-toggle="tab" href="#progresoac" role="tab"
                            aria-controls="progreso" aria-selected="false">
                            Pedidos Progreso
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="finalizadosac-tab" data-toggle="tab" href="#finalizadosac" role="tab"
                            aria-controls="finalizados" aria-selected="false">
                            Pedidos Finalizados
                        </a>
                    </li>
                   
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pedidospendientesac" role="tabpanel" aria-labelledby="pills-pedidosac-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendientesac">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidospendientesac">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionPendientesac">

                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="progresoac" role="tabpanel" aria-labelledby="pills-progresocv-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaProgresoac">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosprogresoac">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionProgresoac">

                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="finalizadosac" role="tabpanel" aria-labelledby="pills-finalizadosac-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaFinalizadoac">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosfinalizadoac">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosAc" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionFinalizadoac">

                            </div>
                        </div>
                    </div>
                                        </div>
                                        </div>
                        

                <?php }else{ ?>
                    <div class="tab-pane fade show active" id="pedidos" role="tabpanel"
                        aria-labelledby="pills-pedidos-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
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
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidos" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                    <div class="tab-pane fade" id="virtuales" role="tabpanel" aria-labelledby="pills-virtuales-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosvirtuales">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
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

                    <div class="tab-pane fade" id="pedidosehs" role="tabpanel" aria-labelledby="pills-pedidoscv-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaehs">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosehs">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionehs">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pedidoscv" role="tabpanel" aria-labelledby="pills-pedidoscv-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedacv">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidoscv">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosCv" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacioncv">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedasistemas">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel_pedidos_kuali"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidossistemas">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosVirtuales" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionsistemas">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pedidosac" role="tabpanel" aria-labelledby="pills-pedidosac-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaac">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosac">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosAc" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionac">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pedidosam" role="tabpanel" aria-labelledby="pills-pedidosam-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaam">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel-pedidos-virtuales"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidosam">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosAm" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionam">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedakuali">
                        </div>
                        <a href="<?php echo base_url() ?>pedidos/excel_pedidos_kuali"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbpedidoskuali">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Neodata</th>
                                        <th>Creación</th>
                                        <th>Requisición</th>
                                        <th>Creador</th>
                                        <th>Proyecto</th>
                                        <?php if($this->session->userdata('tipo')!=7){ ?>
                                        <th>progreso</th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                                        <?php if($this->session->userdata('tipo')!=7) { ?>
                                        <th>
                                            <select name="selectPedidosKuali" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="Pendientes">Pendientes</option>
                                            </select>
                                        </th>
                                        <th>Estatus</th>
                                        <?php } ?>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="entrada_virtual" tabindex="-1" role="dialog" aria-labelledby="labelEntradaVirtual" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php echo form_open_multipart(base_url().'almacen/guardar-nueva-entrada-virtual', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Entrada Virtual</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="uid" name="uid" class="form-control" hidden readonly required>
                <input type="text" placeholder="pedido" name="idpedido" class="form-control" hidden required>
                <input type="text" placeholder="proyecto" name="proyecto" class="form-control" hidden required>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Tipo</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="interno">Interno</option>
                                <option value="contratista">Contratista</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione el tipo personal
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col divContratistas" style="display: none;">
                        <div class="form-group">
                            <label>Contratista*</label>
                            <select name="contratista" id="contratista" class="selectpicker form-control"
                                data-live-search="true">
                                <option value="" disabled selected>Seleccione...</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione al contratista
                            </div>
                        </div>
                    </div>
                    <div class="col divContratistas" style="display: none;">
                        <div class="form-group">
                            <label>Supervisor*</label>
                            <select name="supervisor" id="supervisor" class="selectpicker form-control"
                                data-live-search="true">
                                <option value="" disabled selected>Seleccione...</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione al supervisor
                            </div>
                        </div>
                    </div>
                    <div class="col divInternos">
                        <div class="form-group">
                            <label>Recibe*</label>
                            <select name="usuario" id="recibe" class="selectpicker form-control" data-live-search="true"
                                required>
                                <option value="" disabled selected>Seleccione...</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione al personal
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('uid', '') ?>
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
$('#entrada_virtual').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='idpedido']").val(recipient.idpedido);
    modal.find("input[name='proyecto']").val(recipient.proyecto);
})
</script>
<script>
$(document).ready(function() {
    $("#formuploadajax").on("submit", function(event) {
        var formData = new FormData(event.target);
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            $.ajax({
                url: "<?= base_url()?>almacen/guardar-nueva-entrada-virtual",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    console.log(resp)
                    if (resp.error == false) {
                        window.location.replace("<?= base_url()?>pedidos");
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
    selectBuscar = "";
    
    <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 7){ ?>
        mostrarDatosPendientes("", 1, "");

        $("select[name='selectPendientes']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientes('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientes']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientes']").val();
        mostrarDatosPendientes(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientes li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientes']").val();
        mostrarDatosPendientes(valorBuscar, valorHref, selectBuscar);
        });

        $("#busquedaPaginacionServicios").keyup(function(e) {
          if (event.which === 13) {
              //alert('Enter is pressed!');
              e.preventDefault();
              valorHref = $("#busquedaPaginacionServicios").val();
              valorBuscar = $("input[name='busqueda2']").val();
              mostrarDatos2(valorBuscar, valorHref, selectBuscar);
          }
      });

        mostrarDatosProgreso("", 1, "");

        $("select[name='selectPedidosVirtuales']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatos2('', 1, selectBuscar);
        });
        $("input[name='busqueda2']").keyup(function() {
        textoBuscar = $("input[name='busqueda2']").val();
        mostrarDatos2(textoBuscar, 1, selectBuscar);
        });
        mostrarDatos2("", 1, "");


        $("select[name='selectProgreso']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgreso('', 1, selectBuscar);
         });
    $("input[name='busquedaProgreso']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgreso']").val();
        mostrarDatosProgreso(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgreso li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgreso']").val();
        mostrarDatosProgreso(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizado("", 1, "");

        $("select[name='selectFinalizado']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizado('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizados']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizados']").val();
        mostrarDatosFinalizado(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizado li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizados']").val();
        mostrarDatosFinalizado(valorBuscar, valorHref, selectBuscar);
        });

        //EHS
        mostrarDatosPendientesehs("", 1, "");

        $("select[name='selectPendientesehs']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientesehs('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientesehs']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientesehs']").val();
        mostrarDatosPendientesehs(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientesehs li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientesehs']").val();
        mostrarDatosPendientesehs(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresoehs("", 1, "");

        $("select[name='selectProgresoehs']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresoehs('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresoehs']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresoehs']").val();
        mostrarDatosProgresoehs(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresoehs li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresoehs']").val();
        mostrarDatosProgresoehs(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadoehs("", 1, "");

        $("select[name='selectFinalizadoehs']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadoehs('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadoehs']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadoehs']").val();
        mostrarDatosFinalizadoehs(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadoehs li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadoehs']").val();
        mostrarDatosFinalizadoehs(valorBuscar, valorHref, selectBuscar);
        });

        //CV
        mostrarDatosPendientescv("", 1, "");

        $("select[name='selectPendientescv']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientescv('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientescv']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientescv']").val();
        mostrarDatosPendientescv(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientescv li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientescv']").val();
        mostrarDatosPendientescv(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresocv("", 1, "");

        $("select[name='selectProgresocv']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresocv('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresocv']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresocv']").val();
        mostrarDatosProgresocv(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresocv li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresocv']").val();
        mostrarDatosProgresocv(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadocv("", 1, "");

        $("select[name='selectFinalizadocv']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadocv('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadocv']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadocv']").val();
        mostrarDatosFinalizadocv(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadocv li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadocv']").val();
        mostrarDatosFinalizadocv(valorBuscar, valorHref, selectBuscar);
        });

        //Sistemas
        mostrarDatosPendientesSistemas("", 1, "");

        $("select[name='selectPendientessistemas']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientesSistemas('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientessistemas']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientessistemas']").val();
        mostrarDatosPendientesSistemas(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientessistemas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientessistemas']").val();
        mostrarDatosPendientesSistemas(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresoSistemas("", 1, "");

        $("select[name='selectProgresosistemas']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresoSistemas('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresosistemas']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresosistemas']").val();
        mostrarDatosProgresoSistemas(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresosistemas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresosistemas']").val();
        mostrarDatosProgresoSistemas(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadoSistemas("", 1, "");

        $("select[name='selectFinalizadosistemas']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadoSistemas('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadosistemas']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadosistemas']").val();
        mostrarDatosFinalizadoSistemas(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadosistemas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadosistemas']").val();
        mostrarDatosFinalizadoSistemas(valorBuscar, valorHref, selectBuscar);
        });

        //AC
        mostrarDatosPendientesAc("", 1, "");

        $("select[name='selectPendientesac']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientesAc('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientesac']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientesac']").val();
        mostrarDatosPendientesAc(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientesac li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientesac']").val();
        mostrarDatosPendientesAc(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresoAc("", 1, "");

        $("select[name='selectProgresoac']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresoAc('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresoac']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresoac']").val();
        mostrarDatosProgresoAc(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresoac li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresoac']").val();
        mostrarDatosProgresoAc(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadoAc("", 1, "");

        $("select[name='selectFinalizadoac']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadoAc('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadoac']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadoac']").val();
        mostrarDatosFinalizadoAc(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadoac li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadoac']").val();
        mostrarDatosFinalizadoAc(valorBuscar, valorHref, selectBuscar);
        });

        //Am
        mostrarDatosPendientesAm("", 1, "");

        $("select[name='selectPendientesam']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientesAm('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientesam']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientesam']").val();
        mostrarDatosPendientesAm(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientesam li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientesac']").val();
        mostrarDatosPendientesAm(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresoAm("", 1, "");

        $("select[name='selectProgresoam']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresoAm('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresoam']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresoam']").val();
        mostrarDatosProgresoAm(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresoam li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresoam']").val();
        mostrarDatosProgresoAm(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadoAm("", 1, "");

        $("select[name='selectFinalizadoam']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadoAm('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadoam']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadoam']").val();
        mostrarDatosFinalizadoAm(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadoam li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadoam']").val();
        mostrarDatosFinalizadoAm(valorBuscar, valorHref, selectBuscar);
        });

        //Administrativos
        mostrarDatosPendientesAd("", 1, "");

        $("select[name='selectPendientesad']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientesAd('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientesad']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientesad']").val();
        mostrarDatosPendientesAd(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientesad li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientesad']").val();
        mostrarDatosPendientesAd(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresoAd("", 1, "");

        $("select[name='selectProgresoad']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresoAd('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresoad']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresoad']").val();
        mostrarDatosProgresoAd(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresoad li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresoad']").val();
        mostrarDatosProgresoAd(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadoAd("", 1, "");

        $("select[name='selectFinalizadoad']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadoAd('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadoad']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadoad']").val();
        mostrarDatosFinalizadoAd(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadoad li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadoad']").val();
        mostrarDatosFinalizadoAd(valorBuscar, valorHref, selectBuscar);
        });

        //Personal
        mostrarDatosPendientespersonal("", 1, "");

        $("select[name='selectPendientespersonal']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientespersonal('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientespersonal']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientespersonal']").val();
        mostrarDatosPendientespersonal(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientespersonal li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientespersonal']").val();
        mostrarDatosPendientespersonal(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresopersonal("", 1, "");

        $("select[name='selectProgresopersonal']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresopersonal('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresopersonal']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresopersonal']").val();
        mostrarDatosProgresopersonal(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresopersonal li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresopersonal']").val();
        mostrarDatosProgresopersonal(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadopersonal("", 1, "");

        $("select[name='selectFinalizadopersonal']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadopersonal('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadopersonal']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadopersonal']").val();
        mostrarDatosFinalizadopersonal(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadopersonal li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadopersonal']").val();
        mostrarDatosFinalizadopersonal(valorBuscar, valorHref, selectBuscar);
        });

        //Mantenimiento
        mostrarDatosPendientesmt("", 1, "");

        $("select[name='selectPendientesmt']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientesmt('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientesmt']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientesmt']").val();
        mostrarDatosPendientesmt(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientesmt li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientesmt']").val();
        mostrarDatosPendientesmt(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresomt("", 1, "");

        $("select[name='selectProgresomt']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresomt('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresomt']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresomt']").val();
        mostrarDatosProgresomt(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresomt li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresomt']").val();
        mostrarDatosProgresomt(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadomt("", 1, "");

        $("select[name='selectFinalizadomt']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadomt('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadomt']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadomt']").val();
        mostrarDatosFinalizadomt(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadomt li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadomt']").val();
        mostrarDatosFinalizadomt(valorBuscar, valorHref, selectBuscar);
        });

        //Kuali
        mostrarDatosPendientesKuali("", 1, "");

        $("select[name='selectPendienteskuali']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientesKuali('', 1, selectBuscar);
         });
    $("input[name='busquedaPendienteskuali']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendienteskuali']").val();
        mostrarDatosPendientesKuali(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendienteskuali li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendienteskuali']").val();
        mostrarDatosPendientesAm(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresoKuali("", 1, "");

        $("select[name='selectProgresokuali']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresoKuali('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresokuali']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresokuali']").val();
        mostrarDatosProgresoKuali(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresokuali li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresokuali']").val();
        mostrarDatosProgresoKuali(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadoKuali("", 1, "");

        $("select[name='selectFinalizadokuali']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadoKuali('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadokuali']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadokuali']").val();
        mostrarDatosFinalizadoKuali(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadokuali li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadokuali']").val();
        mostrarDatosFinalizadoKuali(valorBuscar, valorHref, selectBuscar);
        });
        <?php }elseif($this->session->userdata('tipo') == 1){ ?>
            mostrarDatosPendientesAc("", 1, "");

        $("select[name='selectPendientesac']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosPendientesAc('', 1, selectBuscar);
         });
    $("input[name='busquedaPendientesac']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendientesac']").val();
        mostrarDatosPendientesAc(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionPendientesac li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendientesac']").val();
        mostrarDatosPendientesAc(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosProgresoAc("", 1, "");

        $("select[name='selectProgresoac']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosProgresoAc('', 1, selectBuscar);
         });
    $("input[name='busquedaProgresoac']").keyup(function() {
        textoBuscar = $("input[name='busquedaProgresoac']").val();
        mostrarDatosProgresoAc(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionProgresoac li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaProgresoac']").val();
        mostrarDatosProgresoAc(valorBuscar, valorHref, selectBuscar);
        });

        mostrarDatosFinalizadoAc("", 1, "");

        $("select[name='selectFinalizadoac']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatosFinalizadoAc('', 1, selectBuscar);
         });
    $("input[name='busquedaFinalizadoac']").keyup(function() {
        textoBuscar = $("input[name='busquedaFinalizadoac']").val();
        mostrarDatosFinalizadoAc(textoBuscar, 1, selectBuscar);
        });

        $("body").on("click", ".paginacionFinalizadoac li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaFinalizadoac']").val();
        mostrarDatosFinalizadoAc(valorBuscar, valorHref, selectBuscar);
        });
            <?php }else{ ?>
                mostrarDatos("", 1, "");
                mostrarDatos2("", 1, "");
                mostrarDatos3("", 1, "");
                mostrarDatoscv("", 1, "");
                mostrarDatosehs("", 1, "");
                mostrarDatosSistemas("", 1, "");
                mostrarDatosAc("", 1, "");
                mostrarDatosAm("", 1, "");
            <?php } ?>

        
    $("select[name='selectPedidos']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatos('', 1, selectBuscar);
    });
    $("select[name='selectPedidosVirtuales']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatos2('', 1, selectBuscar);
    });
    $("select[name='selectPedidosCv']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatoscv('', 1, selectBuscar);
    });
    $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar, 1, selectBuscar);
    });
    $("input[name='busqueda2']").keyup(function() {
        textoBuscar = $("input[name='busqueda2']").val();
        mostrarDatos2(textoBuscar, 1, selectBuscar);
    });
    $("input[name='busqueda3']").keyup(function() {
        textoBuscar = $("input[name='busqueda3']").val();
        mostrarDatos3(textoBuscar, 1, selectBuscar);
    });
    $("input[name='busquedacv']").keyup(function() {
        textoBuscar = $("input[name='busquedacv']").val();
        mostrarDatoscv(textoBuscar, 1, selectBuscar);
    });
    $("input[name='busquedaehs']").keyup(function() {
        textoBuscar = $("input[name='busquedaehs']").val();
        mostrarDatosehs(textoBuscar, 1, selectBuscar);
    });
    $("input[name='busquedasistemas']").keyup(function() {
        textoBuscar = $("input[name='busquedasistemas']").val();
        mostrarDatosSistemas(textoBuscar, 1, selectBuscar);
    });
    $("input[name='busquedaac']").keyup(function() {
        textoBuscar = $("input[name='busquedaac']").val();
        mostrarDatosAc(textoBuscar, 1, selectBuscar);
    });
    $("input[name='busquedaam']").keyup(function() {
        textoBuscar = $("input[name='busquedaam']").val();
        mostrarDatosAm(textoBuscar, 1, selectBuscar);
    });
    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        console.log("entro");
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar, valorHref, selectBuscar);
    });
    $("body").on("click", ".paginacion2 li a", function(e) {
        e.preventDefault();
        console.log("entro");
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda2']").val();
        mostrarDatos2(valorBuscar, valorHref, selectBuscar);
    });
    $("body").on("click", ".paginacioncv li a", function(e) {
        e.preventDefault();
        console.log("entro");
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedacv']").val();
        mostrarDatoscv(valorBuscar, valorHref, selectBuscar);
    });
    $("body").on("click", ".paginacionehs li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaehs']").val();
        mostrarDatosehs(valorBuscar, valorHref, selectBuscar);
    });
    
    $("body").on("click", ".paginacionsistemas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedasistemas']").val();
        mostrarDatosSistemas(valorBuscar, valorHref, selectBuscar);
    });
    $("body").on("click", ".paginacionac li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaac']").val();
        mostrarDatosAc(valorBuscar, valorHref, selectBuscar);
    });
    $("body").on("click", ".paginacionam li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaam']").val();
        mostrarDatosAm(valorBuscar, valorHref, selectBuscar);
    });
    $("body").on("click", ".paginacion3 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedakuali']").val();
        mostrarDatos3(valorBuscar, valorHref, selectBuscar);
    });
    $("#tipo_pago").on("change", function(e) {
        var value = parseInt($(this).val());
        $(".notaCredito").css("display", "none");
        $(".infoBanco").css("display", "none");
        $(".monederoElectronico").css("display", "none");
        $(".cheque").css("display", "none");
        if (value < 3) {
            $(".infoBanco").css("display", "block");
        } else if (value == 3) {
            var form = $('#myTabContent form');
            var banco = form.find("select[name='banco']");
            banco.val("");
            banco.selectpicker('refresh');
            form.find("input[name='numero_tarjeta']").val("");
            form.find("input[name='importe_pago']").val("");
        } else if (value == 5) {
            $(".monederoElectronico").css("display", "block");
        } else if (value == 6) {
            $(".notaCredito").css("display", "block");
        } else if (value == 7) {
            $(".cheque").css("display", "block");
        } else {
            var form = $('#myTabContent form');
            form.find("select[name='numero_tarjeta']").val("");
            $(".infoBanco").css("display", "block");
            form.find("#numero_tarjeta").css("display", "none");
        }
    });
});

function mostrarDatos(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidos",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
                

                <?php if($this->session->userdata('tipo')==7){ ?>
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                <?php } ?>                
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                    <?php if($this->session->userdata('tipo') != 7){ ?>
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                    <?php } ?>
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    
                    <?php } ?>
                    /*<?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>*/
                    filas += "</td></tr>";
                
            });
            $('#tbpedidos tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacion").html(paginador);
        }
    });
}

function mostrarDatosPendientes(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosEstatus",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
                

                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }

                
                             
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                   
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
              
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    
                    <?php } ?>
                    /*<?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>*/
                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientes tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientes").html(paginador);
        }
    });
}

function mostrarDatosProgreso(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosEstatus",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
                

               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
             
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                   
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    
                    <?php } ?>
                    /*<?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>*/
                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogreso tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgreso").html(paginador);
        }
    });
}

function mostrarDatosFinalizado(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosEstatus",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
               

               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                  
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    
                    <?php } ?>
                    /*<?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>*/
                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizado tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizado").html(paginador);
        }
    });
}


function mostrarDatos2(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosVirtuales",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
               

               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                   
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
               
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosvirtuales tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacion2").html(paginador);
        }
    });
}

function mostrarDatoscv(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosCv",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidoscv, function(key, item) {
               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                  
                        
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                   
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidoscv tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacioncv").html(paginador);
        }
    });
}

function mostrarDatosPendientescv(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosCv",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidoscv, function(key, item) {

                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                
                         
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
             
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
             
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientescv tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientescv").html(paginador);
        }
    });
}

function mostrarDatosProgresocv(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosCv",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidoscv, function(key, item) {

              
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                
                           
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                    
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                   
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresocv tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionprogresocv").html(paginador);
        }
    });
}

function mostrarDatosFinalizadocv(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosCv",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidoscv, function(key, item) {

           
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                 
                       
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                  
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizadocv tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizadocv").html(paginador);
        }
    });
}

function mostrarDatosAc(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAc",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosac, function(key, item) {
               

                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                         
                 
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                   
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
              
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosac tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionac").html(paginador);
        }
    });
}

function mostrarDatosPendientesAc(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAc",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosac, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                 
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
               
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientesac tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientesac").html(paginador);
        }
    });
}

function mostrarDatosProgresoAc(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAc",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosac, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
              
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                    
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresoac tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgresoac").html(paginador);
        }
    });
}

function mostrarDatosFinalizadoAc(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAc",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosac, function(key, item) {

           
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                  
                        
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
               
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
           
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizadoac tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizadoac").html(paginador);
        }
    });
}

function mostrarDatosAm(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAm",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosam, function(key, item) {           

                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                
                           
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosam tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionam").html(paginador);
        }
    });
}

function mostrarDatosPendientesAm(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAm",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosam, function(key, item) {

               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
               
                         
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientesam tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientesam").html(paginador);
        }
    });
}

function mostrarDatosProgresoAm(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAm",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosam, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
             
                           
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
           
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
               
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresoam tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgresoam").html(paginador);
        }
    });
}

function mostrarDatosFinalizadoAm(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAm",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosam, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                   
                      
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                  
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                   
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizadoam tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizadoam").html(paginador);
        }
    });
}

function mostrarDatosAd(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAd",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosad, function(key, item) {           

                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                
                          
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosad tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionad").html(paginador);
        }
    });
}

function mostrarDatosPendientesAd(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAd",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosad, function(key, item) {

               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                             
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    if (item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientesad tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientesad").html(paginador);
        }
    });
}

function mostrarDatosProgresoAd(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAd",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosad, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
             
                           
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
           
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
               
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    if (item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresoad tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgresoad").html(paginador);
        }
    });
}

function mostrarDatosFinalizadoAd(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosAd",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosad, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                   
                      
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                  
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                   
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    if (item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizadoad tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizadoad").html(paginador);
        }
    });
}


function mostrarDatospersonal(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidospersonal",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidospersonal, function(key, item) {           

                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                
                          
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    if (item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospersonal tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionpersonal").html(paginador);
        }
    });
}

function mostrarDatosPendientespersonal(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidospersonal",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidospersonal, function(key, item) {

               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
               
                      
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    if (item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientespersonal tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientespersonal").html(paginador);
        }
    });
}

function mostrarDatosProgresopersonal(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidospersonal",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidospersonal, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
             
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
           
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
               
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    if (item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresopersonal tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgresopersonal").html(paginador);
        }
    });
}

function mostrarDatosFinalizadopersonal(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidospersonal",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidospersonal, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                   
                       
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                  
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                   
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    if (item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizadopersonal tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizadopersonal").html(paginador);
        }
    });
}


function mostrarDatosmt(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosmt",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosmt, function(key, item) {           

                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                
                         
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosmt tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionmt").html(paginador);
        }
    });
}

function mostrarDatosPendientesmt(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosmt",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosmt, function(key, item) {

               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
               
                           
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                 
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientesmt tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientesmt").html(paginador);
        }
    });
}

function mostrarDatosProgresomt(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosmt",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosmt, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
             
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
           
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
               
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresomt tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgresomt").html(paginador);
        }
    });
}

function mostrarDatosFinalizadomt(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosmt",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosmt, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                   
                     
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                  
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                   
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizadomt tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizadomt").html(paginador);
        }
    });
}

function mostrarDatosehs(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosEhs",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosehs, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
               
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                  
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosehs tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionehs").html(paginador);
        }
    });
}

function mostrarDatosPendientesehs(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosEhs",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosehs, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
                  
                        
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
             
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientesehs tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientesehs").html(paginador);
        }
    });
}

function mostrarDatosProgresoehs(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosEhs",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosehs, function(key, item) {
               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
          
                             
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresoehs tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgresoehs").html(paginador);
        }
    });
}

function mostrarDatosFinalizadoehs(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosEhs",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidosehs, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
            
                             
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
              
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
           
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizadoehs tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizadoehs").html(paginador);
        }
    });
}

function mostrarDatosSistemas(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosSistemas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos_sistemas, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
               
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
              
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
               
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidossistemas tbody').html(filas);
            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionsistemas").html(paginador);
        }
    });
}

function mostrarDatosPendientesSistemas(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosSistemas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos_sistemas, function(key, item) {
               
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
          
                          
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                   
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
          
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientessistemas tbody').html(filas);
            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientessistemas").html(paginador);
        }
    });
}

function mostrarDatosProgresoSistemas(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosSistemas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos_sistemas, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }

                             
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
    
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
         
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresosistemas tbody').html(filas);
            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgresosistemas").html(paginador);
        }
    });
}

function mostrarDatosFinalizadoSistemas(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosSistemas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2,
            estatus: 'Finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos_sistemas, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
            
                          
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
                    
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                  
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizadosistemas tbody').html(filas);
            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizadosistemas").html(paginador);
        }
    });
}

function mostrarDatos3(valorBuscar, pagina, valorBuscar3) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosKuali",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar3: valorBuscar3
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
              
                              
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
        
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
                 
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidoskuali tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacion3").html(paginador);
        }
    });
}

function mostrarDatosPendientesKuali(valorBuscar, pagina, valorBuscar3) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosKuali",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar3: valorBuscar3,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
     
                      
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
           
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
          
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendienteskuali tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendienteskuali").html(paginador);
        }
    });
}
function mostrarDatosPendientesMakili(valorBuscar, pagina, valorBuscar3) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosMakili",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar3: valorBuscar3,
            estatus: 'Pendientes'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
     
                      
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
           
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
          
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidospendientesmakili tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionPendientesmakili").html(paginador);
        }
    });
}

function mostrarDatosProgresoKuali(valorBuscar, pagina, valorBuscar3) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosKuali",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar3: valorBuscar3,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
              
                               
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
     
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
           
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresokuali tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgresokuali").html(paginador);
        }
    });
}
function mostrarDatosProgresoMakili(valorBuscar, pagina, valorBuscar3) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosMakili",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar3: valorBuscar3,
            estatus: 'Progreso'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
              
                               
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
     
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
           
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosprogresomakili tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionProgresomakii").html(paginador);
        }
    });
}

function mostrarDatosFinalizadoKuali(valorBuscar, pagina, valorBuscar3) {
    $.ajax({
        url: "<?= base_url() ?>Pedidos/mostrarPedidosKuali",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar3: valorBuscar3,
            estatus: 'Finalizado'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.pedidos, function(key, item) {
                
                if (((item.entregado * 100) / item.cantidad > 0) && ((item.entregado * 100) / item
                        .cantidad < 100) && (item.estatus == null || item.estatus == 'cerrada')) {
                    clase2 = 'bg-orange';
                    clase = 'table-info';
                } else if (((item.entregado * 100) / item.cantidad == 0) && (item.estatus ==
                        'cerrada' || item.estatus == null)) {
                    clase2 = 'bg-red';
                    clase = 'table-warning';
                } else if (item.cantidad == item.entregado && (item.estatus == 'cerrada' || item
                        .estatus == null)) {
                    clase2 = 'bg-green';
                    clase = 'table-success';
                } else {
                    clase = 'table-danger';
                    clase2 = 'bg-red';
                }
           
                            
                    filas += "<tr class='" + clase + "'><td>" + item.uid + "</td><td>" + item
                        .neodata_pedido + "</td><td>" + item.fecha_creacion + "</td><td>" + item
                        .uid_requisicion + "</td><td>" + item.nombre + "</td><td title='" + item
                        .nombre_proyecto + "'>" + item.numero_proyecto + ' ' + item
                        .nombre_proyecto +
                        "</td>";
          
                    filas += "<td align='center'>" + ((item.entregado * 100) / item.cantidad)
                        .toFixed(
                            2) + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.entregado * 100) / item.cantidad) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                    filas += "<td>" + item.estatus + "</td>";
             
                    filas += "<td><a href='" + "<?= base_url() ?>pedidos/detalle_pedido_almacen/" + item
                        .uid +
                        "' title='Detalle'>" + "<i class='fa fa-info-circle'></i>" + "</a>";
                    <?php if($this->session->userdata('tipo') == 4) { ?>
                    if (item.entrada_virtual == 1 && item.entregado == 0 && item.estatus !=
                        'cancelada') {
                        filas +=
                            "<td><a href='#entrada_virtual' data-toggle='modal' title='Entrada Virtual'" +
                            " data-idpedido='" + item.idtbl_pedidos + "'" + " data-proyecto='" +
                            item
                            .tbl_proyectos_idtbl_proyectos + "'" + " data-maximo='" + item.maximo +
                            "'" + " data-uid='" + item.uid + "'>" +
                            "<i class='fa fa-mail-forward'></i>" + "</a>";
                    }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 7) { ?>
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                        /*filas += "<a href='#cerrarPedido' data-toggle='modal' data-uid_pedido='" + item.uid + "'><i style = 'color:green;' class='fa fa-check'></i></a>";*/
                    }
                    if (item.estatus != "cancelada") {
                        filas += "<a href='#' class='cerrarPedido' data-id-pedido='" + item
                            .idtbl_pedidos + "' data-uid_pedido='" + item.uid + "' data-estatus='" +
                            item.estatus + "' data-moneda='" + item.tipo_moneda +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a>";
                    }
                    <?php } ?>

                    <?php if($this->session->userdata('tipo') == 14){ ?>
                        filas += "<a href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:red;' class='fa fa-remove'></i></a>";
                    <?php } ?>

                    filas += "</td></tr>";
                
            });
            $('#tbpedidosfinalizadokuali tbody').html(filas);

            $(".cerrarPedido").on("click", function(event) {
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
            $(".paginacionFinalizadokuali").html(paginador);
        }
    });
}

$('#cerrarPedido').on('show.bs.modal', function(event) {
    $('#myTab a[href="#tab2"]').addClass("disabled");
    $('#myTab a[href="#tab1"]').tab('show');
});
$('#myTab a[href="#tab1"]').on('click', function(e) {
    $('#myTab a[href="#tab2"]').addClass('disabled');
});
$('#myTabContent table').on('click', "a", function(e) {
    //e.preventDefault();
});

function dtlCerrarPedido(recipient) {
    $.ajax({
        url: "<?= base_url() ?>pedidos/pago-pedido",
        type: "POST",
        data: {
            "idtbl_pedidos": recipient.idPedido
        },
        dataType: "json",
        success: function(response) {
            console.log(response);
            var filas = "";
            var modal = $('#cerrarPedido');
            for (var r = 0; r < response.length; r++) {
                var item = response[r];
                filas += "<tr><td>" + item.folio_pago + "</td><td>" + item.numero_factura + "</td><td>" +
                    item.fecha_pago + "</td><td class='text-right'>$" + item.importe +
                    "</td><td class='text-center'><a href='#' data-folio-pago='" + item.folio_pago +
                    "' data-numero-factura='" + item.numero_factura + "' data-fecha-pago='" + item
                    .fecha_pago + "' data-importe='" + item.importe + "' data-iddtl-pagos='" + item
                    .iddtl_pagos + "' data-iddtl-pedidos='" + item.tbl_pedidos_idtbl_pedidos +
                    "' data-iddtl-bancos='" + item.tbl_bancos_idtbl_bancos + "' data-tipo-cambio='" + item
                    .tipo_cambio + "' data-importe-pago='" + item.importe_pago + "' data-tipo-pago='" + item
                    .tipo_pago + "' data-numero-tarjeta='" + item.numero_tarjeta +
                    "' data-numero-nota-credito='" + item.numero_nota_credito + "' data-numero-cheque='" +
                    item.numero_cheque +
                    "' onclick='editarPagoPedido(this)'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td></tr>"
            }
            modal.find("table tbody").html(filas);
            modal.find("input[name='uid_pedido']").val(recipient.uid_pedido);
            modal.find("input[name='idtbl_pedidos']").val(recipient.idPedido);
            modal.find("input[name='estatus']").val(recipient.estatus);
            modal.find("input[name='moneda']").val(recipient.moneda);
            console.log(recipient);
            modal.find(".btnNuevoPago").css("display", recipient.estatus === null || recipient.estatus ===
                "" ? "inline-block" : "none");
            modal.find(".btnCerrarPedido").attr("disabled", recipient.estatus === null || recipient
                .estatus === "" ? false : true);
            modal.find("#btnAgregarEditar").attr("disabled", recipient.estatus === null || recipient
                .estatus === "" ? false : true);
            modal.find(".tipoCambio").css("display", recipient.moneda === 'p' ? 'none' : 'block');
            modal.modal('show');
        }
    });
}

function agregarEditarPagoPedido() {
    var formData = new FormData($("#cerrar_Pedido")[0]);
    console.log(formData.get("tipo_pago"));
    if ((formData.get("tipo_pago") < 3 && (formData.get("folio_pago") == "" || formData.get("numero_factura") == "" ||
            formData.get("fecha_pago") == "" || formData.get("importe") == "" || formData.get("banco") == null ||
            formData.get("banco") == "" || formData.get("numero_tarjeta") == "")) || (formData.get("tipo_pago") == 3 &&
            (formData.get("folio_pago") == "" || formData.get("numero_factura") == "" || formData.get("fecha_pago") ==
                "" || formData.get("importe") == "")) || (formData.get("tipo_pago") == 4 && (formData.get(
                "folio_pago") == "" || formData.get("numero_factura") == "" || formData.get("fecha_pago") == "" ||
            formData.get("importe") == "" || formData.get("banco") == null || formData.get("banco") == "")) || (formData
            .get("tipo_pago") == 5 && (formData.get("folio_pago") == "" || formData.get("numero_factura") == "" ||
                formData.get("fecha_pago") == "" || formData.get("importe") == "" || formData.get(
                    "importe_pago_monedero_electronico") == "")) || (formData.get("tipo_pago") == 6 && (formData.get(
                "folio_pago") == "" || formData.get("numero_factura") == "" || formData.get("fecha_pago") == "" ||
            formData.get("importe") == "" || formData.get("numero_nota_credito") == "")) || (formData.get(
            "tipo_pago") == 7 && (formData.get("folio_pago") == "" || formData.get("numero_factura") == "" ||
            formData
            .get("fecha_pago") == "" || formData.get("importe") == "" || formData.get("numero_cheque") == ""))) {
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
            if (res == "OK") {
                Toast.fire({
                    type: 'success',
                    title: 'El pago se ha sido cerrado correctamente'
                });
                var modal = $('#cerrarPedido');
                var recipient = {
                    uid_pedido: modal.find("input[name='uid_pedido']").val(),
                    idPedido: modal.find("input[name='idtbl_pedidos']").val(),
                    estatus: modal.find("input[name='estatus']").val(),
                    moneda: modal.find("input[name='moneda']").val()
                }
                dtlCerrarPedido(recipient);
                $('#myTab a[href="#tab2"]').addClass("disabled");
                $('#myTab a[href="#tab1"]').tab('show');
                return;
            }
            if (res == "ERROR") {
                Toast.fire({
                    type: 'error',
                    title: 'Error al crear pago.'
                });
            }
        }
    });
}

function nuevoPagoPedido() {
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
    $(".infoBanco").css("display", "block");
    $(".notaCredito").css("display", "none");
    $(".monederoElectronico").css("display", "none");
    $(".cheque").css("display", "none");
    $("#btnAgregarEditar").html("Agregar");
    $('#myTab a[href="#tab2"]').removeClass("disabled");
    $('#myTab a[href="#tab2"]').tab('show');
}

function editarPagoPedido(e) {
    var data = $(e).data();
    var form = $('#myTabContent form');
    form.find("input[name='folio_pago']").val(data.folioPago);
    form.find("input[name='numero_factura']").val(data.numeroFactura);
    form.find("input[name='fecha_pago']").val(data.fechaPago);
    form.find("input[name='importe']").val(data.importe);
    form.find("input[name='tipo_cambio']").val(data.tipoCambio);
    form.find("input[name='importe_pago']").val(data.importePago);
    form.find("input[name='importe_nota_credito']").val(data.importePago);
    form.find("input[name='importe_pago_monedero_electronico']").val(data.importePago);
    form.find("input[name='numero_tarjeta']").val(data.numeroTarjeta);
    form.find("input[name='numero_nota_credito']").val(data.numeroNotaCredito);
    form.find("input[name='numero_cheque']").val(data.numeroCheque);
    var banco = form.find("select[name='banco']");
    banco.val(data.iddtlBancos);
    banco.selectpicker('refresh');
    banco = form.find("select[name='cheque_banco']");
    banco.val(data.iddtlBancos);
    banco.selectpicker('refresh');
    var tipo_pago = 1;
    if (data.tipoPago == "Tarjeta Debito")
        tipo_pago = 2;
    else if (data.tipoPago == "Efectivo")
        tipo_pago = 3;
    else if (data.tipoPago == "Tranferencia Electronica")
        tipo_pago = 4;
    else if (data.tipoPago == "Monedero Electronico")
        tipo_pago = 5;
    else if (data.tipoPago == "Nota de Credito")
        tipo_pago = 6;
    else if (data.tipoPago == "Cheque")
        tipo_pago = 7;
    var banco = form.find("select[name='tipo_pago']");
    banco.val(tipo_pago);
    banco.selectpicker('refresh');
    form.find("input[name='iddtl_pagos']").val(data.iddtlPagos);
    $("#btnAgregarEditar").html("Guardar");
    $('#myTab a[href="#tab2"]').removeClass("disabled");
    $(".infoBanco").css("display", "none");
    $(".cheque").css("display", "none");
    $(".monederoElectronico").css("display", "none");
    $(".notaCredito").css("display", "none");
    if (tipo_pago < 3) {
        $(".infoBanco").css("display", "block");
    } else if (tipo_pago == 3) {

    } else if (tipo_pago == 6) {
        $(".notaCredito").css("display", "block");
    } else if (tipo_pago == 5) {
        $(".monederoElectronico").css("display", "block");
    } else if (tipo_pago == 6) {
        $(".notaCredito").css("display", "block");
    } else if (tipo_pago == 7) {
        $(".cheque").css("display", "block");
    } else {
        var form = $('#myTabContent form');
        $(".infoBanco").css("display", "block");
        form.find("#numero_tarjeta").css("display", "none");
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
                    if (res == "OK") {
                        Toast.fire({
                            type: 'success',
                            title: 'El pedido ha sido cerrado correctamente'
                        });
                        mostrarDatos("", 1, "");
                        mostrarDatos2("", 1, "");
                        mostrarDatos3("", 1, "")
                        mostrarDatoscv("", 1, "")
                        mostrarDatosehs("", 1, "");
                        mostrarDatosSistemas("", 1, "");
                        $('#cerrarPedido').modal('hide');
                        return;
                    }
                    if (res == "ERROR") {
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


$('#cancelarPedido').on('show.bs.modal', function(event) {
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
    if ($("textarea[name='motivo_cancelacion']").val() == '') {
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
                url: "<?= base_url()?>Pedidos/cancelarPedido",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res == "OK") {
                        Toast.fire({
                            type: 'success',
                            title: 'El pedido ha sido cancelado correctamente'
                        });
                        mostrarDatos("", 1, "");
                        mostrarDatos2("", 1, "");
                        mostrarDatos3("", 1, "")
                        mostrarDatoscv("", 1, "")
                        mostrarDatosehs("", 1, "");
                        mostrarDatosSistemas("", 1, "");
                        $('#cancelarPedido').modal('hide');
                        return;
                    }
                    if (res == "ERROR") {
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
<script>
$(document).on('change', '#tipo', function(event) {
    event.preventDefault();
    var _this = $(this);
    $('#recibe').find('option').remove().end().append(
        '<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#persona_autorizacion').find('option').remove().end().append(
        '<option value="" disabled="disabled" selected="selected">Seleccione...</option>');

    $.ajax({
            url: base_url + 'almacen/tipo-personal',
            type: 'POST',
            dataType: 'json',
            data: {
                tipo: _this.val()
            },
            beforeSend: function() {
                _this.closest('.card-body').addClass('load');
            },
            success: function(data) {
                if (data.error) {
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    });
                }
                if (_this.val() == 'interno') {
                    $.each(data[0].personal_recibe, function(i, item) {
                        $('#recibe').append($('<option>', {
                            value: item.idtbl_usuarios,
                            text: item.nombres + ' ' + item.apellido_paterno + ' ' +
                                item.apellido_materno + ' (Número Empleado ' + item
                                .numero_empleado + ')'
                        }));
                    });

                    $('.divContratistas').hide('slow');
                    $('#recibe').selectpicker('refresh');
                } else {
                    $.each(data[0].contratistas, function(i, item) {
                        $('#contratista').append($('<option>', {
                            value: item.idtbl_contratistas,
                            text: item.nombre_comercial
                        }));
                    });
                    $.each(data[0].supervisores, function(i, item) {
                        $('#supervisor').append($('<option>', {
                            value: item.idtbl_usuarios,
                            text: item.nombres + ' ' + item.apellido_paterno + ' ' +
                                item.apellido_materno + ' (Número Empleado ' + item
                                .numero_empleado + ')'
                        }));
                    });

                    $('#contratista').selectpicker('refresh');
                    $('#supervisor').selectpicker('refresh');
                    $('#recibe').selectpicker('refresh');
                    $('.divContratistas').show('slow');
                }
            },
            error: function(data) {
                console.log(data);
            }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            _this.closest('.card-body').removeClass('load');
        });
});
$(document).on('change', '#contratista', function(event) {
    event.preventDefault();
    var _this = $(this);
    $('#recibe').find('option').remove().end().append(
        '<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $.ajax({
            url: base_url + 'almacen/personal-contratista',
            type: 'POST',
            dataType: 'json',
            data: {
                contratista: _this.val()
            },
            beforeSend: function() {
                _this.closest('.card-body').addClass('load');
            },
            success: function(data) {
                if (data.error) {
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    });
                }
                $.each(data[0], function(i, item) {
                    $('#recibe').append($('<option>', {
                        value: item.idtbl_usuarios,
                        text: item.nombres + ' ' + item.apellido_paterno + ' ' +
                            item.apellido_materno
                    }));
                });
                $('#recibe').selectpicker('refresh');
            },
            error: function(data) {
                console.log(data);
            }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            _this.closest('.card-body').removeClass('load');
        });
});
</script>
