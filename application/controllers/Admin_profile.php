<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profile extends CI_Controller 
{
   public function index()
   {
   	$this->load->helper('common_helper');
    getCatergoryList();
     
    $this->load->library('Template');
       
    $this->template->load('vtemplate', 'Profile-view');
   	
   }
}

?>