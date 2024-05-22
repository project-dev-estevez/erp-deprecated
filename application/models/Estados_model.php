<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Estados_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function estados() {
		$query = $this->db->query("SELECT idtbl_entidad as id, nombre_entidad as estado FROM tbl_entidad");
		return $query->result();
	}

	public function municipios($estado) {
		$this->db->select('idtbl_municipio as id, nombre_municipio as municipio');
		$this->db->where('tbl_entidad_idtbl_entidad',$estado);
		$query = $this->db->get('tbl_municipio');
		return $query->result();
	}
}