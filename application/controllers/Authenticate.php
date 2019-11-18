
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller 
{
    public function index()
    {
			$this->load->view('login');
	}

	public function login_validation()
	{
    	$this->load->library('form_validation');

        // here i am creating login validation
		$this->form_validation->set_rules('email','Email','required|valid_email', 'callback__email_check');
		$this->form_validation->set_rules('password','Password','required');
         $this->form_validation->set_rules('g-recaptcha-response','Captcha','required');

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
                //Create Session
				$session_data = array(
                       'email' => $email
					);
				$this->session->set_userdata($session_data);
				return redirect('HomeDashboard');
			}
			else{
				// if email or password is wrong show flash message
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

		//include APPPATH . '/libraries/PHPMailer_Lib.php';
        //$mail = new PHPMailer;
		
		//$email = $_POST['email'] ;

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
            $mail->isSMTP();
	        $mail->Host     = 'smtp.gmail.com';
	        $mail->SMTPAuth = true;
	        $mail->Username = 'shwetadadhich31@gmail.com';
	        $mail->Password = 'tinadadhich3131';
	        $mail->SMTPSecure = 'ssl';
	        $mail->Port     = 465;
				/*if($_SERVER['HTTP_HOST']=="localhost")
				{
				  //SMTP configuration
				  $email_config = array(
				                'smtp_host'=>'smtp.googlemail.com',
				                'smtp_user'=>'shwetadadhich31@gmail.com',
				                'smtp_pass'=>'tinadadhich3131',
				                'smtp_port'=>587,
				                'protocol' =>'smtp',
								'mailtype'  => 'html/text', 
							    'charset'   => 'iso-8859-1', 
    				            'smtp_timeout' => 7,
    				            'value' => 'hello i am codeigniter',
				            );
				}*/

			$this->load->library('email');
			//$this->email->initialize($email_config);

            //$this->email->set_newline('\r\n');
			$mail->setFrom('shwetadadhich31@gmail.com',"sweta dadich");
			//$mail->addReplyTo($this->input->post('email'));

			$mail->addAddress($this->input->post('email'));
 
			$mail->Subject = 'Reset Your password';
            
            $mail->isHTML(true);
			
			$message = "<p>This email has been sent as a request to reset our password</p>";
			$message .="<p><a href='".base_url()."Authenticate/reset_password/$temp_pass'>Click Here</a>If you want to reset your password, if not, then ignore</p>";
			//$message = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            //<p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
            $mail->Body = $message;
			//$this->email->message($message);
            
			if($mail->send())
			{
				$this->load->model('Authe_Model');
				if($this->Authe_Model->temp_reset_pass($temp_pass))
				{
					echo "check your email for instruction , thank you";
				}
				else
                {
                  echo 'Message could not be sent';
                }
           	}
           	else
			{
				echo "your email is not in our database";
			}


           
           // if(!$mail->send())
           // {
           //    echo 'Message could not be sent.';
           //    echo 'Mailer Error: ' . $mail->ErrorInfo;
           //  }
           //  else
           //  {
           //    echo 'Message has been sent';
           //  }


        /*else
           {
           	//echo "email was not sent , please contact your adminitrator";
           	   echo $this->email->print_debugger();
           }
		}*/
		
	}
	else
	{
				p('fdvf');
	}
}

	public function reset_password($temp_pass)
	{
       $this->load->model('Authe_Model');
       if($this->Authe_Model->temp_pass_valid($temp_pass))
       {
       	 $this->load->view('reset_password');
       }
       else
       {
       	echo "the key is not valid";
       }
	}

	public function update_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password','password','required|trim');
		$this->form_validation->set_rules('cpassword','confirm password','required|trim|matches[password]');
		if($this->form_validation->run())
		{
			echo "password match";
		}
		else
		{
			echo "password not match";
		}
	}

    
    public function logout()
    {
    	$this->session->unset_userdata('email');
    	redirect(base_url('Authenticate'));
    }
}

?>