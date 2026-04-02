
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 <section class="content">

 <section class="content">
      <div class="row">
        <div class="col-md-10">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"style ="font-size:40px; "></style><?php echo $this->lang->line('information_menu');?> :<?php echo $employee->firstname;?></h3>
              
                <a class="btn btn-primary pull-right" href="<?php echo base_url('index.php/marketcontroller/manage_employee');?>">Back List</a>
                <a class="btn btn-primary pull-right" href="<?php echo base_url('marketcontroller/dashboard')?>"><i class="fa fa-home"></i></a>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody style="font-family: serif;">
                <tr>
                  <th style="width: 200px"><?php echo $this->lang->line('id_menu');?></th>
                  <td><?php echo $employee->id;?></td>
                  </tr>
                <tr>
                     
                </tr>
                  <th style="width: 100px"><?php echo $this->lang->line('fname_menu');?></th>
                  <td><?php echo $employee->firstname;?></td>
                  

                </tr>
                <tr>
                  <th style="width: 100px"><?php echo $this->lang->line('lname_menu');?></th>
                  <td><?php echo $employee->lastname;?></td>
                </tr>        
                <tr>
                  <th style="width: 100px"><?php echo $this->lang->line('gender_menu');?></th>
                  <td><?php echo $employee->g_name;?></td>
                </tr>
                 <tr>
                  <th style="width: 100px"><?php echo $this->lang->line('position_menu');?></th>
                  <td><?php echo $employee->position;?></td>
                </tr>
                 <tr>
                  <th style="width: 100px"><?php echo $this->lang->line('date_menu');?></th>
                  <td><?php echo $employee->date;?></td>
                </tr>
                 <tr>
                  <th style="width: 100px"><?php echo $this->lang->line('phone_menu');?></th>
                  <td><?php echo $employee->phone;?></td>
                </tr>
                 <tr>
                  <th style="width: 100px"><?php echo $this->lang->line('email_menu');?></th>
                  <td><?php echo $employee->email;?></td>
                </tr>
                 <tr>
                  <th style="width: 100px"><?php echo $this->lang->line('region_menu');?></th>
                  <td><?php echo $employee->r_name;?></td>
                </tr>
                 <tr>
                  <th style="width: 100px"><?php echo $this->lang->line('zone_menu');?></th>
                  <td><?php echo $employee->name;?></td>
                </tr>
                 <tr>
                  <th style="width: 100px"><?php echo $this->lang->line('woreda_menu');?></th>
                  <td><?php echo $employee->w_name;?></td>
                </tr>
              </tbody></table>
            </div>

          </div>

        </div>
        
         

    </section>

 
  </div>
      <!-- /.row -->
</section> 