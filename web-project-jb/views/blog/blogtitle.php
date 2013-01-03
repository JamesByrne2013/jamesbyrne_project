<?php  session_start();
if ($this->session->userdata('status')!='OK')
{
	redirect('start');
}


?>
<body id="blog">
    <div id="header">
      <h1> 
        SpaceBook: <?=$username?>'s Blog
      </h1>
    </div>