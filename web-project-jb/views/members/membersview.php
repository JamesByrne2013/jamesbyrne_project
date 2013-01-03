<div id="maincontent">
      <div id="primary">   
        <h2> Members </h2> 
        <ul> 
           <?php foreach($members as $membername):?>
             <li>
              <?=$membername?> [<?=anchor("members/addfriend/$membername", 'add')?>]
             </li>
           <?php endforeach?>  
        </ul>   
      </div>  
      <div id="secondary">
      </div>
    </div>
