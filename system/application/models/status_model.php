<?php

/**
* 
*/
class Status_model extends CI_model{
	
	const TABELA = 'situacao';
	function __construct(){
		parent::__construct();
	}

	public function Lista(){
		$result = $this->db->get(self::TABELA);
		return $result->result_array();
	}
	public function Adiciona($data = array()){		
		$result = $this->db->insert(self::TABELA,$data);
		return $result;
	}
	public function Altera($data = array(), $id){
		$this->db->where('idstatus',$id);
		$result = $this->db->update(self::TABELA,$data);
		return $result;
	}
	public function Deleta($data = array()){		
		$result = $this->db->delete(self::TABELA,$data);
		return $result;
	}
}
?>