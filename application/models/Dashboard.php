<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Dashboard extends CI_Model
 {
         public function dashboardproduct()
     {
          return $this->db->get('product')
                          ->num_rows();
                          //->result();
     }

     public function dashboardcategory()
     {
          return $this->db->get('category')
                          ->num_rows();
                          //->result();
    }
 }
?>