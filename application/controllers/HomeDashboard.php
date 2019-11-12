<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeDashboard extends CI_Controller 
{
   public function index($offset=0)
   {
   	  //$search = $this->input->get('search');
       //$this->load->helper('common_helper');
        //echo test();

   	   $cat_id = $this->input->get('category_id');
   	  // $this->input->get is equivalent to $_GET
       if($this->session->userdata('email') != '')
      {
        //redirect(base_url('HomeDashboard'));
      }
      else
      {
        redirect(base_url('Authenticate'));
      }

   	   $this->load->model('Dashboard');
   	   $this->load->model('Mcategory');
       $data['category'] = $this->Mcategory->cgetcategory();
       $data['pcount'] = $this->Dashboard->dashboardproduct();
       $data['count'] = $this->Dashboard->dashboardcategory();
       $data['ucount'] = $this->Dashboard->dashboarduser();

   	   $this->load->helper('common_helper');
       getCatergoryList();
       
   	   $d['body'] = 'Body ...';
       $this->load->library('Template');
   	   $this->template->load('vtemplate', 'home', $data);
   	   
   }

}

?>