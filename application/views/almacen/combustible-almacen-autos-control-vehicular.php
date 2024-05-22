<section>

    <!-- Modal -->
    <div class="modal fade" id="reporteCombustible" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reporte de combustible</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>Almacen/getReporteCombustible" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Eco*</label>
                                <select name="parametro" class="form-control" required>
                                    <option value="" selected disabled>Seleccione...</option>
                                    <option value="todos">Todos</option>
                                    <?php foreach($ecos as $eco) { ?>
                                        <option value="<?= $eco['iddtl_almacen'] ?>"><?= $eco['numero_interno'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Rango de busqueda*</label>
                                <select name="rango" id="rango" class="form-control" required>
                                    <option value="" selected disabled>Seleccione...</option>
                                    <option value="diario">Diario</option>
                                    <option value="semanal">Semanal</option>
                                    <option value="mensual">Mensual</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" id="anio" style="display: none;">
                                <label>Año*</label>
                                <input type="number" class="form-control" name="anio">
                            </div>
                            <div class="col-md-6" id="mes" style="display: none;">
                                <label>Mes*</label>
                                <select name="mes" class="form-control" required>
                                    <option value="" selected disabled>Seleccione...</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary"><a class="fa fa-file-excel-o"></a> Descargar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Encabezado del espacio de la tala, título y precios de gasolina-->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Cargas del día</h4>
                    </div>
                    <div class="card-body">
                    <div class="over"></div>
                    <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                        <div class="card-title">
                            <!--<h4><?php $almacen->almacen ?> <small class="float-right">Precio Dolar
                                    $<?php echo $precio_dolar ?></small></h4><br>-->
                            <h4 class="text-right"><a href='#precio_combustible_modal' data-toggle='modal'><small class="float-right" >Precio Combustible Regular $ <span id="precio_combustible_regular_label"></span></small></a></h4><br>
                            <h4 class="text-right"><a href='#precio_combustible_modal' data-toggle='modal'><small class="float-right" >Precio Combustible Premium $ <span id="precio_combustible_premium_label"></span></small></a></h4><br>
                            <h4 class="text-right"><a href='#precio_combustible_modal' data-toggle='modal'><small class="float-right" >Precio Combustible Diesel $ <span id="precio_combustible_diesel_label"></span></small></a></h4><br>
                            <h4 class="text-right"><a href='#precio_combustible_modal' data-toggle='modal'><small class="float-right" >Total carga día $ <span id="total_carga_dia"></span></small></a></h4><br>

                        </div>
                        <?php $search_array = $this->session->userdata('permisos'); ?>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#reporteCombustible">
                                        <i class="fa fa-text"></i> Reporte Combustible
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaCargaDia">
                        </div>                        
                        <button onclick="window.location.href='<?php echo base_url() ?>control-vehicular/excel-autos-cv/'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
                        <button data-target="#cargar_combustible_manual" data-toggle='modal' title='Cargar gasolina' class="btn btn-warning" tabindex="0" aria-controls="data-table"><span><i class="fa fa-car"></i> Nueva carga de gasolina Extemporánea</span></button> <!--CARGA GAS -->
                        <button data-target="#cargar_combustible_manual_multiple" data-toggle='modal' title='Cargar gasolina' class="btn btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-car"></i> Nueva carga de gasolina</span></button> <!--CARGA GAS -->

                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbcargadia">
                                <thead>
                                    <tr>
                                        <th>Neodata</th>
                                        <th data-priority="1">Código</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th data-priority="2">Descripción</th>
                                        <th>Serie</th>
                                        <th>N° Interno</th>
                                        <th title="Categoría">Categoría</th>
                                        <th>Estatus</th>
                                        <th>Ubicación</th>
                                        <th>Operador</th>
                                        <th>Precio Unitario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Neodata</th>
                                        <th>Código</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Descripción</th>
                                        <th>Serie</th>
                                        <th>N° Interno</th>
                                        <th title="Categoría">Categoría</th>
                                        <th>
                                            Estatus
                                        </th>
                                        <th>Ubicación</th>
                                        <th>Operador</th>
                                        <th>Precio Unitario</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                   
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionCargaDia">

                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
            <!-- end col-->
        </div>

    </div>
<!-- Encabezado del espacio de la tala, título y precios de gasolina-->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo $almacen->almacen ?> / Combustible</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <!--<h4><?php $almacen->almacen ?> <small class="float-right">Precio Dolar
                                    $<?php echo $precio_dolar ?></small></h4><br>-->
       
                        </div>
                        <?php $search_array = $this->session->userdata('permisos'); ?>
                        
                       
             
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                        </div>                        
                        <button onclick="window.location.href='<?php echo base_url() ?>control-vehicular/excel-autos-cv/'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
    

                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbalmacenautoscontrolvehicular">
                                <thead>
                                    <tr>
                                        <th>Neodata</th>
                                        <th data-priority="1">Código</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th data-priority="2">Descripción</th>
                                        <th>Serie</th>
                                        <th>N° Interno</th>
                                        <th title="Categoría">Categoría</th>
                                        <th>Estatus</th>
                                        <th>Ubicación</th>
                                        <th>Operador</th>
                                        <th>Precio Unitario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Neodata</th>
                                        <th>Código</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Descripción</th>
                                        <th>Serie</th>
                                        <th>N° Interno</th>
                                        <th title="Categoría">Categoría</th>
                                        <th>
                                            <select name="selectCV" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="disponible">Disponible</option>
                                                <option value="robado">Robado</option>
                                                <option value="perdida total">Perdida Total</option>
                                                <option value="vendida">Vendida</option>
                                                <option value="asignado">Asignado</option>
                                                <option value="reparacion">Reparación</option>
                                                <option value="tramite vehicular">Tramite vehicular</option>
                                                <option value="colision">Colisión</option>
                                                <option value="taller">Taller</option>
                                            </select>
                                        </th>
                                        <th>Ubicación</th>
                                        <th>Operador</th>
                                        <th>Precio Unitario</th>
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
                        <br><br>
                    </div>
                </div>
            </div>
            <!-- end col-->
        </div>

    </div>
</section>
<!-- Modal para carga de gas por default, uno por uno-->
<div class="modal fade" id="cargar_combustible_modal" tabindex="-1" role="dialog" aria-labelledby="cargar_combustible_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?= form_open('', 'id="cargar_combustible_form" class="needs-validation" novalidate') ?>
      <div class="modal-header">
        <h5 class="modal-title" id="cargar_combustible_titulo">Cargar Gasolina <span id="eco"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Kilometraje:</label>                                        
                    <input type="number" class="form-control" name="km" required disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Kilometraje Actual:</label>
                    <input  type="number" value="" class="form-control" name="km_actual" step="0.01" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Litros:</label>
                    <input type="text" value="" class="form-control" name="litros_combustible" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tipo Combustible:</label>
                    <select id="tipo_combustible" name="tipo_combustible" class="form-control">
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="diesel">Diesel</option>
                    </select>
                </div>
            </div> 
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="text" value="" class="form-control" name="precio" readonly>
                </div>
            </div> 
            <!--<select id="langsel">
            <option value='eng' selected> English </option>
            </select>
            <input type="file" id="file-1" class="inputfile" />
            <img id="selected-image"  src="" />
            <div id="log">
                <span id="startPre">  
                    <button id="starLink" type="button">Click here to recognize text</a> or choose your own image</button>
                </span>
            </div>-->
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Proyecto:</label>
                    <select id="idtbl_proyecto" name="idtbl_proyectos" class="form-control">
                        <?php foreach($proyectos AS $key => $value){ ?>
                        <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto . '-' . substr($value->nombre_proyecto,0,70) ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Evidencia:</label>
                    <input type="file" class="form-control" name="archivo" required>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="iddtl_almacen" value="">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
<!--Termino de modal por default-->

<!-- Modal para carga de gas por default, uno por uno-->
<div class="modal fade" id="cargar_combustible_manual_multiple" tabindex="-1" role="dialog" aria-labelledby="cargar_combustible_manual" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="over"></div>
                    <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
      <?= form_open('', 'id="cargar_combustible_formanualmultiple" class="needs-validation" novalidate') ?>
      <div class="modal-header">
        <h5 class="modal-title" id="cargar_combustible_titulo">Nueva carga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Vale:</label>                                        
                    <input type="text" class="form-control vale" id="vale" name="vale" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Ubicación:</label>
                    <select id="ubicacion" name="ubicacion" id="ubicacion" class="form-control">
                        <option value="">Seleccione...</option>
                        <option value="normal">Local</option>
                        <option value="tizayuca">Tizayuca</option>
                    </select>
                </div>
            </div>
        </div>
      <div id="item-producto1" class="itemproducto productoFieldset" id="productoFieldset1">
      <?= form_open('', 'class="cargar_combustible_formanualmultiple" class="needs-validation" novalidate') ?>

        <hr>
        <h3>Bomba <label id="bomba" class="bomba">1</label></h3>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Eco:</label>
                    <select name="eco[]" class="selectpicker eco" id="select_eco" required data-live-search="true">
                            <option value="eco" id="eco" selected disabled>Seleccione...</option>                                                                
                            <?php foreach($ecos as $eco) { ?>                                                                                                                                    
                            <option value="<?= $eco['iddtl_almacen']?>"><?= $eco['numero_interno'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Kilometraje:</label>                                        
                    <input type="number" class="form-control kilometraje" name="km[]" required disabled>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Kilometraje:</label>
                    <input  type="number" value="" class="form-control km" name="km_actual[]" step="0.01" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Litros:</label>
                    <input type="text" value="" class="form-control" name="litros_combustible[]" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tipo Combustible:</label>
                    <select id="tipo_gas" name="tipo_gas[]" class="form-control tipo_gas">
                        <option value="">Seleccione...</option>
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="diesel">Diesel</option>
                    </select>
                </div>
            </div> 
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="text" value="" class="form-control precio" name="precio[]" readonly required>
                </div>
            </div> 
            
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Proyecto:</label>
                    <select id="idtbl_proyecto" name="idtbl_proyectos[]" class="selectpicker proyecto" required data-live-search="true">
                        <option value="">Seleccione...</option>
                        <?php foreach($proyectos AS $key => $value){ ?>
                        <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto . '-' . substr($value->nombre_proyecto,0,70) ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Evidencia:</label>
                    <input type="file" class="form-control" name="archivo[]" capture required multiple>
                </div>
            </div>
            <div class="col-sm-6">
            <button type="button" class="btn btn-primary boton" id="1" onClick="guardar_carga(this.id)">Guardar</button>
                        </div>

                        <?= form_close() ?>

          <i class="fa fa-close delete-product" style="display:none"></i>
            </div>
            
        </div>
        <div class="col text-center">
            <span class="fa fa-plus" id="nuevoProducto" style="background: green;height: 30px;width: 30px;text-align: center;color: #fff;border-radius: 25px;font-size: 20px;line-height: 1.7;cursor: pointer;
              "></span>
          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="iddtl_almacen" value="">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!--Termino de modal por default-->

<!-- Modal para carga de gas por default, uno por uno-->
<div class="modal fade" id="cargar_combustible_manual" tabindex="-1" role="dialog" aria-labelledby="cargar_combustible_manual" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?= form_open('', 'id="cargar_combustible_formanual" class="needs-validation" novalidate') ?>
      <div class="modal-header">
        <h5 class="modal-title" id="cargar_combustible_titulo">Nueva carga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-sm-6">
                <div class="form-group">
                    <label>Fecha:</label>
                    <input type="date" value="" class="form-control" name="fecha">
                </div>
            </div> 
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Kilometraje:</label>
                    <input  type="number" value="" class="form-control" name="km_actual" step="0.01" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Litros:</label>
                    <input type="text" value="" class="form-control" name="litros_combustible" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tipo Combustible:</label>
                    <select id="tipo_gas" name="tipo_gas" class="form-control tipo_gas">
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="diesel">Diesel</option>
                    </select>
                </div>
            </div> 
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="text" value="" class="form-control" name="precio" >
                </div>
            </div> 
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Eco:</label>
                    <select name="eco" class="form-control" required>
                            <option value="eco" id="eco" selected disabled>Seleccione...</option>                                                                
                            <?php foreach($ecos as $eco) { ?>                                                                                                                                    
                            <option value="<?= $eco['iddtl_almacen']?>"><?= $eco['numero_interno'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Proyecto:</label>
                    <select id="idtbl_proyecto" name="idtbl_proyectos" class="form-control">
                        <?php foreach($proyectos AS $key => $value){ ?>
                        <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto . '-' . substr($value->nombre_proyecto,0,70) ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Evidencia:</label>
                    <input type="file" class="form-control" name="archivo" required>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="iddtl_almacen" value="">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>
<!--Termino de modal por default-->

<!-- Modal para establecer el precio de la gasolina -->
<div class="modal fade" id="precio_combustible_modal" tabindex="-1" role="dialog" aria-labelledby="precio_combustible_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="precio_combustible_form">
          <div class="modal-header">
            <h5 class="modal-title" id="cargar_combustible_titulo">Precio Combustible</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="row pb-2">
                    <div class="col-6">
                        Regular
                    </div>
                    <div class="col-6">
                        <input type="number" value="" class="form-control" name="precio_combustible_regular" step="0.0001" required>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-6">
                        Premium
                    </div>
                    <div class="col-6">
                        <input type="number" value="" class="form-control" name="precio_combustible_premium" step="0.0001" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Diesel
                    </div>
                    <div class="col-6">
                        <input type="number" value="" class="form-control" name="precio_combustible_diesel" step="0.0001" required>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="iddtl_almacen" value="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          
          </div>
          </form>
      
    </div><?= form_close() ?>
  </div>
</div>
<!-- Fin del modal de precio gas-->
<!--Muestra los precios y datos que estan en la base -->
<script>
$(document).ready(function() {

 
    selectBuscar = "";
    mostrarDatos("",1,"");
    totalCargaDia();
    mostrarDatosCargaDia("",1,"");

    $("select[name='selectCV']").on('change', function() {
        selectBuscar = $(this).val();
        mostrarDatos('', 1, selectBuscar);
    });

    $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar, 1, selectBuscar);
    });

    $("input[name='busquedaCargaDia']").keyup(function() {
        textoBuscar = $("input[name='busquedaCargaDia']").val();
        mostrarDatosCargaDia(textoBuscar, 1, selectBuscar);
    });

    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar, valorHref, selectBuscar);
    });

    $("body").on("click", ".paginacionCargaDia li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaCargaDia']").val();
        mostrarDatosCargaDia(valorBuscar, valorHref, selectBuscar);
    });
    var precio_combustible = window.localStorage.getItem("precio_combustible_regular");
    $("#precio_combustible_regular_label").text(isNaN(precio_combustible) || precio_combustible == null || precio_combustible == undefined ? "---" : precio_combustible);
    $(".precio_combustible_regular_label").val(isNaN(precio_combustible) || precio_combustible == null || precio_combustible == undefined ? "---" : precio_combustible);

    precio_combustible = window.localStorage.getItem("precio_combustible_premium");
    $("#precio_combustible_premium_label").text(isNaN(precio_combustible) || precio_combustible == null || precio_combustible == undefined ? "---" : precio_combustible);
    precio_combustible = window.localStorage.getItem("precio_combustible_diesel");
    $("#precio_combustible_diesel_label").text(isNaN(precio_combustible) || precio_combustible == null || precio_combustible == undefined ? "---" : precio_combustible);

    $("#starLink").click(function() {
        //alert('hola');
        const worker = new Tesseract.TesseractWorker();
        var file = $("#file-1").val();
        worker.recognize(file, $("#langsel").val())
        .progress(function(packet){
            console.info(packet);
            progressUpdate(packet);
        })
        .then(function(data){
            console.log(data);
            progressUpdate({ status: 'done', data: data });
        })
    });
});

$('#nuevoProducto').click(function (event) {
  /* Act on the event */
  var $div = $('div[id^="item-producto"]:last');

  // Read the Number from that DIV's ID (i.e: 3 from "klon3")
  // And increment that number by 1
  var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;
  // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
  var $klon = $div.clone().prop('id', 'item-producto' + num);

  $klon.find('.bomba').html(num);
  $klon.find('.boton').prop('id', num);

  
  $klon.css('display', 'none');
  $div.after($klon);
  $klon.show(500);
  $klon.find('.bootstrap-select').replaceWith(function () {
    return $('select', this);
  });
  $('#item-producto' + num + ' .selectpicker').selectpicker();
  $klon.find('input,textarea').val('');
  $klon.find('.delete-product').css('display', 'block');
});
$(document).on('click', '.delete-product', function () {
  $(this).parents('div[id^="item-producto"]').remove();
});

$(document).on('change', '#select_eco', function (event) {
    event.preventDefault();    
    var proyecto = $("#selectProyecto").val();
    var segmento = $("#ssegmento").val();
    var tipo_almacen = $("#tipo_almacen").val();
    
    var id_almacen = $(this).val();
        var id_select = $(this).attr("id");
        var $div = $('div[id^="item-producto"]:last');
        var num = parseInt($div.prop("id").match(/\d+/g), 10);
        var _this = $(this).closest('#item-producto' + num);

  $.ajax({
    url: "<?= base_url()?>ControlVehicular/getKmEco",
    type: "post",
    data: 'id_almacen='+ id_almacen,
    dataType: 'json',
    processData: false,
    success : function(data) {
      //console.log(data[0]);

        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        $(_this).find('.kilometraje').val(data[0].km_actual);
        $(_this).find('.km').prop('min', data[0].km_actual);

        //$(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));

      },
      error : function(data) {
        console.log(data);
      }
      
    });
    
    
  });

  $(document).on('change', '#tipo_gas', function (event) {
    event.preventDefault();    

    
    var id_almacen = $(this).val();
        var id_select = $(this).attr("id");
        var $div = $('div[id^="item-producto"]:last');
        var num = parseInt($div.prop("id").match(/\d+/g), 10);
        var _this = $(this).closest('#item-producto' + num);
        var tipo_combustible = $(this).val();
        var item = "precio_combustible_regular";
        if(tipo_combustible == "premium"){
            item = "precio_combustible_premium";
        }else if(tipo_combustible == "diesel"){
            item = "precio_combustible_diesel";
        }
        var precio_combustible = window.localStorage.getItem(item);
  
        $(_this).find('.precio').val(precio_combustible);

    
    
  });

function progressUpdate(packet){
    var log = document.getElementById('log');
 
    if(log.firstChild && log.firstChild.status === packet.status){
        if('progress' in packet){
            var progress = log.firstChild.querySelector('progress')
            progress.value = packet.progress
        }
    }else{
        var line = document.createElement('div');
        line.status = packet.status;
        var status = document.createElement('div')
        status.className = 'status'
        status.appendChild(document.createTextNode(packet.status))
        line.appendChild(status)
 
        if('progress' in packet){
            var progress = document.createElement('progress')
            progress.value = packet.progress
            progress.max = 1
            line.appendChild(progress)
        }
 
 
        if(packet.status == 'done'){
            log.innerHTML = ''
            var pre = document.createElement('pre')
            pre.appendChild(document.createTextNode(packet.data.text.replace(/\n\s*\n/g, '\n')))
            line.innerHTML = ''
            line.appendChild(pre)
            $(".fas").removeClass('fa-spinner fa-spin')
            $(".fas").addClass('fa-check')
        }
 
        log.insertBefore(line, log.firstChild)
    }
}

/*Muestra tabla completa*/
function mostrarDatos(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarAlmacenAutosControlVehicular",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            selectCV: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.almacenAutosControlVehicular, function(key, item) {
                var clase = '';
                totalKM = item.km_servicio - item.km_actual;                
                if(item.iddtl_servicio != null){
                    servicio = 'si'; 
                    clase = 'table-warning';                                                   
                }else{
                    servicio = 'no';
                    if (totalKM > 500 && item.km_servicio != 0 && item.km_servicio != null) {
                        clase = "table-success";
                    } else if (totalKM <= 500 && totalKM > 0 && item.km_servicio != 0 && item.km_servicio != null) {
                        clase = "table-warning";
                    } else if (totalKM < 0 && item.km_servicio != 0 && item.km_servicio != null){
                        clase = "table-danger";
                    } else if (totalKM == '') {
                        clase = '';
                    }
                }

                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.neodata + "</td>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.marca + "</td>";
                filas += "<td>" + item.modelo + "</td>";
                filas += "<td>" + item.descripcion + "</td>";
                filas += "<td>" + item.numero_serie + "</td>";
                filas += "<td>" + item.numero_interno + "</td>";
                filas += "<td title='" + item.categoria + "'>" + item.abreviatura + "</td>";
                filas += "<td>" + item.estatusAlmacen + "</td>";
                filas += "<td>" + item.ubicacion + "</td>";
                if (item.estatus_asignacion == "activa") {
                    filas +=
                        "<td><a href='#historialOperador' data-toggle='modal' data-idtbl_usuarios='" +
                        item.idtbl_usuarios + "' data-iddtl_almacen='" + item.iddtl_almacen +
                        "' data-operador='" + item.nombres + ' ' + item.apellido_paterno + ' ' +
                        item.apellido_materno + "' >" + item.nombres + ' ' + item.apellido_paterno +
                        ' ' + item.apellido_materno + "</a></td>";
                } else {
                    filas += "<td>Sin asignación</td>";
                }
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                filas += "<td>$" + item.precio + "</td>";
                filas += "<td>";
                filas += "<a href='" + "<?= base_url()?>almacen/detalle_producto_combustible/" + item
                    .iddtl_almacen + "' title='Información' onClick='" +
                    "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>";
                <?php if ((isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo'] == 3) || (isset($this->session->userdata('permisos')['almacen_autos_control_vehicular']) && $this->session->userdata('permisos')['almacen_autos_control_vehicular'] == 3)) : ?>
                filas += "<a href='#cargar_combustible_modal' data-toggle='modal' title='Opciones' data-interno='" + item.numero_interno + "' data-km='" + item.km_actual + "' data-iddtl_almacen='" + item.iddtl_almacen + "'><i class='fa fa-plus'></i></a>";
                <?php endif ?>
                filas += "</td>";
                filas += "</tr>";
            });
            $('#tbalmacenautoscontrolvehicular tbody').html(filas);
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
/*Fin de tabla completa*/

/*Total de carga al día*/
function totalCargaDia() {
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/totalCargaDia",
        type: "POST",
        dataType: "json",
        success: function(response) {
            var total = 0;
            if(response[0].total != null){
                total = parseFloat(response[0].total).toFixed(2);
            }
            $('#total_carga_dia').html(total);

        }
    });
}
/*Total de carga al día*/


