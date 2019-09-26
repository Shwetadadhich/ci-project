<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Insertproduct extends CI_Model
 {

public function add_product($data)//insert query
     {
     	 $this->db->insert('product', $data);
     }

 }
 ?>