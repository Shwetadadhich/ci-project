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

    public function cgetcategory() //all get category list sidebar
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
                       $this->db->last_query();
    }

    public function add_category($data)//insert category in mysql
     {
           //p($data);
           $this->db->insert('category', $data);   
           $cat_id = $this->db->insert_id();
           return $cat_id;
     }

    //  function total_items($keyword)
    // {
    //     $this->db->like('title',$keyword);
    //     $this->db->from('product');
    //     return $this->db->count_all_results();
    // }


    //   //Fetching Products

    // public function get_product($limit,$start,$keyword)
    // {
    //     $this->db->order_by('id', 'DESC');
    //     $this->db->limit($limit, $start);
    //     $this->db->like('title',$keyword);
    //     $query = $this->db->get_where('product');
    //     if(!$query->num_rows()>0)
    //     {
    //          echo '<h1>No product available</h1>';
    //     }
    //     else
    //     {
    //     foreach ($query->result() as $row) {
    //             $data[] = $row;
    //     }
    //         return $data;
    //     }
    //   }
}

?>

