<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('CsvModel');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
	}

	//Hace un insert desde un archivo csv
	public function insertsTblCatalogo() {
		$linea = 0;
		$registros = array();
		$insert = array();
		//Abrimos nuestro archivo
		$archivo = fopen(base_url() . "uploads/REFACCIONES.csv", "r");
		$nombres_campos = fgetcsv($archivo, ","); 
		//Lo recorremos
		while (($datos = fgetcsv($archivo, ",")) == true) {
			$num = count($datos);
			$linea++;
			//Recorremos las columnas de esa linea
			for ($columna = 0; $columna < $num; $columna++) {
				//echo $datos[$columna] . "<br>";
				$registro[$nombres_campos[$columna]] = $datos[$columna];
			}
			$registros[] = $registro;
		}
		$aux = 0;
		for($x = 0;$x<sizeof($registros); $x++) {
			$aux++;
			if($registros[$x]['Estatus'] === "ACTIVO") {
				if($registros[$x]['Moneda'] === "PESOS") {
					$tipo_moneda = 'p';
				}
				else {
					$tipo_moneda = 'd';
				}
				if($registros[$x]['Unidad'] === "JGO") {
					$tipo_unidad = '2';
				}
				if($registros[$x]['Unidad'] === "LT") {
					$tipo_unidad = '4';
				}
				if($registros[$x]['Unidad'] === "PZA") {
					$tipo_unidad = '1';
				}
				if($registros[$x]['Unidad'] === "SERV") {
					$tipo_unidad = '17';
				}
				$precio = str_replace('$', '', $registros[$x]['Costo']);
				$nuevo_precio = str_replace(',', '', $precio);

				$row = $this->CsvModel->existNeodata(utf8_encode($registros[$x]['Insumo']));
				if($row == 0) {
					//echo $aux . utf8_encode($registros[$x]['Insumo']) . "|" . utf8_encode($registros[$x]['Descripcion']) . "|" . $tipo_moneda . "|" . $tipo_unidad . "|" . str_replace('$', '', $registros[$x]['Costo']) . "<br>";
					echo "INSERT INTO tbl_catalogo(descripcion,uid,ctl_unidades_medida_idctl_unidades_medida,ctl_categorias_idctl_categorias,precio,tipo_moneda,neodata,estatus_producto) VALUES(" . "'" . utf8_encode($registros[$x]['Descripcion']) . "','" . uniqid() . "'," . $tipo_unidad . "," . '8' . ",'" . $nuevo_precio . "','" . $tipo_moneda . "','" . utf8_encode($registros[$x]['Insumo']) . "'," . 1 .");" . "<br>";
				}
			}
			//else {
			//	echo $aux . "<br>";
			//}
		}
		//Cerramos el archivo
		fclose($archivo);
		//$datos['insert'] = $insert;
		//$this->load->view('welcome_message',$datos);	
	}

	//Hace un insert desde un csv
	public function insertsDtlAlmacen() {
		$linea = 0;
		$registros = array();
		$insert = array();
		$insert2 = array();
		//Abrimos nuestro archivo
		$archivo = fopen(base_url() . "uploads/REFACCIONES.csv", "r");
		$nombres_campos = fgetcsv($archivo, ","); 
		//Lo recorremos
		while (($datos = fgetcsv($archivo, ",")) == true) {
			$num = count($datos);
			$linea++;
			//Recorremos las columnas de esa linea
			for ($columna = 0; $columna < $num; $columna++) {
				//echo $datos[$columna] . "<br>";
				$registro[$nombres_campos[$columna]] = $datos[$columna];
			}
			$registros[] = $registro;
		}
		$aux = 0;
		for($x = 0;$x<sizeof($registros); $x++) {
			$aux++;
			if($registros[$x]['Estatus'] === "ACTIVO") {
				
				$insert[] = $this->CsvModel->getIdTblCatalogo(utf8_encode($registros[$x]['Insumo']));
				
			}
		}
		for($x=0;$x<sizeof($insert);$x++) {
			//echo $insert[$x]."<br>";
			$row = $this->CsvModel->existIdtblCatalogo($insert[$x]);
			if($row == 0) {
				//echo $insert[$x] . "no<br>";
				echo "INSERT INTO dtl_almacen(tbl_almacenes_idtbl_almacenes, tbl_catalogo_idtbl_catalogo, existencias, estatus) VALUES(" . "'1'," . $insert[$x] . ",0," . "'almacen'" . ");<br>";
			} else {
				//echo "UPDATE dtl_almacen SET tbl_almacenes_idtbl_almacenes = 29 WHERE tbl_catalogo_idtbl_catalogo = $insert[$x];" . "<br>";
			}
		}
		//Cerramos el archivo
		fclose($archivo);
		//$datos['insert'] = $insert;
		//$this->load->view('welcome_message',$datos);	
	}

	//Hace una actualizacion desde un csv
	public function updateTblCatalogo() {
		$linea = 0;
		$registros = array();
		$insert = array();
		$insert2 = array();
		//Abrimos nuestro archivo
		$archivo = fopen(base_url() . "uploads/CATALOGO.csv", "r");
		$nombres_campos = fgetcsv($archivo, ","); 
		//Lo recorremos
		while (($datos = fgetcsv($archivo, ",")) == true) {
			$num = count($datos);
			$linea++;
			//Recorremos las columnas de esa linea
			for ($columna = 0; $columna < $num; $columna++) {
				//echo $datos[$columna] . "<br>";
				$registro[$nombres_campos[$columna]] = $datos[$columna];
			}
			$registros[] = $registro;
		}
		$aux = 0;
		for($x = 0;$x<sizeof($registros); $x++) {
			$aux++;
			if($registros[$x]['Estatus'] === "ACTIVO") {
				//echo $registros[$x]['Insumo'];
				$insert[] = $this->CsvModel->getIdTblCatalogo(utf8_encode($registros[$x]['Insumo']));
				$neodata[] = $registros[$x]['Insumo'];
				$tipo[] = $registros[$x]['Tipo'];
				
			}
		}
		for($x=0;$x<sizeof($insert);$x++) {
			//echo $insert[$x]."<br>";
            if ($insert[$x] != null || $insert[$x] != '') {
                $row = $this->CsvModel->existIdTblCatalogoTbl($insert[$x]);
            
                if ($row == 0) {
                    //echo $insert[$x] . "no<br>";
                    echo "INSERT INTO dtl_almacen(tbl_almacenes_idtbl_almacenes, tbl_catalogo_idtbl_catalogo, existencias, estatus) VALUES(" . "'1'," . $insert[$x] . ",0," . "'almacen'" . ");<br>";
                } else {
					echo "UPDATE tbl_catalogo SET ctl_categorias_idctl_categorias = $tipo[$x] WHERE idtbl_catalogo = $insert[$x];" . "<br>";
					$this->db->query("UPDATE tbl_catalogo SET ctl_categorias_idctl_categorias = $tipo[$x] WHERE idtbl_catalogo = $insert[$x]");
                }
            } else{
				echo "INSERT INTO tbl_catalogo(tbl_almacenes_idtbl_almacenes, neodata, existencias, estatus) VALUES(" . "'1'," . $neodata[$x] . ",0," . "'almacen'" . ");<br>";
			}			
		}
		//Cerramos el archivo
		fclose($archivo);
		//$datos['insert'] = $insert;
		//$this->load->view('welcome_message',$datos);	
	}


	//Hace una actualización desde un csv
	public function updateTblCatalogos() {
		$linea = 0;
		$registros = array();
		$insert = array();
		$insert2 = array();
		//Abrimos nuestro archivo
		$archivo = fopen(base_url() . "uploads/preven.csv", "r");
		$nombres_campos = fgetcsv($archivo, ","); 
		//Lo recorremos
		while (($datos = fgetcsv($archivo, ",")) == true) {
			$num = count($datos);
			$linea++;
			//Recorremos las columnas de esa linea
			for ($columna = 0; $columna < $num; $columna++) {
				//echo $datos[$columna] . "<br>";
				$registro[$nombres_campos[$columna]] = $datos[$columna];
			}
			$registros[] = $registro;
		}
		$aux = 0;
		for($x = 0;$x<sizeof($registros); $x++) {
			$aux++;
			$fecha[] = $registros[$x]['fecha'];
			$equipo[] = $registros[$x]['equipo'];
			$modelo[] = $registros[$x]['modelo'];
			$numero_interno[] = $registros[$x]['numero'];
			$numero_serie[] = $registros[$x]['serie'];
			$diagnostico[] = $registros[$x]['diagnostico'];
			$solucion[] = $registros[$x]['solucion'];
			$observaciones[] = $registros[$x]['observaciones'];
			$realizado[] = $registros[$x]['realizado'];
			$costor[] = $registros[$x]['costor'];
			$costov[] = $registros[$x]['costov'];
			$tipo[] = $registros[$x]['tipo'];
			$cliente[] = $registros[$x]['cliente'];

		}
		for($x=0;$x<sizeof($equipo);$x++) {
			//echo $insert[$x]."<br>";
            
				echo "INSERT INTO mantenimientos_estevez(fecha, equipo, modelo, numero_interno, numero_serie, diagnostico, solucion, observaciones, usuario, costo_interno, costo_venta, tipo_mantenimiento, id_cliente) VALUES(" . $fecha[$x]."," . $equipo[$x]."," . $modelo[$x]."," . $numero_interno[$x].",".$numero_serie[$x].",".$diagnostico[$x].",".$solucion[$x].",".$observaciones[$x].",".$realizado[$x].",".$costor[$x].",".$costov[$x].",".$tipo[$x]. ",". $cliente[$x] . ");<br>";
			    $this->db->query("INSERT INTO mantenimientos_estevez(fecha, equipo, modelo, numero_interno, numero_serie, diagnostico, solucion, observaciones, usuario, costo_interno, costo_venta, tipo_mantenimiento, id_cliente) VALUES(" . "'".$fecha[$x]."'," . "'".$equipo[$x]."'," . "'".$modelo[$x]."'," . "'".$numero_interno[$x]."',"."'".$numero_serie[$x]."',"."'".$diagnostico[$x]."',"."'".$solucion[$x]."',"."'".$observaciones[$x]."',".$realizado[$x].",".$costor[$x].",".$costov[$x].",".$tipo[$x]. ",".$cliente[$x] . ");");
		}
		//Cerramos el archivo
		fclose($archivo);
		//$datos['insert'] = $insert;
		//$this->load->view('welcome_message',$datos);	
	}

	public function asignacionesSistemas(){
		//return;
		$this->load->model('personal_model');
		$data = array(
			['idtbl_catalogo' => 21759, 'serie' =>'MXL84727RB', 'numero_interno' => 'CE001', 'uid_personal' => '615315b31b1f7'],
			['idtbl_catalogo' => 21759, 'serie' =>'FKJTQX2', 'numero_interno' => 'CE002', 'uid_personal' => '60e85af94a8e2'],
			['idtbl_catalogo' => 21759, 'serie' =>'21787P2', 'numero_interno' => 'CE003', 'uid_personal' => '5e57dcad4b467'],
			['idtbl_catalogo' => 21759, 'serie' =>'H2JX7N2', 'numero_interno' => 'CE004', 'uid_personal' => '60f04d5f11854'],
			['idtbl_catalogo' => 21759, 'serie' =>'H1P58N2', 'numero_interno' => 'CE005', 'uid_personal' => '619d0c336ebc5'],
			['idtbl_catalogo' => 21759, 'serie' =>'MXL8392PGL', 'numero_interno' => 'CE006', 'uid_personal' => '61a7adb93f923'],
			['idtbl_catalogo' => 21759, 'serie' =>'FKBVQX2', 'numero_interno' => 'CE007', 'uid_personal' => '61a90ad6b8382'],
			['idtbl_catalogo' => 21759, 'serie' =>'H1TX7N2', 'numero_interno' => 'CE008', 'uid_personal' => '61c2117b16278'],
			['idtbl_catalogo' => 21759, 'serie' =>'FKYSQX2', 'numero_interno' => 'CE009', 'uid_personal' => '5cdc33cfadc5a'],
			['idtbl_catalogo' => 21759, 'serie' =>'FKSYQX2', 'numero_interno' => 'CE010', 'uid_personal' => '61cb4959f12e0'],
			['idtbl_catalogo' => 21759, 'serie' =>'1Z7B7P2', 'numero_interno' => 'CE011', 'uid_personal' => '61ddd00f3725f'],
			['idtbl_catalogo' => 21759, 'serie' =>'MXL84727J', 'numero_interno' => 'CE012', 'uid_personal' => '61e069346c368'],
			['idtbl_catalogo' => 21759, 'serie' =>'1ZP47P2', 'numero_interno' => 'CE013', 'uid_personal' => '61e064302d561'],
			['idtbl_catalogo' => 21759, 'serie' =>'DQSQEAL004413009D03000', 'numero_interno' => 'CE014', 'uid_personal' => '605b4f625d1aa'],
			['idtbl_catalogo' => 21759, 'serie' =>'DQSV9AL001427069813000', 'numero_interno' => 'CE017', 'uid_personal' => '611681635cb4c'],
			['idtbl_catalogo' => 21759, 'serie' =>'8CC7381BKF', 'numero_interno' => 'CE018', 'uid_personal' => '5C4792E7D9681'],
			['idtbl_catalogo' => 21759, 'serie' =>'0', 'numero_interno' => 'CE019', 'uid_personal' => '5f500e1a5dbf8'],
			['idtbl_catalogo' => 21759, 'serie' =>'8CC8310Q74', 'numero_interno' => 'CE021', 'uid_personal' => '61cdd0058c334'],
			['idtbl_catalogo' => 21759, 'serie' =>'DOSOEAL004413009DF3000', 'numero_interno' => 'CE023', 'uid_personal' => '5C4792E7DA285'],
			['idtbl_catalogo' => 21759, 'serie' =>'8CC705020X', 'numero_interno' => 'CE025', 'uid_personal' => '5C4792E7D9DCE'],
			['idtbl_catalogo' => 21759, 'serie' =>'DQSV9AL0014270692D3000', 'numero_interno' => 'CE028', 'uid_personal' => '5C4792E7D72E3'],
			['idtbl_catalogo' => 21759, 'serie' =>'P9016UNK', 'numero_interno' => 'CE029', 'uid_personal' => '60e5eedb84f08'],
			['idtbl_catalogo' => 21759, 'serie' =>'8CC7050210', 'numero_interno' => 'CE030', 'uid_personal' => '61e5ae5025f36'],
			['idtbl_catalogo' => 21759, 'serie' =>'24185805734', 'numero_interno' => 'CE031', 'uid_personal' => '604a3d7cd8fc8'],
			['idtbl_catalogo' => 21759, 'serie' =>'8CC7381BK7', 'numero_interno' => 'CE034', 'uid_personal' => '620fc205cbd9a'],
			['idtbl_catalogo' => 21759, 'serie' =>'8CC9211T7F', 'numero_interno' => 'CE035', 'uid_personal' => '5C4792E7D78AC'],
			['idtbl_catalogo' => 21759, 'serie' =>'1ZXB7P2', 'numero_interno' => 'CE036', 'uid_personal' => '61d32f73dbc2f'],
			['idtbl_catalogo' => 21759, 'serie' =>'8CC9211TBN', 'numero_interno' => 'CE037', 'uid_personal' => '61a52354a35fa'],
			['idtbl_catalogo' => 21759, 'serie' =>'DQSQEAL002409065503000', 'numero_interno' => 'CE038', 'uid_personal' => '61a51ec4d19fb'],
			['idtbl_catalogo' => 21759, 'serie' =>'S1CFC39', 'numero_interno' => 'CE039', 'uid_personal' => '5C4792E7D738D'],
			['idtbl_catalogo' => 21759, 'serie' =>'S1CFE27', 'numero_interno' => 'CE040', 'uid_personal' => '5C4792E7D8D7E'],
			['idtbl_catalogo' => 21759, 'serie' =>'P901KVXW', 'numero_interno' => 'CE041', 'uid_personal' => '61a51a4e5bd19'],
			['idtbl_catalogo' => 21759, 'serie' =>'DQSQEAL002409065683000', 'numero_interno' => 'CE042', 'uid_personal' => '5e556870616b7'],
			['idtbl_catalogo' => 21759, 'serie' =>'DQSV9AL001427069733000', 'numero_interno' => 'CE043', 'uid_personal' => '605e67729b8f0'],
			['idtbl_catalogo' => 21759, 'serie' =>'S1CFC33', 'numero_interno' => 'CE044', 'uid_personal' => '5dd7232db9c32'],
			['idtbl_catalogo' => 21759, 'serie' =>'0', 'numero_interno' => 'CE045', 'uid_personal' => '612f98564f3fb'],
			['idtbl_catalogo' => 21759, 'serie' =>'S1CFF31', 'numero_interno' => 'CE046', 'uid_personal' => '602e82bb46814'],
			['idtbl_catalogo' => 21759, 'serie' =>'1ZJ77P2', 'numero_interno' => 'CE047', 'uid_personal' => '6019977b000df'],
			['idtbl_catalogo' => 21759, 'serie' =>'P901KVH2', 'numero_interno' => 'CE048', 'uid_personal' => '5C4792E7D6E36'],
			['idtbl_catalogo' => 21759, 'serie' =>'BBRMR52', 'numero_interno' => 'CE049', 'uid_personal' => '62029660a61a2'],
			['idtbl_catalogo' => 21759, 'serie' =>'P901HYK3', 'numero_interno' => 'CE050', 'uid_personal' => '615dd79f06532'],
			['idtbl_catalogo' => 21759, 'serie' =>'DQSQEAL0024090655C3000', 'numero_interno' => 'CE051', 'uid_personal' => '5cd470c6ac69a'],
			['idtbl_catalogo' => 21759, 'serie' =>'DQSV9AL001427068913000', 'numero_interno' => 'CE052', 'uid_personal' => '5C4792E7D7184'],
			['idtbl_catalogo' => 21759, 'serie' =>'S1CFC57', 'numero_interno' => 'CE053', 'uid_personal' => '5dcb2fde745ea'],
			['idtbl_catalogo' => 21759, 'serie' =>'8CC705020R', 'numero_interno' => 'CE055', 'uid_personal' => '606f4444401dc'],
			['idtbl_catalogo' => 21759, 'serie' =>'DQSC9AL001427068A93000', 'numero_interno' => 'CE056', 'uid_personal' => '5C4792E7D82CD'],
			['idtbl_catalogo' => 21759, 'serie' =>'S1BGM15', 'numero_interno' => 'CE057', 'uid_personal' => '5C4792E7D82CD'],
		);
		$count = 0;
		foreach($data as $value){
			$uid_personal = $value['uid_personal'];
			$query = $this->db->query("SELECT idtbl_usuarios FROM tbl_usuarios WHERE tbl_usuarios.uid = '$uid_personal' ");
			$idtbl_usuarios = $query->result()[0]->idtbl_usuarios;

			$fecha = date('Y-m-d  H:i:s');
			$uid = uniqid();
			$query = $this->db->query("SELECT MAX(tbl_almacen_movimientos.folio) AS folio FROM tbl_almacen_movimientos WHERE tbl_almacen_movimientos.tipo_movimiento = 'sistemas' AND tbl_almacen_movimientos.tipo = 'asignacion'");
			$folio = $query->result()[0]->folio + 1;
			$query = $this->db->query("INSERT INTO tbl_almacen_movimientos(fecha, tbl_almacenes_idtbl_almacenes, uid, tipo, tbl_usuarios_idtbl_usuarios, estatus, tbl_users_idtbl_users, folio, tipo_movimiento) VALUE('$fecha', 30, '$uid', 'asignacion', '$idtbl_usuarios', 1, 203, $folio, 'sistemas')");
			$idtbl_almacen_movimientos = $this->db->insert_id();

			$idtbl_catalogo = $value['idtbl_catalogo'];
			$serie = $value['serie'];
			$numero_interno = $value['numero_interno'];
			$query = $this->db->query("SELECT dtl_almacen.iddtl_almacen FROM dtl_almacen WHERE dtl_almacen.tbl_catalogo_idtbl_catalogo = '$idtbl_catalogo' AND dtl_almacen.numero_serie = '$serie' AND dtl_almacen.numero_interno = '$numero_interno' AND dtl_almacen.tbl_almacenes_idtbl_almacenes = 30");
			$iddtl_almacen = $query->result()[0]->iddtl_almacen;

			$query = $this->db->query("INSERT INTO dtl_asignacion(fecha_asignacion, dtl_almacen_iddtl_almacen, tbl_usuarios_idtbl_usuarios, tbl_almacen_movimientos_idtbl_almacen_movimientos, estatus_asignacion, cantidad, entregado) VALUE('$fecha', $iddtl_almacen, $idtbl_usuarios, $idtbl_almacen_movimientos, 'activa', 1, 0)");

			$query = $this->db->query("UPDATE dtl_almacen SET dtl_almacen.existencias = 0, dtl_almacen.estatus = 'asignado' WHERE dtl_almacen.iddtl_almacen = $iddtl_almacen");
			$count++;
		}
		echo "Termino . . . Regritro $count asignaciones.";
	}

}