<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contratistas_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function asignaciones_personalAG($uid) {
		$this->db->select('dtl_asignacion.*');
		$this->db->select('dtl_asignacion.cantidad AS cantidad_asignada');
		$this->db->select('dtl_almacen.*');
		$this->db->select('tbl_catalogo.idtbl_catalogo');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.neodata');
		$this->db->select('tbl_catalogo.marca');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->select('tbl_catalogo.precio');
		$this->db->select('tbl_catalogo.tipo_moneda');
		$this->db->select('tbl_almacenes.almacen');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_categorias.*');
		$this->db->select('tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_segmentos_proyecto.segmento');
		$this->db->select('tbl_almacen_movimientos.folio');
		$this->db->select('tbl_solicitud_material.uid AS uid_solicitud');
		$this->db->select('tbl_almacen_movimientos.uid');
		$this->db->select('SUM(dtl_asignacion.cantidad) as total');
		$this->db->select('tbl_usuarios.nombres');
		$this->db->select('tbl_usuarios.apellido_paterno');
		$this->db->select('tbl_usuarios.apellido_materno');
		$this->db->select('tbl_usuarios.uid AS uid_usuario');
		$this->db->from('dtl_asignacion');
		$this->db->join('dtl_almacen', 'dtl_asignacion.dtl_almacen_iddtl_almacen=dtl_almacen.iddtl_almacen', 'left');
		$this->db->join('tbl_catalogo', 'tbl_catalogo.idtbl_catalogo=dtl_almacen.tbl_catalogo_idtbl_catalogo', 'left');
		$this->db->join('ctl_unidades_medida', 'tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
		$this->db->join('ctl_categorias', 'tbl_catalogo.ctl_categorias_idctl_categorias=ctl_categorias.idctl_categorias', 'left');
		$this->db->join('tbl_almacen_movimientos', 'tbl_almacen_movimientos.idtbl_almacen_movimientos=dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos', 'left');
		$this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_almacen_movimientos.tbl_proyectos_idtbl_proyectos', 'left');
		$this->db->join('tbl_segmentos_proyecto', 'tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_almacen_movimientos.tbl_segmentos_proyecto_idtbl_segmentos_proyecto', 'left');
		$this->db->join('tbl_solicitud_material', 'tbl_solicitud_material.idtbl_solicitud_material = tbl_almacen_movimientos.parent', 'left');
		$this->db->join('tbl_usuarios', 'tbl_usuarios.idtbl_usuarios = dtl_asignacion.tbl_usuarios_idtbl_usuarios', 'left');
		$this->db->join('tbl_almacenes', 'tbl_almacenes.idtbl_almacenes = dtl_almacen.tbl_almacenes_idtbl_almacenes', 'left');
		$this->db->where('tbl_usuarios.tbl_contratistas_idtbl_contratistas', $this->id_contratista($uid));
		$this->db->where('dtl_asignacion.estatus_asignacion', 'activa');
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes!=', 2);
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes!=', 16);
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes!=', 23);
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes!=', 28);
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes!=', 29);
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes!=', 30);
		$this->db->group_by("dtl_asignacion.iddtl_asignacion");
		$query = $this->db->get();
		return $query->result();
	}

	public function asignaciones_personalAC($uid) {
		$this->db->select('dtl_asignacion.*');
		$this->db->select('dtl_almacen.*');
		$this->db->select('tbl_catalogo.idtbl_catalogo');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.marca');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->select('tbl_catalogo.precio');
		$this->db->select('tbl_catalogo.tipo_moneda');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_categorias.*');
		$this->db->select('tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_segmentos_proyecto.segmento');
		$this->db->select('tbl_almacen_movimientos.folio');
		$this->db->select('tbl_solicitud_material.uid AS uid_solicitud');
		$this->db->select('tbl_almacen_movimientos.uid');
		$this->db->select('SUM(dtl_asignacion.cantidad) as total');
		$this->db->select('tbl_usuarios.nombres');
		$this->db->select('tbl_usuarios.apellido_paterno');
		$this->db->select('tbl_usuarios.apellido_materno');
		$this->db->from('dtl_asignacion');
		$this->db->join('dtl_almacen', 'dtl_asignacion.dtl_almacen_iddtl_almacen=dtl_almacen.iddtl_almacen', 'left');
		$this->db->join('tbl_catalogo', 'tbl_catalogo.idtbl_catalogo=dtl_almacen.tbl_catalogo_idtbl_catalogo', 'left');
		$this->db->join('ctl_unidades_medida', 'tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
		$this->db->join('ctl_categorias', 'tbl_catalogo.ctl_categorias_idctl_categorias=ctl_categorias.idctl_categorias', 'left');
		$this->db->join('tbl_almacen_movimientos', 'tbl_almacen_movimientos.idtbl_almacen_movimientos=dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos', 'left');
		$this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_almacen_movimientos.tbl_proyectos_idtbl_proyectos', 'left');
		$this->db->join('tbl_segmentos_proyecto', 'tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_almacen_movimientos.tbl_segmentos_proyecto_idtbl_segmentos_proyecto', 'left');
		$this->db->join('tbl_solicitud_material', 'tbl_solicitud_material.idtbl_solicitud_material = tbl_almacen_movimientos.parent', 'left');
		$this->db->join('tbl_usuarios', 'tbl_usuarios.idtbl_usuarios = dtl_asignacion.tbl_usuarios_idtbl_usuarios', 'left');
		$this->db->where('tbl_usuarios.tbl_contratistas_idtbl_contratistas', $this->id_contratista($uid));
		$this->db->where('dtl_asignacion.estatus_asignacion', 'activa');
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes', 2);
		$this->db->group_by("dtl_asignacion.iddtl_asignacion");
		$query = $this->db->get();
		return $query->result();
	}

	public function asignaciones_personalKuali($uid) {
		$this->db->select('dtl_asignacion.*');
		$this->db->select('dtl_asignacion.cantidad AS cantidad_asignada');
		$this->db->select('dtl_almacen.*');
		$this->db->select('tbl_catalogo.idtbl_catalogo');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.neodata');
		$this->db->select('tbl_catalogo.marca');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->select('tbl_catalogo.precio');
		$this->db->select('tbl_catalogo.tipo_moneda');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_categorias.*');
		$this->db->select('tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_segmentos_proyecto.segmento');
		$this->db->select('tbl_almacen_movimientos.folio');
		$this->db->select('tbl_solicitud_material.uid AS uid_solicitud');		
		$this->db->select('tbl_almacen_movimientos.uid');
		$this->db->select('SUM(dtl_asignacion.cantidad) as total');
		$this->db->select('tbl_usuarios.nombres');
		$this->db->select('tbl_usuarios.apellido_paterno');
		$this->db->select('tbl_usuarios.apellido_materno');
		$this->db->from('dtl_asignacion');
		$this->db->join('dtl_almacen', 'dtl_asignacion.dtl_almacen_iddtl_almacen=dtl_almacen.iddtl_almacen', 'left');
		$this->db->join('tbl_catalogo', 'tbl_catalogo.idtbl_catalogo=dtl_almacen.tbl_catalogo_idtbl_catalogo', 'left');
		$this->db->join('ctl_unidades_medida', 'tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
		$this->db->join('ctl_categorias', 'tbl_catalogo.ctl_categorias_idctl_categorias=ctl_categorias.idctl_categorias', 'left');
		$this->db->join('tbl_almacen_movimientos', 'tbl_almacen_movimientos.idtbl_almacen_movimientos=dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos', 'left');
		$this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_almacen_movimientos.tbl_proyectos_idtbl_proyectos', 'left');
		$this->db->join('tbl_segmentos_proyecto', 'tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_almacen_movimientos.tbl_segmentos_proyecto_idtbl_segmentos_proyecto', 'left');
		$this->db->join('tbl_solicitud_material', 'tbl_solicitud_material.idtbl_solicitud_material = tbl_almacen_movimientos.parent', 'left');
		$this->db->join('tbl_usuarios', 'tbl_usuarios.idtbl_usuarios = dtl_asignacion.tbl_usuarios_idtbl_usuarios', 'left');
		$this->db->where('tbl_usuarios.tbl_contratistas_idtbl_contratistas', $this->id_contratista($uid));
		$this->db->where('dtl_asignacion.estatus_asignacion', 'activa');
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes', 16);
		$this->db->group_by("dtl_asignacion.iddtl_asignacion");
		$query = $this->db->get();
		return $query->result();
	}

	public function asignaciones_personalAreaMedica($uid) {
		$this->db->select('dtl_asignacion.*');
		$this->db->select('dtl_almacen.*');
		$this->db->select('tbl_catalogo.idtbl_catalogo');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.marca');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->select('tbl_catalogo.precio');
		$this->db->select('tbl_catalogo.tipo_moneda');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_categorias.*');
		$this->db->select('tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_segmentos_proyecto.segmento');
		$this->db->select('tbl_almacen_movimientos.folio');
		$this->db->select('tbl_solicitud_material.uid AS uid_solicitud');
		$this->db->select('tbl_almacen_movimientos.uid');
		$this->db->select('SUM(dtl_asignacion.cantidad) as total');
		$this->db->select('tbl_usuarios.nombres');
		$this->db->select('tbl_usuarios.apellido_paterno');
		$this->db->select('tbl_usuarios.apellido_materno');
		$this->db->from('dtl_asignacion');
		$this->db->join('dtl_almacen', 'dtl_asignacion.dtl_almacen_iddtl_almacen=dtl_almacen.iddtl_almacen', 'left');
		$this->db->join('tbl_catalogo', 'tbl_catalogo.idtbl_catalogo=dtl_almacen.tbl_catalogo_idtbl_catalogo', 'left');
		$this->db->join('ctl_unidades_medida', 'tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
		$this->db->join('ctl_categorias', 'tbl_catalogo.ctl_categorias_idctl_categorias=ctl_categorias.idctl_categorias', 'left');
		$this->db->join('tbl_almacen_movimientos', 'tbl_almacen_movimientos.idtbl_almacen_movimientos=dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos', 'left');
		$this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_almacen_movimientos.tbl_proyectos_idtbl_proyectos', 'left');
		$this->db->join('tbl_segmentos_proyecto', 'tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_almacen_movimientos.tbl_segmentos_proyecto_idtbl_segmentos_proyecto', 'left');
		$this->db->join('tbl_solicitud_material', 'tbl_solicitud_material.idtbl_solicitud_material = tbl_almacen_movimientos.parent', 'left');
		$this->db->join('tbl_usuarios', 'tbl_usuarios.idtbl_usuarios = dtl_asignacion.tbl_usuarios_idtbl_usuarios', 'left');
		$this->db->where('tbl_usuarios.tbl_contratistas_idtbl_contratistas', $this->id_contratista($uid));
		$this->db->where('dtl_asignacion.estatus_asignacion', 'activa');
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes', 23);
		$this->db->group_by("dtl_asignacion.iddtl_asignacion");
		$query = $this->db->get();
		return $query->result();
	}

	public function asignaciones_autosControlVehicular($uid) {
		$this->db->select('dtl_asignacion.*');
		$this->db->select('dtl_almacen.*');
		$this->db->select('tbl_catalogo.idtbl_catalogo');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.marca');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->select('tbl_catalogo.precio');
		$this->db->select('tbl_catalogo.tipo_moneda');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_categorias.*');
		$this->db->select('tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_segmentos_proyecto.segmento');
		$this->db->select('tbl_almacen_movimientos.folio');
		$this->db->select('tbl_solicitud_material.uid AS uid_solicitud');
		$this->db->select('tbl_almacen_movimientos.uid');
		$this->db->select('SUM(dtl_asignacion.cantidad) as total');
		$this->db->select('tbl_usuarios.nombres');
		$this->db->select('tbl_usuarios.apellido_paterno');
		$this->db->select('tbl_usuarios.apellido_materno');
		$this->db->from('dtl_asignacion');
		$this->db->join('dtl_almacen', 'dtl_asignacion.dtl_almacen_iddtl_almacen=dtl_almacen.iddtl_almacen', 'left');
		$this->db->join('tbl_catalogo', 'tbl_catalogo.idtbl_catalogo=dtl_almacen.tbl_catalogo_idtbl_catalogo', 'left');
		$this->db->join('ctl_unidades_medida', 'tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
		$this->db->join('ctl_categorias', 'tbl_catalogo.ctl_categorias_idctl_categorias=ctl_categorias.idctl_categorias', 'left');
		$this->db->join('tbl_almacen_movimientos', 'tbl_almacen_movimientos.idtbl_almacen_movimientos=dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos', 'left');
		$this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_almacen_movimientos.tbl_proyectos_idtbl_proyectos', 'left');
		$this->db->join('tbl_segmentos_proyecto', 'tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_almacen_movimientos.tbl_segmentos_proyecto_idtbl_segmentos_proyecto', 'left');
		$this->db->join('tbl_solicitud_material', 'tbl_solicitud_material.idtbl_solicitud_material = tbl_almacen_movimientos.parent', 'left');
		$this->db->join('tbl_usuarios', 'tbl_usuarios.idtbl_usuarios = dtl_asignacion.tbl_usuarios_idtbl_usuarios', 'left');
		$this->db->where('tbl_usuarios.tbl_contratistas_idtbl_contratistas', $this->id_contratista($uid));
		$this->db->where('dtl_asignacion.estatus_asignacion', 'activa');
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes', ID_ALMACEN_AUTOS_CONTROL_VEHICULAR);
		$this->db->group_by("dtl_asignacion.iddtl_asignacion");
		$query = $this->db->get();
		return $query->result();
	}

	public function asignaciones_refaccionesControlVehicular($uid) {
		$this->db->select('dtl_asignacion.*');
		$this->db->select('dtl_almacen.*');
		$this->db->select('tbl_catalogo.idtbl_catalogo');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.marca');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->select('tbl_catalogo.precio');
		$this->db->select('tbl_catalogo.tipo_moneda');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_categorias.*');
		$this->db->select('tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_segmentos_proyecto.segmento');
		$this->db->select('tbl_almacen_movimientos.folio');
		$this->db->select('tbl_solicitud_material.uid AS uid_solicitud');
		$this->db->select('tbl_almacen_movimientos.uid');
		$this->db->select('SUM(dtl_asignacion.cantidad) as total');
		$this->db->select('tbl_usuarios.nombres');
		$this->db->select('tbl_usuarios.apellido_paterno');
		$this->db->select('tbl_usuarios.apellido_materno');
		$this->db->from('dtl_asignacion');
		$this->db->join('dtl_almacen', 'dtl_asignacion.dtl_almacen_iddtl_almacen=dtl_almacen.iddtl_almacen', 'left');
		$this->db->join('tbl_catalogo', 'tbl_catalogo.idtbl_catalogo=dtl_almacen.tbl_catalogo_idtbl_catalogo', 'left');
		$this->db->join('ctl_unidades_medida', 'tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
		$this->db->join('ctl_categorias', 'tbl_catalogo.ctl_categorias_idctl_categorias=ctl_categorias.idctl_categorias', 'left');
		$this->db->join('tbl_almacen_movimientos', 'tbl_almacen_movimientos.idtbl_almacen_movimientos=dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos', 'left');
		$this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_almacen_movimientos.tbl_proyectos_idtbl_proyectos', 'left');
		$this->db->join('tbl_segmentos_proyecto', 'tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_almacen_movimientos.tbl_segmentos_proyecto_idtbl_segmentos_proyecto', 'left');
		$this->db->join('tbl_solicitud_material', 'tbl_solicitud_material.idtbl_solicitud_material = tbl_almacen_movimientos.parent', 'left');
		$this->db->join('tbl_usuarios', 'tbl_usuarios.idtbl_usuarios = dtl_asignacion.tbl_usuarios_idtbl_usuarios', 'left');
		$this->db->where('tbl_usuarios.tbl_contratistas_idtbl_contratistas', $this->id_contratista($uid));
		$this->db->where('dtl_asignacion.estatus_asignacion', 'activa');
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes', ID_ALMACEN_REFACCIONES_CONTROL_VEHICULAR);
		$this->db->group_by("dtl_asignacion.iddtl_asignacion");
		$query = $this->db->get();
		return $query->result();
	}

	public function asignaciones_sistemas($uid) {
		$this->db->select('dtl_asignacion.*');
		$this->db->select('dtl_almacen.*');
		$this->db->select('tbl_catalogo.idtbl_catalogo');
		$this->db->select('tbl_catalogo.descripcion');
		$this->db->select('tbl_catalogo.marca');
		$this->db->select('tbl_catalogo.modelo');
		$this->db->select('tbl_catalogo.precio');
		$this->db->select('tbl_catalogo.tipo_moneda');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_unidades_medida.*');
		$this->db->select('ctl_categorias.*');
		$this->db->select('tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto');
		$this->db->select('tbl_segmentos_proyecto.segmento');
		$this->db->select('tbl_almacen_movimientos.folio');
		$this->db->select('tbl_solicitud_material.uid AS uid_solicitud');
		$this->db->select('tbl_almacen_movimientos.uid');
		$this->db->select('SUM(dtl_asignacion.cantidad) as total');
		$this->db->select('tbl_usuarios.nombres');
		$this->db->select('tbl_usuarios.apellido_paterno');
		$this->db->select('tbl_usuarios.apellido_materno');
		$this->db->from('dtl_asignacion');
		$this->db->join('dtl_almacen', 'dtl_asignacion.dtl_almacen_iddtl_almacen=dtl_almacen.iddtl_almacen', 'left');
		$this->db->join('tbl_catalogo', 'tbl_catalogo.idtbl_catalogo=dtl_almacen.tbl_catalogo_idtbl_catalogo', 'left');
		$this->db->join('ctl_unidades_medida', 'tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
		$this->db->join('ctl_categorias', 'tbl_catalogo.ctl_categorias_idctl_categorias=ctl_categorias.idctl_categorias', 'left');
		$this->db->join('tbl_almacen_movimientos', 'tbl_almacen_movimientos.idtbl_almacen_movimientos=dtl_asignacion.tbl_almacen_movimientos_idtbl_almacen_movimientos', 'left');
		$this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_almacen_movimientos.tbl_proyectos_idtbl_proyectos', 'left');
		$this->db->join('tbl_segmentos_proyecto', 'tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_almacen_movimientos.tbl_segmentos_proyecto_idtbl_segmentos_proyecto', 'left');
		$this->db->join('tbl_solicitud_material', 'tbl_solicitud_material.idtbl_solicitud_material = tbl_almacen_movimientos.parent', 'left');
		$this->db->join('tbl_usuarios', 'tbl_usuarios.idtbl_usuarios = dtl_asignacion.tbl_usuarios_idtbl_usuarios', 'left');
		$this->db->where('tbl_usuarios.tbl_contratistas_idtbl_contratistas', $this->id_contratista($uid));
		$this->db->where('dtl_asignacion.estatus_asignacion', 'activa');
		$this->db->where('dtl_almacen.tbl_almacenes_idtbl_almacenes', ID_ALMACEN_SISTEMAS);
		$this->db->group_by("dtl_asignacion.iddtl_asignacion");
		$query = $this->db->get();
		return $query->result();
	}

	function nombre_comercial_contratista($uid){
		$query = $this->db->query("
	      SELECT nombre_comercial
	      FROM  tbl_contratistas
	      WHERE tbl_contratistas.uid = '$uid'");
	    return $query->result()[0]->nombre_comercial;
	}

  	private function id_contratista($uid){
  		$query = $this->db->query("
	      SELECT idtbl_contratistas
	      FROM tbl_contratistas 
	      WHERE tbl_contratistas.uid = '$uid'");
	    return $query->result()[0]->idtbl_contratistas;
  	}

}