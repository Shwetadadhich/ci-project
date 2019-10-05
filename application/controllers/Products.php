<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{

   public function product($rowno=0,$cat_id=0)
   { 
        
        $search_text = "";
        if($this->input->get('submit') != NULL )
        {
        $search_text = $this->input->get('search');
        $this->load->library('session');
        $this->session->set_userdata(array("search"=>$search_text));
        }
    else
      {
        if($this->session->userdata('search') != NULL)
        {
         $search_text = $this->session->userdata('search');
        }
      }

    // Row per page
    $rowperpage = 3;

    // Row position
    if($rowno != 0)
    {
      $rowno = ($rowno-1) * $rowperpage;
    }
 
    // All records count
    $this->load->model('Mproduct');
    $allcount = $this->Mproduct->getrecordCount($search_text);
    
    // Get records
    $users_record = $this->Mproduct->getData($rowno,$rowperpage,$search_text);
 
    // Pagination Configuration
    $this->load->library('pagination');
    $config['base_url'] = base_url().'/products/product';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;

    // Initialize
    $this->pagination->initialize($config);
 
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['row'] = $rowno;
    $data['search'] = $search_text;

    // Load view
     $this->load->helper('common_helper');
     getCatergoryList();
      //$d['products_l'] = $this->Mproduct->getproduct($cat_id);
     $this->load->library('Template');
       
     $this->template->load('vtemplate', 'product', $data);
     //$this->template->load('vtemplate', 'product', $d);
  }

   


   	  /*$cat_id = $this->input->get('category_id');
   	  
   	  // $this->input->get is equivalent to $_GET
      $this->load->model('Mproduct');//model load
        //$this->load->model('Mcategory');//model load
   	  $this->load->library('pagination');//pagination load

   	  //pagination style
      $config['num_tag_open']='<li>';
      $config['num_tag_close']='</li>';
      $config['cur_tag_open']='<li class="active"><a href="javascript:void(0);">';
      $config['cur_tag_close']='</a></li>';
      $config['num_tag_close']='</li>';
      $config['next_link']='next';
      $config['prev_link']='prev';
      $config['next_tag_open']='<li class"pg-next">';
      $config['next_tag_close']='</li>';
      $config['prev_tag_open']='<li class="pg-prev">';
      $config['prev_tag_close']='</li>';
      $config['first_tag_open']='<li>';
      $config['first_tag_close']='</li>';
      $config['last_tag_open']='<li>';
      $config['last_tag_close']='</li>';
 
      $config['base_url'] = base_url('/Products/product');
      $config['total_rows'] = $this->Mproduct->getProductCount();
      $limit=$config['per_page']=4;
      $this->pagination->initialize($config);

      $d['pagination'] = $this->pagination->create_links();
      
      $d['products_l'] = $this->Mproduct->getproduct($limit,$offset,$cat_id);

      if(isset($_GET['search']))
      {
         $d['products_l'] = '';
         $data['pro']  = $this->Mproduct->searchpro($search);
         print_r($data['pro']);
         exit();
      }
      //$d['category'] = $this->Mcategory->cgetcategory();
      //print_r($d['category']); die;
      $this->load->helper('common_helper');
      getCatergoryList();
   	   
   	  $d['body'] = 'Body ...';
      $this->load->library('Template');
       
	    $this->template->load('vtemplate', 'product', $d);
    }*/
    
    

    public function addproduct($id=FALSE)  //insert product with validation start
     {  
          $data = []; 
          $this->load->model('Mcategory');//model load
          //$d['category'] = $this->Mcategory->cgetcategory();
          $this->load->helper('common_helper');
          getCatergoryList();
          $data['allcat'] = $this->Mcategory->all_category(); 
          
               $this->load->library('form_validation');//form validation load
              
               $this->form_validation->set_rules('id','categoryid','required');
               $this->form_validation->set_rules('title','product title', 'required|is_unique[product.title]');
               $this->form_validation->set_rules('description','descriptoin','required');
              //$this->form_validation->set_rules('image','image','required');
              //$this->form_validation->set_rules('stock','stock','required');
            
               $this->form_validation->set_message('required', '{field} is required <- Error Message');
             
           if($this->input->post('add'))
           { //insert start
             
              
               if($this->form_validation->run() != FALSE)
               {

                    $add['cat_id'] = $this->input->post('id');
                    $add['title'] = $this->input->post('title');
                    $add['description']=$this->input->post('description');
                
                   if(empty($this->input->post('image')))
                    {
                     $this->form_validation->set_message('required', '{image} is required <- Error Message');
                   }
                     $config['upload_path'] = FCPATH ."assests/image";// upload the image upload library insert
                     $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                     $config['max_size']  = '1000000';
                     //$config['max_width'] = '1024';
                     //$config['max_height'] = '768';
                     $this->load->library('upload', $config);
                            
                      if(!$this->upload->do_upload('image'))//$add['image'] = $this->input->post('image');
                       { 
                         $error = array('error' => $this->upload->display_errors());
                           //print_r($error);die; 
                         $this->session->set_flashdata('error',$error['error']);
                         redirect(base_url('products/addproduct')); 
                       }
         
                   $data = $this->upload->data(); 
                 //echo '<pre>'; print_r($data); die;
                   $add['image'] = $data['file_name'];
                 // print_r($add['file_name']);die;
                   $add['stock'] = $this->input->post('stock');
                  //print_r($add);die;
                   $this->load->model('Mproduct');
                   $this->Mproduct->add_product($add);
                  
                   $this->session->set_flashdata('success','product inerted successfully');
                   redirect(base_url('products/product')); 
              
               }
            
           } 
        //eND insert work

           if($id)   // fetch product by one row in input box using id
          {
             $this->load->model('Mproduct');
             $data['get_edit'] = $this->Mproduct->edit_getproduct($id);
          }

           if($this->input->post('update')) //update product with image start
           { 
                //echo 'dfdf';die;
              $update['cat_id'] = $this->input->post('id');
              $update['title'] = $this->input->post('title');
              $update['description']=$this->input->post('description');
                //$update['image']=$this->input->post('image');
               $imgcheck=$_FILES['image']['name'];
               //print_r($imgcheck);die;
               if(!empty($imgcheck))
               {
                  $res = $this->db->query("select image from product where id=$id")->row('image');
                    if(!empty($res))
                    {
                      $path = FCPATH ."assests/image/$res";
                      unlink($path);
                      //print_r($path);die;
                    }
               
                   
                   $config['upload_path'] = FCPATH ."assests/image";// upload the image upload library insert
                   $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                   $config['max_size']  = '1000000';
                   //$config['max_width'] = '1024';
                   //$config['max_height'] = '768';
                   $this->load->library('upload', $config);
                          
                    if(!$this->upload->do_upload('image'))//$add['image'] = $this->input->post('image');
                       { 
                         $error = array('error' => $this->upload->display_errors());
                          //print_r($error);die; 
                        $this->session->set_flashdata('error',$error['error']);
                        // redirect(base_url('cproducts/addproduct')); 
                       }
                        $data = $this->upload->data(); 
                        //echo '<pre>'; print_r($data); die;
                        $update['image'] = $data['file_name'];
                }
                      $update['stock']=$this->input->post('stock');
                        //print_r($update);die;
                      $this->Mproduct->update_order($id,$update);
                      $this->session->set_flashdata('success','product Updated successfully');
                      redirect(base_url('products/product')); 
           } // update product end
           $d['header'] = 'header...';
           $this->load->library('Template');
           $this->template->load('vtemplate', 'addpro', $data);
     }
    
   public function Statusproduct()
     {
       if(isset($_REQUEST['sval']))
       {
          $this->load->model('Mproduct');
          $res = $this->Mproduct->product_status();
          //print_r($res);
          if($res>0)
           {
            $this->session->set_flashdata('success',"product status updated sucessfully");
            //$this->session->set_flashdata('msg_class','alert-success');
           }
           else
           {
             $this->session->set_flashdata('error',"product status not updated sucessfully");
             //$this->session->set_flashdata('msg_class','alert-danger');
           }
           return redirect('products/product');
       }
     }

   public function delete($id)
     {
                 $this->load->model('Mproduct');
                 $data = $this->Mproduct->del_product($id);
                 //print_r($data);die;
                 $this->session->set_flashdata('success','product deleted successfully');
                 redirect(base_url('products/product')); 
                 
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
                  }*/  

                  $this->load->library('Template');
                 $this->template->load('vtemplate', 'addpro', $data);       
     }
   
          function get_category()
          {
             $this->load->model('Mcategory');
             $res = $this->input->post('catid');
             //echo $this->input->post('catid');die;
             $data['category'] = $this->Mcategory->getsub_category($res);
             //print_r($data['category']);die;
             echo json_encode($data);
         }
}

?>