<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function login_user($username) {
		$this->db->where('username',$username);
		$query = $this->db->get('tbl_users');
		if($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function permisos($id) {
		$query = $this->db->query("
			SELECT ctl_permisos.permiso, dtl_permisos_users.ctl_tipo_permiso_idctl_tipo_permiso 
			FROM dtl_permisos_users
			INNER JOIN ctl_permisos
			ON ctl_permisos.idctl_permisos  = dtl_permisos_users.ctl_permisos_idctl_permisos
			WHERE tbl_users_idtbl_users = '$id'
		");
		foreach ($query->result() as $key => $value) {
			$permisos[$value->permiso]=(int) $value->ctl_tipo_permiso_idctl_tipo_permiso;
		}
		return @$permisos;
	}

	public function modulos($id) {
		$query = $this->db->query("
			SELECT ctl_modulo_tipo_users.modulo, tbl_modulos_users.ctl_modulo_tipo_users_idctl_modulo_tipo_users 
			FROM tbl_modulos_users
			INNER JOIN ctl_modulo_tipo_users
			ON ctl_modulo_tipo_users.idctl_modulo_tipo_users  = tbl_modulos_users.ctl_modulo_tipo_users_idctl_modulo_tipo_users
			WHERE tbl_users_idtbl_users = '$id'
		");
		foreach ($query->result() as $key => $value) {
			$modulos[$value->modulo]=(int) $value->ctl_modulo_tipo_users_idctl_modulo_tipo_users;
		}
		return @$modulos;
	}
	

	//Traer los almacenes encargados por usuario
	public function almacenes_encargados($id) {
		$query = $this->db->query("
			SELECT * 
			FROM tbl_encargado_almacen						
			WHERE tbl_users_idtbl_users = $id
		");
		foreach ($query->result() as $key => $value) {
			$permisos['almacen'.$key]=(int) $value->tbl_almacenes_idtbl_almacenes;
		}
		return @$permisos;
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
		        'departamento' => 2
		);
		$this->db->insert('tbl_log', $data);
	}
}