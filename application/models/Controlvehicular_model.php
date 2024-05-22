<?php  if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Controlvehicular_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function log($log, $link=null)
    {
        if ($this->session->userdata('id')) {
            $id = $this->session->userdata('id');
        } else {
            $id = 1;
        }
        $data = array(
          'log' => $log,
          'tbl_users_idtbl_users' => $id,
          'link' => $link,
          'departamento' => 2
        );
        $this->db->insert('tbl_log', $data);
    }

    public function guardarPruebaManejo($parametros)
    {
        $this->db->insert('tbl_prueba_manejo', $parametros);
    }

    public function actualizarPruebaManejo($parametros, $uid_usuario)
    {
        $this->db->where('uid_usuario', $uid_usuario);
        $query = $this->db->update('tbl_prueba_manejo', $parametros);
        $ret = false;
        if ($query) {
            $ret = true;
        }
        return $ret;
    }

    public function getPruebaManejo($uid_usuario)
    {
        $query = $this->db->query("SELECT * FROM tbl_prueba_manejo WHERE uid_usuario = '$uid_usuario'");
        return $query->result_array();
    }

    //Obtiene el checklist que coincida con el uid de asignación
    public function getChecklist($uid_asignacion)
    {
        //$query = $this->db->query("SELECT tbl_checklist.*, CONCAT(tbl_usuarios.nombres, ' ', tbl_usuarios.apellido_paterno, ' ', tbl_usuarios.apellido_materno) AS nombre_usuario, tbl_users.nombre AS nombre_user FROM tbl_checklist INNER JOIN tbl_usuarios ON tbl_checklist.tbl_usuarios_uidtbl_usuarios = tbl_usuarios.uid INNER JOIN tbl_users ON tbl_users.idtbl_users = tbl_checklist.tbl_users_idtbl_users WHERE tbl_checklist.uid_asignacion = '$uid_asignacion'");
        $query = $this->db->query("SELECT dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos, dtl_almacen.numero_interno, tbl_almacen_movimientos.uid, tbl_almacen_movimientos.uid AS uid_movimiento, tbl_almacen_movimientos.tipo AS tipo_movimiento, tbl_proyectos.*, tbl_almacenes.*, tbl_checklist.*, tbl_checklist.tbl_usuarios_uidtbl_usuarios, CONCAT(tbl_usuarios.nombres, ' ', tbl_usuarios.apellido_paterno, ' ', tbl_usuarios.apellido_materno) AS nombre_usuario, tuser.nombre AS nombre_user FROM dtl_asignacion LEFT JOIN dtl_almacen ON dtl_asignacion.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen LEFT JOIN tbl_almacen_movimientos ON tbl_almacen_movimientos.idtbl_almacen_movimientos = dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos LEFT JOIN tbl_proyectos ON tbl_almacen_movimientos.tbl_proyectos_idtbl_proyectos = tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_almacenes ON tbl_almacen_movimientos.tbl_almacenes_idtbl_almacenes = tbl_almacenes.idtbl_almacenes LEFT JOIN tbl_checklist ON  tbl_checklist.uid_asignacion=tbl_almacen_movimientos.uid LEFT JOIN tbl_usuarios ON tbl_usuarios.uid = tbl_checklist.tbl_usuarios_uidtbl_usuarios LEFT JOIN tbl_users tuser ON tuser.idtbl_users = tbl_checklist.tbl_users_idtbl_users WHERE tbl_checklist.uid_asignacion = '$uid_asignacion'");

        return $query->result_array();
    }   

    //Obtiene el checklist que coincida con el uid del servicio
    public function getDatosChecklistServicio($uid_servicio)
    {
        $query = $this->db->query("SELECT TCS.*, TP.numero_proyecto, TU.nombre AS mecanico_traslado FROM tbl_checklist_servicio TCS LEFT JOIN tbl_proyectos TP ON TCS.tbl_proyectos_idtbl_proyectos = TP.idtbl_proyectos LEFT JOIN tbl_users TU ON TU.idtbl_users = TCS.tbl_users_idtbl_users_traslado WHERE uid_servicio = '$uid_servicio'");
        return $query->result_array();
    }

    //Obtiene el checklist que coincida con el uid del servicio
    public function getChecklistServicio($uid_servicio)
    {
        $query = $this->db->query("SELECT TCS.checklist FROM tbl_checklist_servicio TCS LEFT JOIN tbl_proyectos TP ON TCS.tbl_proyectos_idtbl_proyectos = TP.idtbl_proyectos WHERE uid_servicio = '$uid_servicio'");
        return $query->result()[0]->checklist;
    }

    //Obtiene el checklist que coincida con el uid del servicio
    public function getChecklistServicioTecnico($uid_servicio)
    {
        $query = $this->db->query("SELECT TCS.checklist_tecnico FROM tbl_checklist_servicio TCS LEFT JOIN tbl_proyectos TP ON TCS.tbl_proyectos_idtbl_proyectos = TP.idtbl_proyectos WHERE uid_servicio = '$uid_servicio'");
        return $query->result()[0]->checklist_tecnico;
    }

    //Obtiene las imagenes del checklist que coincida con el uid del servicio
    public function getImagenesChecklistServicio($uid_servicio)
    {
        $query = $this->db->query("SELECT TCS.imagenes_checklist FROM tbl_checklist_servicio TCS LEFT JOIN tbl_proyectos TP ON TCS.tbl_proyectos_idtbl_proyectos = TP.idtbl_proyectos WHERE uid_servicio = '$uid_servicio'");
        return $query->result()[0]->imagenes_checklist;
    }

    //Obtiene las imagenes del checklist que coincida con el uid del servicio
    public function getImagenesChecklistServicioTecnico($uid_servicio)
    {
        $query = $this->db->query("SELECT TCS.imagenes_checklist_tecnico FROM tbl_checklist_servicio TCS LEFT JOIN tbl_proyectos TP ON TCS.tbl_proyectos_idtbl_proyectos = TP.idtbl_proyectos WHERE uid_servicio = '$uid_servicio'");
        return $query->result()[0]->imagenes_checklist_tecnico;
    }

    public function getChecklistDevolucion($uid_asignacion)
    {
       // $query = $this->db->query("SELECT tbl_checklist.*, CONCAT(tbl_usuarios.nombres, ' ', tbl_usuarios.apellido_paterno, ' ', tbl_usuarios.apellido_materno) AS nombre_usuario, tbl_users.nombre AS nombre_user FROM tbl_checklist INNER JOIN tbl_usuarios ON tbl_checklist.tbl_usuarios_uidtbl_usuarios = tbl_usuarios.uid INNER JOIN tbl_users ON tbl_users.idtbl_users = tbl_checklist.tbl_users_idtbl_users WHERE tbl_checklist.uid_desasignacion = '$uid_asignacion'");
       $query = $this->db->query("SELECT dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos, dtl_almacen.numero_interno, tbl_almacen_movimientos.uid, tbl_almacen_movimientos.uid AS uid_movimiento, tbl_almacen_movimientos.tipo AS tipo_movimiento, tbl_proyectos.*, tbl_almacenes.*, tbl_checklist.*, tbl_checklist.tbl_usuarios_uidtbl_usuarios, CONCAT(tbl_usuarios.nombres, ' ', tbl_usuarios.apellido_paterno, ' ', tbl_usuarios.apellido_materno) AS nombre_usuario FROM dtl_asignacion LEFT JOIN dtl_almacen ON dtl_asignacion.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen LEFT JOIN tbl_almacen_movimientos ON tbl_almacen_movimientos.idtbl_almacen_movimientos = dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos LEFT JOIN tbl_proyectos ON tbl_almacen_movimientos.tbl_proyectos_idtbl_proyectos = tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_almacenes ON tbl_almacen_movimientos.tbl_almacenes_idtbl_almacenes = tbl_almacenes.idtbl_almacenes LEFT JOIN tbl_checklist ON  tbl_checklist.uid_desasignacion=tbl_almacen_movimientos.uid LEFT JOIN tbl_usuarios ON tbl_usuarios.uid = tbl_checklist.tbl_usuarios_uidtbl_usuarios WHERE tbl_checklist.uid_desasignacion = '$uid_asignacion'");
        return $query->result_array();
    }

    //actualiza información de checklist servicio
    public function actualizarChecklist($parametros, $uid_asignacion)
    {
        $this->db->where('uid_asignacion', $uid_asignacion);
        $query = $this->db->update('tbl_checklist', $parametros);
        $ret = false;
        if ($query) {
            $ret = true;
        }
        return $ret;
    }

    //Actualiza información de checklist servicio
    public function actualizarChecklistServicio($parametros, $uid_asignacion)
    {
        $this->db->trans_begin();
        $this->db->where('uid_servicio', $uid_asignacion);
        $this->db->update('tbl_checklist_servicio', $parametros);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function actualizarChecklistDevolucion($parametros, $uid_devolucion)
    {
        $this->db->where('uid_devolucion', $uid_devolucion);
        $query = $this->db->update('tbl_checklist', $parametros);
        $ret = false;
        if ($query) {
            $ret = true;
        }
        return $ret;
    }

    //Insert de checklist asignación
    public function guardarChecklist($parametros)
    {
        $this->db->insert('tbl_checklist', $parametros);
    }  

    //Insert de checklist servicio
    public function guardarChecklistServicio($parametros)
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_checklist_servicio', $parametros);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function obtenerUltimoChecklist($iddtl_almacen)
    {
        $queryAsignaciones = $this->db->query("SELECT TCH.*, CONCAT(TUS.nombres,' ',TUS.apellido_paterno, ' ', TUS.apellido_materno) AS usuario,TU.nombre AS user FROM tbl_checklist TCH INNER JOIN tbl_almacen_movimientos TAM ON TAM.uid = TCH.uid_asignacion INNER JOIN dtl_asignacion DA ON DA.tbl_almacen_movimientos_idtbl_almacen_movimientos = TAM.idtbl_almacen_movimientos INNER JOIN tbl_usuarios TUS ON TUS.uid = TCH.tbl_usuarios_uidtbl_usuarios INNER JOIN tbl_users TU ON TU.idtbl_users = TCH.tbl_users_idtbl_users WHERE DA.dtl_almacen_iddtl_almacen = $iddtl_almacen ORDER BY TCH.idtbl_checklist DESC LIMIT 1");
        $queryDevoluciones = $this->db->query("SELECT TCH.*, CONCAT(TUS.nombres,' ',TUS.apellido_paterno, ' ', TUS.apellido_materno) AS usuario,TU.nombre AS user FROM tbl_checklist TCH INNER JOIN tbl_solicitud_devolucion TSD ON TSD.uid = TCH.uid_devolucion INNER JOIN tbl_almacen_movimientos TAM ON TAM.parent = TSD.idtbl_solicitud_devolucion INNER JOIN dtl_asignacion DA ON DA.tbl_almacen_movimientos_idtbl_almacen_movimientos = TAM.idtbl_almacen_movimientos INNER JOIN tbl_usuarios TUS ON TUS.uid = TCH.tbl_usuarios_uidtbl_usuarios INNER JOIN tbl_users TU ON TU.idtbl_users = TCH.tbl_users_idtbl_users WHERE DA.dtl_almacen_iddtl_almacen = $iddtl_almacen AND TAM.tipo = 'desasignacion' ORDER BY TCH.idtbl_checklist DESC LIMIT 1");
        $row1 =  $queryAsignaciones->row();
        $row2 = $queryDevoluciones->row();
        if (!isset($row1) && !isset($row2)) {
            return $queryAsignaciones->result();
        } elseif (isset($row1) && !isset($row2)) {
            return $queryAsignaciones->result();
        } elseif (!isset($row1) && isset($row2)) {
            return $queryDevoluciones->result();
        } elseif (isset($row1) && isset($row2)) {
            if ($row1->idtbl_checklist > $row2->idtbl_checklist) {
                return $queryAsignaciones->result();
            } else {
                return $queryDevoluciones->result();
            }
        }
    }

    public function guardar_nuevo_tramite_vehicular($uid)
    {
        $this->db->trans_begin();
        if ($_POST['tipo_tramite'] == "seguro") {
            $data = array(
                'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen'),
                'fecha_tramite' => $this->input->post('fecha_tramite'),
                'proxima_fecha_tramite' => $this->input->post('proxima_fecha_tramite'),
                'detalle_tramite' => $this->input->post('detalle_tramite'),
                'uid' => $uid,
                'tipo_tramite' => $this->input->post('tipo_tramite'),
                'poliza' => $this->input->post('poliza'),
                'seguro' => $this->input->post('seguro'),
                'fecha_creado' => date("Y-m-d h:i:s"),
                'costo' => $this->input->post('costo')
            );
        } elseif ($this->input->post('tipo_tramite') == "servicio") {
            $data = array(
                'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen'),
                'fecha_tramite' => $this->input->post('fecha_tramite'),
                'detalle_tramite' => $this->input->post('detalle_tramite'),
                'uid' => $uid,
                'tipo_tramite' => $this->input->post('tipo_tramite'),
                'fecha_creado' => date("Y-m-d h:i:s")
            );
        } else if($this->input->post('tipo_tramite') == "tenencia"){
            $data = array(
                'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen'),
                'fecha_tramite' => $this->input->post('fecha_tramite'),
                //'proxima_fecha_tramite' => $this->input->post('proxima_fecha_tramite'),
                'detalle_tramite' => $this->input->post('detalle_tramite'),
                'uid' => $uid,
                'tipo_tramite' => $this->input->post('tipo_tramite'),
                //'pago_interno' => $this->input->post('pago_interno') == 'on' ? 1 : 0,
                'pago_estatus' => 'Pendiente',
                'fecha_creado' => date("Y-m-d h:i:s"),
                'costo' => $this->input->post('costo'),
                'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto')
            );
        } else if($this->input->post('tipo_tramite') == "placas"){
            $data = array(
                'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen'),
                'fecha_tramite' => $this->input->post('fecha_tramite'),
                'proxima_fecha_tramite' => $this->input->post('proxima_fecha_tramite'),
                'detalle_tramite' => $this->input->post('detalle_tramite'),
                'uid' => $uid,
                'tipo_tramite' => $this->input->post('tipo_tramite'),
                'fecha_creado' => date("Y-m-d h:i:s"),
                'placas' => $this->input->post('placas'),
                'costo' => $this->input->post('costo')
            );
        }else {
            $data = array(
                'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen'),
                'fecha_tramite' => $this->input->post('fecha_tramite'),
                'proxima_fecha_tramite' => $this->input->post('proxima_fecha_tramite'),
                'detalle_tramite' => $this->input->post('detalle_tramite'),
                'uid' => $uid,
                'tipo_tramite' => $this->input->post('tipo_tramite'),
                'fecha_creado' => date("Y-m-d h:i:s"),
                'costo' => $_POST['tipo_tramite'] == "verificacion" ? $this->input->post('costo') : NULL,
                'engomado' => $this->input->post('engomado')
            );
        }
        //Se registra la entrada
        $this->db->insert('tbl_tramites_vehiculares', $data);
        if (($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 15) && $this->input->post('tipo_tramite') == "servicio") {
            $insert_id = $this->db->insert_id();
            $datadtl = array(
                'estatus' => 'SC',
                'tipo_servicio' => $this->input->post('tipo_servicio'),
                'kilometraje' => $this->input->post('kilometraje'),
                'tbl_users_idtbl_users_autor' => $this->session->userdata('id'),
                'tbl_tramites_vehiculares_idtbl_tramites_vehiculares' => $insert_id
            );
            $this->db->insert('dtl_servicio', $datadtl);
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return 'Ocurrio un error intente nuevamente';
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function guardar_editar_cambio_propietario(){
        try {
            $uid = $this->input->post('uid') == "" ? uniqid() : $this->input->post('uid');
            if($_FILES['archivo']['name'] !== ""){
                $carpeta = './uploads/tramites_vehiculares/';
                if (!file_exists($carpeta)) {
                  mkdir($carpeta, 0755, true);
                }
                $this->load->library('upload');
                      
                $config['upload_path'] = $carpeta;
                $config['allowed_types'] = 'pdf';
                $config['overwrite'] = true;
                $config['file_name'] = $uid . "_1";
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('archivo')){
                    throw new Exception("Error al subir el acchivo.");
                }
            }
            $this->db->trans_begin();
            $data = array(
                'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen'),
                'fecha_tramite' => $this->input->post('fecha_limite_pago'),
                'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
                'costo' => $this->input->post('costo'),
                'tipo_tramite' => $this->input->post('tipo_tramite'),
                'uid' => $uid
            );
            $datadtl = array(
                'estatus' => 'pendiente',
                'dueno' => $this->input->post('dueno'),
                'nuevo_dueno' => $this->input->post('nuevo_dueno'),
            );

            if($this->input->post('idtbl_tramites_vehiculares') == ""){
                $data['fecha_creado'] = date("Y-m-d H:i:s");
                $this->db->insert('tbl_tramites_vehiculares', $data);
                $insert_id = $this->db->insert_id();
                $datadtl['tbl_tramites_vehiculares_idtbl_tramites_vehiculares'] = $insert_id; 
                $this->db->insert('tbl_cambio_propietario', $datadtl);
            }else{
                $insert_id = $this->input->post('idtbl_tramites_vehiculares');
                $this->db->where('idtbl_tramites_vehiculares', $insert_id);
                $this->db->update('tbl_tramites_vehiculares', $data);
                $this->db->where('tbl_tramites_vehiculares_idtbl_tramites_vehiculares', $insert_id);
                $this->db->update('tbl_cambio_propietario', $datadtl);
            }

            $dataAlmacen = array(
                'propietario' => $this->input->post('nuevo_dueno')
            );

            $this->db->where('iddtl_almacen', $this->input->post('iddtl_almacen'));
            $this->db->update('dtl_almacen', $dataAlmacen);

            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                return 'Ocurrio un error intente nuevamente';
            } else {
                $this->db->trans_commit();
                return true;
            }
        } catch(Exception $erorr){
            return 'Problemas al cargar el archivo';
        }
    }

    public function cambio_propietario_documentos(){
        try {
            $estatus = $this->input->post('estatus');
            $uid = $this->input->post('uid');
            if($_FILES['archivo']['name'] !== ""){
                $carpeta = './uploads/tramites_vehiculares/';
                if (!file_exists($carpeta)) {
                  mkdir($carpeta, 0755, true);
                }
                $this->load->library('upload');
                      
                $config['upload_path'] = $carpeta;
                $config['allowed_types'] = 'pdf';
                $config['overwrite'] = true;
                $config['file_name'] = $uid . "_" . ($estatus == "pagado" ? "2" : "3");
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('archivo')){
                    throw new Exception("Error al subir el archivo.");
                }
            }
            $this->db->trans_begin();
            $datadtl = array(
                'estatus' => $estatus
            );
            $this->db->where('tbl_tramites_vehiculares_idtbl_tramites_vehiculares', $this->input->post('idtbl_tramites_vehiculares'));
            $this->db->update('tbl_cambio_propietario', $datadtl);
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                return 'Ocurrio un error intente nuevamente';
            } else {
                $this->db->trans_commit();
                return true;
            }
        } catch(Exception $erorr){
            return 'Problemas al cargar el archivo';
        }
    }

    public function editar_tenencia(){
        $this->db->trans_begin();
        $data = array(
            //'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen'),
            'fecha_tramite' => $this->input->post('fecha_tramite'),
            'detalle_tramite' => $this->input->post('detalle_tramite'),
            'pago_interno' => $this->input->post('pago_interno') == 'on' ? 1 : 0,
            'costo' => $this->input->post('costo'),
            'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto')
        );
        $this->db->update('tbl_tramites_vehiculares', $data, array("idtbl_tramites_vehiculares" => $this->input->post('idtbl_tramites_vehiculares')));
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return 'Ocurrio un error intente nuevamente';
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function editar_seguro(){
        $this->db->trans_begin();
        $data = array(
            'costo' => $this->input->post('costo')
        );
        $this->db->update('tbl_tramites_vehiculares', $data, array("idtbl_tramites_vehiculares" => $this->input->post('idtbl_tramites_vehiculares')));
        if($this->db->trans_status()=== false){
            $this->db->trans_rollback();
            return 'Ocurrio un error, intente nuevamente';
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

	public function guardar_nueva_incidencia($uid) {
		$this->db->trans_begin();
		$data = array(
			'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen'),
            'fecha_creacion' => date('Y-m-d h:i:s'),
			'tbl_usuarios_idtbl_usuarios' => $this->input->post('idtbl_usuarios') != "" ? $this->input->post('idtbl_usuarios'): NULL,
			'incidencia' => $this->input->post('incidencia'),
			'fecha_incidencia' => $this->input->post('fecha_incidencia'),
			'costo' => $this->input->post('costo'),
			'estatus' => 'Pendiente',
			'documento_incidencia' => $uid,
            'tipo_incidencia' => $this->input->post('tipo_incidencia'),
            'tipo' => $this->input->post('tipo'),
            'estatus_contabilidad' => 'Pendiente',
            'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
            'autor' => $this->session->userdata('id')
		);
		//Se registra la entrada
		$this->db->insert('tbl_incidencias', $data);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Ocurrio un error intente nuevamente';
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

    public function tramitesVehiculares($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("SELECT tbl_tramites_vehiculares.*, tbl_proyectos.idtbl_proyectos, tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto, dtl_servicio.* FROM tbl_tramites_vehiculares LEFT JOIN dtl_servicio ON tbl_tramites_vehiculares.idtbl_tramites_vehiculares = dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_tramites_vehiculares.tbl_proyectos_idtbl_proyectos WHERE tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = " . $this->input->post('iddtl_almacen') . " AND tbl_tramites_vehiculares.tipo_tramite='" . $this->input->post('tipo_tramite') . "' AND (idtbl_tramites_vehiculares LIKE '%$buscar%' OR tbl_tramites_vehiculares.fecha_tramite LIKE '%$buscar%' OR tbl_tramites_vehiculares.proxima_fecha_tramite LIKE '%$buscar%') " . $limit);
        return $query->result();
    }

    public function serviciosVehiculares($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $permisos = $this->departamentos_model->permisos('servicios_mecanicos');
        $mecanico = $this->session->userdata('id');
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        if ($permisos == 2) {
            $query = $this->db->query("SELECT tbl_tramites_vehiculares.*, dtl_servicio.*, autor.nombre AS autor, atiende.nombre AS atiende, dtl_almacen.numero_interno FROM tbl_tramites_vehiculares LEFT JOIN dtl_servicio ON tbl_tramites_vehiculares.idtbl_tramites_vehiculares = dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares LEFT JOIN tbl_users autor ON dtl_servicio.tbl_users_idtbl_users_autor = autor.idtbl_users LEFT JOIN tbl_users atiende ON atiende.idtbl_users = dtl_servicio.tbl_users_idtbl_users LEFT JOIN dtl_almacen ON tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen WHERE tbl_tramites_vehiculares.tipo_tramite= 'servicio' AND (idtbl_tramites_vehiculares LIKE '%$buscar%' OR tbl_tramites_vehiculares.fecha_tramite LIKE '%$buscar%' OR tbl_tramites_vehiculares.proxima_fecha_tramite LIKE '%$buscar%' OR dtl_almacen.numero_interno LIKE '%$buscar%') ORDER BY tbl_tramites_vehiculares.idtbl_tramites_vehiculares DESC " . $limit);
        } elseif ($permisos == 3) {
            $query = $this->db->query("SELECT tbl_tramites_vehiculares.*, dtl_servicio.*, autor.nombre AS autor, atiende.nombre AS atiende, dtl_almacen.numero_interno FROM tbl_tramites_vehiculares LEFT JOIN dtl_servicio ON tbl_tramites_vehiculares.idtbl_tramites_vehiculares = dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares LEFT JOIN tbl_users autor ON dtl_servicio.tbl_users_idtbl_users_autor = autor.idtbl_users LEFT JOIN tbl_users atiende ON atiende.idtbl_users = dtl_servicio.tbl_users_idtbl_users LEFT JOIN dtl_almacen ON tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen WHERE tbl_tramites_vehiculares.tipo_tramite= 'servicio' AND dtl_servicio.tbl_users_idtbl_users = $mecanico AND (idtbl_tramites_vehiculares LIKE '%$buscar%' OR tbl_tramites_vehiculares.fecha_tramite LIKE '%$buscar%' OR tbl_tramites_vehiculares.proxima_fecha_tramite LIKE '%$buscar%' OR dtl_almacen.numero_interno LIKE '%$buscar%') ORDER BY tbl_tramites_vehiculares.idtbl_tramites_vehiculares DESC " . $limit);
        } elseif ($permisos == 1) {
            $query = $this->db->query("SELECT tbl_tramites_vehiculares.*, dtl_servicio.*, autor.nombre AS autor, atiende.nombre AS atiende, dtl_almacen.numero_interno FROM tbl_tramites_vehiculares LEFT JOIN dtl_servicio ON tbl_tramites_vehiculares.idtbl_tramites_vehiculares = dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares LEFT JOIN tbl_users autor ON dtl_servicio.tbl_users_idtbl_users_autor = autor.idtbl_users LEFT JOIN tbl_users atiende ON atiende.idtbl_users = dtl_servicio.tbl_users_idtbl_users LEFT JOIN dtl_almacen ON tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen WHERE tbl_tramites_vehiculares.tipo_tramite= 'servicio' AND (idtbl_tramites_vehiculares LIKE '%$buscar%' OR tbl_tramites_vehiculares.fecha_tramite LIKE '%$buscar%' OR tbl_tramites_vehiculares.proxima_fecha_tramite LIKE '%$buscar%' OR dtl_almacen.numero_interno LIKE '%$buscar%') ORDER BY tbl_tramites_vehiculares.idtbl_tramites_vehiculares DESC " . $limit);
        }
        return $query->result();
    }

    public function cambioPropietario($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $condition = "";
        if($this->input->post('iddtl_almacen') !== NULL){
            $condition = "tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = " . $this->input->post('iddtl_almacen') . " AND";
        }
        $query = $this->db->query("SELECT tbl_tramites_vehiculares.*, tbl_proyectos.idtbl_proyectos, tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto, tbl_cambio_propietario.*, dtl_almacen.numero_interno FROM tbl_tramites_vehiculares LEFT JOIN tbl_cambio_propietario ON tbl_tramites_vehiculares.idtbl_tramites_vehiculares = tbl_cambio_propietario.tbl_tramites_vehiculares_idtbl_tramites_vehiculares LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_tramites_vehiculares.tbl_proyectos_idtbl_proyectos LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen WHERE $condition " . " tbl_tramites_vehiculares.tipo_tramite='" . $this->input->post('tipo_tramite') . "' AND (idtbl_tramites_vehiculares LIKE '%$buscar%' OR tbl_tramites_vehiculares.fecha_tramite LIKE '%$buscar%' OR tbl_tramites_vehiculares.proxima_fecha_tramite LIKE '%$buscar%') ORDER BY tbl_tramites_vehiculares.idtbl_tramites_vehiculares DESC " . $limit);
        return $query->result();
    }

    public function asignar_servicio()
    {
        $data = array(
            'tbl_users_idtbl_users' => $this->input->post('mecanico'),
            'estatus' => $this->input->post('estatus')
        );
        
        $this->db->set($data);
        $this->db->where('iddtl_servicio', $this->input->post('servicio'));
        $result = $this->db->update('dtl_servicio');
        return  $result;
    }

    public function reactivar_pausar_servicio(){
        if($this->input->post('estatus_proceso') == 'pausada'){
            $this->db->set("estatus_proceso", $this->input->post('estatus_proceso'));
            $this->db->set("fecha_pausa", date('Y-m-d H:i:s'));
        }else{
            $this->db->set("estatus_proceso", $this->input->post('estatus_proceso'));
            $this->db->set("fecha_reanudacion", date('Y-m-d H:i:s'));
            $this->db->set("tiempo_minutos_pausa", "tiempo_minutos_pausa + TIMESTAMPDIFF(MINUTE,fecha_pausa,fecha_reanudacion)", FALSE);
        }
        $this->db->where('iddtl_servicio', $this->input->post('iddtl_servicio'));
        $result = $this->db->update('dtl_servicio');
        return  $result;
    }

    public function iniciar_servicio()
    {
        $query = $this->db->query("SELECT dtl_almacen.iddtl_almacen, dtl_almacen.estatus FROM tbl_tramites_vehiculares JOIN dtl_servicio ON tbl_tramites_vehiculares.idtbl_tramites_vehiculares = dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen WHERE dtl_servicio.iddtl_servicio = " . $this->input->post('servicio'));
        $result = $query->result()[0];
        $query = $this->db->query("UPDATE dtl_almacen SET estatus = 'taller' WHERE iddtl_almacen = " . $result->iddtl_almacen);
        $data = array(
            'fecha_inicio' => date('Y-m-d H:i:s'),
            'estatus' => 'SI'
        );
    
        $this->db->set($data);
        $this->db->where('iddtl_servicio', $this->input->post('servicio'));
        $result = $this->db->update('dtl_servicio');
        return  $result;
	}
	
    public function checklist_servicio($id){
        $this->db->trans_begin();
        $data = array(              
            'estatus' => 'CL'                
        );
        $this->db->set($data);
        $this->db->where('iddtl_servicio', $id);
        $this->db->update('dtl_servicio');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

	public function finalizar_servicio($id, $dtl_almacen, $km_salida, $km_servicio)
    {
        $query = $this->db->get_where('dtl_asignacion', array('dtl_almacen_iddtl_almacen' => $dtl_almacen, 'estatus_asignacion' => 'activa'));
        $len = count($query->result());
        $estatus = "disponible";
        if($len > 0){
            $estatus = "asignado";
        }
        $this->db->trans_begin();
        
        $data = array(
            'fecha_finalizacion' => date('Y-m-d H:i:s'),                
            'estatus' => 'FINALIZADO'                
        );
        
        //Se registra la entrada
        $this->db->set($data);
        $this->db->where('iddtl_servicio', $id);
        $this->db->update('dtl_servicio');

        $this->db->set('km_actual', $km_salida);
        $this->db->set('km_servicio', $km_servicio);
        $this->db->set('estatus', "IF(estatus != 'taller', estatus, '$estatus')", FALSE);
        $this->db->where('iddtl_almacen', $dtl_almacen);
        $this->db->update('dtl_almacen');
        
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return 'Ocurrio un error intente nuevamente';
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function detalle_servicio($uid)
    {
        $query = $this->db->query("SELECT DA.numero_interno, DA.iddtl_almacen, DA.anio, TC.imagenes, operador.nombres AS nombreOperador, operador.apellido_paterno AS paternoOperador, operador.apellido_materno AS maternoOperador, operador.uid AS uid_operador, TC.idtbl_catalogo, DA.numero_serie, DA.placas, DA.no_motor, DA.tipo_vehiculo, DA.km_servicio, TC.descripcion, TC.marca, TC.modelo, TTV.*, DS.*, autor.nombre AS autor, mecanico.nombre AS mecanico, TAM.tbl_proyectos_idtbl_proyectos, TP.numero_proyecto, TP.nombre_proyecto FROM tbl_tramites_vehiculares TTV LEFT JOIN dtl_servicio DS ON DS.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = TTV.idtbl_tramites_vehiculares LEFT JOIN dtl_almacen DA ON DA.iddtl_almacen = TTV.dtl_almacen_iddtl_almacen LEFT JOIN tbl_users autor ON autor.idtbl_users = DS.tbl_users_idtbl_users_autor LEFT JOIN tbl_users mecanico ON mecanico.idtbl_users = DS.tbl_users_idtbl_users LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN dtl_asignacion DAS ON DA.iddtl_almacen = DAS.dtl_almacen_iddtl_almacen AND DAS.estatus_asignacion = 'activa' LEFT JOIN tbl_usuarios operador ON operador.idtbl_usuarios = DAS.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_almacen_movimientos TAM ON DAS.tbl_almacen_movimientos_idtbl_almacen_movimientos = TAM.idtbl_almacen_movimientos LEFT JOIN tbl_proyectos TP ON TP.idtbl_proyectos  = TAM.tbl_proyectos_idtbl_proyectos WHERE TTV.uid = '$uid'");
        return $query->result();
    }

    //Obtiene todos lo mecanicos
    public function todos_los_mecanicos() {
		$query = $this->db->query("SELECT tbl_users.* FROM tbl_users JOIN tbl_modulos_users ON tbl_modulos_users.tbl_users_idtbl_users = tbl_users.idtbl_users WHERE tbl_users.tipo = 3 AND tbl_modulos_users.ctl_modulo_tipo_users_idctl_modulo_tipo_users = 2 " );
		return $query->result();
	}

    //Obtiene todos lo mecanicos activos
    public function todos_los_mecanicos_activos() {
        $query = $this->db->query("SELECT tbl_users.* FROM tbl_users JOIN tbl_modulos_users ON tbl_modulos_users.tbl_users_idtbl_users = tbl_users.idtbl_users WHERE (tbl_users.tipo = 3 AND tbl_modulos_users.ctl_modulo_tipo_users_idctl_modulo_tipo_users = 2 AND estatus=1 AND jefe_area=0 AND idtbl_users!=272) OR tbl_users.idtbl_users = 300 GROUP BY tbl_users.idtbl_users" );
        return $query->result();
    }

    //Obtiene todos lo mecanicos
    public function personalControlVehicular() { 
        $query = $this->db->query("SELECT CONCAT(nombres, ' ', apellido_paterno, ' ', apellido_materno) AS nombres, idtbl_usuarios, estatus FROM tbl_usuarios WHERE ((tbl_usuarios.tbl_perfiles_idtbl_perfiles = 149 OR tbl_usuarios.tbl_perfiles_idtbl_perfiles = 32 OR tbl_usuarios.tbl_perfiles_idtbl_perfiles = 295 OR tbl_usuarios.tbl_perfiles_idtbl_perfiles = 356 OR tbl_usuarios.tbl_perfiles_idtbl_perfiles = 357) AND estatus = 1) OR (idtbl_usuarios = 98 OR idtbl_usuarios = 2560 OR idtbl_usuarios = 15) ORDER BY nombres, apellido_paterno, apellido_materno");
        return $query->result();
    }
    
    public function getNotificacionesTramites()
    {
        //$query = $this->db->query("SELECT * FROM tbl_servicios_autos t1 WHERE proxima_fecha_servicio = (SELECT MAX(proxima_fecha_servicio) FROM tbl_servicios_autos t2 WHERE t1.dtl_almacen_iddtl_almacen = t2.dtl_almacen_iddtl_almacen) AND TIMESTAMPDIFF(DAY, '" . date('Y-m-d') . "', t1.proxima_fecha_servicio) = 2");
        $query = $this->db->query("SELECT t1.*,t3.numero_interno FROM tbl_tramites_vehiculares t1 INNER JOIN dtl_almacen t3 ON t3.iddtl_almacen = t1.dtl_almacen_iddtl_almacen WHERE proxima_fecha_tramite = (SELECT MAX(proxima_fecha_tramite) FROM tbl_tramites_vehiculares t2 WHERE t1.dtl_almacen_iddtl_almacen = t2.dtl_almacen_iddtl_almacen AND t1.tipo_tramite = t2.tipo_tramite) AND TIMESTAMPDIFF(DAY, '" . date('Y-m-d') . "', t1.proxima_fecha_tramite) <= 2");
        return $query->result();
    }

    public function historialAsignacionesAutos($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("SELECT * FROM dtl_asignacion INNER JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = dtl_asignacion.tbl_usuarios_idtbl_usuarios WHERE dtl_asignacion.dtl_almacen_iddtl_almacen = " . $this->input->post('iddtl_almacen') . " AND (dtl_asignacion.fecha_asignacion LIKE '%$buscar%' OR tbl_usuarios.nombres LIKE '%$buscar%' OR tbl_usuarios.apellido_paterno LIKE '%$buscar%' OR tbl_usuarios.apellido_materno LIKE '%$buscar%' OR dtl_asignacion.estatus_asignacion OR dtl_asignacion.cantidad LIKE '%$buscar%' OR dtl_asignacion.fecha_finalizacion LIKE '%%$buscar') " . $limit);
        return $query->result();
    }

	public function todasIncidencias($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if ($inicio !== false && $cantidadRegistro !== false) {
			$limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
        $condition = '';
        if($this->session->userdata("tipo") == 16){
            $condition = ' AND tbl_incidencias.tbl_usuarios_idtbl_usuarios IS NULL ';
        }else if($this->session->userdata("tipo") == 5){
            $condition = ' AND tbl_incidencias.tbl_usuarios_idtbl_usuarios IS NOT NULL ';
        }
		$query = $this->db->query("SELECT dtl_almacen.numero_interno, dtl_almacen.placas, tbl_incidencias.*, tbl_users.nombre, CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) AS personal, tbl_proyectos.nombre_proyecto FROM tbl_incidencias LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_incidencias.dtl_almacen_iddtl_almacen LEFT JOIN tbl_users ON tbl_users.idtbl_users = tbl_incidencias.autor LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_incidencias.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_incidencias.tbl_proyectos_idtbl_proyectos WHERE (CONCAT(tbl_usuarios.nombres, ' ', tbl_usuarios.apellido_paterno, ' ', tbl_usuarios.apellido_materno) LIKE '%$buscar%') AND tbl_incidencias.tipo_incidencia = 'control_vehicular'" . $condition . " ORDER BY tbl_incidencias.idtbl_incidencias DESC " . $limit);
        //$query = $this->db->query("SELECT dtl_almacen.numero_interno, dtl_almacen.placas, tbl_incidencias.*, CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) AS personal, tbl_proyectos.nombre_proyecto FROM tbl_incidencias LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_incidencias.dtl_almacen_iddtl_almacen LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_incidencias.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_incidencias.tbl_proyectos_idtbl_proyectos WHERE (CONCAT(tbl_usuarios.nombres, ' ', tbl_usuarios.apellido_paterno, ' ', tbl_usuarios.apellido_materno) LIKE '%$buscar%') AND tbl_incidencias.tipo_incidencia = 'control_vehicular'" . $condition . " ORDER BY tbl_incidencias.idtbl_incidencias DESC " . $limit);
        return $query->result();
	}
	

    public function unidadesAsignadas($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("SELECT * FROM dtl_asignacion LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = dtl_asignacion.dtl_almacen_iddtl_almacen LEFT JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_almacen.tbl_catalogo_idtbl_catalogo WHERE dtl_asignacion.tbl_usuarios_idtbl_usuarios = " . $this->input->post('idtbl_usuarios') . " AND dtl_almacen.tbl_almacenes_idtbl_almacenes = " . ID_ALMACEN_AUTOS_CONTROL_VEHICULAR . $limit);
        return $query->result();
    }

	public function obtenerUltimoSeguro(){
		$query = $this->db->query("SELECT t.idtbl_tramites_vehiculares, t.seguro FROM tbl_tramites_vehiculares as t WHERE t.proxima_fecha_tramite = (SELECT MAX(proxima_fecha_tramite) FROM tbl_tramites_vehiculares as t1 WHERE t1.dtl_almacen_iddtl_almacen = " . $this->input->post('iddtl_almacen') . " AND t1.tipo_tramite = 'seguro') AND t.tipo_tramite = 'seguro' AND t.dtl_almacen_iddtl_almacen = " . $this->input->post('iddtl_almacen') . "");
		return $query->result();
	}

	public function nuevoSiniestro(){
		$this->db->trans_begin();
		$data = array(
			'tbl_tramites_vehiculares_idtbl_tramites_vehiculares' => $this->input->post("idtbl_tramites_vehiculares"),
			'estatus' => $this->input->post("estatus"),
			'reportado_por' => $this->input->post("reportado_por"),
			'atiende' => $this->input->post("atiende"),
			'fecha_siniestro' => $this->input->post("fecha_siniestro"),
			'fecha_conclusion' => $this->input->post("fecha_conclusion"),
			'nombre_contacto' => $this->input->post("nombre_contacto"),
			'telefono_contacto' => $this->input->post("telefono"),
			'descripcion_siniestro' => $this->input->post("descripcion_siniestro"),
			'descripcion_seguimiento' => $this->input->post("descripcion_seguimiento"),
            'tipo' => $this->input->post("tipo"),
            'autor' => $this->session->userdata('id')
		);
		$query = $this->db->insert("tbl_siniestros_vehiculos", $data);
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Ocurrio un error intente nuevamente';
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function editarSiniestros(){
		$this->db->trans_begin();
		$data = array(
            'tipo' => $this->input->post("tipo"),
			'estatus' => $this->input->post("estatus"),
			'reportado_por' => $this->input->post("reportado_por"),
			'atiende' => $this->input->post("atiende"),
			'fecha_siniestro' => $this->input->post("fecha_siniestro"),
			'fecha_conclusion' => $this->input->post("fecha_conclusion"),
			'nombre_contacto' => $this->input->post("nombre_contacto"),
			'telefono_contacto' => $this->input->post("telefono"),
			'descripcion_siniestro' => $this->input->post("descripcion_siniestro"),
			'descripcion_seguimiento' => $this->input->post("descripcion_seguimiento")
		);
		$this->db->set($data);
		$this->db->where("idtbl_siniestros", $this->input->post("idtbl_siniestros"));
		$this->db->update("tbl_siniestros_vehiculos");
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Ocurrio un error intente nuevamente';
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

    public function editarSiniestrosContabilidad(){
        $this->db->trans_begin();
        $data = array(
            'observaciones_contabilidad' => $this->input->post("observaciones_contabilidad"),
        );
        $this->db->set($data);
        $this->db->where("idtbl_siniestros", $this->input->post("idtbl_siniestros"));
        $this->db->update("tbl_siniestros_vehiculos");
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 'Ocurrio un error intente nuevamente';
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function incidencias($buscar = '', $inicio = false, $cantidadRegistro = false)
    {
        if($this->input->post('idtbl_usuarios') != ""){
            $condition = " tbl_incidencias.tbl_usuarios_idtbl_usuarios = " . $this->input->post('idtbl_usuarios') . " ";
        }else{
            $condition = " dtl_almacen.iddtl_almacen = " . $this->input->post('iddtl_almacen') . " ";
        }

        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("SELECT dtl_almacen.numero_interno, dtl_almacen.placas, tbl_incidencias.* FROM tbl_incidencias LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_incidencias.dtl_almacen_iddtl_almacen WHERE $condition AND tipo_incidencia = '" . $this->input->post('tipo_incidencia') . "'" . $limit);
        return $query->result();
    }

	public function siniestros($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if ($inicio !== false && $cantidadRegistro !== false) {
			$limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
        $condition = "";
        if($this->input->post("iddtl_almacen") !== NULL){
            $condition = "tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = " . $this->input->post("iddtl_almacen") . " AND";
        }
		$query = $this->db->query("SELECT tbl_siniestros_vehiculos.*, tbl_users.nombre, tbl_usuarios1.idtbl_usuarios AS idtbl_usuarios_reportado_por, tbl_usuarios1.nombres AS nombre_reportado_por, tbl_usuarios1.apellido_paterno AS apellido_paterno_reportado_por, tbl_usuarios1.apellido_materno as apellido_materno_reportado_por, tbl_usuarios2.idtbl_usuarios AS idtbl_usuarios_atiende, tbl_usuarios2.nombres AS nombres_atiende, tbl_usuarios2.apellido_paterno AS apellido_paterno_atiende, tbl_usuarios2.apellido_materno AS apellido_materno_atiende, tbl_tramites_vehiculares.seguro, tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen AS iddtl_almacen, dtl_almacen.numero_interno FROM tbl_siniestros_vehiculos JOIN tbl_tramites_vehiculares ON tbl_tramites_vehiculares.idtbl_tramites_vehiculares = tbl_siniestros_vehiculos.tbl_tramites_vehiculares_idtbl_tramites_vehiculares JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen LEFT JOIN tbl_users ON tbl_siniestros_vehiculos.autor = tbl_users.idtbl_users LEFT JOIN tbl_usuarios AS tbl_usuarios1 ON tbl_siniestros_vehiculos.reportado_por = tbl_usuarios1.idtbl_usuarios LEFT JOIN tbl_usuarios AS tbl_usuarios2 ON tbl_siniestros_vehiculos.atiende = tbl_usuarios2.idtbl_usuarios WHERE " . $condition . " (tbl_tramites_vehiculares.seguro LIKE '%" . $buscar . "%' OR tbl_usuarios1.nombres LIKE '%" . $buscar . "%' OR tbl_usuarios1.apellido_paterno LIKE '%" . $buscar . "%' OR tbl_usuarios1.apellido_materno LIKE '%" . $buscar . "%' OR tbl_siniestros_vehiculos.estatus LIKE '%" . $buscar . "%' OR dtl_almacen.numero_interno LIKE '%" . $buscar . "%') ORDER BY fecha_siniestro DESC "  . $limit );
        $result = $query->result();
        foreach ($result as $value) {
            $value->file = file_exists("./uploads/siniestros/" . $value->idtbl_siniestros . ".pdf");
        }
		return $result;
	}

    public function multas($buscar = '', $inicio = false, $cantidadRegistro = false) {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("SELECT tbl_tramites_vehiculares.*, tbl_usuarios.numero_empleado, tbl_usuarios.nombres, tbl_usuarios.apellido_paterno, tbl_usuarios.apellido_materno FROM tbl_tramites_vehiculares JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_tramites_vehiculares.tbl_usuarios_idtbl_usuarios WHERE tbl_tramites_vehiculares.tipo_tramite = 'multa' AND tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = " . $this->input->post("iddtl_almacen") . " AND ( tbl_usuarios.nombres LIKE '%" . $buscar . "%' OR tbl_usuarios.apellido_paterno LIKE '%" . $buscar . "%' OR tbl_usuarios.apellido_materno LIKE '%" . $buscar . "%') " . $limit);
        $result = $query->result();
        foreach ($result as $item) {
            if(file_exists("./uploads/tramites_vehiculares/".$item->uid.".pdf")){
                $item->file_exists = true;
            }else{
                $item->file_exists = false;
            }
        }
        return $result;
    }

    public function detalleMultas(){
        $query = $this->db->get_where("dtl_multas", array("tbl_tramites_vehiculares_idtbl_tramites_vehiculares" => $this->input->post("idtblTramitesVehiculares")));
        return $query->result();
    }

    public function nuevoFolio()
    {
        $this->db->trans_begin();
        $data = array(
          "folio" => $this->input->post("folio"),
          "estatus_responsabilidad" => $this->input->post("estatus_responsabilidad"),
          "tbl_siniestros_vehiculos_idtbl_siniestros" => $this->input->post("idtbl_siniestros")
        );
        if ($this->input->post("tipo") == "nuevo") {
            $this->db->insert('dtl_siniestros_vehiculos', $data);
        } else {
            $this->db->set($data);
            $this->db->where("iddtl_siniestros", $this->input->post("iddtl_siniestros"));
            $this->db->update('dtl_siniestros_vehiculos');
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return 'Ocurrio un error intente nuevamente';
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function obtenerFoliosSiniestros()
    {
        $query = $this->db->get_where('dtl_siniestros_vehiculos', array("tbl_siniestros_vehiculos_idtbl_siniestros" => $this->input->post("idtbl_siniestros")));
        return $query->result();
    }

    public function incidenciasByUid($uid)
    {
        $query = $this->db->query("SELECT dtl_almacen.numero_interno, dtl_almacen.placas, tbl_incidencias.* FROM tbl_incidencias LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_incidencias.dtl_almacen_iddtl_almacen LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_incidencias.tbl_usuarios_idtbl_usuarios WHERE tbl_incidencias.tipo_incidencia = 'control_vehicular' AND tbl_usuarios.uid = '$uid'");
        return $query->result();
    }

    public function getAutosAsignados($idtbl_usuarios)
    {
        $query = $this->db->query("SELECT * FROM dtl_asignacion LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = dtl_asignacion.dtl_almacen_iddtl_almacen LEFT JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_almacen.tbl_catalogo_idtbl_catalogo WHERE dtl_asignacion.tbl_usuarios_idtbl_usuarios = " . $idtbl_usuarios . " AND dtl_almacen.tbl_almacenes_idtbl_almacenes = " . ID_ALMACEN_AUTOS_CONTROL_VEHICULAR . " AND dtl_asignacion.estatus_asignacion = 'activa'");
        return $query->result();
    }

    public function getModelosAutos(){
        $query = $this->db->query("SELECT idtbl_catalogo, modelo FROM tbl_catalogo JOIN dtl_almacen ON dtl_almacen.tbl_catalogo_idtbl_catalogo = tbl_catalogo.idtbl_catalogo WHERE tipo = 4 AND tbl_catalogo.descripcion != 'PERSONAL' AND ctl_categorias_idctl_categorias = 16 GROUP BY tbl_catalogo.modelo");
        return $query->result();
    }

    public function getAutosModelo(){
        $modelo = $this->input->post('modelo');
        $query = $this->db->query("SELECT dtl_almacen.estatus, COUNT(*) AS total, tbl_catalogo.modelo FROM tbl_catalogo JOIN dtl_almacen ON dtl_almacen.tbl_catalogo_idtbl_catalogo = tbl_catalogo.idtbl_catalogo WHERE tipo = 4 AND tbl_catalogo.descripcion != 'PERSONAL' AND ctl_categorias_idctl_categorias = 16 AND tbl_catalogo.modelo='$modelo' GROUP BY dtl_almacen.estatus ORDER BY dtl_almacen.estatus;");
        //$query = $this->db->query("SELECT da.estatus, COUNT(*) AS total, tc.modelo, (SELECT COUNT(*) AS total FROM tbl_catalogo JOIN dtl_almacen ON dtl_almacen.tbl_catalogo_idtbl_catalogo = tbl_catalogo.idtbl_catalogo WHERE tbl_catalogo.tipo = 4 AND tbl_catalogo.descripcion != 'PERSONAL' AND tbl_catalogo.ctl_categorias_idctl_categorias = 16 AND tbl_catalogo.modelo='MARCH' AND dtl_almacen.estatus=da.estatus AND dtl_almacen.tbl_catalogo_idtbl_catalogo = da.tbl_catalogo_idtbl_catalogo AND dtl_almacen.ubicacion IN('TENAYUCA','FULTON','CDMX','ESTADO DE MEXICO','ALMACEN 12') GROUP BY dtl_almacen.estatus ORDER BY dtl_almacen.estatus) AS estatus_local FROM tbl_catalogo tc JOIN dtl_almacen da ON da.tbl_catalogo_idtbl_catalogo = tc.idtbl_catalogo WHERE tc.tipo = 4 AND tc.descripcion != 'PERSONAL' AND tc.ctl_categorias_idctl_categorias = 16 AND tc.modelo='$modelo' GROUP BY da.estatus ORDER BY da.estatus;");
        return $query->result();
    }
    public function autosestatus()
    {
        $query = $this->db->query("SELECT dtl_almacen.estatus, COUNT(*) AS total, tbl_catalogo.modelo 
        FROM tbl_catalogo 
        JOIN dtl_almacen ON dtl_almacen.tbl_catalogo_idtbl_catalogo = tbl_catalogo.idtbl_catalogo 
        WHERE tipo = 4 
        AND tbl_catalogo.descripcion != 'PERSONAL' 
        AND ctl_categorias_idctl_categorias = 16 
        AND (tbl_catalogo.modelo = '3700DD' OR 
        tbl_catalogo.modelo = '6510' OR tbl_catalogo.modelo = 'AUTOBUS' OR tbl_catalogo.modelo = 'BEAT' OR tbl_catalogo.modelo = 'CAMION' OR tbl_catalogo.modelo = 'CHEVY' OR tbl_catalogo.modelo = 'DURASTAR 4300' OR tbl_catalogo.modelo = 'GOL' OR tbl_catalogo.modelo = 'HILUX' OR tbl_catalogo.modelo = 'KABSTAR' OR tbl_catalogo.modelo = 'KANGOO' OR tbl_catalogo.modelo = 'KWID ICONIC' OR tbl_catalogo.modelo = 'KWID INTENS' OR tbl_catalogo.modelo = 'LOWVOY' OR tbl_catalogo.modelo = 'MARCH' OR tbl_catalogo.modelo = 'MATIZ' OR tbl_catalogo.modelo = 'NP-300' OR tbl_catalogo.modelo = 'PROMASTER RAPID' OR tbl_catalogo.modelo = 'RAM 4000' OR tbl_catalogo.modelo = 'REMOLQUE' OR tbl_catalogo.modelo = 'RTX1250' OR tbl_catalogo.modelo = 'RTX550' OR tbl_catalogo.modelo = 'SPARK' OR tbl_catalogo.modelo = 'TORNADO' OR tbl_catalogo.modelo = 'TSURU' OR tbl_catalogo.modelo = 'URVAN' OR tbl_catalogo.modelo = 'V8550A')
        AND dtl_almacen.estatus NOT LIKE '%reparacion%'
        GROUP BY dtl_almacen.estatus
        ORDER BY dtl_almacen.estatus ");
        return $query->result();
    }

    public function totalCargaDia(){
        $query = $this->db->query("SELECT SUM(precio*litros_combustible) AS total FROM tbl_km_unidades_cv WHERE fecha_carga >= CURDATE()");
        return $query->result();
    }

    public function getUbication($iddtl_almacen){
        $query = $this->db->query("SELECT ubicacion FROM dtl_almacen WHERE iddtl_almacen=$iddtl_almacen");
        return $query->result();
    }

    public function getUbicaciones(){
        $query = $this->db->query("SELECT ubicacion FROM `dtl_almacen` WHERE ubicacion IS NOT NULL GROUP BY ubicacion");
        return $query->result();
    }

    public function getKmEco(){
        $id_almacen = $this->input->post('id_almacen');
        $query = $this->db->query("SELECT dtl_almacen.km_actual FROM dtl_almacen WHERE dtl_almacen.iddtl_almacen='$id_almacen'");
        return $query->result();
    }

    public function getTodosAutosAsignados($idtbl_usuarios)
    {
        $query = $this->db->query("SELECT * FROM dtl_asignacion LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = dtl_asignacion.dtl_almacen_iddtl_almacen LEFT JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_almacen.tbl_catalogo_idtbl_catalogo WHERE dtl_asignacion.tbl_usuarios_idtbl_usuarios = " . $idtbl_usuarios . " AND dtl_almacen.tbl_almacenes_idtbl_almacenes = " . ID_ALMACEN_AUTOS_CONTROL_VEHICULAR . " GROUP BY dtl_almacen.iddtl_almacen");
        return $query->result();
    }

    public function actualizarIncidencia($parametros, $idtbl_incidencias)
    {
        $this->db->where('idtbl_incidencias', $idtbl_incidencias);
        $query = $this->db->update('tbl_incidencias', $parametros);
        $ret = false;
        if ($query) {
            $ret = true;
        }
        return $ret;
    }

    public function tenencias($buscar = '', $select = '', $inicio = false, $cantidadRegistro = false) {
        $buscar2 = '';
        $buscar3 = '';		
        $limit = '';
        $condition = '';
        if($buscar != ""){
            $condition = " AND tbl_tramites_vehiculares.idtbl_tramites_vehiculares LIKE '%" . $buscar . "%'";
        }
        if (strpos($buscar, " ")) {
			$buscar2 = substr($buscar, -2, 2); // Si la cadena tiene espacios trae los últimos dos caracteres
			$buscar3 = substr($buscar, 0, 5);
			if (strpos($buscar2, " ")) {
				$buscar2 = substr($buscar, -1, 1);
				echo $buscar2;
			}
			//echo $buscar3;
			//echo $buscar2;
		}
        if($select == ''){
            $string = "AND (tbl_tramites_vehiculares.pago_estatus = 'Finalizado' OR tbl_tramites_vehiculares.pago_estatus = 'Pendiente')";
        }
        if($select != ''){
            $string = "AND (tbl_tramites_vehiculares.pago_estatus = '$select') ";
        }
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("SELECT tbl_tramites_vehiculares.*, dtl_almacen.numero_interno, tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto FROM tbl_tramites_vehiculares JOIN dtl_almacen ON tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_tramites_vehiculares.tbl_proyectos_idtbl_proyectos  WHERE tipo_tramite = 'tenencia'". $string . $condition . "  ORDER BY tbl_tramites_vehiculares.idtbl_tramites_vehiculares DESC" . $limit);
        return $query->result();
    }

    public function pagos_tenencias_estatus($estatus = "Pendiente"){
        $this->db->trans_begin();
        $fecha_pago = date('Y-m-d');
        $query = $this->db->query("UPDATE tbl_tramites_vehiculares SET proxima_fecha_tramite = '$fecha_pago', pago_estatus = '" . $estatus . "' WHERE idtbl_tramites_vehiculares = " . $this->input->post('idtbl_tramites_vehiculares'));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 'Ocurrio un error intente nuevamente';
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function nuevaMulta(){
        $message = "";
        $this->db->trans_begin();
        if($this->input->post("idtbl_tramites_vehiculares") == ""){
            $this->db->set("fecha_creado", "curdate()", FALSE);
            //$this->db->set("fecha_tramite", $this->input->post("fecha_multa"));
            //$this->db->set("fecha_vigencia", $this->input->post("fecha_vigencia"));
            $this->db->set("detalle_tramite", $this->input->post("detalle_tramite"));
            $this->db->set("quincenas_pago", $this->input->post("quincenas_pago"));
            $this->db->set("tbl_usuarios_idtbl_usuarios", $this->input->post("tbl_usuarios_idtbl_usuarios"));
            $this->db->set("estatus", $this->input->post("estatus"));
            $this->db->set("total_pago", $this->input->post("total_pago"));
            $this->db->set("dtl_almacen_iddtl_almacen", $this->input->post("iddtl_almacen"));
            $this->db->set("tipo_tramite", "multa");
            $this->db->set("uid", uniqid());
            $query = $this->db->insert("tbl_tramites_vehiculares");
            $idtbl_tramites_vehiculares = $this->db->insert_id();
            for($r=0; $r < count($_POST['numero_multa']); $r++){
                $this->db->set("numero_multa", $_POST['numero_multa'][$r]);
                $this->db->set("fecha_multa", $_POST['fecha_multa'][$r]);
                $this->db->set("fecha_vigencia", $_POST['fecha_vigencia'][$r]);
                $this->db->set("tbl_tramites_vehiculares_idtbl_tramites_vehiculares", $idtbl_tramites_vehiculares);
                $this->db->insert("dtl_multas");
            }
            $message = "La multa se registro correctamente.";
        }else{
            //$this->db->set("fecha_tramite", $this->input->post("fecha_multa"));
            //$this->db->set("fecha_vigencia", $this->input->post("fecha_vigencia"));
            $this->db->set("detalle_tramite", $this->input->post("detalle_tramite"));
            $this->db->set("quincenas_pago", $this->input->post("quincenas_pago"));
            $this->db->set("tbl_usuarios_idtbl_usuarios", $this->input->post("tbl_usuarios_idtbl_usuarios"));
            $this->db->set("estatus", $this->input->post("estatus"));
            $this->db->set("total_pago", $this->input->post("total_pago"));
            $this->db->where("idtbl_tramites_vehiculares", $this->input->post("idtbl_tramites_vehiculares"));
            $query = $this->db->update("tbl_tramites_vehiculares");
            if(isset($_POST['numero_multa'])){
                for($r=0; $r < count($_POST['numero_multa']); $r++){
                    $this->db->set("numero_multa", $_POST['numero_multa'][$r]);
                    $this->db->set("fecha_multa", $_POST['fecha_multa'][$r]);
                    $this->db->set("fecha_vigencia", $_POST['fecha_vigencia'][$r]);
                    $this->db->set("tbl_tramites_vehiculares_idtbl_tramites_vehiculares", $this->input->post("idtbl_tramites_vehiculares"));
                    $this->db->insert("dtl_multas");
                }
            }
            $message = "La multa se actualizo correctamente.";
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return array(
                'error' => true,
                'mensaje' => 'Ocurrio un error intente nuevamente'
            );
        } else {
            $this->db->trans_commit();
            return array(
                'error' => false,
                'mensaje' => $message
            );
        }
    }

    public function archivo_multa() {
        $this->load->model('departamentos_model');
        $this->permisos_almacen = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
        if(!$this->permisos_almacen > 1)
          redirect(base_url());
                
        $carpeta = './uploads/tramites_vehiculares/';
        if (!file_exists($carpeta)) {
          mkdir($carpeta, 0755, true);
        }
        $this->load->library('upload');
              
        $config['upload_path'] = $carpeta;
        $config['allowed_types'] = 'pdf';
        $config['overwrite'] = true;
        try {
          if ($this->input->post('tipo_tramite') != 'servicio') {
            $config['file_name'] = $this->input->post('uid');
            $this->upload->initialize($config);
            $this->upload->do_upload('archivo');
            return array("error"=>false, "mensaje"=>'Se cargo el archivo correctamente');

          }
        } catch(Exception $erorr){
            return array("error"=>true, "mensaje"=>'Problemas al cargar el archivo');
        }

    }

    public function verificarSeguros(){
        //$this->load->helper('url');
        $query = $this->db->query("SELECT tbl_tramites_vehiculares.idtbl_tramites_vehiculares, dtl_almacen.numero_interno, tbl_tramites_vehiculares.fecha_tramite, tbl_tramites_vehiculares.proxima_fecha_tramite, tbl_tramites_vehiculares.uid, tbl_tramites_vehiculares.seguro, tbl_tramites_vehiculares.poliza FROM tbl_tramites_vehiculares LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen WHERE tbl_tramites_vehiculares.tipo_tramite = 'seguro' ORDER BY dtl_almacen.numero_interno");
        $result = $query->result();
        $count = 0;
        foreach ($result as $value) {
          $exist = "no";
          if(file_exists("uploads/tramites_vehiculares/$value->uid.pdf")){
            $exist = "si";
          }
          if(file_exists("uploads/tramites_vehiculares/$value->uid.PDF")){
            $exist = "si";
          }
          echo "$value->idtbl_tramites_vehiculares, $value->numero_interno, $value->fecha_tramite, $value->proxima_fecha_tramite, $value->uid, $value->seguro, $value->poliza, $exist </br>";
          $count++;
        }
        echo "----------------------------------------</br>";
        echo "Total usuarios: $count";
    }

    public function verificarVerificacion(){
        $query = $this->db->query("SELECT tbl_tramites_vehiculares.idtbl_tramites_vehiculares, dtl_almacen.numero_interno, tbl_tramites_vehiculares.fecha_tramite, tbl_tramites_vehiculares.proxima_fecha_tramite, tbl_tramites_vehiculares.uid FROM tbl_tramites_vehiculares LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen WHERE tbl_tramites_vehiculares.tipo_tramite = 'verificacion' ORDER BY dtl_almacen.numero_interno");
        $result = $query->result();
        $count = 0;
        foreach ($result as $value) {
          $exist = "no"; 
          if(file_exists("uploads/tramites_vehiculares/$value->uid.pdf")){
            $exist = "si";
          }
          if(file_exists("uploads/tramites_vehiculares/$value->uid.PDF")){
            $exist = "si";
          }
          echo "$value->idtbl_tramites_vehiculares, $value->numero_interno, $value->fecha_tramite, $value->proxima_fecha_tramite, $value->uid, $exist </br>";
          $count++;
        }
        echo "----------------------------------------</br>";
        echo "Total usuarios: $count";
    }

    public function indicadoresServicios(){
        $data = [];
        $query = $this->db->query("SELECT COUNT(*) AS total FROM dtl_almacen JOIN tbl_catalogo  ON dtl_almacen.tbl_catalogo_idtbl_catalogo=tbl_catalogo.idtbl_catalogo WHERE dtl_almacen.tbl_almacenes_idtbl_almacenes = 28 AND tbl_catalogo.descripcion != 'PERSONAL'");
        $data['total_autos'] = $query->result()[0]->total;
        //$query = $this->db->query("SELECT COUNT(*) as total FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida LEFT JOIN dtl_asignacion DAS ON DAS.dtl_almacen_iddtl_almacen = DA.iddtl_almacen LEFT JOIN tbl_usuarios TU ON TU.idtbl_usuarios = DAS.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_entidad ON tbl_entidad.idtbl_entidad = DA.entidad_federativa_placas LEFT JOIN tbl_tramites_vehiculares ON tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DA.iddtl_almacen AND tbl_tramites_vehiculares.idtbl_tramites_vehiculares = (SELECT MAX(t1.idtbl_tramites_vehiculares) FROM tbl_tramites_vehiculares t1 WHERE t1.dtl_almacen_iddtl_almacen = DA.iddtl_almacen and t1.tipo_tramite = 'servicio') LEFT JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares AND dtl_servicio.estatus != 'FINALIZADO' WHERE DA.tbl_almacenes_idtbl_almacenes = 28 AND (TC.tipo = 4) AND (DAS.iddtl_asignacion = (SELECT MAX(iddtl_asignacion) FROM dtl_asignacion t1 WHERE DA.iddtl_almacen = t1.dtl_almacen_iddtl_almacen) OR DAS.estatus_asignacion IS NULL) AND (DA.estatus = 'disponible' OR DA.estatus = 'asignado' OR DA.estatus = 'reparacion' OR DA.estatus = 'taller' OR DA.estatus = 'robado' OR DA.estatus = 'vendida' OR DA.estatus = 'perdida total' OR DA.estatus = 'vendida' OR DA.estatus = 'colision' OR DA.estatus = 'tramite vehicular') AND ((DA.km_servicio - DA.km_actual) > 1000 AND dtl_servicio.iddtl_servicio IS NULL) AND TC.descripcion != 'PERSONAL' ORDER BY DA.numero_interno");
        //$data['total_servicios_corriente'] = $query->result()[0]->total;
        $data['total_servicios_corriente'] = 0;
        $query = $this->db->query("SELECT COUNT(*) as total FROM dtl_almace DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida LEFT JOIN dtl_asignacion DAS ON DAS.dtl_almacen_iddtl_almacen = DA.iddtl_almacen LEFT JOIN tbl_usuarios TU ON TU.idtbl_usuarios = DAS.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_entidad ON tbl_entidad.idtbl_entidad = DA.entidad_federativa_placas LEFT JOIN tbl_tramites_vehiculares ON tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DA.iddtl_almacen AND tbl_tramites_vehiculares.idtbl_tramites_vehiculares = (SELECT MAX(t1.idtbl_tramites_vehiculares) FROM tbl_tramites_vehiculares t1 WHERE t1.dtl_almacen_iddtl_almacen = DA.iddtl_almacen and t1.tipo_tramite = 'servicio') LEFT JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares AND dtl_servicio.estatus != 'FINALIZADO' WHERE DA.tbl_almacenes_idtbl_almacenes = 28 AND (TC.tipo = 4) AND (DAS.iddtl_asignacion = (SELECT MAX(iddtl_asignacion) FROM dtl_asignacion t1 WHERE DA.iddtl_almacen = t1.dtl_almacen_iddtl_almacen) OR DAS.estatus_asignacion IS NULL) AND (DA.estatus = 'disponible' OR DA.estatus = 'asignado' OR DA.estatus = 'reparacion' OR DA.estatus = 'taller' OR DA.estatus = 'robado' OR DA.estatus = 'vendida' OR DA.estatus = 'perdida total' OR DA.estatus = 'vendida' OR DA.estatus = 'colision' OR DA.estatus = 'tramite vehicular') AND (dtl_servicio.iddtl_servicio IS NOT NULL) AND TC.descripcion != 'PERSONAL' ORDER BY DA.numero_interno");
        $data['total_servicios'] = $query->result()[0]->total;
        $query = $this->db->query("SELECT COUNT(*) as total FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida LEFT JOIN dtl_asignacion DAS ON DAS.dtl_almacen_iddtl_almacen = DA.iddtl_almacen LEFT JOIN tbl_usuarios TU ON TU.idtbl_usuarios = DAS.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_entidad ON tbl_entidad.idtbl_entidad = DA.entidad_federativa_placas LEFT JOIN tbl_tramites_vehiculares ON tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DA.iddtl_almacen AND tbl_tramites_vehiculares.idtbl_tramites_vehiculares = (SELECT MAX(t1.idtbl_tramites_vehiculares) FROM tbl_tramites_vehiculares t1 WHERE t1.dtl_almacen_iddtl_almacen = DA.iddtl_almacen and t1.tipo_tramite = 'servicio') LEFT JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares AND dtl_servicio.estatus != 'FINALIZADO' WHERE DA.tbl_almacenes_idtbl_almacenes = 28 AND (TC.tipo = 4) AND (DAS.iddtl_asignacion = (SELECT MAX(iddtl_asignacion) FROM dtl_asignacion t1 WHERE DA.iddtl_almacen = t1.dtl_almacen_iddtl_almacen) OR DAS.estatus_asignacion IS NULL) AND (DA.estatus = 'disponible' OR DA.estatus = 'asignado' OR DA.estatus = 'reparacion' OR DA.estatus = 'taller' OR DA.estatus = 'robado' OR DA.estatus = 'vendida' OR DA.estatus = 'perdida total' OR DA.estatus = 'vendida' OR DA.estatus = 'colision' OR DA.estatus = 'tramite vehicular') AND ((DA.km_servicio - DA.km_actual) > 0 AND (DA.km_servicio - DA.km_actual) <= 1000 AND dtl_servicio.iddtl_servicio IS NULL) AND TC.descripcion != 'PERSONAL' ORDER BY DA.numero_interno");
        $data['total_servicios_proximos'] = $query->result()[0]->total;
        $query = $this->db->query("SELECT COUNT(*) as total FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida LEFT JOIN dtl_asignacion DAS ON DAS.dtl_almacen_iddtl_almacen = DA.iddtl_almacen LEFT JOIN tbl_usuarios TU ON TU.idtbl_usuarios = DAS.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_entidad ON tbl_entidad.idtbl_entidad = DA.entidad_federativa_placas LEFT JOIN tbl_tramites_vehiculares ON tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DA.iddtl_almacen AND tbl_tramites_vehiculares.idtbl_tramites_vehiculares = (SELECT MAX(t1.idtbl_tramites_vehiculares) FROM tbl_tramites_vehiculares t1 WHERE t1.dtl_almacen_iddtl_almacen = DA.iddtl_almacen and t1.tipo_tramite = 'servicio') LEFT JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares AND dtl_servicio.estatus != 'FINALIZADO' WHERE DA.tbl_almacenes_idtbl_almacenes = 28 AND (TC.tipo = 4) AND (DAS.iddtl_asignacion = (SELECT MAX(iddtl_asignacion) FROM dtl_asignacion t1 WHERE DA.iddtl_almacen = t1.dtl_almacen_iddtl_almacen) OR DAS.estatus_asignacion IS NULL) AND (DA.estatus = 'disponible' OR DA.estatus = 'asignado' OR DA.estatus = 'reparacion' OR DA.estatus = 'taller' OR DA.estatus = 'robado' OR DA.estatus = 'vendida' OR DA.estatus = 'perdida total' OR DA.estatus = 'vendida' OR DA.estatus = 'colision' OR DA.estatus = 'tramite vehicular') AND (DA.km_servicio != 0 AND DA.km_servicio IS NOT NULL AND (DA.km_servicio - DA.km_actual) < 0 AND dtl_servicio.iddtl_servicio IS NULL) AND TC.descripcion != 'PERSONAL' ORDER BY DA.numero_interno");
        $data['total_servicios_caducados'] = $query->result()[0]->total;
        $query = $this->db->query("SELECT COUNT(*) as total FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida LEFT JOIN dtl_asignacion DAS ON DAS.dtl_almacen_iddtl_almacen = DA.iddtl_almacen LEFT JOIN tbl_usuarios TU ON TU.idtbl_usuarios = DAS.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_entidad ON tbl_entidad.idtbl_entidad = DA.entidad_federativa_placas LEFT JOIN tbl_tramites_vehiculares ON tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DA.iddtl_almacen AND tbl_tramites_vehiculares.idtbl_tramites_vehiculares = (SELECT MAX(t1.idtbl_tramites_vehiculares) FROM tbl_tramites_vehiculares t1 WHERE t1.dtl_almacen_iddtl_almacen = DA.iddtl_almacen and t1.tipo_tramite = 'servicio') LEFT JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares AND dtl_servicio.estatus != 'FINALIZADO' WHERE DA.tbl_almacenes_idtbl_almacenes = 28 AND (TC.tipo = 4) AND (DAS.iddtl_asignacion = (SELECT MAX(iddtl_asignacion) FROM dtl_asignacion t1 WHERE DA.iddtl_almacen = t1.dtl_almacen_iddtl_almacen) OR DAS.estatus_asignacion IS NULL) AND (DA.estatus = 'disponible' OR DA.estatus = 'asignado' OR DA.estatus = 'reparacion' OR DA.estatus = 'taller' OR DA.estatus = 'robado' OR DA.estatus = 'vendida' OR DA.estatus = 'perdida total' OR DA.estatus = 'vendida' OR DA.estatus = 'colision' OR DA.estatus = 'tramite vehicular') AND ((DA.km_servicio = 0 OR DA.km_servicio IS NULL) AND dtl_servicio.iddtl_servicio IS NULL) AND TC.descripcion != 'PERSONAL' ORDER BY DA.numero_interno");
        $data['total_sin_km_definido'] = $query->result()[0]->total;
        return $data;
    }

    public function productividadControlVehicular(){
        $anio = $this->input->post("anio");
        $condition = "";
        if($this->input->post("id_mecanicos") != ""){
            $condition = "AND dtl_servicio.tbl_users_idtbl_users = " . $this->input->post("id_mecanicos");
        }
        $data = [];
        $query = $this->db->query("SELECT MONTH(dtl_servicio.fecha_finalizacion) AS mes, YEAR(dtl_servicio.fecha_finalizacion) AS anio, COUNT(*) AS total FROM tbl_tramites_vehiculares JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares WHERE dtl_servicio.fecha_finalizacion IS NOT NULL AND tipo_tramite = 'servicio' AND YEAR(dtl_servicio.fecha_finalizacion) = " . $anio . " " . $condition . " GROUP BY MONTH(dtl_servicio.fecha_finalizacion), YEAR(dtl_servicio.fecha_finalizacion)");
        $data['total_servicios_anio_mes'] = $query->result();
        $query = $this->db->query('SELECT MONTH(dtl_servicio.fecha_finalizacion) AS mes, YEAR(dtl_servicio.fecha_finalizacion) AS anio, FLOOR(AVG(TIMESTAMPDIFF(MINUTE, dtl_servicio.fecha_inicio, dtl_servicio.fecha_finalizacion) - dtl_servicio.tiempo_minutos_pausa)/60) productividad FROM tbl_tramites_vehiculares JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares WHERE dtl_servicio.fecha_finalizacion IS NOT NULL AND tipo_tramite = "servicio" AND YEAR(dtl_servicio.fecha_finalizacion) = ' . $anio  . ' ' . $condition . ' GROUP BY MONTH(dtl_servicio.fecha_finalizacion), YEAR(dtl_servicio.fecha_finalizacion)');
        $data['total_productividad_anio_mes'] = $query->result();
        $query = $this->db->query('SELECT MONTH(dtl_servicio.fecha_finalizacion) AS mes, YEAR(dtl_servicio.fecha_finalizacion) AS anio, COUNT(*) AS total_servicios, FLOOR(AVG(TIMESTAMPDIFF(MINUTE, dtl_servicio.fecha_inicio, dtl_servicio.fecha_finalizacion) - dtl_servicio.tiempo_minutos_pausa)/60) AS productividad, tbl_users.idtbl_users, tbl_users.nombre FROM tbl_tramites_vehiculares JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares JOIN tbl_users ON tbl_users.idtbl_users = dtl_servicio.tbl_users_idtbl_users WHERE dtl_servicio.fecha_finalizacion IS NOT NULL AND tipo_tramite = "servicio" AND YEAR(dtl_servicio.fecha_finalizacion) = ' . $anio . ' GROUP BY MONTH(dtl_servicio.fecha_finalizacion), YEAR(dtl_servicio.fecha_finalizacion), dtl_servicio.tbl_users_idtbl_users');
        $data['total_productividad_general_mecanicos_anio'] = $query->result();
        $data['mecanicos'] = $this->todos_los_mecanicos_activos();
        return $data;
    }

    public function productividadControlVehicularPorRangoFecha(){
        $condition = "";
        $fecha_inicio = $this->input->post("fecha_inicio");
        $fecha_final = $this->input->post("fecha_final");
        if($this->input->post("rt0") != ""){
            $condition = "AND json_extract(tbl_checklist_servicio.checklist_tecnico, '$.rt0') = '" . $this->input->post("rt0") . "' ";
        }
        if($this->input->post("id_mecanicos") != ""){
            $condition = "AND dtl_servicio.tbl_users_idtbl_users = " . $this->input->post("id_mecanicos");
        }
        $data = [];
        $query = $this->db->query("SELECT DATE_FORMAT(dtl_servicio.fecha_finalizacion,'%d-%m-%Y') AS fecha, COUNT(*) AS total FROM tbl_tramites_vehiculares JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares JOIN tbl_checklist_servicio ON tbl_checklist_servicio.uid_servicio = tbl_tramites_vehiculares.uid WHERE dtl_servicio.fecha_finalizacion IS NOT NULL AND tipo_tramite = 'servicio' AND dtl_servicio.fecha_finalizacion >= '$fecha_inicio 00:00:00' AND dtl_servicio.fecha_finalizacion <= '$fecha_final 23:59:59' $condition GROUP BY DAY(dtl_servicio.fecha_finalizacion), MONTH(dtl_servicio.fecha_finalizacion), YEAR(dtl_servicio.fecha_finalizacion) ORDER BY dtl_servicio.fecha_finalizacion");
        $data['total_servicios'] = $query->result();
        $query = $this->db->query("SELECT DATE_FORMAT(dtl_servicio.fecha_finalizacion,'%d-%m-%Y') AS fecha, FLOOR(AVG(TIMESTAMPDIFF(MINUTE, dtl_servicio.fecha_inicio, dtl_servicio.fecha_finalizacion) - dtl_servicio.tiempo_minutos_pausa)/60) productividad FROM tbl_tramites_vehiculares JOIN dtl_servicio ON dtl_servicio.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = tbl_tramites_vehiculares.idtbl_tramites_vehiculares JOIN tbl_checklist_servicio ON tbl_checklist_servicio.uid_servicio = tbl_tramites_vehiculares.uid WHERE dtl_servicio.fecha_finalizacion IS NOT NULL AND tipo_tramite = 'servicio' AND dtl_servicio.fecha_finalizacion >= '$fecha_inicio 00:00:00' AND dtl_servicio.fecha_finalizacion <= '$fecha_final 23:59:59' $condition GROUP BY DAY(dtl_servicio.fecha_finalizacion), MONTH(dtl_servicio.fecha_finalizacion), YEAR(dtl_servicio.fecha_finalizacion) ORDER BY dtl_servicio.fecha_finalizacion");
        $data['total_productividad'] = $query->result();
        return $data;
    }

    public function costoSeguroVerificacionMesAnio(){
        $anio = $this->input->post("anio");
        $data = [];
        $query = $this->db->query('SELECT YEAR(fecha_tramite) AS anio, MONTH(fecha_tramite) AS mes, SUM(costo) AS costo FROM tbl_tramites_vehiculares WHERE tipo_tramite = "seguro" AND YEAR(fecha_tramite) = ' . $anio . ' GROUP BY YEAR(fecha_tramite), MONTH(fecha_tramite)');
        $data['costo_seguro_mes_anio'] = $query->result();
        $query = $this->db->query('SELECT YEAR(fecha_tramite) AS anio, MONTH(fecha_tramite) AS mes, SUM(costo) AS costo FROM tbl_tramites_vehiculares WHERE tipo_tramite = "verificacion" AND YEAR(fecha_tramite) = ' . $anio . ' GROUP BY YEAR(fecha_tramite), MONTH(fecha_tramite);');
        $data['costo_verificacion_mes_anio'] = $query->result();
        return $data;
    }

    public function getDetalleSolicitudRefacciones($idtbl_tramites_vehiculares){
        $this->db->select('tbl_solicitud_material.estatus_solicitud');
        $this->db->select('tbl_solicitud_material.uid as uid_tbl_solicitud_material');
        $this->db->select('dtl_solicitud_material.*');
        $this->db->select('tbl_catalogo.*');
        $this->db->select('ctl_unidades_medida.unidad_medida_abr');
        $this->db->from('tbl_solicitud_material');
        $this->db->join('dtl_solicitud_material', 'tbl_solicitud_material.idtbl_solicitud_material = dtl_solicitud_material.tbl_solicitud_material_idtbl_solicitud_material');
        $this->db->join('tbl_catalogo', 'tbl_catalogo.idtbl_catalogo=dtl_solicitud_material.tbl_catalogo_idtbl_catalogo', 'left');
        $this->db->join('ctl_unidades_medida', 'tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
        $this->db->where('tbl_solicitud_material.tbl_tramites_vehiculares_idtbl_tramites_vehiculares', $idtbl_tramites_vehiculares);
        $this->db->where('tbl_solicitud_material.estatus_solicitud !=', "cancelada RCV");
        $this->db->where('tbl_solicitud_material.estatus_solicitud !=', "cancelada AG");
        $this->db->where('tbl_solicitud_material.estatus_solicitud !=', "modificada CV");
        $this->db->where('tbl_solicitud_material.estatus_solicitud !=', "modificada AG");
        $query = $this->db->get();
        return $query->result();
    }

    public function getDetalleSolicitudRefaccionesCanceladas($idtbl_tramites_vehiculares){
        $this->db->select('tbl_solicitud_material.uid, tbl_solicitud_material.estatus_solicitud');
        $this->db->from('tbl_solicitud_material');
        $this->db->where('tbl_solicitud_material.tbl_tramites_vehiculares_idtbl_tramites_vehiculares', $idtbl_tramites_vehiculares);
        $this->db->group_start();
        $this->db->where('tbl_solicitud_material.estatus_solicitud', "cancelada RCV");
        $this->db->or_where('tbl_solicitud_material.estatus_solicitud', "cancelada AG");
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result();
    }

    public function cargaCombustibleManual(){
        $this->db->trans_begin();
        $this->db->set('km_actual', $this->input->post('km_actual'));
        $this->db->set('litros_combustible', $this->input->post('litros_combustible'));
        $this->db->set('precio', $this->input->post('precio'));
        $this->db->set('dtl_almacen_iddtl_almacen', $this->input->post('eco'));
        $this->db->set('tbl_users_idtbl_users', $this->session->userdata('id'));
        $this->db->set('tipo_combustible', $this->input->post('tipo_gas'));
        $this->db->set('tbl_proyectos_idtbl_proyectos', $this->input->post('idtbl_proyectos'));
        $this->db->set('fecha_carga', $this->input->post('fecha'));
        $this->db->set('tipo_carga','extemporaneo');
        $query = $this->db->insert('tbl_km_unidades_cv');

        $this->db->set('numero_interno', $this->input->post('eco'));
        $this->db->set('km_actual', $this->input->post('km_actual'));
        $this->db->where('iddtl_almacen', $this->input->post('iddtl_almacen'));
        $this->db->update("dtl_almacen");

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }


    
    public function cargarCombustible(){
        $this->db->trans_begin();
        $this->db->set('km_actual', $this->input->post('km_actual'));
        $this->db->set('litros_combustible', $this->input->post('litros_combustible'));
        $this->db->set('precio', $this->input->post('precio'));
        $this->db->set('dtl_almacen_iddtl_almacen', $this->input->post('iddtl_almacen'));
        $this->db->set('tbl_users_idtbl_users', $this->session->userdata('id'));
        $this->db->set('tipo_combustible', $this->input->post('tipo_combustible'));
        $this->db->set('tbl_proyectos_idtbl_proyectos', $this->input->post('idtbl_proyectos'));
        $this->db->set('fecha_carga', 'NOW()', FALSE);
        $this->db->set('tipo_carga','normal');
        $query = $this->db->insert('tbl_km_unidades_cv');

        $this->db->set('km_actual', $this->input->post('km_actual'));
        $this->db->where('iddtl_almacen', $this->input->post('iddtl_almacen'));
        $this->db->update("dtl_almacen");

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function cargarCombustibleManualMultiple(){
        $this->db->trans_begin();
        foreach($this->input->post('eco') AS $key => $value){
            $this->db->set('km_actual', $this->input->post('km_actual')[$key]);
            $this->db->set('litros_combustible', $this->input->post('litros_combustible')[$key]);
            $this->db->set('precio', $this->input->post('precio')[$key]);
            $this->db->set('dtl_almacen_iddtl_almacen', $this->input->post('eco')[$key]);
            $this->db->set('tbl_users_idtbl_users', $this->session->userdata('id'));
            $this->db->set('tipo_combustible', $this->input->post('tipo_gas')[$key]);
            $this->db->set('tbl_proyectos_idtbl_proyectos', $this->input->post('idtbl_proyectos')[$key]);
            $this->db->set('fecha_carga', 'NOW()', FALSE);
            $this->db->set('tipo_carga', isset($this->input->post('ubicacion')[$key]) ? $this->input->post('ubicacion')[$key] : 'normal');
            $this->db->set('vale', $this->input->post('vale'));
            $query = $this->db->insert('tbl_km_unidades_cv');

            $this->db->set('km_actual', $this->input->post('km_actual')[$key]);
            $this->db->where('iddtl_almacen', $this->input->post('eco')[$key]);
            $this->db->update("dtl_almacen");
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function cargaDia($buscar = '', $select = '', $inicio = false, $cantidadRegistro = false) {
		$buscar2 = '';
		$buscar3 = '';
		$limit = '';
		if ($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
		if (strpos($buscar, " ")) {
			$buscar2 = substr($buscar, -2, 2); // Si la cadena tiene espacios trae los últimos dos caracteres
			$buscar3 = substr($buscar, 0, 5);
			if (strpos($buscar2, " ")) {
				$buscar2 = substr($buscar, -1, 1);
				echo $buscar2;
			}
			//echo $buscar3;
			//echo $buscar2;
		}
		if($select == '') {
			$string = "AND (DA.estatus = 'disponible' OR DA.estatus = 'asignado' OR DA.estatus = 'reparacion' OR DA.estatus = 'taller' OR DA.estatus = 'robado' OR DA.estatus = 'vendida' OR DA.estatus = 'perdida total' OR DA.estatus = 'vendida' OR DA.estatus = 'colision' OR DA.estatus = 'tramite vehicular')";
		}
		if($select != '') {
			$string = "AND (DA.estatus = '$select') ";
		}
		if ($buscar2 != '') {
			//$query = $this->db->query("SELECT DA.*, TC.*, CC.*, CUM.* FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida WHERE DA.tbl_almacenes_idtbl_almacenes = " . ID_ALMACEN_AUTOS_CONTROL_VEHICULAR . " AND (CC.idctl_categorias = 30) $string AND (TC.uid LIKE '%$buscar%' OR TC.neodata LIKE '%$buscar%' OR TC.marca LIKE '%$buscar%' OR TC.modelo LIKE '%$buscar%' OR TC.descripcion LIKE '%$buscar%' OR DA.numero_serie LIKE '%$buscar%' OR (TC.descripcion LIKE '%$buscar3%' AND DA.numero_interno LIKE '%$buscar2%') OR DA.numero_interno LIKE '%$buscar%' OR DA.estatus LIKE '%$buscar%' OR CC.abreviatura LIKE '%$buscar%') " . $limit);
			$query = $this->db->query("SELECT DA.*, DA.placas AS placas_auto, DA.estatus AS estatusAlmacen, TC.*, CC.*, CUM.*, TU.nombres, TU.apellido_paterno, TU.apellido_materno, DAS.estatus_asignacion, TU.idtbl_usuarios, tbl_entidad.nombre_entidad, tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida LEFT JOIN dtl_asignacion DAS ON DAS.dtl_almacen_iddtl_almacen = DA.iddtl_almacen LEFT JOIN tbl_usuarios TU ON TU.idtbl_usuarios = DAS.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_proyectos ON TU.tbl_proyectos_idtbl_proyectos = tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_km_unidades_cv tku ON tku.dtl_almacen_iddtl_almacen = DA.iddtl_almacen LEFT JOIN tbl_entidad ON tbl_entidad.idtbl_entidad = DA.entidad_federativa_placas WHERE DA.tbl_almacenes_idtbl_almacenes = 28 AND (TC.tipo = 4) AND (DAS.iddtl_asignacion = (SELECT MAX(iddtl_asignacion) FROM dtl_asignacion t1 WHERE DA.iddtl_almacen = t1.dtl_almacen_iddtl_almacen) OR DAS.estatus_asignacion IS NULL) AND tku.fecha_carga >= CURDATE() AND (DA.estatus = 'disponible' OR DA.estatus = 'asignado' OR DA.estatus = 'reparacion' OR DA.estatus = 'taller' OR DA.estatus = 'robado' OR DA.estatus = 'vendida' OR DA.estatus = 'perdida total' OR DA.estatus = 'vendida' OR DA.estatus = 'colision' OR DA.estatus = 'tramite vehicular') AND (CONCAT(TU.nombres, ' ', TU.apellido_paterno, ' ', TU.apellido_materno) LIKE '%%' OR TC.uid LIKE '%%' OR TC.neodata LIKE '%%' OR TC.marca LIKE '%%' OR TC.modelo LIKE '%%' OR TC.descripcion LIKE '%%' OR DA.numero_serie LIKE '%%' OR DA.numero_interno LIKE '%%' OR DA.estatus LIKE '%%' OR CC.abreviatura LIKE '%%') ORDER BY DA.numero_interno " . $limit);
		} else {
			//$query = $this->db->query("SELECT DA.*, TC.*, CC.*, CUM.* FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida WHERE DA.tbl_almacenes_idtbl_almacenes = " . ID_ALMACEN_AUTOS_CONTROL_VEHICULAR . " AND (CC.idctl_categorias = 30) $string AND (TC.uid LIKE '%$buscar%' OR TC.neodata LIKE '%$buscar%' OR TC.marca LIKE '%$buscar%' OR TC.modelo LIKE '%$buscar%' OR TC.descripcion LIKE '%$buscar%' OR DA.numero_serie LIKE '%$buscar%' OR DA.numero_interno LIKE '%$buscar%' OR DA.estatus LIKE '%$buscar%' OR CC.abreviatura LIKE '%$buscar%') " . $limit);
			$query = $this->db->query("SELECT DA.*, DA.placas AS placas_auto, DA.estatus AS estatusAlmacen, TC.*, CC.*, CUM.*, TU.nombres, TU.apellido_paterno, TU.apellido_materno, DAS.estatus_asignacion, TU.idtbl_usuarios, tbl_entidad.nombre_entidad, tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida LEFT JOIN dtl_asignacion DAS ON DAS.dtl_almacen_iddtl_almacen = DA.iddtl_almacen LEFT JOIN tbl_usuarios TU ON TU.idtbl_usuarios = DAS.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_proyectos ON TU.tbl_proyectos_idtbl_proyectos = tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_km_unidades_cv tku ON tku.dtl_almacen_iddtl_almacen = DA.iddtl_almacen LEFT JOIN tbl_entidad ON tbl_entidad.idtbl_entidad = DA.entidad_federativa_placas WHERE DA.tbl_almacenes_idtbl_almacenes = 28 AND (TC.tipo = 4) AND (DAS.iddtl_asignacion = (SELECT MAX(iddtl_asignacion) FROM dtl_asignacion t1 WHERE DA.iddtl_almacen = t1.dtl_almacen_iddtl_almacen) OR DAS.estatus_asignacion IS NULL) AND tku.fecha_carga >= CURDATE() AND (DA.estatus = 'disponible' OR DA.estatus = 'asignado' OR DA.estatus = 'reparacion' OR DA.estatus = 'taller' OR DA.estatus = 'robado' OR DA.estatus = 'vendida' OR DA.estatus = 'perdida total' OR DA.estatus = 'vendida' OR DA.estatus = 'colision' OR DA.estatus = 'tramite vehicular') AND (CONCAT(TU.nombres, ' ', TU.apellido_paterno, ' ', TU.apellido_materno) LIKE '%%' OR TC.uid LIKE '%%' OR TC.neodata LIKE '%%' OR TC.marca LIKE '%%' OR TC.modelo LIKE '%%' OR TC.descripcion LIKE '%%' OR DA.numero_serie LIKE '%%' OR DA.numero_interno LIKE '%%' OR DA.estatus LIKE '%%' OR CC.abreviatura LIKE '%%') ORDER BY DA.numero_interno " . $limit);

				//$this->db->join('tbl_tramites_vehiculares', 'tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DAM.iddtl_almacen AND tbl_tramites_vehiculares.tipo_tramite = "seguro" AND tbl_tramites_vehiculares.idtbl_tramites_vehiculares = (SELECT MAX(tbl_tramites_vehiculares.idtbl_tramites_vehiculares) FROM tbl_tramites_vehiculares WHERE tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DAM.iddtl_almacen AND tbl_tramites_vehiculares.tipo_tramite = "seguro")');	
		}
		return $query->result();
	}

 
    public function registro_caja_chica($uid){
        $this->db->trans_begin();
        $this->db->set('fecha_compra', $this->input->post('fecha_compra'));
        $this->db->set('uid', $uid);
        $this->db->set('comprobante', $this->input->post('comprobante'));
        $this->db->set('tipo', $this->input->post('tipo'));
        $this->db->set('descripcion',  $this->input->post('descripcion'));
        $this->db->set('monto', $this->input->post('costo'));
        $this->db->set('dtl_almacen_iddtl_almacen ', $this->input->post("iddtl_almacen") != "" ? $this->input->post("iddtl_almacen") : NULL );
        $this->db->set('tbl_tramites_vehiculares_idtbl_tramites_vehiculares', $this->input->post("idtbl_tramites_vehiculares") != "" ? $this->input->post("idtbl_tramites_vehiculares") : NULL);
        $this->db->set('tbl_proyectos_idtbl_proyectos', $this->input->post("idtbl_proyectos"));
        if($this->input->post('idtbl_caja_chica') != ""){
            $this->db->where('idtbl_caja_chica', $this->input->post('idtbl_caja_chica'));
            $this->db->update('tbl_caja_chica');
        }else{
            $this->db->insert('tbl_caja_chica');
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function registro_bitacora($uid){
        $this->db->trans_begin();
        $this->db->set('fecha', date('Y-m-d'));
        $this->db->set('uid', $uid);
        $this->db->set('tbl_users_idtbl_users', $this->session->userdata('id'));
        $this->db->set('dtl_almacen_iddtl_almacen', $this->input->post('unidad'));
        $this->db->set('hora', date('H:i:s'));
        $this->db->set('resguardo', $this->input->post('resguardo'));
        $this->db->set('destino', $this->input->post('destino'));
        $this->db->set('hora_arribo', $this->input->post('hora_arribo'));
        $this->db->set('estatus',  $this->input->post('estatus'));
        $this->db->set('incidencia', $this->input->post('incidencias') != "" ? $this->input->post('incidencias') : NULL);
        $this->db->set('descuento', $this->input->post('descuento') != "" ? $this->input->post('descuento') : NULL);
        $this->db->set('dtl_almacen_iddtl_almacen ', $this->input->post("unidad") != "" ? $this->input->post("unidad") : NULL );
        $this->db->set('tbl_proyectos_idtbl_proyectos', $this->input->post("idtbl_proyectos"));
        $this->db->set('observaciones', $this->input->post('observaciones'));
        $this->db->set('tbl_usuarios_idtbl_usuarios', $this->input->post('idtbl_usuarios'));
        $this->db->insert('tbl_bitacora');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    

    public function eliminar_registro_caja_chica(){
        $this->db->trans_begin();
        $this->db->where('idtbl_caja_chica', $this->input->post('idtbl_caja_chica'));
        $this->db->delete('tbl_caja_chica');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function obtener_caja_chica($fecha_inicial = '', $fecha_final = '', $inicio = false, $cantidadRegistro = false, $totalSum = false){
        if($this->input->post('idtbl_tramites_vehiculares') != NULL){
            $columns = "tbl_caja_chica.*, tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto, dtl_almacen.numero_interno";
            $condition = "";
            if($totalSum){
                $columns = "FORMAT(SUM(tbl_caja_chica.monto), 2) AS monto";
                $condition = "AND tbl_caja_chica.confirmacion != 3";
            }
            $query = $this->db->query("SELECT $columns FROM tbl_caja_chica LEFT JOIN dtl_almacen ON tbl_caja_chica.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_caja_chica.tbl_proyectos_idtbl_proyectos WHERE tbl_caja_chica.uid_solicitud_recursos IS NULL AND tbl_tramites_vehiculares_idtbl_tramites_vehiculares = " . $this->input->post('idtbl_tramites_vehiculares') . " $condition ORDER BY tbl_caja_chica.fecha_compra DESC, tbl_caja_chica.idtbl_caja_chica DESC ");
        }else{
            $buscar = "";
            if($this->input->post('iddtl_almacen') != NULL){
                $buscar = " dtl_almacen_iddtl_almacen = " . $this->input->post('iddtl_almacen') . " ";
            }
            if($fecha_inicial != "" && $fecha_final != ""){
                if($buscar != ""){
                    $buscar = $buscar . " AND ";
                }
                $buscar = $buscar . " fecha_compra BETWEEN '$fecha_inicial' AND '$fecha_final' ";
            }
            if($this->session->userdata("tipo") == 16){
                if($buscar != ""){
                    $buscar = $buscar . " AND ";
                }
                $buscar = $buscar . " (confirmacion > 0) ";
            }
            if($this->session->userdata('tipo') == 19){
                if($buscar != ""){
                    $buscar = $buscar . " AND ";
                }
                $user = $this->session->userdata('id');
                $buscar = $buscar . " tbl_users_idtbl_users_aprobacion = $user";
            }
            if($this->input->post("tipo") != NULL){
                if($buscar != ""){
                    $buscar = $buscar . " AND ";
                }
                if($this->input->post("tipo") == "contable"){
                    $buscar = $buscar . " comprobante = 'factura' ";
                }else{
                    $buscar = $buscar . " comprobante != 'factura' ";
                }
            }
            $limit = '';
            if ($inicio !== false && $cantidadRegistro !== false) {
                $limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
            }
            $columns = "tbl_caja_chica.*, tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto, dtl_almacen.numero_interno";
            $condition = "";
            if($totalSum){
                $columns = "FORMAT(SUM(tbl_caja_chica.monto), 2) AS monto";
                $condition = "AND tbl_caja_chica.confirmacion != 3";
            }
            $query = $this->db->query("SELECT $columns FROM tbl_caja_chica LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_caja_chica.tbl_proyectos_idtbl_proyectos LEFT JOIN dtl_almacen ON tbl_caja_chica.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen " . ($buscar != "" ? " WHERE  tbl_caja_chica.uid_solicitud_recursos IS NULL AND " . $buscar : "") . " $condition ORDER BY tbl_caja_chica.fecha_compra DESC, tbl_caja_chica.idtbl_caja_chica DESC " . $limit);
        }
        return $query->result();
    }

    public function obtener_bitacora_incidencias($fecha_inicial = '', $fecha_final = '', $inicio = false, $cantidadRegistro = false){
        $buscar = "";
        
        if($fecha_inicial != "" && $fecha_final != ""){
            if($buscar != ""){
                $buscar = $buscar . " AND ";
            }
            $buscar = $buscar . " fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ";
        }
        
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $columns = "tbl_bitacora.*, tbl_users.nombre AS nombres_user, dtl_almacen.numero_interno, tbl_usuarios.nombres, tbl_usuarios.apellido_paterno, tbl_usuarios.apellido_materno, tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto";
        $condition = " tbl_bitacora.incidencia IS NOT NULL AND tbl_bitacora.estatus != 'FINALIZADO'";

        $query = $this->db->query("SELECT $columns FROM tbl_bitacora LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_bitacora.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_bitacora.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_users ON tbl_bitacora.tbl_users_idtbl_users = tbl_users.idtbl_users LEFT JOIN dtl_almacen ON tbl_bitacora.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen WHERE" . " $condition ORDER BY tbl_bitacora.fecha DESC, tbl_bitacora.idtbl_bitacora DESC " . $limit);
    return $query->result();
    }

    public function obtener_bitacora($fecha_inicial = '', $fecha_final = '', $inicio = false, $cantidadRegistro = false){
            $buscar = "";
            
            if($fecha_inicial != "" && $fecha_final != ""){
                if($buscar != ""){
                    $buscar = $buscar . " AND ";
                }
                $buscar = $buscar . " fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ";
            }
            
            $limit = '';
            if ($inicio !== false && $cantidadRegistro !== false) {
                $limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
            }
            $columns = "tbl_bitacora.*, tbl_users.nombre AS nombres_user, dtl_almacen.numero_interno, tbl_usuarios.nombres, tbl_usuarios.apellido_paterno, tbl_usuarios.apellido_materno, tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto";
            $condition = " tbl_bitacora.incidencia IS NULL AND tbl_bitacora.estatus != 'FINALIZADO'";

            $query = $this->db->query("SELECT $columns FROM tbl_bitacora LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_bitacora.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_bitacora.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_users ON tbl_bitacora.tbl_users_idtbl_users = tbl_users.idtbl_users LEFT JOIN dtl_almacen ON tbl_bitacora.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen WHERE" . " $condition ORDER BY tbl_bitacora.fecha DESC, tbl_bitacora.idtbl_bitacora DESC " . $limit);
        return $query->result();
    }

    public function obtener_bitacora_finalizados($fecha_inicial = '', $fecha_final = '', $inicio = false, $cantidadRegistro = false){
        $buscar = "";
        
        if($fecha_inicial != "" && $fecha_final != ""){
            if($buscar != ""){
                $buscar = $buscar . " AND ";
            }
            $buscar = $buscar . " fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ";
        }
        
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = ' LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $columns = "tbl_bitacora.*, tbl_users.nombre AS nombres_user, dtl_almacen.numero_interno, tbl_usuarios.nombres, tbl_usuarios.apellido_paterno, tbl_usuarios.apellido_materno, tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto";
        $condition = " tbl_bitacora.estatus = 'FINALIZADO'";

        $query = $this->db->query("SELECT $columns FROM tbl_bitacora LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_bitacora.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_bitacora.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_users ON tbl_bitacora.tbl_users_idtbl_users = tbl_users.idtbl_users LEFT JOIN dtl_almacen ON tbl_bitacora.dtl_almacen_iddtl_almacen = dtl_almacen.iddtl_almacen WHERE" . " $condition ORDER BY tbl_bitacora.fecha DESC, tbl_bitacora.idtbl_bitacora DESC " . $limit);
    return $query->result();
}

    public function excel_caja_chica($iddtl_almacen = '', $tipo = '', $fecha_inicial = '', $fecha_final = ''){
        $buscar = "";
        if($iddtl_almacen != "" && $iddtl_almacen != "null"){
            $buscar = " dtl_almacen_iddtl_almacen = " . $iddtl_almacen . " ";
        }
        if($tipo != "" && $tipo != "null"){
            if($buscar != ""){
                $buscar = $buscar . " AND ";
            }
            if($tipo == "contable"){
                $buscar = " tbl_caja_chica.comprobante = 'factura' ";
            }else{
                $buscar = " tbl_caja_chica.comprobante != 'factura' ";
            }
        }
        if($fecha_inicial != "" && $fecha_final != ""){
            if($buscar != ""){
                $buscar = $buscar . " AND ";
            }
            $buscar = $buscar . " fecha_compra BETWEEN '$fecha_inicial' AND '$fecha_final' ";
        }
        if($this->session->userdata("tipo") == 16){
            if($buscar != ""){
                $buscar = $buscar . " AND ";
            }
            $buscar = $buscar . " (confirmacion > 0)";
        }
        $query = $this->db->query("SELECT tbl_caja_chica.*, dtl_almacen.numero_interno, tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto FROM tbl_caja_chica LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_caja_chica.dtl_almacen_iddtl_almacen LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_caja_chica.tbl_proyectos_idtbl_proyectos " . ($buscar != "" ? " WHERE tbl_caja_chica.uid_solicitud_recursos IS NULL AND " . $buscar : "") . " ORDER BY tbl_caja_chica.fecha_compra DESC, tbl_caja_chica.idtbl_caja_chica DESC ");
        return $query->result();
    }

    public function excel_general_caja_chica(){
        $buscar = "";
        if($this->input->post('fecha_inicial') != "" && $this->input->post('fecha_final') != ""){
            $buscar = " AND tbl_caja_chica.fecha_compra BETWEEN '" . $this->input->post('fecha_inicial') . "' AND '" . $this->input->post('fecha_final') . "' ";
        }
        if($this->input->post('tipo') != ""){
            $buscar = $buscar . " AND tbl_caja_chica.tipo = '" . $this->input->post('tipo') . "' ";
        }
        if($this->input->post('modelo') != ""){
            $buscar = $buscar . " AND tbl_catalogo.idtbl_catalogo = " . $this->input->post('modelo') . " ";
        }
        if($this->input->post('eco_reporte') != ""){
            $buscar = $buscar . " AND dtl_almacen.iddtl_almacen = " . $this->input->post('eco_reporte') . " ";
        }
        if($this->session->userdata("tipo") == 16){
            if($buscar != ""){
                $buscar = $buscar . " AND ";
            }
            $buscar = $buscar . " (confirmacion > 0)";
        }
        $query = $this->db->query("SELECT tbl_caja_chica.*, dtl_almacen.numero_interno, tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto FROM tbl_caja_chica LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_caja_chica.dtl_almacen_iddtl_almacen LEFT JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo  = dtl_almacen.tbl_catalogo_idtbl_catalogo LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_caja_chica.tbl_proyectos_idtbl_proyectos WHERE tbl_caja_chica.uid_solicitud_recursos IS NULL AND 1 = 1 "  . $buscar . " ORDER BY tbl_caja_chica.fecha_compra DESC, tbl_caja_chica.idtbl_caja_chica DESC ");
        return $query->result();
    }

    public function confirmar_movimiento_caja_chica(){
        if($this->session->userdata("tipo") == 16 || $this->session->userdata('id') == 68 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata("tipo") == 1 || ($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3)){
            $this->db->trans_begin();
            if($this->session->userdata('id') == 68){
                $array = [
                    "confirmacion_direccion" => 1
                ];
            }else{
                $array = [
                    "confirmacion" => ($this->session->userdata("tipo") == 1 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19) || ($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3) ? 1 : 2
                ];
            }
            $this->db->where("idtbl_caja_chica", $this->input->post("idtbl_caja_chica"));
            $this->db->update("tbl_caja_chica", $array);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }else{
            return false;
        }
    }

    public function reembolsar_movimiento_caja_chica(){
        if($this->session->userdata("tipo") == 16 || $this->session->userdata('id') == 68 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata("tipo") == 1 || ($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3)){
            $this->db->trans_begin();
            if($this->session->userdata('id') == 68){
                $array = [
                    "confirmacion_direccion" => 1,
                    "reembolsado" => 1
                ];
            }else{
                $array = [
                    "confirmacion" => ($this->session->userdata("tipo") == 1 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19) || ($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3) ? 1 : 2
                ];
            }
            $this->db->where("idtbl_caja_chica", $this->input->post("idtbl_caja_chica"));
            $this->db->update("tbl_caja_chica", $array);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }else{
            return false;
        }
    }

    public function cancelar_movimiento_caja_chica(){
        if($this->session->userdata("tipo") == 16 || $this->session->userdata("tipo") == 1 || ($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3)){
            $this->db->trans_begin();
            $array = [
                "confirmacion" => 3
            ];
            $this->db->where("idtbl_caja_chica", $this->input->post("idtbl_caja_chica"));
            $this->db->update("tbl_caja_chica", $array);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }else{
            return false;
        }
    }
    public function asignacionesautos($year, $usuario)
    {
        if($usuario == 0){
            $data = [];
            $query = $this->db->query("SELECT  COUNT(TAM.idtbl_almacen_movimientos) AS asignaciones, MONTH(TAM.fecha) AS FECHA, TAM.tipo 
            AS Asignado, TAM.tbl_almacenes_idtbl_almacenes 
            AS almacen, TU.nombre, TU.idtbl_users, TAM.estatus AS Estatus 
            FROM tbl_almacen_movimientos TAM 
            LEFT JOIN tbl_users TU ON TU.idtbl_users = TAM.tbl_users_idtbl_users 
            LEFT JOIN tbl_almacenes TA on TA.idtbl_almacenes = TAM.tbl_almacenes_idtbl_almacenes 
            WHERE YEAR(TAM.fecha) = 2022 AND TAM.tipo = 'asignacion' 
            AND TAM.tbl_almacenes_idtbl_almacenes= 28 AND TU.idtbl_users = '$usuario' 
            AND TAM.estatus = 1 GROUP BY MONTH(TAM.fecha)");
            $data["asignaciones"] = $query->result_array();
            $query = $this->db->query("SELECT DISTINCT TU.nombre, TU.idtbl_users 
            FROM tbl_almacen_movimientos TAM LEFT JOIN tbl_users TU ON TU.idtbl_users = TAM.tbl_users_idtbl_users 
            LEFT JOIN tbl_almacenes TA on TA.idtbl_almacenes = TAM.tbl_almacenes_idtbl_almacenes 
            WHERE  TU.idtbl_users = '$usuario' AND TAM.estatus = 1 IS NOT NULL ORDER BY MONTH(TAM.fecha)");
            $data['usuario'] = $query->result_array();
        }else{
            $query = $this->db->query("SELECT  COUNT(TAM.idtbl_almacen_movimientos) AS asignaciones, MONTH(TAM.fecha) AS FECHA, TAM.tipo AS Asignado, 
            TAM.tbl_almacenes_idtbl_almacenes AS almacen, TU.nombre, TU.idtbl_users, TAM.estatus AS Estatus 
            FROM tbl_almacen_movimientos TAM 
            LEFT JOIN tbl_users TU ON TU.idtbl_users = TAM.tbl_users_idtbl_users 
            LEFT JOIN tbl_almacenes TA on TA.idtbl_almacenes = TAM.tbl_almacenes_idtbl_almacenes 
            WHERE YEAR(TAM.fecha) = '$year' AND TAM.tipo = 'asignacion' 
            AND TAM.tbl_almacenes_idtbl_almacenes= 28 AND TU.idtbl_users = '$usuario' AND TAM.estatus = 1 GROUP BY MONTH(TAM.fecha)");
            $data["asignaciones"] = $query->result_array(); 
            $query = $this->db->query("SELECT DISTINCT TU.nombre, TU.idtbl_users 
            FROM tbl_almacen_movimientos TAM 
            LEFT JOIN tbl_users TU ON TU.idtbl_users = TAM.tbl_users_idtbl_users 
            LEFT JOIN tbl_almacenes TA on TA.idtbl_almacenes = TAM.tbl_almacenes_idtbl_almacenes 
            WHERE  TU.idtbl_users = '$usuario' AND TAM.estatus = 1 IS NOT NULL ORDER BY MONTH(TAM.fecha)");
            $data['usuario'] = $query->result_array();
        }    	
    	return $data;
    }

    public function usuarioscomparacion()
    {
            $this->db->select(' idtbl_users, nombre ');
            $this->db->from('tbl_users ');
            $this->db->where('idtbl_users IN (82,336,299,317,316,314,219,306,246,308)');
            $query = $this->db->get();
            return $query->result();
    }
    public function getAutos($modelo)
    {
        $query = $this->db->query("SELECT dtl_almacen.estatus, COUNT(*) AS total, tbl_catalogo.modelo 
        FROM tbl_catalogo 
        JOIN dtl_almacen ON dtl_almacen.tbl_catalogo_idtbl_catalogo = tbl_catalogo.idtbl_catalogo 
        WHERE tipo = 4 
        AND tbl_catalogo.descripcion != 'PERSONAL' 
        AND ctl_categorias_idctl_categorias = 16 
        AND tbl_catalogo.modelo = '$modelo'
        GROUP BY   dtl_almacen.estatus 
        ORDER BY dtl_almacen.estatus DESC");
        return $query->result();
    }
    public function sumaestatus()
    {
        $query = $this->db->query("SELECT DISTINCT dtl_almacen.estatus, COUNT(*) AS total, tbl_catalogo.modelo
        FROM tbl_catalogo 
        JOIN dtl_almacen ON dtl_almacen.tbl_catalogo_idtbl_catalogo = tbl_catalogo.idtbl_catalogo 
        WHERE tipo = 4 
            AND tbl_catalogo.descripcion != 'PERSONAL' 
            AND ctl_categorias_idctl_categorias = 16 
            AND tbl_catalogo.modelo IN ('3700DD', '6510', 'AUTOBUS', 'BEAT', 'CAMION', 'CHEVY', 'DURASTAR 4300', 'GOL', 'HILUX', 'KABSTAR', 'KANGOO', 'KWID ICONIC', 'KWID INTENS', 'LOWVOY', 'MARCH', 'MATIZ', 'NP-300', 'PROMASTER RAPID', 'RAM 4000', 'REMOLQUE', 'RTX1250', 'RTX550', 'SPARK', 'TORNADO', 'TSURU', 'URVAN', 'V8550A')
            AND dtl_almacen.estatus IN ('asignado', 'colision', 'disponible', 'perdida total', 'robado', 'taller', 'tramite vehicular', 'vendida')
        GROUP BY dtl_almacen.estatus
        ORDER BY dtl_almacen.estatus;");
       return $query->result();
    }
    public function mecanicadisponible()
    {
        $query = $this->db->query("SELECT YEAR(fecha) AS anio, COUNT(idtbl_checklist_servicio) AS suma_checklist FROM tbl_checklist_servicio WHERE checklist_tecnico LIKE '%preventivo%' AND YEAR(fecha) IN (2021, 2022, 2023) GROUP BY YEAR(fecha);");
        return $query->result();
    }
    public function mecanicadisponiblecorrectivo()
    {
        $query = $this->db->query("SELECT YEAR(fecha) AS anio, COUNT(idtbl_checklist_servicio) AS suma_correctivo FROM tbl_checklist_servicio WHERE checklist_tecnico LIKE '%correctivo%' AND YEAR(fecha) IN (2021, 2022, 2023) GROUP BY YEAR(fecha);");
        return $query->result();
    }
    public function mecanicadisponiblepredictivos()
    {
        $query = $this->db->query("SELECT YEAR(fecha) AS anio, COUNT(idtbl_checklist_servicio) AS suma_predictivo FROM tbl_checklist_servicio WHERE checklist_tecnico LIKE '%predictivo%' AND YEAR(fecha) IN (2021, 2022, 2023) GROUP BY YEAR(fecha);");
        return $query->result();
    }
    public function totalidservicio()
    {
        $query = $this->db->query("SELECT COUNT(idtbl_checklist_servicio) AS suma_id, detalle_conductor, tbl_almacenes_idtbl_almacenes, tbl_users_idtbl_users, YEAR(fecha) AS anio FROM tbl_checklist_servicio WHERE YEAR(fecha) in (2021, 2022, 2023) AND detalle_conductor NOT LIKE '%TAMBUE%'  GROUP BY YEAR(fecha);");
        return $query->result();
    }
    public function mecanicosservicios()
    {
        $query = $this->db->query("SELECT idtbl_checklist_servicio, tbl_almacenes_idtbl_almacenes, tbl_users_idtbl_users, estatus, nombre, year(fecha) FROM `tbl_checklist_servicio` LEFT JOIN tbl_users TU ON TU.idtbl_users = tbl_checklist_servicio.tbl_users_idtbl_users WHERE YEAR(fecha) = 2023 AND TU.estatus=1 GROUP BY tbl_users_idtbl_users;");
        return $query->result();
    }
    public function mecanicosservicioscorrectivos()
    {
        $query = $this->db->query("SELECT COUNT(idtbl_checklist_servicio) AS idcorrectivos , checklist_tecnico, tbl_almacenes_idtbl_almacenes, tbl_users_idtbl_users, nombre, year(fecha) FROM `tbl_checklist_servicio` LEFT JOIN tbl_users TU ON TU.idtbl_users = tbl_checklist_servicio.tbl_users_idtbl_users WHERE YEAR(fecha) = 2023 AND checklist_tecnico LIKE '%correctivo%' GROUP BY tbl_users_idtbl_users");
        return $query->result();
    }
    public function mecanicosserviciospreventivos()
    {
        $query = $this->db->query("SELECT COUNT(idtbl_checklist_servicio) AS idpreventivos , checklist_tecnico, tbl_almacenes_idtbl_almacenes, tbl_users_idtbl_users, nombre, year(fecha) FROM `tbl_checklist_servicio` LEFT JOIN tbl_users TU ON TU.idtbl_users = tbl_checklist_servicio.tbl_users_idtbl_users WHERE YEAR(fecha) = 2023 AND checklist_tecnico LIKE '%preventivo%' GROUP BY tbl_users_idtbl_users");
        return $query->result();
    }
    public function mecanicosserviciospredictivos()
    {
        $query = $this->db->query("SELECT COUNT(idtbl_checklist_servicio) AS idpredictivos , checklist_tecnico, tbl_almacenes_idtbl_almacenes, tbl_users_idtbl_users, nombre, year(fecha) FROM `tbl_checklist_servicio` LEFT JOIN tbl_users TU ON TU.idtbl_users = tbl_checklist_servicio.tbl_users_idtbl_users WHERE YEAR(fecha) = 2023 AND checklist_tecnico LIKE '%predictivo%' GROUP BY tbl_users_idtbl_users");
        return $query->result();
    }
    public function modeloanio($modeloauto)
    {
        $query = $this->db->query("SELECT tbl_catalogo.modelo, COUNT(tbl_catalogo.modelo) AS total, anio 
        FROM tbl_catalogo 
        JOIN dtl_almacen ON dtl_almacen.tbl_catalogo_idtbl_catalogo = tbl_catalogo.idtbl_catalogo 
        WHERE tipo = 4 
            AND tbl_catalogo.descripcion != 'PERSONAL'
            AND modelo = '$modeloauto' 
            AND ctl_categorias_idctl_categorias = 16             
        GROUP BY anio, modelo;");
        return  $query->result_array();
         
   
    }
    
    


}
