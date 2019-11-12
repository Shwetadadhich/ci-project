<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Authe_Model extends CI_Model
 {
      public function login_data($email, $password)
       {
       	 $this->db->select('*');
         $this->db->where('email',$email);
         $this->db->where('password',$password);
         $query = $this->db->get('users');

         if($query->num_rows() > 0)
         {
             return true;
         }
         else
         {
            return false;
         }
	   }
 }

 ?>