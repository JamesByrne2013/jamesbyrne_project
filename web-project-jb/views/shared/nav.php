
<div id="navigation">
      <ul id="tabs"> 
        <li id="home"> <?=anchor('home',         'Home');   ?> </li> 
        <li id="members"> <?=anchor('members',      'Members');?> </li> 
        <li id="homeprofile"> <?=anchor('homeprofile',     'Profile');?> </li>
        <li id="blog"> <?=anchor('blog',     'Blog');?> </li>
        <li id="gallery"> <?=anchor('gallery', 'Gallery');?> </li>
        <li id="delete"><a href="deleteuseraccount" onclick ="return confirm('Are you sure you want to delete?');">DeleteAccount</a> </li>
        <li id="logout"> <a href="login/logout" onclick ="return confirm('Are you sure you want to log out?');">Logout</a> </li> 
      </ul> 
    </div>