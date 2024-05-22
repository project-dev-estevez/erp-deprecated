<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Proveedores_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function proveedores($buscar='', $inicio = false, $cantidadRegistro = false) {
        $limit = '';
        if($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("SELECT * FROM tbl_proveedores WHERE nombre_comercial LIKE '%$buscar%' OR nombre_fiscal LIKE '%$buscar%' OR rfc LIKE '%$buscar%' " . $limit);
        return $query->result();
    }

    public function detalle($id) {
        $query = $this->db->query("SELECT * FROM tbl_proveedores WHERE idtbl_proveedores='$id'");
        return $query->result()[0];
    }

    public function guardar() {
        $data = array(
            'nombre_fiscal' => $this->input->post('nombre_fiscal'),
            'nombre_comercial' => $this->input->post('nombre_comercial'),
            'rfc' => $this->input->post('rfc'),
            'direccion' => $this->input->post('direccion'),
            'colonia' => $this->input->post('colonia'),
            'cp' => $this->input->post('cp'),
            'ciudad' => $this->input->post('ciudad'),
            'persona_contacto' => $this->input->post('persona_contacto'),
            'telefonos' => $this->input->post('telefonos'),
            'moneda' => $this->input->post('moneda'),
            'condiciones_pago' => $this->input->post('condiciones_pago'),
            'datos_bancarios' => $this->input->post('datos_bancarios'),
            'cuenta_bancaria' => $this->input->post('cuenta_bancaria'),
            'clabe_inter' => $this->input->post('clabe_inter'),
            'refencia_bancaria' => $this->input->post('refencia_bancaria'),
            'observaciones' => $this->input->post('observaciones')
        );
        if($this->db->insert('tbl_proveedores', $data))
            return true;
        else
            return false;
    }

    public function actualizar() {
        $data = array(
            'nombre_fiscal' => $this->input->post('nombre_fiscal'),
            'nombre_comercial' => $this->input->post('nombre_comercial'),
            'rfc' => $this->input->post('rfc'),
            'direccion' => $this->input->post('direccion'),
            'colonia' => $this->input->post('colonia'),
            'cp' => $this->input->post('cp'),
            'ciudad' => $this->input->post('ciudad'),
            'persona_contacto' => $this->input->post('persona_contacto'),
            'telefonos' => $this->input->post('telefonos'),
            'moneda' => $this->input->post('moneda'),
            'condiciones_pago' => $this->input->post('condiciones_pago'),
            'datos_bancarios' => $this->input->post('datos_bancarios'),
            'cuenta_bancaria' => $this->input->post('cuenta_bancaria'),
            'clabe_inter' => $this->input->post('clabe_inter'),
            'refencia_bancaria' => $this->input->post('refencia_bancaria'),
            'observaciones' => $this->input->post('observaciones')
        );
        $this->db->where('idtbl_proveedores', $this->input->post('id'));
        if($this->db->update('tbl_proveedores', $data))
            return true;
        else
            return false;
    }
}