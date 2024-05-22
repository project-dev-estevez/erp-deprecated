<section class="tables">   
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4 class="h4">
							<?php echo $titulo ?> 
							<?php if (strlen($detalle[0]->uid_movimiento)==14 && substr($detalle[0]->uid_movimiento, -1)=='t' ): ?>
								- Traspaso
							<?php endif ?>
						</h4>
					</div>
					<div class="card-body">
						<div class="grid-form">
							<?php if ($tipo=='salida-almacen'): ?>
								<fieldset>
									<div data-row-span="7">
										<div data-field-span="1">
											<label>Folio</label>
											<?= $detalle[0]->folio ?>
										</div>
										<div data-field-span="2">
											<label>Fecha de creación</label>
											<?= strftime("%d de %b de %Y a las %r",strtotime($detalle[0]->fecha)) ?>
										</div> 
										
										<div data-field-span="4">
											<label>Registrado por</label>
											<?= $detalle[0]->user_autor ?>
										</div>
									</div>
									<div data-row-span="1">
										<div data-field-span="1">
											<label>Proyecto</label>
											<?= $detalle[0]->numero_proyecto ?> <?= $detalle[0]->nombre_proyecto ?>
										</div>
									</div>
									<div data-row-span="1">
										<div data-field-span="1">
											<label>Ubicación</label>
											<?= $detalle[0]->direccion ?>
										</div>
									</div>
									<div data-row-span="5">
										<div data-field-span="1">
											<label>UID</label>
											<?= $detalle[0]->uid_movimiento ?>
										</div>
										<div data-field-span="3">
											<label>Realizado por</label>
											<?= $detalle[0]->nombre_autorizado ?>
										</div>
										<div data-field-span="1">
											<label>Estatus</label>
											<?= ($detalle[0]->estatus_asignacion!='') ? ucfirst($detalle[0]->estatus_asignacion) : 'No aplica' ?>									
										</div>
	                                </div>
	                                <div data-row-span="1">
										<div data-field-span="1">
											<label>Detalle solicitud de material</label>
											<a href="<?php echo base_url() ?>almacen/detalle-solicitud/<?= $detalle[0]->uid_parent ?>" title="">Ver</a>
										</div>
									</div>
								</fieldset>
							<?php endif ?>
							<?php if ($tipo=='entrada-almacen'): ?>
								<fieldset>
									<div data-row-span="7">
										<div data-field-span="1">
											<label>Folio</label>
											<?= $detalle[0]->folio ?>
										</div>
										<div data-field-span="2">
											<label>Fecha de creación</label>
											<?= strftime("%d de %b de %Y a las %r",strtotime($detalle[0]->fecha)) ?>
										</div> 
										
										<div data-field-span="4">
											<label>Registrado por</label>
											<?= $detalle[0]->user_autor ?>
										</div>
									</div>
									<div data-row-span="1">
										<div data-field-span="1">
											<label>Proyecto</label>
											<?= $detalle[0]->numero_proyecto ?> <?= $detalle[0]->nombre_proyecto ?>
										</div>
									</div>
									<div data-row-span="1">
										<div data-field-span="1">
											<label>Ubicación</label>
											<?= $detalle[0]->direccion ?>
										</div>
									</div>
									<div data-row-span="4">
										<div data-field-span="1">
											<label>UID</label>
											<?= $detalle[0]->uid_movimiento ?>
										</div>
										<div data-field-span="3">
											<label>Realizado por</label>
											<?php if (strlen($detalle[0]->uid_movimiento)<13 && substr($detalle[0]->uid_movimiento, -1)=='t' ): ?>
											<?= $detalle[0]->nombre_autorizado ?>
											<?php else: ?>
												<?= $detalle[0]->user_autor ?>
											<?php endif ?>
										</div>	
	                                </div>
                                	<?php if (strlen($detalle[0]->uid_movimiento)==13 ): ?>
                                		<div data-row-span="1">
											<div data-field-span="1">
												<label>Detalle pedido</label>
												<a href="<?php echo base_url() ?>pedidos/detalle-pedido/<?= $detalle[0]->uid_parent ?>" title="">Ver</a>
											</div>
										</div>
                                	<?php endif ?>
								</fieldset>
							<?php endif ?>
							<?php if ($tipo=='devolucion-almacen'): ?>
								<fieldset>
									<div data-row-span="7">
										<div data-field-span="1">
											<label>Folio</label>
											<?= $detalle[0]->folio ?>
										</div>
										<div data-field-span="2">
											<label>Fecha de creación</label>
											<?= strftime("%d de %b de %Y a las %r",strtotime($detalle[0]->fecha)) ?>
										</div> 
										
										<div data-field-span="4">
											<label>Registrado por</label>
											<?= $detalle[0]->user_autor ?>
										</div>
									</div>
									<div data-row-span="1">
										<div data-field-span="1">
											<label>Proyecto</label>
											<?= $detalle[0]->numero_proyecto ?> <?= $detalle[0]->nombre_proyecto ?>
										</div>
									</div>
									<div data-row-span="1">
										<div data-field-span="1">
											<label>Ubicación</label>
											<?= $detalle[0]->direccion ?>
										</div>
									</div>
									<div data-row-span="5">
										<div data-field-span="1">
											<label>UID</label>
											<?= $detalle[0]->uid_movimiento ?>
										</div>
										<div data-field-span="3">
											<label>Realizado por</label>
											<?= $detalle[0]->nombre_autorizado ?>
										</div>
										<div data-field-span="1">
											<label>Estatus</label>
											<?= ($detalle[0]->estatus_asignacion!='') ? ucfirst($detalle[0]->estatus_asignacion) : 'No aplica' ?>									
										</div>
	                                </div>
								</fieldset>
							<?php endif ?>
							<?php if ($tipo=='traspaso-almacen'): ?>
								<fieldset>
									<div data-row-span="7">
										<div data-field-span="1">
											<label>Folio</label>
											<?= $detalle[0]->folio ?>
										</div>
										<div data-field-span="2">
											<label>Fecha de creación</label>
											<?= strftime("%d de %b de %Y a las %r",strtotime($detalle[0]->fecha)) ?>
										</div> 
										
										<div data-field-span="4">
											<label>Registrado por</label>
											<?= $detalle[0]->user_autor ?>
										</div>
									</div>
									<div data-row-span="2">
										<div data-field-span="1">
											<label>Proyecto Origen</label>
											<?= $detalle[0]->numero_proyecto ?> <?= $detalle[0]->nombre_proyecto ?>
										</div>
										<div data-field-span="1">
											<label>Proyecto Destino</label>
											<?= $detalle[0]->numero_proyecto_destino ?> <?= $detalle[0]->nombre_proyecto_destino ?>
										</div>
									</div>
									<div data-row-span="1">
										<div data-field-span="1">
											<label>Ubicación</label>
											<?= $detalle[0]->direccion ?>
										</div>
									</div>
									<div data-row-span="4">
										<div data-field-span="1">
											<label>UID</label>
											<?= $detalle[0]->uid_movimiento ?>
										</div>
										<div data-field-span="3">
											<label>Realizado por</label>
											<?php if (strlen($detalle[0]->uid_movimiento)<13 && substr($detalle[0]->uid_movimiento, -1)=='t' ): ?>
											<?= $detalle[0]->nombre_autorizado ?>
											<?php else: ?>
												<?= $detalle[0]->user_autor ?>
											<?php endif ?>
										</div>	
	                                </div>                             
								</fieldset>
							<?php endif ?>
						</div>
						<br><br>
						<table class="table table-striped table-bordered display responsive no-wrap" style="width:100%">
							<thead>
								<tr>
									<th data-priority="1">Código</th>                
									<th>Marca</th>
									<th>Modelo</th>
									<th data-priority="2">Descripción</th>
                                    <th>Serie</th>
                                    <th>N° Interno</th>
									<th>Cantidad</th>
									<th>Unidad</th>
									<th title="Categoría">Categoría</th>
									<th data-priority="3">Nota</th>
								</tr>
							</thead>
							<tbody>
								<?php if (isset($detalle)): ?>
									<?php foreach ($detalle as $key => $value): ?>
										<tr>
											<td><?php echo $value->uid_producto ?></td>
											<td><?php echo $value->marca ?></td>
											<td><?php echo $value->modelo ?></td>
											<td><?php echo $value->descripcion ?>
	                                        <td><?php echo (isset($value->numero_serie)) ? $value->numero_serie : null ?></td>
	                                        <td><?php echo (isset($value->numero_interno)) ? $value->numero_interno : null ?></td>
											<td><?php echo $value->cantidad ?></td>
											<td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida_abr ?></td>
											<td title="<?php echo $value->categoria ?>"><?php echo $value->abreviatura ?></td>
											<td></td>
										</tr>
									<?php endforeach ?>
								<?php else: ?>
									<tr>
										<td colspan="8" align="center">No existen productos para mostrar</td>
									</tr>
								<?php endif ?>
							</tbody>
						</table>
						<br><br>
						<h3 class="h3">Documentos</h3>
						<ul>
							<?php 
							try {
								$carpeta = './docs/entradas/'.$detalle[0]->uid_movimiento;
								if(is_dir($carpeta)){
									$scanned_directory = array_diff(scandir($carpeta), array('..', '.'));
									foreach ($scanned_directory as $key => $value) {
										echo '<li><a href="/'.$carpeta.'/'.$value.'" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">'.$value.'</a></li>';
									}
								}
							} catch (Exception $e) {

							}
							?>
							<?php 
							try {
								$carpeta = './uploads/'.$detalle[0]->uid_user.'asignaciones/'.$detalle[0]->uid_movimiento;
								if(is_dir($carpeta)){
									$scanned_directory = array_diff(scandir($carpeta), array('..', '.'));
									foreach ($scanned_directory as $key => $value) {
										echo '<li><a href="/'.$carpeta.'/'.$value.'" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">'.$value.'</a></li>';
									}
								}
							} catch (Exception $e) {

							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>