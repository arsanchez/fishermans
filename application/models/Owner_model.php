<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Owner_model extends CI_Model
{
    function __construct()
    {
      parent::__construct();
    }

    public function new_owner($data = null)
    {
      if($data != null) 
      {
        return $this->db->insert('owners', $data);
      }
      else
      {
        return false;
      }
    }

    public function update_owner($id = 0,$data)
    {
      if($id != 0)
      {
        $this->db->where('id', $id);
        return $result = $this->db->update('owners', $data); 
      }
      else
      {
        return false;
      }
    }

    public function get_owner($id = 0)
    {
      if($id == 0)
      {
        return false;
      }

      $this->db->where('id',$id);
      $query = $this->db->get('owners');
      if($query->num_rows() > 0)
      {
        return $query->row();
      }
      return false;
    }

    public function get_owners()
    {
      return $this->db->get('owners')->result_array();
    }
}
