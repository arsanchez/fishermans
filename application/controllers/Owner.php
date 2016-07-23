<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('owner_model');
	}

	public function index() 
	{
		$data = array('header_title' => $this->lang->line('owners_list'));
		$this->load->view('owner/owner_list',$data);
	}

	public function new_owner()
	{
		$data = array('header_title' => "Nuevo dueño");
		$this->load->view('owner/new_owner',$data);
		
	}

	public function save_owner()
	{
		// TODO validate inputs
		$ownerData = array('identificacion' => $this->input->post('txtNif'),
					  'nombre' => $this->input->post('txtNombre'),
					  'direccion' => $this->input->post('txtDireccion'),
					  'telefono' => $this->input->post('txtTelefono'),
					  'fax' => $this->input->post('txtFax'));
		$result = $this->owner_model->new_owner($ownerData);

		$resultMessage = ($result == true) ? "Dueño guardado" : "Error al guardar";
		$data = array('header_title' => $this->lang->line('owners_list'),'message' => $resultMessage);
		$this->load->view('owner/owner_list',$data);
		
	}

	public function get_owner($id = 0)
	{
		$this->load->model('owner_model');
		$ownerData = array();
		var_dump($this->owner_model->get_owner($id));
	}
}
