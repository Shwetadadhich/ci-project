<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Usermodel extends CI_Model
 {
   public function add_user($data)//insert user
   {
   	 //p($data);
   	 $this->db->insert('users', $data);
   	 
   	 //p($this->db->last_query());
   }

   public function get_edit_user($id)
   {
     return $this->db->where('id', $id)->get('users')->row();
                        
   }

   public function update_user($id,$update)//update all product
     {
         return $this->db->where('id', $id)
                         ->update('users', $update);
     }

   public function delete_user($id)
   {
     $return = $this->db->where('id', $id)
                         ->delete('users');
          //p($this->db->last_query());
          return $return;
   }

    var $table = 'users';
    var $column_order = array(null, 'user_type','name','user_name','email','password','number','image','dob','gender','hobby',null,null); //set column field database for datatable orderable
    var $column_search = array('id','user_type','name','user_name','email','password','number','image','dob','gender','hobby'); //set column field database for datatable searchable 
    var $order = array('id' => 'DESC'); // default order 
   
   public function get_datatables_user()
    {
        $this->db->select($this->column_search); 
        $this->db->from($this->table);
       
        $i = 0;
        
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST["search"]["value"]) //if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket.query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
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
 
    function get_user()
    {
        $this->get_datatables_user();
        if($_POST["length"] != -1)
        {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        //P($query->result());
        return $query->result();

    }
 
    public function count_filtered_user()
    {
        $this->get_datatables_user();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_user()
    {
        //$this->db->select("*");
        $this->db->from($this->table);
        $this->db->count_all_results();
    }

 }

?>