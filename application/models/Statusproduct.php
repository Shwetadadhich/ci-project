<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Statusproduct extends CI_Model
 {
    public function product_status()//product status//Statusproduct.php
     {
        $id = $_REQUEST['sid'];
        $sval = $_REQUEST['sval'];
        if($sval == 0)
        {
             $status = 1;
        }
        else
        {
            $status = 0;
        }
        $data = array(
                      'status' => $status,
                     );
        $this->db->where('id',$id);
        return $this->db->update('product',$data);
     }
    
 }

?>