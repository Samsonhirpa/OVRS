


 
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>/dist/img/oromia women.png" alt="User Image">
                        <span class="username">
                          <a href="#">Oromia Women, Children and Youth Affairs Bureau</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">OROMIA REGION CHILD DATA BASE MANAGEMENT  REPORTING SYSTEM:</span>
                  </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">OSTICA</a></li>
        <li class="active">WoredaNet</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Contact Us For More</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Organization</strong>

              <p class="text-muted">
                Oromia Women, Children and Youth Affairs Bureau 
                
         </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Addis Ababa Ethiopia</p>
              <p class="text-muted">Website: www.oromiyaa.gov.et</p>
              <p class="text-muted">Phone: office +251118222518,</p>
              <p class="text-muted">Fax: +251-11-371 73 22</p>
              <p class="text-muted">Oromia ,Ethiopia</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>OROMIA REGION CHILD DATA BASE MANAGEMENT  REPORTING SYSTEM</strong>

              

              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
           <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Users Comment Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?php echo base_url('Structure/save_fedback'); ?>" method="post">
                <!-- text input -->
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="date" class="form-control" placeholder="Enter Date" required="">
                </div>
                <div class="form-group">
                  <label>Subject</label>
                  <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required="">
                </div>

                <!-- textarea -->
                <div class="form-group">
                  <label>Comment</label>
                  <textarea class="form-control" name="text" rows="3" placeholder="Enter Your Comment" required=""></textarea>
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" name="phoneno" class="form-control" placeholder="Enter Your Full Name" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required="">
                </div>
                
                
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
             

              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


<!-- ./wrapper -->


