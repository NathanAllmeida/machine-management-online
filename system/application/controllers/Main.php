<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()	{
		$this->template->write_view('menu','general/menu','',FALSE);		
		$this->template->write_view('content','general/content','',FALSE);
		$this->template->render();
	}
}
