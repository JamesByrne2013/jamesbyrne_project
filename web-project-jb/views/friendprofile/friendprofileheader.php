<?php  session_start();
if ($this->session->userdata('status')!='OK') 
{
redirect('start');
}


?>
<body id="friendprofile">
<div id="header">
<h1>
SpaceBook: <?=$membername?>'s Public Profile
      </h1>
    </div>