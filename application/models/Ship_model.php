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
  }