function mostrarDatosCargaDia(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/mostrarCargaDia",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            selectCV: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.cargaDia, function(key, item) {
                var clase = '';
                totalKM = item.km_servicio - item.km_actual;                
                if(item.iddtl_servicio != null){
                    servicio = 'si'; 
                    clase = 'table-warning';                                                   
                }else{
                    servicio = 'no';
                    if (totalKM > 500 && item.km_servicio != 0 && item.km_servicio != null) {
                        clase = "table-success";
                    } else if (totalKM <= 500 && totalKM > 0 && item.km_servicio != 0 && item.km_servicio != null) {
                        clase = "table-warning";
                    } else if (totalKM < 0 && item.km_servicio != 0 && item.km_servicio != null){
                        clase = "table-danger";
                    } else if (totalKM == '') {
                        clase = '';
                    }
                }

                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.neodata + "</td>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.marca + "</td>";
                filas += "<td>" + item.modelo + "</td>";
                filas += "<td>" + item.descripcion + "</td>";
                filas += "<td>" + item.numero_serie + "</td>";
                filas += "<td>" + item.numero_interno + "</td>";
                filas += "<td title='" + item.categoria + "'>" + item.abreviatura + "</td>";
                filas += "<td>" + item.estatusAlmacen + "</td>";
                filas += "<td>" + item.ubicacion + "</td>";
                if (item.estatus_asignacion == "activa") {
                    filas +=
                        "<td><a href='#historialOperador' data-toggle='modal' data-idtbl_usuarios='" +
                        item.idtbl_usuarios + "' data-iddtl_almacen='" + item.iddtl_almacen +
                        "' data-operador='" + item.nombres + ' ' + item.apellido_paterno + ' ' +
                        item.apellido_materno + "' >" + item.nombres + ' ' + item.apellido_paterno +
                        ' ' + item.apellido_materno + "</a></td>";
                } else {
                    filas += "<td>Sin asignación</td>";
                }
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                filas += "<td>$" + item.precio + "</td>";
                filas += "<td>";
                filas += "<a href='" + "<?= base_url()?>almacen/detalle_producto_combustible/" + item
                    .iddtl_almacen + "' title='Información' onClick='" +
                    "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>";
                <?php if ((isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo'] == 3) || (isset($this->session->userdata('permisos')['almacen_autos_control_vehicular']) && $this->session->userdata('permisos')['almacen_autos_control_vehicular'] == 3)) : ?>
                filas += "<a href='#cargar_combustible_modal' data-toggle='modal' title='Opciones' data-interno='" + item.numero_interno + "' data-km='" + item.km_actual + "' data-iddtl_almacen='" + item.iddtl_almacen + "'><i class='fa fa-plus'></i></a>";
                <?php endif ?>
                filas += "</td>";
                filas += "</tr>";
            });
            $('#tbcargadia tbody').html(filas);
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
            $(".paginacionCargaDia").html(paginador);
        }
    });
}


