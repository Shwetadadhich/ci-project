<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Mcategory extends CI_Model
 {
    
     public function all_category()  //fetch all category in table row select option
     { 
        return $this->db->get('category')
                      ->result();
     }

     public function getsub_category($res)//sub category using jquery select option
    {
        $return = $this->db->where('category_id',$res)
                        ->get('sub_category')
                        ->result();
                        return $return;
    }

    public function cgetcategory() //all get category list
    {
    	 return $this->db->select()
                        //->where('cat_id','$cat_id')
                      ->get('category')  
    	                ->result();
     }  

    public function category_product($cat_id)//category show using helper
    {
        return $this->db->where('cat_id',$cat_id)
                      ->get('product')
                       ->result();
    }

    public function add_category($data)//insert category in mysql
     {
           //p($data);
           $this->db->insert('category', $data);   
           $cat_id = $this->db->insert_id();
           return $cat_id;
     }
}

?>