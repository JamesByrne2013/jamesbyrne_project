<?php
class FriendProfile extends CI_Controller
{
	function FriendProfile()
	{
		parent::__construct();
		$this->load->model("profiles");
	    $this->load->model("messages");
	    $this->load->model("profileimages");
	    $this->load->model("gal_model");
	}
	
	function leaveMessage($for)
	{
		$message = $this->input->post("message");
		$username = $this->session->userdata('username');
		$this->messages->addMessage($username, $for, $message);
		redirect ("friendprofile/view/$for");
	}
	

    function deleteMsg($messageid) 
    {
       $membername = $this->session->userdata('membername');
   	   $this->messages->deleteMsg($messageid);
   	  
   	
       redirect("friendprofile/view/$messageid");
   
   }
	
	function view($membername)
	{
		$viewData['membername'] = $membername;
		$viewData['friendprofilepic'] = $this->profileimages->getProfileImage($membername);
		$viewData['friendgalimages'] = $this->gal_model->getGalleryImage($membername);
		$viewData['memberprofiletext'] =$this->profiles->getProfileText($membername);
		$viewData['messages'] = $this->messages->getMessages($membername);
		
		
		$this->load->view('shared/header');
		$this->load->view('friendprofile/friendprofileheader', $viewData);
		$this->load->view('friendprofile/friendprofileview', $viewData);
		$this->load->view('friendprofile/friendprofilefooter');
		
		
	}
	
}