/*PRECIO DEPENDIENDO TIPO DE GAS pendiente*/ 
$('#tipo_combustible').on('change', function(event){
    var tipo_combustible = $(this).val();
    var item = "precio_combustible_regular";
    if(tipo_combustible == "premium"){
        item = "precio_combustible_premium";
    }else if(tipo_combustible == "diesel"){
        item = "precio_combustible_diesel";
    }
    var precio_combustible = window.localStorage.getItem(item);
    $("#cargar_combustible_modal").find('input[name="precio"]').val(precio_combustible);
});

/*PRECIO DEPENDIENDO TIPO DE GAS pendiente*/ 
$('.tipo_gas').on('change', function(event){
    var tipo_combustible = $(this).val();
    var item = "precio_combustible_regular";
    if(tipo_combustible == "premium"){
        item = "precio_combustible_premium";
    }else if(tipo_combustible == "diesel"){
        item = "precio_combustible_diesel";
    }
    var precio_combustible = window.localStorage.getItem(item);
    $("#cargar_combustible_manual").find('input[name="precio"]').val(precio_combustible);
    $("#cargar_combustible_manual_multiple").find('input[class="form-control precio"]').val(precio_combustible);

});




/*Jala los datos de la base y los muestra en el formulario*/
$('#cargar_combustible_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var recipent = button.data();
  var modal = $(this);
  modal.find("form").removeClass("was-validated");;
  modal.find('input[name="km"]').val(recipent.km);
  modal.find('input[name="km_actual"]').attr("min", parseInt(recipent.km) + 1);
  modal.find('input[name="km_actual"]').val("");
  modal.find('input[name="litros_combustible"]').val("");
  modal.find('#eco').text(recipent.interno);
  modal.find('input[name="iddtl_almacen"]').val(recipent.iddtl_almacen);
  modal.find('select[name="tipo_combustible"]').val("regular");
  var precio_combustible = window.localStorage.getItem("precio_combustible_regular");
  modal.find('input[name="precio"]').val(precio_combustible);
  
});

