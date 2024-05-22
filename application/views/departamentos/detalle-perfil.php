
  <section class="tables">   
    <div class="container-fluid">
      
        
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">PERFIL - <?php echo $detalle['nombre'] ?></h3>
            </div>
            <div class="card-body">
			<div style="padding-top: 10px;">
                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link btn active" id="pills-activo-tab" data-toggle="pill" href="#pills-activo" role="tab" aria-controls="pills-activo" aria-selected="true">
                      Activos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link btn" id="pills-inactivo-tab" data-toggle="pill" href="#pills-inactivo" role="tab" aria-controls="pills-inactivo" aria-selected="false">
                      Inactivos
                    </a>
                  </li>
                  
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-activo" role="tabpanel" aria-labelledby="pills-activo-tab">
                    <!---->
					<div class="table-responsive">   
                <table style="width: 100%" class="dataTable table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>N° Empleado</th>
                      <th>Nombre</th>
                    </tr>
                  </thead>
                  <tfoot>
                     <tr>
                      <th>N° Empleado</th>
                      <th>Nombre</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($detalleActivo['usuarios'] as $key => $value): ?>
                      <tr>
                       <td><?= $value->numero_empleado ?></td>
                       <td><a href="<?= base_url() ?>personal/detalle/<?= $value->uid ?>"><?= $value->apellido_paterno.' '.$value->apellido_materno.' '.$value->nombres ?></a></td>
                      </tr>
                    <?php endforeach ?>                    
                  </tbody>
                </table>
              </div>
                  </div>
                  <div class="tab-pane fade" id="pills-inactivo" role="tabpanel" aria-labelledby="pills-inactivo-tab">
                    <!---->
					<div class="table-responsive">   
                <table style="width: 100%" class="dataTable table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>N° Empleado</th>
                      <th>Nombre</th>
                    </tr>
                  </thead>
                  <tfoot>
                     <tr>
                      <th>N° Empleado</th>
                      <th>Nombre</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($detalleInactivo['usuarios'] as $key => $value): ?>
                      <tr>
                       <td><?= $value->numero_empleado ?></td>
                       <td><a href="<?= base_url() ?>personal/detalle/<?= $value->uid ?>"><?= $value->apellido_paterno.' '.$value->apellido_materno.' '.$value->nombres ?></a></td>
                      </tr>
                    <?php endforeach ?>                    
                  </tbody>
                </table>
              </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>

          <div class="card">
            <div class="card-header d-flex align-items-center">
            	<h3 class="h4"><?php echo $detalle['nombre'] ?> (<?= $detalle['detallePerfil']->codigo  ?>) <small>Fecha modificación: <?php echo strftime("%d de %b de %Y",strtotime($detalle['detallePerfil']->modificacion)) ?></small></h3>
            </div>
            <div class="card-body" id="perfil">
            	
            		<div class="dt-buttons btn-group">
            			<?php if (isset($this->session->userdata('permisos')['empresas']) && $this->session->userdata('permisos')['empresas']>2): ?>
            				<button class="btn btn-secondary buttons-pdf buttons-html5 btn-primary no-print" data-target="#editarPerfilModal" data-toggle="modal"><span><i class="fa fa-edit"></i> Editar</span></button>
            			<?php endif ?>
            			<button class="btn btn-secondary buttons-print btn-primary no-print" id="imprimir"><span><i class="fa fa-print"></i> Imprimir</span></button>
            		</div>
            		<div class="clearfix"></div>
            		<br class="no-print">
              	
            	<h3 class="no-print">PERFIL DE PUESTO</h3>
            	<p class="no-print"><strong>Revisión:</strong> <?= $detalle['detallePerfil']->revision  ?></p>
              	<p><strong>Nombre del puesto:</strong> <?php echo $detalle['nombre'] ?></p>
              	<p><strong>Descripción general del puesto:</strong> <?php echo $detalle['detallePerfil']->descripcion ?></p>
              	<p><strong>Área:</strong> <?php echo $detalle['detallePerfil']->departamento ?></p>

              	<h3>Requisitos</h3>
              	<p><strong>Escolaridad:</strong> <?php echo $detalle['detallePerfil']->escolaridad ?></p>
				<p><strong>Experiencia:</strong> <?php echo $detalle['detallePerfil']->experiencia ?></p>
				<p><strong>Edad:</strong> <?php echo $detalle['detallePerfil']->edad ?></p>
				<p><strong>Sexo:</strong> <?php echo $detalle['detallePerfil']->sexo ?></p>
				<p><strong>Disponibilidad para viajar:</strong> <?php echo $detalle['detallePerfil']->disponibilidad_viajar ?></p>

				<h3>ACTIVIDADES A REALIZAR</h3>
				<p class="sangria-print"> <?= nl2br($detalle['detallePerfil']->actividades) ?></p>
				<h3>CURSOS / CAPACITACIÓN (Formación deseable)</h3>
				<p class="sangria-print"> <?php echo nl2br($detalle['detallePerfil']->cursos) ?></p>
				<h3>HABILIDADES</h3>
				<p class="sangria-print"> <?php echo nl2br($detalle['detallePerfil']->habilidades) ?></p>
            </div>
          </div>
        
      
    </div>
    <div id="header" style="display: none">
    	<table width="100%" class="table table-bordered">
    		<tbody>
    			<tr>
    				<td rowspan="4" align="center"><img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 150px;"></td>
    				<td rowspan="2" align="center"><h3>ESTEVEZ.JOR SERVICIOS</h3></td>
    				<td align="center">CÓDIGO: <?php echo $detalle['detallePerfil']->codigo ?></td>
    			</tr>
    			<tr>
    				<td align="center">REVISIÓN: <?php echo $detalle['detallePerfil']->revision ?></td>
    			</tr>
    			<tr>
    				<td rowspan="2" align="center"><h3>PERFIL DE PUESTO</h3></td>
    				<td rowspan="2" align="center">FECHA DE MODIFICACIÓN: <br><?php echo strftime("%d de %b de %Y",strtotime($detalle['detallePerfil']->modificacion)) ?></td>
    			</tr>
    		</tbody>
    	</table>
    </div>
    <div id="footer" style="display: none">
    	<table width="100%" class="table table-bordered">
    		<tbody>
    			<tr>
    				<td align="right" width="120">Nombre del empleado:</td>
    				<td></td>
    				<td align="right" width="120">Alta Dirección:</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td align="right">Fecha:</td>
    				<td></td>
    				<td align="right">Fecha:</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td align="right" height="90">Firma:</td>
    				<td></td>
    				<td align="right">Firma:</td>
    				<td></td>
    			</tr>
    		</tbody>
    	</table>
    </div>
  </section>
