<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
  .field {clear:both; text-align:right; } label {float:left; } .main {float:left; margin: 1%}
</style>
<div class="col-md-12">
<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>



<div id="infoMessage"><?php echo $message;?></div>

<div class= "main">
  <div class="field">
<?php echo form_open("auth/login");?>



  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>


  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>


  </div>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>

    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


<!--  <p><a href="forgot_password">--><?php //echo lang('login_forgot_password');?><!--</a></p>-->

  <p><?php echo form_submit('submit', lang('login_submit_btn'), "class='btn btn-primary'");?></p>

<?php echo form_close();?>

</div>
</div>




