<?php

class ctrDb extends MX_Controller {

	function __construct () {
		parent::__construct();
		$this->load->model('mdldb');
		date_default_timezone_set('America/Mexico_City');
		$this->load->library('constants_util');
  }

  public function get_self () {
    return $this;
	}
	
	public function log_activity ($actividad, $id_usuario, $tabla = '', $id = 0) {
		$data = array(
			'actividad' => $actividad,
			'usuarios_boletas_id' => $id_usuario,
			'date_time' => date('Y-m-d H:i:s')
		);
		switch ($actividad) {
			case 'login':
				$id = $this->mdldb->insertData($data, 'log_activity');
				return $id > 0 ? TRUE : FALSE;
			break;
		}
	}

  /* UTILITIES FOR DATABASE CONNECTION */
  public function get_data ($select = '', $from = '', $where = '', $order = '', $group = '', $limit = '') {
		return $this->mdldb->getData($select, $from, $where, $order, $group, $limit);
	}

	public function get_data_single_result ($col = '', $select = '', $from = '', $where = '', $order = '', $group = '', $limit = '') {
		$data = $this->get_data($select, $from, $where, $order, $group, $limit);
		if ($data && is_array($data)) {
			$data = $data[0];
			if (array_key_exists($col, $data)) {
				return $data[$col];
			}
		}
		return FALSE;
	}

	public function get_data_single_row ($select = '', $from = '', $where = '', $order = '', $group = '', $limit = '') {
		$data = $this->get_data($select, $from, $where, $order, $group, $limit);
		if ($data && is_array($data)) {
			return $data[0];
		}
		return FALSE;
	}

	public function get_data_from_query ($query) {
		return $this->mdldb->getDataFromQuery($query);
	}

	public function get_data_from_query_single_result ($col, $query) {
		$data = $this->get_data_from_query($query);
		if ($data && is_array($data)) {
			$data = $data[0];
			if (array_key_exists($col, $data)) {
				return $data[$col];
			}
		}
		return FALSE;
	}

	public function get_data_from_query_single_row ($query) {
		$data = $this->get_data_from_query($query);
		if ($data && is_array($data)) {
			return $data[0];
		}
		return FALSE;
	}

	public function check_permisos ($permiso = '') {
		$dataAdmin = $this->get_data('id', 'permisos', array(
			'usuarios_boletas_id' => $this->session->userdata('id'),
			'active' => 1,
			'nombre' => 'admin'
		));
		if ($dataAdmin) {
			return TRUE;
		}
		$data = $this->get_data('id', 'permisos', array(
			'usuarios_boletas_id' => $this->session->userdata('id'),
			'active' => 1,
			'nombre' => $permiso
		));
		if ($data) {
			return TRUE;
		}
		return FALSE;
	}
  
}

?>