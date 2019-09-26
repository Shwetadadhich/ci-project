<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller 
{
   public function delete($id)
     {
                 $this->load->model('Deleteproduct');
                 $data = $this->Deleteproduct->del_product($id);
                 //print_r($data);die;
                 $this->session->set_flashdata('success','product deleted successfully');
                 redirect(base_url('cproducts/product')); 
                 
                 /*$check=$_FILES['image']['name'];
               //print_r($imgcheck);die;
                if(!empty($check))
                { 
            
                  $res = $this->db->query("delete image from product where id=$id")->row('image');
                    if(!empty($res))
                    {
                      $path = FCPATH ."assests/image/$res";
                      unlink($path);
                      //print_r($path);die;
                    }
                }  */

                  $this->load->library('Template');
                 $this->template->load('vtemplate', 'addpro', $data);       
     }
  
}

?>