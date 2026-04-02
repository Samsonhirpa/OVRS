 <div class="content-wrapper">
<div class="page-content">
  



<div class="container-fluid">
      <h3 class="box-title"><i class="fa fa-plus-square">LIST OF CUSTOMERS WHO NEEDS TO RENEW THER CRIME FREE CERTIFICATE</i></h3>


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

<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Total Payment</th>
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.95px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Down Payment</th>
                     <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.733px;" aria-label="Browser: activate to sort column ascending">Remaining</th>
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 90.733px;" aria-label="Browser: activate to sort column ascending">Operator</th>
                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120.733px;" aria-label="Browser: activate to sort column ascending">PERMIT</th>

                           </tr>
            </thead>

                 <tbody>
                  <?php
                  $no = 0;
             
                        foreach ($this->str->getntcustomercrime() as $row ) {
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
                               <td><?php echo $row->totalpayment ; ?></td> 
                               <td><?php echo $row->downpayment ; ?></td> 
                               <td><?php echo $row->remaining ; ?></td> 
                                <td><?php echo $row->operator; ?></td>                               
                                                         
                             
                    <td>
                     
                   

                    <a class="btn btn-xs btn-success" href="#"><i class="fa fa-windows"></i></a>
                                     <a class="btn btn-xs alert-success" href="<?php echo base_url('structure/permit_status/'.$row->id)?>"><i <?php if($row->permitstatus == 0 ) { ?> class="fa fa-cloud-upload ">No </i> <i <?php } if($row->permitstatus == 1 ) { ?> class="fa fa-cloud-upload"> Reject </i> <i <?php } if($row->permitstatus == 2 ) { ?> class="fa fa-thumbs-o-up"><?php } ?>Yes</i> </a>

                      </td>  
                     

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
<!-- <script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable({
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
 
 
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
 
            // Total over all pages
            total = api
                .column(14)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Total over this page
            pageTotal = api
                .column(14, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Update footer
            $(api.column(14).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
        },
    });
});
</script>
  -->