<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Allproduct extends CI_Model
 {
     public function getproduct($limit,$offset,$search,$cat_id) //get all product list//Allproduct.php
 	{   

 		$result = $this->db->select();

	 		if($cat_id) 
	 		{	
	            $result = $result->where('cat_id', $cat_id);
	            
	 		}
        return  $this->db
                    ->join('category', 'category.cat_id = product.cat_id', 'left')
 		            //->where ('id',$cat_id)
 		            //->order_by('cat_id','DESC')
 		            ->like('title',$search)
 		            ->limit($limit,$offset)
 		            ->get('product')
 		            ->result();
                   //print_r($res);
                    //die;
 	}

 }

?>