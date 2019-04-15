<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulador extends CI_Controller {

	public function index()	{
		$this->template->write_view('menu','general/menu','',FALSE);		
		$this->template->write_view('content','general/simulador','',FALSE);
		$this->template->render();
	}

}
