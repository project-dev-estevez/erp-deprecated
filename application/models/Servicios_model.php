<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Servicios_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function log($log, $link=null) {	
		if($this->session->userdata('id')) {
			$id = $this->session->userdata('id');
    	} else {
			$id = 1;
    	}
	    $data = array(
	      'log' => $log,
	      'tbl_users_idtbl_users' => $id,
	      'link' => $link,
	      'departamento' => 2
		);
		$this->db->insert('tbl_log', $data);
	}

	public function guardar_orden($uid) {
		$parametros = array(
			'idtbl_ordenes_servicio' => '',
			'uid' => $uid,
			'contrato' => $_POST['contrato'],
			'nombre' => $_POST['nombre'],
			'direccion' => $_POST['direccion'],
			'fecha' => $_POST['fecha'],
			'colonia' => $_POST['colonia'],
			'poblacion' => $_POST['poblacion'],
			'entre_calles' => $_POST['entre_calles'],
			'telefono' => $_POST['telefono'],
			'celular' => $_POST['celular'],
			'latitud' => $_POST['latitud'],
			'longitud' => $_POST['longitud'],
			'servicios_realizar' => $_POST['servicios_realizar'],
			'genero_orden' => $_POST['genero_orden'],
			'observaciones' => $_POST['observaciones'],
			'tipo_servicio' => $_POST['tipo_servicio'],
			'televisores_adicionales' => $_POST['televisores_adicionales'],
			'terminal_optica' => isset($_POST['terminal_optica']) ? $_POST['terminal_optica'] : NULL,
			'pto' => isset($_POST['pto']) ? $_POST['pto'] : NULL,
			'candado' => isset($_POST['candado']) ? $_POST['candado'] : NULL,
			'no_serie_fo' => isset($_POST['no_serie_fo']) ? $_POST['no_serie_fo'] : NULL,
			'no_gpon' => isset($_POST['no_gpon']) ? $_POST['no_gpon'] : NULL,
			'mac' => isset($_POST['mac']) ? $_POST['mac'] : NULL,
			'ip_fo' => isset($_POST['ip_fo']) ? $_POST['ip_fo'] : NULL,
			'clave' => isset($_POST['clave']) ? $_POST['clave'] : NULL,
			'torre' => isset($_POST['torre']) ? $_POST['torre'] : NULL,
			'sector' => isset($_POST['sector']) ? $_POST['sector'] : NULL,
			'no_serie_wireless' => isset($_POST['no_serie_wireless']) ? $_POST['no_serie_wireless'] : NULL,
			'mac_esn' => isset($_POST['mac_esn']) ? $_POST['mac_esn'] : NULL,
			'wireless_mac' => isset($_POST['wireless_mac']) ? $_POST['wireless_mac'] : NULL,
			'ip_wireless' => isset($_POST['ip_wireless']) ? $_POST['ip_wireless'] : NULL,
			'no_serie_modem' => isset($_POST['no_serie_modem']) ? $_POST['no_serie_modem'] : NULL,
			'mac_esn_modem' => isset($_POST['mac_esn_modem']) ? $_POST['mac_esn_modem'] : NULL,
			'ip_modem' => isset($_POST['ip_modem']) ? $_POST['ip_modem'] : NULL,
			'password' => isset($_POST['password']) ? $_POST['password'] : NULL,
			'potencia' => $_POST['potencia'],
			'cap_servicio' => $_POST['cap_servicio'],
			'fecha_llegada_servicio' => $_POST['fecha_llegada_servicio'],
			'hora_inicio' => $_POST['hora_inicio'],
			'hora_fin' => $_POST['hora_fin'],
			'comentarios_cliente' => $_POST['comentarios_cliente'],
			'comentarios_tecnico' => $_POST['comentarios_tecnico']
		);
		$this->db->insert('tbl_ordenes_servicio', $parametros);
	}

	public function actualizar_orden($uid) {
		$parametros = array(
			'contrato' => $_POST['contrato'],
			'nombre' => $_POST['nombre'],
			'direccion' => $_POST['direccion'],
			'fecha' => $_POST['fecha'],
			'colonia' => $_POST['colonia'],
			'poblacion' => $_POST['poblacion'],
			'entre_calles' => $_POST['entre_calles'],
			'telefono' => $_POST['telefono'],
			'celular' => $_POST['celular'],
			'latitud' => $_POST['latitud'],
			'longitud' => $_POST['longitud'],
			'servicios_realizar' => $_POST['servicios_realizar'],
			'genero_orden' => $_POST['genero_orden'],
			'observaciones' => $_POST['observaciones'],
			'tipo_servicio' => $_POST['tipo_servicio'],
			'televisores_adicionales' => $_POST['televisores_adicionales'],
			'terminal_optica' => isset($_POST['terminal_optica']) ? $_POST['terminal_optica'] : NULL,
			'pto' => isset($_POST['pto']) ? $_POST['pto'] : NULL,
			'candado' => isset($_POST['candado']) ? $_POST['candado'] : NULL,
			'no_serie_fo' => isset($_POST['no_serie_fo']) ? $_POST['no_serie_fo'] : NULL,
			'no_gpon' => isset($_POST['no_gpon']) ? $_POST['no_gpon'] : NULL,
			'mac' => isset($_POST['mac']) ? $_POST['mac'] : NULL,
			'ip_fo' => isset($_POST['ip_fo']) ? $_POST['ip_fo'] : NULL,
			'clave' => isset($_POST['clave']) ? $_POST['clave'] : NULL,
			'torre' => isset($_POST['torre']) ? $_POST['torre'] : NULL,
			'sector' => isset($_POST['sector']) ? $_POST['sector'] : NULL,
			'no_serie_wireless' => isset($_POST['no_serie_wireless']) ? $_POST['no_serie_wireless'] : NULL,
			'mac_esn' => isset($_POST['mac_esn']) ? $_POST['mac_esn'] : NULL,
			'wireless_mac' => isset($_POST['wireless_mac']) ? $_POST['wireless_mac'] : NULL,
			'ip_wireless' => isset($_POST['ip_wireless']) ? $_POST['ip_wireless'] : NULL,
			'no_serie_modem' => isset($_POST['no_serie_modem']) ? $_POST['no_serie_modem'] : NULL,
			'mac_esn_modem' => isset($_POST['mac_esn_modem']) ? $_POST['mac_esn_modem'] : NULL,
			'ip_modem' => isset($_POST['ip_modem']) ? $_POST['ip_modem'] : NULL,
			'password' => isset($_POST['password']) ? $_POST['password'] : NULL,
			'potencia' => $_POST['potencia'],
			'cap_servicio' => $_POST['cap_servicio'],
			'fecha_llegada_servicio' => $_POST['fecha_llegada_servicio'],
			'hora_inicio' => $_POST['hora_inicio'],
			'hora_fin' => $_POST['hora_fin'],
			'comentarios_cliente' => $_POST['comentarios_cliente'],
			'comentarios_tecnico' => $_POST['comentarios_tecnico']
		);
		$this->db->set($parametros);
		$this->db->where('uid', $uid);
		$result = $this->db->update('tbl_ordenes_servicio');
	}

	public function guardar_material($parametros) {
		$this->db->insert('dtl_solicitud_material_orden_servicio', $parametros);
	}

	public function listado_ordenes_servicio($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
		$query = $this->db->query("SELECT tbl_ordenes_servicio.*, dtl_solicitud_material_orden_servicio.uid_orden_servicio, user_pm.nombre as nombre_pm, user_ak.nombre as nombre_ak from tbl_ordenes_servicio LEFT JOIN dtl_solicitud_material_orden_servicio ON dtl_solicitud_material_orden_servicio.uid_orden_servicio = tbl_ordenes_servicio.uid LEFT JOIN tbl_users as user_pm ON tbl_ordenes_servicio.tbl_users_idtbl_users_pm = user_pm.idtbl_users LEFT JOIN tbl_users as user_ak ON user_ak.idtbl_users = tbl_ordenes_servicio.tbl_users_idtbl_users_ak WHERE (tbl_ordenes_servicio.uid LIKE '%$buscar%' OR tbl_ordenes_servicio.nombre LIKE '%$buscar%' OR tbl_ordenes_servicio.direccion LIKE '%$buscar%' OR tbl_ordenes_servicio.fecha LIKE '%$buscar%' ) GROUP BY tbl_ordenes_servicio.idtbl_ordenes_servicio " . $limit);
		return $query->result();
	}

	public function materiales($uid) {
		$query = $this->db->query("SELECT dtl_solicitud_material_orden_servicio.*, tbl_ordenes_servicio.estatus FROM dtl_solicitud_material_orden_servicio LEFT JOIN tbl_ordenes_servicio ON tbl_ordenes_servicio.uid = dtl_solicitud_material_orden_servicio.uid_orden_servicio WHERE dtl_solicitud_material_orden_servicio.uid_orden_servicio = '$uid'");
		return $query->result();
	}

	public function actualizar_material($parametros, $id) {
		$this->db->set($parametros);
		$this->db->where('iddtl_solicitud_material_orden_servicio', $id);
		$result = $this->db->update('dtl_solicitud_material_orden_servicio');
	}

	public function validar_uid_solicitud_material($uid) {
		$query = $this->db->query("SELECT dtl_solicitud_material_orden_servicio.uid_orden_servicio from dtl_solicitud_material_orden_servicio WHERE dtl_solicitud_material_orden_servicio.uid_orden_servicio = '$uid'");
		return $query->result();
	}

	public function detalle_orden_servicio($uid) {
		$query = $this->db->query("SELECT * FROM tbl_ordenes_servicio WHERE tbl_ordenes_servicio.uid = '$uid'");
		return $query->result_array();
	}

	public function aprobar_orden_servicio() {
		if($_POST['estatus_orden'] == null) {
			$data = array(
				'estatus' => 'aprobada pm',
				'tbl_users_idtbl_users_pm' => $this->session->userdata('id'),
				'fecha_pm' => date('Y-m-d H:i:s')
			);
		}

		if($_POST['estatus_orden'] == 'aprobada pm') {
			$data = array(
				'estatus' => 'aprobada almacen kuali',
				'tbl_users_idtbl_users_ak' => $this->session->userdata('id'),
				'fecha_ak' => date('Y-m-d H:i:s')
			);
		}

		$this->db->set($data);
		$this->db->where('uid', $this->input->post('uid'));
		$result = $this->db->update('tbl_ordenes_servicio');
		return  $result;
	}
	public function cancelar_orden_servicio() {
		if($_POST['estatus_orden'] == null) {
			$data = array(
				'estatus' => 'cancelada pm',
				'tbl_users_idtbl_users_pm' => $this->session->userdata('id'),
				'fecha_pm' => date('Y-m-d H:i:s')
			);
		}

		if($_POST['estatus_orden'] == 'aprobada pm') {
			$data = array(
				'estatus' => 'cancelada almacen kuali',
				'tbl_users_idtbl_users_ak' => $this->session->userdata('id'),
				'fecha_ak' => date('Y-m-d H:i:s')
			);
		}

		$this->db->set($data);
		$this->db->where('uid', $this->input->post('uid'));
		$result = $this->db->update('tbl_ordenes_servicio');
		return  $result;
	}

	public function modificar_aprobar_orden_servicio() {
		$parametros = array(
			'contrato' => $_POST['contrato'],
			'nombre' => $_POST['nombre'],
			'direccion' => $_POST['direccion'],
			'fecha' => $_POST['fecha'],
			'colonia' => $_POST['colonia'],
			'poblacion' => $_POST['poblacion'],
			'entre_calles' => $_POST['entre_calles'],
			'telefono' => $_POST['telefono'],
			'celular' => $_POST['celular'],
			'latitud' => $_POST['latitud'],
			'longitud' => $_POST['longitud'],
			'servicios_realizar' => $_POST['servicios_realizar'],
			'genero_orden' => $_POST['genero_orden'],
			'observaciones' => $_POST['observaciones'],
			'tipo_servicio' => $_POST['tipo_servicio'],
			'televisores_adicionales' => $_POST['televisores_adicionales'],
			'terminal_optica' => isset($_POST['terminal_optica']) ? $_POST['terminal_optica'] : NULL,
			'pto' => isset($_POST['pto']) ? $_POST['pto'] : NULL,
			'candado' => isset($_POST['candado']) ? $_POST['candado'] : NULL,
			'no_serie_fo' => isset($_POST['no_serie_fo']) ? $_POST['no_serie_fo'] : NULL,
			'no_gpon' => isset($_POST['no_gpon']) ? $_POST['no_gpon'] : NULL,
			'mac' => isset($_POST['mac']) ? $_POST['mac'] : NULL,
			'ip_fo' => isset($_POST['ip_fo']) ? $_POST['ip_fo'] : NULL,
			'clave' => isset($_POST['clave']) ? $_POST['clave'] : NULL,
			'torre' => isset($_POST['torre']) ? $_POST['torre'] : NULL,
			'sector' => isset($_POST['sector']) ? $_POST['sector'] : NULL,
			'no_serie_wireless' => isset($_POST['no_serie_wireless']) ? $_POST['no_serie_wireless'] : NULL,
			'mac_esn' => isset($_POST['mac_esn']) ? $_POST['mac_esn'] : NULL,
			'wireless_mac' => isset($_POST['wireless_mac']) ? $_POST['wireless_mac'] : NULL,
			'ip_wireless' => isset($_POST['ip_wireless']) ? $_POST['ip_wireless'] : NULL,
			'no_serie_modem' => isset($_POST['no_serie_modem']) ? $_POST['no_serie_modem'] : NULL,
			'mac_esn_modem' => isset($_POST['mac_esn_modem']) ? $_POST['mac_esn_modem'] : NULL,
			'ip_modem' => isset($_POST['ip_modem']) ? $_POST['ip_modem'] : NULL,
			'password' => isset($_POST['password']) ? $_POST['password'] : NULL,
			'potencia' => $_POST['potencia'],
			'cap_servicio' => $_POST['cap_servicio'],
			'fecha_llegada_servicio' => $_POST['fecha_llegada_servicio'],
			'hora_inicio' => $_POST['hora_inicio'],
			'hora_fin' => $_POST['hora_fin'],
			'comentarios_cliente' => $_POST['comentarios_cliente'],
			'comentarios_tecnico' => $_POST['comentarios_tecnico'],
			'estatus' => 'aprobada pm',
			'tbl_users_idtbl_users_pm' => $this->session->userdata('id'),
			'fecha_pm' => date('Y-m-d H:i:s')
		);
		$this->db->set($parametros);
		$this->db->where('uid', $this->input->post('uid'));
		$result = $this->db->update('tbl_ordenes_servicio');
		return  $result;
	}
}