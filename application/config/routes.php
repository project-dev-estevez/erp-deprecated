<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// ******************* INICIO ***************************** //
$route['default_controller'] = 'inicio'; // ***
// ******************* INICIO ***************************** //

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ******************* ROOT CONTROLLER ***************************** //
$route['root/editarusuario/(:any)']='root/editarusuario/$1'; // ***
$route['root/excel-usuarios']='root/excel_usuarios';  // ***
$route['root/activar-usuario']='root/activar_usuario'; // ***
$route['root/desactivar-usuario']='root/desactivar_usuario'; // ***
// ******************* ROOT CONTROLLER ***************************** //


// ******************* ALMACEN ***************************** //
$route['almacen/activar-almacen']='almacen/activar_almacen'; // ***
$route['almacen/desactivar-almacen']='almacen/desactivar_almacen'; // ***
// ******************* ALMACEN ***************************** //


// ******************* PERSONAL ***************************** //
// Perfil
//$route['perfil']='personal/perfil';
//$route['perfil/cambiar-foto']='personal/actualizar_foto';

//$route['personal/nueva-requisicion']='personal/nueva_requisicion';
//$route['personal/guardar-requisicion']='personal/guardar_requisicion';
//$route['personal/actualizar-requisicion']='personal/actualizar_requisicion';
//$route['personal/requisiciones']='personal/ver_requisiciones';
//$route['personal/revisar-requisicion/(:any)']='personal/revisar_requisicion/$1';
$route['personal/detalle/(:any)']='personal/detalle_usuario/$1'; // ***
$route['personal/editar/(:any)']='personal/editar/$1';           // ***
//$route['personal/certificados/(:any)']='personal/certificados/$1';
$route['personal/cambiar-foto']='personal/actualizar_foto';      // ***
$route['personal/cargar-archivo']='personal/cargar_archivo';     // ***
$route['personal/nueva-acta']='personal/nueva_acta';             // ***   
$route['personal/nuevo-documento']='personal/nuevo_documento';   // ***   
$route['personal/nuevo-certificado']='personal/nuevo_certificado';// ***   
$route['personal/editar-certificado']='personal/editar_certificado';// ***
$route['personal/actualizar-personal']='personal/actualizar_personal'; // ***
$route['personal/guardar-personal']='personal/guardar_personal'; // ***
$route['personal/nuevo-contrato']='personal/nuevo_contrato';    // ***
$route['personal/contrato/(:any)']='personal/contrato/$1';  // ***
$route['personal/certificado/(:any)']='personal/certificado/$1';  // ***
$route['personal/eliminar/(:any)/(:any)/(:any)/(:any)']='personal/eliminar/$1/$2/$3/$4'; // ***
$route['personal/ver-bajas']='personal/ver_bajas'; // ***
$route['personal/detalle-baja/(:any)']='personal/detalle_baja/$1'; // ***
$route['personal/contratos-vencidos']='personal/contratos_vencidos'; // ***
$route['personal/cancelar-contrato']='personal/cancelar_contrato';   // ***
$route['personal/formato-vacaciones/(:any)']='personal/formato_vacaciones/$1'; // ***
$route['personal/cancelar-vacaciones']='personal/cancelar_vacaciones';  // ***
$route['personal/reporte-general']='personal/reporte_general'; // ***
$route['personal/impAsignacionesAC/(:any)']='personal/impAsignacionesAC/$1'; // ***
$route['personal/excel-personal-quincenal']='personal/excel_personal_quincenal'; // ***
$route['personal/excel-personal-semanal']='personal/excel_personal_semanal'; // ***
$route['personal/excel-personal-bajas']='personal/excel_personal_bajas'; // ***
$route['personal/eliminar-usuario']='personal/eliminar_usuario';  // ***
$route['personal/excel-contrato-vencido']='personal/excel_contrato_vencido'; // ***
$route['personal/excel-contrato-vencer']='personal/excel_contrato_vencer'; // ***
// ******************* PERSONAL ***************************** //

// ******************* INICIO ***************************** //
$route['inicio/cambio-perfil/(:any)']='inicio/cambio_perfil/$1'; // ***
$route['inicio/cambio-modulo/(:any)']='inicio/cambio_modulo/$1'; // ***
$route['inicio/regreso-direccion']='inicio/regreso_direccion';   // ***
$route['inicio/regreso-modulos']='inicio/regreso_modulos';       // ***
$route['inicio/regreso-control-obra']='inicio/regreso_control_obra'; // ***
// ******************* INICIO ***************************** //