/*Jala los datos de la base y los muestra en el formulario*/
$('#cargar_combustible_manual').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var recipent = button.data();
  var modal = $(this);
  modal.find("form").removeClass("was-validated");
  modal.find('input[name="km_actual"]').attr("min", parseInt(recipent.km) + 1);
  modal.find('input[name="km_actual"]').val("");
  modal.find('input[name="litros_combustible"]').val("");
  modal.find('#eco').text(recipent.interno);
  modal.find('input[name="iddtl_almacen"]').val(recipent.iddtl_almacen);
  modal.find('select[name="tipo_gas"]').val("regular");
  var precio_combustible = window.localStorage.getItem("precio_combustible_regular");
  modal.find('input[name="precio"]').val(precio_combustible);
  
});

$('#cargar_combustible_manual_multiple').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var recipent = button.data();
  var modal = $(this);
  modal.find("form").removeClass("was-validated");
  modal.find('input[name="km_actual"]').attr("min", parseInt(recipent.km) + 1);
  modal.find('input[name="km_actual"]').val("");
  modal.find('input[name="litros_combustible"]').val("");
  modal.find('#eco').text(recipent.interno);
  modal.find('input[name="iddtl_almacen"]').val(recipent.iddtl_almacen);
  modal.find('select[name="tipo_gas"]').val("regular");
  var precio_combustible = window.localStorage.getItem("precio_combustible_regular");
  modal.find('input[name="precio"]').val(precio_combustible);
  
});

