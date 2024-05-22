<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Departamentos_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	//QUERY PARA MOSTRAR DETALLE DE DEPARTAMENTOS
	public function listado_departamentos($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
		$empresa=$this->input->post('empresa');
		$query = $this->db->query("
			SELECT tbl_departamentos.*, departamentos.perfiles, departamentos.personal
			FROM tbl_departamentos 
			INNER JOIN 
				(	SELECT tbl_departamentos.idtbl_departamentos ,GROUP_CONCAT(DISTINCT(tbl_perfiles.perfil) SEPARATOR ', ') as perfiles, COUNT(tbl_usuarios.idtbl_usuarios) as personal 
					FROM tbl_departamentos 
					LEFT JOIN tbl_perfiles 
					ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos 
					LEFT JOIN tbl_usuarios 
					ON tbl_perfiles.idtbl_perfiles=tbl_usuarios.tbl_perfiles_idtbl_perfiles WHERE tbl_usuarios.estatus=1
					GROUP BY tbl_departamentos.idtbl_departamentos
				) as departamentos 
			ON tbl_departamentos.idtbl_departamentos=departamentos.idtbl_departamentos
			WHERE tbl_departamentos.departamento!='Root' AND tbl_departamentos.tbl_empresas_idtbl_empresas=$empresa AND tbl_departamentos.tbl_empresas_idtbl_empresas=1 AND tbl_departamentos.departamento LIKE '$buscar%' OR departamentos.perfiles LIKE '$buscar%'
			ORDER BY tbl_departamentos.departamento ASC " . $limit);
		return $query->result();
	}

	public function detalle_departamento($uid) {
		$this->db->select('idtbl_departamentos,departamento');
		$this->db->where('uid',$uid);
		$query = $this->db->get('tbl_departamentos');
		if($query->num_rows()>0){
			$datos['perfiles']=$this->perfiles_por_departamento($query->result()[0]->idtbl_departamentos);
			$datos['nombre']=$query->result()[0]->departamento;
			$datos['id']=$query->result()[0]->idtbl_departamentos;
			$datos['uid']=$uid;
			return $datos;
		}
		else
			return false;
	}

	public function detalle_perfil($uid) {	
		$this->db->select('tbl_perfiles.*, tbl_departamentos.departamento');
		$this->db->join('tbl_departamentos', 'tbl_departamentos.idtbl_departamentos = tbl_perfiles.tbl_departamentos_idtbl_departamentos');
		$this->db->where('tbl_perfiles.uid',$uid);
		$query = $this->db->get('tbl_perfiles');
		if($query->num_rows()>0){
			$this->db->where('tbl_perfiles_idtbl_perfiles',$query->result()[0]->idtbl_perfiles);
			$queryUsuarios = $this->db->get('tbl_usuarios');
			$datos['usuarios']=$queryUsuarios->result();
			$datos['nombre']=$query->result()[0]->perfil;
			$datos['id']=$query->result()[0]->idtbl_perfiles;
			$datos['detallePerfil']=$query->result()[0];
			$datos['uid']=$uid;
			return $datos;
		}
		else
			return false;
	}

	public function detalle_perfilActivo($uid) {	
		$this->db->select('tbl_perfiles.*, tbl_departamentos.departamento');
		$this->db->join('tbl_departamentos', 'tbl_departamentos.idtbl_departamentos = tbl_perfiles.tbl_departamentos_idtbl_departamentos');
		$this->db->where('tbl_perfiles.uid',$uid);
		$query = $this->db->get('tbl_perfiles');
		if($query->num_rows()>0){
			$this->db->where('tbl_perfiles_idtbl_perfiles',$query->result()[0]->idtbl_perfiles);
			$this->db->where('tbl_usuarios.estatus', 1);
			$queryUsuarios = $this->db->get('tbl_usuarios');
			$datos['usuarios']=$queryUsuarios->result();
			$datos['nombre']=$query->result()[0]->perfil;
			$datos['id']=$query->result()[0]->idtbl_perfiles;
			$datos['detallePerfil']=$query->result()[0];
			$datos['uid']=$uid;
			return $datos;
		}
		else
			return false;
	}

	public function detalle_perfilInactivo($uid) {	
		$this->db->select('tbl_perfiles.*, tbl_departamentos.departamento');
		$this->db->join('tbl_departamentos', 'tbl_departamentos.idtbl_departamentos = tbl_perfiles.tbl_departamentos_idtbl_departamentos');
		$this->db->where('tbl_perfiles.uid',$uid);
		$query = $this->db->get('tbl_perfiles');
		if($query->num_rows()>0){
			$this->db->where('tbl_perfiles_idtbl_perfiles',$query->result()[0]->idtbl_perfiles);
			$this->db->where('tbl_usuarios.estatus', 0);
			$queryUsuarios = $this->db->get('tbl_usuarios');
			$datos['usuarios']=$queryUsuarios->result();
			$datos['nombre']=$query->result()[0]->perfil;
			$datos['id']=$query->result()[0]->idtbl_perfiles;
			$datos['detallePerfil']=$query->result()[0];
			$datos['uid']=$uid;
			return $datos;
		}
		else
			return false;
	}

	public function editar_perfil() {
		$datos = array(
			'perfil' => $this->input->post('perfil'),
			'descripcion' => $this->input->post('descripcion'),
			'escolaridad' => $this->input->post('escolaridad'),
			'experiencia' => $this->input->post('experiencia'),
			'edad' => $this->input->post('edad'),
			'sexo' => $this->input->post('sexo'),
			'disponibilidad_viajar' => $this->input->post('disponibilidad_viajar'),
			'actividades' => $this->input->post('actividades'),
			'cursos' => $this->input->post('cursos'),
			'habilidades' => $this->input->post('habilidades'),
			'codigo' => $this->input->post('codigo'),
			'revision' => $this->input->post('revision')
		);
		return $this->db->update('tbl_perfiles', $datos, array('idtbl_perfiles' => $this->input->post('idPerfil')));
	}

	public function departamentos($idctl_establecimiento = "") {
		$condition = "";
		if($idctl_establecimiento != ""){
			$condition = " AND ctl_establecimientos_idctl_establecimiento = " . $idctl_establecimiento;
		}
		$query = $this->db->query("SELECT idtbl_departamentos as id, departamento FROM tbl_departamentos WHERE departamento!='Root' " . $condition);
		return $query->result();
	}

	public function direcciones($idctl_establecimiento = "") {
		$condition = "";
		if($idctl_establecimiento != ""){
			$condition = " AND ctl_establecimientos_idctl_establecimientos = " . $idctl_establecimiento;
		}
		$query = $this->db->query("SELECT idtbl_direcciones as id, direccion FROM tbl_direcciones WHERE direccion!='Root' " . $condition);
		return $query->result();
	}

	public function motivos_vacantes() {
		$query = $this->db->query("SELECT idctl_motivos_vacantes as id, motivo FROM ctl_motivos_vacantes");
		return $query->result();
	}

	public function escolaridad() {
		$query = $this->db->query("SELECT idctl_escolaridad as id, escolaridad FROM ctl_escolaridad");
		return $query->result();
	}

	public function perfiles() {
		$query = $this->db->query("SELECT idtbl_perfiles as id, perfil FROM tbl_perfiles WHERE perfil!='Root'");
		return $query->result();
	}

	public function perfiles_por_departamento($departamento) {
		$query = $this->db->query("SELECT tbl_perfiles.idtbl_perfiles as id, tbl_perfiles.perfil, tbl_perfiles.uid, usuarios.personal
		FROM tbl_perfiles
		LEFT JOIN
				(	SELECT idtbl_perfiles,  COUNT(tbl_usuarios.idtbl_usuarios) as personal 
					FROM tbl_perfiles 
					LEFT JOIN tbl_usuarios 
					ON tbl_perfiles.idtbl_perfiles=tbl_usuarios.tbl_perfiles_idtbl_perfiles WHERE tbl_usuarios.estatus=1
					GROUP BY tbl_perfiles.idtbl_perfiles 
				) as usuarios
			ON tbl_perfiles.idtbl_perfiles=usuarios.idtbl_perfiles
		WHERE tbl_perfiles.tbl_departamentos_idtbl_departamentos='$departamento'");
		return $query->result();
	}

	public function catalogo_perfiles_por_departamento($departamento) {
		$query = $this->db->query("SELECT TP.idtbl_perfiles as id, TP.perfil, TP.uid
		FROM tbl_perfiles TP
		LEFT JOIN tbl_usuarios TU ON TU.tbl_perfiles_idtbl_perfiles = TP.idtbl_perfiles
		WHERE TP.tbl_departamentos_idtbl_departamentos=$departamento
		GROUP BY id");
		return $query->result();
	}

	public function catalogo_areas_por_direccion($direccion) {
		$query = $this->db->query("SELECT TA.idtbl_areas as id, TA.area, TA.uid
		FROM tbl_areas TA
		WHERE TA.tbl_direcciones_idtbl_direcciones=$direccion
		GROUP BY id");
		return $query->result();
	}

	public function catalogo_departamentos_por_area($area) {
		$query = $this->db->query("SELECT TD.idtbl_departamentos as id, TD.departamento, TD.uid
		FROM tbl_departamentos TD
		WHERE TD.tbl_areas_idtbl_areas=$area
		GROUP BY id");
		return $query->result();
	}

	public function actualizar_departamento() {
		if ($this->session->userdata('tipo') == 5) {			
				$data = array(
					'departamento' => $this->input->post('nombredepartamento')
				);
				$this->db->set($data);
				$this->db->where('uid', $this->input->post('uid'));				
				$result = $this->db->update('tbl_departamentos');			
			
		}
		return $result;
	}

	public function actualizar_perfil() {
		if ($this->session->userdata('tipo') == 5) {			
				$data = array(
					'perfil' => $this->input->post('nombreperfil')
				);
				$this->db->set($data);
				$this->db->where('uid', $this->input->post('uid'));				
				$result = $this->db->update('tbl_perfiles');			
			
		}
		return $result;
	}

	public function nuevo_departamento($departamento, $uid) {
		$data = array(
		        'departamento' => $departamento,
				'uid' => $uid,
				'tbl_areas_idtbl_areas' => $this->input->post('establecimiento')
		);
		$result=$this->db->insert('tbl_departamentos', $data);
		return $result;
	}

	public function nuevo_perfil($id_departamento,$perfil, $uid) {
		$data = array(
		        'tbl_departamentos_idtbl_departamentos' => $id_departamento,
		        'perfil' => $perfil,
		        'uid' => $uid
		);
		$result=$this->db->insert('tbl_perfiles', $data);
		return $result;
	}

	public function permisos($permiso) {
		$query = $this->db->query("
			SELECT dtl_permisos_users.ctl_tipo_permiso_idctl_tipo_permiso as permiso
			FROM ctl_permisos
			INNER JOIN dtl_permisos_users
			ON dtl_permisos_users.ctl_permisos_idctl_permisos = ctl_permisos.idctl_permisos
			WHERE ctl_permisos.permiso = '$permiso'
			AND dtl_permisos_users.tbl_users_idtbl_users='".$this->session->userdata('id')."'
		");
		if($query->num_rows()>0)
			return (int) $query->row()->permiso;
		else
			return 0;
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
		        'departamento' => 1
		);
		$this->db->insert('tbl_log', $data);
	}
}