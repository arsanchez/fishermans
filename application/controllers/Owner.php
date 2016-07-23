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

	public function edit_owner($ownerId)
	{
		$owner = $this->get_owner($ownerId);
		if(!$owner)
		{
			$this->load->view('errors/html/error_404',array('heading' => 'NOT FOUND','message' =>'' ));
			return;
		}
		$data = array('header_title' => "Editar dueño",'owner' => $owner);
		$this->load->view('owner/new_owner',$data);
		
	}

	public function save_owner()
	{
		// TODO validate inputs
		$this->form_validation->set_rules('txtNif', 'NIF', 'required');
		$this->form_validation->set_rules('txtNombre', 'nombre', 'required');
		$this->form_validation->set_rules('txtDireccion', 'Direccion', 'required');
		$this->form_validation->set_rules('txtTelefono', 'Telefono', 'required');


		$ownerData = array('identificacion' => $this->input->post('txtNif'),
					  'nombre' => $this->input->post('txtNombre'),
					  'direccion' => $this->input->post('txtDireccion'),
					  'telefono' => $this->input->post('txtTelefono'),
					  'fax' => $this->input->post('txtFax'));

		$errors = "";
		if ($this->form_validation->run() == FALSE)
        {
            $result        = FALSE;
            $resultMessage = "Error de validacion";
            $errors 	   = validation_errors();
        }
        else 
        {
        	$result = $this->owner_model->new_owner($ownerData);
			$resultMessage = ($result == true) ? "Dueño guardado" : "Error al guardar";

        }
		
		$status        = ($result == true) ? "ok" : "fail";
		
		$response = array('status' => $status,'message' => $resultMessage,'errors' => $errors);
		echo json_encode($response);
		
	}

	public function update_owner()
	{
		// TODO validate inputs
		$this->form_validation->set_rules('txtId', 'ID', 'required');
		$this->form_validation->set_rules('txtNif', 'NIF', 'required');
		$this->form_validation->set_rules('txtNombre', 'nombre', 'required');
		$this->form_validation->set_rules('txtDireccion', 'Direccion', 'required');
		$this->form_validation->set_rules('txtTelefono', 'Telefono', 'required');

		$id = $this->input->post('txtId');
		$ownerData = array('identificacion' => $this->input->post('txtNif'),
					  'nombre' => $this->input->post('txtNombre'),
					  'direccion' => $this->input->post('txtDireccion'),
					  'telefono' => $this->input->post('txtTelefono'),
					  'fax' => $this->input->post('txtFax'));

		$errors = "";
		if ($this->form_validation->run() == FALSE)
        {
            $result        = FALSE;
            $resultMessage = "Error de validacion";
            $errors 	   = validation_errors();
        }
        else 
        {
        	$result = $this->owner_model->update_owner($id,$ownerData);
			$resultMessage = ($result == true) ? "Dueño actualizado" : "Error al guardar";

        }
		
		$status        = ($result == true) ? "ok" : "fail";
		
		$response = array('status' => $status,'message' => $resultMessage,'errors' => $errors);
		echo json_encode($response);
		
	}

	public function get_owner($id = 0)
	{
		// $ownerData = array();
		return $this->owner_model->get_owner($id);
	}

	public function get_owners()
	{
		$data = $this->owner_model->get_owners();
		echo json_encode($data);
	}
}
