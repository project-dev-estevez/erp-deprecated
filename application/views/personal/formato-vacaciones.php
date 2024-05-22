<?php if(count ($detalle)>0): $detalle=$detalle[0] ?>
<?php $detalle->periodo = json_decode($detalle->periodo)  ?>
<?php $detalle->derecho_a = json_decode($detalle->derecho_a)  ?>
<?php $detalle->dias_disfrutados_periodo = json_decode($detalle->dias_disfrutados_periodo)  ?>
<?php $detalle->dias_pendientes_periodo = json_decode($detalle->dias_pendientes_periodo)  ?>
<?php $detalle->dias_disfrutar = json_decode($detalle->dias_disfrutar)  ?>
<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td align="center"><img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 100px;"></td>
			<td align="center"><h3>Solicitud de Vacaciones</h3></td>
            <td align="center">FECHA: <?= strftime("%d-%b-%Y", strtotime($detalle->timestamp)) ?></td>
		</tr>
		<tr>
			<td colspan="3">POR MEDIO DEL PRESENTE HAGO CONSTAR QUE DISFRUTARE DE LOS DIAS DE VACACIONES SIGUIENTES: <br><?php  ?></td>
		</tr>
	</tbody>
</table>

<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td>NOMBRE COMPLETO: <?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
		</tr>
	</tbody>
</table>

<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td colspan="2">DEPARTAMENTO: <?= $detalle->departamento ?></td>
			<td>FECHA INGRESO: <?= strftime("%d-%b-%Y", strtotime($detalle->fecha_ingreso)) ?></td>
		</tr>
        <tr>
            <td>DIAS SOLICITADOS: <?= $detalle->dias ?></td>
            <td>INICIAN: <?= strftime("%d-%b-%Y", strtotime($detalle->fecha_inicio)) ?></td>
            <td>TERMINAN: <?= strftime("%d-%b-%Y", strtotime($detalle->fecha_final)) ?></td>
        </tr>
	</tbody>
</table>

<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td align="center" rowspan="2">PERIODO AL QUE CORRESPONDEN</td>
			<td align="center" rowspan="2">DERECHO A</td>
			<td align="center" colspan="2">ESTATUS VACACIONAL</td>
			<td align="center" colspan="2">DIAS DE VACACIONES A QUE SE REFIERE ESTE AVISO</td>
		</tr>
        <tr>
            <td align="center">DIAS DISFRUTADOS EN EL PERIODO</td>
            <td align="center">DIAS PENDIENTES POR DISFRUTAR</td>
            <td align="center">DÍAS SOLICITADOS</td>
            <td align="center">NUEVO SALDO</td>
        </tr>
        <?php foreach ($detalle->periodo as $key => $value): ?>
        <tr>
            <td align="center"><?= $value ?></td>
            <td align="center"><?= $detalle->derecho_a[$key] ?></td>
            <td align="center"><?= $detalle->dias_disfrutados_periodo[$key] ?></td>
            <td align="center"><?= $detalle->dias_pendientes_periodo[$key] ?></td>
            <td align="center"><?= $detalle->dias_disfrutar[$key] ?></td>
            <td align="center"><?= $detalle->dias_pendientes_periodo[$key]-$detalle->dias_disfrutar[$key] ?></td>
        </tr>
        <?php endforeach; ?>
	</tbody>
</table>

<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td width="33%">EMPLEADO SOLICITANTE</td>
			<td width="33%">JEFE INMEDIATO</td>
			<td width="33%">RECURSOS HUMANOS</td>
		</tr>
        <tr>
            <td height="100" align="center" style="vertical-align: bottom;"><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
            <td height="100"></td>
            <td height="100"></td>
        </tr>
        <tr>
            <td>NOMBRE Y FIRMA</td>
            <td>NOMBRE Y FIRMA</td>
            <td>NOMBRE Y FIRMA</td>
        </tr>
        <tr>
            <td>Fecha: <?= strftime("%d-%b-%Y", strtotime($detalle->timestamp)) ?></td>
            <td>Fecha:</td>
            <td>Fecha:</td>
        </tr>
	</tbody>
