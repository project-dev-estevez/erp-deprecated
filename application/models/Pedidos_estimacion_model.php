<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Pedidos_estimacion_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function datospedido($uid) {
        $resultado['pedido']=$this->detalle_pedido($uid);
        if($resultado['pedido']){
            $resultado['detalle']=$this->detalle_pedido_catalogo($resultado['pedido']->idtbl_pedidos);
            return $resultado;
        }else
            return false;
    }
    
    public function pedidos($buscar='', $inicio = false, $cantidadRegistro = false) {
        $limit = '';
        if($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        
        $query = $this->db->query("SELECT tbl_proyectos.nombre_proyecto, tbl_proyectos.numero_proyecto, tbl_pedidos.*, tbl_users.nombre, tbl_clientes.nombre_comercial, tbl_solicitudes_estimacion.uid as uid_requisicion, tbl_catalogo.neodata FROM tbl_pedidos LEFT JOIN tbl_proyectos ON tbl_pedidos.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos LEFT JOIN tbl_users ON tbl_pedidos.tbl_users_idtbl_users=tbl_users.idtbl_users LEFT JOIN tbl_clientes ON tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes LEFT JOIN tbl_solicitudes_estimacion ON tbl_solicitudes_estimacion.idtbl_solicitudes_estimacion=tbl_pedidos.tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion LEFT JOIN dtl_pedido_catalogo ON dtl_pedido_catalogo.iddtl_pedido_catalogo = tbl_pedidos.idtbl_pedidos LEFT JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_pedido_catalogo.tbl_catalogo_idtbl_catalogo WHERE (tbl_pedidos.uid LIKE '%$buscar%' OR tbl_pedidos.neodata_pedido LIKE '%$buscar%' OR tbl_pedidos.fecha_creacion LIKE '%$buscar%' OR tbl_solicitudes_estimacion.uid LIKE '%$buscar%' OR tbl_users.nombre LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_proyectos.nombre_proyecto LIKE '%$buscar%') AND tbl_pedidos.estimacion = 1 ORDER BY tbl_pedidos.idtbl_pedidos DESC " . $limit);

        return $query->result();
    }

    public function detalle_pedido($uid) {

        $this->db->select('tbl_proyectos.nombre_proyecto');
        $this->db->select('tbl_proyectos.numero_proyecto');
        $this->db->select('tbl_proyectos.direccion');
        $this->db->select('tbl_segmentos_proyecto.segmento');
        $this->db->select('tbl_pedidos.*');
        $this->db->select('tbl_users.nombre');
        $this->db->select('tbl_clientes.nombre_comercial as nombre_comercial_cliente');
        $this->db->select('tbl_solicitudes_estimacion.uid as uid_requisicion');              
        $this->db->select('tbl_solicitudes_estimacion.idtbl_solicitudes_estimacion');       
        $this->db->select('tbl_proveedores.nombre_fiscal, tbl_proveedores.rfc');

        $this->db->from('tbl_pedidos');         

        $this->db->join('tbl_proyectos','tbl_pedidos.tbl_proyectos_idtbl_proyectos=tbl_proyectos.idtbl_proyectos','left');
        $this->db->join('tbl_segmentos_proyecto','tbl_segmentos_proyecto.idtbl_segmentos_proyecto = tbl_pedidos.tbl_segmentos_proyecto_idtbl_segmentos_proyecto','left');
        $this->db->join('tbl_users','tbl_pedidos.tbl_users_idtbl_users=tbl_users.idtbl_users','left');
        $this->db->join('tbl_clientes','tbl_proyectos.tbl_clientes_idtbl_clientes=tbl_clientes.idtbl_clientes','left');
        $this->db->join('tbl_solicitudes_estimacion','tbl_solicitudes_estimacion.idtbl_solicitudes_estimacion=tbl_pedidos.tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion','left');
        $this->db->join('tbl_proveedores','tbl_proveedores.idtbl_proveedores = tbl_pedidos.tbl_proveedores_idtbl_proveedores','left');

        $this->db->where('tbl_pedidos.uid', $uid);

        $query = $this->db->get();
        $resultado = $query->result();
        
        if(count($resultado)>0)
            return $query->result()[0];
        else
            return false;
    }
    
    public function detalle_pedido_catalogo($id_pedido) {
        $this->db->select('dtl_pedido_catalogo.*');
        $this->db->select('tbl_catalogo.descripcion');
        $this->db->select('tbl_catalogo.uid');
        $this->db->select('tbl_catalogo.neodata');
        $this->db->select('tbl_pedidos.lugar_entrega');
        $this->db->select('tbl_pedidos.nota_credito');
        $this->db->select('tbl_proveedores.nombre_fiscal');
        $this->db->select('ctl_unidades_medida.unidad_medida_abr');
        $this->db->select('dtl_solicitud_estimacion.cantidad as cantidad_contrato');

        $this->db->from('dtl_pedido_catalogo');

        $this->db->join('tbl_pedidos','tbl_pedidos.idtbl_pedidos=dtl_pedido_catalogo.tbl_pedidos_idtbl_pedidos', 'left');
        $this->db->join('tbl_catalogo','tbl_catalogo.idtbl_catalogo=dtl_pedido_catalogo.tbl_catalogo_idtbl_catalogo', 'left');
        $this->db->join('dtl_solicitud_estimacion','dtl_solicitud_estimacion.tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion=tbl_pedidos.tbl_solicitudes_estimacion_idtbl_solicitudes_estimacion AND tbl_catalogo.idtbl_catalogo=dtl_solicitud_estimacion.tbl_catalogo_idtbl_catalogo', 'left');
        $this->db->join('ctl_unidades_medida','tbl_catalogo.ctl_unidades_medida_idctl_unidades_medida=ctl_unidades_medida.idctl_unidades_medida', 'left');
        $this->db->join('tbl_proveedores', 'tbl_proveedores.idtbl_proveedores=tbl_pedidos.tbl_proveedores_idtbl_proveedores', 'left');
        $this->db->where('dtl_pedido_catalogo.tbl_pedidos_idtbl_pedidos', $id_pedido);

        $query = $this->db->get();

        return $query->result();
    }

    public function cambiarEstatusPedido($parametros, $uid_pedido) {
        $this->db->trans_begin();

        $query = $this->db->get_where("tbl_pedidos", array("uid" => $uid_pedido));
        $resultPedido = $query->result();

        $query = $this->db->get_where("tbl_almacen_movimientos", array("parent" => $resultPedido[0]->idtbl_pedidos, "tipo" => "entrada-almacen"));
        $result = $query->result();
        
        if(!empty($result)){
            foreach ($result as $value) {
                //var_dump($value);
                $query = $this->db->get_where("dtl_almacen_movimientos", array("tbl_almacen_movimientos_idtbl_almacen_movimientos" => $value->idtbl_almacen_movimientos ));
                $result1 = $query->result();
                foreach ($result1 as $value1){
                    $this->db->where('tbl_almacenes_idtbl_almacenes', $value->tbl_almacenes_idtbl_almacenes);
                    $this->db->where('tbl_catalogo_idtbl_catalogo', $value1->tbl_catalogo_idtbl_catalogo);
                    $q = $this->db->get('dtl_almacen');
                    if ($q->num_rows() > 0) {
                        $this->db->set('existencias', 'existencias-' . $value1->cantidad, FALSE);
                        $this->db->where('tbl_almacenes_idtbl_almacenes', $value->tbl_almacenes_idtbl_almacenes);
                        $this->db->where('tbl_catalogo_idtbl_catalogo', $value1->tbl_catalogo_idtbl_catalogo);
                        $this->db->update('dtl_almacen');
                    }
                }
                $this->db->set('cantidad', 0);
                $this->db->where('tbl_almacen_movimientos_idtbl_almacen_movimientos', $value->idtbl_almacen_movimientos);
                $this->db->update('dtl_almacen_movimientos');
            }
            $this->db->set('entregado', 0);
            $this->db->where('tbl_pedidos_idtbl_pedidos', $resultPedido[0]->idtbl_pedidos);
            $this->db->update('dtl_pedido_catalogo');
        }

        $this->db->where('uid', $uid_pedido);
        $this->db->update('tbl_pedidos', $parametros);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 'Ocurrio un error intente nuevamente';
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function cerrarPedido(){
        $array = [
            $this->input->post("folio_pago"),
            $this->input->post("numero_factura"),
            $this->input->post("banco"),
            "cerrada",
            $this->input->post("uid_pedido")
        ];
        $sql = "UPDATE tbl_pedidos SET folio_pago = ?, numero_factura = ?, tbl_bancos_idtbl_bancos = ?, estatus = ? WHERE uid = ?";
        $resultado = $this->db->query($sql, $array);
        if(isset($resultado)){
            return true;
        }else{
            return false;
        }
    }

    public function bancos(){
        $sql = "SELECT * FROM tbl_bancos";
        return $this->db->query($sql)->result_array();
    }

}