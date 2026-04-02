<div class="content-wrapper">


<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">LIST OF NEW TRAVEL AGENCY AGENTS</i></h3>
     


<div class="box box-default">
          <div class="box-header with-border">
             <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">ADD NEW AGENT</i>
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
                              <h4 class="modal-title">NEW AGENT REGISTRATION FORM</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Structure/Add_Vendor') ?>"method="post">
                                    <label>AGENT Name</label><br>
                                    <input class="form-control input-lg" type="text" name="c_name" placeholder="--Agent Name--" required>
                                    <br>
                                    <label>PHONE NUMBER</label><br>
                                    <input class="form-control input-lg" type="number" name="pphone" placeholder="--Phone Number--" required>
                                    <br>
                                    <label>Email</label><br>
                                    <input class="form-control input-lg" type="email" name="pemail" placeholder="Email(eg: john2024@gmail.com)" required>
                                    <br>
                                    <label>AGENT ADDRESS</label><br>
                                    <input class="form-control input-lg" type="text" name="c_desc" placeholder="Agent Address">
                                    <!--<br>-->


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
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">NO</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">AGENT NAME</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">PHONE NUMBER</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">EMAIL</th>

                                 

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.683px;" aria-label="Platform(s): activate to sort column ascending">ADDRESS</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.417px;" aria-label="CSS grade: activate to sort column ascending">ACTION</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->str->getcustomer() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td ><?php echo $no; ?></td>
                                          <td><?php echo $row->c_name; ?></td>
                                          <td><?php echo $row->pphone; ?></td>
                                          <td><?php echo $row->pemail; ?></td>
                                          
                                          <td><?php echo $row->c_desc; ?></td>
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/Delete_Vendor/' . $row->c_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">Delete</i></a>

                                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->c_id; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit">Edit</i></a>
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->c_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">EDIT AGENT INFORMATION</h4>
                                                </div>
                                                <div class="modal-body">
                                                      <form action="<?php echo base_url('Structure/Edit_Vendor/' . $row->c_id) ?>"method="post">
                                                            <label>AGENT Name</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->c_name; ?>" name="c_name" required>
                                                           <br>
                                                            <label>PHONE NUMBERr</label><br>
                                                            <input class="form-control input-lg" type="number" name="pphone" value="<?php echo $row->pphone; ?>" required>
                                                              <br>
                                                            <label>Email</label><br>
                                                            <input class="form-control input-lg" type="email" name="pemail" value="<?php echo $row->pemail; ?>" required>
                                                             <br>
                                                            <label>AGENT </label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->c_desc; ?>" name="c_desc" >
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
