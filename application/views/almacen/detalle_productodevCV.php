<div class="container-fluid">
	<div class="col-12">
		<h5> DESASIGNACIÓN DE UNIDAD</h5>
		<h6 style="font-weight: normal;">Recibí de ESTEVEZJOR para el desempeño de mis funciones yo, <strong>C.: <?php echo $checklist_devolucion[0]['nombre_usuario'] ?></strong></h6>
	    <h6 style="font-weight: normal">el automóvil con las siguientes características</h6>
	    <h6 style="font-weight: normal" align="right" class="ecocheck">Eco: <strong><?php echo $checklist_devolucion[0]['numero_interno'] ?></strong></h6>
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
				<input type="text" class="form-control" value="<?= $checklist_devolucion[0]['kilometraje'] ?>" disabled>
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
						<img class="img-fluid" src="../.<?= $imagenes->imagen1 ?>">
					</center>

					<center>
						<img class="img-fluid" src="../.<?= $imagenes->imagen2 ?>">
					</center>

					<center>
						<img class="img-fluid" src="../.<?= $imagenes->imagen3 ?>">
					</center>
					<?php
					$fotos_checklist = $checklist_devolucion[0]['fotos_checklist'];
					if($fotos_checklist != NULL){
					$fotos_checklist = json_decode($fotos_checklist);
					foreach ($fotos_checklist as $key => $value) { ?>
						<center>
							<img class="img-fluid" src="../.<?= $value ?>"  style="display: block; width: 250px;">
						</center>
					<?php }} ?>
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
												<img class="img-fluid" src="../.<?= $imagenes->imagen4 ?>">
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
												<img class="img-fluid" src="../.<?= $imagenes->imagen5 ?>">
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
	
	<script>
	function openWin(obj) {
    event.preventDefault();
    myWindow = window.open(obj.getAttribute("href"), '_blank', 'width=1000,height=800,left=0,top=0');
    myWindow.document.close(); //missing code
    myWindow.focus();
    myWindow.print();
    //myWindow.close();

  }
  </script>
  