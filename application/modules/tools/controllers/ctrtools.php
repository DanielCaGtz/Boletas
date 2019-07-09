<?php

class CtrTools extends MX_Controller{
	
	function __construct () {
		parent::__construct();
		// $this->load->library('archivos');
		$this->ruta=FILE_ROUTE_FULL."files";
		#$this->files_allowed='gif|jpg|png|jpeg|doc|docx|pdf';
		$this->files_allowed = 'xlsx|xls';
	}

	public function get_school_name () {
		$data = Modules::run('ctrdb/get_data_single_result', 'alias', 'alias', 'escuelas', array(
			'id' => $this->session->userdata('escuelas_id')
		));
		if ($data) return $data;
		return FALSE;
	}

	public function consulta_uri ($txt) {
		$url = explode('/', $_SERVER["REQUEST_URI"]);
		$url = $url[count($url) - 1];
		foreach ($txt AS $item) {
			if ($item === $url) {
				return "active";
			}
		}
	}

	public function get_self () {
		return $this;
	}
	
	public function doupload($name){
		#print_r($_FILES[$name]);
		$result=array();
		$succ=TRUE;
		foreach($_FILES[$name]["name"] AS $e=>$key){
			$temp=array(
				"name"		=>$_FILES[$name]["name"][$e],
				"type"		=>$_FILES[$name]["type"][$e],
				"tmp_name"	=>$_FILES[$name]["tmp_name"][$e],
				"error"		=>$_FILES[$name]["error"][$e],
				"size"		=>$_FILES[$name]["size"][$e]
			);
			$respuesta = $this->archivos->guardarArchivo($this->ruta,$temp,$this->files_allowed);
			if($respuesta["success"]==1) $result[$e]=$respuesta["info_data"]["file_name"];
			else $succ=FALSE;
		}
		print json_encode(array("success"=>$succ,"result"=>$result, "error"=>"Hubo un error con el archivo seleccionado. Intente con otro archivo."));
	  	/*
	  	$temp=array(
			"name"		=>$_FILES[$name]["name"][0],
			"type"		=>$_FILES[$name]["type"][0],
			"tmp_name"	=>$_FILES[$name]["tmp_name"][0],
			"error"		=>$_FILES[$name]["error"][0],
			"size"		=>$_FILES[$name]["size"][0]
		);
		$respuesta = $this->archivos->guardarArchivo($this->ruta,$temp,$this->files_allowed);
		print_r($respuesta);
		//print json_encode(array("result"=>$respuesta));
		/* */
	}
	
	public function douploadMasive(){
		$respuesta=array();
		#echo $_SERVER['DOCUMENT_ROOT'];
		foreach($_FILES AS $e=>$key){
		    /*
		    if($key["error"]=="0"&&$key["name"]!="")
		        print_r($_FILES[$e]);
		    else
		        echo "NO OK";
		    /* */
		    //*
			if($key["error"]=="0"&&$key["name"]!=""&&$key["size"]>0)
				$respuesta=array_merge($respuesta,array($this->archivos->guardarArchivo($this->ruta,$_FILES[$e],$this->files_allowed)));
			else
				$respuesta=array_merge($respuesta,array("0"));
			/* */
		}
		print json_encode(array("result"=>$respuesta));
	}

	public function douploadMasive_withNames(){
		$respuesta=array();
		foreach($_FILES AS $e=>$key){
			if($key["error"]=="0"&&$key["name"]!=""&&$key["size"]>0)
				$respuesta=array_merge($respuesta,array($this->archivos->guardarArchivo($this->ruta,$_FILES[$e],$this->files_allowed,$e)));
			else
				$respuesta=array_merge($respuesta,array("0"));
		}
		print json_encode(array("result"=>$respuesta));
	}

}

?>