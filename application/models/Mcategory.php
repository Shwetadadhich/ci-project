<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Mcategory extends CI_Model
 {
    
     public function all_category()  //fetch all category in table row
     { 
        return $this->db->get('category')
                      ->result();
     }

     public function getsub_category($res)//sub category using jquery
    {
        return $this->db->where('category_id',$res)
                                     ->get('sub_category')
                                      ->result();
                                      //print_r($data);die;
    }

    public function cgetcategory() //all get category list
    {
    	 return $this->db->select()
                        //->where('cat_id','$cat_id')
                      ->get('category')  
    	                ->result();
     }  

    public function category_product($cat_id)
    {
        return $this->db->where('cat_id',$cat_id)
                      ->get('product')
                       ->result();
    }
 }

 ?>