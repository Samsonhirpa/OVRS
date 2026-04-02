<div class="content-wrapper">
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
      <div class="box-header">
      </div>
      <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">Add</i>
      </button>
      <h3 class="box-title">List Of Roles</h3>

      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Add Role</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Structure/Add_Role') ?>"method="post">
                                    <label>Role Name</label><br>
                                    <input class="form-control input-lg" type="text" name="role_name" placeholder="Role" required>
                                    <br>

                                    <label>Description</label><br>
                                    <input class="form-control input-lg" type="text" name="description" placeholder="Description">
                                    <!--<br>-->


                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-save">   Add</i></button>
                                    </div>
                              </form>
                        </div>
                        <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <div class="box-body">
                  <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead style="background-color: #666666; color: white">
                              <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">#</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Role Name</th>

                                    <!--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">Zone Code</th>-->

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->str->getRole() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                          <td><?php echo $row->role_name; ?></td>
                                          <td><?php echo $row->description; ?></td>
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/Delete_Role/' . $row->role_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">Delete</i></a>

                                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->role_id; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit">Edit</i></a>
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->role_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Role</h4>
                                                </div>
                                                <div class="modal-body">
                                                      <form action="<?php echo base_url('Structure/Edit_Role/' . $row->role_id) ?>"method="post">
                                                            <label>Role Name</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->role_name; ?>" name="role_name" placeholder="Role" required>
                                                            <br>

                                                            <label>Description</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->description; ?>" name="description" placeholder="Description">
                                                            <!--<br>-->


                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary"><i class="fa fa-edit">   Update</i></button>
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
