<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Mproduct extends CI_Model
 {
     public function add_product($data)//insert query//Insetproduct.php
     {
     	 $this->db->insert('product', $data);
     }
     
     public function edit_getproduct($id)//edit product one row
     { //get one row in EDIT click
        return $this->db->where('id', $id)
                        ->get('product')
                        ->row();
     }

     public function update_order($id,$update)//update all product
     {
         return $this->db->where('id', $id)
                         ->update('product', $update);
     }

     public function del_product($id)//delete product
     {

        $return = $this->db->where('id', $id)
                         ->delete('product');
          //p($this->db->last_query());
          return $return;
     }

     public function product_status($id,$status)//product status
     {  
        //p($id);
        if($status == 0)
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
        $return = $this->db->update('product',$data);
        $this->db->trans_complete();

        if ($this->db->affected_rows() >0)
        {
          return 1; //add your code here
        }
        else
        {
          return 0; //add your code here
        }
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

     
    var $table = 'product';
    var $column_order = array(null, 'cat_id','title','description','image','stock','status',null,null); //set column field database for datatable orderable
    var $column_search = array('id','cat_id','title','description','image','stock','status'); //set column field database for datatable searchable 
    var $order = array('id' => 'DESC'); // default order 
   
   public function get_datatables_query()
    {
        //$this->db->join('category', 'category.cat_id = product.cat_id', 'left');
        $this->db->select($this->column_search); 
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST["search"]["value"]) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST["search"]["value"]);
                }
                else
                {
                    $this->db->or_like($item, $_POST["search"]["value"]);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST["order"])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->get_datatables_query();
        if($_POST["length"] != -1)
        {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}