<?php if (isset($this->session->userdata('permisos')['empresas']) && $this->session->userdata('permisos')['empresas']>2): ?>
              		

    <div id="editarPerfilModal" tabindex="-1" role="dialog" aria-labelledby="modalEditarPErfil" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
      <div class="modal-content">
        <?= form_open(base_url().'departamentos/editar-perfil') ?>
        <div class="modal-header">
          <h4 id="modalEditarPErfil" class="modal-title">Editar perfil de puesto "<?php echo $detalle['nombre'] ?>"</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          		
          		<p><strong>Código:</strong></p>
              	<p><input type="text" name="codigo" class="form-control" value="<?php echo $detalle['detallePerfil']->codigo ?>" placeholder=""></p>

              	<p><strong>Revisión:</strong></p>
              	<p><input type="text" name="revision" class="form-control" value="<?php echo $detalle['detallePerfil']->revision ?>" placeholder=""></p>

              	<p><strong>Nombre del puesto:</strong></p>
              	<p><input type="text" name="perfil" class="form-control" value="<?php echo $detalle['nombre'] ?>" placeholder=""></p>

              	<p><strong>Descripción general del puesto:</strong> </p>
              	<p><textarea name="descripcion" class="form-control" rows="3"><?php echo $detalle['detallePerfil']->descripcion ?></textarea></p>

              	<p><strong>Área:</strong> <?php echo $detalle['detallePerfil']->departamento ?></p>

              	<h3>Requisitos</h3>

              	<p><strong>Escolaridad:</strong></p>
              	<p><textarea name="escolaridad" class="form-control" rows="1"><?php echo $detalle['detallePerfil']->escolaridad ?></textarea></p>

				<p><strong>Experiencia:</strong></p>
				<p><textarea name="experiencia" class="form-control" rows="1"><?php echo $detalle['detallePerfil']->experiencia ?></textarea></p>

				<p><strong>Edad:</strong></p>
				<p><textarea name="edad" class="form-control" rows="1"><?php echo $detalle['detallePerfil']->edad ?></textarea></p>

				<p><strong>Sexo:</strong></p>
				<p><textarea name="sexo" class="form-control" rows="1"><?php echo $detalle['detallePerfil']->sexo ?></textarea></p>

				<p><strong>Disponibilidad para viajar:</strong></p>
				<p><textarea name="disponibilidad_viajar" class="form-control" rows="1"><?php echo $detalle['detallePerfil']->disponibilidad_viajar ?></textarea></p>


				<h3>ACTIVIDADES A REALIZAR</h3>
				<p><textarea name="actividades" class="form-control" rows="5"><?php echo $detalle['detallePerfil']->actividades ?></textarea></p>

				<h3>CURSOS / CAPACITACIÓN (Formación deseable)</h3>
				<p><textarea name="cursos" class="form-control" rows="5"><?php echo $detalle['detallePerfil']->cursos ?></textarea></p>

				<h3>HABILIDADES</h3>
				<p><textarea name="habilidades" class="form-control" rows="5"><?php echo $detalle['detallePerfil']->habilidades ?></textarea></p>

          
        </div>
        <div class="modal-footer">
          <?= form_hidden('token',$token) ?>
          <?= form_hidden('from','departamentos/perfil/'.$detalle['uid']) ?>
          <?= form_hidden('idPerfil', $detalle['id']) ?>
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
<?php endif ?>

<script>
	$(document).on('click', '#imprimir', function(event) {
		event.preventDefault();
		$("#perfil").print({
                        iframe : true,
                        globalStyles: true,
                        mediaPrint: true,
                        noPrintSelector :'.no-print',
                        append: $('#footer'),
                        prepend: $('#header'),

                    });
	});
	
</script>
<style type="text/css" media="print">
@media print {
	#perfil{
		padding-top: 0;
	}
  	#header, #footer{
  		display: block !important;
  	}
	body{
		font-family: "Times New Roman", Times, serif;
		font-size: 20px;
	}
}
	
</style>