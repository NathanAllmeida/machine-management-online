<?php

/**
* 
*/
class Maquinas_model extends CI_model{
	
	const TABELA = 'maquina';
	function __construct(){
		parent::__construct();
	}

	public function Lista(){
		$result = $this->db->get(self::TABELA);
		return $result->result_array();
	}
	public function ListaHistorico(){
		$result = $this->db->query('select h.idhistorico,h.status,h.maquina,max(h.data_status) as data_status from (select DISTINCT * from historico ORDER BY `historico`.`idhistorico` DESC) h GROUP by h.maquina');
		return $result->result_array();
	}
	public function Adiciona($data = array()){		
		$result = $this->db->insert(self::TABELA,$data);
		return $result;
	}
	public function AdicionaHistorico($data = array()){		
		$result = $this->db->insert_batch('historico',$data);
		return $result;
	}
	public function Altera($data = array(), $id){
		$this->db->where('idmaquina',$id);
		$result = $this->db->update(self::TABELA,$data);
		return $result;
	}
	public function Deleta($data = array()){		
		$result = $this->db->delete(self::TABELA,$data);
		return $result;
	}
	public function DeletaHistorico($data = array()){		
		$result = $this->db->delete('historico',$data);
		return $result;
	}
}
?>