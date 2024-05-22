<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Estimaciones_model extends CI_Model{

		public function __construct() {
			parent::__construct();
			$this->load->database();
		}

		public function estimaciones($buscar='', $inicio = false, $cantidadRegistro = false) {
	      	$limit = '';
		    if($inicio !== false && $cantidadRegistro !== false) {
		      $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		    }
		    $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_solicitudes_estimacion.*, tbl_users.nombre, tbl_clientes.nombre_comercial, CASE tbl_solicitudes_estimacion.estatus_solicitud WHEN 'pendiente' THEN 'color_amarillo' WHEN 'cancelada' THEN 'color_rojo' WHEN 'aprobada' THEN 'color_verde' END AS color FROM tbl_solicitudes_estimacion LEFT JOIN tbl_proyectos ON tbl_solicitudes_estimacion.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_solicitudes_estimacion.tbl_users_idtbl_users_autor=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes WHERE tbl_solicitudes_estimacion.uid LIKE '%$buscar%' OR tbl_solicitudes_estimacion.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_estimacion.fecha_limite LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_solicitudes_estimacion.estatus_solicitud LIKE '%$buscar%' ORDER BY tbl_solicitudes_estimacion.idtbl_solicitudes_estimacion DESC " . $limit);
		    return $query->result();
	  	}

	  	public function detalle_solicitud($uid) {
	   		$this->db->select('tbl_proyectos.nombre_proyecto');
			$this->db->select('tbl_proyectos.numero_proyecto');
			$this->db->select('tbl_proyectos.direccion');
			$this->db->select('tbl_segmentos_proyecto.segmento');
			$this->db->select('DATE_FORMAT(tbl_proyectos.fecha_creacion, "%Y-%m-%d") as fecha_creacion_proyecto');
			$this->db->select('DATE_FORMAT(tbl_solicitudes_estimacion.fecha_creacion, "%Y-%m-%d") as fecha_creacion_almacen');		
			$this->db->select('tbl_solicitudes_estimacion.*');
			$this->db->select('tbl_users.nombre');
			$this->db->select('tbl_clientes.nombre_comercial');
			$this->db->select('tbl_solicitudes_estimacion.tbl_segmentos_proyecto_idtbl_segmentos_proyecto');
			$this->db->select('tbl_proveedores.nombre_fiscal');
			//$this->db->select('tbl_usuarios.apellido_paterno');
			//$this->db->select('tbl_usuarios.apellido_materno');

			$this->db->from('tbl_solicitudes_estimacion');
			$this->db->join('tbl_proveedores','tbl_solicitudes_estimacion.tbl_proveedores_idtbl_proveedores=tbl_proveedores.idtbl_proveedores','left');
			//$this->db->join('tbl_usuarios','tbl_solicitudes_estimacion.tbl_usuarios_idtbl_usuarios=tbl_usuarios.idtbl_usuarios','left');
			$this->db->join('tbl_proyectos','tbl_solicitudes_estimacion.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos','left');
			$this->db->join('tbl_users','tbl_solicitudes_estimacion.tbl_users_idtbl_users_autor=tbl_users.idtbl_users','left');
			$this->db->join('tbl_clientes','tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes','left');
			$this->db->join('tbl_segmentos_proyecto','tbl_segmentos_proyecto.idtbl_segmentos_proyecto=tbl_solicitudes_estimacion.tbl_segmentos_proyecto_idtbl_segmentos_proyecto','left');

			$this->db->where('tbl_solicitudes_estimacion.uid', $uid);

			$query = $this->db->get();
			$resultado = $query->result();

	        if(count($resultado)>0){
	            return $query->result()[0];
	        }
	        else
	            return false;
    	}

		public function actualizarProyectoSolicitudEstimacion($parametros,$uid) {
			$this->db->where('uid', $uid);
			$query = $this->db->update('tbl_solicitudes_estimacion', $parametros);
			$ret = false;
			if($query) {
				$ret = true;
			}
			return $ret;
		}

		public function detalle_solicitud_catalogo($id_solicitud) {
		    $this->db->select('dtl_solicitud_estimacion.*');
		    $this->db->select('tbl_catalogo.*');
		    $this->db->select('ctl_unidades_medida.unidad_medida_abr');
		    $this->db->from('dtl_solicitud_estimacion');      

		    $this->db->join('tbl_catalogo','tbl_catalogo.idtbl_catalogo=dtl_solicitud_estimacion.tbl_catalogo_idtbl_catalogo','left');
		    $this->db->join('ctl_unidades_medida','tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida','left');
		        
		    $this->db->where('dtl_solicitud_estimacion.tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion', $id_solicitud);

		    $query = $this->db->get();

		    return $query->result();
  		}

  		public function datossolicitud($uid) {
			$resultado['solicitud']=$this->detalle_solicitud($uid);
			if($resultado['solicitud']) {
				$resultado['detalle']=$this->detalle_solicitud_catalogo($resultado['solicitud']->idtbl_solicitudes_estimacion);
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

    	public function cancelar_solicitud() {
			$data = array(
	                'estatus_solicitud' => 'cancelada',
	                'tbl_users_idtbl_users_aprobacion' => $this->session->userdata('id')
			);
			$this->db->set($data);
			$this->db->where('uid',$this->input->post('uid')); 
			$result=$this->db->update('tbl_solicitudes_estimacion');
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
			$this->db->update('tbl_solicitudes_estimacion');
			
			var_dump($this->input->post('uid'));

			$data = array(
	            'estatus_solicitud' => 'aprobada',
	            'fecha' => $solicitud->fecha,
	            'fecha_inicio' => $solicitud->fecha_inicio,
	            'fecha_limite' => $solicitud->fecha_limite,
	            'contrato' => $solicitud->contrato,
	            'estimacion' => $solicitud->estimacion,
	            'tbl_proveedores_idtbl_proveedores' => $solicitud->tbl_proveedores_idtbl_proveedores,
	            'tbl_usuarios_idtbl_usuarios' => $solicitud->tbl_usuarios_idtbl_usuarios,
	            'tbl_users_idtbl_users_autor' => $solicitud->tbl_users_idtbl_users_autor,
	            'uid' => $this->input->post('uid'),
	            'parent' => $solicitud->idtbl_solicitudes_estimacion,
	            'tbl_proyectos_idtbl_proyectos' =>  $solicitud->tbl_proyectos_idtbl_proyectos,
	            'observaciones' =>  $this->input->post('observaciones')
			);

	        $this->db->insert('tbl_solicitudes_estimacion', $data);

			$insert_id = $this->db->insert_id();

			foreach ($this->input->post('producto') as $key => $value) {
	            if($value==0){
	                $data = array(
				        'tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion' => $insert_id,
				        'cantidad' => $this->input->post('cantidad')[$key],
				        'cantidad_estimada' => $this->input->post('cantidad_estimada')[$key],
				        'especificaciones' => $this->input->post('especificaciones')[$key]
				);	
	            }else{
	                $data = array(
				        'tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion' => $insert_id,
				        'tbl_catalogo_idtbl_catalogo' => $value,
				        'cantidad' => $this->input->post('cantidad')[$key],
				        'cantidad_estimada' => $this->input->post('cantidad_estimada')[$key],
				        'especificaciones' => $this->input->post('especificaciones')[$key]
				    );	
	            }
						
				//Se registra la entrada
				$this->db->insert('dtl_solicitud_estimacion', $data);

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
			$result=$this->db->update('tbl_solicitudes_estimacion');
	   		return  $result;
		}
		public function creada_solicitud() {
			$data = array(
				'estatus_solicitud' => 'pendiente',
				'tbl_users_idtbl_users_aprobacion' => $this->session->userdata('id')
			);
			$this->db->set($data);
			$this->db->where('uid',$this->input->post('uid')); 
			return $result=$this->db->update('tbl_solicitudes_estimacion'); 
		}

		public function guardar_pedido($uid) {
	    	$this->db->trans_begin();
	    	if(isset($_POST['isr'])) {
	      		$isr = $_POST['isr'];
	      		//$retencion = $_POST['retencion'];
	    	}
	    	else {
	      		$porcentaje = NULL;
	      		$retencion = NULL;
	    	}
	    	$data = array(
	    		'uid' => $uid,
	    		'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
	    		'tbl_segmentos_proyecto_idtbl_segmentos_proyecto ' => (empty($this->input->post('segmento')))? NULL : $this->input->post('segmento'),
	    		'tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion' => $this->input->post('id-solicitud'),
	    		'tbl_proveedores_idtbl_proveedores' => $this->input->post('proveedor'),
	    		'tbl_users_idtbl_users'=>$this->session->userdata('id'),
	    		'neodata_pedido' => $this->input->post('neodata'),
	    		'tipo_moneda' => $this->input->post('moneda'),
	    		'condicion_pago' => $this->input->post('condicion-pago'),
	    		'lugar_entrega' => $this->input->post('lugar-entrega'),
	    		'observaciones' => $this->input->post('observaciones'),
	    		'estimacion' => 1,
	    		'porcentaje_retencion' => $isr,
	    		'nota_credito' => $this->input->post('nota_credito'),
	    		'iva' => $this->input->post('iva'),
				'iva_retencion' => $this->input->post('porcentaje'),
	    		'amortizacion' => $this->input->post('amortizacion'),
				'amortizacion_anticipo' => $this->input->post('amortizacion_anticipo'),
	    		'fecha_pedido_estimacion' => $this->input->post('fecha_estimacion'),
	    		'porcentaje_fondo_retencion_garantia' => $this->input->post('porcentaje_fondo_retencion_garantia')
	    	);
	    	$this->db->insert('tbl_pedidos', $data);	
	    	$insert_id = $this->db->insert_id();
	    	foreach ($this->input->post('id-producto-catalogo') as $key => $value) {
	    		if($this->input->post('cantidad')[$key]!=0) {
	    			$this->db->set('comprado', 'comprado+'.$this->input->post('cantidad')[$key],FALSE);
	    			$this->db->where('iddtl_solicitud_estimacion',$this->input->post('id_registro')[$key]);
	    			$this->db->update('dtl_solicitud_estimacion');
	    			$data = array(
	    				'tbl_pedidos_idtbl_pedidos'=>$insert_id,
	    			 	'tbl_catalogo_idtbl_catalogo'=>$value,
	    			 	'cantidad'=>$this->input->post('cantidad')[$key],
	    			 	'precio'=>$this->input->post('precio')[$key],
	    			 	//'fecha_entrega'=>date( 'Y-m-d', strtotime( $this->input->post('fechaEntrega')[$key] ) ),
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

    	public function modificarCantidad($registros){
    		$this->db->trans_begin();
    		$idtbl_solicitudes_estimacion = $this->input->post("idtbl_solicitudes_estimacion");
    		for($r=0; $r<$registros; $r++){
		    	$cantidad = $this->input->post("cantidad")[$r];
		      	$producto = $this->input->post("producto")[$r];
		      	$sql = "UPDATE dtl_solicitud_estimacion SET cantidad = ? WHERE 	tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion  = ? AND  tbl_catalogo_idtbl_catalogo = ?";
		      	$this->db->query($sql, array($cantidad, $idtbl_solicitudes_estimacion, $producto));
    		}
    		if ($this->db->trans_status() === FALSE) {
	    		$this->db->trans_rollback();
	    		return false;
	    	} else {
	    		$this->db->trans_commit();
	    		return true;
	    	}
    	}

	}
?>