<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Racks_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function racks() {
		$query = $this->db->query("SELECT idtbl_rack as idrack, rack_sel as rack FROM tbl_racks");
		return $query->result();
	}

	public function racks_dp() {
		$query = $this->db->query("SELECT idtbl_rack as idrack, rack_sel as rack FROM tbl_racks");
		return $query->result();
	}

	public function niveles($rack) {
		$this->db->select('idtbl_nivel as idnivel, nivel_sel as nivel');
		$this->db->where('tbl_rack_idtbl_rack',$rack);
		$query = $this->db->get('tbl_niveles');
		return $query->result();
	}

	public function niveles_dp($rack_dp) {
		$this->db->select('idtbl_nivel as idnivel, nivel_sel as nivel');
		$this->db->where('tbl_rack_idtbl_rack',$rack_dp);
		$query = $this->db->get('tbl_niveles');
		return $query->result();
	}
}