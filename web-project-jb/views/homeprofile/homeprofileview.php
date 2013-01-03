<div id="maincontent">
<div id="primary">
   <?//=$error;?>
    <?//=$data;?> 
    <h3><?="Profile Image"?></h3>
     <?php if(!empty($img)){
     	?>
     <img src="<?php if (isset($img)) echo base_url($img); ?>" width='300' height='300'/>
     <?php }else{ ?>
            <img src="http://localhost/ci/web-project-jb/assets/puploads/default_profile_image.png" width='300' height='300'/>
          <?php } ?>
      <?=form_open_multipart('homeprofile/upload');?>
        <input type="file" name="userfile" value=""/>
        <?=form_submit('submit', 'upload')?>
        <?=form_close();?> 
        <?php if (isset($error)) echo $error;?>

      </div> 
    </div>  
       <div id="secondary">
      <p>
          <?=$profileText;?>
        </p>
        <p>
          <?=form_open('homeprofile/changetext'); ?>
          <?php $msgbox = array(
          		'name' => 'profiletext',
          		'rows' => '8',
          		'cols' => '30',
          		);?>
         <?=form_textarea($msgbox);?> 		
         </p>
         <p>
          <?=form_submit('submit', 'Change'); ?>
          <?=form_close(); ?>
        </p>
    </div>
  