<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller 
{
  public function allcategory($cat_id)
  {
       $ci =& get_instance();
       $ci->load->helper('common_helper');
  	   $category= getCatergoryList();
       $ci->load->model('Mcategory');
      $data['catproduct'] = $ci->Mcategory->category_product($cat_id);
      $ci->load->library('Template');
      $ci->template->load('vtemplate', 'allcategory', $data);
  }
      
}

?>