<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Curso_model extends CI_Model {
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

	public function nuevoCurso() {
        $this->db->trans_begin();
       
        $data = array(
            'nombre_curso' => $this->input->post('nombre_curso')
        );
        //Se registra la asistencia
        $this->db->insert('tbl_cursos', $data);
		$id_curso = $this->db->insert_id();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

    public function editarCurso() {
        $this->db->trans_begin();
       
        $data = array(
            'nombre_curso' => $this->input->post('nombre_cursoEdit')
        );
        //Se registra la asistencia
        $this->db->where('idtbl_cursos', $this->input->post('id_cursoEdit'));
        $this->db->update('tbl_cursos', $data);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

    public function nuevoInstructor() {
        $this->db->trans_begin();
       
        if($this->input->post('nombre_instructor') != ''){
            $data = array(
                'nombres' => $this->input->post('nombre_instructor'),
                'tipo' => $this->input->post('tipo')
            );
        }else{
            $data = array(
                'tbl_usuarios_idtbl_usuarios' => $this->input->post('usuario'),
                'tipo' => $this->input->post('tipo')
            );
        }
        //Se registra la asistencia
        $this->db->insert('tbl_instructores', $data);
		$id_instructor = $this->db->insert_id();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return $id_instructor;
		}
	}

    public function nuevoCertificado() {
        $this->db->trans_begin();
       
        $data = array(
            'nombre' => $this->input->post('nombre_certificado'),
            'ocupacion_especifica' => $this->input->post('ocupacion_especifica'),
            'area_tematica' => $this->input->post('area_tematica'),
            'nomenclatura' => $this->input->post('nomenclatura')
        );

        //Se registra la asistencia
        $this->db->insert('tbl_certificados', $data);
		$id_instructor = $this->db->insert_id();

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return $id_instructor;
		}
	}

    public function verificarCurso(){

        $curso = $this->input->post('nombre_curso');

        $this->db->query("SELECT * FROM tbl_cursos WHERE nombre_curso='$curso'");
        $this->db->from("tbl_cursos");
		$this->db->where("nombre_curso", $curso);
        $query = $this->db->get();

        return count($query->result()) > 0 ? true : false;
    }

    public function verificarCertificado(){

        $certificado = $this->input->post('nombre_certificado');

        //$this->db->query("SELECT * FROM tbl_certificados WHERE nombre='$certificado'");
        $this->db->from("tbl_certificados");
		$this->db->where("nombre", $certificado);
        $query = $this->db->get();

        return count($query->result()) > 0 ? true : false;
    }

	public function getCursos($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if ($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}

		$query = $this->db->query("SELECT tbl_cursos.* FROM tbl_cursos WHERE (tbl_cursos.nombre_curso LIKE '%$buscar%') ORDER BY tbl_cursos.idtbl_cursos DESC " . $limit);
		
		return $query->result();
	}

    public function getInstructores($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if ($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}

		$query = $this->db->query("SELECT tbl_instructores.*, tbl_usuarios.nombres AS nombre_usuario, tbl_usuarios.apellido_paterno, tbl_usuarios.apellido_materno FROM tbl_instructores LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_instructores.tbl_usuarios_idtbl_usuarios WHERE (tbl_instructores.nombres LIKE '%$buscar%' OR tbl_usuarios.nombres LIKE '%$buscar%') ORDER BY tbl_instructores.idtbl_instructores DESC " . $limit);
		
		return $query->result();
	}

    public function guardar_certificado($parameters = NULL)
    {
        $id_certificado = $this->input->post('id');
        $query = $this->db->query("SELECT MAX(iddtl_certificados_personal) iddtl_certificado_personal FROM dtl_certificados_personal WHERE tbl_certificados_idtbl_certificados = $id_certificado");
        $last_id = $query->result()[0]->iddtl_certificado_personal;
        $consecutive = 1;
        if($last_id != NULL){
            $query = $this->db->query("SELECT folio FROM dtl_certificados_personal WHERE dtl_certificados_personal.iddtl_certificados_personal = $last_id");
            $folio = $query->result()[0]->folio;
            $consecutive  = intval(substr($folio, 2, strlen($folio))) + 1;
        }
        $query = $this->db->query("SELECT nomenclatura FROM tbl_certificados WHERE idtbl_certificados = $id_certificado");
        $nomenclatura = $query->result()[0]->nomenclatura;
        $data = NULL;
        if($parameters == NULL){
            foreach($this->input->post('personal_curso') AS $key => $value){
                $uid = uniqid();
                $data = array(
                'tbl_cursos_idtbl_cursos' => $this->input->post('id_curso'),
                'tbl_certificados_idtbl_certificados' => $this->input->post('id'),
                'tbl_usuarios_idtbl_usuarios' => $value,
                'uid' => $uid,
                'fecha_inicio' => $this->input->post('fecha_inicio'),
                'fecha_termino' => $this->input->post('fecha_termino'),
                'duracion' => $this->input->post('duracion'),
                'tutor' => $this->input->post('tutor'),
                'patron_representante' => $this->input->post('patron_representante'),
                'representante_trabajadores' => $this->input->post('representante_trabajadores'),
                'folio' => $nomenclatura . $consecutive,
                'tbl_modalidad_idtbl_modalidad' => $this->input->post('modalidad'),
                'tbl_tipo_agente_idtbl_tipo_agente' => $this->input->post('tipo_agente')
                );
                $this->db->insert('dtl_certificados_personal', $data);
            }
        }else{
            $parameters['uid'] = $uid;
            $data = $parameters;
        }
        return true;
    }

	//Trae la última asistencia del usuario
	public function ultima_asistencia()
    {                
			$usuario = $this->session->userdata('id');
            $query = $this->db->query("SELECT idtbl_asistencias, fecha_hora FROM tbl_asistencias WHERE tbl_users_idtbl_users = $usuario AND tipo = 'entrada' ORDER BY idtbl_asistencias DESC LIMIT 1");
        
        return $query->result();
    }

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