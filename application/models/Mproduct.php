<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Mproduct extends CI_Model
 {
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

 	/*public function getproduct($cat_id=0) //get all product list//Allproduct.php
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
 		            //->like('title',$search)
 		            //->limit($limit,$offset)
 		            ->get('product')
 		            ->result();
 	}*/

    /*public function searchpro($search)
    {
        
       $res = $this->db->like('title',$search)->get('product')->result();
                        
                        echo'<pre>';print_r($res);die;
                        
    }*/

     public function getData($rowno,$rowperpage,$search="")
    {
        $this->db->select('*');
        $this->db->join('category', 'category.cat_id = product.cat_id', 'left');
        $this->db->from('product');

        if($search != '')
        {
          $this->db->like('title', $search);
          $this->db->or_like('product.cat_id', $search);
        }

        $this->db->limit($rowperpage, $rowno); 
        $query = $this->db->get();
     
        return $query->result_array();
    }

  // Select total records
  public function getrecordCount($search = '') 
  {

    $this->db->select('count(*) as allcount');
    $this->db->from('product');
 
    if($search != ''){
      $this->db->like('title', $search);
      $this->db->or_like('cat_id', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }


    
 	/*public function getProductCount()
 	{
 		return $this->db->select('COUNT(id) total')
 		                ->get('product')
 		                ->row('total');
 	} */
 	
 }





