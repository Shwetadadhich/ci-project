<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Sideallcategory extends CI_Model
 {
     public function cgetcategory() //all get category list//Sideallcategory.php
    {
    	 return $this->db->select()
                        //->where('cat_id','$cat_id')
                        ->get('category')  
    	                ->result();
     }

 }

?>