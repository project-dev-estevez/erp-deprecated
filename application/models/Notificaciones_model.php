<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Notificaciones_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function notificaciones() {
		$this->db->where('tbl_users_idtbl_users=', '1');
		$this->db->order_by("idtbl_log", "desc");
		$this->db->limit(20);
		$query = $this->db->get('tbl_log');
		return $query->result();
	}

	public function update_log($id_log) {
		$this->db->set('estatus', 1);
		$this->db->where('idtbl_log', $id_log);
		return $this->db->update('tbl_log');
	}
}