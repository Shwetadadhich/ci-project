<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Subcategory extends CI_Model
 {
    public function getsub_category($res)//Subcategory.php
    {
        return $this->db->where('category_id',$res)
                                     ->get('sub_category')
                                      ->result();
                                      //print_r($data);die;
    }
   
 }


?>