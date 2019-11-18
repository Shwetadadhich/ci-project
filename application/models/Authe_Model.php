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

	   public function email_exist()
	   {
          $email = $this->input->post('email');
          $query = $this->db->query("select email,password from users where email='$email'");
          if($row = $query->row())
          {
          	return true;
          }  
          else
          {
          	return false;
          }
	   }

	   public function temp_reset_pass($temp_pass)
	   {
	   	 $data = array(
                        'email' => $this->input->post('email'),
                        'password' => $temp_pass
                       );
	   	       $email = $data['email'];

	   	 if($data)
	   	 {
	   	 	$this->db->where('email', $email);
	   	 	$this->db->update('users', $data);
	   	 	//p($this->db->last_query());
	   	 	return true;
	   	 }
	   	 else
	   	 {
	   	 	return false;
	   	 }
	   }

	   public function temp_pass_valid($temp_pass)
	   {
	   	   //$this->db->select('*');
           $this->db->where('password','$temp_pass');
           $query = $this->db->get('users');
           //p($this->db->last_query());
           if($query->num_rows() == 1)
           {
           	return true;
           }
           else return false;
	   }
 }

 ?>