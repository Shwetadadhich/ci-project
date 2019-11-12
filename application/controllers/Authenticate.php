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
		$this->form_validation->set_rules('email','Email','required');
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


    public function logout()
    {
    	$this->session->unset_userdata('email');
    	redirect(base_url('Authenticate'));
    }
}

?>