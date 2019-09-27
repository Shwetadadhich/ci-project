<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Mcategory extends CI_Model
 {
    
     public function all_category()  //fetch all category in table row//Fetchcategorytable.php
     { 
        return $this->db->get('category')
                      ->result();
     }

     public function getsub_category($res)//Subcategory.php
    {
        return $this->db->where('category_id',$res)
                                     ->get('sub_category')
                                      ->result();
                                      //print_r($data);die;
    }

    public function cgetcategory() //all get category list//Sideallcategory.php
    {
    	 return $this->db->select()
                        //->where('cat_id','$cat_id')
                        ->get('category')  
    	                ->result();
     }   
 }

 ?>