 <?php
class HomeProfile extends CI_Controller 
{
 
	
 	function __construct()
	{
    // Call the parent construct
       parent::__construct();

  	   $this->load->model("profiles");
  	   $this->load->model("profileimages");
       $this->load->helper(array('form', 'url'));      

 	} 
  
    function changetext()
    {
       $username = $this->session->userdata('username');
       $this->profiles->putProfileText($username, $this->input->post("profiletext"));
       redirect('homeprofile/index');
    }
 
 
  
    function upload()
    {
  		$config = array(
			
		    'allowed_types' =>'gif|jpg|jpeg|png',
		    'upload_path' =>'./web-project-jb/assets/puploads/',
			 'max_size' => 10000,
		     'max_width' => 1024,
  			'max_height' => 768);

  	
  	    $this->load->library('upload', $config);
  	  
  	    $username = $this->session->userdata('username');
  	//fail show upload form
  	if (! $this->upload->do_upload())
  	{
  
  		$error = array('error'=>$this->upload->display_errors());
  		
  		$username = $this->session->userdata('username');
  		
  			
  		$viewData['username'] = $username;
  		$viewData['profileText'] = $this->profiles->getProfileText($username);
  			
  		$this->load->view('shared/header');
  		$this->load->view('homeprofile/homeprofiletitle', $viewData);
  		$this->load->view('shared/nav');
  		$this->load->view('homeprofile/homeprofileview', $error, $viewData, array('error' => ' ' ));
  		$this->load->view('shared/footer');
  		
  		//redirect('homeprofile/index');
  
  	   }
  
  	  else
  	   {
  		//successful upload so save to database
  		
  		
  		$file_data = $this->upload->data();
  		
  		$img = '/web-project-jb/assets/puploads/'.$file_data['file_name'];
  		
  		$data['img'] = '/web-project-jb/assets/puploads/'.$file_data['file_name'];
  		// you may want to delete the image from the server after saving it to db
  		// check to make sure $data['full_path'] is a valid path
  		// get upload_sucess.php from link above
  		//
  		
  		
  		
  		$this->username = $this->session->userdata('username');
  		
  		$this->profileimages->putProfileImage($username, $img);
  		 
  		$data['username'] = $username;
  		$data['profileimages'] = $this->profileimages->getProfileImage($username);
  		//var_dump($data);
  		
  		$this->session->set_userdata($img);
  		
  		
  		$viewData['username'] = $username;
  		$viewData['profileText'] = $this->profiles->getProfileText($username);
  		
  		$username = $this->session->userdata('username');
  		
  		$this->load->view('shared/header');
  		$this->load->view('homeprofile/homeprofiletitle', $viewData);
  		$this->load->view('shared/nav');
  		$this->load->view('homeprofile/homeprofileview', $data, $viewData);
  		$this->load->view('shared/footer');
  	
  		
  		redirect('homeprofile');
  	    }
  
     }
   
 
  
       function index()
      {
      	
      	$username = $this->session->userdata('username');
      	
      	$this->load->library('upload');
      	 
      	$data['profileimages'] = $this->profileimages->getProfileImage($username);
      	 
      	$file_data = $this->upload->data();
      	
      	$file_data['file_name'] = $this->profileimages->getProfileImage($username);
      	
      	$img = '/web-project-jb/assets/puploads/'.$file_data['file_name'];
      	
      	$data['img'] = $file_data['file_name'];
     
  	    //var_dump($data);
  	    
  	    $viewData['username'] = $username;
  	    $viewData['profileText'] = $this->profiles->getProfileText($username);
  	 
  	    $this->load->view('shared/header');
  	    $this->load->view('homeprofile/homeprofiletitle', $viewData);
  	    $this->load->view('shared/nav');
  	    //$this->load->view('homeprofile/upload_form', $data);
  	    $this->load->view('homeprofile/homeprofileview', $data, $viewData, array('error' => ' ' ) );
      	$this->load->view('shared/footer');
      }
 
     }
     