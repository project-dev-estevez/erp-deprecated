<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class CsvModel extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function existNeodata($neodata) {
		$query = $this->db->query("SELECT neodata FROM tbl_catalogo WHERE neodata = '$neodata'");
		return $query->num_rows();
	}

	public function getIdTblCatalogo($neodata) {
		$query = $this->db->query("SELECT idtbl_catalogo FROM tbl_catalogo WHERE neodata = '$neodata'");
		foreach ($query->result() as $row) {
			return $row->idtbl_catalogo;
		}
	}

	public function existIdTblCatalogo($idtbl_catalogo) {
		$query = $this->db->query("SELECT tbl_catalogo_idtbl_catalogo FROM dtl_almacen WHERE tbl_catalogo_idtbl_catalogo = $idtbl_catalogo");
		return $query->num_rows();
	}

	public function existIdTblCatalogoTbl($idtbl_catalogo) {
		$query = $this->db->query("SELECT idtbl_catalogo FROM tbl_catalogo WHERE idtbl_catalogo = $idtbl_catalogo");
		return $query->num_rows();
	}

}