// ******************* PROYECTOS ***************************** //
//detalle de proyecto
$route['proyectos/detalle/(:any)']='proyectos/detalle/$1'; // ***
$route['proyectos/actualizar-proyecto']='proyectos/actualizar_proyecto'; // ***
$route['proyectos/activar-proyecto']='proyectos/activar_proyecto'; // ***
$route['proyectos/desactivar-proyecto']='proyectos/desactivar_proyecto'; // ***
// ******************* PROYECTOS ***************************** //

// ******************* DEPARTAMENTOS ***************************** //
$route['departamentos/departamento/(:any)']='departamentos/detalle_departamento/$1'; // ***
$route['departamentos/perfil/(:any)']='departamentos/detalle_perfil/$1'; // ***
$route['departamentos/nuevo-perfil']='departamentos/nuevo_perfil'; // ***
$route['departamentos/editar-perfil']='departamentos/editar_perfil'; // ***
$route['departamentos/obtener-perfiles']='departamentos/obtener_perfiles'; // ***
// ******************* DEPARTAMENTOS ***************************** //

// ******************* EMPRESAS ***************************** //
$route['empresas/obtener-direcciones']='empresas/obtener_direcciones'; // ***
$route['empresas/obtener-areas']='empresas/obtener_areas'; // ***
$route['empresas/obtener-departamentos']='empresas/obtener_departamentos'; // ***
// ******************* EMPRESAS ***************************** //

// ******************* DEPARTAMENTOS ***************************** //
$route['departamentos/excel-departamentos']='departamentos/excel_departamentos'; // ***
$route['departamentos/actualizar-departamento']='departamentos/actualizar_departamento'; // ***
// ******************* DEPARTAMENTOS ***************************** //

// ******************* CLIENTES ***************************** //
$route['clientes/detalle/(:any)']='clientes/detalle_cliente/$1'; // ***
$route['clientes/excel-clientes']='clientes/excel_clientes'; // ***
// ******************* CLIENTES ***************************** //

// ******************* ALMACEN ***************************** //
//detalle de almacen
$route['almacen/traspaso-brazo']='almacen/traspaso_brazo'; // ***
$route['almacen/detalle/(:any)']='almacen/detalle/$1'; // ***
$route['almacen/nueva-entrada-alto-costo/(:any)']='almacen/nueva_entrada_ac/$1'; // ***
$route['almacen/nueva-entrada-autos-control-vehicular/(:any)']='almacen/nueva_entrada_autos_control_vehicular/$1'; // ***
$route['almacen/nueva-entrada-sistemas/(:any)']='almacen/nueva_entrada_sistemas/$1'; // ***
$route['almacen/nueva-entrada-area-medica/(:any)']='almacen/nueva_entrada_area_medica/$1'; // ***
$route['almacen/nueva-entrada-almacen-cliente/(:any)']='almacen/nueva_entrada_almacen_cliente/$1'; // ***
$route['almacen/nueva-explosion-insumos/(:any)']='almacen/nueva_explosion_insumos/$1'; // ***
$route['almacen/nueva-entrada/(:any)']='almacen/nueva_entrada/$1'; // ***
$route['almacen/nueva-salida/(:any)']='almacen/nueva_salida/$1';  // ***
$route['almacen/nueva-salida/(:any)/(:any)/(:any)']='almacen/nueva_salida_solicitud/$1/$2/$3'; // ***
$route['almacen/nuevo-traspaso']='almacen/nuevo_traspaso'; // ***
$route['almacen/archivo-alto-costo']='almacen/archivo_alto_costo';  // ***
$route['almacen/explosion-insumos']='almacen/explosion_insumos'; // ***
$route['almacen/traspasos/(:any)']='almacen/traspasos/$1'; // ***
$route['almacen/nueva-devolucion/(:any)']='almacen/nueva_devolucion/$1'; // ***
// ******************* ALMACEN ***************************** //

// ******************* CONTROL VEHICULAR ***************************** //
$route['ControlVehicular/nuevo-tramite-vehicular']='ControlVehicular/nuevo_tramite_vehicular'; // ***
$route['ControlVehicular/nueva-incidencia']='ControlVehicular/nueva_incidencia'; // ***
$route['ControlVehicular/editar-estatus-incidencia']='ControlVehicular/editar_estatus_incidencia'; // ***
// ******************* CONTROL VEHICULAR ***************************** //

