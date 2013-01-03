<div id="maincontent">
      <div id="primary"> 
      
  <div id="gallery">
  <ul class="enlarge">
  <?php if (isset($images) && is_array($images)):
  		foreach($images as $galleryImage):
  		$delete = $galleryImage['imageid'];
  		$link = $galleryImage['galleryimage']; ?>
  		<li><img src="<?php  echo base_url().$link; ?>" width='150' height="100" />
  		<span><img src="<?php  echo base_url().$link; ?>" width='300' height="200" />
  		<?=anchor("gallery/deleteImage/$delete",  'Delete')?></span></li>
    	<?php endforeach; endif; ?>
    	</ul>
    </div>
  <div id ="upload">
  
       <?=form_open_multipart('gallery/upload');?>
        <?=form_upload("userfile");?>
        <?=form_submit('upload', 'Upload')?>
        <?=form_close();?>
        <?php if (isset($error)) echo $error;?>

  
  </div>
   </div>
   
    </div>