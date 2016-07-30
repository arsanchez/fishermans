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

	public function new_ship()
	{
		$data = array('header_title' => "Nueva embarcaci&oacute;n");
		$this->load->view('ship/new_ship',$data);
	}

	public function save_owner()
	{
		// TODO validate inputs
		$this->form_validation->set_rules('txtMatricula', 'Matricula', 'required');
		$this->form_validation->set_rules('txtManga', 'Manga', 'required');
		$this->form_validation->set_rules('txtEslora', 'Eslora', 'required');
		$this->form_validation->set_rules('txtCrew', 'Eslora', 'required');


		$ownerData = array('matricula' => $this->input->post('txtMatricula'),
					  'manga' => $this->input->post('txtManga'),
					  'eslora' => $this->input->post('txtEslora'),
					  'max_crew' => $this->input->post('txtCrew'),
					  'id_owner' => $this->input->post('txtCrew'));

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
}
