<?php
class Members extends CI_Controller 
{
  function Members()
  {
    parent::__construct();
    $this->load->model("membership");
    $this->load->model("friends");
  }
  
  
 function addfriend($friendname) 
 {
 	$username= $this->session->userdata('username');
 	$this->friends->addFriend($username, $friendname);
 	redirect('home');
 	
 }
  
function index()
  {
    //$membersList = $this->membership->getMembers();
    $username = $this->session->userdata('username');
    $membersList= $this->membership->getOtherMembers($username);
    $viewData['members']= $membersList;
    //$this->output->enable_profiler(TRUE);
  	
  	$this->load->view('shared/header');
    $this->load->view('members/memberstitle');
    $this->load->view('shared/nav');
    $this->load->view('members/membersview', $viewData);
    $this->load->view('shared/footer');
  }
  

}