<div class="content-wrapper">



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">LIST OF NEW TRAVEL AGENCY COMPANY</i></h3>
     


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">ADD COMPANY</i>
      </button>
          </div>
          <div class="box-body">
           

      <div class="box">
            <div class="row">
                  <div class="col col-md-12">
                        <?php
                        if ($this->session->flashdata('success_msg')) {
                              ?>
                              <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success_msg'); ?>
                              </div>
                              <?php
                        }
                        if ($this->session->flashdata('error_msg')) {
                              ?>
                              <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                              </div>
                              <?php
                        }
                        ?>
                  </div>
            </div>
      </div>
      
      



      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">NEW COMPANY REGISTRATION FORM</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Structure/Add_Project') ?>"method="post">
                                    <label>COMPANY NAME</label><br>
                                    <input class="form-control input-lg" type="text" name="p_name" placeholder="COMPANY NAME" required>
                                    <br>
                                    <label>COMPANY ADDRESS</label><br>
                                  
                                     <select class="form-control input-lg" name="caddress">
                                          <option>-- Select Country --</option>
                                          <?php foreach ($this->str->getZone() as $row) { ?>
                                                <option value="<?php echo $row->zname; ?>"><?php echo $row->zname; ?></option>
                                          <?php } ?>
                                    </select>
                                    <br>
                                    <label>COMPANY EMAIL</label><br>
                                    <input class="form-control input-lg" type="text" name="cemail" placeholder="Email(eg: john2024@gmail.com) " required>
                                    <br>
                                     <label>COMPANY DESCRIPTION</label><br>
                                    <input class="form-control input-lg" type="text" name="p_desc" placeholder="Description" required>

                                    <br>
                                  
                                   

                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">CLEAR</button>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-save">   SAVE</i></button>
                                    </div>
                              </form>
                        </div>
                        <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


      <div class="row">
          <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">


 
<div class="box-body">

                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 30.733px;" aria-label="Browser: activate to sort column ascending">NO</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">COMPANY NAME</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ADDRESS</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">COMPANY EMAIL</th>

                                 

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">COMPANY DESCRIPTION</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.417px;" aria-label="CSS grade: activate to sort column ascending">ACTION</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->str->getproject() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td ><?php echo $no; ?></td>
                                          <td><?php echo $row->p_name; ?></td>
                                          <td><?php echo $row->caddress; ?></td>
                                          <td><?php echo $row->cemail; ?></td>
                                          
                                          <td><?php echo $row->p_desc; ?></td>
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/Delete_Project/' . $row->p_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">Delete</i></a>

                                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->p_id; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit">Edit</i></a>
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->p_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Company Information</h4>
                                                </div>
                                                <div class="modal-body">
                                                      <form action="<?php echo base_url('Structure/Edit_Project/' . $row->p_id) ?>"method="post">
                                                            <label>COMPANY NAME</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->p_name; ?>" name="p_name" required>
                                                           <br>
                                                           <label>ADDRESS</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->caddress; ?>" name="p_name" required>
                                                           <br>
                                                           <label>EMAIL</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->cemail; ?>" name="p_name" required>
                                                           <br>
                                                            <label>Project Description</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->p_desc; ?>" name="p_desc" >
                                                            <!--<br>-->


                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">CLEAR</button>
                                                                  <button type="submit" class="btn btn-primary"><i class="fa fa-edit">   UPDATE</i></button>
                                                            </div>
                                                      </form>
                                                </div>
                                                <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->



                              <?php }
                              ?>
                              </tbody>


                  </table>
            </div>
      </div>
      </div>
      </div>
      </div>
</div>
      </div>
      </div>

      <script>
            $(document).ready(function () {
                  $('#example').DataTable({
                        dom: 'lBfrtip',
                        buttons: [
                              'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                  });
            });
      </script>
