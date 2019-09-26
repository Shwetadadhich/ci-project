<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcatejs extends CI_Controller 
{
  function get_category(){
         $this->load->model('Subcategory');
          $res = $this->input->post('catid');
          //  echo $this->input->post('catid');die;
          $data['category'] = $this->Subcategory->getsub_category($res);
          echo json_encode($data);
     }
}


?>