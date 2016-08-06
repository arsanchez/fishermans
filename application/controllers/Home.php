<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('trip/trip_list');
	}

	public function new_trip()
	{
		$data = array('header_title' => "Registrar nueva salida");
		$this->load->view('trip/new_trip',$data);
	}

	public function register_trip()
	{
		$this->load->model('ship_model');
		$this->form_validation->set_rules('txtxDate', 'Date', 'required');
		$this->form_validation->set_rules('txtShip', 'Ship', 'required');
		$this->form_validation->set_rules('txtCrew[]', 'Crew', 'required');
		$this->form_validation->set_rules('txtPez[]', 'Pez', 'required');
		$this->form_validation->set_rules('txtPezCant[]', 'Cant', 'required');
		$this->form_validation->set_rules('txtCargo[]', 'Cargo', 'required');

		$errors = "";
		if ($this->form_validation->run() == FALSE)
        {
            $result        = FALSE;
            $resultMessage = "Error de validacion";
            $errors 	   = validation_errors();
        }
        else 
        {
        	$date = $this->input->post('txtxDate');
        	$date = date("Y-m-d",strtotime($date));
        	$ship = $this->input->post('txtShip');
        	$tripData = array('id_ship' => $ship,'date' => $date);
        	
        	$result = $this->ship_model->save_trip($tripData);
        	if($result)
        	{
        		$crews = $this->input->post('txtCrew');
        		$peces = $this->input->post('txtPez');
        		$cants = $this->input->post('txtPezCant');
        		$cargos = $this->input->post('txtCargo');
        		$tripId = $this->db->insert_id();
        		foreach ($crews	as $key => $value) 
        		{
        			$p = $peces[$key];
        			$pc = $cants[$key];
        			$c = $cargos[$key];
        			$sdData = array('id_salida' => $tripId,
        							'id_crew' => $key,
        							'fish' => $p,
        							'cantidad' => $pc,
        							'titulo' => $c);
        			$this->ship_model->save_trip_detail($sdData);
        		}
        	}

			$resultMessage = ($result == true) ? "Salida registrada" : "Error al guardar";

        }
		
		$status        = ($result == true) ? "ok" : "fail";
		
		$response = array('status' => $status,'message' => $resultMessage,'errors' => $errors);
		echo json_encode($response);
	}

	public function get_trips()
	{
		$this->load->model('ship_model');	
		$data = $this->ship_model->get_trips();
		echo json_encode($data);
	}

	public function get_details($trip = 0)
	{
		$this->load->model('ship_model');	
		$tripData = $this->ship_model->get_trip_det($trip);
		$data  = array('trips' => $tripData);
		$this->load->view('trip/trip_detail',$data);
	}
}
