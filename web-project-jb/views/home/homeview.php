<div id="maincontent">
      <div id="primary">     
        <h2> Friends </h2> 
        <ul> 
           <?php foreach ($friends['mutual'] as $name):?>
           <li> 
           <?=anchor("friendprofile/view/$name", $name)?>, (<?=anchor("home/drop/$name", 'drop')?>)
           </li>
            <?php endforeach?>
         </ul>
       <h2> Following </h2> 
        <ul>
          <?php foreach($friends['following'] as $name):?>
            <li>  <?=anchor("friendprofile/view/$name", $name)?>, (<?=anchor("home/drop/$name", 'drop')?>)</li>
          <?php endforeach?>
        </ul>
        <h2> Followers </h2> 
        <ul>
         <?php foreach($friends ['followers'] as $name):?>
            <li>
              <?=anchor("friendprofile/view/$name", $name)?>
            </li>
          <?php endforeach?>
        </ul>
      </div>  
      <div id="secondary">
        <h2> Messages</h2> 
        <ul> 
          <?php
           if(!empty($messages)){
           foreach($messages as $message):
           $delete = $message['message_id']; 
           //var_dump($message); ?>
          <li><?=$message['from']?> says...: "<?=$message['message']?>"(<?=anchor("home/deleteMsg/$delete", 'delete')?>)</li>      
         <?php endforeach?> 
          <?php }else{ ?>

         <?php 
           echo '<p>';
           echo 'Inbox is empty'; 
           echo '</p>';
           }?>   
        </ul>      
      </div>
    </div>