// ******************* ALMACEN ***************************** //
$route['almacen/guardar-traspaso']='almacen/guardar_traspaso'; // ***
$route['almacen/cancelar-traspaso']='almacen/cancelar_traspaso'; // ***
$route['almacen/guardar-devolucion']='almacen/guardar_devolucion'; // ***
$route['almacen/guardar-devolucion-interno']='almacen/guardar_devolucion_interno'; // ***


$route['almacen/nueva-devolucion/(:any)']='almacen/nueva_devolucion/$1'; // *** Repetida
$route['almacen/guardar-nueva-entrada-alto-costo']='almacen/guardar_nueva_entrada_ac'; // ***
$route['almacen/guardar-nueva-entrada-autos-control-vehicular']='almacen/guardar_nueva_entrada_autos_control_vehicular'; // ***
$route['almacen/guardar-nueva-entrada-sistemas']='almacen/guardar_nueva_entrada_sistemas'; // ***
$route['almacen/guardar-nueva-entrada-area-medica']='almacen/guardar_nueva_entrada_area_medica'; // ***
$route['almacen/guardar-nueva-entrada-almacen-cliente']='almacen/guardar_nueva_entrada_almacen_cliente'; // ***
$route['almacen/guardar-nueva-explosion-insumos']='almacen/guardar_nueva_explosion_insumos'; // ***
$route['almacen/guardar-nueva-entrada-manual']='almacen/guardar_nueva_entrada_manual'; // ***
$route['almacen/guardar-nueva-entrada']='almacen/guardar_nueva_entrada'; // ***
$route['almacen/guardar-nueva-entrada-virtual']='almacen/guardar_nueva_entrada_virtual'; // ***
$route['almacen/almacen-alto-costo']='almacen/almacen_alto_costo'; // ***
$route['almacen/almacen-refacciones-control-vehicular']='almacen/almacen_refacciones_control_vehicular'; // ***
$route['almacen/almacen-kuali']='almacen/almacen_kuali'; // ***
$route['almacen/almacen-autos-control-vehicular']='almacen/almacen_autos_control_vehicular'; // ***
$route['almacen/almacen-tarjetas-gasolina']='almacen/almacen_tarjetas_gasolina'; // ***
$route['almacen/combustible-autos-control-vehicular']='almacen/combustible_autos_control_vehicular'; // ***
$route['almacen/tramite-autos-control-vehicular']='almacen/tramite_autos_control_vehicular';
$route['almacen/almacen-area-medica']='almacen/almacen_area_medica';
$route['almacen/almacen-seguridad-e-higiene']='almacen/almacen_seguridad_e_higiene';
$route['almacen/reporte-proyectoAC']='almacen/reporte_proyectoAC';
$route['almacen/reporte-fechaAC']='almacen/reporte_fechaAC';
$route['almacen/reporte-productoAC']='almacen/reporte_productoAC';
$route['almacen/reporte-inventarioAC']='almacen/reporte_inventarioAC';
$route['almacen/reporte-personalAC']='almacen/reporte_personalAC';
$route['almacen/excel-productoAG/(:any)']='almacen/excel_productoAG/$1';
$route['almacen/excel-entradasAG']='almacen/excel_entradasAG';
$route['almacen/excel-salidasAG']='almacen/excel_salidasAG';
$route['almacen/excel-salidasContratistas']='almacen/excel_salidasContratistas';
$route['almacen/excel-devolucionesContratistas']='almacen/excel_devolucionesContratistas';
$route['almacen/excel-devolucionesAG']='almacen/excel_devolucionesAG';
$route['almacen/excel-devoluciones-AG']='almacen/excel_devoluciones_AG';
$route['almacen/excel-devoluciones-AC']='almacen/excel_devoluciones_AC';
$route['almacen/excel-devoluciones-Kuali']='almacen/excel_devoluciones_Kuali';
$route['almacen/excel-catalogo/(:any)']='almacen/excel_catalogo/$1';
$route['almacen/excel-proyectos']='almacen/excel_proyectos';
$route['almacen/excel-almacenes']='almacen/excel_almacenes';
$route['almacen/excel-inventario-alto-costo']='almacen/excel_inventario_alto_costo';
$route['almacen/excel-consumibles-alto-costo']='almacen/excel_consumibles_alto_costo';
$route['almacen/excel-asignaciones-alto-costo']='almacen/excel_asignaciones_alto_costo';
$route['almacen/excel-consumibles-area-medica']='almacen/excel_consumibles_area_medica';
$route['almacen/excel-movimientos']='almacen/excel_movimientos';
$route['almacen/excel-mis-solicitudesAG']='almacen/excel_mis_solicitudesAG';
$route['almacen/excel-mis-solicitudesAM']='almacen/excel_mis_solicitudesAM';
$route['almacen/excel-mis-solicitudesAC']='almacen/excel_mis_solicitudesAC';
$route['almacen/excel-solicitudes']='almacen/excel_solicitudes';
$route['almacen/excel-solicitudes-sh']='almacen/excel_solicitudes_sh';
$route['almacen/excel-solicitudes-rcv']='almacen/excel_solicitudes_rcv';
$route['almacen/excel-solicitudesAreaMedica']='almacen/excel_solicitudesAreaMedica';
$route['almacen/excel-almacenes-entradas/(:any)']='almacen/excel_almacenes_entradas/$1';
$route['almacen/excel-almacenes-productos/(:any)']='almacen/excel_almacenes_productos/$1';
$route['almacen/excel-almacenes-explosion/(:any)']='almacen/excel_almacenes_explosion/$1';
$route['almacen/excel-almacenes-salidas/(:any)']='almacen/excel_almacenes_salidas/$1';
$route['almacen/excel-almacenes-devoluciones/(:any)']='almacen/excel_almacenes_devoluciones/$1';
$route['almacen/excel-almacenes-traspasos/(:any)']='almacen/excel_almacenes_traspasos/$1';


