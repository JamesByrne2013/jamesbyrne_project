<?php
class Deleteuseraccount extends CI_Controller 
{

 function Deleteuseraccount()
 {
   parent::__construct();
   
   $this->load->model("membership");
   $this->load->model("friends");
   $this->load->model("messages");
   $this->load->model("profiles");
   $this->load->model("blogmodel");
   $this->load->model("profileimages");
   $this->load->model("gal_model");
   
   $username = $this->session->userdata('username');
   $this->membership->deleteUser($username);
   $this->friends->deleteMemberFriend($username);
   $this->messages->deleteAccountMsg($username);
   $this->profiles->deleteProfileText($username);
   $this->blogmodel->deleteBlog($username);
   $this->profileimages->deleteProImage($username);
   $this->gal_model->deleteAccountGallery($username);
   $this->session->sess_destroy();
   redirect('start');
 } 
}

?>