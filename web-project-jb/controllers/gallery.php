<?php

 class Gallery extends CI_Controller {


	
	function __construct()
	{
		// Call the parent construct
		parent::__construct();
	
		$this->load->model("profiles");
		$this->load->model("gal_model");
		$this->load->helper(array('form', 'url'));
		
		$this->gallery_path = 'web-project-jb/assets/gallery/';
		//$this->gallery_path_url = base_url().'web-project-jb/assets/gallery/';
	
	}
	
	
	function deleteImage($imageid) {
		 
		$this->gal_model->deleteImage($imageid);
	
		redirect('gallery');
		 
	}


	function upload()
	{
		
		$config = array(
					
				'allowed_types' =>'gif|jpg|jpeg|png',
				'upload_path' => $this->gallery_path,
				'max_size' => 10000,
				'max_width' => 1024,
				'max_height' => 768);
		
		$this->load->library('upload', $config);
		
		$username = $this->session->userdata('username');
	
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
	
		    $username = $this->session->userdata('username');
		   
  		    $viewData['username'] = $username;
  		    
  		    $viewData['images'] = $this->gal_model->getGalleryImage($username);
  		    
  		    $this->load->view('shared/header');
  		    $this->load->view('gallery/galtitle', $viewData);
  		    $this->load->view('shared/nav');
  		    $this->load->view('gallery/galview', $error, $viewData, array('error' => ' ' ));
  		    $this->load->view('shared/footer');
  		    
  	
  		
		}
		else
		{
			$file_data  = $this->upload->data();
			
			$galleryImage = $this->gallery_path.$file_data['file_name'];
			
			$data['galleryImage'] = $this->gallery_path.$file_data['file_name'];
			
			$this->username = $this->session->userdata('username');
			
			$images = $this->session->userdata('images');
			
			
			$this->gal_model->putGalleryImage($username, $galleryImage);
					
			$viewData['username'] = $username;
			
			$viewData['images'] = $this->gal_model->getGalleryImage($username);

			var_dump($galleryImage);
	
		
			
			$username = $this->session->userdata('username');
			
			$this->load->view('shared/header');
			$this->load->view('gallery/galtitle', $viewData);
			$this->load->view('shared/nav');
			$this->load->view('gallery/galview', $viewData);
			$this->load->view('shared/footer');
			
			redirect('gallery');
	
			
		}
	}
	
	function index()
	{
	
		$username = $this->session->userdata('username');
	
		$this->load->library('upload');
		
		//$data['gal_model'] = $this->gal_model->getGalleryImage($username);
		
		$viewData['username'] = $username;
		$viewData['images'] = $this->gal_model->getGalleryImage($username);
		
		$this->load->view('shared/header');
		$this->load->view('gallery/galtitle', $viewData);
		$this->load->view('shared/nav');
		$this->load->view('gallery/galview', $viewData, array('error' => ' ' ));
		$this->load->view('shared/footer');
		
	}

}