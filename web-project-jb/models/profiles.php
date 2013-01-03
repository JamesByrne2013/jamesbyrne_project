<?php

class Profiles extends CI_Model
{
	function Profiles()
	{
		parent::__construct();
	}
	
	
	 function exists($user)
	 {
        $this->db->select('*')->from("profiles")->where('user', $user);
	    $query = $this->db->get();
	    
	    if ($query->num_rows() > 0)
	    {
	
	     return true;
	  /*
	   echo "user $user exists!";
	  $row = $query->row();
	  echo " and his profile is $row->profiletext";
	*/
	    }
	  
	  else
	
	  {
		
	    return false;
	//echo "no such user as $user!";
	   }
	 
	}
	

	function putProfileText($user, $text)
	{
	
		$record = array('user' => $user, 'profiletext' => $text);
		if ($this->exists($user))
			{
				$this->db->where('user', $user)->update('profiles', $record);
			}
			else
			{
				$this->db->where('user', $user)->insert('profiles', $record);
			}
	}
	
	function getProfileText($user)
	{
		$this->db->select('*')->from('profiles')->where('user', $user);
		$query = $this->db->get();
		$row = $query->row();
		if ($query->num_rows() > 0)
		{
			return $row->profiletext;
		}
		else
		{
			return "";
		}
	}

	
	function deleteProfileText($username)
	{
		
		$this->db->select('*')->from('profiles')->where('user', $username);
		$this->db->delete('profiles');
		 
	}


	
}