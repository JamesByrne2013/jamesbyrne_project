<?php  session_start();
if ($this->session->userdata('status')!='OK') 
{
redirect('start');
}

?>
<body id="gallery">
    <div id="header">
      <h1> 
        SpaceBook: <?=$username?>'s Gallery
      </h1>
    </div>