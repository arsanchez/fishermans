<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ship_model extends CI_Model
{
    function __construct()
    {
      parent::__construct();
    }

    public function new_ship($data = null)
    {
      if($data != null) 
      {
        return $this->db->insert('ship', $data);
      }
      else
      {
        return false;
      }
    }

    public function get_ships()
    {
      $this->db->select('s.id,s.matricula,s.manga,s.eslora,s.max_crew,o.nombre');
      $this->db->from('ship s');
      $this->db->join('owners o','o.id = s.id_owner','LEFT');
      $query = $this->db->get()->result_array();
      return $query;
    }

    public function update_ship($id = 0,$data)
    {
      if($id != 0)
      {
        $this->db->where('id', $id);
        return $result = $this->db->update('ship', $data); 
      }
      else
      {
        return false;
      }
    }

    public function get_ship($id = 0)
    {
      if($id == 0)
      {
        return false;
      }

      $this->db->where('id',$id);
      $query = $this->db->get('ship');
      if($query->num_rows() > 0)
      {
        return $query->row();
      }
      return false;
    }
  }