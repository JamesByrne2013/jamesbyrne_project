<?php
class Membership extends CI_Model
{
	   function Membership()
	  {
		parent::__construct();
	  }
	

	
	   function newUser($username, $password)
	  {
		$newMember = array ('username' => $username,
				            'password' => $password);
		$insert = $this->db->insert('membership', $newMember);
	
	   }
	
	
       function getMembers()
       {
       	 $membersSet = $this->db->get('membership');
       	 $members = array();
       	 foreach ($membersSet->result() as $row)
       	 {
       	 	$members[] = $row->username;
       	 }
        
       	 return $members;
       
       }	
       
      function getOtherMembers($username)
      {
    	    $this->db->select('*')->from('membership')->where('username !=', $username);
  	        $membersSet = $this->db->get();
    	    $membersList = array();
    	
    	    foreach ($membersSet->result() as $row)
    		{
      			$membersList[] = $row->username;
    		}
    	
    		return $membersList;
      }
	
      function deleteUser($username)
    {
  	        $deleteMember = $this->db->select('*')->from('membership')->where('username', $username);
  	        $delete = $this->db->delete('membership', $deleteMember);
  	 }
	
  
	
}