<?php
class ProfileImages extends CI_Model
{

	function ProfileImages()
	{
		parent::__construct();


	}




	function exists($username)
	{
		$this->db->select('*')->from("profileimages")->where('user', $username);
		$query = $this->db->get();
			
		if ($query->num_rows() > 0)
		{

			return true;
			/*
			 echo "user $user exists!";
			$row = $query->row();
			echo " and his profileimage is $row->profileimage";
			*/
		}
			
		else

		{

			return false;
			//echo "no such user as $user!";
		}

	}


	function putProfileImage($username, $img)
	{


		$record = array('user' => $username, 'profileimage' => $img);
		$this->session->set_userdata($img);
		if ($this->exists($username))
		{
			$this->db->where('user', $username)->update('profileimages', $record);
				
				
		}
		else
		{
			$this->db->where('user', $username)->insert('profileimages', $record);

		}

	}

	function getProfileImage($username)
	{

		$this->db->select('*')->from('profileimages')->where('user', $username);

		$query = $this->db->get();
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->profileimage;
		}

		return "";


	}
	
	function deleteProImage($username)
	{
	
		$this->db->select('*')->from('profileimages')->where('user', $username);
	
		$this->db->delete('profileimages');
	}
	
}


