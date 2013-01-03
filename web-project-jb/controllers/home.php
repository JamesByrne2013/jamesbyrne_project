<?php
class Home extends CI_Controller 
{
  function Home()
  {
    parent::__construct();
    $this->load->model('messages');
    $this->load->model('friends');
    $this->load->model("profiles");
   
    
  }
  
    function drop($member)
    {
    $username = $this->session->userdata('username');
    $this->friends->deleteFriend($username, $member);
    redirect('home');
    }
   
 
    
   function deleteMsg($messageid) {
   
   	$this->messages->deleteMsg($messageid);
   	
   	redirect('home');
   
   }
    
  
   
	function index()
	{
   
     $username = $this->session->userdata('username');
     $membername = $this->session->userdata('membername');
     $viewData['membername'] = $membername;
     $viewData['username'] = $username;
     $viewData['following'] = $this->friends->getFollowing($username);
     $viewData['followers'] = $this->friends->getFollowers($username);
     $viewData['messages'] = $this->messages->getMessages($username);
     $viewData['friends'] = $this->friends->getFriends($username);
     //$viewData['messages'] = $this->messages->deleteMsg($membername);
     
	 $this->load->view('shared/header');
     $this->load->view('home/hometitle', $viewData);
     $this->load->view('shared/nav');
     $this->load->view('home/homeview', $viewData);
     $this->load->view('shared/footer');
	}
	

}	
