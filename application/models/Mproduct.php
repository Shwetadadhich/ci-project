<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Mproduct extends CI_Model
 {

     /*public function dashboardproduct()//Dashboard.php
     {
          return $this->db->get('product')
                          ->num_rows();
                          //->result();
     }*/

     /*public function dashboardcategory()//Dashboard.php
     {
          return $this->db->get('category')
                          ->num_rows();
                          //->result();
    }*/

     public function add_product($data)//insert query//Insetproduct.php
     {
     	 $this->db->insert('product', $data);
     }
     
     public function edit_getproduct($id)//edit product one row using id//Editoneproduct.php
     { //get one row in EDIT click
        return $this->db->where('id', $id)
                        ->get('product')
                        ->row();
     }

     public function update_order($id,$update)//update all product//Updateproduct.php
     {
         return $this->db->where('id', $id)
                         ->update('product', $update);
     }

     /*public function all_category()  //fetch all category in table row//Fetchcategorytable.php
     { 
        return $this->db->get('category')
                      ->result();
     }*/

     public function del_product($id)//delete product//Deleteproduct.php
     {
        return $this->db->where('id',$id)
                        ->delete('product');
     }

     public function product_status()//product status//Statusproduct.php
     {
        $id = $_REQUEST['sid'];
        $sval = $_REQUEST['sval'];
        if($sval == 0)
        {
             $status = 1;
        }
        else
        {
            $status = 0;
        }
        $data = array(
                      'status' => $status,
                     );
        $this->db->where('id',$id);
        return $this->db->update('product',$data);
     }
    
    /*public function getsub_category($res)//Subcategory.php
    {
        return $this->db->where('category_id',$res)
                                     ->get('sub_category')
                                      ->result();
                                      //print_r($data);die;
    }*/

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


    /*public function cgetcategory() //all get category list//Sideallcategory.php
    {
    	 return $this->db->select()
                        //->where('cat_id','$cat_id')
                        ->get('category')  
    	                ->result();
     }*/

    
 	public function getProductCount()
 	{
 		return $this->db->select('COUNT(id) total')
 		                ->get('product')
 		                ->row('total');
 	} 
 	
 }





