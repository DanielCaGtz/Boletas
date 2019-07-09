<?php

class MdlDb extends CI_Model {
	
	function __construct () {
    parent::__construct();
    $this->comparison_types = array('equals' => '=', 'not_equals' => '!=', 'greater' => '>', 'lower' => '<');
    // $this->load->library('exceptions');
  }

  public function getData ($select, $from, $where, $order, $group, $limit) {
		$query = "SELECT $select FROM $from ";
		if ($where) {
      $query .= "WHERE ";
      if (is_array($where)) {
        if (!empty($where)) {
          $array_keys_temp = array_keys($where);
          foreach ($where as $key => $value) {
            if (array_search($key, $array_keys_temp) > 0) {
              $query .= 'AND ';
            }
            if (is_array($value)) {
              $query .= $key . $this->comparison_types[$value['comparison_type']] .
                "'".$value['text_to_compare']."' ";
            } else {
              $query .= $key . " = '".$value."' ";
            }
          }
        }
      } else {
        $query .= $where;
      }
    }
		if ($group) $query .= "GROUP BY $group ";
		if ($order) $query .= "ORDER BY $order ";
    if ($limit) $query .= "LIMIT $limit ";
		$result = $this->db->query($query);
    return $result->num_rows() > 0 ?
      $result->result_array() :
      FALSE;
  }

  public function getDataFromQuery ($query) {
		$result = $this->db->query($query);
    return $result->num_rows() > 0 ?
      $result->result_array() :
      FALSE;
	}
  
  public function insertDataBatch ($datos, $tabla) {
		$this->db->insert_batch($tabla, $datos);
    return $this->db->insert_id() > 0 ?
      $this->db->insert_id() :
      FALSE;
	}

	public function insertData ($datos, $tabla) {
		$this->db->insert($tabla,$datos);
		// $this->exceptions->checkForError();
    return $this->db->insert_id() > 0 ?
      $this->db->insert_id() :
      FALSE;
	}
  
}

?>