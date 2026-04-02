 <div class="content-wrapper">
<div class="page-content">
  



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">MANAGE CUSTOMERS PERMIT PAYMENT LIST</i></h3>


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
                      
                       
                       <!-- <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 100.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mother Name</th> -->
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.217px;" aria-label="Engine version: activate to sort column ascending">Main Phone</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Expire Date [CrimeFree]</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.733px;" aria-label="Browser: activate to sort column ascending">Remaining</th>

<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Bank Name</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">File</th>
 <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110.733px;" aria-label="Browser: activate to sort column ascending">PAYMENT</th>

                           </tr>
            </thead>

                 <tbody>
                  <?php
                  $no = 0;
             
                        foreach ($this->str->getpermitpeyment() as $row ) {
                        $no++;
                        ?>
                        <tr role="row" class="odd">
                              <td ><?php echo $no; ?></td>
                               <td><?php echo $row->nt_id ; ?></td> 
                               <td><?php echo $row->created_date ; ?></td> 
                               <td><?php echo $row->fullname ; ?></td> 
                               
                               <td><?php echo $row->phone ; ?></td> 
                               <!-- <td><?php echo $row->profession ; ?></td>  -->
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
                               <td><?php echo $row->bankname1 ; ?></td> 
                                <td> <img src="<?= base_url('uploadpp/'.$row->file_name1) ?>" height="40px" width="40px">
                               </td> 
                                                              
                                                         
                             
                    <td>

                         <a class="btn btn-xs btn-warning"href="<?php echo base_url('Structure/permitpayment/'.$row->id)?>"><i class="fa fa-diamond">ADD PAY'T</i></a>

                       <!-- <a class="btn btn-xs btn-success" href="<?php echo base_url('Structure/show_customer/'.$row->id)?>"><i class="fa fa-windows"></i></a> -->

                        <!-- <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-default<?php echo $row->id; ?>" ><i class="fa fa-diamond">VIEW</i></a> -->
                    </td>
                   

                     
                      <div class="modal fade" id="modal-default<?php echo $row->id; ?>">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                      <h4 class="modal-title">REGISTER PERMIT PAYMENT BANK TRANSFER INFORMATION</h4>
                                                </div>
                                                <div class="modal-body">
                                           



         <div class="form-group">
     <img src="<?= base_url('uploadpp/'.$row->file_name1) ?>" height="400px" width="570px">
</div>
<div class="row">
    <div class="col col-md-6">
   <label>Permit Payment Ammount</label><br>
   <input class="form-control" type="text" name="permitpay"   value="<?php echo $row->permitpay; ?>" required>
                                       </div>

  <div class="col col-md-6">
   <div class="form-group">
    <label> Payment Recieve By</label><br>
    <input class="form-control" type="text" name="bankinfoby" value="<?php echo $row->permitpay; ?>" required>
  </div>
</div>
    </div>

                                                            </div>
                                                          
                                                     
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

 <script type="text/javascript">
     function calcremaining() {

  var remain = parseFloat(document.getElementById("remaining").value);
 // parse float quantity
  var permitp = parseFloat(document.getElementById("permitpay").value);
  var remaini = remain - permitp ;
  //pass calculated value to input with id total
  document.getElementById("remaining").value =  remaini;
 
}
 </script>