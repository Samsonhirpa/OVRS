<div class="content-wrapper">
          
<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">RAGAA AANAA KUTAA MAGAALOOTA OROMIYAA</i></h3>
     


<div class="box box-default">
          <div class="box-header with-border">
            <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">AANAA  K/MAGAALAA DABALI</i>
      </button>

      --
      <button type="button" class="btn btn-warning" onclick="window.location.href='<?php echo base_url('Structure/City'); ?>'">
    <i class="fa fa-plus-square"></i>MAGAALAA
</button>
--
      <button type="button" class="btn btn-success" onclick="window.location.href='<?php echo base_url('Structure/Subcity'); ?>'">
    <i class="fa fa-plus-square"></i> KUTAA MAGAALAA
</button>
          </div>     

     


      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Aanaa Kutaa Magaalaa Galmeessi</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Structure/Add_scWoreda') ?>"method="post">
                                    
                             
                                    <label>Maqaa Magaalaa</label><br>
                                    <select class="form-control" name="city_id" id="city">
                                          <?php foreach ($this->str->getnewcity() as $row) { ?>
                                                <option value="<?php echo $row->cid; ?>"><?php echo $row->cname; ?></option>
                                          <?php } ?>
                                    </select>
                                    <br>
                                    <label>Kutaa Magaalaa</label>
                          <select class="form-control" name="sbcity_id" id="subcity" >
                           <option value="">-- Select  --</option>
                        </select>

                                    <br>
                                    <label>Aanaa K/Magaalaa</label>
                                    <input class="form-control input-lg" type="text" name="sbw_name" placeholder="Subcity woreda Name">

                                    <!-- <br>
                                    <label>Kebele Code</label><br>
                                    <input class="form-control input-lg"  type="text" name="kebele_code" placeholder="Kebele Code">

                                    <br>
                                    
                                    <label>Description</label><br>
                                    <input class="form-control input-lg" type="text" name="Kebele_description" placeholder="Description"> -->
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
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 35.733px;" aria-label="Browser: activate to sort column ascending">LAKK</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">MAQAA MAGAALAA</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="Browser: activate to sort column ascending">KUTAA MAGAALAA</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">AANAA K/MAGAALAA</th>


                                    <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 101.683px;" aria-label="Platform(s): activate to sort column ascending">Kebele Code</th> -->
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70.417px;" aria-label="CSS grade: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->str->getSubcitywd() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td ><?php echo $no; ?></td>
                                          <td><?php echo $row->cname; ?></td>
                                          <td><?php echo $row->subcity_name; ?></td>
                                          <td><?php echo $row->sbw_name; ?></td>
                                          <!-- <td><?php echo $row->kebele_code; ?></td> -->
                                          <td>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/Delete_scWoreda/' . $row->sbw_id) ?>"onclick="return confirm('Are you sure To Delete ?')">BALLEESSI</a>

                                                <!-- <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->sbw_id; ?>"onclick="return confirm('Are you sure To Edit ?')">Edit</a> -->
                                          </td>
                                    </tr>
                              <div class="modal fade" id="modal-default<?php echo $row->sbw_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Edit Woreda</h4>
                                                </div>
                                                <div class="modal-body">
                                                      <!-- <form action="<?php echo base_url('Structure/Edit_scWoreda/' . $row->sbw_id) ?>"method="post">
                                                            <label>Zone Name</label><br>
                                                            <select class="form-control" name="zone_ids">
                                                                  <?php foreach ($this->str->getWoreda() as $rows) { ?>
                                                                        <option value="<?php echo $rows->woreda_id; ?>"<?php
                                                                        if ($rows->zid == $row->zone_id_woreda) {
                                                                              echo "Selected";
                                                                        }
                                                                        ?>><?php echo $rows->zname; ?></option>
                                                                          <?php } ?>
                                                            </select>
                                                            <br>
                                                            <label>Woreda Name</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->woreda_name; ?>" name="woreda_name" placeholder="Zone Code">

                                                            <br>
                                                            
                                                            <label>Woreda Code</label><br>
                                                            <input class="form-control input-lg" type="text" value="<?php echo $row->woreda_code; ?>" name="woreda_code" placeholder="Woreda Code">

                                                            <br>
                                                            <label>Description</label><br>
                                                            <input class="form-control input-lg" value="<?php echo $row->woreda_description; ?>" type="text" name="woreda_description" placeholder="Description">
                                                            


                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-secondary"><i class="fa fa-save">   Update</i></button>
                                                            </div>
                                                      </form> -->
                                                </div>
                                                <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->


                              </div>
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
$(document).ready(function(){
 $('#city').change(function(){
  var cid = $('#city').val();
  if(cid != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_subcity",
    method:"POST",
    data:{cid:cid},
    success:function(data)
    {
     $('#subcity').html(data);
     $('#subcity_woreda').html('<option value="">Aanaa K/M Fili</option>');
    }
   });
  }
  else
  {
   $('#subcity').html('<option value="">Kutaa Magaalaa Fili</option>');
   $('#subcity_woreda').html('<option value="">A/K/M Fili</option>');
  }
 });

 $('#subcity').change(function(){
  var subcity_id = $('#subcity').val();
  if(subcity_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Sport/fetch_subcitywd",
    method:"POST",
    data:{subcity_id:subcity_id},
    success:function(data)
    {
     $('#subcity_woreda').html(data);
    }
   });
  }
  else
  {
   $('#subcity_woreda').html('<option value="">Aanaa  Fili</option>');
  }
 });
 
});
</script>
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