$route['almacen/guardar-categoria']='almacen/guardar_categoria';
$route['almacen/guardar-unidad-medida']='almacen/guardar_unidad_medida';
$route['almacen/guardar-producto-catalogo']='almacen/guardar_producto_catalogo';
$route['almacen/actualizar-producto-catalogo']='almacen/actualizar_producto_catalogo';
$route['almacen/actualizar-explosion']='almacen/actualizar_explosion';
$route['almacen/actualizar-estatus-existencias']='almacen/actualizar_estatus_existencias';
$route['almacen/actualizar-producto-almacen']='almacen/actualizar_producto_almacen';


$route['almacen/asignacion/nueva/(:any)/(:any)']='almacen/nueva_asignacion/$1/$2';
$route['almacen/asignacion/refaccion/nueva/(:any)']='almacen/nueva_asignacion_refaccion/$1';
$route['almacen/asignacion/continuar/(:any)/(:any)']='almacen/continuar_asignacion/$1/$2';
$route['almacen/traspaso/continuar/(:any)/(:any)']='almacen/continuar_traspaso/$1/$2';
$route['almacen/continuar_asignacion_paginacion']='almacen/continuar_asignacion_paginacion';
$route['almacen/asignacion/detalle/(:any)']='almacen/detalle_asignacion/$1';
$route['almacen/entrada/detalle/(:any)']='almacen/detalle_entrada/$1';
$route['almacen/entrada/info/(:any)']='almacen/detalle_info/$1';
$route['almacen/entrada/editar/(:any)']='almacen/editar_entrada/$1';
$route['almacen/salida/detalle/(:any)/(:any)']='almacen/detalle_salida/$1/$2';
$route['almacen/devolucion/detalle/(:any)']='almacen/devolucion_detalle/$1';
$route['almacen/movimientos/detalle/(:any)/(:any)']='almacen/detalle_movimientos/$1/$2';
$route['almacen/traspaso/detalle/(:any)']='almacen/detalle_traspaso/$1';
$route['almacen/guardar-asignacion-hilti']='almacen/guardar_asignacion_hilti';
$route['almacen/guardar-salida']='almacen/guardar_salida';
$route['almacen/guardar-subalmacen']='almacen/guardar_subalmacen';
$route['almacen/editar-entrada-almacen-cliente']='almacen/editar_entrada_almacen_cliente';

