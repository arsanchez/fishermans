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

    public function get_crew($shipId = 0)
    {
      $this->db->select('*');
      $this->db->from('crew');
      $this->db->where('id_ship',$shipId);
      $query = $this->db->get()->result_array();
      return $query;
    }

    public function save_trip($data)
    {
      if($data != null) 
      {
        return $this->db->insert('salida', $data);
      }
      else
      {
        return false;
      }
    }

    public function save_trip_detail($data)
    {
      if($data != null) 
      {
        return $this->db->insert('salida_detalle', $data);
      }
      else
      {
        return false;
      }
    }

    public function get_trips()
    {
     
      $this->db->select('s.id,s.id_ship,s.date,sp.matricula');
      $this->db->from('salida s');
      $this->db->join('ship sp','sp.id = s.id_ship','LEFT');
      $query = $this->db->get()->result_array();
      return $query;
    }

    public function get_trip_det($trip)
    {
      $this->db->select('*');
      $this->db->from('salida_detalle sd');
      $this->db->where('id_salida',$trip);
      $this->db->join('crew c','c.id = sd.id_crew','LEFT');
      $query = $this->db->get()->result_array();
      return $query;
    }
  }