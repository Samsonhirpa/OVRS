<div class="content-wrapper">
<div class="row">
  <div class="col-md-12">
     <div class="panel-heading">
<div class="panel-title">
   <a href="<?php echo base_url('marketcontroller/editprofile/'.$this->session->userdata('username'))?>" class="btn btn-sm btn-primary">Jecha Cee'umsaa Fooyyessii  <i class="fa fa-pencil"></i></a>
                <a href="<?php echo base_url('marketcontroller/admindashboard');?>" class="btn btn-sm btn-primary"><?php echo $this->lang->line('back_menu');?>: </a>
             <a href="<?php echo base_url('marketcontroller/logout');?>" class="btn btn-sm btn-danger"><?php echo $this->lang->line('logout_menu');?>: </a>
               </div></div></div>
   <!-- Profile Image --><div class="col-md-6">
    <div class="panel-heading">
<div class="panel-title">
                        <strong><?php echo $this->lang->line('useraccount_menu');?>: </strong>
                    </div>
          <div class="box box-primary">
<!--  <table class="table-hover">
                                        <tr>
                                            <td><strong>Employee ID</strong></td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo $useraccount->id;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Username</strong></td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo $useraccount->username;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Password</strong></td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo $useraccount->password;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Market Site</strong></td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo $useraccount->site_name;?></td>
                                        </tr>
                                      </table> -->
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b class="text-bold text-center"><?php echo $this->lang->line('id_menu');?>:</b><p class="text-bold text-center"><?php echo $useraccount->id;?></p>
                </li>
               
                <li class="list-group-item">
                  <b><?php echo $this->lang->line('username_menu');?>: </b> <p class="text-bold text-center"><?php echo $useraccount->username;?></p>
                </li>
            
                <li class="list-group-item">
                  <b><?php echo $this->lang->line('password_menu');?>: </b><p class="text-bold text-center"><?php echo $useraccount->password;?></p>
                </li>
              <li class="list-group-item">
                  <b><?php echo $this->lang->line('ulevel_menu');?>: </b><p class="text-bold text-center"><?php echo $useraccount->level;?></p>
                </li>
                   <li class="list-group-item">
                  <b><?php echo $this->lang->line('sites_menu');?>: </b><p class="text-bold text-center"><?php echo $useraccount->site_name;?></p>
                </li>
              </ul></div></div></div>
              <div class="col-md-6">
                <div class="panel-heading">
                <div class="panel-title">
                        <strong><?php echo $this->lang->line('personalinfo_menu');?>: </strong>
                    </div>
                <ul class="list-group list-group-unbordered">
                 <div class="box box-primary">
           
                 <li class="list-group-item">
                  <b><?php echo $this->lang->line('fname_menu');?>: </b><p class="text-bold text-center"><?php echo $useraccount->firstname;?></p>
                </li>
                <li class="list-group-item">
                  <b><?php echo $this->lang->line('lname_menu');?>: </b><p class="text-bold text-center"><?php echo $useraccount->lastname;?></p>
                </li>
                <li class="list-group-item">
                  <b><?php echo $this->lang->line('position_menu');?>: </b><p class="text-bold text-center"><?php echo $useraccount->position;?></p>
                </li>
                <li class="list-group-item">
                  <b><?php echo $this->lang->line('email_menu');?>: </b><p class="text-bold text-center"><?php echo $useraccount->email;?></p>
                </li>
                <li class="list-group-item">
                  <b><?php echo $this->lang->line('phone_menu');?>: </b><p class="text-bold text-center"><?php echo $useraccount->phone;?></p>
                </li>
              
              </ul>
              
            </div>
              
</div></div></div>
             </ul></div></div></div>
            <!-- /.box-body -->
          
          <!-- /.box -->

          <!-- About Me Box -->
       
          <!-- /.box -->
       