$route['almacen/detalle-entrada-externo/(:any)'] = 'almacen/detalle_entrada_externo/$1';
$route['almacen/guardar-asignacion-alto-costo']='almacen/guardar_asignacion_alto_costo';
$route['almacen/guardar-asignacion-autos-control-vehicular']='almacen/guardar_asignacion_autos_control_vehicular';
$route['almacen/guardar-asignacion-material']='almacen/guardar_asignacion_material';
$route['almacen/guardar-asignacion-herramienta']='almacen/guardar_asignacion_herramienta';
$route['almacen/devolucion/(:any)/(:any)']='almacen/devolucion/$1/$2';
$route['almacen/devolucion-almacen/(:any)']='almacen/devolucion_almacen/$1';
$route['almacen/devolucion-asignacion-generador/(:any)/(:any)']='almacen/devolucion_asignacion_generador/$1/$2';
$route['almacen/ajax-desasignacion']='almacen/ajax_desasignacion';
$route['almacen/ajax-devolucion']='almacen/ajax_devolucion';
$route['almacen/detalle-producto/(:any)']='almacen/detalle_producto/$1';
$route['almacen/detalle-personal/(:any)']='almacen/detalle_personal/$1';
$route['almacen/solicitud-almacen']='almacen/solicitud_almacen';
$route['almacen/solicitud-alto-costo']='almacen/solicitud_alto_costo';
$route['almacen/solicitud-almacen-seguridad']='almacen/solicitud_almacen_seguridad';
$route['almacen/solicitud-kuali-digital']='almacen/solicitud_kuali_digital';
$route['almacen/solicitud-area-medica']='almacen/solicitud_area_medica';
$route['almacen/solicitud-sistemas']='almacen/solicitud_sistemas';
$route['almacen/solicitud-tarjetas']='almacen/solicitud_tarjetas';
$route['almacen/solicitudes-almacen']='almacen/solicitudes_almacen';
$route['almacen/nueva-solicitud']='almacen/nueva_solicitud';
$route['almacen/nueva-solicitud-generador']='almacen/nueva_solicitud_generador';
$route['almacen/nueva-justificacion-material']='almacen/nueva_justificacion_material';
$route['almacen/solicitud-auto-control-vehicular']='almacen/solicitud_auto_control_vehicular';
$route['almacen/solicitud-refacciones-control-vehicular']='almacen/solicitud_refacciones_control_vehicular';
$route['almacen/solicitud-refacciones-control-vehicular/(:any)/(:any)/(:any)']='almacen/solicitud_refacciones_control_vehicular/$1/$2/$3';

$route['almacen/tipo-personal'] = 'almacen/tipo_recibe';
$route['almacen/personal-contratista'] = 'almacen/personal_contratista';
$route['almacen/personal-estatus'] = 'almacen/personal_estatus';

$route['almacen/detalle-solicitud/(:any)']='almacen/detalle_solicitud/$1';
$route['almacen/detalle-justificacion/(:any)']='almacen/detalle_justificacion/$1';
$route['almacen/detalle-solicitud-material/(:any)']='almacen/detalle_solicitud_material/$1';
$route['almacen/movimientos-devoluciones']='almacen/movimientos_devoluciones';
$route['almacen/activar-codigo']='almacen/activar_codigo';
$route['almacen/desactivar-codigo']='almacen/desactivar_codigo';
$route['almacen/cancelar-solicitud']='almacen/cancelar_solicitud';
$route['almacen/cancelar-justificacion']='almacen/cancelar_justificacion';
$route['almacen/cancelar-asignacion']='almacen/cancelar_asignacion';
$route['almacen/modificar-solicitud']='almacen/modificar_solicitud';
$route['almacen/aprobar-solicitud']='almacen/aprobar_solicitud';
$route['almacen/actualizar-neodata']='almacen/actualizar_neodata';
$route['almacen/comentarios-neodata']='almacen/comentarios_neodata';
$route['almacen/comentarios-neodata-devolucion']='almacen/comentarios_neodata_devolucion';
$route['almacen/guardar-recorrido']='almacen/guardar_recorrido';
$route['almacen/aprobar-justificacion']='almacen/aprobar_justificacion';
$route['almacen/surtir-solicitudAC']='almacen/surtir_solicitudAC';
$route['almacen/surtir-solicitudCV']='almacen/surtir_solicitudCV';
$route['almacen/surtir-solicitudRCV']='almacen/surtir_solicitudRCV';
$route['almacen/surtir-solicitudSistemas'] = 'almacen/surtir_solicitudSistemas';
$route['almacen/cuadre-materiales/(:any)'] = 'almacen/cuadre_materiales/$1';
$route['solicitudes']='almacen/solicitudes';
$route['solicitudes-asignadas']='almacen/solicitudes_asignadas';

