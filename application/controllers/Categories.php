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
 
  public function add_category()
  {
    if(isset($_POST['submit']))
    {
       $save = array(
                  'cat_title' => $this->input->post('cat_title'),
                  'icon' => $this->input->post('icon')
         );
    
      $this->load->model('Mcategory');
      $this->Mcategory->add_category($save);
      redirect(current_url());
    }
    
    $this->load->helper('common_helper');
    getCatergoryList();
         
    $this->load->library('Template');
    $this->template->load('vtemplate', 'add_category');
  }   

}

?>
