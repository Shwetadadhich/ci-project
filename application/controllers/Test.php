<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 
{
	public function abc($id)
	{
		//p($id);
		// echo $value;
		// echo '<br>';
		// echo $value2;
    // $id =$this->uri->segment(2);
	// $id = $this->uri->segment(3);
      
     $this->load->model('Testmodel');

	 $data['product_test'] = $this->Testmodel->routemodel($id);

	  //p($data['product_test']);
	  // $data['fvfvfv'] = $id;
     $this->load->view('testview',$data);		
	}
		
}

?>