// Reportes Almacen General
$route['almacen/reportes-almacen-general'] = 'almacen/reportes';

// Reportes Almacen Clientes
$route['almacen/reportes-almacen-cliente'] = 'almacen/reportes_almacen_cliente';

// Reportes Control Vehicular
$route['almacen/reportes-control-vehicular'] = 'almacen/reportes_control_vehicular';

// Reportes Sistemas
$route['sistemas/reporte-sistemas'] = 'sistemas/reporte_sistemas';

// Reportes Incidencias
$route['almacen/reportes-incidencias'] = 'almacen/reportes_incidencias';

// Reportes Operaciones
$route['almacen/reportes-operaciones'] = 'almacen/reportes_operaciones';

// Justificaciones de material
$route['almacen/justificaciones-material'] = 'almacen/justificaciones_material';

// Justificacion de material (solicitud)
$route['almacen/justificacion-material'] = 'almacen/justificacion_material';

// Entradas manuales AG
$route['almacen/entradas-manuales'] = 'almacen/entradas_manuales';


//Rutas para Soporte
$route['soporte'] = 'soporte';
$route['soporte/generar-ticket'] = 'soporte/generar_ticket';
$route['soporte/generar-ticket-sistemas'] = 'soporte/generar_ticket_sistemas';
$route['soporte/generar-ticket-cv'] = 'soporte/generar_ticket_cv';
$route['soporte/generar-ticket-mantenimiento'] = 'soporte/generar_ticket_mantenimiento';
$route['soporte/detalle-ticket/(:any)'] = 'soporte/detalle_ticket/$1';
$route['soporte/aprobar-ticket/(:any)'] = 'soporte/aprobar_ticket/$1';

$route['sistemas'] = 'sistemas';
$route['sistemas/nuevo-servicio/(:any)'] = 'sistemas/nuevo_servicio/$1';
$route['sistemas/detalle-producto/(:any)']='sistemas/detalle_producto/$1';
$route['sistemas/detalle-checklist/(:any)']='sistemas/detalle_checklist/$1';


//Rutas para Mantenimientos
$route['mantenimientos'] = 'mantenimientos';
$route['almacen/generar-mantenimiento'] = 'almacen/generar_mantenimiento';
$route['almacen/detalle-mantenimiento/(:any)'] = 'almacen/detalle_mantenimiento/$1';
$route['soporte/aprobar-ticket/(:any)'] = 'soporte/aprobar_ticket/$1';

$route['almacen/generador-zte'] = 'almacen/generador_zte';
$route['almacen/cargar-csv']= 'almacen/cargar_csv';
$route['almacen/procesar-csv']= 'almacen/procesar_csv';

//$route['almacen/asignaciones']='almacen/asignaciones/$1';


// Vacantes
//$route['vacantes/editar/(:any)']='vacantes/editar_vacante';

// Prospectos
//$route['vacantes/prospectos']='prospectos';
//$route['vacantes/prospectos/(:any)']='prospectos';
//$route['vacantes/prospectos/nuevo/(:any)']='prospectos/nuevo_prospecto';
//$route['vacantes/prospectos/editar/(:any)']='prospectos/editar_prospecto';
//$route['vacantes/prospectos/archivos/(:any)']='prospectos/documntos';
//$route['vacantes/detalle-vacante/(:any)']='vacantes/detalle_vacante/$1';


//$route['prospecto/archivo-eliminar/(:any)']='prospectos/archivos_eliminar';
//$route['prospectos/convertir/(:any)']='prospectos/convertir_usuario';

$route['asistencias/cagar-csv']= 'asistencias/cagar_csv';
$route['asistencias/procesar-csv']='asistencias/procesar_csv';

$route['personal/verificar-fotos'] = 'personal/verificar_fotos';


$route['contratistas/nuevo-contratista']='contratistas/nuevo_contratista';
$route['contratistas/nuevo-personal']='contratistas/nuevo_personal';
$route['contratistas/guardar-contratista']='contratistas/guardar_contratista';
$route['contratistas/actualizar-contratista']='contratistas/actualizar_contratista';
$route['contratistas/excel-contratistas']='contratistas/excel_contratistas';
$route['contratistas/excel-personalActivo']='contratistas/excel_personalActivo';
$route['contratistas/excel-personalInactivo']='contratistas/excel_personalInactivo';


