<section class="tables">   
	<div class="container-fluid">
		<div class="row">
			<div class="col-12" id="asignacion">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4 class="h4">Asignación</h4>
					</div>
					<div class="card-body">
						<div class="grid-form">
							<fieldset>
								<div data-row-span="8">
									<div data-field-span="1">
										<label>Folio</label>
										<?= $detalle[0]->folio ?>
									</div>
									<div data-field-span="2">
										<label>Fecha de creación</label>
										<?= strftime("%d de %b de %Y a las %r",strtotime($detalle[0]->fecha)) ?>
									</div> 
									<div data-field-span="2">
										<label>Personal</label>
										<?= $detalle[0]->nombres ?> <?= $detalle[0]->apellido_paterno ?> <?= $detalle[0]->apellido_materno ?>
									</div>
									<div data-field-span="3">
										<label>Proyecto</label>
										<?= $detalle[0]->nombre_proyecto ?>
									</div>
								</div>
								<div data-row-span="8">
									<div data-field-span="3">
										<label>Almacen</label>
										<?= $detalle[0]->almacen ?>
									</div>
									<div data-field-span="2">
										<label>Fecha de asignación</label>
										<?= strftime("%d de %b de %Y a las %r",strtotime($detalle[0]->fecha_asignacion)) ?>
									</div> 
									<div data-field-span="2">
										<label>Autor</label>
										<?= $detalle[0]->nombre ?>
									</div>
									<div data-field-span="1">
										<label>Estatus</label>
										<?= ($detalle[0]->estatus_asignacion!='') ? ucfirst($detalle[0]->estatus_asignacion) : 'No aplica' ?>									
									</div>
                                </div>
                                <div data-row-span="1">
                                    <div data-field-span="1">
										<label>Observaciones</label>
										<?= $detalle[0]->observaciones ?>
									</div>
                                </div>
							</fieldset>
						</div>
						<br><br>
						<table class="table table-striped table-bordered display responsive no-wrap" style="width:100%">
							<thead>
								<tr>
									<th data-priority="1">Neodata</th>                
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
											<td><?php echo $value->neodata ?></td>
											<td><?php echo $value->marca ?></td>
											<td><?php echo $value->modelo ?></td>
											<td><?php echo $value->descripcion ?>
                                            	<td><?php echo $value->numero_serie ?></td>
                                            	<td><?php echo $value->numero_interno ?></td>
											</td>
											<td><?php echo $value->cantidad ?></td>
											<td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida_abr ?></td>
											<td title="<?php echo $value->categoria ?>"><?php echo $value->abreviatura ?></td>
											<td><?php echo $value->observaciones ?></td>            
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
						<?php if(count($checklist_asignacion) > 0) { ?>
							<a class="btn btn-primary btn-sm" onclick="imprimirChecklistAsignacion();">Imprimir Checklist Asignación</a>
						<?php } ?>
						<?php if(count($checklist_devolucion) > 0) { ?>
							<a class="btn btn-primary btn-sm" onclick="imprimirChecklistDevolucion();">Imprimir Checklist Devolución</a>
						<?php } ?>
						<?php if($detalle[0]->almacen == 'ALMACEN AUTOS CONTROL VEHICULAR'){ ?>
							<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
								<i class="fa fa-edit"></i> Editar Documento
							</button>
						<?php } ?>
						<ul>	
							<?php $carpeta = './uploads/'.$detalle[0]->uid_user.'/asignaciones/'.$detalle[0]->uid_movimiento; ?>
							<?php @$scanned_directory = array_diff(scandir($carpeta), array('..', '.')); ?>
							<?php if (is_array($scanned_directory) || is_object($scanned_directory)) { ?>
								<?php if(sizeof($scanned_directory) > 0) { ?>
									<?php 
										try {
											foreach ($scanned_directory as $key => $value) {
												echo '<li><a href="/'.$carpeta.'/'.$value.'" target="_blank" class="documentos" onClick="window.open(this.href, this.target, \'width=600,height=800,left=0,top=0\'); return false;">'.$value.'</a></li>';
											}
										} catch (Exception $e) {
										}?>
								<?php } else { ?>
                  					<p class="text-danger text-center">No se encontró ningún documento</p>
                				<?php } ?>
                			<?php } else { ?>
                				<p class="text-danger text-center">No se encontró ningún documento</p>
              				<?php } ?>
						</ul>
						<?php if($detalle[0]->activo_fijo == 0 && $this->session->userdata('id') != 50){ ?>
						<button class="btn btn-secondary btn-info float-left" id="btnImprimirDiv" tabindex="0">
						<span><i class="fa fa-print"></i> Responsiva</span>
						</button>
						<?php } ?>
					</div>
				</div>
			</div>
			<div  id="contentCheckAsignacionImpresion">
				<div id="checkAsignacionImpresion" class="col-12">
					<h5> ASIGNACIÓN DE UNIDAD</h5>
					<h6 style="font-weight: normal;">Recibí de ESTEVEZJOR para el desempeño de mis funciones yo, <strong>C.: <?php echo $checklist_asignacion[0]['nombre_usuario'] ?></strong></h6>
	              	<h6 style="font-weight: normal">el automóvil con las siguientes características</h6>
	              	<h6 style="font-weight: normal" align="right" class="ecocheck">Eco: <strong><?= $numero_interno ?></strong></h6>
	              	<!--<div class="row">
	                	<div class="col-sm-1"></div>
		                <div class="col-sm-5">
		                  <table>
		                    <tr>
		                      <td class="marcacheck">Marca y Tipo: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="modelocheck">Modelo: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="seriecheck">No. de Serie: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="motorcheck">No. de Motor: <strong></strong></td>
		                    </tr>
		                  </table> 
		                </div>
		                <div class="col-sm-5">
		                  <table>
		                    <tr>
		                      <td class="placascheck">Placas: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="polizacheck">Póliza: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="vencimientocheck">Vencimiento: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="segurocheck">Seguro: <strong></strong></td>
		                    </tr>
		                  </table>
		                </div>
	                	<div class="col-sm-1"></div>
	              	</div>-->
	              	<br>
					<div class="form-group row">
						<div class="col-6 text-center">
						  &nbsp;<!--<h6> Nuevo <input type="radio" class="nuevocheck" disabled> Usado <input type="radio" class="usadocheck" disabled></h6>-->
						</div>
						<label for="inputPassword" class="col-3 col-form-label">Kilometraje Actual: </label>
						<div class="col-3">
						  <input type="text" class="form-control" value="<?= $checklist_asignacion[0]['kilometraje'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
						  <!--<h6 style="font-weight: normal;" class="text-center">Presentó Licencia: <strong></strong> &nbsp;&nbsp;&nbsp;&nbsp; Localidad Licencia: <strong></strong> &nbsp;&nbsp;&nbsp;&nbsp; Tipo: <strong></strong> &nbsp;&nbsp;&nbsp;&nbsp; Vigencia: <strong></strong></h6>-->
						</div>
					</div>
					<?php $checklist = json_decode($checklist_asignacion[0]['checklist']) ?>
					<div class="row">
						<div class="col-sm-12">
							<div style="text-align: center;">
								<div class="table-responsive">
									<table class="table table-sm table-striped">
										<tr>
											<th></th>
											<th>SI</th>
											<th>NO</th>
											<th>ESTADO</th>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t1 ?>" class="form-control"></td>
											<td><input <?= $checklist->r1 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r1 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e1 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t2 ?>" class="form-control"></td>
											<td><input <?= $checklist->r2 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r2 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e2 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t3 ?>" class="form-control"></td>
											<td><input <?= $checklist->r3 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r3 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e3 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t4 ?>" class="form-control"></td>
											<td><input <?= $checklist->r4 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r4 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e4 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t5 ?>" class="form-control"></td>
											<td><input <?= $checklist->r5 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r5 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e5 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t6 ?>" class="form-control"></td>
											<td><input <?= $checklist->r6 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r6 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e6 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t7 ?>" class="form-control"></td>
											<td><input <?= $checklist->r7 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r7 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e7 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t8 ?>" class="form-control"></td>
											<td><input <?= $checklist->r8 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r8 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e8 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t9 ?>" class="form-control"></td>
											<td><input <?= $checklist->r9 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r9 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e9 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t10 ?>" class="form-control"></td>
											<td><input <?= $checklist->r10 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r10 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e10 ?>" type="text"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div style="text-align: center;">
								<div class="table-responsive">
									<table class="table table-sm table-striped">
										<tr>
											<th></th>
											<th>SI</th>
											<th>NO</th>
											<th>ESTADO</th>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t11 ?>" class="form-control"></td>
											<td><input <?= $checklist->r11 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r11 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e11 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t12 ?>" class="form-control"></td>
											<td><input <?= $checklist->r12 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r12 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e12 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t13 ?>" class="form-control"></td>
											<td><input <?= $checklist->r13 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r13 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e13 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t14 ?>" class="form-control"></td>
											<td><input <?= $checklist->r14 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r14 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e14 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t15 ?>" class="form-control"></td>
											<td><input <?= $checklist->r15 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r15 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e15 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t16 ?>" class="form-control"></td>
											<td><input <?= $checklist->r16 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r16 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e16 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t17 ?>" class="form-control"></td>
											<td><input <?= $checklist->r17 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r17 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e17 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t18 ?>" class="form-control"></td>
											<td><input <?= $checklist->r18 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r18 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e18 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t19 ?>" class="form-control"></td>
											<td><input <?= $checklist->r19 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r19 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e19 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t20 ?>" class="form-control"></td>
											<td><input <?= $checklist->r20 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r20 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e20 ?>" type="text"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div style="text-align: center;">
								<div class="table-responsive">
									<table class="table table-sm table-striped">
										<tr>
											<th></th>
											<th>SI</th>
											<th>NO</th>
											<th>ESTADO</th>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t21 ?>" class="form-control"></td>
											<td><input <?= $checklist->r21 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r21 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e21 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t22 ?>" class="form-control"></td>
											<td><input <?= $checklist->r22 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r22 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e22 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t23 ?>" class="form-control"></td>
											<td><input <?= $checklist->r23 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r23 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e23 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t24 ?>" class="form-control"></td>
											<td><input <?= $checklist->r24 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r24 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e24 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t25 ?>" class="form-control"></td>
											<td><input <?= $checklist->r25 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r25 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e25 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t26 ?>" class="form-control"></td>
											<td><input <?= $checklist->r26 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r26 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e26 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t27 ?>" class="form-control"></td>
											<td><input <?= $checklist->r27 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r27 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e27 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t28 ?>" class="form-control"></td>
											<td><input <?= $checklist->r28 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r28 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e28 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t29 ?>" class="form-control"></td>
											<td><input <?= $checklist->r29 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r29 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e29 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t30 ?>" class="form-control"></td>
											<td><input <?= $checklist->r30 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r30 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e30 ?>" type="text"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>

					<br>
					<h6 style="text-align: center;">ESTADO GENERAL DE LA CARROCERÍA</h6>
					<?php $imagenes = json_decode($checklist_asignacion[0]['imagenes_checklist']); ?>
					<center>
						<img class="img-fluid" src="../../.<?= $imagenes->imagen1 ?>">
					</center>

					<center>
						<img class="img-fluid" src="../../.<?= $imagenes->imagen2 ?>">
					</center>

					<center>
						<img class="img-fluid" src="../../.<?= $imagenes->imagen3 ?>">
					</center>
					<?php
					$fotos_checklist = $checklist_asignacion[0]['fotos_checklist'];
					if($fotos_checklist != NULL){
					$fotos_checklist = json_decode($fotos_checklist);
					foreach ($fotos_checklist as $key => $value) { ?>
						<center>
							<img class="img-fluid" src="../../.<?= $value ?>"  style="display: block; width: 250px;">
						</center>
					<?php }} ?>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<label>Observaciones</label>
							<textarea class="form-control" value="<?= $checklist_asignacion[0]['observaciones'] ?>" disabled></textarea>
						</div>
					</div>
					<br>
					<div>
						<h6>NOTA: EL VEHICULO SE ENTREGA&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?= $checklist_asignacion[0]['condicion_unidad'] == 'limpio' ? 'checked' : '' ?>> &nbsp;<span class="label-check" style="font-size: 13px;">LIMPIO</span>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" <?= $checklist_asignacion[0]['condicion_unidad'] == 'sucio' ? 'checked' : '' ?>> &nbsp;<span class="label-check" style="font-size: 13px;">SUCIO</span>&nbsp;&nbsp;&nbsp;&nbsp;EN CASO DE ENTREGAR SUCIA UNIDAD TENDRÁ UN COSTO DE $150.00</h6>
					</div>
					<br>
					<h6 style="font-weight: normal;">Yo <?= $checklist_asignacion[0]['nombre_usuario'] ?> me comprometo a:</h6>
					<p>
						1) Cuidar y conservar la Unidad en las mejores condiciones de operación y apariencia, para lo cual cumpliré con los servicios especificados en el manual del propietario y en la   póliza de garantía teniendo presente la imagen de la unidad y de ESTEVEZJOR SERVICIOS S.A. DE C.V
					</p>
					<p>
						2) Usar el cinturón de seguridad en todo momento, así como también los ocupantes que viajen en la unidad
					</p>
					<p>
						3) Pagar los montos de los deducibles del seguro del vehículo en caso de siniestro cuando el incidente sea debido a mi descuido via nomina
					</p>
					<p>
						4) Pagar los daños que sufra el vehículo y que no están considerados en la cobertura del seguro tales como robos parciales, actos vandálicos y aquellos que impliquen compostura al vehiculo a fin de cumplir con el punto No. 1 de esta carta
					</p>
					<p>
						5) Pagar las multas que se originen por incumplimiento de reglamento de transito, ecología o cualquier otro de carácter municipal, estatal o federal por incumpliento a las leyes de transito vigente 
					</p>
					<p>
						6) Notificar al departamento de Crontol de Vehículos por escrito si hubiere algún cambio que me desligue de toda responsabilidad del vehículo en mi custodia. Sino lo hiciera así me comprometo a pagar o responder jurídicamente cualquier hecho que se presente con la unidad a mi cargo
					</p>
					<p>
						7) Cualquier situación no contemplada en el presente formato, será comentada y autorizada por el Gerente del Area o Dirección General
					</p>
					<p>
						8) Cumplir con las políticas revision y mantenimiento establecidas por ESTEVEZJOR SERVICIOS S.A C.V
					</p>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-sm" width="100%">
									<tr>
										<td></td>
										<td>
											<center>
												<img class="img-fluid" src="../../.<?= $imagenes->imagen4 ?>">
											</center>
										</td>
										<td></td>
									</tr>
									<tr>
										<td class="text-center">ME COMPROMETO Y ACEPTO LO ANTERIOR</td>
										<td class="text-center"><?php echo $checklist_asignacion[0]['nombre_usuario'] ?></td>
										<td class="text-center"><?= $checklist_asignacion[0]['fecha'] ?></td>
									</tr>
									<tr>
										<td></td>
										<td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)</td>
										<td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<center>
												<img class="img-fluid" src="../../.<?= $imagenes->imagen5 ?>">
											</center>
										</td>
									<td></td>
									</tr>
									<tr>
										<td class="text-center">VEHICULO ENTRGADO POR</td>
										<td class="text-center"><?= $checklist_asignacion[0]['nombre_user'] ?></td>
										<td class="text-center"><?= $checklist_asignacion[0]['fecha'] ?></td>
									</tr>
									<tr>
										<td></td>
										<td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)</td>
										<td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
									</tr>
								</table>
							</div>
						</div>
					</div>


				</div>
			</div>
			<!---->
			<div id="contentCheckDevolucionImpresion">
				<div id="checkDevolucionImpresion" class="col-12">
					<h5> DEVOLUCIÓN DE UNIDAD</h5>
					<h6 style="font-weight: normal;">Recibí de ESTEVEZJOR para el desempeño de mis funciones yo, <strong>C.: <?php echo $checklist_devolucion[0]['nombre_usuario'] ?></strong></h6>
	              	<h6 style="font-weight: normal">el automóvil con las siguientes características</h6>
	              	<h6 style="font-weight: normal" align="right" class="ecocheck">Eco: <strong><?= $numero_interno ?></strong></h6>
	              	<!--<div class="row">
	                	<div class="col-sm-1"></div>
		                <div class="col-sm-5">
		                  <table>
		                    <tr>
		                      <td class="marcacheck">Marca y Tipo: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="modelocheck">Modelo: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="seriecheck">No. de Serie: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="motorcheck">No. de Motor: <strong></strong></td>
		                    </tr>
		                  </table> 
		                </div>
		                <div class="col-sm-5">
		                  <table>
		                    <tr>
		                      <td class="placascheck">Placas: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="polizacheck">Póliza: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="vencimientocheck">Vencimiento: <strong></strong></td>
		                    </tr>
		                    <tr>
		                      <td class="segurocheck">Seguro: <strong></strong></td>
		                    </tr>
		                  </table>
		                </div>
	                	<div class="col-sm-1"></div>
	              	</div>-->
	              	<br>
					<div class="form-group row">
						<div class="col-6 text-center">
						  &nbsp;<!--<h6> Nuevo <input type="radio" class="nuevocheck" disabled> Usado <input type="radio" class="usadocheck" disabled></h6>-->
						</div>
						<label for="inputPassword" class="col-3 col-form-label">Kilometraje Actual: </label>
						<div class="col-3">
						  <input type="text" class="form-control" value="<?= $checklist_devolucion[0]['kilometraje'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
						  <!--<h6 style="font-weight: normal;" class="text-center">Presentó Licencia: <strong></strong> &nbsp;&nbsp;&nbsp;&nbsp; Localidad Licencia: <strong></strong> &nbsp;&nbsp;&nbsp;&nbsp; Tipo: <strong></strong> &nbsp;&nbsp;&nbsp;&nbsp; Vigencia: <strong></strong></h6>-->
						</div>
					</div>
					<?php $checklist = json_decode($checklist_devolucion[0]['checklist']) ?>
					<div class="row">
						<div class="col-sm-12">
							<div style="text-align: center;">
								<div class="table-responsive">
									<table class="table table-sm table-striped">
										<tr>
											<th></th>
											<th>SI</th>
											<th>NO</th>
											<th>ESTADO</th>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t1 ?>" class="form-control"></td>
											<td><input <?= $checklist->r1 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r1 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e1 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t2 ?>" class="form-control"></td>
											<td><input <?= $checklist->r2 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r2 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e2 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t3 ?>" class="form-control"></td>
											<td><input <?= $checklist->r3 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r3 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e3 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t4 ?>" class="form-control"></td>
											<td><input <?= $checklist->r4 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r4 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e4 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t5 ?>" class="form-control"></td>
											<td><input <?= $checklist->r5 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r5 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e5 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t6 ?>" class="form-control"></td>
											<td><input <?= $checklist->r6 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r6 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e6 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t7 ?>" class="form-control"></td>
											<td><input <?= $checklist->r7 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r7 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e7 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t8 ?>" class="form-control"></td>
											<td><input <?= $checklist->r8 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r8 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e8 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t9 ?>" class="form-control"></td>
											<td><input <?= $checklist->r9 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r9 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e9 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t10 ?>" class="form-control"></td>
											<td><input <?= $checklist->r10 == 'si' ? 'checked' : '' ?>  type="radio"></td>
											<td><input value="no" <?= $checklist->r10 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e10 ?>" type="text"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div style="text-align: center;">
								<div class="table-responsive">
									<table class="table table-sm table-striped">
										<tr>
											<th></th>
											<th>SI</th>
											<th>NO</th>
											<th>ESTADO</th>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t11 ?>" class="form-control"></td>
											<td><input <?= $checklist->r11 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r11 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e11 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t12 ?>" class="form-control"></td>
											<td><input <?= $checklist->r12 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r12 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e12 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t13 ?>" class="form-control"></td>
											<td><input <?= $checklist->r13 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r13 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e13 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t14 ?>" class="form-control"></td>
											<td><input <?= $checklist->r14 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r14 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e14 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t15 ?>" class="form-control"></td>
											<td><input <?= $checklist->r15 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r15 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e15 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t16 ?>" class="form-control"></td>
											<td><input <?= $checklist->r16 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r16 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e16 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t17 ?>" class="form-control"></td>
											<td><input <?= $checklist->r17 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r17 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e17 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t18 ?>" class="form-control"></td>
											<td><input <?= $checklist->r18 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r18 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e18 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t19 ?>" class="form-control"></td>
											<td><input <?= $checklist->r19 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r19 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e19 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t20 ?>" class="form-control"></td>
											<td><input <?= $checklist->r20 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r20 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e20 ?>" type="text"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div style="text-align: center;">
								<div class="table-responsive">
									<table class="table table-sm table-striped">
										<tr>
											<th></th>
											<th>SI</th>
											<th>NO</th>
											<th>ESTADO</th>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t21 ?>" class="form-control"></td>
											<td><input <?= $checklist->r21 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r21 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e21 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t22 ?>" class="form-control"></td>
											<td><input <?= $checklist->r22 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r22 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e22 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t23 ?>" class="form-control"></td>
											<td><input <?= $checklist->r23 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r23 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e23 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t24 ?>" class="form-control"></td>
											<td><input <?= $checklist->r24 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r24 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e24 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t25 ?>" class="form-control"></td>
											<td><input <?= $checklist->r25 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r25 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e25 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t26 ?>" class="form-control"></td>
											<td><input <?= $checklist->r26 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r26 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e26 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t27 ?>" class="form-control"></td>
											<td><input <?= $checklist->r27 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r27 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e27 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t28 ?>" class="form-control"></td>
											<td><input <?= $checklist->r28 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r28 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e28 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t29 ?>" class="form-control"></td>
											<td><input <?= $checklist->r29 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r29 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e29 ?>" type="text"></td>
										</tr>
										<tr>
											<td><input type="text" value="<?= $checklist->t30 ?>" class="form-control"></td>
											<td><input <?= $checklist->r30 == 'si' ? 'checked' : '' ?> type="radio"></td>
											<td><input value="no" <?= $checklist->r30 == 'no' ? 'checked' : '' ?> type="radio"></td>
											<td><input class="form-control" value="<?= $checklist->e30 ?>" type="text"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>

					<br>
					<h6 style="text-align: center;">ESTADO GENERAL DE LA CARROCERÍA</h6>
					<?php $imagenes = json_decode($checklist_devolucion[0]['imagenes_checklist']); ?>
					<center>
						<img class="img-fluid" src="../../.<?= $imagenes->imagen1 ?>">
					</center>

					<center>
						<img class="img-fluid" src="../../.<?= $imagenes->imagen2 ?>">
					</center>

					<center>
						<img class="img-fluid" src="../../.<?= $imagenes->imagen3 ?>">
					</center>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<label>Observaciones</label>
							<textarea class="form-control" value="<?= $checklist_devolucion[0]['observaciones'] ?>" disabled></textarea>
						</div>
					</div>
					<br>
					<div>
						<h6>NOTA: EL VEHICULO SE ENTREGA&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" <?= $checklist_devolucion[0]['condicion_unidad'] == 'limpio' ? 'checked' : '' ?>> &nbsp;<span class="label-check" style="font-size: 13px;">LIMPIO</span>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" <?= $checklist_devolucion[0]['condicion_unidad'] == 'sucio' ? 'checked' : '' ?>> &nbsp;<span class="label-check" style="font-size: 13px;">SUCIO</span>&nbsp;&nbsp;&nbsp;&nbsp;EN CASO DE ENTREGAR SUCIA UNIDAD TENDRÁ UN COSTO DE $150.00</h6>
					</div>
					<br>
					<h6 style="font-weight: normal;">Yo <?= $checklist_devolucion[0]['nombre_usuario'] ?> me comprometo a:</h6>
					<p>
						1) Cuidar y conservar la Unidad en las mejores condiciones de operación y apariencia, para lo cual cumpliré con los servicios especificados en el manual del propietario y en la   póliza de garantía teniendo presente la imagen de la unidad y de ESTEVEZJOR SERVICIOS S.A. DE C.V
					</p>
					<p>
						2) Usar el cinturón de seguridad en todo momento, así como también los ocupantes que viajen en la unidad
					</p>
					<p>
						3) Pagar los montos de los deducibles del seguro del vehículo en caso de siniestro cuando el incidente sea debido a mi descuido via nomina
					</p>
					<p>
						4) Pagar los daños que sufra el vehículo y que no están considerados en la cobertura del seguro tales como robos parciales, actos vandálicos y aquellos que impliquen compostura al vehiculo a fin de cumplir con el punto No. 1 de esta carta
					</p>
					<p>
						5) Pagar las multas que se originen por incumplimiento de reglamento de transito, ecología o cualquier otro de carácter municipal, estatal o federal por incumpliento a las leyes de transito vigente 
					</p>
					<p>
						6) Notificar al departamento de Crontol de Vehículos por escrito si hubiere algún cambio que me desligue de toda responsabilidad del vehículo en mi custodia. Sino lo hiciera así me comprometo a pagar o responder jurídicamente cualquier hecho que se presente con la unidad a mi cargo
					</p>
					<p>
						7) Cualquier situación no contemplada en el presente formato, será comentada y autorizada por el Gerente del Area o Dirección General
					</p>
					<p>
						8) Cumplir con las políticas revision y mantenimiento establecidas por ESTEVEZJOR SERVICIOS S.A C.V
					</p>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-sm" width="100%">
									<tr>
										<td></td>
										<td>
											<center>
												<img class="img-fluid" src="../../.<?= $imagenes->imagen4 ?>">
											</center>
										</td>
										<td></td>
									</tr>
									<tr>
										<td class="text-center">ME COMPROMETO Y ACEPTO LO ANTERIOR</td>
										<td class="text-center"><?php echo $checklist_devolucion[0]['nombre_usuario'] ?></td>
										<td class="text-center"><?= $checklist_devolucion[0]['fecha'] ?></td>
									</tr>
									<tr>
										<td></td>
										<td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)</td>
										<td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<center>
												<img class="img-fluid" src="../../.<?= $imagenes->imagen5 ?>">
											</center>
										</td>
									<td></td>
									</tr>
									<tr>
										<td class="text-center">VEHICULO ENTRGADO POR</td>
										<td class="text-center"><?= $checklist_devolucion[0]['nombre_user'] ?></td>
										<td class="text-center"><?= $checklist_devolucion[0]['fecha'] ?></td>
									</tr>
									<tr>
										<td></td>
										<td style="border-top: solid 1px;" class="text-center">(Nombre y Firma)</td>
										<td style="border-top: solid 1px;" class="text-center">(Fecha)</td>
									</tr>
								</table>
							</div>
						</div>
					</div>


				</div>
			</div>
			<!---->
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Documento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="forms">
					<div class="row">
						<?= validation_errors('<span class="error">', '</span>'); ?>
						<?= form_open_multipart('', 'class="needs-validation" novalidate id="form-asignacion"'); ?>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="documentoInput">Contrato*</label>
								<input type="file" class="filestyle pull-left" name='contrato' required accept=".pdf">
							</div>
						</div>
						<input type="hidden" name="uid_user" value="<?= $detalle[0]->uid_user ?>">
						<input type="hidden" name="uid_movimiento" value="<?= $detalle[0]->uid_movimiento ?>">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<input type="submit" class="btn-info btn" value="Editar Documento">
			</div>
		</div>
	</div>
