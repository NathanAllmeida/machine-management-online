<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinas extends CI_Controller {

	public function index()	{
		$this->template->write_view('menu','general/menu','',FALSE);		
		$this->template->write_view('content','general/maquinas','',FALSE);
		$this->template->render();
	}

	public function Listar(){		
		$this->load->model('Maquinas_model');
		$result = $this->Maquinas_model->Lista();		
		
		echo json_encode(array('data'=>$result));
	}
	public function ListarHistorico(){		
		$this->load->model('Maquinas_model');
		$this->load->model('Status_model');

		$data_machines = $this->Maquinas_model->Lista();		
		$data_status = $this->Status_model->Lista();
		$data = $this->Maquinas_model->ListaHistorico();	

		$data_machines_n = array();
		foreach ($data_machines as $machine) {
			$data_machines_n[$machine['idmaquina']] = $machine;
		}

		$data_status_n = array();
		foreach ($data_status as $status) {
			$data_status_n[$status['idstatus']] = $status;
		}

		$result = array();			
		foreach ($data as $historico) {
			$array = array();
			$array['nome_maquina'] = $data_machines_n[$historico['maquina']]['nome'];		
			$array['data_status'] = $historico['data_status'];
			$array['codigo'] = $data_status_n[$historico['status']]['codigo'];
			$array['nome_status'] = $data_status_n[$historico['status']]['nome'];
			array_push($result, $array);
		}
		
		echo json_encode(array('data'=>$result));
	}

	public function Adicionar(){		
		$nome = $this->input->post('nome');		

		$data_i = array(
			'nome' => $nome,			
		);		

		$this->load->model('Maquinas_model');
		$result_i = $this->Maquinas_model->Adiciona($data_i);

		if ($result_i) {
			echo json_encode(array('result'=>'success'));
		}else{
			echo json_encode(array('result'=>'error'));
		}

	}
	public function AdicionarHistorico(){		
		date_default_timezone_set('America/Sao_Paulo');
		$this->load->model('Maquinas_model');
		$this->load->model('Status_model');

		$data_machines = $this->Maquinas_model->Lista();
		$data_status = $this->Status_model->Lista();
		
		$data_i_historic = array();
		foreach ($data_machines as $machine) {
			$index_status = array_rand($data_status,1);
			$data = array(
				'maquina' => $machine['idmaquina'],
				'status' => $data_status[$index_status]['idstatus'],
				'data_status' => date('Y-m-d H:i:s')
			);

			array_push($data_i_historic,$data);
		}	

		$result_i = $this->Maquinas_model->AdicionaHistorico($data_i_historic);

		if ($result_i) {
			echo json_encode(array('result'=>'success'));
		}else{
			echo json_encode(array('result'=>'error'));
		}

	}
	public function Alterar(){
		$id = $this->input->post('idmaquina');
		$nome = $this->input->post('nome');
		
		$data_u = array(
			'nome' => $nome,			
		);		

		$this->load->model('Maquinas_model');
		$result_u = $this->Maquinas_model->Altera($data_u,$id);

		if ($result_u) {
			echo json_encode(array('result'=>'success'));
		}else{
			echo json_encode(array('result'=>'error'));
		}
	}
	public function Deletar(){
		$id = $this->input->post('idmaquina');

		$this->load->model('Maquinas_model');
		$data_d_m = array(
			'idmaquina' => $id,			
		);
		$data_d_h = array(
			'maquina' => $id,			
		);	
		$result_d_h = $this->Maquinas_model->DeletaHistorico($data_d_h);
		if ($result_d_h) {
			$result_d_m = $this->Maquinas_model->Deleta($data_d_m);
			if ($result_d_m) {
				echo json_encode(array('result'=>'success'));
			}else{
				echo json_encode(array('result'=>'error'));
			}
		}else{
			echo json_encode(array('result'=>'error'));

		}
	}

}
