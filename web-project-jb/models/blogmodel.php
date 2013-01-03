<?php
class Blogmodel extends CI_Model
{
   function Blogmodel()
    {
        parent::__construct();
    } 
    
	public function get_last_ten_entries()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('blogs', 10);
		return $query->result();
		
}
	public function insert_entry()
	{
	    $this->title = $this->input->post('title');
        $this->body = $this->input->post('text');
        $this->username = $this->session->userdata('username'); 
        $this->date = date("Y-m-d");
        
        $this->db->insert('blogs', $this);
        
       
    }
 
    
    function deleteBlog($username)
    {
    
    	$this->db->select('*')->from('blogs')->where('username', $username);
    	 
    	$this->db->delete('blogs');
    }	 
    
}