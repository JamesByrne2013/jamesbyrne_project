<?php
class Login extends CI_Controller 
{
  function Login()
  {
    parent::__construct();
    $this->load->model('membership');
  }



  function loguserin()
  
  {
  
  	   $this->load->helper(array('form', 'url'));
  	 
  	   $this->load->library('form_validation');
  	 
       $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]|callback_validateUser|trim');
  	   $this->form_validation->set_rules('password', 'Password', 'required|trim');
  	
  	
  	//$valid = $this->validateUser($username, $password);
  
  	if ($this->form_validation->run())
  	{
  		$username = $this->input->post('username');
  		$password = $this->input->post('password');
  		
  		$this->validateUser($username, $password);
  		$this->session->set_userdata('status', 'OK');
  		$this->session->set_userdata('username', $username);
  
  		redirect('home');
  	}
  	else
  	{
  		$this->session->set_userdata('status', 'NOT_OK');
  		$this->load->view('shared/header');
  		$this->load->view('account/logintitle');
  		$this->load->view('account/loginview');
  		$this->load->view('shared/footer');
  	}
  }
  


  	function logout()
  {
  		$this->session->sess_destroy();
  		redirect ('start');
  }
  
  	function validateUser($username, $password)
  {
  		$this->db->select('*')->from('membership');
  		$this->db->where('username', $username);
  		$this->db->where('password', $password);
  		$query = $this->db->get();
  		if ($query ->num_rows ==1)
  		{
  			return true;
  		}
  		
  		else
  		{
  			//var_dump($username, $password);
  			$this->form_validation->set_message('validateUser', 'Invalid username/password');
  			return false;
  		}
  
     }
  		
  	function index()
  	{
   		 $this->load->view('shared/header');
         $this->load->view('account/logintitle');
         $this->load->view('account/loginview');
         $this->load->view('shared/footer');
    }
}