$('#precio_combustible_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var recipent = button.data();
  var modal = $(this);
  var precio_combustible = window.localStorage.getItem("precio_combustible_regular");
  modal.find('input[name="precio_combustible_regular"]').val(precio_combustible);
  precio_combustible = window.localStorage.getItem("precio_combustible_premium");
  modal.find('input[name="precio_combustible_premium"]').val(precio_combustible);
  precio_combustible = window.localStorage.getItem("precio_combustible_diesel");
  modal.find('input[name="precio_combustible_diesel"]').val(precio_combustible);
});
/*Guarda precio de gas establecido y lo muestra*/

$("#precio_combustible_form").on("submit", function(e){ /*MODAL*/
    
    var precio = $(this).find("input[name='precio_combustible_regular']").val();
    window.localStorage.setItem("precio_combustible_regular", precio);
    $("#precio_combustible_regular_label").text(precio);
    precio = $(this).find("input[name='precio_combustible_premium']").val();
    window.localStorage.setItem("precio_combustible_premium", precio);
    $("#precio_combustible_premium_label").text(precio);
    precio = $(this).find("input[name='precio_combustible_diesel']").val();
    window.localStorage.setItem("precio_combustible_diesel", precio);
    $("#precio_combustible_diesel_label").text(precio);
    Toast.fire({
        type: 'success',
        title: "Se guardo correctamente."
    });
});


