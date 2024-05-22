<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Proyectos_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}


	//Muestra literal todos los proyectos
	public function mostrar_proyectos($buscar='', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
    	if($inicio !== false && $cantidadRegistro !== false) {
      		$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
    	}
		$query = $this->db->query("SELECT tbl_proyectos.*, tbl_clientes.razon_social, tbl_clientes.uid as uid_cliente FROM tbl_proyectos LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes WHERE tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_proyectos.nombre_proyecto LIKE '%$buscar%' OR tbl_proyectos.direccion LIKE '%$buscar%' ORDER BY tbl_clientes_idtbl_clientes " . $limit);
		return $query->result();
	}

	//Muestra los proyectos activos
	public function todos_los_proyectos($buscar='', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
    	if($inicio !== false && $cantidadRegistro !== false) {
      		$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
    	}
		$query = $this->db->query("SELECT tbl_proyectos.*, tbl_clientes.razon_social, tbl_clientes.uid as uid_cliente FROM tbl_proyectos LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes WHERE tbl_proyectos.estatus = 1 AND (tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_proyectos.nombre_proyecto LIKE '%$buscar%' OR tbl_proyectos.direccion LIKE '%$buscar%') ORDER BY tbl_clientes_idtbl_clientes " . $limit);
		return $query->result();
	}

	public function proyectos_cliente($id) {
		$query = $this->db->query("
		SELECT tbl_proyectos.*, tbl_clientes.razon_social, tbl_clientes.uid as uid_cliente FROM tbl_proyectos LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes WHERE tbl_proyectos.tbl_clientes_idtbl_clientes = '$id'");
		return $query->result();
	}

	public function nuevo_proyecto($uid) {
		$this->db->trans_begin();
		//$data = array(
		//        'almacen' => ucwords($this->input->post('proyecto')),
		//        'uid' => $uid,
		//        'ubicacion' => ''
		//   	);			
		//$this->db->insert('tbl_almacenes', $data);
		$data = array(
	        'nombre_proyecto' => ucwords($this->input->post('proyecto')),
	        'numero_proyecto' => $this->input->post('numero'),
	        'tbl_clientes_idtbl_clientes' => $this->input->post('cliente'),
	        'direccion' => $this->input->post('ubicacion'),
	        'fecha_creacion'=>date("Y-m-d H:i:s"),
	        'uid' => $uid
		);
		$this->db->insert('tbl_proyectos', $data);
		if ($this->db->trans_status() === FALSE) {
	        $this->db->trans_rollback();
	        return false;
		}
		else {
	        $this->db->trans_commit();
	        return true;
		}
	}

	private function id_proyecto($uid) {
		$query = $this->db->query("
			SELECT idtbl_proyectos
			FROM tbl_proyectos 
			WHERE tbl_proyectos.uid='$uid'");
		return $query->result()[0]->idtbl_proyectos;
	}

	public function detalle_proyecto($uid) {
		$this->db->select('tbl_proyectos.*');
		$this->db->select('tbl_clientes.razon_social');
		$this->db->select('tbl_clientes.uid as uid_cliente');
		//$this->db->select('tbl_coordinador.idtbl_usuarios as idtbl_coordinador');
		//$this->db->select('CONCAT(tbl_coordinador.nombres," ",tbl_coordinador.apellido_materno," ",tbl_coordinador.apellido_paterno) as coordinador');
		//$this->db->select('tbl_responsable.idtbl_usuarios as idtbl_responsable');
		//$this->db->select('CONCAT(tbl_responsable.nombres," ",tbl_responsable.apellido_materno," ",tbl_responsable.apellido_paterno) as responsable');
		$this->db->from('tbl_proyectos');
		$this->db->where('tbl_proyectos.uid',$uid);
		$this->db->join('tbl_clientes','tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes','left');
		//$this->db->join('tbl_usuarios as tbl_coordinador','tbl_proyectos.coordinador=tbl_coordinador.idtbl_usuarios','left');
		//$this->db->join('tbl_usuarios as tbl_responsable','tbl_proyectos.responsable=tbl_responsable.idtbl_usuarios','left');
		$query = $this->db->get();
		$query_detalle = $this->db->query("SELECT * FROM tbl_segmentos_proyecto WHERE tbl_proyectos_idtbl_proyectos=".$query->result()[0]->idtbl_proyectos);
		$query->result()[0]->segmentos=$query_detalle->result();
		return $query->result()[0];
	}

	public function actualizar_proyecto() {
		$this->db->trans_begin();
		$this->db->set('nombre_proyecto', $this->input->post('nombre_proyecto'));
		$this->db->set('numero_proyecto', $this->input->post('numero_proyecto'));
		$this->db->set('fecha_inicio', $this->input->post('fecha_inicio'));
		$this->db->set('fecha_termino', $this->input->post('fecha_termino'));
		$this->db->set('direccion', $this->input->post('direccion'));
		//$this->db->set('responsable', $this->input->post('responsable'));
		//$this->db->set('coordinador', $this->input->post('coordinador'));
		$this->db->where('uid', $this->input->post('uid'));
		$this->db->update('tbl_proyectos');
		$id_proyecto = $this->id_proyecto( $this->input->post('uid') );
        foreach ($this->input->post('segmento') as $key => $value) {
            if($value!=''){
                $data = array(
                    'segmento' => $value,
                    'direccion' => $this->input->post('ubicacion')[$key],
                    'tbl_proyectos_idtbl_proyectos' => $id_proyecto,
                );
                $this->db->insert('tbl_segmentos_proyecto', $data);
            }
        }
		if(isset($_POST['segmentoanterior'])){
			foreach($this->input->post('segmentoanterior') AS $key => $value){
				if($value != ''){
					$data = array(
						'segmento' => $value,
						'direccion' => $this->input->post('ubicacionanterior')[$key]
					);
					$this->db->where('idtbl_segmentos_proyecto', $this->input->post('idsegmento')[$key]);
					$this->db->update('tbl_segmentos_proyecto', $data);
				}
			}
		}

		if ($this->db->trans_status() === FALSE) {
	        $this->db->trans_rollback();
	        return false;
		}
		else {
	        $this->db->trans_commit();
	        return true;
		}
	}

	/*public function almacen_proyecto($uid) {
		$this->db->select('tbl_almacenes_idtbl_almacenes');
		$this->db->from('tbl_proyectos');
		$this->db->where('tbl_proyectos.uid',$uid);		

		$query = $this->db->get();
		
		if($query->num_rows()>0)
			return $query->result()[0]->tbl_almacenes_idtbl_almacenes;
		else
			return false;
	}*/

	public function nombre_proyecto_uid_almacen($uid) {
		$this->db->select('tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_almacenes.idtbl_almacenes');
		$this->db->from('tbl_proyectos');
		$this->db->where('tbl_almacenes.uid',$uid);
		$this->db->join('tbl_almacenes','tbl_proyectos.tbl_almacenes_idtbl_almacenes=tbl_almacenes.idtbl_almacenes','left');
		$query = $this->db->get();
		return $query->result()[0];
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
		        'departamento' => 9
		);
		$this->db->insert('tbl_log', $data);
	}

	public function getProyectoByUid($uid_proyecto) {
		$this->db->select('tbl_proyectos.idtbl_proyectos');
		$this->db->select('tbl_proyectos.nombre_proyecto');
		$this->db->select('tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_proyectos.idtbl_proyectos');
		$this->db->select('tbl_proyectos.direccion');
		$this->db->from('tbl_proyectos');
		$this->db->where('tbl_proyectos.uid', $uid_proyecto);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result()[0];
		} else{
			return false;
		}
	}

	public function getProyectoAlmacen($uid){
		$this->db->select('idtbl_proyectos, tbl_clientes_idtbl_clientes');
		$this->db->from('tbl_proyectos');
		$this->db->join('tbl_almacenes', 'tbl_almacenes.tbl_proyectos_idtbl_proyectos = tbl_proyectos.idtbl_proyectos');
		$this->db->where('tbl_almacenes.uid', $uid);
		$query = $this->db->get();
		return $query->result();
	}

	//Esta funcion si muestra todos los proyectos
	public function proyectos() {
		$query = $this->db->query("SELECT * FROM tbl_proyectos");
		return $query->result();
	}

	public function getSegmentosByProyecto($uid) {
		if($uid == '61a8da33bb8e5'){
			$query = $this->db->query("SELECT tbl_segmentos_proyecto.idtbl_segmentos_proyecto,tbl_segmentos_proyecto.segmento FROM tbl_segmentos_proyecto WHERE tbl_segmentos_proyecto.tbl_proyectos_idtbl_proyectos = 204 OR tbl_segmentos_proyecto.tbl_proyectos_idtbl_proyectos = 205 OR tbl_segmentos_proyecto.tbl_proyectos_idtbl_proyectos = 206 OR tbl_segmentos_proyecto.tbl_proyectos_idtbl_proyectos = 207");
		}else{
            $query = $this->db->query("SELECT tbl_segmentos_proyecto.idtbl_segmentos_proyecto,tbl_segmentos_proyecto.segmento FROM tbl_segmentos_proyecto INNER JOIN tbl_almacenes ON tbl_almacenes.tbl_proyectos_idtbl_proyectos = tbl_segmentos_proyecto.tbl_proyectos_idtbl_proyectos WHERE tbl_almacenes.uid = '$uid' ");
        }
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			$query = $this->db->query("SELECT tbl_proyectos.direccion FROM tbl_proyectos INNER JOIN tbl_almacenes ON tbl_almacenes.tbl_proyectos_idtbl_proyectos = tbl_proyectos.idtbl_proyectos WHERE tbl_almacenes.uid = '$uid' ");
			return $query->result();
		}
	}

	//Activa el proyecto
	public function activar_proyecto(){
		$data = array(
			'estatus' => 1
		);
		$this->db->set($data);
		$this->db->where('uid', $this->input->post('uid'));
		$result = $this->db->update('tbl_proyectos');
		return  $result;

	}

	//Desactiva el proyecto
	public function desactivar_proyecto(){		
		$data = array(
			'estatus' => 0
		);
		$this->db->set($data);
		$this->db->where('uid', $this->input->post('uid'));
		$result = $this->db->update('tbl_proyectos');
		return  $result;

	}
}