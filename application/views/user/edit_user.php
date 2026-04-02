<div class="content-wrapper">
  <div class="col-sm-12">  
        <div class="wrap-fpanel">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h3 class="box-title"><?php echo $this->lang->line('updateinfn_menu');?>: <u><?php echo $useraccount->username?></u></h3>
                    </div>
                </div>
              
     <div class="panel-body">
    <div class="row">
    <div class="col col-md-12">
           <form role="form" action="<?php echo base_url('marketcontroller/updateuser/'.$useraccount->id);?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo $this->lang->line('username_menu');?></label>
                  <input name="username" class="form-control" id="exampleInputEmail1" value="<?php echo $useraccount->username;?>" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"><?php echo $this->lang->line('password_menu');?></label>
                  <input name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $useraccount->password;?>" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"><?php echo $this->lang->line('ulevel_menu');?></label>
                  <input name="level"class="form-control" id="exampleInputPassword1"value="<?php echo $useraccount->level;?>" type="text">
                </div>
                 <label for="exampleInputPassword1"><?php echo $this->lang->line('employee_menu');?></label>
               <select class="form-control"name="employee">
                  <?php 
                  foreach ($this->m->getemployee() as $row) {
                  
                 
                  ?>

                  <option value="<?php echo $row->id?>"><?php echo $row->firstname;?></option>
<?php  } ?>
                </select>
               <div class="row">
                <div class="col col-md-12">
                  <input type="submit" class="btn btn-primary" value="Update"name="save">
                </div>
               </div>
              </div>
            </form>
          </div>
        </div>
      </div>