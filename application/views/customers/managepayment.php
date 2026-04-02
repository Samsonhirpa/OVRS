 <div class="content-wrapper">
<div class="page-content">
  



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">MANAGE CUSTOMERS REMAINING PAYMENT LIST</i></h3>


<div class="box box-default">
      
          <div class="box-body">
           


   
  </div>
      <div class="row">
        <div class="col-md-12">
          <div class="overview-wrap">
            
          
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">


 
<div class="box-body">


      <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead  class="thead-success">
                  <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 30.733px;" aria-label="Browser: activate to sort column ascending">NO</th>
                          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 70.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ref. No</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Reg. Date</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Customer Name</th>
                      
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 80.733px;" aria-label="Browser: activate to sort column ascending">Sex</th>
                    
                       <!-- <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mother Name</th> -->
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.217px;" aria-label="Engine version: activate to sort column ascending">Main Phone</th>
                          <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.217px;" aria-label="Engine version: activate to sort column ascending">Profession</th> -->

<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Agent</th>

<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Company</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Expire Date [CrimeFree]</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.733px;" aria-label="Browser: activate to sort column ascending">Remaining</th>

<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Bank Name</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">File</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Show</th>
 <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120.733px;" aria-label="Browser: activate to sort column ascending">PAYMENT</th>

                           </tr>
            </thead>

                 <tbody>
                  <?php
                  $no = 0;
             
                        foreach ($this->str->getcustomerpeyment() as $row ) {
                        $no++;
                        ?>
                        <tr role="row" class="odd">
                              <td ><?php echo $no; ?></td>
                               <td><?php echo $row->nt_id ; ?></td> 
                               <td><?php echo $row->created_date ; ?></td> 
                               <td><?php echo $row->fullname ; ?></td> 
                               <td><?php echo $row->sex ; ?></td> 
                               <!-- <td><?php echo $row->mothername ;?></td>  -->
                               <td><?php echo $row->phone ; ?></td> 
                               <!-- <td><?php echo $row->profession ; ?></td>  -->
                              
                               <td><?php echo $row->c_name ;?></td> 
                              
                               <td><?php echo $row->p_name ; ?></td> 
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
                               <td><?php echo $row->remaining ; ?></td> 
                               <td><?php echo $row->bankname ; ?></td> 
                                <td> <img src="<?= base_url('upload/'.$row->file_name) ?>" height="40px" width="40px">
                               </td> 
                                                              
                                                         
                             
                    <td>

                       <a class="btn btn-xs btn-success" href="<?php echo base_url('Structure/show_customer/'.$row->id)?>"><i class="fa fa-windows"></i></a>
                        <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->id; ?>" ><i class="fa fa-diamond"></i></a>
                    </td>
                    <td>
                                     <a class="btn btn-xs alert-success" href="<?php echo base_url('Structure/peyment_status/'.$row->id)?>"onclick="return confirm('Are you sure does payment completed ??')"><i <?php if($row->process_status == 0 ) { ?> class="fa fa-cloud-upload ">Not Completed </i> <i <?php } if($row->process_status == 1 ) { ?> class="fa fa-cloud-upload"> Reject </i> <i <?php } if($row->process_status == 2 ) { ?> class="fa fa-thumbs-o-up"><?php } ?>Completed</i> </a>

                      </td>  
                     
                      <div class="modal fade" id="modal-default<?php echo $row->id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">REGISTER BANK TRANSFER INFORMATION</h4>
                                                </div>
                                                <div class="modal-body">
                                           
<form role="form" action="<?php echo base_url('Structure/updatepayment/' . $row->id); ?>" method="Post" enctype="multipart/form-data">

<!-- 	 <div class="form-group">
                                <label>Remaining Ammount</label><br>
                               <input type="text" name="remaining" id="remaining" value="<?php echo $ntacustomers->remaining;?>" class="form-control"  onchange="paymentstatus() " readonly>
</div> -->
                                    <div class="form-group">
                                <label>Remaining</label><br>
                                <input class="form-control" id="remaining" type="text" name="remaining"  value="<?php echo $row->remaining; ?>" readonly>
                                       </div>

                                <div class="form-group">
                                <label>Final Payment Ammount</label><br>
                                <input class="form-control" type="text" name="finalpay" id="finalpay" onchange="calcremaining()" value="<?php echo $row->finalpay; ?>" required>
                                       </div>
                                        <span id="email_result"></span>
                                 <div class="form-group">
                                <label>Bank Name</label><br>
                                <input class="form-control" type="text" name="bankname" value="<?php echo $row->bankname; ?>" required>
                                       </div>
                                 <div class="form-group">
      <label class=" form-control-label">Suura Taphataa</label>
      <input type="file"  name="attachment" id="attachment" class="form-control-file" required>
</div>
<div class="form-group">
     <img src="<?= base_url('upload/'.$row->file_name) ?>" height="400px" width="570px">
</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">CLEAR</button>
                                                                  <button type="submit" class="btn btn-primary"><i class="fa fa-edit">   REGISTER</i></button>
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
                              
                   </tr>
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
 
<script type="text/javascript">
         $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

 <script>  
 $(document).ready(function(){  
      $('#remaining').change(function(){  
           var remaining = $('#remaining').val();  
           var finalpay = $('#finalpay').val();  
         
           if(remaining != finalpay)  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Structure/checkpayment",  
                     method:"POST",  
                     data:{remaining:remaining},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  