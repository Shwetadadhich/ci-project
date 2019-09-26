<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller 
{
  public function product_status()
     {
       if(isset($_REQUEST['sval']))
       {
          $this->load->model('Statusproduct');
          $res = $this->Statusproduct->product_status();
          if($res>0)
           {
            $this->session->set_flashdata('msg',"product status updated sucessfully");
            $this->session->set_flashdata('msg_class','alert-success');
           }
           else
           {
             $this->session->set_flashdata('msg',"product status not updated sucessfully");
             $this->session->set_flashdata('msg_class','alert-danger');
           }
           return redirect('cproducts/product');
       }
     }

}

?>