<?php
class Gal_model extends CI_Model
{
	var $gallery_path;
	
	
	function Gal_model()
	{
		parent::__construct();
		
		
	}	
	
	function deleteImage($imageid)
	{
		 
		$this->db->where(array('imageid' => $imageid));
		$this->db->delete('gallery');
		 
	}
    

	function putGalleryImage($username, $galleryImage)
	{
	
	
		$record = array('user' => $username, 'galleryimage' => $galleryImage);
	
	    $this->db->where('user', $username)->insert('gallery', $record);		
	
	
	}
	
	function getGalleryImage($username)
	{
	
		$this->db->select('*')->from('gallery')->where('user', $username);
	
		$imagesSet= $this->db->get();
		
		$images = array();
		
		foreach ($imagesSet->result() as $row)
		{
			$images[] = array('imageid' => $row->imageid,
					'user' => $row->user,
					'galleryimage' => $row->galleryimage);
		}
		return $images;
	
	
	}
	
	function deleteAccountGallery($username)
	{
	
		$this->db->select('*')->from('gallery')->where('user', $username);
		 
		$this->db->delete('gallery');
		 
		 
	}
	 
	


}