<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Fetchcategorytable extends CI_Model
 {
    public function all_category()  //fetch all category in table row
     { 
        return $this->db->get('category')
                      ->result();
     }
 }

?>