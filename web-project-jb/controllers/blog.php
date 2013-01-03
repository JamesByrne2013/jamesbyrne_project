<?php
class Blog extends CI_Controller {
	
	public function _construct()
	{
		parent::__construct();
		$this->load->model("blogmodel"); 
		$this->load->model("profiles");

	}
	
 
	
	public function index()
	{
		
		$username = $this->session->userdata('username');

		$id = $this->session->userdata('id');
		
		$viewData['username'] = $username;
		
		$this->load->model('Blogmodel');
		
		
		if($this->input->post('act') =='create_post')
		{
			$this->Blogmodel->insert_entry();
			
		}
	
		
		$viewData['blogs'] = $this->Blogmodel->get_last_ten_entries();
		
	    $this->load->view('shared/header');  
        $this->load->view('blog/blogtitle', $viewData);
        $this->load->view('shared/nav');
        $this->load->helper('form');// Load the form helper.
         
        // Lets set the stuff that will be getting pushed forward...
        $data = array();
        $data['form_open']=form_open();
        $data['form_title'] = form_input(array('name' => 'title'));
        $data['form_text'] = form_textarea(array('name' => 'text'));
        $data['form_hidden'] = form_hidden('act','create_post');
        $data['form_submit'] = form_submit('submit','Make Post');
         
        
        $this->load->view('blog/post', $data);
        $this->load->view('blog/blogview');
       
        
           $this->load->view('shared/footer');
        }
        
  
	
}