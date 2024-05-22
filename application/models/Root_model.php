<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Root_model extends CI_Model {
  public function __construct() {
		parent::__construct();
		$this->load->database();
  }

	public function nuevousuario($pass) {
    $this->db->trans_begin();
    $opciones = [
      'cost' => 11
    ];
    $data = array(
      'username' => $this->input->post('username'),
      'password' => password_hash($pass, PASSWORD_BCRYPT, $opciones),
      'nombre' => $this->input->post('nombre'),
      'tipo' => $this->input->post('tipo'),
      'permiso_autorizar' => $this->input->post('permiso_autorizar')
    );
    $this->db->insert('tbl_users', $data);
    $insert_id = $this->db->insert_id();
    foreach ($this->input->post('ctl_tipo_permiso_idctl_tipo_permiso') as $key => $value) {
      if($value!=="0") {
        $data = array(
          'tbl_users_idtbl_users' => $insert_id,
          'ctl_permisos_idctl_permisos' => $this->input->post('ctl_permisos_idctl_permisos')[$key],
          'ctl_tipo_permiso_idctl_tipo_permiso' => $value,
        );
        $this->db->insert('dtl_permisos_users', $data);
      }
    }

		if ($this->db->trans_status() === FALSE) {
		        $this->db->trans_rollback();
		        return false;
		} else {
      $this->db->trans_commit();
      return true;
    }
  }

  public function getStatus(){
    $this->db->select('estatus');
    $this->db->from('tbl_users');
    $this->db->where('idtbl_users', $this->session->userdata('id'));
    $query = $this->db->get();

    return $query->result()[0]->estatus;
  }

  public function nuevo_usuario_general($pass) {
    $this->db->trans_begin();
    $opciones = [
      'cost' => 11
    ];
    $data = array(
      'username' => $this->input->post('email_personal'),
      'password' => password_hash($pass, PASSWORD_BCRYPT, $opciones),
      'nombre' => $this->input->post('nombres') . ' ' . $this->input->post('apellido_paterno') . ' ' . $this->input->post('apellido_materno'),
      'tipo' => 22,
      'permiso_autorizar' => 'no'
    );
    $this->db->insert('tbl_users', $data);

		if ($this->db->trans_status() === FALSE) {
		        $this->db->trans_rollback();
		        return false;
		} else {
      $this->db->trans_commit();
      return true;
    }
  }

  public function actualizarusuario() {
    $this->db->trans_begin();
    $data = array(
      'username' => $this->input->post('username'),
      'nombre' => $this->input->post('nombre'),
      'tipo' => $this->input->post('tipo'),
      'permiso_autorizar' => $this->input->post('permiso_autorizar'),
      'jefe_area' => $this->input->post('jefe_area'),
      'tbl_usuarios_idtbl_usuarios' => $this->input->post('idtbl_usuarios')
    );
    $this->db->set($data);
    $this->db->where('idtbl_users',$this->input->post('id'));
    $result=$this->db->update('tbl_users');
    $this->db->where('tbl_users_idtbl_users',$this->input->post('id'));
    $this->db->delete('dtl_permisos_users');
    foreach ($this->input->post('ctl_tipo_permiso_idctl_tipo_permiso') as $key => $value) {
      if($value!=="0") {
        $data = array(
          'tbl_users_idtbl_users' => $this->input->post('id'),
          'ctl_permisos_idctl_permisos' => $this->input->post('ctl_permisos_idctl_permisos')[$key],
          'ctl_tipo_permiso_idctl_tipo_permiso' => $value,
        );
        $this->db->insert('dtl_permisos_users', $data);
      }
    }
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return false;
		} else {
      $this->db->trans_commit();
      return true;
    }
  }
  public function actualizarModulosUsuario() {
    $this->db->trans_begin();
    $this->db->where('tbl_users_idtbl_users',$this->input->post('id'));
    $this->db->delete('tbl_modulos_users');
    foreach ($this->input->post('ctl_tipo_permiso_idctl_tipo_permiso') as $key => $value) {
      if($value!=="0") {
        $data = array(
          'tbl_users_idtbl_users' => $this->input->post('id'),
          'ctl_modulo_tipo_users_idctl_modulo_tipo_users' => $this->input->post('ctl_modulo_tipo_users_idctl_modulo_tipo_users')[$key]          
        );
        $this->db->insert('tbl_modulos_users', $data);
      }
    }
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return false;
		} else {
      $this->db->trans_commit();
      return true;
    }
  }
  public function actualizarEncargados() {
    $this->db->trans_begin();    
    $this->db->where('tbl_users_idtbl_users',$this->input->post('id'));
    $this->db->delete('tbl_encargado_almacen');
    foreach ($this->input->post('idtbl_almacenes') as $key => $value) {
      if($this->input->post('tbl_encargado_almacen')[$key] !== "0") {
        $data = array(
          'tbl_almacenes_idtbl_almacenes' => $value,
          'tbl_users_idtbl_users' => $this->input->post('id'),          
        );
        $this->db->insert('tbl_encargado_almacen', $data);
      }
    }
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return false;
		} else {
      $this->db->trans_commit();
      return true;
    }
  }

  //Actualiza los permisos en base a otro usuario
  public function actualizarPermisos($tipo) {
    $this->db->trans_begin();
    
    //$this->db->where('tbl_users_idtbl_users',$this->session->userdata('id'));
    //$this->db->delete('dtl_permisos_users');

    //Condiciones para convertir el usuario de dirección en otro perfil
    if($this->session->userdata('tipo') != 23){
    $query = $this->db->query("SELECT idtbl_users FROM tbl_users WHERE tipo = $tipo AND jefe_area = 1");
    }elseif($tipo == 4){
      $query = $this->db->query("SELECT idtbl_users FROM tbl_users WHERE tipo = $tipo AND jefe_area = 1");
    }else{
      $query = $this->db->query("SELECT idtbl_users FROM tbl_users WHERE tipo = $tipo AND idtbl_users = 19");
    }
    $id_user = $query->result()[0]->idtbl_users;
    
    $where = $id_user;
    if($this->session->userdata('tipo') != 23){
      $this->session->set_userdata('id', $id_user);
    }else{
      $this->session->set_userdata('tipo', $tipo);
    }
    /*if($tipo == 1){
      $where = 3;
      $this->session->set_userdata('id', 3);
    }elseif($tipo == 3){
      $where = 66;
      $this->session->set_userdata('id', 66);
    }elseif($tipo == 4){
      $where = 18;
      $this->session->set_userdata('id', 18);
    }elseif($tipo == 5){
      $where = 2;
      $this->session->set_userdata('id', 2);
    }elseif($tipo == 6){
      $where = 6;
      $this->session->set_userdata('id', 6);
    }elseif($tipo == 7){
      $where = 15;
      $this->session->set_userdata('id', 15);
    }elseif($tipo == 10){
      $where = 34;
      $this->session->set_userdata('id', 34);
    }elseif($tipo == 11){
      $where = 35;
      $this->session->set_userdata('id', 35);
    }elseif($tipo == 12){
      $where = 17;
      $this->session->set_userdata('id', 17);
    }elseif($tipo == 14){
      $where = 69;
      $this->session->set_userdata('id', 69);
    }elseif($tipo == 15){
      $where = 98;
      $this->session->set_userdata('id', 98);
    }elseif($tipo == 20){
      $where = 121;
      $this->session->set_userdata('id', 121);
    }elseif($tipo == 19){
      $where = 107;
      $this->session->set_userdata('id', 107);
    }*/

    $this->db->from('dtl_permisos_users');
    $this->db->where('tbl_users_idtbl_users', $where);
    $permisos = $this->db->get()->result();

    $array = Array();

    foreach ($permisos as $value) {
        $data = array(
          'tbl_users_idtbl_users' => $this->session->userdata('id'),
          'ctl_permisos_idctl_permisos' => $value->ctl_permisos_idctl_permisos,
          'ctl_tipo_permiso_idctl_tipo_permiso' => $value->ctl_tipo_permiso_idctl_tipo_permiso,
        );
        //$this->db->insert('dtl_permisos_users', $data);
      
        $this->db->from('ctl_permisos');
        $this->db->where('idctl_permisos', $value->ctl_permisos_idctl_permisos);
        $nombre_permiso = $this->db->get()->result()[0]->permiso;
        
        $array[$nombre_permiso] = $value->ctl_tipo_permiso_idctl_tipo_permiso;        
    
    }

    $this->session->set_userdata("permisos", $array);

    if($tipo == 3){
      $this->db->from('tbl_modulos_users');
      $this->db->where('tbl_users_idtbl_users', $where);
      $permisos_modulos = $this->db->get()->result();

      $array_modulos = Array();

      foreach ($permisos_modulos as $value) {
        
          $this->db->from('ctl_modulo_tipo_users');
          $this->db->where('idctl_modulo_tipo_users', $value->ctl_modulo_tipo_users_idctl_modulo_tipo_users);
          $nombre_modulo = $this->db->get()->result()[0]->modulo;
          
          $array_modulos[$nombre_modulo] = $value->ctl_modulo_tipo_users_idctl_modulo_tipo_users;        
      
      }

      $this->session->set_userdata("modulos", $array_modulos);
    }

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return false;
		} else {
      $this->db->trans_commit();
      return true;
    }
  }

  //Actualiza los permisos en base a tipo de modulo
  public function actualizarPermisosModulo($modulo) {
    $this->db->trans_begin();        

    $this->db->from('tbl_modulos_permisos');
    $this->db->where('ctl_modulo_tipo_users_idctl_modulo_tipo_users', $modulo);
    $permisos = $this->db->get()->result();

    $array = Array();

    foreach ($permisos as $value) {
        $data = array(
          'tbl_users_idtbl_users' => $this->session->userdata('id'),
          'ctl_permisos_idctl_permisos' => $value->ctl_permisos_idctl_permisos,
          'ctl_tipo_permiso_idctl_tipo_permiso' => $value->ctl_tipo_permiso_idctl_tipo_permiso,
        );        
      
        $this->db->from('ctl_permisos');
        $this->db->where('idctl_permisos', $value->ctl_permisos_idctl_permisos);
        $nombre_permiso = $this->db->get()->result()[0]->permiso;
        
        $array[$nombre_permiso] = $value->ctl_tipo_permiso_idctl_tipo_permiso;        
    
    }

    $this->session->set_userdata("permisos", $array);

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return false;
		} else {
      $this->db->trans_commit();
      return true;
    }
  }
  public function permisos() {
    $query = $this->db->query("SELECT * FROM `ctl_permisos`");
    return $query->result();
  }
  public function usuarios($buscar='', $inicio = false, $cantidadRegistro = false) {
    $limit = '';
    $condition = '';
    if($inicio !== false && $cantidadRegistro !== false) {
        $limit = 'LIMIT ' . $inicio . "," . $cantidadRegistro;
    }
    if($this->session->userdata('tipo') == 5){
      $condition = " tbl_users.idtbl_users <> 1 AND ";
    }
    //$this->db->select('tbl_users.idtbl_users AS uid, tbl_users.nombre, tbl_users.username, ctl_tipo_users.tipo');
    //$this->db->join('ctl_tipo_users', 'ctl_tipo_users.idctl_tipo_users = tbl_users.tipo');
    //return $this->db->get('tbl_users')->result_array();
    $query = $this->db->query("SELECT tbl_users.idtbl_users AS uid, tbl_users.nombre, tbl_users.username, ctl_tipo_users.tipo, tbl_users.estatus FROM tbl_users INNER JOIN ctl_tipo_users ON ctl_tipo_users.idctl_tipo_users = tbl_users.tipo WHERE $condition (tbl_users.nombre like '%$buscar%' OR tbl_users.username LIKE '%$buscar%' OR ctl_tipo_users.tipo LIKE '%$buscar%') " . $limit);
    return $query->result();
  }
  public function tipos() {
    $query = $this->db->query("SELECT * FROM `ctl_tipo_users`");
    $result = $query->result();
    return $result;
  }
  public function usuario($id) {
    $query = $this->db->query("SELECT * FROM `tbl_users` WHERE `idtbl_users` ='$id'");
    $result = $query->result();
    foreach ($result as $key => $value) {
      $value->permisos=$this->db->query("SELECT * FROM `dtl_permisos_users` WHERE `tbl_users_idtbl_users` ='$value->idtbl_users'")->result();
    }
    foreach ($result as $key => $value) {
      $value->modulos=$this->db->query("SELECT * FROM `tbl_modulos_users` WHERE `tbl_users_idtbl_users` ='$value->idtbl_users'")->result();
    }
    return $result[0];
  }

  public function getModulos($tipo) {
    $query = $this->db->query("SELECT * FROM `ctl_modulo_tipo_users` WHERE ctl_tipo_users_idctl_tipo_users = $tipo");
    $result = $query->result();
    return $result;
  }

  public function usuario_encargado($id) {
    $query = $this->db->query("SELECT * FROM `tbl_users` WHERE `idtbl_users` ='$id'");
    $result = $query->result();
    foreach ($result as $key => $value) {
      $value->permisos=$this->db->query("SELECT * FROM `tbl_encargado_almacen` WHERE `tbl_users_idtbl_users` ='$value->idtbl_users'")->result();
    }
    return $result[0];
  }


  public function updatePassword($id,$parametro) {
    $this->db->where('idtbl_users',$id);
    $query = $this->db->update('tbl_users',$parametro);
    $ret = false;
    if($query) {
        $ret = true;
    }
    return $ret;
  }

  public function activar_usuario(){
		$data = array(
			'estatus' => 1
		);
		$this->db->set($data);
		$this->db->where('idtbl_users', $this->input->post('uid'));
		$result = $this->db->update('tbl_users');
		return  $result;

	}

	public function desactivar_usuario(){		
		$data = array(
			'estatus' => 0
		);
		$this->db->set($data);
		$this->db->where('idtbl_users', $this->input->post('uid'));
		$result = $this->db->update('tbl_users');
		return  $result;

	}


  public function indicadorEstatusAutosControlVehicular($estatus, $conteo = false){
    $query = null;
    $marca = $this->input->post('marca');
    $modelo = $this->input->post('modelo');
    $condition = "";
    if($marca != ""){
      $condition = " AND tbl_catalogo.marca = '$marca'";
      if($modelo != ""){
        $condition = $condition . " AND tbl_catalogo.modelo = '$modelo'";
      }
    }
    if(!$conteo){
      $query = $this->db->query("SELECT dtl_almacen.estatus, COUNT(*) AS total FROM dtl_almacen JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_almacen.tbl_catalogo_idtbl_catalogo WHERE tbl_catalogo.categoria_vehiculo = '$estatus' AND tbl_catalogo.ctl_categorias_idctl_categorias = 16 AND tbl_catalogo.tipo = 4 AND tbl_catalogo.descripcion != 'PERSONAL' $condition GROUP BY dtl_almacen.estatus");
      return $query->result();
    }else{
      $query = $this->db->query("SELECT COUNT(*) AS total FROM dtl_almacen JOIN tbl_catalogo ON tbl_catalogo.idtbl_catalogo = dtl_almacen.tbl_catalogo_idtbl_catalogo WHERE tbl_catalogo.categoria_vehiculo = '$estatus' AND tbl_catalogo.ctl_categorias_idctl_categorias = 16 AND tbl_catalogo.tipo = 4 AND tbl_catalogo.descripcion != 'PERSONAL' $condition");
      return $query->result()[0]->total;
    }
  }

}