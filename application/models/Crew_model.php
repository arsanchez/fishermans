<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crew_model extends CI_Model
{
    function __construct()
    {
      parent::__construct();
    }

    public function new_crew($data = null)
    {
      if($data != null) 
      {
        return $this->db->insert('crew', $data);
      }
      else
      {
        return false;
      }
    }

    public function update_cew($id = 0,$data)
    {
      if($id != 0)
      {
        $this->db->where('id', $id);
        return $result = $this->db->update('crew', $data); 
      }
      else
      {
        return false;
      }
    }

    public function get_crew($id = 0)
    {
      if($id == 0)
      {
        return false;
      }

      $this->db->where('id',$id);
      $query = $this->db->get('crew');
      if($query->num_rows() > 0)
      {
        return $query->row();
      }
      return false;
    }

    public function get_crews()
    {
       $this->db->select('c.id,c.identificacion,c.nombre,c.direccion,c.telefono,c.cargo,s.matricula');
      $this->db->from('crew c');
      $this->db->join('ship s','s.id = c.id_ship','LEFT');
      $query = $this->db->get()->result_array();
      return $query;
    }
}
