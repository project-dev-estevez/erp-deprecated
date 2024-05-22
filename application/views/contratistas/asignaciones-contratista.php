<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/css/jquery.Jcrop.min.css" />
<script src="<?= base_url() ?>js/jquery.Jcrop.js"></script>
<script src="<?= base_url() ?>js/jquery.color.js"></script>
<section class="dashboard-counts no-padding botones">
	<div class="container-fluid">
		<section class="no-padding">
			<div class="container-fluid pt-5">
				<div class="row">
					<div class="col">
					</div>
				</div>
			</div>
		</section>
		<div class="row">
			<div class="col-12">
				<!-- Asignaciones  -->
				<div class="card">
					<div class="card-header">
						<h4 class="h4">Asignaciones (<?= $nombre_comercial ?>) <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4>
					</div>
					<div class="card-body grid-form">
						<div style="padding-top: 10px;">
							<ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
										Almacen general
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill" href="#pills-devolucion" role="tab" aria-controls="pills-devolucion" aria-selected="false">
										Alto costo
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
										Kuali
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
										Control Vehicular
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn" id="pills-areamedica-tab" data-toggle="pill" href="#pills-areamedica" role="tab" aria-controls="pills-areamedica" aria-selected="false">
										Área Médica
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
										Refacciones Control Vehicular
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
										Sistemas
									</a>
								</li>
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
									<div class="table-responsive">
										<table style="width: 100%" class="dataTable table table-striped table-sm">
											<thead>
												<tr>
													<th>Folio</th>
													<th>Fecha de asignación</th>
													<th>Equipo</th>
													<th>Serie</th>
													<th>N° Interno</th>
													<th>Marca</th>
													<th>Unidades</th>
													<th>Unidad de medida</th>
													<th>Categoría</th>
													<th>Nota</th>
													<th>Precio</th>
													<th>Total</th>
													<th># Proyecto</th>
													<th>Proyecto</th>
													<th>Almacen</th>
													<th>Nombre Personal</th>
												</tr>
											</thead>
											<tbody>
												<?php $total = 0; ?>
												<?php if ($asignacionesAG) : ?>
												<?php foreach ($asignacionesAG as $key => $value) : ?>
												<?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
												<tr>
													<td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
												</td>
												<td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
												</td>
												<td><?php echo $value->descripcion ?></td>
												<td><?php echo $value->numero_serie ?></td>
												<td><?php echo $value->numero_interno ?></td>
												<td><?php echo $value->marca ?></td>
												<td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
												<td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
												</td>
												<td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
												<td><?php echo $value->nota ?></td>
												<?php if ($value->tipo_moneda == 'd') : ?>
												<?php $value->precio = $value->precio * $precio_dolar;
												$total += $value->precio * $value->cantidad ?>
												<?php endif ?>
												<td>$<?php echo number_format($value->precio, 2) ?></td>
												<td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
												<td><?php echo $value->numero_proyecto ?></td>
												<td><?php echo $value->nombre_proyecto ?></td>
												<td><?= $value->almacen ?></td>
												<td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
											</tr>
											<?php endif ?>
											<?php endforeach ?>
											<?php endif ?>
										</tbody>
										<tfoot>
										<tr>
											<th colspan="15" style="text-align:right">Total:</th>
											<th>$<?= number_format($total, 2) ?></th>
										</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="pills-devolucion" role="tabpanel" aria-labelledby="pills-devolucion-tab">
								<!---->
								<div class="table-responsive">
									<table style="width: 100%" class="dataTable table table-striped table-sm">
										<thead>
											<tr>
												<th>Folio</th>
												<th>Fecha de asignación</th>
												<th>Equipo</th>
												<th>Serie</th>
												<th>N° Interno</th>
												<th>Marca</th>
												<th>Modelo</th>
												<th>Unidades</th>
												<th>Unidad de medida</th>
												<th>Categoría</th>
												<th>Nota</th>
												<th>Precio</th>
												<th>Total</th>
												<th># Proyecto</th>
												<th>Proyecto</th>
												<th>Nombre Personal</th>
											</tr>
										</thead>
										<tbody>
											<?php $total = 0; ?>
											<?php if ($asignacionesAC) : ?>
											<?php foreach ($asignacionesAC as $key => $value) : ?>
											<?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
											<tr>
												<td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
											</td>
											<td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
											</td>
											<td><?php echo $value->descripcion ?></td>
											<td><?php echo $value->numero_serie ?></td>
											<td><?php echo $value->numero_interno ?></td>
											<td><?php echo $value->marca ?></td>
											<td><?php echo $value->modelo ?></td>
											<td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
											<td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
											</td>
											<td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
											<td><?php echo $value->nota ?></td>
											<?php if ($value->tipo_moneda == 'd') : ?>
											<?php $value->precio = $value->precio * $precio_dolar;
											$total += $value->precio * $value->cantidad ?>
											<?php endif ?>
											<td>$<?php echo number_format($value->precio, 2) ?></td>
											<td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
											<td><?php echo $value->numero_proyecto ?></td>
											<td><?php echo $value->nombre_proyecto ?></td>
											<td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
										</tr>
										<?php endif ?>
										<?php endforeach ?>
										<?php endif ?>
									</tbody>
									<tr>
										<th colspan="15" style="text-align:right">Total:</th>
										<th>$<?= number_format($total, 2) ?></th>
									</tr>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
							<!---->
							<div class="table-responsive">
								<table style="width: 100%" class="dataTable table table-striped table-sm">
									<thead>
										<tr>
											<th>Folio</th>
											<th>Fecha de asignación</th>
											<th>Equipo</th>
											<th>Serie</th>
											<th>N° Interno</th>
											<th>Marca</th>
											<th>Modelo</th>
											<th>Unidades</th>
											<th>Unidad de medida</th>
											<th>Categoría</th>
											<th>Nota</th>
											<th>Precio</th>
											<th>Total</th>
											<th># Proyecto</th>
											<th>Proyecto</th>
											<th>Nombre Personal</th>
										</tr>
									</thead>
									<tbody>
										<?php $total = 0; ?>
										<?php if ($asignacionesKualiT) : ?>
										<?php foreach ($asignacionesKualiT as $key => $value) : ?>
										<?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
										<tr>
											<td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
										</td>
										<td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
										</td>
										<td><?php echo $value->descripcion ?></td>
										<td><?php echo $value->numero_serie ?></td>
										<td><?php echo $value->numero_interno ?></td>
										<td><?php echo $value->marca ?></td>
										<td><?php echo $value->modelo ?></td>
										<td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
										<td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
										</td>
										<td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
										<td><?php echo $value->nota ?></td>
										<?php if ($value->tipo_moneda == 'd') : ?>
										<?php $value->precio = $value->precio * $precio_dolar;
										$total += $value->precio * $value->cantidad ?>
										<?php endif ?>
										<td>$<?php echo number_format($value->precio, 2) ?></td>
										<td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
										<td><?php echo $value->numero_proyecto ?></td>
										<td><?php echo $value->nombre_proyecto ?></td>
										<td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
									</tr>
									<?php endif ?>
									<?php endforeach ?>
									<?php endif ?>
								</tbody>
								<tr>
									<th colspan="15" style="text-align:right">Total:</th>
									<th>$<?= number_format($total, 2) ?></th>
								</tr>
							</table>
						</div>
					</div>
					<!--tab de control vehicular-->
					<div class="tab-pane fade" id="pills-control-vehicular" role="tabpanel" aria-labelledby="pills-control-vehicular-tab">
						<!---->
						<div class="table-responsive">
							<table style="width: 100%" class="dataTable table table-striped table-sm">
								<thead>
									<tr>
										<th>Folio</th>
										<th>Fecha de asignación</th>
										<th>Equipo</th>
										<th>Serie</th>
										<th>N° Interno</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Unidades</th>
										<th>Unidad de medida</th>
										<th>Categoría</th>
										<th>Nota</th>
										<th>Precio</th>
										<th>Total</th>
										<th># Proyecto</th>
										<th>Proyecto</th>
										<th>Nombre Personal</th>
									</tr>
								</thead>
								<tbody>
									<?php $total = 0; ?>
									<?php if ($asignacionesAutosControlVehicular) : ?>
									<?php foreach ($asignacionesAutosControlVehicular as $key => $value) : ?>
									<?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
									<tr>
										<td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
									</td>
									<td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
									</td>
									<td><?php echo $value->descripcion ?></td>
									<td><?php echo $value->numero_serie ?></td>
									<td><?php echo $value->numero_interno ?></td>
									<td><?php echo $value->marca ?></td>
									<td><?php echo $value->modelo ?></td>
									<td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
									<td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
									</td>
									<td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
									<td><?php echo $value->nota ?></td>
									<?php if ($value->tipo_moneda == 'd') : ?>
									<?php $value->precio = $value->precio * $precio_dolar;
									$total += $value->precio * $value->cantidad ?>
									<?php endif ?>
									<td>$<?php echo number_format($value->precio, 2) ?></td>
									<td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
									<td><?php echo $value->numero_proyecto ?></td>
									<td><?php echo $value->nombre_proyecto ?></td>
									<td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
								</tr>
								<?php endif ?>
								<?php endforeach ?>
								<?php endif ?>
							</tbody>
							<tr>
								<th colspan="15" style="text-align:right">Total:</th>
								<th>$<?= number_format($total, 2) ?></th>
							</tr>
						</table>
					</div>
				</div>
				<!--fin de tab control vehicular-->
				<!-- Tab Área Médica -->
				<div class="tab-pane fade" id="pills-areamedica" role="tabpanel" aria-labelledby="pills-areamedica-tab">
					<div class="table-responsive">
						<table style="width: 100%" class="dataTable table table-striped table-sm">
							<thead>
								<tr>
									<th>Folio</th>
									<th>Fecha de asignación</th>
									<th>Equipo</th>
									<th>Serie</th>
									<th>N° Interno</th>
									<th>Marca</th>
									<th>Modelo</th>
									<th>Unidades</th>
									<th>Unidad de medida</th>
									<th>Categoría</th>
									<th>Nota</th>
									<th>Precio</th>
									<th>Total</th>
									<th># Proyecto</th>
									<th>Proyecto</th>
									<th>Nombre Personal</th>
								</tr>
							</thead>
							<tbody>
								<?php $total = 0; ?>
								<?php if ($asignacionesAreaMedica) : ?>
								<?php foreach ($asignacionesAreaMedica as $key => $value) : ?>
								<?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
								<tr>
									<td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
								</td>
								<td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
								</td>
								<td><?php echo $value->descripcion ?></td>
								<td><?php echo $value->numero_serie ?></td>
								<td><?php echo $value->numero_interno ?></td>
								<td><?php echo $value->marca ?></td>
								<td><?php echo $value->modelo ?></td>
								<td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
								<td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
								</td>
								<td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
								<td><?php echo $value->nota ?></td>
								<?php if ($value->tipo_moneda == 'd') : ?>
								<?php $value->precio = $value->precio * $precio_dolar;
								$total += $value->precio * $value->cantidad ?>
								<?php endif ?>
								<td>$<?php echo number_format($value->precio, 2) ?></td>
								<td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
								<td><?php echo $value->numero_proyecto ?></td>
								<td><?php echo $value->nombre_proyecto ?></td>
								<td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
							</tr>
							<?php endif ?>
							<?php endforeach ?>
							<?php endif ?>
						</tbody>
						<tr>
							<th colspan="15" style="text-align:right">Total:</th>
							<th>$<?= number_format($total, 2) ?></th>
						</tr>
					</table>
				</div>
			</div>
			<!-- /Tab de área Médica -->
			<!--tab refacciones control vehicular-->
			<div class="tab-pane fade" id="pills-refacciones-control-vehicular" role="tabpanel" aria-labelledby="pills-refacciones-control-vehicular-tab">
				<!---->
				<div class="table-responsive">
					<table style="width: 100%" class="dataTable table table-striped table-sm">
						<thead>
							<tr>
								<th>Folio</th>
								<th>Fecha de asignación</th>
								<th>Equipo</th>
								<th>Serie</th>
								<th>N° Interno</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Unidades</th>
								<th>Unidad de medida</th>
								<th>Categoría</th>
								<th>Nota</th>
								<th>Precio</th>
								<th>Total</th>
								<th># Proyecto</th>
								<th>Proyecto</th>
								<th>Nombre Personal</th>
							</tr>
						</thead>
						<tbody>
							<?php $total = 0; ?>
							<?php if ($asignacionesRefaccionesControlVehicular) : ?>
							<?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
							<?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
							<tr>
								<td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?></td>
								<td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
								</td>
								<td><?php echo $value->descripcion ?></td>
								<td><?php echo $value->numero_serie ?></td>
								<td><?php echo $value->numero_interno ?></td>
								<td><?php echo $value->marca ?></td>
								<td><?php echo $value->modelo ?></td>
								<td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
								<td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
								</td>
								<td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
								<td><?php echo $value->nota ?></td>
								<?php if ($value->tipo_moneda == 'd') : ?>
								<?php $value->precio = $value->precio * $precio_dolar;
								$total += $value->precio * $value->cantidad ?>
								<?php endif ?>
								<td>$<?php echo number_format($value->precio, 2) ?></td>
								<td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
								<td><?php echo $value->numero_proyecto ?></td>
								<td><?php echo $value->nombre_proyecto ?></td>
								<td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
							</tr>
							<?php endif ?>
							<?php endforeach ?>
							<?php endif ?>
						</tbody>
						<tr>
							<th colspan="15" style="text-align:right">Total:</th>
							<th>$<?= number_format($total, 2) ?></th>
						</tr>
					</table>
				</div>
			</div>
			<!--fin de tab refacciones control vehicular-->
			<!--Inicio de tab sistemas-->
			<div class="tab-pane fade" id="pills-sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
				<table style="width: 100%" class="dataTable table table-striped table-sm">
					<thead>
						<tr>
							<th>Folio</th>
							<th>Fecha de asignación</th>
							<th>Equipo</th>
							<th>Serie</th>
							<th>N° Interno</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Unidades</th>
							<th>Unidad de medida</th>
							<th>Categoría</th>
							<th>Nota</th>
							<th>Precio</th>
							<th>Total</th>
							<th># Proyecto</th>
							<th>Proyecto</th>
							<th>Nombre Personal</th>
						</tr>
					</thead>
					<tbody>
						<?php $total = 0; ?>
						<?php if ($asignacionesSistemas) : ?>
						<?php foreach ($asignacionesSistemas as $key => $value) : ?>
						<?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
						<tr>
							<td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?></td>
							<td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?></td>
							<td><?php echo $value->descripcion ?></td>
							<td><?php echo $value->numero_serie ?></td>
							<td><?php echo $value->numero_interno ?></td>
							<td><?php echo $value->marca ?></td>
							<td><?php echo $value->modelo ?></td>
							<td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
							<td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?></td>
							<td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
							<td><?php echo $value->nota ?></td>
							<?php if ($value->tipo_moneda == 'd') : ?>
							<?php $value->precio = $value->precio * $precio_dolar;
							$total += $value->precio * $value->cantidad ?>
							<?php endif ?>
							<td>$<?php echo number_format($value->precio, 2) ?></td>
							<td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
							<td><?php echo $value->numero_proyecto ?></td>
							<td><?php echo $value->nombre_proyecto ?></td>
							<td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
						</tr>
						<?php endif ?>
						<?php endforeach ?>
						<?php endif ?>
					</tbody>
					<tr>
						<th colspan="15" style="text-align:right">Total:</th>
						<th>$<?= number_format($total, 2) ?></th>
					</tr>
				</table>
			</div>
		</div>
		<!--Fin de tab sistemas-->
	</div>
</div>
</div>
</div>
</div>
</section>