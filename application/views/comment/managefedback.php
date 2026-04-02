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
      <a href="<?php echo base_url('Structure/fedback') ?>" class="btn btn-primary"><i class="fa fa-plus-square">Add new Comment</i></a>
      <h3 class="box-title">Users Comment</h3>


      <div class="box-body">
            <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead style="background-color: #666666; color: white">
                        <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">#</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.733px;" aria-label="Browser: activate to sort column ascending">Date</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">Full Name</th>
                              <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Subject</th>
                              <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 200.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Comment</th>
                              
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Phone</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Email</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Zone</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Woreda</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php
                        $no = 0;
                        foreach ($this->str->getfedback() as $row) {
                              $no++;
                              ?>
                              <tr role="row" class="odd">
                                    <td> <?php echo $no; ?></td>
                                    <td><?php echo $row->date ; ?></td>
                                    <td><?php echo $row->operator ; ?></td>
                                    <td><?php echo $row->subject; ?></td>
                                    <td><?php echo $row->text; ?></td>    
                                    <td><?php echo $row->phoneno; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->zname; ?></td>
                                    <td><?php echo $row->woreda_name; ?></td>                                  
                                    <td>
                                          <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/Delete_fedback/' . $row->id) ?>"onclick="return confirm('Are you sure To Delete ?')">Delete</a>

                                          <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->id; ?>"onclick="return confirm('Are you sure To Edit ?')">Edit</a>
                                    </td>

                              </tr>

                        <div class="modal fade" id="modal-default<?php echo $row->id; ?>">
                              <form role="form" action="<?php echo base_url('Structure/Edit_fedback/'.$row->id); ?>" method="post">

                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit User Comment</h4>
                                                </div>

                                                <div class="box-body">

                                                      <div class="row">
                                                            <div class="col col-md-12">

                                                                  
                                                                  <div class="form-group">
                  <label>Date</label>
                  <input type="date" name="date" class="form-control" value="<?php echo $row->date ?>" required="">
                </div>
                <div class="form-group">
                  <label>Subject</label>
                  <input type="text" name="subject" class="form-control" value="<?php echo $row->subject ?>" required="">
                </div>

                <!-- textarea -->
                <div class="form-group">
                  <label>Comment</label>
                  <textarea class="form-control" name="text" rows="3" value="<?php echo $row->text ?>" required=""></textarea>
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" name="phoneno" class="form-control" value="<?php echo $row->phoneno ?>" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $row->email ?>" required="">
                </div>
                                                            </div>
                                                            
                                                      </div>
                                                </div>
                                                <div class="modal-footer" style="background-color:#d2d6de;">
                                                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                      <button type="submit" class="btn btn-secondary"><i class="fa fa-save">   Update</i></button>
                                                </div>
                                                <input type="hidden" name="datecreated"  class="form-control  style="width: 70px"  value="<?php echo $row->datecreated;?>">
                                          </div>
                                          <!-- /.modal-content -->
                                    </div>
                              </form>
                               <p> 
                            <?php echo $this->session->flashdata('error_msg');?>
                          
                        </p>

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
