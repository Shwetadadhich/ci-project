<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller 
{
    public function index()
    {
    if(isset($_SESSION['email']))
    {
       header('location: HomeDashboard');
    }
		$this->load->view('login');
	}

	public function login_validation()
	{
    	$this->load->library('form_validation');

        // here i am creating login validation
		$this->form_validation->set_rules('email','Email','required|valid_email', 'callback__email_check');
		$this->form_validation->set_rules('password','Password','required');
         //$this->form_validation->set_rules('g-recaptcha-response','reCaptcha','required');

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
			    $this->session->unset_userdata($session_data);
			    $login = $this->Authe_Model->login_data($email,$password);
				$this->session->set_userdata($session_data);
				return redirect('HomeDashboard');
			}
			else{
				$this->session->set_flashdata('error', 'invalid Email and Password.');
				return redirect('Authenticate');
			}
		}
	  else
	  {
          $this->load->view('login');
	  }
	}

	public function forget_password()
	{
		$this->load->view('forget_password');
	}

	public function recover_password()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|callback_validate_credentials');
		
		 // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
		$this->load->model('Authe_Model');

		if($this->Authe_Model->email_exist())
		{
			$temp_pass = md5(uniqid());
			$email = ($this->input->post('email'));
			//p($email);
            $mail->isSMTP();
	        $mail->Host     = 'smtp.gmail.com';
	        $mail->SMTPAuth = true;
	        $mail->Username = 'shwetadadhich31@gmail.com';
	        $mail->Password = 'tinadadhich3131';
	        $mail->SMTPSecure = 'ssl';
	        $mail->Port     = 465;
				
			$this->load->library('email');
			//$this->email->initialize($email_config);

			$mail->setFrom('shwetadadhich31@gmail.com',"shweta dadhich");
			//$mail->addReplyTo($this->input->post('email'));

			$mail->addAddress($this->input->post('email'));
 
			$mail->Subject = 'Reset Your password';
            
            $mail->isHTML(true);
			
			$message = "<p>This email has been sent as a request to reset our password</p>";
			$message .="<p><a href='".base_url()."Authenticate/reset_password/?email=$email&&temp_pass=$temp_pass'>Click Here</a>If you want to reset your password, if not, then ignore</p>";
			
            $mail->Body = $message;
			//$this->email->message($message);
            
			if($mail->send())
			{
				$this->load->model('Authe_Model');

				if($this->Authe_Model->temp_reset_pass($temp_pass,$email))
				{
					//p("successss");
					echo "check your email for instruction , thank you";
				}
				else
                {
                  echo 'Message could not be sent';
                }
           	}
	    }
		else
			{
				$this->session->set_flashdata('msg',"your email is not in our database");
				$this->load->view('forget_password');
				//echo "your email is not in our database";
				//echo $this->email->print_debugger();
			}
}

	public function reset_password($temp_pass=null)
	{
		$data['temp_pass']=$this->input->get('temp_pass');
		$_SESSION['temp_pass'] = $data['temp_pass'];

		if(isset($_GET['temp_pass']))
		{
			$temp_pass = $_GET['temp_pass'];
		}
		if(isset($_GET['email']))
		{
			$email = $_GET['email'];
		}
       
       $this->load->model('Authe_Model');
       //p($this->Authe_Model->temp_pass_valid($temp_pass));
       if($this->Authe_Model->temp_pass_valid($temp_pass))
       {
       	 //p("successss"); 
       	 $this->load->view('reset_password');
       }
       else
       {
       	echo "the key is not valid";
       }
	}

	public function update_pass()
	{

		$_SESSION['temp_pass'];
        
        //p($this->input->post());
        $data = $this->input->post();

        if($data['password'] == $data['cpassword'])
        {
            $this->db->query("update users set password='".$data['password']."' where password='".$_SESSION['temp_pass']."'");
            $this->session->set_flashdata('success',"password change successfully");
        	redirect(base_url("Authenticate/login_validation"));
        }
        else
        	{
               $this->session->set_flashdata('error',"invalid password");
               $this->load->view('reset_password');
        	}
		
	}

	public function register_frm()
	{
	   $this->load->view('register');
	}

	public function register_now()
	{
	  $data = [];
	  if($this->input->post('register'))
	  {
	  	$new['name'] = $this->input->post('name');
	  	$new['user_name'] = $this->input->post('username');
	  	$new['email'] = $this->input->post('email');
	  	$new['password'] = $this->input->post('password');
	  	
	  	$this->load->Model('Authe_Model');
        $this->Authe_Model->register_new($new);
        $this->session->set_flashdata('register','Register successfully');
        redirect(base_url('Authenticate/index'));
        $this->load->view('login');
	  }	
	}

    
    public function logout()
    {
    	$this->session->unset_userdata('email');
    	redirect(base_url('Authenticate'));
    }
}

?>