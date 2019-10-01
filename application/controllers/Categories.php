<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller 
{
  public function allcategory()
  {
      //$this->load->model('Mcategory');
      //$cat = $this->input->post('cat_id');
      //$data['categorylist'] = $this->Mcategory->category_list($cat_id);
  	   $ci =& get_instance();
       $ci->load->helper('common_helper');
  	   $category = getCatergoryList();
      //print_r($categories); die;
      //$ci->load->model('Mcategory');
      //$d['category'] = $this->Mcategory->cgetcategory();
      //print_r($category);
      //$this->load->library('Template');
      //$this->template->load('vtemplate', 'category', $d);
  }
      
}

?>