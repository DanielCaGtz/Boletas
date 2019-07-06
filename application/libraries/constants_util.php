<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class constants_util extends CI_Model {

	public $CI;
	
	public function __construct(){
		$this->CI = & get_instance();
	}

	public function getConstant($name) {
		$this->CI->load->database();
		$result=$this->CI->db->query("SELECT * from constantes LIMIT 1;");
		return $result->num_rows() > 0 ?
			( array_key_exists($name, $result->result_array()[0]) ?
				$result->result_array()[0][$name] :
				FALSE ) :
			FALSE;
	}
}

?>