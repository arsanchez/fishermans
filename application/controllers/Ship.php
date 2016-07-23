<?php
class Ship extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Ship_model');
	}

	public function index() 
	{
		$data = array('header_title' => $this->lang->line('ship_list'));
		$this->load->view('ship/ship_list',$data);
	}

}
