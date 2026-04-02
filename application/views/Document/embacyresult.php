<div class="content-wrapper">


<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">EMBACY SCHEDULE OF NEW TRAVEL AGENCY CUSTOMERS</i></h3>
     


<div class="box box-default">
          
          <div class="box-body">
           



     

      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">ADD CUSTOMER EMBACY SCHEDULE </h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Structure/Add_Schedule') ?>" method="Post" enctype="multipart/form-data">
                                    <div class="row">
                                           <div class="col col-md-6">
  <div class="form-group">
                                    <label>CUSTOMER NAME</label><br>
                                  <select  id="multipleSelect"  name="customer_id" data-search="true" data-silent-initial-value-set="true" >
                                    
                                          
                                          <?php foreach ($this->str->getcustorschedule() as $row) { ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->fullname; ?></option>
                                          <?php } ?>
                                    </select>
                                  </div>
                            </div>
                             <div class="col col-md-6">
  <div class="form-group">
                                    <label>SCHEDULE DATE</label><br>
                                    <input class="form-control" type="date" name="embacydate"  required>
                                    </div>
                              </div>
                        </div>
                      
                                  
                                    <div class="form-group">
      <label class=" form-control-label">UPLOAD PERMIT  </label>
      <input type="file"  name="attachment" id="attachment" class="form-control-file" required>
</div>
                               


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
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">DATE</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">REF-NO</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">CUSTOMER NAME</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">SEX</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">PHONE</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">PERMIT FILE</th>

                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">SCHEDULE DATE</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.683px;" aria-label="Platform(s): activate to sort column ascending">SCHEDULE STATUS</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.683px;" aria-label="Platform(s): activate to sort column ascending">SCHEDULED BY</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 140.417px;" aria-label="CSS grade: activate to sort column ascending">ACTION</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->str->getembasyresult() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td ><?php echo $no; ?></td>
                                          <td><?php echo $row->created_date; ?></td>
                                          <td><?php echo $row->nt_id; ?></td>
                                          <td><?php echo $row->fullname; ?></td>
                                          <td><?php echo $row->sex; ?></td>
                                          <td><?php echo $row->phone; ?></td>
                                          <td> <img src="<?= base_url('upload/'.$row->permitfile) ?>" height="30px" width="60px">
                               </td> 
                            
                                          <td><?php echo $row->embacydate; ?></td>
                                          <td><?php echo $row->embstatus; ?></td>
                                       
                                          <td><?php echo $row->operator; ?></td>
<td>
 <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->em_id; ?>">Status</a>

      <!-- <a href="<?php echo base_url().'Structure/downloadschedule/'.$row->em_id; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download-alt"></a> -->
</td>
                                      
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->em_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">Embacy Schedule Status</h4>
                                                </div>
                                                <div class="modal-body">
                                                      <form action="<?php echo base_url('Structure/Updateembacystatus/' . $row->em_id) ?>"method="post">
                                                           <div class="row">
                                           <div class="col col-md-12">
  <div class="form-group">
                                    <label>CUSTOMER NAME</label><br>
                                   <input class="form-control input-lg" value="<?php echo $row->fullname; ?>" type="text" name="customer_id" readonly>
                                  </div>
                            </div>
                             <div class="col col-md-12">
  <div class="form-group">
                                    <label>Status</label><br>
                                   <input class="form-control input-lg" value="<?php echo $row->embstatus; ?>" type="text" name="embstatus" placeholder="Description">

                                    </div>
                              </div>
                        </div>
                                   
                                   


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
<script type="text/javascript" src="<?php echo base_url();?>dist3/js/virtual-select.min.js"></script>

<script type="text/javascript">
    VirtualSelect.init({ 
  ele: '#multipleSelect' 
});
</script>