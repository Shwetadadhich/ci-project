<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Updateproduct extends CI_Model
{
 
    public function update_order($id,$update)//update all product
     {
         return $this->db->where('id', $id)
                         ->update('product', $update);
     }
}

 ?>