</div>

<section style="display: none;">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body" id="printableArea">
                <style>
                @media print {
                body {
                    font-family: "Poppins", sans-serif;
                }

                .b_top {
                    border-top: 1px solid #000;
                }

                .b_right {
                    border-right: 1px solid #000;
                }

                .b_bottom {
                    border-bottom: 1px solid #000;
                }

                .b_left {
                    border-left: 1px solid #000;
                }

                #datos_solicitud {
                    border-collapse: separate;
                    border-spacing: 0px 5px !important;
                }
                .default-text {
                    width: 160px !important;
                }
                @page{
                    margin: 2cm;
                    size: 8.5in 11in;
                }
            	}
                </style>
                <table class="" style="width:100%" border="1" cellpadding="4" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="b_top b_bottom b_left" style="text-align: center" width="20%" rowspan="2">
                                <img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png"
                                    style="display: inline-block; width: 80px;">
                            </th>
                            <th class="b_top" width="50%" style="vertical-align: middle; text-align: center">
                                ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.
                            </th>
                            <th class="b_top b_right"
                                style="vertical-align: middle; text-align: center; font-size:12px;" width="25%"
                                rowspan="2">
                                <strong>C&oacute;digo: DA-FE-AL-001</strong>
                            </th>
                        </tr>
                        <tr>
                            <th class="b_bottom" width="50%" style="vertical-align: middle; text-align: center">
                                Requisición a Almacén
                            </th>
                        </tr>
                    </thead>
                </table>
                <table id="datos_solicitud" style="width: 100%;font-size: 12px;margin-top: 10px;" border="0"
                    cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>FECHA Y HORA</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= date("d-m-Y h:i:s", strtotime($detalle[0]->fecha)) ?>
                                        </td>
                                        <td class="default-text b_top b_right b_bottom">
                                            <strong>FOLIO</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->uid_movimiento ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>No. PROYECTO:</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" style="width: 150px;!important"
                                            align="center">
                                            <?= $detalle[0]->numero_proyecto ?>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->nombre_proyecto ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>UBICACIÓN DE TRABAJO</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= (empty($detalle[0]->segmento))? $detalle[0]->direccion : $detalle[0]->segmento; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>RESPONSABLE PROY.</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->nombre_autorizacion ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>CORDINADOR PROY.</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->nombre_autor ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>POR AUSENCIA DE CORD.</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>CONTRATISTA (Externo)</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= ($detalle[0]->nombrecon != '') ? $detalle[0]->nombrecon : '&nbsp;' ?>
                                        </td>
                                        <td class="default-text b_top b_right b_bottom">
                                            <strong>SUPERVISOR (Interno)</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= ($detalle[0]->nombressu != '') ? $detalle[0]->nombressu . $detalle[0]->paternosu . $detalle[0]->maternosu : '&nbsp;' ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>RECIBE</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                        <?= $detalle[0]->nombres ?> <?= $detalle[0]->apellido_paterno ?> <?= $detalle[0]->apellido_materno ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="width:100%; font-size:12px;" border="0" cellpadding="2" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="default-text b_top b_right b_bottom b_left">
                                            <strong>COMENTARIOS</strong>
                                        </td>
                                        <td class="b_top b_right b_bottom" align="center">
                                            <?= $detalle[0]->comentarios ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;margin-top: 15px;" border="1" cellpadding="4" cellspacing="0" align="center">
                    <thead style="font-size: 12px!important;">
                        <tr>
                            <th><strong>NEODATA</strong></th>
                            <th><strong>DESCRIPCION</strong></th>
                            <th width="50px"><strong>UNIDAD</strong></th>
                            <th width="70px"><strong>CANTIDAD</strong></th>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->sitio != NULL && $value->sitio !== '')){ ?>
                            <th width="50px"><strong>SITIO</strong></th>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_serie != NULL && $value->numero_serie !== '')){ ?>
                            <th width="50px"><strong>NUMERO SERIE</strong></th>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_interno != NULL && $value->numero_interno !== '')){ ?>
                            <th width="50px"><strong>NUMERO INTERNO</strong></th>
                            <?php } ?>
                            <th style="min-width: 150px;"><strong>NOTA</strong></th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px!important;" align="center">
                        <?php foreach ($detalle as $key => $value) : ?>
                        <tr>
                            <td><?php echo $value->neodata ?></td>
                            <td><?php echo $value->descripcion ?></td>
                            <td><?php echo $value->unidad_medida_abr ?></td>                            
                            <td><?= $value->cantidad ?></td>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->sitio != NULL && $value->sitio !== '')){ ?>
                            <td><?= $value->sitio ?></td>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_serie != NULL && $value->numero_serie !== '')){ ?>
                            <td><?= $value->numero_serie ?></td>
                            <?php } ?>
                            <?php if(($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19) && ($value->numero_interno != NULL && $value->numero_interno !== '')){ ?>
                            <td><?= $value->numero_interno ?></td>
                            <?php } ?>
                            <td><?= $value->observaciones ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <br>
                <table style="width: 100%;margin-top: 15px;" border="0" cellpadding="4" cellspacing="0" align="center">
                    <tbody style="font-size: 12px!important;" align="center">
                        <tr>
                          <td colspan="2" width="50%" align="center"><img src="<?= base_url() ?>uploads/firmas/solicitudes/<?= $detalle[0]->uid_movimiento ?>7.png"></td>
                          <td colspan="2" width="50%" align="center"><img src="<?= base_url() ?>uploads/firmas/solicitudes/<?= $detalle[0]->uid_movimiento ?>6.png"></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_recibe">
                            	<?= $detalle[0]->idtbl_almacenes != 23 ? 'Almacen General' : 'Área Médica' ?>
                            </td>
                            <td colspan="2" width="50%" align="center" class="nombre_empleado_entrega">
                                <?= $detalle[0]->idtbl_almacenes != 23 ? $solicitud->recibe : $detalle[0]->nombres . " " . $detalle[0]->apellido_paterno . " " . $detalle[0]->apellido_materno ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="50%" align="center">Entrega <?= $detalle[0]->fecha ?>
                            </td>
                            <td colspan="2" width="50%" align="center">Recibe <?= $detalle[0]->fecha ?></td>
                        </tr>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
	$("#form-asignacion").on("submit", function(event){
		var $form = $(this);
		var f = $(this);
		if (event.isDefaultPrevented()) {
			console.log('Error')
		} else {
			event.preventDefault();          
			var formData = new FormData(document.getElementById("form-asignacion"));
			$.ajax({
				url: "<?= base_url()?>almacen/editarDocumentoACV",
				type: "post",
				dataType: "json",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				complete: function(res){
					var resp = JSON.parse(res.responseText);
					console.log(resp);
					if(resp.status){
						location.reload();
					} else {
						Toast.fire({
							type: 'error',
							title: resp.message
						})
					}
				}
			});
		}
	});
