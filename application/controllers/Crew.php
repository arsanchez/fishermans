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

	public function edit_crew($crewId)
	{
		$crew = $this->crew_model->get_crew($crewId);
		if(!$crew)
		{
			$this->load->view('errors/html/error_404',array('heading' => 'NOT FOUND','message' =>'' ));
			return;
		}
		$data = array('header_title' => "Editar miembro",'crew' => $crew);
		$this->load->view('crew/new_crew',$data);
		
	}
	public function save_crew()
	{
		// TODO validate inputs
		$this->form_validation->set_rules('txtIdentificacion', 'Identificacion', 'required');
		$this->form_validation->set_rules('txtNombre', 'Nombre', 'required');
		$this->form_validation->set_rules('txtDireccion', 'Direccion', 'required');
		$this->form_validation->set_rules('txtTelefono', 'Telefono', 'required');
		$this->form_validation->set_rules('txtCargo', 'Cargo', 'required');
		$this->form_validation->set_rules('txtShip', 'Nave', 'required');


		$crewData = array('identificacion' => $this->input->post('txtIdentificacion'),
					  'nombre' => $this->input->post('txtNombre'),
					  'direccion' => $this->input->post('txtDireccion'),
					  'telefono' => $this->input->post('txtTelefono'),
					  'cargo' => $this->input->post('txtCargo'),
					  'id_ship' => $this->input->post('txtShip'));

		$errors = "";
		if ($this->form_validation->run() == FALSE)
        {
            $result        = FALSE;
            $resultMessage = "Error de validacion";
            $errors 	   = validation_errors();
        }
        else 
        {
        	$result = $this->crew_model->new_crew($crewData);
			$resultMessage = ($result == true) ? "Miembro guardado" : "Error al guardar";

        }
		
		$status        = ($result == true) ? "ok" : "fail";
		
		$response = array('status' => $status,'message' => $resultMessage,'errors' => $errors);
		echo json_encode($response);
		
	}

	public function update_crew()
	{
		// TODO validate inputs
		$this->form_validation->set_rules('txtId', 'Id', 'required');
		$this->form_validation->set_rules('txtIdentificacion', 'Identificacion', 'required');
		$this->form_validation->set_rules('txtNombre', 'Nombre', 'required');
		$this->form_validation->set_rules('txtDireccion', 'Direccion', 'required');
		$this->form_validation->set_rules('txtTelefono', 'Telefono', 'required');
		$this->form_validation->set_rules('txtCargo', 'Cargo', 'required');
		$this->form_validation->set_rules('txtShip', 'Nave', 'required');

		$id =$this->input->post('txtId'); 

		$crewData = array('identificacion' => $this->input->post('txtIdentificacion'),
					  'nombre' => $this->input->post('txtNombre'),
					  'direccion' => $this->input->post('txtDireccion'),
					  'telefono' => $this->input->post('txtTelefono'),
					  'cargo' => $this->input->post('txtCargo'),
					  'id_ship' => $this->input->post('txtShip'));

		$errors = "";
		if ($this->form_validation->run() == FALSE)
        {
            $result        = FALSE;
            $resultMessage = "Error de validacion";
            $errors 	   = validation_errors();
        }
        else 
        {
        	$result = $this->crew_model->update_cew($id,$crewData);
			$resultMessage = ($result == true) ? "Miembro actualizado" : "Error al guardar";

        }
		
		$status        = ($result == true) ? "ok" : "fail";
		
		$response = array('status' => $status,'message' => $resultMessage,'errors' => $errors);
		echo json_encode($response);
		
	}

	public function get_crews()
	{
		$data = $this->crew_model->get_crews();
		echo json_encode($data);
	}

	
}
