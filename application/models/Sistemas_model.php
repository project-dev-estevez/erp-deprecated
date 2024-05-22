<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Sistemas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function inventarioAlmacenSistemasAF($buscar = '', $select = '', $inicio = false, $cantidadRegistro = false) {
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
			$string = "AND (DA.estatus = 'almacen' OR DA.estatus = 'asignado' OR DA.estatus = 'dañado' OR DA.estatus = 'descompuesto' OR DA.estatus = 'robado' OR DA.estatus = 'abuso de confianza' OR DA.estatus = 'vendida') ";
		}
		if($select != '') {
			$string = "AND (DA.estatus = '$select') ";
		}
		if ($buscar2 != '') {
			$query = $this->db->query("SELECT DA.*, TC.*, CC.*, CUM.*, (SELECT MAX(TCSS.fecha) FROM tbl_checklist_servicio_sistemas TCSS LEFT JOIN dtl_almacen DAN ON DAN.iddtl_almacen = TCSS.dtl_almacen_iddtl_almacen WHERE DAN.iddtl_almacen = DA.iddtl_almacen AND TCSS.tipo_servicio = 'Preventivo') AS ultima_fecha FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida WHERE DA.tbl_almacenes_idtbl_almacenes = " . ID_ALMACEN_SISTEMAS . "  AND TC.tipo = 6 AND CC.idctl_categorias = 16  $string AND (TC.neodata LIKE '%$buscar%' OR TC.descripcion LIKE '%$buscar%' OR DA.numero_serie LIKE '%$buscar%' OR DA.numero_interno LIKE '%$buscar%') " . $limit);
		} else {
			$query = $this->db->query("SELECT DA.*, TC.*, CC.*, CUM.*, (SELECT MAX(TCSS.fecha) FROM tbl_checklist_servicio_sistemas TCSS LEFT JOIN dtl_almacen DAN ON DAN.iddtl_almacen = TCSS.dtl_almacen_iddtl_almacen WHERE DAN.iddtl_almacen = DA.iddtl_almacen AND TCSS.tipo_servicio = 'Preventivo') AS ultima_fecha FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida WHERE DA.tbl_almacenes_idtbl_almacenes = " . ID_ALMACEN_SISTEMAS . "  AND TC.tipo = 6 AND CC.idctl_categorias = 16  $string AND (TC.neodata LIKE '%$buscar%' OR TC.descripcion LIKE '%$buscar%' OR DA.numero_serie LIKE '%$buscar%' OR DA.numero_interno LIKE '%$buscar%') " . $limit);
		}
		return $query->result();
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

    
    //Función para traer detalle de un ticket por uid
    public function detalle_ticket($uid)
    {
        $query = $this->db->query("SELECT tbl_tickets.*, tus.nombre AS autor, tudw.nombre AS nombre_desarrollador FROM tbl_tickets LEFT JOIN tbl_users tus ON tus.idtbl_users = tbl_tickets.tbl_users_idtbl_users LEFT JOIN tbl_users tudw ON tudw.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw WHERE tbl_tickets.uid = '$uid' ");
        
        return $query->result();
    }

    public function getTodosActivosAsignados($idtbl_usuarios)
    {
        $query = $this->db->query("SELECT * FROM dtl_asignacion LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = dtl_asignacion.dtl_almacen_iddtl_almacen LEFT JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_almacen.tbl_catalogo_idtbl_catalogo WHERE dtl_asignacion.tbl_usuarios_idtbl_usuarios = " . $idtbl_usuarios . " AND dtl_almacen.tbl_almacenes_idtbl_almacenes = " . ID_ALMACEN_SISTEMAS . " GROUP BY dtl_almacen.iddtl_almacen");
        return $query->result();
    }

    public function incidenciasByUid($uid)
    {
        $query = $this->db->query("SELECT dtl_almacen.numero_interno, dtl_almacen.placas, tbl_incidencias.* FROM tbl_incidencias LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_incidencias.dtl_almacen_iddtl_almacen LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_incidencias.tbl_usuarios_idtbl_usuarios WHERE tbl_incidencias.tipo_incidencia = 'sistemas' AND tbl_usuarios.uid = '$uid'");
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
		$query = $this->db->query("SELECT dtl_almacen.numero_interno, dtl_almacen.placas, tbl_incidencias.*, CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) AS personal, tbl_proyectos.nombre_proyecto FROM tbl_incidencias LEFT JOIN dtl_almacen ON dtl_almacen.iddtl_almacen = tbl_incidencias.dtl_almacen_iddtl_almacen LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios = tbl_incidencias.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_incidencias.tbl_proyectos_idtbl_proyectos WHERE tbl_incidencias.tipo_incidencia = 'sistemas'" . $condition . " ORDER BY tbl_incidencias.idtbl_incidencias DESC " . $limit);
        return $query->result();
	}

    //Función para aprobar tickets
    public function aprobar_ticket($proceso, $imagenes)
    {
        if ($proceso == 'finalizar') {
            $data = array(
                'estatus' => 'R',
                'imagenes_firmas_dw' => json_encode($imagenes),
                'observaciones' => $this->input->post('observaciones'),
                'fecha_finalizacion' => date('Y-m-d H:i:s')
                );
        } else {
            if ($this->session->userdata('tipo') == 2) {
                $data = array(
                    'estatus' => 'TI',
                    'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                    'fecha_aprobacion_dw' => date('Y-m-d H:i:s')
                );
            } else {
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

    public function reporte_sistemas($tipo_reporte) {
		// Datos esenciales
		if($this->input->post("tipo_reporte") == 'servicio_km'){
			$condition = "";
			if(isset($_POST['modelo'])){
				$condition = $condition . " AND TC.modelo LIKE '% " . $this->input->post('modelo') . "%'";
			}

			if(isset($_POST['eco'])){
				$condition = $condition .  " AND DA.iddtl_almacen = " . $this->input->post('eco');
			}
			
			$query = $this->db->query("SELECT DS.iddtl_servicio, TC.marca, TC.modelo, DA.placas, DA.ubicacion AS ruth, DA.numero_interno, DA.km_actual, DA.km_servicio, DA.anio, DA.numero_serie, DA.no_motor, IF(DA.km_actual IS NOT NULL AND DA.km_servicio IS NOT NULL, DA.km_servicio - DA.km_actual, 0) AS km_diff, IF(DS.iddtl_servicio IS NOT NULL, 1, 0) AS en_servicio, ASI.tbl_usuarios_idtbl_usuarios AS ama FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN dtl_asignacion ASI ON ASI.dtl_almacen_iddtl_almacen=DA.iddtl_almacen LEFT JOIN tbl_usuarios US ON US.idtbl_usuarios=ASI.tbl_usuarios_idtbl_usuarios LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN tbl_tramites_vehiculares ttv ON ttv.dtl_almacen_iddtl_almacen = DA.iddtl_almacen AND ttv.idtbl_tramites_vehiculares = (SELECT MAX(t1.idtbl_tramites_vehiculares) FROM tbl_tramites_vehiculares t1 WHERE t1.dtl_almacen_iddtl_almacen = DA.iddtl_almacen and t1.tipo_tramite = 'servicio') LEFT JOIN dtl_servicio DS ON DS.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = ttv.idtbl_tramites_vehiculares AND DS.estatus != 'FINALIZADO' WHERE DA.tbl_almacenes_idtbl_almacenes = 28 AND (TC.tipo = 4) AND (DA.estatus = 'disponible' OR DA.estatus = 'asignado' OR DA.estatus = 'reparacion' OR DA.estatus = 'taller' OR DA.estatus = 'robado' OR DA.estatus = 'vendida' OR DA.estatus = 'perdida total' OR DA.estatus = 'vendida' OR DA.estatus = 'colision' OR DA.estatus = 'tramite vehicular') GROUP BY DA.iddtl_almacen ORDER BY DA.numero_interno");
			return $query->result_array();
		}
		
		$this->db->select('DAM.numero_interno, TC.descripcion, DAM.placas, tbl_entidad.nombre_entidad AS entidad_federativa, DAM.km_actual, DAM.no_motor, DAM.tipo_combustible, DAM.tipo_vehiculo, DAM.anio, DAM.ubicacion, DAM.km_actual, TC.modelo, TC.marca');

		//Datos para tipo de reporte asignaciones
		if($this->input->post('tipo_reporte') == 'general' || $this->input->post('tipo_reporte') == 'asignado'){
			$this->db->select('TAM.folio, TUS.nombres, TUS.apellido_paterno, TUS.apellido_materno, DA.fecha_asignacion, DA.fecha_finalizacion, TUSERS.nombre as autor');
			$this->db->where('TC.descripcion != "PERSONAL"');
		}

		// Datos para servicios
		if ($this->input->post('tipo_reporte') == 'servicio') {
			$this->db->select('TV.idtbl_tramites_vehiculares, TV.detalle_tramite, TV.fecha_tramite, DS.fecha_inicio, DS.fecha_finalizacion, mecanico.nombre AS mecanico, autor.nombre AS autor, @minutes := (TIMESTAMPDIFF(MINUTE, DS.fecha_inicio, DS.fecha_finalizacion) - DS.tiempo_minutos_pausa), CONCAT(FLOOR(@minutes/60),"h ",MOD(@minutes,60)," m") AS productividad, IF(DS.estatus = "FINALIZADO", tbl_checklist_servicio.km_salida, tbl_checklist_servicio.km_entrada) AS km, json_extract(tbl_checklist_servicio.checklist_tecnico, "$.rt0") AS rt0');
			$this->db->where('TC.descripcion != "PERSONAL"');
		}

		// Datos para verificaciones
		if ($this->input->post('tipo_reporte') == 'verificacion' || $this->input->post('tipo_reporte') == 'seguro' || $this->input->post('tipo_reporte') == 'tenencia' || $this->input->post('tipo_reporte') == 'placas' || $this->input->post('tipo_reporte') == 'cambio_propietario' || $this->input->post('tipo_reporte') == 'siniestro') {
			$this->db->select('DATE_FORMAT(TV.fecha_tramite, "%d-%m-%Y") AS fecha_tramite, DATE_FORMAT(TV.proxima_fecha_tramite, "%d-%m-%Y") AS proxima_fecha_tramite, TV.detalle_tramite, TV.tipo_tramite, TV.poliza, TV.seguro, TV.costo, TV.engomado');
		}

		//Datos para siniestros
		if($this->input->post('tipo_reporte') == 'siniestro'){
			$this->db->select('TSV.*, CONCAT(TReporte.nombres," ",TReporte.apellido_materno," ",TReporte.apellido_paterno) as nombre_reporte, CONCAT(atiende.nombres," ",atiende.apellido_materno," ",atiende.apellido_paterno) as nombre_atiende');
			$this->db->where('TC.descripcion != "PERSONAL"');
		}

		//Datos para cambio propietario
		if($this->input->post('tipo_reporte') == 'cambio_propietario'){
			$this->db->select('CP.dueno, CP.nuevo_dueno');
			$this->db->where('TC.descripcion != "PERSONAL"');
		}

		$this->db->from('dtl_almacen DAM');
		// Datos esenciales
		$this->db->join('tbl_catalogo TC', 'TC.idtbl_catalogo = DAM.tbl_catalogo_idtbl_catalogo', 'left');
		$this->db->join('tbl_entidad', 'tbl_entidad.idtbl_entidad = DAM.entidad_federativa_placas', 'left');
		//$this->db->where('TC.descripcion != "PERSONAL"');
		

		// Datos para asignaciones
		if ($this->input->post('tipo_reporte') == 'general' || $this->input->post('tipo_reporte') == 'asignado') {
			$this->db->join('dtl_asignacion DA', 'DA.dtl_almacen_iddtl_almacen = DAM.iddtl_almacen', 'left');
			$this->db->join('tbl_almacen_movimientos TAM', 'TAM.idtbl_almacen_movimientos = DA.tbl_almacen_movimientos_idtbl_almacen_movimientos', 'left');
			//$this->db->join('tbl_proyectos TP', 'TP.idtbl_proyectos = TAM.tbl_proyectos_idtbl_proyectos', 'left');
			$this->db->join('tbl_segmentos_proyecto TSP', 'TSP.idtbl_segmentos_proyecto = TAM.tbl_segmentos_proyecto_idtbl_segmentos_proyecto', 'left');
			$this->db->join('tbl_usuarios TUS', 'TUS.idtbl_usuarios = DA.tbl_usuarios_idtbl_usuarios', 'left');
			$this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = TUS.tbl_proyectos_idtbl_proyectos', 'left');
			$this->db->join('tbl_users TUSERS', 'TUSERS.idtbl_users = TAM.tbl_users_idtbl_users', 'left');
			//$this->db->join('tbl_tramites_vehiculares', 'tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DAM.iddtl_almacen AND tbl_tramites_vehiculares.tipo_tramite = "seguro" AND tbl_tramites_vehiculares.idtbl_tramites_vehiculares = (SELECT MAX(tbl_tramites_vehiculares.idtbl_tramites_vehiculares) FROM tbl_tramites_vehiculares WHERE tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DAM.iddtl_almacen AND tbl_tramites_vehiculares.tipo_tramite = "seguro")');	
			//$this->db->join('tbl_tramites_vehiculares', 'tbl_tramites_vehiculares.dtl_almacen_iddtl_almacen = DAM.iddtl_almacen AND tbl_tramites_vehiculares.tipo_tramite = "seguro" AND ((tbl_tramites_vehiculares.proxima_fecha_tramite IS NOT NULL  AND DA.fecha_finalizacion BETWEEN tbl_tramites_vehiculares.fecha_tramite AND tbl_tramites_vehiculares.proxima_fecha_tramite) OR (DA.fecha_finalizacion BETWEEN tbl_tramites_vehiculares.fecha_tramite AND (SELECT DATE()) ))', 'LEFT');
			$this->db->where('TC.descripcion != "PERSONAL"');
		}

		// Datos para Verificaciones
        if ($this->input->post('tipo_reporte') == 'verificacion' || $this->input->post('tipo_reporte') == 'seguro' || $this->input->post('tipo_reporte') == 'tenencia' || $this->input->post('tipo_reporte') == 'placas' || $this->input->post('tipo_reporte') == 'cambio_propietario' || $this->input->post('tipo_reporte') == 'siniestro') {
            $this->db->join('tbl_tramites_vehiculares TV', 'TV.dtl_almacen_iddtl_almacen = DAM.iddtl_almacen', 'left');
		}

		//Datos para siniestro
		if($this->input->post('tipo_reporte') == 'siniestro'){
			$this->db->join('tbl_siniestros_vehiculos TSV', 'TSV.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = TV.idtbl_tramites_vehiculares');
			$this->db->join('tbl_usuarios TReporte', 'TReporte.idtbl_usuarios = TSV.reportado_por');
			$this->db->join('tbl_usuarios atiende', 'atiende.idtbl_usuarios = TSV.atiende');
			$this->db->where('TC.descripcion != "PERSONAL"');
		}

		//Datos para cambio propietario
		if($this->input->post('tipo_reporte') == 'cambio_propietario'){
			$this->db->join('tbl_cambio_propietario CP', 'Cp.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = TV.idtbl_tramites_vehiculares');
			$this->db->where('TC.descripcion != "PERSONAL"');
		}
		
		// Datos para Servicios
		if ($this->input->post('tipo_reporte') == 'servicio') {
			$this->db->join('tbl_tramites_vehiculares TV', 'TV.dtl_almacen_iddtl_almacen = DAM.iddtl_almacen');
			$this->db->join('dtl_servicio DS', 'DS.tbl_tramites_vehiculares_idtbl_tramites_vehiculares = TV.idtbl_tramites_vehiculares', 'left');
			$this->db->join('tbl_users mecanico', 'mecanico.idtbl_users = DS.tbl_users_idtbl_users', 'left');
			$this->db->join('tbl_users autor', 'autor.idtbl_users = DS.tbl_users_idtbl_users_autor', 'left');
			$this->db->join('tbl_checklist_servicio', 'tbl_checklist_servicio.uid_servicio = TV.uid', 'left');
			$this->db->where('TC.descripcion != "PERSONAL"');
		}

		$this->db->where('DAM.tbl_almacenes_idtbl_almacenes', 30);
		//$this->db->where('TC.descripcion != "PERSONAL"');
		
		//Where para asignado
		if($this->input->post('tipo_reporte')=='asignado'){
			$this->db->where('DA.fecha_finalizacion IS NULL');
		}

		//Where para tipo disponible
		if($this->input->post('tipo_reporte') == 'disponible'){
			$this->db->where('DAM.estatus', 'almacen');
		}

		if ($tipo_reporte == 'Unidad') {			
			if ($this->input->post('tipo_reporte') == 'general' || $this->input->post('tipo_reporte') == 'asignado') {				
				$this->db->where('TAM.tipo', 'asignacion');
				if (isset($_POST['modelo'])) {
					$this->db->where('TC.idtbl_catalogo', $this->input->post('modelo'));
					if(isset($_POST['eco'])){
						$this->db->where('DAM.iddtl_almacen', $this->input->post('eco'));
					}
				}
				if ($_POST['fecha_inicio'] != '' && $_POST['fecha_final'] != '') {
					$fechaInicio = date($this->input->post('fecha_inicio') . ' 00:00:00');
					$fechaFinal = date($this->input->post('fecha_final') . ' 23:59:59');
					$this->db->where("DA.fecha_asignacion BETWEEN '$fechaInicio' AND '$fechaFinal'");
				}
				if (!empty($this->input->post('segmento'))) {
					$this->db->where('TAM.tbl_segmentos_proyecto_idtbl_segmentos_proyecto', $this->input->post('segmento'));
				}
				if(isset($_POST['proyecto'])){
					$this->db->where('TAM.tbl_proyectos_idtbl_proyectos', $this->input->post('proyecto'));
				}		
			}
			if ($this->input->post('tipo_reporte') == 'verificacion' || $this->input->post('tipo_reporte') == 'seguro' || $this->input->post('tipo_reporte') == 'tenencia' || $this->input->post('tipo_reporte') == 'placas') {
                if ($this->input->post('tipo_reporte') == 'verificacion') {
                    $this->db->where('TV.tipo_tramite', 'verificacion');
				}
                if ($this->input->post('tipo_reporte') == 'seguro') {
                    $this->db->where('TV.tipo_tramite', 'seguro');
				}
				if ($this->input->post('tipo_reporte') == 'tenencia'){
					$this->db->where('TV.tipo_tramite', 'tenencia');
				}
				if($this->input->post('tipo_reporte') == 'placas'){
					$this->db->where('TV.tipo_tramite', 'placas');
				}
				if (isset($_POST['producto'])) {
					$this->db->where('TC.idtbl_catalogo', $this->input->post('modelo'));
					if(isset($_POST['eco'])){
						$this->db->where('DAM.iddtl_almacen', $this->input->post('eco'));
					}
				}
				if ($_POST['fecha_inicio'] != '' && $_POST['fecha_final'] != '') {
					$fechaInicio = date($this->input->post('fecha_inicio') . ' 00:00:00');
					$fechaFinal = date($this->input->post('fecha_final') . ' 23:59:59');
					$this->db->where("TV.proxima_fecha_tramite BETWEEN '$fechaInicio' AND '$fechaFinal'");
				}
								
			}
			if ($this->input->post('tipo_reporte') == 'disponible') {								
				if (isset($_POST['producto'])) {
					$this->db->where('TC.idtbl_catalogo', $this->input->post('modelo'));
					if(isset($_POST['eco'])){
						$this->db->where('DAM.iddtl_almacen', $this->input->post('eco'));
					}
				}									
			}
			if($this->input->post('tipo_reporte') == 'cambio_reporte'){
				$this->db->where('TV.tipo_tramite', 'cambio propietario');

				if (isset($_POST['producto'])) {
					$this->db->where('TC.idtbl_catalogo', $this->input->post('modelo'));
					if(isset($_POST['eco'])){
						$this->db->where('DAM.iddtl_almacen', $this->input->post('eco'));
					}
				}
			}
			if ($this->input->post('tipo_reporte') == 'servicio'){
				$this->db->where('TV.tipo_tramite', 'servicio');
				if($this->input->post('estatus') == 'pendiente'){
					$this->db->where('DS.estatus != "FINALIZADO"');
					if(isset($_POST['mecanico'])){
						$this->db->where('DS.tbl_users_idtbl_users', $this->input->post('mecanico'));
					}
				}else if($this->input->post('estatus') == 'finalizado'){
					$this->db->where('DS.estatus', 'FINALIZADO');
					if(isset($_POST['mecanico'])){
						$this->db->where('DS.tbl_users_idtbl_users', $this->input->post('mecanico'));
					}
				}else{
					if(isset($_POST['mecanico'])){
						$this->db->where('DS.tbl_users_idtbl_users', $this->input->post('mecanico'));
					}
				}
				if (isset($_POST['producto'])) {
					$this->db->where('TC.idtbl_catalogo', $this->input->post('modelo'));
					if(isset($_POST['eco'])){
						$this->db->where('DAM.iddtl_almacen', $this->input->post('eco'));
					}
				}	
				if ($_POST['fecha_inicio'] != '' && $_POST['fecha_final'] != '') {
					$fechaInicio = date($this->input->post('fecha_inicio') . ' 00:00:00');
					$fechaFinal = date($this->input->post('fecha_final') . ' 23:59:59');
					$this->db->where("DS.fecha_inicio BETWEEN '$fechaInicio' AND '$fechaFinal'");
				}
				if($this->input->post("rt0") != ""){
					//"AND json_extract(tbl_checklist_servicio.checklist_tecnico, '$.rt0') = '" . $this->input->post("rt0") . "' "
					$this->db->where("json_extract(tbl_checklist_servicio.checklist_tecnico, '$.rt0') = ", $this->input->post("rt0"));
				}
			}
		}    
		if($this->input->post('tipo_reporte') == 'salida-almacen') {
			$this->db->group_by('dtl_solicitud_material.iddtl_solicitud_material');
		} elseif($this->input->post('tipo_reporte') == 'general' || $this->input->post('asignado')) {
			$this->db->group_by('DA.iddtl_asignacion');
		}

		return $this->db->get()->result_array();
	}

    //Insert de checklist servicio
    public function guardarChecklistServicio($parametros)
    {
        $this->db->trans_begin();
        $this->db->insert('tbl_checklist_servicio_sistemas', $parametros);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function detalle_producto($iddtl_almacen) {
		$this->db->select('tbl_checklist_servicio_sistemas.*');
		$this->db->select('dtl_almacen.*');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.uid as uid_producto');
		$this->db->select('tbl_catalogo.marca');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_categorias.*');
		$this->db->select('tbl_users.*');
		$this->db->from('tbl_checklist_servicio_sistemas');
		$this->db->join('dtl_almacen', 'tbl_checklist_servicio_sistemas.dtl_almacen_iddtl_almacen=dtl_almacen.iddtl_almacen', 'left');
		$this->db->join('tbl_catalogo', 'tbl_catalogo.idtbl_catalogo=dtl_almacen.tbl_catalogo_idtbl_catalogo', 'left');
		$this->db->join('ctl_unidades_medida', 'tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
		$this->db->join('ctl_categorias', 'tbl_catalogo.ctl_categorias_idctl_categorias=ctl_categorias.idctl_categorias', 'left');
		$this->db->join('tbl_users', 'tbl_checklist_servicio_sistemas.tbl_users_idtbl_users=tbl_users.idtbl_users', 'left');
		$this->db->where('dtl_almacen.iddtl_almacen', $iddtl_almacen);
		
		$query = $this->db->get();
		return $query->result();
	}

    //Obtiene el checklist que coincida con el id
    public function detalle_checklist($id_checklist)
    {
        $query = $this->db->query("SELECT TCSS.*, TC.marca, TC.descripcion, DA.numero_serie, DA.numero_interno FROM tbl_checklist_servicio_sistemas TCSS LEFT JOIN dtl_almacen DA ON DA.iddtl_almacen = TCSS.dtl_almacen_iddtl_almacen LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo WHERE idtbl_checklist_servicio_sistemas = '$id_checklist'");
        return $query->result();
    }

    //Obtiene el checklist que coincida con el id
    public function detalle_checklist_detalle($id_checklist)
    {
        $query = $this->db->query("SELECT TCSS.* FROM tbl_checklist_servicio_sistemas TCSS WHERE idtbl_checklist_servicio_sistemas = '$id_checklist'");
        return $query->result()[0]->checklist;
    }

    public function equipoById($idalmacen)
    {
        $this->db->select("dtl_almacen.*, tbl_catalogo.*");
        $this->db->from("dtl_almacen");
        $this->db->join("tbl_catalogo", "tbl_catalogo.idtbl_catalogo=dtl_almacen.tbl_catalogo_idtbl_catalogo");
        $this->db->where("iddtl_almacen", $idalmacen);
        $query = $this->db->get();
        return $query->result();
    }
    

    public function obtenerProductividadAnioMes()
    {
        $anio = $this->input->post('year');
        $query = $this->db->query("SELECT MONTH(fecha_finalizacion) mes, YEAR(fecha_finalizacion) anio, tbl_users.idtbl_users, tbl_users.nombre, COUNT(*) total_productividad FROM tbl_tickets JOIN tbl_users ON tbl_users.idtbl_users = tbl_tickets.tbl_users_idtbl_users_dw AND tbl_users.estatus = 1 WHERE YEAR(tbl_tickets.fecha_finalizacion) = '$anio' GROUP BY MONTH(tbl_tickets.fecha_finalizacion), YEAR(tbl_tickets.fecha_finalizacion), tbl_users_idtbl_users_dw");
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
	public function usuarioscomparacionsistemas()
    {
        $this->db->select('idtbl_users, nombre');
        $this->db->from('tbl_users');
        $this->db->WHERE('idtbl_users IN (203, 353, 230)');
        $query = $this->db->get();
        return $query->result();
    }

	public function inventarioAlmacenSistemasConsumibles($buscar = '', $inicio = false, $cantidadRegistro = false) {
		$limit = '';
		if ($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}
		$query = $this->db->query("SELECT DA.*, TC.*, CC.*, CUM.*, DA.marca_almacen AS marcaal, DA.modelo_almacen AS modelolo, (SELECT MAX(precio) FROM dtl_pedido_catalogo WHERE dtl_pedido_catalogo.tbl_catalogo_idtbl_catalogo = TC.idtbl_catalogo) AS precio_max FROM dtl_almacen DA LEFT JOIN tbl_catalogo TC ON TC.idtbl_catalogo = DA.tbl_catalogo_idtbl_catalogo LEFT JOIN ctl_categorias CC ON CC.idctl_categorias = TC.ctl_categorias_idctl_categorias LEFT JOIN ctl_unidades_medida CUM ON CUM.idctl_unidades_medida = TC.ctl_unidades_medida_idctl_unidades_medida WHERE DA.tbl_almacenes_idtbl_almacenes = 30 AND DA.estatus='almacen' AND TC.tipo = 6 AND (CC.idctl_categorias = 2) AND (TC.neodata LIKE '%$buscar%' OR TC.uid LIKE '%$buscar%' OR TC.marca LIKE '%$buscar%' OR DA.estado LIKE '%$buscar%' OR TC.modelo LIKE '%$buscar%' OR TC.descripcion LIKE '%$buscar%') " . $limit);
		return $query->result();
	}

	public function asignacionesdispositivos($year, $usuario)
	{
		if($usuario == 0){
			$data = [];
			$query = $this->db->query("SELECT COUNT(TAM.idtbl_almacen_movimientos) AS asignaciones, MONTH(TAM.fecha) AS FECHA, TAM.tipo 
			AS Asignado, TAM.tbl_almacenes_idtbl_almacenes 
			AS almacen, TU.nombre, TU.idtbl_users, TAM.estatus AS Estatus 
			FROM tbl_almacen_movimientos TAM 
			LEFT JOIN tbl_users TU ON TU.idtbl_users = TAM.tbl_users_idtbl_users 
			LEFT JOIN tbl_almacenes TA on TA.idtbl_almacenes = TAM.tbl_almacenes_idtbl_almacenes 
			WHERE YEAR(TAM.fecha) = '$year' AND TAM.tipo = 'asignacion' 
			AND TAM.tbl_almacenes_idtbl_almacenes = 30 AND TU.idtbl_users IN (203, 353, 230) 
			AND TAM.estatus = 1 GROUP BY MONTH(TAM.fecha), idtbl_users");
			$data["asignaciones"] = $query->result_array();
			$query = $this->db->query("SELECT DISTINCT TU.nombre, TU.idtbl_users 
			FROM tbl_almacen_movimientos TAM LEFT JOIN tbl_users TU ON TU.idtbl_users = TAM.tbl_users_idtbl_users 
			LEFT JOIN tbl_almacenes TA ON TA.idtbl_almacenes = TAM.tbl_almacenes_idtbl_almacenes 
			WHERE TU.idtbl_users IN (203, 353, 230) AND TAM.estatus = 1 IS NOT NULL ORDER BY MONTH(TAM.fecha)");
			$data['usuario'] = $query->result_array();
		}else{
			$query = $this->db->query("SELECT COUNT(TAM.idtbl_almacen_movimientos) AS asignaciones, MONTH(TAM.fecha) AS FECHA, TAM.tipo AS Asignado, 
			TAM.tbl_almacenes_idtbl_almacenes AS almacen, TU.nombre, TU.idtbl_users, TAM.estatus AS Estatus 
			FROM tbl_almacen_movimientos TAM 
			LEFT JOIN tbl_users TU ON TU.idtbl_users = TAM.tbl_users_idtbl_users 
			LEFT JOIN tbl_almacenes TA on TA.idtbl_almacenes = TAM.tbl_almacenes_idtbl_almacenes 
			WHERE YEAR(TAM.fecha) = '$year' AND TAM.tipo = 'asignacion' 
			AND TAM.tbl_almacenes_idtbl_almacenes = 30 AND TU.idtbl_users = '$usuario' 
			AND TAM.estatus = 1 GROUP BY MONTH(TAM.fecha)");
			$data["asignaciones"] = $query->result_array();
			$query = $this->db->query("SELECT DISTINCT TU.nombre, TU.idtbl_users 
			FROM tbl_almacen_movimientos TAM
			LEFT JOIN tbl_users TU ON TU.idtbl_users = TAM.tbl_users_idtbl_users 
			LEFT JOIN tbl_almacenes TA on TA.idtbl_almacenes = TAM.tbl_almacenes_idtbl_almacenes 
			WHERE TU.idtbl_users = '$usuario' AND TAM.estatus = 1 IS NOT NULL ORDER BY MONTH(TAM.fecha)");
			$data['usuario'] = $query->result_array();
		}
		return $data;

	}

}