</table>
<ul>
    <li>Recursos Humanos / Nominas conserva el original y el empleado puede conservar una copia.</li>
    <li>Al final del año de servicio, el original del presente documento será archivado con la fotocopia del control anual de vacaciones</li>
</ul>
<br>
<br>
<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td align="center"><img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 100px;"></td>
			<td align="center"><h3>Solicitud de Vacaciones</h3></td>
            <td align="center">FECHA: <?= strftime("%d-%b-%Y", strtotime($detalle->timestamp)) ?></td>
		</tr>
		<tr>
			<td colspan="3">POR MEDIO DEL PRESENTE HAGO CONSTAR QUE DISFRUTARE DE LOS DIAS DE VACACIONES SIGUIENTES: <br><?php  ?></td>
		</tr>
	</tbody>
</table>

<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td>NOMBRE COMPLETO: <?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
		</tr>
	</tbody>
</table>

<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td colspan="2">DEPARTAMENTO: <?= $detalle->departamento ?></td>
			<td>FECHA INGRESO: <?= strftime("%d-%b-%Y", strtotime($detalle->fecha_ingreso)) ?></td>
		</tr>
        <tr>
            <td>DIAS SOLICITADOS: <?= $detalle->dias ?></td>
            <td>INICIAN: <?= strftime("%d-%b-%Y", strtotime($detalle->fecha_inicio)) ?></td>
            <td>TERMINAN: <?= strftime("%d-%b-%Y", strtotime($detalle->fecha_final)) ?></td>
        </tr>
	</tbody>
</table>

<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td align="center" rowspan="2">PERIODO AL QUE CORRESPONDEN</td>
			<td align="center" rowspan="2">DERECHO A</td>
			<td align="center" colspan="2">ESTATUS VACACIONAL</td>
			<td align="center" colspan="2">DIAS DE VACACIONES A QUE SE REFIERE ESTE AVISO</td>
		</tr>
        <tr>
            <td align="center">DIAS DISFRUTADOS EN EL PERIODO</td>
            <td align="center">DIAS PENDIENTES POR DISFRUTAR</td>
            <td align="center">DÍAS SOLICITADOS</td>
            <td align="center">NUEVO SALDO</td>
        </tr>
        <?php foreach ($detalle->periodo as $key => $value): ?>
        <tr>
            <td align="center"><?= $value ?></td>
            <td align="center"><?= $detalle->derecho_a[$key] ?></td>
            <td align="center"><?= $detalle->dias_disfrutados_periodo[$key] ?></td>
            <td align="center"><?= $detalle->dias_pendientes_periodo[$key] ?></td>
            <td align="center"><?= $detalle->dias_disfrutar[$key] ?></td>
            <td align="center"><?= $detalle->dias_pendientes_periodo[$key]-$detalle->dias_disfrutar[$key] ?></td>
        </tr>
        <?php endforeach; ?>
	</tbody>
</table>

<table width="100%" class="table table-bordered">
	<tbody>
		<tr>
			<td width="33%">EMPLEADO SOLICITANTE</td>
			<td width="34%">JEFE INMEDIATO</td>
			<td width="33%">RECURSOS HUMANOS</td>
		</tr>
        <tr>
            <td height="100" align="center" style="vertical-align: bottom;"><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
            <td height="100"></td>
            <td height="100"></td>
        </tr>
        <tr>
            <td>NOMBRE Y FIRMA</td>
            <td>NOMBRE Y FIRMA</td>
            <td>NOMBRE Y FIRMA</td>
        </tr>
        <tr>
            <td>Fecha: <?= strftime("%d-%b-%Y", strtotime($detalle->timestamp)) ?></td>
            <td>Fecha:</td>
            <td>Fecha:</td>
        </tr>
	</tbody>
</table>
<ul>
    <li>Recursos Humanos / Nominas conserva el original y el empleado puede conservar una copia.</li>
    <li>Al final del año de servicio, el original del presente documento será archivado con la fotocopia del control anual de vacaciones</li>
</ul>
<script type="text/javascript">
$(document).ready(function () {
    Pace.on('done',function(){
        setTimeout(() => {
            window.print();
        }, 1000);
    });
});
</script>
<?php else: ?>
<center><h1>No hay información disponible</h1></center>
<?php endif ?>