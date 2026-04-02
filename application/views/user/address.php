<div class="content-wrapper">
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">detail Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('stock_controller/saveUser');?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input name="firstname" class="form-control" id="exampleInputEmail1" placeholder="First Name" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input name="lastname" class="form-control" id="exampleInputEmail1" placeholder="User Name" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">mobile</label>
                  <input name="mobile" class="form-control" id="exampleInputEmail1" placeholder="mobile" type="text">
                </div>
               

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input name="email" class="form-control" id="exampleInputEmail1" placeholder="email" type="email">
                </div>
               
                
              <div class="row">
                <div class="col col-md-12">
                  <input type="submit" class="btn btn-primary" value="Save"name="save">
                </div>
               </div>                </div>
               
            </form>
          </div>
        </div>
      </div>