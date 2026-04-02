<div class="content-wrapper">


<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-flight">ACTIVE CUSTOMERS FLIGHT SCHEDULE</i></h3>
     


<div class="box box-default">
          <div class="box-header with-border">
             <button type="button"  data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square btn btn-primary">ADD FLIGHT SCHEDULE</i>
      </button>
          </div>
          <div class="box-body">
           



     

      <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">CUSTOMERS FLIGHT SCHEDULE REGISTRATION FORM</h4>
                        </div>
                        <div class="modal-body">
                              <form action="<?php echo base_url('Structure/Add_Flight') ?>" method="Post" enctype="multipart/form-data">
                                    <div class="row">
                                           <div class="col col-md-6">
  <div class="form-group">
                                    <label>CUSTOMER NAME</label><br>
                                  <select  id="multipleSelect"  name="customer_id" data-search="true" data-silent-initial-value-set="true" >
                                    
                                          
                                          <?php foreach ($this->str->getcusto() as $row) { ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->fullname; ?></option>
                                          <?php } ?>
                                    </select>
                                  </div>
                            </div>
                             <div class="col col-md-6">
  <div class="form-group">
                                    <label>FLIGHT DATE</label><br>
                                    <input class="form-control" type="date" name="flightdate"  required>
                                    </div>
                              </div>
                        </div>
                        <div class="row">
                                           
                               <div class="col col-md-6">
  <div class="form-group">
                                    <label>Country</label><br>
                                    <select class="form-control input-lg" name="country_id">
                                          <option>-- Select Country --</option>
                                          <?php foreach ($this->str->getZone() as $row) { ?>
                                                <option value="<?php echo $row->zname; ?>"><?php echo $row->zname; ?></option>
                                          <?php } ?>
                                    </select>
                                    </div>
                              </div>
                        <div class="col col-md-6">
                                    <div class="form-group">
      <label class=" form-control-label">Upload Ticket</label>
      <input type="file"  name="attachment" id="attachment" class="form-control-file" required>
</div>
          </div>  
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
                                   
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">REF-NO</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">CUSTOMER NAME</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">CRIMEFREE Xdate</th>
                                    
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">COUNTRY</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">PHONE</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">FLIGHT DATE</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.683px;" aria-label="Platform(s): activate to sort column ascending">TICKET</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.683px;" aria-label="Platform(s): activate to sort column ascending">OPERATOR</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.683px;" aria-label="Platform(s): activate to sort column ascending">STATUS</th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.417px;" aria-label="CSS grade: activate to sort column ascending">ACTION</th></tr>
                        </thead>
                        <tbody>
                              <?php
                              $no = 0;
                              foreach ($this->str->getcustomerticket() as $row) {
                                    $no++;
                                    ?>
                                    <tr role="row" class="odd">
                                          <td ><?php echo $no; ?></td>
                                          <td><?php echo $row->nt_id; ?></td>
                                          <td><?php echo $row->fullname; ?></td>
                                              <td class="text-center">
                               <?php if(isset($row->xdateofcrime) && strtotime($row->xdateofcrime) <= strtotime(date('Y-m-d'))): ?>
                                    <span style="background-color:red;" class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Expired</span>
                            <?php else: ?>
                                
                                   <?php if(isset($row->notify) && strtotime($row->notify) <= strtotime(date('Y-m-d'))): ?>
                                    <span style="background-color:orange;" class="badge badge-success bg-success px-3 rounded-pill">Warning</span>
                                <?php else: ?>
                                    <?php echo $row->xdateofcrime ; ?>
                                <?php endif; ?>
                                
                             <?php endif; ?>
                            </td>
                                          <td><?php echo $row->country_id; ?></td>
                                          <td><?php echo $row->phone; ?></td>
                                          <td><?php echo $row->flightdate; ?></td>
                                          <td> <img src="<?= base_url('upload/'.$row->ticket) ?>" height="30px" width="60px">
                               </td> 
                                          <td><?php echo $row->operator; ?></td>


   <td>
                                     <a class="btn btn-xs alert-warning" href="<?php echo base_url('structure/flight_status/'.$row->id)?>"onclick="return confirm('Are you sure does completed permit payment ??')"><i <?php if($row->flightstatus == 0 ) { ?> class="fa fa-check ">Waiting </i> <i <?php } if($row->flightstatus == 1 ) { ?> class="fa fa-cloud-upload"> Reject </i> <i <?php } if($row->flightstatus == 2 ) { ?> class="fa fa-thumbs-o-up"><?php } ?>Gone</i> </a>

                      </td> 
<td><a href="<?php echo base_url().'Structure/downloadticket/'.$row->flt_id; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-download-alt"></a>
 <a class="btn btn-xs btn-danger" href="<?php echo base_url('Structure/Delete_Flight/' . $row->flt_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">Delete</i></a>
</td>
                                         <!--  <td>
                                               <a href="<?php echo base_url('Structure/download/'.$row->cf_id)?>" class="btn btn-sm btn-primary">download_<i class="fa fa-download"></i></a>

                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('Structure/Delete_Doc/' . $row->cf_id) ?>"onclick="return confirm('Are you sure To Delete ?')"><i class="fa fa-trash">Delete</i></a>

                                              
                                          </td> -->
                                    </tr>


                              <div class="modal fade" id="modal-default<?php echo $row->flt_id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">EDIT AGENT INFORMATION</h4>
                                                </div>
                                                <div class="modal-body">
                                                      <form action="#"method="post">
                                                           <div class="row">
                                           <div class="col col-md-6">
  <div class="form-group">
                                    <label>CUSTOMER NAME</label><br>
                                  <select  id="multipleSelect"  name="customer_id" data-search="true" data-silent-initial-value-set="true" >
                                    
                                          
                                          <?php foreach ($this->str->getcusto() as $row) { ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->fullname; ?></option>
                                          <?php } ?>
                                    </select>
                                  </div>
                            </div>
                             <div class="col col-md-6">
  <div class="form-group">
                                    <label>Document Type</label><br>
                                    <input class="form-control" type="text" name="doctype" placeholder="-- Document type--" required>
                                    </div>
                              </div>
                        </div>
                                    <div class="form-group">
      <label class=" form-control-label">Upload Document</label>
      <input type="file"  name="attachment" id="attachment" class="form-control-file" required>
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