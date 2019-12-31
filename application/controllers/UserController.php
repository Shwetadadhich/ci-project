<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

public function __construct()
    {
      parent::__construct();
      $this->load->model('Usermodel');
      
    }

	public function index()
	{ 
        //$var = 'sd';
        //echo '<pre>';
        //echo 'sd'.'<br>';
        //echo "sd";
        //echo '$var'.'<br>';
        //echo "$var".'<br>';
        //echo $var.'<br>';
        //echo '</pre>';
        //p('sss');
      $this->template->load('vtemplate', 'user_list');

    }
    
    public function user_list()
    {
      $data = $this->Usermodel->get_user();
      $list = array();
      $no = $_POST["start"];
      //$status = '';
        foreach ($data as $val) {
            //p($val,0);
            $no++;
            $user = array();
            $user[] = $no;
            $user[] = $val->user_type;
            $user[] = $val->name;
            $user[] = $val->user_name;
            $user[] = $val->email;
            //$user[] = $val->password;
            $user[] = $val->number/*(DATE_FORMAT(start_date, '%d/%m/%Y'))*/;
            $user[] = '<img src="'.base_url().'assests/DataTables/images/'.$val->image.'" width="50" height="35" class="img-thumbnail" />';
            $user[] = $val->dob;
            $user[] = $val->gender;
            $user[] = $val->hobby;
            //$status_cat =$val->status;
                    
                /*if($val->status == 0)
                   { 
                      $status = '<a onclick="changestatus('.$val->id.','.$status_cat.')" class="btn btn-danger">Active</a>';
                      }
                      else
                      {
                        $status = '<a onclick="changestatus('.$val->id.','.$status_cat.')" class="btn btn-success">InActive</a>';
                      }

            $user[] = $status;*/ 

            $user[] = '<a href="'.base_url("UserController/update_user").'?id='.$val->id.'"<i style="font-size:25px;padding-right:10px;" class="fa fa-pencil" aria-hidden="true"></i></a>
                     <a onclick="return confirm(\'Are You Sure To Delete\');" href="'.base_url("UserController/delete_user").'?id='.$val->id.'"<i style="font-size:25px; color:red;" class="fa fa-trash-o" aria-hidden="true"></i></a>';
            $list[] = $user;
        }
        //exit;
        $output = array(
                        "draw" => $_POST["draw"],
                        "recordsTotal" => $this->Usermodel->count_all_user(),
                        "recordsFiltered" => $this->Usermodel->count_filtered_user(),
                        "data" => $list,
                );
        //output to json format
        echo json_encode($output);
 
    }

    public function adduser()
    {
      $data = [];
     
      $this->load->library('form_validation');

      $this->form_validation->set_rules('name', 'name', 'required');
      $this->form_validation->set_rules('uname', 'Username', 'required|min_length[5]|is_unique[users.user_name]');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('gender', 'gender', 'required');
      $this->form_validation->set_rules('dob', 'B irthdate', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
      //$this->form_validation->set_message('required', '{field} is required <- Please fill the Box');

      //$add = array();

      if($this->input->post('add'))
      { 
        if ($this->form_validation->run() !== FALSE)
        {

          $add['user_type'] =$this->input->post('usertype');
          $add['name'] =$this->input->post('name');
          $add['user_name'] =$this->input->post('uname');
          $add['email'] =$this->input->post('email');
          $add['password'] =$this->input->post('password');
          $add['number'] =$this->input->post('number');

          if(empty($this->input->post('image')))
          {
            $config['upload_path'] = FCPATH ."assests/DataTables/images";// upload the image upload library insert
            $config['allowed_types'] = 'jpg|jpeg|jpe|gif|png|zip|svg|bmp';
            $config['max_size']  = '100000000';
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
           }
          $dobb =$this->input->post('dob');
          $newDate = date("Y-m-d", strtotime($dobb));
          $add['dob'] =$newDate;
          $add['gender'] =$this->input->post('gender');
          $add['hobby'] =$this->input->post('hobby');
            // p($add); 
           $this->Usermodel->add_user($add);
           $this->session->set_flashdata('success','User inerted successfully');
          
           redirect(base_url('UserController/')); 
        }
          else
           {
                //array ('name'=>'name is required','email'=>'valid email address');
            $data["errors"] = $this->form_validation->error_array();
                // p($data["errors"]);
           }
       }
      $this->template->load('vtemplate', 'adduser', $data);
    }

     public function update_user($id=FALSE)
    {
    	if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $data['get_user'] = $this->Usermodel->get_edit_user($id);
            //p($data);
        }
         
        if($this->input->post('update'))
        {
            //p($this->input->post());
          $update['user_type'] = $this->input->post('usertype');
          $update['name'] = $this->input->post('name');
          $update['user_name'] = $this->input->post('uname');
          $update['email'] = $this->input->post('email');
          $dobb =$this->input->post('dob');
          
          $newDate = date("Y-m-d", strtotime($dobb));
          $update['dob'] =$newDate;
          
          $update['number'] = $this->input->post('number');
          //$update['image'] = $this->input->post('image');
            $imgcheck=$_FILES['image']['name'];
               //p($imgcheck);die;
                 if(!empty($imgcheck))
                  {
                    $res = $this->db->query("select image from users where id=$id")->row('image');
                      if(!empty($res))
                    {
                      $path = FCPATH ."assests/DataTables/images/$res";
                      unlink($path);
                      //p($path);die;
                    }
                   $config['upload_path'] = FCPATH ."assests/DataTables/images";// upload the image upload library insert
                   $config['allowed_types'] = 'jpg|jpeg|jpe|gif|png|zip|svg|bmp';
                   $config['max_size']  = '100000000';
    
                   $this->load->library('upload', $config);
                          
                    if(!$this->upload->do_upload('image'))//$update['image'] = $this->input->post('image');
                       { 
                        $error = array('error' => $this->upload->display_errors());
                          //print_r($error);die; 
                        $this->session->set_flashdata('error',$error['error']);
                       }
                        $data = $this->upload->data(); 
                        //echo '<pre>'; p($data);
                        $update['image'] = $data['file_name'];
                  }
          $update['gender'] = $this->input->post('gender');
          $update['hobby'] = $this->input->post('hobby');
          //p($update);die;
          $this->Usermodel->update_user($id,$update);
          $this->session->set_flashdata('success','User updated successfully');
           redirect(base_url('UserController/')); 
        }
         
         $this->template->load('vtemplate', 'adduser', $data);
    }



    public function delete_user()
    {
        $id = NULL;
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        $this->session->set_flashdata('success','User Deleted successfully');
        $this->Usermodel->delete_user($id);
        redirect(base_url('UserController/'));
        $this->template->load('vtemplate', 'adduser', $data);
    }

}
