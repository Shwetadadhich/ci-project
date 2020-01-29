<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estore extends CI_Controller 
{
	 public function __construct()
	 {
		  parent::__construct();
		  $this->load->library('cart');
	    $this->load->model('Product_filter');
   }

    public function index()
    {
      $this->session->unset_userdata('user_id');
      $data['count_cart'] = $this->Product_filter->count_cart_num();
      $data['count_cart'] =  $data['count_cart'] ==''? 0: $data['count_cart'] ;
        //p($data['count_cart']);
      $this->load->view('Storeview',$data);
	} 	
  

   public function product_detail($id=NULL)
   {
   	if(isset($_GET['id'])) 
        {
           $id=$_GET['id'];
           $this->load->model('Mproduct');
           $data['get_oneproduct'] = $this->Mproduct->store_getproduct($id);
           $data['count_cart'] = $this->Product_filter->count_cart_num();
           //p($data['get_oneproduct']);
           $this->session->set_flashdata('success',"Please Login First");
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
        $data['count_cart'] = $this->Product_filter->count_cart_num();
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

public function order_product()
  {
     $data = [];
   	 if(isset($_POST['submit']) && ($_SESSION['id']))
   	{
      //p('bgb');
   	 	$id=isset($_GET['id']);
   	 	$add['pro_id'] = $this->input->post('id');
    
       $user_id= NULL;
       if(isset($_SESSION['id']))
       {
        $user_id=$_SESSION['id'];
       }
       $price = $this->db->select('price')->from('product')->where('id',$add['pro_id'])->get()->row_array();
       $price = $price!=''?$price['price']:'0';
        //p($add['pro_id']);
       $add['price'] =$price;
       $add['user_id'] = $user_id;
       $add['quantity'] = $this->input->post('quantity');
       $add['sub_total'] =$this->input->post('quantity')*$price;
     // p($add['price']);
       $this->load->model('Product_filter');
       $this->Product_filter->order_product($add);
       
       $this->session->set_flashdata('success','order inerted successfully');
    }    	 
            else
          {
            $this->session->set_flashdata('alert','Please First Login');
            redirect(base_url("Estore/product_shop"));
          }

   	 redirect("Estore/cart");
   }

    public function cart($id='')
    {
    	$data['cart'] = $this->Product_filter->getRows($id);
    	$data['count_cart'] = $this->Product_filter->count_cart_num();
    	$this->load->view('shopping_cart',$data);
    }

    public function order_delete($id=NULL)
   { 
   	    if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
	     
	   	 $this->Product_filter->order_delete($id);

	   	 return redirect(base_url('Estore/cart'));
   	  
   }

   public function checkout()
   {
    $data = [];

    if(isset($_POST['submit']))
    {
      echo "successfully";
    }

   	$data['count_cart'] = $this->Product_filter->count_cart_num();

   	$this->load->view("checkout",$data);
   	 //echo "successfully";
   }

   public function login_user()
   {
   	 $this->load->library('form_validation');

        // here i am creating login validation
		$this->form_validation->set_rules('email','Email','required|valid_email', 'callback__email_check');
		$this->form_validation->set_rules('password','Password','required');

        // if validation is correct or not
		if($this->form_validation->run())
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
            //check email or password is correct
			$this->load->model('Authe_Model');
            
			$login = $this->Authe_Model->login_data($email, $password);
			if($login)
			{
			    $session_data = $login;
			    //p($session_data);
			    $this->session->unset_userdata($session_data);
			    $login = $this->Authe_Model->login_data($email,$password);
  				$this->session->set_userdata($session_data);
  				return redirect('Estore');
			}
			else
			{
				$this->session->set_flashdata('error', 'invalid Email and Password.');
				return redirect('Estore');
			}
		}
   }

   public function user_logout()
   {
   	 $this->session->unset_userdata('email');
     $this->session->unset_userdata('id');
     redirect(base_url('Estore'));
   }
}

?>