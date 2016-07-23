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
        return true;
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
}
