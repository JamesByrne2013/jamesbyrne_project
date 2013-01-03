<div id="loginform">  
    <?php echo validation_errors(); ?>
    
    <?=form_open('login/loguserin');?>
      <p>
        username <?=form_input('username');?>
      </p>
      <p>
        password <?=form_password('password');?>
      </p>
      <p>
      <?=form_submit('submit', 'Login'); ?>
      <?=form_close(); ?>
    </p>
  </div>