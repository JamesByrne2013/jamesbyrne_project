<?php  session_start();
if ($this->session->userdata('status')!='OK') 
{
redirect('start');
}

?>
<body id="members">
    <div id="header">
      <h1> 
        SpaceBook's Members
      </h1>
    </div>