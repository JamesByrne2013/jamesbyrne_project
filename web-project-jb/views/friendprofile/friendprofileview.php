<div id="maincontent">
    <div id="primary">  
     <h3><?="Profile Image"?></h3> 
      <?php if(!empty($friendprofilepic)){
     	?>
       <img src = "<? if (isset($friendprofilepic)) echo base_url($friendprofilepic);?>" width='300' height='300'/> 
         <?php }else{ ?>
            <img src="http://localhost/ci/web-project-jb/assets/puploads/default_profile_image.png" width='300' height='300'/>
          <?php } ?>
        <p> <b>Status:</b>
          <?=$memberprofiletext;?>
        </p> 
      </div>  
      <div id="secondary">
        <div id = "friendgallery">
         <h2> Gallery </h2>
            <?php
               if(!empty($friendgalimages)){
               foreach($friendgalimages as $friendgalimages):
               if (isset($friendgalimages))$link = $friendgalimages['galleryimage'];?>
            <img src=" <?= base_url().$link;?>" width='150' height='100'/>
           <?php endforeach;?>
              <?php }else{ ?>
                  <p>No gallery images uploaded</p>
              <?php  }?> 
          </div>
        <div id="messages">
          <h2> Messages </h2>
            <ul>
              <?php
                if(!empty($messages)){
                foreach($messages as $message):
              //var_dump($message); ?>
              <li><?=$message['from']?> says...: "<?=$message['message']?>"</li>      
             <?php endforeach?>
             <?php }else{ ?>

            <?php 
               echo "<p>";
               echo 'No messages left yet !!!'; 
               echo "</p>";
             }?> 
         </ul>
            <?=form_open("friendprofile/leavemessage/$membername");?>
            <?php $msgbox = array('name'  => 'message',
                                 'rows'  => '2',
                                 'cols'  => '30');?>
            <?=form_textarea($msgbox);?>
            <?=form_submit('submit', 'Leave Message'); ?>
            <?=form_close(); ?> 
        </div>
      </div>
    </div>
