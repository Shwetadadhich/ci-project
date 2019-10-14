<?php 

function getCatergoryList()
	 {
        //return "this is helper file";
       
        $ci =& get_instance();
        $ci->load->model('Mcategory');
        return $d['category'] = $ci->Mcategory->cgetcategory();
        // print_r($d['category']);
        //$ci->load->library('Template');
        //$ci->template->load('vtemplate', 'allcategory', $d);

       //print_r($d['category']); die;
       
	 }
?>