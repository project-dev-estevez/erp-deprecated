<?php  if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 *
 */
class Personal_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function todos_los_usuarios_contrato_vencido($tipo='', $buscar='', $inicio = false, $cantidadRegistro = false)
    {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        /*$this->db->select('tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tblcontratos.fecha_inicio,tblcontratos.duracion,tblcontratos.tipo,tblcontratos.end_date');
        $this->db->from('tbl_usuarios');
        $this->db->join('dtl_contratos_usuarios','tbl_usuarios.idtbl_usuarios=dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios','left');
        $this->db->join('(SELECT *, DATE_ADD(fecha_inicio, INTERVAL duracion DAY) AS end_date FROM tbl_contratos) as tblcontratos','tblcontratos.idtbl_contratos=dtl_contratos_usuarios.tbl_contratos_idtbl_contratos','left');
        $this->db->join('tbl_perfiles','tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles','left');
        $this->db->join('tbl_departamentos','tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos','left');
        $this->db->join('tbl_proyectos','tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos','left');
        $this->db->where('tbl_usuarios.tipo',$tipo);
        $this->db->where('tblcontratos.tipo','determinado');
        $this->db->where('tbl_usuarios.estatus',1);
        $this->db->where('end_date <', date("Y-m-d") );
        $this->db->where('tblcontratos.estatus', 1 );
        $query= $this->db->get();*/
        $query = $this->db->query("SELECT tbl_usuarios.*,tbl_empresas.empresa,ctl_contratos.tbl_empresas_idtbl_empresas, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tblcontratos.fecha_inicio,tblcontratos.duracion,tblcontratos.tipo,tblcontratos.end_date FROM tbl_usuarios LEFT JOIN dtl_contratos_usuarios ON tbl_usuarios.idtbl_usuarios=dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios LEFT JOIN (SELECT *, DATE_ADD(fecha_inicio, INTERVAL duracion DAY) AS end_date FROM tbl_contratos) as tblcontratos ON tblcontratos.idtbl_contratos=dtl_contratos_usuarios.tbl_contratos_idtbl_contratos LEFT JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos LEFT JOIN ctl_contratos ON tbl_usuarios.ctl_contratos_idctl_contratos=ctl_contratos.idctl_contratos LEFT JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas WHERE tbl_usuarios.tipo = '$tipo' AND tblcontratos.tipo = 'determinado' AND tbl_usuarios.estatus = 1 AND tblcontratos.end_date < DATE(NOW()) AND tblcontratos.estatus = 1 AND (tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%' OR tbl_usuarios.apellido_paterno LIKE '%$buscar%' OR tbl_usuarios.apellido_materno LIKE '%$buscar%' OR tbl_usuarios.nombres LIKE '%$buscar%' OR tbl_departamentos.departamento LIKE '%$buscar%' OR tbl_perfiles.perfil LIKE '%$buscar%' OR tblcontratos.end_date LIKE '%$buscar%' ) " . $limit);
        return $query->result();
    }

    public function todos_los_usuarios_proximo_a_vencer($tipo='', $buscar='', $inicio = false, $cantidadRegistro = false)
    {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        /*$this->db->select('tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tblcontratos.fecha_inicio,tblcontratos.duracion,tblcontratos.tipo,tblcontratos.end_date');
        $this->db->from('tbl_usuarios');
        $this->db->join('dtl_contratos_usuarios','tbl_usuarios.idtbl_usuarios=dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios','left');
        $this->db->join('(SELECT *, DATE_ADD(fecha_inicio, INTERVAL duracion DAY) AS end_date FROM tbl_contratos) as tblcontratos','tblcontratos.idtbl_contratos=dtl_contratos_usuarios.tbl_contratos_idtbl_contratos','left');
        $this->db->join('tbl_perfiles','tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles','left');
        $this->db->join('tbl_departamentos','tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos','left');
        $this->db->join('tbl_proyectos','tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos','left');
        $this->db->where('tbl_usuarios.tipo',$tipo);
        $this->db->where('tblcontratos.tipo','determinado');
        $this->db->where('tbl_usuarios.estatus',1);
        $this->db->where('end_date >= DATE(now())');
        $this->db->where('end_date <= DATE_ADD(DATE(now()), INTERVAL 15 DAY)');
        $this->db->where('tblcontratos.estatus', 1 );
        $query= $this->db->get();*/
        $query = $this->db->query("SELECT tbl_usuarios.*,tbl_empresas.empresa,ctl_contratos.tbl_empresas_idtbl_empresas, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tblcontratos.fecha_inicio,tblcontratos.duracion,tblcontratos.tipo,tblcontratos.end_date FROM tbl_usuarios LEFT JOIN dtl_contratos_usuarios ON tbl_usuarios.idtbl_usuarios=dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios LEFT JOIN (SELECT *, DATE_ADD(fecha_inicio, INTERVAL duracion DAY) AS end_date FROM tbl_contratos) as tblcontratos ON tblcontratos.idtbl_contratos=dtl_contratos_usuarios.tbl_contratos_idtbl_contratos LEFT JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos LEFT JOIN ctl_contratos ON tbl_usuarios.ctl_contratos_idctl_contratos=ctl_contratos.idctl_contratos
        LEFT JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos WHERE tbl_usuarios.tipo = '$tipo' AND tblcontratos.tipo = 'determinado' AND tbl_usuarios.estatus = 1 AND end_date >= DATE(now()) AND end_date <= DATE_ADD(DATE(now()), INTERVAL 15 DAY) AND tblcontratos.estatus = 1 AND (tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%' OR tbl_usuarios.apellido_paterno LIKE '%$buscar%' OR tbl_usuarios.apellido_materno LIKE '%$buscar%' OR tbl_usuarios.nombres LIKE '%$buscar%' OR tbl_departamentos.departamento LIKE '%$buscar%' OR tbl_perfiles.perfil LIKE '%$buscar%' OR tblcontratos.end_date LIKE '%$buscar%' ) " . $limit);
        return $query->result();
    }

    public function todos_los_usuarios($tipo='', $pago='', $buscar='', $inicio = false, $cantidadRegistro = false)
    {
        if ($this->session->userdata('tipo') == 15) {
            $query = $this->db->query("SELECT * FROM `tbl_usuarios` WHERE CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Edgar Alejandro Miranda Requena%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Ignacio Montes Cruz%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Alejandro Pulido Martinez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Severo Ceron Lopez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Ricardo Adán Hernández Sánchez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%ELADIO ROA ESQUIVEL%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Rene Lopez Pagola%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno)");
            return $query->result();
        } else {
            $limit = '';
            $where = '';
            if ($inicio !== false && $cantidadRegistro !== false) {
                $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
            }
            if ($pago != '' || $pago != null) {
                $where = "AND tbl_usuarios.pago LIKE '%$pago%'";
            }
            $string = '';
            if($this->session->userdata('id') == 122) {
                $ids = array(2160,1367,1437,127,2181,114,2159,22,242,2206,117,1372,1330,1444,207,1428,169,241,113,204,46,83);
                $string = ' AND tbl_usuarios.idtbl_usuarios IN(2160,1367,1437,127,2181,114,2159,22,242,2206,117,1372,1330,1444,207,1428,169,241,113,204,46,83) ';
            }
            if($this->session->userdata('tipo') == 5){
                $order = '';
            }else{
                $order = 'ORDER BY tbl_usuarios.nombres ASC';
            }
            $query = $this->db->query("SELECT tbl_empresas.empresa, tbl_contratistas.nombre_comercial,tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion FROM tbl_usuarios LEFT JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos LEFT JOIN (SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios ON tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_contratos ON tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_contratistas ON tbl_contratistas.idtbl_contratistas = tbl_usuarios.tbl_contratistas_idtbl_contratistas LEFT JOIN ctl_contratos ON ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos LEFT JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas WHERE tbl_usuarios.tipo = '$tipo' AND tbl_usuarios.estatus = 1 $where $string AND ((CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%' OR CONCAT(tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno,' ',tbl_usuarios.nombres) LIKE '%$buscar%') OR tbl_usuarios.uid LIKE '%$buscar%' OR tbl_contratistas.nombre_comercial LIKE '%$buscar%' OR tbl_empresas.empresa LIKE '%$buscar%' OR tbl_departamentos.departamento LIKE '%$buscar%' OR tbl_perfiles.perfil LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_usuarios.fecha_nacimiento LIKE '%$buscar%' OR tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%') $order " . $limit);
            return $query->result();
        }
    }

    public function personalPorContratista($tipo='', $estatus, $buscar='', $inicio = false, $cantidadRegistro = false)
    {
        $contratista = $this->input->post('uid');
        if ($this->session->userdata('tipo') == 15) {
            $query = $this->db->query("SELECT * FROM `tbl_usuarios` WHERE CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Edgar Alejandro Miranda Requena%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Ignacio Montes Cruz%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Alejandro Pulido Martinez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Severo Ceron Lopez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Ricardo Adán Hernández Sánchez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%ELADIO ROA ESQUIVEL%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Rene Lopez Pagola%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno)");
            return $query->result();
        } else {
            $limit = '';
            $where = '';
            if ($inicio !== false && $cantidadRegistro !== false) {
                $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
            }
           
            $string = '';
            if($this->session->userdata('id') == 122) {
                $ids = array(2160,1367,1437,127,2181,114,2159,22,242,2206,117,1372,1330,1444,207,1428,169,241,113,204,46,83);
                $string = ' AND tbl_usuarios.idtbl_usuarios IN(2160,1367,1437,127,2181,114,2159,22,242,2206,117,1372,1330,1444,207,1428,169,241,113,204,46,83) ';
            }
            if($this->session->userdata('tipo') == 5){
                $order = '';
            }else{
                $order = 'ORDER BY tbl_usuarios.nombres ASC';
            }
            $query = $this->db->query("SELECT tbl_empresas.empresa, tbl_contratistas.nombre_comercial,tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion FROM tbl_usuarios LEFT JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos LEFT JOIN (SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios ON tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_contratos ON tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_contratistas ON tbl_contratistas.idtbl_contratistas = tbl_usuarios.tbl_contratistas_idtbl_contratistas LEFT JOIN ctl_contratos ON ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos LEFT JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas WHERE tbl_usuarios.tipo = '$tipo' AND tbl_usuarios.tbl_contratistas_idtbl_contratistas = $contratista AND tbl_usuarios.estatus = $estatus $where $string AND ((CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%' OR CONCAT(tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno,' ',tbl_usuarios.nombres) LIKE '%$buscar%') OR tbl_usuarios.uid LIKE '%$buscar%' OR tbl_contratistas.nombre_comercial LIKE '%$buscar%' OR tbl_empresas.empresa LIKE '%$buscar%' OR tbl_departamentos.departamento LIKE '%$buscar%' OR tbl_perfiles.perfil LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_usuarios.fecha_nacimiento LIKE '%$buscar%' OR tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%') $order " . $limit);
            return $query->result();
        }
    }

    public function todos_los_users()
    {
            $query = $this->db->query("SELECT tbl_users.* FROM tbl_users WHERE tbl_users.estatus = 1 AND tbl_users.idtbl_users != 1 ORDER BY tbl_users.nombre ASC ");
            return $query->result();
        
    }

    public function getPersonalCuadrilla($buscar='', $inicio = false, $cantidadRegistro = false)
    {
            $limit = '';
            $where = '';
            if ($inicio !== false && $cantidadRegistro !== false) {
                $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
            }
            
            $string = '';
            $cuadrilla = $this->input->post('id');
            
            $order = 'ORDER BY tbl_usuarios.nombres ASC';
           
            $query = $this->db->query("SELECT tbl_usuarios.*, tbl_usuarios_cuadrillas.idtbl_usuarios_cuadrillas, tbl_usuarios_cuadrillas.puesto, tbl_perfiles.perfil FROM tbl_usuarios_cuadrillas LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios=tbl_usuarios_cuadrillas.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_perfiles.idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles LEFT JOIN tbl_cuadrillas ON tbl_cuadrillas.idtbl_cuadrillas=tbl_usuarios_cuadrillas.tbl_cuadrillas_idtbl_cuadrillas WHERE tbl_cuadrillas.idtbl_cuadrillas = '$cuadrilla' AND tbl_usuarios.estatus = 1  AND ((CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%' OR CONCAT(tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno,' ',tbl_usuarios.nombres) LIKE '%$buscar%') OR tbl_usuarios.uid LIKE '%$buscar%' OR tbl_usuarios.fecha_nacimiento LIKE '%$buscar%' OR tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%') $order ");
            return $query->result();
        
    }

    public function getPersonalCuadrillaLider($buscar='', $inicio = false, $cantidadRegistro = false)
    {
            $limit = '';
            $where = '';
            if ($inicio !== false && $cantidadRegistro !== false) {
                $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
            }
            
            $string = '';
            $lider = $this->input->post('id');
            
            $order = 'ORDER BY tbl_usuarios.nombres ASC';
           
            $query = $this->db->query("SELECT tbl_users.*, tbl_usuarios.*, tbl_usuarios_cuadrillas.idtbl_usuarios_cuadrillas, tbl_usuarios_cuadrillas.puesto, tbl_perfiles.perfil FROM tbl_usuarios_cuadrillas LEFT JOIN tbl_usuarios ON tbl_usuarios.idtbl_usuarios=tbl_usuarios_cuadrillas.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_perfiles.idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles LEFT JOIN tbl_users ON tbl_users.tbl_usuarios_idtbl_usuarios = tbl_usuarios.idtbl_usuarios JOIN tbl_cuadrillas ON tbl_cuadrillas.idtbl_cuadrillas=tbl_usuarios_cuadrillas.tbl_cuadrillas_idtbl_cuadrillas WHERE tbl_usuarios_cuadrillas.tbl_cuadrillas_idtbl_cuadrillas = $lider AND tbl_usuarios_cuadrillas.puesto != 'Lider' AND tbl_usuarios.estatus = 1  AND ((CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%' OR CONCAT(tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno,' ',tbl_usuarios.nombres) LIKE '%$buscar%') OR tbl_usuarios.uid LIKE '%$buscar%' OR tbl_usuarios.fecha_nacimiento LIKE '%$buscar%' OR tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%') $order ");
            return $query->result();
        
    }

    public function liderCuadrilla()
    {
            
            $id_usuario = $this->session->userdata('id_usuario');
                       
            $query = $this->db->query("SELECT tbl_usuarios_cuadrillas.tbl_cuadrillas_idtbl_cuadrillas FROM tbl_usuarios_cuadrillas WHERE tbl_usuarios_cuadrillas.tbl_usuarios_idtbl_usuarios = $id_usuario AND tbl_usuarios_cuadrillas.puesto = 'Lider' ");
            if ($query->num_rows() > 0) {
                return $query->result()[0]->tbl_cuadrillas_idtbl_cuadrillas;
            }else{
                return false;
            }
        
    }

    public function todos_los_usuarios_sin_tipo($pago='', $buscar='', $inicio = false, $cantidadRegistro = false)
    {
        if ($this->session->userdata('tipo') == 15) {
            $query = $this->db->query("SELECT * FROM `tbl_usuarios` WHERE CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Victor Manuel Hernandez Jimenez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Carlos Vazquez Romero%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Ignacio Montes Cruz%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Jose Luis Gomez Avelar%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Alejandro Pulido Martinez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Carlos Hugo Castañeda Martinez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Severo Ceron Lopez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Carlos Hugo Castañeda Martinez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%ELADIO ROA ESQUIVEL%'");
            return $query->result();
        } else {
            $limit = '';
            $where = '';
            if ($inicio !== false && $cantidadRegistro !== false) {
                $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
            }
            if ($pago != '' || $pago != null) {
                $where = "AND tbl_usuarios.pago LIKE '%$pago%'";
            }
            $string = '';
            if($this->session->userdata('id') == 122) {
                $ids = array(2160,1367,1437,127,2181,114,2159,22,242,2206,117,1372,1330,1444,207,1428,169,241,113,204,46,83);
                $string = ' AND tbl_usuarios.idtbl_usuarios IN(2160,1367,1437,127,2181,114,2159,22,242,2206,117,1372,1330,1444,207,1428,169,241,113,204,46,83) ';
            }
            if($this->session->userdata('tipo') == 5){
                $order = '';
            }else{
                $order = 'ORDER BY tbl_usuarios.nombres ASC';
            }
            $query = $this->db->query("SELECT tbl_empresas.empresa, tbl_contratistas.nombre_comercial,tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion FROM tbl_usuarios LEFT JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos LEFT JOIN (SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios ON tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_contratos ON tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_contratistas ON tbl_contratistas.idtbl_contratistas = tbl_usuarios.tbl_contratistas_idtbl_contratistas LEFT JOIN ctl_contratos ON ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos LEFT JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas WHERE tbl_usuarios.estatus = 1 $where $string AND ((CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%' OR CONCAT(tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno,' ',tbl_usuarios.nombres) LIKE '%$buscar%') OR tbl_usuarios.uid LIKE '%$buscar%' OR tbl_contratistas.nombre_comercial LIKE '%$buscar%' OR tbl_empresas.empresa LIKE '%$buscar%' OR tbl_departamentos.departamento LIKE '%$buscar%' OR tbl_perfiles.perfil LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_usuarios.fecha_nacimiento LIKE '%$buscar%' OR tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%') $order " . $limit);
            return $query->result();
        }
    }

    public function todos_los_supervisores($tipo='', $pago='', $buscar='', $inicio = false, $cantidadRegistro = false)
    {
        if ($this->session->userdata('tipo') == 15) {
            $query = $this->db->query("SELECT * FROM `tbl_usuarios` WHERE CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Victor Manuel Hernandez Jimenez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Carlos Vazquez Romero%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Ignacio Montes Cruz%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Jose Luis Gomez Avelar%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Alejandro Pulido Martinez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Carlos Hugo Castañeda Martinez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Severo Ceron Lopez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%Carlos Hugo Castañeda Martinez%' OR CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%ELADIO ROA ESQUIVEL%'");
            return $query->result();
        } else {
            $limit = '';
            $where = '';
            if ($inicio !== false && $cantidadRegistro !== false) {
                $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
            }
            if ($pago != '' || $pago != null) {
                $where = "AND tbl_usuarios.pago LIKE '%$pago%'";
            }
            $string = '';
            if($this->session->userdata('id') == 122) {
                $ids = array(2160,1367,1437,127,2181,114,2159,22,242,2206,117,1372,1330,1444,207,1428,169,241,113,204,46,83);
                $string = ' AND tbl_usuarios.idtbl_usuarios IN(2160,1367,1437,127,2181,114,2159,22,242,2206,117,1372,1330,1444,207,1428,169,241,113,204,46,83) ';
            }
            if($this->session->userdata('tipo') == 5){
                $order = '';
            }else{
                $order = 'ORDER BY tbl_usuarios.nombres ASC';
            }
            $query = $this->db->query("SELECT tbl_empresas.empresa, tbl_contratistas.nombre_comercial,tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion, tbl_users.* FROM tbl_usuarios LEFT JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles LEFT JOIN tbl_users ON tbl_users.tbl_usuarios_idtbl_usuarios = tbl_usuarios.idtbl_usuarios LEFT JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos LEFT JOIN (SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios ON tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_contratos ON tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_contratistas ON tbl_contratistas.idtbl_contratistas = tbl_usuarios.tbl_contratistas_idtbl_contratistas LEFT JOIN ctl_contratos ON ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos LEFT JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas WHERE tbl_usuarios.tipo = '$tipo' AND tbl_users.tipo = 9 AND tbl_usuarios.estatus = 1 $where $string AND ((CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%' OR CONCAT(tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno,' ',tbl_usuarios.nombres) LIKE '%$buscar%') OR tbl_usuarios.uid LIKE '%$buscar%' OR tbl_contratistas.nombre_comercial LIKE '%$buscar%' OR tbl_empresas.empresa LIKE '%$buscar%' OR tbl_departamentos.departamento LIKE '%$buscar%' OR tbl_perfiles.perfil LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_usuarios.fecha_nacimiento LIKE '%$buscar%' OR tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%') $order " . $limit);
            return $query->result();
        }
    }

    //Función para obtener los usuarios a los que se le ha hecho una solicitud
    public function personal_asignacion($buscar='', $inicio = false, $cantidadRegistro = false)
    {
            $autor = $this->session->userdata('id');
            $limit = '';            
            if ($inicio !== false && $cantidadRegistro !== false) {
                $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
            }                                 
            if($this->session->userdata('tipo') == 5){
                $order = '';
            }else{
                $order = 'ORDER BY tbl_usuarios.nombres ASC';
            }
            //$query = $this->db->query("SELECT tbl_empresas.empresa, tbl_contratistas.nombre_comercial,tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion FROM tbl_usuarios LEFT JOIN tbl_solicitud_material ON tbl_usuarios.idtbl_usuarios = tbl_solicitud_material.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos LEFT JOIN (SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios ON tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_contratos ON tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_contratistas ON tbl_contratistas.idtbl_contratistas = tbl_usuarios.tbl_contratistas_idtbl_contratistas LEFT JOIN ctl_contratos ON ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos LEFT JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas WHERE tbl_solicitud_material.tbl_users_idtbl_users_autor = $autor AND tbl_solicitud_material.estatus_solicitud = 'S' AND tbl_usuarios.estatus = 1 AND ((CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%' OR CONCAT(tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno,' ',tbl_usuarios.nombres) LIKE '%$buscar%') OR tbl_usuarios.uid LIKE '%$buscar%' OR tbl_contratistas.nombre_comercial LIKE '%$buscar%' OR tbl_empresas.empresa LIKE '%$buscar%' OR tbl_departamentos.departamento LIKE '%$buscar%' OR tbl_perfiles.perfil LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_usuarios.fecha_nacimiento LIKE '%$buscar%' OR tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%') GROUP BY tbl_solicitud_material.tbl_usuarios_idtbl_usuarios $order " . $limit);
            $query = $this->db->query("SELECT tbl_empresas.empresa, tbl_contratistas.nombre_comercial,tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion FROM tbl_usuarios LEFT JOIN tbl_solicitud_material ON tbl_usuarios.idtbl_usuarios = tbl_solicitud_material.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos LEFT JOIN (SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios ON tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_contratos ON tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_contratistas ON tbl_contratistas.idtbl_contratistas = tbl_usuarios.tbl_contratistas_idtbl_contratistas LEFT JOIN ctl_contratos ON ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos LEFT JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas WHERE tbl_usuarios.estatus = 1 AND (tbl_departamentos.idtbl_departamentos = 15 OR tbl_departamentos.idtbl_departamentos = 48 OR tbl_departamentos.idtbl_departamentos = 47) AND ((CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%' OR CONCAT(tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno,' ',tbl_usuarios.nombres) LIKE '%$buscar%') OR tbl_usuarios.uid LIKE '%$buscar%' OR tbl_contratistas.nombre_comercial LIKE '%$buscar%' OR tbl_empresas.empresa LIKE '%$buscar%' OR tbl_departamentos.departamento LIKE '%$buscar%' OR tbl_perfiles.perfil LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_usuarios.fecha_nacimiento LIKE '%$buscar%' OR tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%') GROUP BY tbl_solicitud_material.tbl_usuarios_idtbl_usuarios $order " . $limit);
            return $query->result();
        
    }         

    //Trae todas las actas administratias que se han hecho
    public function totalActas(){
        $query = $this->db->query("SELECT tbl_actas.idtbl_actas AS id_acta, tbl_actas.uid, tbl_actas.motivo, tbl_actas.detalle, DATE_FORMAT(fecha, '%d - %m - %Y') AS fecha_creacion, tbl_usuarios.nombres AS nombre_acreedor, tbl_usuarios.apellido_paterno AS paterno_acreedor, tbl_usuarios.apellido_materno AS materno_acreedor, tbl_users.nombre AS creador, tbl_actas.estatus FROM tbl_actas INNER JOIN tbl_usuarios ON tbl_actas.tbl_usuarios_idtbl_usuarios_acreedor = tbl_usuarios.idtbl_usuarios INNER JOIN tbl_users ON tbl_actas.tbl_users_idtbl_users = tbl_users.idtbl_users ORDER BY idtbl_actas DESC");
        return $query->result();
    }

    public function mis_solicitudes_actas($buscar = '', $inicio = false, $cantidadRegistro = false) {
        $user = $this->session->userdata('id');
		$limit = '';
		if($inicio !== false && $cantidadRegistro !== false) {
			$limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
		}

    if($this->session->userdata('tipo') == 5){
		  $query = $this->db->query("SELECT tbl_actas.idtbl_actas AS id_acta, tbl_actas.uid, tbl_actas.motivo, tbl_actas.detalle, DATE_FORMAT(fecha, '%d - %m - %Y') AS fecha_creacion, CONCAT(tbl_usuarios.nombres, ' ', tbl_usuarios.apellido_paterno, ' ', tbl_usuarios.apellido_materno) AS acreedor, tbl_users.nombre AS creador, tbl_actas.estatus FROM tbl_actas INNER JOIN tbl_usuarios ON tbl_actas.tbl_usuarios_idtbl_usuarios_acreedor = tbl_usuarios.idtbl_usuarios INNER JOIN tbl_users ON tbl_actas.tbl_users_idtbl_users = tbl_users.idtbl_users AND (tbl_users.nombre LIKE '%$buscar%' OR tbl_usuarios.nombres LIKE '%$buscar%' OR tbl_actas.fecha LIKE '%$buscar%') ORDER BY idtbl_actas DESC " . $limit);
    }else{
        $query = $this->db->query("SELECT tbl_actas.idtbl_actas AS id_acta, tbl_actas.uid, tbl_actas.motivo, tbl_actas.detalle, DATE_FORMAT(fecha, '%d - %m - %Y') AS fecha_creacion, CONCAT(tbl_usuarios.nombres, ' ', tbl_usuarios.apellido_paterno, ' ', tbl_usuarios.apellido_materno) AS acreedor, tbl_usuarios.apellido_paterno AS paterno_acreedor, tbl_usuarios.apellido_materno AS materno_acreedor, tbl_users.nombre AS creador, tbl_actas.estatus FROM tbl_actas INNER JOIN tbl_usuarios ON tbl_actas.tbl_usuarios_idtbl_usuarios_acreedor = tbl_usuarios.idtbl_usuarios INNER JOIN tbl_users ON tbl_actas.tbl_users_idtbl_users = tbl_users.idtbl_users WHERE tbl_users_idtbl_users=$user AND (tbl_usuarios.nombres LIKE '%$buscar%' OR tbl_actas.fecha LIKE '%$buscar%') ORDER BY idtbl_actas DESC " . $limit);
    }	
		return $query->result();
	}

    public function detalle_solicitud($uid) {
                
        $query = $this->db->query("SELECT tbl_actas.uid, tbl_actas.detalle, tbl_actas.motivo, tbl_actas.imagenes_firmas, tbl_actas.imagenes_firmas_rh, tbl_actas.estatus, DATE_FORMAT(tbl_actas.fecha, '%d - %m - %Y') AS fecha, CONCAT(tbl_usuarios.nombres, ' ', tbl_usuarios.apellido_paterno, ' ', tbl_usuarios.apellido_materno) AS acreedor, tbl_users.nombre AS realizo, firma.nombre AS firmo FROM tbl_actas LEFT JOIN tbl_usuarios ON tbl_actas.tbl_usuarios_idtbl_usuarios_acreedor = tbl_usuarios.idtbl_usuarios LEFT JOIN tbl_users AS firma ON tbl_actas.tbl_users_idtbl_users_rh = firma.idtbl_users LEFT JOIN tbl_users ON tbl_actas.tbl_users_idtbl_users = tbl_users.idtbl_users WHERE tbl_actas.uid= '$uid'");                
		return $query->result_array();
	}
    
 

    //Trae todo el personal activo
    public function personal()
    {
        $query = $this->db->query("SELECT idtbl_usuarios, nombres, apellido_paterno, apellido_materno FROM tbl_usuarios WHERE estatus=1 ORDER BY nombres ASC");
        return $query->result();
    }

    //Manda el formulario lleno de solicitud de acta, se guarda 
    public function nueva_solicitud($parametros) {
        if ($this->db->insert('tbl_actas', $parametros)) {
            return true;
        } else {
            return false;
        }       
      }

      //Función para aprobar actas
    public function aprobar_actas() {                     
        $data = array(
            'estatus' => 'aprobada',
            'tbl_users_idtbl_users_rh' => $this->session->userdata('id')
        );                                
        $this->db->set();
        if ($this->db->update('tbl_actas', $data)){
            return true;
        } else {
            return false;
        }
        }            

    public function cancelar_acta(){
        $data = array(
            'estatus' => 'cancelada',
            'tbl_users_idtbl_users_rh' => $this->session->userdata('id')             
        ); 
        $this->db->set();
        $this->db->where('uid', $this->input->post('uid'));
        if ($this->db->update('tbl_actas', $data)) {
               return true;               
    } else {
        return false;
    }                        
    }

    public function todos_los_usuarios_reporte()
    {
        if (!isset($_POST['acta_administrativa'])) {
            $this->db->select('tbl_usuarios.*, tbl_departamentos.departamento AS nombre_departamento, tbl_empresas.empresa, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion,tbl_contratistas.nombre_comercial');
            $this->db->select('tbl_usuarios.idtbl_usuarios as id_db');
            $this->db->select('tbl_municipio.nombre_municipio');
            $this->db->select('tbl_entidad.nombre_entidad');
            $this->db->select('ctl_escolaridad.escolaridad');
            $this->db->select('tbl_alta_baja.fecha as fecha_baja');
            $this->db->select('tbl_alta_baja.motivo');
            $this->db->select('SUM(tbl_vacaciones_permisos.dias) as dias_tomados');
            $this->db->select('ctl_establecimientos.establecimiento as nombre_establecimiento');
            $this->db->select('tbl_perfiles.perfil as nombre_perfil');
            if (isset($_POST['tipo_baja']) && ($this->input->post('tipo_baja') == 'Renuncia voluntaria')) {
                $this->db->select('tbl_encuestas_baja.*');
            }
            $this->db->from('tbl_usuarios');
            $this->db->join('tbl_perfiles', 'tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles', 'left');
            $this->db->join('tbl_departamentos', 'tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos', 'left');
            $this->db->join('(SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios', 'tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios', 'left');
            $this->db->join('tbl_contratos', 'tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos', 'left');
            $this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos', 'left');
            $this->db->join('tbl_contratistas', 'tbl_contratistas.idtbl_contratistas = tbl_usuarios.tbl_contratistas_idtbl_contratistas', 'left');
            $this->db->join('tbl_municipio', 'tbl_usuarios.tbl_municipio_idtbl_municipio = tbl_municipio.idtbl_municipio', 'left');
            $this->db->join('tbl_entidad', 'tbl_entidad.idtbl_entidad = tbl_municipio.tbl_entidad_idtbl_entidad', 'left');
            $this->db->join('ctl_escolaridad', 'ctl_escolaridad.idctl_escolaridad = tbl_usuarios.ctl_escolaridad_idctl_escolaridad', 'left');
            $this->db->join('tbl_alta_baja', 'tbl_alta_baja.tbl_usuarios_idtbl_usuarios = tbl_usuarios.idtbl_usuarios AND tbl_alta_baja.tipo="baja"', 'left');
            $this->db->join('ctl_contratos', 'ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos', 'left');
            $this->db->join('tbl_empresas', 'tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas', 'left');
            $this->db->join('tbl_vacaciones_permisos', 'tbl_vacaciones_permisos.tbl_usuarios_idtbl_usuarios_beneficiario = tbl_usuarios.idtbl_usuarios AND tbl_vacaciones_permisos.tipo = "vacaciones" AND tbl_vacaciones_permisos.estatus=1', 'left');
            $this->db->join('ctl_establecimientos', 'ctl_establecimientos.idctl_establecimiento = tbl_usuarios.establecimiento', 'left');
            if (isset($_POST['tipo_baja']) && ($this->input->post('tipo_baja') == 'Renuncia voluntaria')) {
                $this->db->join('tbl_encuestas_baja', 'tbl_encuestas_baja.tbl_alta_baja_idtbl_alta_baja = tbl_alta_baja.idtbl_alta_baja', 'left');
            }
            if(isset($_POST['establecimiento']) && $this->input->post('establecimiento') != ''){
                $this->db->where('ctl_establecimientos.idctl_establecimiento', $this->input->post('establecimiento'));
            }
            if(isset($_POST['departamento']) && $this->input->post('departamento') != ''){
                $this->db->where('tbl_departamentos.idtbl_departamentos', $this->input->post('departamento'));
            }
            if(isset($_POST['perfil']) && $this->input->post('perfil') != ''){
                $this->db->where('tbl_perfiles.idtbl_perfiles', $this->input->post('perfil'));
            }
            if(isset($_POST['tipo_baja']) && $this->input->post('tipo_baja') != ''){
                $this->db->where('tbl_alta_baja.tipo_baja', $this->input->post('tipo_baja'));
            }
            if($this->input->post('tipo_empleado') == 'cumple'){
                if($this->input->post('tipo_cumple') == 'dia'){
                    $this->db->where('MONTH(tbl_usuarios.fecha_nacimiento)', date('m'));
                    $this->db->where('DAY(tbl_usuarios.fecha_nacimiento)', date('d'));
                }else{
                    $this->db->where('MONTH(tbl_usuarios.fecha_nacimiento)', $this->input->post('mes_cumple'));
                    $this->db->order_by('DAY(tbl_usuarios.fecha_nacimiento)', 'asc');
                }
                $this->db->where('tbl_usuarios.tipo', 'interno');
            }
            if($this->input->post('tipo_empleado') != 'cumple'){
                $this->db->where('tbl_usuarios.tipo', $this->input->post('tipo_empleado'));
            }
            $this->db->where('tbl_usuarios.estatus', $this->input->post('estatus_empleado'));
            $this->db->group_by('tbl_usuarios.idtbl_usuarios');
            $query= $this->db->get();
            $result = [];
            foreach ($query->result_array() as $row) {
                $result[]=$row;
            }
            return $result;
        }
        if (isset($_POST['acta_administrativa'])) {
            $this->db->select('tbl_usuarios.*, tbl_departamentos.departamento AS nombre_departamento, tbl_empresas.empresa, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion,tbl_contratistas.nombre_comercial, tbl_actas.detalle, tbl_actas.fecha as fecha_acta_administrativa');
            $this->db->select('tbl_usuarios.idtbl_usuarios as id_db');
            $this->db->select('tbl_municipio.nombre_municipio');
            $this->db->select('tbl_entidad.nombre_entidad');
            $this->db->select('ctl_escolaridad.escolaridad');
            $this->db->select('tbl_alta_baja.fecha as fecha_baja');
            $this->db->select('tbl_alta_baja.motivo');
            $this->db->select('ctl_establecimientos.establecimiento as nombre_establecimiento');
            if (isset($_POST['tipo_baja']) && ($this->input->post('tipo_baja') == 'Renuncia voluntaria')) {
                $this->db->select('tbl_encuestas_baja.*');
            }
            $this->db->from('tbl_usuarios');
            $this->db->join('tbl_perfiles', 'tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles', 'left');
            $this->db->join('tbl_departamentos', 'tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos', 'left');
            $this->db->join('(SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios', 'tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios', 'left');
            $this->db->join('tbl_contratos', 'tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos', 'left');
            $this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos', 'left');
            $this->db->join('tbl_contratistas', 'tbl_contratistas.idtbl_contratistas = tbl_usuarios.tbl_contratistas_idtbl_contratistas', 'left');
            $this->db->join('tbl_municipio', 'tbl_usuarios.tbl_municipio_idtbl_municipio = tbl_municipio.idtbl_municipio', 'left');
            $this->db->join('tbl_entidad', 'tbl_entidad.idtbl_entidad = tbl_municipio.tbl_entidad_idtbl_entidad', 'left');
            $this->db->join('ctl_escolaridad', 'ctl_escolaridad.idctl_escolaridad = tbl_usuarios.ctl_escolaridad_idctl_escolaridad', 'left');
            $this->db->join('tbl_alta_baja', 'tbl_alta_baja.tbl_usuarios_idtbl_usuarios = tbl_usuarios.idtbl_usuarios AND tbl_alta_baja.tipo="baja"', 'left');
            $this->db->join('tbl_actas', 'tbl_usuarios.idtbl_usuarios=tbl_actas.tbl_usuarios_idtbl_usuarios_acreedor', 'inner');            
            $this->db->join('ctl_contratos', 'ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos', 'left');
            $this->db->join('tbl_empresas', 'tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas', 'left');
            $this->db->join('ctl_establecimientos', 'ctl_establecimientos.idctl_establecimiento = tbl_usuarios.establecimiento', 'left');
            if (isset($_POST['tipo_baja']) && ($this->input->post('tipo_baja') == 'Renuncia voluntaria')) {
                $this->db->join('tbl_encuestas_baja', 'tbl_encuestas_baja.tbl_alta_baja_idtbl_alta_baja = tbl_alta_baja.idtbl_alta_baja', 'left');
            }
            if(isset($_POST['establecimiento']) && $this->input->post('establecimiento') != ''){
                $this->db->where('ctl_establecimientos.idctl_establecimiento', $this->input->post('establecimiento'));
            }
            if(isset($_POST['departamento']) && $this->input->post('departamento') != ''){
                $this->db->where('tbl_departamentos.idtbl_departamentos', $this->input->post('departamento'));
            }
            if(isset($_POST['perfil']) && $this->input->post('perfil') != ''){
                $this->db->where('tbl_perfiles.idtbl_perfiles', $this->input->post('perfil'));
            }
            if(isset($_POST['tipo_baja']) && $this->input->post('tipo_baja') != ''){
                $this->db->where('tbl_alta_baja.tipo_baja', $this->input->post('tipo_baja'));
            }
            $this->db->where('tbl_usuarios.tipo', $this->input->post('tipo_empleado'));
            $this->db->where('tbl_usuarios.estatus', $this->input->post('estatus_empleado'));
            $query= $this->db->get();
            $result = [];
            foreach ($query->result_array() as $row) {
                $result[]=$row;
            }
            return $result;
        }
    }

    public function todos_los_usuarios_almacen($id="")
    {
        $this->db->select('tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion');
        $this->db->from('tbl_usuarios');
        $this->db->join('tbl_perfiles', 'tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles', 'left');
        $this->db->join('tbl_departamentos', 'tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos', 'left');
        $this->db->join('(SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios', 'tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios', 'left');
        $this->db->join('tbl_contratos', 'tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos', 'left');
        $this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos', 'left');
        $this->db->where('tbl_usuarios.almacen', 1);
        $this->db->where('tbl_usuarios.estatus', 1);
        $query= $this->db->get();
        return $query->result();
    }

    public function persona_autorizacion()
    {
        // Muestra todos
        if (($this->session->userdata('tipo') == 9 && $this->session->userdata('permiso_autorizar') != 'si') || ($this->session->userdata('tipo') == 9 && $this->session->userdata('permiso_autorizar') == 'si') ||($this->session->userdata('tipo') == 12 && $this->session->userdata('permiso_autorizar') == 'si') || ($this->session->userdata('tipo') == 15 && $this->session->userdata('permiso_autorizar') != 'si') || ($this->session->userdata('tipo') == 10 && $this->session->userdata('permiso_autorizar') == 'si') || ($this->session->userdata('tipo') == 5 && $this->session->userdata('permiso_autorizar') != 'si') || ($this->session->userdata('tipo') == 8 && $this->session->userdata('permiso_autorizar') == 'si') || ($this->session->userdata('tipo') == 17 && $this->session->userdata('permiso_autorizar') == 'si') || ($this->session->userdata('tipo') == 17 && $this->session->userdata('permiso_autorizar') != 'si') || ($this->session->userdata('tipo') == 3 && $this->session->userdata('permiso_autorizar') != 'si') || ($this->session->userdata('tipo') == 19 && $this->session->userdata('permiso_autorizar') != 'si')) {
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 9 OR tipo = 1  OR tipo = 12 OR tipo = 17 OR tipo = 10 OR tipo = 3 OR tipo = 19)");
        }
        elseif($this->session->userdata('tipo') == 2 && $this->session->userdata('permiso_autorizar') == 'si'){
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND tipo = 2");
        }
        elseif($this->session->userdata('tipo') == 11 && $this->session->userdata('permiso_autorizar') == 'si'){
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND tipo = 11");
        }
        // muestra arturo unicamente
        elseif (($this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 4) && $this->session->userdata('permiso_autorizar') == 'si') {
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 12 OR idtbl_users = " . $this->session->userdata('id').")");
        }
        // muestra ingrid unicamente
        elseif ($this->session->userdata('tipo') == 1 && $this->session->userdata('permiso_autorizar') == 'si') {
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND idtbl_users = " . $this->session->userdata('id'));
        }
        // muestra todos los tipo 1
        elseif ($this->session->userdata('tipo') == 1 && $this->session->userdata('permiso_autorizar') != 'si') {
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND tipo = 1");
        }
        elseif ($this->session->userdata('tipo') == 3 && $this->session->userdata('permiso_autorizar') == 'si'){
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND tipo = 3");
        }
        return $query->result();
    }

    //Traer usuarios que autorizan solicitudes de AG y AC
    public function persona_autorizacion_AG()
    {
        if($this->session->userdata('permiso_autorizar') == 'si' && $this->session->userdata('tipo') != 9){
            if($this->session->userdata('tipo') == 10){
                $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 17 OR tipo = 19 OR tipo = 12) AND estatus = 1");
            }elseif($this->session->userdata('id') == 108){
                $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 17 OR tipo = 19 OR tipo = 12) AND estatus = 1");
            }else{
                $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 12 OR idtbl_users = " . $this->session->userdata('id') . ")");
            }
        }else{
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 17 OR tipo = 19 OR tipo = 12 OR tipo = 20 OR idtbl_users = 3) AND estatus = 1");
        }
        return $query->result();
    }

    //Traer usuarios que autorizan solicitudes de Sistemas
    public function persona_autorizacion_Sistemas()
    {
        if($this->session->userdata('permiso_autorizar') == 'si' && $this->session->userdata('tipo') != 9){
            if($this->session->userdata('tipo') == 10){
                $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 17 OR tipo = 19 OR tipo = 12) AND estatus = 1");
            }else{
                $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 12 OR idtbl_users = " . $this->session->userdata('id') . ")");
            }
        }else{
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 17 OR tipo = 19 OR tipo = 12 OR idtbl_users = 3) AND estatus = 1");
        }
        return $query->result();
    }

    //Traer usuarios que autorizan solicitudes de CV y refacciones
    public function persona_autorizacion_CV()
    {
        if($this->session->userdata('permiso_autorizar') == 'si' && $this->session->userdata('tipo') != 9){
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (tipo = 12 OR idtbl_users = " . $this->session->userdata('id') . ")");
        }else{
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND tipo = 3 AND estatus = 1");
        }
        return $query->result();
    }

    public function persona_autorizacion_seguridad()
    {
        if ($this->session->userdata('tipo') == 10 && $this->session->userdata('permiso_autorizar') == 'si') {
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND idtbl_users = " . $this->session->userdata('id'));
        } else {
            $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND tipo = 10");
        }
        return $query->result();
    }

    public function persona_autorizacion_kuali()
    {
        $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND (idtbl_users = 369 OR idtbl_users = 34 OR idtbl_users = 107 OR idtbl_users = 71  OR idtbl_users = 473)");
        return $query->result();
    }

    //Función para traer todos los users tipo desarrollador web
    public function desarrolladores()
    {
        $query = $this->db->query("SELECT * FROM tbl_users WHERE tipo = 20 AND estatus = 1");
        return $query->result();
    }

    public function persona_autorizacion_medica()
    {
        $query = $this->db->query("SELECT * FROM tbl_users WHERE permiso_autorizar='si' AND tipo = 14");
        return $query->result();
    }
    
    public function personal_contratista($id)
    {
        $this->db->select('tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto,tbl_contratos.tipo as tipo_contrato, tbl_contratos.fecha_inicio, tbl_contratos.duracion');
        $this->db->from('tbl_usuarios');
        $this->db->join('tbl_perfiles', 'tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles', 'left');
        $this->db->join('tbl_departamentos', 'tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos', 'left');
        $this->db->join('(SELECT MAX(tbl_contratos_idtbl_contratos) as tbl_contratos_idtbl_contratos,tbl_usuarios_idtbl_usuarios FROM dtl_contratos_usuarios GROUP BY tbl_usuarios_idtbl_usuarios) as _dtl_contratos_usuarios', 'tbl_usuarios.idtbl_usuarios=_dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios', 'left');
        $this->db->join('tbl_contratos', 'tbl_contratos.idtbl_contratos=_dtl_contratos_usuarios.tbl_contratos_idtbl_contratos', 'left');
        $this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos', 'left');
        $this->db->where('tbl_usuarios.tbl_contratistas_idtbl_contratistas', $id);
        //$this->db->where('tbl_usuarios.almacen', 1);
        //$this->db->where('tbl_usuarios.estatus', 1);
        $query= $this->db->get();
        return $query->result();
    }

    //Obtiene el personal por estatus
    public function personal_estatus($estatus)
    {
        $this->db->select('tbl_usuarios.*');
        $this->db->from('tbl_usuarios');                
        $this->db->where('tbl_usuarios.estatus', $estatus);
        //$this->db->where('tbl_usuarios.almacen', 1);
        //$this->db->where('tbl_usuarios.estatus', 1);
        $query= $this->db->get();
        return $query->result();
    }

    public function todos_los_usuarios_baja($tipo='', $buscar='', $inicio = false, $cantidadRegistro = false)
    {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("SELECT tbl_contratistas.nombre_comercial, tbl_usuarios.*, tbl_departamentos.departamento, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,tbl_proyectos.numero_proyecto, tbl_descuentos.total AS descuento_total FROM tbl_usuarios LEFT JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles LEFT JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos LEFT JOIN tbl_proyectos ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos LEFT JOIN tbl_descuentos ON tbl_descuentos.tbl_usuarios_idtbl_usuarios = tbl_usuarios.idtbl_usuarios LEFT JOIN tbl_contratistas ON tbl_contratistas.idtbl_contratistas = tbl_usuarios.tbl_contratistas_idtbl_contratistas WHERE tbl_usuarios.tipo = '$tipo' AND tbl_usuarios.estatus = 0 AND ((CONCAT(tbl_usuarios.nombres,' ',tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno) LIKE '%$buscar%' OR CONCAT(tbl_usuarios.apellido_paterno,' ',tbl_usuarios.apellido_materno,' ',tbl_usuarios.nombres) LIKE '%$buscar%') OR tbl_usuarios.uid LIKE '%$buscar%' OR tbl_contratistas.nombre_comercial LIKE '%$buscar%' OR tbl_departamentos.departamento LIKE '%$buscar%' OR tbl_perfiles.perfil LIKE '%$buscar%' OR tbl_proyectos.numero_proyecto LIKE '%$buscar%' OR tbl_usuarios.fecha_nacimiento LIKE '%$buscar%' OR tbl_usuarios.numero_empleado LIKE '%$buscar%' OR tbl_usuarios.numero_empleado_noi LIKE '%$buscar%')" . $limit);
        return $query->result();
    }
    public function detalle_usuario($uid)
    {
        $query = $this->db->query("
      SELECT tbl_usuarios.*,
      tbl_usuarios.idtbl_usuarios AS id_usuario,
      ctl_establecimientos.establecimiento as nombre_establecimiento,
      tbl_usuarios.fecha_creacion as fecha_creacion_usuario,
      tbl_perfiles.perfil, 
      tbl_perfiles.idtbl_perfiles,
      tbl_departamentos.*,
      tbl_areas.*,
      tbl_direcciones.*,
      tbl_municipio.*,
      tbl_entidad.*,
      tbl_contratos.idtbl_contratos,
      tbl_contratos.fecha_inicio,
      tbl_contratos.duracion,
      tbl_contratos.tipo as tipo_contrato,
      tbl_proyectos.nombre_proyecto,
      tbl_proyectos.numero_proyecto, 
      tbl_proyectos.uid as uid_proyecto,
      ctl_escolaridad.idctl_escolaridad,
      ctl_escolaridad.escolaridad, 
      ctl_contratos.*,
      tbl_empresas.idtbl_empresas,
      tbl_empresas.empresa,
      tbl_empresas.uid,
      tbl_empresas.domicilio,
      tbl_empresas.rfc as rfc_empresa,
      tbl_empresas.registro_patronal,
      tbl_empresas.actividad_empresa,
      tbl_empresas.domicilio_juridico,
      tbl_empresas.domicilio_tribunal_laboral,
      tbl_empresas.domicilio_centro_conciliacion_laboral,
      tbl_empresas.image as image_empresa
			FROM tbl_usuarios 
			LEFT JOIN tbl_perfiles 
			ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles
			LEFT JOIN tbl_departamentos 
			ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos
            LEFT JOIN tbl_areas
            ON tbl_areas.idtbl_areas=tbl_departamentos.tbl_areas_idtbl_areas
            LEFT JOIN tbl_direcciones
            ON tbl_direcciones.idtbl_direcciones=tbl_areas.tbl_direcciones_idtbl_direcciones
			LEFT JOIN tbl_municipio
			ON tbl_usuarios.tbl_municipio_idtbl_municipio = tbl_municipio.idtbl_municipio
			LEFT JOIN tbl_entidad
			ON tbl_entidad.idtbl_entidad = tbl_municipio.tbl_entidad_idtbl_entidad
			LEFT JOIN dtl_contratos_usuarios
			ON dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios = tbl_usuarios.idtbl_usuarios
			LEFT JOIN tbl_contratos
			ON tbl_contratos.idtbl_contratos = dtl_contratos_usuarios.tbl_contratos_idtbl_contratos
			LEFT JOIN tbl_proyectos
			ON tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos
			LEFT JOIN ctl_escolaridad
			ON ctl_escolaridad.idctl_escolaridad = tbl_usuarios.ctl_escolaridad_idctl_escolaridad
			LEFT JOIN ctl_contratos
			ON ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos
			LEFT JOIN tbl_empresas
			ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas
            LEFT JOIN ctl_establecimientos
            ON ctl_establecimientos.idctl_establecimiento = tbl_usuarios.establecimiento
			WHERE tbl_usuarios.uid='$uid'
			ORDER BY tbl_contratos.fecha_creacion DESC");//ctl_contratos
        return $query->result()[0];
    }
    public function detalle_contratista($id)
    {
        $this->db->where('uid', $id);
        $query = $this->db->get('tbl_contratistas');
        return $query->result()[0];
    }

    public function patrones()
    {
        $query = $this->db->query("
      SELECT *
      FROM tbl_empresas");
        return $query->result();
    }

    public function tipcontratos($id_patron)
    {
        $this->db->select('idctl_contratos as id, contrato');
        $this->db->where('tbl_empresas_idtbl_empresas', $id_patron);
        $query = $this->db->get('ctl_contratos');
        return $query->result();
    }

    public function certificados()
    {
        $query = $this->db->query("
			SELECT *
			FROM tbl_certificados");
        return $query->result();
    }

    public function documentos()
    {
        $query = $this->db->query("
			SELECT *
			FROM tbl_documentos");
        return $query->result();
    }

    public function contratistas($buscar, $inicio = false, $cantidadRegistro = false)
    {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("
			SELECT *
			FROM tbl_contratistas WHERE estatus='activo' AND (uid LIKE '$buscar%' OR razon_social LIKE '$buscar%' OR nombre_comercial LIKE '$buscar%' OR rfc LIKE '$buscar%' OR email LIKE '$buscar%' OR telefono LIKE '$buscar%' OR telefono_adicional LIKE '$buscar%' OR responsable LIKE '$buscar%' OR direccion LIKE '$buscar%' OR estatus LIKE '$buscar%') " . $limit);
        return $query->result();
    }

    public function contratistasInactivos($buscar, $inicio = false, $cantidadRegistro = false)
    {
        $limit = '';
        if ($inicio !== false && $cantidadRegistro !== false) {
            $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
        }
        $query = $this->db->query("
			SELECT *
			FROM tbl_contratistas WHERE (estatus='baja' OR estatus = 'pausa') AND (uid LIKE '$buscar%' OR razon_social LIKE '$buscar%' OR nombre_comercial LIKE '$buscar%' OR rfc LIKE '$buscar%' OR email LIKE '$buscar%' OR telefono LIKE '$buscar%' OR telefono_adicional LIKE '$buscar%' OR responsable LIKE '$buscar%' OR direccion LIKE '$buscar%' OR estatus LIKE '$buscar%') " . $limit);
        return $query->result();
    }

    public function contratistas_solicitudes()
    {
        $query = $this->db->query("
      SELECT *
      FROM tbl_contratistas");
        return $query->result();
    }

    public function guardar_contratista($uid, $contrato, $comprobante_domicilio, $ine, $d, $sat, $cv)
    {
        $insert = array(
            'razon_social' => $this->input->post('razon_social'),
            'rfc' => $this->input->post('rfc'),
            'nombre_comercial' => $this->input->post('nombre_comercial'),
            'email' => $this->input->post('email'),
            'telefono' => $this->input->post('telefono'),
            'telefono_adicional' => $this->input->post('telefono_2'),
            'responsable' => $this->input->post('responsable'),
            'direccion' => $this->input->post('direccion'),
            'uid'=> $uid,
      'estatus' => $this->input->post('estatus'),
      'contrato' => $contrato,
      'comprobante_domicilio' => $comprobante_domicilio,
      'ine' => $ine,
      'd' => $d,
      'sat' => $sat,
      'cv' => $cv
        );
        return $this->db->insert('tbl_contratistas', $insert);
    }

    public function actualizar_contratista($uid, $contrato, $comprobante_domicilio, $ine, $d, $sat, $cv)
    {
        $this->db->trans_start();
        if ($this->input->post('estatus') != 'activo') {
            $idContratista = $this->detalle_contratista($uid);
            $data = array(
        'almacen' => 0,
        'estatus' => 0
      );
            $this->db->where('tbl_contratistas_idtbl_contratistas ', $idContratista->idtbl_contratistas);
            $this->db->update('tbl_usuarios', $data);
        }
        $data = array(
            'razon_social' => $this->input->post('razon_social'),
            'rfc' => $this->input->post('rfc'),
            'nombre_comercial' => $this->input->post('nombre_comercial'),
            'email' => $this->input->post('email'),
            'telefono' => $this->input->post('telefono'),
            'telefono_adicional' => $this->input->post('telefono_2'),
            'responsable' => $this->input->post('responsable'),
            'direccion' => $this->input->post('direccion'),
      'estatus' => $this->input->post('estatus'),
      'contrato' => $contrato,
      'comprobante_domicilio' => $comprobante_domicilio,
      'ine' => $ine,
      'd' => $d,
      'sat' => $sat,
      'cv' => $cv
        );
        $this->db->where('uid', $this->input->post('uid'));
        $this->db->update('tbl_contratistas', $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function guardar_documento($uid, $idtbl_documentos = NULL, $uid_usuario = NULL)
    {
        $data = array(
          'tbl_documentos_idtbl_documentos' => $idtbl_documentos == NULL ? $this->input->post('id') : $idtbl_documentos,
          'tbl_usuarios_idtbl_usuarios' => $uid_usuario == NULL ? $this->id_usuario($this->input->post('uid_usuario')) : $this->id_usuario($uid_usuario),
          'uid' => $uid
        );
        return $this->db->insert('dtl_documentos_personal', $data);
    }
    /*Solo documentos o certificados*/
    public function eliminar($tipo, $uid)
    {
        $data = array(
            'estatus' => 0
        );
        $this->db->where('uid', $uid);
        $this->db->update('dtl_'.$tipo.'_personal', $data);
        return true;
    }
    public function cancelar_contrato()
    {
        $data = array(
            'estatus' => 0
        );
        $this->db->where('uid', $this->input->post('uid'));
        $this->db->update('tbl_contratos', $data);
        return true;
    }

    /*public function guardar_certificado($uid)
    {
        $data = array(
          'tbl_cursos_idtbl_cursos' => $this->input->post('idtbl_cursos'),
          'tbl_certificados_idtbl_certificados' => $this->input->post('id'),
          'tbl_usuarios_idtbl_usuarios' => $this->id_usuario($this->input->post('uid_usuario')),
          'uid' => $uid,
          'fecha_inicio' => $this->input->post('fecha_inicio'),
          'fecha_termino' => $this->input->post('fecha_termino'),
          'duracion' => $this->input->post('duracion'),
          'tutor' => $this->input->post('tutor'),
          'folio' => $this->input->post('folio')
        );
        return $this->db->insert('dtl_certificados_personal', $data);
    }*/
    public function guardar_certificado($uid, $parameters = NULL)
    {
        $id_certificado = $this->input->post('id');
        $query = $this->db->query("SELECT MAX(iddtl_certificados_personal) iddtl_certificado_personal FROM dtl_certificados_personal WHERE tbl_certificados_idtbl_certificados = $id_certificado");
        $last_id = $query->result()[0]->iddtl_certificado_personal;
        $consecutive = 1;
        if($last_id != NULL){
            $query = $this->db->query("SELECT folio FROM dtl_certificados_personal WHERE dtl_certificados_personal.iddtl_certificados_personal = $last_id");
            $folio = $query->result()[0]->folio;
            $consecutive  = intval(substr($folio, 2, strlen($folio))) + 1;
        }
        $query = $this->db->query("SELECT nomenclatura FROM tbl_certificados WHERE idtbl_certificados = $id_certificado");
        $nomenclatura = $query->result()[0]->nomenclatura;
        $data = NULL;
        if($parameters == NULL){
            $data = array(
              'tbl_cursos_idtbl_cursos' => $this->input->post('idtbl_cursos'),
              'tbl_certificados_idtbl_certificados' => $this->input->post('id'),
              'tbl_usuarios_idtbl_usuarios' => $this->id_usuario($this->input->post('uid_usuario')),
              'uid' => $uid,
              'fecha_inicio' => $this->input->post('fecha_inicio'),
              'fecha_termino' => $this->input->post('fecha_termino'),
              'duracion' => $this->input->post('duracion'),
              'tutor' => $this->input->post('tutor'),
              'patron_representante' => $this->input->post('patron_representante'),
              'representante_trabajadores' => $this->input->post('representante_trabajadores'),
              'folio' => $nomenclatura . $consecutive,
              'tbl_modalidad_idtbl_modalidad' => $this->input->post('modalidad'),
              'tbl_tipo_agente_idtbl_tipo_agente' => $this->input->post('tipo_agente')
            );
        }else{
            $parameters['uid'] = $uid;
            $data = $parameters;
        }
        return $this->db->insert('dtl_certificados_personal', $data);
    }
    public function editar_certificado(){
        $data = array(
            'tbl_cursos_idtbl_cursos' => $this->input->post('idtbl_cursos'),
            'tbl_certificados_idtbl_certificados' => $this->input->post('id'),
            'fecha_inicio' => $this->input->post('fecha_inicio'),
            'fecha_termino' => $this->input->post('fecha_termino'),
            'duracion' => $this->input->post('duracion'),
            'tutor' => $this->input->post('tutor'),
            'patron_representante' => $this->input->post('patron_representante'),
            'representante_trabajadores' => $this->input->post('representante_trabajadores')
            //'folio' => $this->input->post('folio')
        );
        $this->db->where("iddtl_certificados_personal", $this->input->post('iddtl_certificados_personal'));
        return $this->db->update("dtl_certificados_personal", $data);
    }

    public function reporte_dc3(){

        $this->db->select("tbl_usuarios.*, tbl_municipio.*, tbl_cursos.*, dtl_certificados_personal.*, DATE_FORMAT(fecha_inicio,'%d/%m/%Y') AS fecha_inicio_format, DATE_FORMAT(fecha_termino,'%d/%m/%Y') AS fecha_termino_format");
        $this->db->from("tbl_usuarios");
        $this->db->join("tbl_municipio", "tbl_municipio.idtbl_municipio = tbl_usuarios.tbl_municipio_idtbl_municipio", "left");
        $this->db->join("dtl_certificados_personal", "dtl_certificados_personal.tbl_usuarios_idtbl_usuarios = tbl_usuarios.idtbl_usuarios", "left");
        $this->db->join("tbl_cursos", "tbl_cursos.idtbl_cursos = dtl_certificados_personal.tbl_cursos_idtbl_cursos");
        $this->db->join("tbl_perfiles", "tbl_perfiles.idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles");
        $this->db->where("tbl_usuarios.estatus", 1);
        if((isset($_POST['fecha_inicio']) && $this->input->post('fecha_inicio') != '') && (isset($_POST['fecha_final']) && $this->input->post('fecha_final') != '')){
            $fechaInicio = $this->input->post('fecha_inicio');
            $fechaFinal= $this->input->post('fecha_final');
            $this->db->where("dtl_certificados_personal.fecha_inicio BETWEEN '$fechaInicio' AND '$fechaFinal'");
        }
        if(isset($_POST['departamento'])){
            $this->db->where("tbl_perfiles.tbl_departamentos_idtbl_departamentos", $this->input->post('departamento'));
        }

        $query = $this->db->get();

		return $query->result();
    }

    
	

    public function certificados_asignados($uid)
    {
        $id_usuario=$this->id_usuario($uid);
        $query = $this->db->query("
			SELECT *
			FROM dtl_certificados_personal 
			LEFT JOIN tbl_certificados
			ON dtl_certificados_personal.tbl_certificados_idtbl_certificados=tbl_certificados.idtbl_certificados
            LEFT JOIN tbl_cursos
            ON dtl_certificados_personal.tbl_cursos_idtbl_cursos=tbl_cursos.idtbl_cursos
			WHERE dtl_certificados_personal.tbl_usuarios_idtbl_usuarios='$id_usuario' AND estatus=1");
        
        return $query->result();
    }

    public function documentos_asignados($uid)
    {
        $id_usuario=$this->id_usuario($uid);
        $query = $this->db->query("
			SELECT *
			FROM dtl_documentos_personal 
			INNER JOIN tbl_documentos
			ON dtl_documentos_personal.tbl_documentos_idtbl_documentos=tbl_documentos.idtbl_documentos
			WHERE dtl_documentos_personal.tbl_usuarios_idtbl_usuarios='$id_usuario' AND estatus=1");
        
        return $query->result();
    }

    private function id_usuario($uid)
    {
        $query = $this->db->query("
			SELECT idtbl_usuarios
			FROM tbl_usuarios 
			WHERE tbl_usuarios.uid='$uid'");
        
        return $query->result()[0]->idtbl_usuarios;
    }

    /*public function asistencias($uid)
    {
        $id_usuario=$this->id_usuario($uid);
        $query = $this->db->query("
			SELECT
			    AAA.fecha_hora,
			    BBB.entrada,
			    BBB.salida
			FROM
			(
			SELECT CAST(DATE_ADD((DATE_SUB(DATE(NOW()), INTERVAL 31 DAY)), INTERVAL numbers.number DAY) AS DATE) AS fecha_hora
			
			FROM (
			select
			  @i := @i + 1 as number
			from
			  (select 0 union all select 1 union all select 2 union all
			   select 3 union all select 4 union all select 5 union all
			   select 6 union all select 7 union all select 8 union all select 9) as t0,
			  (select 0 union all select 1 union all select 2 union all
			   select 3 union all select 4 union all select 5 union all
			   select 6 union all select 7 union all select 8 union all select 9) as t1,
			  (select 0 union all select 1 union all select 2 union all
			   select 3 union all select 4 union all select 5 union all
			   select 6 union all select 7 union all select 8 union all select 9) as t2,
			  (select 0 union all select 1 union all select 2 union all
			   select 3 union all select 4 union all select 5 union all
			   select 6 union all select 7 union all select 8 union all select 9) as t3,
			  (select 0 union all select 1 union all select 2 union all
			   select 3 union all select 4 union all select 5 union all
			   select 6 union all select 7 union all select 8 union all select 9) as t4,
			  (select @i:=0) as t_init
			) AS numbers 
			HAVING CAST(`fecha_hora` AS DATE)<= DATE(NOW())
			) AAA LEFT JOIN (SELECT DATE(fecha_hora) as fecha_hora,TIME(min(fecha_hora)) as entrada, TIME(max(fecha_hora)) AS salida FROM `tbl_asistencias` WHERE `tbl_usuarios_idtbl_usuarios`='$id_usuario' GROUP BY DAYOFMONTH(fecha_hora) ORDER BY fecha_hora ASC) BBB
			USING (fecha_hora)
		");
        return $query->result();
    }*/

    public function dias_disfrutados_vacaciones($uid)
    {
        $id_usuario=$this->id_usuario($uid);

        $query = $this->db->query("SELECT periodo, dias_disfrutar FROM `tbl_vacaciones_permisos` WHERE tipo='vacaciones' AND `tbl_usuarios_idtbl_usuarios_beneficiario`=".$id_usuario." AND `estatus`=1");

        //if ($query->result()[0]->dias_disfrutar==null) {
        //    return 0;
        //} else {
            return $query->result();
        //}
    }

    public function dias_vacaciones($uid)
    {
        $id_usuario=$this->id_usuario($uid);
        $dias_diff = $this->db->query("SELECT DATEDIFF(CURDATE(), tbl_usuarios.fecha_ingreso) AS dias_diferencia FROM tbl_usuarios WHERE idtbl_usuarios=".$id_usuario);

        if ($dias_diff->result()[0]->dias_diferencia >= 1 && $dias_diff->result()[0]->dias_diferencia < 365) {
            $dias_anterior = 0;
            $dias = 6;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 365 && $dias_diff->result()[0]->dias_diferencia < 730) {
            $dias_anterior = 6;
            $dias = 8;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 730 && $dias_diff->result()[0]->dias_diferencia < 1095) {
            $dias_anterior = 14;
            $dias = 10;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 1095 && $dias_diff->result()[0]->dias_diferencia < 1460) {
            $dias_anterior = 24;
            $dias = 12;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 1460 && $dias_diff->result()[0]->dias_diferencia < 1825) {
            $dias_anterior = 36;
            $dias = 14;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 1825 && $dias_diff->result()[0]->dias_diferencia < 2190) {
            $dias_anterior = 50;
            $dias = 14;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 2190 && $dias_diff->result()[0]->dias_diferencia < 2555) {
            $dias_anterior = 64;
            $dias = 14;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 2555 && $dias_diff->result()[0]->dias_diferencia < 2920) {
            $dias_anterior = 78;
            $dias = 14;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 2920 && $dias_diff->result()[0]->dias_diferencia < 3285) {
            $dias_anterior = 92;
            $dias = 14;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 3285 && $dias_diff->result()[0]->dias_diferencia < 3650) {
            $dias_anterior = 106;
            $dias = 16;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 3650 && $dias_diff->result()[0]->dias_diferencia < 4015) {
            $dias_anterior = 122;
            $dias = 16;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 4015 && $dias_diff->result()[0]->dias_diferencia < 4380) {
            $dias_anterior = 138;
            $dias = 16;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 4380 && $dias_diff->result()[0]->dias_diferencia < 4745) {
            $dias_anterior = 154;
            $dias = 16;
        } elseif ($dias_diff->result()[0]->dias_diferencia >= 4745 && $dias_diff->result()[0]->dias_diferencia < 5110) {
            $dias_anterior = 170;
            $dias = 16;
        }

        $restantes = $dias_diff->result()[0]->dias_diferencia - (365 * (($dias_diff->result()[0]->dias_diferencia - $dias_diff->result()[0]->dias_diferencia % 365) / 365));

        $resultado = (int)(((@$dias / 365) * $restantes) + @$dias_anterior);

        $query = $this->db->query("SELECT SUM(dias) as dias FROM `tbl_vacaciones_permisos` WHERE tipo='vacaciones' AND `tbl_usuarios_idtbl_usuarios_beneficiario`=".$id_usuario." AND `estatus`=1");

        $dias_vacaciones = $resultado - $query->result()[0]->dias;

        $datos = array(
              'dias_vacaciones' => $dias_vacaciones
          );

        $this->db->where('idtbl_usuarios', $id_usuario);
        $this->db->update('tbl_usuarios', $datos);

        if ($dias_diff->result()[0]->dias_diferencia==null) {
            return 0;
        } else {
            return $dias_diff->result()[0]->dias_diferencia;
        }
    }

    public function vacaciones_permisos($uid)
    {
        $id_usuario=$this->id_usuario($uid);
        
        $query = $this->db->query("SELECT * FROM `tbl_vacaciones_permisos` WHERE `tbl_usuarios_idtbl_usuarios_beneficiario`=".$id_usuario. " ORDER BY timestamp DESC");
        
        return $query->result();
    }
    
    public function datos_vacaciones($uid)
    {
        $query = $this->db->query("
            SELECT tbl_vacaciones_permisos.*, tbl_usuarios.nombres, tbl_usuarios.apellido_paterno, tbl_usuarios.apellido_materno, tbl_usuarios.fecha_ingreso, tbl_departamentos.departamento FROM tbl_vacaciones_permisos
            LEFT JOIN tbl_usuarios
            ON tbl_usuarios.idtbl_usuarios=tbl_vacaciones_permisos.tbl_usuarios_idtbl_usuarios_beneficiario
            LEFT JOIN tbl_perfiles 
			ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles
			LEFT JOIN tbl_departamentos 
			ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos
            WHERE tbl_vacaciones_permisos.uid='$uid'");
        
        return $query->result();
    }

    public function cancelar_vacaciones()
    {
        $data = array('estatus' => '0');
        $this->db->where('uid', $this->input->post('uid'));
        return $this->db->update('tbl_vacaciones_permisos', $data);
    }

    public function actas($uid)
    {
        $id_usuario=$this->id_usuario($uid);
        $query = $this->db->query("SELECT * FROM `tbl_actas` WHERE `tbl_usuarios_idtbl_usuarios_acreedor`=".$id_usuario);
        return $query->result();
    }
    
    public function incapacidades($uid)
    {
        $id_usuario=$this->id_usuario($uid);
        $query = $this->db->query("SELECT * FROM `tbl_incapacidades` WHERE `tbl_usuarios_idtbl_usuarios`=".$id_usuario);
        return $query->result();
    }

    public function guardar_acta()
    {
        $id_usuario_acreedor=$this->id_usuario($this->input->post('uid'));
        $data = array(
      'detalle' => $this->input->post('descripcion'),
      'tbl_usuarios_idtbl_usuarios_acreedor' => $id_usuario_acreedor,
      'tbl_users_idtbl_users' => $this->session->userdata('id'),
      'uid' => uniqid(),
      'fecha' => $this->input->post('fecha')
        );
        return $this->db->insert('tbl_actas', $data);
    }

    public function guardar_vacaciones()
    {
        $id_usuario_acreedor=$this->id_usuario($this->input->post('uid'));
        $aprobacion_rh=0;
        $aprobacion_jefe=0;
        $aprobacion_pm= $this->session->userdata('tipo') == 22 ? 2 : 0;
        if($this->session->userdata('tipo') == 5){
            $data = array(
                'dias' => $this->input->post('dias'),
                'tbl_usuarios_idtbl_usuarios_beneficiario' => $id_usuario_acreedor,
                'tbl_users_idtbl_users' => $this->session->userdata('id'),
                'uid' => uniqid(),
                'fecha_inicio' => $this->input->post('start'),
                'fecha_final' => $this->input->post('end'),
                'goce_sueldo' => 1,//Porque son vacaciones
                'comentarios' => $this->input->post('comentarios'),
                'aprobacion_rh' => $aprobacion_rh,
                'aprobacion_jefe' => $aprobacion_jefe,
                'aprobacion_pm' => $aprobacion_pm,
                'tipo' => $this->input->post('tipo'),
                'periodo' => json_encode($this->input->post('periodo')),
                'derecho_a' => json_encode($this->input->post('derecho_a')),
                'dias_disfrutados_periodo' => json_encode($this->input->post('dias_disfrutados_periodo')),
                'dias_pendientes_periodo' => json_encode($this->input->post('dias_pendientes_periodo')),
                'dias_disfrutar' => json_encode($this->input->post('dias_disfrutar')),
                'estatus' => $this->session->userdata('tipo') == 5 ? '1' : '2'
            );
        }else{
            $data = array(
                'dias' => $this->input->post('dias'),
                'tbl_usuarios_idtbl_usuarios_beneficiario' => $id_usuario_acreedor,
                'tbl_users_idtbl_users' => $this->session->userdata('id'),
                'uid' => uniqid(),
                'fecha_inicio' => $this->input->post('start'),
                'fecha_final' => $this->input->post('end'),
                'goce_sueldo' => 1,//Porque son vacaciones
                'comentarios' => $this->input->post('comentarios'),
                'tbl_users_idtbl_users_aprobacion' => $this->input->post('persona_autorizacion'),
                'aprobacion_rh' => $aprobacion_rh,
                'aprobacion_jefe' => $aprobacion_jefe,
                'aprobacion_pm' => $aprobacion_pm,
                'tipo' => $this->input->post('tipo'),
                'periodo' => json_encode($this->input->post('periodo')),
                'derecho_a' => json_encode($this->input->post('derecho_a')),
                'dias_disfrutados_periodo' => json_encode($this->input->post('dias_disfrutados_periodo')),
                'dias_pendientes_periodo' => json_encode($this->input->post('dias_pendientes_periodo')),
                'dias_disfrutar' => json_encode($this->input->post('dias_disfrutar')),
                'estatus' => '2'
            );
        }
        return $this->db->insert('tbl_vacaciones_permisos', $data);
    }

    public function justificar_descontar()
    {
        if(isset($_POST['justificaciones'])){
            $array_just = array(
                'fecha' => date('Y-m-d H:i:s'),
                'tbl_users_idtbl_users' => $this->session->userdata('id'),
                'tipo' => 'justificacion',
                'tbl_usuarios_idtbl_usuarios' => $this->id_usuario($this->input->post('uid')),
                'total' => $this->input->post('total_justificacion'),
                'observaciones' => NULL
            );

            $this->db->insert('tbl_descuentos', $array_just);
            $id_justificado = $this->db->insert_id();

            foreach($this->input->post('justificaciones') AS $key => $value){
                $array_dtl_just = array(
                    'tbl_catalogo_idtbl_catalogo' => $this->input->post('catalogo_justificacion')[$key],
                    'cantidad' => $this->input->post('cantidad_justificacion')[$key],
                    'precio' => NULL,
                    'tbl_descuentos_idtbl_descuentos' => $id_justificado
                );
                $this->db->insert('dtl_descuentos', $array_dtl_just);

                $array_asignacion_just = array(
                    'estatus_asignacion' => 'finalizada',
                    'fecha_finalizacion' => date('Y-m-d H:i:s'),
                    'estado_entrega' => 'justificacion',
                    'entregado' => $this->input->post('cantidad_justificacion')[$key]
                );

                $this->db->where('iddtl_asignacion', $value);
                $this->db->update('dtl_asignacion', $array_asignacion_just);

                $this->db->set('cantidad', 'cantidad - ' . $this->input->post('cantidad_justificacion')[$key], FALSE);
                $this->db->where('iddtl_asignacion', $value);
                $this->db->update('dtl_asignacion');
            }
        }
        if(isset($_POST['descuentos'])){
            $array_des = array(
                'fecha' => date('Y-m-d H:i:s'),
                'tbl_users_idtbl_users' => $this->session->userdata('id'),
                'tipo' => 'descuento',
                'tbl_usuarios_idtbl_usuarios' => $this->id_usuario($this->input->post('uid')),
                'total' => $this->input->post('total_descuento'),
                'observaciones' => NULL
            );

            $this->db->insert('tbl_descuentos', $array_des);
            $id_descontar = $this->db->insert_id();

            foreach($this->input->post('descuentos') AS $key => $value){
                $array_dtl_descuento = array(
                    'tbl_catalogo_idtbl_catalogo' => $this->input->post('catalogo_descuento')[$key],
                    'cantidad' => $this->input->post('cantidad_descuento')[$key],
                    'precio' => NULL,
                    'tbl_descuentos_idtbl_descuentos' => $id_descontar
                );
                $this->db->insert('dtl_descuentos', $array_dtl_descuento);

                $array_asignacion_descuento = array(
                    'estatus_asignacion' => 'finalizada',
                    'fecha_finalizacion' => date('Y-m-d H:i:s'),
                    'estado_entrega' => 'justificacion',
                    'entregado' => $this->input->post('cantidad_descuento')[$key]
                );

                $this->db->where('iddtl_asignacion', $value);
                $this->db->update('dtl_asignacion', $array_asignacion_descuento);

                $this->db->set('cantidad', 'cantidad - ' . $this->input->post('cantidad_descuento')[$key], FALSE);
                $this->db->where('iddtl_asignacion', $value);
                $this->db->update('dtl_asignacion');
            }
        }
        
        return true;
    }
    
    public function guardar_incapacidad()
    {
        $id_usuario_acreedor=$this->id_usuario($this->input->post('uid'));
        $data = array(
      'comentarios' => $this->input->post('comentarios'),
      'folio' => $this->input->post('folio'),
      'fecha_incidente' => $this->input->post('fecha_incidente'),
      'fecha_inicio' => $this->input->post('start'),
      'fecha_fin' => $this->input->post('end'),
      'dias_expedidos' => $this->input->post('dias'),
      'tipo' => $this->input->post('tipo').$this->input->post('subtipo'),
      'uid' => uniqid(),
      'tbl_usuarios_idtbl_usuarios' => $id_usuario_acreedor,
      'tbl_users_idtbl_users' => $this->session->userdata('id'),
    );
        return $this->db->insert('tbl_incapacidades', $data);
    }

    public function guardar_permiso()
    {
        $id_usuario_acreedor=$this->id_usuario($this->input->post('uid'));
        $aprobacion_rh=0;
        $aprobacion_jefe=0;
        $data = array(
      'dias' => $this->input->post('dias'),
      'tbl_usuarios_idtbl_usuarios_beneficiario' => $id_usuario_acreedor,
      'tbl_users_idtbl_users' => $this->session->userdata('id'),
      'uid' => uniqid(),
      'fecha_inicio' => $this->input->post('start'),
      'fecha_final' => $this->input->post('end'),
      'goce_sueldo' => $this->input->post('goce_sueldo'),
      'comentarios' => $this->input->post('comentarios'),
      'aprobacion_rh' => $aprobacion_rh,
      'aprobacion_jefe' => $aprobacion_jefe,
      'tipo' => $this->input->post('tipo')
    );
        return $this->db->insert('tbl_vacaciones_permisos', $data);
    }

    public function guardar_personal($uid, $tipo="")
    {
        $this->db->trans_begin();
        $data = array(
            'numero_empleado' => $this->input->post('numero_empleado'),
            'numero_empleado_noi' => null,
            'nombres' => $this->input->post('nombres'),
            'apellido_paterno' => $this->input->post('apellido_paterno'),
            'apellido_materno' => $this->input->post('apellido_materno'),
            'sexo' => $this->input->post('sexo'),
            'pago' => $this->input->post('pago'),
            'rfc' => strtoupper($this->input->post('rfc')),
            'curp' => strtoupper($this->input->post('curp')),
            'nss' => $this->input->post('nss'),
            'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
            'lugar_nacimiento' => $this->input->post('lugar_nacimiento'),
            'nacionalidad' => $this->input->post('nacionalidad'),
            'email_personal' => $this->input->post('email_personal'),
            'email_institucional' => $this->input->post('email_institucional'),
            'estudios' => $this->input->post('estudios'),
            'clave_elector' => $this->input->post('clave_elector'),
            'numero_licencia' => $this->input->post('numero_licencia'),
            'calle' => $this->input->post('calle'),
            'numero' => $this->input->post('numero'),
            'colonia' => $this->input->post('colonia'),
            'tbl_municipio_idtbl_municipio' => $this->input->post('tbl_municipio_idtbl_municipio'),
            'cp' => $this->input->post('cp'),
            'telefono_fijo' => $this->input->post('telefono_fijo'),
            'telefono' => $this->input->post('telefono'),
            'telefono_empresa' => $this->input->post('telefono_empresa'),
            'estado_civil' => $this->input->post('estado_civil'),
            'nombre_pareja' => $this->input->post('nombre_pareja'),
            'hijos' => $this->input->post('hijos'),
            'tbl_proyectos_idtbl_proyectos' => $this->input->post('tbl_proyectos_idtbl_proyectos'),
            'tbl_perfiles_idtbl_perfiles' => $this->input->post('tbl_perfiles_idtbl_perfiles'),
            'fecha_alta_imss' => $this->input->post('fecha_alta_imss'),
            'infonavit' => $this->input->post('infonavit'),
            'tipo_nomina' => $this->input->post('tipo_nomina'),
            'telefono_emergencia' => $this->input->post('telefono_emergencia'),
            'persona_contacto' => $this->input->post('persona_contacto'),
            'uid' => $uid,
            'horario' => $this->input->post('horario'),
            'estatus' => 1,
            'ctl_escolaridad_idctl_escolaridad' => $this->input->post('ctl_escolaridad_idctl_escolaridad'),
            'sd' => $this->input->post('sd'),
            'sdi' => $this->input->post('sdi'),
            'sueldo_imss' => $this->input->post('sueldo_imss'),
            'sueldo_bruto_mensual' => $this->input->post('sueldo_bruto_mensual'),
            'sueldo_neto_mensual' => $this->input->post('sueldo_neto_mensual'),
            'fecha_ingreso' => $this->input->post('fecha_ingreso'),
            'ctl_contratos_idctl_contratos' => $this->input->post('ctl_contratos_idctl_contratos'),
            //'puesto_contrato' => $this->input->post('puesto_contrato'),
            'tipo' => $tipo,
            'tbl_contratistas_idtbl_contratistas' => $this->input->post('tbl_contratistas_idtbl_contratistas'),
            'almacen' => $this->input->post('almacen'),
	        'credencial_estevez' => $this->input->post('credencial_estevez'),
	        'establecimiento' => $this->input->post('establecimiento'),
            'ctl_fuente_empleos_idctl_fuente_empleos' => $this->input->post('ctl_fuente_empleos_idctl_fuente_empleos'),
            'tbl_ocupacion_idtbl_ocupacion' => $this->input->post('idtbl_ocupacion'),
            'tbl_estudios_idtbl_estudios' => $this->input->post('idtbl_estudios'),
            'tbl_doc_probatorio_idtbl_doc_probatorio' => $this->input->post('idtbl_doc_probatorio'),
            'tbl_instituciones_idtbl_instituciones' => $this->input->post('idtbl_instituciones')
        );
        $this->db->insert('tbl_usuarios', $data);
        $id = $this->db->insert_id();
        $insert = array(
            'tipo' => 'alta',
            'motivo' => 'Nuevo Ingreso',
            'termino' => 2,
            'fecha' => $this->input->post('fecha_ingreso'),
            'tbl_usuarios_idtbl_usuarios' => $this->id_usuario($uid),
            'tbl_users_idtbl_users'=>$this->session->userdata('id')
        );
        $this->db->insert('tbl_alta_baja', $insert);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return array("success"=>false, "message"=>$this->db->_error_message());
        } else {
            $this->db->trans_commit();
            return array("success"=>true, "id"=>$id);
        }
    }

    public function actualizar_usuario($uid, $tipo='', $dc3='')
    {
        $data = array(
            'numero_empleado' => $this->input->post('numero_empleado'),
            //'numero_empleado_noi' => $this->input->post('numero_empleado_noi'),
            'nombres' => $this->input->post('nombres'),
            'apellido_paterno' => $this->input->post('apellido_paterno'),
            'apellido_materno' => $this->input->post('apellido_materno'),
            'sexo' => $this->input->post('sexo'),
            'pago' => $this->input->post('pago'),
            'rfc' => strtoupper($this->input->post('rfc')),
            'curp' => strtoupper($this->input->post('curp')),
            'nss' => $this->input->post('nss'),
            'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
            'lugar_nacimiento' => $this->input->post('lugar_nacimiento'),
            'nacionalidad' => $this->input->post('nacionalidad'),
            'email_personal' => $this->input->post('email_personal'),
            'email_institucional' => $this->input->post('email_institucional'),
            'estudios' => $this->input->post('estudios'),
            'clave_elector' => $this->input->post('clave_elector'),
            'numero_licencia' => $this->input->post('numero_licencia'),
            'calle' => $this->input->post('calle'),
            'numero' => $this->input->post('numero'),
            'colonia' => $this->input->post('colonia'),
            'tbl_municipio_idtbl_municipio' => $this->input->post('tbl_municipio_idtbl_municipio'),
            'cp' => $this->input->post('cp'),
            'telefono_fijo' => $this->input->post('telefono_fijo'),
            'telefono' => $this->input->post('telefono'),
            'telefono_empresa' => $this->input->post('telefono_empresa'),
            'estado_civil' => $this->input->post('estado_civil'),
            'nombre_pareja' => $this->input->post('nombre_pareja'),
            'hijos' => $this->input->post('hijos'),
            'tbl_proyectos_idtbl_proyectos' => $this->input->post('tbl_proyectos_idtbl_proyectos'),
            'tbl_perfiles_idtbl_perfiles' => $this->input->post('tbl_perfiles_idtbl_perfiles'),
            'fecha_alta_imss' => $this->input->post('fecha_alta_imss'),
            'infonavit' => $this->input->post('infonavit'),
            'tipo_nomina' => $this->input->post('tipo_nomina'),
            'telefono_emergencia' => $this->input->post('telefono_emergencia'),
            'persona_contacto' => $this->input->post('persona_contacto'),
            'horario' => $this->input->post('horario'),
            'estatus' => $this->input->post('estatus'),
            'ctl_escolaridad_idctl_escolaridad' => $this->input->post('ctl_escolaridad_idctl_escolaridad'),
            'sd' => $this->input->post('sd'),
            'sdi' => $this->input->post('sdi'),
            'sueldo_imss' => $this->input->post('sueldo_imss'),
            'sueldo_bruto_mensual' => $this->input->post('sueldo_bruto_mensual'),
            'sueldo_neto_mensual' => $this->input->post('sueldo_neto_mensual'),
            'fecha_ingreso' => $this->input->post('fecha_ingreso'),
            'ctl_contratos_idctl_contratos' => $this->input->post('ctl_contratos_idctl_contratos'),
            //'puesto_contrato' => $this->input->post('puesto_contrato'),
            'tbl_contratistas_idtbl_contratistas' => $this->input->post('tbl_contratistas_idtbl_contratistas'),
            'almacen' => $this->input->post('almacen'),
            'dc3' => $dc3,
	        'credencial_estevez' => $this->input->post('credencial_estevez'),
	        'establecimiento' => $this->input->post('establecimiento'),
            'ctl_fuente_empleos_idctl_fuente_empleos' => $this->input->post('ctl_fuente_empleos_idctl_fuente_empleos'),
            'tbl_ocupacion_idtbl_ocupacion' => $this->input->post('idtbl_ocupacion'),
            'tbl_estudios_idtbl_estudios' => $this->input->post('idtbl_estudios'),
            'tbl_doc_probatorio_idtbl_doc_probatorio' => $this->input->post('idtbl_doc_probatorio'),
            'tbl_instituciones_idtbl_instituciones' => $this->input->post('idtbl_instituciones')
        );
        
        $this->db->where('uid', $uid);
        if ($this->db->update('tbl_usuarios', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function guardar_requisicion($uid)
    {
        $insert = array(
            'tipo_requisicion' => $this->input->post('tipo_requisicion'),
            'nombre_sustituir' => $this->input->post('nombre_persona_sustituir'),
            'nombre_nuevo_puesto' => $this->input->post('nombre_nuevo_perfil'),
            'numero_vacantes' => $this->input->post('numero_vacantes'),
            'sueldo_solicitado' => $this->input->post('sueldo'),
            'tipo_pago' => $this->input->post('tipo_pago'),
            'horario' => $this->input->post('horario'),
            'ctl_contratos_idctl_contratos' => $this->input->post('tipo_contrato'),
            'imss' => $this->input->post('imss'),
            'sexo' => $this->input->post('sexo'),
            'estado_civil' => $this->input->post('estado_civil'),
            'rango_edad' => $this->input->post('rango_edad'),
            'anios_experiencia' => $this->input->post('anios_experiencia'),
            'descripcion' => $this->input->post('funciones_generales'),
            'especialidad' => $this->input->post('especialidad'),
            'maquinaria' => $this->input->post('manejo_equipo_computo'),
            'paqueteria' => $this->input->post('ofimatica'),
            'epp' => $this->input->post('epp'),
            'uniforme'=>$this->input->post('uniforme'),
            'equipo_computo'=>$this->input->post("equipo_computo"),
            'equipo_celular'=>$this->input->post("equipo_celular"),
            'ctl_motivos_vacantes_idctl_motivos_vacantes'=>$this->input->post("motivo_vacante"),
            'ctl_escolaridad_idctl_escolaridad'=>$this->input->post("escolaridad"),
            'tbl_departamentos_idtbl_departamentos'=>$this->input->post("departamento"),
            'tbl_perfiles_idtbl_perfiles'=>$this->input->post("perfil"),
            'tbl_proyectos_idtbl_proyectos'=>$this->input->post("proyecto"),
            'estatus'=>0,
            'uid'=> $uid,
            'autor'=>$this->session->userdata('id')
        );
        if ($this->db->insert('tbl_requisiciones', $insert)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function baja_personal()
    {
        $this->db->trans_begin();
        $data = array(
      'almacen' => 0,
            'estatus' => 0
        );
        $this->db->where('uid', $this->input->post('uid'));
        $this->db->update('tbl_usuarios', $data);

        $data_user = array(
            'estatus' => 0
        );
        $this->db->where('tbl_usuarios_idtbl_usuarios', $this->id_usuario($this->input->post('uid')));
        $this->db->update('tbl_users', $data_user);
        
        $insert = array(
            'tipo' => 'baja',
            'motivo' => $this->input->post('motivo'),
            'termino' => $this->input->post('termino'),
            'tipo_baja' => $this->input->post('tipo_baja'),
            'fecha' => $this->input->post('fecha'),
            'tbl_usuarios_idtbl_usuarios' => $this->id_usuario($this->input->post('uid')),
            'tbl_users_idtbl_users'=>$this->session->userdata('id')
        );
        $this->db->insert('tbl_alta_baja', $insert);

        if($this->input->post('tipo_baja') == "Renuncia voluntaria"){
            $idtbl_alta_baja = $this->db->insert_id();
            $insert = array(
                'tbl_alta_baja_idtbl_alta_baja' => $idtbl_alta_baja,
                'baja_remuneracion' => $this->input->post('baja_remuneracion'),
                'problemas_personales_enfermedad' => $this->input->post('problemas_personales_enfermedad'),
                'falta_reconocimiento_labor' => $this->input->post('falta_reconocimiento_labor'),
                'presion_estres' => $this->input->post('presion_estres'),
                'ambiente_fisico_trabajo' => $this->input->post('ambiente_fisico_trabajo'),
                'incumplimiento_ofrecido_ingreso' => $this->input->post('incumplimiento_ofrecido_ingreso'),
                'problemas_jefe_directo' => $this->input->post('problemas_jefe_directo'),
                'falta_oportunidad_profesional' => $this->input->post('falta_oportunidad_profesional'),
                'falta_motivacion_grupo' => $this->input->post('falta_motivacion_grupo'),
                'horarios_trabajo' => $this->input->post('horarios_trabajo'),
                'conflicto_compañeros' => $this->input->post('conflicto_compañeros'),
                'rubro_nueva_empresa' => $this->input->post('rubro_nueva_empresa'),
                'descripcion_razon_retiro' => $this->input->post('descripcion_razon_retiro'),
                'ambiente_laboral' => $this->input->post('ambiente_laboral'),
                'induccion' => $this->input->post('induccion'),
                'capacitacion' => $this->input->post('capacitacion'),
                'condicciones_trabajo' => $this->input->post('condicciones_trabajo'),
                'reconocimiento_labor' => $this->input->post('reconocimiento_labor'),
                'sueldo_comisiones' => $this->input->post('sueldo_comisiones'),
                'trato_jefe_supervisor' => $this->input->post('trato_jefe_supervisor'),
                'trato_rrhh' => $this->input->post('trato_rrhh'),
                'prestaciones' => $this->input->post('prestaciones'),
                'resposabilidad_labores_correspodian' => $this->input->post('resposabilidad_labores_correspodian'),
                'resposabilidad_labores_descripcion' => $this->input->post('resposabilidad_labores_descripcion'),
                'labores_gusto' => $this->input->post('labores_gusto'),
                'labores_no_gusto' => $this->input->post('labores_no_gusto'),
                'option_para_no_salir' => $this->input->post('option_para_no_salir'),
                'option_mejorar_gestion' => $this->input->post('option_mejorar_gestion'),
                'comentario' => $this->input->post('comentario'),
            );

            $this->db->insert('tbl_encuestas_baja', $insert);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function updateBaja() {                      
        $update = array(            
            'motivo' => $this->input->post('motivo')            
        );
        $this->db->where('idtbl_alta_baja',$this->input->post('id_baja'));
        $query = $this->db->update('tbl_alta_baja',$update);    

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function alta_personal($uid)
    {
        $this->db->trans_begin();
        $id_usuario=$this->id_usuario($uid);

        $data = array(
            'estatus' => 1
        );
        $this->db->where('uid', $this->input->post('uid'));
        $this->db->update('tbl_usuarios', $data);

        $reset = array(
            'fecha_ingreso' => $this->input->post('fecha')
        );

        $this->db->where('uid', $this->input->post('uid'));
        $this->db->update('tbl_usuarios', $reset);

        $this->db->where('tbl_usuarios_idtbl_usuarios_beneficiario', $id_usuario);
        $this->db->delete('tbl_vacaciones_permisos');

        $insert = array(
            'tipo' => 'alta',
            'motivo' => $this->input->post('motivo'),
            'termino' => 3,
            'fecha' => $this->input->post('fecha'),
            'tbl_usuarios_idtbl_usuarios' => $this->id_usuario($this->input->post('uid')),
            'tbl_users_idtbl_users'=>$this->session->userdata('id')
        );
        $this->db->insert('tbl_alta_baja', $insert);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //Eliminar a un usuario
    public function eliminar_usuario($uid)
    {
        $this->db->trans_begin();
        $id_usuario=$this->id_usuario($uid);

        $this->db->where('tbl_usuarios_idtbl_usuarios', $id_usuario);
        $this->db->delete('tbl_alta_baja');

        $this->db->where('tbl_usuarios_idtbl_usuarios', $id_usuario);
        $this->db->delete('dtl_contratos_usuarios');
             
        $this->db->where('tbl_usuarios_idtbl_usuarios', $id_usuario);
        $this->db->delete('dtl_asignacion');

        $this->db->where('idtbl_usuarios', $id_usuario);
        $this->db->delete('tbl_usuarios');
        

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function actualizar_requisicion($estatus)
    {
        $data = array(
      'numero_vacantes' => $this->input->post('numero_vacantes'),
      'sueldo_solicitado' => $this->input->post('sueldo'),
      'epp' => $this->input->post('epp'),
      'uniforme'=>$this->input->post('uniforme'),
      'equipo_computo'=>$this->input->post("equipo_computo"),
      'equipo_celular'=>$this->input->post("equipo_celular"),
      'fecha_aprobacion_cancelacion'=> date('Y-m-d H:i:s'),
      'estatus'=> $estatus
        );
        $this->db->where('uid', $this->input->post('uid-requisicion'));
        if ($this->db->update('tbl_requisiciones', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function num_requisiciones()
    {
        return $this->db->get_where('tbl_requisiciones', array('estatus'=> null))->num_rows();
    }
    public function nuevas_requisiciones()
    {
        $this->db->where('fecha_creacion BETWEEN "'.Date('Y-m').'-01 00:00:00." and "'. date('Y-m-d').' 23:59:59"');
        $this->db->where('estatus', null);
        return $this->db->get('tbl_requisiciones')->num_rows();
    }
    public function get_requisiciones()
    {
        $data['requisiciones']=$this->db->get('tbl_requisiciones')->result_array();
        foreach ($data['requisiciones'] as $requicision) {
            $data['proyecto'.$requicision['uid']]=$this->db->get_where('tbl_proyectos', array('idtbl_proyectos'=>$requicision['tbl_proyectos_idtbl_proyectos']))->row_array()['nombre_proyecto'];
            $data['departamento'.$requicision['uid']]=$this->db->get_where('tbl_departamentos', array('idtbl_departamentos' => $requicision['tbl_departamentos_idtbl_departamentos']))->row_array()['departamento'];
            if ($requicision['tipo_requisicion']!='nuevo') {
                $data['motivo'.$requicision['uid']]=$this->db->get_where('ctl_motivos_vacantes', array('idctl_motivos_vacantes' => $requicision['ctl_motivos_vacantes_idctl_motivos_vacantes']))->row_array()['motivo'];
                $data['perfil'.$requicision['uid']]=$this->db->get_where('tbl_perfiles', array('idtbl_perfiles' => $requicision['tbl_perfiles_idtbl_perfiles']))->row_array()['perfil'];
            }
        }
        return $data;
    }
    public function get_requisicion($uid)
    {
        $query = $this->db->query("
			SELECT tbl_requisiciones.*, ctl_escolaridad.escolaridad, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,ctl_contratos.contrato, ctl_motivos_vacantes.motivo, tbl_departamentos.departamento  FROM tbl_requisiciones
			LEFT JOIN ctl_escolaridad
			ON  tbl_requisiciones.ctl_escolaridad_idctl_escolaridad =ctl_escolaridad.idctl_escolaridad
			LEFT JOIN tbl_perfiles
			ON  tbl_requisiciones.tbl_perfiles_idtbl_perfiles =tbl_perfiles.idtbl_perfiles
			LEFT JOIN tbl_proyectos
			ON  tbl_requisiciones.tbl_proyectos_idtbl_proyectos =tbl_proyectos.idtbl_proyectos
			LEFT JOIN ctl_contratos
			ON  tbl_requisiciones.ctl_contratos_idctl_contratos =ctl_contratos.idctl_contratos
			LEFT JOIN ctl_motivos_vacantes
			ON  tbl_requisiciones.ctl_motivos_vacantes_idctl_motivos_vacantes =ctl_motivos_vacantes.idctl_motivos_vacantes
			LEFT JOIN tbl_departamentos
			ON  tbl_departamentos.idtbl_departamentos =tbl_perfiles.tbl_departamentos_idtbl_departamentos
			WHERE tbl_requisiciones.uid='$uid'");
        if ($query->num_rows()>0) {
            return $query->result()[0];
        } else {
            return null;
        }
    }
    public function get_requisicion_byId($id)
    {
        $query = $this->db->query("
      SELECT tbl_requisiciones.*, ctl_escolaridad.escolaridad, tbl_perfiles.perfil,tbl_proyectos.nombre_proyecto,ctl_contratos.contrato, ctl_motivos_vacantes.motivo, tbl_departamentos.departamento  FROM tbl_requisiciones
      LEFT JOIN ctl_escolaridad
      ON  tbl_requisiciones.ctl_escolaridad_idctl_escolaridad =ctl_escolaridad.idctl_escolaridad
      LEFT JOIN tbl_perfiles
      ON  tbl_requisiciones.tbl_perfiles_idtbl_perfiles =tbl_perfiles.idtbl_perfiles
      LEFT JOIN tbl_proyectos
      ON  tbl_requisiciones.tbl_proyectos_idtbl_proyectos =tbl_proyectos.idtbl_proyectos
      LEFT JOIN ctl_contratos
      ON  tbl_requisiciones.ctl_contratos_idctl_contratos =ctl_contratos.idctl_contratos
      LEFT JOIN ctl_motivos_vacantes
			ON  tbl_requisiciones.ctl_motivos_vacantes_idctl_motivos_vacantes =ctl_motivos_vacantes.idctl_motivos_vacantes
			LEFT JOIN tbl_departamentos
			ON  tbl_departamentos.idtbl_departamentos =tbl_perfiles.tbl_departamentos_idtbl_departamentos
			WHERE tbl_requisiciones.idtbl_requisiciones='$id'");
        if ($query->num_rows()>0) {
            return $query->result()[0];
        } else {
            return null;
        }
    }
    public function nuevo_contrato()
    {
        $this->db->trans_begin();
        $id_usuario = $this->id_usuario($this->input->post('uid'));
        $data = array(
      'uid' => uniqid(),
      'fecha_inicio' => $this->input->post('fecha'),
      'duracion' => $this->input->post('dias'),
      'ctl_contratos_idctl_contratos'=>$this->input->post('contrato'),
      'tipo'=>$this->input->post('tipo'),
      'tbl_users_idtbl_users' => $this->session->userdata('id')
        );
        $this->db->insert('tbl_contratos', $data);
        $data = array(
      'tbl_usuarios_idtbl_usuarios' => $id_usuario,
      'tbl_contratos_idtbl_contratos' => $this->db->insert_id()
        );
        $this->db->insert('dtl_contratos_usuarios', $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    public function detalle_bajas($uid)
    {
        $id_usuario=$this->id_usuario($uid);
        $query = $this->db->query("
      SELECT tbl_alta_baja.*,tbl_users.nombre, tbl_usuarios.nombres,tbl_usuarios.apellido_paterno,tbl_usuarios.apellido_materno
      FROM tbl_alta_baja
      INNER JOIN tbl_users
      ON tbl_users.idtbl_users=tbl_alta_baja.tbl_users_idtbl_users
      INNER JOIN tbl_usuarios
      ON tbl_usuarios.idtbl_usuarios=tbl_alta_baja.tbl_usuarios_idtbl_usuarios
      WHERE tbl_alta_baja.tbl_usuarios_idtbl_usuarios='$id_usuario' AND tbl_alta_baja.termino != 2
      ORDER BY tbl_alta_baja.fecha DESC");
        return $query->result();
    }

  

    public function contratos_por_personal($uid)
    {
        $id_usuario=$this->id_usuario($uid);

        $query = $this->db->query("
        SELECT dtl_contratos_usuarios.iddtl_contratos_usuarios, dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios, dtl_contratos_usuarios.tbl_contratos_idtbl_contratos, tbl_contratos.idtbl_contratos, tbl_contratos.uid, tbl_contratos.fecha_inicio, tbl_contratos.duracion, tbl_contratos.fecha_creacion, tbl_contratos.ctl_contratos_idctl_contratos, tbl_contratos.tipo, tbl_contratos.estatus, tbl_users.nombre FROM dtl_contratos_usuarios INNER JOIN tbl_contratos ON dtl_contratos_usuarios.tbl_contratos_idtbl_contratos=tbl_contratos.idtbl_contratos LEFT JOIN tbl_users ON tbl_contratos.tbl_users_idtbl_users=tbl_users.idtbl_users
			WHERE dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios='$id_usuario'");
        
        return $query->result();
    }
    public function personal_semanal()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_usuarios WHERE pago = 'semanal' AND estatus = 1 AND tipo = 'interno'");
        return $query->result()[0]->total;
    }
    public function personal_quncenal()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_usuarios WHERE pago ='quincenal' AND estatus = 1 AND tipo = 'interno'");
        return $query->result()[0]->total;
    }
    public function personal_total()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_usuarios WHERE tbl_usuarios.tipo = 'interno'");
        return $query->result()[0]->total;
    }
    public function personal_baja()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM tbl_usuarios WHERE tbl_usuarios.estatus = 0 AND tbl_usuarios.tipo = 'interno'");
        return $query->result()[0]->total;
    }
    public function contratos_vencidos()
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from('tbl_usuarios');
        $this->db->join('dtl_contratos_usuarios', 'tbl_usuarios.idtbl_usuarios=dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios', 'left');
        $this->db->join('(SELECT *, DATE_ADD(fecha_inicio, INTERVAL duracion DAY) AS end_date FROM tbl_contratos) as tblcontratos', 'tblcontratos.idtbl_contratos=dtl_contratos_usuarios.tbl_contratos_idtbl_contratos', 'left');
        $this->db->where('tbl_usuarios.tipo', 'interno');
        $this->db->where('tblcontratos.tipo', 'determinado');
        $this->db->where('tbl_usuarios.estatus', 1);
        $this->db->where('end_date <', date("Y-m-d"));
        $this->db->where('tblcontratos.estatus', 1);
        $query= $this->db->get();
        return $query->result()[0]->total;
    }
    public function contratos_proximos_a_vencer()
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from('tbl_usuarios');
        $this->db->join('dtl_contratos_usuarios', 'tbl_usuarios.idtbl_usuarios=dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios', 'left');
        $this->db->join('(SELECT *, DATE_ADD(fecha_inicio, INTERVAL duracion DAY) AS end_date FROM tbl_contratos) as tblcontratos', 'tblcontratos.idtbl_contratos=dtl_contratos_usuarios.tbl_contratos_idtbl_contratos', 'left');
        $this->db->where('tbl_usuarios.tipo', 'interno');
        $this->db->where('tblcontratos.tipo', 'determinado');
        $this->db->where('tbl_usuarios.estatus', 1);
        $this->db->where('end_date >= DATE(now())');
        $this->db->where('end_date <= DATE_ADD(DATE(now()), INTERVAL 15 DAY)');
        $this->db->where('tblcontratos.estatus', 1);
        $query= $this->db->get();
        return $query->result()[0]->total;
    }

    public function datos_contrato($uid)
    {
        $this->db->select('tbl_contratos.*');
        $this->db->select('tbl_contratos.uid as uid_contrato');
        $this->db->select('tbl_usuarios.*');
        $this->db->select('tbl_usuarios.uid as uid_usuario');
        $this->db->select('ctl_contratos.*');
        $this->db->select('tbl_municipio.nombre_municipio');
        $this->db->select('tbl_entidad.nombre_entidad');
        $this->db->select('tbl_proyectos.nombre_proyecto');
        $this->db->select('tbl_proyectos.numero_proyecto');
        $this->db->from('tbl_contratos');
        $this->db->join('dtl_contratos_usuarios', 'dtl_contratos_usuarios.tbl_contratos_idtbl_contratos=tbl_contratos.idtbl_contratos', 'left');
        $this->db->join('tbl_usuarios', 'dtl_contratos_usuarios.tbl_usuarios_idtbl_usuarios=tbl_usuarios.idtbl_usuarios', 'left');
        $this->db->join('ctl_contratos', 'ctl_contratos.idctl_contratos=tbl_contratos.ctl_contratos_idctl_contratos', 'left');
        $this->db->join('tbl_municipio', 'tbl_usuarios.tbl_municipio_idtbl_municipio = tbl_municipio.idtbl_municipio', 'left');
        $this->db->join('tbl_entidad', 'tbl_entidad.idtbl_entidad = tbl_municipio.tbl_entidad_idtbl_entidad', 'left');
        $this->db->join('tbl_proyectos', 'tbl_proyectos.idtbl_proyectos = tbl_usuarios.tbl_proyectos_idtbl_proyectos', 'left');

        $this->db->where('tbl_contratos.uid', $uid);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->result()[0];
        } else {
            return false;
        }
    }

    public function datos_certificado($uid)
    {
        $this->db->select('dtl_certificados_personal.*');
        $this->db->select('tbl_instructores.idtbl_instructores');
        $this->db->select('dtl_certificados_personal.uid as uid_certificado');
        $this->db->select('tbl_usuarios.*');
        $this->db->select('tbl_usuarios.uid as uid_usuario');
        $this->db->select('tbl_certificados.*');
        $this->db->select('tbl_perfiles.perfil');

        $this->db->from('dtl_certificados_personal');
        
        $this->db->join('tbl_usuarios', 'dtl_certificados_personal.tbl_usuarios_idtbl_usuarios=tbl_usuarios.idtbl_usuarios', 'left');
        $this->db->join('tbl_certificados', 'dtl_certificados_personal.tbl_certificados_idtbl_certificados=tbl_certificados.idtbl_certificados', 'left');
        $this->db->join('tbl_perfiles', 'tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles', 'left');
        $this->db->JOIN('tbl_instructores', 'dtl_certificados_personal.tutor=tbl_instructores.idtbl_instructores', 'LEFT');
        $this->db->where('dtl_certificados_personal.uid', $uid);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->result()[0];
        } else {
            return false;
        }
    }
    //public function datos_certificado2($uid)
    //{
     //   $this->db->select('DISTINCT nombres, apellido_paterno, apellido_materno');
    //    $this->db->select('curp, empresa, tbl_empresas.empresa AS agente_capacitador');
     //   $this->db->select('tbl_empresas.rfc, tbl_empresas.registro_patronal, actividad_empresa');
     //   $this->db->select('descripcion, nombre_curso'); 
     //   $this->db->select('fecha_inicio, fecha_termino, duracion, folio, tutor, patron_representante, representante_trabajadores');
     //   $this->db->from('tbl_cursos, tbl_usuarios', 'LEFT');

     //   $this->db->JOIN('dtl_certificados_personal', 'tbl_usuarios.idtbl_usuarios = dtl_certificados_personal.tbl_usuarios_idtbl_usuarios', 'LEFT');
     //   $this->db->JOIN('ctl_contratos', 'ctl_contratos.idctl_contratos = tbl_usuarios.ctl_contratos_idctl_contratos', 'LEFT'); 
     //   $this->db->JOIN('tbl_empresas', 'ctl_contratos.tbl_empresas_idtbl_empresas = tbl_empresas.idtbl_empresas', 'LEFT'); 
     //   $this->db->JOIN('tbl_ocupacion', 'tbl_usuarios.tbl_ocupacion_idtbl_ocupacion = tbl_ocupacion.idtbl_ocupacion', 'LEFT'); 
     //   $this->db->WHERE('nombres = "Ernesto"', 'apellido_paterno = "Campos"' , 'apellido_materno = "Najera"', 'empresa = "ESTEVEZ.JOR SERVICIOS, S.A. DE C.V."',  'nombre_curso = "Inducción a la Seguridad e Higiene"', 'duracion=16', $uid);
     //       $query = $this->db->get();
     //       if ($query->num_rows()>0) {
     //       return $query->result()[0];
     //   } else {
     //       return false;
     //   }
    //}
    
    public function encriptar_password($pass)
    {
        $opciones = [
      'cost' => 11
        ];
        return password_hash($pass, PASSWORD_BCRYPT, $opciones);
    }

    public function datos_perfil()
    {
        return $this->db->get_where('tbl_usuarios', array('idtbl_usuarios' => $this->session->userdata('idtbl_usuarios')))->row_array();
    }

    public function contratos()
    {
        $query = $this->db->query("SELECT idctl_contratos as id, contrato FROM ctl_contratos");
        return $query->result();
    }

    public function fuente_empleos(){
        $query = $this->db->query("SELECT * FROM ctl_fuente_empleos");
        return $query->result();
    }

    public function ocupaciones(){
        $query = $this->db->query("SELECT * FROM tbl_ocupacion");
        return $query->result();
    }

    public function estudios(){
        $query = $this->db->query("SELECT * FROM tbl_estudios");
        return $query->result();
    }

    public function documentos_probatorios(){
        $query = $this->db->query("SELECT * FROM tbl_doc_probatorio");
        return $query->result();
    }

    public function instituciones(){
        $query = $this->db->query("SELECT * FROM tbl_instituciones");
        return $query->result();
    }

    public function log($log, $link=null)
    {
        if ($this->session->userdata('id')) {
            $id=$this->session->userdata('id');
        } else {
            $id=1;
        }
        $data = array(
      'log' => $log,
      'tbl_users_idtbl_users' => $id,
      'link' => $link,
      'departamento' => 2
        );
        $this->db->insert('tbl_log', $data);
    }

    public function getArchivos($uid)
    {
        $query = $this->db->query("SELECT contrato, comprobante_domicilio,ine,d FROM tbl_contratistas WHERE uid='$uid'");
        return $query->result_array();
    }

    public function getDc3($uid)
    {
        $query = $this->db->query("SELECT dc3 FROM tbl_usuarios WHERE uid = '$uid'");
        return $query->result_array();
    }

    //Función para verificar si existe el CURP
    public function checkCurp(){
        $query = $this->db->query("SELECT * FROM tbl_usuarios WHERE curp = '" . $this->input->post('curp') . "' AND tipo = 'interno'");
        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    // query para obtener todos los usuarios por nombre y tipo, para usarlo en el buscador al seleccionar el personal --fernando
    public function getUsuariosSelect($tipo,$nombre) {
        $query = $this->db->query("SELECT *, CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) AS nombre_completo FROM `tbl_usuarios` WHERE tipo = '$tipo' AND estatus = 1 AND CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) LIKE '%" . $nombre . "%'");
            return $query->result();
    }


    public function totalContrataciones(){
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno'");
        return $query->result()[0]->total;
    }

    public function totalContratacionesActivas(){
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1");
        return $query->result()[0]->total;
        
    }

    public function totalSalidas(){
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 0");
        return $query->result()[0]->total;
    }

    public function edadPromedio(){
        $query = $this->db->query("SELECT AVG(TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())) edad_promedio FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1");
        return $query->result()[0]->edad_promedio;
    }

    public function duracionPromedio(){
        //$query = $this->db->query("SELECT AVG(t.fecha_calculada_meses) duracion_promedio FROM (SELECT tbl_usuarios.fecha_ingreso, tbl_alta_baja.fecha, IF(tbl_alta_baja.fecha IS NULL, CURDATE(), tbl_alta_baja.fecha), TIMESTAMPDIFF(YEAR, tbl_usuarios.fecha_ingreso, IF(tbl_alta_baja.fecha IS NULL, CURDATE(), tbl_alta_baja.fecha)) fecha_calculada, (TIMESTAMPDIFF(MONTH, tbl_usuarios.fecha_ingreso, IF(tbl_alta_baja.fecha IS NULL, CURDATE(), tbl_alta_baja.fecha)) / 12) fecha_calculada_meses FROM tbl_usuarios LEFT JOIN tbl_alta_baja ON tbl_usuarios.idtbl_usuarios = tbl_alta_baja.tbl_usuarios_idtbl_usuarios AND tbl_alta_baja.tipo = 'baja' WHERE tbl_usuarios.tipo = 'interno' AND tbl_usuarios.fecha_ingreso IS NOT NULL) AS t WHERE t.fecha_calculada >= 0");
        
        //return $query->result()[0]->duracion_promedio;

        $user = 0;
        $counterUsers = 0;
        $counterPeriod = 0;
        $count = ["year" => 0, "month" => 0, "day" => 0];
        $dates = ["start" => '0000-00-00', "end" => '0000-00-00'];
        $query = $this->db->query("SELECT * FROM tbl_alta_baja WHERE tbl_alta_baja.idtbl_alta_baja IN (SELECT idtbl_usuarios FROM tbl_usuarios WHERE tipo = 'interno') ORDER BY tbl_alta_baja.tbl_usuarios_idtbl_usuarios, tbl_alta_baja.fecha_creacion");
        $result = $query->result();
        $countTotal = 0;
        foreach ($result as $value) {
            if($user != $value->tbl_usuarios_idtbl_usuarios){
                if($dates["start"] != '0000-00-00' && $dates["end"] == '0000-00-00'){
                    $countTotal++;
                    $date1 = new DateTime($dates["start"]);
                    $date2 = new DateTime("NOW");
                    $interval = $date1->diff($date2);
                    $count["year"] += $interval->format("%y");
                    $count["month"] += $interval->format("%m");
                    $count["day"] += $interval->format("%d");
                    //echo $interval->format('%y-%m-%d') . "</br>";
                }
                $dates["start"] = '0000-00-00';
                $dates["end"] = '0000-00-00';
                $user = $value->tbl_usuarios_idtbl_usuarios;
                //echo "-----------" . $user . "------------</br>";
                $counterPeriod ++;
            }
            //echo "tipo: $value->tipo fecha: $value->fecha </br>";
            if($value->tipo == "alta"){
                $dates["start"] = $value->fecha;
            }else{
                $dates["end"] = $value->fecha;
                if($dates["start"] != '0000-00-00' && $dates["end"] != '0000-00-00'){
                    $countTotal++;
                    $date1 = new DateTime($dates["start"]);
                    $date2 = new DateTime($dates["end"]);
                    if($date2 >= $date1){
                        $interval = $date1->diff($date2);
                        $count["year"] += $interval->format("%y");
                        $count["month"] += $interval->format("%m");
                        $count["day"] += $interval->format("%d");
                        //echo $interval->format('%y-%m-%d') . " --- " . $interval->format('%a') .  " </br>";
                        $counterPeriod ++;
                    }else{
                        //echo "+++++++++</br>$value->tipo fecha: $value->fecha</br>+++++++++</br>";
                    }
                }
                $dates["start"] = '0000-00-00';
                $dates["end"] = '0000-00-00';
            }
        }
        $totalYears = $count['year'] + ceil($count['month'] / 12);
        return number_format($totalYears/$countTotal,2);
        
    }

    public function empleadosPorGenero(){
        $arrayEmpleados = [];
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1 AND sexo = 'FEMENINO'");
        array_push($arrayEmpleados, $query->result()[0]->total);
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1 AND sexo = 'MASCULINO'");
        array_push($arrayEmpleados, $query->result()[0]->total);
        return $arrayEmpleados;
    }

    public function empleadosPorUbicacion(){
        $query = $this->db->query("SELECT tbl_empresas.empresa, COUNT(*) total FROM tbl_usuarios JOIN ctl_contratos ON tbl_usuarios.ctl_contratos_idctl_contratos = ctl_contratos.idctl_contratos JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas WHERE tbl_usuarios.tipo = 'interno' AND tbl_usuarios.estatus = 1 GROUP BY tbl_empresas.idtbl_empresas");
        return $query->result();
    }

    public function empresas(){
        $query = $this->db->query("SELECT * FROM tbl_empresas");
        return $query->result();
    }

    public function departamentos(){
        $query = $this->db->query("SELECT * FROM tbl_departamentos");
        return $query->result();
    }

    public function editarBaja($uid)
    {
        $id_usuario=$this->id_usuario($uid);
        $query = $this->db->query("
      SELECT tbl_alta_baja.*,tbl_users.nombre, tbl_usuarios.nombres,tbl_usuarios.apellido_paterno,tbl_usuarios.apellido_materno
      FROM tbl_alta_baja
      INNER JOIN tbl_users
      ON tbl_users.idtbl_users=tbl_alta_baja.tbl_users_idtbl_users
      INNER JOIN tbl_usuarios
      ON tbl_usuarios.idtbl_usuarios=tbl_alta_baja.tbl_usuarios_idtbl_usuarios
      WHERE tbl_alta_baja.tbl_usuarios_idtbl_usuarios='$id_usuario' AND tbl_alta_baja.termino != 2
      ORDER BY tbl_alta_baja.fecha DESC");
        return $query->result();
    }

    public function empleadosPorUbicacionDepartamento($empresa = 1){
        $query = $this->db->query("SELECT tbl_empresas.empresa, tbl_departamentos.departamento, COUNT(*) total FROM tbl_usuarios JOIN ctl_contratos ON tbl_usuarios.ctl_contratos_idctl_contratos = ctl_contratos.idctl_contratos JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas AND tbl_empresas.idtbl_empresas = '" . $empresa . "' JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos WHERE tbl_usuarios.tipo = 'interno' AND tbl_usuarios.estatus = 1 GROUP BY tbl_empresas.idtbl_empresas, tbl_departamentos.idtbl_departamentos");
        return $query->result();
    }

    public function contratacionesPorAnio(){
        $query = $this->db->query("SELECT YEAR(date(fecha_ingreso)) anio, COUNT(*) total FROM `tbl_usuarios` WHERE YEAR(date(fecha_ingreso)) >= 2013 AND YEAR(date(fecha_ingreso)) <= YEAR(CURDATE()) GROUP BY YEAR(date(fecha_ingreso))");
        return $query->result();
    }

    public function personalActivoPorAnioMes($anio){
        $anioActual = date("Y");
        $mesActual = date("n");
        $data = [];
        $meses = 12;
        if($anioActual == $anio){
            $meses = intval($mesActual);
        }
        $condicion_departamento = "";
        if($this->input->post("departamento") != ""){
            $condicion_departamento = " AND tbl_perfiles.tbl_departamentos_idtbl_departamentos = " . $this->input->post("departamento");
        }
        for($r=0; $r<$meses; $r++){
            $mes = substr("0".strval($r+1), -2);
            $fecha = $anio . "-" . $mes . "-01";
            $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios JOIN tbl_alta_baja ON tbl_usuarios.idtbl_usuarios=tbl_alta_baja.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_perfiles.idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles WHERE tbl_alta_baja.tipo = 'alta' AND tbl_usuarios.tipo = 'interno' AND tbl_alta_baja.fecha <= LAST_DAY('$fecha')" . $condicion_departamento);
            $altas = $query->result()[0]->total;
            $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios JOIN tbl_alta_baja ON tbl_usuarios.idtbl_usuarios=tbl_alta_baja.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_perfiles.idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles WHERE tbl_alta_baja.tipo = 'baja' AND tbl_usuarios.tipo = 'interno' AND tbl_alta_baja.fecha <= LAST_DAY('$fecha')" . $condicion_departamento);
            $bajas = $query->result()[0]->total;
            $data[$r] = $altas - $bajas;
        }
        return $data;
    }

    public function contratacionesPorAnioMes($anio){
        $condicion_departamento = "";
        if($this->input->post("departamento") != ""){
            $condicion_departamento = " AND tbl_perfiles.tbl_departamentos_idtbl_departamentos = " . $this->input->post("departamento");
        }
        $query = $this->db->query("SELECT YEAR(date(tbl_alta_baja.fecha)) anio, MONTH(date(tbl_alta_baja.fecha)) mes, COUNT(*) total FROM tbl_usuarios JOIN tbl_alta_baja ON tbl_usuarios.idtbl_usuarios=tbl_alta_baja.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_perfiles.idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles WHERE tbl_alta_baja.tipo = 'alta' AND tbl_usuarios.tipo = 'interno' AND YEAR(date(tbl_alta_baja.fecha)) = " . $anio . $condicion_departamento . " AND MONTH(date(tbl_alta_baja.fecha)) IN ('01','02','03','04','05','06','07','08','09','10','11','12') GROUP BY YEAR(date(tbl_alta_baja.fecha)), MONTH(date(tbl_alta_baja.fecha))");
        return $query->result();
    }

    public function salidasPorAnioMes($anio){
        $condicion_departamento = "";
        if($this->input->post("departamento") != ""){
            $condicion_departamento = " AND tbl_perfiles.tbl_departamentos_idtbl_departamentos = " . $this->input->post("departamento");
        }
        $query = $this->db->query("SELECT YEAR(date(tbl_alta_baja.fecha)) anio, MONTH(date(tbl_alta_baja.fecha)) mes, COUNT(*) total FROM tbl_usuarios JOIN tbl_alta_baja ON tbl_usuarios.idtbl_usuarios=tbl_alta_baja.tbl_usuarios_idtbl_usuarios LEFT JOIN tbl_perfiles ON tbl_perfiles.idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles WHERE tbl_alta_baja.tipo = 'baja' AND tbl_usuarios.tipo = 'interno' AND YEAR(date(tbl_alta_baja.fecha)) = " . $anio . $condicion_departamento . " AND MONTH(date(tbl_alta_baja.fecha)) IN ('01','02','03','04','05','06','07','08','09','10','11','12') GROUP BY YEAR(date(tbl_alta_baja.fecha)), MONTH(date(tbl_alta_baja.fecha))");
        return $query->result();
    }

    public function sueldoBrutoPorMes(){
        $query = $this->db->query("SELECT FORMAT(SUM(REPLACE(REPLACE(sueldo_bruto_mensual,'$',''),',','')), 2) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1 AND sueldo_bruto_mensual IS NOT NULL AND sueldo_bruto_mensual != ''");
        return $query->result()[0]->total;
    }

    public function edadPorRangos(){
        $datos = ['femenino'=>[], 'masculino' => []];
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1 AND sexo = 'FEMENINO' AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 30");
        array_push($datos['femenino'], $query->result()[0]->total);
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1 AND sexo = 'MASCULINO' AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 30");
        array_push($datos['masculino'], $query->result()[0]->total);
        
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1 AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 30 AND sexo = 'FEMENINO' AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) <= 49");
        array_push($datos['femenino'], $query->result()[0]->total);
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1 AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 30 AND sexo = 'MASCULINO' AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) <= 49");
        array_push($datos['masculino'], $query->result()[0]->total);

        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1 AND sexo = 'FEMENINO' AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) > 49");
        array_push($datos['femenino'], $query->result()[0]->total);
        $query = $this->db->query("SELECT COUNT(*) total FROM tbl_usuarios WHERE tipo = 'interno' AND estatus = 1 AND sexo = 'MASCULINO' AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) > 49");
        array_push($datos['masculino'], $query->result()[0]->total);
        return $datos;
    }

    public function sueldosNetoPorMes(){
        $query = $this->db->query("SELECT FORMAT(SUM(REPLACE(REPLACE(sueldo_neto_mensual,'$',''),',','')),2) total FROM tbl_usuarios WHERE sueldo_neto_mensual IS NOT NULL AND sueldo_neto_mensual != '' AND tipo = 'interno' AND estatus = 1");
        return $query->result()[0]->total;
    }

    public function sueldoBrutoMesDepartamento(){
        $query = $this->db->query("SELECT tbl_departamentos.departamento, SUM(REPLACE(REPLACE(sueldo_bruto_mensual,'$',''),',','')) total FROM tbl_usuarios JOIN ctl_contratos ON tbl_usuarios.ctl_contratos_idctl_contratos = ctl_contratos.idctl_contratos JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos WHERE tipo = 'interno' AND estatus = 1 AND sueldo_bruto_mensual IS NOT NULL AND sueldo_bruto_mensual != '' GROUP BY tbl_departamentos.idtbl_departamentos");
        return $query->result();
    }

    public function sueldoNetoMesDepartamento(){
        $query = $this->db->query("SELECT tbl_departamentos.departamento, SUM(REPLACE(REPLACE(sueldo_neto_mensual,'$',''),',','')) total FROM tbl_usuarios JOIN ctl_contratos ON tbl_usuarios.ctl_contratos_idctl_contratos = ctl_contratos.idctl_contratos JOIN tbl_empresas ON tbl_empresas.idtbl_empresas = ctl_contratos.tbl_empresas_idtbl_empresas JOIN tbl_perfiles ON tbl_usuarios.tbl_perfiles_idtbl_perfiles=tbl_perfiles.idtbl_perfiles JOIN tbl_departamentos ON tbl_perfiles.tbl_departamentos_idtbl_departamentos=tbl_departamentos.idtbl_departamentos WHERE tipo = 'interno' AND estatus = 1 AND sueldo_neto_mensual IS NOT NULL AND sueldo_neto_mensual != '' GROUP BY tbl_departamentos.departamento");
        return $query->result();
    }

    public function getEmpalmadores() {
        $query = $this->db->query("SELECT * FROM tbl_usuarios WHERE puesto_contrato = 'Empalmador' AND tipo = 'interno'");
        return $query->result();
    }

    public function getAuxiliaresEmpalmes() {
        $query = $this->db->query("SELECT * FROM tbl_usuarios WHERE puesto_contrato = 'AUXILIAR DE EMPALMES' AND tipo = 'interno'");
        return $query->result();
    }

    public function getSupervisores() {
        $query = $this->db->query("SELECT * FROM tbl_users WHERE tipo = 9");
        return $query->result();
    }

    public function fuenteEmpleos(){
        $query = $this->db->query("SELECT ctl_fuente_empleos.descripcion, COUNT(*) total FROM ctl_fuente_empleos JOIN tbl_usuarios ON ctl_fuente_empleos.idctl_fuente_empleos = tbl_usuarios.ctl_fuente_empleos_idctl_fuente_empleos WHERE tipo = 'interno' AND estatus = 1 GROUP by ctl_fuente_empleos.idctl_fuente_empleos");
        return $query->result();
    }

    public function totalFuenteEmpleos() {
        $query = $this->db->query("SELECT COUNT(*) total FROM ctl_fuente_empleos JOIN tbl_usuarios ON ctl_fuente_empleos.idctl_fuente_empleos = tbl_usuarios.ctl_fuente_empleos_idctl_fuente_empleos WHERE tipo = 'interno' AND estatus = 1");
        return $query->result()[0]->total;
    }

    public function totalEmpleadosPorAnio($anio){
        $condicion_departamento = "";
        if($this->input->post("departamento") != ""){
            $condicion_departamento = " AND tbl_perfiles.tbl_departamentos_idtbl_departamentos = " . $this->input->post("departamento");
        }
        $query = $this->db->query("SELECT COUNT(*) total FROM `tbl_usuarios` LEFT JOIN tbl_perfiles ON tbl_perfiles.idtbl_perfiles = tbl_usuarios.tbl_perfiles_idtbl_perfiles  WHERE YEAR(date(fecha_ingreso)) <= " . $anio . " AND tipo = 'interno' AND estatus = 1 " . $condicion_departamento);
        return $query->result()[0]->total;
    }
    
    public function establecimientos(){
        $query = $this->db->query("SELECT * FROM ctl_establecimientos");
        return $query->result();
    }

    public function totalEmpleadosPorEstablecimiento(){
        $query = $this->db->query("SELECT ctl_establecimientos.establecimiento, COUNT(*) total FROM tbl_usuarios JOIN ctl_establecimientos ON ctl_establecimientos.idctl_establecimiento = tbl_usuarios.establecimiento WHERE tbl_usuarios.tipo = 'interno' AND tbl_usuarios.estatus = 1 GROUP BY ctl_establecimientos.idctl_establecimiento;");
        return $query->result();
    }

    public function getEncuestaBaja($idtbl_usuarios){
        $this->db->from("tbl_alta_baja");
        $this->db->join("tbl_encuestas_baja", "tbl_alta_baja.idtbl_alta_baja =  tbl_encuestas_baja.tbl_alta_baja_idtbl_alta_baja", "left");
        $this->db->where("tbl_alta_baja.tbl_usuarios_idtbl_usuarios", $idtbl_usuarios);
        $this->db->where("tbl_alta_baja.tipo", "baja");
        $this->db->order_by("tbl_alta_baja.fecha_creacion", "DESC");
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function documentos_catalogo(){
        $query = $this->db->get("tbl_documentos");
        return $query->result(); 
    }

    public function cursos(){
        $query = $this->db->get("tbl_cursos");
        return $query->result(); 
    }

}
