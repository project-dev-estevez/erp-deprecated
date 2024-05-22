<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Asistencias_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();

	}

	public function existe_numero_empleado($numero_empleado) {
		$this->db->select('idtbl_usuarios');
		$this->db->from('tbl_usuarios');
		$this->db->where('numero_empleado', $numero_empleado);
		$query = $this->db->get();
		
		if($query->num_rows()>0)
			return $query->result()[0]->idtbl_usuarios;
		else
			return false;
	}

	public function asistencia_dia() {
		$this->db->select('*');
		$this->db->from('tbl_asistencias');
		$this->db->where('tbl_users_idtbl_users', $this->session->userdata('id'));
		$this->db->where('tipo', 'entrada');
		$this->db->where('fecha_hora', 'CURDATE()');
		$query = $this->db->get();
		
		if($query->num_rows()>0)
			return $query->result()[0];
		else
			return false;
	}

	public function guardar_asistencia($id_usuario) {
		$data = array(
		        'fecha_hora' => date ("Y-m-d H:i:s", strtotime($this->input->post('fecha_hora'))),
		        'tbl_usuarios_idtbl_usuarios' => $id_usuario,
		        'tbl_usuarios_idtbl_usuarios_autor' => $this->session->userdata('idtbl_usuarios')
		);

		$result=$this->db->insert('tbl_asistencias',$data);
   		return  $result;
	}

	public function nuevaAsistencia() {
        $this->db->trans_begin();
       
        $data = array(
            'fecha_hora' => date('Y-m-d H:i:s'),
            'latitud' => $this->input->post('latitud'),
            'longitud' => $this->input->post('longitud'),
            'tipo' => $this->input->post('tipo'),
			'tbl_users_idtbl_users' => $this->session->userdata('id')
        );
        //Se registra la asistencia
        $this->db->insert('tbl_asistencias', $data);
		$id_asistencia = $this->db->insert_id();

		if($this->input->post('tipo') == 'salida'){
			$hora = date('H');
			if(intval($hora) >= 19){
				$final = intval($hora) - 18;
				$data_tiempo = array(
					'tiempo' => $final,
					'tbl_users_idtbl_users' => $this->session->userdata('id'),
					'tipo' => 'extra',
					'tbl_asistencias_idtbl_asistencias' => $id_asistencia
				);
				$this->db->insert('tbl_tiempo_tiempo', $data_tiempo);
			}
		}

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function getAsistencias($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if ($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
		if($this->session->userdata('tipo') == 5){
			$query = $this->db->query("SELECT tbl_asistencias.*, tbl_users.nombre FROM tbl_asistencias LEFT JOIN tbl_users ON tbl_users.idtbl_users=tbl_asistencias.tbl_users_idtbl_users WHERE (tbl_asistencias.tipo LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_asistencias.fecha_hora LIKE '%$buscar%') ORDER BY tbl_asistencias.idtbl_asistencias DESC " . $limit);
		}else{
			$usuario = $this->session->userdata('id');
			$query = $this->db->query("SELECT tbl_asistencias.*, tbl_users.nombre FROM tbl_asistencias LEFT JOIN tbl_users ON tbl_users.idtbl_users=tbl_asistencias.tbl_users_idtbl_users WHERE tbl_asistencias.tbl_users_idtbl_users = $usuario AND (tbl_asistencias.tipo LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_asistencias.fecha_hora LIKE '%$buscar%') ORDER BY tbl_asistencias.idtbl_asistencias DESC " . $limit);
		}
		return $query->result();
	}

	//Trae la última asistencia del usuario
	public function ultima_asistencia()
    {                
			$usuario = $this->session->userdata('id');
            $query = $this->db->query("SELECT idtbl_asistencias, fecha_hora FROM tbl_asistencias WHERE tbl_users_idtbl_users = $usuario AND tipo = 'entrada' ORDER BY idtbl_asistencias DESC LIMIT 1");
        
        return $query->result();
    }

	//Trae la cuadrilla del usuario
	/*public function ultima_asistencia()
    {
			$usuario = $this->session->userdata('id');
            $query = $this->db->query("SELECT idtbl_asistencias, fecha_hora FROM tbl_asistencias WHERE tbl_users_idtbl_users = $usuario AND tipo = 'entrada' ORDER BY idtbl_asistencias DESC LIMIT 1");
        
        return $query->result();
    }*/

	//Trae la última salida del usuario
	public function ultima_salida()
    {                
			$usuario = $this->session->userdata('id');
            $query = $this->db->query("SELECT idtbl_asistencias, fecha_hora FROM tbl_asistencias WHERE tbl_users_idtbl_users = $usuario AND tipo = 'salida' ORDER BY idtbl_asistencias DESC LIMIT 1");
        
        return $query->result();
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
		        'departamento' => 3
		);
		$this->db->insert('tbl_log', $data);
	}
}