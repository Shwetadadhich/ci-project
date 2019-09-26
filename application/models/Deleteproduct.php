<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Deleteproduct extends CI_Model
 {
     public function del_product($id)//delete product//Deleteproduct.php
     {
        return $this->db->where('id',$id)
                        ->delete('product');
     }
 }

 ?>