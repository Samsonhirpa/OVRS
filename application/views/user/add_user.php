<div class="content-wrapper">
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $this->lang->line('adduser_menu');?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('usercontroller/saveUser');?>" method="post">
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo $this->lang->line('username_menu');?></label>
                  <input name="username" class="form-control" id="exampleInputEmail1" placeholder="User Name" type="text" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"><?php echo $this->lang->line('password_menu');?></label>
                  <input name="password" class="form-control" id="exampleInputPassword1" placeholder="password" type="password" required>
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo $this->lang->line('confirmpassword_menu');?></label>
                  <input name="repassword" class="form-control" id="exampleInputEmail1" placeholder="repassword"  type="password" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"><?php echo $this->lang->line('ulevel_menu');?></label>
                   <select name="level"class="form-control" id="exampleInputPassword1" placeholder="level" type="text" required>
                    <?php foreach ($this->str->getRole() as $row){ ?>
                         <option value="<?php echo $row->role_id; ?>"><?php echo $row->role_name; ?></option>
                    <?php } ?>

                  </select>
                </div>
                 <!-- <label for="exampleInputPassword1"><?php echo $this->lang->line('employee_menu');?></label>
               <select class="form-control"name="employee" required>
                  <?php 
                  foreach ($this->usermodel->getemployee() as $row) {
                  
                 
                  ?>

                  <option value="<?php echo $row->id?>"><?php echo $row->fname;?></option>
<?php  } ?>
                </select>

              -->
                <div class="col col-md-12">
                  <input type="submit" class="btn btn-primary" value="Register">|<input type="reset" value="Clear" class="btn btn-danger">
       </div>
               </div>                </div>
               
            </form>
          </div>
        </div>
      </div>