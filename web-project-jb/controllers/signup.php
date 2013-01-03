<?php
class Signup extends CI_Controller
{
	function Signup()
	{
		parent::__construct();
		$this->load->model('membership');

	}



	function index()
	{
		$this->load->view('shared/header');
		$this->load->view('account/signuptitle');
		$this->load->view('account/signupview');
		$this->load->view('shared/footer');
	}



	function register()
	{

		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_usernameTaken|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ( $this->form_validation->run() ){
		
			$username = $this->input->post('username');
			$password = $this->input->post('password');
		
			$this->membership->newUser($username, $password);
			$this->session->set_userdata('status', 'OK');
			$this->session->set_userdata('username', $username);
			redirect('home');
		}
		else {
		
			$this->session->set_userdata('status', 'NOT_OK');
			$this->load->view('shared/header');
			$this->load->view('account/signuptitle');
			$this->load->view('account/signupview');
			$this->load->view('shared/footer');
		}
	}


	function usernameTaken($username)
	{
		    $this->db->select('*')->from ('membership')->where('username', $username);
		    $query = $this->db->get();
		    if ($query->num_rows > 0)
		    {
			   $this->form_validation->set_message('usernameTaken', 'username taken');
			   return false;
		    }
		
		   else{
			
		   	  return true;
		   }
	  }




}

