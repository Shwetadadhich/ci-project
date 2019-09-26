<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Editoneproduct extends CI_Model
 {

     public function edit_getproduct($id)//edit product one row using id
     { //get one row in EDIT click
        return $this->db->where('id', $id)
                        ->get('product')
                        ->row();
     }
 }

?>