$route['contratistas/guardar-personal']='contratistas/guardar_personal';
$route['contratistas/actualizar-personal']='contratistas/actualizar_personal';
$route['contratistas/detalle/(:any)']='contratistas/detalle/$1';
$route['contratistas/detalle-usuario/(:any)']='contratistas/detalle_usuario/$1';
$route['contratistas/editar-personal/(:any)']='contratistas/editar_personal/$1';
$route['contratistas/detalle-baja/(:any)']='contratistas/detalle_baja/$1';

$route['control-vehicular/servicios']='ControlVehicular/servicios';
$route['control-vehicular/mostrarServicios']='ControlVehicular/mostrarServicios';
$route['control-vehicular/asignar-servicio']='ControlVehicular/asignar_servicio';
$route['control-vehicular/detalle-servicio/(:any)']='ControlVehicular/detalle_servicio/$1';
$route['control-vehicular/checklist-servicio/(:any)']='ControlVehicular/checklist_servicio/$1';
$route['control-vehicular/checklist-servicio-tecnico/(:any)']='ControlVehicular/checklist_servicio_tecnico/$1';
$route['control-vehicular/iniciar-servicio']='ControlVehicular/iniciar_servicio';
$route['control-vehicular/finalizar-servicio']='ControlVehicular/finalizar_servicio';
$route['control-vehicular/guardarChecklistServicio']='ControlVehicular/guardarChecklistServicio';
$route['control-vehicular/guardarChecklistTecnicoServicio']='ControlVehicular/guardarChecklistTecnicoServicio';
$route['control-vehicular/reactivar-pausar-servicio']='ControlVehicular/reactivar_pausar_servicio';
$route['control-vehicular/excel-autos-cv']='ControlVehicular/excel_autos_cv';
$route['control-vehicular/siniestros']="ControlVehicular/siniestros";
$route['control-vehicular/cambio-propietario'] = "ControlVehicular/cambio_propietario";

$route['compras/solicitud-compra']='compras/solicitud_compra';
$route['compras/nueva-solicitud']='compras/nueva_solicitud';
$route['compras/nueva-solicitud-estimacion']='compras/nueva_solicitud_estimacion';
$route['compras/nueva-solicitud-compra']='compras/nueva_solicitud_compra';
$route['compras/nueva-solicitud-compra-estimacion']='compras/nueva_solicitud_compra_estimacion';
$route['compras/solicitudes-aprobadas']='compras/solicitudes_aprobadas';
$route['compras/detalle-solicitud/(:any)']='compras/detalle_solicitud/$1';
$route['compras/cancelar-solicitud']='compras/cancelar_solicitud';
$route['compras/modificar-solicitud']='compras/modificar_solicitud';
$route['compras/aprobar-solicitud']='compras/aprobar_solicitud';
$route['compras/nuevo-pedido']='compras/nuevo_pedido';
$route['compras/guardar-pedido']='compras/guardar_pedido';
$route['compras/excel-solicitud-compras']='compras/excel_solicitud_compras';
$route['compras/excel-solicitudes-compras']='compras/excel_solicitudes_compras';
$route['compras/reportes-compras'] = 'compras/reportes_compras';

$route['estimaciones']='estimaciones';
$route['estimaciones/detalle-solicitud/(:any)']='estimaciones/detalle_solicitud/$1';
$route['estimaciones/cambiarproyecto']='estimaciones/cambiarProyecto';
$route['estimaciones/nuevo-pedido-estimacion']='estimaciones/nuevo_pedido_estimacion';
$route['estimaciones/cancelar-solicitud']='estimaciones/cancelar_solicitud';
$route['estimaciones/modificar-solicitud']='estimaciones/modificar_solicitud';
$route['estimaciones/aprobar-solicitud']='estimaciones/aprobar_solicitud';
$route['estimaciones/creada-solicitud']='estimaciones/creada_solicitud';
$route['estimaciones/guardar-pedido']='estimaciones/guardar_pedido';
$route['estimaciones/modificarCantidad'] = 'estimaciones/modificarCantidad';

$route['proveedores/detalle/(:any)']='proveedores/detalle/$1';
$route['proveedores/excel-proveedores']='proveedores/excel_proveedores';

