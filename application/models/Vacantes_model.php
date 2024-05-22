<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Vacantes_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function numero_total_vacantes() {
		$this->db->select_sum('numero_vacantes');
		return $this->db->get('tbl_vacantes')->row_array();
	}

	public function vacantes() {
		$query = $this->db->query("
			SELECT tbl_vacantes.*, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto, tbl_departamentos.departamento
			FROM `tbl_vacantes` 
			LEFT JOIN tbl_requisiciones 
			ON tbl_vacantes.tbl_requisiciones_idtbl_requisiciones=tbl_requisiciones.idtbl_requisiciones			
			LEFT JOIN tbl_perfiles
			ON  tbl_requisiciones.tbl_perfiles_idtbl_perfiles =tbl_perfiles.idtbl_perfiles
			LEFT JOIN tbl_departamentos 
			ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos
			LEFT JOIN tbl_proyectos
			ON  tbl_requisiciones.tbl_proyectos_idtbl_proyectos =tbl_proyectos.idtbl_proyectos
			
			");
		return $query->result();
	}

	public function check_existe($id_perfil) {
		return $this->db->get_where('tbl_vacantes',array('tbl_perfiles_idtbl_perfiles' => $id_perfil, 'numero_vacantes >' => 0))->num_rows();
	}

	/**/
	public function nueva_vacante($uid) {
		$id=$this->input->post('uid-requisicion');
		$query = $this->db->query("
			SELECT idtbl_requisiciones
			FROM tbl_requisiciones 
			WHERE tbl_requisiciones.uid='$id'");
		$insert = array(
			'tbl_requisiciones_idtbl_requisiciones' => $query->result()[0]->idtbl_requisiciones,
			'numero_vacantes' => $this->input->post('numero_vacantes'),
			'uid' => $uid
		);
		if( $this->db->insert('tbl_vacantes', $insert) )
			return $this->db->insert_id();
		else
			return false;
	}

	public function num_select_vacante($uid) {
		return $this->db->get_where('tbl_vacantes',array('uid' => $uid, 'numero_vacantes >' => 0))->num_rows();
	}

	/**/
	public function detalle_vacante($uid) {
		return $this->db->get_where('tbl_vacantes',array('uid' => $uid))->row_array();
	}

	public function editar_vacante($uid) {
		$actual=$this->select_vacante($uid);
		$array[] = array('fecha' => date('Y-m-d H:i:s'), 'txt' => 'Se actualizó anteriormente No. Vacantes: "'.$actual['numero_vacantes'].'", actualmente No. Vacantes: "'.$this->input->post('nvacantes').'"');
		if (!empty($actual['historial'])) {
			$des = array();
			$des=json_decode(json_encode(json_decode($actual['historial'])), true);
			array_push($des, $array);
			$historial=json_encode($des);
		} else {
			$historial = array(); array_push($historial, $array); $historial = json_encode($historial);
		}
		$update = array(
			'numero_vacantes' => $this->input->post('nvacantes'),
			'historial' => $historial
		);
		return $this->db->update('tbl_vacantes', $update,array('idtbl_vacantes' => $actual['idtbl_vacantes']));
	}

	public function log($log, $link=null) {	
		if($this->session->userdata('id'))
			$id=$this->session->userdata('id');
		else
			$id=1;
		$data = array(
	        'log' => $log,
	        'tbl_users_idtbl_users' => $id,
	        'link' => $link,
	        'departamento' => 5
		);
		$this->db->insert('tbl_log', $data);
	}
}