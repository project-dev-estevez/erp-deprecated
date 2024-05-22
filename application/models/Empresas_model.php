<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Empresas_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	//QUERY PARA MOSTRAR DETALLE DE DEPARTAMENTOS
	public function listado_empresas($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
		$query = $this->db->query("
			SELECT tbl_empresas.*
			FROM tbl_empresas
			
			WHERE tbl_empresas.empresa LIKE '%$buscar%'
			ORDER BY tbl_empresas.idtbl_empresas ASC " . $limit);
		return $query->result();
    }

    public function listado_establecimientos($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
		$query = $this->db->query("
			SELECT ctl_establecimientos.*
			FROM ctl_establecimientos
			WHERE ctl_establecimientos.establecimiento LIKE '%$buscar%'
			ORDER BY ctl_establecimientos.establecimiento ASC " . $limit);
		return $query->result();
    }
    
    public function listado_departamentos($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $empresa=$this->input->post('empresa');
		$query = $this->db->query("
			SELECT tbl_departamentos.*, departamentos.perfiles, departamentos.personal
			FROM tbl_departamentos 
			LEFT JOIN 
				(	SELECT tbl_departamentos.idtbl_departamentos ,GROUP_CONCAT(DISTINCT(tbl_perfiles.perfil) SEPARATOR ', ') as perfiles, COUNT(tbl_usuarios.idtbl_usuarios) as personal 
					FROM tbl_departamentos 
					LEFT JOIN tbl_perfiles 
					ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos 
					LEFT JOIN tbl_usuarios 
					ON tbl_perfiles.idtbl_perfiles=tbl_usuarios.tbl_perfiles_idtbl_perfiles WHERE tbl_usuarios.estatus=1
					GROUP BY tbl_departamentos.idtbl_departamentos
				) as departamentos 
			ON tbl_departamentos.idtbl_departamentos=departamentos.idtbl_departamentos
			WHERE tbl_departamentos.departamento!='Root' AND tbl_departamentos.tbl_empresas_idtbl_empresas=$empresa AND (tbl_departamentos.departamento LIKE '$buscar%' OR departamentos.perfiles LIKE '$buscar%')
			ORDER BY tbl_departamentos.departamento ASC " . $limit);
		return $query->result();
	}

	public function listado_direcciones($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $empresa=$this->input->post('establecimiento');
		$query = $this->db->query("
			SELECT tbl_direcciones.*
			FROM tbl_direcciones 
			WHERE tbl_direcciones.ctl_establecimientos_idctl_establecimientos=$empresa AND (tbl_direcciones.direccion LIKE '$buscar%')
			ORDER BY tbl_direcciones.direccion ASC " . $limit);
		return $query->result();
	}

	public function listado_areas($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $direccion=$this->input->post('direccion');
		$query = $this->db->query("
			SELECT tbl_areas.*
			FROM tbl_areas
			WHERE tbl_areas.tbl_direcciones_idtbl_direcciones=$direccion AND (tbl_areas.area LIKE '$buscar%')
			ORDER BY tbl_areas.area ASC " . $limit);
		return $query->result();
	}

	public function listado_departamentos_establecimientos($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $establecimiento=$this->input->post('establecimiento');
		$query = $this->db->query("
			SELECT tbl_departamentos.*, departamentos.perfiles, departamentos.personal
			FROM tbl_departamentos 
			LEFT JOIN 
				(	SELECT tbl_departamentos.idtbl_departamentos ,GROUP_CONCAT(DISTINCT(tbl_perfiles.perfil) SEPARATOR ', ') as perfiles, COUNT(tbl_usuarios.idtbl_usuarios) as personal 
					FROM tbl_departamentos 
					LEFT JOIN tbl_perfiles 
					ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos 
					LEFT JOIN tbl_usuarios 
					ON tbl_perfiles.idtbl_perfiles=tbl_usuarios.tbl_perfiles_idtbl_perfiles WHERE tbl_usuarios.estatus=1
					GROUP BY tbl_departamentos.idtbl_departamentos
				) as departamentos 
			ON tbl_departamentos.idtbl_departamentos=departamentos.idtbl_departamentos
			WHERE tbl_departamentos.departamento!='Root' AND tbl_departamentos.tbl_areas_idtbl_areas=$establecimiento AND (tbl_departamentos.departamento LIKE '$buscar%' OR departamentos.perfiles LIKE '$buscar%')
			ORDER BY tbl_departamentos.departamento ASC " . $limit);
		return $query->result();
	}

	public function departamentos() {
		$query = $this->db->query("SELECT idtbl_departamentos as id, departamento FROM tbl_departamentos WHERE departamento!='Root'");
		return $query->result();
	}

	public function nueva_empresa($empresa, $uid) {
		$data = array(
		        'empresa' => $empresa,
		        'uid' => $uid
		);
		$result=$this->db->insert('tbl_empresas', $data);
		return $result;
	}

	public function nuevo_establecimiento($establecimiento, $uid) {
		$data = array(
		        'establecimiento' => $establecimiento,
		        'uid' => $uid
		);
		$result=$this->db->insert('ctl_establecimientos', $data);
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

	public function catalogo_direcciones_por_empresa($establecimiento) {
		/*if($empresa != 4){
			$query = $this->db->query("SELECT TD.idtbl_departamentos as id, TD.departamento, TD.uid
		FROM tbl_departamentos TD
		LEFT JOIN tbl_empresas TE ON TE.idtbl_empresas = TD.tbl_empresas_idtbl_empresas
		WHERE TD.tbl_empresas_idtbl_empresas=$empresa
		GROUP BY id");
		}else{
			$query = $this->db->query("SELECT TD.idtbl_departamentos as id, TD.departamento, TD.uid
		FROM tbl_departamentos TD
		LEFT JOIN tbl_empresas TE ON TE.idtbl_empresas = TD.tbl_empresas_idtbl_empresas
		WHERE TD.tbl_empresas_idtbl_empresas!=$empresa
		GROUP BY id");
		}*/
		$query = $this->db->query("SELECT TD.idtbl_direcciones as id, TD.direccion, TD.uid
		FROM tbl_direcciones TD
		WHERE TD.ctl_establecimientos_idctl_establecimientos=$establecimiento
		GROUP BY id");
		return $query->result();
	}

	public function catalogo_areas_por_empresa($establecimiento) {
		/*if($empresa != 4){
			$query = $this->db->query("SELECT TD.idtbl_departamentos as id, TD.departamento, TD.uid
		FROM tbl_departamentos TD
		LEFT JOIN tbl_empresas TE ON TE.idtbl_empresas = TD.tbl_empresas_idtbl_empresas
		WHERE TD.tbl_empresas_idtbl_empresas=$empresa
		GROUP BY id");
		}else{
			$query = $this->db->query("SELECT TD.idtbl_departamentos as id, TD.departamento, TD.uid
		FROM tbl_departamentos TD
		LEFT JOIN tbl_empresas TE ON TE.idtbl_empresas = TD.tbl_empresas_idtbl_empresas
		WHERE TD.tbl_empresas_idtbl_empresas!=$empresa
		GROUP BY id");
		}*/
		$query = $this->db->query("SELECT TAS.idtbl_areas as id, TAS.area, TAS.uid
		FROM tbl_areas TAS
		WHERE TAS.tbl_direcciones_idtbl_direcciones=$establecimiento
		GROUP BY id");
		return $query->result();
	}

	public function catalogo_departamentos_por_empresa($establecimiento) {
		/*if($empresa != 4){
			$query = $this->db->query("SELECT TD.idtbl_departamentos as id, TD.departamento, TD.uid
		FROM tbl_departamentos TD
		LEFT JOIN tbl_empresas TE ON TE.idtbl_empresas = TD.tbl_empresas_idtbl_empresas
		WHERE TD.tbl_empresas_idtbl_empresas=$empresa
		GROUP BY id");
		}else{
			$query = $this->db->query("SELECT TD.idtbl_departamentos as id, TD.departamento, TD.uid
		FROM tbl_departamentos TD
		LEFT JOIN tbl_empresas TE ON TE.idtbl_empresas = TD.tbl_empresas_idtbl_empresas
		WHERE TD.tbl_empresas_idtbl_empresas!=$empresa
		GROUP BY id");
		}*/
		$query = $this->db->query("SELECT TD.idtbl_departamentos as id, TD.departamento, TD.uid
		FROM tbl_departamentos TD
		LEFT JOIN tbl_areas TAS ON TAS.idtbl_areas = TD.tbl_areas_idtbl_areas
		WHERE TD.tbl_areas_idtbl_areas=$establecimiento
		GROUP BY id");
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
		        'departamento' => 1
		);
		$this->db->insert('tbl_log', $data);
	}
}