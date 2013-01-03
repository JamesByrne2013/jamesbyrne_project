<?php
class Friends extends CI_Model
{
  function Friends()
  {
  	parent::__construct();
  }	
  
  function addFriend($username, $friendname)
  {
  	
  	$current_following = $this->getFollowing($username);
  	
  	if(!in_array($friendname, $current_following)){
  			
  	$record = array('username'=> $username,
  			         'friend' => $friendname);
  			
  	
  	$this->db->insert('friends', $record);
  	}
  	
  }
	
  function getFollowing($username)
  {
  	$following = array();
  	$this->db->select ('*')->from('friends')->where('username', $username);
  	$followingSet = $this->db->get();
  	foreach ($followingSet->result() as $row)
  	{
  			
  		$following[] = $row->friend;
  		
  	}
  
  	return $following;
  }
  
  function getFollowers($username)
  {
  	$followers = array();
  	$this->db->select('*')->from('friends')->where('friend', $username);
  	$followersSet = $this->db->get();
  	foreach ($followersSet ->result() as $row) 
  	{
  		$followers[] = $row->username;
  	}
  	    
  	return $followers;
  	
  }
  	
  function deleteFriend($username, $friend)	
  {
  	$this->db->select('*')->from('friends')->where('username', $username)->where('friend', $friend);
    $this->db->delete();
  }
  	
  
  function getFriends($username)
  {
  	$following = $this->getFollowing($username);
  	$followers = $this->getFollowers($username);
  	
  	$mutual = array_intersect ($followers, $following);
  	$followers = array_diff   ($followers, $mutual);
  	$following = array_diff   ($following, $mutual);
  	
  	$friends = array ('mutual'    => $mutual,
  			          'following' => $following,
  					  'followers' => $followers);
  	
  	return $friends;
  }

  function deleteMemberFriend($username)
  {
  	$deleteFriend = $this->db->select('*')->from('friends')->where('username', $username)->or_where('friend', $username);
  	$delete = $this->db->delete('friends', $deleteFriend);
  	 
  }

 }
