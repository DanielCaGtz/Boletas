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

  /* UTILITIES FOR DATABASE CONNECTION */
  public function get_data ($select = '', $from = '', $where = '', $order = '', $group = '', $limit = '') {
		return $this->mdldb->getData($select, $from, $where, $order, $group, $limit);
	}

	public function get_data_single ($col = '', $select = '', $from = '', $where = '', $order = '', $group = '', $limit = '') {
		$data = $this->get_data($select, $from, $where, $order, $group, $limit);
		if ($data && is_array($data)) {
			$data = $data[0];
			if (array_key_exists($col, $data)) {
				return $data[$col];
			}
		}
		return FALSE;
	}
  
}

?>