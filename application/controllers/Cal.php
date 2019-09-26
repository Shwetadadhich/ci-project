<?php 
  class Cal extends CI_Controller 
  {

  	function index()
  	{
  		$this->load->view('calc');
  	}

  	function calculate()
  	{
  		if(isset($_POST['add'])) 
  		{
  			echo 'Result of '.$_POST['first'].'+'.$_POST['second'].' = '.($_POST['first']+$_POST['second']);
  			
  		}
  		
  		if(isset($_POST['sub']))
  		{
  			echo 'Subtraction is'.$_POST['first'].'-'.$_POST['second'].' = '.($_POST['first']-$_POST['second']);
  		}
  		if(isset($_POST['mul']))
  		{
  			echo 'multipication is'.$_POST['first'].'*'.$_POST['second'].' = '.($_POST['first']*$_POST['second']);
  		}
  		if(isset($_POST['div']))
  		{
  			echo 'Division is'.$_POST['first'].'/'.$_POST['second'].' = '.($_POST['first']/$_POST['second']);
  		}
    }
  }
?>



