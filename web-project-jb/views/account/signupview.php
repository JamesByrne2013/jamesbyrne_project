<div id="signupform">  
  
    <?php echo validation_errors(); ?>
  
    <?=form_open('signup/register');?>
      <p>
        username <?=form_input('username');?>
      </p>
      <p>
        password <?=form_password('password');?>
      </p>
     <p>
      <?=form_submit('submit', 'Register'); ?>
      <?=form_close(); ?>
    </p>
  </div>