$("#cargar_combustible_form").on("submit", function(e){
    e.preventDefault();
    var form = new FormData($(this)[0]);
    var precio = $(this).find("input[name='precio']").val();
    if(isNaN(precio) || precio == null || precio == undefined || precio == ""){
        Toast.fire({
            type: 'error',
            title: "Precio combustible no valido."
        });
        return;
    }
    if(!this.checkValidity()){
        return;
    }
    $.ajax({
      type:"POST",
      url: "<?= base_url() ?>/ControlVehicular/cargarCombustible",
      data: form,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(resp) {
        console.log(resp);
        if(resp.error == false){
          Toast.fire({
                type: 'success',
                title: resp.mensaje
          });
          mostrarDatos('', 1, selectBuscar);
          $("#cargar_combustible_modal").modal('hide');        
        }else{
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          });
        }
      }
    });
});

$("#cargar_combustible_formanual").on("submit", function(a){
    a.preventDefault();
    var form = new FormData($(this)[0]);
    var precio = $(this).find("input[name='precio']").val();
    if(isNaN(precio) || precio == null || precio == undefined || precio == ""){
        Toast.fire({
            type: 'error',
            title: "Precio combustible no valido."
        });
        return;
    }
    if(!this.checkValidity()){
        return;
    }
    $.ajax({
      type:"POST",
      url: "<?= base_url() ?>ControlVehicular/cargaCombustibleManual",
      data: form,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(resp) {
        if(resp.error == false){
          Toast.fire({
                type: 'success',
                title: resp.mensaje
          });
          mostrarDatos('', 1, selectBuscar);          
          $("#cargar_combustible_manual").modal('hide');
        }else{
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          });
        }
      }
    });
});

