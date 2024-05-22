<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Soporte_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Insert de checklist tickets
    public function guardarTicket($parametros)
    {
        $this->db->insert('tbl_tickets', $parametros);
    }

    public function mostrarTickets($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $user = $this->session->userdata('id');
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        if ($this->session->userdata('tipo') == 20 || $this->session->userdata('id') == 3 || $this->session->userdata('id') == 16) {
            $query = $this->db->query("SELECT tbl_tickets.*, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw WHERE tbl_tickets.tipo_ticket = 'dw' AND (tbl_tickets.uid LIKE '%$buscar%' OR tbl_tickets.tipo LIKE '%$buscar%' OR tbl_tickets.prioridad LIKE '%$buscar%') ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        } else {
            $query = $this->db->query("SELECT tbl_tickets.*, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw WHERE tbl_tickets.tipo_ticket = 'dw' AND tbl_users_idtbl_users = $user AND (tbl_tickets.uid LIKE '%$buscar%' OR tbl_tickets.tipo LIKE '%$buscar%' OR tbl_tickets.prioridad LIKE '%$buscar%') ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        }
        return $query->result();
    }

    public function mostrarTicketsIngenieria($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $user = $this->session->userdata('id');
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        //if ($this->session->userdata('tipo') == 20 || $this->session->userdata('id') == 3 || $this->session->userdata('id') == 16) {
            $query = $this->db->query("SELECT tbl_tickets.*, tus.nombre AS autor, tudw.idtbl_users AS id_coordinador, tudw.nombre AS nombre_desarrollador, tbl_proyectos.numero_proyecto, tbl_clientes.nombre_comercial, tbl_segmentos_proyecto.segmento, tbl_areas.area, tu_proyectista.idtbl_users AS id_proyectista, tu_proyectista.nombre AS nombre_proyectista, tu_supervisor.idtbl_users AS id_supervisor, tu_supervisor.nombre AS nombre_supervisor FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tus.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_perfiles_idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_departamentos.idtbl_departamentos = tbl_perfiles.tbl_departamentos_idtbl_departamentos LEFT JOIN tbl_areas ON tbl_areas.idtbl_areas = tbl_departamentos.tbl_areas_idtbl_areas LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_tickets.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_clientes ON tbl_clientes.idtbl_clientes = tbl_proyectos.tbl_clientes_idtbl_clientes LEFT JOIN tbl_segmentos_proyecto ON tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_tickets.tbl_segmentos_proyecto_idtbl_segmentos_proyecto LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw LEFT JOIN tbl_users tu_proyectista ON tu_proyectista.idtbl_users = tbl_tickets.tbl_user_idtbl_users_proyectista LEFT JOIN tbl_users tu_supervisor ON tu_supervisor.idtbl_users = tbl_tickets.tbl_users_idtbl_users_supervisor WHERE tbl_tickets.tipo_ticket = 'ingenieria' AND (tbl_tickets.uid LIKE '%$buscar%' OR tus.nombre LIKE '%$buscar%') GROUP BY tbl_tickets.idtbl_tickets ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        //} else {
        //    $query = $this->db->query("SELECT tbl_tickets.*, tus.nombre AS autor, tus.idtbl_users AS id_coordinador, tudw.nombre AS nombre_desarrollador, tbl_proyectos.numero_proyecto, tbl_clientes.nombre_comercial, tbl_segmentos_proyecto.segmento, tbl_areas.area FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tus.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_perfiles_idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_departamentos.idtbl_departamentos = tbl_perfiles.tbl_departamentos_idtbl_departamentos LEFT JOIN tbl_areas ON tbl_areas.idtbl_areas = tbl_departamentos.tbl_areas_idtbl_areas LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_tickets.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_clientes ON tbl_clientes.idtbl_clientes = tbl_proyectos.tbl_clientes_idtbl_clientes LEFT JOIN tbl_segmentos_proyecto ON tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_tickets.tbl_segmentos_proyecto_idtbl_segmentos_proyecto LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw WHERE tbl_tickets.tipo_ticket = 'ingenieria' AND tbl_users_idtbl_users = $user AND (tbl_tickets.uid LIKE '%$buscar%' OR tbl_tickets.tipo LIKE '%$buscar%' OR tbl_tickets.prioridad LIKE '%$buscar%') GROUP BY tbl_tickets.idtbl_tickets ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        //}
        return $query->result();
    }

    //Función para total tickets
	public function totalTickets($estatus){
		if($estatus == ''){
			$query = $this->db->query("SELECT estatus, COUNT(idtbl_tickets) AS total FROM tbl_tickets WHERE tipo_ticket = 'ingenieria' GROUP BY estatus");
		}else{
			$query = $this->db->query("SELECT CC.categoria, IF(TC.tipo_moneda='d',SUM((TC.precio * $dolar)*DA.existencias),SUM(TC.precio * DA.existencias)) AS precio FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON DA.tbl_catalogo_idtbl_catalogo = TC.idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias WHERE (CC.idctl_categorias = 16 OR CC.idctl_categorias = 2 OR CC.idctl_categorias = 10) AND (DA.estatus = '$estatus') AND tbl_almacenes_idtbl_almacenes = 2 AND TC.tipo = 2 GROUP BY CC.idctl_categorias");
		}
        return $query->result();
    }

    public function changeStatus() {
		$data = array(
                'estatus' => $this->input->post('estatus')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		$result=$this->db->update('tbl_tickets');
   		return  $result;
	}

    public function changeStatusSeguimiento() {
		$data = array(
                'estatus_seguimiento' => $this->input->post('estatus')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		$result=$this->db->update('tbl_tickets');
   		return  $result;
	}

    public function changeStatusSupervisor() {
		$data = array(
                'estatus_supervisor' => $this->input->post('estatus')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		$result=$this->db->update('tbl_tickets');
   		return  $result;
	}

    public function changeProyectista() {
		$data = array(
                'tbl_user_idtbl_users_proyectista' => $this->input->post('proyectista')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		$result=$this->db->update('tbl_tickets');
   		return  $result;
	}

    public function changeSupervisor() {
		$data = array(
                'tbl_users_idtbl_users_supervisor' => $this->input->post('supervisor')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		$result=$this->db->update('tbl_tickets');
   		return  $result;
	}

    public function changeFechaCompromiso() {
		$data = array(
                'fecha_compromiso' => $this->input->post('fecha_compromiso')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		$result=$this->db->update('tbl_tickets');
   		return  $result;
	}

    public function mostrarTicketsSistemas($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $user = $this->session->userdata('id');
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        if ($this->session->userdata('tipo') == 2 || $this->session->userdata('id') == 3 || $this->session->userdata('id') == 16) {
            $query = $this->db->query("SELECT tbl_tickets.*, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw WHERE tbl_tickets.tipo_ticket = 'ti' AND (tbl_tickets.uid LIKE '%$buscar%' OR tbl_tickets.tipo LIKE '%$buscar%' OR tbl_tickets.prioridad LIKE '%$buscar%') ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        } else {
            $query = $this->db->query("SELECT tbl_tickets.*, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw WHERE tbl_tickets.tipo_ticket = 'ti' AND tbl_users_idtbl_users = $user AND (tbl_tickets.uid LIKE '%$buscar%' OR tbl_tickets.tipo LIKE '%$buscar%' OR tbl_tickets.prioridad LIKE '%$buscar%') ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        }
        return $query->result();
    }

    public function mostrarTicketsCV($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $user = $this->session->userdata('id');
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        if ($this->session->userdata('tipo') == 3 || $this->session->userdata('id') == 3 || $this->session->userdata('id') == 16) {
            $query = $this->db->query("SELECT tbl_tickets.*, dtl_almacen.numero_interno, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw LEFT JOIN dtl_almacen ON tbl_tickets.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen WHERE tbl_tickets.tipo_ticket = 'cv' AND (tbl_tickets.uid LIKE '%$buscar%' OR tbl_tickets.tipo LIKE '%$buscar%' OR tbl_tickets.prioridad LIKE '%$buscar%') ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        } else {
            $query = $this->db->query("SELECT tbl_tickets.*, dtl_almacen.numero_interno, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw LEFT JOIN dtl_almacen ON tbl_tickets.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen WHERE tbl_tickets.tipo_ticket = 'cv' AND tbl_users_idtbl_users = $user AND (tbl_tickets.uid LIKE '%$buscar%' OR tbl_tickets.tipo LIKE '%$buscar%' OR tbl_tickets.prioridad LIKE '%$buscar%') ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        }
        return $query->result();
    }

    public function mostrarTicketsMantenimiento($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $user = $this->session->userdata('id');
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        if ($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3 || $this->session->userdata('id') == 16) {
            $query = $this->db->query("SELECT tbl_tickets.*, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador, tbl_usuarios.idtbl_usuarios, tbl_usuarios.nombres AS nomb, tbl_usuarios.apellido_paterno AS paterno, tbl_usuarios.apellido_materno AS materno FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw LEFT JOIN tbl_usuarios ON tbl_tickets.tbl_usuarios_idtbl_usuariosman = tbl_usuarios.idtbl_usuarios WHERE tbl_tickets.tipo_ticket = 'man' AND (tbl_tickets.uid LIKE '%$buscar%' OR tbl_tickets.tipo LIKE '%$buscar%' OR tbl_tickets.prioridad LIKE '%$buscar%') ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        } else {
            $query = $this->db->query("SELECT tbl_tickets.*, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw WHERE tbl_tickets.tipo_ticket = 'man' AND tbl_users_idtbl_users = $user AND (tbl_tickets.uid LIKE '%$buscar%' OR tbl_tickets.tipo LIKE '%$buscar%' OR tbl_tickets.prioridad LIKE '%$buscar%') ORDER BY tbl_tickets.idtbl_tickets DESC " . $limit);
        }
        return $query->result();
    }

    public function movimientos_ticket($uid) {
		$this->db->select('*');
		
		//$this->db->select('tbl_checklist.*');
		$this->db->from('tbl_log_tickets');
		$this->db->join('tbl_users', 'tbl_users.idtbl_users = tbl_log_tickets.tbl_users_idtbl_users', 'left');
		$this->db->where('tbl_log_tickets.uid_ticket', $uid);
		
		$this->db->order_by('tbl_log_tickets.fecha', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

    public function mostrarPersonal(){
        $query = $this->db->query("SELECT tbl_usuarios.idtbl_usuarios, tbl_users.idtbl_users, tbl_usuarios.nombres, tbl_usuarios.apellido_paterno, tbl_usuarios.apellido_materno, tbl_users.nombre, tbl_users.username, tbl_users.tipo, tbl_users.username, tbl_users.estatus FROM tbl_usuarios LEFT JOIN tbl_users ON tbl_usuarios.idtbl_usuarios=tbl_users.tbl_usuarios_idtbl_usuarios WHERE tbl_usuarios.estatus=1 AND tbl_usuarios.tipo='interno'");
        return $query->result();
    }

    //Función para traer detalle de un ticket por uid
    public function detalle_ticket($uid)
    {
        $query = $this->db->query("SELECT tbl_tickets.*, dtl_almacen.numero_interno, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador, tbl_tickets.tbl_usuarios_idtbl_usuariosman AS lau, tbl_usuarios.idtbl_usuarios, tbl_usuarios.nombres AS nom, tbl_usuarios.apellido_paterno AS apat, tbl_usuarios.apellido_materno AS amat FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw LEFT JOIN dtl_almacen ON tbl_tickets.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen LEFT JOIN tbl_usuarios ON tbl_tickets.tbl_usuarios_idtbl_usuariosman = tbl_usuarios.idtbl_usuarios WHERE tbl_tickets.uid = '$uid' ");
        
        return $query->result();
    }

    //Función para traer todos los ecos
    public function ecos()
    {
        $query = $this->db->query("SELECT dtl_almacen.iddtl_almacen, dtl_almacen.numero_interno FROM dtl_almacen WHERE dtl_almacen.numero_interno like '%ECO%' AND dtl_almacen.numero_interno NOT LIKE '%ECO P%'");
        
        return $query->result();
    }

    //Función para aprobar tickets
    public function aprobar_ticket($proceso, $imagenes)    
    {     
        if ($proceso == 'finalizar') {                           
            if(isset($_POST['observaciones_usuario'])){
                $data = array(
                    'estatus' => 'R',
                    'observaciones_usuario' => $this->input->post('observaciones_usuario')                     
                    );            
            }else{
                $observaciones_usuario = NULL;
                $data = array(
                    'estatus' => 'R',
                    'imagenes_firmas_dw' => json_encode($imagenes),
                    'observaciones' => $this->input->post('observaciones'),
                    'fecha_finalizacion' => date('Y-m-d H:i:s'),
                    'observaciones_usuario' => $observaciones_usuario                    
                    );
            }
            
        }elseif($proceso == 'mantenimiento'){               
                $data = array(
                    'estatus' => 'MF',
                    'imagenes_firmas_dw' => json_encode($imagenes),
                    'observaciones' => $this->input->post('observaciones'),
                    'fecha_finalizacion' => date('Y-m-d H:i:s')                        
                );                              
        }
        elseif($proceso == 'terminado'){               
            $data = array(
                'estatus' => 'R',
                'imagenes_firmas_dw' => json_encode($imagenes),
                'observaciones' => $this->input->post('observaciones'),
                'fecha_finalizacion' => date('Y-m-d H:i:s')                        
            );                              
    }
        
        else {
            if ($this->session->userdata('tipo') == 2) {
                $data = array(
                    'estatus' => 'TI',
                    'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                    'fecha_aprobacion_dw' => date('Y-m-d H:i:s'),
                    'tiempo_estimado' => $this->input->post('tiempo_estimado')
                );
            } elseif($this->session->userdata('tipo') == 3) {
                $data = array(
                    'estatus' => 'CV',
                    'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                    'fecha_aprobacion_dw' => date('Y-m-d H:i:s')
                );
            } elseif($this->session->userdata('tipo') == 7) {
                $data = array(
                    'estatus' => 'M',
                    'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                    'fecha_aprobacion_dw' => date('Y-m-d H:i:s')                    
                );                
            }  else {
                $data = array(
                    'estatus' => 'DW',
                    'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                    'fecha_aprobacion_dw' => date('Y-m-d H:i:s')
                );
            }        
}
        $this->db->set($data);
        $this->db->where('uid', $this->input->post('uid'));
        $result = $this->db->update('tbl_tickets');

        return  $result;
    }
    
    public function asignar_ticket() {    

    // Verificar si la fecha de aprobación ya está establecida
    
        $data = array(
            'tbl_users_idtbl_users_dw' => $this->input->post('desarrollador'),
            'estatus' => $this->input->post('estatus'),
            'fecha_aprobacion_dw' => date('Y-m-d H:i:s')      
        );    

    $this->db->set($data);
    $this->db->where('idtbl_tickets', $this->input->post('ticket'));
    $result = $this->db->update('tbl_tickets');
    
    return $result;
}

public function asignar_ticket_dos() {    

    // Verificar si la fecha de aprobación ya está establecida    
        $data = array(
            'tbl_users_idtbl_users_dw' => $this->input->post('desarrollador'),
            'estatus' => $this->input->post('estatus')             
        );    

    $this->db->set($data);
    $this->db->where('idtbl_tickets', $this->input->post('ticket'));
    $result = $this->db->update('tbl_tickets');
    
    return $result;
}


    public function obternerUsuariosDesarrolladores()
    {
        $query = $this->db->get_where("tbl_users", array("tipo" => 20, "estatus" => 1));
        return $query->result();
    }

    public function obtenerUsuariosIngenieria()
    {
        $this->db->select("tbl_users.*");
        $this->db->from("tbl_users");
        $this->db->join("tbl_tickets", "tbl_tickets.tbl_user_idtbl_users_proyectista = tbl_users.idtbl_users");
        $this->db->group_by("tbl_users.idtbl_users");
        $query = $this->db->get();
        return $query->result();
    }

    public function obtenerProductividadAnioMes()
    {
        $anio = $this->input->post('year');
        $query = $this->db->query("SELECT MONTH(fecha_finalizacion) mes, YEAR(fecha_finalizacion) anio, tbl_users.idtbl_users, tbl_users.nombre, COUNT(*) total_productividad FROM tbl_tickets JOIN tbl_users ON tbl_users.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw AND tbl_users.estatus = 1 WHERE YEAR(tbl_tickets.fecha_finalizacion) = '$anio' GROUP BY MONTH(tbl_tickets.fecha_finalizacion), YEAR(tbl_tickets.fecha_finalizacion), tbl_users_idtbl_users_dw");
        return $query->result();
    }

    public function obtenerProductividadAnioMesIngenieria()
    {
        $anio = $this->input->post('year');
        $query = $this->db->query("SELECT MONTH(fecha_compromiso) mes, YEAR(fecha_compromiso) anio, tbl_users.idtbl_users, tbl_users.nombre, COUNT(*) total_productividad FROM tbl_tickets JOIN tbl_users ON tbl_users.idtbl_users = tbl_tickets.tbl_user_idtbl_users_proyectista AND tbl_users.estatus = 1 WHERE YEAR(tbl_tickets.fecha_compromiso) = '$anio' AND tbl_tickets.tipo_ticket = 'ingenieria' AND tbl_tickets.estatus = 'Entregado' GROUP BY MONTH(tbl_tickets.fecha_compromiso), YEAR(tbl_tickets.fecha_compromiso), tbl_user_idtbl_users_proyectista");
        return $query->result();
    }

    public function cancelar_ticket()
    {
        $data = array(
            'estatus' => 'cancelado',
            'observaciones' => $this->input->post('comentarios'),
            'fecha_aprobacion_dw' => date('Y-m-d H:i:s')
        );        
        
        $this->db->set($data);
        $this->db->where('uid', $this->input->post('uid'));
        $result = $this->db->update('tbl_tickets');
        return  $result;
    }

    public function log_tickets($log, $ticket) {
		
		$data = array(
			'log' => $log,
			'tbl_users_idtbl_users' => $this->session->userdata('id'),
			'fecha' => date('Y-m-d H:i:s'),
            'uid_ticket' => $ticket
		);		
		$this->db->insert('tbl_log_tickets', $data);
	}

    public function nombre_user($id) {
		$query = $this->db->query("
			SELECT nombre
			FROM tbl_users 
			WHERE tbl_users.idtbl_users='$id'");
		return $query->result()[0]->nombre;
	}


    public function insertSupervisor($ticket){
        $data = array(
			'tbl_users_idtbl_users' => $this->session->userdata('id'),
            'tbl_users_idtbl_users_supervisor' => $this->input->post('supervisor'),
			'fecha' => date('Y-m-d H:i:s'),
            'uid_ticket' => $ticket
		);		
		$this->db->insert('tbl_notifications', $data);
    }


    public function insertProyectista($ticket){
        $data = array(
            'tbl_users_idtbl_users' => $this->session->userdata('id'),
            'tbl_user_idtbl_users_proyectista' => $this->input->post('proyectista'),
			'fecha' => date('Y-m-d H:i:s'),
            'uid_ticket' => $ticket
		);		
		$this->db->insert('tbl_notifications', $data);
    }


    public function getNotif(){
        $user = $this->session->userdata('id');
        if ($this->session->userdata('id') == 492) {
            $this->db->select("*");
            $this->db->from("tbl_tickets");
            $this->db->where("tbl_users_idtbl_users_dw", $user);
            $this->db->order_by('idtbl_tickets', 'DESC');
            $this->db->limit(10);
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {
                echo "
                    <li class='border-bottom px-2 py-3'>
                        <strong>Ticket: </strong>$row->uid <br>
                        <small><em><i class='fa fa-clock-o'></i> $row->fecha</em></small>
                    </li>
                ";
            }
        }elseif ($this->session->userdata('id') == $user && $this->session->userdata('tipo') == 9) {
            $this->db->select("*");
            $this->db->from("tbl_notifications");
            $this->db->where("tbl_user_idtbl_users_proyectista", $user);
            $this->db->order_by('idtbl_notif', 'DESC');
            $this->db->limit(10);
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {      
                echo "
                    <li>
                        <strong>Ticket: </strong>$row->uid_ticket <br>
                        <em>$row->fecha</em>
                    </li>
                    <br>
                ";
            }
        }elseif ($this->session->userdata('id') == 284) {
            $this->db->select("*");
            $this->db->from("tbl_notifications");
            $this->db->where("tbl_users_idtbl_users_supervisor", $user);
            $this->db->order_by('idtbl_notif', 'DESC');
            $this->db->limit(10);
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {      
                echo "
                    <li class='border-bottom px-2 py-3'>
                        <strong>Ticket: </strong>$row->uid_ticket <br>
                        <small><em><i class='fa fa-clock-o'></i> $row->fecha</em></small>
                    </li>
                ";
            }
        }
    }

    
}