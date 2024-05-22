<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Clientes_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function todos_los_clientes($buscar='', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
    	if($inicio !== false && $cantidadRegistro !== false) {
      		$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
    	}
		$query = $this->db->query("SELECT * FROM tbl_clientes WHERE rfc LIKE '%$buscar%' OR nombre_comercial LIKE '%$buscar%' OR razon_social LIKE '%$buscar%' OR email LIKE '%$buscar%' OR telefono LIKE '%$buscar%' OR telefono_adicional LIKE '%$buscar%' OR direccion LIKE '%$buscar%' " . $limit);
		return $query->result();
	}

	public function detalle_cliente($uid) {
		$query = $this->db->query("SELECT * FROM tbl_clientes WHERE uid='$uid'");
		return $query->row();
	}

	public function guardar_cliente($uid) {
		$insert = array(
			'razon_social' => $this->input->post('razon_social'),
			'rfc' => $this->input->post('rfc'),
			'nombre_comercial' => $this->input->post('nombre_comercial'),
			'email' => $this->input->post('email'),
			'telefono' => $this->input->post('telefono'),
			'telefono_adicional' => $this->input->post('telefono_2'),
			'direccion' => $this->input->post('direccion'),
			'uid'=>$uid
		);
		return $this->db->insert('tbl_clientes',$insert);
	}

	public function editar_cliente() {
		$update = array(
			'razon_social' => $this->input->post('razon_social'),
			'rfc' => $this->input->post('rfc'),
			'nombre_comercial' => $this->input->post('nombre_comercial'),
			'email' => $this->input->post('email'),
			'telefono' => $this->input->post('telefono'),
			'telefono_adicional' => $this->input->post('telefono_adicional'),
			'direccion' => $this->input->post('direccion'),
		);
		return $this->db->update('tbl_clientes', $update, array('idtbl_clientes' => $this->input->post('idCliente')));
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
		        'departamento' => 8
		);
		$this->db->insert('tbl_log', $data);
	}
}