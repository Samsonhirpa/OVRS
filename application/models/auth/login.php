 <!-- <h1><?php echo lang('login_heading');?></h1> 
<p><?php echo lang('login_subheading');?></p> -->

<!-- <div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p> -->
<div class="content-wrapper">
  <style type="text/css">

    body {

    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    background-image: url('<?php echo base_url('img/ee.jpg')?>');
     width: 1500px;
      height: 750px;
      background-repeat: no-repeat;
}
  </style>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/js/g.css');?>">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>distt/images/icons/favicon.ico"/>
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>distt/vendor/animate/animate.css"> -->
  <link rel="shortcut icon" href="/dist1/images/logo.png" type="image/x-icon" />
  <!-- <link rel="background-image" href="/blto/img/logo.png" type="image/x-icon" /> -->
  <title>Wel Come To OROMIA</title>
  
</head>
<body class="login-page img">
<div class="container img">
    <div class="login-box">
      <div class="login-logo">
    &nbsp;
      </div><br><br><br><br><br>
      <!-- <div class="col-sm-6 col-sm-6"> -->
  <div class="col-sm-offset-4 col-sm-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
           <h2><p class="login-box-msg"><b>Welcome</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="<?php echo base_url();?>dist/images/logo.png" alt="IMG"> </p></h2>
    
      </div>
      <div class="panel-body">
        <p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>
 <div class="form-group field-loginform-username required">

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p></div>

      </div>
      <div class="panel-footer"><strong>Copyright &copy; 2019 <a href="http://www.ost.gov.et">Oromia Science and Technology</a>.</strong> All rights reserved
      </div>
    </div>
  </div>
</div>
</div>
<!--===============================================================================================-->  
  <script src="<?php echo base_url();?>distt/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>distt/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url();?>distt/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>distt/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>distt/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>distt/js/main.js"></script>
</body>
</html>
</div>

