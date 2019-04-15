<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	public function index()	{
		$this->template->write_view('menu','general/menu','',FALSE);		
		$this->template->write_view('content','general/status','',FALSE);
		$this->template->render();
	}

	public function Listar(){		
		$this->load->model('Status_model');
		$result = $this->Status_model->Lista();		
		
		echo json_encode(array('data'=>$result));
	}

	public function Adicionar(){		
		$codigo = $this->input->post('codigo');		
		$nome = $this->input->post('nome');		

		$data_i = array(
			'codigo' => $codigo,			
			'nome' => $nome,			
		);		

		$this->load->model('Status_model');
		$result_i = $this->Status_model->Adiciona($data_i);

		if ($result_i) {
			echo json_encode(array('result'=>'success'));
		}else{
			echo json_encode(array('result'=>'error'));
		}

	}
	public function Alterar(){
		$id = $this->input->post('idstatus');
		$codigo = $this->input->post('codigo');
		$nome = $this->input->post('nome');
		
		$data_u = array(
			'codigo' => $codigo,			
			'nome' => $nome,			
		);		

		$this->load->model('Status_model');
		$result_u = $this->Status_model->Altera($data_u,$id);

		if ($result_u) {
			echo json_encode(array('result'=>'success'));
		}else{
			echo json_encode(array('result'=>'error'));

		}
	}
	public function Deletar(){
		$id = $this->input->post('idstatus');

		$this->load->model('Status_model');
		$data_d_s = array(
			'idstatus' => $id,			
		);	
		$data_d_h = array(
			'status' => $id,			
		);	
		$result_d_h = $this->Status_model->DeletaHistorico($data_d_h);

		if ($result_d_h) {
			$result_d_s = $this->Status_model->Deleta($data_d_s);
			if ($result_d_s) {
				echo json_encode(array('result'=>'success'));
			}else{
				echo json_encode(array('result'=>'error'));
			}
		}else{
			echo json_encode(array('result'=>'error'));

		}
	}

}
