<div class="content-wrapper">
   
<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">RAGAA MAGAALOOTA OROMIYAA</i></h3>
     


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">MAGAALAA DABALI</i>
      </button>
  

--
      <button type="button" class="btn btn-warning" onclick="window.location.href='<?php echo base_url('Structure/Subcity'); ?>'">
    <i class="fa fa-plus-square"></i> KUTAA MAGAALAA
</button>
--
      <button type="button" class="btn btn-success" onclick="window.location.href='<?php echo base_url('Structure/AKmagala'); ?>'">
    <i class="fa fa-plus-square"></i> AANAA K/MAGAALAA
</button>
          </div> 

           

     

      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">MAGAALAA HAARAA DABALI GALMEESSI</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Structure/Add_city') ?>"method="post">
                                    <label>MAQAA MAGAALAA </label><br>
                                    <input class="form-control input-lg" type="text" name="city_name" placeholder="City" required>
                                    <br>
                                    <!-- <label>City Code</label><br>
                                    <input class="form-control input-lg" type="text" name="city_code" placeholder="Zone Code"> -->

                                    <br>
                                    <label>IBSA MAGAALAA</label><br>
                                    <input class="form-control input-lg" type="text" name="city_description" placeholder="Description">
                                    <!--<br>-->


                                    </div>
                                    <div class="modal-footer">
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">HAQI</button>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-save">   GALMEESSI</i></button>
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
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 25.733px;" aria-label="Browser: activate to sort column ascending">LAKK</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 150.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">MAQAA MAGAALAA</th>

                                    <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">City Code</th> -->

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170px;" aria-label="Platform(s): activate to sort column ascending">IBSA MAGAALAA</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 60.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->str->getcity() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td> <?php echo $no; ?></td>
                                          <td><?php echo $row->cname; ?></td>
                                          <!-- <td><?php echo $row->city_code; ?></td> -->
                                          <td><?php echo $row->citydescription; ?></td>
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/Delete_city/' . $row->cid) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">BALLEESSI</i></a>

                                                <!-- <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->cid; ?>" onclick="return confirm('Are you sure To Edit ?')"><i class="fa fa-edit">Edit</i></a> -->
                                          </td>
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->cid; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Zone</h4>
                                                </div>
                                                <div class="modal-body">
                                                      <!-- <form action="<?php echo base_url('Structure/Edit_city/' . $row->zid) ?>"method="post">
                                                            <label>Zone Name</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->zname; ?>" name="zone_name" placeholder="Zone" required>
                                                            <br>
                                                            <label>Zone Code</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->zone_code; ?>" name="zone_code" placeholder="Zone Code">

                                                            <br>
                                                            <label>Description</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->citydescription; ?>" name="zone_description" placeholder="Description">
                                                            <!--<br>-->


                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary"><i class="fa fa-edit">   Edit</i></button>
                                                            </div>
                                                      </form> -->
                                                </div>
                                                <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->



                              <?php }
                              ?>
                               </div>
                      </tbody>
                </table>
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
