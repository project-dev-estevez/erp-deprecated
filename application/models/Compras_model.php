<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Compras_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function datossolicitud($uid) {
		$resultado['solicitud']=$this->detalle_solicitud($uid);
		if($resultado['solicitud']) {
			$resultado['detalle']=$this->detalle_solicitud_catalogo($resultado['solicitud']->idtbl_solicitudes_almacen);
			// Obtener el promedio del precio de cada producto 
			foreach($resultado['detalle'] as $key => $value){
					$query = $this->db->query("
						select AVG(precio) as prom from dtl_pedido_catalogo where tbl_catalogo_idtbl_catalogo=".$resultado['detalle'][$key]->idtbl_catalogo);								
						$resultado['promedio'][$resultado['detalle'][$key]->idtbl_catalogo] = $query->result()[0]->prom;
			}            
            return $resultado;
        }else
            return false;
    }
	public function solicitudesTijuana($buscar = '', $buscar2 = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if ($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
		if ($buscar2 == '') {
			$string = "AND (tbl_solicitud_material.estatus_solicitud='AG' OR tbl_solicitud_material.estatus_solicitud='SU' OR tbl_solicitud_material.estatus_solicitud='S' OR tbl_solicitud_material.estatus_solicitud='cancelada AG')";
		}
		if ($buscar2 != '') {
			$string = "AND (tbl_solicitud_material.estatus_solicitud = '$buscar2')";
		}
		$query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitud_material.*, user_autor.nombre as user_autor, user_aprobacion.nombre as user_aprobacion, user_co.nombre as user_control_obra, user_ag.nombre as user_aprobacion_ag, user_ac.nombre as user_alto_costo, CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) as recibe FROM tbl_solicitud_material LEFT JOIN tbl_users as user_co ON user_co.idtbl_users=tbl_solicitud_material.tbl_users_idtbl_users_co LEFT JOIN tbl_users as user_ag ON user_ag.idtbl_users=tbl_solicitud_material.tbl_users_idtbl_users_ag LEFT JOIN tbl_users as user_ac ON user_ac.idtbl_users=tbl_solicitud_material.tbl_users_idtbl_users_ac LEFT JOIN tbl_proyectos ON tbl_solicitud_material.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users as user_autor ON tbl_solicitud_material.tbl_users_idtbl_users_autor=user_autor.idtbl_users LEFT JOIN tbl_users as user_aprobacion ON tbl_solicitud_material.tbl_users_idtbl_users_aprobacion=user_aprobacion.idtbl_users LEFT JOIN tbl_usuarios ON tbl_solicitud_material.tbl_usuarios_idtbl_usuarios=tbl_usuarios.idtbl_usuarios WHERE tbl_proyectos.direccion LIKE '%tijuana%' AND tbl_proyectos.estatus = 1 AND tbl_solicitud_material.estatus_solicitud != 'modificada AG' AND tbl_solicitud_material.tipo_producto NOT LIKE 'Alto Costo' AND (tbl_solicitud_material.uid LIKE '%$buscar%' OR user_autor.nombre LIKE '%$buscar%' OR user_aprobacion.nombre LIKE '%$buscar%' OR user_co.nombre LIKE '%$buscar%' OR user_ag.nombre LIKE '%$buscar%' OR user_ac.nombre LIKE '%$buscar%' OR CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%') $string ORDER BY tbl_solicitud_material.fecha_creacion DESC " . $limit);
		return $query->result();
	}

    public function actualizaritem() {
        if($this->input->post('new')=='')
            return false;
        $data = array(
            'tbl_catalogo_idtbl_catalogo' => $this->input->post('new')
        );
        $this->db->set($data);
        $this->db->where('iddtl_solicitud_catalogo',$this->input->post('id')); 
        if($this->db->update('dtl_solicitud_catalogo'))
        return true;
        else
        return false;
    }

    public function guardar_pedido($uid) {
    	$this->db->trans_begin();
    	if(isset($_POST['porcentaje'])) {
      		$porcentaje = $_POST['porcentaje'];
      		$retencion = $_POST['retencion'];
    	}
    	else {
      		$porcentaje = NULL;
      		$retencion = NULL;
		}
		if(isset($_POST['entrada_virtual'])){
			$entrada_virtual = 1;
		}
		else{
			$entrada_virtual = 0;
		}
		if($this->input->post('id_almacen') == 23){
			$autor = 69;
		}else if($this->input->post('id_almacen') == 2){
			$autor = 3;
		}else if($this->input->post('id_almacen') == 29){
			$autor = 66;
		}else if($this->input->post('id_almacen') == 16){
			$autor = 50;
		}else if($this->input->post('id_almacen') == 0){
      		$autor = 34;
    	}else{
			$autor = $this->input->post('id_autor');
		}
    	$data = array(
    		'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
    		'tbl_segmentos_proyecto_idtbl_segmentos_proyecto ' => (empty($this->input->post('segmento')))? NULL : $this->input->post('segmento'),
    		'tbl_solicitudes_almacen_idtbl_solicitudes_almacen' => $this->input->post('id-solicitud'),
    		'uid' => $uid,
    		'neodata_pedido' => $this->input->post('neodata'),
    		'tbl_proveedores_idtbl_proveedores' => $this->input->post('proveedor'),
    		'tipo_moneda' => $this->input->post('moneda'),
    		'condicion_pago' => $this->input->post('condicion-pago'),
    		'lugar_entrega' => $this->input->post('lugar-entrega'),
    		'observaciones' => $this->input->post('observaciones'),
    		'tbl_users_idtbl_users'=>$this->session->userdata('id'),
			'tbl_users_idtbl_users_solicitud' => $autor,
    		'porcentaje_retencion' => $porcentaje,
    		'retencion' => $retencion,
			'iva_retencion' => $this->input->post('iva_retencion'),
    		'iva' => $this->input->post('iva'),
			'amortizacion' => $this->input->post('amortizacion'),
			'entrada_virtual' => $entrada_virtual,
        	'nota_credito' => $this->input->post('nota_credito'),
        	'fecha_pedido_estimacion' => $this->input->post('fecha_pedido')
    	);
    	$this->db->insert('tbl_pedidos', $data);	
    	$insert_id = $this->db->insert_id();
    	foreach ($this->input->post('id-producto-catalogo') as $key => $value) {
    		if($this->input->post('cantidad')[$key]!=0) {
    			$this->db->set('comprado', 'comprado+'.$this->input->post('cantidad')[$key],FALSE);
    			$this->db->where('iddtl_solicitud_catalogo',$this->input->post('id_registro')[$key]);
    			$this->db->update('dtl_solicitud_catalogo');
    			$data = array(
    				'tbl_pedidos_idtbl_pedidos'=>$insert_id,
    			 	'tbl_catalogo_idtbl_catalogo'=>$value,
					'tbl_catalogo_idtbl_catalogo_pedido' => $this->input->post('producto')[$key],
    			 	'cantidad'=>$this->input->post('cantidad')[$key],
    			 	'precio'=>$this->input->post('precio')[$key],
    			 	'fecha_entrega'=>date( 'Y-m-d', strtotime( $this->input->post('fechaEntrega')[$key] ) ),
    			);
    			//Se registra la entrada
    			$this->db->insert('dtl_pedido_catalogo', $data);
    		}
    		$precio = array(
    			'precio' => $this->input->post('precio_promedio')[$key]
    		);
    		$this->db->where('idtbl_catalogo', $this->input->post('id-producto-catalogo')[$key]);
    		$this->db->update('tbl_catalogo', $precio);
    	}
    	if ($this->db->trans_status() === FALSE) {
    		$this->db->trans_rollback();
    		return false;
    	} else {
    		$this->db->trans_commit();
    		return true;
    	}
    }

   public function nueva_solicitud($uid, $estatus) {
  	$this->db->trans_begin();
  	$segmento = ($this->input->post('segmento') == '-')? NULL : $this->input->post('segmento');
  $almacen = "";
	if($this->session->userdata('tipo') == 1){
		$almacen = 2;
	}elseif($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50){
		$almacen = 1;
	}elseif(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50) || $this->session->userdata('id') == 325){
		$almacen = 16;
	}elseif($this->session->userdata('tipo') == 14){
		$almacen = 23;
  	}elseif((isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 0) || $this->session->userdata('tipo') == 10){
    	$almacen = 1;
	}elseif($this->session->userdata('tipo') == 3){
		$almacen = 29;
	}elseif($this->session->userdata('tipo') == 2){
		$almacen = 30;
	}
    if($estatus == "pendiente cv2"){
      $this->db->set('tbl_users_fecha_aprobacion_cv1',"NOW()", FALSE);
      $this->db->set('tbl_users_idtbl_users_aprobacion_cv1', $this->session->userdata('id'));
    }

    if($this->session->userdata('tipo') == 7 && ((isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 29) || $almacen == 29)){
      $this->db->set('tbl_users_fecha_aprobacion_cv1',"NOW()", FALSE);
      $this->db->set('tbl_users_fecha_aprobacion_cv2',"NOW()", FALSE);
    }else if($this->session->userdata('tipo') == 7 && ((isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 2) || $almacen == 2)){
      $this->db->set('tbl_users_fecha_users_aprobacion_ac',"NOW()", FALSE);
    }else if($this->session->userdata('tipo') == 7 && isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 0){
      $this->db->set('tbl_users_fecha_users_aprobacion_ag',"NOW()", FALSE);
    }else if($this->session->userdata('tipo') == 7 && isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 1){
		$this->db->set('tbl_users_fecha_users_aprobacion_ag',"NOW()", FALSE);
	}

    if ($this->session->userdata('tipo') == 2) {
        $data = array(
        'estatus_solicitud' => $estatus,
        'fecha_limite' => date('Y-m-d', strtotime($this->input->post('fecha_limite'))),
        //'sugerencia_proveedor' => $this->input->post('sugerencia_proveedor'),
        'primera_sugerencia' => $this->input->post('sugerencia_proveedor1'),
        'primer_costo' => $this->input->post('costo1'),
		'primer_comentario' => $this->input->post('comentario_proveedor1'),
		'primer_archivo' => 'cotizacion-'.$this->input->post('sugerencia_proveedor1'),
        'segunda_sugerencia' => $this->input->post('sugerencia_proveedor2'),
        'segundo_costo' => $this->input->post('costo2'),
		'segundo_comentario' => $this->input->post('comentario_proveedor2'),
		'segundo_archivo' => 'cotizacion-'.$this->input->post('sugerencia_proveedor2'),
        'tercera_sugerencia' => $this->input->post('sugerencia_proveedor3'),
        'tercer_costo' => $this->input->post('costo3'),
		'tercer_comentario' => $this->input->post('comentario_proveedor3'),
		'tercer_archivo' => 'cotizacion-'.$this->input->post('sugerencia_proveedor3'),
        'tbl_users_idtbl_users_autor' => $this->session->userdata('id'),
        'uid' => $uid,
        'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
        'tbl_segmentos_proyecto_idtbl_segmentos_proyecto' => $segmento,
        'comentarios' => $this->input->post('comentarios'),
        'tipo_solicitud' => '',
        'tbl_almacenes_idtbl_almacenes' => isset($_POST['almacen_compra']) && $_POST['almacen_compra'] != 0 ? $this->input->post('almacen_compra') : $almacen,
        'tipo_seguridad_e_higiene' => $this->session->userdata('tipo') == 10 || (isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 0) ? 1 : null,
		'tipo_kuali' => $_POST['proyecto_kuali'] == 1 ? 1 : NULL,
		'tipo_pedido' => $this->input->post('tipo_pedido')
    );	
    }else if($this->session->userdata('tipo') == 3){
		$data = array(
			'estatus_solicitud' => $estatus,
			'fecha_limite' => date('Y-m-d', strtotime($this->input->post('fecha_limite'))),
			'sugerencia_proveedor' => $this->input->post('sugerencia_proveedor'),			
			'tbl_users_idtbl_users_autor' => $this->session->userdata('id'),
			'uid' => $uid,
			'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
			'tbl_segmentos_proyecto_idtbl_segmentos_proyecto' => $segmento,
			'comentarios' => $this->input->post('comentarios'),
			'tipo_solicitud' => '',
			'tbl_almacenes_idtbl_almacenes' => isset($_POST['almacen_compra']) && $_POST['almacen_compra'] != 0 ? $this->input->post('almacen_compra') : $almacen,
			'tipo_seguridad_e_higiene' => $this->session->userdata('tipo') == 10 || (isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 0) ? 1 : null,
			'tipo_kuali' => $_POST['proyecto_kuali'] == 1 ? 1 : NULL,
			'tipo_compra' => isset($_POST['tipo_compra']) ? $this->input->post('tipo_compra') : NULL,
			'tipo_pedido' => $this->input->post('tipo_pedido')
			//'dtl_almacen_iddtl_almacen' => $this->input->post('eco')
		);
	}else if ($this->session->userdata('tipo') == 24) {
        $data = array(
        'estatus_solicitud' => $estatus,
        'fecha_limite' => date('Y-m-d', strtotime($this->input->post('fecha_limite'))),
        //'sugerencia_proveedor' => $this->input->post('sugerencia_proveedor'),
        'primera_sugerencia' => isset($_POST['sugerencia_proveedor1']) ? $this->input->post('sugerencia_proveedor1') : '',
        'primer_costo' => isset($_POST['costo1']) ? $this->input->post('costo1') : '',
		'primer_comentario' => isset($_POST['comentario_proveedor1']) ? $this->input->post('comentario_proveedor1') : '',
		'primer_archivo' => isset($_POST['sugerencia_proveedor1']) ? 'cotizacion-'.$this->input->post('sugerencia_proveedor1') : '',
        'segunda_sugerencia' => isset($_POST['sugerencia_proveedor2']) ? $this->input->post('sugerencia_proveedor2') : '',
        'segundo_costo' => isset($_POST['costo2']) ? $this->input->post('costo2') : '',
		'segundo_comentario' => isset($_POST['comentario_proveedor2']) ? $this->input->post('comentario_proveedor2') : '',
		'segundo_archivo' => isset($_POST['sugerencia_proveedor']) ? 'cotizacion-'.$this->input->post('sugerencia_proveedor2') : '',
        'tercera_sugerencia' => isset($_POST['sugerencia_proveedor3']) ? $this->input->post('sugerencia_proveedor3') : '',
        'tercer_costo' => isset($_POST['costo3']) ? $this->input->post('costo3') : '',
		'tercer_comentario' => isset($_POST['comentario_proveedor3']) ? $this->input->post('comentario_proveedor3') : '',
		'tercer_archivo' => isset($_POST['sugerencia_proveedor3']) ? 'cotizacion-'.$this->input->post('sugerencia_proveedor3') : '',
        'tbl_users_idtbl_users_autor' => $this->session->userdata('id'),
        'uid' => $uid,
        'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
        'tbl_segmentos_proyecto_idtbl_segmentos_proyecto' => $segmento,
        'comentarios' => $this->input->post('comentarios'),
        'tipo_solicitud' => '',
        'tbl_almacenes_idtbl_almacenes' => 16,
        'tipo_seguridad_e_higiene' => $this->session->userdata('tipo') == 10 || (isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 0) ? 1 : null,
		'tipo_kuali' => $_POST['proyecto_kuali'] == 1 ? 1 : NULL,
		'tipo_pedido' => $this->input->post('tipo_pedido')		
    );
    }else{
		$data = array(
			'estatus_solicitud' => $estatus,
			'fecha_limite' => date('Y-m-d', strtotime($this->input->post('fecha_limite'))),
			'sugerencia_proveedor' => isset($_POST['sugerencia_proveedor']) ? $this->input->post('sugerencia_proveedor') : NULL,
			'primera_sugerencia' => isset($_POST['sugerencia_proveedor1']) ? $this->input->post('sugerencia_proveedor1') : '',
			'primer_costo' => isset($_POST['costo1']) ? $this->input->post('costo1') : '',
			'primer_comentario' => isset($_POST['comentario_proveedor1']) ? $this->input->post('comentario_proveedor1') : '',
			'primer_archivo' => isset($_POST['sugerencia_proveedor1']) ? 'cotizacion-'.$this->input->post('sugerencia_proveedor1') : '',
			'segunda_sugerencia' => isset($_POST['sugerencia_proveedor2']) ? $this->input->post('sugerencia_proveedor2') : '',
			'segundo_costo' => isset($_POST['costo2']) ? $this->input->post('costo2') : '',
			'segundo_comentario' => isset($_POST['comentario_proveedor2']) ? $this->input->post('comentario_proveedor2') : '',
			'segundo_archivo' => isset($_POST['sugerencia_proveedor']) ? 'cotizacion-'.$this->input->post('sugerencia_proveedor2') : '',
			'tercera_sugerencia' => isset($_POST['sugerencia_proveedor3']) ? $this->input->post('sugerencia_proveedor3') : '',
			'tercer_costo' => isset($_POST['costo3']) ? $this->input->post('costo3') : '',
			'tercer_comentario' => isset($_POST['comentario_proveedor3']) ? $this->input->post('comentario_proveedor3') : '',
			'tercer_archivo' => isset($_POST['sugerencia_proveedor3']) ? 'cotizacion-'.$this->input->post('sugerencia_proveedor3') : '',			
			'tbl_users_idtbl_users_autor' => $this->session->userdata('id'),
			'uid' => $uid,
			'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
			'tbl_segmentos_proyecto_idtbl_segmentos_proyecto' => $segmento,
			'comentarios' => $this->input->post('comentarios'),
			'tipo_solicitud' => '',
			'tbl_almacenes_idtbl_almacenes' => isset($_POST['almacen_compra']) && $_POST['almacen_compra'] != 0 ? $this->input->post('almacen_compra') : $almacen,
			'tipo_seguridad_e_higiene' => $this->session->userdata('tipo') == 10 || (isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 0) ? 1 : null,
			'tipo_kuali' => $_POST['proyecto_kuali'] == 1 ? 1 : NULL,
			'tipo_compra' => isset($_POST['tipo_compra']) ? $this->input->post('tipo_compra') : NULL,
			'tipo_pedido' => $this->input->post('tipo_pedido')
			
		);
	}

  	$this->db->insert('tbl_solicitudes_almacen', $data);
  	$insert_id = $this->db->insert_id();
  	foreach ($this->input->post('producto') as $key => $value) {
  		if($value==0) {
  			$data = array(
  				'tbl_solicitudes_almacen_idtbl_solicitudes_almacen' => $insert_id,
  				'cantidad' => $this->input->post('cantidad')[$key],
				'color' => isset($_POST['color'][$key]) ? $this->input->post('color')[$key] : NULL,
				'medida' => isset($_POST['medida'][$key]) ? $this->input->post('medida')[$key] : NULL,
				'material' => isset($_POST['material'][$key]) ? $this->input->post('material')[$key] : NULL,
  				'especificaciones' => $this->input->post('especificaciones')[$key],
  			);
  		} else {
  			$data = array(
  				'tbl_solicitudes_almacen_idtbl_solicitudes_almacen' => $insert_id,
  				'tbl_catalogo_idtbl_catalogo' => $value,
  				'cantidad' => $this->input->post('cantidad')[$key],
				'color' => isset($_POST['color'][$key]) ? $this->input->post('color')[$key] : NULL,
				'medida' => isset($_POST['medida'][$key]) ? $this->input->post('medida')[$key] : NULL,
				'material' => isset($_POST['material'][$key]) ? $this->input->post('material')[$key] : NULL,
  				'especificaciones' => $this->input->post('especificaciones')[$key],
		    );
  		}
  		//Se registra la entrada
  		$this->db->insert('dtl_solicitud_catalogo', $data);
  	}
  	if ($this->db->trans_status() === FALSE) {
  		$this->db->trans_rollback();
  		return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function nueva_solicitud_estimacion($uid, $estatus) {
  	$this->db->trans_begin();
  	$segmento = ($this->input->post('segmento') == '-')? NULL : $this->input->post('segmento');
  	$data = array(
  		'estatus_solicitud' => $estatus,
      'tbl_proveedores_idtbl_proveedores' => $this->input->post('proveedor'),
      'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
      'tbl_segmentos_proyecto_idtbl_segmentos_proyecto' => $segmento,
  		'fecha_limite' => date('Y-m-d', strtotime($this->input->post('fecha_limite'))),
      'contrato' => $this->input->post('contrato'),
      'estimacion' => $this->input->post('estimacion'),
      'observaciones' => $this->input->post('observaciones'),
  		'tbl_users_idtbl_users_autor' => $this->session->userdata('id'),
  		'uid' => $uid,
  		'tipo_solicitud' => $this->input->post('tipo_solicitud'),
  		'tbl_almacenes_idtbl_almacenes' => ID_ALMACEN_GENERAL
  	);
  	$this->db->insert('tbl_solicitudes_estimacion', $data);
  	$insert_id = $this->db->insert_id();
  	foreach ($this->input->post('producto') as $key => $value) {
  		if($value==0) {
  			$data = array(
  				'tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion' => $insert_id,
  				'cantidad' => $this->input->post('cantidad')[$key],
  				'especificaciones' => $this->input->post('especificaciones')[$key]
  			);
  		} else {
  			$data = array(
  				'tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion' => $insert_id,
  				'tbl_catalogo_idtbl_catalogo' => $value,
  				'cantidad' => $this->input->post('cantidad')[$key],
  				'especificaciones' => $this->input->post('especificaciones')[$key]
		    );
  		}
  		//Se registra la entrada
  		$this->db->insert('dtl_solicitud_estimacion', $data);
  	}
  	if ($this->db->trans_status() === FALSE) {
  		$this->db->trans_rollback();
  		return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

    public function solicitudes($buscar='', $inicio = false, $cantidadRegistro = false) {
    	$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
        
		$this->db->select('tbl_proyectos.nombre_proyecto');
		$this->db->select('tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_solicitudes_almacen.*');
		$this->db->select('tbl_users.nombre');
		$this->db->select('tbl_clientes.nombre_comercial');
		$this->db->select("CASE tbl_solicitudes_almacen.estatus_solicitud
				WHEN 'pendiente' THEN
					'color_amarillo'
				WHEN 'cancelada' THEN
					'color_rojo'		
				WHEN 'aprobada' THEN
					'color_verde'
			END  AS color");
		$this->db->from('tbl_solicitudes_almacen');			

		$this->db->join('tbl_proyectos','tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos','left');
		$this->db->join('tbl_users','tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users','left');
		$this->db->join('tbl_clientes','tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes','left');
		$this->db->order_by('tbl_solicitudes_almacen.idtbl_solicitudes_almacen ASC');

		$query = $this->db->get();
		$almacen = $this->input->post("idtbl_almacenes");
    if(($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 3 || $this->session->userdata('id') == 3) && $this->input->post("idtbl_almacenes") !== NULL && ($this->input->post("idtbl_almacenes") == 29 || $this->input->post("idtbl_almacenes") == 2)){
      $estatus = "";
      $order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
      if($this->session->userdata('id') == 3){
        $estatus = " AND estatus_solicitud NOT IN ('pendiente cv1')";
        $order = "tbl_solicitudes_almacen.estatus_solicitud = 'cancelada', tbl_solicitudes_almacen.estatus_solicitud = 'aprobada', tbl_solicitudes_almacen.estatus_solicitud = 'pendiente', tbl_solicitudes_almacen.estatus_solicitud = 'pendiente cv2', tbl_solicitudes_almacen.fecha_creacion DESC";
      }else if($this->session->userdata('tipo') == 7){
        $estatus = " AND tbl_solicitudes_almacen.estatus_solicitud IN ('aprobada', 'pendiente', 'cancelada') ";
		$order = "tbl_solicitudes_almacen.estatus_solicitud = 'cancelada', tbl_solicitudes_almacen.estatus_solicitud = 'aprobada', tbl_solicitudes_almacen.estatus_solicitud = 'pendiente', tbl_solicitudes_almacen.tbl_users_fecha_aprobacion_cv2 DESC";
      }
      $idtbl_almacenes = $this->input->post("idtbl_almacenes");
      if($idtbl_almacenes == 29){
        $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, CASE tbl_solicitudes_almacen.estatus_solicitud WHEN 'pendiente' THEN 'color_amarillo' WHEN 'cancelada' THEN 'color_rojo' WHEN 'aprobada' THEN 'color_verde' END AS color, tbl_users_cv1.nombre AS tbl_users_cv1, tbl_users_cv2.nombre AS tbl_users_cv2 FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_cv1 ON tbl_users_cv1.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_cv1 LEFT JOIN tbl_users AS tbl_users_cv2 ON tbl_users_cv2.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_cv2 WHERE tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes  = $idtbl_almacenes $estatus AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY $order " . $limit);
      }else{
        $order = "tbl_solicitudes_almacen.fecha_creacion DESC";
        $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, CASE tbl_solicitudes_almacen.estatus_solicitud WHEN 'pendiente' THEN 'color_amarillo' WHEN 'cancelada' THEN 'color_rojo' WHEN 'aprobada' THEN 'color_verde' END AS color, tbl_users_ac.nombre AS tbl_users_ac FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_ac ON tbl_users_ac.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ac WHERE tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = $idtbl_almacenes $estatus AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY $order " . $limit);
      }
    } else if(($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 2 || $this->session->userdata('id') == 3) && $this->input->post("idtbl_almacenes") !== NULL && ($this->input->post("idtbl_almacenes") == 16)){
		$estatus = "";
		$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		if($this->session->userdata('tipo') == 2){
		  $estatus = " AND estatus_solicitud IN ('pendiente sis', 'pendiente', 'cancelada')";
		  $order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		}else if($this->session->userdata('tipo') == 7){
		  $estatus = " AND tbl_solicitudes_almacen.estatus_solicitud IN ('aprobada', 'pendiente', 'cancelada') ";
		  $order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		}else if($this->session->userdata('id') == 3){
			$estatus = " AND tbl_solicitudes_almacen.estatus_solicitud IN ('aprobada', 'pendiente', 'cancelada', 'pendiente kuali', 'pendiente ag') ";
			$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		}
		$idtbl_almacenes = $this->input->post("idtbl_almacenes");
		$kuali = $this->input->post("tipo_kuali");
		if($kuali == 1){
		  $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, CASE tbl_solicitudes_almacen.estatus_solicitud WHEN 'pendiente' THEN 'color_amarillo' WHEN 'cancelada' THEN 'color_rojo' WHEN 'aprobada' THEN 'color_verde' END AS color, tbl_users_cv1.nombre AS tbl_users_cv1, tbl_users_cv2.nombre AS tbl_users_cv2 FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_cv1 ON tbl_users_cv1.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_cv1 LEFT JOIN tbl_users AS tbl_users_cv2 ON tbl_users_cv2.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_cv2 WHERE tbl_solicitudes_almacen.tipo_kuali = $kuali $estatus AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY $order " . $limit);
		}else{
		  $order = "tbl_solicitudes_almacen.fecha_creacion DESC";
		  $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, CASE tbl_solicitudes_almacen.estatus_solicitud WHEN 'pendiente' THEN 'color_amarillo' WHEN 'cancelada' THEN 'color_rojo' WHEN 'aprobada' THEN 'color_verde' END AS color, tbl_users_ac.nombre AS tbl_users_ac FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_ac ON tbl_users_ac.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ac WHERE tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = $idtbl_almacenes $estatus AND tbl_solicitudes_almacen.tipo_kuali IS NULL AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY $order " . $limit);
		}

	  } else if(($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 2 || $this->session->userdata('id') == 3) && $this->input->post("idtbl_almacenes") !== NULL && ($this->input->post("idtbl_almacenes") == 30)){
		$estatus = "";
		$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		if($this->session->userdata('tipo') == 2){
		  $estatus = " AND estatus_solicitud IN ('pendiente sis', 'pendiente', 'cancelada')";
		  $order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		}else if($this->session->userdata('tipo') == 7){
		  $estatus = " AND tbl_solicitudes_almacen.estatus_solicitud IN ('aprobada', 'pendiente', 'cancelada') ";
		  $order = "tbl_solicitudes_almacen.estatus_solicitud = 'cancelada', tbl_solicitudes_almacen.estatus_solicitud = 'aprobada', tbl_solicitudes_almacen.estatus_solicitud = 'pendiente', tbl_solicitudes_almacen.fecha_creacion DESC";
		}else if($this->session->userdata('id') == 3){
			$estatus = " AND tbl_solicitudes_almacen.estatus_solicitud IN ('aprobada', 'pendiente', 'cancelada', 'pendiente sis') ";
			$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		}
		$idtbl_almacenes = $this->input->post("idtbl_almacenes");
		if($this->session->userdata('tipo') == 7){
			$query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, CASE tbl_solicitudes_almacen.estatus_solicitud WHEN 'pendiente' THEN 'color_amarillo' WHEN 'cancelada' THEN 'color_rojo' WHEN 'aprobada' THEN 'color_verde' END AS color, tbl_users_ac.nombre AS tbl_users_ac FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_ac ON tbl_users_ac.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ac WHERE tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = $idtbl_almacenes AND tbl_solicitudes_almacen.tipo_kuali IS NULL $estatus AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY $order " . $limit);
		}else{
		  $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, CASE tbl_solicitudes_almacen.estatus_solicitud WHEN 'pendiente' THEN 'color_amarillo' WHEN 'cancelada' THEN 'color_rojo' WHEN 'aprobada' THEN 'color_verde' END AS color, tbl_users_ac.nombre AS tbl_users_ac FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_ac ON tbl_users_ac.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ac WHERE tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = $idtbl_almacenes $estatus AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY $order " . $limit);
		}
	  } else if(($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 4 || $this->session->userdata('id') == 3 || $this->session->userdata('tipo') == 8) && $this->input->post("idtbl_almacenes") !== NULL && $this->input->post("idtbl_almacenes") == 1) {
      $estatus = "";
	  $condition = "";
      $order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
	  if(isset($_POST['almacen_ehs']) && $this->input->post('almacen_ehs') == 1){
		$condition = " AND tbl_solicitudes_almacen.tipo_seguridad_e_higiene = 1 ";
	  }else{
		$condition = " AND tbl_solicitudes_almacen.tipo_seguridad_e_higiene IS NULL ";
	  }
      if($this->session->userdata('tipo') == 7){
        $estatus = " AND tbl_solicitudes_almacen.estatus_solicitud IN ('aprobada', 'pendiente', 'cancelada') ";
        $order = "tbl_solicitudes_almacen.estatus_solicitud = 'cancelada', tbl_solicitudes_almacen.estatus_solicitud = 'aprobada', tbl_solicitudes_almacen.estatus_solicitud = 'pendiente', tbl_solicitudes_almacen.tbl_users_fecha_users_aprobacion_ag DESC";
      }
	  if($this->session->userdata('id') == 3){
		$estatus = " AND tbl_solicitudes_almacen.estatus_solicitud IN ('aprobada', 'pendiente', 'cancelada', 'pendiente ag', 'pendiente direccion') ";
		$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
	  }
	  if($this->session->userdata('id') == 8){
		$estatus = " AND tbl_solicitudes_almacen.estatus_solicitud IN ('aprobada', 'pendiente', 'cancelada', 'pendiente direccion') ";
		$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
	  }
      $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, CASE tbl_solicitudes_almacen.estatus_solicitud WHEN 'pendiente' THEN 'color_amarillo' WHEN 'cancelada' THEN 'color_rojo' WHEN 'aprobada' THEN 'color_verde' END AS color, tbl_users_ag.nombre AS tbl_users_ag FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_ag ON tbl_users_ag.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ag WHERE (tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = 0 AND tbl_solicitudes_almacen.tbl_users_idtbl_users_autor = 4) OR (tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = 1 $condition $estatus) AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY $order " . $limit);
    } else{
		if($this->session->userdata('id') == 3 && $almacen == 228){
			$estatus = " estatus_solicitud NOT IN ('pendiente fundidora1') AND";
			$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		}elseif($this->session->userdata('id') == 264 && $almacen == 228){
			$estatus = '';
			$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		}else if($this->session->userdata('tipo') == 7 && $almacen == 228){
			$estatus = " tbl_solicitudes_almacen.estatus_solicitud IN ('aprobada', 'pendiente', 'cancelada') AND";
			$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		}else{
			$estatus = '';
			$order = "tbl_solicitudes_almacen.idtbl_solicitudes_almacen DESC";
		}
      $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, tbl_users_fundidora1.nombre AS tbl_users_fundidora1, tbl_users_fundidora2.nombre AS tbl_users_fundidora2, CASE tbl_solicitudes_almacen.estatus_solicitud WHEN 'pendiente' THEN 'color_amarillo' WHEN 'cancelada' THEN 'color_rojo' WHEN 'aprobada' THEN 'color_verde' END AS color FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_fundidora1 ON tbl_users_fundidora1.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_fundidora1 LEFT JOIN tbl_users AS tbl_users_fundidora2 ON tbl_users_fundidora2.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_fundidora2 WHERE $estatus tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes NOT IN (2, 29) AND tbl_solicitudes_almacen.tipo_seguridad_e_higiene IS NULL AND tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = $almacen AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY tbl_solicitudes_almacen.fecha_creacion DESC " . $limit);
    }
		return $query->result();
	}

	public function solicitudes_aprobadas() {
		$this->db->select('tbl_proyectos.nombre_proyecto');
		$this->db->select('tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_solicitudes_almacen.*');
        $this->db->select('tbl_users.nombre');
        $this->db->select('tbl_clientes.nombre_comercial');


		$this->db->from('tbl_solicitudes_almacen');			

		$this->db->join('tbl_proyectos','tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos','left');
        $this->db->join('tbl_users','tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users','left');
        $this->db->join('tbl_clientes','tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes','left');
        // Nuevos cambios
		// $this->db->where('tbl_solicitudes_almacen.estatus_solicitud', 'aprobada');
		$query = $this->db->get();

		return $query->result();
	}
	
	public function mis_solicitudes($buscar='', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}

    if($this->session->userdata('tipo') == 3){
		  $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, tbl_users_cv1.nombre AS tbl_users_cv1, tbl_users_cv2.nombre AS tbl_users_cv2 FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_cv1 ON tbl_users_cv1.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_cv1 LEFT JOIN tbl_users AS tbl_users_cv2 ON tbl_users_cv2.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_cv2 WHERE tbl_users.idtbl_users = " . $this->session->userdata('id') . " AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY tbl_solicitudes_almacen.fecha_creacion DESC " . $limit);
    } else if($this->session->userdata('tipo') == 10){
      $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, tbl_users_ag.nombre AS tbl_users_ag FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_ag ON tbl_users_ag.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ag WHERE tbl_users.idtbl_users = " . $this->session->userdata('id') . " AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY tbl_solicitudes_almacen.fecha_creacion DESC " . $limit);
    }else if($this->session->userdata('tipo') == 1){
      $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, tbl_users_ac.nombre AS tbl_users_ac FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_ac ON tbl_users_ac.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ac WHERE tbl_users.idtbl_users = " . $this->session->userdata('id') . " AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY tbl_solicitudes_almacen.fecha_creacion DESC " . $limit);
    }else if($this->session->userdata('tipo') == 2){
		$query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial, tbl_users_ac.nombre AS tbl_users_ac FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_users AS tbl_users_ac ON tbl_users_ac.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ac WHERE tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = 30 AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY tbl_solicitudes_almacen.fecha_creacion DESC " . $limit);
	}else{
      $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_almacen.*, tbl_users.nombre, tbl_clientes.nombre_comercial FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes WHERE tbl_users.idtbl_users = " . $this->session->userdata('id') . " AND (tbl_solicitudes_almacen.uid LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_almacen.fecha_limite LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_almacen.estatus_solicitud LIKE '%$buscar%') ORDER BY tbl_solicitudes_almacen.fecha_creacion DESC " . $limit);
    }


		/*$this->db->select('tbl_proyectos.nombre_proyecto');
		$this->db->select('tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_solicitudes_almacen.*');
        $this->db->select('tbl_users.nombre');
        $this->db->select('tbl_clientes.nombre_comercial');


		$this->db->from('tbl_solicitudes_almacen');			

		$this->db->join('tbl_proyectos','tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos','left');
        $this->db->join('tbl_users','tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users','left');
        $this->db->join('tbl_clientes','tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes','left');
		$this->db->where('tbl_users.idtbl_users', $this->session->userdata('id'));

		$query = $this->db->get();*/

		return $query->result();
	}

   public function detalle_solicitud($uid) {
   		$this->db->select('tbl_proyectos.nombre_proyecto');
		$this->db->select('tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_proyectos.direccion');
		$this->db->select('tbl_segmentos_proyecto.segmento');
		$this->db->select('DATE_FORMAT(tbl_proyectos.fecha_creacion, "%Y-%m-%d") as fecha_creacion_proyecto');
		$this->db->select('DATE_FORMAT(tbl_solicitudes_almacen.fecha_creacion, "%Y-%m-%d") as fecha_creacion_almacen');		
		$this->db->select('tbl_solicitudes_almacen.*');
		$this->db->select('tbl_users.nombre');
		$this->db->select('tbl_clientes.nombre_comercial');
		$this->db->select('tbl_almacenes.almacen');
		$this->db->select('tbl_solicitudes_almacen.tbl_segmentos_proyecto_idtbl_segmentos_proyecto');
		$this->db->select('usuario_ag.nombre AS nombre_ag');			
		//$this->db->select('tbl_pedidos.uid AS factura'); 	
		//$this->db->select('tbl_segmentos_proyecto.segmento');
		//$this->db->select('tbl_proyectos.direccion');

		$this->db->from('tbl_solicitudes_almacen');

		$this->db->join('tbl_proyectos','tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos','left');
		$this->db->join('tbl_users','tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users','left');
		$this->db->join('tbl_clientes','tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes','left');
		$this->db->join('tbl_segmentos_proyecto','tbl_segmentos_proyecto.idtbl_segmentos_proyecto=tbl_solicitudes_almacen.tbl_segmentos_proyecto_idtbl_segmentos_proyecto','left');
		$this->db->join('tbl_almacenes', 'tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = tbl_almacenes.idtbl_almacenes', 'left');
		$this->db->join('tbl_users AS usuario_ag', 'usuario_ag.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ag', 'left');		
		//$this->db->join('tbl_pedidos', 'tbl_solicitudes_almacen.idtbl_solicitudes_almacen = tbl_pedidos.tbl_solicitudes_almacen_idtbl_solicitudes_almacen');		
		$this->db->where('tbl_solicitudes_almacen.uid', $uid);

		$query = $this->db->get();
		$resultado = $query->result();
		
        if(count($resultado)>0)
            return $query->result()[0];
        else
            return false;
            
    }

	public function detalle_solicitudimagen($uid) {
		$this->db->select('tbl_proyectos.nombre_proyecto');
	 $this->db->select('tbl_proyectos.numero_proyecto');
	 $this->db->select('tbl_proyectos.direccion');
	 $this->db->select('tbl_segmentos_proyecto.segmento');
	 $this->db->select('DATE_FORMAT(tbl_proyectos.fecha_creacion, "%Y-%m-%d") as fecha_creacion_proyecto');
	 $this->db->select('DATE_FORMAT(tbl_solicitudes_almacen.fecha_creacion, "%Y-%m-%d") as fecha_creacion_almacen');		
	 $this->db->select('tbl_solicitudes_almacen.*');
	 $this->db->select('tbl_users.nombre');
	 $this->db->select('tbl_clientes.nombre_comercial');
	 $this->db->select('tbl_almacenes.almacen');
	 $this->db->select('tbl_solicitudes_almacen.tbl_segmentos_proyecto_idtbl_segmentos_proyecto');
	 $this->db->select('usuario_ag.nombre AS nombre_ag');			
	 $this->db->select('tbl_pedidos.uid AS factura'); 
	 $this->db->select('tbl_pedidos.neodata_pedido AS hola'); 	
	 //$this->db->select('tbl_segmentos_proyecto.segmento');
	 //$this->db->select('tbl_proyectos.direccion');

	 $this->db->from('tbl_solicitudes_almacen');

	 $this->db->join('tbl_proyectos','tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos','left');
	 $this->db->join('tbl_users','tbl_solicitudes_almacen.tbl_users_idtbl_users_autor=tbl_users.idtbl_users','left');
	 $this->db->join('tbl_clientes','tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes','left');
	 $this->db->join('tbl_segmentos_proyecto','tbl_segmentos_proyecto.idtbl_segmentos_proyecto=tbl_solicitudes_almacen.tbl_segmentos_proyecto_idtbl_segmentos_proyecto','left');
	 $this->db->join('tbl_almacenes', 'tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = tbl_almacenes.idtbl_almacenes', 'left');
	 $this->db->join('tbl_users AS usuario_ag', 'usuario_ag.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_aprobacion_ag', 'left');		
	 $this->db->join('tbl_pedidos', 'tbl_solicitudes_almacen.idtbl_solicitudes_almacen = tbl_pedidos.tbl_solicitudes_almacen_idtbl_solicitudes_almacen');  
	 $this->db->where('tbl_solicitudes_almacen.uid', $uid);

	 $query = $this->db->get();
	 $resultado = $query->result();
	 
	 if(count($resultado)>0)
		 return $query->result()[0];
	 else
		 return false;
		 
 }

  public function detalle_solicitud_catalogo($id_solicitud) {
    $this->db->select('dtl_solicitud_catalogo.*');
    $this->db->select('tbl_catalogo.*');
    $this->db->select('ctl_unidades_medida.unidad_medida_abr');
		$this->db->from('dtl_solicitud_catalogo');			

		$this->db->join('tbl_catalogo','tbl_catalogo.idtbl_catalogo=dtl_solicitud_catalogo.tbl_catalogo_idtbl_catalogo','left');
		$this->db->join('ctl_unidades_medida','tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida','left');
        
    $this->db->where('dtl_solicitud_catalogo.tbl_solicitudes_almacen_idtbl_solicitudes_almacen', $id_solicitud);

		$query = $this->db->get();

		return $query->result();
	}
	
	public function cancelar_solicitud() {
		$data = array(
      'estatus_solicitud' => 'cancelada',
      'tbl_users_idtbl_users_aprobacion' => $this->session->userdata('id'),
	  'motivo_cancelacion' => $this->input->post('motivo')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		$result=$this->db->update('tbl_solicitudes_almacen');

   	return  $result;
	}
  public function aprobar_solicitud_cv() {
    if($this->input->post("estatus_solicitud") == "pendiente cv1"){
      $this->db->set('tbl_users_idtbl_users_aprobacion_cv1', $this->session->userdata('id'));
      $this->db->set('tbl_users_fecha_aprobacion_cv1', 'NOW()', FALSE);
      $this->db->set('estatus_solicitud', "pendiente cv2");
    }else if($this->input->post("estatus_solicitud") == "pendiente cv2"){
      $id = $this->session->userdata('id_user_direccion') !== NULL ? $this->session->userdata('id_user_direccion') : $this->session->userdata('id');
      $this->db->set('tbl_users_idtbl_users_aprobacion_cv2', $id);
      $this->db->set('tbl_users_fecha_aprobacion_cv2', 'NOW()', FALSE);
      $this->db->set('estatus_solicitud', "pendiente");
    }else if($this->input->post("estatus_solicitud") == "pendiente fundidora1"){
	  $this->db->set('tbl_users_fecha_users_aprobacion_fundidora1',"NOW()", FALSE);
      $this->db->set('tbl_users_idtbl_users_aprobacion_fundidora1', $this->session->userdata('id'));
	  $this->db->set('estatus_solicitud', "pendiente fundidora2");
	}else if($this->input->post("estatus_solicitud") == "pendiente fundidora2"){
	  $id = $this->session->userdata('id_user_direccion') !== NULL ? $this->session->userdata('id_user_direccion') : $this->session->userdata('id');
	  $this->db->set('tbl_users_idtbl_users_aprobacion_fundidora2', $id);
	  $this->db->set('tbl_users_fecha_users_aprobacion_fundidora2', 'NOW()', FALSE);
	  $this->db->set('estatus_solicitud', "pendiente");
	}else if($this->input->post("estatus_solicitud") == "pendiente ag"){
		$this->db->set('tbl_users_fecha_users_aprobacion_ag',"NOW()", FALSE);
		$this->db->set('tbl_users_idtbl_users_aprobacion_ag', $this->session->userdata('id'));
		$this->db->set('estatus_solicitud', "pendiente");
	}else if($this->input->post("estatus_solicitud") == "pendiente sis"){
      $this->db->set('tbl_users_fecha_users_aprobacion_ag',"NOW()", FALSE);
      $this->db->set('tbl_users_idtbl_users_aprobacion_ag', $this->session->userdata('id'));
      $this->db->set('estatus_solicitud', "pendiente");
    }else if($this->input->post("estatus_solicitud") == "pendiente kuali"){
		$this->db->set('tbl_users_fecha_users_aprobacion_ag',"NOW()", FALSE);
		$this->db->set('tbl_users_idtbl_users_aprobacion_ag', $this->session->userdata('id'));
		$this->db->set('estatus_solicitud', "pendiente");
	  }else if($this->input->post("estatus_solicitud") == "pendiente direccion"){
		$this->db->set('tbl_users_fecha_users_aprobacion_ag2',"NOW()", FALSE);
		$this->db->set('tbl_users_idtbl_users_aprobacion_ag2', $this->session->userdata('id'));
		$this->db->set('estatus_solicitud', "pendiente");
	}else if($this->input->post("estatus_solicitud") == "pendiente ac"){
      $id = $this->session->userdata('id_user_direccion') !== NULL ? $this->session->userdata('id_user_direccion') : $this->session->userdata('id');
      $this->db->set('tbl_users_fecha_users_aprobacion_ac',"NOW()", FALSE);
      $this->db->set('tbl_users_idtbl_users_aprobacion_ac', $id);
      $this->db->set('estatus_solicitud', "pendiente");
    }
    $this->db->where('uid',$this->input->post('uid')); 
    $result=$this->db->update('tbl_solicitudes_almacen');

	if($this->input->post("estatus_solicitud") == "pendiente ag" || $this->input->post('estatus_solicitud') == 'pendiente sis' || $this->input->post('estatus_solicitud') == "pendiente cv2"){
		foreach($this->input->post('iddtl_solicitud_catalogo') AS $key => $value){
			if($this->input->post('cantidad')[$key] != $this->input->post('cantidad_anterior')[$key]){
				$this->db->set('cantidad', $this->input->post('cantidad')[$key]);
				$this->db->set('cantidad_anterior', $this->input->post('cantidad_anterior')[$key]);
				$this->db->where('iddtl_solicitud_catalogo', $this->input->post('iddtl_solicitud_catalogo')[$key]);
				$this->db->update('dtl_solicitud_catalogo');
			}
		}
	}
    return  $result;
  }
	public function modificar_solicitud() {

		$this->db->trans_begin();

		$solicitud=$this->detalle_solicitud($this->input->post('uid'));

		$data = array(
		    'estatus_solicitud' => 'modificada',
            'uid' => '_'.$this->input->post('uid'),
            'tbl_users_idtbl_users_aprobacion' => $this->session->userdata('id')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		$this->db->update('tbl_solicitudes_almacen');
		
		$data = array(
            'estatus_solicitud' => 'aprobada',
            'fecha_limite' => $solicitud->fecha_limite,
            'sugerencia_proveedor' => $solicitud->sugerencia_proveedor,
            'tbl_users_idtbl_users_autor' => $solicitud->tbl_users_idtbl_users_autor,
            'uid' => $this->input->post('uid'),
            'parent' => $solicitud->idtbl_solicitudes_almacen,
            'tbl_proyectos_idtbl_proyectos' =>  $solicitud->tbl_proyectos_idtbl_proyectos,
            'comentarios' =>  $this->input->post('comentarios')
		);

        $this->db->insert('tbl_solicitudes_almacen', $data);

		$insert_id = $this->db->insert_id();

		foreach ($this->input->post('producto') as $key => $value) {
            if($value==0){
                $data = array(
			        'tbl_solicitudes_almacen_idtbl_solicitudes_almacen' => $insert_id,
			        'cantidad' => $this->input->post('cantidad')[$key],
			        'especificaciones' => $this->input->post('especificaciones')[$key],
			);	
            }else{
                $data = array(
			        'tbl_solicitudes_almacen_idtbl_solicitudes_almacen' => $insert_id,
			        'tbl_catalogo_idtbl_catalogo' => $value,
			        'cantidad' => $this->input->post('cantidad')[$key],
			        'especificaciones' => $this->input->post('especificaciones')[$key],
			    );	
            }
					
			//Se registra la entrada
			$this->db->insert('dtl_solicitud_catalogo', $data);

		}
		   
		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		        return false;
		}
		else
		{
		        $this->db->trans_commit();
		        return true;
		}
	}
	public function aprobar_solicitud() {
		$data = array(
                'estatus_solicitud' => 'aprobada',
                'tbl_users_idtbl_users_aprobacion' => $this->session->userdata('id')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		$result=$this->db->update('tbl_solicitudes_almacen');
   		return  $result;
	}

	public function solicitudes_pendientes() {
		$query = $this->db->query("SELECT COUNT(*) as total FROM `tbl_solicitudes_almacen` WHERE `estatus_solicitud`='creada'");
		return $query->result()[0]->total;
    }

    private function id_usuario($uid) {
		$query = $this->db->query("
			SELECT idtbl_usuarios
			FROM tbl_usuarios 
			WHERE tbl_usuarios.uid='$uid'");
		return $query->result()[0]->idtbl_usuarios;
	}
	
	/* Alfredo */
	public function get_pedidos($id_solicitud){
		$this->db->select('tbl_pedidos.*');
		// $this->db->select("CASE tbl_pedidos.condicion_pago
		// 		WHEN 'd_15' THEN
		// 			'15 días'
		// 		WHEN 'd_30' THEN
		// 			'30 días'		
		// 			WHEN 'd_60' THEN
		// 			'60 días'
		// 			WHEN 'd_90' THEN
		// 			'90 días'					
		// 	END  AS dias_pago");
		// $this->db->select("CASE tbl_pedidos.tipo_moneda
		// 		WHEN 'd' THEN
		// 			'Dollar'
		// 		WHEN 'p' THEN
		// 			'Pesos'		 					
		// 	END  AS moneda");
		$this->db->select('tbl_proyectos.nombre_proyecto');
		$this->db->select('tbl_proyectos.numero_proyecto');
		// $this->db->select('tbl_proveedores.nombre_fiscal');
		// $this->db->select('dtl_pedido_catalogo.cantidad');
		// select * from tbl_proyectos  where idtbl_proyectos idtbl_proveedores
		$this->db->from('tbl_pedidos');			
		$this->db->join('tbl_proyectos','tbl_pedidos.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos','left');
		// $this->db->join('tbl_proveedores','tbl_pedidos.tbl_proveedores_idtbl_proveedores=tbl_proveedores.idtbl_proveedores','left');
		// $this->db->join('dtl_pedido_catalogo','tbl_pedidos.idtbl_pedidos=dtl_pedido_catalogo.tbl_pedidos_idtbl_pedidos','left');
		$this->db->where('tbl_pedidos.tbl_solicitudes_almacen_idtbl_solicitudes_almacen', $id_solicitud);
		$query = $this->db->get();
		return $query->result();
	}
	public function edit_precio_solicitud($iddtl_solicitud_catalogo, $precio, $precioOrg, $idtbl_pedidos, $idtbl_catalogo) {
		$dataHistory = array( 
			'tbl_pedidos_idtbl_pedidos' => $idtbl_pedidos,
			'tbl_catalogo_idtbl_catalogo' => $idtbl_catalogo,
			'precio_anterior' => $precioOrg,
			'precio_nuevo' => $precio,
			'tbl_users_idtbl_users'=>$this->session->userdata('id'), 
			'nombre_usr'=>$this->session->userdata('nombre')
			// 'fecha' => date('Y-m-d H:i:s')
		);
		$this->db->insert('dtl_pedido_hist_cantidad', $dataHistory); 

		$data = array( 'precio' => $precio );
		$this->db->set($data);
		$this->db->where('iddtl_pedido_catalogo', $iddtl_solicitud_catalogo);
		return $result=$this->db->update('dtl_pedido_catalogo');
	}
	public function edit_cantidad_solicitud($iddtl_solicitud_catalogo, $cantidad, $cantSolicitadaOrg, $idtbl_pedidos, $idtbl_catalogo, $idtbl_solicitudes_almacen, $estimacion) {
		$dataHistory = array( 
			'tbl_pedidos_idtbl_pedidos' => $idtbl_pedidos,
			'tbl_catalogo_idtbl_catalogo' => $idtbl_catalogo,
			'cantidad_anterior' => $cantSolicitadaOrg,
			'cantidad_nueva' => $cantidad,
			'tbl_users_idtbl_users'=>$this->session->userdata('id'), 
			'nombre_usr'=>$this->session->userdata('nombre')
			// 'fecha' => date('Y-m-d H:i:s')
		);
		$this->db->insert('dtl_pedido_hist_cantidad', $dataHistory);

		/*$data = array( 'comprado' => $cantidad );
		$this->db->set($data);
		$this->db->where('tbl_catalogo_idtbl_catalogo', $idtbl_catalogo);*/
    if($estimacion == 0 ){
		  /*$this->db->where('tbl_solicitudes_almacen_idtbl_solicitudes_almacen', $idtbl_solicitudes_almacen);
      $this->db->update('dtl_solicitud_catalogo'); */
      $sql = "UPDATE dtl_solicitud_catalogo SET comprado = comprado - ? + ? WHERE tbl_catalogo_idtbl_catalogo = ? AND tbl_solicitudes_almacen_idtbl_solicitudes_almacen = ?";
      $this->db->query($sql, array($cantSolicitadaOrg, $cantidad, $idtbl_catalogo, $idtbl_solicitudes_almacen));
    }else{
       /*$this->db->where('tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion', $idtbl_solicitudes_almacen);
       $this->db->update('dtl_solicitud_estimacion');*/
      $sql = "UPDATE dtl_solicitud_estimacion SET comprado = comprado - ? + ? WHERE tbl_catalogo_idtbl_catalogo = ? AND tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion = ?";
      $this->db->query($sql, array($cantSolicitadaOrg, $cantidad, $idtbl_catalogo, $idtbl_solicitudes_almacen));
    }
		$data = array( 'cantidad' => $cantidad );
		$this->db->set($data);
		$this->db->where('iddtl_pedido_catalogo', $iddtl_solicitud_catalogo);
		return $result=$this->db->update('dtl_pedido_catalogo'); 
		// $this->db->where('iddtl_solicitud_catalogo', $iddtl_solicitud_catalogo); 
		//  return $result=$this->db->update('dtl_solicitud_catalogo'); 
	}
	public function get_detalle_prod_pedidos($idtbl_pedidos) {
		$this->db->select('dtl_pedido_catalogo.*');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->from('dtl_pedido_catalogo');		
		$this->db->join('tbl_catalogo','dtl_pedido_catalogo.tbl_catalogo_idtbl_catalogo=tbl_catalogo.idtbl_catalogo','left');
		$this->db->where('dtl_pedido_catalogo.tbl_pedidos_idtbl_pedidos', $idtbl_pedidos);
		$query = $this->db->get();
		return $query->result();		
	}	

	public function add_upfile_solicitud_compras($idtbl_solicitudes_almacen, $file) {
		$query = $this->db->query("
			SELECT file
			FROM tbl_solicitudes_almacen 
			WHERE tbl_solicitudes_almacen.idtbl_solicitudes_almacen='$idtbl_solicitudes_almacen'");
		$file_tbl = $query->result()[0]->file;
		if ($file_tbl !='') {
			$file = $file_tbl.'#@#'.$file;
		}
		$data = array(
			'file' => $file
		);
		$this->db->set($data);
		$this->db->where('idtbl_solicitudes_almacen', $idtbl_solicitudes_almacen); 
		return $result=$this->db->update('tbl_solicitudes_almacen'); 
	}	

	public function creada_solicitud() {
		$data = array(
			'estatus_solicitud' => 'pendiente',
			'tbl_users_idtbl_users_aprobacion' => $this->session->userdata('id')
		);
		$this->db->set($data);
		$this->db->where('uid',$this->input->post('uid')); 
		return $result=$this->db->update('tbl_solicitudes_almacen'); 
	}	
	// detalle_pedido
	public function detalle_pedido_hist_cantidad($idtbl_pedidos, $idtbl_catalogo, $tipo) {
		$this->db->select('dtl_pedido_hist_cantidad.*');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->from('dtl_pedido_hist_cantidad');		
		$this->db->join('tbl_catalogo','dtl_pedido_hist_cantidad.tbl_catalogo_idtbl_catalogo=tbl_catalogo.idtbl_catalogo','left');
		$this->db->where('dtl_pedido_hist_cantidad.tbl_pedidos_idtbl_pedidos', $idtbl_pedidos);
		$this->db->where('dtl_pedido_hist_cantidad.tbl_catalogo_idtbl_catalogo', $idtbl_catalogo);
		if($tipo == "cantidades") {
			$this->db->where('dtl_pedido_hist_cantidad.precio_anterior =', null);
			$this->db->where('dtl_pedido_hist_cantidad.precio_nuevo =', null);
		}
		if($tipo == "precios") {
			$this->db->where('dtl_pedido_hist_cantidad.cantidad_anterior =', 0);
			$this->db->where('dtl_pedido_hist_cantidad.cantidad_nueva =', 0);	
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizarProyectoSolicitudCompra($parametros,$uid) {
		$this->db->where('uid', $uid);
		$query = $this->db->update('tbl_solicitudes_almacen', $parametros);
		$ret = false;
		if($query) {
			$ret = true;
		}
		return $ret;
	}

	public function actualizarEstatusSolicitudAlmacen($parametros, $idtbl_solicitudes_almacen, $estimacion) {
    $table = 'tbl_solicitudes_almacen';
    $columnID = "idtbl_solicitudes_almacen";
    if($estimacion == "1"){
      $table = 'tbl_solicitudes_estimacion';
      $columnID = "idtbl_solicitudes_estimacion";
    }
		$this->db->where($columnID, $idtbl_solicitudes_almacen);
		$query = $this->db->update($table, $parametros);
		$ret = false;
		if($query) {
			$ret = true;
		}
		return $ret;
	}

	public function actualizarCantidadesSolicitudCatalogo($parametros, $idtbl_solicitudes_almacen, $estimacion) {
    $table = 'dtl_solicitud_catalogo';
    $columnID = "tbl_solicitudes_almacen_idtbl_solicitudes_almacen";
    if($estimacion == "1"){
      $table = 'dtl_solicitud_estimacion';
      $columnID = "tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion";
    }
		$this->db->where($columnID, $idtbl_solicitudes_almacen);
		$query = $this->db->update($table, $parametros);
		$ret = false;
		if($query) {
			$ret = true;
		}
		return $ret;
	}

  public function reportes_pedidos(){
    $condicion = "";
    if($this->input->post("proyecto") != "" ){
      $condicion = $condicion . "tbl_pedidos.tbl_proyectos_idtbl_proyectos = " . $this->input->post("proyecto");
    }
    if($this->input->post("productoo") != ""){
      if($condicion != "")
        $condicion = $condicion . " AND ";
      $condicion = $condicion . "dtl_pedido_catalogo.tbl_catalogo_idtbl_catalogo = " . $this->input->post("productoo");
    }
    if($this->input->post("proveedor") != ""){
      if($condicion != "")
        $condicion = $condicion . " AND ";
      $condicion = $condicion . "tbl_pedidos.tbl_proveedores_idtbl_proveedores = " . $this->input->post("proveedor");
    }
    if($this->input->post("fecha_inicio") != "" && $this->input->post("fecha_final") != ""){
      if($condicion != "")
        $condicion = $condicion . " AND ";
		if($this->input->post('tipoSolicitud') == 'pagos'){
			$condicion = $condicion . "dtl_pagos.fecha_pago BETWEEN '" . $this->input->post("fecha_inicio") . "' AND '" . $this->input->post("fecha_final") . "'";
		}else{
      		$condicion = $condicion . "tbl_pedidos.fecha_pedido_estimacion BETWEEN '" . $this->input->post("fecha_inicio") . "' AND '" . $this->input->post("fecha_final") . "'";
		}
    }
    if($condicion != "")
        $condicion = $condicion . " AND ";
    if($this->input->post("tipoSolicitud") == "estandar"){
      $condicion = $condicion . "tbl_pedidos.estimacion = 0";
    }elseif($this->input->post("tipoSolicitud") == "virtuales"){
		$condicion = $condicion . "tbl_pedidos.entrada_virtual = 1";
	}elseif($this->input->post("tipoSolicitud") == "estimacion"){
		$condicion = $condicion . "tbl_pedidos.estimacion = 1";
	}
	if($this->input->post('tipoSolicitud') == 'pagos'){
		$condicion = $condicion . " (tbl_pedidos.estatus='cerrada' OR tbl_pedidos.estatus IS NULL)";
	}else{
		$condicion = $condicion . " AND (tbl_pedidos.estatus='cerrada' OR tbl_pedidos.estatus IS NULL)";
	}
	if(isset($_POST['tipo_user'])){
		$condicion = $condicion . " AND tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = 29";
	}
	if($this->input->post('tipoSolicitud') == 'pagos'){
		$sql = "SELECT tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto, tbl_pedidos.uid, tbl_pedidos.neodata_pedido, tbl_pedidos.fecha_pedido_estimacion AS fecha_creacion, tbl_proveedores.nombre_fiscal, tbl_catalogo.neodata, tbl_catalogo.descripcion, ctl_unidades_medida.unidad_medida, dtl_pedido_catalogo.cantidad, dtl_pedido_catalogo.precio, dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio as subtotal, IF(ISNULL(tbl_pedidos.iva), 0, (dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio)*(tbl_pedidos.iva/100)) as iva, (dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio) + (IF(ISNULL(tbl_pedidos.iva), 0, (dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio)*(tbl_pedidos.iva/100))) as importe_calculado, tbl_pedidos.tipo_moneda, tbl_pedidos.fecha_pedido_estimacion, dtl_pagos.numero_factura, dtl_pagos.folio_pago, dtl_pagos.fecha_pago, dtl_pagos.importe, dtl_pagos.tipo_cambio, tbl_bancos.nombre_banco, tbl_pedidos.observaciones, dtl_pagos.importe_pago FROM dtl_pedido_catalogo JOIN tbl_pedidos ON tbl_pedidos.idtbl_pedidos = dtl_pedido_catalogo.tbl_pedidos_idtbl_pedidos JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_pedido_catalogo.tbl_catalogo_idtbl_catalogo JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_pedidos.tbl_proyectos_idtbl_proyectos JOIN ctl_unidades_medida ON ctl_unidades_medida.idctl_unidades_medida = tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida JOIN tbl_proveedores ON tbl_proveedores.idtbl_proveedores=tbl_pedidos.tbl_proveedores_idtbl_proveedores LEFT JOIN dtl_pagos ON dtl_pagos.tbl_pedidos_idtbl_pedidos = tbl_pedidos.idtbl_pedidos LEFT JOIN tbl_bancos ON tbl_bancos.idtbl_bancos = dtl_pagos.tbl_bancos_idtbl_bancos " . ($condicion != "" ? "WHERE " . $condicion : "") . " GROUP BY dtl_pagos.iddtl_pagos" ;
	}else{
    	$sql = "SELECT tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto, tbl_pedidos.uid, tbl_pedidos.neodata_pedido, tbl_pedidos.fecha_pedido_estimacion AS fecha_creacion, tbl_proveedores.nombre_fiscal, tbl_catalogo.neodata, tbl_catalogo.descripcion, ctl_unidades_medida.unidad_medida, dtl_pedido_catalogo.cantidad, dtl_pedido_catalogo.precio, dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio as subtotal, IF(ISNULL(tbl_pedidos.iva), 0, (dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio)*(tbl_pedidos.iva/100)) as iva, (dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio) + (IF(ISNULL(tbl_pedidos.iva), 0, (dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio)*(tbl_pedidos.iva/100))) as importe_calculado, tbl_pedidos.tipo_moneda, tbl_pedidos.fecha_pedido_estimacion, dtl_pagos.numero_factura, dtl_pagos.folio_pago, dtl_pagos.fecha_pago, dtl_pagos.importe, dtl_pagos.tipo_cambio, tbl_bancos.nombre_banco, tbl_pedidos.observaciones, dtl_pagos.importe_pago FROM dtl_pedido_catalogo JOIN tbl_pedidos ON tbl_pedidos.idtbl_pedidos = dtl_pedido_catalogo.tbl_pedidos_idtbl_pedidos JOIN tbl_solicitudes_almacen ON tbl_solicitudes_almacen.idtbl_solicitudes_almacen = tbl_pedidos.tbl_solicitudes_almacen_idtbl_solicitudes_almacen JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_pedido_catalogo.tbl_catalogo_idtbl_catalogo JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_pedidos.tbl_proyectos_idtbl_proyectos JOIN ctl_unidades_medida ON ctl_unidades_medida.idctl_unidades_medida = tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida JOIN tbl_proveedores ON tbl_proveedores.idtbl_proveedores=tbl_pedidos.tbl_proveedores_idtbl_proveedores LEFT JOIN dtl_pagos ON dtl_pagos.tbl_pedidos_idtbl_pedidos = tbl_pedidos.idtbl_pedidos LEFT JOIN tbl_bancos ON tbl_bancos.idtbl_bancos = dtl_pagos.tbl_bancos_idtbl_bancos " . ($condicion != "" ? "WHERE " . $condicion : "") . " GROUP BY dtl_pedido_catalogo.iddtl_pedido_catalogo" ;
	} 
	
	$query = $this->db->query($sql);
      return $query->result();
  }

  public function reportes_solicitudes(){
	if($this->input->post('gestion') == 'solicitudes'){
		if($this->input->post('tipo_solicitudes') == 'producto'){
			$condicion = "";
			if($this->input->post("estatus_solicitud") != "" ){
			$condicion = $condicion . "tbl_solicitudes_almacen.estatus_solicitud = '" . $this->input->post("estatus_solicitud") . "'";
			}
			if($this->input->post("almacen_reporte") != ""){
			if($condicion != "")
				$condicion = $condicion . " AND ";
			$condicion = $condicion . "tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = " . $this->input->post("almacen_reporte");
			}
			if($this->input->post("anio") != ""){
			if($condicion != "")
				$condicion = $condicion . " AND ";
			$condicion = $condicion . "YEAR(tbl_solicitudes_almacen.fecha_creacion) = " . $this->input->post("anio");
			}
			
			
			$sql = "SELECT tbl_proyectos.numero_proyecto, tbl_proyectos.nombre_proyecto, tbl_solicitudes_almacen.uid, tbl_users.nombre, tbl_solicitudes_almacen.fecha_creacion, tbl_almacenes.almacen, tbl_catalogo.neodata, tbl_catalogo.descripcion, ctl_unidades_medida.unidad_medida_abr, dtl_solicitud_catalogo.cantidad, tbl_solicitudes_almacen.motivo_cancelacion FROM tbl_solicitudes_almacen LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_solicitudes_almacen.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_users ON tbl_users.idtbl_users = tbl_solicitudes_almacen.tbl_users_idtbl_users_autor LEFT JOIN tbl_almacenes ON tbl_almacenes.idtbl_almacenes = tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes LEFT JOIN dtl_solicitud_catalogo ON dtl_solicitud_catalogo.tbl_solicitudes_almacen_idtbl_solicitudes_almacen = tbl_solicitudes_almacen.idtbl_solicitudes_almacen LEFT JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_solicitud_catalogo.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_unidades_medida ON ctl_unidades_medida.idctl_unidades_medida = tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida" . ($condicion != "" ? " WHERE " . $condicion : "");
		}else{
			$condicion = "";
			if($this->input->post("estatus_solicitud") != "" ){
			$condicion = $condicion . "tbl_solicitudes_almacen.estatus_solicitud = '" . $this->input->post("estatus_solicitud") . "'";
			}
			if($this->input->post("almacen_reporte") != ""){
			if($condicion != "")
				$condicion = $condicion . " AND ";
			$condicion = $condicion . "tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = " . $this->input->post("almacen_reporte");
			}
			if($this->input->post("anio") != ""){
			if($condicion != "")
				$condicion = $condicion . " AND ";
			$condicion = $condicion . "YEAR(tbl_solicitudes_almacen.fecha_creacion) = " . $this->input->post("anio");
			}
			
			
			$sql = "SELECT MONTHNAME(tbl_solicitudes_almacen.fecha_creacion) AS mes, COUNT(tbl_solicitudes_almacen.idtbl_solicitudes_almacen) AS total FROM tbl_solicitudes_almacen " . ($condicion != "" ? "WHERE " . $condicion : "") . " GROUP BY MONTH(tbl_solicitudes_almacen.fecha_creacion)";
		}
	}else{
		$condicion = "";
		if($this->input->post("almacen_reporte") != ""){
			if($condicion != "")
				$condicion = $condicion . " AND ";
				$condicion = $condicion . "tbl_solicitudes_almacen.tbl_almacenes_idtbl_almacenes = " . $this->input->post("almacen_reporte");
			}
			if($this->input->post("anio") != ""){
				if($condicion != "")
					$condicion = $condicion . " AND ";
				$condicion = $condicion . "YEAR(tbl_pedidos.fecha_creacion) = " . $this->input->post("anio");
			}
			if($this->input->post("proyecto") != ""){
				if($condicion != "")
					$condicion = $condicion . " AND ";
				$condicion = $condicion . "tbl_pedidos.tbl_proyectos_idtbl_proyectos = " . $this->input->post("proyecto");
			}

			$condicion = $condicion . " AND (tbl_pedidos.estatus='cerrada' OR tbl_pedidos.estatus IS NULL)";
		
		$sql = "SELECT MONTHNAME(tbl_pedidos.fecha_creacion) AS mes, IF(tbl_pedidos.tipo_moneda='d',SUM((dtl_pedido_catalogo.cantidad*(dtl_pedido_catalogo.precio * 20)) + (IF(ISNULL(tbl_pedidos.iva), 0, (dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio)*(tbl_pedidos.iva/100)))), SUM((dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio) + (IF(ISNULL(tbl_pedidos.iva), 0, (dtl_pedido_catalogo.cantidad*dtl_pedido_catalogo.precio)*(tbl_pedidos.iva/100))))) as total FROM dtl_pedido_catalogo JOIN tbl_pedidos ON tbl_pedidos.idtbl_pedidos = dtl_pedido_catalogo.tbl_pedidos_idtbl_pedidos JOIN tbl_solicitudes_almacen ON tbl_solicitudes_almacen.idtbl_solicitudes_almacen = tbl_pedidos.tbl_solicitudes_almacen_idtbl_solicitudes_almacen JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_pedido_catalogo.tbl_catalogo_idtbl_catalogo JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_pedidos.tbl_proyectos_idtbl_proyectos " . ($condicion != "" ? "WHERE " . $condicion : "") . " GROUP BY MONTH(tbl_pedidos.fecha_creacion)";
		
	}  
	$query = $this->db->query($sql);
    return $query->result();
  }

  public function tipoCambio(){

  }

  public function deleteProduct($id) {
    $this->db->where('iddtl_solicitud_catalogo', $id);
    $query = $this->db->delete('dtl_solicitud_catalogo');
    $ret = false;
    if($query) {
      $ret = true;
    }
    return $ret;
  }

  public function indicadoresAreaCompras(){
    $data = [];
    $query = $this->db->query("SELECT COUNT(*) total FROM tbl_solicitudes_almacen");
    $data['total_compras'] = $query->result()[0]->total;
    $query = $this->db->query("SELECT COUNT(*) total FROM tbl_solicitudes_almacen WHERE estatus_solicitud = 'pendiente'");
    $data['total_compras_pendientes'] = $query->result()[0]->total;
    $query = $this->db->query("SELECT COUNT(*) total FROM tbl_solicitudes_almacen WHERE estatus_solicitud = 'cancelada'");
    $data['total_compras_canceladas'] = $query->result()[0]->total;
    $query = $this->db->query("SELECT COUNT(*) total FROM tbl_solicitudes_almacen WHERE estatus_solicitud = 'aprobada'");
    $data['total_compras_aprobadas'] = $query->result()[0]->total;

    $query = $this->db->query("SELECT COUNT(*) total FROM tbl_pedidos WHERE estimacion = 0");
    $data['total_estimaciones'] = $query->result()[0]->total;
    $query = $this->db->query("SELECT COUNT(*) total FROM tbl_pedidos WHERE estatus IS NULL AND estimacion = 0");
    $data['total_estimaciones_pendientes'] = $query->result()[0]->total;
    $query = $this->db->query("SELECT COUNT(*) total FROM `tbl_pedidos` WHERE estatus = 'cancelada' AND estimacion = 0");
    $data['total_estimaciones_canceladas'] = $query->result()[0]->total;
    $query = $this->db->query("SELECT COUNT(*) total FROM `tbl_pedidos` WHERE estatus = 'cerrada' AND estimacion = 0");
    $data['total_estimaciones_finalizadas'] = $query->result()[0]->total;

    $query = $this->db->query("SELECT COUNT(*) total FROM tbl_pedidos WHERE estimacion = 1");
    $data['total_pedidos_estimacion'] = $query->result()[0]->total;
    $query = $this->db->query("SELECT COUNT(*) total FROM tbl_pedidos WHERE estatus IS NULL AND estimacion = 1");
    $data['total_pedidos_estimacion_pendientes'] = $query->result()[0]->total;
    $query = $this->db->query("SELECT COUNT(*) total FROM `tbl_pedidos` WHERE estatus = 'cancelada' AND estimacion = 1");
    $data['total_pedidos_estimacion_canceladas'] = $query->result()[0]->total;
    $query = $this->db->query("SELECT COUNT(*) total FROM `tbl_pedidos` WHERE estatus = 'cerrada' AND estimacion = 1");
    $data['total_pedidos_estimacion_finalizadas'] = $query->result()[0]->total;

    $year = $this->input->get("year");

    $query = $this->db->query("SELECT MONTH(dtl_pagos.fecha_pago) AS month, YEAR(dtl_pagos.fecha_pago) AS year, SUM(IF(dtl_pagos.tipo_cambio IS NOT NULL AND dtl_pagos.tipo_cambio != 0, dtl_pagos.importe * dtl_pagos.tipo_cambio, dtl_pagos.importe)) AS total FROM dtl_pagos JOIN tbl_pedidos ON tbl_pedidos.idtbl_pedidos = dtl_pagos.tbl_pedidos_idtbl_pedidos WHERE YEAR(dtl_pagos.fecha_pago) = " . $year . " GROUP BY MONTH(dtl_pagos.fecha_pago), YEAR(dtl_pagos.fecha_pago)");
    $data['grafica_total_costo_pedidos_mes_anio'] = $query->result();

    return $data;
  }

  //Query para traer los neodata de un producto
  public function getNeodata($neodata){
	  $this->db->like('neodata', $neodata);
	  if($neodata == '-TOA-'){
		$this->db->or_where('neodata', 'CN-PAÑ-TAR-001');
	  }elseif($neodata == '-MAQ-'){
		$this->db->or_where('neodata', 'AF-EMP-FIT-001');
	  }elseif($neodata == '-OFI-'){
		$this->db->or_where('neodata', 'HR-VEN-PIS-002');
	  }elseif($neodata == '-PIE-'){
		$this->db->or_where('neodata', 'RF-AMO-DEL-008');
	  }
	  $this->db->from('tbl_catalogo');
	  $query = $this->db->get();
	return $query->result();
  }


}