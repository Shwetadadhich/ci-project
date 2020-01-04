<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Testmodel extends CI_Model
 {
 	public function routemodel($id) 
 	{ 
 		//p($id);
		$this->db->select('*');
	    $this->db->from('product');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    return $query->row_array();
	    // $this->db->last_query();
	}
 }

 ?>