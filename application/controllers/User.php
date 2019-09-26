<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		echo'<h1>this is user controllers index function</h1>';
    }
    public function get($user_id=false)
    {
    	echo '<h3>This is User controllers get functions<h3>';
    	echo "<br />here we\'ll display users detail with id =".$user_id; 
    }
     public function list()
    {
    	$this->load->view('users');
    }

}
