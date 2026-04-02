 <div class="content-wrapper">
<section class="content" style="min-height: 526px;">
        <div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding">
    <h1 class="box-title" style="font-family: Times New Roman, Times, serif; font-size: 30px;">
      <i class="fa fa-plus"></i> <?php echo lang('index_heading');?> Registration</h1></div>


<div class="stu-master-create">
    <style>
.box .box-solid {
     background-color: #F8F8F8;
}
</style>

<script>
$(function () {
  $('[data-toggle="popover"]').popover({placement: function() { return $(window).width() < 768 ? 'bottom' : 'right'; }})
})
</script>

<div class="col-xs-12 col-lg-12">
  <div class="box-success box view-item col-xs-12 col-lg-12">
    
      <div class="box-header with-border">
         <!-- <h4 class="box-title"><i class="fa fa-info-circle"></i> <h1><?php echo lang('index_heading');?></h1></h4> -->
      </div>

<!-- <h1><?php echo lang('create_user_heading');?></h1> -->
<!-- <p><?php echo lang('create_user_subheading');?></p> -->

<div id="infoMessage" class="form-horizontal"><?php echo $message;?></div>
<!-- <div class="col-lg-12"> -->
<?php echo form_open("auth/create_user");?>
<!-- <div class="row"> -->

<p>
      <!-- <div class="form-group">
            <div class="col-sm-2"> -->
            <?php echo lang('create_user_fname_label', 'first_name');?><br />
          <!-- </div>
            <div class="col-sm-10"> -->
            <?php echo form_input($first_name);?>
        <!--   </div>
      </div> --></p>
<p>
      <!-- div class="form-group">
            <div class="col-sm-2"> -->
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <!-- </div>
            <div class="col-sm-10"> -->
            <?php echo form_input($last_name);?>
     <!-- </div>
      </div> --></p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>
<!-- </div> -->
      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>
</div>
</div>
</div>
</div>
</section>
</div>
