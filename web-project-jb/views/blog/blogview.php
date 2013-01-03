<div id = primary>
<?foreach($blogs AS $blog)
{
	$id = $blog->id;
	$title = $blog->title;
	$body = $blog->body;
	$username = $blog->username;
	$date = $blog->date;

	?>
    
       <b> <?=$title?></b>
        <p><?=$body?></p>
        
          <p>posted by:<?=$username?></p>
          <p>date: <?=$date?></p>
       
    <hr>

<?
}
?> 

</div>


