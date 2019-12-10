<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estore extends CI_Controller 
{
	 public function __construct()
	 {
		  parent::__construct();
	      $this->load->model('Product_filter');
      }

    public function index()
    {
    	$this->load->view('Storeview');    	
    	//$this->load->view('product_shop');
    }

   public function product_detail($id=NULL)
   {
   	if(isset($_GET['id'])) 
        {
           $id=$_GET['id'];
           $this->load->model('Mproduct');
           $data['get_oneproduct'] = $this->Mproduct->store_getproduct($id);
           //p($data['get_oneproduct']);
           $this->load->view('product_detail',$data);
        }
    
   }

    public function product_shop($cat_id=NULL)
    {
    	$ci =& get_instance();
        $ci->load->helper('common_helper');
  	    $category= getCatergoryList();
        $ci->load->model('Mcategory');
        $data['store_category'] = $ci->Mcategory->category_product($cat_id);
        $data['color'] = $this->Product_filter->fetch_filter_type('color');
        $data['size'] = $this->Product_filter->fetch_filter_type('size');
        return $this->load->view('product_shop',$data);
    }

    public function product_shop_filter($id=NULL)
    {
    	
       $this->load->model('Mproduct');
       $data['get_oneproduct'] = $this->Mproduct->edit_getproduct($id);
    	  sleep(1);
		  $minimum_price = $this->input->post('minimum_price');
		  $maximum_price = $this->input->post('maximum_price');
		  $size= $this->input->post('size');
		  $color= $this->input->post('color');

		  $this->load->library('pagination');
		  $config = array();	
		  $config['base_url'] = 'product_shop_filter';
		  
		  $config['total_rows'] = $this->Product_filter->count_all($minimum_price,$maximum_price,$size,$color);

		  $config['per_page'] = 8;
		  $config['uri_segment'] = 3;
		  $config['use_page_numbers'] = TRUE;
		  $config['full_tag_open'] = '<ul class="pagination">';
		  $config['full_tag_close'] = '</ul>';
		  $config['first_tag_open'] = '<li>';
		  $config['first_tag_close'] = '</li>';
		  $config['last_tag_open'] = '<li>';
		  $config['last_tag_close'] = '</li>';
		  $config['next_link'] = '&gt;';
		  $config['next_tag_open'] = '<li>';
		  $config['next_tag_close'] = '</li>';
		  $config['prev_link'] = '&lt;';
		  $config['prev_tag_open'] = '<li>';
		  $config['prev_tag_close'] = '</li>';
		  $config['cur_tag_open'] = "<li class='active'><a href='#'>";
		  $config['cur_tag_close'] = '</a></li>';
		  $config['num_tag_open'] = '<li>';
		  $config['num_tag_close'] = '</li>';
		  $config['num_links'] = 3;
		 
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config['per_page'];
         
         $output = array(
			   'pagination_link'  => $this->pagination->create_links(),
			   'product_list'   => $this->Product_filter->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price,$size,$color)
		    );

		  echo json_encode($output);
	      //p($output);
    }

}

?>