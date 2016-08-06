<?php
class Ship extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('ship_model');
	}

	public function index() 
	{
		$data = array('header_title' => $this->lang->line('ship_list'));
		$this->load->view('ship/ship_list',$data);
	}

	public function new_ship()
	{
		$data = array('header_title' => "Nueva embarcaci&oacute;n");
		$this->load->view('ship/new_ship',$data);
	}

	public function edit_ship($shipId)
	{
		$ship = $this->ship_model->get_ship($shipId);
		if(!$ship)
		{
			$this->load->view('errors/html/error_404',array('heading' => 'NOT FOUND','message' =>'' ));
			return;
		}
		$data = array('header_title' => "Editar nave",'ship' => $ship);
		$this->load->view('ship/new_ship',$data);
		
	}

	public function save_ship()
	{
		// TODO validate inputs
		$this->form_validation->set_rules('txtMatricula', 'Matricula', 'required');
		$this->form_validation->set_rules('txtManga', 'Manga', 'required');
		$this->form_validation->set_rules('txtEslora', 'Eslora', 'required');
		$this->form_validation->set_rules('txtCrew', 'Eslora', 'required');
		$this->form_validation->set_rules('txtOwner', 'Dueño', 'required');


		$shipData = array('matricula' => $this->input->post('txtMatricula'),
					  'manga' => $this->input->post('txtManga'),
					  'eslora' => $this->input->post('txtEslora'),
					  'max_crew' => $this->input->post('txtCrew'),
					  'id_owner' => $this->input->post('txtOwner'));

		$errors = "";
		if ($this->form_validation->run() == FALSE)
        {
            $result        = FALSE;
            $resultMessage = "Error de validacion";
            $errors 	   = validation_errors();
        }
        else 
        {
        	$result = $this->ship_model->new_ship($shipData);
			$resultMessage = ($result == true) ? "Nave guardada" : "Error al guardar";

        }
		
		$status        = ($result == true) ? "ok" : "fail";
		
		$response = array('status' => $status,'message' => $resultMessage,'errors' => $errors);
		echo json_encode($response);
		
	}

	public function update_ship()
	{

		$this->form_validation->set_rules('txtId', 'Id', 'required');
		$this->form_validation->set_rules('txtMatricula', 'Matricula', 'required');
		$this->form_validation->set_rules('txtManga', 'Manga', 'required');
		$this->form_validation->set_rules('txtEslora', 'Eslora', 'required');
		$this->form_validation->set_rules('txtCrew', 'Eslora', 'required');
		$this->form_validation->set_rules('txtOwner', 'Dueño', 'required');


		$id = $this->input->post('txtId');
		$shipData = array('matricula' => $this->input->post('txtMatricula'),
					  'manga' => $this->input->post('txtManga'),
					  'eslora' => $this->input->post('txtEslora'),
					  'max_crew' => $this->input->post('txtCrew'),
					  'id_owner' => $this->input->post('txtOwner'));

		$errors = "";
		if ($this->form_validation->run() == FALSE)
        {
            $result        = FALSE;
            $resultMessage = "Error de validacion";
            $errors 	   = validation_errors();
        }
        else 
        {
        	$result = $this->ship_model->update_ship($id,$shipData);
			$resultMessage = ($result == true) ? "Nave actualizada" : "Error al guardar";

        }
		
		$status        = ($result == true) ? "ok" : "fail";
		
		$response = array('status' => $status,'message' => $resultMessage,'errors' => $errors);
		echo json_encode($response);
		
	}

	public function get_ship()
	{
		$data = $this->ship_model->get_ships();
		echo json_encode($data);
	}

	public function get_ship_crew($shipId = 0)
	{
		$datos = $this->ship_model->get_crew($shipId);
		echo json_encode($datos);
	}
}
