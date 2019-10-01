<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller 
{
  public function allcategory($cat_id)
  {
      //$this->load->model('Mcategory');
      //$cat = $this->input->post('cat_id');
      //$data['categorylist'] = $this->Mcategory->category_list($cat_id);
  	   $ci =& get_instance();
       $ci->load->helper('common_helper');
  	   $category= getCatergoryList();
      //print_r($categories); die;
      //$ci->load->model('Mcategory');
      //$d['category'] = $this->Mcategory->cgetcategory();
      //print_r($category);
      $ci->load->model('Mcategory');
      $data['catproduct'] = $ci->Mcategory->category_product($cat_id);
      $ci->load->library('Template');
      $ci->template->load('vtemplate', 'allcategory', $data);
  }
      
}

?>