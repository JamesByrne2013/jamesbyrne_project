<?php
class Start extends CI_Controller 
{
  function Start()
  {
    parent::__construct();
  }
   function index()
   {
   	$this->load->view('shared/header');
   	$this->load->view('account/starttitle');
   	$this->load->view('account/startview');
   	$this->load->view('shared/footer');
   }
   
	
}