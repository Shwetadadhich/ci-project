<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Getproductcount extends CI_Model
 {
    public function ProductCount()//Getproductcount.php
 	{
 		return $this->db->select('COUNT(id) total')
 		                ->get('product')
 		                ->row('total');
 	}

 }


?>