<?php
class Messages extends CI_Model
{
	
	
	
  function Messages()
  {
	parent::__construct();
  }


  function deleteMsg($message_id)
  {
  	
  	$this->db->where(array('message_id' => $message_id));
  	$this->db->delete('messages');
  	
  }
  

  function addMessage( $from, $to, $message)
   {
	$record = array(
		    
			'to' => $to,
			'from' => $from,
			'message' => $message);
	$this->db->insert('messages', $record);	
 
   }
   
   function getMessages($user)
   {
   
   	$this->db->select('*');
   	$this->db->from('messages');
   	$this->db->where('to', $user);
   	$messagesSet = $this->db->get();
   
   	$messages = array ();
   	
   	foreach ($messagesSet->result() as $row)
   	{
   		$messages[] = array(
   				  'message_id' => $row ->message_id,
   			     'from'    => $row ->from,
   				 'message' => $row ->message);
   		
   	}		
   		return $messages;
   
   }
   
   function deleteAccountMsg($username)
   {
   	
   	$this->db->select('*')->from('messages')->where('from', $username)->or_where('to', $username);
     
   	$this->db->delete('messages');
   
  	
   }
   
   
  

   
}