$route['pedidos/detalle-pedido/(:any)']='pedidos/detalle_pedido/$1';
$route['pedidos/excel-pedidos']='pedidos/excel_pedidos';
$route['pedidos/excel-pedidos-virtuales']='pedidos/excel_pedidos_virtuales';
$route['pedidos/pago-pedido'] = 'pedidos/pago_pedido';

$route['pedidosestimacion/ver-pedidos-estimacion'] = 'pedidosestimacion/ver_pedidos_estimacion';
$route['pedidosestimacion/excel-pedidos-estimacion'] = 'pedidosestimacion/excel_pedidos_estimacion';
$route['pedidosestimacion/cancelarPedido'] = 'pedidosestimacion/cancelarPedido';
$route['pedidosestimacion/cerrarPedido'] = 'pedidosestimacion/cerrarPedido';
$route['pedidosestimacion/mostrarPedidos'] = 'pedidosestimacion/mostrarPedidos';
$route['pedidosestimacion/detalle-pedido/(:any)'] = 'pedidosestimacion/detalle_pedido/$1';
$route['pedidosestimacion/imprimirDetallePedidoEstimacion/(:any)'] = 'pedidosestimacion/imprimirDetallePedidoEstimacion/$1';

// Devoluciones
$route['almacen/devoluciones']='almacen/solicitudes_devoluciones';
$route['almacen/devoluciones-alto-costo']='almacen/solicitudes_devoluciones_alto_costo';
$route['almacen/devoluciones-tarjetas']='almacen/solicitudes_devoluciones_tarjetas';
$route['almacen/devoluciones-kuali']='almacen/solicitudes_devoluciones_kuali';
$route['almacen/devoluciones-autos-control-vehicular']='almacen/solicitudes_devoluciones_autos_control_vehicular';
$route['almacen/devoluciones-refacciones-control-vehicular']='almacen/solicitudes_devoluciones_refacciones_control_vehicular';
$route['almacen/devoluciones-sistemas']='almacen/solicitudes_devoluciones_sistemas';
$route['almacen/solicitud-devolucion']='almacen/solicitud_devolucion';
$route['almacen/solicitud-devolucion-seguridad']='almacen/solicitud_devolucion_seguridad';
$route['almacen/devolucion-generador/(:any)']='almacen/devolucion_generador/$1';
$route['almacen/solicitud-devolucion-alto-costo']='almacen/solicitud_devolucion_alto_costo';
$route['almacen/solicitud-devolucion-tarjetas']='almacen/solicitud_devolucion_tarjetas';
$route['almacen/solicitud-devolucion-sistemas']='almacen/solicitud_devolucion_sistemas';
$route['almacen/solicitud-devolucion-kuali']='almacen/solicitud_devolucion_kuali';
$route['almacen/solicitud-devolucion-autos-control-vehicular']='almacen/solicitud_devolucion_autos_control_vehicular';
$route['almacen/solicitud-devolucion-refacciones-control-vehicular']='almacen/solicitud_devolucion_refacciones_control_vehicular';
$route['almacen/devolucion-material-alto-costo']='almacen/devolucion_material_alto_costo';
$route['almacen/guardar-solicitud-devolucion']='almacen/guardar_solicitud_devolucion';
$route['almacen/guardar-solicitud-devolucion-generador']='almacen/guardar_solicitud_devolucion_generador';
$route['almacen/detalle-devolucion/(:any)']='almacen/detalle_devolucion/$1';
$route['almacen/detalle-devolucion-interno/(:any)']='almacen/detalle_devolucion/$1';
$route['almacen/cancelar-solicitud-devolucion'] = 'almacen/cancelar_devolucion';
$route['almacen/detalle-devolucion-material/(:any)']='almacen/detalle_devolucion_material/$1';
$route['almacen/devolucion-alto-costo/(:any)']='almacen/devolucion_alto_costo/$1';
$route['almacen/eliminar-explosion']='almacen/eliminar_explosion';
$route['almacen/completar-devolucion']='almacen/completar_devolucion';
$route['almacen/devoluciones-area-medica']='almacen/devoluciones_area_medica';
$route['almacen/solicitud-devolucion-area-medica']='almacen/solicitud_devolucion_area_medica';

// Proyectos Para C.O
$route['proyectos/movimientos/(:any)']='proyectos/movimientos_almacen/$1';
$route['proyectos/excel-proyectos']='proyectos/excel_proyectos';
$route['proyectos/excel-proyectos-completo']='proyectos/excel_proyectos_completo';

// Reposrtes almacen general