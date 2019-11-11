<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
   public function index()
   {
      $this->load->helper('common_helper');
      getCatergoryList();
       
      $this->load->library('Template');
       
      $this->template->load('vtemplate', 'product');
   }

   public function product()
   { 
      $this->load->model('Mproduct');
      $list = $this->Mproduct->get_datatables();
      //p($list);
      $data = array();
      $no = $_POST["start"];
      $status = '';
        foreach ($list as $Mproduct) {
            //print_r($Mproduct);
            $no++;
            $row = array();
            $row[] = $no;
            $ss = $this->get_categorynamebyid($Mproduct->cat_id);
            $row[] = $ss;
            $sd = $this->get_subcategorynamebyid($Mproduct->sub_category);
            $row[] = $sd;
            $row[] = $Mproduct->title;
            $row[] = $Mproduct->description;
            $row[] = '<img src="'.base_url().'assests/DataTables/images/'.$Mproduct->image.'" width="50" height="35" class="img-thumbnail" />';
            $row[] = $Mproduct->stock;
            
            $status_cat =$Mproduct->status;
                    
                if($Mproduct->status == 0)
                   { 
                      $status = '<a onclick="changestatus('.$Mproduct->id.','.$status_cat.')" class="btn btn-danger">Active</a>';
                      }
                      else
                      {
                        $status = '<a onclick="changestatus('.$Mproduct->id.','.$status_cat.')" class="btn btn-success">InActive</a>';
                      }

            $row[] = $status; 

            $row[] = '<a href="'.base_url("products/addproduct").'?id='.$Mproduct->id.'"<i style="font-size:25px;padding-right:10px;" class="fa fa-pencil" aria-hidden="true"></i></a>
                     <a onclick="return confirm(\'Are You Sure To Delete\');" href="'.base_url("products/delete").'?id='.$Mproduct->id.'"<i style="font-size:25px; color:red;" class="fa fa-trash-o" aria-hidden="true"></i></a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST["draw"],
                        "recordsTotal" => $this->Mproduct->count_all(),
                        "recordsFiltered" => $this->Mproduct->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    
    }
 
    public function get_categorynamebyid($cat_id)//category title name show in productlist by id
    {
        $this->load->model('Mproduct');
        return $this->Mproduct->get_categorynamebyid($cat_id);
    }

    public function get_subcategorynamebyid($id)//subcategory title name show in productlist by id 
    { 

        $this->load->model('Mproduct');
        return $this->Mproduct->get_subcategorynamebyid($id);
    }

    public function addproduct($id=FALSE)  //insert product with validation start
     {  
          $data = []; 
          $this->load->model('Mcategory');
          //$d['category'] = $this->Mcategory->cgetcategory();
          $this->load->helper('common_helper');
          getCatergoryList();
          $data['allcat'] = $this->Mcategory->all_category(); 
          
          $this->load->library('form_validation');//form validation load
              
           $this->form_validation->set_rules('title','product title');
           $this->form_validation->set_rules('description','descriptoin','required');
              //$this->form_validation->set_rules('image','image','required');
              //$this->form_validation->set_rules('stock','stock','required');
            
           $this->form_validation->set_message('required', '{field} is required <- Please fill the Box');
             
           if($this->input->post('add'))
           { //insert start
              if($this->form_validation->run() != FALSE)
               {
                    $add['cat_id'] = $this->input->post('id');
                    $add['sub_category'] = $this->input->post('category');
                    $add['title'] = $this->input->post('title');
                    $add['description']=$this->input->post('description');

                if(empty($this->input->post('image')))
                    /*{
                      $this->form_validation->set_message('required', '{image} is required <- Please Select image');
                    }*/
                     $config['upload_path'] = FCPATH ."assests/DataTables/images";// upload the image upload library insert
                     $config['allowed_types'] = 'jpg|jpeg|jpe|gif|png|zip|svg|bmp';
                     $config['max_size']  = '100000000';
                     //$config['max_width'] = '1024';
                     //$config['max_height'] = '768';
                    $this->load->library('upload', $config);

                       if (!$this->upload->do_upload('image')) //<input name="image"/>
                        {
                          $add['image'] = 'default.jpg';
                        }
                       else
                        {
                          $data = $this->upload->data(); 
                          $add['image'] = $data['file_name'];
                        } 
                  $add['stock'] = $this->input->post('stock');
                  //print_r($add);die;
                  $this->load->model('Mproduct');
                   //P($add);
                  $this->Mproduct->add_product($add);
                  $this->session->set_flashdata('success','product inerted successfully');
                  redirect(base_url('products/')); 
              }
            } 
        //end insert work

           if(isset($_GET['id'])) // fetch product by one row in input box using id
          {
             $id=$_GET['id'];
             $this->load->model('Mproduct');
             $data['get_edit'] = $this->Mproduct->edit_getproduct($id);
             //p($data['get_edit']);
          }
           
           $this->load->library('form_validation');//form validation load
              
           //$this->form_validation->set_rules('id','categoryid','required');
           $this->form_validation->set_rules('title','product title','required');
           $this->form_validation->set_rules('description','descriptoin','required');
              //$this->form_validation->set_rules('image','image','required');
           $this->form_validation->set_rules('stock','stock','required');
            
           $this->form_validation->set_message('required', '{field} is required <- Please fill the Box');
           
           if($this->input->post('update')) //update product with image start
           { 
               //p($this->input->post());
             if($this->form_validation->run() != FALSE)
              {
                $update['cat_id'] = $this->input->post('id');
                $update['sub_category'] = $this->input->post('category');
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
                      $path = FCPATH ."assests/DataTables/images/$res";
                      unlink($path);
                      //p($path);die;
                    }
               
                   
                   $config['upload_path'] = FCPATH ."assests/DataTables/images";// upload the image upload library insert
                   $config['allowed_types'] = 'jpg|jpeg|jpe|gif|png|zip|svg|bmp';
                   $config['max_size']  = '100000000';
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
                        //echo '<pre>'; p($data);
                        $update['image'] = $data['file_name'];
                  }
                      $update['stock']=$this->input->post('stock');
                        //print_r($update);die;
                      $this->load->model('Mproduct');
                      $this->Mproduct->update_order($id,$update);
                      $this->session->set_flashdata('success','product Updated successfully');
                      redirect(base_url('products/')); 
              }
           } // update product end
           $this->load->library('Template');
           $this->template->load('vtemplate', 'addpro', $data);
     }
    
   public function Statusproduct()
     {

       if(isset($_POST['id']))
       {
          $id=$_POST['id'];
          $status=$_POST['status'];
          $this->load->model('Mproduct');
          $res = $this->Mproduct->product_status($id,$status);
         // p($res);
          if($res>0)
           {
            $this->session->set_flashdata('success',"product status updated sucessfully");
            return true;
           }
           else
           {
             $this->session->set_flashdata('error',"product status not updated sucessfully");
             return FALSE;
           }
       }
     }

public function delete()
     {
        $id = NULL;
              
        $this->load->model('Mproduct');
          if(isset($_GET['id']))
           {
              $id = $_GET['id'];
           }
                  
        $img = $this->Mproduct->get_img_name($id);
        //p($img);                
        //$check=$_FILES['image']['name'];
        $filename = $img['image'];
        $path = $_SERVER['DOCUMENT_ROOT'].'/ci_project/assests/DataTables/images/'.$filename ;

      if(is_file($path))
      {
        unlink($path);
        echo 'File '.$filename.' has been deleted';
      } else 
      {
        echo 'Could not delete '.$filename.', file does not exist';
      }
        $this->session->set_flashdata('success','product deleted successfully'); 
        $data = $this->Mproduct->del_product($id);
        redirect(base_url('products/'));
        $this->load->library('Template');
        $this->template->load('vtemplate', 'addpro', $data);       
     }
   
    public function get_category()
          {    
            $this->load->model('Mcategory');
            $res = $this->input->post('cat_id');
            $data['category'] = $this->Mcategory->getsub_category($res);
           //p($data['category']);
            echo json_encode($data);
          }
}

