<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinas extends CI_Controller {

	public function index()	{
		$this->template->write_view('menu','general/menu','',FALSE);		
		$this->template->write_view('content','general/maquinas','',FALSE);
		$this->template->render();
	}

	public function Listar(){		
		$this->load->model('maquinas_model');
		$result = $this->maquinas_model->Lista();		
		
		echo json_encode(array('data'=>$result));
	}
	public function ListarHistorico(){		
		$this->load->model('maquinas_model');
		$result = $this->maquinas_model->ListaHistorico();		
		
		echo json_encode(array('data'=>$result));
	}

	public function Adicionar(){		
		$nome = $this->input->post('nome');		

		$data_i = array(
			'nome' => $nome,			
		);		

		$this->load->model('maquinas_model');
		$result_i = $this->maquinas_model->Adiciona($data_i);

		if ($result_i) {
			echo json_encode(array('result'=>'success'));
		}else{
			echo json_encode(array('result'=>'error'));
		}

	}
	public function AdicionarHistorico(){		
		date_default_timezone_set('America/Sao_Paulo');
		$this->load->model('maquinas_model');
		$this->load->model('status_model');

		$data_machines = $this->maquinas_model->Lista();
		$data_status = $this->status_model->Lista();
		
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

		$result_i = $this->maquinas_model->AdicionaHistorico($data_i_historic);

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

		$this->load->model('maquinas_model');
		$result_u = $this->maquinas_model->Altera($data_u,$id);

		if ($result_u) {
			echo json_encode(array('result'=>'success'));
		}else{
			echo json_encode(array('result'=>'error'));

		}
	}
	public function Deletar(){
		$id = $this->input->post('idmaquina');

		$this->load->model('maquinas_model');
		$data_d = array(
			'idmaquina' => $id,			
		);	
		$result_d = $this->maquinas_model->Deleta($data_d);

		if ($result_d) {
			echo json_encode(array('result'=>'success'));
		}else{
			echo json_encode(array('result'=>'error'));

		}
	}

}