function guardar_carga(id){
    //a.preventDefault();
    id=id-1;
    var form = new FormData();
    var eco = $("#cargar_combustible_formanualmultiple select[name='eco[]']");
    var km_actual = $("#cargar_combustible_formanualmultiple input[name='km_actual[]']");
    var litros = $("#cargar_combustible_formanualmultiple input[name='litros_combustible[]']");
    var tipo_gas = $("#cargar_combustible_formanualmultiple select[name='tipo_gas[]']");
    var precio = $("#cargar_combustible_formanualmultiple input[name='precio[]']");
    var proyecto = $("#cargar_combustible_formanualmultiple select[name='idtbl_proyectos[]']");
    var evidencia = $("#cargar_combustible_formanualmultiple input[name='archivo[]']");
    var vale = $("#vale").val();
    var ubicacion = $("#ubicacion").val();

    form.append("archivo[]", evidencia[id].files[0]);
    form.append("eco[]", eco[id].value);
    form.append("km_actual[]", km_actual[id].value);
    form.append("litros_combustible[]", litros[id].value);
    form.append("tipo_gas[]", tipo_gas[id].value);
    form.append("precio[]", precio[id].value);
    form.append("idtbl_proyectos[]", proyecto[id].value);
    form.append("vale", vale);
    form.append("ubicacion", ubicacion);

    //var form = new FormData($(this)[0]);
    /*var precio = $(this).find("input[name='precio[]']");
    if(isNaN(precio) || precio == null || precio == undefined || precio == ""){
        Toast.fire({
            type: 'error',
            title: "Precio combustible no valido."
        });
        return;
    }*/
    
    //if(!this.checkValidity()){
    //    return;
    //}
    
    if(($("#vale").val() == '' || $("#vale").val() == null)) {
        Toast.fire({
            type: 'error',
            title: '¡El Vale es requerido!'
        });
        return 0;
    }
    if(($("#ubicacion").val() == '' || $("#ubicacion").val() == null)) {
        Toast.fire({
            type: 'error',
            title: '¡La ubicación es requerida!'
        });
        return 0;
    }
    if(eco[id].value == '' || eco[id].value == null){
        $(eco[id]).css("border-color", "#d9534f");
        Toast.fire({
            type: 'error',
            title: '¡El Eco es requerido!'
        });
        return 0;
    }
    if(km_actual[id].value == '' || km_actual[id].value == null){
        $(km_actual[id]).css("border-color", "#d9534f");
        Toast.fire({
            type: 'error',
            title: '¡El kilometraje es requerido!'
        });
        return 0;
    }
    if(litros[id].value == '' || litros[id].value == null){
        $(litros[id]).css("border-color", "#d9534f");
        Toast.fire({
            type: 'error',
            title: '¡Los litros son requeridos!'
        });
        return 0;
    }
    if(tipo_gas[id].value == '' || tipo_gas[id].value == null){
        $(tipo_gas[id]).css("border-color", "#d9534f");
        Toast.fire({
            type: 'error',
            title: '¡El tipo de gas es requerido!'
        });
        return 0;
    }
    if(precio[id].value == '' || precio[id].value == null){
        $(precio[id]).css("border-color", "#d9534f");
        Toast.fire({
            type: 'error',
            title: '¡El precio es requerido!'
        });
        return 0;
    }
    if(proyecto[id].value == '' || proyecto[id].value == null){
        $(proyecto[id]).css("border-color", "#d9534f");
        Toast.fire({
            type: 'error',
            title: '¡El proyecto es requerido!'
        });
        return 0;
    }
    if(evidencia[id].value == '' || evidencia[id].value == null){
        $(evidencia[id]).css("border-color", "#d9534f");
        Toast.fire({
            type: 'error',
            title: '¡El archivo es requerido!'
        });
        return 0;
    }
    
    
    $.ajax({
        type:"POST",
        url: "<?= base_url() ?>ControlVehicular/cargarCombustibleManualMultiple",
        data: form,
        processData: false,
        contentType: false,
        dataType: "json",
          beforeSend: function() {
            $('.modal-content').addClass('load');
          },
          success: function(resp) {
            if(resp.error == false){
            Toast.fire({
                    type: 'success',
                    title: resp.mensaje
            });
            mostrarDatos('', 1, selectBuscar);
            mostrarDatosCargaDia('', 1, selectBuscar);
            totalCargaDia();
            eco[id].value = '';
            km_actual[id].value = '';
            litros[id].value = '';
            proyecto[id].value = '';
            evidencia[id].value = '';
            //$("#cargar_combustible_manual_multiple").modal('hide');
            }else{
            Toast.fire({
                type: 'error',
                title: resp.mensaje
            });
            }
        }
            }).done(function() {
            console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                $('.modal-content').removeClass('load');
            });
        }

</script>


<script>
    $("#rango").change(function () {
        $("#rango option:selected").each(function () {
            valor_seleccionado = $(this).val();
            $("#anio").css('display','none');
            $("#mes").css('display','none');
            if(valor_seleccionado == 'diario' || valor_seleccionado == 'semanal') {
                $("#anio").css('display','block');
                $("#mes").css('display','block');
            } else if(valor_seleccionado == 'mensual') {
                $("#mes").css('display','block');
            }
        });
    });
</script>