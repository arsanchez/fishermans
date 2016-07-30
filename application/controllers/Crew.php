<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crew extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('crew_model');
	}

	public function index() 
	{
		$data = array('header_title' => 'Miembros de la tripulaci&oacute;n');
		$this->load->view('crew/crew_list',$data);
	}

	public function new_crew()
	{
		$data = array('header_title' => "Nuevo miembro");
		$this->load->view('crew/new_crew',$data);
		
	}

	
}
