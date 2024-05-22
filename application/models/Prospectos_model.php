<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Prospectos_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('vacantes_model');
	}

	public function numero_prospectos($uid_vacante) {
		//$vacante=$this->vacantes_model->select_vacante($uid_vacante);
		//return $this->db->get_where('tbl_prospectos',array('estatus' => 1,'tbl_vacantes_idtbl_vacantes' => $vacante['idtbl_vacantes']))->num_rows();
	}

	public function prospectos($uid_vacante) {
		$vacante=$this->vacantes_model->select_vacante($uid_vacante);
		$data['disponible']= $vacante['numero_vacantes'];
		$data['requisicion']=$this->usuarios_model->get_requisicion($vacante['tbl_requisiciones_idtbl_requisiciones'],'vacante');
		//$this->db->order_by('fecha_postulacion', 'desc');
		//$data['prospectos']=$this->db->get_where('tbl_prospectos',array('estatus' => 1,'tbl_vacantes_idtbl_vacantes' => $vacante['idtbl_vacantes']))->result_array();
		return $data;
	}

	public function nuevos_prospectos($uid_vacante) {
		$vacante=$this->vacantes_model->select_vacante($uid_vacante);
		$this->db->where('tbl_vacantes_idtbl_vacantes', $vacante['idtbl_vacantes']);
		$this->db->where('fecha_postulacion BETWEEN "'.Date('Y-m').'-01 00:00:00.000000" and "'. date('Y-m-d').' 23:59:59.000000"');
		return $this->db->get('tbl_prospectos')->num_rows();
	}

	public function nuevo_prospecto($uid_vacante) {
		$this->db->trans_start();
		$vacante=$this->vacantes_model->select_vacante($uid_vacante);
		$insert = array(
			'nombre' => $this->input->post('nombres'),
			'apellidos' => $this->input->post('apellidos'),
			'email' => $this->input->post('email'),
			'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
			'telefono' => $this->input->post('telefono'),
			'direccion' => $this->input->post('direccion'),
			'escolaridad' => $this->input->post('escolaridad'),
			'especialidad' => $this->input->post('especialidad'),
			'fecha_entrevista' => $this->input->post('fecha_entrevista'),
			'fecha_postulacion' => date('Y-m-d H:i:s'),
			'uid' => uniqid(),
			'estatus' => 1,
			'aprobado' => 0,
			'tbl_vacantes_idtbl_vacantes' => $vacante['idtbl_vacantes'],
			'tbl_municipio_idtbl_municipio' => $this->input->post('municipio')
		);
		$this->db->insert('tbl_prospectos', $insert);
		$this->db->trans_complete();
		if ($this->db->trans_status() == FALSE) {
			$data['check']=FALSE;
		} else {
			$data['check']=TRUE;
			$this->db->select('tbl_perfiles.perfil, tbl_departamentos.departamento');
			$this->db->join('tbl_departamentos', 'tbl_perfiles.tbl_departamentos_idtbl_departamentos = tbl_departamentos.idtbl_departamentos','inner');
			$this->db->where('tbl_perfiles.idtbl_perfiles', $vacante['tbl_perfiles_idtbl_perfiles']);
			$data['perfil']=$this->db->get('tbl_perfiles')->row_array();
		}
		return $data;
	}

	public function num_select_prospectovacante($uids) {
		$uid=preg_split("/-/",$uids,2);
		$result=0;
		if (count($uid) == 2 || $this->vacantes_model->num_select_vacante($uid[0]) == 1) {
			$vacante=$this->vacantes_model->select_vacante($uid[0]);
			$result=$this->db->get_where('tbl_prospectos',array('tbl_vacantes_idtbl_vacantes' => $vacante['idtbl_vacantes'], 'uid' => $uid[1]))->num_rows();
			$result= $result+$this->vacantes_model->num_select_vacante($uid[0]);
		}
		return $result;
	}

	public function select_prospectovacante($uids) {
		$uid=preg_split("/-/",$uids,2);
		if (count($uid) == 2 || $this->vacantes_model->num_select_vacante($uid[0]) == 1) {
			$vacante=$this->vacantes_model->select_vacante($uid[0]);
			$prospecto=$data['prospecto']=$this->db->get_where('tbl_prospectos',array('tbl_vacantes_idtbl_vacantes' => $vacante['idtbl_vacantes'], 'uid' => $uid[1]))->row_array();
			$this->db->select('tbl_municipio.nombre_municipio AS municipio, tbl_entidad.nombre_entidad AS estado, tbl_municipio.tbl_entidad_idtbl_entidad AS entidad');
			$this->db->join('tbl_entidad', 'tbl_municipio.tbl_entidad_idtbl_entidad = tbl_entidad.idtbl_entidad','inner');
			$this->db->where('tbl_municipio.idtbl_municipio', $prospecto['tbl_municipio_idtbl_municipio']);
			$data['direccion']=$this->db->get('tbl_municipio')->row_array();
			$vacante=$this->vacantes_model->select_vacante($uid[0]);
			$perfil=$this->db->get_where('tbl_perfiles', array('idtbl_perfiles' => $vacante['tbl_perfiles_idtbl_perfiles']))->row_array();
			$data['idPerfil']=$perfil['idtbl_perfiles']; $data['idDepa']=$perfil['tbl_departamentos_idtbl_departamentos'];
			return $data;
		}
	}

	public function num_select_resultados($uids) {
		$uid=preg_split("/-/",$uids,2);
		if (count($uid) == 2 && $this->num_select_prospectovacante($uids) == 2) {
			$prospecto=$this->db->get_where('tbl_prospectos', array('uid' => $uid[1]))->row_array();
			return $this->db->get_where('tbl_resultados', array('tbl_prospectos_idtbl_prospectos' => $prospecto['idtbl_prospectos']))->num_rows();
		}
	}

	public function select_resultados($uids) {
		$uid=preg_split("/-/",$uids,2);
		if (count($uid) == 2 && $this->num_select_prospectovacante($uids) == 2) {
			$prospecto=$this->db->get_where('tbl_prospectos', array('uid' => $uid[1]))->row_array();
			return $this->db->get_where('tbl_resultados', array('tbl_prospectos_idtbl_prospectos' => $prospecto['idtbl_prospectos']))->row_array();
		}
	}

	public function editar_prospecto($uids) {
		$uid=preg_split("/-/",$uids,2);
		if (count($uid) == 2 && $this->num_select_prospectovacante($uids) == 2) {
			$prospecto=$this->db->get_where('tbl_prospectos', array('uid' => $uid[1]))->row_array();
			if ($this->input->post('opcion') != '' && $this->input->post('puntaje') != '') {
				$anio_nacimiento=date("Y",strtotime($prospecto['fecha_nacimiento']));
				$anio_actual=date("Y");
				$edad=$anio_actual - $anio_nacimiento;
				$resultado=$this->input->post('puntaje') + number_format($edad, 2, '.', '') + $this->input->post('opcion');
			} else {
				$pruebas=$this->select_resultados($uids);
				$resultado=$pruebas['wonderlic'];
			}
			$update_prospecto = array('fecha_entrevista' => $this->input->post('fecha_entrevista'));
			$update_resultado = array(
				'machover' => $this->input->post('matchover'),
				'hs_v_teorico' => $this->input->post('teorico'),
				'hs_v_economico' => $this->input->post('economico'),
				'hs_v_artistico' => $this->input->post('artisitico'),
				'hs_v_social' => $this->input->post('social'),
				'hs_v_politico' => $this->input->post('politico'),
				'hs_v_regulatorio' => $this->input->post('regulatorio'),
				'hs_i_analisis' => $this->input->post('analisis'),
				'hs_i_vision' => $this->input->post('vision'),
				'hs_i_intuicion' => $this->input->post('intuicion'),
				'hs_i_logica' => $this->input->post('logica'),
				'wonderlic' => number_format($resultado, 2, '.', ''),
				'claaver_d' => $this->input->post('d'),
				'claaver_i' => $this->input->post('i'),
				'claaver_s' => $this->input->post('s'),
				'claaver_c' => $this->input->post('c'),
				'observaciones' => $this->input->post('observaciones'),
				'moss_percentil' => $this->input->post('percentil'),
				'moss_rango' => $this->input->post('rango'),
				'moss_hs' => $this->input->post('supervision'),
				'moss_cdrh' => $this->input->post('humanas'),
				'moss_cepi' => $this->input->post('pinterpersonales'),
				'moss_heri' => $this->input->post('rinterpersonales'),
				'moss_sctri' => $this->input->post('sentido'),
				'tbl_prospectos_idtbl_prospectos' => $prospecto['idtbl_prospectos']
			);
			if ($this->num_select_resultados($uids) == 0) {
				$this->db->insert('tbl_resultados', $update_resultado);
			} else {
				$this->db->update('tbl_resultados', $update_resultado, array('tbl_prospectos_idtbl_prospectos' => $prospecto['idtbl_prospectos']));
			}
			return $this->db->update('tbl_prospectos', $update_prospecto,array('idtbl_prospectos' => $prospecto['idtbl_prospectos']));
		}
	}
	public function cambir_status($uid) {
		$prospecto=$this->db->get_where('tbl_prospectos', array('uid' => $uid))->row_array();
		$update_prospecto = array('estatus' => 0);
		$this->db->update('tbl_prospectos', $update_prospecto,array('uid' => $uid));
		$vacante=$this->db->get_where('tbl_vacantes', array('idtbl_vacantes' => $prospecto['idtbl_prospectos']))->row_array();
		$update_vacante = array('numero_vacantes' => ($vacante['numero_vacantes'] -1) );
		$this->db->update('tbl_vacantes', $update_vacante,array('idtbl_vacantes' => $vacante['idtbl_vacantes']));
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
		        'departamento' => 10
		);
		$this->db->insert('tbl_log', $data);
	}
}