</script>
<style>
	#contentCheckAsignacionImpresion, #contentCheckDevolucionImpresion{
		display: none;
	}
	@media print{
		#contentCheckAsignacionImpresion.active{
			display: block;
		}
		#contentCheckDevolucionImpresion.active{
			display: block;
		}
		#asignacion{
			display: none;
		}
	}
</style>
<script>
	function imprimirChecklistAsignacion() {		
		$("#contentCheckAsignacionImpresion").addClass("active");
		print();
		return;
		/*$("#checkAsignacionImpresion").print({
			iframe : true,
			globalStyles: true,
			mediaPrint: true,
			noPrintSelector :'.no-print'
		});*/
	}
	function imprimirChecklistDevolucion() {
		$("#contentCheckAsignacionImpresion").removeClass("active");
		$("#contentCheckDevolucionImpresion").addClass("active");
		print();
		return;
		/*$("#checkDevolucionImpresion").print({
			iframe : true,
			globalStyles: true,
			mediaPrint: true,
			noPrintSelector :'.no-print'
		});*/
	}
	function imprimirElemento(elemento) {
    var printContents = document.getElementById(elemento).innerHTML;
    var ventana = window.open('', 'PRINT', "width=1000,height=800,scrollbars=NO");   

    ventana.document.write('<html></head><link rel="stylesheet" href="style.css">'); //Aquí agregué la hoja de estilos
    ventana.document.write('</head><body >');
    ventana.document.write(printContents);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    
  }
  document.querySelector("#btnImprimirDiv").addEventListener("click", function() {
    imprimirElemento('printableArea');
  });
</script>
